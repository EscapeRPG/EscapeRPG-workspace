<?php

return [
    'index' => [
        'default' => 'landing',
        'actions' => [
            'continue_intro' => ['next_scene' => 'maison', 'variant' => 'arrival'],
        ],
    ],
    'maison' => [
        'default' => 'arrival',
        'actions' => [
            'kiss_father' => ['variant' => 'waiting'],
            'search_keys' => ['variant' => 'keys'],
            'try_key_1' => [
                'variant' => 'opened',
                'achievements' => [['scenario' => 'avent', 'name' => 'maison']],
            ],
            'try_key_2' => ['variant' => 'wrong_key'],
            'try_key_3' => ['variant' => 'wrong_key'],
            'try_key_4' => ['variant' => 'wrong_key'],
            'try_key_5' => ['variant' => 'wrong_key'],
            'search_house' => ['variant' => 'searched'],
            'go_attic' => ['next_scene' => 'grenier', 'variant' => 'entry'],
        ],
    ],
    'grenier' => [
        'default' => 'entry',
        'actions' => [
            'inspect_machine' => ['variant' => 'machine_intro'],
            'search_attic' => ['variant' => 'search'],
            'take_piece_1' => ['variant' => 'got_piece_1', 'state' => ['piece_machine_1' => true]],
            'take_piece_2' => ['variant' => 'got_piece_2', 'state' => ['piece_machine_2' => true]],
            'take_sky_card' => ['variant' => 'got_sky_card', 'state' => ['sky_card' => true]],
            'return_search' => ['variant' => 'search'],
            'use_machine' => ['variant' => 'reference_prompt'],
            'submit_reference' => [
                'field' => 'reference',
                'answer' => ['7ff8357'],
                'success' => ['variant' => 'machine_puzzle', 'state' => ['reference_ok' => true]],
                'failure' => ['variant' => 'reference_wrong'],
            ],
            'activate_machine' => [
                'field' => 'activate',
                'answer' => ['depart'],
                'success' => [
                    'variant' => 'activated',
                    'achievements' => [['scenario' => 'avent', 'name' => 'machine']],
                ],
                'failure' => ['variant' => 'activate_wrong'],
            ],
            'go_enroute' => ['next_scene' => 'enroute', 'variant' => 'unknown_stars'],
        ],
    ],
    'enroute' => [
        'default' => 'unknown_stars',
        'actions' => [
            'search_room' => ['variant' => 'search_sky_card'],
            'take_sky_card' => ['variant' => 'sky_card_found', 'state' => ['sky_card' => true]],
            'return_canvas' => ['variant' => 'draw_prompt'],
            'submit_destination' => [
                'field' => 'destination',
                'answer' => ['polenord', 'pole nord', 'pôle nord'],
                'success' => [
                    'variant' => 'success',
                    'achievements' => [['scenario' => 'avent', 'name' => 'polenord']],
                ],
                'failure' => ['variant' => 'password_wrong'],
            ],
            'travel' => ['next_scene' => 'retrouvailles', 'variant' => 'arrival'],
        ],
    ],
    'retrouvailles' => [
        'default' => 'arrival',
        'actions' => [
            'continue_1' => ['variant' => 'arthur_found', 'achievements' => [['scenario' => 'avent', 'name' => 'grandpere']]],
            'continue_2' => ['variant' => 'mechanic'],
            'ask_mechanic' => ['variant' => 'family_story'],
            'continue_3' => ['variant' => 'problem'],
            'offer_help' => ['variant' => 'translator'],
            'show_translator' => ['variant' => 'book'],
            'continue_4' => ['variant' => 'translate'],
            'submit_translation' => [
                'field' => 'translation',
                'answer' => ['sapence', 'du sapence', 'un sapence', 'de sapence', 'de la sapence', 'la sapence', 'le sapence', 'une sapence'],
                'success' => ['variant' => 'translate_success'],
                'failure' => ['variant' => 'translate_wrong'],
            ],
            'continue_to_repairs' => ['next_scene' => 'reparations', 'variant' => 'sapence_found'],
        ],
    ],
    'reparations' => [
        'default' => 'sapence_found',
        'actions' => [
            'continue' => ['variant' => 'place_sapence'],
            'press_sapence_button' => ['variant' => 'place_sapence_wrong'],
            'sapence_placed' => ['variant' => 'calibrate'],
            'press_calibrate_button' => ['variant' => 'calibrate_wrong'],
            'calibrate_done' => ['variant' => 'reservoir'],
            'fill_reservoir' => [
                'field' => 'reservoir',
                'answer' => ['53'],
                'success' => [
                    'variant' => 'gift',
                    'achievements' => [['scenario' => 'avent', 'name' => 'cadeaux']],
                ],
                'failure' => ['variant' => 'reservoir_wrong'],
            ],
            'open_gift' => ['next_scene' => 'retour', 'variant' => 'gift_opened'],
        ],
    ],
    'retour' => [
        'default' => 'gift_opened',
        'actions' => [
            'ask_santa' => ['variant' => 'santa'],
            'continue_1' => ['variant' => 'fuel_missing'],
            'continue_2' => ['variant' => 'recipe'],
            'submit_recipe' => [
                'field' => 'recipe',
                'answer' => ['pareaudecollage', 'paré au décollage'],
                'success' => ['variant' => 'fuel_ready'],
                'failure' => ['variant' => 'recipe_wrong'],
            ],
            'go_home' => ['next_scene' => 'fin', 'variant' => 'home'],
        ],
    ],
    'fin' => [
        'default' => 'home',
        'actions' => [
            'continue_1' => ['variant' => 'evening'],
            'knock' => ['variant' => 'morning'],
            'continue_2' => ['variant' => 'grandfather'],
            'finish' => [
                'variant' => 'completed',
                'state' => ['finished' => true],
                'achievements' => [
                    ['scenario' => 'general', 'name' => 'fin'],
                    ['scenario' => 'avent', 'name' => 'fin'],
                ],
            ],
        ],
    ],
    'cartes' => ['default' => 'default', 'actions' => []],
];
