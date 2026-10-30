<?php

use App\Services\Adventures\Support\Content;

return [
    'label' => 'Couloir A',
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
                Content::narrative('gaea1/scenes/couloira/text#entry_intro'),
                Content::narrative('gaea1/scenes/couloira/text#entry_east_unknown') + ['visible_if' => Content::stateFalsy('hvisited')],
                Content::narrative('gaea1/scenes/couloira/text#entry_east_known') + ['visible_if' => Content::stateTruthy('hvisited')],
                Content::narrative('gaea1/scenes/couloira/text#entry_west_unknown') + ['visible_if' => Content::stateFalsy('nvisited')],
                Content::narrative('gaea1/scenes/couloira/text#entry_west_known') + ['visible_if' => Content::stateTruthy('nvisited')],
            ],
        ],
        'revisit' => [
            'blocks' => [
                Content::narrative('gaea1/scenes/couloira/text#revisit'),
            ],
        ],
        'event' => [
            'blocks' => [
                Content::narrative('gaea1/scenes/couloira/text#event'),
            ],
        ],
    ],
];
