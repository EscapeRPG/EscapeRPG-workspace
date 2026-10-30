<?php

namespace App\Services\Adventures\Authoring;

use InvalidArgumentException;
use RuntimeException;

/** Génère uniquement la structure technique ; aucun récit ni transition inventés. */
final class AdventureScaffolder
{
    public function __construct(private readonly string $root)
    {
    }

    private function identifier(string $value): void
    {
        if (!preg_match('/^[a-z][a-z0-9_]*$/D', $value)) {
            throw new InvalidArgumentException('Identifiant attendu : lettre minuscule, puis lettres minuscules, chiffres ou underscores.');
        }
    }

    public function scenario(string $slug, string $title): array
    {
        $this->identifier($slug);
        if (trim($title) === '') {
            throw new InvalidArgumentException('Le titre est obligatoire.');
        }
        $configFile = $this->root . '/config/adventures/' . $slug . '.php';
        $directory = $this->root . '/content/adventures/' . $slug;
        if (file_exists($configFile) || file_exists($directory)) {
            throw new RuntimeException('Ce scénario ou son dossier existe déjà. Aucun fichier modifié.');
        }
        $slugPhp = var_export($slug, true);
        $titlePhp = var_export($title, true);
        $config = <<<PHP
<?php

use App\Services\Adventures\Base\ModuleAdventureFlow;
use App\Services\Adventures\Support\SceneModules;

return SceneModules::apply([
    'slug' => {$slugPhp},
    'title' => {$titlePhp},
    'layout' => 'adventure',
    'entry_scene' => 'index',
    'flow' => ModuleAdventureFlow::class,
    'scenes' => [],
    'styles' => [],
    'state' => ['defaults' => []],
    'inventory_items' => [],
    'public_achievements' => [],
    'sidebar_view' => 'adventures/partials/sidebar',
    'footer_view' => 'adventures/partials/footer',
    'sidebar' => [
        'forms' => [
            ['value' => 'load_game', 'label' => 'Charger'],
        ],
    ],
], dirname(__DIR__, 2) . '/content/adventures/' . {$slugPhp} . '/scenes');

PHP;
        $files = $this->sceneFiles($slug, 'index', 'Introduction');
        $files[$configFile] = $config;
        return $this->write($files);
    }

    public function scene(string $slug, string $id, string $label): array
    {
        $this->identifier($slug);
        $this->identifier($id);
        $configFile = $this->root . '/config/adventures/' . $slug . '.php';
        if (!is_file($configFile)) {
            throw new RuntimeException('Scénario inconnu : ' . $slug);
        }
        $config = require $configFile;
        $expected = $this->root . '/content/adventures/' . $slug . '/scenes';
        if (realpath($config['scene_modules_path'] ?? '') !== realpath($expected) || !is_dir($expected)) {
            throw new RuntimeException('Ce scénario ne charge pas encore les scènes regroupées à cet emplacement.');
        }
        if (isset($config['scenes'][$id]) || file_exists($expected . '/' . $id)) {
            throw new RuntimeException('Cette scène existe déjà. Aucun fichier modifié.');
        }
        if (trim($label) === '') {
            throw new InvalidArgumentException('Le titre de scène est obligatoire.');
        }
        return $this->write($this->sceneFiles($slug, $id, $label));
    }

    private function sceneFiles(string $slug, string $id, string $label): array
    {
        $dir = $this->root . '/content/adventures/' . $slug . '/scenes/' . $id;
        $labelPhp = var_export($label, true);
        $reference = var_export($slug . '/scenes/' . $id . '/text#default', true);
        $source = <<<PHP
<?php

use App\Services\Adventures\Support\Content;

return [
    'label' => {$labelPhp},
    'flow' => [
        'default' => 'default',
        'actions' => [],
    ],
    'variants' => [
        'default' => [
            'blocks' => [Content::narrative({$reference})],
            'actions' => [],
        ],
    ],
];

PHP;
        return [$dir . '/text.md' => "## default\n\n", $dir . '/scene.php' => $source];
    }

    private function write(array $files): array
    {
        foreach ($files as $path => $contents) {
            if (file_exists($path)) {
                throw new RuntimeException('Fichier existant : ' . $path);
            }
        }
        $created = [];
        try {
            foreach ($files as $path => $contents) {
                $dir = dirname($path);
                if (!is_dir($dir) && !mkdir($dir, 0777, true) && !is_dir($dir)) {
                    throw new RuntimeException('Impossible de créer : ' . $dir);
                }
                $handle = fopen($path, 'x');
                if ($handle === false) {
                    throw new RuntimeException('Impossible de créer : ' . $path);
                }
                $created[] = $path;
                try {
                    if (fwrite($handle, $contents) !== strlen($contents)) {
                        throw new RuntimeException('Écriture incomplète : ' . $path);
                    }
                } finally {
                    fclose($handle);
                }
            }
        } catch (\Throwable $exception) {
            foreach ($created as $path) {
                unlink($path);
            }
            throw $exception;
        }
        return $created;
    }
}
