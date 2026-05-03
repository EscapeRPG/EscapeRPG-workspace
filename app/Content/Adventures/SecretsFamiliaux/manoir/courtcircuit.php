<?php

return [
    'variants' => [
        'step_0' => [
            'audio' => null,
            'blocks' => [['type' => 'paragraphs', 'paragraphs' => [
                "Alors que vous tirez dessus, un arc électrique apparaît entre deux tiges de métal au sommet de la cuve que vous venez d'activer.",
                "Cependant, l'effet dure à peine une seconde avant que le courant dans la maison ne se coupe brutalement, plongeant la pièce dans l'obscurité.",
            ]]],
            'actions' => [['label' => 'Suivant.', 'name' => 'action', 'value' => 'start_puzzle', 'class' => 'action']],
        ],
        'step_1' => [
            'audio' => null,
            'blocks' => [['type' => 'paragraphs', 'paragraphs' => [
                "Le moral déjà bien affecté par les derniers événements, vous manquez de peu de paniquer mais réussissez à vous ressaisir.",
                "À tâtons, vous finissez par trouver un petit boîtier sur le mur, que vous ouvrez pour découvrir un système archaïque de câblages électriques. Si vous désirez retrouver la lumière, il va falloir remettre de l'ordre dans tout ça.",
            ]]],
            'actions' => [['label' => 'Réinitialiser.', 'name' => 'action', 'value' => 'reset_circuit', 'class' => 'action']],
            'scripts' => [
                'assets/js/adventures/dragDropPuzzle.js',
                'assets/js/adventures/secrets_familiaux/dragdropelec.js',
            ],
        ],
        'step_2' => [
            'audio' => null,
            'blocks' => [['type' => 'paragraphs', 'paragraphs' => [
                "Le système électrique semble à nouveau stable.",
            ]]],
            'actions' => [['label' => 'Retour.', 'name' => 'action', 'value' => 'retour', 'class' => 'action']],
        ],
    ],
];
