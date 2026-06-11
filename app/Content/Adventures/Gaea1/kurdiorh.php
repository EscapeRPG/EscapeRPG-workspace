<?php

use App\Services\Adventures\Support\Content;

return [
    'variants' => [
        'blocked' => ['blocks' => [Content::narrative('gaea1/kurdiorh#blocked')]],
        'entry' => ['blocks' => [Content::narrative('gaea1/kurdiorh#entry')]],
        'revisit' => ['blocks' => [Content::narrative('gaea1/kurdiorh#entry')]],
        'invalid_access' => ['blocks' => [Content::narrative('gaea1/station#invalid_access')]],
    ],
];
