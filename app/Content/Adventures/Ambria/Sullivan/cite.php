<?php

use App\Services\Adventures\Support\Content;

$sullivan = 'assets/img/ambria/sullivanmasonmini.png';
$askLogan = static fn(): array => Content::ask("L'ecouter.", 'enavant', 'submit_enavant');

return [
    'variants' => [
        'default' => [
            'audio' => 'assets/sounds/ambria/cite.mp3',
            'blocks' => [
                Content::narrative('ambria/sullivan/cite#entry_before'),
                Content::dialogue('Sullivan', $sullivan, 'ambria/sullivan/cite#entry_sullivan', 'right'),
                Content::narrative('ambria/sullivan/cite#entry_after'),
                Content::dialogue('Sullivan', $sullivan, 'ambria/sullivan/cite#entry_sullivan_prime', 'right'),
            ],
            'actions' => [$askLogan()],
        ],
        'entry' => [
            'audio' => 'assets/sounds/ambria/cite.mp3',
            'blocks' => [
                Content::narrative('ambria/sullivan/cite#entry_before'),
                Content::dialogue('Sullivan', $sullivan, 'ambria/sullivan/cite#entry_sullivan', 'right'),
                Content::narrative('ambria/sullivan/cite#entry_after'),
                Content::dialogue('Sullivan', $sullivan, 'ambria/sullivan/cite#entry_sullivan_prime', 'right'),
            ],
            'actions' => [$askLogan()],
        ],
        'wrong_enavant' => [
            'blocks' => [Content::narrative('ambria/sullivan/cite#wrong_enavant')],
            'actions' => [$askLogan()],
        ],
        'logan_answer' => [
            'audio' => 'assets/sounds/ambria/cite.mp3',
            'blocks' => [Content::narrative('ambria/sullivan/cite#logan_answer')],
            'actions' => [Content::action('Suivant.', 'continue_city')],
        ],
        'walk_palace' => [
            'audio' => 'assets/sounds/ambria/cite.mp3',
            'blocks' => [
                Content::narrative('ambria/sullivan/cite#walk_palace_before'),
                Content::dialogue('Sullivan', $sullivan, 'ambria/sullivan/cite#walk_palace_sullivan', 'right'),
                Content::narrative('ambria/sullivan/cite#walk_palace_after'),
            ],
            'actions' => [Content::action('Avancer.', 'observe_gardien')],
        ],
    ],
];
