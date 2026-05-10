<?php

use App\Services\Adventures\Support\Content;

return [
    'variants' => [
        'step_0' => [
            'audio' => null,
            'blocks' => [
                Content::narrative('secretsfamiliaux/manoir/courtcircuit#step_0'),
            ],
            'actions' => [
                Content::action('Suivant.', 'start_puzzle'),
            ],
        ],
        'step_1' => [
            'audio' => null,
            'blocks' => [
                Content::narrative('secretsfamiliaux/manoir/courtcircuit#step_1'),
            ],
            'actions' => [
                Content::action('Réinitialiser.', 'reset_circuit'),
            ],
            'scripts' => [
                'assets/js/adventures/dragDropPuzzle.js',
                'assets/js/adventures/secrets_familiaux/dragdropelec.js',
            ],
        ],
        'step_2' => [
            'audio' => null,
            'blocks' => [
                Content::narrative('secretsfamiliaux/manoir/courtcircuit#step_2'),
            ],
            'actions' => [
                Content::action('Retour.', 'retour'),
            ],
        ],
    ],
];
