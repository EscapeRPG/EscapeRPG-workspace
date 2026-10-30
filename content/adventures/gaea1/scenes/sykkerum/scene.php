<?php

use App\Services\Adventures\Support\Content;

$hasPass = Content::inventoryHas('deckPass');
$missingPass = Content::inventoryMissing('deckPass');
$searchImage = static function (bool $showLocker) use ($missingPass): array {
    $hotspots = [
        Content::hotspotAt('documents', 52, 60, 13, 12, 'assets/img/gaea1/station/documents.png', class: 'exploration-hotspot', extra: [
            'attributes' => ['aria-label' => 'examiner les documents'],
        ]),
    ];

    if ($showLocker) {
        $hotspots[] = Content::hotspotAt('inspect_locker', 73, 27, 16, 28, 'assets/img/gaea1/station/casierinfirmerie.png', class: 'exploration-hotspot', extra: [
            'visible_if' => $missingPass,
            'attributes' => ['aria-label' => 'ouvrir le casier'],
        ]);
    }

    return Content::interactiveImage(
        'assets/img/gaea1/station/infirmerie.png',
        '',
        $hotspots,
        'sykkerum-search',
        [
            'id' => 'exploration',
            'id_required' => true,
            'canvas_id' => 'canvasexplo',
            'allow_missing_asset' => true,
        ],
    );
};

return [
    'label' => 'Infirmerie',
    'handler' => \App\Services\Adventures\Scenarios\Gaea1\Scenes\SykkerumSceneHandler::class,
    'map' => [
        'transitions' => [
            [
                'scene' => 'plan',
                'action' => 'sidebar:plan',
                'note' => 'Raccourci de sidebar, disponible pendant la visite de la station.',
            ],
        ],
    ],
    'flow' => [
        'default' => 'entry',
        'actions' => [
            'observe_command_deck' => [
                'next_scene' => 'komunodek',
                'variant' => 'door_no_items',
            ],
        ],
    ],
    'variants' => [
        'entry' => [
            'blocks' => [Content::narrative('gaea1/scenes/sykkerum/text#entry')],
            'actions' => [Content::action('observer.', 'observe_command_deck', extra: ['visible_if' => Content::stateFalsy('deckopen')])],
        ],
        'event_entry' => [
            'blocks' => [
                Content::narrative('gaea1/scenes/sykkerum/text#event'),
                $searchImage(false),
                Content::narrative('gaea1/scenes/sykkerum/text#search_prompt'),
            ],
            'scripts' => ['assets/js/adventures/gaea1/lampe.js'],
        ],
        'event_search' => [
            'blocks' => [
                Content::narrative('gaea1/scenes/sykkerum/text#event'),
                $searchImage(true),
                Content::narrative('gaea1/scenes/sykkerum/text#search_prompt'),
            ],
            'actions' => [Content::action('retourner inspecter la porte.', 'observe_command_deck', extra: ['visible_if' => Content::stateFalsy('deckopen')])],
            'scripts' => ['assets/js/adventures/gaea1/lampe.js'],
        ],
        'search' => [
            'blocks' => [
                $searchImage(true),
                Content::narrative('gaea1/scenes/sykkerum/text#search_prompt'),
            ],
            'actions' => [Content::action('retourner inspecter la porte.', 'observe_command_deck', extra: ['visible_if' => Content::stateFalsy('deckopen')])],
            'scripts' => ['assets/js/adventures/gaea1/lampe.js'],
        ],
        'revisit' => [
            'blocks' => [
                $searchImage(true),
                Content::narrative('gaea1/scenes/sykkerum/text#search_prompt'),
            ],
            'actions' => [Content::action('retourner inspecter la porte.', 'observe_command_deck', extra: ['visible_if' => Content::stateFalsy('deckopen')])],
            'scripts' => ['assets/js/adventures/gaea1/lampe.js'],
        ],
        'documents' => [
            'blocks' => [Content::narrative('gaea1/scenes/sykkerum/text#documents')],
            'actions' => [Content::action('retour.', 'return_search')],
        ],
        'locker' => [
            'blocks' => [Content::narrative('gaea1/scenes/sykkerum/text#locker') + ['visible_if' => $missingPass]],
            'actions' => [Content::action('le prendre.', 'take_pass', extra: ['visible_if' => $missingPass])],
        ],
        'pass_taken' => [
            'blocks' => [Content::narrative('gaea1/scenes/sykkerum/text#pass_taken')],
            'actions' => [Content::action('retour.', 'return_search')],
        ],
        'invalid_access' => ['blocks' => [Content::narrative('gaea1/station#invalid_access')]],
    ],
];
