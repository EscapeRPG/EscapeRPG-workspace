<?php

use App\Services\Adventures\Support\Content;

return [
    'variants' => [
        'default' => [
            'audio' => null,
            'blocks' => [
                Content::narrative('secretsfamiliaux/manoir/cave#default'),
            ],
            'actions' => [
                Content::ask('Chercher.', 'cave', 'chercher'),
            ],
        ],
        'fuite' => [
            'audio' => null,
            'blocks' => [
                Content::narrative('secretsfamiliaux/manoir/cave#fuite'),
            ],
            'actions' => [
                Content::ask('Chercher.', 'cave', 'chercher'),
            ],
        ],
        'restes' => [
            'audio' => null,
            'blocks' => [
                Content::narrative('secretsfamiliaux/manoir/cave#restes_intro'),
                Content::linkedImage('assets/img/secrets/tableaubrule.png', "les morceaux d'un tableau brûlé"),
                Content::narrative('secretsfamiliaux/manoir/cave#restes_after'),
            ],
            'actions' => [
                Content::action("Ajouter à l'inventaire.", 'take_tableau'),
            ]
        ],
        'take_tableau' => [
            'audio' => null,
            'blocks' => [
                Content::narrative('secretsfamiliaux/manoir/cave#take_tableau'),
            ],
            'actions' => []
        ],
        'unknown' => [
            'audio' => null,
            'blocks' => [
                Content::narrative('secretsfamiliaux/manoir/cave#unknown'),
            ],
            'actions' => [
                Content::ask('Chercher.', 'cave', 'chercher'),
            ],
        ],
    ],
];
