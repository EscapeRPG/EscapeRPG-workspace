<?php

use App\Services\Adventures\Support\Content;

return [
    'variants' => [
        'intro' => [
            'audio' => null,
            'blocks' => [
                Content::narrative('lastparty/appareilphoto#intro'),
            ],
            'actions' => [
                Content::action('Suivant.', 'inspect_gallery'),
            ],
        ],
        'photo_clue' => [
            'audio' => null,
            'blocks' => [
                Content::narrative('lastparty/appareilphoto#photo_clue'),
            ],
            'hint' => Content::hint('lastparty/hints#appareilphoto_couloir', 3, [
                'Rendez-vous sur <a href="' . url('/aventures/lastparty/couloir') . '">le lien du couloir</a>.',
            ]),
            'actions' => [],
        ],
    ],
];
