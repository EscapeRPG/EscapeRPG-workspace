<?php

use App\Services\Adventures\Support\Content;

$entry = [
    'audio' => 'assets/sounds/ambria/taverne.mp3',
    'blocks' => [
        Content::narrative('ambria/logan/taverne#entry'),
        Content::dialogue('La serveuse', 'assets/img/ambria/serveuse.png', 'ambria/logan/taverne#entry_serveuse'),
        Content::narrative('ambria/logan/taverne#entry_after_serveuse'),
    ],
    'actions' => [
        Content::action('Suivant.', 'settle_taverne'),
    ],
    'notes' => ['Bourse en cuir'],
];

return [
    'variants' => [
        'default' => $entry,
        'placeholder' => $entry,
        'entry' => $entry,
        'waiting' => [
            'audio' => 'assets/sounds/ambria/taverne.mp3',
            'blocks' => [
                Content::dialogue('Logan', 'assets/img/ambria/loganbarthelemymini.png', 'ambria/logan/taverne#waiting_logan', 'right'),
                Content::dialogue('La serveuse', 'assets/img/ambria/serveuse.png', 'ambria/logan/taverne#waiting_serveuse'),
                Content::narrative('ambria/logan/taverne#waiting'),
            ],
            'actions' => [
                Content::ask('Suivant.', 'objet', 'submit_password'),
            ],
            'hint' => Content::hint('ambria/logan/hints#taverne', 2),
        ],
        'wrong_password' => [
            'blocks' => [
                Content::narrative('ambria/logan/taverne#wrong_password'),
            ],
            'actions' => [
                Content::ask('Suivant.', 'objet', 'submit_password'),
            ],
            'hint' => Content::hint('ambria/logan/hints#taverne', 2),
        ],
        'sullivan_arrival' => [
            'audio' => 'assets/sounds/ambria/boursejetee.mp3',
            'blocks' => [
                Content::narrative('ambria/logan/taverne#sullivan_arrival'),
                Content::dialogue('Logan', 'assets/img/ambria/loganbarthelemymini.png', 'ambria/logan/taverne#sullivan_arrival_logan', 'right'),
            ],
            'actions' => [
                Content::action('Suivant.', 'continue_sullivan'),
            ],
            'notes' => ['Qui êtes-vous'],
        ],
        'sullivan_intro' => [
            'audio' => 'assets/sounds/ambria/epeeposee.mp3',
            'blocks' => [
                Content::narrative('ambria/logan/taverne#sullivan_intro'),
                Content::dialogue('Sullivan', 'assets/img/ambria/sullivanmasonmini.png', 'ambria/logan/taverne#sullivan_intro_sullivan'),
                Content::dialogue('Logan', 'assets/img/ambria/loganbarthelemymini.png', 'ambria/logan/taverne#sullivan_intro_logan', 'right'),
                Content::narrative('ambria/logan/taverne#sullivan_intro_after_logan'),
                Content::dialogue('Sullivan', 'assets/img/ambria/sullivanmasonmini.png', 'ambria/logan/taverne#sullivan_intro_sullivan_2'),
            ],
            'actions' => [
                Content::action('Suivant.', 'continue_negotiation'),
            ],
        ],
        'negotiation' => [
            'blocks' => [
                Content::narrative('ambria/logan/taverne#negotiation'),
                Content::dialogue('Logan', 'assets/img/ambria/loganbarthelemymini.png', 'ambria/logan/taverne#negotiation_logan', 'right'),
                Content::narrative('ambria/logan/taverne#negotiation_after_logan'),
                Content::dialogue('Sullivan', 'assets/img/ambria/sullivanmasonmini.png', 'ambria/logan/taverne#negotiation_sullivan'),
                Content::dialogue('Logan', 'assets/img/ambria/loganbarthelemymini.png', 'ambria/logan/taverne#negotiation_logan_2', 'right'),
                Content::narrative('ambria/logan/taverne#negotiation_after_logan_2'),
                Content::dialogue('Sullivan', 'assets/img/ambria/sullivanmasonmini.png', 'ambria/logan/taverne#negotiation_sullivan_2'),
            ],
            'actions' => [
                Content::action('Suivant.', 'start_embrouilles'),
            ],
        ],
    ],
];
