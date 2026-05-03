<?php

$dialogue = static fn(string $text): array => [
    'type' => 'dialogue',
    'speaker' => ['name' => 'Gaspard', 'portrait' => 'assets/img/secrets/gaspard.png'],
    'paragraphs' => [$text],
];

return [
    'variants' => [
        'default' => [
            'audio' => null,
            'blocks' => [['type' => 'paragraphs', 'paragraphs' => [
                "Gaspard vit dans une petite maison de pierre, juste à côté de la grille d'entrée. Juste derrière elle se trouve le <span class=\"lieu\">chenil</span>.",
            ]]],
            'actions' => [
                [
                    'label' => 'Interroger.',
                    'name' => 'gaspard',
                    'value' => 'interroger',
                    'class' => 'ask',
                ],
            ],
        ],
        'chenil' => [
            'audio' => null,
            'blocks' => [['type' => 'paragraphs', 'paragraphs' => [
                "Il semblerait que Gaspard soit au <span class=\"lieu\">chenil</span> avec les <span class=\"mdp\">chiens</span>.",
            ]]],
            'actions' => [],
        ],
        'intrusion' => [
            'audio' => null,
            'blocks' => [
                ['type' => 'paragraphs', 'paragraphs' => [
                    "Gaspard vient tout juste de revenir de la ville, il est en train de déposer des sacs de courses sur la table de sa cuisine.",
                ]],
                $dialogue("Je peux vous aider monsieur ?"),
            ],
            'actions' => [
                [
                    'label' => 'Interroger.',
                    'name' => 'gaspard',
                    'value' => 'interroger',
                    'class' => 'ask',
                ],
            ],
        ],
        'nourriture' => [
            'audio' => null,
            'blocks' => [
                $dialogue("Non, je viens tout juste de rentrer et je ne suis pas encore allé les nourrir.<br>Les domestiques n'osent pas s'approcher des bêtes, donc si ce n'est ni eux qui ont donné à manger, ni vous..."),
                ['type' => 'paragraphs', 'paragraphs' => [
                    "Soudain, Gaspard blêmit et se rue hors de sa maison pour aller voir les <span class=\"mdp\">chiens</span>.",
                ]],
            ],
            'actions' => [
                ['label' => 'Le suivre.', 'name' => 'action', 'value' => 'follow_chenil', 'class' => 'action'],
            ],
        ],
        'poisoned' => [
            'audio' => null,
            'blocks' => [['type' => 'paragraphs', 'paragraphs' => [
                "Gaspard est toujours au <span class=\"lieu\">chenil</span> pour s'occuper des <span class=\"mdp\">chiens</span> empoisonnés.",
            ]]],
            'actions' => [],
        ],
        'reward' => [
            'audio' => null,
            'blocks' => [
                ['type' => 'paragraphs', 'paragraphs' => [
                    "Gaspard est en train de fouiller dans un tiroir de sa table de nuit.",
                    "Il semble y trouver quelque chose et se rapproche de vous.",
                ]],
                $dialogue("Tenez, ce n'est pas grand chose, mais je tiens à vous le donner pour vous remercier de ce que vous avez fait."),
                ['type' => 'paragraphs', 'paragraphs' => [
                    "Il vous tend un petit objet de forme ronde, semblant taillé dans de la pierre.",
                    "Des lignes s'entrecroisent en un dessin complexe que vous ne parvenez pas à analyser correctement.",
                ]],
                ['type' => 'linked_image', 'src' => 'assets/img/secrets/talisman.png', 'alt' => 'un étrange talisman confié par Gaspard', 'class' => 'enigme'],
                ['type' => 'paragraphs', 'paragraphs' => [
                    "Vous tendez la main pour l'attraper et sentez une sorte d'aura étrange en émanant.",
                ]],
            ],
            'actions' => [
                ['label' => "Ajouter à l'inventaire.", 'name' => 'action', 'value' => 'take_talisman', 'class' => 'action'],
            ],
        ],
        'saved' => [
            'audio' => null,
            'blocks' => [
                ['type' => 'paragraphs', 'paragraphs' => [
                    "Gaspard semble heureux de vous voir lui rendre visite.",
                ]],
                $dialogue("Qu'est-ce que je peux faire pour vous, l'ami ?"),
            ],
            'actions' => [
                [
                    'label' => 'Interroger.',
                    'name' => 'gaspard',
                    'value' => 'interroger',
                    'class' => 'ask',
                ],
            ],
        ],
        'pellington' => ['audio' => null, 'blocks' => [$dialogue("Je ne le connais pas vraiment... Je n'ai dû le voir qu'une fois ou deux deux, avant aujourd'hui.<br>C'est un médecin, il a un cabinet en ville, mais je ne connais pas son adresse.")],
            'actions' => [
                [
                    'label' => 'Interroger.',
                    'name' => 'gaspard',
                    'value' => 'interroger',
                    'class' => 'ask',
                ],
            ],],
        'domestiques' => ['audio' => null, 'blocks' => [$dialogue("Hum, je suis entré au service de votre oncle il y a 3 ans environ.<br>Je suis l'un des derniers à être arrivé, mais je crois bien que les autres ne sont pas là depuis bien longtemps avant.")],
            'actions' => [
                [
                    'label' => 'Interroger.',
                    'name' => 'gaspard',
                    'value' => 'interroger',
                    'class' => 'ask',
                ],
            ],],
        'chiens' => ['audio' => null, 'blocks' => [$dialogue("Des bons <span class=\"mdp\">chiens</span> de garde, j'aimerais pas être leur ennemi.<br>Je ne sais pas pourquoi, mais ils n'ont jamais eu l'air d'aimer votre oncle. Ils n'arrêtaient pas de gronder dès qu'ils l'apercevaient, sans vouloir vous manquer de respect.")],
            'actions' => [
                [
                    'label' => 'Interroger.',
                    'name' => 'gaspard',
                    'value' => 'interroger',
                    'class' => 'ask',
                ],
            ],],
        'soucis' => ['audio' => null, 'blocks' => [$dialogue("J'ai été engagé par votre oncle lorsqu'il a acheté les <span class=\"mdp\">chiens</span>.<br>Apparemment, il voulait se prémunir contre des rôdeurs.")],
            'actions' => [
                [
                    'label' => 'Interroger.',
                    'name' => 'gaspard',
                    'value' => 'interroger',
                    'class' => 'ask',
                ],
            ],],
        'odeur' => ['audio' => null, 'blocks' => [$dialogue("J'aime pas cette odeur. J'aime pas cet endroit. Sans vouloir vous offenser.<br>On dirait une odeur de charogne en décomposition. Je sais pas d'où ça peut venir. Sans doute un rat mort dans les murs.<br>Je ferai venir quelqu'un, vous inquiétez pas.")],
            'actions' => [
                [
                    'label' => 'Interroger.',
                    'name' => 'gaspard',
                    'value' => 'interroger',
                    'class' => 'ask',
                ],
            ],],
        'symbole' => ['audio' => null, 'blocks' => [$dialogue("Aucune idée de ce que ça signifie.")],
            'actions' => [
                [
                    'label' => 'Interroger.',
                    'name' => 'gaspard',
                    'value' => 'interroger',
                    'class' => 'ask',
                ],
            ],],
        'bureau' => ['audio' => null, 'blocks' => [$dialogue("Je ne sais pas. Je vis ici et je ne suis pratiquement jamais allé dans le manoir. Désolé de ne pas pouvoir vous en apprendre plus.")],
            'actions' => [
                [
                    'label' => 'Interroger.',
                    'name' => 'gaspard',
                    'value' => 'interroger',
                    'class' => 'ask',
                ],
            ],],
        'empreintedepas' => ['audio' => null, 'blocks' => [$dialogue("C'est vous le flic, non ? Je ne vois pas en quoi je pourrais vous aider là-dessus.")],
            'actions' => [
                [
                    'label' => 'Interroger.',
                    'name' => 'gaspard',
                    'value' => 'interroger',
                    'class' => 'ask',
                ],
            ],],
        'teona' => ['audio' => null, 'blocks' => [$dialogue("Elle est plutôt gentille, mais nous n'avons presque jamais discuté, vous savez.")],
            'actions' => [
                [
                    'label' => 'Interroger.',
                    'name' => 'gaspard',
                    'value' => 'interroger',
                    'class' => 'ask',
                ],
            ],],
        'monica' => ['audio' => null, 'blocks' => [$dialogue("Ah, celle-là...<br>Bon elle est pas méchante, hein, mais si vous ne voulez pas vous retrouver enfermé dans des discussions sans fin, ne la lancez jamais sur un sujet !")],
            'actions' => [
                [
                    'label' => 'Interroger.',
                    'name' => 'gaspard',
                    'value' => 'interroger',
                    'class' => 'ask',
                ],
            ],],
        'mmenouveau' => ['audio' => null, 'blocks' => [$dialogue("Ça doit être celle que je croise le plus, mais c'est une femme très austère, ne vous attendez pas à passer de longs moments à bavarder avec.")],
            'actions' => [
                [
                    'label' => 'Interroger.',
                    'name' => 'gaspard',
                    'value' => 'interroger',
                    'class' => 'ask',
                ],
            ],],
        'unknown' => ['audio' => null, 'blocks' => [$dialogue("Je ne vois pas ce que je peux vous dire à ce propos.")],
            'actions' => [
                [
                    'label' => 'Interroger.',
                    'name' => 'gaspard',
                    'value' => 'interroger',
                    'class' => 'ask',
                ],
            ],],
    ],
];
