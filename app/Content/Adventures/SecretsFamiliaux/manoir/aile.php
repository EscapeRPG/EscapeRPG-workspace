<?php

return [
    'variants' => [
        'default' => [
            'audio' => null,
            'blocks' => [
                [
                    'type' => 'paragraphs',
                    'paragraphs' => [
                        "C'est ici que dorment les domestiques.<br>
                        Lorsque vous leur demandez pourquoi ils ne rentrent pas chez eux, ils vous disent qu'ils préfèrent rester pour le moment afin de vous aider dans vos tâches.",
                        "Vous sentez qu'ils ne vous disent pas tout.",
                    ],
                ],
            ],
            'actions' => [
                [
                    'label' => 'Interroger.',
                    'name' => 'domestiques',
                    'value' => 'interroger',
                    'class' => 'ask',
                ],
            ],
        ],
        'pellington' => [
            'audio' => null,
            'blocks' => [
                [
                    'type' => 'dialogue',
                    'speaker' => [
                        'name' => 'Domestiques',
                        'portrait' => 'assets/img/secrets/domestiques.png',
                    ],
                    'paragraphs' => [
                        "Oh, je ne le connais pas vraiment, cela ne fait... ne <i>faisait</i> qu'environ 3 ans que nous étions au service de monsieur Deckard.<br>
                        Je crois d'ailleurs qu'aucun des <span class=\"mdp\">domestiques</span> ne travaille ici depuis beaucoup plus.",
                    ],
                ],
            ],
            'actions' => [
                [
                    'label' => 'Interroger.',
                    'name' => 'domestiques',
                    'value' => 'interroger',
                    'class' => 'ask',
                ],
            ],
        ],
        'domestiques' => [
            'audio' => null,
            'blocks' => [
                [
                    'type' => 'dialogue',
                    'speaker' => [
                        'name' => 'Domestiques',
                        'portrait' => 'assets/img/secrets/domestiques.png',
                    ],
                    'paragraphs' => [
                        "Nous avons entendu des rumeurs...<br>
                        Il paraît que votre oncle renvoyait régulièrement ses domestiques pour en engager de nouveaux, mais nous ne savons pas pourquoi.",
                        "Je ne suis pas sûre que nous nous soyons proprement présentées, d'ailleurs !
                        Je suis <span class=\"mdp\">Téona</span>, comme je vous l'ai dit lors de la cérémonie.
                        Voici <span class=\"mdp\">Monica</span> et <span class=\"mdp\">Mme Nouveau</span>.",
                    ],
                ],
            ],
            'actions' => [
                [
                    'label' => 'Interroger.',
                    'name' => 'domestiques',
                    'value' => 'interroger',
                    'class' => 'ask',
                ],
            ],
        ],
        'teona' => [
            'audio' => null,
            'blocks' => [
                [
                    'type' => 'dialogue',
                    'speaker' => [
                        'name' => 'Téona',
                        'portrait' => 'assets/img/secrets/teona.png',
                    ],
                    'paragraphs' => [
                        "Votre oncle m'a engagée il y a trois ans.<br>
                        Au début il était très distant, mais quand il a vu que je m'intéressait beaucoup aux livres de la <span class=\"lieu\">bibliothèque</span>, il s'est mis à me parler un peu plus.<br>
                        Si vous avez des questions sur les livres qu'il possède, n'hésitez surtout pas à me demander, je connais la plupart !",
                    ],
                ],
                [
                    'type' => 'paragraphs',
                    'paragraphs' => [
                        "La jeune domestique vous sourit en rougissant légèrement, comme si ce qu'elle venait de vous dire ne convenait pas à une personne de sa condition.",
                    ],
                ],
            ],
            'actions' => [
                [
                    'label' => 'Interroger.',
                    'name' => 'domestiques',
                    'value' => 'interroger',
                    'class' => 'ask',
                ],
            ],
        ],
        'monica' => [
            'audio' => null,
            'blocks' => [
                [
                    'type' => 'dialogue',
                    'speaker' => [
                        'name' => 'Monica',
                        'portrait' => 'assets/img/secrets/monica.png',
                    ],
                    'paragraphs' => [
                        "Oh, monsieur Bastian ! Je suis tellement navrée pour votre oncle !<br>
                        J'étais à son service depuis 5 ans maintenant et je connais la maison comme ma poche !",
                        "Je pourrais vous raconter tout un tas d'histoires sur ce lieu si vous le désirez.
                        Oh, si vous saviez ! Je me souviens d'une fois où votre oncle est rentré en titubant, il devait être fin saoûl ! C'était il y a 3 ou 4 ans je crois, il tenait à peine debout !<br>
                        Oh mais je parle et je parle et je ne m'arrête pas, désolé d'avoir dit du mal de votre oncle.",
                    ],
                ],
                [
                    'type' => 'paragraphs',
                    'paragraphs' => [
                        "Vous n'êtes pas sûr de vouloir poursuivre la conversation. La vieille domestique semble friande de ragots et vous risqueriez de vous retrouver bloqué dans des discussions interminables.
                        Vous préférez changer de sujet.",
                    ],
                ],
            ],
            'actions' => [
                [
                    'label' => 'Interroger.',
                    'name' => 'domestiques',
                    'value' => 'interroger',
                    'class' => 'ask',
                ],
            ],
        ],
        'mmenouveau' => [
            'audio' => null,
            'blocks' => [
                [
                    'type' => 'dialogue',
                    'speaker' => [
                        'name' => 'Mme Nouveau',
                        'portrait' => 'assets/img/secrets/mmenouveau.png',
                    ],
                    'paragraphs' => [
                        "Votre oncle m'a engagée il y a peu pour entretenir le jardin. Et il y avait du travail, je peux vous le dire !",
                    ],
                ],
                [
                    'type' => 'paragraphs',
                    'paragraphs' => [
                        "La femme parle avec un fort accent français et ne semble pas particulièrement ouverte à la discussion. Vous n'insistez pas.",
                    ],
                ],
            ],
            'actions' => [
                [
                    'label' => 'Interroger.',
                    'name' => 'domestiques',
                    'value' => 'interroger',
                    'class' => 'ask',
                ],
            ],
        ],
        'gaspard' => [
            'audio' => null,
            'blocks' => [
                [
                    'type' => 'dialogue',
                    'speaker' => [
                        'name' => 'Téona',
                        'portrait' => 'assets/img/secrets/teona.png',
                    ],
                    'paragraphs' => [
                        "Monsieur Bradley est arrivé en même temps que moi. Votre oncle l'avait engagé lorsqu'il a décidé d'acheter des chiens pour protéger le domaine.<br>
                        C'est un homme bon, je crois, mais il vit principalement dans la petite maison au fond du jardin, nous le voyons assez rarement.",
                    ],
                ],
            ],
            'actions' => [
                [
                    'label' => 'Interroger.',
                    'name' => 'domestiques',
                    'value' => 'interroger',
                    'class' => 'ask',
                ],
            ],
        ],
        'soucis' => [
            'audio' => null,
            'blocks' => [
                [
                    'type' => 'dialogue',
                    'speaker' => [
                        'name' => 'Domestiques',
                        'portrait' => 'assets/img/secrets/domestiques.png',
                    ],
                    'paragraphs' => [
                        "Depuis une semaine environ, des individus semblent rôder autour de la maison, la nuit venue.<br>
                        Nous les avons empêchés d'entrer pour le moment, mais nous craignons qu'ils ne forcent l'entrée si nous laissons la maison sans surveillance.
                        C'est pour cela que nous préférons rester dormir ici plutôt que de rentrer chez nous le soir.
                        J'espère que vous n'y voyez pas d'inconvénient ?",
                    ],
                ],
            ],
            'actions' => [
                [
                    'label' => 'Interroger.',
                    'name' => 'domestiques',
                    'value' => 'interroger',
                    'class' => 'ask',
                ],
            ],
        ],
        'odeur' => [
            'audio' => null,
            'blocks' => [
                [
                    'type' => 'dialogue',
                    'speaker' => [
                        'name' => 'Domestiques',
                        'portrait' => 'assets/img/secrets/domestiques.png',
                    ],
                    'paragraphs' => [
                        "Cette odeur se fait sentir depuis quelques jours. Nous ne savons pas d'où elle provient mais elle est plus forte à la <span class=\"lieu\">cave</span>, semble-t-il.<br>
                        Nous avons pensé à une <span class=\"mdp\">fuite</span> d'eau quelque part derrière un mur qui aurait entraîné de la moisissure. Il faut que Gaspard s'en occupe.",
                    ],
                ],
            ],
            'actions' => [
                [
                    'label' => 'Interroger.',
                    'name' => 'domestiques',
                    'value' => 'interroger',
                    'class' => 'ask',
                ],
            ],
        ],
        'symbole' => [
            'audio' => null,
            'blocks' => [
                [
                    'type' => 'dialogue',
                    'speaker' => [
                        'name' => 'Téona',
                        'portrait' => 'assets/img/secrets/teona.png',
                    ],
                    'paragraphs' => [
                        "Je ne sais pas ce que ça représente.<br>
                        Votre oncle s'intéressait à tout ce qui touche à l'occulte. Il doit avoir quelques livres à ce sujet dans la <span class=\"lieu\">bibliothèque</span>.",
                    ],
                ],
            ],
            'actions' => [
                [
                    'label' => 'Interroger.',
                    'name' => 'domestiques',
                    'value' => 'interroger',
                    'class' => 'ask',
                ],
            ],
        ],
        'bureau' => [
            'audio' => null,
            'blocks' => [
                [
                    'type' => 'dialogue',
                    'speaker' => [
                        'name' => 'Domestiques',
                        'portrait' => 'assets/img/secrets/domestiques.png',
                    ],
                    'paragraphs' => [
                        "Votre oncle y passait beaucoup de temps, surtout ces derniers temps, mais il nous interdisait l'accès.<br>
                        J'ai entendu dire que la seule personne qu'il autorisait à entrer était l'un de ses amis, mais ils se sont fâchés il y a de cela plusieurs années et personne d'autre que votre oncle n'y a depuis mis les pieds.",
                        "Il arrivait fréquemment que des <span class=\"mdp\">coupures de courant</span> surviennent lorsqu'il s'y trouvait.",
                    ],
                ],
            ],
            'actions' => [
                [
                    'label' => 'Interroger.',
                    'name' => 'domestiques',
                    'value' => 'interroger',
                    'class' => 'ask',
                ],
            ],
        ],
        'coupuresdecourant' => [
            'audio' => null,
            'blocks' => [
                [
                    'type' => 'dialogue',
                    'speaker' => [
                        'name' => 'Domestiques',
                        'portrait' => 'assets/img/secrets/domestiques.png',
                    ],
                    'paragraphs' => [
                        "Oui, le courant se coupait souvent lorsque votre oncle travaillait dans son bureau.<br>
                        Il devait le réparer comme il pouvait car la lumière revenait peu de temps après, mais le système ne doit pas être parfait vu que cela se reproduisait peu après.",
                        "Vous pensez que vous pourriez corriger ça ?
                        De toute façon, il avait dû installer le boîtier d'alimentation dans son bureau pour pouvoir le réparer directement, car nous n'avons jamais vu d'autre boîtier ailleurs.",
                    ],
                ],
            ],
            'actions' => [
                [
                    'label' => 'Interroger.',
                    'name' => 'domestiques',
                    'value' => 'interroger',
                    'class' => 'ask',
                ],
            ],
        ],
        'tableau' => [
            'audio' => null,
            'blocks' => [
                [
                    'type' => 'dialogue',
                    'speaker' => [
                        'name' => 'Domestiques',
                        'portrait' => 'assets/img/secrets/domestiques.png',
                    ],
                    'paragraphs' => [
                        "En effet, il y avait bien un tableau au-dessus de la cheminée, mais votre oncle l'a détruit il y a quelques semaines.<br>
                        Je crois savoir qu'il a jeté les <span class=\"mdp\">restes</span> à la <span class=\"lieu\">cave</span>.",
                    ],
                ],
            ],
            'actions' => [
                [
                    'label' => 'Interroger.',
                    'name' => 'domestiques',
                    'value' => 'interroger',
                    'class' => 'ask',
                ],
            ],
        ],
        'opusfavori' => [
            'audio' => null,
            'blocks' => [
                [
                    'type' => 'dialogue',
                    'speaker' => [
                        'name' => 'Téona',
                        'portrait' => 'assets/img/secrets/teona.png',
                    ],
                    'paragraphs' => [
                        "Votre oncle et moi avons plusieurs fois discuté des livres qu'il possède dans sa bibliothèque.<br>
                        Il m'a une fois avoué que l'un de ceux qui l'avait le plus marqué était le <span class=\"mdp\">Magna Mater</span>.
                        Peut-être est-ce celui que vous recherchez ?",
                    ],
                ],
            ],
            'actions' => [
                [
                    'label' => 'Interroger.',
                    'name' => 'domestiques',
                    'value' => 'interroger',
                    'class' => 'ask',
                ],
            ],
        ],
        'unknown' => [
            'audio' => null,
            'blocks' => [
                [
                    'type' => 'dialogue',
                    'speaker' => [
                        'name' => 'Domestiques',
                        'portrait' => 'assets/img/secrets/domestiques.png',
                    ],
                    'paragraphs' => [
                        "Désolé, monsieur Bastian, mais je ne vois pas en quoi nous pouvons vous aider à ce propos.",
                    ],
                ],
            ],
            'actions' => [
                [
                    'label' => 'Interroger.',
                    'name' => 'domestiques',
                    'value' => 'interroger',
                    'class' => 'ask',
                ],
            ],
        ],
    ],
];
