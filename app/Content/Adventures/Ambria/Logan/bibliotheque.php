<?php

use App\Services\Adventures\Support\Content;

return [
    'variants' => [
        'entry' => [
            'audio' => 'assets/sounds/ambria/ouvreporte.mp3',
            'blocks' => [
                Content::narrative('ambria/logan/bibliotheque#entry'),
                Content::dialogue('Logan', 'assets/img/ambria/loganbarthelemymini.png', 'ambria/logan/bibliotheque#entry_logan', 'right'),
                Content::narrative('ambria/logan/bibliotheque#entry_after_logan'),
                Content::dialogue('Louis', 'assets/img/ambria/louis.png', 'ambria/logan/bibliotheque#entry_louis'),
                Content::narrative('ambria/logan/bibliotheque#entry_after_louis'),
                Content::dialogue('Louis', 'assets/img/ambria/louis.png', 'ambria/logan/bibliotheque#entry_louis_2'),
            ],
            'actions' => [
                Content::action('Le suivre.', 'follow_louis'),
            ],
        ],
        'coffer' => [
            'audio' => 'assets/sounds/ambria/louis.mp3',
            'blocks' => [
                Content::narrative('ambria/logan/bibliotheque#coffer'),
                Content::dialogue('Louis', 'assets/img/ambria/louis.png', 'ambria/logan/bibliotheque#coffer_louis'),
            ],
            'actions' => [
                Content::action('Regarder.', 'look_parchment'),
            ],
        ],
        'parchment' => [
            'blocks' => [
                Content::narrative('ambria/logan/bibliotheque#parchment'),
                Content::dialogue('Louis', 'assets/img/ambria/louis.png', 'ambria/logan/bibliotheque#parchment_louis'),
                Content::narrative('ambria/logan/bibliotheque#parchment_after_louis'),
                Content::dialogue('Louis', 'assets/img/ambria/louis.png', 'ambria/logan/bibliotheque#parchment_louis_2'),
                Content::narrative('ambria/logan/bibliotheque#parchment_after_louis_2'),
                Content::dialogue('Louis', 'assets/img/ambria/louis.png', 'ambria/logan/bibliotheque#parchment_louis_3'),
                Content::narrative('ambria/logan/bibliotheque#parchment_after_louis_3'),
            ],
            'actions' => [
                Content::action('Suivant.', 'continue_warning'),
            ],
        ],
        'warning' => [
            'audio' => 'assets/sounds/ambria/frappeporte.mp3',
            'blocks' => [
                Content::dialogue('Louis', 'assets/img/ambria/louis.png', 'ambria/logan/bibliotheque#warning_louis'),
                Content::dialogue('Logan', 'assets/img/ambria/loganbarthelemymini.png', 'ambria/logan/bibliotheque#warning_logan', 'right'),
                Content::dialogue('Louis', 'assets/img/ambria/louis.png', 'ambria/logan/bibliotheque#warning_louis_2'),
                Content::dialogue('Logan', 'assets/img/ambria/loganbarthelemymini.png', 'ambria/logan/bibliotheque#warning_logan_2', 'right'),
                Content::narrative('ambria/logan/bibliotheque#warning_bourse'),
                Content::dialogue('Louis', 'assets/img/ambria/louis.png', 'ambria/logan/bibliotheque#warning_louis_3'),
                Content::narrative('ambria/logan/bibliotheque#warning_after_bourse'),
                Content::dialogue('Louis', 'assets/img/ambria/louis.png', 'ambria/logan/bibliotheque#warning_louis_4'),
                Content::narrative('ambria/logan/bibliotheque#warning_noise'),
                Content::dialogue('Louis', 'assets/img/ambria/louis.png', 'ambria/logan/bibliotheque#warning_louis_5'),
                Content::narrative('ambria/logan/bibliotheque#warning_escape'),
            ],
            'actions' => [
                Content::action('Fuir.', 'flee'),
            ],
        ],
    ],
];
