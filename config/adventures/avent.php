<?php

use App\Services\Adventures\Scenarios\Avent\AventAdventureFlow;

$configPath = __DIR__ . '/avent';

return [
    'slug' => 'avent',
    'title' => "Le Grenier d'Arthur",
    'layout' => 'adventure',
    'flow' => AventAdventureFlow::class,
    'content_path' => 'Adventures/Avent',
    'styles' => require $configPath . '/styles.php',
    'sidebar_view' => 'adventures/avent/sidebar',
    'entry_scene' => 'index',
    'scenes' => require $configPath . '/scenes.php',
    'scene_views' => require $configPath . '/scene_views.php',
    'state' => require $configPath . '/state.php',
    'assets' => require $configPath . '/assets.php',
    'public_achievements' => require $configPath . '/public_achievements.php',
    'inventory_items' => require $configPath . '/inventory.php',
];
