<?php

use App\Services\Adventures\Support\Content;

return [
    'variants' => [
        'step_0' => [
            'audio' => null,
            'blocks' => [
                Content::narrative('secretsfamiliaux/manoir/salon#step_0'),
            ],
            'actions' => [
                Content::ask('Chercher.', 'salon', 'chercher'),
            ],
        ],
        'step_1' => [
            'audio' => null,
            'blocks' => [
                Content::narrative('secretsfamiliaux/manoir/salon#step_1'),
            ],
            'actions' => [
                Content::ask('Chercher.', 'salon', 'chercher'),
            ],
        ],
        'step_2' => [
            'audio' => null,
            'blocks' => [
                Content::narrative('secretsfamiliaux/manoir/salon#step_2_intro'),
                Content::dialogue('Téona', 'assets/img/secrets/teona.png', 'secretsfamiliaux/manoir/salon#step_2_teona'),
            ],
            'actions' => [
                Content::action('Continuer.', 'finish_tableau'),
            ],
        ],
        'found_after' => [
            'audio' => null,
            'blocks' => [
                Content::narrative('secretsfamiliaux/manoir/salon#found_after'),
            ],
            'actions' => [],
        ],
    ],
];
