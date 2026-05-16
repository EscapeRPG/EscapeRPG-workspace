<?php

use App\Services\Adventures\Support\Content;

return [
    'variants' => [
        'default' => [
            'audio' => 'assets/sounds/ambria/flots.mp3',
            'blocks' => [
                Content::narrative('ambria/sullivan/flots#entry'),
            ],
            'actions' => [
                Content::action('Suivant.', 'continue_flots'),
            ],
        ],
        'entry' => [
            'audio' => 'assets/sounds/ambria/flots.mp3',
            'blocks' => [
                Content::narrative('ambria/sullivan/flots#entry'),
            ],
            'actions' => [
                Content::action('Suivant.', 'continue_flots'),
            ],
        ],
        'deck' => [
            'audio' => 'assets/sounds/ambria/flots.mp3',
            'blocks' => [
                Content::narrative('ambria/sullivan/flots#deck'),
            ],
            'actions' => [],
        ],
    ],
];
