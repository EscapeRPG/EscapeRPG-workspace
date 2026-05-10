<?php

use App\Services\Adventures\Support\Content;

$gaspard = 'assets/img/secrets/gaspard.png';
$teona = 'assets/img/secrets/teona.png';
$gardien = 'assets/img/secrets/gardien.png';

$addressHint = Content::hint('secretsfamiliaux/hints#cimetiere_address', 3, [
    'Rendez-vous à cette adresse : <a href="' . url('/aventures/secretsfamiliaux/15hamiltonstreet') . '">/aventures/secretsfamiliaux/15hamiltonstreet</a>.',
]);

return [
    'variants' => [
        'step_0' => [
            'audio' => null,
            'blocks' => [
                Content::narrative('secretsfamiliaux/cimetiere#step_0'),
            ],
            'actions' => [
                Content::action('Suivant.', 'suivant'),
            ],
        ],
        'step_1' => [
            'audio' => null,
            'blocks' => [
                Content::narrative('secretsfamiliaux/cimetiere#step_1_intro'),
                Content::dialogue('Gaspard', $gaspard, 'secretsfamiliaux/cimetiere#step_1_gaspard'),
            ],
            'actions' => [
                Content::action('Qui était-ce ?', 'qui'),
            ],
        ],
        'step_2' => [
            'audio' => null,
            'blocks' => [
                Content::dialogue('Gaspard', $gaspard, 'secretsfamiliaux/cimetiere#step_2_gaspard'),
                Content::narrative('secretsfamiliaux/cimetiere#step_2_after'),
            ],
            'actions' => [
                Content::ask('Interroger.', 'question', 'medecin'),
                Content::action('Retourner à la cérémonie.', 'retour'),
            ],
        ],
        'step_3' => [
            'audio' => null,
            'blocks' => [
                Content::dialogue('Gaspard', $gaspard, 'secretsfamiliaux/cimetiere#step_3_gaspard'),
            ],
            'actions' => [
                Content::action('Retourner à la cérémonie.', 'retour'),
            ],
        ],
        'step_4' => [
            'audio' => null,
            'blocks' => [
                Content::dialogue('Gaspard', $gaspard, 'secretsfamiliaux/cimetiere#step_4_gaspard'),
            ],
            'actions' => [
                Content::ask('Interroger.', 'question', 'medecin'),
                Content::action('Retourner à la cérémonie.', 'retour'),
            ],
        ],
        'step_5' => [
            'audio' => null,
            'blocks' => [
                Content::narrative('secretsfamiliaux/cimetiere#step_5_intro'),
                Content::dialogue('Téona', $teona, 'secretsfamiliaux/cimetiere#step_5_teona'),
                Content::narrative('secretsfamiliaux/cimetiere#step_5_after'),
            ],
            'hint' => $addressHint,
            'actions' => [],
        ],
        'truth_step_0' => [
            'audio' => null,
            'blocks' => [
                Content::narrative('secretsfamiliaux/cimetiere#truth_step_0'),
            ],
            'actions' => [
                Content::action('Le héler.', 'heler'),
            ],
        ],
        'truth_step_1' => [
            'audio' => 'assets/sounds/secrets/pasapprochent.mp3',
            'blocks' => [
                Content::narrative('secretsfamiliaux/cimetiere#truth_step_1_intro'),
                Content::dialogue('Gardien', $gardien, 'secretsfamiliaux/cimetiere#truth_step_1_gardien'),
            ],
            'actions' => [
                Content::action('Lui dire qui vous êtes.', 'repondre'),
            ],
        ],
        'truth_step_2' => [
            'audio' => null,
            'blocks' => [
                Content::dialogue('Gardien', $gardien, 'secretsfamiliaux/cimetiere#truth_step_2_gardien_1'),
                Content::narrative('secretsfamiliaux/cimetiere#truth_step_2_after'),
                Content::dialogue('Gardien', $gardien, 'secretsfamiliaux/cimetiere#truth_step_2_gardien_2'),
            ],
            'actions' => [
                Content::action("Lui demander d'entrer.", 'demander'),
            ],
        ],
        'truth_step_3' => [
            'audio' => null,
            'blocks' => [
                Content::dialogue('Gardien', $gardien, 'secretsfamiliaux/cimetiere#truth_step_3_gardien'),
            ],
            'actions' => [
                Content::action('Lui montrer votre badge.', 'badge'),
            ],
        ],
        'truth_step_4' => [
            'audio' => 'assets/sounds/secrets/grilleouverture.mp3',
            'blocks' => [
                Content::dialogue('Gardien', $gardien, 'secretsfamiliaux/cimetiere#truth_step_4_gardien'),
                Content::narrative('secretsfamiliaux/cimetiere#truth_step_4_after'),
            ],
            'actions' => [
                Content::action('Suivant.', 'suivant2'),
            ],
        ],
        'truth_step_5' => [
            'audio' => 'assets/sounds/secrets/course.mp3',
            'blocks' => [
                Content::narrative('secretsfamiliaux/cimetiere#truth_step_5'),
            ],
            'actions' => [
                Content::action('Suivant.', 'suivant3'),
            ],
        ],
        'truth_step_6' => [
            'audio' => null,
            'blocks' => [
                Content::narrative('secretsfamiliaux/cimetiere#truth_step_6'),
            ],
            'actions' => [
                Content::action('Retourner au manoir.', 'retour_manoir'),
            ],
        ],
    ],
];
