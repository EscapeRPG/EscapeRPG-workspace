<?php

use App\Services\Adventures\Support\Content;
use App\Services\Adventures\Support\NarrativeText;

return [
    'variants' => [
        'default' => [
            'blocks' => [
                Content::partial('adventures/gaea1/manuel', [
                    'markdown' => NarrativeText::raw('gaea1/manuel'),
                ]),
            ],
            'scripts' => ['assets/js/adventures/gaea1/manuel.js'],
        ],
    ],
];
