<?php

use App\Services\Adventures\Scenarios\Gaea1\Gaea1AdventureFlow;

$configPath = __DIR__ . '/gaea1';

return [
    'slug' => 'gaea1',
    'title' => 'Station GAEA-1',
    'layout' => 'adventure',
    'flow' => Gaea1AdventureFlow::class,
    'content_path' => 'Adventures/Gaea1',
    'styles' => require $configPath . '/styles.php',
    'sidebar_view' => 'adventures/gaea1/sidebar',
    'footer_view' => 'adventures/partials/footer',
    'entry_scene' => 'index',
    'scenes' => require $configPath . '/scenes.php',
    'scene_urls' => require $configPath . '/scene_urls.php',
    'content_files' => require $configPath . '/content_files.php',
    'scene_views' => require $configPath . '/scene_views.php',
    'state' => require $configPath . '/state.php',
    'assets' => require $configPath . '/assets.php',
    'public_achievements' => require $configPath . '/public_achievements.php',
    'inventory_items' => require $configPath . '/inventory.php',
    'station_rooms' => require $configPath . '/station_rooms.php',
];
