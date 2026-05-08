<?php

$chambreImage = [
    'src' => 'assets/img/secrets/chambrewilliamnuit.png',
    'src_options' => [
        ['if' => ['state' => 'manor_day', 'truthy' => true], 'src' => 'assets/img/secrets/chambrewilliam.png'],
        ['if' => ['state' => 'pellington_visit', 'truthy' => true], 'src' => 'assets/img/secrets/chambrewilliam.png'],
    ],
];
$tableauImage = [
    'src' => 'assets/img/secrets/tableaunuit.png',
    'src_options' => [
        ['if' => ['state' => 'manor_day', 'truthy' => true], 'src' => 'assets/img/secrets/tableau.png'],
        ['if' => ['state' => 'pellington_visit', 'truthy' => true], 'src' => 'assets/img/secrets/tableau.png'],
    ],
];
$pieceImage = [
    'src' => 'assets/img/secrets/chambrepiecenuit.png',
    'src_options' => [
        ['if' => ['state' => 'manor_day', 'truthy' => true], 'src' => 'assets/img/secrets/chambrepiece.png'],
        ['if' => ['state' => 'pellington_visit', 'truthy' => true], 'src' => 'assets/img/secrets/chambrepiece.png'],
    ],
];
$chambreHotspots = [
    $tableauImage + ['class' => 'tabchbr', 'alt' => 'un grand tableau au-dessus du lit', 'value' => 'tableau'],
    $pieceImage + ['class' => 'piechbr', 'alt' => 'une pièce sous le lit', 'value' => 'piece', 'visible_if' => ['inventory' => 'piecead', 'contains' => false]],
];
$chambreCoffreHotspots = [
    ['class' => 'cofchbr', 'src' => 'assets/img/secrets/cof.png', 'alt' => 'coffre-fort', 'value' => 'coffre'],
    $pieceImage + ['class' => 'piechbr', 'alt' => 'une pièce sous le lit', 'value' => 'piece', 'visible_if' => ['inventory' => 'piecead', 'contains' => false]],
];
$safeForm = static fn(): array => [
    'form_class' => 'safe-form',
    'controls' => [
        ['label' => '←', 'name' => 'action', 'class' => 'action', 'value' => 'safe_left'],
        ['element' => 'input', 'type' => 'text', 'name' => 'combinaison_digit', 'attributes' => ['inputmode' => 'numeric', 'maxlength' => '1', 'autocomplete' => 'off']],
        ['label' => '→', 'name' => 'action', 'class' => 'action', 'value' => 'safe_right'],
    ],
];
$portraitHint = [
    'levels' => [
        [
            'paragraphs' => [
                "Plusieurs portraits sont accrochés au mur.",
            ],
        ],
        [
            'paragraphs' => [
                "Sont-ils bien tous là ?",
            ],
        ],
        [
            'paragraphs' => [
                "On peut constater, sur le papier peint, un petit rectangle plus clair indiquant qu'un tableau était accroché mais a été retiré.",
            ],
        ],
    ],
    'answer' => [
        'paragraphs' => [
            "Il y avait donc 4 portraits auparavant.",
        ],
    ],
];
$safeHint = [
    'levels' => [
        [
            'paragraphs' => [
                "Avez-vous trouvé les 3 premiers chiffres du code ? Si ce n'est pas le cas, essayez de fouiller au niveau de la bibliothèque, du salon et de la chambre de William pour les trouver, grâce aux aveux de Pellington.<br>Faites bien attention également à entrer le code en respectant le sens gauche ou droite !<br><br>Si le problème vient de la phrase concernant les \"frères\", dites-vous que vous cherchez bien un code à 4 chiffres.",
            ],
        ],
        [
            'paragraphs' => [
                "Qui peuvent bien être ces \"frères\" dont parle le docteur ?",
            ],
        ],
        [
            'paragraphs' => [
                "Les \"frères\" sont les 3 premiers chiffres de la combinaison. La phrase vous permet de déterminer le 4e.",
            ],
        ],
    ],
    'answer' => [
        'paragraphs' => [
            "Le premier chiffre est 2, le tome du Magna Mater, à tourner vers la droite.<br>Le second est 9, le nombre total présents sur le tableau de Rembrandt brûlé par votre oncle, à tourner vers la droite également.<br>Le troisième est 4, en comptant les portraits présents et retirés sur les murs de la chambre de William, à tourner vers la gauche.<br>Le quatrième chiffre est 7, le plus fort des chiffres-frères (9) s'associe au plus faible (2). Le troisième (4) se soustrait à eux, ce qui donne 2+9-4 = 7, à tourner vers la droite.",
        ],
    ],
];

