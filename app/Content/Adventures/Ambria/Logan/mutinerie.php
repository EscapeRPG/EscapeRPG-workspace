<?php

use App\Services\Adventures\Support\Content;

$jake = 'assets/img/ambria/jake.png';
$barthy = 'assets/img/ambria/barthy.png';
$lloyd = 'assets/img/ambria/lloyd.png';

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
        'success_escape' => [
            'audio' => 'assets/sounds/ambria/plage.mp3',
            'blocks' => [Content::narrative('ambria/logan/mutinerie#success_escape')],
            'actions' => [Content::action('Fin.', 'finish_mutiny_ending')],
        ],
        'fail_noise' => [
            'audio' => 'assets/sounds/ambria/mutinerieechec.mp3',
            'blocks' => [
                Content::narrative('ambria/logan/mutinerie#fail_noise_intro'),
                Content::dialogue('Lloyd', $lloyd, 'ambria/logan/mutinerie#lloyd_alarm'),
                Content::narrative('ambria/logan/mutinerie#fail_common'),
            ],
            'actions' => [Content::action('Fin.', 'finish_mutiny_ending')],
        ],
        'fail_barthy' => [
            'audio' => 'assets/sounds/ambria/mutinerieechec.mp3',
            'blocks' => [
                Content::dialogue('Barthy', $barthy, 'ambria/logan/mutinerie#sleeping_sailor_wakes'),
                Content::narrative('ambria/logan/mutinerie#fail_sleeping_excuse'),
                Content::dialogue('Barthy', $barthy, 'ambria/logan/mutinerie#sleeping_sailor_alarm'),
                Content::narrative('ambria/logan/mutinerie#fail_surrounded'),
            ],
            'actions' => [Content::action('Fin.', 'finish_mutiny_ending')],
        ],
        'fail_lloyd' => [
            'audio' => 'assets/sounds/ambria/mutinerieechec.mp3',
            'blocks' => [
                Content::dialogue('Lloyd', $lloyd, 'ambria/logan/mutinerie#sleeping_sailor_wakes'),
                Content::narrative('ambria/logan/mutinerie#fail_sleeping_excuse'),
                Content::dialogue('Lloyd', $lloyd, 'ambria/logan/mutinerie#sleeping_sailor_alarm'),
                Content::narrative('ambria/logan/mutinerie#fail_surrounded'),
            ],
            'actions' => [Content::action('Fin.', 'finish_mutiny_ending')],
        ],
        'fail_guard' => [
            'audio' => 'assets/sounds/ambria/mutinerieechec.mp3',
            'blocks' => [
                Content::dialogue('Lloyd', $lloyd, 'ambria/logan/mutinerie#guard_spots'),
                Content::narrative('ambria/logan/mutinerie#fail_guard_intro'),
                Content::dialogue('Lloyd', $lloyd, 'ambria/logan/mutinerie#lloyd_alarm'),
                Content::narrative('ambria/logan/mutinerie#fail_common'),
            ],
            'actions' => [Content::action('Fin.', 'finish_mutiny_ending')],
        ],
    ],
];
