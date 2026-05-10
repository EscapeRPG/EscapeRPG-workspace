<?php

use App\Services\Adventures\Support\Content;

return [
    'variants' => [
        'step_0' => [
            'audio' => null,
            'blocks' => [
                Content::narrative('secretsfamiliaux/15hamiltonstreet#step_0'),
            ],
            'actions' => [
                Content::action('Suivant.', 'suivant'),
            ],
        ],
        'step_1' => [
            'audio' => 'assets/sounds/secrets/chiens.mp3',
            'blocks' => [
                Content::narrative('secretsfamiliaux/15hamiltonstreet#step_1'),
            ],
            'actions' => [
                Content::action('Suivant.', 'suivant2'),
            ],
        ],
        'step_2' => [
            'audio' => null,
            'blocks' => [
                Content::narrative('secretsfamiliaux/15hamiltonstreet#step_2_intro'),
                Content::dialogue('Gaspard', 'assets/img/secrets/gaspard.png', 'secretsfamiliaux/15hamiltonstreet#step_2_gaspard'),
            ],
            'actions' => [
                Content::action('Le suivre.', 'suivre'),
            ],
        ],
        'step_3' => [
            'audio' => null,
            'scripts' => [
                'assets/js/adventures/secrets_familiaux/ouverturemanoir.js',
            ],
            'blocks' => [
                Content::narrative('secretsfamiliaux/15hamiltonstreet#step_3_intro'),
                Content::dialogue('Gaspard', 'assets/img/secrets/gaspard.png', 'secretsfamiliaux/15hamiltonstreet#step_3_gaspard'),
                Content::narrative('secretsfamiliaux/15hamiltonstreet#step_3_door'),
                Content::interactiveImage(
                    'assets/img/secrets/porteentree.png',
                    "la porte d'entrée du manoir",
                    [
                        Content::hotspot('', 'cle1', 'assets/img/secrets/cle1.png', 'clé 1'),
                        Content::hotspot('', 'cle2', 'assets/img/secrets/cle2.png', 'clé 2'),
                        Content::hotspot('', 'cle3', 'assets/img/secrets/cle3.png', 'clé 3'),
                        Content::hotspot('', 'cle4', 'assets/img/secrets/cle4.png', 'clé 4', ['attributes' => ['data-open-manor' => true]]),
                        Content::hotspot('', 'cle5', 'assets/img/secrets/cle5.png', 'clé 5'),
                    ],
                    'enigmelieu secrets-porte',
                    ['form_class' => 'secrets-cles'],
                ),
            ],
            'actions' => [],
        ],
    ],
];
