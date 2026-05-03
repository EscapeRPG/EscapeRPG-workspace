<?php

return [
    'variants' => [
        'intro' => [
            'audio' => null,
            'blocks' => [
                [
                    'type' => 'paragraphs',
                    'paragraphs' => [
                        "Vous allumez votre appareil photo et allez directement consulter la galerie.<br>Il semble que vous ayez pris pas mal de photos hier soir, mais cela ne vous ramène aucun souvenir...",
                        "Sur les différents clichés, vos amis <i>- et vous sur les quelques photos où vous apparaissez -</i> semblez passer un bon moment. Vous ne voyez rien d'alarmant.",
                        "Jusqu'à ce que...",
                    ],
                ],
            ],
            'actions' => [
                ['label' => 'Suivant.', 'name' => 'action', 'value' => 'inspect_gallery', 'class' => 'action'],
            ],
        ],
        'photo_clue' => [
            'audio' => null,
            'blocks' => [
                [
                    'type' => 'paragraphs',
                    'paragraphs' => [
                        "Sur l'une des photos prises dans le salon, où était regroupée la plupart des gens, vous remarquez un homme que vous ne connaissez pas fixant l'objectif, un petit sourire ourlant ses lèvres.",
                        "Vous continuez dans la galerie pour voir les photos précédentes, à la recherche de cet homme et finissez par tomber sur un cliché où vous le voyez en train de glisser quelque chose... dans la poche intérieure de votre veste !",
                        "De quoi peut-il bien s'agir ?",
                        "Vous décidez d'en avoir le cœur net et d'aller vérifier dans les poches de votre veste, accrochée dans le <span class=\"lieu\">couloir</span> de l'entrée.",
                    ],
                ],
            ],
            'hint' => [
                'levels' => [
                    [
                        'paragraphs' => [
                            "Vous êtes actuellement en train d'examiner votre appareil photo et cherchez à vous rendre dans le couloir.",
                        ],
                    ],
                    [
                        'paragraphs' => [
                            "Le couloir est un lieu, comme une adresse. À quel endroit pourriez-vous en entrer une ?",
                        ],
                    ],
                    [
                        'paragraphs' => [
                            "N'hésitez pas à consulter les <a href=\"/index#bloc3\" target=\"_blank\" rel=\"noreferrer\">règles</a> pour voir comment vous en sortir.",
                        ],
                    ],
                ],
                'answer' => [
                    'paragraphs' => [
                        "Rendez-vous sur <a href=\"" . url('/aventures/lastparty/couloir') . "\">le lien du couloir</a>.",
                    ],
                ],
            ],
            'actions' => [],
        ],
    ],
];
