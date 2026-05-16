<?php

use App\Services\Adventures\Support\Content;

return [
    'variants' => [
        'introduction' => [
            'blocks' => [
                Content::narrative('ambria/logan/depart#introduction'),
            ],
            'actions' => [
                Content::action('Entrer.', 'enter_library'),
            ],
        ],
    ],
];
