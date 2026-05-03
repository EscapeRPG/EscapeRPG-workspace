<?php

return [
    'variants' => [
        'step_0' => [
            'audio' => null,
            'blocks' => [
                [
                    'type' => 'linked_image',
                    'src' => 'assets/img/secrets/rdc.png',
                    'alt' => 'rez-de-chaussée',
                    'class' => 'enigme',
                ],
                [
                    'type' => 'paragraphs',
                    'paragraphs' => [
                        "À votre entrée, vous sentez une bonne odeur émanant de la cuisine. Cependant, sous celle-ci, vous sentez des relents terribles d'une <span class=\"mdp\">odeur</span> plus pernicieuse.",
                        "Avant que vous n'ayez le temps d'y réfléchir un peu, une vieille domestique s'avance.",
                    ],
                ],
                [
                    'type' => 'dialogue',
                    'speaker' => [
                        'name' => 'Monica',
                        'portrait' => 'assets/img/secrets/monica.png',
                    ],
                    'paragraphs' => [
                        "Ah ! Vous devez être M. Bastian. Je vous en prie, un bon repas vous attend dans la salle à manger.",
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
                        "Vous vous installez au bout de l'immense table à manger et on vous apporte de quoi vous restaurer.<br>
                        Vous vous sentez très seul dans cette immense habitation, les domestiques mangeant dans la cuisine.",
                        "Il est assez tard lorsque vous terminez le repas et vous sentez la fatigue vous gagner, mais peut-être désirez-vous effectuer un tour du manoir avant d'aller dormir ?",
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
                    'value' => 'dormir',
                    'class' => 'action',
                ],
            ],
        ],
    ],
];
