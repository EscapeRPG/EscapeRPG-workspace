<?php

use App\Services\Adventures\Support\Content;

$sullivan = 'assets/img/ambria/sullivanmasonmini.png';
$logan = 'assets/img/ambria/loganbarthelemymini.png';
$askAttention = static fn(): array => Content::ask('Prêter attention.', 'attention', 'submit_attention');
$askMaintenant = static fn(): array => Content::ask('Suivant.', 'ecouter', 'submit_maintenant');

$golem1 = static fn(): array => Content::interactiveImage(
    'assets/img/ambria/golem1sullivan.png',
    'Le golem tourne le dos à Sullivan.',
    [
        Content::hotspot('cibletir golem1gemme1', 'choose_golem_1', 'assets/img/ambria/golemgemme.png', 'Gemme 1'),
        Content::hotspot('cibletir golem1gemme2', 'choose_golem_2', 'assets/img/ambria/golemgemme.png', 'Gemme 2'),
        Content::hotspot('cibletir golem1gemme3', 'choose_golem_3', 'assets/img/ambria/golemgemme.png', 'Gemme 3'),
    ],
);

$golem3 = static fn(): array => Content::interactiveImage(
    'assets/img/ambria/golem3sullivan.png',
    'Le golem se redresse devant Sullivan.',
    array_map(
        static fn(int $index): array => Content::hotspot(
            'cibletir golem3gemme' . $index,
            'choose_final_golem_' . $index,
            'assets/img/ambria/golem3gemme.png',
            'Gemme ' . $index,
        ),
        range(1, 5),
    ),
);

