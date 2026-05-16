<?php

use App\Services\Adventures\Support\Content;

$porte = static fn(): array => Content::partial('adventures/ambria/porte');

return [
    'variants' => [
        'default' => [
            'audio' => 'assets/sounds/ambria/cite.mp3',
            'blocks' => [Content::narrative('ambria/logan/portescite#entry')],
            'actions' => [Content::action('Observer la porte.', 'observe_porte')],
        ],
        'entry' => [
            'audio' => 'assets/sounds/ambria/cite.mp3',
            'blocks' => [Content::narrative('ambria/logan/portescite#entry')],
            'actions' => [Content::action('Observer la porte.', 'observe_porte')],
        ],
        'arrival' => [
            'audio' => 'assets/sounds/ambria/cite.mp3',
            'blocks' => [Content::narrative('ambria/logan/portescite#entry')],
            'actions' => [Content::action('Observer la porte.', 'observe_porte')],
        ],
        'porte' => [
            'audio' => 'assets/sounds/ambria/cite.mp3',
            'blocks' => [
                $porte(),
                Content::narrative('ambria/logan/portescite#porte'),
            ],
            'actions' => [],
            'hint' => Content::hint('ambria/logan/hints#portescite'),
        ],
        'wrong_boulets' => [
            'audio' => 'assets/sounds/ambria/cite.mp3',
            'blocks' => [
                Content::narrative('ambria/logan/portescite#wrong_boulets'),
                $porte(),
                Content::narrative('ambria/logan/portescite#porte'),
            ],
            'actions' => [],
            'hint' => Content::hint('ambria/logan/hints#portescite'),
        ],
        'opened' => [
            'audio' => 'assets/sounds/ambria/porteciteouvre.mp3',
            'blocks' => [Content::narrative('ambria/logan/portescite#opened')],
            'actions' => [Content::action('Entrer.', 'enter_cite')],
        ],
    ],
];
