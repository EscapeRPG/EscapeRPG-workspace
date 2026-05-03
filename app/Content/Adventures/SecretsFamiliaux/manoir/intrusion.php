<?php

return [
    'variants' => [
        'step_0' => [
            'audio' => null,
            'blocks' => [
                [
                    'type' => 'paragraphs',
                    'paragraphs' => [
                        "La fenêtre de la salle à manger est ouverte alors qu'il n'est clairement pas la saison pour aérer,
                        malgré l'<span class=\"mdp\">odeur</span> qui règne dans le manoir.
                        Quelqu'un a dû passer par là.<br>
                        Vous inspectez un peu mieux la pièce et apercevez des traces de boue sur le sol, traversant la salle à manger.",
                        "En remontant la piste, vous voyez que le rôdeur, qui s'est bel et bien introduit chez vous, s'est dirigé juste à côté de l'endroit où vous étiez en train de manger, avant de se diriger vers la cuisine puis de ressortir par la fenêtre.",
                    ],
                ],
            ],
            'actions' => [
                [
                    'label' => 'Suivant.',
                    'name' => 'action',
                    'value' => 'suivant',
                    'class' => 'action',
                ],
            ],
        ],
        'step_1' => [
            'audio' => null,
            'blocks' => [
                [
                    'type' => 'paragraphs',
                    'paragraphs' => [
                        "Par précaution, vous préférez ne pas toucher aux restes de votre repas et d'avertir les domestiques.",
                        "Vous avez le reste de la journée devant vous pour décider de fouiller le manoir et faire l'inventaire des biens de votre oncle,
                        avant de retourner vous coucher dans votre <span class=\"lieu\">chambre</span>.",
                    ],
                ],
            ],
            'actions' => [
                [
                    'label' => 'Faire un tour.',
                    'name' => 'action',
                    'value' => 'tour',
                    'class' => 'action',
                ],
                [
                    'label' => 'Aller dormir.',
                    'name' => 'action',
                    'value' => 'nuit',
                    'class' => 'action',
                ],
            ],
        ],
    ],
];
