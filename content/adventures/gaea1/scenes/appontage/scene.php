<?php

use App\Services\Adventures\Support\Content;
use App\Services\Adventures\Support\NarrativeText;

return [
    'label' => 'Appontage',
    'flow' => [
        'default' => 'entry',
        'actions' => [
            'start_landing' => [
                'variant' => 'landing',
                'state' => [
                    'appontage' => true,
                ],
            ],
            'complete_landing' => [
                'next_scene' => 'hangar',
                'variant' => 'entry',
                'state' => [
                    'combinaison' => true,
                    'plancurrent' => 'q',
                ],
                'achievements' => [
                    [
                        'scenario' => 'gaea1',
                        'name' => 'atterrir',
                    ],
                ],
            ],
        ],
    ],
    'variants' => [
        'entry' => [
            'blocks' => [
                Content::narrative('gaea1/scenes/appontage/text#entry_intro'),
                Content::dialogue('M.A.R-V', 'assets/img/gaea1/marv.png', 'gaea1/scenes/appontage/text#entry_marv'),
                Content::narrative('gaea1/scenes/appontage/text#entry_controls'),
            ],
            'actions' => [
                Content::action('apponter.', 'start_landing'),
            ],
        ],
        'landing' => [
            'blocks' => [
                Content::partial('adventures/gaea1/appontage', [
                    'message' => NarrativeText::paragraphList('gaea1/scenes/appontage/text#landing_marv'),
                ]),
            ],
            'scripts' => ['assets/js/adventures/gaea1/appontage.js'],
            'hint' => Content::hint('gaea1/hints#appontage', answer: [
                'Vous n\'arrivez pas à vous poser ? Dans ce cas, cliquez <a href="' . url('/aventures/gaea1/hangar') . '" style="color: lightskyblue">ici</a> pour passer à la suite.',
            ]),
        ],
    ],
];
