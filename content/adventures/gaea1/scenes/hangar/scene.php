<?php

use App\Services\Adventures\Support\Content;

return [
    'label' => 'Hangar',
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
            'explore_station' => [
                'variant' => 'explore',
            ],
            'go_door' => [
                'variant' => 'door',
            ],
            'start_hack' => [
                'variant' => 'hack',
                'state' => [
                    'shunter' => true,
                ],
            ],
            'complete_hack' => [
                'next_scene' => 'terminal',
                'variant' => 'entry',
                'state' => [
                    'shunter' => false,
                    'plancurrent' => 'r',
                    'terminal_visited' => true,
                    'hangar_visited' => true,
                ],
            ],
        ],
    ],
    'variants' => [
        'entry' => [
            'audio' => 'assets/sounds/gaea1/enfilecombinaison.mp3',
            'blocks' => [
                Content::dialogue('M.A.R-V', 'assets/img/gaea1/marv.png', 'gaea1/scenes/hangar/text#entry_marv_success'),
                Content::overlayDialogue('{{pjfullname}}', 'assets/img/gaea1/avatar/fond.png', 'avatarHtml', 'gaea1/scenes/hangar/text#entry_player', 'right'),
                Content::dialogue('M.A.R-V', 'assets/img/gaea1/marv.png', 'gaea1/scenes/hangar/text#entry_marv_assist'),
                Content::narrative('gaea1/scenes/hangar/text#entry_suit'),
                Content::dialogue('M.A.R-V', 'assets/img/gaea1/marv.png', 'gaea1/scenes/hangar/text#entry_marv_suit'),
                Content::narrative('gaea1/scenes/hangar/text#entry_exit'),
            ],
            'actions' => [
                Content::action('explorer la station.', 'explore_station'),
            ],
        ],
        'explore' => [
            'audio' => 'assets/sounds/gaea1/decompression.mp3',
            'blocks' => [
                Content::narrative('gaea1/scenes/hangar/text#explore'),
            ],
            'actions' => [
                Content::action('suivant.', 'go_door'),
            ],
        ],
        'door' => [
            'blocks' => [
                Content::narrative('gaea1/scenes/hangar/text#door'),
            ],
            'actions' => [
                Content::action('pirater l\'accès.', 'start_hack'),
            ],
        ],
        'hack' => [
            'blocks' => [
                Content::partial('adventures/gaea1/electricite'),
            ],
            'scripts' => ['assets/js/adventures/gaea1/electricite.js'],
            'hint' => Content::hint('gaea1/hints#electricite', answer: [
                '<img src="' . asset('assets/img/gaea1/electricite/solution.png') . '" alt="solution du circuit">',
            ]),
        ],
        'door_opened' => [
            'blocks' => [
                Content::narrative('gaea1/scenes/hangar/text#door_opened'),
            ],
        ],
        'revisit' => [
            'blocks' => [
                Content::narrative('gaea1/scenes/hangar/text#door_opened'),
            ],
        ],
        'search_tool' => [
            'blocks' => [
                Content::interactiveImage(
                    'assets/img/gaea1/station/hangar.png',
                    '',
                    [
                        Content::hotspotAt('force_hall_door', 48, 69, 12.5, 8.34, 'assets/img/gaea1/station/pieddebiche.png', class: 'exploration-hotspot', extra: [
                            'attributes' => ['aria-label' => 'prendre le pied-de-biche'],
                        ]),
                    ],
                    'hangar-search',
                    [
                        'id' => 'exploration',
                        'id_required' => true,
                        'form_action' => url('/aventures/gaea1/terminal'),
                        'canvas_id' => 'canvasexplo',
                        'allow_missing_asset' => true,
                    ],
                ),
            ],
            'scripts' => ['assets/js/adventures/gaea1/lampe.js'],
        ],
        'demo_end' => [
            'blocks' => [
                Content::dialogue('Narrateur', 'assets/img/narrateur.png', 'gaea1/scenes/hangar/text#demo_end'),
            ],
        ],
    ],
];
