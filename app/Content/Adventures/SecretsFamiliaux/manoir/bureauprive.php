<?php

use App\Services\Adventures\Support\Content;

$bureauImage = static fn(array $controls = [], string $src = 'assets/img/secrets/bureausecret1.png'): array => [
    'type' => 'interactive_image',
    'src' => $src,
    'alt' => 'bureau privé',
    'class' => 'enigmelieu',
    'controls' => $controls,
];

$tiroirControl = Content::hotspotAt('tiroir', 64.5, 57.5, 6.5, 5.25, 'assets/img/secrets/buttontiroir.png', 'tiroir du bureau');

$libraryAction = Content::ask(
    'Fouiller la bibliothèque.',
    'fouiller',
    'search_library',
    ['visible_if' => Content::stateTruthy('chiens_sauves_fin')]
);

$goBack = Content::action("Passer de l'autre côté.", 'go_back');
$unlockDrawer = Content::ask('Utiliser la clé.', 'petitecle', 'unlock_tiroir');

return [
    'variants' => [
        'step_0' => [
            'audio' => null,
            'blocks' => [
                $bureauImage([$tiroirControl]),
                Content::narrative('secretsfamiliaux/manoir/bureauprive#step_0'),
                Content::narrative('secretsfamiliaux/manoir/bureauprive#talisman_hint')
                    + ['visible_if' => Content::stateTruthy('chiens_sauves_fin')],
            ],
            'actions' => [$libraryAction, $goBack],
        ],
        'step_1' => [
            'audio' => null,
            'blocks' => [
                $bureauImage([$tiroirControl]),
                Content::narrative('secretsfamiliaux/manoir/bureauprive#step_1'),
            ],
            'actions' => [$unlockDrawer, $goBack],
        ],
        'step_2' => [
            'audio' => null,
            'blocks' => [
                $bureauImage([$tiroirControl]),
                Content::narrative('secretsfamiliaux/manoir/bureauprive#step_2'),
            ],
            'actions' => [$unlockDrawer, $goBack],
        ],
        'step_3' => [
            'audio' => 'assets/sounds/secrets/tiroir.mp3',
            'blocks' => [
                $bureauImage([], 'assets/img/secrets/bureausecret1tiroiropened.png'),
                Content::narrative('secretsfamiliaux/manoir/bureauprive#step_3_intro'),
                Content::linkedImage(
                    'assets/img/secrets/journal1.png',
                    "la première page du journal de l'oncle William"
                ),
                Content::linkedImage(
                    'assets/img/secrets/journal3.png',
                    "la troisième page du journal de l'oncle William"
                ),
                Content::linkedImage(
                    'assets/img/secrets/journal4.png',
                    "la quatrième page du journal de l'oncle William"
                ),
                Content::narrative('secretsfamiliaux/manoir/bureauprive#step_3_after'),
            ],
            'actions' => [
                Content::action("Ajouter à l'inventaire.", 'take_journal'),
            ],
        ],
        'step_4' => [
            'audio' => null,
            'blocks' => [
                $bureauImage([$tiroirControl]),
                Content::narrative('secretsfamiliaux/manoir/bureauprive#step_4'),
            ],
            'actions' => [$libraryAction, $goBack],
        ],
        'step_5' => [
            'audio' => null,
            'blocks' => [
                Content::linkedImage(
                    'assets/img/secrets/pnakotiques.png',
                    'une page des manuscrits pnakotiques'
                ),
                Content::linkedImage(
                    'assets/img/secrets/pnakotiquesnotes.png',
                    'une page de notes sur les manuscrits pnakotiques'
                ),
                Content::narrative('secretsfamiliaux/manoir/bureauprive#step_5'),
            ],
            'actions' => [
                Content::action("Ajouter à l'inventaire.", 'take_pnakotiques'),
            ],
        ],
        'tiroir_opened' => [
            'audio' => null,
            'blocks' => [
                $bureauImage([], 'assets/img/secrets/bureausecret1tiroiropened.png'),
                Content::narrative('secretsfamiliaux/manoir/bureauprive#tiroir_opened'),
            ],
            'actions' => [$libraryAction, $goBack],
        ],
        'pnakotiques_found' => [
            'audio' => null,
            'blocks' => [
                $bureauImage([$tiroirControl]),
                Content::narrative('secretsfamiliaux/manoir/bureauprive#pnakotiques_found'),
            ],
            'actions' => [$goBack],
        ],
        'done' => [
            'audio' => null,
            'blocks' => [
                $bureauImage([], 'assets/img/secrets/bureausecret1tiroiropened.png'),
                Content::narrative('secretsfamiliaux/manoir/bureauprive#done'),
            ],
            'actions' => [$goBack],
        ],
    ],
];
