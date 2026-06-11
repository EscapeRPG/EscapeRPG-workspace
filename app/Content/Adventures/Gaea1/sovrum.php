<?php

use App\Services\Adventures\Support\Content;

return [
    'variants' => [
        'blocked' => ['blocks' => [Content::narrative('gaea1/sovrum#blocked')]],
        'entry' => ['blocks' => [Content::narrative('gaea1/sovrum#entry')]],
        'revisit' => ['blocks' => [Content::narrative('gaea1/sovrum#entry')]],
        'invalid_access' => ['blocks' => [Content::narrative('gaea1/station#invalid_access')]],
    ],
];
