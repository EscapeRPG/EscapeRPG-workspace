<?php

use App\Services\Adventures\Support\Content;

return [
    'variants' => [
        'locked' => [
            'audio' => 'assets/sounds/ambria/flots.mp3',
            'blocks' => [
                Content::narrative('ambria/logan/cabine#locked'),
                Content::dialogue('Un matelot', 'assets/img/ambria/matelots.png', 'ambria/logan/cabine#locked_matelot'),
                Content::narrative('ambria/logan/cabine#locked_end'),
            ],
            'actions' => [],
        ],
        'entry' => [
            'audio' => 'assets/sounds/ambria/cabine.mp3',
            'blocks' => [
                Content::narrative('ambria/logan/cabine#entry'),
                Content::dialogue('Sullivan', 'assets/img/ambria/sullivanmasonmini.png', 'ambria/logan/cabine#entry_sullivan'),
                Content::narrative('ambria/logan/cabine#entry_after_sullivan'),
                Content::dialogue('Logan', 'assets/img/ambria/loganbarthelemymini.png', 'ambria/logan/cabine#entry_logan', 'right'),
                Content::narrative('ambria/logan/cabine#entry_after_logan'),
                Content::dialogue('Logan', 'assets/img/ambria/loganbarthelemymini.png', 'ambria/logan/cabine#entry_logan_2', 'right'),
            ],
            'actions' => [Content::action('Suivant.', 'continue_parchment')],
        ],
        'parchment' => [
            'audio' => 'assets/sounds/ambria/ouverturecarte.mp3',
            'blocks' => [
                Content::image('assets/img/ambria/parchemin.png', 'Le parchemin confié par Louis.', 'enigmelieu'),
                Content::narrative('ambria/logan/cabine#parchment'),
            ],
            'actions' => [Content::ask('Déchiffrer le parchemin.', 'cap', 'submit_cap')],
        ],
        'wrong_cap' => [
            'blocks' => [
                Content::image('assets/img/ambria/parchemin.png', 'Le parchemin confié par Louis.', 'enigmelieu'),
                Content::narrative('ambria/logan/cabine#wrong_cap'),
            ],
            'actions' => [Content::ask('Déchiffrer le parchemin.', 'cap', 'submit_cap')],
        ],
    ],
];
