<?php

use App\Services\Adventures\Support\Content;

return [
    'variants' => [
        'step_0' => [
            'audio' => null,
            'blocks' => [
                Content::linkedImage('assets/img/secrets/rdc.png', 'rez-de-chaussée'),
                Content::narrative('secretsfamiliaux/manoirint#step_0_intro'),
                Content::dialogue('Monica', 'assets/img/secrets/monica.png', 'secretsfamiliaux/manoirint#step_0_monica'),
            ],
            'actions' => [
                Content::action('Suivant.', 'suivant'),
            ],
        ],
        'step_1' => [
            'audio' => null,
            'blocks' => [
                Content::narrative('secretsfamiliaux/manoirint#step_1'),
            ],
            'actions' => [
                Content::action('Faire un tour.', 'tour'),
                Content::action('Aller dormir.', 'dormir'),
            ],
        ],
    ],
];
