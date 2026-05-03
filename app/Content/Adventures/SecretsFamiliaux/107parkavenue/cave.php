<?php

return [
    'variants' => [
        'step_0' => [
            'audio' => null,
            'blocks' => [
                ['type' => 'linked_image', 'src' => 'assets/img/secrets/pellcave.png', 'alt' => 'cave du docteur Pellington', 'class' => 'enigme'],
                ['type' => 'paragraphs', 'paragraphs' => [
                    "En arrivant dans la cave, vous sentez une odeur de brûlé.",
                    "Vous descendez l'escalier et entrez dans la salle de la chaudière.",
                    "Avec horreur, vous faites une macabre découverte : le docteur Pellington est affalé sur une chaise faisant face au fourneau, un trou béant dans le crâne et un revolver resté accroché dans sa main pendante. Le mur à côté de lui est recouvert de sang.",
                    "Il semblerait que le pauvre homme se soit donné la mort peu de temps avant votre arrivée.",
                    "Vous déglutissez avec peine et vous approchez pour trouver un mot sur le sol, griffonné à la hâte. Les derniers mots de Pellington :",
                ]],
                ['type' => 'linked_image', 'src' => 'assets/img/secrets/aveux.png', 'alt' => 'les aveux du docteur Pellington', 'class' => 'enigme'],
                ['type' => 'paragraphs', 'paragraphs' => [
                    "Vous prenez la note avec vous.",
                ]],
            ],
            'actions' => [
                ['label' => "Ajouter à l'inventaire.", 'name' => 'action', 'value' => 'take_aveux', 'class' => 'action'],
            ],
        ],
        'piece' => [
            'audio' => null,
            'blocks' => [
                ['type' => 'paragraphs', 'paragraphs' => [
                    "Dans la chaudière, vous apercevez les restes calcinés d'un livre à la couverture de cuir d'un aspect étrange dont vous arrivez avec peine à lire le titre : Necronomicon.",
                    "Vous voyez aussi dans le foyer des notes traitant des expériences menées par William, votre oncle.",
                    "Vous éteignez le feu aussi vite que possible et essayez d'extraire les documents mais ceux-ci sont malheureusement beaucoup trop abîmés pour en tirer quoi que ce soit à présent.",
                    "Cependant, un petit éclat de lumière au milieu des braises encore rougeoyantes attire votre regard.",
                    "Vous écartez les morceaux incandescents et trouvez une nouvelle pièce que vous empochez aussitôt.",
                ]],
                ['type' => 'linked_image', 'src' => 'assets/img/secrets/se.png', 'alt' => 'pièce avec un serpent', 'class' => 'enigme'],
            ],
            'actions' => [
                ['label' => "Ajouter à l'inventaire.", 'name' => 'action', 'value' => 'take_piece', 'class' => 'action'],
            ],
        ],
        'finished' => [
            'audio' => null,
            'blocks' => [
                ['type' => 'paragraphs', 'paragraphs' => [
                    "Vous semblez avoir trouvé ce que vous cherchiez ici, mais vous pouvez continuer à fouiller la maison de Pellington si vous le désirez, avant de retourner au <span class=\"lieu\">manoir</span>.",
                ]],
            ],
            'actions' => [
                ['label' => 'Retour au manoir.', 'name' => 'action', 'value' => 'return_manor', 'class' => 'action'],
            ],
        ],
        'done' => [
            'audio' => null,
            'blocks' => [
                ['type' => 'paragraphs', 'paragraphs' => [
                    "Vous semblez avoir trouvé ce que vous cherchiez ici, mais vous pouvez continuer à fouiller la maison de Pellington si vous le désirez, avant de retourner au <span class=\"lieu\">manoir</span>.",
                ]],
            ],
            'actions' => [
                ['label' => 'Retour au manoir.', 'name' => 'action', 'value' => 'return_manor', 'class' => 'action'],
            ],
        ],
    ],
];
