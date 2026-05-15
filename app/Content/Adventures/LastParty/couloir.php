<?php

use App\Services\Adventures\Support\Content;

return [
    'variants' => [
        'card' => [
            'audio' => null,
            'blocks' => [
                Content::linkedImage('assets/img/lastparty/cartedevisite.png', 'carte de visite'),
                Content::narrative('lastparty/couloir#card'),
            ],
            'actions' => [
                Content::action('Prendre.', 'take_card'),
            ],
        ],
        'contact' => [
            'audio' => null,
            'blocks' => [
                Content::narrative('lastparty/couloir#contact'),
            ],
            'hint' => Content::hint('lastparty/hints#couloir_contact'),
            'actions' => [],
        ],
    ],
];
