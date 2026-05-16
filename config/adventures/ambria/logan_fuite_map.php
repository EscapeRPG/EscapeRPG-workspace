<?php

return [
    'start' => [
        'text' => 'start',
        'exits' => ['north' => 'c5', 'west' => 'b6'],
    ],
    'a1' => [
        'text' => 'a1_seen',
        'audio' => 'assets/sounds/ambria/mouette.mp3',
        'exits' => ['south' => 'a2'],
        'events' => [
            [
                'if' => ['state' => 'biscuits', 'truthy' => true],
                'text' => 'a1_hat',
                'state' => ['biscuits' => false, 'chapeautypecolere' => true],
                'inventory_add' => ['chapeautypecolere'],
                'inventory_remove' => ['biscuits'],
            ],
            [
                'state' => ['mouette' => true],
            ],
        ],
    ],
    'a2' => ['text' => 'a2', 'exits' => ['north' => 'a1', 'south' => 'a3']],
    'a3' => ['text' => 'a3', 'exits' => ['north' => 'a2', 'east' => 'b3']],
    'a5' => ['text' => 'a5', 'exits' => ['south' => 'a6']],
    'a6' => ['text' => 'a6', 'exits' => ['north' => 'a5', 'east' => 'b6']],
    'b3' => ['text' => 'b3', 'exits' => ['west' => 'a3', 'east' => 'c3']],
    'b6' => ['text' => 'b6', 'exits' => ['west' => 'a6', 'east' => 'c6']],
    'c1' => [
        'text' => 'c1_locked',
        'exits' => ['east' => 'd1'],
        'events' => [
            [
                'if' => ['state' => 'cledocks', 'truthy' => true],
                'text' => 'c1_open',
                'audio' => 'assets/sounds/ambria/ouvertureporte.mp3',
                'blocks' => [
                    ['type' => 'narrative', 'section' => 'c1_open'],
                    ['type' => 'dialogue', 'speaker' => 'Logan', 'portrait' => 'assets/img/ambria/loganbarthelemymini.png', 'section' => 'c1_open_logan', 'side' => 'right'],
                    ['type' => 'narrative', 'section' => 'c1_open_after'],
                ],
                'actions' => [
                    ['label' => "Sortir d'ici.", 'target' => 'taverne'],
                ],
                'state' => ['cledocks' => false],
                'inventory_remove' => ['cledocks'],
                'achievements' => [['scenario' => 'ambria', 'name' => 'fuir']],
            ],
        ],
    ],
    'c3' => ['text' => 'c3', 'exits' => ['west' => 'b3', 'east' => 'd3', 'south' => 'c4']],
    'c4' => ['text' => 'c4', 'exits' => ['north' => 'c3', 'south' => 'c5']],
    'c5' => ['text' => 'c5', 'exits' => ['north' => 'c4', 'south' => 'c6']],
    'c6' => ['text' => 'c6', 'audio' => 'assets/sounds/ambria/incendie.mp3', 'exits' => ['north' => 'c5', 'west' => 'b6']],
    'd1' => ['text' => 'd1', 'exits' => ['west' => 'c1', 'south' => 'd2']],
    'd2' => ['text' => 'd2', 'exits' => ['north' => 'd1', 'south' => 'd3']],
    'd3' => ['text' => 'd3', 'exits' => ['north' => 'd2', 'west' => 'c3', 'east' => 'e3']],
    'd5' => [
        'text' => 'd5_empty',
        'exits' => ['east' => 'e5'],
        'events' => [
            [
                'if' => ['state' => 'cletypecolere', 'falsy' => true],
                'text' => 'd5_key',
                'audio' => 'assets/sounds/ambria/fouille.mp3',
                'state' => ['cletypecolere' => true],
                'inventory_add' => ['cletypecolere'],
            ],
        ],
    ],
    'e3' => ['text' => 'e3', 'exits' => ['west' => 'd3', 'east' => 'f3', 'south' => 'e4']],
    'e4' => ['text' => 'e4', 'exits' => ['north' => 'e3', 'south' => 'e5']],
    'e5' => [
        'text' => 'e5',
        'exits' => ['north' => 'e4', 'west' => 'd5', 'east' => 'f5', 'south' => 'e6'],
        'events' => [
            [
                'if' => ['state' => 'cletypecolere', 'truthy' => true, 'state_falsy' => 'cledejapasse'],
                'text' => 'e5_key_notice',
                'state' => ['cledejapasse' => true],
            ],
        ],
    ],
    'e6' => ['text' => 'e6', 'exits' => ['north' => 'e5', 'south' => 'e7']],
    'e7' => ['text' => 'e7', 'exits' => ['north' => 'e6', 'east' => 'f7']],
    'f2' => ['text' => 'f2', 'exits' => ['east' => 'g2', 'south' => 'f3']],
    'f3' => [
        'text' => 'f3_locked',
        'exits' => ['west' => 'e3'],
        'events' => [
            [
                'if' => ['state' => 'cletypecolere', 'truthy' => true],
                'text' => 'f3_open',
                'audio' => 'assets/sounds/ambria/ouvertureporte.mp3',
                'exits' => ['north' => 'f2', 'west' => 'e3'],
            ],
        ],
    ],
    'f5' => ['text' => 'f5', 'exits' => ['west' => 'e5', 'east' => 'g5']],
    'f7' => ['text' => 'f7', 'exits' => ['west' => 'e7']],
    'g2' => [
        'text' => 'g2',
        'exits' => ['west' => 'f2'],
        'events' => [
            [
                'if_any' => [
                    ['state' => 'typecolere', 'truthy' => true],
                    ['state' => 'mouette', 'truthy' => true],
                ],
                'unless' => ['state' => 'biscuits', 'truthy' => true],
                'text' => 'g2_biscuits',
                'audio' => 'assets/sounds/ambria/fouille.mp3',
                'state' => ['biscuits' => true],
                'inventory_add' => ['biscuits'],
            ],
            [
                'if' => ['state' => 'biscuits', 'truthy' => true],
                'text' => 'g2_empty',
            ],
        ],
    ],
    'g5' => [
        'text' => 'g5_first',
        'exits' => ['west' => 'f5'],
        'blocks' => [
            ['type' => 'narrative', 'section' => 'g5_first'],
            ['type' => 'dialogue', 'speaker' => 'Un vieux type', 'portrait' => 'assets/img/ambria/vieuxtype.png', 'section' => 'g5_first_old_1'],
            ['type' => 'narrative', 'section' => 'g5_first_after_1'],
            ['type' => 'dialogue', 'speaker' => 'Un vieux type', 'portrait' => 'assets/img/ambria/vieuxtype.png', 'section' => 'g5_first_old_2'],
            ['type' => 'narrative', 'section' => 'g5_first_after_2'],
            ['type' => 'dialogue', 'speaker' => 'Un vieux type', 'portrait' => 'assets/img/ambria/vieuxtype.png', 'section' => 'g5_first_old_3'],
            ['type' => 'narrative', 'section' => 'g5_first_after_3'],
            ['type' => 'dialogue', 'speaker' => 'Un vieux type', 'portrait' => 'assets/img/ambria/vieuxtype.png', 'section' => 'g5_first_old_4'],
            ['type' => 'narrative', 'section' => 'g5_first_after_4'],
        ],
        'state' => ['typecolere' => true],
        'events' => [
            [
                'if' => ['state' => 'cledocks', 'truthy' => true],
                'blocks' => [
                    ['type' => 'narrative', 'section' => 'g5_waiting'],
                    ['type' => 'dialogue', 'speaker' => 'Un vieux type', 'portrait' => 'assets/img/ambria/vieuxtype.png', 'section' => 'g5_waiting_old'],
                    ['type' => 'narrative', 'section' => 'g5_waiting_after'],
                ],
            ],
            [
                'if' => ['state' => 'chapeautypecolere', 'truthy' => true],
                'blocks' => [
                    ['type' => 'narrative', 'section' => 'g5_return_hat'],
                    ['type' => 'dialogue', 'speaker' => 'Un vieux type', 'portrait' => 'assets/img/ambria/vieuxtype.png', 'section' => 'g5_return_hat_old_1'],
                    ['type' => 'narrative', 'section' => 'g5_return_hat_after'],
                    ['type' => 'dialogue', 'speaker' => 'Un vieux type', 'portrait' => 'assets/img/ambria/vieuxtype.png', 'section' => 'g5_return_hat_old_2'],
                ],
                'state' => ['cletypecolere' => false, 'chapeautypecolere' => false, 'cledocks' => true],
                'inventory_add' => ['cledocks'],
                'inventory_remove' => ['cletypecolere', 'chapeautypecolere'],
            ],
            [
                'if' => ['state' => 'cletypecolere', 'truthy' => true],
                'blocks' => [
                    ['type' => 'narrative', 'section' => 'g5_key_only'],
                    ['type' => 'dialogue', 'speaker' => 'Un vieux type', 'portrait' => 'assets/img/ambria/vieuxtype.png', 'section' => 'g5_key_only_old'],
                    ['type' => 'narrative', 'section' => 'g5_key_only_after'],
                ],
            ],
        ],
    ],
];
