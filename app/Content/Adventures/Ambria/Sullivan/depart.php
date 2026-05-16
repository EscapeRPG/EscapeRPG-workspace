<?php

use App\Services\Adventures\Support\Content;

return [
    'variants' => [
        'introduction' => [
            'blocks' => [Content::narrative('ambria/sullivan/depart#introduction')],
            'actions' => [Content::action('Accoster.', 'dock_tortuga')],
        ],
    ],
];
