<?php

use App\Services\Adventures\Support\Content;

return [
    'variants' => [
        'default' => [
            'audio' => 'assets/sounds/ambria/grotte.mp3',
            'blocks' => [
                Content::image('assets/img/ambria/logangrottestorcheseteintes.png', 'Antichambre plongée dans l’obscurité.', 'enigmelieu'),
                Content::narrative('ambria/logan/grottestorcheseteintes#entry'),
            ],
            'actions' => [],
            'hint' => Content::hint('ambria/logan/hints#mousse'),
        ],
        'entry' => [
            'audio' => 'assets/sounds/ambria/grotte.mp3',
            'blocks' => [
                Content::image('assets/img/ambria/logangrottestorcheseteintes.png', 'Antichambre plongée dans l’obscurité.', 'enigmelieu'),
                Content::narrative('ambria/logan/grottestorcheseteintes#entry'),
            ],
            'actions' => [],
            'hint' => Content::hint('ambria/logan/hints#mousse'),
        ],
    ],
];
