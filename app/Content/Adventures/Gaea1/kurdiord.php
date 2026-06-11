<?php

use App\Services\Adventures\Support\Content;

return [
    'variants' => [
        'blocked' => ['blocks' => [Content::narrative('gaea1/kurdiord#blocked')]],
        'entry' => ['blocks' => [Content::narrative('gaea1/kurdiord#entry')]],
        'revisit' => ['blocks' => [Content::narrative('gaea1/kurdiord#entry')]],
        'invalid_access' => ['blocks' => [Content::narrative('gaea1/station#invalid_access')]],
    ],
];
