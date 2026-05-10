<?php

use App\Services\Adventures\Support\Content;

$askDomestiques = [
    Content::ask('Interroger.', 'domestiques', 'interroger'),
];

$portrait = [
    'domestiques' => 'assets/img/secrets/domestiques.png',
    'teona' => 'assets/img/secrets/teona.png',
    'monica' => 'assets/img/secrets/monica.png',
    'mmenouveau' => 'assets/img/secrets/mmenouveau.png',
];

return [
    'variants' => [
        'default' => [
            'audio' => null,
            'blocks' => [
                Content::narrative('secretsfamiliaux/manoir/aile#default'),
            ],
            'actions' => $askDomestiques,
        ],
        'pellington' => [
            'audio' => null,
            'blocks' => [
                Content::dialogue('Domestiques', $portrait['domestiques'], 'secretsfamiliaux/manoir/aile#pellington'),
            ],
            'actions' => $askDomestiques,
        ],
        'domestiques' => [
            'audio' => null,
            'blocks' => [
                Content::dialogue('Domestiques', $portrait['domestiques'], 'secretsfamiliaux/manoir/aile#domestiques'),
            ],
            'actions' => $askDomestiques,
        ],
        'teona' => [
            'audio' => null,
            'blocks' => [
                Content::dialogue('Téona', $portrait['teona'], 'secretsfamiliaux/manoir/aile#teona'),
                Content::narrative('secretsfamiliaux/manoir/aile#teona_after'),
            ],
            'actions' => $askDomestiques,
        ],
        'monica' => [
            'audio' => null,
            'blocks' => [
                Content::dialogue('Monica', $portrait['monica'], 'secretsfamiliaux/manoir/aile#monica'),
                Content::narrative('secretsfamiliaux/manoir/aile#monica_after'),
            ],
            'actions' => $askDomestiques,
        ],
        'mmenouveau' => [
            'audio' => null,
            'blocks' => [
                Content::dialogue('Mme Nouveau', $portrait['mmenouveau'], 'secretsfamiliaux/manoir/aile#mmenouveau'),
                Content::narrative('secretsfamiliaux/manoir/aile#mmenouveau_after'),
            ],
            'actions' => $askDomestiques,
        ],
        'gaspard' => [
            'audio' => null,
            'blocks' => [
                Content::dialogue('Téona', $portrait['teona'], 'secretsfamiliaux/manoir/aile#gaspard'),
            ],
            'actions' => $askDomestiques,
        ],
        'soucis' => [
            'audio' => null,
            'blocks' => [
                Content::dialogue('Domestiques', $portrait['domestiques'], 'secretsfamiliaux/manoir/aile#soucis'),
            ],
            'actions' => $askDomestiques,
        ],
        'odeur' => [
            'audio' => null,
            'blocks' => [
                Content::dialogue('Domestiques', $portrait['domestiques'], 'secretsfamiliaux/manoir/aile#odeur'),
            ],
            'actions' => $askDomestiques,
        ],
        'symbole' => [
            'audio' => null,
            'blocks' => [
                Content::dialogue('Téona', $portrait['teona'], 'secretsfamiliaux/manoir/aile#symbole'),
            ],
            'actions' => $askDomestiques,
        ],
        'bureau' => [
            'audio' => null,
            'blocks' => [
                Content::dialogue('Domestiques', $portrait['domestiques'], 'secretsfamiliaux/manoir/aile#bureau'),
            ],
            'actions' => $askDomestiques,
        ],
        'coupuresdecourant' => [
            'audio' => null,
            'blocks' => [
                Content::dialogue('Domestiques', $portrait['domestiques'], 'secretsfamiliaux/manoir/aile#coupuresdecourant'),
            ],
            'actions' => $askDomestiques,
        ],
        'tableau' => [
            'audio' => null,
            'blocks' => [
                Content::dialogue('Domestiques', $portrait['domestiques'], 'secretsfamiliaux/manoir/aile#tableau'),
            ],
            'actions' => $askDomestiques,
        ],
        'opusfavori' => [
            'audio' => null,
            'blocks' => [
                Content::dialogue('Téona', $portrait['teona'], 'secretsfamiliaux/manoir/aile#opusfavori'),
            ],
            'actions' => $askDomestiques,
        ],
        'unknown' => [
            'audio' => null,
            'blocks' => [
                Content::dialogue('Domestiques', $portrait['domestiques'], 'secretsfamiliaux/manoir/aile#unknown'),
            ],
            'actions' => $askDomestiques,
        ],
    ],
];
