<?php

use App\Services\Adventures\Support\Content;

return [
    'label' => 'Hall principal',
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
        'default' => 'default',
        'actions' => [
            'observe_plan' => [
                'next_scene' => 'plan',
                'variant' => 'default',
                'state' => [
                    'visitestation' => true,
                    'plancurrent' => 'l',
                ],
            ],
        ],
    ],
    'variants' => [
        'first_entry' => [
            'blocks' => [
                Content::narrative('gaea1/scenes/hall/text#first_entry'),
            ],
            'actions' => [
                Content::action('observer le plan.', 'observe_plan'),
            ],
        ],
        'default' => [
            'blocks' => [
                Content::narrative('gaea1/scenes/hall/text#default'),
            ],
        ],
    ],
];
