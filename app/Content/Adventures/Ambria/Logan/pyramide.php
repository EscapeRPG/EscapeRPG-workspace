<?php

use App\Services\Adventures\Support\Content;

$sullivan = 'assets/img/ambria/sullivanmasonmini.png';
$logan = 'assets/img/ambria/loganbarthelemymini.png';
$barthy = 'assets/img/ambria/barthy.png';
$lloyd = 'assets/img/ambria/lloyd.png';
$jake = 'assets/img/ambria/jake.png';

$cageIntro = static fn(): array => Content::narrative('ambria/logan/pyramide#cage_intro');
$cageSearch = static fn(): array => [
    Content::narrative('ambria/logan/pyramide#cage_search'),
    Content::dialogue('Sullivan', $sullivan, 'ambria/logan/pyramide#cage_sullivan'),
    Content::narrative('ambria/logan/pyramide#cage_levier_found'),
    Content::dialogue('Logan', $logan, 'ambria/logan/pyramide#cage_logan_found', 'right'),
];

return [
    'variants' => [
        'default' => [
            'audio' => 'assets/sounds/ambria/grottetorche.mp3',
            'blocks' => [Content::narrative('ambria/logan/pyramide#entry')],
            'actions' => [Content::ask('Suivant.', 'sullivan', 'submit_sullivan_order')],
        ],
        'entry' => [
            'audio' => 'assets/sounds/ambria/grottetorche.mp3',
            'blocks' => [Content::narrative('ambria/logan/pyramide#entry')],
            'actions' => [Content::ask('Suivant.', 'sullivan', 'submit_sullivan_order')],
        ],
        'wrong_sullivan_order' => [
            'blocks' => [Content::narrative('ambria/logan/pyramide#wrong_sullivan_order')],
            'actions' => [Content::ask('Suivant.', 'sullivan', 'submit_sullivan_order')],
        ],
        'upper_hall' => [
            'audio' => 'assets/sounds/ambria/grottetorche.mp3',
            'blocks' => [
                Content::narrative('ambria/logan/pyramide#upper_hall_intro'),
                Content::dialogue('Barthy', $barthy, 'ambria/logan/pyramide#upper_hall_barthy'),
                Content::dialogue('Lloyd', $lloyd, 'ambria/logan/pyramide#upper_hall_lloyd', 'right'),
                Content::narrative('ambria/logan/pyramide#upper_hall_skeletons'),
                Content::dialogue('Sullivan', $sullivan, 'ambria/logan/pyramide#upper_hall_sullivan'),
                Content::narrative('ambria/logan/pyramide#upper_hall_balcony'),
            ],
            'actions' => [Content::action('Suivant.', 'continue_treasure_room')],
        ],
        'treasure_room' => [
            'audio' => 'assets/sounds/ambria/pyramidetop.mp3',
            'blocks' => [
                Content::narrative('ambria/logan/pyramide#treasure_room_intro'),
                Content::dialogue('Sullivan', $sullivan, 'ambria/logan/pyramide#treasure_room_sullivan'),
                Content::narrative('ambria/logan/pyramide#treasure_room'),
            ],
            'actions' => [Content::action('Avancer.', 'advance_to_treasure')],
        ],
        'cage_levier_trust' => [
            'audio' => 'assets/sounds/ambria/prisontombe.mp3',
            'blocks' => array_merge([
                $cageIntro(),
                Content::dialogue('Logan', $logan, 'ambria/logan/pyramide#cage_logan_trust', 'right'),
            ], $cageSearch()),
            'actions' => [Content::action('Suivant.', 'start_levier')],
        ],
        'cage_levier_mixed' => [
            'audio' => 'assets/sounds/ambria/prisontombe.mp3',
            'blocks' => array_merge([
                $cageIntro(),
                Content::dialogue('Logan', $logan, 'ambria/logan/pyramide#cage_logan_mixed', 'right'),
            ], $cageSearch()),
            'actions' => [Content::action('Suivant.', 'start_levier')],
        ],
        'mutiny_choice' => [
            'audio' => 'assets/sounds/ambria/prisontombe.mp3',
            'blocks' => [
                $cageIntro(),
                Content::dialogue('Logan', $logan, 'ambria/logan/pyramide#cage_logan_stay', 'right'),
                Content::narrative('ambria/logan/pyramide#mutiny_setup'),
                Content::dialogue('Sullivan', $sullivan, 'ambria/logan/pyramide#mutiny_sullivan'),
                Content::narrative('ambria/logan/pyramide#mutiny_jake_intro'),
                Content::dialogue('Jake', $jake, 'ambria/logan/pyramide#mutiny_jake'),
                Content::narrative('ambria/logan/pyramide#mutiny_choice'),
                Content::dialogue('Jake', $jake, 'ambria/logan/pyramide#mutiny_jake_choice'),
            ],
            'actions' => [
                Content::action('Vous mutiner.', 'choose_mutiny'),
                Content::action('Refuser de vous mutiner.', 'refuse_mutiny'),
            ],
        ],
        'bad_end_pending' => [
            'audio' => 'assets/sounds/ambria/prisontombe.mp3',
            'blocks' => [
                Content::narrative('ambria/logan/pyramide#cage_intro_bad'),
                Content::dialogue('Logan', $logan, 'ambria/logan/pyramide#cage_logan_bad', 'right'),
                Content::dialogue('Sullivan', $sullivan, 'ambria/logan/pyramide#cage_sullivan_call'),
                Content::narrative('ambria/logan/pyramide#bad_end_pending'),
                Content::dialogue('Sullivan', $sullivan, 'ambria/logan/pyramide#bad_end_sullivan'),
            ],
            'actions' => [Content::action('Suivant.', 'continue_bad_end')],
        ],
        'mutiny_accept' => [
            'audio' => 'assets/sounds/ambria/recuptresor.mp3',
            'blocks' => [
                Content::narrative('ambria/logan/pyramide#mutiny_reflection'),
                Content::dialogue('Logan', $logan, 'ambria/logan/pyramide#mutiny_accept_logan', 'right'),
                Content::narrative('ambria/logan/pyramide#mutiny_accept'),
                Content::dialogue('Jake', $jake, 'ambria/logan/pyramide#mutiny_jake_approval'),
                Content::narrative('ambria/logan/pyramide#mutiny_treasure'),
                Content::dialogue('Sullivan', $sullivan, 'ambria/logan/pyramide#mutiny_sullivan_threat'),
                Content::narrative('ambria/logan/pyramide#mutiny_guard'),
                Content::dialogue('Jake', $jake, 'ambria/logan/pyramide#mutiny_jake_guard'),
                Content::narrative('ambria/logan/pyramide#mutiny_leave'),
            ],
            'actions' => [Content::action('Partir.', 'leave_with_mutineers')],
        ],
        'mutiny_refuse' => [
            'audio' => 'assets/sounds/ambria/recuptresor.mp3',
            'blocks' => [
                Content::narrative('ambria/logan/pyramide#mutiny_reflection_refuse'),
                Content::dialogue('Logan', $logan, 'ambria/logan/pyramide#mutiny_refuse_logan', 'right'),
                Content::narrative('ambria/logan/pyramide#mutiny_refuse'),
                Content::dialogue('Jake', $jake, 'ambria/logan/pyramide#mutiny_jake_approval'),
                Content::narrative('ambria/logan/pyramide#mutiny_refuse_wait'),
                Content::dialogue('Sullivan', $sullivan, 'ambria/logan/pyramide#mutiny_sullivan_threat'),
                Content::narrative('ambria/logan/pyramide#mutiny_guard'),
                Content::dialogue('Jake', $jake, 'ambria/logan/pyramide#mutiny_jake_guard'),
                Content::narrative('ambria/logan/pyramide#mutiny_refuse_levier'),
            ],
            'actions' => [Content::action('Tenter quelque chose.', 'start_levier')],
        ],
        'levier_pending' => [
            'audio' => 'assets/sounds/ambria/jungle.mp3',
            'blocks' => [
                Content::partial('adventures/ambria/levier'),
                Content::narrative('ambria/logan/pyramide#levier_pending'),
            ],
            'actions' => [],
            'hint' => Content::hint('ambria/logan/hints#levier', 2, [
                '<div class="enigmelieu"><img src="' . asset('assets/img/ambria/levierreponse.png') . '" alt="Réponse du levier."></div>',
            ]),
            'scripts' => ['assets/js/adventures/ambria/levier.js'],
        ],
        'cage_release_mixed' => [
            'audio' => 'assets/sounds/ambria/prisonmonte.mp3',
            'blocks' => [
                Content::dialogue('Logan', $logan, 'ambria/logan/pyramide#cage_release_mixed_logan', 'right'),
                Content::narrative('ambria/logan/pyramide#cage_release_common'),
                Content::dialogue('Sullivan', $sullivan, 'ambria/logan/pyramide#cage_release_sullivan'),
            ],
            'actions' => [Content::action('Suivant.', 'continue_good_end')],
        ],
        'cage_release_trust' => [
            'audio' => 'assets/sounds/ambria/prisonmonte.mp3',
            'blocks' => [
                Content::dialogue('Logan', $logan, 'ambria/logan/pyramide#cage_release_trust_logan', 'right'),
                Content::narrative('ambria/logan/pyramide#cage_release_common'),
                Content::dialogue('Sullivan', $sullivan, 'ambria/logan/pyramide#cage_release_sullivan'),
            ],
            'actions' => [Content::action('Suivant.', 'continue_best_end')],
        ],
        'cage_release_mutiny' => [
            'audio' => 'assets/sounds/ambria/prisonmonte.mp3',
            'blocks' => [
                Content::dialogue('Logan', $logan, 'ambria/logan/pyramide#cage_release_mutiny_logan', 'right'),
                Content::narrative('ambria/logan/pyramide#cage_release_mutiny'),
                Content::dialogue('Jake', $jake, 'ambria/logan/pyramide#cage_release_jake'),
            ],
            'actions' => [Content::action('Suivant.', 'continue_loyal_end')],
        ],
    ],
];
