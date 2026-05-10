<?php

use App\Services\Adventures\Support\Content;

$returnToManor = [
    Content::action('Retour au manoir.', 'return_manor'),
];

return [
    'variants' => [
        'step_0' => [
            'audio' => null,
            'blocks' => [
                Content::linkedImage('assets/img/secrets/pellcave.png', 'cave du docteur Pellington'),
                Content::narrative('secretsfamiliaux/107parkavenue/cave#step_0_intro'),
                Content::linkedImage('assets/img/secrets/aveux.png', 'les aveux du docteur Pellington'),
                Content::narrative('secretsfamiliaux/107parkavenue/cave#step_0_after'),
            ],
            'actions' => [
                Content::action("Ajouter à l'inventaire.", 'take_aveux'),
            ],
        ],
        'piece' => [
            'audio' => null,
            'blocks' => [
                Content::narrative('secretsfamiliaux/107parkavenue/cave#piece'),
                Content::linkedImage('assets/img/secrets/se.png', 'pièce avec un serpent'),
            ],
            'actions' => [
                Content::action("Ajouter à l'inventaire.", 'take_piece'),
            ],
        ],
        'finished' => [
            'audio' => null,
            'blocks' => [
                Content::narrative('secretsfamiliaux/107parkavenue/cave#finished'),
            ],
            'actions' => $returnToManor,
        ],
        'done' => [
            'audio' => null,
            'blocks' => [
                Content::narrative('secretsfamiliaux/107parkavenue/cave#finished'),
            ],
            'actions' => $returnToManor,
        ],
    ],
];
