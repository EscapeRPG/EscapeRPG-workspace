<?php

use App\Services\Adventures\Support\Content;

$gaspard = 'assets/img/secrets/gaspard.png';

return [
    'variants' => [
        'step_0' => [
            'audio' => 'assets/sounds/secrets/chiensdehors.mp3',
            'blocks' => [
                Content::narrative('secretsfamiliaux/manoir/jour2#step_0'),
            ],
            'actions' => [
                Content::action('Suivant.', 'suivant'),
            ],
        ],
        'step_1' => [
            'audio' => null,
            'blocks' => [
                Content::dialogue('Gaspard', $gaspard, 'secretsfamiliaux/manoir/jour2#step_1_gaspard'),
            ],
            'actions' => [
                Content::ask('Interroger.', 'nuit', 'interroger'),
                Content::action('Retourner dormir.', 'dormir2'),
            ],
        ],
        'step_6' => [
            'audio' => null,
            'blocks' => [
                Content::dialogue('Gaspard', $gaspard, 'secretsfamiliaux/manoir/jour2#step_6_gaspard'),
            ],
            'actions' => [
                Content::ask('Interroger.', 'nuit', 'interroger'),
                Content::action('Retourner dormir.', 'dormir2'),
            ],
        ],
        'step_7' => [
            'audio' => null,
            'blocks' => [
                Content::dialogue('Gaspard', $gaspard, 'secretsfamiliaux/manoir/jour2#step_7_gaspard'),
            ],
            'actions' => [
                Content::action('Enquêter.', 'enqueter'),
            ],
        ],
        'step_8' => [
            'audio' => null,
            'blocks' => [
                Content::dialogue('Gaspard', $gaspard, 'secretsfamiliaux/manoir/jour2#step_8_gaspard'),
            ],
            'actions' => [],
        ],
        'step_2' => [
            'audio' => null,
            'blocks' => [
                Content::narrative('secretsfamiliaux/manoir/jour2#step_2'),
            ],
            'actions' => [
                Content::action('Retourner dormir.', 'dormir2'),
            ],
        ],
        'step_3' => [
            'audio' => 'assets/sounds/secrets/chiensdehors.mp3',
            'blocks' => [
                Content::narrative('secretsfamiliaux/manoir/jour2#step_3'),
            ],
            'actions' => [
                Content::action('Suivant.', 'suivant2'),
            ],
        ],
        'step_4' => [
            'audio' => null,
            'blocks' => [
                Content::narrative('secretsfamiliaux/manoir/jour2#step_4'),
            ],
            'actions' => [
                Content::action('Suivant.', 'suivant3'),
            ],
        ],
        'step_5' => [
            'audio' => null,
            'blocks' => [
                Content::interactiveImage(
                    'assets/img/secrets/salleamanger.png',
                    'salle à manger',
                    [
                        Content::hotspot(
                            'fenetre',
                            'fenetreopened',
                            'assets/img/secrets/buttonfenetre.png',
                            'la fenêtre de la salle à manger'
                        ),
                    ]
                ),
                Content::narrative('secretsfamiliaux/manoir/jour2#step_5'),
            ],
            'actions' => [],
        ],
    ],
];
