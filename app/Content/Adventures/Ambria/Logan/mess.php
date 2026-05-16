<?php

use App\Services\Adventures\Support\Content;

return [
    'variants' => [
        'default' => [
            'audio' => 'assets/sounds/ambria/mess.mp3',
            'blocks' => [Content::narrative('ambria/logan/mess#default')],
            'actions' => [],
        ],
        'request_food' => [
            'audio' => 'assets/sounds/ambria/mess.mp3',
            'blocks' => [
                Content::narrative('ambria/logan/mess#request_food'),
                Content::dialogue('Don', 'assets/img/ambria/don.png', 'ambria/logan/mess#don'),
                Content::narrative('ambria/logan/mess#after_don'),
                Content::dialogue('Logan', 'assets/img/ambria/loganbarthelemymini.png', 'ambria/logan/mess#logan', 'right'),
                Content::dialogue('Don', 'assets/img/ambria/don.png', 'ambria/logan/mess#don_2'),
                Content::narrative('ambria/logan/mess#food'),
            ],
            'actions' => [Content::action('Prendre et partir.', 'take_victuals')],
        ],
        'taken' => [
            'blocks' => [Content::narrative('ambria/logan/mess#taken')],
            'actions' => [],
        ],
    ],
];
