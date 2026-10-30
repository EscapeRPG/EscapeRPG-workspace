<?php

use App\Services\Adventures\Scenarios\Gaea1\Gaea1AdventureFlow;
use App\Services\Adventures\Support\SceneModules;

$configPath = __DIR__ . '/gaea1';

return SceneModules::apply([
    'slug' => 'gaea1',
    'title' => 'Station GAEA-1',
    'layout' => 'adventure',
    'flow' => Gaea1AdventureFlow::class,
    'styles' => require $configPath . '/styles.php',
    'sidebar_view' => 'adventures/gaea1/sidebar',
    'footer_view' => 'adventures/partials/footer',
    'entry_scene' => 'index',
    'scenes' => [],
    'state' => require $configPath . '/state.php',
    'assets' => require $configPath . '/assets.php',
    'public_achievements' => require $configPath . '/public_achievements.php',
    'inventory_items' => require $configPath . '/inventory.php',
    'station_rooms' => require $configPath . '/station_rooms.php',
], dirname(__DIR__, 2) . '/content/adventures/gaea1/scenes');
