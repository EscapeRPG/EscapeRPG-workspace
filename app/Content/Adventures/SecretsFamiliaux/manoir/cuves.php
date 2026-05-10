<?php

use App\Services\Adventures\Support\Content;

$returnAction = [
    Content::action('Retour.', 'retour'),
];

return [
    'variants' => [
        'step_0' => [
            'audio' => 'assets/sounds/secrets/electriciteretablie.mp3',
            'blocks' => [
                Content::narrative('secretsfamiliaux/manoir/cuves#step_0'),
            ],
            'actions' => [
                Content::action('Tirer sur le levier.', 'pull_lever'),
                Content::action('Ne pas y toucher.', 'retour'),
            ],
        ],
        'step_1' => [
            'audio' => 'assets/sounds/secrets/arcelectrique.mp3',
            'blocks' => [
                Content::narrative('secretsfamiliaux/manoir/cuves#step_1'),
            ],
            'actions' => [
                Content::action('Repousser le levier.', 'stop'),
                Content::action('Laisser et observer.', 'observe'),
            ],
        ],
        'step_2' => [
            'audio' => 'assets/sounds/secrets/arcelectrique.mp3',
            'blocks' => [
                Content::narrative('secretsfamiliaux/manoir/cuves#step_2'),
            ],
            'actions' => $returnAction,
        ],
        'step_3' => [
            'audio' => null,
            'blocks' => [
                Content::narrative('secretsfamiliaux/manoir/cuves#step_3'),
            ],
            'actions' => $returnAction,
        ],
    ],
];
