<?php

return [
    'intro' => [
        "C'est la première fois que vous venez ici ?",
        "Ne vous inquiétez pas dans ce cas, j'ai ces quelques cartes de conseils pour vous aider dans vos futures aventures.",
    ],
    'cards' => [
        [
            'title' => 'FOUILLE',
            'image' => 'assets/img/loupe.png',
            'alt' => 'fouille',
            'html_paragraphs' => [
                "Certains lieux nécessitent d'être fouillés pour découvrir des éléments cachés.<br>Pour ce faire, observez bien l'image du lieu et essayez de trouver ce qui dénote dans le décor.<br>Une fois le ou les éléments trouvés, vous n'aurez qu'à cliquer dessus pour voir l'information qui était cachée !",
                "Les images pourront également contenir des informations utiles, n'hésitez donc pas à cliquer dessus pour les ouvrir en grand et mieux les analyser.",
                "De même, considérez que l'ensemble de la page internet peut contenir des informations utiles, regardez bien tout ce qui s'affiche devant vous !",
            ],
        ],
        [
            'title' => 'MOTS DE PASSE',
            'image' => 'assets/img/cadenas.png',
            'alt' => 'mot de passe',
            'html_paragraphs' => [
                'Durant vos aventures, vous verrez des mots en <span class="mdp">gras</span>.<br>Il s\'agit de <span class="mdp">mots de passe</span> vous permettant de débloquer des informations et d\'avancer dans l\'histoire.<br>Vous pourrez ainsi ouvrir des choses fermées, interroger des personnages ou chercher des éléments précis dans les lieux ! Leur utilisation est simple : quand vous souhaitez entrer un <span class="mdp">mot de passe</span>, écrivez-le dans son intégralité à l\'endroit requis.',
                'Attention cependant : chaque mot de passe peut être utilisé <span class="important">plusieurs fois</span> et <span class="important">seuls ceux donnés en jeu seront à entrer</span> !',
                "Lorsque votre personnage en repère un, il l'ajoute automatiquement à son carnet de notes.",
            ],
        ],
        [
            'title' => 'RECHERCHES',
            'image' => 'assets/img/www.png',
            'alt' => 'recherches',
            'paragraphs' => [
                "Quelle que soit l'époque où se déroule l'aventure que vous jouez, n'hésitez pas à faire appel à internet pour faire des recherches.",
                "Cela symbolisera les moments passés par votre personnage pour aller se renseigner à la bibliothèque, aux archives de sa ville, etc...",
            ],
        ],
        [
            'title' => 'LIEUX',
            'image' => 'assets/img/lieux.png',
            'alt' => 'lieux',
            'html_paragraphs' => [
                "Pour progresser dans certaines aventures, il vous faudra visiter différents lieux.",
                'Ils sont indiqués en <span class="lieu">vert</span> lorsque vous pouvez vous y rendre. La plupart seront accessibles via le volet de navigation disponible en jeu, mais vous pouvez aussi vous y diriger en rentrant leur nom directement dans la barre d\'adresse de votre navigateur !',
                'Par exemple, si vous êtes dans un <span class="lieu">salon</span> et que vous désirez aller dans le <span class="lieu">bureau</span>, remplacez "salon.php" par "bureau.php" et validez !',
                '<span class="important">Attention cependant, ne mettez jamais d\'accent ni d\'espace dans ces adresses !</span> <span class="lieu">Salle de cérémonie</span><span class="important"> donnerait donc "salledeceremonie.php" !</span>',
            ],
        ],
        [
            'title' => 'INVENTAIRE',
            'image' => 'assets/img/inventaire.png',
            'alt' => 'inventaire',
            'paragraphs' => [
                "Au fur et à mesure de vos enquêtes, vous trouverez de nombreux objets et indices qui vous seront utiles plus tard dans le scénario.",
                "Dans chacun de ces cas, votre personnage ajoutera l'élément en question dans son inventaire, consultable à tout moment de l'aventure.",
                "Vous pourrez ainsi retrouver facilement vos informations pour les consulter quand bon vous semble, c'est donc une ressource primordiale !",
            ],
        ],
        [
            'title' => 'INDICES',
            'image' => 'assets/img/interrogation.png',
            'alt' => 'indices',
            'html_paragraphs' => [
                'Si une énigme vous pose problème, n\'hésitez pas à cliquer sur le bouton <img src="/assets/img/indice.png" alt="indice">, il vous donnera une information pour vous aider à avancer !',
                "La plupart des énigmes ont plusieurs indices, vous guidant pas à pas vers la réponse. Tant que le bouton apparaît sur votre écran, vous pouvez cliquer dessus pour obtenir une nouvelle information.",
                'Dans le cas où le bouton devient rouge <img src="/assets/img/reponse.png" alt="réponse">, cliquer dessus affichera cette fois la réponse à l\'énigme sur laquelle vous travaillez.',
            ],
        ],
        [
            'title' => 'PAS DE RETOUR EN ARRIÈRE',
            'image' => 'assets/img/retour.png',
            'alt' => 'retour',
            'html_paragraphs' => [
                'Lors de vos aventures, n\'utilisez <strong>surtout pas</strong> la fonction "page précédente" de votre navigateur ou l\'historique des visites ! Le jeu est pensé pour être joué vers l\'avant, préférez donc prendre votre temps lors de vos investigations pour vous assurer d\'avoir tout trouvé.',
                "La seule utilisation possible de cette fonction serait dans le cas où vous auriez accidentellement quitté ce site internet sans avoir sauvegardé.",
            ],
        ],
        [
            'title' => 'QUÊTES SECONDAIRES',
            'image' => 'assets/img/exclamation.png',
            'alt' => 'quêtes secondaires',
            'html_paragraphs' => [
                "Certains scénarios comportent des quêtes secondaires.",
                "Celles-ci ne sont pas obligatoires pour terminer l'aventure, mais les accomplir vous permettra d'obtenir la gratitude de certains personnages, de vous apporter de précieuses informations pour la suite, voire même de vous débloquer des fins alternatives aux histoires ! N'hésitez donc pas à bien explorer partout si vous désirez finir chaque histoire à 100% !",
                "Cependant, sachez que ces quêtes ne comporteront pas d'indices pour vous aider, vous devrez vous en sortir par vous-même pour espérer les mener à terme !",
            ],
        ],
        [
            'title' => 'SAUVEGARDE',
            'image' => 'assets/img/save.png',
            'alt' => 'sauvegarde',
            'html_paragraphs' => [
                "À tout moment, il vous est possible d'enregistrer votre progression pour reprendre où vous en étiez quand vous le désirez.",
                'Pour ce faire, il vous suffit de cliquer sur le bouton "sauvegarder" qui se trouve sous le portrait et l\'inventaire du personnage de l\'histoire que vous incarnez !',
                '<span class="important">Si vous n\'êtes pas inscrit·e à l\'espace membres</span>, il vous sera demandé de choisir un nom pour effectuer la sauvegarde et de taper le code unique qui vous est indiqué.<br><span class="important">Attention, le code qui vous est donné est à garder précieusement, car il vous sera demandé au moment de charger votre partie !</span>',
            ],
        ],
        [
            'title' => 'BANDE ORIGINALE',
            'image' => 'assets/img/bo.png',
            'alt' => 'bande originale',
            'paragraphs' => [
                "Une bande son spécialement sélectionnée pour chaque aventure vous sera proposée sur la page d'introduction de chaque scénario.",
                "N'hésitez donc pas à cliquer sur le bouton dédié qui ouvrira un nouvel onglet dans votre navigateur pour vous offrir une expérience encore plus immersive.",
            ],
        ],
    ],
];
