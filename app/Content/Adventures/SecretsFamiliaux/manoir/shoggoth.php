<?php

$ritualBlocks = [['type' => 'paragraphs', 'paragraphs' => [
    "Tracez le cercle rituel en replaçant les symboles dans le bon ordre.",
]]];

$ritualHint = [
    'levels' => [
        [
            'paragraphs' => [
                "Les trois symboles les plus excentrés doivent être complétés avec les astres (Soleil, Jupiter et Pluton).<br>Le plus grand cercle doit recevoir l'intention (Éveil Psychique, planète Terre, Protection et Bannir).<br>Les quatre symboles à l'intérieur du cercle interne sont ceux représentant les éléments Air, Eau, Feu et Terre (N-A signifie « Nord-Air », etc.).<br>Tout au centre se trouveront les trois symboles indiquant l'effet que vous voulez (Voyage, Lien, Éther).",
            ],
        ],
        [
            'paragraphs' => [
                "Attention de bien suivre les indications pour placer les symboles dans le sens des aiguilles d'une montre ou inversement.",
            ],
        ],
        [
            'paragraphs' => [
                "Le Lien est représenté par une Corde.",
            ],
        ],
    ],
    'answer' => [
        'paragraphs' => [
            '<img src="' . asset('assets/img/secrets/cerclerituelreponse.png') . '" alt="réponse">',
        ],
    ],
];

$neutralFireBlocks = [
    ['type' => 'paragraphs', 'paragraphs' => [
        "Vous rebroussez aussitôt chemin et courez en dehors de la maison. Arrivé dans le jardin, vous risquez un regard en arrière, mais la créature ne semble pas vous avoir suivi.",
        "Au bord du désespoir, vous trouvez finalement une idée qui pourrait peut-être détruire ce monstre.",
        "Vous courez aussi vite que possible vers la remise au fond du jardin et avisez des jerricans d'essence. Vous en prenez deux et retournez vers le manoir.",
        "Du bruit à l'étage vous confirme que le shoggoth est toujours occupé avec le boîtier électrique et vous commencez à déverser le contenu des bidons sur le sol du hall d'entrée.",
        "Soudain, les lumières se coupent. Malgré vos réparations, le shoggoth a dû arracher le boîtier et couper le système électrique.",
        "Vous entendez alors un bruit de mouvement au-dessus de vous, le monstre est en train de sortir du bureau !",
        "Vous finissez à la hâte de renverser l'essence puis sortez du manoir.",
        "Vous retournant une dernière fois, vous sortez de votre poche le briquet de votre père, dernier souvenir que vous avez de lui et que vous gardez avec vous où que vous allez, bien que vous ne soyez pas fumeur.",
        "Vous l'allumez et le jetez dans le hall d'entrée. L'essence prend feu aussitôt, l'incendie prend rapidement de l'ampleur et, bientôt, le manoir tout entier est la proie des flammes.",
        "Vous repartez en arrière et franchissez la grille en direction de la ville, laissant derrière vous le manoir en ruines et tous ses secrets.",
        "Vous ne pouvez être sûr que tout soit terminé et que le shoggoth est vraiment mort, mais pour vous, l'histoire s'arrête là.",
    ]],
];

$badEndBlocks = [
    ['type' => 'paragraphs', 'paragraphs' => [
        "Dans l'horreur la plus totale, vous entendez la masse gélatineuse se mouvoir près de vous.",
        "Vous essayez de ramper vers l'extérieur de la pièce mais vous vous heurtez à un mur. Dans votre chute, vous avez perdu conscience de votre emplacement et ne savez plus où se trouve le passage menant vers la sortie !",
        "Un tentacule visqueux vous agrippe soudain la jambe et vous tire douloureusement. Un second appendice commence à s'accrocher à votre torse et vous sentez soudain une terrible douleur à l'abdomen.",
        "Munis de crochets, les tentacules commencent à vous arracher la peau.",
        "Fou de douleur et de panique, vous sentez votre vie vous échapper à mesure que votre sang s'écoule hors de votre corps.",
        "Seul dans l'obscurité avec un terrible monstre, vous finissez par rendre votre dernier soupir.",
    ]],
];

