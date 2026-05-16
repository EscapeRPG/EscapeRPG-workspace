<?php

use App\Services\Adventures\Support\Content;

return [
    'variants' => [
        'entry' => [
            'audio' => 'assets/sounds/ambria/grottetorche.mp3',
            'blocks' => [Content::narrative('ambria/sullivan/grottes#entry')],
            'actions' => [Content::action('Suivant.', 'continue_lueur')],
        ],
        'lueur' => [
            'audio' => 'assets/sounds/ambria/grottetorche.mp3',
            'blocks' => [
                Content::image('assets/img/ambria/grottestorchesallumees.png', 'Grotte aux torches allumées.', 'enigmelieu'),
                Content::narrative('ambria/sullivan/grottes#lueur'),
            ],
            'actions' => [Content::action('Chercher la sortie.', 'go_portescite')],
        ],
        'portescite_return' => [
            'audio' => 'assets/sounds/ambria/grottetorche.mp3',
            'blocks' => [
                Content::image('assets/img/ambria/grottestorchesallumees.png', 'Grotte aux torches allumées.', 'enigmelieu'),
                Content::narrative('ambria/sullivan/grottes#portescite_return'),
            ],
            'actions' => [],
            'hint' => Content::hint('ambria/sullivan/hints#torches'),
        ],
    ],
];
