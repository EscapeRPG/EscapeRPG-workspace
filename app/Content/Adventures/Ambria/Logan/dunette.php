<?php

use App\Services\Adventures\Support\Content;

return [
    'variants' => [
        'entry' => [
            'audio' => 'assets/sounds/ambria/flots.mp3',
            'blocks' => [
                Content::narrative('ambria/logan/dunette#entry'),
                Content::dialogue('Le timonier', 'assets/img/ambria/timonier.png', 'ambria/logan/dunette#entry_timonier'),
                Content::narrative('ambria/logan/dunette#entry_after_timonier'),
                Content::dialogue('Le timonier', 'assets/img/ambria/timonier.png', 'ambria/logan/dunette#entry_timonier_2'),
                Content::narrative('ambria/logan/dunette#entry_end'),
            ],
            'actions' => [Content::action('Redescendre.', 'leave_dunette')],
        ],
        'visited' => [
            'audio' => 'assets/sounds/ambria/flots.mp3',
            'blocks' => [Content::narrative('ambria/logan/dunette#visited')],
            'actions' => [],
        ],
        'carrying_food' => [
            'audio' => 'assets/sounds/ambria/flots.mp3',
            'blocks' => [
                Content::narrative('ambria/logan/dunette#carrying_food'),
                Content::dialogue('Le timonier', 'assets/img/ambria/timonier.png', 'ambria/logan/dunette#carrying_food_timonier'),
            ],
            'actions' => [Content::action('Lui donner les victuailles.', 'give_victuals')],
        ],
        'delivered' => [
            'audio' => 'assets/sounds/ambria/flots.mp3',
            'blocks' => [Content::narrative('ambria/logan/dunette#delivered')],
            'actions' => [],
        ],
        'done' => [
            'audio' => 'assets/sounds/ambria/flots.mp3',
            'blocks' => [Content::narrative('ambria/logan/dunette#done')],
            'actions' => [],
        ],
    ],
];
