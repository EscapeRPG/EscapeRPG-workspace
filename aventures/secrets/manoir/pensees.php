<?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/entete.php"; ?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <script type="text/javascript" src="/escaperpg/lightbox/js/prototype.js"></script>
    <script type="text/javascript" src="/escaperpg/lightbox/js/scriptaculous.js?load=effects,builder"></script>
    <script type="text/javascript" src="/escaperpg/lightbox/js/lightbox.js"></script>
    <link rel="stylesheet" href="/escaperpg/lightbox/css/lightbox.css" type="text/css" media="screen">
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/styleAventures.php"; ?>
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/secrets/includes/stylesSecrets.php"; ?>
    <meta charset="utf-8">
    <title>Cave - Secrets Familiaux</title>
</head>

<body>
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/header.php"; ?>
    <div id="banniere"><img src="/escaperpg/images/secrets/secretsfamiliauxmini.png" alt="secrets familiaux bannière"></div>
    <main>
        <nav>
            <?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/secrets/includes/navAvatar.php"; ?>
            <?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/secrets/includes/navInputs.php"; ?>
        </nav>
        <div id="txt">
            <?php if (isset($_POST['thoughts'])): ?>
                <?php switch (str_replace($search, $replace, stripslashes($_POST['thoughts']))): ?>
                <?php
                    case "oncle": ?>
                        <p>
                            Votre oncle possède un shoggoth dans son corps qui pourrait chercher à s'échapper dans la nature !
                            Les autres spécimens conservés ici semblent inactifs et piégés dans des cuves, ou les profondeurs de cette cave secrète,
                            mais si le mot du docteur Pellington dit vrai alors laisser un shoggoth en liberté pourrait s'avérer dévastateur !<br>
                            Vous comprenez maintenant les raisons de la présence du médecin lors des funérailles,
                            le pauvre fou essayait de protéger l'humanité d'une terrible menace !<br>
                            La seule personne au courant de ce danger étant à présent morte, il ne reste plus que vous pour essayer d'y mettre un terme !
                            Mais comment procéder ?<br>
                            <br>
                            Il semblerait qu'il soit temps de retourner au <span class="lieu">cimetière</span>... !
                        </p>
                        <?php
                        $_SESSION['verite'] = true;
                        include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/resetIndices.php";
                        break; ?>
                    <?php
                    case "votreonclepeutrevenir": ?>
                        <div id="enigmepensees">
                            <img src="/escaperpg/images/secrets/pensees.gif" alt="pensées diffuses">
                        </div>
                        <p>
                            Vous commencez à y voir un peu plus clair, mais vous vous sentez encore troublé.<br>
                            Essayez de réfléchir encore un peu calmement, quelque chose finira sans doute par se dessiner.
                        </p>
                        <form action="pensees" method="post">
                            <input list="notesListe" name="thoughts">
                            <input type="submit" name="reflechir" value="Rassembler ses pensées">
                        </form>
                        <?php break; ?>
                    <?php
                    default: ?>
                        <div id="enigmepensees">
                            <img src="/escaperpg/images/secrets/pensees.gif" alt="pensées diffuses">
                        </div>
                        <p>
                            Sans doute êtes-vous encore trop chamboulé par tous ces événements. Vous n'arrivez manifestement pas à penser correctement.
                        </p>
                        <form action="pensees" method="post">
                            <input list="notesListe" name="thoughts">
                            <input type="submit" name="reflechir" value="Rassembler ses pensées">
                        </form>
                        <?php break; ?>
                <?php endswitch; ?>
            <?php else: ?>
                <div id="enigmepensees">
                    <img src="/escaperpg/images/secrets/pensees.gif" alt="pensées diffuses">
                </div>
                </p>
                <form action="pensees" method="post">
                    <input list="notesListe" name="thoughts">
                    <input type="submit" name="reflechir" value="Rassembler ses pensées">
                </form>
            <?php endif; ?>
            <?php
            $reponse = 'En reliant les points, on obtient le motif suivant : <div id="enigmepensees"><img src="/escaperpg/images/secrets/penseesreponse.png" alt="pensées réponse"></div> On peut y voir se dessiner le mot "oncle" !';
            $indice1 = "Vous êtes troublé et vos pensées sont diffuses. Une capture d'écran pourrait vous permettre d'y voir plus clair. Les couleurs peuvent vous aider, en suivant l'ordre du spectre lumineux.";
            $indice2 = "Essayez de composer une phrase avec ce que vous voyez.";
            $indice3 = "Avez-vous également remarqué les petites croix ? Elles ont sans doute leur importance, l'utilisation d'un logiciel de traitement d'image serait le bienvenu pour les relier.";
            include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/indices.php";
            ?>
        </div>
    </main>
    <div id="load">
        <div id="loader"></div>
    </div>
    <script src="/escaperpg/scripts/aventures-chargement.js"></script>
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/secrets/includes/footer.php"; ?>
</body>

</html>
