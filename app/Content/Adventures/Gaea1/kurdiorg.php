<?php

use App\Services\Adventures\Support\Content;

return [
    'variants' => [
        'blocked' => ['blocks' => [Content::narrative('gaea1/kurdiorg#blocked')]],
        'entry' => ['blocks' => [Content::narrative('gaea1/kurdiorg#entry')]],
        'revisit' => ['blocks' => [Content::narrative('gaea1/kurdiorg#entry')]],
        'invalid_access' => ['blocks' => [Content::narrative('gaea1/station#invalid_access')]],
    ],
];
