<?php

use App\Services\Adventures\Support\Content;

$sullivan = 'assets/img/ambria/sullivanmasonmini.png';
$louis = 'assets/img/ambria/louis.png';

return [
    'variants' => [
        'entry' => [
            'audio' => 'assets/sounds/ambria/portefracassee.mp3',
            'blocks' => [Content::narrative('ambria/sullivan/bibliotheque#entry')],
            'actions' => [Content::action('Suivant.', 'continue_louis')],
        ],
        'louis' => [
            'audio' => 'assets/sounds/ambria/epeegratte.mp3',
            'blocks' => [
                Content::narrative('ambria/sullivan/bibliotheque#louis_intro'),
                Content::dialogue('Louis', $louis, 'ambria/sullivan/bibliotheque#louis_warning'),
                Content::narrative('ambria/sullivan/bibliotheque#sullivan_advances'),
                Content::dialogue('Sullivan', $sullivan, 'ambria/sullivan/bibliotheque#sullivan_questions', 'right'),
                Content::narrative('ambria/sullivan/bibliotheque#sword_wall'),
            ],
            'actions' => [Content::action('Suivant.', 'continue_louis_fight')],
        ],
        'louis_fight' => [
            'audio' => 'assets/sounds/ambria/combatlouis.mp3',
            'blocks' => [
                Content::narrative('ambria/sullivan/bibliotheque#fight'),
                Content::dialogue('Sullivan', $sullivan, 'ambria/sullivan/bibliotheque#sullivan_final_question', 'right'),
                Content::narrative('ambria/sullivan/bibliotheque#louis_dies'),
            ],
            'actions' => [Content::action('Suivant.', 'continue_backyard')],
        ],
        'backyard' => [
            'blocks' => [Content::narrative('ambria/sullivan/bibliotheque#backyard')],
            'actions' => [Content::ask('Inspecter.', 'look', 'inspect_purse')],
            'hint' => Content::hint('ambria/sullivan/hints#purse'),
        ],
        'wrong_purse' => [
            'blocks' => [Content::narrative('ambria/sullivan/bibliotheque#wrong_purse')],
            'actions' => [Content::ask('Inspecter.', 'look', 'inspect_purse')],
        ],
        'purse_found' => [
            'blocks' => [
                Content::linkedImage('assets/img/ambria/bourseencuir.png', 'Une bourse en cuir.'),
                Content::narrative('ambria/sullivan/bibliotheque#purse_found'),
            ],
            'actions' => [Content::action('La prendre.', 'take_purse')],
        ],
        'fire' => [
            'audio' => 'assets/sounds/ambria/incendie.mp3',
            'blocks' => [Content::narrative('ambria/sullivan/bibliotheque#fire')],
            'actions' => [Content::action('Entrer.', 'meet_logan')],
        ],
    ],
];
