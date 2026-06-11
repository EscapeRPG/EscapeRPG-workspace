<?php

use App\Services\Adventures\Support\Content;

return [
    'variants' => [
        'door_no_items' => [
            'blocks' => [Content::narrative('gaea1/komunodek#door_no_items')],
        ],
        'needs_cells' => [
            'blocks' => [Content::narrative('gaea1/komunodek#needs_cells')],
        ],
        'ready_cells_only' => [
            'blocks' => [Content::narrative('gaea1/komunodek#ready_cells_only')],
            'actions' => [Content::action('réparer le panneau.', 'repair_with_cells')],
        ],
        'ready_to_open' => [
            'blocks' => [Content::narrative('gaea1/komunodek#ready_to_open')],
            'actions' => [Content::action('ouvrir la porte.', 'repair_with_cells')],
        ],
        'ready_pass_after_panel' => [
            'blocks' => [Content::narrative('gaea1/komunodek#ready_pass_after_panel')],
            'actions' => [Content::action('ouvrir la porte.', 'use_pass')],
        ],
        'needs_pass_after_cells' => [
            'blocks' => [Content::narrative('gaea1/komunodek#needs_pass_after_cells')],
        ],
        'open_deck' => [
            'blocks' => [Content::narrative('gaea1/komunodek#open_deck')],
            'actions' => [Content::action('entrer.', 'enter_deck')],
        ],
        'deck_entry' => [
            'blocks' => [Content::narrative('gaea1/komunodek#deck_entry')],
            'actions' => [Content::action('hacker le système.', 'hacker')],
        ],
        'hacking' => [
            'blocks' => [
                Content::narrative('gaea1/komunodek#hacking_intro'),
                Content::dialogue('M-A-R-V', 'assets/img/gaea1/marv.png', 'gaea1/komunodek#hacking_marv'),
                Content::partial('adventures/gaea1/komunodek_hacking'),
            ],
            'hint' => Content::hint('gaea1/hints#komunodek_hacking'),
            'scripts' => [
                'assets/js/adventures/gaea1/hacking.js',
            ],
        ],
        'encrypted_password' => [
            'blocks' => [
                Content::narrative('gaea1/komunodek#login_failure'),
                Content::dialogue('M-A-R-V', 'assets/img/gaea1/marv.png', 'gaea1/komunodek#encrypted_password_marv'),
            ],
            'actions' => [Content::action('retour.', 'hacker')],
        ],
        'officer_password' => [
            'blocks' => [
                Content::narrative('gaea1/komunodek#login_failure'),
                Content::dialogue('M-A-R-V', 'assets/img/gaea1/marv.png', 'gaea1/komunodek#officer_password_marv'),
            ],
            'actions' => [Content::action('retour.', 'hacker')],
        ],
        'login_failure' => [
            'blocks' => [Content::narrative('gaea1/komunodek#login_failure')],
            'actions' => [Content::action('retour.', 'hacker')],
        ],
        'login_success' => [
            'blocks' => [
                Content::narrative('gaea1/komunodek#login_success'),
                Content::dialogue('M-A-R-V', 'assets/img/gaea1/marv.png', 'gaea1/komunodek#login_success_marv'),
            ],
            'actions' => [Content::action('traduire le langage.', 'translate_language')],
        ],
        'translation' => [
            'blocks' => [
                Content::dialogue('M-A-R-V', 'assets/img/gaea1/marv.png', 'gaea1/komunodek#translation_marv'),
                Content::partial('adventures/gaea1/schemalangue'),
            ],
            'hint' => Content::hint('gaea1/hints#komunodek_translation', 3, [
                '<img src="' . asset('assets/img/gaea1/schemas/schemasreponse.png') . '" alt="Réponse du schéma de langue.">',
            ]),
            'scripts' => ['assets/js/adventures/gaea1/schemalangue.js'],
        ],
        'translation_failure' => [
            'blocks' => [
                Content::dialogue('M-A-R-V', 'assets/img/gaea1/marv.png', 'gaea1/komunodek#translation_failure_marv'),
            ],
            'actions' => [Content::action('réessayer.', 'translate_language')],
        ],
        'translation_success' => [
            'blocks' => [Content::narrative('gaea1/komunodek#translation_success')],
            'actions' => [Content::action('suivant.', 'continue_after_translation')],
        ],
        'terminal_consultation' => [
            'blocks' => [
                Content::dialogue('M-A-R-V', 'assets/img/gaea1/marv.png', 'gaea1/komunodek#translator_ready_marv'),
                Content::narrative('gaea1/komunodek#translator_ready_after'),
                Content::dialogue('M-A-R-V', 'assets/img/gaea1/marv.png', 'gaea1/komunodek#oxygen_warning_marv'),
                Content::narrative('gaea1/komunodek#terminal_consultation_placeholder'),
            ],
        ],
        'invalid_access' => ['blocks' => [Content::narrative('gaea1/station#invalid_access')]],
    ],
];
