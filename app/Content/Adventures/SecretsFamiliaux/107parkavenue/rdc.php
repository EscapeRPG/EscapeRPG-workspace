<?php

use App\Services\Adventures\Support\Content;

return [
    'variants' => [
        'step_0' => [
            'audio' => null,
            'blocks' => [
                Content::linkedImage(
                    'assets/img/secrets/pellrdc.png',
                    'rez-de-chaussée de la maison du docteur Pellington'
                ),
                Content::narrative('secretsfamiliaux/107parkavenue/rdc#step_0'),
            ],
            'actions' => [],
        ],
    ],
];
