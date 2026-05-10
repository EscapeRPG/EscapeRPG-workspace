<?php

use App\Services\Adventures\Support\Content;

$pharmacyForm = [
    'type' => 'interactive_image',
    'src' => 'assets/img/secrets/armoireapharmacie.png',
    'alt' => "l'armoire à pharmacie du docteur Pellington",
    'class' => 'enigmelieu armoireapharmacie',
    'controls' => [
        ['element' => 'input', 'type' => 'number', 'name' => '1', 'class' => 'hg', 'value' => 0, 'required' => true],
        ['element' => 'input', 'type' => 'number', 'name' => '2', 'class' => 'hm', 'value' => 0, 'required' => true],
        ['element' => 'input', 'type' => 'number', 'name' => '3', 'class' => 'hd', 'value' => 0, 'required' => true],
        ['element' => 'input', 'type' => 'number', 'name' => '4', 'class' => 'mg', 'value' => 0, 'required' => true],
        ['element' => 'input', 'type' => 'number', 'name' => '5', 'class' => 'mm', 'value' => 0, 'required' => true],
        ['element' => 'input', 'type' => 'number', 'name' => '6', 'class' => 'md', 'value' => 0, 'required' => true],
        ['element' => 'input', 'type' => 'number', 'name' => '7', 'class' => 'bg', 'value' => 0, 'required' => true],
        ['element' => 'input', 'type' => 'number', 'name' => '8', 'class' => 'bm', 'value' => 0, 'required' => true],
        ['element' => 'input', 'type' => 'number', 'name' => '9', 'class' => 'bd', 'value' => 0, 'required' => true],
        ['element' => 'button', 'type' => 'submit', 'label' => 'Mélanger.', 'name' => 'action', 'value' => 'melanger', 'class' => 'action'],
    ],
];

$returnAction = [
    Content::action('Retour.', 'retour'),
];

return [
    'variants' => [
        'step_0' => [
            'audio' => null,
            'blocks' => [
                Content::interactiveImage(
                    'assets/img/secrets/sdb.png',
                    'la salle de bain du docteur Pellington',
                    [
                        Content::hotspot(
                            'armoire',
                            'open_armoire',
                            'assets/img/secrets/armoirepharm.png',
                            "l'armoire à pharmacie du docteur Pellington",
                            [
                                'src_options' => [
                                    [
                                        'if' => Content::stateTruthy('pellington_armoire_opened'),
                                        'src' => 'assets/img/secrets/armoirepharmopened.png',
                                    ],
                                ],
                            ]
                        ),
                    ]
                ),
                Content::narrative('secretsfamiliaux/107parkavenue/salledebain#step_0'),
            ],
            'actions' => [],
        ],
        'opened' => [
            'audio' => null,
            'blocks' => [
                Content::interactiveImage(
                    'assets/img/secrets/sdbarmoireopened.png',
                    'la salle de bain du docteur Pellington',
                    [
                        Content::hotspot(
                            'armoireopened',
                            'open_armoire',
                            'assets/img/secrets/armoirepharmopened.png',
                            "l'armoire à pharmacie du docteur Pellington"
                        ),
                    ]
                ),
                Content::narrative('secretsfamiliaux/107parkavenue/salledebain#opened'),
            ],
            'actions' => [],
        ],
        'armoire' => [
            'audio' => null,
            'blocks' => [
                Content::narrative('secretsfamiliaux/107parkavenue/salledebain#armoire'),
                $pharmacyForm,
            ],
            'actions' => $returnAction,
        ],
        'failed' => [
            'audio' => null,
            'blocks' => [
                Content::narrative('secretsfamiliaux/107parkavenue/salledebain#failed'),
                $pharmacyForm,
            ],
            'actions' => $returnAction,
        ],
        'success' => [
            'audio' => 'assets/sounds/secrets/melange.mp3',
            'blocks' => [
                Content::linkedImage(
                    'assets/img/secrets/analeptique.png',
                    'un analeptique pour guérir les chiens empoisonnés'
                ),
                Content::narrative('secretsfamiliaux/107parkavenue/salledebain#success'),
            ],
            'actions' => [
                Content::action("Ajouter à l'inventaire.", 'take_analeptique'),
            ],
        ],
        'acquired' => [
            'audio' => null,
            'blocks' => [
                Content::narrative('secretsfamiliaux/107parkavenue/salledebain#acquired'),
            ],
            'actions' => $returnAction,
        ],
        'done' => [
            'audio' => null,
            'blocks' => [
                Content::image('assets/img/secrets/sdbarmoireopened.png', 'la salle de bain du docteur Pellington', 'enigmelieu'),
                Content::narrative('secretsfamiliaux/107parkavenue/salledebain#done'),
            ],
            'actions' => [],
        ],
    ],
];
