<?php

use App\Services\Adventures\Support\Content;

$intro = static function (string $section): array {
    return [
        'audio' => 'assets/sounds/ambria/flots.mp3',
        'blocks' => [
            Content::dialogue('Barthy', 'assets/img/ambria/barthy.png', 'ambria/logan/flots#' . $section),
        ],
        'actions' => [
            Content::action('Suivant.', 'continue_flots'),
        ],
    ];
};

$deck = [
    'audio' => 'assets/sounds/ambria/flots.mp3',
    'blocks' => [
        Content::narrative('ambria/logan/flots#deck'),
    ],
    'actions' => [],
];

return [
    'variants' => [
        'default' => $deck,
        'placeholder' => $deck,
        'entry' => $deck,
        'success' => $intro('success'),
        'failure' => $intro('failure'),
        'deck' => $deck,
    ],
];
