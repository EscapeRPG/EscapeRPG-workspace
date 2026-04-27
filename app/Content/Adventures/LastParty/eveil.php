<?php

return [
    'variants' => [
        'introduction' => [
            'audio' => 'assets/sounds/lastparty/reveil.mp3',
            'blocks' => [
                [
                    'type' => 'paragraphs',
                    'paragraphs' => [
                        "9h du matin. Le réveil sonne.
                        Vous émergez péniblement du sommeil. Vous avez mal au crâne.
                        Après tout, quoi de plus étonnant après une soirée chez Juliette ?",
                        "Mais que s'y est-il passé, déjà ? Vous avez beau chercher dans votre mémoire, rien ne vous revient.
                        Le néant depuis que vous êtes parti pour vous rendre là-bas. La soirée a dû être bien arrosée !",
                    ],
                ],
            ],
            'actions' => [
                [
                    'label' => 'Suivant.',
                    'name' => 'action',
                    'value' => 'continue_intro',
                    'class' => 'action',
                ],
            ],
        ],
        'room' => [
            'audio' => 'assets/sounds/lastparty/message.mp3',
            'blocks' => [
                [
                    'type' => 'paragraphs',
                    'paragraphs' => [
                        "Vous avez encore du mal à vous réveiller complètement.",
                        "Cette perte de mémoire vous semble tout de même très étrange.
                        Même lors de soirées particulièrement arrosées, vous n'avez jamais eu de trou noir comme ça
                        et vous vous souvenez toujours d'au moins une partie de la soirée.",
                        "Mais là, rien. Comment pourriez-vous faire pour vous souvenir ?",
                    ],
                ],
            ],
            'hint' => [
                'levels' => [
                    [
                        'paragraphs' => [
                            "Peut-être devriez-vous essayer de trouver le moyen de contacter l'un de vos proches ?",
                        ],
                    ],
                    [
                        'paragraphs' => [
                            "Il semble d'ailleurs que quelqu'un ait récemment tenté de vous joindre.",
                        ],
                    ],
                    [
                        'paragraphs' => [
                            "Votre téléphone doit bien être quelque part.",
                        ],
                    ],
                ],
                'answer' => [
                    'paragraphs' => [
                        "Cliquez sur le téléphone se trouvant sur la table de nuit.",
                    ],
                ],
            ],
            'actions' => [],
        ],
    ],
];
