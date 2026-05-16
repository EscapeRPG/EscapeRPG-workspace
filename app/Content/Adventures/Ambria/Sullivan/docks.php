<?php

use App\Services\Adventures\Support\Content;

$m1 = 'assets/img/ambria/marin1.png';
$m2 = 'assets/img/ambria/marin2.png';
$m3 = 'assets/img/ambria/marin3.png';
$m4 = 'assets/img/ambria/marin4.png';

$rumors = [
    Content::narrative('ambria/sullivan/docks#entry'),
    Content::dialogue('Marin', $m1, 'ambria/sullivan/docks#rumor_1'),
    Content::dialogue('Marin', $m2, 'ambria/sullivan/docks#rumor_2', 'right'),
    Content::dialogue('Marin', $m3, 'ambria/sullivan/docks#rumor_3'),
    Content::dialogue('Marin', $m4, 'ambria/sullivan/docks#rumor_4', 'right'),
];

return [
    'variants' => [
        'entry' => [
            'audio' => 'assets/sounds/ambria/docks.mp3',
            'blocks' => array_merge($rumors, [Content::narrative('ambria/sullivan/docks#need_more')]),
        ],
        'rumors_with_paul' => [
            'audio' => 'assets/sounds/ambria/docks.mp3',
            'blocks' => array_merge($rumors, [Content::narrative('ambria/sullivan/docks#with_paul')]),
            'actions' => [
                [
                    'label' => '',
                    'value' => '',
                    'controls' => [
                        ['element' => 'input', 'type' => 'text', 'name' => 'qui', 'attributes' => ['placeholder' => 'Qui possède la carte ?']],
                        ['element' => 'input', 'type' => 'text', 'name' => 'ou', 'attributes' => ['placeholder' => 'Où se trouve cette personne ?']],
                        ['element' => 'button', 'type' => 'submit', 'class' => 'action', 'name' => 'action', 'value' => 'validate_rumors', 'label' => 'Valider.'],
                    ],
                ],
            ],
            'hint' => Content::hint('ambria/sullivan/hints#rumors'),
        ],
        'rumors_failure' => [
            'blocks' => [Content::narrative('ambria/sullivan/docks#failure')],
            'actions' => [Content::action('Retour.', 'retry_rumors')],
        ],
        'rumors_success' => [
            'blocks' => [Content::narrative('ambria/sullivan/docks#success')],
            'actions' => [Content::action("S'y rendre.", 'enter_library')],
        ],
    ],
];
