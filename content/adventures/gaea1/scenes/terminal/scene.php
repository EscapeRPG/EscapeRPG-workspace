<?php

use App\Services\Adventures\Support\Content;

return [
    'label' => 'Terminal',
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
        'actions' => [
            'continue_terminal' => [
                'variant' => 'blocked_door',
            ],
            'search_tool' => [
                'next_scene' => 'hangar',
                'variant' => 'search_tool',
            ],
            'force_hall_door' => [
                'variant' => 'pry_door',
                'state' => [
                    'plancurrent' => 'l',
                    'oxygene' => 80,
                    'premiereobservation' => true,
                    'hall_visited' => true,
                    'lvisited' => true,
                ],
            ],
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
        'entry' => [
            'blocks' => [
                Content::narrative('gaea1/scenes/terminal/text#entry'),
            ],
            'actions' => [
                Content::action('suivant.', 'continue_terminal'),
            ],
        ],
        'blocked_door' => [
            'blocks' => [
                Content::narrative('gaea1/scenes/terminal/text#blocked_door'),
            ],
            'actions' => [
                Content::action('retourner fouiller le hangar.', 'search_tool'),
            ],
        ],
        'pry_door' => [
            'blocks' => [
                Content::narrative('gaea1/scenes/terminal/text#pry_door'),
            ],
            'actions' => [
                Content::action('observer le plan.', 'observe_plan'),
            ],
        ],
        'revisit' => [
            'blocks' => [
                Content::narrative('gaea1/scenes/terminal/text#entry'),
            ],
        ],
    ],
];
