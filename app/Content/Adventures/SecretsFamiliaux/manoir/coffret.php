<?php

use App\Services\Adventures\Support\Content;

$coffretForm = Content::ask('Regarder de plus près.', 'coffret', 'inspect_coffret');

$codeHint = Content::hint('secretsfamiliaux/hints#coffret_code');
$puzzleHint = Content::hint('secretsfamiliaux/hints#coffret_puzzle');

return [
    'variants' => [
        'missing' => [
            'audio' => null,
            'blocks' => [
                Content::narrative('secretsfamiliaux/manoir/coffret#missing'),
            ],
            'actions' => [
                Content::action('Retour.', 'retour'),
            ],
        ],
        'closed' => [
            'audio' => null,
            'blocks' => [
                Content::narrative('secretsfamiliaux/manoir/coffret#closed'),
            ],
            'actions' => [$coffretForm],
            'hint' => $codeHint,
        ],
        'wrong' => [
            'audio' => null,
            'blocks' => [
                Content::narrative('secretsfamiliaux/manoir/coffret#wrong'),
            ],
            'actions' => [$coffretForm],
            'hint' => $codeHint,
        ],
        'puzzle' => [
            'audio' => null,
            'blocks' => [],
            'actions' => [
                Content::action('Réinitialiser.', 'reset_coffret'),
            ],
            'hint' => $puzzleHint,
            'scripts' => [
                'assets/js/adventures/dragDropPuzzle.js',
                'assets/js/adventures/secrets_familiaux/dragDropCoffret.js',
            ],
        ],
    ],
];
