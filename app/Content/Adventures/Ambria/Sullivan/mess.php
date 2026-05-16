<?php

use App\Services\Adventures\Support\Content;

$ask = [Content::ask('Demander.', 'ask', 'ask_ship')];

return [
    'variants' => [
        'entry' => [
            'audio' => 'assets/sounds/ambria/mess.mp3',
            'blocks' => [
                Content::narrative('ambria/sullivan/mess#entry'),
            ],
            'actions' => $ask,
        ],
        'ask_logan' => [
            'blocks' => [
                Content::narrative('ambria/sullivan/mess#ask_logan'),
            ],
            'actions' => $ask,
        ],
        'ask_jake' => [
            'blocks' => [
                Content::narrative('ambria/sullivan/mess#ask_jake'),
            ],
            'actions' => $ask,
        ],
        'ask_unknown' => [
            'blocks' => [
                Content::narrative('ambria/sullivan/mess#ask_unknown'),
            ],
            'actions' => $ask,
        ],
    ],
];
