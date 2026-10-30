<?php

use App\Services\Adventures\Support\Content;

return [
    'label' => 'Couloir E',
    'map' => [
        'transitions' => [
            [
                'scene' => 'plan',
                'action' => 'sidebar:plan',
                'note' => 'Raccourci de sidebar, disponible pendant la visite de la station.',
            ],
        ],
    ],
    'flow' => [
        'default' => 'blocked',
        'actions' => [],
    ],
    'variants' => [
        'blocked' => ['blocks' => [Content::narrative('gaea1/scenes/kurdiore/text#blocked')]],
        'entry' => ['blocks' => [Content::narrative('gaea1/scenes/kurdiore/text#entry')]],
        'revisit' => ['blocks' => [Content::narrative('gaea1/scenes/kurdiore/text#entry')]],
        'invalid_access' => ['blocks' => [Content::narrative('gaea1/station#invalid_access')]],
    ],
];
