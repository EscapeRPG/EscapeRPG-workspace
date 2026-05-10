<?php

use App\Services\Adventures\Support\Content;

$gaspard = 'assets/img/secrets/gaspard.png';
$askGaspard = [
    Content::ask('Interroger.', 'gaspard', 'interroger'),
];

return [
    'variants' => [
        'default' => [
            'audio' => null,
            'blocks' => [
                Content::narrative('secretsfamiliaux/manoir/maisongaspard#default'),
            ],
            'actions' => $askGaspard,
        ],
        'chenil' => [
            'audio' => null,
            'blocks' => [
                Content::narrative('secretsfamiliaux/manoir/maisongaspard#chenil'),
            ],
            'actions' => [],
        ],
        'intrusion' => [
            'audio' => null,
            'blocks' => [
                Content::narrative('secretsfamiliaux/manoir/maisongaspard#intrusion'),
                Content::dialogue('Gaspard', $gaspard, 'secretsfamiliaux/manoir/maisongaspard#intrusion_gaspard'),
            ],
            'actions' => $askGaspard,
        ],
        'nourriture' => [
            'audio' => null,
            'blocks' => [
                Content::dialogue('Gaspard', $gaspard, 'secretsfamiliaux/manoir/maisongaspard#nourriture_gaspard'),
                Content::narrative('secretsfamiliaux/manoir/maisongaspard#nourriture_after'),
            ],
            'actions' => [
                Content::action('Le suivre.', 'follow_chenil'),
            ],
        ],
        'poisoned' => [
            'audio' => null,
            'blocks' => [
                Content::narrative('secretsfamiliaux/manoir/maisongaspard#poisoned'),
            ],
            'actions' => [],
        ],
        'reward' => [
            'audio' => null,
            'blocks' => [
                Content::narrative('secretsfamiliaux/manoir/maisongaspard#reward_intro'),
                Content::dialogue('Gaspard', $gaspard, 'secretsfamiliaux/manoir/maisongaspard#reward_gaspard'),
                Content::narrative('secretsfamiliaux/manoir/maisongaspard#reward_object'),
                Content::linkedImage(
                    'assets/img/secrets/talisman.png',
                    'un étrange talisman confié par Gaspard'
                ),
                Content::narrative('secretsfamiliaux/manoir/maisongaspard#reward_after'),
            ],
            'actions' => [
                Content::action("Ajouter à l'inventaire.", 'take_talisman'),
            ],
        ],
        'saved' => [
            'audio' => null,
            'blocks' => [
                Content::narrative('secretsfamiliaux/manoir/maisongaspard#saved'),
                Content::dialogue('Gaspard', $gaspard, 'secretsfamiliaux/manoir/maisongaspard#saved_gaspard'),
            ],
            'actions' => $askGaspard,
        ],
        'pellington' => [
            'audio' => null,
            'blocks' => [
                Content::dialogue('Gaspard', $gaspard, 'secretsfamiliaux/manoir/maisongaspard#pellington'),
            ],
            'actions' => $askGaspard,
        ],
        'domestiques' => [
            'audio' => null,
            'blocks' => [
                Content::dialogue('Gaspard', $gaspard, 'secretsfamiliaux/manoir/maisongaspard#domestiques'),
            ],
            'actions' => $askGaspard,
        ],
        'chiens' => [
            'audio' => null,
            'blocks' => [
                Content::dialogue('Gaspard', $gaspard, 'secretsfamiliaux/manoir/maisongaspard#chiens'),
            ],
            'actions' => $askGaspard,
        ],
        'soucis' => [
            'audio' => null,
            'blocks' => [
                Content::dialogue('Gaspard', $gaspard, 'secretsfamiliaux/manoir/maisongaspard#soucis'),
            ],
            'actions' => $askGaspard,
        ],
        'odeur' => [
            'audio' => null,
            'blocks' => [
                Content::dialogue('Gaspard', $gaspard, 'secretsfamiliaux/manoir/maisongaspard#odeur'),
            ],
            'actions' => $askGaspard,
        ],
        'symbole' => [
            'audio' => null,
            'blocks' => [
                Content::dialogue('Gaspard', $gaspard, 'secretsfamiliaux/manoir/maisongaspard#symbole'),
            ],
            'actions' => $askGaspard,
        ],
        'bureau' => [
            'audio' => null,
            'blocks' => [
                Content::dialogue('Gaspard', $gaspard, 'secretsfamiliaux/manoir/maisongaspard#bureau'),
            ],
            'actions' => $askGaspard,
        ],
        'empreintedepas' => [
            'audio' => null,
            'blocks' => [
                Content::dialogue('Gaspard', $gaspard, 'secretsfamiliaux/manoir/maisongaspard#empreintedepas'),
            ],
            'actions' => $askGaspard,
        ],
        'teona' => [
            'audio' => null,
            'blocks' => [
                Content::dialogue('Gaspard', $gaspard, 'secretsfamiliaux/manoir/maisongaspard#teona'),
            ],
            'actions' => $askGaspard,
        ],
        'monica' => [
            'audio' => null,
            'blocks' => [
                Content::dialogue('Gaspard', $gaspard, 'secretsfamiliaux/manoir/maisongaspard#monica'),
            ],
            'actions' => $askGaspard,
        ],
        'mmenouveau' => [
            'audio' => null,
            'blocks' => [
                Content::dialogue('Gaspard', $gaspard, 'secretsfamiliaux/manoir/maisongaspard#mmenouveau'),
            ],
            'actions' => $askGaspard,
        ],
        'unknown' => [
            'audio' => null,
            'blocks' => [
                Content::dialogue('Gaspard', $gaspard, 'secretsfamiliaux/manoir/maisongaspard#unknown'),
            ],
            'actions' => $askGaspard,
        ],
    ],
];
