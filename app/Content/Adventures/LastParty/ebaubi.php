<?php

use App\Services\Adventures\Support\Content;

return [
    'variants' => [
        'revelation' => [
            'audio' => null,
            'blocks' => [
                Content::narrative('lastparty/ebaubi#revelation'),
            ],
            'actions' => [
                Content::action('ÉBAUBI', 'finish_story'),
            ],
        ],
        'completed' => [
            'audio' => null,
            'blocks' => [
                Content::image('assets/img/etoilefinpleine.png', 'étoile fin'),
                Content::narrative('lastparty/ebaubi#completed'),
                Content::comments(),
            ],
            'actions' => [],
        ],
    ],
];
