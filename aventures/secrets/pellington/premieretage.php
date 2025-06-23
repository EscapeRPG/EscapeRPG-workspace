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
    <title>Premier étage - Secrets Familiaux</title>
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
            <div id="enigme">
                <a href="/escaperpg/images/secrets/pellpremier.png" rel="lightbox[invent]">
                    <img src="/escaperpg/images/secrets/pellpremier.png" alt="premier étage de la maison du docteur Pellington">
                </a>
            </div>
            <p>
                Le premier étage se compose de 4 pièces, outre l'espace contenant les escaliers descendant au <span class="lieu">rez-de-chaussée</span>
                et montant au <span class="lieu">deuxième</span>.<br>
                La pièce jouxtant directement l'escalier est assez spacieuse et sert de débarras au docteur,
                vous fouillez rapidement l'endroit mais il ne semble rien y avoir qui vous permettrait d'avancer dans votre enquête.<br>
                Un couloir mène ensuite à une chambre d'ami, où vous trouvez un lit sommaire ainsi qu'une armoire vide pour que les visiteurs de Pellington puisse déposer leurs affaires,
                rien d'intéressant ici.
                Vous arrivez ensuite dans la <span class="lieu">chambre</span> du maître de maison, collée à sa <span class="lieu">salle de bain</span>.
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
