<?php

use App\Services\Adventures\Support\Content;

return [
    'variants' => [
        'default' => [
            'audio' => 'assets/sounds/ambria/pontinferieur.mp3',
            'blocks' => [Content::narrative('ambria/logan/pontinferieur#default')],
            'actions' => [],
        ],
        'jake' => [
            'audio' => 'assets/sounds/ambria/pontinferieur.mp3',
            'blocks' => [
                Content::narrative('ambria/logan/pontinferieur#jake'),
                Content::dialogue('Jake', 'assets/img/ambria/jake.png', 'ambria/logan/pontinferieur#jake_dialogue'),
                Content::narrative('ambria/logan/pontinferieur#jake_after'),
                Content::dialogue('Jake', 'assets/img/ambria/jake.png', 'ambria/logan/pontinferieur#jake_dialogue_2'),
            ],
            'actions' => [
                Content::action('Continuer la visite.', 'continue_quarters'),
            ],
        ],
    ],
];
