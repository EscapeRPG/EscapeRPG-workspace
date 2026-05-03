<?php

return [
    'variants' => [
        'step_0' => [
            'audio' => 'assets/sounds/secrets/chiensdehors.mp3',
            'blocks' => [
                [
                    'type' => 'paragraphs',
                    'paragraphs' => [
                        "En plein milieu de la nuit, vous êtes réveillé par des aboiements de <span class=\"mdp\">chiens</span> au dehors.<br>
                        En regardant par la fenêtre, vous voyez Gaspard dans le jardin, lampe torche à la main, en train de patrouiller.",
                        "Vous vous dépêchez d'enfiler une robe de chambre et de le rejoindre.",
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
            'audio' => null,
            'blocks' => [
                [
                    'type' => 'dialogue',
                    'speaker' => [
                        'name' => 'Gaspard',
                        'portrait' => 'assets/img/secrets/gaspard.png',
                    ],
                    'paragraphs' => [
                        "Les <span class=\"mdp\">chiens</span> ont repéré un rôdeur autour de la maison.
                        Il semble avoir eu le temps de s'enfuir avant que je n'arrive, j'ai seulement eu le temps de voir une voiture s'éloigner.<br>
                        Cela fait plusieurs fois depuis la mort de votre oncle, sans doute quelqu'un voulant en profiter pour voler des objets de valeur.",
                    ],
                ],
            ],
            'actions' => [
                [
                    'label' => 'Interroger.',
                    'name' => 'nuit',
                    'value' => 'interroger',
                    'class' => 'ask',
                ],
                [
                    'label' => 'Retourner dormir.',
                    'name' => 'action',
                    'value' => 'dormir2',
                    'class' => 'action',
                ],
            ],
        ],
        'step_6' => [
            'audio' => null,
            'blocks' => [
                [
                    'type' => 'dialogue',
                    'speaker' => [
                        'name' => 'Gaspard',
                        'portrait' => 'assets/img/secrets/gaspard.png',
                    ],
                    'paragraphs' => [
                        "Effectivement, je crois bien que c'était une voiture grise. Vous savez de qui il peut s'agir ?",
                    ],
                ],
            ],
            'actions' => [
                [
                    'label' => 'Interroger.',
                    'name' => 'nuit',
                    'value' => 'interroger',
                    'class' => 'ask',
                ],
                [
                    'label' => 'Retourner dormir.',
                    'name' => 'action',
                    'value' => 'dormir2',
                    'class' => 'action',
                ],
            ],
        ],
        'step_7' => [
            'audio' => null,
            'blocks' => [
                [
                    'type' => 'dialogue',
                    'speaker' => [
                        'name' => 'Gaspard',
                        'portrait' => 'assets/img/secrets/gaspard.png',
                    ],
                    'paragraphs' => [
                        "Allons, le médecin ?<br>
                        Je ne vois vraiment pas ce qu'il ferait ici. Votre oncle et lui s'étaient disputés, mais ce n'est pas un mauvais bougre, je le vois mal rôder près des maisons en pleine nuit.<br>
                        Vous devriez retourner dormir, je me charge de surveiller les environs au cas où quelqu'un reviendrait.",
                    ],
                ],
            ],
            'actions' => [
                [
                    'label' => 'Enquêter.',
                    'name' => 'action',
                    'value' => 'enqueter',
                    'class' => 'action',
                ],
            ],
        ],
        'step_8' => [
            'audio' => null,
            'blocks' => [
                [
                    'type' => 'dialogue',
                    'speaker' => [
                        'name' => 'Gaspard',
                        'portrait' => 'assets/img/secrets/gaspard.png',
                    ],
                    'paragraphs' => [
                        "Vous êtes sûr que tout va bien ? Vous semblez fatigué et je ne vois pas où vous voulez en venir avec ça.",
                    ],
                ],
            ],
            'actions' => [],
        ],
        'step_2' => [
            'audio' => null,
            'blocks' => [
                [
                    'type' => 'paragraphs',
                    'paragraphs' => [
                        "En faisant le tour du jardin, vous finissez par remarquer une <span class=\"mdp\">empreinte de pas</span>.<br>
                        Il s'agit d'une trace de chaussure de taille 40, sans doute laissée par un homme de faible corpulence.",
                        "Vous ne trouvez rien d'autre pour le moment et décidez de remettre ça à plus tard. Gaspard veillera à ce que rien d'autre ne se passe cette nuit.",
                    ],
                ],
            ],
            'actions' => [
                [
                    'label' => 'Retourner dormir.',
                    'name' => 'action',
                    'value' => 'dormir2',
                    'class' => 'action',
                ],
            ],
        ],
        'step_3' => [
            'audio' => 'assets/sounds/secrets/chiensdehors.mp3',
            'blocks' => [
                [
                    'type' => 'paragraphs',
                    'paragraphs' => [
                        "Après la nuit mouvementée, vous avez eu du mal à vous lever et n'avez pas réussi à faire beaucoup de choses dans la matinée.",
                        "Le midi venu, alors que vous êtes à table, vous entendez les <span class=\"mdp\">chiens</span> aboyer au fond du jardin.<br>
                        Gaspard étant parti en ville faire quelques courses, les animaux sont restés dans le chenil.",
                        "Vous décidez d'aller voir pour les calmer mais ils continuent d'aboyer comme si... quelqu'un essayait de s'introduire chez vous !",
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
        'step_4' => [
            'audio' => null,
            'blocks' => [
                [
                    'type' => 'paragraphs',
                    'paragraphs' => [
                        "Vous revenez aussi vite que possible dans la maison et commencez à fouiller partout, mais n'apercevez personne.<br>
                        Vous vous dirigez à nouveau vers le jardin pour inspecter lorsque vous entendez au loin un bruit de moteur s'éloignant.",
                        "Manifestement, l'intrus n'a pas réussi à entrer dans la maison grâce à votre vigilance.",
                    ],
                ],
            ],
            'actions' => [
                [
                    'label' => 'Suivant.',
                    'name' => 'action',
                    'value' => 'suivant3',
                    'class' => 'action',
                ],
            ],
        ],
        'step_5' => [
            'audio' => null,
            'blocks' => [
                [
                    'type' => 'interactive_image',
                    'src' => 'assets/img/secrets/salleamanger.png',
                    'alt' => 'salle à manger',
                    'class' => 'enigmelieu',
                    'hotspots' => [
                        [
                            'id' => 'fenetre',
                            'src' => 'assets/img/secrets/buttonfenetre.png',
                            'alt' => 'la fenêtre de la salle à manger',
                            'value' => 'fenetreopened',
                        ],
                    ],
                ],
                [
                    'type' => 'paragraphs',
                    'paragraphs' => [
                        "Vous retournez dans la salle à manger pour finir votre repas, mais quelque chose vous dérange.",
                    ],
                ],
            ],
            'actions' => [],
        ],
    ],
];
