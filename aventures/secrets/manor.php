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
    <title>Manoir - Secrets Familiaux</title>
</head>

<body onload="chargement()">
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/header.php"; ?>
    <div id="banniere"><img src="/escaperpg/images/secrets/secretsfamiliauxmini.png" alt="secrets familiaux bannière"></div>
    <main>
        <nav>
            <?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/secrets/includes/navAvatar.php"; ?>
            <?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/secrets/includes/navInputs.php"; ?>
        </nav>
        <div id="txt">
            <p>
                Il semblerait que ce ne soit pas la bonne clé.
            </p>
            <div id="enigmelieu">
                <img src="/escaperpg/images/secrets/porteentree.png" alt="la porte d'entrée du manoir">
            </div>
            <div id="enigme">
                <form action="manor" method="post">
                    <button type="submit" name="cle1" class="cle1"></button>
                    <button type="submit" name="cle2" class="cle2"></button>
                    <button type="submit" name="cle3" class="cle3"></button>
                    <button type="submit" name="cle4" class="cle4" formaction="manoir"></button>
                    <button type="submit" name="cle5" class="cle5"></button>
                </form>
            </div>
        </div>
    </main>
    <div id="load">
        <div id="loader"></div>
    </div>
    <script src="/escaperpg/scripts/aventures-chargement.js"></script>
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/secrets/includes/footer.php"; ?>
</body>

</html>
