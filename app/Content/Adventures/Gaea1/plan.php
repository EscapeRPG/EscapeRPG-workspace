<?php

use App\Services\Adventures\Support\Content;

return [
    'variants' => [
        'default' => [
            'scripts' => ['assets/js/adventures/gaea1/plan.js'],
            'blocks' => [
                Content::partial('adventures/gaea1/plan'),
                Content::narrative('gaea1/plan#intro') + [
                    'visible_if' => Content::stateTruthy('premiereobservation'),
                ],
                Content::narrative('gaea1/plan#instructions'),
            ],
        ],
    ],
];
