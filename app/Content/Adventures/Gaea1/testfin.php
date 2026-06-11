<?php

use App\Services\Adventures\Support\Content;

return [
    'variants' => [
        'default' => [
            'blocks' => [
                Content::partial('adventures/gaea1/testfin'),
            ],
            'scripts' => ['assets/js/adventures/gaea1/verrouillage.js'],
        ],
    ],
];
