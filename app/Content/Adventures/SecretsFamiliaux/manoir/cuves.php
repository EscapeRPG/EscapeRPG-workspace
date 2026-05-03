<?php

return [
    'variants' => [
        'step_0' => [
            'audio' => 'assets/sounds/secrets/electriciteretablie.mp3',
            'blocks' => [['type' => 'paragraphs', 'paragraphs' => [
                "Les lumières se rallument, vous permettant de souffler un peu. Avec vos réparations, le système électrique devrait pouvoir tenir un peu mieux le choc.",
                "Voulez-vous toujours essayer d'activer l'une des cuves ?",
            ]]],
            'actions' => [
                ['label' => 'Tirer sur le levier.', 'name' => 'action', 'value' => 'pull_lever', 'class' => 'action'],
                ['label' => 'Ne pas y toucher.', 'name' => 'action', 'value' => 'retour', 'class' => 'action'],
            ],
        ],
        'step_1' => [
            'audio' => 'assets/sounds/secrets/arcelectrique.mp3',
            'blocks' => [['type' => 'paragraphs', 'paragraphs' => [
                "Une nouvelle fois, un arc électrique se forme au sommet de la cuve, mais cette fois-ci le tout reste stable.",
                "Vous voyez alors avec horreur l'immonde masse au fond de la cuve commencer à s'agiter.",
                "À sa surface, ce qui ressemble à des tentacules ou des bras primaires se forment et se tendent en direction de la source d'énergie. Attendez-vous que ces appendices atteignent la source d'énergie ou préférez-vous arrêter l'expérience ?",
            ]]],
            'actions' => [
                ['label' => 'Repousser le levier.', 'name' => 'action', 'value' => 'stop', 'class' => 'action'],
                ['label' => 'Laisser et observer.', 'name' => 'action', 'value' => 'observe', 'class' => 'action'],
            ],
        ],
        'step_2' => [
            'audio' => 'assets/sounds/secrets/arcelectrique.mp3',
            'blocks' => [['type' => 'paragraphs', 'paragraphs' => [
                "Comme hypnotisé par ce qu'il se passe, vous ne pouvez vous empêcher de vouloir voir ce qu'il va arriver lorsque la chose aura atteint le haut de la cuve.",
                "S'étirant au maximum, la masse protoplasmique finit par y parvenir. Lorsqu'elle entre en contact avec l'électricité, un spasme l'agit violemment et vous voyez de petits éclairs parcourir la chose.",
                "Le spectacle est répugnant, chaque impulsion électrique vous permettant de voir l'intérieur de l'immondice par transparence. Si on vous le demandait, vous seriez bien incapable de décrire ce que vous avez sous les yeux, tant les mots seraient faibles pour expliquer l'indicible.",
                "Soudain, la masse s'agite, comme mue par une force soudaine, et se rétracte sur elle-même pour devenir plus compacte. Elle se redresse légèrement et envoie soudain une partie d'elle-même contre la paroi de la cuve, qui commence à se craqueler.",
                "Saisi d'horreur, vous repoussez aussitôt le levier en espérant que la chose se calme et ne casse pas la vitre.",
                "Peu à peu, la masse protoplasmique semble se calmer et retourner à son stade informe dans lequel vous l'avez découverte. Il semblerait donc que ces choses trouvent de l'énergie par le biais de l'électricité.",
                "Contrairement aux autres “échantillons” inertes des cuves voisines, elle continue de se mouvoir lentement alors que la cuve est inactive.",
                "Ce spectacle répugnant vous pousse un peu plus vers la folie, mais vous devez continuer votre enquête !",
            ]]],
            'actions' => [['label' => 'Retour.', 'name' => 'action', 'value' => 'retour', 'class' => 'action']],
        ],
        'step_3' => [
            'audio' => null,
            'blocks' => [['type' => 'paragraphs', 'paragraphs' => [
                "Vous repoussez finalement le levier, coupant instantanément l'arc électrique.",
                "Peu à peu, la masse protoplasmique semble se calmer et retourner à son stade informe dans lequel vous l'avez découverte.",
                "Cependant, contrairement aux autres “échantillons” inertes des cuves voisines, elle continue de se mouvoir lentement alors que la cuve est inactive.",
                "Ce spectacle répugnant vous pousse un peu plus vers la folie, mais vous devez continuer votre enquête !",
            ]]],
            'actions' => [['label' => 'Retour.', 'name' => 'action', 'value' => 'retour', 'class' => 'action']],
        ],
    ],
];
