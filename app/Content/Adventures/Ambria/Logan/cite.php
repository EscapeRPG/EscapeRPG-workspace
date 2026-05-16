<?php

use App\Services\Adventures\Support\Content;

$sullivan = 'assets/img/ambria/sullivanmasonmini.png';
$logan = 'assets/img/ambria/loganbarthelemymini.png';

$askSullivan = static fn(): array => Content::ask("L'écouter.", 'enavant', 'submit_enavant');

return [
    'variants' => [
        'default' => [
            'audio' => 'assets/sounds/ambria/cite.mp3',
            'blocks' => [
                Content::narrative('ambria/logan/cite#entry_before'),
                Content::dialogue('Sullivan', $sullivan, 'ambria/logan/cite#entry_sullivan'),
                Content::narrative('ambria/logan/cite#entry_after'),
            ],
            'actions' => [$askSullivan()],
        ],
        'entry' => [
            'audio' => 'assets/sounds/ambria/cite.mp3',
            'blocks' => [
                Content::narrative('ambria/logan/cite#entry_before'),
                Content::dialogue('Sullivan', $sullivan, 'ambria/logan/cite#entry_sullivan'),
                Content::narrative('ambria/logan/cite#entry_after'),
            ],
            'actions' => [$askSullivan()],
        ],
        'wrong_enavant' => [
            'blocks' => [Content::narrative('ambria/logan/cite#wrong_enavant')],
            'actions' => [$askSullivan()],
        ],
        'first_prime' => [
            'audio' => 'assets/sounds/ambria/cite.mp3',
            'blocks' => [
                Content::dialogue('Sullivan', $sullivan, 'ambria/logan/cite#first_prime_sullivan'),
                Content::narrative('ambria/logan/cite#first_prime_after'),
                Content::dialogue('Logan', $logan, 'ambria/logan/cite#first_prime_logan', 'right'),
                Content::narrative('ambria/logan/cite#first_prime_end'),
            ],
            'actions' => [Content::action('Suivant.', 'continue_city')],
        ],
        'walk_palace' => [
            'audio' => 'assets/sounds/ambria/cite.mp3',
            'blocks' => [
                Content::narrative('ambria/logan/cite#walk_palace'),
                Content::dialogue('Sullivan', $sullivan, 'ambria/logan/cite#walk_palace_sullivan'),
                Content::narrative('ambria/logan/cite#walk_palace_after'),
            ],
            'actions' => [Content::action('Observer.', 'observe_gardien')],
        ],
    ],
];
