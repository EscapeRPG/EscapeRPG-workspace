<?php

return [
    'variants' => [
        'step_0' => [
            'audio' => null,
            'blocks' => [
                [
                    'type' => 'paragraphs',
                    'paragraphs' => [
                        "Une petite dizaine de personnes se tient ici.<br>
                        Votre oncle ayant vécu reclus ces dernières années, vous ne vous attendiez pas vraiment à ce qu'il y ait beaucoup de monde non plus.",
                        "Parmi les personnes présentes, vous ne reconnaissez pas grand monde.",
                        "Certains vous présentent leurs condoléances.",
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
                    'type' => 'paragraphs',
                    'paragraphs' => [
                        "Alors que la cérémonie s'apprête à commencer, vous apercevez deux hommes en train de se disputer un peu à l'écart.<br>
                        L'un d'eux semble être un domestique et l'autre est plutôt bien habillé, en costume marron. Il porte une <span class=\"mdp\">sacoche de médecin</span>.<br>
                        Avant que vous n'arriviez, l'homme en costume s'en va, manifestement en colère, et monte dans une <span class=\"mdp\">voiture grise</span>.",
                        "Vous vous approchez de l'autre.",
                    ],
                ],
                [
                    'type' => 'dialogue',
                    'speaker' => [
                        'name' => 'Gaspard',
                        'portrait' => 'assets/img/secrets/gaspard.png',
                    ],
                    'paragraphs' => [
                        "Je suis <span class=\"mdp\">Gaspard</span> Bradley, je travaillais pour votre oncle.<br>
                        Ne vous inquiétez pas pour cet homme, il ne nous dérangera plus.",
                    ],
                ],
            ],
            'actions' => [
                [
                    'label' => 'Qui était-ce ?',
                    'name' => 'action',
                    'value' => 'qui',
                    'class' => 'action',
                ],
            ],
        ],
        'step_2' => [
            'audio' => null,
            'blocks' => [
                [
                    'type' => 'dialogue',
                    'speaker' => [
                        'name' => 'Gaspard',
                        'portrait' => 'assets/img/secrets/gaspard.png',
                    ],
                    'paragraphs' => [
                        "Il s'agit du Docteur <span class=\"mdp\">Pellington</span>, un ancien ami de votre oncle, mais ils étaient en froid depuis plusieurs années maintenant.<br>
                        Monsieur Deckard n'aurait pas voulu que le docteur assiste à la cérémonie, alors je l'ai renvoyé.",
                        "Je crois d'ailleurs que ça va bientôt commencer.
                        Nous devrions rejoindre les autres.",
                    ],
                ],
                [
                    'type' => 'paragraphs',
                    'paragraphs' => [
                        "Gaspard semble cacher quelque chose, mais la cérémonie va effectivement bientôt débuter.<br>
                        Vous avez peut-être encore le temps de lui poser une question, à moins que vous ne préfériez retourner vous installer ?",
                    ],
                ],
            ],
            'actions' => [
                [
                    'label' => 'Interroger.',
                    'name' => 'question',
                    'value' => 'medecin',
                    'class' => 'ask',
                ],
                [
                    'label' => 'Retourner à la cérémonie.',
                    'name' => 'action',
                    'value' => 'retour',
                    'class' => 'action',
                ],
            ],
        ],
        'step_3' => [
            'audio' => null,
            'blocks' => [
                [
                    'type' => 'dialogue',
                    'speaker' => [
                        'name' => 'Gaspard',
                        'portrait' => 'assets/img/secrets/gaspard.png',
                    ],
                    'paragraphs' => [
                        "Hum... Eh bien je ne sais pas pourquoi, mais le docteur voulait examiner le corps de votre oncle avant sa mise en bière.<br>
                        Je ne sais vraiment pas pourquoi. Il a refusé de me l'expliquer.",
                        "Je ne pouvais décemment pas le laisser profaner la dépouille, vous comprenez ?",
                    ],
                ],
            ],
            'actions' => [
                [
                    'label' => 'Retourner à la cérémonie.',
                    'name' => 'action',
                    'value' => 'retour',
                    'class' => 'action',
                ],
            ],
        ],
        'step_4' => [
            'audio' => null,
            'blocks' => [
                [
                    'type' => 'dialogue',
                    'speaker' => [
                        'name' => 'Gaspard',
                        'portrait' => 'assets/img/secrets/gaspard.png',
                    ],
                    'paragraphs' => [
                        "Je vous demande pardon ?",
                    ],
                ],
            ],
            'actions' => [
                [
                    'label' => 'Interroger.',
                    'name' => 'question',
                    'value' => 'medecin',
                    'class' => 'ask',
                ],
                [
                    'label' => 'Retourner à la cérémonie.',
                    'name' => 'action',
                    'value' => 'retour',
                    'class' => 'action',
                ],
            ],
        ],
        'step_5' => [
            'audio' => null,
            'blocks' => [
                [
                    'type' => 'paragraphs',
                    'paragraphs' => [
                        "Après la cérémonie, le corps est finalement mis en terre et la foule se disperse lentement.",
                        "Une femme s'approche alors de vous.",
                    ],
                ],
                [
                    'type' => 'dialogue',
                    'speaker' => [
                        'name' => 'Téona',
                        'portrait' => 'assets/img/secrets/teona.png',
                    ],
                    'paragraphs' => [
                        "Je me nomme Téona. J'étais l'une des <span class=\"mdp\">domestiques</span> de votre oncle.<br>
                        Je crois savoir que vous n'habitez pas ici ?<br>
                        Si vous le voulez, vous pouvez venir manger et dormir au manoir ce soir, nous vous avons tout préparé.",
                        "Vous vous souvenez de l'adresse ? C'est le <span class=\"lieu\">15 Hamilton Street</span>.",
                    ],
                ],
                [
                    'type' => 'paragraphs',
                    'paragraphs' => [
                        "Vous ne vous souvenez pas d'avoir vu aucun des domestiques ici présents par le passé. Il semblerait que votre oncle ait congédié tous ceux que vous connaissiez.",
                    ],
                ],
            ],
            'hint' => [
                'levels' => [
                    [
                        'paragraphs' => [
                            "Vous êtes actuellement au cimetière et cherchez à vous rendre à l'adresse donnée par Téona.",
                        ],
                    ],
                    [
                        'paragraphs' => [
                            "À quel endroit de cette page pourriez-vous entrer une adresse ?",
                        ],
                    ],
                    [
                        'paragraphs' => [
                            "Essayez de rentrer cette nouvelle adresse dans la barre d'adresse de votre navigateur ! Pensez bien à retirer les espaces.",
                        ],
                    ],
                ],
                'answer' => [
                    'paragraphs' => [
                        "Rendez-vous à cette adresse : <a href=\"" . url('/aventures/secretsfamiliaux/15hamiltonstreet') . "\">/aventures/secretsfamiliaux/15hamiltonstreet</a>.",
                    ],
                ],
            ],
            'actions' => [],
        ],
        'truth_step_0' => [
            'audio' => null,
            'blocks' => [['type' => 'paragraphs', 'paragraphs' => [
                "Vous arrivez devant les grilles du cimetière alors que la nuit est tombée depuis un bon moment.",
                "Tel un sombre présage aux événements, la lune est cachée par de sombres nuages et l'endroit est plus lugubre que jamais.",
                "Malheureusement, une chaîne ferme solidement la grille de l'entrée et vous ne connaissez aucun autre passage pour accéder à l'intérieur.",
                "À ce moment, vous apercevez une silhouette munie d'une lampe torche en train de parcourir le lieu. Sans doute le gardien.",
            ]]],
            'actions' => [['label' => 'Le héler.', 'name' => 'action', 'value' => 'heler', 'class' => 'action']],
        ],
        'truth_step_1' => [
            'audio' => 'assets/sounds/secrets/pasapprochent.mp3',
            'blocks' => [
                ['type' => 'paragraphs', 'paragraphs' => [
                    "L'homme s'approche de la grille à votre appel.",
                    "Voir quelqu'un de vivant ici vous rassure un peu.",
                ]],
                [
                    'type' => 'dialogue',
                    'speaker' => [
                        'name' => 'Gardien',
                        'portrait' => 'assets/img/secrets/gardien.png',
                    ],
                    'paragraphs' => [
                        "C'est pour quoi ?",
                        "J'ai pas l'temps faut que j'patrouille le cimetière. Y a des vandales qu'ont causé des troubles hier soir, j'peux pas laisser ce genre de chose s'passer ici.",
                    ],
                ],
            ],
            'actions' => [['label' => 'Lui dire qui vous êtes.', 'name' => 'action', 'value' => 'repondre', 'class' => 'action']],
        ],
        'truth_step_2' => [
            'audio' => null,
            'blocks' => [
                [
                    'type' => 'dialogue',
                    'speaker' => [
                        'name' => 'Gardien',
                        'portrait' => 'assets/img/secrets/gardien.png',
                    ],
                    'paragraphs' => [
                        "Deckard ? Mazette, c'est justement vot' caveau qu'a été profané ! Désolé, ceux qu'ont fait ça ont vraiment foutu un sacré bordel, si vous m'pardonnez l'expression.",
                    ],
                ],
                ['type' => 'paragraphs', 'paragraphs' => [
                    "Vous vous sentez défaillir, arriveriez-vous trop tard ?",
                ]],
                [
                    'type' => 'dialogue',
                    'speaker' => [
                        'name' => 'Gardien',
                        'portrait' => 'assets/img/secrets/gardien.png',
                    ],
                    'paragraphs' => [
                        "Z'allez bien m'sieur ? Z'êtes tout pâle...",
                    ],
                ],
            ],
            'actions' => [['label' => "Lui demander d'entrer.", 'name' => 'action', 'value' => 'demander', 'class' => 'action']],
        ],
        'truth_step_3' => [
            'audio' => null,
            'blocks' => [[
                'type' => 'dialogue',
                'speaker' => [
                    'name' => 'Gardien',
                    'portrait' => 'assets/img/secrets/gardien.png',
                ],
                'paragraphs' => [
                    "C'est qu'j'sais pas trop si c'est possible, m'sieur... j'pourrais avoir des problèmes. J'ai appelé la police vous en faites pas.",
                    "En plus y m'ont dit d'toucher à rien pour pouvoir « étudier la scène », qu'y m'ont dit.",
                ],
            ]],
            'actions' => [['label' => 'Lui montrer votre badge.', 'name' => 'action', 'value' => 'badge', 'class' => 'action']],
        ],
        'truth_step_4' => [
            'audio' => 'assets/sounds/secrets/grilleouverture.mp3',
            'blocks' => [
                [
                    'type' => 'dialogue',
                    'speaker' => [
                        'name' => 'Gardien',
                        'portrait' => 'assets/img/secrets/gardien.png',
                    ],
                    'paragraphs' => [
                        "Oh, dans c'cas, j'imagine que vous pouvez entrer, alors.",
                        "Attendez un instant que j'vous ouvre.",
                    ],
                ],
                ['type' => 'paragraphs', 'paragraphs' => [
                    "Il sort une énorme clé sans âge et débloque l'accès au cimetière.",
                    "Vous l'assurez pouvoir continuer seul et foncez vers le caveau familial.",
                ]],
            ],
            'actions' => [['label' => 'Suivant.', 'name' => 'action', 'value' => 'suivant2', 'class' => 'action']],
        ],
        'truth_step_5' => [
            'audio' => 'assets/sounds/secrets/course.mp3',
            'blocks' => [['type' => 'paragraphs', 'paragraphs' => [
                "Le cœur battant, vous approchez de l'endroit où reposent vos ancêtres.",
                "La porte en bois du caveau est fracassée et s'ouvre sur les ténèbres.",
                "Vous descendez les quelques marches et découvrez avec stupeur que l'un des lourds cercueils de pierre est renversé sur le sol, son couvercle gisant à côté. Au milieu des débris se trouve le corps de votre oncle.",
                "Tremblant, vous pointez votre lampe dans sa direction...",
            ]]],
            'actions' => [['label' => 'Suivant.', 'name' => 'action', 'value' => 'suivant3', 'class' => 'action']],
        ],
        'truth_step_6' => [
            'audio' => null,
            'blocks' => [['type' => 'paragraphs', 'paragraphs' => [
                "Comme vous le redoutiez, le cadavre, horriblement mutilé, a un trou béant au niveau de l'abdomen et plus rien ne se trouve à l'intérieur.",
                "Vos pires craintes se sont réalisées : le shoggoth s'est éveillé et a réussi à s'échapper de sa prison de chair et de pierre !",
                "Vous décidez de retourner au manoir pour récupérer quelques affaires et essayer de savoir ce que vous allez faire pour protéger l'humanité du danger qui la menace.",
            ]]],
            'actions' => [['label' => 'Retourner au manoir.', 'name' => 'action', 'value' => 'retour_manoir', 'class' => 'action']],
        ],
    ],
];
