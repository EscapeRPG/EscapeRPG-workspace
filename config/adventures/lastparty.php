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
        'index' => [
            'label' => 'Introduction',
            'view' => 'adventures/lastparty/index',
        ],
        'eveil' => [
            'label' => 'Eveil',
            'view' => 'adventures/lastparty/eveil',
        ],
        'telephone' => [
            'label' => 'Messages',
            'view' => 'adventures/lastparty/telephone',
        ],
        'appartement' => [
            'label' => 'Appartement',
            'view' => 'adventures/lastparty/appartement',
        ],
        'tiroir' => [
            'label' => 'Tiroir',
            'view' => 'adventures/lastparty/tiroir',
        ],
        'ordinateur' => [
            'label' => 'Faceeebook',
            'view' => 'adventures/lastparty/ordinateur',
        ],
        'appareilphoto' => [
            'label' => 'Photos',
            'view' => 'adventures/lastparty/appareilphoto',
        ],
        'couloir' => [
            'label' => "Couloir d'entrée",
            'view' => 'adventures/lastparty/couloir',
        ],
        'ebaubi' => [
            'label' => "La fin de l'histoire",
            'view' => 'adventures/lastparty/ebaubi',
        ],
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
];
