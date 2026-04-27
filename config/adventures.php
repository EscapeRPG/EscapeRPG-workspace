<?php

use App\Services\Adventures\Scenarios\LastParty\LastPartyAdventureFlow;

return [
    'lastparty' => [
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
        ],
        'state' => [
            'defaults' => [
                '_scene' => 'index',
                'started' => false,
                'index_step' => 0,
                'eveil_step' => 0,
                'hints' => [],
                'inventory' => [],
                'notes' => [],
            ],
        ],
        'assets' => [
            'banner' => 'assets/img/lastparty/lpmini.png',
        ],
    ],
    'avent' => [
        'slug' => 'avent',
        'title' => "Le Grenier d'Arthur",
        'layout' => 'main',
        'entry_scene' => 'index',
        'scenes' => [
            'index' => [
                'label' => 'Introduction',
            ],
        ],
        'state' => [
            'defaults' => [
                '_scene' => 'index',
            ],
        ],
        'assets' => [
            'banner' => 'assets/img/avent/aventmini.png',
        ],
    ],
];
