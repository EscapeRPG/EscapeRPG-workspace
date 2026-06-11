<?php

use App\Services\Adventures\Support\Content;

return [
    'variants' => [
        'entry' => ['blocks' => [Content::narrative('gaea1/kurdiorc#entry')]],
        'revisit' => ['blocks' => [Content::narrative('gaea1/kurdiorc#revisit')]],
        'invalid_access' => ['blocks' => [Content::narrative('gaea1/station#invalid_access')]],
    ],
];
