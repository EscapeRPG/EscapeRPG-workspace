<?php

use App\Services\Adventures\Support\Content;

return [
    'label' => 'Pont de Commandement',
    'handler' => \App\Services\Adventures\Scenarios\Gaea1\Scenes\KomunodekSceneHandler::class,
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
        'default' => 'door_no_items',
        'actions' => [
            'repair_with_cells' => [],
            'use_pass' => [],
            'enter_deck' => [
                'variant' => 'deck_entry',
            ],
            'hacker' => [
                'variant' => 'hacking',
                'state' => [
                    'hacking' => true,
                ],
            ],
            'connect_terminal' => [],
            'translate_language' => [],
            'compile_language' => [],
            'continue_after_translation' => [],
        ],
    ],
    'variants' => [
        'door_no_items' => [
            'blocks' => [Content::narrative('gaea1/scenes/komunodek/text#door_no_items')],
        ],
        'needs_cells' => [
            'blocks' => [Content::narrative('gaea1/scenes/komunodek/text#needs_cells')],
        ],
        'ready_cells_only' => [
            'blocks' => [Content::narrative('gaea1/scenes/komunodek/text#ready_cells_only')],
            'actions' => [Content::action('réparer le panneau.', 'repair_with_cells')],
        ],
        'ready_to_open' => [
            'blocks' => [Content::narrative('gaea1/scenes/komunodek/text#ready_to_open')],
            'actions' => [Content::action('ouvrir la porte.', 'repair_with_cells')],
        ],
        'ready_pass_after_panel' => [
            'blocks' => [Content::narrative('gaea1/scenes/komunodek/text#ready_pass_after_panel')],
            'actions' => [Content::action('ouvrir la porte.', 'use_pass')],
        ],
        'needs_pass_after_cells' => [
            'blocks' => [Content::narrative('gaea1/scenes/komunodek/text#needs_pass_after_cells')],
        ],
        'open_deck' => [
            'blocks' => [Content::narrative('gaea1/scenes/komunodek/text#open_deck')],
            'actions' => [Content::action('entrer.', 'enter_deck')],
        ],
        'deck_entry' => [
            'blocks' => [Content::narrative('gaea1/scenes/komunodek/text#deck_entry')],
            'actions' => [Content::action('hacker le système.', 'hacker')],
        ],
        'hacking' => [
            'blocks' => [
                Content::narrative('gaea1/scenes/komunodek/text#hacking_intro'),
                Content::dialogue('M-A-R-V', 'assets/img/gaea1/marv.png', 'gaea1/scenes/komunodek/text#hacking_marv'),
                Content::partial('adventures/gaea1/komunodek_hacking'),
            ],
            'hint' => Content::hint('gaea1/hints#komunodek_hacking'),
            'scripts' => [
                'assets/js/adventures/gaea1/hacking.js',
            ],
        ],
        'encrypted_password' => [
            'blocks' => [
                Content::narrative('gaea1/scenes/komunodek/text#login_failure'),
                Content::dialogue('M-A-R-V', 'assets/img/gaea1/marv.png', 'gaea1/scenes/komunodek/text#encrypted_password_marv'),
            ],
            'actions' => [Content::action('retour.', 'hacker')],
        ],
        'officer_password' => [
            'blocks' => [
                Content::narrative('gaea1/scenes/komunodek/text#login_failure'),
                Content::dialogue('M-A-R-V', 'assets/img/gaea1/marv.png', 'gaea1/scenes/komunodek/text#officer_password_marv'),
            ],
            'actions' => [Content::action('retour.', 'hacker')],
        ],
        'login_failure' => [
            'blocks' => [Content::narrative('gaea1/scenes/komunodek/text#login_failure')],
            'actions' => [Content::action('retour.', 'hacker')],
        ],
        'login_success' => [
            'blocks' => [
                Content::narrative('gaea1/scenes/komunodek/text#login_success'),
                Content::dialogue('M-A-R-V', 'assets/img/gaea1/marv.png', 'gaea1/scenes/komunodek/text#login_success_marv'),
            ],
            'actions' => [Content::action('traduire le langage.', 'translate_language')],
        ],
        'translation' => [
            'blocks' => [
                Content::dialogue('M-A-R-V', 'assets/img/gaea1/marv.png', 'gaea1/scenes/komunodek/text#translation_marv'),
                Content::partial('adventures/gaea1/schemalangue'),
            ],
            'hint' => Content::hint('gaea1/hints#komunodek_translation', 3, [
                '<img src="' . asset('assets/img/gaea1/schemas/schemasreponse.png') . '" alt="Réponse du schéma de langue.">',
            ]),
            'scripts' => ['assets/js/adventures/gaea1/schemalangue.js'],
        ],
        'translation_failure' => [
            'blocks' => [
                Content::dialogue('M-A-R-V', 'assets/img/gaea1/marv.png', 'gaea1/scenes/komunodek/text#translation_failure_marv'),
            ],
            'actions' => [Content::action('réessayer.', 'translate_language')],
        ],
        'translation_success' => [
            'blocks' => [Content::narrative('gaea1/scenes/komunodek/text#translation_success')],
            'actions' => [Content::action('suivant.', 'continue_after_translation')],
        ],
        'terminal_consultation' => [
            'blocks' => [
                Content::dialogue('M-A-R-V', 'assets/img/gaea1/marv.png', 'gaea1/scenes/komunodek/text#translator_ready_marv'),
                Content::narrative('gaea1/scenes/komunodek/text#translator_ready_after'),
                Content::dialogue('M-A-R-V', 'assets/img/gaea1/marv.png', 'gaea1/scenes/komunodek/text#oxygen_warning_marv'),
                Content::narrative('gaea1/scenes/komunodek/text#terminal_consultation_placeholder'),
            ],
        ],
        'invalid_access' => ['blocks' => [Content::narrative('gaea1/station#invalid_access')]],
    ],
];
