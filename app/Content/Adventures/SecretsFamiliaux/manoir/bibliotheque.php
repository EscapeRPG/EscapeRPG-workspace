<?php

use App\Services\Adventures\Support\Content;

return [
    'variants' => [
        'default' => [
            'audio' => null,
            'blocks' => [
                Content::narrative('secretsfamiliaux/manoir/bibliotheque#default'),
            ],
            'actions' => [
                Content::ask('Chercher.', 'bibliotheque', 'chercher'),
            ],
        ],
        'symbole' => [
            'audio' => null,
            'blocks' => [
                Content::narrative('secretsfamiliaux/manoir/bibliotheque#symbole'),
                Content::linkedImage('assets/img/secrets/templar.png', "un papier avec l'explication d'un code"),
            ],
            'actions' => [
                Content::action("Ajouter à l'inventaire.", 'take_templar'),
            ],
        ],
        'opusfavori' => [
            'audio' => null,
            'blocks' => [
                Content::narrative('secretsfamiliaux/manoir/bibliotheque#opusfavori'),
            ],
            'actions' => [
                Content::ask('Chercher.', 'bibliotheque', 'chercher'),
            ],
        ],
        'magnamater' => [
            'audio' => null,
            'blocks' => [
                Content::linkedImage('assets/img/secrets/magnamater.png', 'le Magna Mater'),
                Content::narrative('secretsfamiliaux/manoir/bibliotheque#magnamater'),
            ],
            'actions' => [
                Content::action("Ajouter à l'inventaire.", 'take_magna'),
            ],
        ],
        'take_magna' => [
            'audio' => null,
            'blocks' => [
                Content::narrative('secretsfamiliaux/manoir/bibliotheque#take_magna'),
            ],
            'actions' => [
                Content::ask('Chercher.', 'bibliotheque', 'chercher', [
                    'visible_if' => Content::stateFalsy('bibliotheque_templar'),
                ]),
            ],
        ],
        'take_templar' => [
            'audio' => null,
            'blocks' => [
                Content::narrative('secretsfamiliaux/manoir/bibliotheque#take_templar'),
            ],
            'actions' => [
                Content::ask('Chercher.', 'bibliotheque', 'chercher'),
            ],
        ],
        'unknown' => [
            'audio' => null,
            'blocks' => [
                Content::narrative('secretsfamiliaux/manoir/bibliotheque#unknown'),
            ],
            'actions' => [
                Content::ask('Chercher.', 'bibliotheque', 'chercher'),
            ],
        ],
        'done' => [
            'audio' => null,
            'blocks' => [
                Content::narrative('secretsfamiliaux/manoir/bibliotheque#done'),
            ],
            'actions' => []
        ],
    ],
];
