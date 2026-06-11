<?php

use App\Services\Adventures\Support\Content;

return [
    'variants' => [
        'blocked' => ['blocks' => [Content::narrative('gaea1/drekrum#blocked')]],
        'entry' => ['blocks' => [Content::narrative('gaea1/drekrum#entry')]],
        'revisit' => ['blocks' => [Content::narrative('gaea1/drekrum#entry')]],
        'invalid_access' => ['blocks' => [Content::narrative('gaea1/station#invalid_access')]],
    ],
];
