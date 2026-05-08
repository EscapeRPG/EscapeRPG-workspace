<?php

$finalImage = ['type' => 'image', 'src' => 'assets/img/secrets/fin.png', 'alt' => 'Fin', 'class' => 'enigme'];

$stars = static function (int $score): array {
    $html = '';
    for ($i = 1; $i <= 4; $i++) {
        $src = $i <= $score ? 'assets/img/etoilefinpleine.png' : 'assets/img/etoilefinvide.png';
        $alt = $i <= $score ? 'étoile pleine' : 'étoile vide';
        $html .= '<img src="' . asset($src) . '" alt="' . $alt . '">';
    }

    return ['type' => 'paragraph', 'text' => $html];
};

$thanks = [
    "Quoi qu'il en soit, merci d'avoir pris le temps de jouer. J'espère que cette histoire vous aura plu, n'hésitez pas à laisser un commentaire sur la <a href=\"https://www.facebook.com/escaperpg\" target=\"_blank\" rel=\"noreferrer\">page Facebook</a>, chaque message est fortement apprécié ! Vous pourrez également y suivre les actualités pour savoir quand les prochains scénarios seront mis en ligne.",
    "Si le concept vous plaît, vous pouvez nous soutenir sur notre <a href=\"https://fr.tipeee.com/escaperpg\" target=\"_blank\" rel=\"noreferrer\">page tipeee</a> en nous faisant un don et nous permettre de vous proposer de nouveaux contenus.",
    "Chacune de ces pages vous propose des contenus exclusifs et uniques en rapport à leur mode de fonctionnement, n'hésitez donc pas à les consulter pour voir ce que vous pouvez y récupérer !",
    "Vous pouvez également laisser un commentaire directement ci-dessous pour faire savoir que vous avez terminé ce scénario !",
];

$ending = static function (int $score, array $paragraphs) use ($finalImage, $stars, $thanks): array {
    return [
        'audio' => null,
        'blocks' => [
            $finalImage,
            $stars($score),
            [
                'type' => 'paragraphs',
                'paragraphs' => array_merge([
                    "Félicitations, vous venez de terminer le scénario \"Secrets Familiaux\" d'<i>EscapeRPG</i> !",
                ], $paragraphs, $thanks),
            ],
            ['type' => 'comments'],
        ],
        'actions' => [],
    ];
};

return [
    'variants' => [
        'locked' => [
            'audio' => null,
            'blocks' => [
                [
                    'type' => 'paragraphs',
                    'paragraphs' => [
                        "Cette page se débloque lorsque vous terminez le scénario.",
                    ],
                ],
            ],
            'actions' => [
                ['label' => 'Retour.', 'name' => 'action', 'value' => 'retour', 'class' => 'action'],
            ],
        ],
        'completed_fin1' => $ending(1, [
            "Cependant, vous avez obtenu la fin la plus sombre, n'hésitez donc pas à retenter l'expérience pour améliorer votre score !",
            "Essayez peut-être d'enquêter de manière plus approfondie à chacune des étapes :<br>- Avez-vous essayé de vous enquérir du bien-être des domestiques et des chiens tout au long de votre aventure ?<br>- Avez-vous questionné les domestiques pour en apprendre un peu plus sur les activités de votre oncle dans son bureau privé ?<br>- Avez-vous bien fouillé toute la maison du docteur Pellington ?",
            "<i>EscapeRPG</i> est un jeu qui récompense l'exploration en vous permettant de découvrir des secrets et résoudre des quêtes annexes pour obtenir les meilleures fins possibles, prenez donc le temps de bien mener vos investigations !",
        ]),
        'completed_fin2' => $ending(2, [
            "Vous avez obtenu la fin \"neutre-mauvais\", n'hésitez donc pas à retenter l'expérience pour améliorer votre score !",
            "Vous avez bien fait de vous enquérir de l'état des chiens de Gaspard et de leur trouver un remède, mais vous avez manqué de temps pour pratiquer le rituel. Vous devriez essayer de trouver un moyen de détourner l'attention du shoggoth pour vous laisser plus de temps. Peut-être devriez-vous essayer de réparer l'électricité ? Le shoggoth avait l'air de s'y intéresser mais le système mis en place par votre oncle n'était pas suffisamment stable pour tenir le temps dont vous aviez besoin.",
        ]),
        'completed_fin3' => $ending(3, [
            "Vous avez obtenu la fin \"neutre\", ce qui est l'une des meilleures fins possibles, mais vous pouvez encore faire mieux si vous désirez retenter l'expérience.",
            "Peut-être auriez-vous dû mener l'enquête un peu plus profondément après l'intrusion de Pellington dans le manoir, ou bien trouver un moyen de vous défaire du shoggoth ?",
        ]),
        'completed_fin4' => $ending(4, [
            "De plus, vous avez obtenu la meilleure fin possible, bravo !",
        ]),
    ],
];
