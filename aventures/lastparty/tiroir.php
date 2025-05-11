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
            <?php if (isset($_POST['add'])): ?>
                <script src="/escaperpg/scripts/inventaireadd.js"></script>
                <p>
                    Vous prenez le carnet avec vous.
                </p>
                <form action="appartement" method="post">
                    <input type="submit" name="retour" value="Retour.">
                </form>
                <?php $_SESSION['carnet'] = true; ?>
                <?php $_SESSION['inventaire'][] = 'carnet'; ?>
            <?php else: ?>
                <audio src="/escaperpg/sons/lastparty/tiroir.mp3" autoplay></audio>
                <div id="enigme">
                    <a href="/escaperpg/images/lastparty/carnet.png" rel="lightbox[invent]"><img src="/escaperpg/images/lastparty/carnet.png" alt="carnet"></a>
                </div>
                <p>
                    Dans les tiroirs du bureau, vous trouvez un carnet contenant l\'intégralité de vos mots de passe sur internet.
                </p>
                <form action="tiroir" method="post">
                    <input type="submit" name="add" value="Prendre.">
                </form>
            <?php endif; ?>
            <?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/resetIndices.php"; ?>
        </div>
        </div>
        <div id="load">
            <div id="loader"></div>
        </div>
        <script src="/escaperpg/scripts/aventures-chargement.js"></script>
        <?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/lastparty/includes/footer.php"; ?>
</body>

</html>
