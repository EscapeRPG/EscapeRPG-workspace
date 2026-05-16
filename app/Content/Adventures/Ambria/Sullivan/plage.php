<?php

use App\Services\Adventures\Support\Content;

$sullivan = 'assets/img/ambria/sullivanmasonmini.png';
$matelots = 'assets/img/ambria/matelots.png';
$jake = 'assets/img/ambria/jake.png';
$continueArrival = [Content::action('Suivant.', 'continue_arrival')];
$retryGrottes = [Content::action('Réessayer.', 'retry_grottes')];

$grottesPuzzle = [
    'audio' => 'assets/sounds/ambria/plage.mp3',
    'blocks' => [
        Content::interactiveImage(
            'assets/img/ambria/grottesentree.png',
            'Entrées des grottes.',
            [
                Content::hotspot('grotte1', 'choose_grotte_1', 'assets/img/ambria/grotte1.png', 'première grotte'),
                Content::hotspot('grotte2', 'choose_grotte_2', 'assets/img/ambria/grotte2.png', 'deuxième grotte'),
                Content::hotspot('grotte3', 'choose_grotte_3', 'assets/img/ambria/grotte3.png', 'troisième grotte'),
                Content::hotspot('grotte4', 'choose_grotte_4', 'assets/img/ambria/grotte4.png', 'quatrième grotte'),
                Content::hotspot('grotte5', 'choose_grotte_5', 'assets/img/ambria/grotte5.png', 'cinquième grotte'),
                Content::hotspot('grotte6', 'choose_grotte_6', 'assets/img/ambria/grotte6.png', 'sixième grotte'),
            ]
        ),
        Content::narrative('ambria/sullivan/plage#grottes_puzzle'),
    ],
    'actions' => [],
    'hint' => Content::hint('ambria/sullivan/hints#grotte'),
];

