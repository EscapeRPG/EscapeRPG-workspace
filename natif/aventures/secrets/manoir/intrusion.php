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
    <title>Intrusion - Secrets Familiaux</title>
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
            <?php if (isset($_POST['suivant'])): ?>
                <p>
                    Par précaution, vous préférez ne pas toucher aux restes de votre repas et d'avertir les domestiques.<br>
                    <br>
                    Vous avez le reste de la journée devant vous pour décider de fouiller le manoir et faire l'inventaire des biens de votre oncle,
                    avant de retourner vous coucher dans votre <span class="lieu">chambre</span>.
                </p>
                <form action="rdc" method="post">
                    <input type="submit" name="suivant2" value="Faire un tour.">
                </form>
                <form action="nuit" method="post">
                    <input type="submit" name="nuit" value="Aller dormir.">
                </form>
                <?php
                $_SESSION['intrusion'] = true;
                $_SESSION['chiensmalades'] = true;
                ?>
            <?php else: ?>
                <p>
                    La fenêtre de la salle à manger est ouverte alors qu'il n'est clairement pas la saison pour aérer,
                    malgré l'<span class="mdp">odeur</span> qui règne dans le manoir.
                    Quelqu'un a dû passer par là.<br>
                    Vous inspectez un peu mieux la pièce et apercevez des traces de boue sur le sol, traversant la salle à manger.<br>
                    <br>
                    En remontant la piste, vous voyez que le rôdeur, qui s'est bel et bien introduit chez vous, s'est dirigé juste à côté de l'endroit où vous étiez en train de manger, avant de se diriger vers la cuisine puis de ressortir par la fenêtre.
                </p>
                <form action="intrusion" method="post">
                    <input type="submit" name="suivant" value="Suivant.">
                </form>
                <?php
                if (!in_array("Odeur", $_SESSION['mdp'])) {
                    $_SESSION['mdp'][] = "Odeur";
                }
                ?>
            <?php endif; ?>
        </div>
    </main>
    <div id="load">
        <div id="loader"></div>
    </div>
    <script src="/escaperpg/scripts/aventures-chargement.js"></script>
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/secrets/includes/footer.php"; ?>
</body>

</html>
