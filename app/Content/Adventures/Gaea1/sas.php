<?php

use App\Services\Adventures\Support\Content;

return [
    'variants' => [
        'arrival' => [
            'audio' => 'assets/sounds/gaea1/softalarm.mp3',
            'blocks' => [
                Content::narrative('gaea1/sas#arrival_alarm'),
                Content::dialogue('M.A.R-V', 'assets/img/gaea1/marv.png', 'gaea1/sas#arrival_marv'),
                Content::narrative('gaea1/sas#arrival_station_view'),
                Content::overlayDialogue('{{pjfullname}}', 'assets/img/gaea1/avatar/fond.png', 'avatarHtml', 'gaea1/sas#arrival_player_message', 'right'),
            ],
            'actions' => [
                Content::action('suivant.', 'continue_arrival'),
            ],
        ],
        'station_view' => [
            'audio' => 'assets/sounds/gaea1/station.mp3',
            'blocks' => [
                Content::dialogue('M.A.R-V', 'assets/img/gaea1/marv.png', 'gaea1/sas#station_view_marv_status'),
                Content::narrative('gaea1/sas#station_view_reflection'),
                Content::dialogue('M.A.R-V', 'assets/img/gaea1/marv.png', 'gaea1/sas#station_view_marv_call'),
                Content::overlayDialogue('{{pjfullname}}', 'assets/img/gaea1/avatar/fond.png', 'avatarHtml', 'gaea1/sas#station_view_player_dock', 'right'),
                Content::dialogue('M.A.R-V', 'assets/img/gaea1/marv.png', 'gaea1/sas#station_view_marv_received'),
                Content::narrative('gaea1/sas#station_view_station_name'),
            ],
            'actions' => [
                Content::action('suivant.', 'approach_hangar'),
            ],
        ],
        'approach_hangar' => [
            'blocks' => [
                Content::narrative('gaea1/sas#approach_hangar_intro'),
                Content::dialogue('M.A.R-V', 'assets/img/gaea1/marv.png', 'gaea1/sas#approach_hangar_marv_status'),
                Content::overlayDialogue('{{pjfullname}}', 'assets/img/gaea1/avatar/fond.png', 'avatarHtml', 'gaea1/sas#approach_hangar_player_controls', 'right'),
            ],
            'actions' => [
                Content::action('suivant.', 'open_hangar'),
            ],
        ],
        'open_hangar' => [
            'blocks' => [
                Content::partial('adventures/gaea1/hangar_sas'),
                Content::narrative('gaea1/sas#open_hangar_instructions'),
            ],
            'scripts' => ['assets/js/adventures/gaea1/hangarsas.js'],
            'hint' => Content::hint('gaea1/hints#hangar_sas'),
        ],
    ],
];
