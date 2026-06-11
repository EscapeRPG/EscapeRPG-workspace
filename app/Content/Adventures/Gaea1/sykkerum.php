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
    'variants' => [
        'entry' => [
            'blocks' => [Content::narrative('gaea1/sykkerum#entry')],
            'actions' => [Content::action('observer.', 'observe_command_deck', extra: ['visible_if' => Content::stateFalsy('deckopen')])],
        ],
        'event_entry' => [
            'blocks' => [
                Content::narrative('gaea1/sykkerum#event'),
                $searchImage(false),
                Content::narrative('gaea1/sykkerum#search_prompt'),
            ],
            'scripts' => ['assets/js/adventures/gaea1/lampe.js'],
        ],
        'event_search' => [
            'blocks' => [
                Content::narrative('gaea1/sykkerum#event'),
                $searchImage(true),
                Content::narrative('gaea1/sykkerum#search_prompt'),
            ],
            'actions' => [Content::action('retourner inspecter la porte.', 'observe_command_deck', extra: ['visible_if' => Content::stateFalsy('deckopen')])],
            'scripts' => ['assets/js/adventures/gaea1/lampe.js'],
        ],
        'search' => [
            'blocks' => [
                $searchImage(true),
                Content::narrative('gaea1/sykkerum#search_prompt'),
            ],
            'actions' => [Content::action('retourner inspecter la porte.', 'observe_command_deck', extra: ['visible_if' => Content::stateFalsy('deckopen')])],
            'scripts' => ['assets/js/adventures/gaea1/lampe.js'],
        ],
        'revisit' => [
            'blocks' => [
                $searchImage(true),
                Content::narrative('gaea1/sykkerum#search_prompt'),
            ],
            'actions' => [Content::action('retourner inspecter la porte.', 'observe_command_deck', extra: ['visible_if' => Content::stateFalsy('deckopen')])],
            'scripts' => ['assets/js/adventures/gaea1/lampe.js'],
        ],
        'documents' => [
            'blocks' => [Content::narrative('gaea1/sykkerum#documents')],
            'actions' => [Content::action('retour.', 'return_search')],
        ],
        'locker' => [
            'blocks' => [Content::narrative('gaea1/sykkerum#locker') + ['visible_if' => $missingPass]],
            'actions' => [Content::action('le prendre.', 'take_pass', extra: ['visible_if' => $missingPass])],
        ],
        'pass_taken' => [
            'blocks' => [Content::narrative('gaea1/sykkerum#pass_taken')],
            'actions' => [Content::action('retour.', 'return_search')],
        ],
        'invalid_access' => ['blocks' => [Content::narrative('gaea1/station#invalid_access')]],
    ],
];
