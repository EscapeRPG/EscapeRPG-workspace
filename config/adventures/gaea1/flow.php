<?php

return [
    'index' => [
        'default' => 'landing',
        'actions' => [
            'start_intro' => ['next_scene' => 'andromede', 'variant' => 'intro_animation'],
        ],
    ],
    'manuel' => [
        'default' => 'default',
        'actions' => [],
    ],
    'andromede' => [
        'default' => 'intro_animation',
        'actions' => [
            'start_intro' => ['variant' => 'intro_text', 'state' => ['cineintro' => true]],
            'wake_up' => ['variant' => 'wake_up'],
            'go_signal' => ['next_scene' => 'signal', 'variant' => 'entry'],
        ],
    ],
    'signal' => [
        'default' => 'entry',
        'actions' => [
            'show_alert' => ['variant' => 'alert'],
            'calibrate' => ['variant' => 'calibration', 'state' => ['scan' => true]],
        ],
    ],
    'signalt' => [
        'default' => 'entry',
        'actions' => [
            'treat_signal' => ['variant' => 'treatment', 'state' => ['traitement' => true]],
            'retry_treatment' => ['variant' => 'treatment', 'state' => ['traitement' => true]],
            'continue_arrival' => ['next_scene' => 'sas', 'variant' => 'arrival'],
        ],
    ],
    'sas' => [
        'default' => 'arrival',
        'actions' => [
            'continue_arrival' => ['variant' => 'station_view'],
            'approach_hangar' => ['variant' => 'approach_hangar'],
            'open_hangar' => ['variant' => 'open_hangar'],
        ],
    ],
    'appontage' => [
        'default' => 'entry',
        'actions' => [
            'start_landing' => ['variant' => 'landing', 'state' => ['appontage' => true]],
            'complete_landing' => [
                'next_scene' => 'hangar',
                'variant' => 'entry',
                'state' => ['combinaison' => true, 'plancurrent' => 'q'],
                'achievements' => [['scenario' => 'gaea1', 'name' => 'atterrir']],
            ],
        ],
    ],
    'hangar' => [
        'default' => 'entry',
        'actions' => [
            'explore_station' => ['variant' => 'explore'],
            'go_door' => ['variant' => 'door'],
            // 'start_hack' => ['variant' => 'hack', 'state' => ['shunter' => true]],
            'start_hack' => ['variant' => 'demo_end'],
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
    'terminal' => [
        'default' => 'entry',
        'actions' => [
            'continue_terminal' => ['variant' => 'blocked_door'],
            'search_tool' => ['next_scene' => 'hangar', 'variant' => 'search_tool'],
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
            'observe_plan' => ['next_scene' => 'plan', 'variant' => 'default', 'state' => ['visitestation' => true, 'plancurrent' => 'l']],
        ],
    ],
    'hall' => [
        'default' => 'default',
        'actions' => [
            'observe_plan' => ['next_scene' => 'plan', 'variant' => 'default', 'state' => ['visitestation' => true, 'plancurrent' => 'l']],
        ],
    ],
    'couloira' => [
        'default' => 'entry',
        'actions' => [],
    ],
    'kurdiorb' => [
        'default' => 'blocked',
        'actions' => [],
    ],
    'kurdiorf' => [
        'default' => 'entry',
        'actions' => [],
    ],
    'kurdiord' => [
        'default' => 'blocked',
        'actions' => [],
    ],
    'kurdiore' => [
        'default' => 'blocked',
        'actions' => [],
    ],
    'kurdiorg' => [
        'default' => 'blocked',
        'actions' => [],
    ],
    'kurdiorh' => [
        'default' => 'blocked',
        'actions' => [],
    ],
    'drekrum' => [
        'default' => 'blocked',
        'actions' => [],
    ],
    'kurdiorc' => [
        'default' => 'entry',
        'actions' => [],
    ],
    'labratruma' => [
        'default' => 'entry',
        'actions' => [],
    ],
    'labratrumb' => [
        'default' => 'entry',
        'actions' => [],
    ],
    'spesrum' => [
        'default' => 'entry',
        'actions' => [],
    ],
    'sovrum' => [
        'default' => 'blocked',
        'actions' => [],
    ],
    'raktrrum' => [
        'default' => 'entry',
        'actions' => [],
    ],
    'legerrum' => [
        'default' => 'entry',
        'actions' => [
            'return_search' => ['variant' => 'revisit'],
        ],
    ],
    'komuntrum' => [
        'default' => 'locked',
        'actions' => [],
    ],
    'sykkerum' => [
        'default' => 'entry',
        'actions' => [
            'observe_command_deck' => ['next_scene' => 'komunodek', 'variant' => 'door_no_items'],
        ],
    ],
    'komunodek' => [
        'default' => 'door_no_items',
        'actions' => [
            'repair_with_cells' => [],
            'use_pass' => [],
            'enter_deck' => ['variant' => 'deck_entry'],
            'hacker' => ['variant' => 'hacking', 'state' => ['hacking' => true]],
            'connect_terminal' => [],
            'translate_language' => [],
            'compile_language' => [],
            'continue_after_translation' => [],
        ],
    ],
    'testfin' => [
        'default' => 'default',
        'actions' => [],
    ],
    'plan' => [
        'default' => 'default',
        'actions' => [
            'enter_station_room' => [],
        ],
    ],
];
