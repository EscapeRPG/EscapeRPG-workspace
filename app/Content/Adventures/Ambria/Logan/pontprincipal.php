<?php

use App\Services\Adventures\Support\Content;

return [
    'variants' => [
        'entry' => [
            'audio' => 'assets/sounds/ambria/flots.mp3',
            'blocks' => [
                Content::narrative('ambria/logan/pontprincipal#entry'),
                Content::dialogue('Des matelots', 'assets/img/ambria/matelots.png', 'ambria/logan/pontprincipal#entry_matelots'),
                Content::narrative('ambria/logan/pontprincipal#entry_after_matelots'),
                Content::dialogue('Des matelots', 'assets/img/ambria/matelots.png', 'ambria/logan/pontprincipal#entry_matelots_2'),
            ],
            'actions' => [
                Content::action('Visiter le bateau.', 'visit_ship'),
                Content::action('Les aider.', 'help_sailors'),
            ],
        ],
        'skipped_help' => [
            'audio' => 'assets/sounds/ambria/flots.mp3',
            'blocks' => [
                Content::dialogue('Des matelots', 'assets/img/ambria/matelots.png', 'ambria/logan/pontprincipal#skipped_matelots'),
                Content::narrative('ambria/logan/pontprincipal#skipped'),
                Content::dialogue('Jake', 'assets/img/ambria/jake.png', 'ambria/logan/pontprincipal#jake'),
            ],
            'actions' => [
                Content::action('Le suivre.', 'follow_jake'),
            ],
        ],
        'helped' => [
            'audio' => 'assets/sounds/ambria/flots.mp3',
            'blocks' => [
                Content::narrative('ambria/logan/pontprincipal#helped'),
                Content::dialogue('Jake', 'assets/img/ambria/jake.png', 'ambria/logan/pontprincipal#jake'),
            ],
            'actions' => [
                Content::action('Le suivre.', 'follow_jake'),
            ],
        ],
        'repeat_skipped' => [
            'audio' => 'assets/sounds/ambria/flots.mp3',
            'blocks' => [
                Content::narrative('ambria/logan/pontprincipal#repeat_skipped'),
            ],
            'actions' => [],
        ],
        'repeat_helped' => [
            'audio' => 'assets/sounds/ambria/flots.mp3',
            'blocks' => [
                Content::narrative('ambria/logan/pontprincipal#repeat_helped'),
            ],
            'actions' => [],
        ],
    ],
];
