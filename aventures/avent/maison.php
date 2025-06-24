<?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/entete.php"; ?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <script type="text/javascript" src="/escaperpg/lightbox/js/prototype.js"></script>
    <script type="text/javascript" src="/escaperpg/lightbox/js/scriptaculous.js?load=effects,builder"></script>
    <script type="text/javascript" src="/escaperpg/lightbox/js/lightbox.js"></script>
    <link rel="stylesheet" href="/escaperpg/lightbox/css/lightbox.css" type="text/css" media="screen">
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/styleAventures.php"; ?>
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/avent/includes/styleAvent.php"; ?>
    <meta charset="utf-8">
    <title>Devant la Maison - Le Grenier d'Arthur</title>
</head>

<body>
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/header.php"; ?>
    <div id="banniere"><img src="/escaperpg/images/avent/aventmini.png" alt="bannière le grenier d'arthur"></div>
    <main>
        <?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/avent/includes/nav.php"; ?>
        <div id="txt">
            <?php if (isset($_POST['bisous'])): ?>
                <audio src="/escaperpg/sons/avent/tirercarte.mp3" autoplay></audio>
                <p>
                    Vous êtes devant la porte et avez sonné, mais voilà déjà plusieurs longues minutes que vous attendez sans obtenir de réponse.
                    Arthur est peut-être tout simplement parti se balader ou faire des courses pour votre venue ?<br>
                    Votre père étant déjà reparti, vous ne savez pas quoi faire et décidez de voir si les clés ne sont pas quelque part.<br>
                </p>
                <span class="turn-card">Retournez la carte numéro 1.</span>
                <form action="maison" method="post">
                    <input type="submit" name="suivant2" value="suivant.">
                </form>
            <?php elseif (isset($_POST['suivant2'])): ?>
                <audio src="/escaperpg/sons/avent/cles.mp3" autoplay></audio>
                <p>
                    Vous commencez par vérifier si la porte est bien fermée à clé, ce qui est le cas.<br>
                    Vous allez ensuite inspecter le pot de fleurs sous la fenêtre, au cas où les clés auraient été rangées là, mais non.<br>
                    Ne sachant trop quoi faire, vous regardez au travers de la fenêtre de la cuisine, en plein milieu du rez-de-chaussée, mais la pièce est vide.<br>
                    Vous prenez un peu de recul et observez la fenêtre de la salle de bain, juste au-dessus, puis celle de la chambre, sur la gauche. Personne.<br>
                    Vous essayez alors de regarder si vous percevez du mouvement au niveau de la fenêtre ronde du grenier, mais elle est trop haute pour vous.<br>
                    Amusée, vous remarquez alors le petit oiseau perché sur la cheminée.<br>
                    Soudain, prise d'une sorte de révélation, vous soulevez le paillasson devant la porte et trouvez un trousseau de clé !<br>
                    <br>
                    Le trousseau comporte cinq clés, laquelle est la bonne ?
                </p>
                <div id="enigmelieu">
                    <img src="/escaperpg/images/avent/jeucles.png" alt="les clés de la maison">
                    <form action="maison" method="post">
                        <button type="submit" name="1cle">
                            <img src="/escaperpg/images/avent/cle1.png" class="cle-maison cle1" alt="une des clés de la maison d'Arthur">
                        </button>
                        <button type="submit" name="2cle">
                            <img src="/escaperpg/images/avent/cle2.png" class="cle-maison cle2" alt="une des clés de la maison d'Arthur">
                        </button>
                        <button type="submit" name="3cle">
                            <img src="/escaperpg/images/avent/cle3.png" class="cle-maison cle3" alt="une des clés de la maison d'Arthur">
                        </button>
                        <button type="submit" name="4cle">
                            <img src="/escaperpg/images/avent/cle4.png" class="cle-maison cle4" alt="une des clés de la maison d'Arthur">
                        </button>
                        <button type="submit" name="5cle">
                            <img src="/escaperpg/images/avent/cle5.png" class="cle-maison cle5" alt="une des clés de la maison d'Arthur">
                        </button>
                    </form>
                </div>
                <?php
                $reponse = "Cliquez sur la clé en bas à gauche.";
                $indice1 = "Prenez et observez bien la carte 1, il y a sans doute un indice dessus.";
                $indice2 = "Essayez de suivre le chemin effectué par Sarah.";
                $indice3 = "Une forme devrait se dessiner.";
                include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/indices.php";
                ?>
                <script src="/escaperpg/aventures/avent/scripts/cles.js"></script>
            <?php elseif (isset($_POST['1cle'])): ?>
                <audio src="/escaperpg/sons/avent/ouvertureporte.mp3" autoplay></audio>
                <p>
                    La clé vous permet d'ouvrir la porte de la maison.<br>
                    <br>
                    À l'intérieur, vous appelez votre grand-père mais n'obtenez une nouvelle fois aucune réponse.<br>
                    Inquiète, vous commencez à faire le tour de la maison à sa recherche.
                </p>
                <form action="maison" method="post">
                    <input type="submit" name="tour" value="FAIRE LE TOUR.">
                </form>
                <?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/resetIndices.php"; ?>
            <?php elseif (isset($_POST['2cle']) || isset($_POST['3cle']) || isset($_POST['4cle']) || isset($_POST['5cle'])): ?>
                <p>
                    Cette clé ne semble pas être la bonne.<br>
                    <br>
                    Vous avez vérifié la porte d'entrée.<br>
                    Vous avez ensuite inspecté le pot de fleurs sous la fenêtre, puis avez regardé au travers de la fenêtre de la cuisine au milieu du rez-de-chaussée,
                    celle de la salle de bain, juste au-dessus et celle de la chambre, sur la gauche.<br>
                    Vous avez ensuite essayé de regarder la fenêtre ronde du grenier avant de voir un oiseau perché sur la cheminée.<br>
                    Enfin, vous avez trouvé le trousseau de clés juste à vos pieds, sous le paillasson.<br>
                    <br>
                    Le trousseau comporte cinq clés, laquelle est la bonne ?
                </p>
                <div id="enigmelieu">
                    <img src="/escaperpg/images/avent/jeucles.png" alt="les clés de la maison">
                    <form action="maison" method="post">
                        <button type="submit" name="1cle">
                            <img src="/escaperpg/images/avent/cle1.png" class="cle-maison cle1" alt="une des clés de la maison d'Arthur">
                        </button>
                        <button type="submit" name="2cle">
                            <img src="/escaperpg/images/avent/cle2.png" class="cle-maison cle2" alt="une des clés de la maison d'Arthur">
                        </button>
                        <button type="submit" name="3cle">
                            <img src="/escaperpg/images/avent/cle3.png" class="cle-maison cle3" alt="une des clés de la maison d'Arthur">
                        </button>
                        <button type="submit" name="4cle">
                            <img src="/escaperpg/images/avent/cle4.png" class="cle-maison cle4" alt="une des clés de la maison d'Arthur">
                        </button>
                        <button type="submit" name="5cle">
                            <img src="/escaperpg/images/avent/cle5.png" class="cle-maison cle5" alt="une des clés de la maison d'Arthur">
                        </button>
                    </form>
                </div>
                <?php
                $reponse = "Cliquez sur la clé en bas à gauche.";
                $indice1 = "Prenez et observez bien la carte 1, il y a sans doute un indice dessus.";
                $indice2 = "Essayez de suivre le chemin effectué par Sarah.";
                $indice3 = "Une forme devrait se dessiner.";
                include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/indices.php";
                ?>
                <script src="/escaperpg/aventures/avent/scripts/cles.js"></script>
            <?php elseif (isset($_POST['tour'])): ?>
                <p>
                    Vous parcourez les différentes salles de la maison, mais aucune trace de lui.<br>
                    Il n'en reste plus qu'une à explorer : le grenier.
                    Après réflexion, vous vous dites qu'il pourrait bien s'y trouver car c'est dans cette pièce qu'il a installé son atelier, l'endroit où il construit des tas de choses.
                    Il n'est pas rare qu'il s'y endorme à force de travailler toute la nuit et cela pourrait expliquer la raison de son silence.<br>
                    <br>
                    Vous montez les marches menant au grenier.
                </p>
                <form action="grenier" method="post">
                    <input type="submit" name="monter" value="MONTER.">
                </form>
            <?php else: ?>
                <audio src="/escaperpg/sons/avent/voiturestop.mp3" autoplay></audio>
                <p>
                    La voiture s'arrête devant la petite maison où vit Arthur.<br>
                    Vous embrassez votre père et ouvrez la portière pour sortir.
                </p>
                <div class="dialogue">
                    <div class="portrait">
                        <img src="/escaperpg/images/avent/pere.png" alt="père">
                    </div>
                    <div class="bulleperso">
                        <p>
                            À vendredi, bisous Sarah !
                        </p>
                    </div>
                </div>
                <form action="maison" method="post">
                    <input type="submit" name="bisous" value="BISOUS PAPA !">
                </form>
            <?php endif; ?>
        </div>
    </main>
    <div id="load">
        <div id="loader"></div>
    </div>
    <script src="/escaperpg/scripts/aventures-chargement.js"></script>
</body>

</html>
