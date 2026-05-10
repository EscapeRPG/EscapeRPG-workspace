<?php

use App\Services\Adventures\Support\Content;

return [
    'variants' => [
        'step_0' => [
            'audio' => null,
            'blocks' => [
                Content::linkedImage(
                    'assets/img/secrets/pellpremier.png',
                    'premier étage de la maison du docteur Pellington'
                ),
                Content::narrative('secretsfamiliaux/107parkavenue/premieretage#step_0'),
            ],
            'actions' => [],
        ],
    ],
];
