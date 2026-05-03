<?php

return [
    'variants' => [
        'default' => [
            'audio' => null,
            'blocks' => [
                [
                    'type' => 'paragraphs',
                    'paragraphs' => [
                        "En entrant dans la cave, vous êtes assailli par la terrible <span class=\"mdp\">odeur</span> qui vous a gêné lors de votre arrivée.<br>
                        Elle semble beaucoup plus forte ici. Cependant, vous n'arrivez pas à découvrir d'où elle pourrait provenir précisément.",
                    ]
                ]
            ],
            'actions' => [
                [
                    'label' => 'Chercher.',
                    'name' => 'cave',
                    'value' => 'chercher',
                    'class' => 'ask',
                ],
            ],
        ],
        'fuite' => [
            'audio' => null,
            'blocks' => [
                [
                    'type' => 'paragraphs',
                    'paragraphs' => [
                        "Vous inspectez les murs de la cave mais vous ne remarquez aucune trace d'humidité.
                        La théorie apportée par les domestiques ne semble pas être la bonne...",
                    ]
                ]
            ],
            'actions' => [
                [
                    'label' => 'Chercher.',
                    'name' => 'cave',
                    'value' => 'chercher',
                    'class' => 'ask',
                ],
            ],
        ],
        'restes' => [
            'audio' => null,
            'blocks' => [
                [
                    'type' => 'paragraphs',
                    'paragraphs' => [
                        "Vous retroussez vos manches et commencez à fouiller les poubelles.
                Après tout, ce n'est pas la première fois que l'une de vos enquêtes vous mène à fouiller dans des ordures.",
                        "Au bout d'un moment, vous finissez par sortir quelques morceaux de tableau calcinés que vous essayez de rassembler.
                Malheureusement, votre oncle a détruit la majeure partie de l'œuvre et vous ne pouvez pas compter le nombre de personnages se trouvant dessus.",
                    ]
                ],
                [
                    'type' => 'linked_image',
                    'src' => 'assets/img/secrets/tableaubrule.png',
                    'alt' => "les morceaux d'un tableau brûlé", 'class' => 'enigme'
                ],
                [
                    'type' => 'paragraphs',
                    'paragraphs' => [
                        "Il vous faudrait essayer de savoir à quoi elle ressemble dans son intégralité pour avancer.<br>
                        Dans le doute, vous prenez ces quelques morceaux avec vous.",
                    ]
                ],
            ],
            'actions' => [
                [
                    'label' => "Ajouter à l'inventaire.",
                    'name' => 'action',
                    'value' => 'take_tableau',
                    'class' => 'action'
                ]
            ]
        ],
        'take_tableau' => [
            'audio' => null,
            'blocks' => [
                [
                    'type' => 'paragraphs',
                    'paragraphs' => [
                        "Vous essayez de fouiller un peu plus, mais il est évident maintenant que vous ne trouverez pas d'autres morceaux du tableau pour vous aider à avancer.",
                    ]
                ]
            ],
            'actions' => []
        ],
        'unknown' => [
            'audio' => null,
            'blocks' => [
                [
                    'type' => 'paragraphs',
                    'paragraphs' => [
                        "Vous avez beau chercher, vous ne trouvez rien de particulier ici."]
                ]
            ],
            'actions' => [
                [
                    'label' => 'Chercher.',
                    'name' => 'cave',
                    'value' => 'chercher',
                    'class' => 'ask',
                ],
            ],
        ],
    ],
];