return [
    'variants' => [
        'default' => [
            'audio' => 'assets/sounds/ambria/gardieneveil.mp3',
            'blocks' => [
                Content::narrative('ambria/sullivan/gardien#entry'),
                Content::dialogue('Sullivan', $sullivan, 'ambria/sullivan/gardien#entry_sullivan', 'right'),
            ],
            'actions' => [$askAttention()],
        ],
        'entry' => [
            'audio' => 'assets/sounds/ambria/gardieneveil.mp3',
            'blocks' => [
                Content::narrative('ambria/sullivan/gardien#entry'),
                Content::dialogue('Sullivan', $sullivan, 'ambria/sullivan/gardien#entry_sullivan', 'right'),
            ],
            'actions' => [$askAttention()],
        ],
        'wrong_attention' => [
            'blocks' => [Content::narrative('ambria/sullivan/gardien#wrong_attention')],
            'actions' => [$askAttention()],
        ],
        'awakening' => [
            'audio' => 'assets/sounds/ambria/gardien.mp3',
            'blocks' => [
                Content::dialogue('Sullivan', $sullivan, 'ambria/sullivan/gardien#awakening_sullivan', 'right'),
                Content::narrative('ambria/sullivan/gardien#awakening'),
            ],
            'actions' => [Content::action('Combattre.', 'start_combat')],
        ],
        'combat_start' => [
            'audio' => 'assets/sounds/ambria/gardien.mp3',
            'blocks' => [
                $golem1(),
                Content::narrative('ambria/sullivan/gardien#combat_start'),
            ],
            'actions' => [],
            'scripts' => [
                'assets/js/adventures/ambria/cibleTir.js',
            ],
            'hint' => Content::hint('ambria/sullivan/hints#gardien_gemme', 3),
        ],
        'first_hit_success' => [
            'audio' => 'assets/sounds/ambria/gardien.mp3',
            'blocks' => [
                Content::narrative('ambria/sullivan/gardien#first_hit_success'),
                Content::dialogue('Sullivan', $sullivan, 'ambria/sullivan/gardien#epaule_sullivan', 'right'),
            ],
            'actions' => [Content::action('Suivant.', 'continue_climb_support')],
        ],
        'first_hit_failure' => [
            'audio' => 'assets/sounds/ambria/gardien.mp3',
            'blocks' => [
                Content::narrative('ambria/sullivan/gardien#first_hit_failure'),
                Content::dialogue('Sullivan', $sullivan, 'ambria/sullivan/gardien#epaule_sullivan', 'right'),
            ],
            'actions' => [Content::action('Suivant.', 'continue_climb_support')],
        ],
        'climb_support' => [
            'audio' => 'assets/sounds/ambria/gardien.mp3',
            'blocks' => [
                Content::image('assets/img/ambria/golem2sullivan.png', 'Logan commence son ascension du golem.', 'enigmelieu'),
                Content::narrative('ambria/sullivan/gardien#climb_support'),
            ],
            'actions' => [$askMaintenant()],
            'hint' => Content::hint('ambria/sullivan/hints#gardien_sequence'),
        ],
        'wrong_maintenant' => [
            'blocks' => [Content::narrative('ambria/sullivan/gardien#wrong_maintenant')],
            'actions' => [$askMaintenant()],
            'hint' => Content::hint('ambria/sullivan/hints#gardien_sequence'),
        ],
        'final_setup' => [
            'audio' => 'assets/sounds/ambria/gardien.mp3',
            'blocks' => [
                Content::narrative('ambria/sullivan/gardien#final_setup'),
                Content::dialogue('Logan', $logan, 'ambria/sullivan/gardien#now_logan'),
            ],
            'actions' => [Content::action('Achever la creature.', 'continue_final_shot')],
        ],
        'final_shot' => [
            'audio' => 'assets/sounds/ambria/gardien.mp3',
            'blocks' => [
                $golem3(),
                Content::narrative('ambria/sullivan/gardien#final_shot'),
            ],
            'actions' => [],
            'scripts' => [
                'assets/js/adventures/ambria/cibleTir.js',
            ],
            'hint' => Content::hint('ambria/sullivan/hints#gardien_final'),
        ],
        'final_success' => [
            'audio' => 'assets/sounds/ambria/golemfinreussi.mp3',
            'blocks' => [
                Content::narrative('ambria/sullivan/gardien#final_success'),
                Content::dialogue('Sullivan', $sullivan, 'ambria/sullivan/gardien#final_success_sullivan', 'right'),
            ],
            'actions' => [Content::action('Suivant.', 'continue_finish_success')],
        ],
        'final_failure' => [
            'audio' => 'assets/sounds/ambria/golemfinrate.mp3',
            'blocks' => [
                Content::narrative('ambria/sullivan/gardien#final_failure'),
                Content::dialogue('Sullivan', $sullivan, 'ambria/sullivan/gardien#final_failure_sullivan', 'right'),
            ],
            'actions' => [Content::action('Suivant.', 'continue_finish_failure')],
        ],
        'finish_success' => [
            'audio' => 'assets/sounds/ambria/cite.mp3',
            'blocks' => [
                Content::narrative('ambria/sullivan/gardien#finish_success_before'),
                Content::dialogue('Sullivan', $sullivan, 'ambria/sullivan/gardien#finish_sullivan', 'right'),
                Content::narrative('ambria/sullivan/gardien#finish_after'),
                Content::dialogue('Sullivan', $sullivan, 'ambria/sullivan/gardien#warning_sullivan', 'right'),
                Content::narrative('ambria/sullivan/gardien#enter_pyramide'),
            ],
            'actions' => [Content::action('Entrer.', 'enter_pyramide')],
        ],
        'finish_failure' => [
            'audio' => 'assets/sounds/ambria/cite.mp3',
            'blocks' => [
                Content::narrative('ambria/sullivan/gardien#finish_failure_before'),
                Content::dialogue('Sullivan', $sullivan, 'ambria/sullivan/gardien#warning_sullivan', 'right'),
                Content::narrative('ambria/sullivan/gardien#enter_pyramide'),
            ],
            'actions' => [Content::action('Entrer.', 'enter_pyramide')],
        ],
    ],
];
