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
    <title>Rez-de-chaussée - Secrets Familiaux</title>
</head>

<body>
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/header.php"; ?>
    <div id="banniere"><img src="/escaperpg/images/secrets/secretsfamiliauxmini.png" alt="secrets familiaux bannière"></div>
    <main>
        <nav>
            <?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/secrets/includes/navAvatar.php"; ?>
            <?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/secrets/includes/navigationpellington.php"; ?>
            <?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/secrets/includes/navInputs.php"; ?>
        </nav>
        <div id="txt">
            <p>
            <div id="enigme">
                <a href="/escaperpg/images/secrets/pellrdc.png" rel="lightbox[invent]">
                    <img src="/escaperpg/images/secrets/pellrdc.png" alt="rez-de-chaussée de la maison du docteur Pellington">
                </a>
            </div>
            <br>
            Vous êtes au rez-de-chaussée de la maison de Pellington.<br>
            <br>
            La porte arrière par laquelle vous êtes arrivé donne sur une cuisine,
            laquelle débouche aussitôt sur une grande salle à manger où de nombreux meubles servent au docteur à entreposer sa vaiselle.<br>
            Un petit couloir vous permet d'accéder aux toilettes d'un côté et au <span class="lieu">salon</span> de l'autre,
            où se trouvent également les escaliers menant au <span class="lieu">premier étage</span> et à la <span class="lieu">cave</span>.<br>
            Enfin, en vous dirigeant vers la porte d'entrée principale,
            vous devez passer par un <span class="lieu">vestibule</span> servant à déposer les vêtements de Pellington et de ses éventuels patients.<br>
            </p>
        </div>
    </main>
    <div id="load">
        <div id="loader"></div>
    </div>
    <script src="/escaperpg/scripts/aventures-chargement.js"></script>
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/secrets/includes/footer.php"; ?>
</body>

</html>
