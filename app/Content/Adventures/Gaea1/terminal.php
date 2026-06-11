<?php

use App\Services\Adventures\Support\Content;

return [
    'variants' => [
        'entry' => [
            'blocks' => [
                Content::narrative('gaea1/terminal#entry'),
            ],
            'actions' => [
                Content::action('suivant.', 'continue_terminal'),
            ],
        ],
        'blocked_door' => [
            'blocks' => [
                Content::narrative('gaea1/terminal#blocked_door'),
            ],
            'actions' => [
                Content::action('retourner fouiller le hangar.', 'search_tool'),
            ],
        ],
        'pry_door' => [
            'blocks' => [
                Content::narrative('gaea1/terminal#pry_door'),
            ],
            'actions' => [
                Content::action('observer le plan.', 'observe_plan'),
            ],
        ],
        'revisit' => [
            'blocks' => [
                Content::narrative('gaea1/terminal#entry'),
            ],
        ],
    ],
];
