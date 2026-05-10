<?php

use App\Services\Adventures\Support\Content;
use App\Services\Adventures\Support\NarrativeText;

$thoughtsImage = Content::image('assets/img/secrets/pensees.gif', 'pensées diffuses', 'enigmelieu');
$thoughtsAction = Content::ask('Rassembler ses pensées.', 'thoughts', 'answer');
$thoughtsHint = Content::hint('secretsfamiliaux/hints#pensees', 3, array_merge(
    NarrativeText::paragraphList('secretsfamiliaux/hints#pensees_answer_intro'),
    ['<div id="enigmepensees"><img src="' . asset('assets/img/secrets/penseesreponse.png') . '" alt="pensées réponse"></div>'],
    NarrativeText::paragraphList('secretsfamiliaux/hints#pensees_answer_after')
));

return [
    'variants' => [
        'default' => [
            'audio' => null,
            'blocks' => [
                $thoughtsImage,
            ],
            'actions' => [$thoughtsAction],
            'hint' => $thoughtsHint,
        ],
        'votreonclepeutrevenir' => [
            'audio' => null,
            'blocks' => [
                $thoughtsImage,
                Content::narrative('secretsfamiliaux/manoir/pensees#votreonclepeutrevenir'),
            ],
            'actions' => [$thoughtsAction],
            'hint' => $thoughtsHint,
        ],
        'unknown' => [
            'audio' => null,
            'blocks' => [
                $thoughtsImage,
                Content::narrative('secretsfamiliaux/manoir/pensees#unknown'),
            ],
            'actions' => [$thoughtsAction],
        ],
        'oncle' => [
            'audio' => null,
            'blocks' => [
                Content::narrative('secretsfamiliaux/manoir/pensees#oncle'),
            ],
            'actions' => [],
        ],
    ],
];
