<?php

use App\Services\Adventures\Support\Content;

$paul = 'assets/img/ambria/vieuxtype.png';

return [
    'variants' => [
        'entry' => [
            'audio' => 'assets/sounds/ambria/bordelvieux.mp3',
            'blocks' => [
                Content::narrative('ambria/sullivan/bordel#entry'),
                Content::dialogue('Un vieux type', $paul, 'ambria/sullivan/bordel#paul_beg'),
            ],
            'actions' => [Content::ask('Lui donner.', 'vieux', 'give_paul')],
            'hint' => Content::hint('ambria/sullivan/hints#paul'),
        ],
        'wrong_paul' => [
            'audio' => 'assets/sounds/ambria/bordel.mp3',
            'blocks' => [
                Content::dialogue('Un vieux type', $paul, 'ambria/sullivan/bordel#paul_wrong'),
                Content::narrative('ambria/sullivan/bordel#paul_waits'),
            ],
            'actions' => [Content::ask('Lui donner.', 'vieux', 'give_paul')],
        ],
        'paul_drinks' => [
            'audio' => 'assets/sounds/ambria/vieuxboit.mp3',
            'blocks' => [Content::dialogue('Paul', $paul, 'ambria/sullivan/bordel#paul_drinks')],
            'actions' => [Content::action('Lui parler de la carte.', 'talk_paul_map')],
        ],
        'paul_map' => [
            'audio' => 'assets/sounds/ambria/bordel.mp3',
            'blocks' => [
                Content::dialogue('Paul', $paul, 'ambria/sullivan/bordel#paul_map'),
                Content::narrative('ambria/sullivan/bordel#paul_map_outro'),
            ],
            'actions' => [Content::action('Retour.', 'leave_paul')],
        ],
        'visited' => [
            'audio' => 'assets/sounds/ambria/bordel.mp3',
            'blocks' => [Content::narrative('ambria/sullivan/bordel#visited')],
        ],
    ],
];
