<?php

use App\Services\Adventures\Support\Content;

$ask = [Content::ask('Demander.', 'ask', 'ask_ship')];

return [
    'variants' => [
        'entry' => [
            'audio' => 'assets/sounds/ambria/flots.mp3',
            'blocks' => [
                Content::narrative('ambria/sullivan/dunette#entry'),
                Content::dialogue('Timonier', 'assets/img/ambria/timonier.png', 'ambria/sullivan/dunette#timonier_entry'),
            ],
            'actions' => $ask,
        ],
        'ask_logan' => [
            'blocks' => [
                Content::dialogue('Timonier', 'assets/img/ambria/timonier.png', 'ambria/sullivan/dunette#ask_logan'),
            ],
            'actions' => $ask,
        ],
        'ask_jake' => [
            'blocks' => [
                Content::dialogue('Timonier', 'assets/img/ambria/timonier.png', 'ambria/sullivan/dunette#ask_jake'),
            ],
            'actions' => $ask,
        ],
        'ask_unknown' => [
            'blocks' => [
                Content::dialogue('Timonier', 'assets/img/ambria/timonier.png', 'ambria/sullivan/dunette#ask_unknown'),
            ],
            'actions' => $ask,
        ],
    ],
];
