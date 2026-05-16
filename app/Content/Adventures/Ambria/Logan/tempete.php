<?php

use App\Services\Adventures\Support\Content;

$askInitialOrders = [Content::ask('Attendre les ordres.', 'ordres', 'submit_initial_orders')];
$askSailOrder = [Content::ask('Suivre les ordres.', 'ordres2', 'submit_sail_order')];
$askBarrels = [Content::ask('Réagir.', 'tonneaux', 'submit_barrels')];

return [
    'variants' => [
        'default' => [
            'audio' => 'assets/sounds/ambria/flots.mp3',
            'blocks' => [Content::narrative('ambria/logan/tempete#entry')],
            'actions' => $askInitialOrders,
        ],
        'entry' => [
            'audio' => 'assets/sounds/ambria/flots.mp3',
            'blocks' => [Content::narrative('ambria/logan/tempete#entry')],
            'actions' => $askInitialOrders,
        ],
        'wrong_initial_orders' => [
            'blocks' => [Content::narrative('ambria/logan/tempete#wrong_initial_orders')],
            'actions' => $askInitialOrders,
        ],
        'avoid_storm' => [
            'audio' => 'assets/sounds/ambria/ordres.mp3',
            'blocks' => [
                Content::dialogue('Sullivan', 'assets/img/ambria/sullivanmasonmini.png', 'ambria/logan/tempete#avoid_storm_sullivan'),
                Content::narrative('ambria/logan/tempete#avoid_storm'),
            ],
            'actions' => [Content::action('Suivant.', 'continue_storm')],
        ],
        'face_storm' => [
            'audio' => 'assets/sounds/ambria/ordres.mp3',
            'blocks' => [
                Content::narrative('ambria/logan/tempete#face_storm'),
                Content::dialogue('Sullivan', 'assets/img/ambria/sullivanmasonmini.png', 'ambria/logan/tempete#face_storm_sullivan'),
                Content::narrative('ambria/logan/tempete#face_storm_after'),
            ],
            'actions' => [Content::action('Suivant.', 'continue_storm')],
        ],
        'storm' => [
            'audio' => 'assets/sounds/ambria/tempete.mp3',
            'blocks' => [Content::narrative('ambria/logan/tempete#storm')],
            'actions' => $askSailOrder,
        ],
        'wrong_sail_order' => [
            'blocks' => [Content::narrative('ambria/logan/tempete#wrong_sail_order')],
            'actions' => $askSailOrder,
        ],
        'ready_haubans' => [
            'audio' => 'assets/sounds/ambria/tempete.mp3',
            'blocks' => [Content::narrative('ambria/logan/tempete#ready_haubans')],
            'actions' => [Content::action('Grimper.', 'start_haubans')],
        ],
        'haubans' => [
            'audio' => 'assets/sounds/ambria/tempetecracks.mp3',
            'blocks' => [
                Content::partial('adventures/ambria/haubans'),
                Content::narrative('ambria/logan/tempete#haubans'),
            ],
            'actions' => [],
            'hint' => Content::hint('ambria/logan/hints#haubans'),
            'scripts' => [
                'assets/js/adventures/dragDropPuzzle.js',
                'assets/js/adventures/ambria/haubans.js',
            ],
        ],
        'haubans_success_affale' => [
            'audio' => 'assets/sounds/ambria/tempetecracks.mp3',
            'blocks' => [Content::narrative('ambria/logan/tempete#haubans_success_affale')],
            'actions' => [Content::action('Suivant.', 'continue_vigie')],
        ],
        'haubans_success_ferle' => [
            'audio' => 'assets/sounds/ambria/tempetecracks.mp3',
            'blocks' => [Content::narrative('ambria/logan/tempete#haubans_success_ferle')],
            'actions' => [Content::action('Suivant.', 'continue_vigie')],
        ],
        'haubans_failure_affale' => [
            'audio' => 'assets/sounds/ambria/tempetecracks.mp3',
            'blocks' => [Content::narrative('ambria/logan/tempete#haubans_failure_affale')],
            'actions' => [Content::action('Suivant.', 'continue_vigie')],
        ],
        'haubans_failure_ferle' => [
            'audio' => 'assets/sounds/ambria/tempetecracks.mp3',
            'blocks' => [Content::narrative('ambria/logan/tempete#haubans_failure_ferle')],
            'actions' => [Content::action('Suivant.', 'continue_vigie')],
        ],
        'vigie' => [
            'audio' => 'assets/sounds/ambria/tempete.mp3',
            'blocks' => [Content::narrative('ambria/logan/tempete#vigie')],
            'actions' => [
                Content::action('Scélérate à bâbord.', 'wave_babord'),
                Content::action('Scélérate à tribord.', 'wave_tribord'),
            ],
        ],
        'wave_babord' => [
            'audio' => 'assets/sounds/ambria/scelerate.mp3',
            'blocks' => [
                Content::dialogue('Logan', 'assets/img/ambria/loganbarthelemymini.png', 'ambria/logan/tempete#wave_babord_logan', 'right'),
                Content::narrative('ambria/logan/tempete#wave_babord'),
            ],
            'actions' => $askBarrels,
        ],
        'wave_tribord' => [
            'audio' => 'assets/sounds/ambria/scelerate.mp3',
            'blocks' => [
                Content::dialogue('Logan', 'assets/img/ambria/loganbarthelemymini.png', 'ambria/logan/tempete#wave_tribord_logan', 'right'),
                Content::narrative('ambria/logan/tempete#wave_tribord'),
            ],
            'actions' => $askBarrels,
        ],
        'wrong_barrels' => [
            'blocks' => [Content::narrative('ambria/logan/tempete#wrong_barrels')],
            'actions' => $askBarrels,
        ],
        'barrels' => [
            'audio' => 'assets/sounds/ambria/tempete.mp3',
            'blocks' => [
                Content::dialogue('Sullivan', 'assets/img/ambria/sullivanmasonmini.png', 'ambria/logan/tempete#barrels_sullivan'),
                Content::narrative('ambria/logan/tempete#barrels'),
            ],
            'actions' => [
                Content::action('Sauver le rhum.', 'save_rhum'),
                Content::action('Sauver le riz.', 'save_riz'),
            ],
        ],
        'recifs' => [
            'audio' => 'assets/sounds/ambria/tempete.mp3',
            'blocks' => [
                Content::image('assets/img/ambria/recifs.png', 'Récifs dans la tempête.', 'enigmelieu'),
                Content::narrative('ambria/logan/tempete#recifs'),
            ],
            'actions' => [Content::ask('Attendre les ordres.', 'recifs', 'submit_recifs')],
            'hint' => Content::hint('ambria/logan/hints#recifs'),
        ],
        'wrong_recifs' => [
            'blocks' => [
                Content::narrative('ambria/logan/tempete#wrong_recifs'),
                Content::image('assets/img/ambria/recifs.png', 'Récifs dans la tempête.', 'enigmelieu'),
                Content::narrative('ambria/logan/tempete#recifs'),
            ],
            'actions' => [Content::ask('Attendre les ordres.', 'recifs', 'submit_recifs')],
            'hint' => Content::hint('ambria/logan/hints#recifs'),
        ],
        'recifs_intro' => [
            'audio' => 'assets/sounds/ambria/tempetecracks.mp3',
            'blocks' => [Content::narrative('ambria/logan/tempete#recifs_intro')],
            'actions' => [Content::action('Suivant.', 'continue_recifs')],
        ],
        'recifs_matcasse' => [
            'audio' => 'assets/sounds/ambria/tempetefin.mp3',
            'blocks' => [Content::narrative('ambria/logan/tempete#recifs_matcasse')],
            'actions' => [Content::action('Suivant.', 'start_plage')],
        ],
        'recifs_quillecassee' => [
            'audio' => 'assets/sounds/ambria/tempetefin.mp3',
            'blocks' => [Content::narrative('ambria/logan/tempete#recifs_quillecassee')],
            'actions' => [Content::action('Suivant.', 'start_plage')],
        ],
        'recifs_damage' => [
            'audio' => 'assets/sounds/ambria/tempetefin.mp3',
            'blocks' => [Content::narrative('ambria/logan/tempete#recifs_damage')],
            'actions' => [Content::action('Suivant.', 'start_plage')],
        ],
        'recifs_perfect' => [
            'audio' => 'assets/sounds/ambria/tempetefin.mp3',
            'blocks' => [Content::narrative('ambria/logan/tempete#recifs_perfect')],
            'actions' => [Content::action('Suivant.', 'start_plage')],
        ],
    ],
];
