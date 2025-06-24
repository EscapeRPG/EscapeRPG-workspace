<?php
include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/entete.php";
$flippedCards = $_SESSION['flipped_cards'] ?? [];
?>
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
    <title>Cartes - Le Grenier d'Arthur</title>
</head>

<body>
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/header.php"; ?>
    <div id="banniere"><img src="/escaperpg/images/avent/aventmini.png" alt="bannière le grenier d'arthur"></div>
    <main>
        <nav><img src="/escaperpg/images/avent/sarah.png" alt="sarah"></nav>
        <div id="txt">
            <p>
                Tout au long de votre aventure, il vous sera demandé de tirer des cartes.<br>
                Celles-ci correspondent à votre inventaire et vous seront d'une grande utilité pour terminer votre aventure.<br>
                <br>
                Pour les retourner, il suffit de cliquer dessus. Une fois qu'une carte est révélée, vous pouvez à nouveau cliquer dessus pour l'ouvrir en grand et mieux l'observer.<br>
                Évitez de toutes les retourner dès le début du jeu, cela ne vous avancerait à rien et rendrait votre progression plus pénible.<br>
                <br>
                Si vous le préférez, vous pouvez obtenir une version imprimable des cartes <a href="/escaperpg/images/avent/cartes/versionimprimable.pdf" target="_blank" rel="noreferrer">ici</a> pour avoir le jeu de cartes entre les mains.
                Veillez alors à imprimer les pages 1 et 2 en recto-verso, de même pour les pages 3 et 4.
            </p>
            <div id="cards-container"></div>
            <br>
            <form action="cartes" method="post">
                <input type="submit" name="close" value="Fermer." onclick="window.close()" />
            </form>
        </div>
    </main>
    <div id="load">
        <div id="loader"></div>
    </div>
    <script>
        const cartesRetournees = <?= json_encode($flippedCards) ?>;
    </script>
    <script src="/escaperpg/aventures/avent/scripts/cartes.js"></script>
    <script src="/escaperpg/scripts/aventures-chargement.js"></script>
</body>

</html>
