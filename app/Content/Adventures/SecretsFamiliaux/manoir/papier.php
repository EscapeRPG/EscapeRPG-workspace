<?php

use App\Services\Adventures\Support\Content;

$paperHint = Content::hint('secretsfamiliaux/hints#papier');

return [
    'variants' => [
        'missing' => [
            'audio' => null,
            'blocks' => [
                Content::narrative('secretsfamiliaux/manoir/papier#missing'),
            ],
            'actions' => [
                Content::action('Retour.', 'retour'),
            ],
        ],
        'open' => [
            'audio' => null,
            'blocks' => [
                Content::linkedImage('assets/img/secrets/papier.png', 'un morceau de papier avec une inscription étrange'),
                Content::linkedImage('assets/img/secrets/petitecle.png', 'petite clé'),
                Content::narrative('secretsfamiliaux/manoir/papier#open'),
            ],
            'actions' => [
                Content::action("Ajouter à l'inventaire.", 'take_paper'),
            ],
        ],
        'stored' => [
            'audio' => null,
            'blocks' => [
                Content::narrative('secretsfamiliaux/manoir/papier#stored'),
            ],
            'actions' => [
                Content::action('Retour.', 'retour'),
            ],
        ],
        'found' => [
            'audio' => null,
            'blocks' => [
                Content::linkedImage('assets/img/secrets/papier.png', 'un morceau de papier avec une inscription étrange'),
                Content::narrative('secretsfamiliaux/manoir/papier#found'),
            ],
            'actions' => [],
            'hint' => $paperHint,
        ],
    ],
];
