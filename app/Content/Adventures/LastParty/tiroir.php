<?php

use App\Services\Adventures\Support\Content;

return [
    'variants' => [
        'found' => [
            'audio' => 'assets/sounds/lastparty/tiroir.mp3',
            'blocks' => [
                Content::linkedImage('assets/img/lastparty/carnet.png', 'carnet'),
                Content::narrative('lastparty/tiroir#found'),
            ],
            'actions' => [
                Content::action('Prendre.', 'take_notebook'),
            ],
        ],
        'acquired' => [
            'audio' => null,
            'blocks' => [
                Content::narrative('lastparty/tiroir#acquired'),
            ],
            'actions' => [
                Content::action('Retour.', 'back_to_room'),
            ],
        ],
    ],
];
