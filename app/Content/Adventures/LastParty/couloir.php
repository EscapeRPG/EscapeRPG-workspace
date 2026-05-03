<?php

return [
    'variants' => [
        'card' => [
            'audio' => null,
            'blocks' => [
                ['type' => 'linked_image', 'src' => 'assets/img/lastparty/cartedevisite.png', 'alt' => 'carte de visite', 'class' => 'enigme'],
                [
                    'type' => 'paragraphs',
                    'paragraphs' => [
                        "Vous fouillez fébrilement les poches de votre veste, quand soudain vos doigts se posent sur quelque chose.",
                    ],
                ],
            ],
            'actions' => [
                ['label' => 'Prendre.', 'name' => 'action', 'value' => 'take_card', 'class' => 'action'],
            ],
        ],
        'contact' => [
            'audio' => null,
            'blocks' => [
                [
                    'type' => 'paragraphs',
                    'paragraphs' => [
                        "Une carte de visite, appartenant à un certain Darren Braun. De qui peut-il bien s'agir ?<br>La carte ne contient que très peu d'informations...",
                        "Vous essayez de vous souvenir, mais le visage de cet individu vous reste inconnu.",
                    ],
                ],
            ],
            'hint' => [
                'levels' => [
                    [
                        'paragraphs' => [
                            "Essayez de contacter ce mystérieux Darren Braun.",
                        ],
                    ],
                    [
                        'paragraphs' => [
                            "L'une des informations présentes sur la carte devrait vous aider à avancer.",
                        ],
                    ],
                    [
                        'paragraphs' => [
                            "Peut-être vous faudra-t-il utiliser un outil externe à EscapeRPG.",
                        ],
                    ],
                ],
                'answer' => [
                    'paragraphs' => [
                        "Envoyez un mail à <a href=\"mailto:whosdarrenbraun@gmail.com\">whosdarrenbraun@gmail.com</a>. Essayez de lui demander qui il est ou ce que vous voulez !",
                        "La réponse vous donnera le lien <span class=\"mdp\">/aventures/lastparty/ebaubi</span>.",
                    ],
                ],
            ],
            'actions' => [],
        ],
    ],
];
