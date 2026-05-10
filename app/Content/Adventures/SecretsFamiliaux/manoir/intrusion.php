<?php

use App\Services\Adventures\Support\Content;

return [
    'variants' => [
        'step_0' => [
            'audio' => null,
            'blocks' => [
                Content::narrative('secretsfamiliaux/manoir/intrusion#step_0'),
            ],
            'actions' => [
                Content::action('Suivant.', 'suivant'),
            ],
        ],
        'step_1' => [
            'audio' => null,
            'blocks' => [
                Content::narrative('secretsfamiliaux/manoir/intrusion#step_1'),
            ],
            'actions' => [
                Content::action('Faire un tour.', 'tour'),
                Content::action('Aller dormir.', 'nuit'),
            ],
        ],
    ],
];
