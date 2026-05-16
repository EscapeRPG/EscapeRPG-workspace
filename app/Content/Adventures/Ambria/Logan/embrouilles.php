<?php

use App\Services\Adventures\Support\Content;

$entry = [
    'audio' => 'assets/sounds/ambria/bagarretaverne.mp3',
    'blocks' => [
        Content::narrative('ambria/logan/embrouilles#entry'),
        Content::dialogue('Logan', 'assets/img/ambria/loganbarthelemymini.png', 'ambria/logan/embrouilles#entry_logan', 'right'),
        Content::narrative('ambria/logan/embrouilles#entry_after_logan'),
        Content::dialogue('Sullivan', 'assets/img/ambria/sullivanmasonmini.png', 'ambria/logan/embrouilles#entry_sullivan'),
        Content::narrative('ambria/logan/embrouilles#entry_after_sullivan'),
        Content::dialogue('Logan', 'assets/img/ambria/loganbarthelemymini.png', 'ambria/logan/embrouilles#entry_logan_2', 'right'),
    ],
    'actions' => [
        Content::ask('Réagir.', 'bagarre', 'submit_attention'),
    ],
    'notes' => ['Attention'],
];

return [
    'variants' => [
        'default' => $entry,
        'placeholder' => $entry,
        'entry' => $entry,
        'attention_success' => [
            'audio' => 'assets/sounds/ambria/tavernehommetombe.mp3',
            'blocks' => [
                Content::narrative('ambria/logan/embrouilles#attention_success'),
                Content::dialogue('Logan', 'assets/img/ambria/loganbarthelemymini.png', 'ambria/logan/embrouilles#attention_logan', 'right'),
                Content::narrative('ambria/logan/embrouilles#attention_success_after_logan'),
            ],
            'actions' => [
                Content::ask('Réagir.', 'baston', 'submit_react'),
            ],
            'notes' => ['Attention', 'Baissez-vous'],
        ],
        'attention_failure' => [
            'audio' => 'assets/sounds/ambria/tavernehommetombe.mp3',
            'blocks' => [
                Content::narrative('ambria/logan/embrouilles#attention_failure'),
                Content::dialogue('Logan', 'assets/img/ambria/loganbarthelemymini.png', 'ambria/logan/embrouilles#attention_logan', 'right'),
                Content::narrative('ambria/logan/embrouilles#attention_failure_after_logan'),
            ],
            'actions' => [
                Content::ask('Réagir.', 'baston', 'submit_react'),
            ],
            'notes' => ['Attention', 'Baissez-vous'],
        ],
        'escape_success' => [
            'audio' => 'assets/sounds/ambria/sullivanesquivecoup.mp3',
            'blocks' => [
                Content::narrative('ambria/logan/embrouilles#escape_success'),
                Content::dialogue('Logan', 'assets/img/ambria/loganbarthelemymini.png', 'ambria/logan/embrouilles#escape_logan', 'right'),
                Content::narrative('ambria/logan/embrouilles#escape_common'),
            ],
            'actions' => [
                Content::action('Suivant.', 'continue_docks'),
            ],
            'notes' => ['Attention', 'Baissez-vous', 'Compris'],
        ],
        'escape_failure' => [
            'audio' => 'assets/sounds/ambria/sullivanprendcoup.mp3',
            'blocks' => [
                Content::narrative('ambria/logan/embrouilles#escape_failure'),
                Content::dialogue('Logan', 'assets/img/ambria/loganbarthelemymini.png', 'ambria/logan/embrouilles#escape_logan', 'right'),
                Content::narrative('ambria/logan/embrouilles#escape_common'),
            ],
            'actions' => [
                Content::action('Suivant.', 'continue_docks'),
            ],
            'notes' => ['Attention', 'Baissez-vous', 'Compris'],
        ],
        'docks' => [
            'audio' => 'assets/sounds/ambria/finbagarre.mp3',
            'blocks' => [
                Content::narrative('ambria/logan/embrouilles#docks'),
                Content::dialogue('Sullivan', 'assets/img/ambria/sullivanmasonmini.png', 'ambria/logan/embrouilles#docks_sullivan'),
            ],
            'actions' => [
                Content::action('Suivant.', 'continue_agreement'),
            ],
        ],
        'agreement' => [
            'blocks' => [
                Content::dialogue('Logan', 'assets/img/ambria/loganbarthelemymini.png', 'ambria/logan/embrouilles#agreement_logan', 'right'),
                Content::dialogue('Sullivan', 'assets/img/ambria/sullivanmasonmini.png', 'ambria/logan/embrouilles#agreement_sullivan'),
                Content::narrative('ambria/logan/embrouilles#agreement_after_sullivan'),
                Content::dialogue('Sullivan', 'assets/img/ambria/sullivanmasonmini.png', 'ambria/logan/embrouilles#agreement_sullivan_2'),
                Content::narrative('ambria/logan/embrouilles#agreement_after_sullivan_2'),
                Content::dialogue('Sullivan', 'assets/img/ambria/sullivanmasonmini.png', 'ambria/logan/embrouilles#agreement_sullivan_3'),
                Content::dialogue('Logan', 'assets/img/ambria/loganbarthelemymini.png', 'ambria/logan/embrouilles#agreement_logan_2', 'right'),
                Content::dialogue('Sullivan', 'assets/img/ambria/sullivanmasonmini.png', 'ambria/logan/embrouilles#agreement_sullivan_4'),
                Content::narrative('ambria/logan/embrouilles#agreement_end'),
            ],
            'actions' => [
                Content::action('Suivant.', 'start_embarquement'),
            ],
            'notes' => ['Logan'],
        ],
    ],
];
