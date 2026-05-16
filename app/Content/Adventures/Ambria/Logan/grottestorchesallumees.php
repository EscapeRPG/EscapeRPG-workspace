<?php

use App\Services\Adventures\Support\Content;

return [
    'variants' => [
        'default' => [
            'audio' => 'assets/sounds/ambria/grottetorche.mp3',
            'blocks' => [Content::narrative('ambria/logan/grottestorchesallumees#entry')],
            'actions' => [Content::action('Suivant.', 'continue_lueur')],
        ],
        'entry' => [
            'audio' => 'assets/sounds/ambria/grottetorche.mp3',
            'blocks' => [Content::narrative('ambria/logan/grottestorchesallumees#entry')],
            'actions' => [Content::action('Suivant.', 'continue_lueur')],
        ],
        'lueur' => [
            'audio' => 'assets/sounds/ambria/grottetorche.mp3',
            'blocks' => [
                Content::image('assets/img/ambria/logangrottestorchesallumees.png', 'Antichambre éclairée par les torches.', 'enigmelieu'),
                Content::narrative('ambria/logan/grottestorchesallumees#lueur'),
            ],
            'actions' => [Content::action('Chercher la sortie.', 'go_portescite')],
        ],
        'portescite_return' => [
            'audio' => 'assets/sounds/ambria/grottetorche.mp3',
            'blocks' => [
                Content::image('assets/img/ambria/logangrottestorchesallumees.png', 'Antichambre éclairée par les torches.', 'enigmelieu'),
                Content::narrative('ambria/logan/grottestorchesallumees#portescite_return'),
            ],
            'actions' => [],
            'hint' => Content::hint('ambria/logan/hints#torches'),
        ],
    ],
];
