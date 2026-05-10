<?php

use App\Services\Adventures\Support\Content;

return [
    'variants' => [
        'landing' => [
            'audio' => null,
            'blocks' => [
                Content::dialogue('Narrateur', 'assets/img/narrateur.png', 'secretsfamiliaux/index#landing'),
            ],
            'actions' => [
                Content::action('NOUVELLE PARTIE.', 'new_game'),
                Content::action('CHARGER UNE PARTIE.', 'load_game'),
            ],
        ],
        'introduction' => [
            'audio' => null,
            'blocks' => [
                Content::narrative('secretsfamiliaux/index#introduction'),
            ],
            'actions' => [
                Content::action('Entrer.', 'enter_cemetery'),
            ],
        ],
    ],
];
