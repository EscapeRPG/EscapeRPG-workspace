<?php

use App\Services\Adventures\Scenarios\LastParty\LastPartyAdventureFlow;

$configPath = __DIR__ . '/lastparty';

return [
    'slug' => 'lastparty',
    'title' => 'Last Party',
    'layout' => 'adventure',
    'flow' => LastPartyAdventureFlow::class,
    'content_path' => 'Adventures/LastParty',
    'styles' => require $configPath . '/styles.php',
    'sidebar_view' => 'adventures/partials/sidebar',
    'footer_view' => 'adventures/partials/footer',
    'sidebar' => require $configPath . '/sidebar.php',
    'entry_scene' => 'index',
    'scenes' => require $configPath . '/scenes.php',
    'scene_views' => require $configPath . '/scene_views.php',
    'state' => require $configPath . '/state.php',
    'assets' => require $configPath . '/assets.php',
    'public_achievements' => require $configPath . '/public_achievements.php',
    'inventory_items' => require $configPath . '/inventory.php',
];
