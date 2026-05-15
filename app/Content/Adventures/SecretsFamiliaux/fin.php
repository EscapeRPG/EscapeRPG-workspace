<?php

use App\Services\Adventures\Support\Content;
use App\Services\Adventures\Support\NarrativeText;

$finalImage = Content::image('assets/img/secrets/fin.png', 'Fin');

$stars = static function (int $score): array {
    $html = '<div class="enigme">';
    for ($i = 1; $i <= 4; $i++) {
        $src = $i <= $score ? 'assets/img/etoilefinpleine.png' : 'assets/img/etoilefinvide.png';
        $alt = $i <= $score ? 'étoile pleine' : 'étoile vide';
        $html .= '<img src="' . asset($src) . '" alt="' . $alt . '">';
    }
    $html .= '</div>';

    return Content::html($html);
};

$ending = static function (int $score, string $section) use ($finalImage, $stars): array {
    return [
        'audio' => null,
        'blocks' => [
            $finalImage,
            $stars($score),
            Content::paragraphs(array_merge(
                NarrativeText::paragraphList('secretsfamiliaux/fin#intro'),
                NarrativeText::paragraphList("secretsfamiliaux/fin#{$section}"),
                NarrativeText::paragraphList('secretsfamiliaux/fin#thanks')
            )),
            Content::comments(),
        ],
        'actions' => [],
    ];
};

return [
    'variants' => [
        'locked' => [
            'audio' => null,
            'blocks' => [
                Content::narrative('secretsfamiliaux/fin#locked'),
            ],
            'actions' => [
                Content::action('Retour.', 'retour'),
            ],
        ],
        'completed_fin1' => $ending(1, 'completed_fin1'),
        'completed_fin2' => $ending(2, 'completed_fin2'),
        'completed_fin3' => $ending(3, 'completed_fin3'),
        'completed_fin4' => $ending(4, 'completed_fin4'),
    ],
];
