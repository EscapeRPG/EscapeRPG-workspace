<?php

use App\Services\Adventures\Support\Content;

return [
    'label' => 'Couloir B',
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
        'blocked' => [
            'blocks' => [
                Content::narrative('gaea1/scenes/kurdiorb/text#blocked'),
            ],
        ],
        'entry' => [
            'blocks' => [
                Content::narrative('gaea1/scenes/kurdiorb/text#entry'),
            ],
        ],
        'revisit' => [
            'blocks' => [
                Content::narrative('gaea1/scenes/kurdiorb/text#entry'),
            ],
        ],
    ],
];
