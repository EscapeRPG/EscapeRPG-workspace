<?php

use App\Services\Adventures\Scenarios\Ambria\AmbriaAdventureFlow;

$configPath = __DIR__ . '/ambria';

return [
    'slug' => 'ambria',
    'title' => "Le Trésor d'Ambria",
    'comment_scenario' => "Le Trésor d'Ambria",
    'layout' => 'adventure',
    'flow' => AmbriaAdventureFlow::class,
    'content_path' => 'Adventures/Ambria',
    'styles' => require $configPath . '/styles.php',
    'sidebar_view' => 'adventures/ambria/sidebar',
    'footer_view' => 'adventures/partials/footer',
    'sidebar' => require $configPath . '/sidebar.php',
    'entry_scene' => 'index',
    'scenes' => require $configPath . '/scenes.php',
    'scene_aliases' => require $configPath . '/scene_aliases.php',
    'scene_urls' => require $configPath . '/scene_urls.php',
    'content_files' => require $configPath . '/content_files.php',
    'scene_views' => require $configPath . '/scene_views.php',
    'state' => require $configPath . '/state.php',
    'assets' => require $configPath . '/assets.php',
    'public_achievements' => require $configPath . '/public_achievements.php',
    'inventory_items' => require $configPath . '/inventory.php',
];
