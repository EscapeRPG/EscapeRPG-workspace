<?php

use App\Services\Adventures\Support\Content;

return [
    'variants' => [
        'step_0' => [
            'audio' => null,
            'blocks' => [
                Content::linkedImage('assets/img/secrets/rdc.png', 'rez-de-chaussée'),
                Content::narrative('secretsfamiliaux/manoir/rdc#step_0'),
            ],
            'actions' => [],
        ],
        'after_pellington' => [
            'audio' => null,
            'blocks' => [
                Content::linkedImage('assets/img/secrets/rdc.png', 'rez-de-chaussée'),
                Content::narrative('secretsfamiliaux/manoir/rdc#after_pellington'),
            ],
            'actions' => [],
        ],
    ],
];
