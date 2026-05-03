<?php

return [
    'variants' => [
        'step_0' => [
            'audio' => null,
            'blocks' => [
                [
                    'type' => 'linked_image',
                    'src' => 'assets/img/secrets/etage.png',
                    'alt' => 'étage',
                    'class' => 'enigme',
                ],
                [
                    'type' => 'paragraphs',
                    'paragraphs' => [
                        "Au premier étage se trouve l'accès à la <span class=\"lieu\">chambre de William</span>, votre défunt oncle.<br>
                        Juste en face se trouve son <span class=\"lieu\">bureau</span> de travail, dans lequel il ne vous a jamais laissé mettre les pieds lorsque vous étiez enfant.<br>
                        De l'autre côté de l'escalier se trouve la <span class=\"lieu\">bibliothèque</span>, qu'il faut traverser pour accéder aux 4 <span class=\"lieu\">chambres</span>, dont l'une vous attend pour passer la nuit.",
                    ],
                ],
            ],
            'actions' => [],
        ],
    ],
];
