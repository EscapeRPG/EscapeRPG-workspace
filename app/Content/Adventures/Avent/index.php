<?php

use App\Services\Adventures\Support\Content;

return [
    'variants' => [
        'landing' => [
            'blocks' => [
                Content::dialogue('Narrateur', 'assets/img/narrateur.png', 'avent/index#landing'),
                Content::dialogue('Narrateur', 'assets/img/narrateur.png', 'avent/index#landing_2'),
            ],
            'actions' => [
                Content::action('NOUVELLE PARTIE.', 'new_game'),
                Content::action('CHARGER UNE PARTIE.', 'load_game'),
            ],
        ],
        'introduction' => [
            'blocks' => [
                Content::narrative('avent/index#introduction'),
                Content::dialogue('Père', 'assets/img/avent/pere.png', 'avent/index#father_intro'),
                Content::narrative('avent/index#after_father'),
            ],
            'actions' => [Content::action('SUIVANT.', 'continue_intro')],
        ],
    ],
];
