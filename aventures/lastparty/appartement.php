<?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/entete.php"; ?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <script type="text/javascript" src="/escaperpg/lightbox/js/prototype.js"></script>
    <script type="text/javascript" src="/escaperpg/lightbox/js/scriptaculous.js?load=effects,builder"></script>
    <script type="text/javascript" src="/escaperpg/lightbox/js/lightbox.js"></script>
    <link rel="stylesheet" href="/escaperpg/lightbox/css/lightbox.css" type="text/css" media="screen">
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/styleAventures.php"; ?>
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/lastparty/includes/styleLastParty.php"; ?>
    <meta charset="utf-8">
    <title>Appartement - Last Party</title>
</head>

<body>
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/header.php"; ?>
    <div id="banniere"><img src="/escaperpg/images/lastparty/lpmini.png" alt="last party bannière"></div>
    <main>
        <?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/lastparty/includes/nav.php"; ?>
        <div id="txt">
            <?php if (isset($_SESSION['photos'])): ?>
                <div id="enigmelieu">
                    <img src="/escaperpg/images/lastparty/appartement.png" alt="appartement">
                    <form action="appareilphoto" method="post">
                        <button type="submit" id="appareil"></button>
                    </form>
                </div>
                <p>
                    Vous devriez inspecter votre appareil photo.
                </p>
                <?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/resetIndices.php"; ?>
            <?php else: ?>
                <div id="enigmelieu">
                    <img src="/escaperpg/images/lastparty/appartement.png" alt="appartement">
                    <form action="ordinateur" method="post"><button type="submit" id="ordi"></button></form>
                    <?php
                    if (!isset($_SESSION['carnet'])) {
                        echo '<form action="tiroir" method="post"><button type="submit" id="tiroir"></button></form>';
                    }
                    ?>
                    </form>
                </div>
                <p>
                    Comment pourriez-vous vous connecter à votre compte Faceeebook ?
                </p>
                <?php
                if (isset($_SESSION['tiroir'])) {
                    $reponse = "Fouillez dans les tiroirs du bureau.";
                    $indice1 = "Heureusement, vous n'avez pas énormément d'affaires et vous êtes du genre à les ranger.";
                    $indice2 = "Pour plus de simplicité, vous avez rangé votre carnet au plus proche de l'endroit où vous en auriez besoin.";
                    $indice3 = "Votre carnet est rangé tout près de votre ordinateur.";
                    include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/indices.php";
                } else {
                    $reponse = "Cliquez sur l'ordinateur, sur le bureau.";
                    $indice1 = "Essayez de trouver un accès à internet.";
                    $indice2 = "Vous ne pouvez pas aller sur Faceeebook sur votre téléphone.";
                    $indice3 = "Outre votre téléphone, quel appareil vous permettrait de vous connecter sur internet ?";
                    include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/indices.php";
                }
                ?>
            <?php endif; ?>
        </div>
    </main>
    <div id="load">
        <div id="loader"></div>
    </div>
    <script src="/escaperpg/scripts/aventures-chargement.js"></script>
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/lastparty/includes/footer.php"; ?>
</body>

</html>
