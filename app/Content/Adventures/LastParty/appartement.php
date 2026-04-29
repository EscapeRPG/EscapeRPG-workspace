<?php

return [
    'variants' => [
        'computer' => [
            'audio' => null,
            'blocks' => [
                [
                    'type' => 'paragraphs',
                    'paragraphs' => [
                        "Comment pourriez-vous vous connecter à votre compte Faceeebook ?",
                    ],
                ],
            ],
            'hint' => [
                'levels' => [
                    [
                        'paragraphs' => [
                            "Essayez de trouver un accès à internet.",
                        ],
                    ],
                    [
                        'paragraphs' => [
                            "Vous ne pouvez pas aller sur Faceeebook sur votre téléphone.",
                        ],
                    ],
                    [
                        'paragraphs' => [
                            "Outre votre téléphone, quel appareil vous permettrait de vous connecter sur internet ?",
                        ],
                    ],
                ],
                'answer' => [
                    'paragraphs' => [
                        "Cliquez sur l'ordinateur, sur le bureau.",
                    ],
                ],
            ],
            'actions' => [],
        ],
        'drawer' => [
            'audio' => null,
            'blocks' => [
                [
                    'type' => 'paragraphs',
                    'paragraphs' => [
                        "Votre carnet doit être quelque part dans l'appartement.",
                    ],
                ],
            ],
            'hint' => [
                'levels' => [
                    [
                        'paragraphs' => [
                            "Heureusement, vous n'avez pas énormément d'affaires et vous êtes du genre à les ranger.",
                        ],
                    ],
                    [
                        'paragraphs' => [
                            "Pour plus de simplicité, vous avez rangé votre carnet au plus proche de l'endroit où vous en auriez besoin.",
                        ],
                    ],
                    [
                        'paragraphs' => [
                            "Votre carnet est rangé tout près de votre ordinateur.",
                        ],
                    ],
                ],
                'answer' => [
                    'paragraphs' => [
                        "Fouillez dans les tiroirs du bureau.",
                    ],
                ],
            ],
            'actions' => [],
        ],
        'photos' => [
            'audio' => null,
            'blocks' => [
                [
                    'type' => 'paragraphs',
                    'paragraphs' => [
                        "Vous devriez inspecter votre appareil photo.",
                    ],
                ],
            ],
            'actions' => [],
        ],
    ],
];
