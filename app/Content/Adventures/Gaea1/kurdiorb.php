<?php

use App\Services\Adventures\Support\Content;

return [
    'variants' => [
        'blocked' => [
            'blocks' => [
                Content::narrative('gaea1/kurdiorb#blocked'),
            ],
        ],
        'entry' => [
            'blocks' => [
                Content::narrative('gaea1/kurdiorb#entry'),
            ],
        ],
        'revisit' => [
            'blocks' => [
                Content::narrative('gaea1/kurdiorb#entry'),
            ],
        ],
    ],
];
