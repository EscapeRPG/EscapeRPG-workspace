<?php

namespace App\Services\Adventures\Authoring;

use App\Services\Adventures\Support\AdventureContent;
use InvalidArgumentException;
use RuntimeException;

/** Exporte les transitions déclarées sans instancier de flow ni de handler. */
final class AdventureMap
{
    public function __construct(private readonly string $root)
    {
    }

    public function load(string $slug): array
    {
        if (!preg_match('/^[a-z][a-z0-9_]*$/D', $slug)) {
            throw new InvalidArgumentException('Slug invalide.');
        }
        $file = $this->root . '/config/adventures/' . $slug . '.php';
        if (!is_file($file)) {
            throw new RuntimeException('Scénario inconnu : ' . $slug);
        }
        return require $file;
    }

    public function data(array $config): array
    {
        $nodes = [];
        $edges = [];
        $loader = new AdventureContent();
        $addEdge = static function (string $from, string $to, string $action, string $note = '') use (&$edges): void {
            // Les changements de variante restent dans le panneau de détail.
            if ($from === $to) {
                return;
            }
            $key = json_encode([$from, $to, $action, $note], JSON_THROW_ON_ERROR);
            $edges[$key] = compact('from', 'to', 'action', 'note');
        };
        foreach ($config['scenes'] as $id => $metadata) {
            $content = $loader->scene($config, $id);
            $definition = $config['scene_definitions'][$id] ?? [];
            $moduleFile = $config['scene_module_files'][$id] ?? null;
            $module = $moduleFile !== null ? require $moduleFile : [];
            $handler = $definition['handler'] ?? null;
            $files = [];
            if ($moduleFile !== null) {
                $files[] = $this->relative($moduleFile);
                if (is_file(dirname($moduleFile) . '/text.md')) {
                    $files[] = $this->relative(dirname($moduleFile) . '/text.md');
                }
            } else {
                $files[] = 'app/Content/' . ($config['content_path'] ?? '') . '/' . ($config['content_files'][$id] ?? $id) . '.php';
            }
            if ($handler !== null) {
                $handlerFile = (new \ReflectionClass($handler))->getFileName();
                if ($handlerFile !== false) {
                    $files[] = $this->relative($handlerFile);
                }
            }
            $nodes[$id] = [
                'id' => $id,
                'label' => is_array($metadata) ? ($metadata['label'] ?? $id) : $metadata,
                'url' => '/aventures/' . $config['slug'] . '/' . ($config['scene_urls'][$id] ?? $id),
                'variants' => array_keys($content['variants'] ?? []),
                'actions' => $definition['actions'] ?? [],
                'files' => $files,
                'handler' => $handler,
                'partial' => $handler !== null || $moduleFile === null,
                'missing' => false,
            ];
            foreach ($definition['actions'] ?? [] as $action => $effect) {
                if (isset($effect['next_scene'])) {
                    $addEdge($id, $effect['next_scene'], $action, 'Transition déclarée dans flow.actions.');
                }
            }
            foreach ($module['map']['transitions'] ?? [] as $transition) {
                $addEdge($id, $transition['scene'], $transition['action'] ?? 'navigation', $transition['note'] ?? 'Annotation de carte, sans effet sur le jeu.');
            }
            // Une liste de destinations calculées peut être documentée sans la dupliquer.
            $destinations = $module['map']['destination_config'] ?? null;
            if (is_string($destinations)) {
                foreach ($config[$destinations] ?? [] as $code => $destination) {
                    if (($destination['enabled'] ?? true) && isset($destination['scene'])) {
                        $addEdge($id, $destination['scene'], ($module['map']['action'] ?? 'navigation') . ' [' . $code . ']', 'Destination conditionnelle : accès, état et variante calculés par le handler.');
                    }
                }
            }
            $scan = function (mixed $value) use (&$scan, $config, $id, $addEdge): void {
                if (!is_array($value)) {
                    return;
                }
                foreach ($value as $key => $child) {
                    if (in_array($key, ['form_action', 'href'], true) && is_string($child)) {
                        $path = parse_url($child, PHP_URL_PATH) ?? '';
                        $prefix = '/aventures/' . $config['slug'] . '/';
                        if (str_starts_with($path, $prefix)) {
                            $route = substr($path, strlen($prefix));
                            $target = $config['scene_aliases'][$route] ?? array_search($route, $config['scene_urls'] ?? [], true);
                            $addEdge($id, $target === false ? $route : $target, (string) ($value['value'] ?? 'formulaire'), 'Formulaire ou lien déclaré dans le contenu.');
                        }
                    }
                    $scan($child);
                }
            };
            $scan($content['variants'] ?? []);
        }
        foreach ($edges as $edge) {
            if (!isset($nodes[$edge['to']])) {
                $id = $edge['to'];
                $nodes[$id] = ['id' => $id, 'label' => 'Destination absente', 'url' => '', 'variants' => [], 'actions' => [], 'files' => [], 'handler' => null, 'partial' => false, 'missing' => true];
            }
        }
        $reachable = [$config['entry_scene'] => true];
        do {
            $previous = count($reachable);
            foreach ($edges as $edge) {
                if (isset($reachable[$edge['from']])) {
                    $reachable[$edge['to']] = true;
                }
            }
        } while (count($reachable) !== $previous);
        foreach ($nodes as $id => &$node) {
            $node['reachable'] = isset($reachable[$id]);
        }
        unset($node);
        return [
            'slug' => $config['slug'], 'title' => $config['title'], 'entry' => $config['entry_scene'],
            'nodes' => array_values($nodes), 'edges' => array_values($edges),
            'notice' => 'Carte des transitions déclarées, pas une simulation du jeu. Les conditions ne sont pas évaluées. Les handlers, scripts, vues et navigations globales peuvent ajouter des chemins. Une scène non reliée reste potentiellement accessible.',
        ];
    }

    public function generate(string $slug): string
    {
        $data = $this->data($this->load($slug));
        $json = json_encode($data, JSON_THROW_ON_ERROR | JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_UNESCAPED_UNICODE);
        $template = file_get_contents($this->root . '/tools/templates/adventure-map.html');
        if ($template === false) {
            throw new RuntimeException('Modèle de carte introuvable.');
        }
        $directory = $this->root . '/var/adventure-maps';
        if (!is_dir($directory) && !mkdir($directory, 0777, true) && !is_dir($directory)) {
            throw new RuntimeException('Impossible de créer le dossier de sortie.');
        }
        $output = $directory . '/' . $slug . '.html';
        if (file_put_contents($output, str_replace('/* ADVENTURE_DATA */', $json, $template)) === false) {
            throw new RuntimeException('Impossible d’écrire la carte.');
        }
        return $output;
    }

    private function relative(string $path): string
    {
        return str_replace(str_replace('\\', '/', $this->root) . '/', '', str_replace('\\', '/', $path));
    }
}
