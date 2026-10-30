<?php

require __DIR__ . '/adventure-bootstrap.php';

use App\Core\Request;
use App\Core\Session;
use App\Services\Adventures\Authoring\AdventureMap;
use App\Services\Adventures\Base\ModuleAdventureFlow;
use App\Services\Adventures\Engine\AdventureState;

function verify(bool $ok, string $message): void
{
    if (!$ok) throw new RuntimeException($message);
}

function command(array $arguments, int $expected = 0): string
{
    $pipes = [];
    $process = proc_open([PHP_BINARY, ...$arguments], [1 => ['pipe', 'w'], 2 => ['pipe', 'w']], $pipes, BASE_PATH);
    if (!is_resource($process)) throw new RuntimeException('Unable to start PHP');
    $output = stream_get_contents($pipes[1]) . stream_get_contents($pipes[2]);
    fclose($pipes[1]); fclose($pipes[2]);
    $status = proc_close($process);
    verify($status === $expected, "Unexpected command status {$status}: {$output}");
    return $output;
}

$slug = 'codex_fixture_' . bin2hex(random_bytes(5));
$directory = BASE_PATH . '/content/adventures/' . $slug;
$configFile = BASE_PATH . '/config/adventures/' . $slug . '.php';
$mapFile = BASE_PATH . '/var/adventure-maps/' . $slug . '.html';
try {
    command(['tools/adventure.php', 'new:scenario', $slug, "L’aventure d'essai </script>"]);
    $original = hash_file('sha256', $configFile);
    command(['tools/adventure.php', 'new:scenario', $slug, 'Autre titre'], 1);
    verify(hash_file('sha256', $configFile) === $original, 'Existing scenario overwritten');
    command(['tools/adventure.php', 'new:scene', $slug, '../outside', 'Invalid'], 1);
    command(['tools/adventure.php', 'new:scene', $slug, 'laboratoire', "Salle d'essai"]);
    command(['tools/adventure.php', 'new:scene', $slug, 'laboratoire', 'Duplicate'], 1);
    command(['tools/validate_adventure.php', $slug]);
    $file = $directory . '/scenes/index/scene.php';
    $source = file_get_contents($file);
    // Modifier uniquement la première liste : les effets, pas les boutons.
    $source = preg_replace("/'actions' => \[\],/", "'actions' => ['continue' => ['next_scene' => 'laboratoire', 'variant' => 'default', 'state' => ['visited' => true]]],", $source, 1);
    file_put_contents($file, $source);
    $config = require $configFile;
    $state = new AdventureState(new Session(), $slug, $config);
    $flow = new ModuleAdventureFlow();
    $request = new Request([], ['action' => 'continue'], ['REQUEST_URI' => '/aventures/' . $slug], [], []);
    $page = $flow->show($config, $state, $request, 'index');
    verify($page->layout === 'adventure' && $page->data['variant'] === 'default', 'Generated scene cannot be rendered');
    $result = $flow->handle($config, $state, $request, 'index');
    verify($result->nextScene === 'laboratoire' && $result->stateChanges === ['visited' => true, 'laboratoire_variant' => 'default'], 'Generated flow does not apply transitions');
    $restart = $flow->handle($config, $state, new Request([], ['restart' => '1'], [], [], []), 'laboratoire');
    verify($restart->resetState && $restart->nextScene === 'index', 'Restart broken');
    command(['tools/validate_adventure.php', $slug]);
    command(['tools/adventure-map.php', $slug]);
    $html = file_get_contents($mapFile);
    verify(!str_contains($html, '</script>"'), 'Unsafe script embedding');
    $map = new AdventureMap(BASE_PATH);
    $data = $map->data($config);
    verify(count($data['edges']) === 1 && $data['edges'][0]['to'] === 'laboratoire', 'Declared edge missing');
    verify($data['nodes'][1]['reachable'], 'Reachable scene misclassified');
    $config['scene_definitions']['index']['actions']['missing'] = ['next_scene' => 'absente'];
    $data = $map->data($config);
    verify(count(array_filter($data['nodes'], fn ($node) => $node['missing'])) === 1, 'Missing destination not shown');
    $gaea = require BASE_PATH . '/config/adventures/gaea1.php';
    $data = $map->data($gaea);
    verify(count(array_filter($data['edges'], fn ($edge) => $edge['from'] === 'plan' && $edge['to'] === 'sykkerum')) === 1, 'Dynamic room destinations missing');
    verify(count(array_filter($data['nodes'], fn ($node) => $node['id'] === 'plan' && $node['partial'])) === 1, 'Specialized handler not marked partial');
    echo "OK: CLI scaffolding, no overwrite, invalid paths, validation, rendering, transitions, restart, map and dynamic destinations.\n";
} finally {
    // Uniquement les chemins de cette fixture aléatoire, sans suppression récursive.
    foreach (['index', 'laboratoire'] as $scene) {
        foreach (['scene.php', 'text.md'] as $name) {
            $file = $directory . '/scenes/' . $scene . '/' . $name;
            if (is_file($file)) unlink($file);
        }
        if (is_dir($directory . '/scenes/' . $scene)) rmdir($directory . '/scenes/' . $scene);
    }
    if (is_dir($directory . '/scenes')) rmdir($directory . '/scenes');
    if (is_dir($directory)) rmdir($directory);
    if (is_file($configFile)) unlink($configFile);
    if (is_file($mapFile)) unlink($mapFile);
}
