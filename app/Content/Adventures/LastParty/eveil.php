<?php

use App\Services\Adventures\Support\Content;

return [
    'variants' => [
        'introduction' => [
            'audio' => 'assets/sounds/lastparty/reveil.mp3',
            'blocks' => [
                Content::narrative('lastparty/eveil#introduction'),
            ],
            'actions' => [
                Content::action('Suivant.', 'continue_intro'),
            ],
        ],
        'room' => [
            'audio' => 'assets/sounds/lastparty/message.mp3',
            'blocks' => [
                Content::interactiveImage(
                    'assets/img/lastparty/appartement.png',
                    'appartement',
                    [
                        Content::hotspot(
                            'phone',
                            'open_phone',
                            'assets/img/lastparty/telephonemini.png',
                            'téléphone'
                        ),
                    ]
                ),
                Content::narrative('lastparty/eveil#room'),
            ],
            'hint' => Content::hint('lastparty/hints#eveil_phone'),
            'actions' => [],
        ],
    ],
];
