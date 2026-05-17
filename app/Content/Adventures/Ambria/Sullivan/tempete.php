<?php

use App\Services\Adventures\Support\Content;

$sullivan = 'assets/img/ambria/sullivanmasonmini.png';
$timonier = 'assets/img/ambria/timonier.png';
$askVigie = [Content::ask("L'écouter.", 'vigie', 'submit_vigie')];
$finishAction = [Content::action('Suivant.', 'finish_tempete')];
$plageAction = [Content::action('Suivant.', 'start_plage')];

return [
    'variants' => [
        'default' => [
            'audio' => 'assets/sounds/ambria/flots.mp3',
            'blocks' => [
                Content::narrative('ambria/sullivan/tempete#entry'),
                Content::dialogue('Timonier', $timonier, 'ambria/sullivan/tempete#timonier_entry'),
                Content::narrative('ambria/sullivan/tempete#ask_orders'),
            ],
            'actions' => [
                Content::action('Faire un détour.', 'avoid_storm'),
                Content::action('Continuer.', 'face_storm'),
            ],
        ],
        'entry' => [
            'audio' => 'assets/sounds/ambria/flots.mp3',
            'blocks' => [
                Content::narrative('ambria/sullivan/tempete#entry'),
                Content::dialogue('Timonier', $timonier, 'ambria/sullivan/tempete#timonier_entry'),
                Content::narrative('ambria/sullivan/tempete#ask_orders'),
            ],
            'actions' => [
                Content::action('Faire un détour.', 'avoid_storm'),
                Content::action('Continuer.', 'face_storm'),
            ],
        ],
        'avoid_storm' => [
            'audio' => 'assets/sounds/ambria/ordres.mp3',
            'blocks' => [
                Content::dialogue('Sullivan', $sullivan, 'ambria/sullivan/tempete#avoid_storm_sullivan', 'right'),
                Content::narrative('ambria/sullivan/tempete#avoid_storm'),
            ],
            'actions' => [Content::action('Suivant.', 'continue_storm')],
        ],
        'face_storm' => [
            'audio' => 'assets/sounds/ambria/ordres.mp3',
            'blocks' => [
                Content::narrative('ambria/sullivan/tempete#face_storm_intro'),
                Content::dialogue('Sullivan', $sullivan, 'ambria/sullivan/tempete#face_storm_sullivan', 'right'),
                Content::narrative('ambria/sullivan/tempete#face_storm_middle'),
                Content::dialogue('Sullivan', $sullivan, 'ambria/sullivan/tempete#face_storm_order', 'right'),
                Content::narrative('ambria/sullivan/tempete#face_storm_after'),
            ],
            'actions' => [Content::action('Suivant.', 'continue_storm')],
        ],
        'storm' => [
            'audio' => 'assets/sounds/ambria/tempete.mp3',
            'blocks' => [Content::narrative('ambria/sullivan/tempete#storm')],
            'actions' => [
                Content::action('Affale la voile !', 'order_affale'),
                Content::action('Ferle la voile !', 'order_ferle'),
            ],
        ],
        'affale' => [
            'audio' => 'assets/sounds/ambria/tempetecracks.mp3',
            'blocks' => [
                Content::dialogue('Sullivan', $sullivan, 'ambria/sullivan/tempete#affale_sullivan', 'right'),
                Content::narrative('ambria/sullivan/tempete#affale'),
            ],
            'actions' => $askVigie,
        ],
        'ferle' => [
            'audio' => 'assets/sounds/ambria/tempetecracks.mp3',
            'blocks' => [
                Content::dialogue('Sullivan', $sullivan, 'ambria/sullivan/tempete#ferle_sullivan', 'right'),
                Content::narrative('ambria/sullivan/tempete#ferle'),
            ],
            'actions' => $askVigie,
        ],
        'wave_babord' => [
            'audio' => 'assets/sounds/ambria/scelerate.mp3',
            'blocks' => [
                Content::narrative('ambria/sullivan/tempete#wave_babord'),
                Content::dialogue('Sullivan', $sullivan, 'ambria/sullivan/tempete#barrels_sullivan', 'right'),
            ],
            'actions' => [Content::action('Suivant.', 'continue_barrels')],
        ],
        'wave_tribord' => [
            'audio' => 'assets/sounds/ambria/scelerate.mp3',
            'blocks' => [
                Content::narrative('ambria/sullivan/tempete#wave_tribord'),
                Content::dialogue('Sullivan', $sullivan, 'ambria/sullivan/tempete#barrels_sullivan', 'right'),
            ],
            'actions' => [Content::action('Suivant.', 'continue_barrels')],
        ],
        'wave_failure' => [
            'audio' => 'assets/sounds/ambria/scelerate.mp3',
            'blocks' => [
                Content::narrative('ambria/sullivan/tempete#wave_failure'),
                Content::dialogue('Sullivan', $sullivan, 'ambria/sullivan/tempete#barrels_sullivan', 'right'),
            ],
            'actions' => [Content::action('Suivant.', 'continue_barrels')],
        ],
        'barrels' => [
            'audio' => 'assets/sounds/ambria/tempete.mp3',
            'blocks' => [Content::narrative('ambria/sullivan/tempete#barrels')],
            'actions' => [
                Content::action('Suivant.', 'continue_recifs'),
            ],
        ],
        'recifs_intro' => [
            'audio' => 'assets/sounds/ambria/tempete.mp3',
            'blocks' => [Content::narrative('ambria/sullivan/tempete#recifs_intro')],
            'actions' => [Content::action('Suivant.', 'continue_recifs')],
        ],
        'recifs' => [
            'audio' => 'assets/sounds/ambria/tempete.mp3',
            'blocks' => [
                Content::narrative('ambria/sullivan/tempete#recifs'),
                Content::partial('adventures/ambria/barre_bateau'),
            ],
            'actions' => [],
            'scripts' => [
                'assets/js/adventures/ambria/barreBateau.js',
            ],
            'hint' => Content::hint('ambria/sullivan/hints#recifs'),
        ],
        'recif_1_success' => [
            'audio' => 'assets/sounds/ambria/recifevite.mp3',
            'blocks' => [
                Content::narrative('ambria/sullivan/tempete#recif_1_success'),
                Content::partial('adventures/ambria/barre_bateau'),
            ],
            'actions' => [],
            'scripts' => [
                'assets/js/adventures/ambria/barreBateau.js',
            ],
            'hint' => Content::hint('ambria/sullivan/hints#recifs'),
        ],
        'recif_1_failure' => [
            'audio' => 'assets/sounds/ambria/reciftouche.mp3',
            'blocks' => [
                Content::narrative('ambria/sullivan/tempete#recif_1_failure'),
                Content::partial('adventures/ambria/barre_bateau'),
            ],
            'actions' => [],
            'scripts' => [
                'assets/js/adventures/ambria/barreBateau.js',
            ],
            'hint' => Content::hint('ambria/sullivan/hints#recifs'),
        ],
        'recif_2_success' => [
            'audio' => 'assets/sounds/ambria/recifevite.mp3',
            'blocks' => [
                Content::narrative('ambria/sullivan/tempete#recif_2_success'),
                Content::partial('adventures/ambria/barre_bateau'),
            ],
            'actions' => [],
            'scripts' => [
                'assets/js/adventures/ambria/barreBateau.js',
            ],
            'hint' => Content::hint('ambria/sullivan/hints#recifs'),
        ],
        'recif_2_failure' => [
            'audio' => 'assets/sounds/ambria/reciftouche.mp3',
            'blocks' => [
                Content::narrative('ambria/sullivan/tempete#recif_2_failure'),
                Content::partial('adventures/ambria/barre_bateau'),
            ],
            'actions' => [],
            'scripts' => [
                'assets/js/adventures/ambria/barreBateau.js',
            ],
            'hint' => Content::hint('ambria/sullivan/hints#recifs'),
        ],
        'recif_3_success' => [
            'audio' => 'assets/sounds/ambria/recifevite.mp3',
            'blocks' => [
                Content::narrative('ambria/sullivan/tempete#recif_3_success'),
                Content::partial('adventures/ambria/barre_bateau'),
            ],
            'actions' => [],
            'scripts' => [
                'assets/js/adventures/ambria/barreBateau.js',
            ],
            'hint' => Content::hint('ambria/sullivan/hints#recifs'),
        ],
        'recif_3_failure' => [
            'audio' => 'assets/sounds/ambria/reciftouche.mp3',
            'blocks' => [
                Content::narrative('ambria/sullivan/tempete#recif_3_failure'),
                Content::partial('adventures/ambria/barre_bateau'),
            ],
            'actions' => [],
            'scripts' => [
                'assets/js/adventures/ambria/barreBateau.js',
            ],
            'hint' => Content::hint('ambria/sullivan/hints#recifs'),
        ],
        'recif_4_success' => [
            'audio' => 'assets/sounds/ambria/recifevite.mp3',
            'blocks' => [Content::narrative('ambria/sullivan/tempete#recif_4_success')],
            'actions' => $finishAction,
        ],
        'recif_4_failure' => [
            'audio' => 'assets/sounds/ambria/reciftouche.mp3',
            'blocks' => [Content::narrative('ambria/sullivan/tempete#recif_4_failure')],
            'actions' => $finishAction,
        ],
        'finish_damage' => [
            'audio' => 'assets/sounds/ambria/tempetefinmatcasse.mp3',
            'blocks' => [
                Content::narrative('ambria/sullivan/tempete#finish_damage'),
                Content::dialogue('Sullivan', $sullivan, 'ambria/sullivan/tempete#finish_damage_sullivan', 'right'),
            ],
            'actions' => $plageAction,
        ],
        'finish_matcasse' => [
            'audio' => 'assets/sounds/ambria/tempetefinmatcasse.mp3',
            'blocks' => [
                Content::narrative('ambria/sullivan/tempete#finish_matcasse'),
                Content::dialogue('Sullivan', $sullivan, 'ambria/sullivan/tempete#finish_matcasse_sullivan', 'right'),
            ],
            'actions' => $plageAction,
        ],
        'finish_quillecassee' => [
            'audio' => 'assets/sounds/ambria/tempetefin.mp3',
            'blocks' => [
                Content::narrative('ambria/sullivan/tempete#finish_quillecassee'),
                Content::dialogue('Sullivan', $sullivan, 'ambria/sullivan/tempete#finish_quillecassee_sullivan', 'right'),
            ],
            'actions' => $plageAction,
        ],
        'finish_perfect' => [
            'audio' => 'assets/sounds/ambria/tempetefin.mp3',
            'blocks' => [
                Content::narrative('ambria/sullivan/tempete#finish_perfect'),
                Content::dialogue('Sullivan', $sullivan, 'ambria/sullivan/tempete#finish_perfect_sullivan', 'right'),
            ],
            'actions' => $plageAction,
        ],
    ],
];
