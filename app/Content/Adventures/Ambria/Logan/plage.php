<?php

use App\Services\Adventures\Support\Content;

$continueArrival = [Content::action('Suivant.', 'continue_arrival')];
$retryGrottes = [Content::action('Réessayer.', 'retry_grottes')];

$grottesPuzzle = [
    'audio' => 'assets/sounds/ambria/plage.mp3',
    'blocks' => [
        Content::interactiveImage(
            'assets/img/ambria/grottesentree.png',
            'Entrées des grottes.',
            [
                Content::hotspotAt('choose_grotte_1', 9.45, 21.82, 4.58, 20.82, 'assets/img/ambria/grotte1.png', 'première grotte', 'grotte1'),
                Content::hotspotAt('choose_grotte_2', 23.99, 18.16, 4.58, 20.82, 'assets/img/ambria/grotte2.png', 'deuxième grotte', 'grotte2'),
                Content::hotspotAt('choose_grotte_3', 37.42, 20.27, 4.58, 20.82, 'assets/img/ambria/grotte3.png', 'troisième grotte', 'grotte3'),
                Content::hotspotAt('choose_grotte_4', 54.69, 19.38, 4.58, 20.82, 'assets/img/ambria/grotte4.png', 'quatrième grotte', 'grotte4'),
                Content::hotspotAt('choose_grotte_5', 70.7, 23.7, 4.58, 20.82, 'assets/img/ambria/grotte5.png', 'cinquième grotte', 'grotte5'),
                Content::hotspotAt('choose_grotte_6', 90.11, 27.35, 4.58, 20.82, 'assets/img/ambria/grotte6.png', 'sixième grotte', 'grotte6'),
            ]
        ),
        Content::narrative('ambria/logan/plage#grottes_puzzle'),
    ],
    'actions' => [],
    'hint' => Content::hint('ambria/logan/hints#grotte'),
];

