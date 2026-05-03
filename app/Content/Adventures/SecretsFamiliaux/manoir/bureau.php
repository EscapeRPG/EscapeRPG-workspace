<?php

$bureauDoor = ['type' => 'interactive_image', 'src' => 'assets/img/secrets/portebureau.png', 'alt' => 'porte du bureau', 'class' => 'enigmelieu', 'hotspots' => [
    ['id' => 'symbureau', 'src' => 'assets/img/secrets/symbur.png', 'alt' => 'un étrange symbole gravé sur la porte', 'value' => 'symbole'],
]];
$openBureauScript = ['assets/js/adventures/secrets_familiaux/ouverturebureau.js'];

return [
    'variants' => [
        'step_0' => [
            'audio' => null,
            'scripts' => $openBureauScript,
            'blocks' => [
                $bureauDoor,
                ['type' => 'paragraphs', 'paragraphs' => [
                    "Lorsque vous essayez d'ouvrir le <span class=\"mdp\">bureau</span> de travail de votre oncle, vous vous rendez compte que la porte est fermée.<br>
                    Vous vous apprêtez à sortir le jeu de clés donné par Gaspard lorsque vous constatez qu'il n'y a aucune serrure.",
                    "Cette porte doit être scellée par un autre moyen.",
                ]],
            ],
            'actions' => [
                [
                    'label' => 'Ouvrir.',
                    'name' => 'phr',
                    'value' => 'ouvrir',
                    'class' => 'ask',
                ],
            ],
        ],
        'step_1' => [
            'audio' => null,
            'scripts' => $openBureauScript,
            'blocks' => [
                $bureauDoor,
                ['type' => 'paragraphs', 'paragraphs' => [
                    "Un <span class=\"mdp\">symbole</span> est gravé dans le bois de la porte.<br>
                    Vous n'avez aucune idée de sa signification, mais peut-être pourriez-vous poser des questions aux domestiques ?",
                ]],
            ],
            'actions' => [
                [
                    'label' => 'Ouvrir.',
                    'name' => 'phr',
                    'value' => 'ouvrir',
                    'class' => 'ask',
                ],
            ],
        ],
        'step_3' => [
            'audio' => null,
            'scripts' => $openBureauScript,
            'blocks' => [
                $bureauDoor,
                ['type' => 'paragraphs', 'paragraphs' => [
                    "Rien ne se passe.",
                ]],
            ],
            'actions' => [
                [
                    'label' => 'Ouvrir.',
                    'name' => 'phr',
                    'value' => 'ouvrir',
                    'class' => 'ask',
                ],
            ],
        ],
    ],
];
