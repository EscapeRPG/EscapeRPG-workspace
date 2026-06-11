<?php

use App\Services\Adventures\Support\Content;

$hasCells = Content::inventoryHas('energyCells');
$missingCells = Content::inventoryMissing('energyCells');

return [
    'variants' => [
        'entry' => [
            'blocks' => [
                Content::narrative('gaea1/legerrum#entry_before_infirmary'),
            ],
        ],
        'cells_available' => [
            'blocks' => [Content::narrative('gaea1/legerrum#entry_cells')],
            'actions' => [Content::action('la prendre.', 'take_cells')],
        ],
        'revisit' => [
            'blocks' => [
                Content::narrative('gaea1/legerrum#revisit') + ['visible_if' => $missingCells],
                Content::narrative('gaea1/legerrum#revisit_after_cells') + ['visible_if' => $hasCells],
            ],
        ],
        'cells_taken' => [
            'blocks' => [Content::narrative('gaea1/legerrum#cells_taken')],
            'actions' => [Content::action('retour.', 'return_search')],
        ],
        'invalid_access' => ['blocks' => [Content::narrative('gaea1/station#invalid_access')]],
    ],
];
