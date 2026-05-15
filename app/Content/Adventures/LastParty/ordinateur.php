<?php

use App\Services\Adventures\Support\Content;

return [
    'variants' => [
        'missing_notebook' => [
            'audio' => null,
            'blocks' => [
                Content::narrative('lastparty/ordinateur#missing_notebook'),
            ],
            'actions' => [],
        ],
        'login' => [
            'audio' => 'assets/sounds/lastparty/ordinateur.mp3',
            'blocks' => [
                Content::narrative('lastparty/ordinateur#login'),
            ],
            'hint' => Content::hint('lastparty/hints#ordinateur_password'),
            'actions' => [],
        ],
        'connected' => [
            'audio' => null,
            'blocks' => [
                Content::narrative('lastparty/ordinateur#connected'),
            ],
            'hint' => Content::hint('lastparty/hints#ordinateur_juliette'),
            'actions' => [],
        ],
        'juliette' => [
            'audio' => null,
            'blocks' => [
                Content::narrative('lastparty/ordinateur#juliette'),
            ],
            'actions' => [],
        ],
    ],
];
