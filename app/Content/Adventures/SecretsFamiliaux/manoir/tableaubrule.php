<?php

use App\Services\Adventures\Support\Content;

$tableauHint = Content::hint('secretsfamiliaux/hints#tableaubrule');

return [
    'variants' => [
        'missing' => [
            'audio' => null,
            'blocks' => [
                Content::narrative('secretsfamiliaux/manoir/tableaubrule#missing'),
            ],
            'actions' => [
                Content::action('Retour.', 'retour'),
            ],
        ],
        'default' => [
            'audio' => null,
            'blocks' => [
                Content::image('assets/img/secrets/tableaubrule.png', "les restes d'un tableau brûlé", 'enigmelieu'),
                Content::narrative('secretsfamiliaux/manoir/tableaubrule#default'),
            ],
            'actions' => [
                Content::action('Retour.', 'retour'),
            ],
            'hint' => $tableauHint,
        ],
    ],
];
