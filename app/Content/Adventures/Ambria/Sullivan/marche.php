<?php

use App\Services\Adventures\Support\Content;

$bernard = 'assets/img/ambria/bernard.png';

return [
    'variants' => [
        'entry' => [
            'audio' => 'assets/sounds/ambria/marche.mp3',
            'blocks' => [
                Content::narrative('ambria/sullivan/marche#entry'),
                Content::dialogue('Bernard', $bernard, 'ambria/sullivan/marche#bernard_greeting'),
            ],
            'actions' => [Content::ask('Demander.', 'bernard', 'ask_bernard')],
        ],
        'bernard' => [
            'blocks' => [
                Content::dialogue('Bernard', $bernard, 'ambria/sullivan/marche#bernard_success'),
                Content::narrative('ambria/sullivan/marche#bernard_outro'),
            ],
        ],
        'wrong_bernard' => [
            'blocks' => [Content::dialogue('Bernard', $bernard, 'ambria/sullivan/marche#bernard_wrong')],
            'actions' => [Content::ask('Demander.', 'bernard', 'ask_bernard')],
        ],
    ],
];
