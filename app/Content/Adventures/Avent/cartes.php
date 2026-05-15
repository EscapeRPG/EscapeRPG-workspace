<?php

use App\Services\Adventures\Support\Content;

return [
    'variants' => [
        'default' => [
            'blocks' => [
                Content::narrative('avent/cartes#default'),
                Content::cardDeck(),
            ],
            'scripts' => ['assets/js/adventures/avent/cartes.js'],
        ],
    ],
];
