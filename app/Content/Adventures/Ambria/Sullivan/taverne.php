<?php

use App\Services\Adventures\Support\Content;

$don = 'assets/img/ambria/don.png';
$sullivan = 'assets/img/ambria/sullivanmasonmini.png';
$logan = 'assets/img/ambria/loganbarthelemymini.png';

$askDon = [Content::ask('Demander.', 'don', 'ask_don')];

return [
    'variants' => [
        'entry' => [
            'audio' => 'assets/sounds/ambria/taverne.mp3',
            'blocks' => [
                Content::narrative('ambria/sullivan/taverne#entry'),
                Content::dialogue('Don', $don, 'ambria/sullivan/taverne#don_greeting'),
            ],
            'actions' => $askDon,
        ],
        'don_whisky' => [
            'blocks' => [
                Content::dialogue('Don', $don, 'ambria/sullivan/taverne#don_whisky'),
                Content::linkedImage('assets/img/ambria/fonddewhisky.png', 'Un fond de whisky.'),
            ],
            'actions' => [Content::action('Prendre.', 'take_whisky')],
        ],
        'whisky_taken' => [
            'blocks' => [
                Content::narrative('ambria/sullivan/taverne#whisky_taken'),
                Content::dialogue('Don', $don, 'ambria/sullivan/taverne#don_more'),
            ],
            'actions' => $askDon,
        ],
        'paul_already_helped' => [
            'blocks' => [Content::dialogue('Don', $don, 'ambria/sullivan/taverne#paul_already_helped')],
            'actions' => $askDon,
        ],
        'don_louis' => [
            'blocks' => [Content::dialogue('Don', $don, 'ambria/sullivan/taverne#don_louis')],
            'actions' => $askDon,
        ],
        'don_self' => [
            'blocks' => [Content::dialogue('Don', $don, 'ambria/sullivan/taverne#don_self')],
            'actions' => $askDon,
        ],
        'don_wrong' => [
            'blocks' => [Content::dialogue('Don', $don, 'ambria/sullivan/taverne#don_wrong')],
            'actions' => $askDon,
        ],
        'logan_search' => [
            'audio' => 'assets/sounds/ambria/taverne.mp3',
            'blocks' => [
                Content::interactiveImage('assets/img/ambria/taverne.png', "La taverne de l'ile de la Tortue.", [
                    Content::hotspotAt('approach_logan', 13.58, 59.6, 7.9, 23.49, 'assets/img/ambria/tavernelogan.png', 'Un jeune homme a l air terrifie'),
                ]),
                Content::narrative('ambria/sullivan/taverne#logan_search'),
            ],
            'hint' => Content::hint('ambria/sullivan/hints#logan_search'),
        ],
        'logan_meeting' => [
            'audio' => 'assets/sounds/ambria/boursejetee.mp3',
            'blocks' => [
                Content::narrative('ambria/sullivan/taverne#logan_meeting_intro'),
                Content::dialogue('Sullivan', $sullivan, 'ambria/sullivan/taverne#sullivan_purse', 'right'),
                Content::narrative('ambria/sullivan/taverne#logan_meeting_outro'),
            ],
            'actions' => [Content::ask('Discuter.', 'loganreponse', 'talk_logan')],
            'hint' => Content::hint('ambria/sullivan/hints#logan_answer'),
        ],
        'logan_wrong' => [
            'blocks' => [
                Content::narrative('ambria/sullivan/taverne#logan_wrong'),
                Content::dialogue('Sullivan', $sullivan, 'ambria/sullivan/taverne#sullivan_purse', 'right'),
            ],
            'actions' => [Content::ask('Discuter.', 'loganreponse', 'talk_logan')],
        ],
        'logan_confrontation' => [
            'audio' => 'assets/sounds/ambria/epeeposee.mp3',
            'blocks' => [
                Content::narrative('ambria/sullivan/taverne#sit_down'),
                Content::dialogue('Sullivan', $sullivan, 'ambria/sullivan/taverne#sullivan_demands', 'right'),
                Content::dialogue('Logan', $logan, 'ambria/sullivan/taverne#logan_denies'),
                Content::narrative('ambria/sullivan/taverne#sword_on_table'),
                Content::dialogue('Sullivan', $sullivan, 'ambria/sullivan/taverne#sullivan_threat', 'right'),
            ],
            'actions' => [Content::action('Suivant.', 'start_sullivan_embrouilles')],
        ],
    ],
];
