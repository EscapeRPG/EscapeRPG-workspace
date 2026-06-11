<?php

use App\Services\Adventures\Support\Content;

return [
    'variants' => [
        'night' => [
            'audio' => null,
            'blocks' => [
                Content::image('assets/img/secrets/vuegreniernuit.png', 'grenier', 'enigmelieu'),
                Content::narrative('secretsfamiliaux/manoir/grenier#night'),
            ],
            'actions' => [],
        ],
        'step_0' => [
            'audio' => null,
            'blocks' => [
                Content::interactiveImage(
                    'assets/img/secrets/vuegrenier.png',
                    'grenier',
                    [
                        Content::hotspotAt('piano', 37.2, 54.75, 23.8, 7.5, 'assets/img/secrets/pianoclosed.png', 'un vieux piano'),
                    ],
                ),
                Content::narrative('secretsfamiliaux/manoir/grenier#step_0'),
            ],
            'actions' => [],
        ],
        'piano' => [
            'audio' => null,
            'blocks' => [
                Content::interactiveImage(
                    'assets/img/secrets/vuegrenier.png',
                    'grenier',
                    [
                        Content::hotspotAt('piece', 56.8, 55, 1.2, 1, 'assets/img/secrets/grenierpiece.png', 'une pièce sur le clavier'),
                    ],
                ),
                Content::narrative('secretsfamiliaux/manoir/grenier#piano'),
            ],
            'actions' => [],
        ],
        'step_1' => [
            'audio' => null,
            'blocks' => [
                Content::linkedImage('assets/img/secrets/ev.png', 'pièce avec une tête de femme'),
                Content::narrative('secretsfamiliaux/manoir/grenier#step_1'),
            ],
            'actions' => [
                Content::action("Ajouter à l'inventaire.", 'take_piece'),
            ],
        ],
        'step_2' => [
            'audio' => null,
            'blocks' => [
                Content::narrative('secretsfamiliaux/manoir/grenier#step_2'),
            ],
            'actions' => [
                Content::action('Retour.', 'retour'),
            ],
        ],
        'done' => [
            'audio' => null,
            'blocks' => [
                Content::image('assets/img/secrets/vuegrenier.png', 'grenier', 'enigmelieu'),
                Content::narrative('secretsfamiliaux/manoir/grenier#done'),
            ],
            'actions' => [],
        ],
    ],
];
