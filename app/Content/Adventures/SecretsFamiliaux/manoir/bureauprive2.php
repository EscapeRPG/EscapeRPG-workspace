<?php

$labImage = static fn(array $controls = []): array => [
    'type' => 'interactive_image',
    'src' => 'assets/img/secrets/bureausecret2cuves.png',
    'alt' => "les cuves contenant l'étrange masse",
    'class' => 'enigmelieu',
    'controls' => $controls,
];

$hiddenTrap = ['id' => 'trappehidden', 'src' => 'assets/img/secrets/buttontapis.png', 'alt' => 'le tapis traîne au milieu de la pièce', 'value' => 'reveal_trappe'];
$closedTrap = ['id' => 'trappeclosed', 'src' => 'assets/img/secrets/buttontrappe.png', 'alt' => 'une trappe verrouillée', 'value' => 'inspect_trappe'];
$openedTrap = ['id' => 'trappeopened', 'src' => 'assets/img/secrets/buttontrappeopened.png', 'alt' => "trappe ouverte sur l'obscurité", 'value' => 'open_trappe'];

$leverActions = [
    ['label' => 'Tirer sur le levier.', 'name' => 'action', 'value' => 'pull_lever', 'class' => 'action', 'visible_if' => ['state' => 'bureauprive2_refus', 'falsy' => true]],
    ['label' => 'Ne pas y toucher.', 'name' => 'action', 'value' => 'refuse_lever', 'class' => 'action', 'visible_if' => ['state' => 'bureauprive2_refus', 'falsy' => true]],
];
$descendAction = ['label' => 'Descendre.', 'name' => 'action', 'value' => 'descend', 'class' => 'action'];
$visibleLeverActions = array_merge([$descendAction], $leverActions);

$journalOrSearchText = static fn(): array => [
    ['type' => 'paragraphs', 'paragraphs' => [
        "Il vous faut cependant toujours trouver le passage secret mentionné dans le journal.",
    ], 'visible_if' => ['state' => 'bureauprive_tiroir_opened', 'truthy' => true]],
    ['type' => 'paragraphs', 'paragraphs' => [
        "Y aurait-il quelque chose d'autre par ici ?",
    ], 'visible_if' => ['state' => 'bureauprive_tiroir_opened', 'falsy' => true]],
];

$trapQuestionText = static fn(): array => [
    ['type' => 'paragraphs', 'paragraphs' => [
        "L'échelle qui descend dans les profondeurs serait-elle le passage secret mentionné dans le journal de votre oncle ?",
    ], 'visible_if' => ['state' => 'bureauprive_tiroir_opened', 'truthy' => true]],
    ['type' => 'paragraphs', 'paragraphs' => [
        "Où peut donc mener cette échelle ? Peut-être pouvez-vous trouver des informations à ce propos quelque part dans le <span class=\"lieu\">bureau</span> privé ?",
    ], 'visible_if' => ['state' => 'bureauprive_tiroir_opened', 'falsy' => true]],
    ['type' => 'paragraphs', 'paragraphs' => [
        "Souhaitez-vous descendre ?",
    ]],
];

$labStateImage = static fn(): array => $labImage([
    $hiddenTrap + [
        'visible_if' => ['state' => 'bureauprive2_trappe_found', 'falsy' => true],
    ],
    $closedTrap + [
        'visible_if' => ['state' => 'bureauprive2_trappe_found', 'truthy' => true],
    ],
    $openedTrap + [
        'visible_if' => ['state' => 'bureauprive2_trappe_opened', 'truthy' => true],
    ],
]);

