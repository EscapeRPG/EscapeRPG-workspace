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
    <title>Réparations - Le Grenier d'Arthur</title>
</head>

<body>
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/header.php"; ?>
    <div id="banniere"><img src="/escaperpg/images/avent/aventmini.png" alt="bannière le grenier d'arthur"></div>
    <main>
        <?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/avent/includes/nav.php"; ?>
        <div id="txt">
            <?php if (isset($_POST['boutonmachine'])): ?>
                <p>
                    - Placer le sapence dans son compartiment.<br>
                    - Calibrer le régulateur sur 4 et abaisser le levier.<br>
                    - Remplir le réservoir aux 3/4.<br>
                    - Appuyer sur le bouton rouge.
                    <br>
                    Rien ne se passe, la machine n'est sans doute pas encore prête.
                </p>
                <div id="enigmelieu">
                    <img src="/escaperpg/images/avent/machineperenoel2.png" alt="la machine à cadeaux du père noël">
                    <div id="machineperenoel">
                        <input type="range" id="range" name="range" min="1" max="9" value="1">
                        <button id="levier">
                            <img src="/escaperpg/images/avent/levier.png" alt="levier">
                        </button>
                        <input type="number" name="reservoir" id="reservoir">
                        <div id="boutonmachineoff">
                            <form action="reparations2" method="post">
                                <button type="submit" name="boutonmachine">
                                    <img src="/escaperpg/images/avent/boutonoff.png" alt="bouton">
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                <?php
                $reponse = "Placez le curseur sur le troisième cran depuis la gauche puis cliquez sur le levier juste à droite.";
                $indice1 = "Pour l'étape 2, quel élément de la machine peut être réglé sur 4 ?";
                $indice2 = "Déplacez le petit curseur en bas à gauche pour le positionner sur la bonne valeur.";
                $indice3 = "N'oubliez pas de cliquer sur le levier juste à droite pour l'enclencher.";
                include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/indices.php";
                ?>
                <script src="/escaperpg/aventures/scripts/rangecheck.js"></script>
            <?php else: ?>
                <?php if (!isset($_SESSION['etape2'])): ?>
                    <?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/resetIndices.php"; ?>
                <?php endif; ?>
                <audio src="/escaperpg/sons/avent/etape1.mp3" autoplay></audio>
                <p>
                    - Placer le sapence dans son compartiment.<br>
                    - Calibrer le régulateur sur 4 et abaisser le levier.<br>
                    - Remplir le réservoir aux 3/4.<br>
                    - Appuyer sur le bouton rouge.
                </p>
                <div id="enigmelieu">
                    <img src="/escaperpg/images/avent/machineperenoel2.png" alt="la machine à cadeaux du père noël">
                    <div id="machineperenoel">
                        <input type="range" id="range" name="range" min="1" max="9" value="1">
                        <button id="levier">
                            <img src="/escaperpg/images/avent/levier.png" alt="levier">
                        </button>
                        <input type="number" name="reservoir" id="reservoir">
                        <div id="boutonmachineoff">
                            <form action="reparations2" method="post">
                                <button type="submit" name="boutonmachine">
                                    <img src="/escaperpg/images/avent/boutonoff.png" alt="bouton">
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                <?php
                $reponse = "Placez le curseur sur le troisième cran depuis la gauche puis cliquez sur le levier juste à droite.";
                $indice1 = "Pour l'étape 2, quel élément de la machine peut être réglé sur 4 ?";
                $indice2 = "Déplacez le petit curseur en bas à gauche pour le positionner sur la bonne valeur.";
                $indice3 = "N'oubliez pas de cliquer sur le levier juste à droite pour l'enclencher.";
                include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/indices.php";
                $_SESSION['etape2'] = true;
                ?>
                <script src="/escaperpg/aventures/scripts/rangecheck.js"></script>
            <?php endif; ?>
        </div>
    </main>
    <div id="load">
        <div id="loader"></div>
    </div>
    <script src="/escaperpg/scripts/aventures-chargement.js"></script>
</body>

</html>
