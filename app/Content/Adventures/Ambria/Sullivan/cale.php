<?php

use App\Services\Adventures\Support\Content;

return [
    'variants' => [
        'entry' => [
            'audio' => 'assets/sounds/ambria/pontinferieur.mp3',
            'blocks' => [
                Content::narrative('ambria/sullivan/cale#empty'),
            ],
            'actions' => [],
        ],
        'logan_found' => [
            'audio' => 'assets/sounds/ambria/cale.mp3',
            'blocks' => [
                Content::narrative('ambria/sullivan/cale#logan_found'),
                Content::dialogue('Sullivan', 'assets/img/ambria/sullivanmasonmini.png', 'ambria/sullivan/cale#sullivan_found', 'right'),
                Content::dialogue('Logan', 'assets/img/ambria/loganbarthelemymini.png', 'ambria/sullivan/cale#logan_found_dialogue'),
                Content::dialogue('Sullivan', 'assets/img/ambria/sullivanmasonmini.png', 'ambria/sullivan/cale#sullivan_follow', 'right'),
                Content::narrative('ambria/sullivan/cale#go_cabin'),
            ],
            'actions' => [
                Content::action('Suivant.', 'bring_logan_cabin'),
            ],
        ],
    ],
];
