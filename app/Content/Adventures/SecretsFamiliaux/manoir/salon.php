<?php

return [
    'variants' => [
        'step_0' => [
            'audio' => null,
            'blocks' => [
                [
                    'type' => 'paragraphs',
                    'paragraphs' => [
                        "Le grand salon semble tel que dans vos souvenirs, bien que cela fasse des années que vous n'êtes pas venu ici.<br>
                        Un feu de cheminée réchauffe agréablement la pièce.",
                    ],
                ],
            ],
            'actions' => [
                [
                    'label' => 'Chercher.',
                    'name' => 'salon',
                    'value' => 'chercher',
                    'class' => 'ask',
                ],
            ],
        ],
        'step_1' => [
            'audio' => null,
            'blocks' => [
                [
                    'type' => 'paragraphs',
                    'paragraphs' => [
                        "Il n'y a rien ici en rapport avec ce que vous cherchez.",
                    ],
                ],
            ],
            'actions' => [
                [
                    'label' => 'Chercher.',
                    'name' => 'salon',
                    'value' => 'chercher',
                    'class' => 'ask',
                ],
            ],
        ],
        'step_2' => [
            'audio' => null,
            'blocks' => [
                [
                    'type' => 'paragraphs',
                    'paragraphs' => [
                        "Vous observez autour de vous, en quête du fameux tableau décrit dans la note de Pellington, mais il semblerait qu'il ait été décroché.<br>
                        Vous vous souvenez en effet qu'il y avait un tableau sur la cheminée, mais il ne reste maintenant plus qu'un espace vide où il devait être accroché auparavant.",
                        "Téona arrive juste à ce moment.",
                    ],
                ],
                [
                    'type' => 'dialogue',
                    'speaker' => [
                        'name' => 'Téona',
                        'portrait' => 'assets/img/secrets/teona.png',
                    ],
                    'paragraphs' => [
                        "Vous cherchez un tableau ?
                        En effet, il y en avait bien un au-dessus de la cheminée, mais votre oncle l'a détruit il y a quelques semaines.<br>
                        Je crois savoir qu'il a jeté les <span class=\"mdp\">restes</span> à la <span class=\"lieu\">cave</span>.",
                    ],
                ],
            ],
            'actions' => [
                [
                    'label' => 'Continuer.',
                    'name' => 'action',
                    'value' => 'finish_tableau',
                    'class' => 'action',
                ],
            ],
        ],
        'found_after' => [
            'audio' => null,
            'blocks' => [
                [
                    'type' => 'paragraphs',
                    'paragraphs' => [
                        "Il semble ne plus rien y avoir d'utile par ici.",
                    ],
                ],
            ],
            'actions' => [],
        ],
    ],
];
