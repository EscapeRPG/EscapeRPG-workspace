<?php

return [
    'variants' => [
        'step_0' => [
            'audio' => null,
            'blocks' => [
                [
                    'type' => 'linked_image',
                    'src' => 'assets/img/secrets/pellrdc.png',
                    'alt' => 'rez-de-chaussée de la maison du docteur Pellington',
                    'class' => 'enigme',
                ],
                [
                    'type' => 'paragraphs',
                    'paragraphs' => [
                        "Vous êtes au rez-de-chaussée de la maison de Pellington.",
                        "La porte arrière par laquelle vous êtes arrivé donne sur une cuisine,
                        laquelle débouche aussitôt sur une grande salle à manger où de nombreux meubles servent au docteur à entreposer sa vaisselle.",
                        "Un petit couloir vous permet d'accéder aux toilettes d'un côté et au <span class=\"lieu\">salon</span> de l'autre,
                        où se trouvent également les escaliers menant au <span class=\"lieu\">premier étage</span> et à la <span class=\"lieu\">cave</span>.",
                        "Enfin, en vous dirigeant vers la porte d'entrée principale,
                        vous devez passer par un <span class=\"lieu\">vestibule</span> servant à déposer les vêtements de Pellington et de ses éventuels patients.",
                    ],
                ],
            ],
            'actions' => [],
        ],
    ],
];
