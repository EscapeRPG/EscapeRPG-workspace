<?php

use App\Services\Adventures\Support\Content;

$ask = [Content::ask('Demander.', 'ask', 'ask_ship')];

return [
    'variants' => [
        'entry' => [
            'audio' => 'assets/sounds/ambria/quartierequipages.mp3',
            'blocks' => [
                Content::narrative('ambria/sullivan/quartierdesequipages#entry'),
                Content::dialogue('Jean', 'assets/img/ambria/jean.png', 'ambria/sullivan/quartierdesequipages#jean_entry'),
            ],
            'actions' => $ask,
        ],
        'ask_logan' => [
            'audio' => 'assets/sounds/ambria/quartierequipages.mp3',
            'blocks' => [
                Content::dialogue('Jean', 'assets/img/ambria/jean.png', 'ambria/sullivan/quartierdesequipages#ask_logan'),
            ],
            'actions' => $ask,
        ],
        'jake_found' => [
            'audio' => 'assets/sounds/ambria/quartierequipages.mp3',
            'blocks' => [
                Content::dialogue('Jean', 'assets/img/ambria/jean.png', 'ambria/sullivan/quartierdesequipages#ask_jake'),
                Content::narrative('ambria/sullivan/quartierdesequipages#jake_found'),
                Content::dialogue('Jean', 'assets/img/ambria/jean.png', 'ambria/sullivan/quartierdesequipages#jake_recent'),
                Content::narrative('ambria/sullivan/quartierdesequipages#wake_jake_setup'),
            ],
            'actions' => [
                Content::action('Le secouer.', 'wake_jake'),
            ],
        ],
        'jake_awake' => [
            'audio' => 'assets/sounds/ambria/reveiljake.mp3',
            'blocks' => [
                Content::narrative('ambria/sullivan/quartierdesequipages#jake_awake'),
                Content::dialogue('Jake', 'assets/img/ambria/jake.png', 'ambria/sullivan/quartierdesequipages#jake_awake_dialogue'),
                Content::dialogue('Sullivan', 'assets/img/ambria/sullivanmasonmini.png', 'ambria/sullivan/quartierdesequipages#sullivan_asks_jake', 'right'),
                Content::narrative('ambria/sullivan/quartierdesequipages#before_jake_answer'),
                Content::dialogue('Jake', 'assets/img/ambria/jake.png', 'ambria/sullivan/quartierdesequipages#jake_answer'),
                Content::narrative('ambria/sullivan/quartierdesequipages#after_jake_answer'),
                Content::dialogue('Jake', 'assets/img/ambria/jake.png', 'ambria/sullivan/quartierdesequipages#jake_reassures'),
                Content::narrative('ambria/sullivan/quartierdesequipages#go_cale'),
            ],
            'actions' => [
                Content::action('Suivant.', 'go_to_cale'),
            ],
        ],
        'ask_unknown' => [
            'blocks' => [
                Content::dialogue('Jean', 'assets/img/ambria/jean.png', 'ambria/sullivan/quartierdesequipages#ask_unknown'),
            ],
            'actions' => $ask,
        ],
    ],
];
