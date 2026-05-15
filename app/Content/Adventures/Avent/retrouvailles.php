<?php

use App\Services\Adventures\Support\Content;

return [
    'variants' => [
        'arrival' => [
            'audio' => 'assets/sounds/avent/bipboup.mp3',
            'blocks' => [Content::narrative('avent/retrouvailles#arrival')],
            'actions' => [Content::action('SUIVANT.', 'continue_1')],
        ],
        'arthur_found' => [
            'blocks' => [
                Content::narrative('avent/retrouvailles#arthur_found'),
                Content::dialogue('Arthur', 'assets/img/avent/arthur.png', 'avent/retrouvailles#arthur_question'),
            ],
            'actions' => [Content::action('SUIVANT.', 'continue_2')],
        ],
        'mechanic' => [
            'blocks' => [
                Content::narrative('avent/retrouvailles#mechanic_intro'),
                Content::dialogue('Arthur', 'assets/img/avent/arthur.png', 'avent/retrouvailles#mechanic_proud'),
                Content::narrative('avent/retrouvailles#mechanic_question'),
                Content::dialogue('Arthur', 'assets/img/avent/arthur.png', 'avent/retrouvailles#mechanic_dialogue'),
            ],
            'actions' => [Content::action('LE MÉCANICIEN ?', 'ask_mechanic')],
        ],
        'family_story' => [
            'blocks' => [
                Content::dialogue('Arthur', 'assets/img/avent/arthur.png', 'avent/retrouvailles#family_story_intro'),
                Content::narrative('avent/retrouvailles#family_story_seat'),
                Content::dialogue('Arthur', 'assets/img/avent/arthur.png', 'avent/retrouvailles#family_story_dialogue'),
                Content::narrative('avent/retrouvailles#family_story_reaction'),
            ],
            'actions' => [Content::action('SUIVANT.', 'continue_3')],
        ],
        'problem' => [
            'blocks' => [
                Content::dialogue('Arthur', 'assets/img/avent/arthur.png', 'avent/retrouvailles#problem_dialogue'),
                Content::narrative('avent/retrouvailles#problem_reaction'),
            ],
            'actions' => [Content::action("PROPOSER DE L'AIDER.", 'offer_help')],
        ],
        'translator' => [
            'blocks' => [
                Content::dialogue('Arthur', 'assets/img/avent/arthur.png', 'avent/retrouvailles#translator_dialogue'),
                Content::narrative('avent/retrouvailles#translator_reaction'),
            ],
            'actions' => [Content::action('LUI MONTRER.', 'show_translator')],
        ],
        'book' => [
            'audio' => 'assets/sounds/avent/papier.mp3',
            'blocks' => [
                Content::dialogue('Arthur', 'assets/img/avent/arthur.png', 'avent/retrouvailles#book_dialogue'),
                Content::narrative('avent/retrouvailles#book_reaction'),
            ],
            'actions' => [Content::action('SUIVANT.', 'continue_4')],
        ],
        'translate' => [
            'blocks' => [
                Content::image('assets/img/avent/livre.png', 'un bien étrange livre', 'enigmelieu'),
                Content::narrative('avent/retrouvailles#translate'),
            ],
            'actions' => [Content::ask('TRADUIRE.', 'translation', 'submit_translation')],
            'hint' => Content::hint('avent/hints#translate'),
        ],
        'translate_wrong' => [
            'blocks' => [
                Content::image('assets/img/avent/livre.png', 'un bien étrange livre', 'enigmelieu'),
                Content::narrative('avent/retrouvailles#translate_wrong'),
            ],
            'actions' => [Content::ask('TRADUIRE.', 'translation', 'submit_translation')],
            'hint' => Content::hint('avent/hints#translate'),
        ],
        'translate_success' => [
            'audio' => 'assets/sounds/avent/fouille.mp3',
            'blocks' => [Content::narrative('avent/retrouvailles#translate_success')],
            'actions' => [Content::action('SUIVANT.', 'continue_to_repairs')],
        ],
    ],
];
