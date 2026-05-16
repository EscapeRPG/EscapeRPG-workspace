<?php

use App\Services\Adventures\Support\Content;

return [
    'variants' => [
        'entry' => [
            'audio' => 'assets/sounds/ambria/accoste.mp3',
            'blocks' => [Content::narrative('ambria/sullivan/tortuga#entry')],
            'actions' => [],
        ],
    ],
];
