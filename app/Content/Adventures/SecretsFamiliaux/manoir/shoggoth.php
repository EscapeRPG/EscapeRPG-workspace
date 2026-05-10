<?php

use App\Services\Adventures\Support\Content;

$ritualBlocks = [
    Content::narrative('secretsfamiliaux/manoir/shoggoth#ritual'),
];

$ritualHint = Content::hint('secretsfamiliaux/hints#shoggoth_ritual', 3, [
    '<img src="' . asset('assets/img/secrets/cerclerituelreponse.png') . '" alt="réponse">',
]);

$openFinal = [
    Content::action('Fin.', 'open_final'),
];

return [
    'variants' => [
        'step_0' => [
            'audio' => 'assets/sounds/secrets/paslents.mp3',
            'blocks' => [
                Content::narrative('secretsfamiliaux/manoir/shoggoth#step_0'),
            ],
            'actions' => [
                Content::action('Suivant.', 'suivant'),
            ],
        ],
        'step_1' => [
            'audio' => 'assets/sounds/secrets/crichute.mp3',
            'blocks' => [
                Content::narrative('secretsfamiliaux/manoir/shoggoth#step_1'),
            ],
            'actions' => [
                Content::action('Aider Gaspard.', 'aider'),
            ],
        ],
        'step_2' => [
            'audio' => null,
            'blocks' => [
                Content::narrative('secretsfamiliaux/manoir/shoggoth#step_2'),
            ],
            'actions' => [
                Content::action('Faire quelque chose.', 'agir'),
            ],
        ],
        'good_setup' => [
            'audio' => 'assets/sounds/secrets/shoggothelec.mp3',
            'blocks' => [
                Content::narrative('secretsfamiliaux/manoir/shoggoth#good_setup'),
            ],
            'actions' => [
                Content::action('Commencer le rituel.', 'rituel_good'),
            ],
        ],
        'ritual_good' => [
            'audio' => 'assets/sounds/secrets/rituel.mp3',
            'blocks' => $ritualBlocks,
            'actions' => [],
            'hint' => $ritualHint,
            'scripts' => [
                'assets/js/adventures/dragDropPuzzle.js',
                'assets/js/adventures/secrets_familiaux/ritualCircle.js',
                'assets/js/adventures/secrets_familiaux/dragDropCercleGEnd.js',
            ],
        ],
        'neutral_fire' => [
            'audio' => 'assets/sounds/secrets/shoggothelec.mp3',
            'blocks' => [
                Content::narrative('secretsfamiliaux/manoir/shoggoth#neutral_fire'),
            ],
            'actions' => [
                Content::action('Fuir.', 'finish_neutral'),
            ],
        ],
        'neutral_bad_setup_dark' => [
            'audio' => 'assets/sounds/secrets/shoggothcourtcircuit.mp3',
            'blocks' => [
                Content::narrative('secretsfamiliaux/manoir/shoggoth#neutral_bad_setup_dark'),
            ],
            'actions' => [
                Content::action('Commencer le rituel.', 'rituel_neutral_bad'),
            ],
        ],
        'ritual_neutral_bad' => [
            'audio' => 'assets/sounds/secrets/rituel.mp3',
            'blocks' => $ritualBlocks,
            'actions' => [],
            'hint' => $ritualHint,
            'scripts' => [
                'assets/js/adventures/dragDropPuzzle.js',
                'assets/js/adventures/secrets_familiaux/ritualCircle.js',
                'assets/js/adventures/secrets_familiaux/dragDropCercleNBEnd.js',
            ],
        ],
        'bad_attack' => [
            'audio' => 'assets/sounds/secrets/shoggothcourtcircuit.mp3',
            'blocks' => [
                Content::narrative('secretsfamiliaux/manoir/shoggoth#bad_attack'),
            ],
            'actions' => [
                Content::action('Tenter de fuir.', 'finish_bad'),
            ],
        ],
        'bad_end' => [
            'audio' => 'assets/sounds/secrets/badending.mp3',
            'blocks' => [
                Content::narrative('secretsfamiliaux/manoir/shoggoth#bad_end'),
            ],
            'actions' => $openFinal,
        ],
        'neutral_end' => [
            'audio' => 'assets/sounds/secrets/shoggothfeu.mp3',
            'blocks' => [
                Content::narrative('secretsfamiliaux/manoir/shoggoth#neutral_end'),
            ],
            'actions' => $openFinal,
        ],
        'neutral_bad_end' => [
            'audio' => 'assets/sounds/secrets/shoggothexpulse.mp3',
            'blocks' => [
                Content::narrative('secretsfamiliaux/manoir/shoggoth#neutral_bad_end'),
            ],
            'actions' => $openFinal,
        ],
        'good_end' => [
            'audio' => 'assets/sounds/secrets/shoggothexpulse.mp3',
            'blocks' => [
                Content::narrative('secretsfamiliaux/manoir/shoggoth#good_end'),
            ],
            'actions' => $openFinal,
        ],
    ],
];
