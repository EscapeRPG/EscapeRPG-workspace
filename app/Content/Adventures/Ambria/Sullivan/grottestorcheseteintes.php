<?php

use App\Services\Adventures\Support\Content;

return [
    'variants' => [
        'entry' => [
            'audio' => 'assets/sounds/ambria/grotte.mp3',
            'blocks' => [
                Content::image('assets/img/ambria/grottestorcheseteintes.png', 'Grotte aux torches éteintes.', 'enigmelieu'),
                Content::narrative('ambria/sullivan/grottes#torches_eteintes'),
            ],
            'actions' => [],
            'hint' => Content::hint('ambria/sullivan/hints#mousse'),
        ],
    ],
];
