<?php

use App\Services\Adventures\Support\Content;
use App\Services\Adventures\Support\NarrativeText;

return [
    'variants' => [
        'entry' => [
            'blocks' => [
                Content::narrative('gaea1/appontage#entry_intro'),
                Content::dialogue('M.A.R-V', 'assets/img/gaea1/marv.png', 'gaea1/appontage#entry_marv'),
                Content::narrative('gaea1/appontage#entry_controls'),
            ],
            'actions' => [
                Content::action('apponter.', 'start_landing'),
            ],
        ],
        'landing' => [
            'blocks' => [
                Content::partial('adventures/gaea1/appontage', [
                    'message' => NarrativeText::paragraphList('gaea1/appontage#landing_marv'),
                ]),
            ],
            'scripts' => ['assets/js/adventures/gaea1/appontage.js'],
            'hint' => Content::hint('gaea1/hints#appontage', answer: [
                'Vous n\'arrivez pas à vous poser ? Dans ce cas, cliquez <a href="' . url('/aventures/gaea1/hangar') . '" style="color: lightskyblue">ici</a> pour passer à la suite.',
            ]),
        ],
    ],
];
