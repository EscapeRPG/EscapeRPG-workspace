<?php

use App\Services\Adventures\Support\Content;

$jake = 'assets/img/ambria/jake.png';

return [
    'variants' => [
        'default' => [
            'audio' => 'assets/sounds/ambria/plage.mp3',
            'blocks' => [
                Content::narrative('ambria/logan/mutinerie#entry_intro'),
                Content::dialogue('Jake', $jake, 'ambria/logan/mutinerie#jake_share'),
                Content::narrative('ambria/logan/mutinerie#entry_outro'),
            ],
            'actions' => [Content::action('Suivant.', 'continue_mutiny_return')],
        ],
        'entry' => [
            'audio' => 'assets/sounds/ambria/plage.mp3',
            'blocks' => [
                Content::narrative('ambria/logan/mutinerie#entry_intro'),
                Content::dialogue('Jake', $jake, 'ambria/logan/mutinerie#jake_share'),
                Content::narrative('ambria/logan/mutinerie#entry_outro'),
            ],
            'actions' => [Content::action('Suivant.', 'continue_mutiny_return')],
        ],
        'return_voyage' => [
            'audio' => 'assets/sounds/ambria/flots.mp3',
            'blocks' => [Content::narrative('ambria/logan/mutinerie#return_voyage')],
            'actions' => [Content::action('Attendre la nuit.', 'wait_night')],
        ],
        'night' => [
            'audio' => 'assets/sounds/ambria/pontinferieur.mp3',
            'blocks' => [Content::narrative('ambria/logan/mutinerie#night')],
            'actions' => [Content::action('Agir.', 'start_escape')],
        ],
        'escape_game' => [
            'audio' => 'assets/sounds/ambria/pontinferieur.mp3',
            'blocks' => [
                Content::partial('adventures/ambria/mutinerie'),
                Content::narrative('ambria/logan/mutinerie#escape_rules'),
            ],
            'scripts' => ['assets/js/adventures/ambria/mutinerie.js'],
        ],
    ],
];
