<?php

use App\Services\Adventures\Support\Content;

return [
    'variants' => [
        'step_0' => [
            'audio' => null,
            'blocks' => [
                Content::linkedImage('assets/img/secrets/etage.png', 'étage'),
                Content::narrative('secretsfamiliaux/manoir/etage#step_0'),
            ],
            'actions' => [],
        ],
    ],
];
