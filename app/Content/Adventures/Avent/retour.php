<?php

use App\Services\Adventures\Support\Content;

return [
    'variants' => [
        'gift_opened' => [
            'audio' => 'assets/sounds/avent/cadeau.mp3',
            'blocks' => [
                Content::narrative('avent/retour#gift_opened'),
                Content::image('assets/img/avent/lettreperenoel.png', 'une lettre laissée par le Père Noël', 'enigmelieu'),
                Content::dialogue('Arthur', 'assets/img/avent/arthur.png', 'avent/retour#arthur_present'),
                Content::narrative('avent/retour#ask_santa'),
            ],
            'actions' => [Content::action('DEMANDER.', 'ask_santa')],
        ],
        'santa' => [
            'blocks' => [
                Content::dialogue('Arthur', 'assets/img/avent/arthur.png', 'avent/retour#santa_dialogue'),
                Content::narrative('avent/retour#santa_walk'),
                Content::dialogue('Arthur', 'assets/img/avent/arthur.png', 'avent/retour#elves_dialogue'),
                Content::narrative('avent/retour#machine_room'),
                Content::dialogue('Arthur', 'assets/img/avent/arthur.png', 'avent/retour#machine_intro'),
                Content::narrative('avent/retour#machine_button'),
                Content::dialogue('Arthur', 'assets/img/avent/arthur.png', 'avent/retour#machine_button_dialogue'),
                Content::narrative('avent/retour#machine_failure'),
            ],
            'actions' => [Content::action('SUIVANT.', 'continue_1')],
        ],
        'fuel_missing' => [
            'audio' => 'assets/sounds/avent/fouille.mp3',
            'blocks' => [
                Content::dialogue('Arthur', 'assets/img/avent/arthur.png', 'avent/retour#fuel_missing_dialogue'),
                Content::narrative('avent/retour#fuel_search'),
                Content::dialogue('Arthur', 'assets/img/avent/arthur.png', 'avent/retour#recipe_found_dialogue'),
                Content::narrative('avent/retour#recipe_found'),
            ],
            'actions' => [Content::action('SUIVANT.', 'continue_2')],
        ],
        'recipe' => [
            'blocks' => [
                Content::narrative('avent/retour#recipe'),
                Content::image('assets/img/avent/etagerecarburant.png', 'une étagère pleine de produits fabuleux', 'enigmelieu'),
                Content::narrative('avent/retour#recipe_prompt'),
            ],
            'actions' => [Content::ask('PRENDRE.', 'recipe', 'submit_recipe')],
            'hint' => Content::hint('avent/hints#recipe'),
        ],
        'recipe_wrong' => [
            'blocks' => [
                Content::narrative('avent/retour#recipe_wrong'),
                Content::image('assets/img/avent/etagerecarburant.png', 'une étagère pleine de produits fabuleux', 'enigmelieu'),
                Content::narrative('avent/retour#recipe_wrong_prompt'),
            ],
            'actions' => [Content::ask('PRENDRE.', 'recipe', 'submit_recipe')],
            'hint' => Content::hint('avent/hints#recipe'),
        ],
        'fuel_ready' => [
            'audio' => 'assets/sounds/avent/essence.mp3',
            'blocks' => [
                Content::narrative('avent/retour#fuel_ready'),
                Content::dialogue('Arthur', 'assets/img/avent/arthur.png', 'avent/retour#ready'),
            ],
            'actions' => [Content::action('OUI.', 'go_home')],
        ],
    ],
];
