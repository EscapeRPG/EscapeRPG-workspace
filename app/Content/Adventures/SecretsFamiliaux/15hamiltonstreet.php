<?php

return [
    'variants' => [
        'step_0' => [
            'audio' => null,
            'blocks' => [
                [
                    'type' => 'paragraphs',
                    'paragraphs' => [
                        "Le manoir Deckard est situé aux abords de la ville, dans une petite zone boisée, calme et isolée.",
                        "Il est 20 heures lorsque vous arrivez devant les grilles.",
                    ],
                ],
            ],
            'actions' => [
                [
                    'label' => 'Suivant.',
                    'name' => 'action',
                    'value' => 'suivant',
                    'class' => 'action',
                ],
            ],
        ],
        'step_1' => [
            'audio' => 'assets/sounds/secrets/chiens.mp3',
            'blocks' => [
                [
                    'type' => 'paragraphs',
                    'paragraphs' => [
                        "L'antique demeure de vos ancêtres se dresse au fond de l'allée traversant un immense jardin.<br>
                        Vous êtes accueilli par des aboiements de <span class=\"mdp\">chiens</span>.",
                        "Vous ne saviez pas que votre oncle en avait.",
                    ],
                ],
            ],
            'actions' => [
                [
                    'label' => 'Suivant.',
                    'name' => 'action',
                    'value' => 'suivant2',
                    'class' => 'action',
                ],
            ],
        ],
        'step_2' => [
            'audio' => null,
            'blocks' => [
                [
                    'type' => 'paragraphs',
                    'paragraphs' => [
                        "Gaspard s'approche de la grille.",
                    ],
                ],
                [
                    'type' => 'dialogue',
                    'speaker' => [
                        'name' => 'Gaspard',
                        'portrait' => 'assets/img/secrets/gaspard.png',
                    ],
                    'paragraphs' => [
                        "Désolé pour ça. Nous avons eu quelques... <span class=\"mdp\">soucis</span> ces derniers temps
                        et votre oncle a préféré assurer sa sécurité.",
                        "Je vous en prie, suivez-moi.",
                    ],
                ],
            ],
            'actions' => [
                [
                    'label' => 'Le suivre.',
                    'name' => 'action',
                    'value' => 'suivre',
                    'class' => 'action',
                ],
            ],
        ],
        'step_3' => [
            'audio' => null,
            'scripts' => [
                'assets/js/adventures/secrets_familiaux/ouverturemanoir.js',
            ],
            'blocks' => [
                [
                    'type' => 'paragraphs',
                    'paragraphs' => [
                        "Il vous fait traverser l'allée et vous tend un jeu de clés.",
                    ],
                ],
                [
                    'type' => 'dialogue',
                    'speaker' => [
                        'name' => 'Gaspard',
                        'portrait' => 'assets/img/secrets/gaspard.png',
                    ],
                    'paragraphs' => [
                        "Tenez, voici les clés du manoir. Elles sont à vous maintenant. Je vous laisse entrer, je dois aller nourrir les chiens.",
                    ],
                ],
                [
                    'type' => 'paragraphs',
                    'paragraphs' => [
                        "Vous êtes devant la porte du manoir qui semble fermée.",
                    ],
                ],
                [
                    'type' => 'interactive_image',
                    'src' => 'assets/img/secrets/porteentree.png',
                    'alt' => "la porte d'entrée du manoir",
                    'class' => 'enigmelieu secrets-porte',
                    'form_class' => 'secrets-cles',
                    'hotspots' => [
                        ['src' => 'assets/img/secrets/cle1.png', 'alt' => 'clé 1', 'value' => 'cle1'],
                        ['src' => 'assets/img/secrets/cle2.png', 'alt' => 'clé 2', 'value' => 'cle2'],
                        ['src' => 'assets/img/secrets/cle3.png', 'alt' => 'clé 3', 'value' => 'cle3'],
                        ['src' => 'assets/img/secrets/cle4.png', 'alt' => 'clé 4', 'value' => 'cle4', 'attributes' => ['data-open-manor' => true]],
                        ['src' => 'assets/img/secrets/cle5.png', 'alt' => 'clé 5', 'value' => 'cle5'],
                    ],
                ],
            ],
            'actions' => [],
        ],
    ],
];
