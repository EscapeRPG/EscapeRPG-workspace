<?php

return [
    'variants' => [
        'default' => [
            'audio' => null,
            'intro' => "Vous avez 3 nouveaux messages de votre ami Axel.",
            'threads' => [
                [
                    'min_step' => 1,
                    'type' => 'incoming',
                    'speaker' => 'Axel',
                    'messages' => [
                        "Jonathan, t'es réveillé ?",
                        "Ohé ??",
                        "Mec, réponds !!",
                    ],
                ],
                [
                    'min_step' => 2,
                    'type' => 'reply',
                    'messages' => [
                        "Qu'est-ce qu'il y a ?",
                    ],
                ],
                [
                    'min_step' => 2,
                    'type' => 'incoming',
                    'speaker' => 'Axel',
                    'messages' => [
                        "Ah, t'es là ! Mec, t'as vu le message de Juliette sur sa page ?",
                    ],
                ],
                [
                    'min_step' => 3,
                    'type' => 'reply',
                    'messages' => [
                        "???",
                    ],
                ],
                [
                    'min_step' => 3,
                    'type' => 'incoming',
                    'speaker' => 'Axel',
                    'messages' => [
                        "Va voir directement sur son profil Faceeebook, ce sera plus simple !",
                    ],
                ],
            ],
            'conclusion' => [
                'min_step' => 3,
                'paragraphs' => [
                    "Pour des raisons qui vous échappent, votre téléphone vous a toujours refusé l'accès à Faceeebook.
                    Il va donc falloir trouver un autre moyen de vous y rendre.",
                ],
            ],
            'actions' => [],
        ],
        'after_faceeebook' => [
            'audio' => 'assets/sounds/lastparty/message.mp3',
            'intro' => "Un nouveau message d'Axel sur votre téléphone.",
            'threads' => [
                [
                    'min_step' => 0,
                    'type' => 'incoming',
                    'speaker' => 'Axel',
                    'messages' => [
                        "Alors, t'as vu ?",
                    ],
                ],
                [
                    'min_step' => 4,
                    'type' => 'reply',
                    'messages' => [
                        "Ouais.",
                    ],
                ],
                [
                    'min_step' => 4,
                    'type' => 'incoming',
                    'speaker' => 'Axel',
                    'messages' => [
                        "C'est quoi ce délire ? Tu te souviens de quelque chose, toi ?",
                    ],
                ],
                [
                    'min_step' => 5,
                    'type' => 'reply',
                    'messages' => [
                        "Non.",
                    ],
                ],
                [
                    'min_step' => 5,
                    'type' => 'incoming',
                    'speaker' => 'Axel',
                    'messages' => [
                        "Moi non plus !",
                        "C'est hyper chelou cette histoire !",
                        "Mais dis-moi, toi qui aimes prendre des photos tout le temps, tu aurais pas quelque chose sur ton appareil ?",
                    ],
                ],
            ],
            'actions' => [],
        ],
    ],
];
