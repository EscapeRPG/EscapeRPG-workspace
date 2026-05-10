<?php

use App\Services\Adventures\Support\Content;

return [
    'variants' => [
        'step_0' => [
            'audio' => null,
            'blocks' => [
                Content::narrative('secretsfamiliaux/107parkavenue#step_0'),
            ],
            'actions' => [
                Content::action('Suivant.', 'suivant'),
            ],
        ],
        'step_1' => [
            'audio' => null,
            'blocks' => [
                Content::narrative('secretsfamiliaux/107parkavenue#step_1'),
            ],
            'actions' => [
                Content::action('Suivant.', 'suivant2'),
            ],
        ],
        'step_2' => [
            'audio' => null,
            'blocks' => [
                Content::linkedImage('assets/img/secrets/pellrdc.png', 'rez-de-chaussée'),
                Content::narrative('secretsfamiliaux/107parkavenue#step_2'),
            ],
            'actions' => [
                Content::action('Faire le tour.', 'tour'),
            ],
        ],
    ],
];
