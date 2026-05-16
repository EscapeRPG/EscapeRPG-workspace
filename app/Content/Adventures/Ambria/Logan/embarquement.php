<?php

use App\Services\Adventures\Support\Content;

$entry = [
    'blocks' => [
        Content::narrative('ambria/logan/embarquement#entry'),
        Content::dialogue('Sullivan', 'assets/img/ambria/sullivanmasonmini.png', 'ambria/logan/embarquement#entry_sullivan'),
    ],
    'actions' => [
        Content::action('Suivant.', 'prepare_fight'),
    ],
];

$board = static function (string $section): array {
    return [
        'audio' => 'assets/sounds/ambria/embarquement.mp3',
        'blocks' => [
            Content::narrative('ambria/logan/embarquement#board'),
            Content::dialogue('Barthy', 'assets/img/ambria/barthy.png', 'ambria/logan/embarquement#board_barthy'),
            Content::narrative('ambria/logan/embarquement#' . $section),
            Content::dialogue('Barthy', 'assets/img/ambria/barthy.png', 'ambria/logan/embarquement#board_barthy_2'),
        ],
        'actions' => [
            Content::action('Suivant.', 'learn_knots'),
        ],
    ];
};

return [
    'variants' => [
        'default' => $entry,
        'placeholder' => $entry,
        'entry' => $entry,
        'combat_start' => [
            'audio' => 'assets/sounds/ambria/combatmarins.mp3',
            'blocks' => [
                Content::narrative('ambria/logan/embarquement#combat_start'),
            ],
            'actions' => [
                Content::action('Suivant.', 'continue_fight'),
            ],
        ],
        'combat_end' => [
            'audio' => 'assets/sounds/ambria/combatmarins2.mp3',
            'blocks' => [
                Content::narrative('ambria/logan/embarquement#combat_end'),
                Content::dialogue('Sullivan', 'assets/img/ambria/sullivanmasonmini.png', 'ambria/logan/embarquement#combat_end_sullivan'),
                Content::narrative('ambria/logan/embarquement#combat_end_after_sullivan'),
                Content::dialogue('Sullivan', 'assets/img/ambria/sullivanmasonmini.png', 'ambria/logan/embarquement#combat_end_sullivan_2'),
            ],
            'actions' => [
                Content::action('Suivant.', 'board_ship'),
            ],
        ],
        'board_10' => $board('board_confidence_10'),
        'board_20' => $board('board_confidence_20'),
        'board_30' => $board('board_confidence_30'),
        'board_other' => $board('board_confidence_other'),
        'knots_intro' => [
            'audio' => 'assets/sounds/ambria/noeud.mp3',
            'blocks' => [
                Content::narrative('ambria/logan/embarquement#knots_intro'),
                Content::dialogue('Barthy', 'assets/img/ambria/barthy.png', 'ambria/logan/embarquement#knots_intro_barthy'),
                Content::narrative('ambria/logan/embarquement#knots_intro_after_barthy'),
            ],
            'actions' => [
                Content::action("L'écouter.", 'practice_knots'),
            ],
        ],
        'knots_game' => [
            'audio' => 'assets/sounds/ambria/noeud.mp3',
            'blocks' => [
                Content::dialogue('Barthy', 'assets/img/ambria/barthy.png', 'ambria/logan/embarquement#knots_game_barthy'),
                Content::partial('adventures/ambria/noeuds'),
            ],
            'actions' => [
                Content::action('Réinitialiser.', 'reset_knots'),
            ],
            'scripts' => [
                'assets/js/adventures/dragDropPuzzle.js',
                'assets/js/adventures/ambria/dragdropnoeud.js',
            ],
        ],
    ],
];
