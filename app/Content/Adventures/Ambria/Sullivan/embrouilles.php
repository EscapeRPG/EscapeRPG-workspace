<?php

use App\Services\Adventures\Support\Content;

$sullivan = 'assets/img/ambria/sullivanmasonmini.png';
$logan = 'assets/img/ambria/loganbarthelemymini.png';

$loganNameHint = Content::hint('ambria/sullivan/hints#logan_name');

return [
    'variants' => [
        'entry' => [
            'blocks' => [
                Content::narrative('ambria/sullivan/embrouilles#entry_intro'),
                Content::dialogue('Logan', $logan, 'ambria/sullivan/embrouilles#logan_offer'),
                Content::dialogue('Sullivan', $sullivan, 'ambria/sullivan/embrouilles#sullivan_reply', 'right'),
                Content::dialogue('Logan', $logan, 'ambria/sullivan/embrouilles#logan_bargain'),
                Content::narrative('ambria/sullivan/embrouilles#sullivan_leans'),
                Content::dialogue('Sullivan', $sullivan, 'ambria/sullivan/embrouilles#sullivan_question', 'right'),
            ],
            'actions' => [Content::action('Suivant.', 'continue_brawl_setup')],
        ],
        'brawl_setup' => [
            'audio' => 'assets/sounds/ambria/bagarretaverne.mp3',
            'blocks' => [
                Content::narrative('ambria/sullivan/embrouilles#brawl_intro'),
                Content::dialogue('Logan', $logan, 'ambria/sullivan/embrouilles#logan_parchment'),
                Content::narrative('ambria/sullivan/embrouilles#brawl_starts'),
                Content::dialogue('Sullivan', $sullivan, 'ambria/sullivan/embrouilles#sullivan_leave', 'right'),
                Content::narrative('ambria/sullivan/embrouilles#before_react'),
            ],
            'actions' => [Content::ask('Réagir.', 'danger', 'react_brawl')],
        ],
        'attention_success' => [
            'audio' => 'assets/sounds/ambria/tavernehommetombe.mp3',
            'blocks' => [
                Content::narrative('ambria/sullivan/embrouilles#attention_success'),
                Content::dialogue('Sullivan', $sullivan, 'ambria/sullivan/embrouilles#behind_you', 'right'),
                Content::narrative('ambria/sullivan/embrouilles#recover_weapon_success'),
            ],
            'actions' => [Content::ask('Réagir.', 'bagarre', 'warn_logan')],
        ],
        'attention_failure' => [
            'audio' => 'assets/sounds/ambria/tavernehommetombe.mp3',
            'blocks' => [
                Content::narrative('ambria/sullivan/embrouilles#attention_failure'),
                Content::dialogue('Sullivan', $sullivan, 'ambria/sullivan/embrouilles#behind_you', 'right'),
                Content::narrative('ambria/sullivan/embrouilles#recover_weapon_failure'),
            ],
            'actions' => [Content::ask('Réagir.', 'bagarre', 'warn_logan')],
        ],
        'dodge_success' => [
            'audio' => 'assets/sounds/ambria/sullivanesquivecoup.mp3',
            'blocks' => [
                Content::narrative('ambria/sullivan/embrouilles#dodge_success'),
                Content::dialogue('Sullivan', $sullivan, 'ambria/sullivan/embrouilles#we_leave', 'right'),
            ],
            'actions' => [Content::ask('Sortir.', 'sortir', 'leave_tavern')],
        ],
        'dodge_failure' => [
            'audio' => 'assets/sounds/ambria/sullivanprendcoup.mp3',
            'blocks' => [
                Content::narrative('ambria/sullivan/embrouilles#dodge_failure'),
                Content::dialogue('Sullivan', $sullivan, 'ambria/sullivan/embrouilles#we_leave', 'right'),
            ],
            'actions' => [Content::ask('Sortir.', 'sortir', 'leave_tavern')],
        ],
        'wrong_exit' => [
            'blocks' => [Content::narrative('ambria/sullivan/embrouilles#wrong_exit')],
            'actions' => [Content::ask('Sortir.', 'sortir', 'leave_tavern')],
        ],
        'after_fight' => [
            'audio' => 'assets/sounds/ambria/finbagarre.mp3',
            'blocks' => [
                Content::narrative('ambria/sullivan/embrouilles#after_fight'),
                Content::dialogue('Sullivan', $sullivan, 'ambria/sullivan/embrouilles#ask_explain', 'right'),
            ],
            'actions' => [Content::action('Suivant.', 'continue_away')],
        ],
        'away' => [
            'blocks' => [
                Content::dialogue('Logan', $logan, 'ambria/sullivan/embrouilles#logan_no_talk'),
                Content::dialogue('Sullivan', $sullivan, 'ambria/sullivan/embrouilles#sullivan_hurry', 'right'),
                Content::narrative('ambria/sullivan/embrouilles#sullivan_stops'),
                Content::dialogue('Sullivan', $sullivan, 'ambria/sullivan/embrouilles#offer_crew', 'right'),
                Content::narrative('ambria/sullivan/embrouilles#logan_accepts'),
                Content::dialogue('Sullivan', $sullivan, 'ambria/sullivan/embrouilles#ask_name', 'right'),
            ],
            'actions' => [Content::ask('Suivant.', 'logannom', 'submit_logan_name')],
            'hint' => $loganNameHint,
        ],
        'wrong_logan_name' => [
            'blocks' => [
                Content::narrative('ambria/sullivan/embrouilles#wrong_logan_name'),
                Content::dialogue('Sullivan', $sullivan, 'ambria/sullivan/embrouilles#ask_name', 'right'),
            ],
            'actions' => [Content::ask('Suivant.', 'logannom', 'submit_logan_name')],
            'hint' => $loganNameHint,
        ],
    ],
];
