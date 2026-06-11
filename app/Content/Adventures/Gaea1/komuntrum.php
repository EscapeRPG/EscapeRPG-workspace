<?php

use App\Services\Adventures\Support\Content;

return [
    'variants' => [
        'locked' => ['blocks' => [Content::narrative('gaea1/komuntrum#locked')]],
        'entry' => ['blocks' => [Content::narrative('gaea1/komuntrum#entry')]],
        'revisit' => ['blocks' => [Content::narrative('gaea1/komuntrum#entry')]],
        'invalid_access' => ['blocks' => [Content::narrative('gaea1/station#invalid_access')]],
    ],
];
