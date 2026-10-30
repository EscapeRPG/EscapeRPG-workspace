<?php

use App\Services\Adventures\Support\Content;

return [
    'label' => 'Cabine du Commandant',
    'flow' => [
        'default' => 'locked',
        'actions' => [],
    ],
    'variants' => [
        'locked' => ['blocks' => [Content::narrative('gaea1/scenes/komuntrum/text#locked')]],
        'entry' => ['blocks' => [Content::narrative('gaea1/scenes/komuntrum/text#entry')]],
        'revisit' => ['blocks' => [Content::narrative('gaea1/scenes/komuntrum/text#entry')]],
        'invalid_access' => ['blocks' => [Content::narrative('gaea1/station#invalid_access')]],
    ],
];
