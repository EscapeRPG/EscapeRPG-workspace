<?php

return [
    'variants' => [
        'step_0' => [
            'audio' => null,
            'blocks' => [
                ['type' => 'linked_image', 'src' => 'assets/img/secrets/pelldeuxieme.png', 'alt' => 'deuxième étage de la maison du docteur Pellington', 'class' => 'enigme'],
                ['type' => 'paragraphs', 'paragraphs' => [
                    "Tout cet étage est en fait un laboratoire où le docteur pouvait mener diverses expériences et synthétiser toutes sortes de médicaments.",
                    "Vous trouvez tout un tas de notes à propos de ses travaux.",
                ]],
            ],
            'actions' => [
                ['label' => 'Fouiller.', 'name' => 'fouille', 'value' => 'fouiller', 'class' => 'ask'],
            ],
        ],
        'recette' => [
            'audio' => null,
            'blocks' => [
                ['type' => 'paragraphs', 'paragraphs' => [
                    "En fouillant un peu, vous finissez par trouver des feuilles traitant de barbituriques et autres narcotiques.",
                    "Sur l'une d'elles, vous trouvez une recette pour composer un traitement contrant leurs effets.",
                ]],
                ['type' => 'linked_image', 'src' => 'assets/img/secrets/recette.png', 'alt' => 'une recette indiquant comment fabriquer un médicament', 'class' => 'enigme'],
                ['type' => 'paragraphs', 'paragraphs' => [
                    "Vous la prenez avec vous, cela pourrait s'avérer utile.",
                ]],
            ],
            'actions' => [
                ['label' => "Ajouter à l'inventaire.", 'name' => 'action', 'value' => 'take_recette', 'class' => 'action'],
            ],
        ],
        'unknown' => [
            'audio' => null,
            'blocks' => [
                ['type' => 'paragraphs', 'paragraphs' => [
                    "Il ne semble rien y avoir ici en rapport avec ce que vous cherchez.",
                ]],
            ],
            'actions' => [
                ['label' => 'Fouiller.', 'name' => 'fouille', 'value' => 'fouiller', 'class' => 'ask'],
            ],
        ],
        'done' => [
            'audio' => null,
            'blocks' => [
                ['type' => 'linked_image', 'src' => 'assets/img/secrets/pelldeuxieme.png', 'alt' => 'deuxième étage de la maison du docteur Pellington', 'class' => 'enigme'],
                ['type' => 'paragraphs', 'paragraphs' => [
                    "Tout cet étage est en fait un laboratoire où le docteur pouvait mener diverses expériences et synthétiser toutes sortes de médicaments.",
                    "Vous trouvez tout un tas de notes à propos de ses travaux mais elles ne vous semblent d'aucune utilité.",
                ]],
            ],
            'actions' => [],
        ],
    ],
];
