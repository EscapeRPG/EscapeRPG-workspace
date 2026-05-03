<?php

return [
    'variants' => [
        'step_0' => [
            'audio' => 'assets/sounds/secrets/policebox.mp3',
            'blocks' => [
                [
                    'type' => 'paragraphs',
                    'paragraphs' => [
                        "Dès les premières lueurs de l'aube, vous sortez du manoir et vous dirigez vers la première borne téléphonique de police que vous trouvez.
                        Vous décrochez le combiné qui vous met en relation avec le central d'Arkham.",
                    ],
                ],
                [
                    'type' => 'dialogue',
                    'speaker' => [
                        'name' => 'Borne de police',
                        'portrait' => 'assets/img/secrets/bornepolice.png',
                    ],
                    'paragraphs' => [
                        "Bureau de police d'Arkham, veuillez donner votre grade, nom et matricule je vous prie.",
                    ],
                ],
            ],
            'hint' => [
                'levels' => [
                    [
                        'paragraphs' => [
                            "Vous avez oublié l'une ou l'autre de ces informations ? Où pourriez-vous les retrouver ?",
                        ],
                    ],
                    [
                        'paragraphs' => [
                            "Avez-vous déjà essayé de cliquer sur votre photo à gauche ?",
                        ],
                    ],
                    [
                        'paragraphs' => [
                            "Regardez bien votre insigne.",
                        ],
                    ],
                ],
                'answer' => [
                    'paragraphs' => [
                        "Vous êtes l'inspecteur Deckard, matricule 085, soit \"inspecteur Deckard 085\".",
                    ],
                ],
            ],
            'actions' => [
                [
                    'label' => 'Répondre.',
                    'name' => 'matin',
                    'value' => 'repondre',
                    'class' => 'ask',
                ],
            ],
        ],
        'step_4' => [
            'audio' => null,
            'blocks' => [
                [
                    'type' => 'dialogue',
                    'speaker' => [
                        'name' => 'Borne de police',
                        'portrait' => 'assets/img/secrets/bornepolice.png',
                    ],
                    'paragraphs' => [
                        "Il semblerait que je n'aie aucun agent associé à ce nom et numéro.
                        Pouvez-vous répéter votre grade, nom et numéro de badge je vous prie ?",
                    ],
                ],
            ],
            'hint' => [
                'levels' => [
                    [
                        'paragraphs' => [
                            "Vous avez oublié l'une ou l'autre de ces informations ? Où pourriez-vous les retrouver ?",
                        ],
                    ],
                    [
                        'paragraphs' => [
                            "Avez-vous déjà essayé de cliquer sur votre photo à gauche ?",
                        ],
                    ],
                    [
                        'paragraphs' => [
                            "Regardez bien votre insigne.",
                        ],
                    ],
                ],
                'answer' => [
                    'paragraphs' => [
                        "Vous êtes l'inspecteur Deckard, matricule 085, soit \"inspecteur Deckard 085\".",
                    ],
                ],
            ],
            'actions' => [
                [
                    'label' => 'Répondre.',
                    'name' => 'matin',
                    'value' => 'repondre',
                    'class' => 'ask',
                ],
            ],
        ],
        'step_1' => [
            'audio' => null,
            'blocks' => [
                [
                    'type' => 'dialogue',
                    'speaker' => [
                        'name' => 'Borne de police',
                        'portrait' => 'assets/img/secrets/bornepolice.png',
                    ],
                    'paragraphs' => [
                        "Bonjour inspecteur Deckard, à quel sujet nous contactez-vous ?",
                    ],
                ],
            ],
            'hint' => [
                'levels' => [
                    [
                        'paragraphs' => [
                            "À ce stade de l'enquête, vous devriez avoir des soupçons sur une personne en particulier dont vous avez pu entendre parler.",
                        ],
                    ],
                    [
                        'paragraphs' => [
                            "Vous souvenez-vous de son nom ?",
                        ],
                    ],
                    [
                        'paragraphs' => [
                            "Il s'agit de l'ancien docteur de famille.",
                        ],
                    ],
                ],
                'answer' => [
                    'paragraphs' => [
                        "Demandez des informations sur \"Pellington\".",
                    ],
                ],
            ],
            'actions' => [
                [
                    'label' => 'Répondre.',
                    'name' => 'matin',
                    'value' => 'repondre',
                    'class' => 'ask',
                ],
            ],
        ],
        'step_5' => [
            'audio' => null,
            'blocks' => [
                [
                    'type' => 'dialogue',
                    'speaker' => [
                        'name' => 'Borne de police',
                        'portrait' => 'assets/img/secrets/bornepolice.png',
                    ],
                    'paragraphs' => [
                        "Je ne comprends pas votre requête, pouvez-vous répéter ?",
                    ],
                ],
            ],
            'actions' => [
                [
                    'label' => 'Répondre.',
                    'name' => 'matin',
                    'value' => 'repondre',
                    'class' => 'ask',
                ],
            ],
        ],
        'step_2' => [
            'audio' => null,
            'blocks' => [
                [
                    'type' => 'dialogue',
                    'speaker' => [
                        'name' => 'Borne de police',
                        'portrait' => 'assets/img/secrets/bornepolice.png',
                    ],
                    'paragraphs' => [
                        "L'adresse du docteur Evan Pellington est le 107 Park Avenue à Arkham.<br>
                        Désirez-vous autre chose ?",
                    ],
                ],
            ],
            'actions' => [
                [
                    'label' => 'Non.',
                    'name' => 'action',
                    'value' => 'non',
                    'class' => 'action',
                ],
            ],
        ],
        'step_3' => [
            'audio' => null,
            'blocks' => [
                [
                    'type' => 'paragraphs',
                    'paragraphs' => [
                        "Vous raccrochez le téléphone et retournez au manoir pour prendre votre voiture, avant de vous diriger vers le <span class=\"lieu\">107 Park Avenue</span>.",
                    ],
                ],
            ],
            'actions' => [],
        ],
    ],
];
