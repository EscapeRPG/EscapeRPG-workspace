<?php

use App\Services\Adventures\Support\Content;

$labImage = static fn(array $controls = []): array => [
    'type' => 'interactive_image',
    'src' => 'assets/img/secrets/bureausecret2cuves.png',
    'alt' => "les cuves contenant l'étrange masse",
    'class' => 'enigmelieu',
    'controls' => $controls,
];

$hiddenTrap = Content::hotspot(
    'trappehidden',
    'reveal_trappe',
    'assets/img/secrets/buttontapis.png',
    'le tapis traîne au milieu de la pièce'
);
$closedTrap = Content::hotspot(
    'trappeclosed',
    'inspect_trappe',
    'assets/img/secrets/buttontrappe.png',
    'une trappe verrouillée'
);
$openedTrap = Content::hotspot(
    'trappeopened',
    'open_trappe',
    'assets/img/secrets/buttontrappeopened.png',
    "trappe ouverte sur l'obscurité"
);

$leverActions = [
    Content::action(
        'Tirer sur le levier.',
        'pull_lever',
        'action',
        'action',
        ['visible_if' => Content::stateFalsy('bureauprive2_refus')]
    ),
    Content::action(
        'Ne pas y toucher.',
        'refuse_lever',
        'action',
        'action',
        ['visible_if' => Content::stateFalsy('bureauprive2_refus')]
    ),
];
$descendAction = Content::action('Descendre.', 'descend');
$visibleLeverActions = array_merge([$descendAction], $leverActions);
$unlockTrap = Content::ask('Utiliser la clé.', 'cadenas', 'unlock_trappe');

$journalOrSearchText = static fn(): array => [
    Content::narrative('secretsfamiliaux/manoir/bureauprive2#journal_or_search_journal')
        + ['visible_if' => Content::stateTruthy('bureauprive_tiroir_opened')],
    Content::narrative('secretsfamiliaux/manoir/bureauprive2#journal_or_search_unknown')
        + ['visible_if' => Content::stateFalsy('bureauprive_tiroir_opened')],
];

$trapQuestionText = static fn(): array => [
    Content::narrative('secretsfamiliaux/manoir/bureauprive2#trap_question_journal')
        + ['visible_if' => Content::stateTruthy('bureauprive_tiroir_opened')],
    Content::narrative('secretsfamiliaux/manoir/bureauprive2#trap_question_unknown')
        + ['visible_if' => Content::stateFalsy('bureauprive_tiroir_opened')],
    Content::narrative('secretsfamiliaux/manoir/bureauprive2#trap_question_descend'),
];

$labStateImage = static fn(): array => $labImage([
    $hiddenTrap + ['visible_if' => Content::stateFalsy('bureauprive2_trappe_found')],
    $closedTrap + ['visible_if' => Content::stateTruthy('bureauprive2_trappe_found')],
    $openedTrap + ['visible_if' => Content::stateTruthy('bureauprive2_trappe_opened')],
]);

return [
    'variants' => [
        'step_0' => [
            'audio' => null,
            'blocks' => [
                $labImage([$hiddenTrap]),
                Content::narrative('secretsfamiliaux/manoir/bureauprive2#step_0'),
            ],
            'actions' => $leverActions,
        ],
        'step_1' => [
            'audio' => null,
            'blocks' => [
                $labImage([$closedTrap]),
                Content::narrative('secretsfamiliaux/manoir/bureauprive2#step_1'),
            ],
            'actions' => $leverActions,
        ],
        'trappe_found' => [
            'audio' => null,
            'blocks' => [
                $labImage([$closedTrap]),
                Content::narrative('secretsfamiliaux/manoir/bureauprive2#trappe_found'),
            ],
            'actions' => $leverActions,
        ],
        'after_cuves' => [
            'audio' => null,
            'blocks' => [
                $labStateImage(),
                Content::narrative('secretsfamiliaux/manoir/bureauprive2#after_cuves'),
                ...$journalOrSearchText(),
            ],
            'actions' => [],
        ],
        'after_cuves_opened' => [
            'audio' => null,
            'blocks' => [
                $labImage([$openedTrap]),
                Content::narrative('secretsfamiliaux/manoir/bureauprive2#after_cuves_opened'),
            ],
            'actions' => [
                $descendAction,
            ],
        ],
        'step_2' => [
            'audio' => null,
            'blocks' => [
                $labImage([$closedTrap]),
                Content::narrative('secretsfamiliaux/manoir/bureauprive2#step_2'),
                Content::narrative('secretsfamiliaux/manoir/bureauprive2#step_2_journal')
                    + ['visible_if' => Content::stateTruthy('bureauprive_tiroir_opened')],
                Content::narrative('secretsfamiliaux/manoir/bureauprive2#step_2_unknown')
                    + ['visible_if' => Content::stateFalsy('bureauprive_tiroir_opened')],
            ],
            'actions' => [
                $unlockTrap,
            ],
        ],
        'step_3' => [
            'audio' => null,
            'blocks' => [
                $labImage([$closedTrap]),
                Content::narrative('secretsfamiliaux/manoir/bureauprive2#step_3'),
            ],
            'actions' => [
                $unlockTrap,
            ],
        ],
        'step_4' => [
            'audio' => 'assets/sounds/secrets/ouverturemanoir.mp3',
            'blocks' => [
                $labImage([$openedTrap]),
                Content::narrative('secretsfamiliaux/manoir/bureauprive2#step_4'),
            ],
            'actions' => $visibleLeverActions,
        ],
        'trappe_opened' => [
            'audio' => null,
            'blocks' => [
                $labImage([$openedTrap]),
                ...$trapQuestionText(),
            ],
            'actions' => $visibleLeverActions,
        ],
        'after_descent' => [
            'audio' => null,
            'blocks' => [
                $labImage([$openedTrap]),
                Content::narrative('secretsfamiliaux/manoir/bureauprive2#after_descent'),
            ],
            'actions' => [
                $descendAction,
            ],
        ],
        'step_5' => [
            'audio' => null,
            'blocks' => [
                $labStateImage(),
                Content::narrative('secretsfamiliaux/manoir/bureauprive2#step_5'),
                ...$journalOrSearchText(),
            ],
            'actions' => [],
        ],
        'step_8' => [
            'audio' => null,
            'blocks' => [
                $labImage([$openedTrap]),
                Content::narrative('secretsfamiliaux/manoir/bureauprive2#step_8'),
            ],
            'actions' => [
                $descendAction,
            ],
        ],
    ],
];
