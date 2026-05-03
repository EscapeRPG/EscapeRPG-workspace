<?php

use App\Services\Adventures\Scenarios\LastParty\LastPartyAdventureFlow;

return [
    'slug' => 'lastparty',
    'title' => 'Last Party',
    'layout' => 'adventure',
    'flow' => LastPartyAdventureFlow::class,
    'content_path' => 'Adventures/LastParty',
    'styles' => [
        'assets/styles/aventures/last_party/style.css',
        'assets/styles/aventures/last_party/sms.css',
        'assets/styles/aventures/last_party/appartement.css',
        'assets/styles/aventures/last_party/faceeebook.css',
    ],
    'sidebar_view' => 'adventures/lastparty/sidebar',
    'footer_view' => 'adventures/lastparty/footer',
    'entry_scene' => 'index',
    'scenes' => [
        'index' => 'Introduction',
        'eveil' => 'Éveil',
        'telephone' => 'Messages',
        'appartement' => 'Appartement',
        'tiroir' => 'Tiroir',
        'ordinateur' => 'Faceeebook',
        'appareilphoto' => 'Photos',
        'couloir' => "Couloir d'entrée",
        'ebaubi' => "La fin de l'histoire",
    ],
    'scene_views' => [
        'telephone' => 'adventures/lastparty/telephone',
        'ordinateur' => 'adventures/lastparty/ordinateur',
    ],
    'state' => [
        'defaults' => [
            '_scene' => 'index',
            'started' => false,
            'index_step' => 0,
            'eveil_step' => 0,
            'telephone_step' => 0,
            'faceeebook_seen' => false,
            'photos_unlocked' => false,
            'drawer_unlocked' => false,
            'carnet_acquired' => false,
            'computer_connected' => false,
            'juliette_found' => false,
            'ordinateur_error' => null,
            'camera_step' => 0,
            'business_card_acquired' => false,
            'final_revealed' => false,
            'hints' => [],
            'inventory' => [],
            'notes' => [],
        ],
    ],
    'assets' => [
        'banner' => 'assets/img/lastparty/lpmini.png',
    ],
    'inventory_items' => [
        'carnet' => [
            'image' => 'assets/img/lastparty/carnet.png',
            'alt' => 'Un carnet où vous avez noté tous vos mots de passe.',
        ],
        'cartevisite' => [
            'image' => 'assets/img/lastparty/cartedevisite.png',
            'alt' => 'Une carte de visite d\'un certain Darren Braun.',
        ],
    ],
];
