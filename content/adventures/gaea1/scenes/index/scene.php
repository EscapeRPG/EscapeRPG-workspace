<?php

use App\Services\Adventures\Support\Content;

return [
    'label' => 'Accueil',
    'handler' => \App\Services\Adventures\Scenarios\Gaea1\Scenes\IndexSceneHandler::class,
    'flow' => [
        'default' => 'landing',
        'actions' => [
            'start_intro' => [
                'next_scene' => 'andromede',
                'variant' => 'intro_animation',
            ],
        ],
    ],
    'variants' => [
        'landing' => [
            'blocks' => [
                Content::dialogue('Narrateur', 'assets/img/narrateur.png', 'gaea1/scenes/index/text#access'),
            ],
            'actions' => [
                Content::ask('VALIDER.', 'betamdp', 'access_code'),
            ],
        ],
        'access_denied' => [
            'blocks' => [
                Content::paragraph('Le mot de passe est incorrect.'),
            ],
            'actions' => [
                Content::ask('VALIDER.', 'betamdp', 'access_code'),
            ],
        ],
        'access_granted' => [
            'blocks' => [
                Content::dialogue('Narrateur', 'assets/img/narrateur.png', 'gaea1/scenes/index/text#access_granted'),
            ],
            'actions' => [
                Content::action('NOUVELLE PARTIE.', 'new_game'),
                Content::action('CHARGER UNE PARTIE.', 'load_game'),
            ],
        ],
        'avatar' => [
            'blocks' => [
                Content::dialogue('M.A.R-V', 'assets/img/gaea1/marv.png', 'gaea1/scenes/index/text#avatar_intro_marv'),
                Content::partial('adventures/gaea1/avatar'),
            ],
            'scripts' => ['assets/js/adventures/gaea1/avatar.js'],
        ],
        'identity' => [
            'blocks' => [
                Content::dialogue('M.A.R-V', 'assets/img/gaea1/marv.png', 'gaea1/scenes/index/text#identity_marv'),
                Content::partial('adventures/gaea1/identity_form'),
            ],
        ],
        'gender' => [
            'blocks' => [
                Content::dialogue('M.A.R-V', 'assets/img/gaea1/marv.png', 'gaea1/scenes/index/text#gender_prompt_marv'),
            ],
            'actions' => [
                Content::action('au féminin.', 'choose_feminine'),
                Content::action('au masculin.', 'choose_masculine'),
            ],
        ],
        'ready' => [
            'blocks' => [
                Content::dialogue('M.A.R-V', 'assets/img/gaea1/marv.png', 'gaea1/scenes/index/text#ready_marv'),
            ],
            'actions' => [
                Content::action('suivant.', 'start_intro'),
            ],
        ],
    ],
];
