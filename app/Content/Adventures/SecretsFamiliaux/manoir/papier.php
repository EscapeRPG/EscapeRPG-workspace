<?php

return [
    'variants' => [
        'missing' => [
            'audio' => null,
            'blocks' => [['type' => 'paragraphs', 'paragraphs' => [
                "Vous n'avez pas encore ouvert le coffret.",
            ]]],
            'actions' => [['label' => 'Retour.', 'name' => 'action', 'value' => 'retour', 'class' => 'action']],
        ],
        'open' => [
            'audio' => null,
            'blocks' => [
                ['type' => 'linked_image', 'src' => 'assets/img/secrets/papier.png', 'alt' => 'un morceau de papier avec une inscription étrange', 'class' => 'enigme'],
                ['type' => 'linked_image', 'src' => 'assets/img/secrets/petitecle.png', 'alt' => 'petite clé', 'class' => 'enigme'],
                ['type' => 'paragraphs', 'paragraphs' => [
                    "À l'intérieur du coffret, vous trouvez une petite clé que vous mettez dans votre poche ainsi qu'un morceau de papier sur lequel est marquée une phrase étrange.",
                    "Il semblerait qu'il s'agisse d'un code, mais comment faire pour le déchiffrer ?",
                    "Vous le prenez avec vous pour pouvoir le consulter quand vous voudrez.",
                ]],
            ],
            'actions' => [['label' => "Ajouter à l'inventaire.", 'name' => 'action', 'value' => 'take_paper', 'class' => 'action']],
        ],
        'stored' => [
            'audio' => null,
            'blocks' => [['type' => 'paragraphs', 'paragraphs' => [
                "Vous posez le coffret vide quelque part, il ne vous sera plus utile maintenant.",
                "Que désirez-vous faire maintenant ?",
            ]]],
            'actions' => [['label' => 'Retour.', 'name' => 'action', 'value' => 'retour', 'class' => 'action']],
        ],
        'found' => [
            'audio' => null,
            'blocks' => [
                ['type' => 'linked_image', 'src' => 'assets/img/secrets/papier.png', 'alt' => 'un morceau de papier avec une inscription étrange', 'class' => 'enigme'],
                ['type' => 'paragraphs', 'paragraphs' => [
                    "Un papier trouvé dans le coffret mystérieux. Une phrase énigmatique y est inscrite.",
                ]],
            ],
            'actions' => [],
        ],
    ],
];
