<?php

use App\Services\Adventures\Support\Content;

return [
    'label' => 'Le signal',
    'flow' => [
        'default' => 'entry',
        'actions' => [
            'show_alert' => [
                'variant' => 'alert',
            ],
            'calibrate' => [
                'variant' => 'calibration',
                'state' => [
                    'scan' => true,
                ],
            ],
        ],
    ],
    'variants' => [
        'entry' => [
            'audio' => 'assets/sounds/gaea1/marvmusic.mp3',
            'blocks' => [
                Content::dialogue('M.A.R-V', 'assets/img/gaea1/marv.png', 'gaea1/scenes/signal/text#entry_marv_wake'),
                Content::narrative('gaea1/scenes/signal/text#entry_intro'),
                Content::overlayDialogue('{{pjfullname}}', 'assets/img/gaea1/avatar/fond.png', 'avatarHtml', 'gaea1/scenes/signal/text#entry_player_display', 'right'),
                Content::dialogue('M.A.R-V', 'assets/img/gaea1/marv.png', 'gaea1/scenes/signal/text#entry_marv_orders'),
            ],
            'actions' => [
                Content::action('suivant.', 'show_alert'),
            ],
        ],
        'alert' => [
            'blocks' => [
                Content::narrative('gaea1/scenes/signal/text#alert_intro'),
                Content::overlayDialogue('{{pjfullname}}', 'assets/img/gaea1/avatar/fond.png', 'avatarHtml', 'gaea1/scenes/signal/text#alert_player_fullscreen', 'right'),
                Content::dialogue('M.A.R-V', 'assets/img/gaea1/marv.png', 'gaea1/scenes/signal/text#alert_marv'),
                Content::narrative('gaea1/scenes/signal/text#alert_turn'),
            ],
            'actions' => [
                Content::action('calibrer l\'antenne.', 'calibrate'),
            ],
        ],
        'calibration' => [
            'blocks' => [
                Content::partial('adventures/gaea1/scan'),
                Content::narrative('gaea1/scenes/signal/text#calibration'),
            ],
            'scripts' => ['assets/js/adventures/gaea1/scanzoom.js'],
            'hint' => Content::hint('gaea1/hints#scan'),
        ],
    ],
];
