<?php

return [
    'variants' => [
        'found' => [
            'audio' => 'assets/sounds/lastparty/tiroir.mp3',
            'blocks' => [
                ['type' => 'linked_image', 'src' => 'assets/img/lastparty/carnet.png', 'alt' => 'carnet', 'class' => 'enigme'],
                [
                    'type' => 'paragraphs',
                    'paragraphs' => [
                        "Dans les tiroirs du bureau, vous trouvez un carnet contenant l'intégralité de vos mots de passe sur internet.",
                    ],
                ],
            ],
            'actions' => [
                ['label' => 'Prendre.', 'name' => 'action', 'value' => 'take_notebook', 'class' => 'action'],
            ],
        ],
        'acquired' => [
            'audio' => null,
            'blocks' => [
                [
                    'type' => 'paragraphs',
                    'paragraphs' => [
                        "Vous prenez le carnet avec vous.",
                    ],
                ],
            ],
            'actions' => [
                ['label' => 'Retour.', 'name' => 'action', 'value' => 'back_to_room', 'class' => 'action'],
            ],
        ],
    ],
];
