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
    <title>Salle de bain - Secrets Familiaux</title>
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
            <?php if (in_array("analeptique", $_SESSION['inventaire'])): ?>
                <div id="enigmelieu">
                    <img src="/escaperpg/images/secrets/sdbarmoireopened.png" alt="la salle de bain du docteur Pellington">
                </div>
                <p>
                    La salle de bain du docteur Pellington.<br>
                    <br>
                    Maintenant que vous avez synthétisé l'antidote pour les chiens, vous n'avez plus rien à faire ici.
                </p>
            <?php else: ?>
                <div id="enigmelieu">
                    <img src="/escaperpg/images/secrets/sdbarmoireopened.png" alt="la salle de bain du docteur Pellington">
                    <div id="armoireopened">
                        <form action="armoireapharmacie" method="post">
                            <button type="submit" name="armoireopened">
                                <img src="/escaperpg/images/secrets/armoirepharm<?= isset($_SESSION['armoireopened']) ? 'opened' : '' ?>.png" alt="l'armoire à pharmacie du docteur Pellington">
                                <button>
                        </form>
                    </div>
                </div>
                <p>
                    Une salle de bain plutôt ordinaire, vous semble-t-il.
                </p>
                <?php if (isset($_SESSION['armoireopened'])): ?>
                    <p>
                        Pensez-vous pouvoir faire quelque chose avec les flacons de l'armoire à pharmacie ?
                    </p>
                <?php else: ?>
                    <p>
                        Pensez-vous pouvoir y trouver quoi que ce soit d'utile ?
                    </p>
                <?php endif; ?>
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
