<?php

return [
    'index' => [
        'default' => 'landing',
        'actions' => [
            'new_game' => ['variant' => 'character_select', 'reset_state' => true, 'state' => ['started' => true]],
            'choose_logan' => [
                'next_scene' => 'logan_depart',
                'variant' => 'introduction',
                'state' => ['started' => true, 'active_player' => 'logan', 'loganconfiance' => 0],
                'achievements' => [
                    ['scenario' => 'general', 'name' => 'debut'],
                    ['scenario' => 'ambria', 'name' => 'debut'],
                ],
            ],
            'choose_sullivan' => [
                'next_scene' => 'sullivan_depart',
                'variant' => 'introduction',
                'state' => ['started' => true, 'active_player' => 'sullivan', 'sullivanconfiance' => 100],
                'achievements' => [
                    ['scenario' => 'general', 'name' => 'debut'],
                    ['scenario' => 'ambria', 'name' => 'debut'],
                ],
            ],
        ],
    ],
    'sullivan_depart' => [
        'default' => 'introduction',
        'actions' => [
            'dock_tortuga' => ['next_scene' => 'sullivan_tortuga', 'variant' => 'entry', 'state' => ['tortuga' => true]],
        ],
    ],
    'sullivan_tortuga' => [
        'default' => 'entry',
        'actions' => [],
    ],
    'sullivan_marche' => [
        'default' => 'entry',
        'actions' => [],
    ],
    'sullivan_bordel' => [
        'default' => 'entry',
        'actions' => [],
    ],
    'sullivan_taverne' => [
        'default' => 'entry',
        'actions' => [],
    ],
    'sullivan_docks' => [
        'default' => 'entry',
        'actions' => [],
    ],
    'sullivan_bibliotheque' => [
        'default' => 'entry',
        'actions' => [],
    ],
    'sullivan_embrouilles' => [
        'default' => 'entry',
        'actions' => [],
    ],
    'sullivan_embarquement' => [
        'default' => 'entry',
        'actions' => [],
    ],
    'sullivan_flots' => [
        'default' => 'entry',
        'actions' => [
            'continue_flots' => ['variant' => 'deck'],
        ],
    ],
    'sullivan_pontprincipal' => [
        'default' => 'entry',
        'actions' => [],
    ],
    'sullivan_dunette' => [
        'default' => 'entry',
        'actions' => [],
    ],
    'sullivan_pontinferieur' => [
        'default' => 'entry',
        'actions' => [],
    ],
    'sullivan_mess' => [
        'default' => 'entry',
        'actions' => [],
    ],
    'sullivan_quartierdesequipages' => [
        'default' => 'entry',
        'actions' => [],
    ],
    'sullivan_cale' => [
        'default' => 'entry',
        'actions' => [],
    ],
    'sullivan_cabine' => [
        'default' => 'entry',
        'actions' => [],
    ],
    'sullivan_tempete' => [
        'default' => 'entry',
        'actions' => [],
    ],
    'sullivan_plage' => [
        'default' => 'entry',
        'actions' => [],
    ],
    'sullivan_grottestorchesallumees' => [
        'default' => 'entry',
        'actions' => [],
    ],
    'sullivan_grottestorcheseteintes' => [
        'default' => 'entry',
        'actions' => [],
    ],
    'sullivan_portescite' => [
        'default' => 'arrival',
        'actions' => [],
    ],
    'sullivan_cite' => [
        'default' => 'entry',
        'actions' => [],
    ],
    'sullivan_gardien' => [
        'default' => 'entry',
        'actions' => [],
    ],
    'sullivan_pyramide' => [
        'default' => 'entry',
        'actions' => [],
    ],
    'sullivan_fin' => [
        'default' => 'default',
        'actions' => [
            'loyal_ship' => ['variant' => 'loyal_ship'],
        ],
    ],
    'logan_depart' => [
        'default' => 'introduction',
        'actions' => [
            'enter_library' => ['next_scene' => 'logan_bibliotheque', 'variant' => 'entry'],
        ],
    ],
    'logan_bibliotheque' => [
        'default' => 'entry',
        'actions' => [
            'follow_louis' => ['variant' => 'coffer'],
            'look_parchment' => [
                'variant' => 'parchment',
                'state' => ['parchemin' => true, 'inventory' => ['parchemin']],
            ],
            'continue_warning' => ['variant' => 'warning'],
            'flee' => ['next_scene' => 'logan_fuite', 'variant' => 'start'],
        ],
    ],
    'logan_fuite' => [
        'default' => 'start',
        'actions' => [],
    ],
    'logan_taverne' => [
        'default' => 'entry',
        'actions' => [
            'settle_taverne' => ['variant' => 'waiting', 'state' => ['taverne' => true]],
            'continue_sullivan' => ['variant' => 'sullivan_intro'],
            'continue_negotiation' => ['variant' => 'negotiation'],
            'start_embrouilles' => ['next_scene' => 'logan_embrouilles', 'variant' => 'entry'],
        ],
    ],
    'logan_embrouilles' => [
        'default' => 'entry',
        'actions' => [
            'continue_docks' => [
                'variant' => 'docks',
                'achievements' => [['scenario' => 'ambria', 'name' => 'bagarre']],
            ],
            'continue_agreement' => ['variant' => 'agreement'],
            'start_embarquement' => ['next_scene' => 'logan_embarquement', 'variant' => 'entry'],
        ],
    ],
    'logan_embarquement' => [
        'default' => 'entry',
        'actions' => [
            'prepare_fight' => ['variant' => 'combat_start'],
            'continue_fight' => ['variant' => 'combat_end'],
            'board_ship' => ['variant' => 'board'],
            'learn_knots' => ['variant' => 'knots_intro'],
            'practice_knots' => ['variant' => 'knots_game'],
            'reset_knots' => ['variant' => 'knots_game'],
        ],
    ],
    'logan_flots' => [
        'default' => 'entry',
        'actions' => [
            'continue_flots' => ['variant' => 'deck'],
        ],
    ],
    'logan_pontprincipal' => [
        'default' => 'entry',
        'actions' => [],
    ],
    'logan_dunette' => [
        'default' => 'entry',
        'actions' => [],
    ],
    'logan_pontinferieur' => [
        'default' => 'default',
        'actions' => [],
    ],
    'logan_mess' => [
        'default' => 'default',
        'actions' => [],
    ],
    'logan_quartierdesequipages' => [
        'default' => 'default',
        'actions' => [],
    ],
    'logan_cale' => [
        'default' => 'entry',
        'actions' => [],
    ],
    'logan_cabine' => [
        'default' => 'entry',
        'actions' => [],
    ],
    'logan_tempete' => [
        'default' => 'entry',
        'actions' => [],
    ],
    'logan_plage' => [
        'default' => 'entry',
        'actions' => [],
    ],
    'logan_grottestorchesallumees' => [
        'default' => 'entry',
        'actions' => [],
    ],
    'logan_grottestorcheseteintes' => [
        'default' => 'entry',
        'actions' => [],
    ],
    'logan_portescite' => [
        'default' => 'entry',
        'actions' => [],
    ],
    'logan_cite' => [
        'default' => 'entry',
        'actions' => [
            'continue_city' => ['variant' => 'walk_palace'],
            'observe_gardien' => ['next_scene' => 'logan_gardien', 'variant' => 'entry'],
        ],
    ],
    'logan_gardien' => [
        'default' => 'entry',
        'actions' => [
            'wake_gardien' => ['variant' => 'awakening', 'state' => ['mdp9' => true]],
            'start_gardien_combat' => ['variant' => 'combat_start'],
        ],
    ],
    'logan_pyramide' => [
        'default' => 'entry',
        'actions' => [],
    ],
    'logan_mutinerie' => [
        'default' => 'entry',
        'actions' => [
            'continue_mutiny_return' => ['variant' => 'return_voyage'],
            'wait_night' => ['variant' => 'night'],
            'start_escape' => ['variant' => 'escape_game'],
            'mutiny_success' => ['variant' => 'success_escape'],
            'mutiny_fail_noise' => ['variant' => 'fail_noise'],
            'mutiny_fail_barthy' => ['variant' => 'fail_barthy'],
            'mutiny_fail_lloyd' => ['variant' => 'fail_lloyd'],
            'mutiny_fail_guard' => ['variant' => 'fail_guard'],
            'finish_mutiny_ending' => ['next_scene' => 'logan_fin', 'variant' => 'completed_mutiny'],
        ],
    ],
    'logan_fin' => [
        'default' => 'default',
        'actions' => [
            'loyal_ship' => ['variant' => 'loyal_ship'],
        ],
    ],
];
