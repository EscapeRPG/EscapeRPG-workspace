<?php

use App\Services\Adventures\Support\Content;

return [
    'variants' => [
        'home' => [
            'audio' => 'assets/sounds/avent/bipssifflement.mp3',
            'blocks' => [
                Content::narrative('avent/fin#home'),
                Content::dialogue('Arthur', 'assets/img/avent/arthur.png', 'avent/fin#arthur_home'),
                Content::narrative('avent/fin#home_after'),
            ],
            'actions' => [Content::action('SUIVANT.', 'continue_1')],
        ],
        'evening' => [
            'blocks' => [Content::narrative('avent/fin#evening')],
            'actions' => [Content::action('TOC TOC TOC.', 'knock')],
        ],
        'morning' => [
            'audio' => 'assets/sounds/avent/toctoc.mp3',
            'blocks' => [
                Content::narrative('avent/fin#morning_intro'),
                Content::dialogue('Père', 'assets/img/avent/perefin.png', 'avent/fin#father_call'),
                Content::narrative('avent/fin#christmas_tree'),
                Content::dialogue('Père', 'assets/img/avent/perefin.png', 'avent/fin#father_letter'),
                Content::narrative('avent/fin#spinning_top'),
                Content::dialogue('Père', 'assets/img/avent/perefin.png', 'avent/fin#father_memory'),
                Content::narrative('avent/fin#father_emotion'),
            ],
            'actions' => [Content::action('SUIVANT.', 'continue_2')],
        ],
        'grandfather' => [
            'blocks' => [
                Content::narrative('avent/fin#grandfather_intro'),
                Content::dialogue('Père', 'assets/img/avent/perefin.png', 'avent/fin#father_grandfather'),
                Content::narrative('avent/fin#father_question_intro'),
                Content::dialogue('Père', 'assets/img/avent/perefin.png', 'avent/fin#father_question'),
                Content::narrative('avent/fin#secret'),
                Content::dialogue('Arthur', 'assets/img/avent/arthur.png', 'avent/fin#arthur_secret'),
                Content::narrative('avent/fin#family_laugh'),
                Content::dialogue('Père', 'assets/img/avent/perefin.png', 'avent/fin#father_gifts'),
                Content::narrative('avent/fin#final_moment'),
            ],
            'actions' => [Content::action('FIN.', 'finish')],
        ],
        'completed' => [
            'blocks' => [
                Content::html('<img src="' . asset('assets/img/etoilefinpleine.png') . '" alt="étoile pleine"><br>'),
                Content::narrative('avent/fin#completed'),
                Content::comments(),
            ],
        ],
    ],
];
