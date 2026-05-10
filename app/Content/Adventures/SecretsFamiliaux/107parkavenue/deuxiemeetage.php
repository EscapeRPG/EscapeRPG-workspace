<?php

use App\Services\Adventures\Support\Content;

return [
    'variants' => [
        'step_0' => [
            'audio' => null,
            'blocks' => [
                Content::linkedImage(
                    'assets/img/secrets/pelldeuxieme.png',
                    'deuxième étage de la maison du docteur Pellington'
                ),
                Content::narrative('secretsfamiliaux/107parkavenue/deuxiemeetage#step_0'),
            ],
            'actions' => [
                Content::ask('Fouiller.', 'fouille', 'fouiller'),
            ],
        ],
        'recette' => [
            'audio' => null,
            'blocks' => [
                Content::narrative('secretsfamiliaux/107parkavenue/deuxiemeetage#recette_intro'),
                Content::linkedImage(
                    'assets/img/secrets/recette.png',
                    'une recette indiquant comment fabriquer un médicament'
                ),
                Content::narrative('secretsfamiliaux/107parkavenue/deuxiemeetage#recette_after'),
            ],
            'actions' => [
                Content::action("Ajouter à l'inventaire.", 'take_recette'),
            ],
        ],
        'unknown' => [
            'audio' => null,
            'blocks' => [
                Content::narrative('secretsfamiliaux/107parkavenue/deuxiemeetage#unknown'),
            ],
            'actions' => [
                Content::ask('Fouiller.', 'fouille', 'fouiller'),
            ],
        ],
        'done' => [
            'audio' => null,
            'blocks' => [
                Content::linkedImage(
                    'assets/img/secrets/pelldeuxieme.png',
                    'deuxième étage de la maison du docteur Pellington'
                ),
                Content::narrative('secretsfamiliaux/107parkavenue/deuxiemeetage#done'),
            ],
            'actions' => [],
        ],
    ],
];
