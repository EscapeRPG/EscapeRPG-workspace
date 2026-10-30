<?php

use App\Services\Adventures\Support\Content;

return [
    'label' => 'Plan de la station',
    'map' => ['destination_config' => 'station_rooms', 'action' => 'enter_station_room'],
    'handler' => \App\Services\Adventures\Scenarios\Gaea1\Scenes\StationPlanSceneHandler::class,
    'flow' => [
        'default' => 'default',
        'actions' => [
            'enter_station_room' => [],
        ],
    ],
    'variants' => [
        'default' => [
            'scripts' => ['assets/js/adventures/gaea1/plan.js'],
            'blocks' => [
                Content::partial('adventures/gaea1/plan'),
                Content::narrative('gaea1/scenes/plan/text#intro') + [
                    'visible_if' => Content::stateTruthy('premiereobservation'),
                ],
                Content::narrative('gaea1/scenes/plan/text#instructions'),
            ],
        ],
    ],
];
