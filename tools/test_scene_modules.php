<?php

/** Vérifications sans base de données de la migration GAEA-1. */
require dirname(__DIR__) . '/vendor/autoload.php';

function asset(string $path): string { return $path; }
function url(string $path): string { return $path; }

use App\Core\Request;
use App\Core\Session;
use App\Services\Adventures\Engine\AdventureState;
use App\Services\Adventures\Scenarios\Gaea1\Scenes\Gaea1SceneHandler;
use App\Services\Adventures\Support\AdventureContent;
use App\Services\Adventures\Support\SceneModules;

function check(bool $condition, string $message): void
{
    if (!$condition) {
        throw new RuntimeException($message);
    }
}

$root = dirname(__DIR__);
$config = require $root . '/config/adventures/gaea1.php';
$modules = SceneModules::discover($root . '/content/adventures/gaea1/scenes');
$content = new AdventureContent();
check($config['scenes']['hall']['label'] === 'Hall principal', 'Module not registered');
check($config['scene_urls']['hall'] === 'hall', 'Public URL changed');
check(isset($content->scene($config, 'hall')['variants']['first_entry']), 'Module content missing');
check(isset($content->scene($config, 'terminal')['variants']), 'Terminal content missing');
check(count($modules) === 30 && count($modules) === count($config['scenes']), 'Migration incomplete');

$definitions = SceneModules::flows(
    $root . '/content/adventures/gaea1/scenes',
);
check(isset($definitions['hall'], $definitions['terminal']), 'Flow definitions missing');
check($definitions['plan']['handler'] === \App\Services\Adventures\Scenarios\Gaea1\Scenes\StationPlanSceneHandler::class, 'Specialized handler missing');
// L’adaptateur continue à charger les autres scénarios au format historique.
$legacyConfig = require $root . '/config/adventures/lastparty.php';
check(isset($content->scene($legacyConfig, 'index')['variants']), 'Legacy scenario broken');
$hall = $definitions['hall'];
$handler = new Gaea1SceneHandler('hall', $hall['default'], $hall['actions']);
$state = new AdventureState(new Session(), 'gaea1', $config);
$request = new Request([], ['action' => 'observe_plan'], [], [], []);
$result = $handler->handle($config, $state, $request);
check($result->nextScene === 'plan', 'Hall transition changed');
check($result->stateChanges === [
    'visitestation' => true, 'plancurrent' => 'l', 'plan_variant' => 'default',
], 'Hall state changes changed');

try {
    SceneModules::apply($config, $root . '/content/adventures/gaea1/scenes');
    throw new RuntimeException('Duplicate scene accepted');
} catch (InvalidArgumentException) {
    // Une ancienne déclaration oubliée doit être signalée.
}
try {
    SceneModules::flows($root . '/content/adventures/gaea1/scenes', ['hall' => []]);
    throw new RuntimeException('Duplicate flow accepted');
} catch (InvalidArgumentException) {
}

echo "OK: 30 modules, legacy compatibility, specialized handlers, transition, state and duplicate checks.\n";