return [
    'variants' => [
        'step_0' => [
            'audio' => null,
            'blocks' => [
                $chambreImage + ['type' => 'interactive_image', 'alt' => "l'ancienne chambre de votre oncle", 'class' => 'enigmelieu', 'hotspots' => $chambreHotspots],
                [
                    'type' => 'paragraphs',
                    'paragraphs' => [
                        "La chambre de votre défunt oncle. Elle est propre et bien entretenue.",
                        "Peut-être y a-t-il ici quelque chose de valeur ?",
                    ]],
            ],
            'actions' => [],
        ],
        'step_0_pellington' => [
            'audio' => null,
            'blocks' => [
                $chambreImage + ['type' => 'interactive_image', 'alt' => "l'ancienne chambre de votre oncle", 'class' => 'enigmelieu', 'hotspots' => $chambreHotspots],
                [
                    'type' => 'paragraphs',
                    'paragraphs' => [
                        "La chambre de votre défunt oncle. Elle est propre et bien entretenue.",
                        "Peut-être y a-t-il ici quelque chose de valeur ?",
                    ]],
            ],
            'actions' => [],
            'hint' => $portraitHint,
        ],
        'coffre' => [
            'audio' => null,
            'blocks' => [
                $chambreImage + ['type' => 'interactive_image', 'alt' => "l'ancienne chambre de votre oncle", 'class' => 'enigmelieu', 'hotspots' => $chambreCoffreHotspots],
                ['type' => 'paragraphs', 'paragraphs' => [
                    "En retirant le tableau au-dessus du lit, vous trouvez un coffre-fort incrusté dans le mur.",
                ]],
            ],
            'actions' => [],
        ],
        'coffre_pellington' => [
            'audio' => null,
            'blocks' => [
                $chambreImage + ['type' => 'interactive_image', 'alt' => "l'ancienne chambre de votre oncle", 'class' => 'enigmelieu', 'hotspots' => $chambreCoffreHotspots],
                ['type' => 'paragraphs', 'paragraphs' => [
                    "En retirant le tableau au-dessus du lit, vous trouvez un coffre-fort incrusté dans le mur.",
                ]],
            ],
            'actions' => [],
            'hint' => $portraitHint,
        ],
        'step_1' => [
            'audio' => null,
            'blocks' => [
                ['type' => 'linked_image', 'src' => 'assets/img/secrets/ad.png', 'alt' => "pièce avec une tête d'homme", 'class' => 'enigme'],
                ['type' => 'paragraphs', 'paragraphs' => [
                    "Sous le lit, vous trouvez une pièce représentant un jeune homme. Vous la mettez dans votre poche.",
                ]],
            ],
            'actions' => [['label' => "Ajouter à l'inventaire.", 'name' => 'action', 'value' => 'take_piece', 'class' => 'action']],
        ],
        'step_2' => [
            'audio' => null,
            'blocks' => [
                ['type' => 'paragraphs', 'paragraphs' => [
                    "Il ne semble pas y avoir quoi que ce soit d'autre sous le lit.",
                ]],
            ],
            'actions' => [['label' => 'Retour.', 'name' => 'action', 'value' => 'retour', 'class' => 'action']],
        ],
        'step_3' => [
            'audio' => null,
            'blocks' => [
                ['type' => 'image', 'src' => 'assets/img/secrets/coffrefort.png', 'alt' => 'la porte du coffre-fort', 'class' => 'enigmelieu'],
                ['type' => 'paragraphs', 'paragraphs' => [
                    "En retirant le tableau au-dessus du lit, vous trouvez un coffre-fort incrusté dans le mur.",
                    "Impossible de l'ouvrir sans la combinaison.",
                ]],
            ],
            'actions' => [['label' => 'Retour.', 'name' => 'action', 'value' => 'retour', 'class' => 'action']],
        ],
        'safe_0' => [
            'audio' => null,
            'blocks' => [
                ['type' => 'paragraphs', 'paragraphs' => [
                    "En retirant le tableau au-dessus du lit, vous trouvez un coffre-fort incrusté dans le mur.",
                    "Impossible de l'ouvrir sans la <span class=\"indice\">combinaison</span>, mais peut-être l'avez-vous trouvée maintenant ?",
                ]],
                [
                    'type' => 'image',
                    'src' => 'assets/img/secrets/coffrefort.png',
                    'alt' => 'la porte du coffre-fort',
                    'class' => 'enigmelieu',
                ],
                ['type' => 'paragraphs', 'paragraphs' => [
                    "Entrez le premier chiffre.",
                ]],
            ],
            'actions' => [
                $safeForm(),
                ['label' => 'Retour.', 'name' => 'action', 'value' => 'retour', 'class' => 'action'],
            ],
            'hint' => $safeHint,
        ],
        'safe_1' => [
            'audio' => 'assets/sounds/secrets/coffrefort1.mp3',
            'blocks' => [
                [
                    'type' => 'image',
                    'src' => 'assets/img/secrets/coffrefort.png',
                    'alt' => 'la porte du coffre-fort',
                    'class' => 'enigmelieu',
                ],
                ['type' => 'paragraphs', 'paragraphs' => [
                    "Entrez le second chiffre.",
                ]],
            ],
            'actions' => [
                $safeForm(),
                ['label' => 'Retour.', 'name' => 'action', 'value' => 'retour', 'class' => 'action'],
            ],
            'hint' => $safeHint,
        ],
        'safe_2' => [
            'audio' => 'assets/sounds/secrets/coffrefort2.mp3',
            'blocks' => [
                [
                    'type' => 'image',
                    'src' => 'assets/img/secrets/coffrefort.png',
                    'alt' => 'la porte du coffre-fort',
                    'class' => 'enigmelieu',
                ],
                ['type' => 'paragraphs', 'paragraphs' => [
                    "Entrez le troisième chiffre.",
                ]],
            ],
            'actions' => [
                $safeForm(),
                ['label' => 'Retour.', 'name' => 'action', 'value' => 'retour', 'class' => 'action'],
            ],
            'hint' => $safeHint,
        ],
        'safe_3' => [
            'audio' => 'assets/sounds/secrets/coffrefort3.mp3',
            'blocks' => [
                [
                    'type' => 'image',
                    'src' => 'assets/img/secrets/coffrefort.png',
                    'alt' => 'la porte du coffre-fort',
                    'class' => 'enigmelieu',
                ],
                ['type' => 'paragraphs', 'paragraphs' => [
                    "Entrez le quatrième chiffre.",
                ]],
            ],
            'actions' => [
                $safeForm(),
                ['label' => 'Retour.', 'name' => 'action', 'value' => 'retour', 'class' => 'action'],
            ],
            'hint' => $safeHint,
        ],
        'safe_wrong' => [
            'audio' => 'assets/sounds/secrets/coffrefort4.mp3',
            'blocks' => [
                [
                    'type' => 'image',
                    'src' => 'assets/img/secrets/coffrefort.png',
                    'alt' => 'la porte du coffre-fort',
                    'class' => 'enigmelieu',
                ],
                ['type' => 'paragraphs', 'paragraphs' => [
                    "Le code que vous avez essayé ne semble pas avoir fonctionné.",
                    "Il va falloir réessayer.",
                    "Entrez le premier chiffre.",
                ]],
            ],
            'actions' => [
                $safeForm(),
                ['label' => 'Retour.', 'name' => 'action', 'value' => 'retour', 'class' => 'action'],
            ],
            'hint' => $safeHint,
        ],
        'safe_opened' => [
            'audio' => 'assets/sounds/secrets/coffrefortouverture.mp3',
            'blocks' => [
                ['type' => 'image', 'src' => 'assets/img/secrets/coffrefort.png', 'alt' => 'la porte du coffre-fort', 'class' => 'enigmelieu'],
                ['type' => 'paragraphs', 'paragraphs' => [
                    "Le coffre-fort s'ouvre, vous laissant découvrir son contenu : un petit coffret, une <span class=\"mdp\">vieille clé</span> rouillée et une pièce de monnaie.",
                ]],
                ['type' => 'linked_image', 'src' => 'assets/img/secrets/coffret.png', 'alt' => 'un petit coffret ouvragé', 'class' => 'enigme'],
                ['type' => 'linked_image', 'src' => 'assets/img/secrets/oldcle.png', 'alt' => 'une vieille clé', 'class' => 'enigme'],
                ['type' => 'linked_image', 'src' => 'assets/img/secrets/di.png', 'alt' => 'une pièce représentant un vieil homme', 'class' => 'enigme'],
                ['type' => 'paragraphs', 'paragraphs' => [
                    "Vous prenez la petite pièce et l'examinez de plus près. Elle représente le visage d'un vieil homme à la barbe fournie.",
                    "Vous la mettez dans votre poche ainsi que la clé.",
                ]],
            ],
            'actions' => [['label' => "Ajouter à l'inventaire.", 'name' => 'action', 'value' => 'take_safe_items', 'class' => 'action']],
        ],
        'safe_coffret' => [
            'audio' => null,
            'blocks' => [
                ['type' => 'linked_image', 'src' => 'assets/img/secrets/coffret.png', 'alt' => 'un petit coffret ouvragé', 'class' => 'enigme'],
                ['type' => 'paragraphs', 'paragraphs' => [
                    "Vous vous intéressez alors au coffret.",
                    "Il semble fermé et ne comporte pas de serrure visible. Sur la façade se trouvent 5 cavités circulaires.",
                    "Vous le prenez également avec vous.",
                ]],
            ],
            'actions' => [['label' => "Ajouter à l'inventaire.", 'name' => 'action', 'value' => 'take_coffret', 'class' => 'action']],
        ],
        'safe_empty' => [
            'audio' => null,
            'blocks' => [
                ['type' => 'image', 'src' => 'assets/img/secrets/coffrefort.png', 'alt' => 'la porte du coffre-fort', 'class' => 'enigmelieu'],
                ['type' => 'paragraphs', 'paragraphs' => [
                    "Manifestement, vous avez trouvé tout ce qu'il y avait d'intéressant dans ce coffre.",
                    "Vous pouvez étudier le coffret si vous le voulez.",
                ]],
            ],
            'actions' => [
                ['label' => 'Étudier le coffret.', 'name' => 'action', 'value' => 'study_coffret', 'class' => 'action'],
                ['label' => 'Retour.', 'name' => 'action', 'value' => 'retour', 'class' => 'action'],
            ],
        ],
    ],
];
