<?php

return [
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
    'lastparty' => [
        'slug' => 'lastparty',
        'title' => 'Last Party',
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
            'banner' => 'assets/img/lastparty/lpmini.png',
        ],
    ],
];
