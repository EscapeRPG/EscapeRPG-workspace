<?php

use App\Services\Adventures\Support\Content;

$sullivan = 'assets/img/ambria/sullivanmasonmini.png';

return [
    'variants' => [
        'default' => [
            'blocks' => [
                Content::narrative('ambria/sullivan/embarquement#entry'),
                Content::dialogue('Sullivan', $sullivan, 'ambria/sullivan/embarquement#sullivan_weapon', 'right'),
                Content::narrative('ambria/sullivan/embarquement#logan_notice'),
                Content::dialogue('Sullivan', $sullivan, 'ambria/sullivan/embarquement#sullivan_weapon_2', 'right'),
            ],
            'actions' => [
                Content::action('Suivant.', 'continue_fight'),
            ],
        ],
        'entry' => [
            'blocks' => [
                Content::narrative('ambria/sullivan/embarquement#entry'),
                Content::dialogue('Sullivan', $sullivan, 'ambria/sullivan/embarquement#sullivan_weapon', 'right'),
                Content::narrative('ambria/sullivan/embarquement#logan_notice'),
                Content::dialogue('Sullivan', $sullivan, 'ambria/sullivan/embarquement#sullivan_weapon_2', 'right'),
            ],
            'actions' => [
                Content::action('Suivant.', 'continue_fight'),
            ],
        ],
        'combat_start' => [
            'audio' => 'assets/sounds/ambria/combatmarins.mp3',
            'blocks' => [
                Content::narrative('ambria/sullivan/embarquement#combat_start'),
            ],
            'actions' => [
                Content::action('Suivant.', 'continue_fight_end'),
            ],
        ],
        'combat_end' => [
            'audio' => 'assets/sounds/ambria/combatmarins2.mp3',
            'blocks' => [
                Content::narrative('ambria/sullivan/embarquement#combat_end'),
                Content::dialogue('Sullivan', $sullivan, 'ambria/sullivan/embarquement#combat_end_sullivan', 'right'),
                Content::narrative('ambria/sullivan/embarquement#combat_end_after_sullivan'),
                Content::dialogue('Sullivan', $sullivan, 'ambria/sullivan/embarquement#combat_end_sullivan_2', 'right'),
            ],
            'actions' => [
                Content::action('Suivant.', 'board_ship'),
            ],
        ],
        'board_hip' => [
            'audio' => 'assets/sounds/ambria/embarquement.mp3',
            'blocks' => [
                Content::narrative('ambria/sullivan/embarquement#board'),
                Content::narrative('ambria/sullivan/embarquement#board_hip'),
                Content::dialogue('Sullivan', $sullivan, 'ambria/sullivan/embarquement#board_sullivan', 'right'),
                Content::narrative('ambria/sullivan/embarquement#board_after_orders'),
            ],
            'actions' => [
                Content::action('Suivant.', 'enter_cabin'),
            ],
        ],
        'board_face' => [
            'audio' => 'assets/sounds/ambria/embarquement.mp3',
            'blocks' => [
                Content::narrative('ambria/sullivan/embarquement#board'),
                Content::narrative('ambria/sullivan/embarquement#board_face'),
                Content::dialogue('Sullivan', $sullivan, 'ambria/sullivan/embarquement#board_sullivan', 'right'),
                Content::narrative('ambria/sullivan/embarquement#board_after_orders'),
            ],
            'actions' => [
                Content::action('Suivant.', 'enter_cabin'),
            ],
        ],
        'board_face_and_hip' => [
            'audio' => 'assets/sounds/ambria/embarquement.mp3',
            'blocks' => [
                Content::narrative('ambria/sullivan/embarquement#board'),
                Content::narrative('ambria/sullivan/embarquement#board_face_and_hip'),
                Content::dialogue('Sullivan', $sullivan, 'ambria/sullivan/embarquement#board_sullivan', 'right'),
                Content::narrative('ambria/sullivan/embarquement#board_after_orders'),
            ],
            'actions' => [
                Content::action('Suivant.', 'enter_cabin'),
            ],
        ],
        'cabin' => [
            'blocks' => [
                Content::narrative('ambria/sullivan/embarquement#cabin'),
                Content::partial('adventures/ambria/etagere'),
                Content::narrative('ambria/sullivan/embarquement#shelf_reflection'),
            ],
            'actions' => [
                Content::action('Réinitialiser.', 'reset_shelf'),
            ],
            'hint' => Content::hint('ambria/sullivan/hints#shelf'),
            'scripts' => [
                'assets/js/adventures/dragDropPuzzle.js',
                'assets/js/adventures/ambria/etagere.js',
            ],
        ],
    ],
];
