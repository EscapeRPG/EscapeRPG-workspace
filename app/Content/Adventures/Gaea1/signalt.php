<?php

use App\Services\Adventures\Support\Content;

return [
    'variants' => [
        'entry' => [
            'blocks' => [
                Content::narrative('gaea1/signalt#entry'),
            ],
            'actions' => [
                Content::action('traiter le signal.', 'treat_signal'),
            ],
        ],
        'treatment' => [
            'blocks' => [
                Content::partial('adventures/gaea1/traitement'),
                Content::narrative('gaea1/signalt#treatment'),
            ],
            'scripts' => ['assets/js/adventures/gaea1/traitement.js'],
            'hint' => Content::hint('gaea1/hints#treatment'),
        ],
        'failure' => [
            'blocks' => [
                Content::narrative('gaea1/signalt#failure'),
            ],
            'actions' => [
                Content::action('réessayer.', 'retry_treatment'),
            ],
        ],
        'success' => [
            'blocks' => [
                Content::narrative('gaea1/signalt#success_intro'),
                Content::overlayDialogue('{{pjfullname}}', 'assets/img/gaea1/avatar/fond.png', 'avatarHtml', 'gaea1/signalt#success_player_translate', 'right'),
                Content::dialogue('M.A.R-V', 'assets/img/gaea1/marv.png', 'gaea1/signalt#success_marv_language'),
                Content::narrative('gaea1/signalt#success_frustration'),
                Content::overlayDialogue('{{pjfullname}}', 'assets/img/gaea1/avatar/fond.png', 'avatarHtml', 'gaea1/signalt#success_player_luck', 'right'),
                Content::dialogue('M.A.R-V', 'assets/img/gaea1/marv.png', 'gaea1/signalt#success_marv_distress'),
                Content::overlayDialogue('{{pjfullname}}', 'assets/img/gaea1/avatar/fond.png', 'avatarHtml', 'gaea1/signalt#success_player_course', 'right'),
                Content::dialogue('M.A.R-V', 'assets/img/gaea1/marv.png', 'gaea1/signalt#success_marv_course'),
                Content::overlayDialogue('{{pjfullname}}', 'assets/img/gaea1/avatar/fond.png', 'avatarHtml', 'gaea1/signalt#success_player_wait', 'right'),
                Content::narrative('gaea1/signalt#success_departure'),
            ],
            'actions' => [
                Content::action('patienter jusqu\'à l\'arrivée.', 'continue_arrival'),
            ],
        ],
    ],
];
