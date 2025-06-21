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
    <title>Tableau brûlé - Secrets Familiaux</title>
</head>

<body>
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/header.php"; ?>
    <div id="banniere"><img src="/escaperpg/images/secrets/secretsfamiliauxmini.png" alt="secrets familiaux bannière"></div>
    <main>
        <nav>
            <?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/secrets/includes/navAvatar.php"; ?>
            <?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/secrets/includes/navigationmanoir.php"; ?>
            <?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/secrets/includes/navInputs.php"; ?>
        </nav>
        <div id="txt">
            <div id="enigmelieu">
                <img src="/escaperpg/images/secrets/tableaubrule.png" alt="les restes d'un tableau brûlé">
            </div>
            <p>
                Des fragments de tableau brûlé. Si seulement vous pouviez retrouver l'œuvre originale !
            </p>
            <?php
            $reponse = "La note du docteur Pellington vous dit de compter le nombre de personnages présents sur ce tableau, sans préciser s'il faut prendre en compte uniquement les vivants ou non.<br>Il faut donc bien compter tous les personnages, ce qui en donne 9.";
            $indice1 = "Apparemment, le nom du peintre de ce tableau est intact et pourrait vous permettre de la retrouver entière en cherchant un peu.";
            $indice2 = "Il s'agit d'un tableau du célèbre Rembrandt.";
            $indice3 = "Le nom de cette peinture est \"La Leçon d'Anatomie\", peinte en 1632.";
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
