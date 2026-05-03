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
                        "Depuis le hall d'entrée où vous vous trouvez, un grand escalier mène à l'<span class=\"lieu\">étage</span>.<br>
                        Sur votre gauche se trouve la salle à manger et la cuisine.<br>
                        À droite, vous pouvez vous rendre au <span class=\"lieu\">salon</span> ainsi qu'à l'<span class=\"lieu\">aile des domestiques</span>.",
                        "Vous pouvez utiliser le menu de navigation à gauche pour vous rendre où vous le désirez.",
                    ],
                ],
            ],
            'actions' => [],
        ],
        'after_pellington' => [
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
                        "Vous êtes de retour au manoir, encore troublé par les découvertes faites dans la maison du docteur Pellington.<br>
                        Vous ne savez pas ce que sont les embryons évoqués dans sa lettre d'adieux, mais il semblerait que ce soit ici que vous puissiez en apprendre plus.",
                        "Un tour du manoir s'impose donc à vous.",
                    ],
                ],
            ],
            'actions' => [],
        ],
    ],
];
