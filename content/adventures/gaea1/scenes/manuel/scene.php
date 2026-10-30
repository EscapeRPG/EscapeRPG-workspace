<?php

use App\Services\Adventures\Support\Content;
use App\Services\Adventures\Support\NarrativeText;

return [
    'label' => 'Manuel de pilote',
    'flow' => [
        'default' => 'default',
        'actions' => [],
    ],
    'variants' => [
        'default' => [
            'blocks' => [
                Content::partial('adventures/gaea1/manuel', [
                    'markdown' => NarrativeText::raw('gaea1/scenes/manuel/text'),
                ]),
            ],
            'scripts' => ['assets/js/adventures/gaea1/manuel.js'],
        ],
    ],
];
