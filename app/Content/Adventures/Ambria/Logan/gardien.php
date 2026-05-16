<?php

use App\Services\Adventures\Support\Content;

$sullivan = 'assets/img/ambria/sullivanmasonmini.png';
$logan = 'assets/img/ambria/loganbarthelemymini.png';
$askEpaule = static fn(): array => Content::ask('Agir.', 'ecouter', 'submit_epaule');
$askFinal = static fn(): array => Content::ask('Suivant.', 'combatfini', 'submit_combat_finish');
$finishSullivan = static fn(): array => Content::dialogue('Sullivan', $sullivan, 'ambria/logan/gardien#finish_sullivan');
$enterPyramide = static fn(): array => Content::action('Entrer.', 'enter_pyramide');

return [
    'variants' => [
        'default' => [
            'audio' => 'assets/sounds/ambria/gardieneveil.mp3',
            'blocks' => [
                Content::narrative('ambria/logan/gardien#entry'),
                Content::dialogue('Sullivan', $sullivan, 'ambria/logan/gardien#entry_sullivan'),
            ],
            'actions' => [Content::action('Lui répondre.', 'wake_gardien')],
        ],
        'entry' => [
            'audio' => 'assets/sounds/ambria/gardieneveil.mp3',
            'blocks' => [
                Content::narrative('ambria/logan/gardien#entry'),
                Content::dialogue('Sullivan', $sullivan, 'ambria/logan/gardien#entry_sullivan'),
            ],
            'actions' => [Content::action('Lui répondre.', 'wake_gardien')],
        ],
        'awakening' => [
            'audio' => 'assets/sounds/ambria/gardien.mp3',
            'blocks' => [
                Content::dialogue('Logan', $logan, 'ambria/logan/gardien#awakening_logan', 'right'),
                Content::dialogue('Sullivan', $sullivan, 'ambria/logan/gardien#awakening_sullivan'),
                Content::narrative('ambria/logan/gardien#awakening'),
            ],
            'actions' => [Content::action('Combattre.', 'start_gardien_combat')],
        ],
        'combat_start' => [
            'audio' => 'assets/sounds/ambria/gardien.mp3',
            'blocks' => [
                Content::image('assets/img/ambria/golem1logan.png', 'Le golem se prépare à frapper Logan.', 'enigmelieu'),
                Content::narrative('ambria/logan/gardien#combat_start'),
            ],
            'actions' => [$askEpaule()],
            'hint' => Content::hint('ambria/logan/hints#gardien_epaule', 2),
        ],
        'wrong_epaule' => [
            'blocks' => [Content::narrative('ambria/logan/gardien#wrong_epaule')],
            'actions' => [$askEpaule()],
            'hint' => Content::hint('ambria/logan/hints#gardien_epaule', 2),
        ],
        'climb_intro' => [
            'audio' => 'assets/sounds/ambria/gardien.mp3',
            'blocks' => [Content::narrative('ambria/logan/gardien#climb_intro')],
            'actions' => [Content::action('Escalader.', 'climb_golem')],
        ],
        'climb_puzzle' => [
            'audio' => 'assets/sounds/ambria/gardien.mp3',
            'blocks' => [
                Content::partial('adventures/ambria/golem_sequence'),
                Content::narrative('ambria/logan/gardien#climb_puzzle'),
            ],
            'actions' => [],
            'hint' => Content::hint('ambria/logan/hints#gardien_sequence'),
            'scripts' => ['assets/js/adventures/ambria/golemSequence.js'],
        ],
        'climb_success' => [
            'audio' => 'assets/sounds/ambria/gardien.mp3',
            'blocks' => [
                Content::narrative('ambria/logan/gardien#climb_success'),
                Content::dialogue('Logan', $logan, 'ambria/logan/gardien#now_logan', 'right'),
            ],
            'actions' => [Content::action('Suivant.', 'continue_finish_setup')],
        ],
        'climb_failure' => [
            'audio' => 'assets/sounds/ambria/gardien.mp3',
            'blocks' => [
                Content::narrative('ambria/logan/gardien#climb_failure'),
                Content::dialogue('Logan', $logan, 'ambria/logan/gardien#now_logan', 'right'),
            ],
            'actions' => [Content::action('Suivant.', 'continue_finish_setup')],
        ],
        'final_shot' => [
            'audio' => 'assets/sounds/ambria/gardien.mp3',
            'blocks' => [
                Content::image('assets/img/ambria/golem3logan.png', 'Le golem commence à se relever.', 'enigmelieu'),
                Content::narrative('ambria/logan/gardien#final_shot'),
            ],
            'actions' => [$askFinal()],
            'hint' => Content::hint('ambria/logan/hints#gardien_final', 4),
        ],
        'wrong_final' => [
            'blocks' => [
                Content::narrative('ambria/logan/gardien#wrong_final'),
                Content::image('assets/img/ambria/golem3logan.png', 'Le golem commence à se relever.', 'enigmelieu'),
                Content::narrative('ambria/logan/gardien#final_shot'),
            ],
            'actions' => [$askFinal()],
            'hint' => Content::hint('ambria/logan/hints#gardien_final', 4),
        ],
        'final_success' => [
            'audio' => 'assets/sounds/ambria/golemfinreussi.mp3',
            'blocks' => [
                Content::narrative('ambria/logan/gardien#final_success'),
                Content::dialogue('Logan', $logan, 'ambria/logan/gardien#final_success_logan', 'right'),
                Content::narrative('ambria/logan/gardien#finish_reaction'),
                $finishSullivan(),
                Content::narrative('ambria/logan/gardien#enter_pyramide'),
            ],
            'actions' => [$enterPyramide()],
        ],
        'final_success_injured' => [
            'audio' => 'assets/sounds/ambria/golemfinreussi.mp3',
            'blocks' => [
                Content::narrative('ambria/logan/gardien#final_success'),
                Content::dialogue('Logan', $logan, 'ambria/logan/gardien#final_success_injured_logan', 'right'),
                Content::narrative('ambria/logan/gardien#finish_reaction'),
                $finishSullivan(),
                Content::narrative('ambria/logan/gardien#enter_pyramide'),
            ],
            'actions' => [$enterPyramide()],
        ],
        'final_failure' => [
            'audio' => 'assets/sounds/ambria/golemfinrate.mp3',
            'blocks' => [
                Content::narrative('ambria/logan/gardien#final_failure'),
                Content::narrative('ambria/logan/gardien#final_failure_not_injured'),
                $finishSullivan(),
                Content::narrative('ambria/logan/gardien#enter_pyramide'),
            ],
            'actions' => [$enterPyramide()],
        ],
        'final_failure_injured' => [
            'audio' => 'assets/sounds/ambria/golemfinrate.mp3',
            'blocks' => [
                Content::narrative('ambria/logan/gardien#final_failure'),
                Content::narrative('ambria/logan/gardien#final_failure_injured'),
                $finishSullivan(),
                Content::narrative('ambria/logan/gardien#enter_pyramide'),
            ],
            'actions' => [$enterPyramide()],
        ],
    ],
];
