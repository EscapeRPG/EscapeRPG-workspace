<?php

use App\Services\Adventures\Support\Content;

return [
    'variants' => [
        'entry' => [
            'audio' => 'assets/sounds/avent/pasescalier.mp3',
            'blocks' => [Content::narrative('avent/grenier#entry')],
            'actions' => [Content::action('SUIVANT.', 'inspect_machine')],
        ],
        'machine_intro' => [
            'blocks' => [Content::narrative('avent/grenier#machine_intro')],
            'actions' => [Content::action('SUIVANT.', 'search_attic')],
        ],
        'search' => [
            'blocks' => [
                Content::narrative('avent/grenier#search'),
                Content::partial('adventures/avent/interactive', ['interactive' => 'attic_search']),
            ],
            'hint' => Content::hint('avent/hints#attic'),
        ],
        'got_piece_1' => [
            'audio' => 'assets/sounds/avent/tirercarte.mp3',
            'blocks' => [Content::narrative('avent/grenier#got_piece'), Content::html('<span class="turn-card">Retournez la carte numéro 5.</span>')],
            'actions' => [Content::action('RETOUR.', 'return_search')],
        ],
        'got_piece_2' => [
            'audio' => 'assets/sounds/avent/tirercarte.mp3',
            'blocks' => [Content::narrative('avent/grenier#got_piece'), Content::html('<span class="turn-card">Retournez la carte numéro 12.</span>')],
            'actions' => [Content::action('RETOUR.', 'return_search')],
        ],
        'got_sky_card' => [
            'audio' => 'assets/sounds/avent/tirercarte.mp3',
            'blocks' => [Content::narrative('avent/grenier#got_sky_card'), Content::html('<span class="turn-card">Retournez la carte numéro 3.</span>')],
            'actions' => [Content::action('RETOUR.', 'return_search')],
        ],
        'machine_missing' => [
            'blocks' => [Content::narrative('avent/grenier#machine_missing')],
            'actions' => [Content::action('RETOUR.', 'return_search')],
        ],
        'reference_prompt' => [
            'blocks' => [Content::narrative('avent/grenier#reference_prompt')],
            'actions' => [Content::ask('VALIDER.', 'reference', 'submit_reference')],
            'hint' => Content::hint('avent/hints#reference'),
        ],
        'reference_wrong' => [
            'audio' => 'assets/sounds/avent/posepieces.mp3',
            'blocks' => [Content::narrative('avent/grenier#reference_wrong'), Content::narrative('avent/grenier#reference_prompt')],
            'actions' => [Content::ask('VALIDER.', 'reference', 'submit_reference')],
            'hint' => Content::hint('avent/hints#reference'),
        ],
        'machine_puzzle' => [
            'audio' => 'assets/sounds/avent/posepieces.mp3',
            'blocks' => [
                Content::narrative('avent/grenier#machine_puzzle'),
                Content::partial('adventures/avent/interactive', ['interactive' => 'machine_puzzle']),
            ],
            'actions' => [Content::ask('ACTIVER.', 'activate', 'activate_machine')],
            'scripts' => ['assets/js/adventures/avent/rotation.js'],
            'hint' => Content::hint('avent/hints#machine'),
        ],
        'activate_wrong' => [
            'blocks' => [
                Content::narrative('avent/grenier#activate_wrong'),
                Content::partial('adventures/avent/interactive', ['interactive' => 'machine_puzzle']),
            ],
            'actions' => [Content::ask('ACTIVER.', 'activate', 'activate_machine')],
            'scripts' => ['assets/js/adventures/avent/rotation.js'],
            'hint' => Content::hint('avent/hints#machine'),
        ],
        'activated' => [
            'audio' => 'assets/sounds/avent/machinedemarre.mp3',
            'blocks' => [Content::narrative('avent/grenier#activated'), Content::html('<span class="turn-card">Retournez la carte 9.</span>')],
            'actions' => [Content::action('SUIVANT.', 'go_enroute')],
        ],
    ],
];
