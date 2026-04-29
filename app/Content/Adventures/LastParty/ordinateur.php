<?php

return [
    'variants' => [
        'missing_notebook' => [
            'audio' => null,
            'blocks' => [
                [
                    'type' => 'paragraphs',
                    'paragraphs' => [
                        "Mince ! Vous n'êtes pas connecté !",
                        "Vous vous souvenez que votre identifiant est <span class=\"mdp\">jonathan-lt</span> mais qu'en est-il du mot de passe ?<br>Avec tous les sites sur lesquels vous êtes inscrit, vous ne savez plus lequel vous avez choisi et votre ordinateur ne semble pas l'avoir enregistré.",
                        "Heureusement, vous avez pris soin de noter tous vos mots de passe dans un carnet. Mais où est-il rangé ? Vous devriez refaire un petit tour dans votre <span class=\"lieu\">appartement</span>.",
                    ],
                ],
            ],
            'actions' => [],
        ],
        'login' => [
            'audio' => 'assets/sounds/lastparty/ordinateur.mp3',
            'blocks' => [
                [
                    'type' => 'paragraphs',
                    'paragraphs' => [
                        "Mince ! Vous n'êtes pas connecté !",
                        "Votre identifiant est <span class=\"mdp\">jonathan-lt</span> mais le mot de passe n'a pas été enregistré. Heureusement, vous avez votre carnet avec vous, qui contient certainement l'information.",
                    ],
                ],
            ],
            'hint' => [
                'levels' => [
                    [
                        'paragraphs' => [
                            "Votre mot de passe doit être inscrit dans votre carnet, pour accéder à Faceeebook.",
                        ],
                    ],
                    [
                        'paragraphs' => [
                            "Ouvrez votre inventaire pour consulter votre carnet.",
                        ],
                    ],
                    [
                        'paragraphs' => [
                            "Il y a beaucoup de mots de passe, cherchez celui de Faceeebook.",
                        ],
                    ],
                ],
                'answer' => [
                    'paragraphs' => [
                        "D'après votre carnet, le mot de passe pour votre compte Faceeebook est \"party4ever\".",
                    ],
                ],
            ],
            'actions' => [],
        ],
        'connected' => [
            'audio' => null,
            'blocks' => [
                [
                    'type' => 'paragraphs',
                    'paragraphs' => [
                        "Bien ! Vous êtes maintenant connecté, mais votre fil d'actualités est bien rempli et il serait long et fastidieux de le parcourir jusqu'à trouver le dernier post de votre amie.",
                        "Vous devriez directement rechercher le profil de <span class=\"mdp\">Juliette</span>.",
                    ],
                ],
            ],
            'hint' => [
                'levels' => [
                    [
                        'paragraphs' => [
                            "Il faudrait trouver comment accéder facilement au profil de Juliette.",
                        ],
                    ],
                    [
                        'paragraphs' => [
                            "Il y a sans doute un endroit sur la page destiné à effectuer des recherches.",
                        ],
                    ],
                    [
                        'paragraphs' => [
                            "Consultez le haut de l'écran de Jonathan.",
                        ],
                    ],
                ],
                'answer' => [
                    'paragraphs' => [
                        "Tapez \"Juliette\" dans la bulle \"rechercher\" tout en haut à gauche de la page Faceeebook.",
                    ],
                ],
            ],
            'actions' => [],
        ],
        'juliette' => [
            'audio' => null,
            'blocks' => [
                [
                    'type' => 'paragraphs',
                    'paragraphs' => [
                        "Apparemment, vous n'êtes pas le seul à avoir des trous de mémoire. Mais que signifie tout cela ?",
                    ],
                ],
            ],
            'actions' => [],
        ],
    ],
];
