<?php

use App\Services\Adventures\Support\Content;

$bureauDoor = Content::interactiveImage(
    'assets/img/secrets/portebureau.png',
    'porte du bureau',
    [
        Content::hotspotAt('symbole', 44.5, 16, 10, 20, 'assets/img/secrets/symbur.png', 'un étrange symbole gravé sur la porte'),
    ]
);
$openBureauScript = ['assets/js/adventures/secrets_familiaux/ouverturebureau.js'];
$openAction = [
    Content::ask('Ouvrir.', 'phr', 'ouvrir'),
];

return [
    'variants' => [
        'step_0' => [
            'audio' => null,
            'scripts' => $openBureauScript,
            'blocks' => [
                $bureauDoor,
                Content::narrative('secretsfamiliaux/manoir/bureau#step_0'),
            ],
            'actions' => $openAction,
        ],
        'step_1' => [
            'audio' => null,
            'scripts' => $openBureauScript,
            'blocks' => [
                $bureauDoor,
                Content::narrative('secretsfamiliaux/manoir/bureau#step_1'),
            ],
            'actions' => $openAction,
        ],
        'step_3' => [
            'audio' => null,
            'scripts' => $openBureauScript,
            'blocks' => [
                $bureauDoor,
                Content::narrative('secretsfamiliaux/manoir/bureau#step_3'),
            ],
            'actions' => $openAction,
        ],
    ],
];