$neutralBadEndBlocks = [
    ['type' => 'paragraphs', 'paragraphs' => [
        "Quelques secondes après que le cercle ait commencé à s'illuminer, vous entendez un bruit sourd retentir près de vous : le shoggoth est juste à côté !",
        "Aussi vite que possible, vous tracez le dernier symbole, celui visant à vous protéger, alors que le monstre crée un tentacule qui s'agrippe à votre cheville.",
        "Vous tentez de vous dégager mais le shoggoth vous tient fermement. Soudain, le shoggoth forme un second tentacule qui fend l'air et vous transperce l'abdomen.",
        "Hurlant de douleur, vous tombez à la renverse alors que le cercle magique commence à briller d'une lumière intense.",
        "Vous entendez le monstre émettre un sifflement dans lequel vous sentez poindre de la rage. Vous relevez la tête pour voir ce qu'il se passe et voyez le shoggoth commencer à se contorsionner, avançant lentement vers le centre du cercle comme s'il était happé.",
        "De nouveaux pseudopodes sortent de son corps pour essayer de s'échapper, mais la force le tirant est plus puissante et l'attire inexorablement.",
        "Lorsqu'il atteint le centre, la lumière du cercle devient soudain aveuglante et un sifflement strident retentit, manquant vous percer les tympans.",
        "Vous ne sauriez dire si ce bruit vient du shoggoth ou de la lumière elle-même, mais lorsque le silence revient, vous constatez que le cercle ne brille plus et que le shoggoth ne se trouve plus ici.",
        "Vous vous sentez de plus en plus mal, votre sang s'écoulant de la plaie béante causée par votre ennemi. Vous ne vous faites pas d'idées : vous allez mourir là, seul dans l'obscurité.",
        "Votre seule consolation est, qu'au moins, vous avez réussi à bannir cette abomination hors de ce plan de l'existence. Grâce à vous, l'humanité ne risque plus rien pour le moment.",
        "Vous vous allongez sur le sol. Vous vous sentez partir petit à petit. Bientôt, vous ne sentez plus aucune douleur. Vous êtes en paix.",
        "Vous fermez les yeux, puis tout prend fin.",
    ]],
];

$goodEndBlocks = [
    ['type' => 'paragraphs', 'paragraphs' => [
        "Quelques secondes après que le cercle ait commencé à s'illuminer, l'électricité du manoir se coupe et seule la faible lumière magique vous éclaire.",
        "Malgré vos réparations, le shoggoth a dû arracher le boîtier et couper le système électrique.",
        "Vous entendez alors un bruit de mouvement au-dessus de vous, le monstre est en train de sortir du bureau !",
        "Émettant un sifflement étrange dans lequel vous sentez poindre de la colère, le monstre se rue sur l'escalier à une vitesse ahurissante pour une créature de cette taille.",
        "Créant des sortes de pattes et tentacules pour se déplacer, il s'arrête juste à la bordure du cercle, à peine à un mètre de distance de vous.",
        "Mû par une intuition, vous attrapez le talisman offert par Gaspard et le brandissez devant vous.",
        "Dans un sifflement sinistre de rage, le shoggoth commence à se contorsionner, avançant lentement vers le centre du cercle comme s'il était happé.",
        "De nouveaux pseudopodes sortent de son corps pour essayer de s'échapper, mais la force est plus puissante et l'attire inexorablement.",
        "Lorsqu'il atteint le centre, la lumière du cercle devient soudain aveuglante et un sifflement strident retentit, manquant vous percer les tympans.",
        "Vous ne sauriez dire si ce bruit vient du shoggoth ou de la lumière elle-même, mais lorsque le silence revient, vous constatez que le cercle ne brille plus et que le shoggoth ne se trouve plus ici.",
        "Vous vous effondrez au sol, vos jambes n'ayant plus assez de force pour vous maintenir debout après toutes ces épreuves, et vous fondez en larmes hystériques.",
        "Après de longues minutes, voire des heures, vous finissez par vous remettre debout et sortez pour retourner vers la ville, laissant derrière vous le manoir et ses sombres secrets.",
    ]],
];

