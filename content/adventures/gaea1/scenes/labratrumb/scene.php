<?php

use App\Services\Adventures\Support\Content;

return [
    'label' => 'Laboratoire B',
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
        'default' => 'entry',
        'actions' => [],
    ],
    'variants' => [
        'entry' => ['blocks' => [Content::narrative('gaea1/scenes/labratrumb/text#entry')]],
        'revisit' => ['blocks' => [Content::narrative('gaea1/scenes/labratrumb/text#entry')]],
        'invalid_access' => ['blocks' => [Content::narrative('gaea1/station#invalid_access')]],
    ],
];
