<?php

use App\Services\Adventures\Support\Content;

$sullivanPorte = static fn(): array => Content::partial('adventures/ambria/sullivan_porte');

return [
    'variants' => [
        'default' => [
            'audio' => 'assets/sounds/ambria/cite.mp3',
            'blocks' => [Content::narrative('ambria/sullivan/portescite#arrival')],
            'actions' => [Content::action('Chercher.', 'search_porte')],
        ],
        'arrival' => [
            'audio' => 'assets/sounds/ambria/cite.mp3',
            'blocks' => [Content::narrative('ambria/sullivan/portescite#arrival')],
            'actions' => [Content::action('Chercher.', 'search_porte')],
        ],
        'tablet' => [
            'audio' => 'assets/sounds/ambria/cite.mp3',
            'blocks' => [
                Content::linkedImage('assets/img/ambria/porte/tablette.png', 'Une tablette en or gravee.', 'enigmelieu'),
                Content::narrative('ambria/sullivan/portescite#tablet'),
            ],
            'actions' => [Content::action('Prendre la plaque.', 'take_tablet')],
        ],
        'tablet_taken' => [
            'blocks' => [Content::narrative('ambria/sullivan/portescite#tablet_taken')],
            'actions' => [Content::action('Observer la porte.', 'observe_porte')],
        ],
        'puzzle' => [
            'audio' => 'assets/sounds/ambria/cite.mp3',
            'blocks' => [
                $sullivanPorte(),
                Content::narrative('ambria/sullivan/portescite#puzzle'),
            ],
            'actions' => [],
            'hint' => Content::hint('ambria/sullivan/hints#portescite'),
            'scripts' => [
                'assets/js/adventures/dragDropPuzzle.js',
                'assets/js/adventures/ambria/porteSullivan.js',
            ],
        ],
    ],
];
