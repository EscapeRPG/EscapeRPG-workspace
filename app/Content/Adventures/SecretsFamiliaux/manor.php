<?php

use App\Services\Adventures\Support\Content;

return [
    'variants' => [
        'step_0' => [
            'audio' => null,
            'blocks' => [
                Content::narrative('secretsfamiliaux/manor#step_0'),
            ],
            'actions' => [
                Content::action('Retour.', 'retour'),
            ],
        ],
    ],
];