return [
    'variants' => [
        'default' => [
            'blocks' => [Content::narrative('ambria/logan/plage#entry')],
            'actions' => [],
        ],
        'entry' => [
            'blocks' => [Content::narrative('ambria/logan/plage#entry')],
            'actions' => [],
        ],
        'clean_arrival' => [
            'blocks' => [
                Content::narrative('ambria/logan/plage#clean_arrival'),
                Content::narrative('ambria/logan/plage#rhum_saved') + ['visible_if' => Content::stateTruthy('rhum')],
                Content::narrative('ambria/logan/plage#riz_saved') + ['visible_if' => Content::stateTruthy('riz')],
            ],
            'actions' => $continueArrival,
        ],
        'damaged_arrival' => [
            'audio' => 'assets/sounds/ambria/plagedebarque.mp3',
            'blocks' => [
                Content::narrative('ambria/logan/plage#damaged_arrival'),
                Content::narrative('ambria/logan/plage#rhum_saved') + ['visible_if' => Content::stateTruthy('rhum')],
                Content::narrative('ambria/logan/plage#riz_saved') + ['visible_if' => Content::stateTruthy('riz')],
            ],
            'actions' => $continueArrival,
        ],
        'search_intro' => [
            'audio' => 'assets/sounds/ambria/plage.mp3',
            'blocks' => [
                Content::narrative('ambria/logan/plage#search_intro'),
                Content::dialogue('Sullivan', 'assets/img/ambria/sullivanmasonmini.png', 'ambria/logan/plage#search_sullivan'),
                Content::narrative('ambria/logan/plage#search_after'),
                Content::dialogue('Matelots', 'assets/img/ambria/matelots.png', 'ambria/logan/plage#search_matelots'),
                Content::narrative('ambria/logan/plage#search_end'),
            ],
            'actions' => [Content::action('Suivant.', 'continue_grottes_intro')],
        ],
        'grottes_intro' => [
            'audio' => 'assets/sounds/ambria/plage.mp3',
            'blocks' => [
                Content::narrative('ambria/logan/plage#grottes_intro'),
                Content::dialogue('Sullivan', 'assets/img/ambria/sullivanmasonmini.png', 'ambria/logan/plage#grottes_sullivan'),
                Content::narrative('ambria/logan/plage#grottes_after'),
                Content::dialogue('Matelots', 'assets/img/ambria/matelots.png', 'ambria/logan/plage#grottes_matelots'),
                Content::narrative('ambria/logan/plage#grottes_jake_intro'),
                Content::dialogue('Sullivan', 'assets/img/ambria/sullivanmasonmini.png', 'ambria/logan/plage#grottes_call_jake'),
                Content::narrative('ambria/logan/plage#grottes_jake_arrives'),
                Content::dialogue('Jake', 'assets/img/ambria/jake.png', 'ambria/logan/plage#grottes_jake_language'),
                Content::narrative('ambria/logan/plage#grottes_sullivan_prompt'),
                Content::dialogue('Sullivan', 'assets/img/ambria/sullivanmasonmini.png', 'ambria/logan/plage#grottes_translate'),
                Content::narrative('ambria/logan/plage#grottes_jake_thinks'),
                Content::dialogue('Jake', 'assets/img/ambria/jake.png', 'ambria/logan/plage#grottes_jake_ready'),
            ],
            'actions' => [Content::action('Suivant.', 'continue_grottes_puzzle')],
        ],
        'grottes_puzzle' => $grottesPuzzle,
        'grotte_success' => [
            'audio' => 'assets/sounds/ambria/grottetorcheallume.mp3',
            'blocks' => [
                Content::narrative('ambria/logan/plage#grotte_success_start'),
                Content::dialogue('Sullivan', 'assets/img/ambria/sullivanmasonmini.png', 'ambria/logan/plage#grotte_success_torch'),
                Content::narrative('ambria/logan/plage#grotte_success_after_torch'),
                Content::dialogue('Sullivan', 'assets/img/ambria/sullivanmasonmini.png', 'ambria/logan/plage#grotte_success_split'),
                Content::narrative('ambria/logan/plage#grotte_success_end'),
            ],
            'actions' => [Content::action('Suivant.', 'enter_grottes')],
        ],
        'wrong_grotte_1' => [
            'audio' => 'assets/sounds/ambria/grottepiques.mp3',
            'blocks' => [
                Content::narrative('ambria/logan/plage#wrong_grotte_1'),
                Content::dialogue('Sullivan', 'assets/img/ambria/sullivanmasonmini.png', 'ambria/logan/plage#wrong_grotte_1_sullivan'),
                Content::narrative('ambria/logan/plage#wrong_grotte_retry'),
            ],
            'actions' => $retryGrottes,
        ],
        'wrong_grotte_2' => [
            'audio' => 'assets/sounds/ambria/grotteflechettes.mp3',
            'blocks' => [
                Content::narrative('ambria/logan/plage#wrong_grotte_2'),
                Content::dialogue('Sullivan', 'assets/img/ambria/sullivanmasonmini.png', 'ambria/logan/plage#wrong_grotte_2_sullivan'),
                Content::narrative('ambria/logan/plage#wrong_grotte_2_after'),
            ],
            'actions' => $retryGrottes,
        ],
        'wrong_grotte_3' => [
            'audio' => 'assets/sounds/ambria/grottetrou.mp3',
            'blocks' => [
                Content::narrative('ambria/logan/plage#wrong_grotte_3'),
                Content::dialogue('Sullivan', 'assets/img/ambria/sullivanmasonmini.png', 'ambria/logan/plage#wrong_grotte_3_sullivan'),
                Content::narrative('ambria/logan/plage#wrong_grotte_3_after'),
            ],
            'actions' => $retryGrottes,
        ],
        'wrong_grotte_5' => [
            'audio' => 'assets/sounds/ambria/grotteeboulis.mp3',
            'blocks' => [
                Content::dialogue('Sullivan', 'assets/img/ambria/sullivanmasonmini.png', 'ambria/logan/plage#wrong_grotte_5_sullivan'),
                Content::narrative('ambria/logan/plage#wrong_grotte_5'),
                Content::dialogue('Sullivan', 'assets/img/ambria/sullivanmasonmini.png', 'ambria/logan/plage#wrong_grotte_5_escape'),
                Content::narrative('ambria/logan/plage#wrong_grotte_5_after'),
            ],
            'actions' => $retryGrottes,
        ],
        'wrong_grotte_6' => [
            'audio' => 'assets/sounds/ambria/grottevapeur.mp3',
            'blocks' => [
                Content::narrative('ambria/logan/plage#wrong_grotte_6'),
                Content::dialogue('Matelots', 'assets/img/ambria/matelots.png', 'ambria/logan/plage#wrong_grotte_6_matelots'),
                Content::narrative('ambria/logan/plage#wrong_grotte_6_after_matelots'),
                Content::dialogue('Sullivan', 'assets/img/ambria/sullivanmasonmini.png', 'ambria/logan/plage#wrong_grotte_6_sullivan'),
                Content::narrative('ambria/logan/plage#wrong_grotte_6_after'),
            ],
            'actions' => $retryGrottes,
        ],
        'portescite_return' => [
            'audio' => 'assets/sounds/ambria/plage.mp3',
            'blocks' => [Content::narrative('ambria/logan/plage#portescite_return')],
            'actions' => [],
        ],
    ],
];