return [
    'variants' => [
        'step_0' => [
            'audio' => 'assets/sounds/secrets/paslents.mp3',
            'blocks' => [['type' => 'paragraphs', 'paragraphs' => [
                "Vous revenez au manoir et votre cœur manque un battement lorsque vous voyez que les grilles de l'entrée ont été forcées et qu'une matière visqueuse est restée accrochée dessus.",
                "Le shoggoth de votre oncle serait-il revenu ici ? Mais pourquoi ?",
                "Sur vos gardes, vous avancez dans l'allée de graviers menant aux portes du manoir, défoncées elles aussi.",
                "Le carré d'obscurité formé par le trou béant est terriblement angoissant mais vous continuez d'avancer malgré tout.",
            ]]],
            'actions' => [['label' => 'Suivant.', 'name' => 'action', 'value' => 'suivant', 'class' => 'action']],
        ],
        'step_1' => [
            'audio' => 'assets/sounds/secrets/crichute.mp3',
            'blocks' => [['type' => 'paragraphs', 'paragraphs' => [
                "À l'intérieur règne un calme oppressant.",
                "Au bas de l'escalier, vous trouvez le corps ensanglanté de Téona. La pauvre a été déchiquetée et a dû connaître une fin horrible, mais un bruit de lutte à l'étage attire votre attention.",
                "Manifestement, quelqu'un ou quelque chose se trouve dans le bureau privé. Vous grimpez les marches quatre à quatre et vous placez à côté de la porte, le souffle court.",
                "Vous cherchez à prendre votre révolver pour pouvoir vous défendre, mais réalisez que vous l'avez laissé dans votre chambre.",
                "Vous vous maudissez de ne pas avoir été plus prévoyant mais estimez que vous ne pouvez pas attendre quand vous entendez un cri de douleur.",
                "Vous reconnaissez la voix de Gaspard et décidez d'entrer pour l'aider.",
            ]]],
            'actions' => [['label' => 'Aider Gaspard.', 'name' => 'action', 'value' => 'aider', 'class' => 'action']],
        ],
        'step_2' => [
            'audio' => null,
            'blocks' => [['type' => 'paragraphs', 'paragraphs' => [
                "La première partie du bureau est vide, en dehors des morceaux de papiers traînant un peu partout et des meubles renversés.",
                "Vous vous hâtez vers la seconde partie du bureau et manquez de peu de trébucher sur quelque chose.",
                "En baissant les yeux, vous voyez le corps meurtri de Gaspard, dont une jambe en travers du passage a failli vous faire tomber.",
                "Vous relevez les yeux et le voyez.",
                "Hideux, bien plus gros que ce à quoi vous vous attendiez, se tient le shoggoth de votre oncle.",
                "Il vous est inconcevable de comprendre comment une telle chose a pu tenir à l'intérieur de son corps, mais vous constatez rapidement que les cuves contenant les embryons ont été brisées et sont à présent vides.",
                "Le monstre a dû récupérer ses « morceaux » pour redevenir entier.",
            ]]],
            'actions' => [['label' => 'Faire quelque chose.', 'name' => 'action', 'value' => 'agir', 'class' => 'action']],
        ],
        'good_setup' => [
            'audio' => 'assets/sounds/secrets/shoggothelec.mp3',
            'blocks' => [['type' => 'paragraphs', 'paragraphs' => [
                "Le shoggoth est en train de s'agripper au mur et tente d'ouvrir le petit boîtier contenant le système électrique du manoir.",
                "Il commence alors à toucher les câbles et vous voyez un éclat électrique en sortir pour être absorbé par la créature.",
                "Il semblerait que les réparations que vous avez effectuées soient efficaces, car le système semble se maintenir et le shoggoth absorbe l'énergie petit à petit.",
                "Vous voyez son corps être secoué de spasmes tandis que des éclairs parcourent son corps, vous laissant en voir l'intérieur par transparence.",
                "Le spectacle est immonde et vous ne pouvez vous empêcher, cette fois, de vomir tout ce qui se trouve dans votre estomac.",
                "Le shoggoth semble pour le moment occupé à pomper l'énergie du système électrique, ce qui vous laisse un peu de temps pour chercher une solution.",
                "Vous vous souvenez alors du rituel trouvé dans la bibliothèque du bureau privé. Après tout, si des monstres tels que celui se trouvant devant vous existent bel et bien et permettent de tromper la mort, alors peut-être que cette idée pourrait marcher ?",
                "Vous ressortez du bureau et descendez les escaliers en direction du hall d'entrée.",
                "À la hâte, vous ouvrez le tiroir d'un des meubles se trouvant là en espérant trouver de quoi tracer le cercle de magie.",
                "En trouvant une boîte de craies, vous manquez de peu de crier de joie, mais le temps presse.",
                "Fébrile, vous ouvrez la boîte en tremblant et une demi-douzaine de craies tombent et se brisent sur le sol.",
                "Jurant entre vos dents, vous réussissez à trouver un morceau suffisamment grand pour ce que vous allez entreprendre.",
            ]]],
            'actions' => [['label' => 'Commencer le rituel.', 'name' => 'action', 'value' => 'rituel_good', 'class' => 'action']],
        ],
        'ritual_good' => [
            'audio' => 'assets/sounds/secrets/rituel.mp3',
            'blocks' => $ritualBlocks,
            'actions' => [],
            'hint' => $ritualHint,
            'scripts' => [
                'assets/js/adventures/dragDropPuzzle.js',
                'assets/js/adventures/secrets_familiaux/ritualCircle.js',
                'assets/js/adventures/secrets_familiaux/dragDropCercleGEnd.js',
            ],
        ],
        'neutral_fire' => [
            'audio' => 'assets/sounds/secrets/shoggothelec.mp3',
            'blocks' => [['type' => 'paragraphs', 'paragraphs' => [
                "Le shoggoth est en train de s'agripper au mur et tente d'ouvrir le petit boîtier contenant le système électrique du manoir.",
                "Il commence alors à toucher les câbles et vous voyez un éclat électrique en sortir pour être absorbé par la créature.",
                "Il semblerait que les réparations que vous avez effectuées soient efficaces, car le système semble se maintenir et le shoggoth absorbe l'énergie petit à petit.",
                "Vous voyez son corps être secoué de spasmes tandis que des éclairs parcourent son corps, vous laissant en voir l'intérieur par transparence.",
                "Le spectacle est immonde et vous ne pouvez vous empêcher, cette fois, de vomir tout ce qui se trouve dans votre estomac.",
                "N'ayant aucune idée de comment vaincre le shoggoth qui semble occupé, vous décidez de battre en retraite.",
            ]]],
            'actions' => [['label' => 'Fuir.', 'name' => 'action', 'value' => 'finish_neutral', 'class' => 'action']],
        ],
        'neutral_bad_setup_dark' => [
            'audio' => 'assets/sounds/secrets/shoggothcourtcircuit.mp3',
            'blocks' => [['type' => 'paragraphs', 'paragraphs' => [
                "Le shoggoth est en train de s'agripper au mur et tente d'ouvrir le petit boîtier contenant le système électrique du manoir.",
                "Il commence alors à toucher les câbles et vous voyez un éclat électrique en sortir pour être absorbé par la créature.",
                "Cependant, le système étant instable comme vous l'avaient dit les domestiques, le courant se coupe soudainement et plonge la pièce dans l'obscurité la plus totale.",
                "Vous vous souvenez alors du rituel trouvé dans la bibliothèque du bureau privé. Après tout, si des monstres tels que celui se trouvant devant vous existent bel et bien et permettent de tromper la mort, alors peut-être que cette idée pourrait marcher ?",
                "Vous ressortez du bureau comme vous le pouvez en tâtonnant et descendez les escaliers en direction du hall d'entrée.",
                "À la hâte, vous ouvrez le tiroir d'un des meubles se trouvant là en espérant trouver de quoi tracer le cercle de magie.",
                "En trouvant une boîte de craies, vous manquez de peu de crier de joie, mais le temps presse.",
                "Fébrile, vous ouvrez la boîte en tremblant et une demi-douzaine de craies tombent et se brisent sur le sol.",
                "Jurant entre vos dents, vous réussissez à trouver un morceau suffisamment grand pour ce que vous allez entreprendre.",
                "Vous n'y voyez pas grand chose, mais cela devrait suffire. Du moins l'espérez-vous !",
                "Depuis le bureau, vous entendez des bruits d'objets tombant sur le sol.",
                "Le shoggoth est en train de se frayer un chemin pour venir jusqu'à vous et vous risquez de ne pas avoir beaucoup de temps pour accomplir le rituel avant qu'il ne vous tombe dessus.",
            ]]],
            'actions' => [['label' => 'Commencer le rituel.', 'name' => 'action', 'value' => 'rituel_neutral_bad', 'class' => 'action']],
        ],
        'ritual_neutral_bad' => [
            'audio' => 'assets/sounds/secrets/rituel.mp3',
            'blocks' => $ritualBlocks,
            'actions' => [],
            'hint' => $ritualHint,
            'scripts' => [
                'assets/js/adventures/dragDropPuzzle.js',
                'assets/js/adventures/secrets_familiaux/ritualCircle.js',
                'assets/js/adventures/secrets_familiaux/dragDropCercleNBEnd.js',
            ],
        ],
        'bad_attack' => [
            'audio' => 'assets/sounds/secrets/shoggothcourtcircuit.mp3',
            'blocks' => [['type' => 'paragraphs', 'paragraphs' => [
                "Le shoggoth est en train de s'agripper au mur et tente d'ouvrir le petit boîtier contenant le système électrique du manoir.",
                "Il commence alors à toucher les câbles et vous voyez un éclat électrique en sortir pour être absorbé par la créature.",
                "Cependant, rien ne semble pouvoir le retenir assez longtemps.",
                "Paniqué, vous tentez de rebrousser chemin pour vous échapper, mais vous trébuchez à nouveau sur le corps de Gaspard.",
            ]]],
            'actions' => [['label' => 'Tenter de fuir.', 'name' => 'action', 'value' => 'finish_bad', 'class' => 'action']],
        ],
        'bad_end' => [
            'audio' => 'assets/sounds/secrets/badending.mp3',
            'blocks' => $badEndBlocks,
            'actions' => [],
        ],
        'neutral_end' => [
            'audio' => 'assets/sounds/secrets/shoggothfeu.mp3',
            'blocks' => $neutralFireBlocks,
            'actions' => [],
        ],
        'neutral_bad_end' => [
            'audio' => 'assets/sounds/secrets/shoggothexpulse.mp3',
            'blocks' => $neutralBadEndBlocks,
            'actions' => [],
        ],
        'good_end' => [
            'audio' => 'assets/sounds/secrets/shoggothexpulse.mp3',
            'blocks' => $goodEndBlocks,
            'actions' => [],
        ],
    ],
];
