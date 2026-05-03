<?php

return [
    'variants' => [
        'step_0' => [
            'audio' => null,
            'blocks' => [
                ['type' => 'linked_image', 'src' => 'assets/img/secrets/pellpremier.png', 'alt' => 'premier étage de la maison du docteur Pellington', 'class' => 'enigme'],
                ['type' => 'paragraphs', 'paragraphs' => [
                    "Le premier étage se compose de 4 pièces, outre l'espace contenant les escaliers descendant au <span class=\"lieu\">rez-de-chaussée</span> et montant au <span class=\"lieu\">deuxième</span>.",
                    "La pièce jouxtant directement l'escalier est assez spacieuse et sert de débarras au docteur. Vous fouillez rapidement l'endroit mais il ne semble rien y avoir qui vous permettrait d'avancer dans votre enquête.",
                    "Un couloir mène ensuite à une chambre d'ami, où vous trouvez un lit sommaire ainsi qu'une armoire vide pour que les visiteurs de Pellington puissent déposer leurs affaires. Rien d'intéressant ici.",
                    "Vous arrivez ensuite dans la <span class=\"lieu\">chambre</span> du maître de maison, collée à sa <span class=\"lieu\">salle de bain</span>.",
                ]],
            ],
            'actions' => [],
        ],
    ],
];
