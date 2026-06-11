<?php

use App\Services\Adventures\Support\Content;

$keys = Content::interactiveImage('assets/img/avent/jeucles.png', 'les clés de la maison', [
    Content::hotspotAt('try_key_1', 3.73, 38.1, 35.33, 52.6, 'assets/img/avent/cle1.png', "une des clés de la maison d'Arthur", 'cle-maison'),
    Content::hotspotAt('try_key_2', 40.87, 38, 20.4, 61, 'assets/img/avent/cle2.png', "une des clés de la maison d'Arthur", 'cle-maison'),
    Content::hotspotAt('try_key_3', 43.67, 32.4, 53.53, 31.4, 'assets/img/avent/cle3.png', "une des clés de la maison d'Arthur", 'cle-maison'),
    Content::hotspotAt('try_key_4', 2.87, 2.5, 34.33, 37, 'assets/img/avent/cle4.png', "une des clés de la maison d'Arthur", 'cle-maison'),
    Content::hotspotAt('try_key_5', 36.87, 1.1, 22.87, 35.5, 'assets/img/avent/cle5.png', "une des clés de la maison d'Arthur", 'cle-maison'),
]);

return [
    'variants' => [
        'arrival' => [
            'audio' => 'assets/sounds/avent/voiturestop.mp3',
            'blocks' => [
                Content::narrative('avent/maison#arrival'),
                Content::dialogue('Père', 'assets/img/avent/pere.png', 'avent/maison#father_goodbye'),
            ],
            'actions' => [Content::action('BISOUS PAPA !', 'kiss_father')],
        ],
        'waiting' => [
            'audio' => 'assets/sounds/avent/tirercarte.mp3',
            'blocks' => [Content::narrative('avent/maison#waiting'), Content::html('<span class="turn-card">Retournez la carte numéro 1.</span>')],
            'actions' => [Content::action('SUIVANT.', 'search_keys')],
        ],
        'keys' => [
            'audio' => 'assets/sounds/avent/cles.mp3',
            'blocks' => [Content::narrative('avent/maison#keys'), $keys],
            'scripts' => ['assets/js/adventures/avent/cles.js'],
            'hint' => Content::hint('avent/hints#keys'),
        ],
        'wrong_key' => [
            'blocks' => [Content::narrative('avent/maison#wrong_key'), $keys],
            'scripts' => ['assets/js/adventures/avent/cles.js'],
            'hint' => Content::hint('avent/hints#keys'),
        ],
        'opened' => [
            'audio' => 'assets/sounds/avent/ouvertureporte.mp3',
            'blocks' => [Content::narrative('avent/maison#opened')],
            'actions' => [Content::action('FAIRE LE TOUR.', 'search_house')],
        ],
        'searched' => [
            'blocks' => [Content::narrative('avent/maison#searched')],
            'actions' => [Content::action('MONTER.', 'go_attic')],
        ],
    ],
];
