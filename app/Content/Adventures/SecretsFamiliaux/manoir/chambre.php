<?php

use App\Services\Adventures\Support\Content;

$chambreImage = [
    'src' => 'assets/img/secrets/chambrewilliamnuit.png',
    'src_options' => [
        ['if' => Content::stateTruthy('manor_day'), 'src' => 'assets/img/secrets/chambrewilliam.png'],
        ['if' => Content::stateTruthy('pellington_visit'), 'src' => 'assets/img/secrets/chambrewilliam.png'],
    ],
];
$tableauImage = [
    'src' => 'assets/img/secrets/tableaunuit.png',
    'src_options' => [
        ['if' => Content::stateTruthy('manor_day'), 'src' => 'assets/img/secrets/tableau.png'],
        ['if' => Content::stateTruthy('pellington_visit'), 'src' => 'assets/img/secrets/tableau.png'],
    ],
];
$pieceImage = [
    'src' => 'assets/img/secrets/chambrepiecenuit.png',
    'src_options' => [
        ['if' => Content::stateTruthy('manor_day'), 'src' => 'assets/img/secrets/chambrepiece.png'],
        ['if' => Content::stateTruthy('pellington_visit'), 'src' => 'assets/img/secrets/chambrepiece.png'],
    ],
];
$chambreHotspots = [
    $tableauImage + [
        'class' => 'positioned-hotspot',
        'alt' => 'un grand tableau au-dessus du lit',
        'value' => 'tableau',
        'attributes' => ['style' => '--hotspot-left:79.53%;--hotspot-top:26.5%;--hotspot-width:18.17%;--hotspot-height:21%;'],
    ],
    $pieceImage + [
        'class' => 'positioned-hotspot',
        'alt' => 'une pièce sous le lit',
        'value' => 'piece',
        'visible_if' => Content::inventoryMissing('piecead'),
        'attributes' => ['style' => '--hotspot-left:88.9%;--hotspot-top:82%;--hotspot-width:1.7%;--hotspot-height:1%;'],
    ],
];
$chambreCoffreHotspots = [
    Content::hotspotAt('coffre', 84.7, 38.25, 7, 4.5, 'assets/img/secrets/cof.png', 'coffre-fort'),
    $pieceImage + [
        'class' => 'positioned-hotspot',
        'alt' => 'une pièce sous le lit',
        'value' => 'piece',
        'visible_if' => Content::inventoryMissing('piecead'),
        'attributes' => ['style' => '--hotspot-left:88.9%;--hotspot-top:82%;--hotspot-width:1.7%;--hotspot-height:1%;'],
    ],
];
$safeForm = static fn(): array => [
    'form_class' => 'safe-form',
    'controls' => [
        ['label' => '←', 'name' => 'action', 'class' => 'action', 'value' => 'safe_left'],
        ['element' => 'input', 'type' => 'text', 'name' => 'combinaison_digit', 'attributes' => ['inputmode' => 'numeric', 'maxlength' => '1', 'autocomplete' => 'off']],
        ['label' => '→', 'name' => 'action', 'class' => 'action', 'value' => 'safe_right'],
    ],
];
$portraitHint = Content::hint('secretsfamiliaux/hints#chambre_portrait');
$safeHint = Content::hint('secretsfamiliaux/hints#chambre_safe');

$roomImage = fn(array $hotspots): array => $chambreImage + [
    'type' => 'interactive_image',
    'alt' => "l'ancienne chambre de votre oncle",
    'class' => 'enigmelieu',
    'hotspots' => $hotspots,
];
$safeImage = Content::image('assets/img/secrets/coffrefort.png', 'la porte du coffre-fort', 'enigmelieu');
$backAction = Content::action('Retour.', 'retour');