return [
    'variants' => [
        'step_0' => [
            'audio' => null,
            'blocks' => [
                $labImage([$hiddenTrap]),
                ['type' => 'paragraphs', 'paragraphs' => [
                    "En arrivant dans la seconde partie du bureau, vous retenez un cri d'horreur en découvrant ce qui semble être un petit laboratoire.",
                    "Longeant l'arrière de la bibliothèque, vous voyez une succession de cuves contenant une sorte de masse noire gélatineuse. Des leviers se trouvent à côté de chacune d'elles.",
                    "Essayez-vous d'en tirer un ?",
                ]],
            ],
            'actions' => $leverActions,
        ],
        'step_1' => [
            'audio' => null,
            'blocks' => [
                $labImage([$closedTrap]),
                ['type' => 'paragraphs', 'paragraphs' => [
                    "Sous le tapis se trouvait une trappe secrète !",
                ]],
            ],
            'actions' => $leverActions,
        ],
        'trappe_found' => [
            'audio' => null,
            'blocks' => [
                $labImage([$closedTrap]),
                ['type' => 'paragraphs', 'paragraphs' => [
                    "Vous continuez de fouiller la partie arrière du bureau privé de votre oncle.",
                ]],
            ],
            'actions' => $leverActions,
        ],
        'after_cuves' => [
            'audio' => null,
            'blocks' => [
                $labStateImage(),
                ['type' => 'paragraphs', 'paragraphs' => [
                    "Vous préférez ne pas retenter l'expérience.",
                ]],
                ...$journalOrSearchText(),
            ],
            'actions' => [],
        ],
        'after_cuves_opened' => [
            'audio' => null,
            'blocks' => [
                $labImage([$openedTrap]),
                ['type' => 'paragraphs', 'paragraphs' => [
                    "Vous préférez ne pas retenter l'expérience.",
                    "L'échelle descend toujours dans les profondeurs.",
                    "Souhaitez-vous descendre ?",
                ]],
            ],
            'actions' => [
                ['label' => 'Descendre.', 'name' => 'action', 'value' => 'descend', 'class' => 'action'],
            ],
        ],
        'step_2' => [
            'audio' => null,
            'blocks' => [
                $labImage([$closedTrap]),
                ['type' => 'paragraphs', 'paragraphs' => [
                    "La trappe en bois est fermée par un vieux cadenas.",
                ]],
                ['type' => 'paragraphs', 'paragraphs' => [
                    "Serait-ce le passage secret mentionné dans le journal de votre oncle ?",
                ], 'visible_if' => ['state' => 'bureauprive_tiroir_opened', 'truthy' => true]],
                ['type' => 'paragraphs', 'paragraphs' => [
                    "Que renferme-t-elle ? Peut-être pouvez-vous trouver plus d'informations à ce propos quelque part dans le <span class=\"lieu\">bureau privé</span> ?",
                ], 'visible_if' => ['state' => 'bureauprive_tiroir_opened', 'falsy' => true]],
            ],
            'actions' => [
                ['label' => 'Utiliser la clé.', 'name' => 'cadenas', 'value' => 'unlock_trappe', 'class' => 'ask'],
            ],
        ],
        'step_3' => [
            'audio' => null,
            'blocks' => [
                $labImage([$closedTrap]),
                ['type' => 'paragraphs', 'paragraphs' => [
                    "Ça ne semble pas être la bonne.",
                ]],
            ],
            'actions' => [
                ['label' => 'Utiliser la clé.', 'name' => 'cadenas', 'value' => 'unlock_trappe', 'class' => 'ask'],
            ],
        ],
        'step_4' => [
            'audio' => 'assets/sounds/secrets/ouverturemanoir.mp3',
            'blocks' => [
                $labImage([$openedTrap]),
                ['type' => 'paragraphs', 'paragraphs' => [
                    "La trappe s'ouvre, révélant une échelle menant vers les ténèbres. L'odeur persistante qui règne dans le manoir depuis votre arrivée devient soudainement beaucoup plus forte et vous prend à la gorge.",
                    "Quoi que cela puisse être, ce qui se trouve en bas est à l'origine de cette émanation putride… Vous redoutez ce que vous allez y trouver, mais il est trop tard pour faire marche arrière maintenant.",
                    "Prenant votre courage à deux mains, vous saisissez l'une des lampes se trouvant sur l'étagère et vous apprêtez à descendre.",
                    "À moins qu'il ne vous reste quelque chose à faire avant ?",
                ]],
            ],
            'actions' => [
                ['label' => 'Descendre.', 'name' => 'action', 'value' => 'descend', 'class' => 'action'],
                ['label' => 'Tirer sur le levier.', 'name' => 'action', 'value' => 'pull_lever', 'class' => 'action', 'visible_if' => ['state' => 'bureauprive2_refus', 'falsy' => true]],
                ['label' => 'Ne pas y toucher.', 'name' => 'action', 'value' => 'refuse_lever', 'class' => 'action', 'visible_if' => ['state' => 'bureauprive2_refus', 'falsy' => true]],
            ],
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
                ['type' => 'paragraphs', 'paragraphs' => [
                    "Vous savez désormais où mène l'échelle dissimulée sous le tapis.",
                    "La trappe reste ouverte sur les profondeurs.",
                ]],
            ],
            'actions' => [
                ['label' => 'Descendre.', 'name' => 'action', 'value' => 'descend', 'class' => 'action'],
            ],
        ],
        'step_5' => [
            'audio' => null,
            'blocks' => [
                $labStateImage(),
                ['type' => 'paragraphs', 'paragraphs' => [
                    "Vous décidez de ne pas toucher aux leviers, de peur de ce que cela pourrait produire.",
                ]],
                ...$journalOrSearchText(),
            ],
            'actions' => [],
        ],
        'step_8' => [
            'audio' => null,
            'blocks' => [
                $labImage([$openedTrap]),
                ['type' => 'paragraphs', 'paragraphs' => [
                    "Vous décidez de ne pas toucher aux leviers, de peur de ce que cela pourrait produire.",
                    "La trappe est ouverte et l'échelle descend dans les profondeurs.",
                ]],
            ],
            'actions' => [
                ['label' => 'Descendre.', 'name' => 'action', 'value' => 'descend', 'class' => 'action'],
            ],
        ],
    ],
];
