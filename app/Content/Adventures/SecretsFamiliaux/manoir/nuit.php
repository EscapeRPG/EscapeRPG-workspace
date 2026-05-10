<?php

use App\Services\Adventures\Support\Content;

return [
    'variants' => [
        'step_0' => [
            'audio' => 'assets/sounds/secrets/bruitviolent.mp3',
            'blocks' => [
                Content::narrative('secretsfamiliaux/manoir/nuit#step_0'),
            ],
            'actions' => [
                Content::action('Suivant.', 'suivant'),
            ],
        ],
        'step_1' => [
            'audio' => 'assets/sounds/secrets/voiturepart.mp3',
            'blocks' => [
                Content::narrative('secretsfamiliaux/manoir/nuit#step_1'),
            ],
            'actions' => [
                Content::action('Suivant.', 'suivant2'),
            ],
        ],
        'step_2' => [
            'audio' => null,
            'blocks' => [
                Content::narrative('secretsfamiliaux/manoir/nuit#step_2_intro'),
                Content::image('assets/img/secrets/po.png', 'pièce avec une pomme'),
                Content::narrative('secretsfamiliaux/manoir/nuit#step_2_after'),
            ],
            'actions' => [
                Content::action('Suivant.', 'suivant3'),
            ],
        ],
        'step_3' => [
            'audio' => null,
            'blocks' => [
                Content::narrative('secretsfamiliaux/manoir/nuit#step_3'),
            ],
            'actions' => [
                Content::action('Attendre le matin.', 'attendre'),
            ],
        ],
    ],
];
