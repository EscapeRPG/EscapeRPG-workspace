<?php

use App\Services\Adventures\Support\Content;

return [
    'variants' => [
        'unknown_stars' => [
            'blocks' => [
                Content::narrative('avent/enroute#unknown_stars'),
                Content::partial('adventures/avent/interactive', ['interactive' => 'sky_canvas']),
            ],
            'actions' => [Content::action('RETOUR.', 'search_room')],
            'scripts' => ['assets/js/adventures/avent/draw.js'],
        ],
        'search_sky_card' => [
            'blocks' => [
                Content::narrative('avent/enroute#search_sky_card'),
                Content::partial('adventures/avent/interactive', ['interactive' => 'sky_card_search']),
            ],
            'hint' => Content::hint('avent/hints#sky_card'),
        ],
        'sky_card_found' => [
            'blocks' => [Content::narrative('avent/enroute#sky_card_found'), Content::html('<span class="turn-card">Retournez la carte numéro 3.</span>')],
            'actions' => [Content::action('RETOUR.', 'return_canvas')],
        ],
        'draw_prompt' => [
            'blocks' => [
                Content::narrative('avent/enroute#draw_prompt'),
                Content::partial('adventures/avent/interactive', ['interactive' => 'sky_canvas']),
            ],
            'actions' => [Content::ask('VALIDER.', 'destination', 'submit_destination')],
            'scripts' => ['assets/js/adventures/avent/draw.js'],
            'hint' => Content::hint('avent/hints#destination'),
        ],
        'password_wrong' => [
            'blocks' => [
                Content::narrative('avent/enroute#password_wrong'),
                Content::partial('adventures/avent/interactive', ['interactive' => 'sky_canvas']),
            ],
            'actions' => [Content::ask('VALIDER.', 'destination', 'submit_destination')],
            'scripts' => ['assets/js/adventures/avent/draw.js'],
            'hint' => Content::hint('avent/hints#destination'),
        ],
        'success' => [
            'audio' => 'assets/sounds/avent/bipssifflement.mp3',
            'blocks' => [Content::narrative('avent/enroute#success')],
            'actions' => [Content::action('BIP BOUP !', 'travel')],
        ],
    ],
];
