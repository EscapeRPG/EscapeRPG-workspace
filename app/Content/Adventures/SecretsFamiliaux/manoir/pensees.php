<?php

$thoughtsImage = ['type' => 'image', 'src' => 'assets/img/secrets/pensees.gif', 'alt' => 'pensées diffuses', 'class' => 'enigmelieu'];
$thoughtsAction = [
    'label' => 'Rassembler ses pensées.',
    'name' => 'thoughts',
    'value' => 'answer',
    'class' => 'ask',
];
$thoughtsHint = [
    'levels' => [
        [
            'paragraphs' => [
                "Vous êtes troublé et vos pensées sont diffuses. Une capture d'écran pourrait vous permettre d'y voir plus clair. Les couleurs peuvent vous aider, en suivant l'ordre du spectre lumineux.",
            ],
        ],
        [
            'paragraphs' => [
                "Essayez de composer une phrase avec ce que vous voyez.",
            ],
        ],
        [
            'paragraphs' => [
                "Avez-vous également remarqué les petites croix ? Elles ont sans doute leur importance, l'utilisation d'un logiciel de traitement d'image serait le bienvenu pour les relier.",
            ],
        ],
    ],
    'answer' => [
        'paragraphs' => [
            'En reliant les points, on obtient le motif suivant :',
            '<div id="enigmepensees"><img src="' . asset('assets/img/secrets/penseesreponse.png') . '" alt="pensées réponse"></div>',
            'On peut y voir se dessiner le mot "oncle" !',
        ],
    ],
];

return [
    'variants' => [
        'default' => [
            'audio' => null,
            'blocks' => [
                $thoughtsImage,
            ],
            'actions' => [$thoughtsAction],
            'hint' => $thoughtsHint,
        ],
        'votreonclepeutrevenir' => [
            'audio' => null,
            'blocks' => [
                $thoughtsImage,
                ['type' => 'paragraphs', 'paragraphs' => [
                    "Vous commencez à y voir un peu plus clair, mais vous vous sentez encore troublé.",
                    "Essayez de réfléchir encore un peu calmement, quelque chose finira sans doute par se dessiner.",
                ]],
            ],
            'actions' => [$thoughtsAction],
            'hint' => $thoughtsHint,
        ],
        'unknown' => [
            'audio' => null,
            'blocks' => [
                $thoughtsImage,
                ['type' => 'paragraphs', 'paragraphs' => [
                    "Sans doute êtes-vous encore trop chamboulé par tous ces événements. Vous n'arrivez manifestement pas à penser correctement.",
                ]],
            ],
            'actions' => [$thoughtsAction],
        ],
        'oncle' => [
            'audio' => null,
            'blocks' => [['type' => 'paragraphs', 'paragraphs' => [
                "Votre oncle possède un shoggoth dans son corps qui pourrait chercher à s'échapper dans la nature !",
                "Les autres spécimens conservés ici semblent inactifs et piégés dans des cuves, ou les profondeurs de cette cave secrète, mais si le mot du docteur Pellington dit vrai alors laisser un shoggoth en liberté pourrait s'avérer dévastateur !",
                "Vous comprenez maintenant les raisons de la présence du médecin lors des funérailles, le pauvre fou essayait de protéger l'humanité d'une terrible menace !",
                "La seule personne au courant de ce danger étant à présent morte, il ne reste plus que vous pour essayer d'y mettre un terme ! Mais comment procéder ?",
                'Il semblerait qu\'il soit temps de retourner au <span class="lieu">cimetière</span>... !',
            ]]],
            'actions' => [],
        ],
    ],
];
