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
                        "Vous désirez jouer à ce scénario avec une musique appropriée ?<br>
                        Je vous conseille de vous rendre sur
                        <a href=\"https://www.youtube.com/watch?v=7bW75OwVXZI&list=PLggiqSd087TSku31JHz90pWoQOooERZON\" target=\"_blank\" rel=\"noreferrer\">ce lien</a>
                        pour plus d'immersion !",
                        "Bonne aventure... et bonne chance !",
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
                        "Arkham, Massachusetts. Octobre 1940.",
                        "Vous êtes Bastian Deckard, un jeune inspecteur de police de Boston.
                        Il y a deux jours, vous avez reçu une missive indiquant que votre oncle, William Deckard, était décédé.",
                        "Les obsèques sont prévues ce soir à 18h et c'est pourquoi vous êtes revenu à Arkham.<br>
                        Votre père étant mort en 1917, vous êtes le dernier héritier de la famille Deckard
                        et c'est à vous que revient l'antique manoir familial, ainsi que toutes les affaires de feu votre oncle.<br>
                        Cela vous demandera un peu de temps pour organiser le tout et voir ce que vous comptez garder,
                        mais vous pourrez sans doute tirer un bon bénéfice de la revente de ses biens.",
                        "Vous êtes devant l'entrée du cimetière.",
                    ],
                ],
            ],
            'actions' => [
                [
                    'label' => 'Entrer.',
                    'name' => 'action',
                    'value' => 'enter_cemetery',
                    'class' => 'action',
                ],
            ],
        ],
    ],
];
