<?php

return [
    'variants' => [
        'default' => [
            'audio' => null,
            'blocks' => [['type' => 'paragraphs', 'paragraphs' => [
                "La pièce est immense et chaque mur est occupé par des étagères remplies de livres de toutes sortes.",
            ]]],
            'actions' => [
                [
                    'label' => 'Chercher.',
                    'name' => 'bibliotheque',
                    'value' => 'chercher',
                    'class' => 'ask',
                ],
            ],
        ],
        'symbole' => [
            'audio' => null,
            'blocks' => [
                [
                    'type' => 'paragraphs',
                    'paragraphs' =>
                        [
                            "L'un des livres attire votre attention.<br>
                            La couverture comporte un symbole étrangement similaire à celui gravé sur la porte du bureau.<br>
                            Il semblerait que ce symbole procure une protection à l'endroit où on le trace.
                            Sur une porte, cela la rendrait inviolable, à moins de connaitre la bonne formule.",
                            "En feuilletant les pages, de petits papiers tombent du livre.",
                        ]
                ],
                [
                    'type' => 'linked_image',
                    'src' => 'assets/img/secrets/templar.png',
                    'alt' => "un papier avec l'explication d'un code",
                    'class' => 'enigme'
                ],
            ],
            'actions' => [
                [
                    'label' => "Ajouter à l'inventaire.",
                    'name' => 'action',
                    'value' => 'take_templar',
                    'class' => 'action'
                ]
            ],
        ],
        'opusfavori' => [
            'audio' => null,
            'blocks' => [['type' => 'paragraphs', 'paragraphs' => [
                "Vous essayez de trouver quel était le livre favori de votre oncle,
                mais vous baissez rapidement les bras face au nombre extravagant de livres présents ici.",
                "Peut-être auriez-vous plus de chance en interrogeant les domestiques ?",
            ]]],
            'actions' => [
                [
                    'label' => 'Chercher.',
                    'name' => 'bibliotheque',
                    'value' => 'chercher',
                    'class' => 'ask',
                ],
            ],
        ],
        'magnamater' => [
            'audio' => null,
            'blocks' => [
                ['type' => 'linked_image', 'src' => 'assets/img/secrets/magnamater.png', 'alt' => 'le Magna Mater', 'class' => 'enigme'],
                ['type' => 'paragraphs', 'paragraphs' => [
                    "Grâce aux informations fournies par Téona, vous trouvez rapidement un vieux livre nommé Magna Mater.<br>
                    Il semblerait que ce soit un livre traitant d'un ancien culte pratiquement oublié et terrifiant.
                    Vous frissonnez en parcourant les quelques pages qu'il contient mais passez vite à autre chose, ce n'est pas cela qui vous intéresse ici.<br>
                    Il s'agit du <span class=\"mdp\">deuxième</span> tome de la collection.",
                ]],
            ],
            'actions' => [
                [
                    'label' => "Ajouter à l'inventaire.",
                    'name' => 'action',
                    'value' => 'take_magna',
                    'class' => 'action'
                ]
            ],
        ],
        'take_magna' => [
            'audio' => null,
            'blocks' => [
                [
                    'type' => 'paragraphs',
                    'paragraphs' =>
                        [
                            "Vous prenez le livre avec vous, au cas où."
                        ]
                ]
            ],
            'actions' => []
        ],
        'take_templar' => [
            'audio' => null,
            'blocks' => [
                [
                    'type' => 'paragraphs',
                    'paragraphs' =>
                        [
                            "Vous prenez les morceaux de papier avec vous, au cas où."
                        ]
                ]
            ],
            'actions' => [
                [
                    'label' => 'Chercher.',
                    'name' => 'bibliotheque',
                    'value' => 'chercher',
                    'class' => 'ask',
                ],
            ],
        ],
        'unknown' => [
            'audio' => null,
            'blocks' => [
                [
                    'type' => 'paragraphs',
                    'paragraphs' =>
                        [
                            "Vous avez beau chercher, vous ne trouvez rien de particulier ici.<br>
                            Ou bien peut-être est-ce parce que vous ne cherchez pas la bonne chose ?"
                        ]
                ]
            ],
            'actions' => [
                [
                    'label' => 'Chercher.',
                    'name' => 'bibliotheque',
                    'value' => 'chercher',
                    'class' => 'ask',
                ],
            ],
        ],
        'done' => [
            'audio' => null,
            'blocks' => [
                [
                    'type' => 'paragraphs',
                    'paragraphs' =>
                        [
                            "Il ne semble plus rien y avoir d'intéressant ici maintenant."
                        ]
                ]
            ],
            'actions' => []
        ],
    ],
];
