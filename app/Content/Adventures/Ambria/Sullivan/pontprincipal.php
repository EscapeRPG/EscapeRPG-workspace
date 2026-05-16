<?php

use App\Services\Adventures\Support\Content;

$ask = [Content::ask('Demander.', 'ask', 'ask_ship')];

return [
    'variants' => [
        'entry' => [
            'audio' => 'assets/sounds/ambria/flots.mp3',
            'blocks' => [
                Content::narrative('ambria/sullivan/pontprincipal#entry'),
                Content::dialogue('Matelots', 'assets/img/ambria/matelots.png', 'ambria/sullivan/pontprincipal#crew_entry'),
            ],
            'actions' => $ask,
        ],
        'ask_logan' => [
            'blocks' => [
                Content::dialogue('Matelots', 'assets/img/ambria/matelots.png', 'ambria/sullivan/pontprincipal#ask_logan'),
            ],
            'actions' => $ask,
        ],
        'ask_jake' => [
            'blocks' => [
                Content::dialogue('Matelots', 'assets/img/ambria/matelots.png', 'ambria/sullivan/pontprincipal#ask_jake'),
            ],
            'actions' => $ask,
        ],
        'ask_unknown' => [
            'blocks' => [
                Content::dialogue('Matelots', 'assets/img/ambria/matelots.png', 'ambria/sullivan/pontprincipal#ask_unknown'),
            ],
            'actions' => $ask,
        ],
    ],
];
