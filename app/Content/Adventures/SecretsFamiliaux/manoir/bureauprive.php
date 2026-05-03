<?php

$bureauImage = static fn(array $controls = [], string $src = 'assets/img/secrets/bureausecret1.png'): array => [
    'type' => 'interactive_image',
    'src' => $src,
    'alt' => 'bureau privé',
    'class' => 'enigmelieu',
    'controls' => $controls,
];

$tiroirControl = [
    'id' => 'tiroir',
    'src' => 'assets/img/secrets/buttontiroir.png',
    'alt' => 'tiroir du bureau',
    'value' => 'tiroir',
];

$libraryAction = [
    'label' => 'Fouiller la bibliothèque.',
    'name' => 'fouiller',
    'value' => 'search_library',
    'class' => 'ask',
    'visible_if' => ['state' => 'chiens_sauves_fin', 'truthy' => true],
];

$goBack = ['label' => "Passer de l'autre côté.", 'name' => 'action', 'value' => 'go_back', 'class' => 'action'];

return [
    'variants' => [
        'step_0' => [
            'audio' => null,
            'blocks' => [
                $bureauImage([$tiroirControl]),
                ['type' => 'paragraphs', 'paragraphs' => [
                    "Vous entrez enfin dans le bureau privé de votre oncle alors que la nuit commence à tomber. Une grande bibliothèque traverse la pièce, la séparant en deux.",
                    "Au fond, derrière la bibliothèque, se trouve une petite ouverture pour accéder à la seconde partie. La petite fenêtre au fond éclaire à peine l'ensemble.",
                    "De ce côté, vous pouvez trouver un tas de livres obscurs traitant de sujets qui vous terrifient et que vous n'osez pas parcourir plus longtemps. Un petit bureau se trouve sur la droite, contre le mur. Un tas de papiers et d'ustensiles divers jonchent le sol.",
                    "Manifestement, le docteur Pellington a retourné la salle pour trouver les preuves qu'il désirait détruire, mais peut-être reste-t-il quelque chose ici ou là ?",
                ]],
                ['type' => 'paragraphs', 'paragraphs' => [
                    "En approchant de la bibliothèque, vous sentez le talisman offert par Gaspard vibrer. Vous devriez l'observer de plus près.",
                ], 'visible_if' => ['state' => 'chiens_sauves_fin', 'truthy' => true]],
            ],
            'actions' => [$libraryAction, $goBack],
        ],
        'step_1' => [
            'audio' => null,
            'blocks' => [
                $bureauImage([$tiroirControl]),
                ['type' => 'paragraphs', 'paragraphs' => [
                    "Le tiroir est fermé à clé, mais vous avez avec vous la petite clé trouvée dans le coffret.",
                ]],
            ],
            'actions' => [
                ['label' => 'Utiliser la clé.', 'name' => 'petitecle', 'value' => 'unlock_tiroir', 'class' => 'ask'],
                $goBack,
            ],
        ],
        'step_2' => [
            'audio' => null,
            'blocks' => [
                $bureauImage([$tiroirControl]),
                ['type' => 'paragraphs', 'paragraphs' => [
                    "Cela ne semble pas fonctionner. Êtes-vous sûr d'avoir fait comme il fallait ?",
                ]],
            ],
            'actions' => [
                ['label' => 'Utiliser la clé.', 'name' => 'petitecle', 'value' => 'unlock_tiroir', 'class' => 'ask'],
                $goBack,
            ],
        ],
        'step_3' => [
            'audio' => 'assets/sounds/secrets/tiroir.mp3',
            'blocks' => [
                $bureauImage([], 'assets/img/secrets/bureausecret1tiroiropened.png'),
                ['type' => 'paragraphs', 'paragraphs' => [
                    "Vous débloquez le tiroir et l'ouvrez.",
                ]],
                ['type' => 'linked_image', 'src' => 'assets/img/secrets/journal1.png', 'alt' => "la première page du journal de l'oncle William", 'class' => 'enigme'],
                ['type' => 'linked_image', 'src' => 'assets/img/secrets/journal3.png', 'alt' => "la troisième page du journal de l'oncle William", 'class' => 'enigme'],
                ['type' => 'linked_image', 'src' => 'assets/img/secrets/journal4.png', 'alt' => "la quatrième page du journal de l'oncle William", 'class' => 'enigme'],
                ['type' => 'paragraphs', 'paragraphs' => [
                    "Vous trouvez une liasse de papiers jaunis sur lesquels s'étale une fine écriture que vous reconnaissez immédiatement comme étant celle de votre oncle.",
                    "Vous les prenez délicatement, sans toutefois pouvoir vous empêcher de trembler à l'idée de ce que vous pourriez y découvrir.",
                ]],
            ],
            'actions' => [['label' => "Ajouter à l'inventaire.", 'name' => 'action', 'value' => 'take_journal', 'class' => 'action']],
        ],
        'step_4' => [
            'audio' => null,
            'blocks' => [
                $bureauImage([$tiroirControl]),
                ['type' => 'paragraphs', 'paragraphs' => [
                    "Vous ne trouvez pas ce que vous cherchez.",
                ]],
            ],
            'actions' => [$libraryAction, $goBack],
        ],
        'step_5' => [
            'audio' => null,
            'blocks' => [
                ['type' => 'linked_image', 'src' => 'assets/img/secrets/pnakotiques.png', 'alt' => 'une page des manuscrits pnakotiques', 'class' => 'enigme'],
                ['type' => 'linked_image', 'src' => 'assets/img/secrets/pnakotiquesnotes.png', 'alt' => 'une page de notes sur les manuscrits pnakotiques', 'class' => 'enigme'],
                ['type' => 'paragraphs', 'paragraphs' => [
                    "En fouillant parmi les livres de la bibliothèque privée, vous tombez sur un livre très ancien dont la couverture est en partie arrachée. Les pages jaunies semblent sur le point de partir en poussière et vous manipulez le tout avec précaution.",
                    "Le livre se nomme Manuscrits Pnakotiques et décrit tout un tas de rituels magiques divers. L'une des pages représente un motif très similaire à celui présent sur le talisman de Gaspard.",
                    "La page évoque comment réaliser des cercles magiques pour avoir des visions de dimensions inconnues et créer un portail y menant, mais la deuxième page est très abîmée. Peut-être pourriez-vous trouver comment créer le second cercle malgré tout ?",
                    "Une feuille volante, beaucoup plus récente que le livre, était glissée entre ces pages. Vous gardez ces éléments de côté.",
                ]],
            ],
            'actions' => [['label' => "Ajouter à l'inventaire.", 'name' => 'action', 'value' => 'take_pnakotiques', 'class' => 'action']],
        ],
        'tiroir_opened' => [
            'audio' => null,
            'blocks' => [
                $bureauImage([], 'assets/img/secrets/bureausecret1tiroiropened.png'),
                ['type' => 'paragraphs', 'paragraphs' => [
                    "Votre médaillon vibre toujours lorsque vous êtes proche de la bibliothèque.",
                ]],
            ],
            'actions' => [$libraryAction, $goBack],
        ],
        'pnakotiques_found' => [
            'audio' => null,
            'blocks' => [
                $bureauImage([$tiroirControl]),
                ['type' => 'paragraphs', 'paragraphs' => [
                    "Au fond, derrière la bibliothèque, se trouve une petite ouverture pour accéder à la seconde partie. La petite fenêtre au fond éclaire à peine l'ensemble.",
                    "De ce côté, vous pouvez trouver un tas de livres obscurs traitant de sujets qui vous terrifient et que vous n'osez pas parcourir plus longtemps. Un petit bureau se trouve sur la droite, contre le mur. Un tas de papiers et d'ustensiles divers jonchent le sol.",
                    "Manifestement, le docteur Pellington a retourné la salle pour trouver les preuves qu'il désirait détruire, mais peut-être reste-t-il quelque chose ici ou là ?",
                ]],
            ],
            'actions' => [$goBack],
        ],
        'done' => [
            'audio' => null,
            'blocks' => [
                $bureauImage([], 'assets/img/secrets/bureausecret1tiroiropened.png'),
                ['type' => 'paragraphs', 'paragraphs' => [
                "Il semble que vous avez trouvé tout ce qu'il restait de ce côté.",
            ]]],
            'actions' => [$goBack],
        ],
    ],
];
