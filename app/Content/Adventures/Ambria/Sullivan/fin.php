<?php

use App\Services\Adventures\Support\Content;

$sullivan = 'assets/img/ambria/sullivanmasonmini.png';
$jake = 'assets/img/ambria/jake.png';
$timonier = 'assets/img/ambria/timonier.png';
$matelots = 'assets/img/ambria/matelots.png';

$stars = static function (int $count): array {
    $html = '<center>';
    for ($i = 1; $i <= 5; $i++) {
        $src = $i <= $count ? 'assets/img/etoilefinpleine.png' : 'assets/img/etoilefinvide.png';
        $html .= '<img src="' . asset($src) . '" alt="">';
    }
    $html .= '</center>';

    return Content::html($html);
};

return [
    'variants' => [
        'default' => [
            'blocks' => [],
            'actions' => [],
        ],
        'bad' => [
            'audio' => 'assets/sounds/ambria/recuptresor.mp3',
            'blocks' => [
                Content::narrative('ambria/sullivan/fin#bad_intro'),
                Content::dialogue('Jake', $jake, 'ambria/sullivan/fin#bad_jake_plan'),
                Content::narrative('ambria/sullivan/fin#bad_treasure'),
                Content::dialogue('Jake', $jake, 'ambria/sullivan/fin#bad_jake_revolt'),
                Content::narrative('ambria/sullivan/fin#bad_sullivan_reacts'),
                Content::dialogue('Sullivan', $sullivan, 'ambria/sullivan/fin#bad_sullivan_threat'),
                Content::narrative('ambria/sullivan/fin#bad_jake_warning_intro'),
                Content::dialogue('Jake', $jake, 'ambria/sullivan/fin#bad_jake_warning'),
                Content::narrative('ambria/sullivan/fin#bad_end'),
            ],
            'actions' => [Content::action('Fin.', 'finish_ending')],
        ],
        'abandoned' => [
            'audio' => 'assets/sounds/ambria/tirfin.mp3',
            'blocks' => [
                Content::narrative('ambria/sullivan/fin#abandoned_escape'),
            ],
            'actions' => [Content::action('Fin.', 'finish_ending')],
        ],
        'loyal' => [
            'audio' => 'assets/sounds/ambria/combatfin.mp3',
            'blocks' => [
                Content::narrative('ambria/sullivan/fin#loyal_fight'),
                Content::dialogue('Sullivan', $sullivan, 'ambria/sullivan/fin#loyal_sullivan_escape'),
                Content::narrative('ambria/sullivan/fin#loyal_escape'),
            ],
            'actions' => [Content::action('Suivant.', 'loyal_ship')],
        ],
        'loyal_ship' => [
            'audio' => 'assets/sounds/ambria/plage.mp3',
            'blocks' => [
                Content::narrative('ambria/sullivan/fin#loyal_ship_intro'),
                Content::dialogue('Le timonier', $timonier, 'ambria/sullivan/fin#loyal_timonier'),
                Content::narrative('ambria/sullivan/fin#loyal_ship_after_timonier'),
                Content::dialogue('Sullivan', $sullivan, 'ambria/sullivan/fin#loyal_sullivan_board'),
                Content::narrative('ambria/sullivan/fin#loyal_ship_orders'),
                Content::dialogue('Des matelots', $matelots, 'ambria/sullivan/fin#loyal_matelots'),
                Content::narrative('ambria/sullivan/fin#loyal_mutineers'),
                Content::dialogue('Sullivan', $sullivan, 'ambria/sullivan/fin#loyal_sullivan_fire'),
                Content::narrative('ambria/sullivan/fin#loyal_departure'),
            ],
            'actions' => [Content::action('Fin.', 'finish_ending')],
        ],
        'good' => [
            'audio' => 'assets/sounds/ambria/recuptresor.mp3',
            'blocks' => [
                Content::narrative('ambria/sullivan/fin#treasure_return'),
                Content::dialogue('Sullivan', $sullivan, 'ambria/sullivan/fin#good_sullivan'),
                Content::narrative('ambria/sullivan/fin#good_end'),
            ],
            'actions' => [Content::action('Fin.', 'finish_ending')],
        ],
        'best' => [
            'audio' => 'assets/sounds/ambria/recuptresor.mp3',
            'blocks' => [
                Content::narrative('ambria/sullivan/fin#treasure_return'),
                Content::narrative('ambria/sullivan/fin#best_end'),
            ],
            'actions' => [Content::action('Fin.', 'finish_ending')],
        ],
        'completed_bad' => [
            'blocks' => [
                $stars(1),
                Content::narrative('ambria/sullivan/fin#completed_bad'),
                Content::comments(),
            ],
        ],
        'completed_abandoned' => [
            'blocks' => [
                $stars(2),
                Content::narrative('ambria/sullivan/fin#completed_abandoned'),
                Content::comments(),
            ],
        ],
        'completed_loyal' => [
            'blocks' => [
                $stars(3),
                Content::narrative('ambria/sullivan/fin#completed_loyal'),
                Content::comments(),
            ],
        ],
        'completed_good' => [
            'blocks' => [
                $stars(4),
                Content::narrative('ambria/sullivan/fin#completed_good'),
                Content::comments(),
            ],
        ],
        'completed_best' => [
            'blocks' => [
                $stars(5),
                Content::narrative('ambria/sullivan/fin#completed_best'),
                Content::comments(),
            ],
        ],
    ],
];
