<?php

use App\Services\Adventures\Support\Content;

return [
    'variants' => [
        'step_0' => [
            'audio' => null,
            'blocks' => [
                Content::narrative('secretsfamiliaux/manoir/chambres#step_0'),
            ],
            'actions' => [
                Content::action('Aller dormir.', 'dormir'),
            ],
        ],
    ],
];
