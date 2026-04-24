<?php

return [
    'intro' => [
        "Ah, je vois que vous vous sentez d'attaque pour vous lancer dans l'une de mes histoires. Parfait !",
        "Voici les différentes aventures que j'ai à vous proposer. Regardez les images de plus près, elles ont le pouvoir de vous embarquer dans leur univers.",
        "Oh et ne vous en faites pas, j'en ai encore tout un stock pour vous, mais cela viendra en temps voulu.",
    ],
    'sections' => [
        [
            'title' => 'Aventures disponibles',
            'cards' => [
                [
                    'title' => 'LAST PARTY',
                    'href' => '/aventures/lastparty/index',
                    'image' => 'assets/img/lastpartycard.png',
                    'alt' => 'last party',
                    'paragraphs' => [
                        '<span class="categorie">Découverte, fête, mystère</span>.',
                        '<img src="/assets/img/joueurs.png" alt="nombre de joueurs"> 1 joueur et +',
                        "Vous êtes Jonathan Le Tellier, un jeune étudiant de 23 ans un peu fêtard.<br>Hier, vous avez fait une soirée chez une amie, mais à votre réveil, vous ne vous souvenez de rien...",
                    ],
                    'stats' => [
                        ['label' => 'Difficulté', 'icons' => ['full', 'empty', 'empty', 'empty', 'empty'], 'strong' => true],
                        ['label' => 'Fouille / Enquête', 'icons' => ['full', 'empty', 'empty', 'empty', 'empty']],
                        ['label' => 'Énigmes / Réflexion', 'icons' => ['full', 'full', 'empty', 'empty', 'empty']],
                        ['label' => 'Durée', 'icons' => ['full', 'empty', 'empty', 'empty', 'empty']],
                    ],
                ],
                [
                    'title' => 'SECRETS FAMILIAUX',
                    'href' => '/aventures/secrets/index',
                    'image' => 'assets/img/secretscard.png',
                    'alt' => 'secrets familiaux',
                    'paragraphs' => [
                        '<img src="/assets/img/12ans.png" alt="interdit aux moins de 12 ans"> <span class="categorie">Horreur, Cthulhu, enquête</span>.',
                        '<img src="/assets/img/joueurs.png" alt="nombre de joueurs"> 1 joueur et +',
                        "Vous êtes Bastian Deckard.<br>À la mort de votre oncle, vous héritez de son manoir et de tous ses biens, mais êtes-vous prêt à faire face aux secrets qu'il renferme ?",
                    ],
                    'stats' => [
                        ['label' => 'Difficulté', 'icons' => ['full', 'full', 'full', 'empty', 'empty'], 'strong' => true],
                        ['label' => 'Fouille / Enquête', 'icons' => ['full', 'full', 'full', 'full', 'empty']],
                        ['label' => 'Énigmes / Réflexion', 'icons' => ['full', 'full', 'half', 'empty', 'empty']],
                        ['label' => 'Durée', 'icons' => ['full', 'full', 'full', 'full', 'empty']],
                    ],
                ],
                [
                    'title' => "LE GRENIER D'ARTHUR",
                    'href' => '/aventures/avent/index',
                    'image' => 'assets/img/aventcard.png',
                    'alt' => "le grenier d'arthur",
                    'paragraphs' => [
                        '<span class="categorie">Noël, merveilleux, familial</span>.',
                        '<img src="/assets/img/joueurs.png" alt="nombre de joueurs"> 1 joueur et +',
                        "Vous êtes Sarah Latour, 11 ans.<br>C'est le début des vacances de Noël et vous partez quelques jours chez votre grand-père Arthur.<br>En arrivant, vous trouvez porte close.",
                    ],
                    'stats' => [
                        ['label' => 'Difficulté', 'icons' => ['full', 'empty', 'empty', 'empty', 'empty'], 'strong' => true],
                        ['label' => 'Fouille / Enquête', 'icons' => ['full', 'empty', 'empty', 'empty', 'empty']],
                        ['label' => 'Énigmes / Réflexion', 'icons' => ['full', 'half', 'empty', 'empty', 'empty']],
                        ['label' => 'Durée', 'icons' => ['full', 'half', 'empty', 'empty', 'empty']],
                    ],
                ],
                [
                    'title' => "LE TRÉSOR D'AMBRIA",
                    'href' => '/aventures/ambria/index',
                    'image' => 'assets/img/tresorambriacard.png',
                    'alt' => "le trésor d'ambria",
                    'paragraphs' => [
                        '<span class="categorie">Pirates, aventure, multijoueurs</span>.',
                        '<img src="/assets/img/joueurs.png" alt="nombre de joueurs"><img src="/assets/img/joueurs.png" alt="nombre de joueurs"> 2 joueurs et +',
                        "Le capitaine Sullivan Mason cherche un trésor.<br>Le jeune insulaire Logan Barthélémy rêve d'échapper à son quotidien.<br>Ensemble, vous allez partir à l'aventure, sur les traces de la cité perdue d'Ambria.",
                    ],
                    'stats' => [
                        ['label' => 'Difficulté', 'icons' => ['full', 'full', 'full', 'full', 'empty'], 'strong' => true],
                        ['label' => 'Fouille / Enquête', 'icons' => ['full', 'half', 'empty', 'empty', 'empty']],
                        ['label' => 'Énigmes / Réflexion', 'icons' => ['full', 'full', 'half', 'empty', 'empty']],
                        ['label' => 'Durée', 'icons' => ['full', 'full', 'full', 'half', 'empty']],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Démo disponible, obtenez l\'accès sur la <a href="https://fr.tipeee.com/escaperpg" target="_blank" rel="noreferrer">page Tipeee</a> !',
            'cards' => [
                [
                    'title' => 'STATION GAEA-1',
                    'image' => 'assets/img/gaea1card.png',
                    'alt' => 'station gaea 1',
                    'paragraphs' => [
                        '<span class="categorie">Science-fiction, horreur, survie</span>.',
                        '<img src="/assets/img/joueurs.png" alt="nombre de joueurs"> 1 joueur et +',
                        "Alors que vous êtes à bord de votre vaisseau spatial, vous captez un signal de détresse en provenance d'une station au beau milieu du vide spatial.<br>Que s'est-il passé à bord ? Réussirez-vous à échapper à ce qui s'y trouve ?",
                    ],
                    'stats' => [
                        ['label' => 'Écriture du scénario', 'icons' => ['full', 'full', 'full', 'full', 'full']],
                        ['label' => 'Script', 'icons' => ['full', 'full', 'full', 'empty', 'empty']],
                        ['label' => 'Code', 'icons' => ['full', 'full', 'empty', 'empty', 'empty']],
                        ['label' => 'Illustrations', 'icons' => ['full', 'empty', 'empty', 'empty', 'empty']],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Aventures en cours de production',
            'cards' => [
                [
                    'title' => 'LES DISPARUS DE BLACKWOOD',
                    'image' => 'assets/img/blackwoodcard.png',
                    'alt' => 'les disparus de blackwood',
                    'paragraphs' => [
                        '<span class="categorie">Horreur, Cthulhu, enquête</span>.',
                        '<img src="/assets/img/joueurs.png" alt="nombre de joueurs"> 1 joueur et +',
                        "Grayhill, Angleterre, 1908.<br>D'inquiétantes disparitions ont lieu dans l'école de Blackwood.<br>Accompagné·e de Curtis Talbot, tâchez de découvrir ce qui se passe dans cette école.",
                    ],
                    'stats' => [
                        ['label' => 'Écriture du scénario', 'icons' => ['full', 'full', 'half', 'empty', 'empty']],
                        ['label' => 'Script', 'icons' => ['empty', 'empty', 'empty', 'empty', 'empty']],
                        ['label' => 'Code', 'icons' => ['empty', 'empty', 'empty', 'empty', 'empty']],
                        ['label' => 'Illustrations', 'icons' => ['empty', 'empty', 'empty', 'empty', 'empty']],
                    ],
                ],
                [
                    'title' => 'EMMA Z',
                    'image' => 'assets/img/comingsoon.png',
                    'alt' => 'emma z',
                    'paragraphs' => [
                        '<span class="categorie">Horreur, zombies, série</span>.',
                        '<img src="/assets/img/joueurs.png" alt="nombre de joueurs"> 1 joueur et +',
                        "Alors que les gens se transforment en monstres cannibales, vous cherchez un endroit sûr pour votre fille. Mais celle-ci se fait enlever.<br>Tentez de la retrouver dans cette série de 5 chapitres où la mort peut arriver à tout instant !",
                    ],
                    'stats' => [
                        ['label' => 'Écriture du scénario', 'icons' => ['full', 'half', 'empty', 'empty', 'empty']],
                        ['label' => 'Script', 'icons' => ['empty', 'empty', 'empty', 'empty', 'empty']],
                        ['label' => 'Code', 'icons' => ['empty', 'empty', 'empty', 'empty', 'empty']],
                        ['label' => 'Illustrations', 'icons' => ['empty', 'empty', 'empty', 'empty', 'empty']],
                    ],
                ],
                [
                    'title' => 'ÉTAPE INCONNUE',
                    'image' => 'assets/img/comingsoon.png',
                    'alt' => 'étape inconnue',
                    'paragraphs' => [
                        '<span class="categorie">Science-fiction, mystère, exploration</span>.',
                        '<img src="/assets/img/joueurs.png" alt="nombre de joueurs"> 1 joueur et +',
                        "Vous êtes dans l'espace, à bord d'un vaisseau d'exploration.<br>Soudain, vous êtes sorti·e de votre sommeil cryogénique par l'ordinateur de bord : celui-ci a détecté quelque chose d'inattendu.",
                    ],
                    'stats' => [
                        ['label' => 'Écriture du scénario', 'icons' => ['full', 'empty', 'empty', 'empty', 'empty']],
                        ['label' => 'Script', 'icons' => ['empty', 'empty', 'empty', 'empty', 'empty']],
                        ['label' => 'Code', 'icons' => ['empty', 'empty', 'empty', 'empty', 'empty']],
                        ['label' => 'Illustrations', 'icons' => ['empty', 'empty', 'empty', 'empty', 'empty']],
                    ],
                ],
            ],
        ],
    ],
];
