<?php

use App\Services\Adventures\Support\Content;

$vestibuleImage = Content::interactiveImage(
    'assets/img/secrets/vestibule.png',
    'le vestibule du docteur Pellington',
    [],
    'enigmelieu',
    [
        'controls' => [
            Content::hotspot(
                'vest',
                'veste',
                'assets/img/secrets/veste.png',
                'la veste du docteur Pellington',
                ['visible_if' => Content::stateFalsy('pellington_veste_searched')]
            ),
        ],
    ]
);
$searchAction = Content::ask('Fouiller.', 'fouille', 'fouiller');

return [
    'variants' => [
        'step_0' => [
            'audio' => null,
            'blocks' => [
                $vestibuleImage,
                Content::narrative('secretsfamiliaux/107parkavenue/vestibule#step_0'),
            ],
            'actions' => [
                $searchAction,
            ],
        ],
        'flacon' => [
            'audio' => null,
            'blocks' => [
                Content::linkedImage('assets/img/secrets/flacon.png', 'un flacon de barbiturique vide'),
                Content::narrative('secretsfamiliaux/107parkavenue/vestibule#flacon'),
            ],
            'actions' => [
                Content::action("Ajouter à l'inventaire.", 'take_flacon'),
            ],
        ],
        'flacon_acquired' => [
            'audio' => null,
            'blocks' => [
                $vestibuleImage,
                Content::narrative('secretsfamiliaux/107parkavenue/vestibule#flacon_acquired'),
            ],
            'actions' => [
                $searchAction,
            ],
        ],
        'footprints' => [
            'audio' => null,
            'blocks' => [
                $vestibuleImage,
                Content::narrative('secretsfamiliaux/107parkavenue/vestibule#footprints'),
            ],
            'actions' => [
                Content::action('Retour.', 'retour'),
            ],
        ],
        'unknown' => [
            'audio' => null,
            'blocks' => [
                $vestibuleImage,
                Content::narrative('secretsfamiliaux/107parkavenue/vestibule#unknown'),
            ],
            'actions' => [
                $searchAction,
            ],
        ],
        'done' => [
            'audio' => null,
            'blocks' => [
                Content::image('assets/img/secrets/vestibule.png', 'le vestibule du docteur Pellington', 'enigmelieu'),
                Content::narrative('secretsfamiliaux/107parkavenue/vestibule#done'),
            ],
            'actions' => [],
        ],
    ],
];
