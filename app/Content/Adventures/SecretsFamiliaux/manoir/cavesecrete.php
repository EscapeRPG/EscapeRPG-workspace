<?php

$inspectionAction = [
    'label' => 'Inspecter.',
    'name' => 'cave',
    'value' => 'inspect',
    'class' => 'ask',
];

$inspectionBlocks = [
    ['type' => 'paragraphs', 'paragraphs' => [
        "Vous jetez un nouveau regard sur la pièce autour de vous.",
    ]],
];

return [
    'variants' => [
        'step_0' => [
            'audio' => null,
            'blocks' => [['type' => 'paragraphs', 'paragraphs' => [
                "En arrivant au bas de l'échelle, vos pieds foulent un sol de terre battue.",
                "L'odeur est à peine supportable ici et vous devez faire un terrible effort pour ne pas vous évanouir. Vous ne pouvez vous empêcher de vous demander ce qui peut produire une telle puanteur... et savez que vous n'allez pas tarder à le découvrir.",
                "Vous avancez un peu pour arriver dans une petite salle carrée et c'est là que l'horreur vous frappe.",
            ]]],
            'actions' => [['label' => 'Suivant.', 'name' => 'action', 'value' => 'suivant', 'class' => 'action']],
        ],
        'step_1' => [
            'audio' => null,
            'blocks' => [['type' => 'paragraphs', 'paragraphs' => [
                'Allongés sur des tables de pierre contre les murs, des <span class="mdp">cadavres</span> humains à l\'état de décomposition avancée pourrissent, le ventre ouvert comme si on avait procédé à une autopsie, ou des choses bien pires que vous osez à peine imaginer. La plupart ont vu leurs organes retirés.',
                "Au centre de la pièce se trouve une énorme cuve en métal dont vous ne pouvez pas encore voir le contenu.",
                "Vous vous en approchez, chaque pas vous coûtant un effort surhumain.",
                "Vous atteignez la cuve et jetez un coup d'œil à son contenu.",
            ]]],
            'actions' => [['label' => 'Suivant.', 'name' => 'action', 'value' => 'suivant2', 'class' => 'action']],
        ],
        'step_2' => [
            'audio' => null,
            'blocks' => [
                ['type' => 'paragraphs', 'paragraphs' => [
                    'Baignant dans un <span class="mdp">liquide jaunâtre</span>, vous trouvez le corps d\'un homme mort manifestement depuis très longtemps, à en juger par son état.',
                    "Votre regard se pose sur son visage et vous ne pouvez vous empêcher de tituber en arrière en criant : l'homme entreposé ici n'est autre que votre père, mort depuis des années !",
                    "Dans votre précipitation pour vous éloigner de la cuve, vous heurtez un bureau de fortune en bois et vous y accrochez fermement pour ne pas chanceler.",
                    "Vous remarquez alors les quelques feuilles posées dessus.",
                ]],
                ['type' => 'linked_image', 'src' => 'assets/img/secrets/journal2.png', 'alt' => "la deuxième page du journal de l'oncle William", 'class' => 'enigme'],
                ['type' => 'linked_image', 'src' => 'assets/img/secrets/journal5.png', 'alt' => "la cinquième page du journal de l'oncle William", 'class' => 'enigme'],
                ['type' => 'linked_image', 'src' => 'assets/img/secrets/journal6.png', 'alt' => "la sixième page du journal de l'oncle William", 'class' => 'enigme'],
                ['type' => 'linked_image', 'src' => 'assets/img/secrets/journal7.png', 'alt' => "la septième page du journal de l'oncle William", 'class' => 'enigme'],
                ['type' => 'linked_image', 'src' => 'assets/img/secrets/journal8.png', 'alt' => "la huitième page du journal de l'oncle William", 'class' => 'enigme'],
                ['type' => 'linked_image', 'src' => 'assets/img/secrets/journal9.png', 'alt' => "la neuvième page du journal de l'oncle William", 'class' => 'enigme'],
            ],
            'actions' => [['label' => "Ajouter à l'inventaire.", 'name' => 'action', 'value' => 'take_journals', 'class' => 'action']],
        ],
        'step_3' => [
            'audio' => null,
            'blocks' => [['type' => 'paragraphs', 'paragraphs' => [
                "Vous venez de trouver les pages manquantes du journal de votre oncle. Ce qu'elles contiennent vous donneront sans doute des cauchemars pour le restant de vos jours, si la folie ne vous emporte pas avant, mais vous ne pouvez vous empêcher de continuer à les lire.",
            ]]],
            'actions' => [['label' => 'Suivant.', 'name' => 'action', 'value' => 'suivant3', 'class' => 'action']],
        ],
        'step_4' => [
            'audio' => null,
            'blocks' => [
                ['type' => 'paragraphs', 'paragraphs' => [
                    "Ainsi, votre oncle pratiquait des expériences visant à réanimer des corps morts.",
                    "La masse gélatineuse observée là-haut semblerait pouvoir remplacer les organes défectueux pour redonner vie aux personnes récemment décédées, grâce à leur étonnante faculté à créer des appendices divers.",
                    "Le docteur Pellington a ainsi pu faire revenir votre oncle il y a plusieurs années, mais votre père était mort depuis trop longtemps pour que cela soit possible pour lui.",
                    "Les dernières pages du journal sont rédigées dans une écriture grossière, montrant la folie grandissant dans l'esprit de votre oncle.",
                ]],
                ...$inspectionBlocks,
            ],
            'actions' => [$inspectionAction],
        ],
        'liquidejaunatre' => [
            'audio' => null,
            'blocks' => [
                ['type' => 'paragraphs', 'paragraphs' => [
                    "Ce liquide semble être du formol, un produit permettant de conserver des corps morts sur une longue période. Votre oncle espérait ainsi pouvoir maintenir l'état de votre père le temps de parfaire sa technique et de le réanimer.",
                ]],
                ...$inspectionBlocks,
            ],
            'actions' => [$inspectionAction],
        ],
        'cadavres' => [
            'audio' => null,
            'blocks' => [['type' => 'paragraphs', 'paragraphs' => [
                "En examinant de plus près les corps disposés çà-et-là, vous en trouvez un dont le ventre ouvert a été vidé pour y remplacer les organes par un shoggoth, le nom donné par votre oncle à la masse protoplasmique.",
                "Celle-ci est parfaitement immobile et semble « morte », mais...",
                "Mais vous ne parvenez pas à rassembler vos pensées de façon cohérente après toutes les horreurs par lesquelles vous venez de passer. Quelque chose semble cependant vous hanter et vous pressentez que cela revêt une importance capitale.",
            ]]],
            'actions' => [['label' => 'Réfléchir calmement.', 'name' => 'action', 'value' => 'think', 'class' => 'action']],
        ],
        'unknown' => [
            'audio' => null,
            'blocks' => [
                ['type' => 'paragraphs', 'paragraphs' => [
                    "Êtes-vous sûr de savoir ce que vous cherchez ici ?",
                ]],
                ...$inspectionBlocks,
            ],
            'actions' => [$inspectionAction],
        ],
    ],
];
