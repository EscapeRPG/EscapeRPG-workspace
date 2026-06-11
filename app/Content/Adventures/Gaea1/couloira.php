<?php

use App\Services\Adventures\Support\Content;

return [
    'variants' => [
        'entry' => [
            'blocks' => [
                Content::narrative('gaea1/couloira#entry_intro'),
                Content::narrative('gaea1/couloira#entry_east_unknown') + ['visible_if' => Content::stateFalsy('hvisited')],
                Content::narrative('gaea1/couloira#entry_east_known') + ['visible_if' => Content::stateTruthy('hvisited')],
                Content::narrative('gaea1/couloira#entry_west_unknown') + ['visible_if' => Content::stateFalsy('nvisited')],
                Content::narrative('gaea1/couloira#entry_west_known') + ['visible_if' => Content::stateTruthy('nvisited')],
            ],
        ],
        'revisit' => [
            'blocks' => [
                Content::narrative('gaea1/couloira#revisit'),
            ],
        ],
        'event' => [
            'blocks' => [
                Content::narrative('gaea1/couloira#event'),
            ],
        ],
    ],
];
