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
            <?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/secrets/includes/navigationmanoir.php"; ?>
            <?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/secrets/includes/navInputs.php"; ?>
        </nav>
        <div id="txt">
            <div id="enigme">
                <a href="/escaperpg/images/secrets/rdc.png" rel="lightbox[invent]">
                    <img src="/escaperpg/images/secrets/rdc.png" alt="rez-de-chaussée">
                </a>
            </div>
            <p>
                <?php if ($_SESSION['visitepellington']): ?>
                    Vous êtes de retour au manoir, encore troublé par les découvertes faites dans la maison du docteur Pellington.<br>
                    Vous ne savez pas ce que sont les embryons évoqués dans sa lettre d'adieux, mais il semblerait que ce soit ici que vous puissiez en apprendre plus.<br>
                    <br>
                    Un tour du manoir s'impose donc à vous.
                <?php else: ?>
                    Depuis le hall d'entrée où vous vous trouvez, un grand escalier mène à l'<span class="lieu">étage</span>.<br>
                    Sur votre gauche se trouve la salle à manger et la cuisine.<br>
                    À droite, vous pouvez vous rendre au <span class="lieu">salon</span> ainsi qu'à l'<span class="lieu">aile des domestiques</span>.<br>
                    <br>
                    Vous pouvez utiliser le menu de navigation à gauche pour vous rendre où vous le désirez.
                <?php endif; ?>
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
