<?php

$pharmacyForm = [
    'type' => 'interactive_image',
    'id' => 'armoireapharmacie',
    'src' => 'assets/img/secrets/armoireapharmacie.png',
    'alt' => "l'armoire à pharmacie du docteur Pellington",
    'class' => 'enigmelieu',
    'controls' => [
        ['element' => 'input', 'type' => 'number', 'name' => '1', 'class' => 'hg', 'value' => 0, 'required' => true],
        ['element' => 'input', 'type' => 'number', 'name' => '2', 'class' => 'hm', 'value' => 0, 'required' => true],
        ['element' => 'input', 'type' => 'number', 'name' => '3', 'class' => 'hd', 'value' => 0, 'required' => true],
        ['element' => 'input', 'type' => 'number', 'name' => '4', 'class' => 'mg', 'value' => 0, 'required' => true],
        ['element' => 'input', 'type' => 'number', 'name' => '5', 'class' => 'mm', 'value' => 0, 'required' => true],
        ['element' => 'input', 'type' => 'number', 'name' => '6', 'class' => 'md', 'value' => 0, 'required' => true],
        ['element' => 'input', 'type' => 'number', 'name' => '7', 'class' => 'bg', 'value' => 0, 'required' => true],
        ['element' => 'input', 'type' => 'number', 'name' => '8', 'class' => 'bm', 'value' => 0, 'required' => true],
        ['element' => 'input', 'type' => 'number', 'name' => '9', 'class' => 'bd', 'value' => 0, 'required' => true],
        ['element' => 'button', 'type' => 'submit', 'label' => 'Mélanger.', 'name' => 'action', 'value' => 'melanger', 'class' => 'action'],
    ],
];

return [
    'variants' => [
        'step_0' => [
            'audio' => null,
            'blocks' => [
                [
                    'type' => 'interactive_image',
                    'src' => 'assets/img/secrets/sdb.png',
                    'alt' => 'la salle de bain du docteur Pellington',
                    'class' => 'enigmelieu',
                    'hotspots' => [
                        [
                            'id' => 'armoire',
                            'src' => 'assets/img/secrets/armoirepharm.png',
                            'src_options' => [
                                ['if' => ['state' => 'pellington_armoire_opened', 'truthy' => true], 'src' => 'assets/img/secrets/armoirepharmopened.png'],
                            ],
                            'alt' => "l'armoire à pharmacie du docteur Pellington",
                            'value' => 'open_armoire',
                        ],
                    ],
                ],
                [
                    'type' => 'paragraphs',
                    'paragraphs' => [
                        "Une salle de bain plutôt ordinaire, vous semble-t-il.",
                        "Pensez-vous pouvoir y trouver quoi que ce soit d'utile ?",
                    ],
                ],
            ],
            'actions' => [],
        ],
        'opened' => [
            'audio' => null,
            'blocks' => [
                [
                    'type' => 'interactive_image',
                    'src' => 'assets/img/secrets/sdbarmoireopened.png',
                    'alt' => 'la salle de bain du docteur Pellington',
                    'class' => 'enigmelieu',
                    'hotspots' => [
                        [
                            'id' => 'armoireopened',
                            'src' => 'assets/img/secrets/armoirepharmopened.png',
                            'alt' => "l'armoire à pharmacie du docteur Pellington",
                            'value' => 'open_armoire',
                        ],
                    ],
                ],
                [
                    'type' => 'paragraphs',
                    'paragraphs' => [
                        "Une salle de bain plutôt ordinaire, vous semble-t-il.",
                        "Pensez-vous pouvoir faire quelque chose avec les flacons de l'armoire à pharmacie ?",
                    ],
                ],
            ],
            'actions' => [],
        ],
        'armoire' => [
            'audio' => null,
            'blocks' => [
                [
                    'type' => 'paragraphs',
                    'paragraphs' => [
                        "L'armoire à pharmacie contient de nombreux flacons de divers produits médicaux.",
                        "Sans connaître de formule, il pourrait être dangereux de les mélanger.",
                    ],
                ],
                $pharmacyForm,
            ],
            'actions' => [
                ['label' => 'Retour.', 'name' => 'action', 'value' => 'retour', 'class' => 'action'],
            ],
        ],
        'failed' => [
            'audio' => null,
            'blocks' => [
                ['type' => 'paragraphs', 'paragraphs' => [
                    "Il semblerait que cela n'ait pas fonctionné.",
                ]],
                $pharmacyForm,
            ],
            'actions' => [
                ['label' => 'Retour.', 'name' => 'action', 'value' => 'retour', 'class' => 'action'],
            ],
        ],
        'success' => [
            'audio' => 'assets/sounds/secrets/melange.mp3',
            'blocks' => [
                ['type' => 'linked_image', 'src' => 'assets/img/secrets/analeptique.png', 'alt' => 'un analeptique pour guérir les chiens empoisonnés', 'class' => 'enigme'],
                ['type' => 'paragraphs', 'paragraphs' => [
                    "Vous avez réussi à synthétiser correctement un antidote pour soigner les chiens !",
                    "Il s'agit d'un <span class=\"mdp\">analeptique</span> que vous prenez avec vous.",
                ]],
            ],
            'actions' => [
                ['label' => "Ajouter à l'inventaire.", 'name' => 'action', 'value' => 'take_analeptique', 'class' => 'action'],
            ],
        ],
        'acquired' => [
            'audio' => null,
            'blocks' => [
                ['type' => 'paragraphs', 'paragraphs' => [
                    "Il semblerait que vous n'ayez plus rien à trouver par ici.",
                ]],
            ],
            'actions' => [
                ['label' => 'Retour.', 'name' => 'action', 'value' => 'retour', 'class' => 'action'],
            ],
        ],
        'done' => [
            'audio' => null,
            'blocks' => [
                ['type' => 'image', 'src' => 'assets/img/secrets/sdbarmoireopened.png', 'alt' => 'la salle de bain du docteur Pellington', 'class' => 'enigmelieu'],
                ['type' => 'paragraphs', 'paragraphs' => [
                    "La salle de bain du docteur Pellington.",
                    "Maintenant que vous avez synthétisé l'antidote pour les chiens, vous n'avez plus rien à faire ici.",
                ]],
            ],
            'actions' => [],
        ],
    ],
];
