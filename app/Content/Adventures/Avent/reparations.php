<?php

use App\Services\Adventures\Support\Content;

return [
    'variants' => [
        'sapence_found' => [
            'blocks' => [
                Content::dialogue('Arthur', 'assets/img/avent/arthur.png', 'avent/reparations#sapence_found'),
            ],
            'actions' => [Content::action('SUIVANT.', 'continue')],
        ],
        'place_sapence' => [
            'blocks' => [
                Content::narrative('avent/reparations#instructions'),
                Content::partial('adventures/avent/interactive', ['interactive' => 'sapence']),
            ],
            'scripts' => [
                'assets/js/adventures/dragDropPuzzle.js',
                'assets/js/adventures/avent/dragdrop.js',
            ],
            'hint' => Content::hint('avent/hints#sapence'),
        ],
        'place_sapence_wrong' => [
            'blocks' => [
                Content::narrative('avent/reparations#place_wrong'),
                Content::narrative('avent/reparations#instructions'),
                Content::partial('adventures/avent/interactive', ['interactive' => 'sapence']),
            ],
            'scripts' => [
                'assets/js/adventures/dragDropPuzzle.js',
                'assets/js/adventures/avent/dragdrop.js',
            ],
            'hint' => Content::hint('avent/hints#sapence'),
        ],
        'calibrate' => [
            'audio' => 'assets/sounds/avent/etape1.mp3',
            'blocks' => [
                Content::narrative('avent/reparations#instructions'),
                Content::partial('adventures/avent/interactive', ['interactive' => 'calibrate']),
            ],
            'scripts' => ['assets/js/adventures/avent/rangecheck.js'],
            'hint' => Content::hint('avent/hints#calibrate'),
        ],
        'calibrate_wrong' => [
            'blocks' => [
                Content::narrative('avent/reparations#place_wrong'),
                Content::narrative('avent/reparations#instructions'),
                Content::partial('adventures/avent/interactive', ['interactive' => 'calibrate']),
            ],
            'scripts' => ['assets/js/adventures/avent/rangecheck.js'],
            'hint' => Content::hint('avent/hints#calibrate'),
        ],
        'reservoir' => [
            'audio' => 'assets/sounds/avent/etape2.mp3',
            'blocks' => [
                Content::narrative('avent/reparations#reservoir'),
                Content::partial('adventures/avent/interactive', ['interactive' => 'reservoir']),
            ],
            'hint' => Content::hint('avent/hints#reservoir'),
        ],
        'reservoir_wrong' => [
            'blocks' => [
                Content::narrative('avent/reparations#reservoir_wrong'),
                Content::narrative('avent/reparations#reservoir'),
                Content::partial('adventures/avent/interactive', ['interactive' => 'reservoir']),
            ],
            'hint' => Content::hint('avent/hints#reservoir'),
        ],
        'gift' => [
            'audio' => 'assets/sounds/avent/etape3.mp3',
            'blocks' => [
                Content::narrative('avent/reparations#gift'),
                Content::dialogue('Arthur', 'assets/img/avent/arthur.png', 'avent/reparations#arthur_gift'),
                Content::narrative('avent/reparations#label'),
            ],
            'actions' => [Content::action('OUVRIR LE CADEAU.', 'open_gift')],
        ],
    ],
];
