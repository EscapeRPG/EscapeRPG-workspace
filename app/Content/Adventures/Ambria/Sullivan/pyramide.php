<?php

use App\Services\Adventures\Support\Content;

$sullivan = 'assets/img/ambria/sullivanmasonmini.png';
$logan = 'assets/img/ambria/loganbarthelemymini.png';
$pirate = 'assets/img/ambria/pirate.png';
$jake = 'assets/img/ambria/jake.png';

$askLogan = static fn(): array => Content::ask('Avancer.', 'logan', 'submit_logan_treasure');
$askMutiny = static fn(): array => Content::ask('Attendre sa reponse.', 'mutinerie', 'submit_logan_mutiny');
$askRelease = static fn(): array => Content::ask('Suivant.', 'levers', 'submit_release_order');

return [
    'variants' => [
        'default' => [
            'audio' => 'assets/sounds/ambria/grottetorcheallume.mp3',
            'blocks' => [Content::narrative('ambria/sullivan/pyramide#entry')],
            'actions' => [Content::action('Suivant.', 'continue_upper_hall')],
        ],
        'entry' => [
            'audio' => 'assets/sounds/ambria/grottetorcheallume.mp3',
            'blocks' => [Content::narrative('ambria/sullivan/pyramide#entry')],
            'actions' => [Content::action('Suivant.', 'continue_upper_hall')],
        ],
        'upper_hall_trust' => [
            'audio' => 'assets/sounds/ambria/grottetorche.mp3',
            'blocks' => [
                Content::dialogue('Un pirate', $pirate, 'ambria/sullivan/pyramide#upper_hall_pirate'),
                Content::narrative('ambria/sullivan/pyramide#upper_hall_intro'),
                Content::dialogue('Sullivan', $sullivan, 'ambria/sullivan/pyramide#upper_hall_sullivan_trust', 'right'),
                Content::narrative('ambria/sullivan/pyramide#upper_hall_after_order'),
                Content::dialogue('Un pirate', $pirate, 'ambria/sullivan/pyramide#upper_hall_bordel'),
                Content::narrative('ambria/sullivan/pyramide#upper_hall_skeletons'),
                Content::dialogue('Un pirate', $pirate, 'ambria/sullivan/pyramide#upper_hall_skeleton_reaction'),
                Content::dialogue('Sullivan', $sullivan, 'ambria/sullivan/pyramide#upper_hall_sullivan_stairs', 'right'),
                Content::narrative('ambria/sullivan/pyramide#upper_hall_balcony'),
            ],
            'actions' => [Content::action('Suivant.', 'continue_treasure_room')],
        ],
        'upper_hall_mistrust' => [
            'audio' => 'assets/sounds/ambria/grottetorche.mp3',
            'blocks' => [
                Content::dialogue('Un pirate', $pirate, 'ambria/sullivan/pyramide#upper_hall_pirate'),
                Content::narrative('ambria/sullivan/pyramide#upper_hall_intro'),
                Content::dialogue('Sullivan', $sullivan, 'ambria/sullivan/pyramide#upper_hall_sullivan_mistrust', 'right'),
                Content::narrative('ambria/sullivan/pyramide#upper_hall_after_order'),
                Content::dialogue('Un pirate', $pirate, 'ambria/sullivan/pyramide#upper_hall_bordel'),
                Content::narrative('ambria/sullivan/pyramide#upper_hall_skeletons'),
                Content::dialogue('Un pirate', $pirate, 'ambria/sullivan/pyramide#upper_hall_skeleton_reaction'),
                Content::dialogue('Sullivan', $sullivan, 'ambria/sullivan/pyramide#upper_hall_sullivan_stairs', 'right'),
                Content::narrative('ambria/sullivan/pyramide#upper_hall_balcony'),
            ],
            'actions' => [Content::action('Suivant.', 'continue_treasure_room')],
        ],
        'treasure_room' => [
            'audio' => 'assets/sounds/ambria/pyramidetop.mp3',
            'blocks' => [
                Content::narrative('ambria/sullivan/pyramide#treasure_room_intro'),
                Content::dialogue('Sullivan', $sullivan, 'ambria/sullivan/pyramide#treasure_room_sullivan', 'right'),
                Content::narrative('ambria/sullivan/pyramide#treasure_room'),
            ],
            'actions' => [$askLogan()],
        ],
        'wrong_logan' => [
            'blocks' => [Content::narrative('ambria/sullivan/pyramide#wrong_logan')],
            'actions' => [$askLogan()],
        ],
        'bad_end_pending' => [
            'audio' => 'assets/sounds/ambria/prisontombe.mp3',
            'blocks' => [
                Content::narrative('ambria/sullivan/pyramide#cage_intro_bad'),
                Content::dialogue('Logan', $logan, 'ambria/sullivan/pyramide#logan_bad'),
                Content::dialogue('Sullivan', $sullivan, 'ambria/sullivan/pyramide#sullivan_call_help', 'right'),
                Content::narrative('ambria/sullivan/pyramide#bad_end_pending'),
                Content::dialogue('Sullivan', $sullivan, 'ambria/sullivan/pyramide#sullivan_what', 'right'),
            ],
            'actions' => [Content::action('Suivant.', 'continue_bad_end')],
        ],
        'mutiny_choice' => [
            'audio' => 'assets/sounds/ambria/prisontombe.mp3',
            'blocks' => [
                Content::narrative('ambria/sullivan/pyramide#cage_intro_solo'),
                Content::dialogue('Logan', $logan, 'ambria/sullivan/pyramide#logan_stay'),
                Content::narrative('ambria/sullivan/pyramide#mutiny_setup'),
                Content::dialogue('Sullivan', $sullivan, 'ambria/sullivan/pyramide#mutiny_sullivan', 'right'),
                Content::narrative('ambria/sullivan/pyramide#mutiny_jake_intro'),
                Content::dialogue('Jake', $jake, 'ambria/sullivan/pyramide#mutiny_jake'),
                Content::narrative('ambria/sullivan/pyramide#mutiny_choice'),
                Content::dialogue('Jake', $jake, 'ambria/sullivan/pyramide#mutiny_jake_choice'),
            ],
            'actions' => [$askMutiny()],
        ],
        'mutiny_betrayal' => [
            'audio' => 'assets/sounds/ambria/recuptresor.mp3',
            'blocks' => [
                Content::dialogue('Logan', $logan, 'ambria/sullivan/pyramide#logan_betrayal'),
                Content::narrative('ambria/sullivan/pyramide#mutiny_betrayal'),
                Content::dialogue('Jake', $jake, 'ambria/sullivan/pyramide#jake_approval'),
                Content::narrative('ambria/sullivan/pyramide#mutiny_loot'),
            ],
            'actions' => [Content::action('Suivant.', 'start_solo_cage')],
        ],
        'mutiny_loyal' => [
            'audio' => 'assets/sounds/ambria/recuptresor.mp3',
            'blocks' => [
                Content::dialogue('Logan', $logan, 'ambria/sullivan/pyramide#logan_loyal'),
                Content::narrative('ambria/sullivan/pyramide#mutiny_betrayal'),
                Content::dialogue('Jake', $jake, 'ambria/sullivan/pyramide#jake_approval'),
                Content::narrative('ambria/sullivan/pyramide#mutiny_loyal_hint'),
            ],
            'actions' => [Content::action('Suivant.', 'start_levier')],
        ],
        'wrong_mutiny' => [
            'blocks' => [Content::narrative('ambria/sullivan/pyramide#wrong_mutiny')],
            'actions' => [$askMutiny()],
        ],
        'cage_levier' => [
            'audio' => 'assets/sounds/ambria/prisontombe.mp3',
            'blocks' => [
                Content::narrative('ambria/sullivan/pyramide#cage_intro_solo'),
                Content::dialogue('Logan', $logan, 'ambria/sullivan/pyramide#logan_release'),
                Content::narrative('ambria/sullivan/pyramide#cage_search'),
                Content::dialogue('Sullivan', $sullivan, 'ambria/sullivan/pyramide#cage_sullivan_search', 'right'),
                Content::narrative('ambria/sullivan/pyramide#cage_found'),
                Content::dialogue('Logan', $logan, 'ambria/sullivan/pyramide#logan_found'),
            ],
            'actions' => [Content::action('Suivant.', 'start_levier')],
        ],
        'levier_pending' => [
            'audio' => 'assets/sounds/ambria/jungle.mp3',
            'blocks' => [
                Content::image('assets/img/ambria/cage.png', 'La cage dans la salle du tresor.', 'enigmelieu'),
                Content::narrative('ambria/sullivan/pyramide#levier_pending'),
            ],
            'actions' => [$askRelease()],
            'hint' => Content::hint('ambria/sullivan/hints#levier', 3),
        ],
        'wrong_release' => [
            'blocks' => [Content::narrative('ambria/sullivan/pyramide#wrong_release')],
            'actions' => [$askRelease()],
            'hint' => Content::hint('ambria/sullivan/hints#levier', 3),
        ],
        'solo_cage' => [
            'audio' => 'assets/sounds/ambria/jungle.mp3',
            'blocks' => [
                Content::image('assets/img/ambria/cagesolo.png', 'Sullivan seul dans la cage.', 'enigmelieu'),
                Content::narrative('ambria/sullivan/pyramide#solo_cage'),
            ],
            'actions' => [Content::action('Tenter le levier.', 'finish_abandoned')],
        ],
        'release_loyal' => [
            'audio' => 'assets/sounds/ambria/prisonmonte.mp3',
            'blocks' => [
                Content::narrative('ambria/sullivan/pyramide#release_loyal'),
                Content::dialogue('Jake', $jake, 'ambria/sullivan/pyramide#release_jake'),
            ],
            'actions' => [Content::action('Suivant.', 'finish_loyal')],
        ],
        'release_good' => [
            'audio' => 'assets/sounds/ambria/prisonmonte.mp3',
            'blocks' => [
                Content::narrative('ambria/sullivan/pyramide#release_good'),
                Content::dialogue('Sullivan', $sullivan, 'ambria/sullivan/pyramide#release_sullivan', 'right'),
            ],
            'actions' => [Content::action('Suivant.', 'finish_good')],
        ],
        'release_best' => [
            'audio' => 'assets/sounds/ambria/prisonmonte.mp3',
            'blocks' => [
                Content::narrative('ambria/sullivan/pyramide#release_good'),
                Content::dialogue('Sullivan', $sullivan, 'ambria/sullivan/pyramide#release_sullivan', 'right'),
            ],
            'actions' => [Content::action('Suivant.', 'finish_best')],
        ],
    ],
];