return [
    'variants' => [
        'step_0' => [
            'audio' => null,
            'blocks' => [
                $roomImage($chambreHotspots),
                Content::narrative('secretsfamiliaux/manoir/chambre#step_0'),
            ],
            'actions' => [],
        ],
        'step_0_pellington' => [
            'audio' => null,
            'blocks' => [
                $roomImage($chambreHotspots),
                Content::narrative('secretsfamiliaux/manoir/chambre#step_0'),
            ],
            'actions' => [],
            'hint' => $portraitHint,
        ],
        'coffre' => [
            'audio' => null,
            'blocks' => [
                $roomImage($chambreCoffreHotspots),
                Content::narrative('secretsfamiliaux/manoir/chambre#coffre'),
            ],
            'actions' => [],
        ],
        'coffre_pellington' => [
            'audio' => null,
            'blocks' => [
                $roomImage($chambreCoffreHotspots),
                Content::narrative('secretsfamiliaux/manoir/chambre#coffre'),
            ],
            'actions' => [],
            'hint' => $portraitHint,
        ],
        'step_1' => [
            'audio' => null,
            'blocks' => [
                Content::linkedImage('assets/img/secrets/ad.png', "pièce avec une tête d'homme"),
                Content::narrative('secretsfamiliaux/manoir/chambre#step_1'),
            ],
            'actions' => [
                Content::action("Ajouter à l'inventaire.", 'take_piece'),
            ],
        ],
        'step_2' => [
            'audio' => null,
            'blocks' => [
                Content::narrative('secretsfamiliaux/manoir/chambre#step_2'),
            ],
            'actions' => [$backAction],
        ],
        'step_3' => [
            'audio' => null,
            'blocks' => [
                $safeImage,
                Content::narrative('secretsfamiliaux/manoir/chambre#step_3'),
            ],
            'actions' => [$backAction],
        ],
        'safe_0' => [
            'audio' => null,
            'blocks' => [
                Content::narrative('secretsfamiliaux/manoir/chambre#safe_0'),
                $safeImage,
                Content::narrative('secretsfamiliaux/manoir/chambre#safe_first_digit'),
            ],
            'actions' => [
                $safeForm(),
                $backAction,
            ],
            'hint' => $safeHint,
        ],
        'safe_1' => [
            'audio' => 'assets/sounds/secrets/coffrefort1.mp3',
            'blocks' => [
                $safeImage,
                Content::narrative('secretsfamiliaux/manoir/chambre#safe_second_digit'),
            ],
            'actions' => [
                $safeForm(),
                $backAction,
            ],
            'hint' => $safeHint,
        ],
        'safe_2' => [
            'audio' => 'assets/sounds/secrets/coffrefort2.mp3',
            'blocks' => [
                $safeImage,
                Content::narrative('secretsfamiliaux/manoir/chambre#safe_third_digit'),
            ],
            'actions' => [
                $safeForm(),
                $backAction,
            ],
            'hint' => $safeHint,
        ],
        'safe_3' => [
            'audio' => 'assets/sounds/secrets/coffrefort3.mp3',
            'blocks' => [
                $safeImage,
                Content::narrative('secretsfamiliaux/manoir/chambre#safe_fourth_digit'),
            ],
            'actions' => [
                $safeForm(),
                $backAction,
            ],
            'hint' => $safeHint,
        ],
        'safe_wrong' => [
            'audio' => 'assets/sounds/secrets/coffrefort4.mp3',
            'blocks' => [
                $safeImage,
                Content::narrative('secretsfamiliaux/manoir/chambre#safe_wrong'),
            ],
            'actions' => [
                $safeForm(),
                $backAction,
            ],
            'hint' => $safeHint,
        ],
        'safe_opened' => [
            'audio' => 'assets/sounds/secrets/coffrefortouverture.mp3',
            'blocks' => [
                $safeImage,
                Content::narrative('secretsfamiliaux/manoir/chambre#safe_opened_intro'),
                Content::linkedImage('assets/img/secrets/coffret.png', 'un petit coffret ouvragé'),
                Content::linkedImage('assets/img/secrets/oldcle.png', 'une vieille clé'),
                Content::linkedImage('assets/img/secrets/di.png', 'une pièce représentant un vieil homme'),
                Content::narrative('secretsfamiliaux/manoir/chambre#safe_opened_after'),
            ],
            'actions' => [
                Content::action("Ajouter à l'inventaire.", 'take_safe_items'),
            ],
        ],
        'safe_coffret' => [
            'audio' => null,
            'blocks' => [
                Content::linkedImage('assets/img/secrets/coffret.png', 'un petit coffret ouvragé'),
                Content::narrative('secretsfamiliaux/manoir/chambre#safe_coffret'),
            ],
            'actions' => [
                Content::action("Ajouter à l'inventaire.", 'take_coffret'),
            ],
        ],
        'safe_empty' => [
            'audio' => null,
            'blocks' => [
                $safeImage,
                Content::narrative('secretsfamiliaux/manoir/chambre#safe_empty'),
            ],
            'actions' => [
                Content::action('Étudier le coffret.', 'study_coffret'),
                $backAction,
            ],
        ],
    ],
];
