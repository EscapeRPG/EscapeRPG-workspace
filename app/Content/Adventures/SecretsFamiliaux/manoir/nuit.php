<?php

return [
    'variants' => [
        'step_0' => [
            'audio' => 'assets/sounds/secrets/bruitviolent.mp3',
            'blocks' => [
                [
                    'type' => 'paragraphs',
                    'paragraphs' => [
                        "Alors que vous étiez endormi, un bruit violent vous réveille.
                        Hébété, vous peinez à émerger de votre sommeil et à vous lever.<br>
                        Vous sortez de la chambre pour essayer de savoir ce qu'il se passe lorsque vous êtes soudain pris de nausées :
                        l'odeur qui règne dans le manoir depuis votre arrivée est beaucoup plus forte ce soir.",
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
            'audio' => 'assets/sounds/secrets/voiturepart.mp3',
            'blocks' => [
                [
                    'type' => 'paragraphs',
                    'paragraphs' => [
                        "Tentant de vous retenir de vomir, vous vous dirigez vers le hall du manoir lorsque vous apercevez un homme au pied de l'escalier.
                        Celui-ci tient plusieurs choses entre ses bras, manifestement dérobées dans le manoir.
                        Mais le manque de lumière vous empêche de voir quoi précisément.<br>
                        Lorsqu'il vous voit, il se précipite vers la porte d'entrée et sort du manoir en courant.",
                        "Vous le prenez aussitôt en chasse, mais l'intrus a trop d'avance sur vous.",
                        "Avant que vous n'ayez eu le temps de l'attraper, il saute dans une voiture grise dont le moteur tournait encore et démarre en trombe.",
                    ],
                ],
            ],
            'actions' => [
                [
                    'label' => 'Suivant.',
                    'name' => 'action',
                    'value' => 'suivant2',
                    'class' => 'action',
                ],
            ],
        ],
        'step_2' => [
            'audio' => null,
            'blocks' => [
                [
                    'type' => 'paragraphs',
                    'paragraphs' => [
                        "Vous vous rendez alors compte que les chiens de Gaspard sont terriblement silencieux et que ce dernier ne semble pas être réveillé.<br>
                        Ne pouvant rien faire de plus pour le moment et commençant à sentir le froid mordant vous fouetter le corps, vous retournez à l'intérieur de la demeure.",
                        "Lorsque vous arrivez dans le hall d'entrée, vous apercevez un petit objet sur le sol.<br>
                        En vous baissant pour le ramasser, vous vous rendez compte qu'il s'agit d'une pièce, manifestement tombée lorsque l'intrus s'est enfui.",
                    ],
                ],
                [
                    'type' => 'image',
                    'src' => 'assets/img/secrets/po.png',
                    'alt' => 'pièce avec une pomme',
                    'class' => 'enigme',
                ],
                [
                    'type' => 'paragraphs',
                    'paragraphs' => [
                        "Vous la mettez dans votre poche.",
                    ],
                ],
            ],
            'actions' => [
                [
                    'label' => 'Suivant.',
                    'name' => 'action',
                    'value' => 'suivant3',
                    'class' => 'action',
                ],
            ],
        ],
        'step_3' => [
            'audio' => null,
            'blocks' => [
                [
                    'type' => 'paragraphs',
                    'paragraphs' => [
                        "Par acquis de consience, vous faites un rapide tour de la maison pour tenter de savoir ce que l'intrus a pu emporter avec lui, mais il semblerait que toutes les pièces de la maison soient telles que vous les avez laissées la veille au soir.",
                        "Votre intuition vous souffle que l'intrus a réussi, d'une manière ou d'une autre, à entrer dans le <span class=\"lieu\">bureau</span> de votre oncle pour y dérober ses précieux documents.",
                        "Frustré, vous décidez d'attendre le matin pour appeler le poste de police d'Arkham et mettre fin à cette situation qui n'a que trop duré !",
                    ],
                ],
            ],
            'actions' => [
                [
                    'label' => 'Attendre le matin.',
                    'name' => 'action',
                    'value' => 'attendre',
                    'class' => 'action',
                ],
            ],
        ],
    ],
];
