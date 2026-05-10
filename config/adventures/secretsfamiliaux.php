<?php

use App\Services\Adventures\Scenarios\SecretsFamiliaux\SecretsFamiliauxAdventureFlow;

$configPath = __DIR__ . '/secretsfamiliaux';

return [
    'slug' => 'secretsfamiliaux',
    'title' => 'Secrets Familiaux',
    'layout' => 'adventure',
    'flow' => SecretsFamiliauxAdventureFlow::class,
    'content_path' => 'Adventures/SecretsFamiliaux',
    'styles' => require_once $configPath . '/styles.php',
    'sidebar_view' => 'adventures/partials/sidebar',
    'footer_view' => 'adventures/partials/footer',
    'sidebar' => require $configPath . '/sidebar.php',
    'entry_scene' => 'index',
    'scene_aliases' => require_once $configPath . '/scene_aliases.php',
    'scene_urls' => require_once $configPath . '/scene_urls.php',
    'content_files' => require_once $configPath . '/content_files.php',
    'scenes' => require_once $configPath . '/scenes.php',
    'state' => require_once $configPath . '/state.php',
    'assets' => require_once $configPath . '/assets.php',
    'public_achievements' => require_once $configPath . '/public_achievements.php',
    'inventory_items' => require_once $configPath . '/inventory.php',
];
