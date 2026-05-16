<?php

use App\Services\Adventures\Support\Content;

return [
    'variants' => [
        'entry' => [
            'audio' => 'assets/sounds/ambria/cale.mp3',
            'blocks' => [
                Content::narrative('ambria/logan/cale#entry'),
                Content::dialogue('Barthy', 'assets/img/ambria/barthy.png', 'ambria/logan/cale#barthy'),
                Content::narrative('ambria/logan/cale#rules'),
                Content::dialogue('Barthy', 'assets/img/ambria/barthy.png', 'ambria/logan/cale#rules_barthy'),
                Content::narrative('ambria/logan/cale#game'),
                Content::dialogue('Barthy', 'assets/img/ambria/barthy.png', 'ambria/logan/cale#bet_barthy'),
                Content::dialogue('Lloyd', 'assets/img/ambria/lloyd.png', 'ambria/logan/cale#bet_lloyd', 'right'),
            ],
            'actions' => [Content::ask('Jouer.', 'capitaine', 'submit_dice_password')],
        ],
        'wrong_password' => [
            'blocks' => [Content::narrative('ambria/logan/cale#wrong_password')],
            'actions' => [Content::ask('Jouer.', 'capitaine', 'submit_dice_password')],
        ],
    ],
];
