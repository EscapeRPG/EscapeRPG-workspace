<?php

$coffretForm = [
    'label' => 'Regarder de plus près.',
    'name' => 'coffret',
    'value' => 'inspect_coffret',
    'class' => 'ask',
];

$codeHint = [
    'levels' => [
        [
            'paragraphs' => [
                "Avez-vous trouvé 5 éléments circulaires ? Sinon, inspectez les images de la chambre de William et du grenier.",
            ],
        ],
        [
            'paragraphs' => [
                "Vous devriez essayer de les regarder de plus près, ils contiennent sans doute des informations utiles.",
            ],
        ],
        [
            'paragraphs' => [
                "Chaque pièce comporte un fragment de code, récupérez-les et associez-les pour obtenir le code.",
            ],
        ],
    ],
    'answer' => [
        'paragraphs' => [
            'Les 5 pièces vous donnent le code "aeb6fcu2m8".',
        ],
    ],
];

$puzzleHint = [
    'levels' => [
        [
            'paragraphs' => [
                "Chaque phrase du coffret fait référence aux pièces que vous avez. Essayez de bien les identifier et tout devrait devenir plus clair.",
            ],
        ],
        [
            'paragraphs' => [
                "Le Père est le vieil homme, Dieu.<br>Les Amoureux sont le jeune homme et la jeune fille, Adam et Ève.<br>Le Mal est le serpent.<br>L'Objet du Péché est la pomme.",
            ],
        ],
        [
            'paragraphs' => [
                'Faites bien attention à la direction dans laquelle regardent chacun des personnages pour savoir où les placer. Par exemple, "le Père qui voit tout" doit être mis tout à droite pour voir l\'ensemble de la scène.',
            ],
        ],
    ],
    'answer' => [
        'paragraphs' => [
            'Les pièces sont à mettre dans cet ordre : Serpent - Pomme - Femme - Homme - Vieil homme.',
        ],
    ],
];

return [
    'variants' => [
        'missing' => [
            'audio' => null,
            'blocks' => [['type' => 'paragraphs', 'paragraphs' => [
                "Vous n'avez pas encore de coffret à étudier.",
            ]]],
            'actions' => [['label' => 'Retour.', 'name' => 'action', 'value' => 'retour', 'class' => 'action']],
        ],
        'closed' => [
            'audio' => null,
            'blocks' => [['type' => 'paragraphs', 'paragraphs' => [
                "Le petit coffret que vous avez trouvé dans le coffre-fort de votre oncle est fermé solidement et vous ne parvenez pas à l'ouvrir.",
                "Sur la façade, vous apercevez 5 cavités circulaires.",
            ]]],
            'actions' => [$coffretForm],
            'hint' => $codeHint,
        ],
        'wrong' => [
            'audio' => null,
            'blocks' => [['type' => 'paragraphs', 'paragraphs' => [
                "Quelque chose ne va pas. Avez-vous bien trouvé les 5 éléments à insérer ici ?",
            ]]],
            'actions' => [$coffretForm],
            'hint' => $codeHint,
        ],
        'puzzle' => [
            'audio' => null,
            'blocks' => [],
            'actions' => [['label' => 'Réinitialiser.', 'name' => 'action', 'value' => 'reset_coffret', 'class' => 'action']],
            'hint' => $puzzleHint,
            'scripts' => [
                'assets/js/adventures/dragDropPuzzle.js',
                'assets/js/adventures/secrets_familiaux/dragDropCoffret.js',
            ],
        ],
    ],
];
