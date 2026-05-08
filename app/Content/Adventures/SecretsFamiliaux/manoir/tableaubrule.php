<?php

use App\Services\Adventures\Support\Content;

$tableauHint = [
    'levels' => [
        [
            'paragraphs' => [
                "Apparemment, le nom du peintre de ce tableau est intact et pourrait vous permettre de la retrouver entière en cherchant un peu.",
            ],
        ],
        [
            'paragraphs' => [
                "Il s'agit d'un tableau du célèbre Rembrandt.",
            ],
        ],
        [
            'paragraphs' => [
                "Le nom de cette peinture est \"La Leçon d'Anatomie\", peinte en 1632.",
            ],
        ],
    ],
    'answer' => [
        'paragraphs' => [
            "La note du docteur Pellington vous dit de compter le nombre de personnages présents sur ce tableau, sans préciser s'il faut prendre en compte uniquement les vivants ou non.<br>Il faut donc bien compter tous les personnages, ce qui en donne 9.",
        ],
    ],
];

return [
    'variants' => [
        'missing' => [
            'audio' => null,
            'blocks' => [
                Content::narrative('secretsfamiliaux/manoir/tableaubrule/missing'),
            ],
            'actions' => [
                Content::action('Retour.', 'retour'),
            ],
        ],
        'default' => [
            'audio' => null,
            'blocks' => [
                Content::image('assets/img/secrets/tableaubrule.png', "les restes d'un tableau brûlé", 'enigmelieu'),
                Content::narrative('secretsfamiliaux/manoir/tableaubrule/default'),
            ],
            'actions' => [
                Content::action('Retour.', 'retour'),
            ],
            'hint' => $tableauHint,
        ],
    ],
];
