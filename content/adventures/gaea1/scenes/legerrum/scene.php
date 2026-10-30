<?php

use App\Services\Adventures\Support\Content;

$hasCells = Content::inventoryHas('energyCells');
$missingCells = Content::inventoryMissing('energyCells');

return [
    'label' => 'Entrepôt',
    'handler' => \App\Services\Adventures\Scenarios\Gaea1\Scenes\LegerrumSceneHandler::class,
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
            'return_search' => [
                'variant' => 'revisit',
            ],
        ],
    ],
    'variants' => [
        'entry' => [
            'blocks' => [
                Content::narrative('gaea1/scenes/legerrum/text#entry_before_infirmary'),
            ],
        ],
        'cells_available' => [
            'blocks' => [Content::narrative('gaea1/scenes/legerrum/text#entry_cells')],
            'actions' => [Content::action('la prendre.', 'take_cells')],
        ],
        'revisit' => [
            'blocks' => [
                Content::narrative('gaea1/scenes/legerrum/text#revisit') + ['visible_if' => $missingCells],
                Content::narrative('gaea1/scenes/legerrum/text#revisit_after_cells') + ['visible_if' => $hasCells],
            ],
        ],
        'cells_taken' => [
            'blocks' => [Content::narrative('gaea1/scenes/legerrum/text#cells_taken')],
            'actions' => [Content::action('retour.', 'return_search')],
        ],
        'invalid_access' => ['blocks' => [Content::narrative('gaea1/station#invalid_access')]],
    ],
];
