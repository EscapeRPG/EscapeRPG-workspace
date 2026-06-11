<?php

use App\Services\Adventures\Support\Content;

return [
    'variants' => [
        'first_entry' => [
            'blocks' => [
                Content::narrative('gaea1/hall#first_entry'),
            ],
            'actions' => [
                Content::action('observer le plan.', 'observe_plan'),
            ],
        ],
        'default' => [
            'blocks' => [
                Content::narrative('gaea1/hall#default'),
            ],
        ],
    ],
];
