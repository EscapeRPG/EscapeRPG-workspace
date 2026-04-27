<?php

return [
    'variants' => [
        'landing' => [
            'audio' => null,
            'blocks' => [
                [
                    'type' => 'dialogue',
                    'speaker' => [
                        'name' => 'Narrateur',
                        'portrait' => 'assets/img/narrateur.png',
                        'side' => 'left',
                    ],
                    'paragraphs' => [
                        "Vous désirez jouer à ce scénario avec une musique appropriée ?
                        Rendez-vous sur <a href='https://www.youtube.com/watch?v=zhxjTlN9o_w&list=PLggiqSd087TR2aMa8fw-ucSIqcZMX5EXI&index=1' target='_blank' rel='noreferrer'>ce lien</a>
                        pour plus d'immersion.",

                        "Bonne aventure à vous !",
                    ],
                ],
            ],
            'actions' => [
                [
                    'label' => 'NOUVELLE PARTIE.',
                    'name' => 'action',
                    'value' => 'new_game',
                    'class' => 'action',
                ],
                [
                    'label' => 'CHARGER UNE PARTIE.',
                    'name' => 'action',
                    'value' => 'load_game',
                    'class' => 'action',
                ],
            ],
        ],
        'introduction' => [
            'audio' => null,
            'blocks' => [
                [
                    'type' => 'paragraphs',
                    'paragraphs' => [
                        "Vous êtes Jonathan Le Tellier, un jeune homme de 23 ans.
                        Hier soir, vous avez participé à une fête organisée par l'une de vos amies, où vous vous êtes bien amusé.
                        <br>
                        Du moins, c'est ce que vous pensez...",

                        "Est-ce vraiment bien le cas ?",

                        "Vos souvenirs sont flous, vous n'arrivez pas à vous remémorer ce que vous avez fait là-bas.
                        Auriez-vous bu un peu trop d'alcool ?",
                    ],
                ],
            ],
            'actions' => [
                [
                    'label' => 'BIP BIP BIP !',
                    'name' => 'action',
                    'value' => 'continue_intro',
                    'class' => 'action',
                ],
            ],
        ],
    ],
];
