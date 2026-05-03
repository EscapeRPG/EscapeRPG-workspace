<?php

return [
    'variants' => [
        'revelation' => [
            'audio' => null,
            'blocks' => [
                [
                    'type' => 'paragraphs',
                    'paragraphs' => [
                        "Vous parcourez à nouveau les lignes de cet email, n'en croyant pas vos yeux.<br>Mais oui ! Ce que dit ce Darren Braun est vrai ! Vous vous souvenez de l'intégralité de votre soirée d'hier à présent !",
                        "Vous y êtes arrivé vers 19h. Le fameux Darren Braun est arrivé peu de temps après et Juliette l'a présenté à tout le monde. Elle a expliqué sa présence et certains <i>- dont vous -</i> se sont gentiment moqués d'elle car très sceptiques à ce sujet.",
                        "Vous avez très vite repris le cours de la soirée et vous vous souvenez maintenant des différents clichés que vous avez pris, dont ceux qui vous ont permis de découvrir la vérité !",
                        "La soirée était vraiment amusante, comme toujours avec Juliette qui essaye à chaque fois de proposer de nouvelles activités à ses amis. Vous êtes rentré tard cette nuit-là, après en avoir bien profité, puis vous êtes endormi... jusqu'à ce matin où vous ne vous souveniez plus de rien !",
                        "Amusé, vous envoyez un message à Juliette pour lui dire que vous avez résolu son enquête puis envoyez un message à Axel.",
                    ],
                ],
            ],
            'actions' => [
                ['label' => 'ÉBAUBI', 'name' => 'action', 'value' => 'finish_story', 'class' => 'action'],
            ],
        ],
        'completed' => [
            'audio' => null,
            'blocks' => [
                ['type' => 'image', 'src' => 'assets/img/etoilefinpleine.png', 'alt' => 'étoile fin', 'class' => 'enigme'],
                [
                    'type' => 'paragraphs',
                    'paragraphs' => [
                        "Félicitations, vous venez de terminer le scénario \"Last Party\" d'<i>EscapeRPG</i> !",
                        "Il s'agissait ici du scénario de découverte, permettant de découvrir la manière de jouer, mais d'autres aventures vous attendent sur le site !",
                        "Merci d'avoir pris le temps de jouer. Nous espérons que cette histoire vous aura plu, n'hésitez pas à laisser un commentaire sur la <a href=\"https://www.facebook.com/escaperpg\" target=\"_blank\" rel=\"noreferrer\">page Facebook</a>, chaque message est fortement apprécié ! Vous pourrez également y suivre les actualités pour savoir quand les prochains scénarios seront mis en ligne.",
                        "Si le concept vous plaît, vous pouvez nous soutenir sur notre <a href=\"https://fr.tipeee.com/escaperpg\" target=\"_blank\" rel=\"noreferrer\">page tipeee</a> en nous faisant un don et nous permettre de vous proposer de nouveaux contenus.",
                        "Vous pouvez également laisser un commentaire directement ci-dessous pour faire savoir que vous avez terminé ce scénario !",
                    ],
                ],
                ['type' => 'comments'],
            ],
            'actions' => [],
        ],
    ],
];