return [
    'variants' => [
        'entry' => [
            'blocks' => [Content::narrative('ambria/sullivan/plage#entry')],
            'actions' => [],
        ],
        'clean_arrival' => [
            'audio' => 'assets/sounds/ambria/plagedebarque.mp3',
            'blocks' => [
                Content::narrative('ambria/sullivan/plage#clean_arrival'),
                Content::dialogue('Timonier', 'assets/img/ambria/timonier.png', 'ambria/sullivan/plage#clean_timonier'),
                Content::narrative('ambria/sullivan/plage#clean_after_timonier'),
                Content::dialogue('Sullivan', $sullivan, 'ambria/sullivan/plage#clean_sullivan', 'right'),
                Content::narrative('ambria/sullivan/plage#arrival_end'),
            ],
            'actions' => $continueArrival,
        ],
        'damaged_arrival' => [
            'audio' => 'assets/sounds/ambria/plagedebarque.mp3',
            'blocks' => [
                Content::narrative('ambria/sullivan/plage#damaged_arrival'),
                Content::dialogue('Timonier', 'assets/img/ambria/timonier.png', 'ambria/sullivan/plage#damaged_timonier'),
                Content::narrative('ambria/sullivan/plage#damaged_after_timonier'),
                Content::dialogue('Sullivan', $sullivan, 'ambria/sullivan/plage#damaged_sullivan', 'right'),
                Content::narrative('ambria/sullivan/plage#arrival_end'),
            ],
            'actions' => $continueArrival,
        ],
        'search_intro' => [
            'audio' => 'assets/sounds/ambria/plage.mp3',
            'blocks' => [
                Content::narrative('ambria/sullivan/plage#search_intro'),
                Content::dialogue('Sullivan', $sullivan, 'ambria/sullivan/plage#search_sullivan', 'right'),
                Content::narrative('ambria/sullivan/plage#search_after'),
                Content::dialogue('Matelots', $matelots, 'ambria/sullivan/plage#search_matelots'),
                Content::narrative('ambria/sullivan/plage#search_end'),
            ],
            'actions' => [Content::action('Suivant.', 'continue_grottes_intro')],
        ],
        'grottes_intro' => [
            'audio' => 'assets/sounds/ambria/plage.mp3',
            'blocks' => [
                Content::narrative('ambria/sullivan/plage#grottes_intro'),
                Content::dialogue('Sullivan', $sullivan, 'ambria/sullivan/plage#grottes_sullivan', 'right'),
                Content::dialogue('Matelots', $matelots, 'ambria/sullivan/plage#grottes_matelots'),
                Content::narrative('ambria/sullivan/plage#grottes_after_matelots'),
                Content::dialogue('Sullivan', $sullivan, 'ambria/sullivan/plage#grottes_call_jake', 'right'),
                Content::narrative('ambria/sullivan/plage#grottes_jake_arrives'),
                Content::dialogue('Jake', $jake, 'ambria/sullivan/plage#grottes_jake_language'),
                Content::dialogue('Sullivan', $sullivan, 'ambria/sullivan/plage#grottes_translate', 'right'),
                Content::dialogue('Jake', $jake, 'ambria/sullivan/plage#grottes_jake_can_translate'),
                Content::narrative('ambria/sullivan/plage#grottes_jake_thinks'),
                Content::dialogue('Jake', $jake, 'ambria/sullivan/plage#grottes_jake_ready'),
            ],
            'actions' => [Content::action('Suivant.', 'continue_grottes_puzzle')],
        ],
        'grottes_puzzle' => $grottesPuzzle,
        'grotte_success' => [
            'audio' => 'assets/sounds/ambria/grottetorcheallume.mp3',
            'blocks' => [
                Content::narrative('ambria/sullivan/plage#grotte_success_start'),
                Content::dialogue('Sullivan', $sullivan, 'ambria/sullivan/plage#grotte_success_torch', 'right'),
                Content::narrative('ambria/sullivan/plage#grotte_success_after_torch'),
                Content::dialogue('Sullivan', $sullivan, 'ambria/sullivan/plage#grotte_success_split', 'right'),
                Content::narrative('ambria/sullivan/plage#grotte_success_end'),
            ],
            'actions' => [Content::action('Suivant.', 'enter_grottes')],
        ],
        'wrong_grotte_1' => ['audio' => 'assets/sounds/ambria/grottepiques.mp3', 'blocks' => [Content::narrative('ambria/sullivan/plage#wrong_grotte_1'), Content::dialogue('Sullivan', $sullivan, 'ambria/sullivan/plage#wrong_grotte_1_sullivan', 'right'), Content::narrative('ambria/sullivan/plage#wrong_retry')], 'actions' => $retryGrottes],
        'wrong_grotte_2' => ['audio' => 'assets/sounds/ambria/grotteflechettes.mp3', 'blocks' => [Content::narrative('ambria/sullivan/plage#wrong_grotte_2'), Content::dialogue('Sullivan', $sullivan, 'ambria/sullivan/plage#wrong_grotte_2_sullivan', 'right'), Content::narrative('ambria/sullivan/plage#wrong_grotte_2_after')], 'actions' => $retryGrottes],
        'wrong_grotte_3' => ['audio' => 'assets/sounds/ambria/grottetrou.mp3', 'blocks' => [Content::narrative('ambria/sullivan/plage#wrong_grotte_3'), Content::dialogue('Sullivan', $sullivan, 'ambria/sullivan/plage#wrong_grotte_3_sullivan', 'right'), Content::narrative('ambria/sullivan/plage#wrong_grotte_3_after')], 'actions' => $retryGrottes],
        'wrong_grotte_5' => ['audio' => 'assets/sounds/ambria/grotteeboulis.mp3', 'blocks' => [Content::dialogue('Sullivan', $sullivan, 'ambria/sullivan/plage#wrong_grotte_5_sullivan', 'right'), Content::narrative('ambria/sullivan/plage#wrong_grotte_5'), Content::dialogue('Sullivan', $sullivan, 'ambria/sullivan/plage#wrong_grotte_5_escape', 'right'), Content::narrative('ambria/sullivan/plage#wrong_grotte_5_after')], 'actions' => $retryGrottes],
        'wrong_grotte_6' => ['audio' => 'assets/sounds/ambria/grottevapeur.mp3', 'blocks' => [Content::narrative('ambria/sullivan/plage#wrong_grotte_6'), Content::dialogue('Matelots', $matelots, 'ambria/sullivan/plage#wrong_grotte_6_matelots'), Content::narrative('ambria/sullivan/plage#wrong_grotte_6_after_matelots'), Content::dialogue('Sullivan', $sullivan, 'ambria/sullivan/plage#wrong_grotte_6_sullivan', 'right'), Content::narrative('ambria/sullivan/plage#wrong_grotte_6_after')], 'actions' => $retryGrottes],
        'portescite_return' => [
            'audio' => 'assets/sounds/ambria/plage.mp3',
            'blocks' => [Content::narrative('ambria/sullivan/plage#portescite_return')],
            'actions' => [],
        ],
    ],
];
