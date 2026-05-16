<?php

return [
    'portrait' => [
        'image' => 'assets/img/ambria/ambriamedaillon.png',
        'alt' => "Le Trésor d'Ambria",
        'title' => "Le Trésor d'Ambria",
    ],
    'navigation' => [
        [
            'visible_on' => [
                'sullivan_tortuga',
                'sullivan_marche',
                'sullivan_bordel',
                'sullivan_taverne',
                'sullivan_docks',
            ],
            'visible_if' => ['state' => 'tortuga', 'truthy' => true],
            'class' => 'ambria-nav',
            'title' => 'Navigation',
            'items' => [
                ['label' => 'Bordel', 'route' => 'sullivan/bordel'],
                ['label' => 'Docks', 'route' => 'sullivan/docks'],
                ['label' => 'Marché', 'route' => 'sullivan/marche'],
                ['label' => 'Taverne', 'route' => 'sullivan/taverne'],
            ],
        ],
        [
            'visible_on' => [
                'logan_flots',
                'logan_pontprincipal',
                'logan_dunette',
                'logan_pontinferieur',
                'logan_mess',
                'logan_quartierdesequipages',
                'logan_cale',
                'logan_cabine',
            ],
            'visible_if' => ['state' => 'ambriasurlesflots', 'truthy' => true],
            'class' => 'ambria-nav',
            'title' => 'Navigation',
            'items' => [
                [
                    'label' => 'Pont principal',
                    'route' => 'logan/pontprincipal',
                    'children' => [
                        ['label' => '- Cabine du capitaine', 'route' => 'logan/cabine'],
                        ['label' => '- Dunette', 'route' => 'logan/dunette'],
                    ],
                ],
                [
                    'label' => 'Pont inférieur',
                    'route' => 'logan/pontinferieur',
                    'children' => [
                        ['label' => '- Mess', 'route' => 'logan/mess'],
                        ['label' => '- Quartier des équipages', 'route' => 'logan/quartierdesequipages'],
                    ],
                ],
                ['label' => 'Cale', 'route' => 'logan/cale'],
            ],
        ],
        [
            'visible_on' => [
                'sullivan_flots',
                'sullivan_pontprincipal',
                'sullivan_dunette',
                'sullivan_pontinferieur',
                'sullivan_mess',
                'sullivan_quartierdesequipages',
                'sullivan_cale',
                'sullivan_cabine',
            ],
            'visible_if' => ['state' => 'ambriasurlesflots', 'truthy' => true],
            'class' => 'ambria-nav',
            'title' => 'Navigation',
            'items' => [
                [
                    'label' => 'Pont principal',
                    'route' => 'sullivan/pontprincipal',
                    'children' => [
                        ['label' => '- Cabine du capitaine', 'route' => 'sullivan/cabine'],
                        ['label' => '- Dunette', 'route' => 'sullivan/dunette'],
                    ],
                ],
                [
                    'label' => 'Pont inférieur',
                    'route' => 'sullivan/pontinferieur',
                    'children' => [
                        ['label' => '- Mess', 'route' => 'sullivan/mess'],
                        ['label' => '- Quartier des équipages', 'route' => 'sullivan/quartierdesequipages'],
                    ],
                ],
                ['label' => 'Cale', 'route' => 'sullivan/cale'],
            ],
        ],
        [
            'visible_on' => [
                'logan_plage',
                'logan_grottestorchesallumees',
                'logan_grottestorcheseteintes',
                'logan_portescite',
                'logan_cite',
            ],
            'visible_if' => ['state' => 'ile', 'truthy' => true],
            'class' => 'ambria-nav',
            'title' => 'Navigation',
            'items' => [
                ['label' => 'Plage', 'route' => 'logan/ile/plage'],
                [
                    'label' => 'Grottes',
                    'route' => 'logan/ile/grottestorchesallumees',
                    'visible_if' => [
                        'all' => [
                            ['state' => 'grottes', 'truthy' => true],
                            ['state' => 'torcheseteintes', 'falsy' => true],
                        ],
                    ],
                ],
                [
                    'label' => 'Grottes',
                    'route' => 'logan/ile/grottestorcheseteintes',
                    'visible_if' => [
                        'all' => [
                            ['state' => 'grottes', 'truthy' => true],
                            ['state' => 'torcheseteintes', 'truthy' => true],
                        ],
                    ],
                ],
                ['label' => 'Portes de la Cité', 'route' => 'logan/ile/portescite', 'visible_if' => ['state' => 'portescite', 'truthy' => true]],
            ],
        ],
        [
            'visible_on' => [
                'sullivan_plage',
                'sullivan_grottestorchesallumees',
                'sullivan_grottestorcheseteintes',
                'sullivan_portescite',
            ],
            'visible_if' => ['state' => 'ile', 'truthy' => true],
            'class' => 'ambria-nav',
            'title' => 'Navigation',
            'items' => [
                ['label' => 'Plage', 'route' => 'sullivan/ile/plage'],
                [
                    'label' => 'Grottes',
                    'route' => 'sullivan/ile/grottestorchesallumees',
                    'visible_if' => [
                        'all' => [
                            ['state' => 'grottes', 'truthy' => true],
                            ['state' => 'torcheseteintes', 'falsy' => true],
                        ],
                    ],
                ],
                [
                    'label' => 'Grottes',
                    'route' => 'sullivan/ile/grottestorcheseteintes',
                    'visible_if' => [
                        'all' => [
                            ['state' => 'grottes', 'truthy' => true],
                            ['state' => 'torcheseteintes', 'truthy' => true],
                        ],
                    ],
                ],
                ['label' => 'Portes de la Cité', 'route' => 'sullivan/ile/portescite', 'visible_if' => ['state' => 'portescite', 'truthy' => true]],
            ],
        ],
    ],
];
