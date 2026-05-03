<?php

$gaspard = static fn(string $text): array => [
    'type' => 'dialogue',
    'speaker' => ['name' => 'Gaspard', 'portrait' => 'assets/img/secrets/gaspard.png'],
    'paragraphs' => [$text],
];

$antidoteAction = [
    'label' => 'Parler.',
    'name' => 'antidote',
    'value' => 'soigner',
    'class' => 'ask',
];

return [
    'variants' => [
        'step_0' => ['audio' => null, 'blocks' => [['type' => 'paragraphs', 'paragraphs' => [
            "C'est ici que dorment les 4 <span class=\"mdp\">chiens</span> de garde. 3 dobermans et un rottweiler.",
        ]]], 'actions' => []],
        'intrusion' => ['audio' => null, 'blocks' => [['type' => 'paragraphs', 'paragraphs' => [
            "Vous décidez d'aller voir les chiens.",
            "À votre arrivée, vous êtes étonné de voir que ceux-ci semblent bien plus calmes que d'habitude. Ils sont calmement allongés au fond de leurs cages.",
            "Au niveau de l'entrée de chacune d'elles se trouve une gamelle presque pleine de viande. Vous trouvez un peu étrange que les chiens aient à peine touché à leur <span class=\"mdp\">nourriture</span>.",
        ]]], 'actions' => []],
        'discovery' => [
            'audio' => null,
            'blocks' => [
                ['type' => 'paragraphs', 'paragraphs' => [
                    "Vous rejoignez Gaspard dans le chenil. Il a ouvert la cage et est accroupi près des chiens, toujours allongés.",
                    "Vous les entendez gémir.",
                ]],
                $gaspard("Bon sang, ils sont empoisonnés !<br>Je ne sais pas si c'est grave ou non, mais je vais m'occuper d'eux. Si vous avez un antidote, je vous en serais éternellement reconnaissant."),
                ['type' => 'paragraphs', 'paragraphs' => [
                    "Sur ces mots, Gaspard reporte son attention sur les chiens et ne semble pas avoir envie de vous parler.",
                    "Vous décidez de repartir.",
                ]],
            ],
            'actions' => [
                ['label' => 'Repartir.', 'name' => 'action', 'value' => 'poisoning_understood', 'class' => 'action'],
            ],
        ],
        'poisoned' => [
            'audio' => null,
            'blocks' => [
                ['type' => 'paragraphs', 'paragraphs' => [
                    "Gaspard est toujours en train de s'occuper des 4 chiens empoisonnés.",
                    "Il ne semble toujours pas enclin à discuter avec vous.",
                ]],
            ],
            'actions' => [$antidoteAction],
        ],
        'step_1' => [
            'audio' => null,
            'blocks' => [
                $gaspard("J'ai pas le temps pour ça. Si vous avez quelque chose pour eux, je vous écoute, sinon laissez-moi tranquille."),
                ['type' => 'paragraphs', 'paragraphs' => [
                    "Il se retourne pour reporter son attention sur les animaux et ne semble plus enclin à discuter avec vous.",
                ]],
            ],
            'actions' => [$antidoteAction],
        ],
        'step_2' => [
            'audio' => null,
            'blocks' => [
                ['type' => 'paragraphs', 'paragraphs' => [
                    "Vous tendez le flacon à Gaspard qui l'examine d'un air soupçonneux, mais il finit par en verser un peu dans la gueule de chacun des chiens.",
                    "Après de longues minutes d'attente, ils commencent à ouvrir les yeux et leur respiration se fait un peu plus naturelle.",
                    "Il faudra encore un peu de temps pour qu'ils soient pleinement remis, mais il semble que vous ayez sauvé les chiens ! Qui sait ce qu'il se serait passé si vous n'aviez pas trouvé de remède ?",
                    "Gaspard s'approche de vous, un sourire de gratitude sur le visage.",
                ]],
                $gaspard("Merci l'ami, je vous dois une fière chandelle !<br><br>Laissons-les se reposer un peu, ils seront bientôt de nouveau sur pied.<br>Suivez-moi, j'ai quelque chose à vous donner pour vous remercier."),
                ['type' => 'paragraphs', 'paragraphs' => [
                    "Gaspard ressort du chenil et se dirige vers sa <span class=\"lieu\">maison</span>.",
                ]],
            ],
            'actions' => [
                ['label' => 'Le suivre.', 'name' => 'action', 'value' => 'follow_gaspard', 'class' => 'action'],
            ],
        ],
        'saved' => ['audio' => null, 'blocks' => [['type' => 'paragraphs', 'paragraphs' => [
            "À votre arrivée dans le chenil, les chiens se redressent sur leurs pattes et agitent joyeusement la queue en vous voyant.",
        ]]], 'actions' => []],
    ],
];
