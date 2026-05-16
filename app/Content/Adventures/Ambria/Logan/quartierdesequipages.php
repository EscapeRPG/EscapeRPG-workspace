<?php

use App\Services\Adventures\Support\Content;

return [
    'variants' => [
        'default' => [
            'audio' => 'assets/sounds/ambria/quartierequipages.mp3',
            'blocks' => [Content::narrative('ambria/logan/quartierdesequipages#default')],
            'actions' => [],
        ],
        'jake' => [
            'audio' => 'assets/sounds/ambria/quartierequipages.mp3',
            'blocks' => [
                Content::narrative('ambria/logan/quartierdesequipages#jake'),
                Content::dialogue('Jake', 'assets/img/ambria/jake.png', 'ambria/logan/quartierdesequipages#jake_dialogue'),
                Content::narrative('ambria/logan/quartierdesequipages#jake_after'),
                Content::dialogue('Jake', 'assets/img/ambria/jake.png', 'ambria/logan/quartierdesequipages#jake_dialogue_2'),
                Content::narrative('ambria/logan/quartierdesequipages#jake_end'),
            ],
            'actions' => [],
        ],
    ],
];
