<?php

use App\Services\Adventures\Support\Content;

return [
    'variants' => [
        'entry' => [
            'blocks' => [
                Content::narrative('gaea1/kurdiorf#entry'),
            ],
        ],
        'revisit' => [
            'blocks' => [
                Content::narrative('gaea1/kurdiorf#revisit_unknown') + ['visible_if' => Content::stateFalsy('dvisited')],
                Content::narrative('gaea1/kurdiorf#revisit_known') + ['visible_if' => Content::stateTruthy('dvisited')],
            ],
        ],
    ],
];
