<?php

use App\Services\Adventures\Support\Content;

$phoneHint = Content::hint('secretsfamiliaux/hints#matin_phone');
$pellingtonHint = Content::hint('secretsfamiliaux/hints#matin_pellington');

$policeBox = 'assets/img/secrets/bornepolice.png';
$answerAction = [
    Content::ask('Répondre.', 'matin', 'repondre'),
];

return [
    'variants' => [
        'step_0' => [
            'audio' => 'assets/sounds/secrets/policebox.mp3',
            'blocks' => [
                Content::narrative('secretsfamiliaux/manoir/matin#step_0_intro'),
                Content::dialogue('Borne de police', $policeBox, 'secretsfamiliaux/manoir/matin#step_0_borne'),
            ],
            'hint' => $phoneHint,
            'actions' => $answerAction,
        ],
        'step_4' => [
            'audio' => null,
            'blocks' => [
                Content::dialogue('Borne de police', $policeBox, 'secretsfamiliaux/manoir/matin#step_4_borne'),
            ],
            'hint' => $phoneHint,
            'actions' => $answerAction,
        ],
        'step_1' => [
            'audio' => null,
            'blocks' => [
                Content::dialogue('Borne de police', $policeBox, 'secretsfamiliaux/manoir/matin#step_1_borne'),
            ],
            'hint' => $pellingtonHint,
            'actions' => $answerAction,
        ],
        'step_5' => [
            'audio' => null,
            'blocks' => [
                Content::dialogue('Borne de police', $policeBox, 'secretsfamiliaux/manoir/matin#step_5_borne'),
            ],
            'actions' => $answerAction,
        ],
        'step_2' => [
            'audio' => null,
            'blocks' => [
                Content::dialogue('Borne de police', $policeBox, 'secretsfamiliaux/manoir/matin#step_2_borne'),
            ],
            'actions' => [
                Content::action('Non.', 'non'),
            ],
        ],
        'step_3' => [
            'audio' => null,
            'blocks' => [
                Content::narrative('secretsfamiliaux/manoir/matin#step_3'),
            ],
            'actions' => [],
        ],
    ],
];
