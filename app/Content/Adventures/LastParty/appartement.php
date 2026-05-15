<?php

use App\Services\Adventures\Support\Content;

$roomImage = static fn(array $hotspots): array => Content::interactiveImage(
    'assets/img/lastparty/appartement.png',
    'appartement',
    $hotspots
);

$computerHotspots = [
    Content::hotspot('ordi', 'open_computer'),
    Content::hotspot(
        'tiroir',
        'open_drawer',
        null,
        '',
        ['visible_if' => Content::stateFalsy('carnet_acquired')]
    ),
];

return [
    'variants' => [
        'computer' => [
            'audio' => null,
            'blocks' => [
                $roomImage($computerHotspots),
                Content::narrative('lastparty/appartement#computer'),
            ],
            'hint' => Content::hint('lastparty/hints#appartement_computer'),
            'actions' => [],
        ],
        'drawer' => [
            'audio' => null,
            'blocks' => [
                $roomImage($computerHotspots),
                Content::narrative('lastparty/appartement#drawer'),
            ],
            'hint' => Content::hint('lastparty/hints#appartement_drawer'),
            'actions' => [],
        ],
        'photos' => [
            'audio' => null,
            'blocks' => [
                $roomImage([
                    Content::hotspot('appareil', 'open_camera'),
                ]),
                Content::narrative('lastparty/appartement#photos'),
            ],
            'actions' => [],
        ],
    ],
];
