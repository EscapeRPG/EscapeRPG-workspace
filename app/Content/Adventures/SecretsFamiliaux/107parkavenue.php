<?php

return [
    'variants' => [
        'step_0' => [
            'audio' => null,
            'blocks' => [
                [
                    'type' => 'paragraphs',
                    'paragraphs' => [
                        "Le docteur Pellington vit dans un quartier riche d'Arkham, dans une grande maison à 3 étages et flanquée d'autres maisons du même type sur les côtés.<br>
                        Vous sonnez à la porte et attendez pendant ce qui vous semble être une éternité, mais vous n'obtenez aucune réponse.",
                        "Las d'attendre, vous décidez de faire le tour de la maison pour voir s'il n'y a pas un accès par l'arrière.",
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
                        "Après un petit détour dans le quartier, vous trouvez un accès à un parc entre les résidences vous permettant d'accéder à l'entrée arrière de la maison.
                        En espérant qu'elle soit ouverte.",
                        "Vous vous hissez par-dessus la clôture en bois ceignant le jardin de Pellington et vous dirigez vers la porte.
                        Heureusement, celle-ci n'est pas fermée à clé et vous entrez à l'intérieur.",
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
                    'type' => 'linked_image',
                    'src' => 'assets/img/secrets/pellrdc.png',
                    'alt' => 'rez-de-chaussée',
                    'class' => 'enigme',
                ],
                [
                    'type' => 'paragraphs',
                    'paragraphs' => [
                        "Vous avancez dans le salon pour voir si quelqu'un se trouve ici, mais il ne semble y avoir personne.
                        Vous vous annoncez à haute voix au cas où le docteur se trouve à l'étage, mais n'obtenez toujours aucune réponse.",
                        "Tant pis, vous décidez de procéder directement à une fouille minutieuse de la maison pour tenter d'obtenir vous-mêmes des informations.",
                    ],
                ],
            ],
            'actions' => [
                [
                    'label' => 'Faire le tour.',
                    'name' => 'action',
                    'value' => 'tour',
                    'class' => 'action',
                ],
            ],
        ],
    ],
];
