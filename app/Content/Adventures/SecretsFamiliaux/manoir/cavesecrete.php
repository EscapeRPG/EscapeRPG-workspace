<?php

use App\Services\Adventures\Support\Content;

$inspectionAction = Content::ask('Inspecter.', 'cave', 'inspect');
$inspectionBlocks = [
    Content::narrative('secretsfamiliaux/manoir/cavesecrete#inspection'),
];

$journalPages = [
    Content::linkedImage(
        'assets/img/secrets/journal2.png',
        "la deuxième page du journal de l'oncle William"
    ),
    Content::linkedImage(
        'assets/img/secrets/journal5.png',
        "la cinquième page du journal de l'oncle William"
    ),
    Content::linkedImage(
        'assets/img/secrets/journal6.png',
        "la sixième page du journal de l'oncle William"
    ),
    Content::linkedImage(
        'assets/img/secrets/journal7.png',
        "la septième page du journal de l'oncle William"
    ),
    Content::linkedImage(
        'assets/img/secrets/journal8.png',
        "la huitième page du journal de l'oncle William"
    ),
    Content::linkedImage(
        'assets/img/secrets/journal9.png',
        "la neuvième page du journal de l'oncle William"
    ),
];

return [
    'variants' => [
        'step_0' => [
            'audio' => null,
            'blocks' => [
                Content::narrative('secretsfamiliaux/manoir/cavesecrete#step_0'),
            ],
            'actions' => [
                Content::action('Suivant.', 'suivant'),
            ],
        ],
        'step_1' => [
            'audio' => null,
            'blocks' => [
                Content::narrative('secretsfamiliaux/manoir/cavesecrete#step_1'),
            ],
            'actions' => [
                Content::action('Suivant.', 'suivant2'),
            ],
        ],
        'step_2' => [
            'audio' => null,
            'blocks' => [
                Content::narrative('secretsfamiliaux/manoir/cavesecrete#step_2'),
                ...$journalPages,
            ],
            'actions' => [
                Content::action("Ajouter à l'inventaire.", 'take_journals'),
            ],
        ],
        'step_3' => [
            'audio' => null,
            'blocks' => [
                Content::narrative('secretsfamiliaux/manoir/cavesecrete#step_3'),
            ],
            'actions' => [
                Content::action('Suivant.', 'suivant3'),
            ],
        ],
        'step_4' => [
            'audio' => null,
            'blocks' => [
                Content::narrative('secretsfamiliaux/manoir/cavesecrete#step_4'),
                ...$inspectionBlocks,
            ],
            'actions' => [$inspectionAction],
        ],
        'liquidejaunatre' => [
            'audio' => null,
            'blocks' => [
                Content::narrative('secretsfamiliaux/manoir/cavesecrete#liquidejaunatre'),
                ...$inspectionBlocks,
            ],
            'actions' => [$inspectionAction],
        ],
        'cadavres' => [
            'audio' => null,
            'blocks' => [
                Content::narrative('secretsfamiliaux/manoir/cavesecrete#cadavres'),
            ],
            'actions' => [
                Content::action('Réfléchir calmement.', 'think'),
            ],
        ],
        'unknown' => [
            'audio' => null,
            'blocks' => [
                Content::narrative('secretsfamiliaux/manoir/cavesecrete#unknown'),
                ...$inspectionBlocks,
            ],
            'actions' => [$inspectionAction],
        ],
    ],
];
