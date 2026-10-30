<?php

use App\Services\Adventures\Support\Content;

return [
    'label' => 'Couloir F',
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
        'entry' => [
            'blocks' => [
                Content::narrative('gaea1/scenes/kurdiorf/text#entry'),
            ],
        ],
        'revisit' => [
            'blocks' => [
                Content::narrative('gaea1/scenes/kurdiorf/text#revisit_unknown') + ['visible_if' => Content::stateFalsy('dvisited')],
                Content::narrative('gaea1/scenes/kurdiorf/text#revisit_known') + ['visible_if' => Content::stateTruthy('dvisited')],
            ],
        ],
    ],
];
