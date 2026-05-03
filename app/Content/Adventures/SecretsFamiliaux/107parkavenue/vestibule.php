<?php

$vestibuleImage = [
    'type' => 'interactive_image',
    'src' => 'assets/img/secrets/vestibule.png',
    'alt' => 'le vestibule du docteur Pellington',
    'class' => 'enigmelieu',
    'controls' => [
        [
            'id' => 'vest',
            'src' => 'assets/img/secrets/veste.png',
            'alt' => 'la veste du docteur Pellington',
            'value' => 'veste',
            'visible_if' => ['state' => 'pellington_veste_searched', 'falsy' => true],
        ],
    ],
];
$searchAction = ['label' => 'Fouiller.', 'name' => 'fouille', 'value' => 'fouiller', 'class' => 'ask'];

return [
    'variants' => [
        'step_0' => [
            'audio' => null,
            'blocks' => [
                $vestibuleImage,
                ['type' => 'paragraphs', 'paragraphs' => [
                    "L'entrée de la maison du docteur Pellington se compose d'un vestibule assez grand où l'homme et ses patients peuvent déposer leurs affaires en arrivant.",
                ]],
            ],
            'actions' => [
                $searchAction,
            ],
        ],
        'flacon' => [
            'audio' => null,
            'blocks' => [
                ['type' => 'linked_image', 'src' => 'assets/img/secrets/flacon.png', 'alt' => 'un flacon de barbiturique vide', 'class' => 'enigme'],
                ['type' => 'paragraphs', 'paragraphs' => [
                    "La veste du docteur est accrochée sur un porte-manteau.",
                    "Lorsque vous la fouillez, vous trouvez dans une poche un petit flacon. Sur l'étiquette, il est inscrit <span class=\"mdp\">barbiturique</span>. La bouteille est vide, ce qui indique que le docteur a dû en utiliser récemment.",
                ]],
            ],
            'actions' => [
                ['label' => "Ajouter à l'inventaire.", 'name' => 'action', 'value' => 'take_flacon', 'class' => 'action'],
            ],
        ],
        'flacon_acquired' => [
            'audio' => null,
            'blocks' => [
                $vestibuleImage,
                ['type' => 'paragraphs', 'paragraphs' => [
                    "Il semblerait que vous ayez trouvé tout ce qu'il y avait d'utile dans la veste du docteur.",
                ]],
            ],
            'actions' => [
                $searchAction,
            ],
        ],
        'footprints' => [
            'audio' => null,
            'blocks' => [
                $vestibuleImage,
                ['type' => 'paragraphs', 'paragraphs' => [
                    "En regardant de plus près la paire de chaussures rangée au pied du porte-manteau, vous constatez qu'elles sont pleines de boue et de taille 40, ce qui confirme que c'était bien le docteur qui rôdait autour de la maison depuis tout ce temps.",
                ]],
            ],
            'actions' => [
                ['label' => 'Retour.', 'name' => 'action', 'value' => 'retour', 'class' => 'action'],
            ],
        ],
        'unknown' => [
            'audio' => null,
            'blocks' => [
                $vestibuleImage,
                ['type' => 'paragraphs', 'paragraphs' => [
                    "Vous ne semblez pas trouver quoi que ce soit d'utile en rapport avec ceci.",
                ]],
            ],
            'actions' => [
                $searchAction,
            ],
        ],
        'done' => [
            'audio' => null,
            'blocks' => [
                ['type' => 'image', 'src' => 'assets/img/secrets/vestibule.png', 'alt' => 'le vestibule du docteur Pellington', 'class' => 'enigmelieu'],
                ['type' => 'paragraphs', 'paragraphs' => [
                    "Il semblerait que vous ayez trouvé tout ce qu'il y avait d'utile dans le vestibule.",
                ]],
            ],
            'actions' => [],
        ],
    ],
];
