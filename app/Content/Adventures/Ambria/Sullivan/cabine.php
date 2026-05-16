<?php

use App\Services\Adventures\Support\Content;

return [
    'variants' => [
        'entry' => [
            'audio' => 'assets/sounds/ambria/cabine.mp3',
            'blocks' => [
                Content::narrative('ambria/sullivan/cabine#entry'),
                Content::linkedImage('assets/img/ambria/journalsullivan.png', 'Le journal de bord de Sullivan.', 'enigme'),
            ],
            'actions' => [
                Content::action('Prendre.', 'take_journal'),
            ],
        ],
        'journal_taken' => [
            'blocks' => [
                Content::narrative('ambria/sullivan/cabine#journal_taken'),
            ],
            'actions' => [],
        ],
        'logan_entry' => [
            'audio' => 'assets/sounds/ambria/ouverturecarte.mp3',
            'blocks' => [
                Content::narrative('ambria/sullivan/cabine#logan_entry'),
                Content::dialogue('Sullivan', 'assets/img/ambria/sullivanmasonmini.png', 'ambria/sullivan/cabine#sullivan_parchment', 'right'),
                Content::narrative('ambria/sullivan/cabine#after_sullivan_parchment'),
                Content::dialogue('Logan', 'assets/img/ambria/loganbarthelemymini.png', 'ambria/sullivan/cabine#logan_parchment'),
                Content::narrative('ambria/sullivan/cabine#after_logan_parchment'),
                Content::dialogue('Logan', 'assets/img/ambria/loganbarthelemymini.png', 'ambria/sullivan/cabine#logan_reassures'),
            ],
            'actions' => [
                Content::action('Suivant.', 'continue_cap_setup'),
            ],
        ],
        'cap_setup' => [
            'blocks' => [
                Content::linkedImage('assets/img/ambria/cartedumonde.png', 'La carte du monde.', 'enigmelieu'),
                Content::narrative('ambria/sullivan/cabine#cap_setup'),
                Content::partial('adventures/ambria/cadrans_cap'),
            ],
            'actions' => [],
            'hint' => Content::hint('ambria/sullivan/hints#cap'),
            'scripts' => [
                'assets/js/adventures/dragDropPuzzle.js',
                'assets/js/adventures/ambria/cadransCap.js',
            ],
        ],
    ],
];
