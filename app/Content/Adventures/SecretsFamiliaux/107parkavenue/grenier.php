<?php

use App\Services\Adventures\Support\Content;

return [
    'variants' => [
        'step_0' => [
            'audio' => null,
            'blocks' => [
                Content::linkedImage('assets/img/secrets/pellgrenier.png', 'le grenier du docteur Pellington'),
                Content::narrative('secretsfamiliaux/107parkavenue/grenier#step_0'),
            ],
            'actions' => [],
        ],
    ],
];
