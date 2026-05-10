<?php

$manorScenes = [
    'rdc', 'salon', 'aile', 'etage', 'chambre', 'bureau', 'bureauprive',
    'bureauprive2', 'coffret', 'courtcircuit', 'cuves',
    'bibliotheque', 'chambres', 'grenier', 'cave', 'jardin',
    'maisongaspard', 'chenil', 'serre',
];

$pellingtonScenes = [
    'pellingtonrdc', 'pellingtonvestibule', 'pellingtonsalon', 'pellingtonpremier',
    'pellingtonchambre', 'salledebain', 'pellingtondeuxieme', 'pellingtongrenier',
    'pellingtoncave',
];

return [
    'portrait' => [
        'image' => 'assets/img/secrets/inspecteurdeckard.png',
        'alt' => 'Bastian Deckard',
        'title' => 'Inspecteur Deckard',
    ],
    'navigation' => [
        [
            'visible_on' => $manorScenes,
            'class' => 'secrets-navigation',
            'border_top' => 'assets/img/secrets/bordtop.png',
            'border_bottom' => 'assets/img/secrets/bordbottom.png',
            'title' => 'Manoir Deckard',
            'items' => [
                [
                    'label' => 'Rez-de-chaussée',
                    'route' => 'manoir/rdc',
                    'children' => [
                        ['label' => 'Salon', 'route' => 'manoir/salon'],
                        ['label' => 'Aile des domestiques', 'route' => 'manoir/aile'],
                    ],
                ],
                [
                    'label' => 'Étage',
                    'route' => 'manoir/etage',
                    'children' => [
                        ['label' => 'Chambre de William', 'route' => 'manoir/chambre'],
                        [
                            'label' => 'Bureau',
                            'route' => 'manoir/bureau',
                            'route_options' => [
                                ['if' => ['state' => 'bureau_private_unlocked', 'truthy' => true], 'route' => 'manoir/bureauprive'],
                            ],
                        ],
                        ['label' => 'Bibliothèque', 'route' => 'manoir/bibliotheque'],
                        ['label' => 'Chambres', 'route' => 'manoir/chambres'],
                    ],
                ],
                ['label' => 'Grenier', 'route' => 'manoir/grenier'],
                ['label' => 'Cave', 'route' => 'manoir/cave'],
                [
                    'label' => 'Jardin',
                    'route' => 'manoir/jardin',
                    'children' => [
                        ['label' => 'Maison de Gaspard', 'route' => 'manoir/maisongaspard'],
                        ['label' => 'Chenil', 'route' => 'manoir/chenil'],
                        ['label' => 'Serre', 'route' => 'manoir/serre'],
                    ],
                ],
            ],
        ],
        [
            'visible_on' => $pellingtonScenes,
            'class' => 'secrets-navigation',
            'border_top' => 'assets/img/secrets/bordtop.png',
            'border_bottom' => 'assets/img/secrets/bordbottom.png',
            'title' => 'Maison de Pellington',
            'items' => [
                [
                    'label' => 'Rez-de-chaussée',
                    'route' => '107parkavenue/rdc',
                    'children' => [
                        ['label' => 'Vestibule', 'route' => '107parkavenue/vestibule'],
                        ['label' => 'Salon', 'route' => '107parkavenue/salon'],
                    ],
                ],
                [
                    'label' => 'Premier étage',
                    'route' => '107parkavenue/premieretage',
                    'children' => [
                        ['label' => 'Chambre du docteur', 'route' => '107parkavenue/chambre'],
                        ['label' => 'Salle de bain', 'route' => '107parkavenue/salledebain'],
                    ],
                ],
                ['label' => 'Deuxième étage', 'route' => '107parkavenue/deuxiemeetage'],
                ['label' => 'Grenier', 'route' => '107parkavenue/grenier'],
                ['label' => 'Cave', 'route' => '107parkavenue/cave'],
            ],
        ],
    ],
    'forms' => [
        [
            'visible_on' => $manorScenes,
            'visible_if' => ['state' => 'pellington_visit', 'falsy' => true],
            'label' => 'ALLER DORMIR',
            'route' => 'manoir/jour2',
            'route_options' => [
                ['if' => ['state' => 'manor_day', 'truthy' => true], 'route' => 'manoir/nuit'],
            ],
            'value' => 'entrer',
            'value_options' => [
                ['if' => ['state' => 'manor_day', 'truthy' => true], 'value' => 'nuit'],
            ],
        ],
        [
            'visible_on' => $pellingtonScenes,
            'visible_if' => ['state' => 'pellington_visit', 'truthy' => true],
            'label' => 'RENTRER',
            'route' => 'manoir/rdc',
            'value' => 'entrer',
        ],
    ],
];
