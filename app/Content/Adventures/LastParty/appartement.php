<?php

use App\Services\Adventures\Support\Content;

$roomImage = static fn(array $hotspots): array => Content::interactiveImage(
    'assets/img/lastparty/appartement.png',
    'appartement',
    $hotspots
);

$computerHotspots = [
    Content::hotspotAt('open_computer', 5.5, 22, 15, 16),
    Content::hotspotAt(
        'open_drawer',
        43.33,
        45.5,
        10,
        8.5,
        extra: ['visible_if' => Content::stateFalsy('carnet_acquired')]
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
                    Content::hotspotAt('open_camera', 81.83, 20.75, 4.67, 5.75),
                ]),
                Content::narrative('lastparty/appartement#photos'),
            ],
            'actions' => [],
        ],
    ],
];
