<?php

use App\Services\Adventures\Support\Content;

return [
    'variants' => [
        'blocked' => ['blocks' => [Content::narrative('gaea1/kurdiore#blocked')]],
        'entry' => ['blocks' => [Content::narrative('gaea1/kurdiore#entry')]],
        'revisit' => ['blocks' => [Content::narrative('gaea1/kurdiore#entry')]],
        'invalid_access' => ['blocks' => [Content::narrative('gaea1/station#invalid_access')]],
    ],
];
