<?php

use App\Services\Adventures\Support\Content;

$gaspard = 'assets/img/secrets/gaspard.png';
$antidoteAction = Content::ask('Parler.', 'antidote', 'soigner');

return [
    'variants' => [
        'step_0' => [
            'audio' => null,
            'blocks' => [
                Content::narrative('secretsfamiliaux/manoir/chenil#step_0'),
            ],
            'actions' => [],
        ],
        'intrusion' => [
            'audio' => null,
            'blocks' => [
                Content::narrative('secretsfamiliaux/manoir/chenil#intrusion'),
            ],
            'actions' => [],
        ],
        'discovery' => [
            'audio' => null,
            'blocks' => [
                Content::narrative('secretsfamiliaux/manoir/chenil#discovery_intro'),
                Content::dialogue('Gaspard', $gaspard, 'secretsfamiliaux/manoir/chenil#discovery_gaspard'),
                Content::narrative('secretsfamiliaux/manoir/chenil#discovery_after'),
            ],
            'actions' => [
                Content::action('Repartir.', 'poisoning_understood'),
            ],
        ],
        'poisoned' => [
            'audio' => null,
            'blocks' => [
                Content::narrative('secretsfamiliaux/manoir/chenil#poisoned'),
            ],
            'actions' => [$antidoteAction],
        ],
        'malades' => [
            'audio' => null,
            'blocks' => [
                Content::narrative('secretsfamiliaux/manoir/chenil#malades'),
                Content::dialogue('Gaspard', $gaspard, 'secretsfamiliaux/manoir/chenil#malades_gaspard'),
            ],
            'actions' => [$antidoteAction],
        ],
        'step_1' => [
            'audio' => null,
            'blocks' => [
                Content::dialogue('Gaspard', $gaspard, 'secretsfamiliaux/manoir/chenil#step_1_gaspard'),
                Content::narrative('secretsfamiliaux/manoir/chenil#step_1_after'),
            ],
            'actions' => [$antidoteAction],
        ],
        'step_2' => [
            'audio' => null,
            'blocks' => [
                Content::narrative('secretsfamiliaux/manoir/chenil#step_2_intro'),
                Content::dialogue('Gaspard', $gaspard, 'secretsfamiliaux/manoir/chenil#step_2_gaspard'),
                Content::narrative('secretsfamiliaux/manoir/chenil#step_2_after'),
            ],
            'actions' => [
                Content::action('Le suivre.', 'follow_gaspard'),
            ],
        ],
        'saved' => [
            'audio' => null,
            'blocks' => [
                Content::narrative('secretsfamiliaux/manoir/chenil#saved'),
            ],
            'actions' => [],
        ],
    ],
];
