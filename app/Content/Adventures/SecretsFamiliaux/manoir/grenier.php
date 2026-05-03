<?php

return [
    'variants' => [
        'night' => ['audio' => null, 'blocks' => [
            ['type' => 'image', 'src' => 'assets/img/secrets/vuegreniernuit.png', 'alt' => 'grenier', 'class' => 'enigmelieu'],
            ['type' => 'paragraphs', 'paragraphs' => [
                "Le grenier occupe tout le dernier étage de l'aile Est et est rempli de tout un tas d'affaires.<br>
                Il pourrait y avoir des choses intéressantes ici, mais vous y reviendrez plus tard, lorsque vous serez moins fatigué et qu'il y aura plus de lumière.",
            ]],
        ], 'actions' => []],
        'step_0' => ['audio' => null, 'blocks' => [
            ['type' => 'interactive_image', 'src' => 'assets/img/secrets/vuegrenier.png', 'alt' => 'grenier', 'class' => 'enigmelieu', 'hotspots' => [
                ['id' => 'piano', 'src' => 'assets/img/secrets/pianoclosed.png', 'alt' => 'un vieux piano', 'value' => 'piano'],
            ]],
            ['type' => 'paragraphs', 'paragraphs' => [
                "Le grenier occupe tout le dernier étage de l'aile Est et est rempli de tout un tas d'affaires.<br>
                Maintenant que le jour est levé, vous pouvez envisager de fouiller un peu plus dans toutes ces affaires. Peut-être y trouverez-vous quelque chose d'intérêt ?",
            ]],
        ], 'actions' => []],
        'piano' => ['audio' => null, 'blocks' => [
            ['type' => 'interactive_image', 'src' => 'assets/img/secrets/vuegrenier.png', 'alt' => 'grenier', 'class' => 'enigmelieu', 'hotspots' => [
                ['id' => 'grenierpiece', 'src' => 'assets/img/secrets/grenierpiece.png', 'alt' => 'une pièce sur le clavier', 'value' => 'piece'],
            ]],
            ['type' => 'paragraphs', 'paragraphs' => [
                "Vous ouvrez le clavier du piano.
                En appuyant sur l'une des touches, vous entendez une note discordante retentir.
                Cet instrument mériterait une bonne révision.",
            ]],
        ], 'actions' => []],
        'step_1' => ['audio' => null, 'blocks' => [
            ['type' => 'linked_image', 'src' => 'assets/img/secrets/ev.png', 'alt' => 'pièce avec une tête de femme', 'class' => 'enigme'],
            ['type' => 'paragraphs', 'paragraphs' => [
                "Sur le clavier du piano, vous trouvez une petite pièce.<br>
                Cela ne ressemble pas à une pièce de monnaie, car elle ne semble pas avoir de valeur indiquée dessus.
                Peut-être sert-elle à autre chose ?",
                "En attendant d'en savoir plus, vous la mettez dans votre poche.",
            ]],
        ], 'actions' => [['label' => "Ajouter à l'inventaire.", 'name' => 'action', 'value' => 'take_piece', 'class' => 'action']]],
        'step_2' => ['audio' => null, 'blocks' => [['type' => 'paragraphs', 'paragraphs' => [
            "Il semblerait que vous n'ayez plus rien à trouver par ici.",
        ]]], 'actions' => [['label' => 'Retour.', 'name' => 'action', 'value' => 'retour', 'class' => 'action']]],
        'done' => ['audio' => null, 'blocks' => [
            ['type' => 'image', 'src' => 'assets/img/secrets/vuegrenier.png', 'alt' => 'grenier', 'class' => 'enigmelieu'],
            ['type' => 'paragraphs', 'paragraphs' => [
                "Il semblerait qu'il n'y ait plus rien d'utile par ici.",
            ]],
        ], 'actions' => []],
    ],
];
