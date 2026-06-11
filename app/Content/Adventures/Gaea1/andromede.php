<?php

use App\Services\Adventures\Support\Content;

return [
    'variants' => [
        'intro_animation' => [
            'layout' => 'adventure_bare',
            'page_view' => 'adventures/gaea1/intro_page',
            'blocks' => [
                Content::partial('adventures/gaea1/intro'),
            ],
            'scripts' => ['assets/js/adventures/gaea1/chargementintro.js'],
        ],
        'intro_text' => [
            'blocks' => [
                Content::narrative('gaea1/andromede#intro'),
            ],
            'actions' => [
                Content::action('suivant.', 'wake_up'),
            ],
        ],
        'wake_up' => [
            'audio' => 'assets/sounds/gaea1/eveil.mp3',
            'blocks' => [
                Content::narrative('gaea1/andromede#wake_up'),
            ],
            'actions' => [
                Content::action('suivant.', 'go_signal'),
            ],
        ],
    ],
];
