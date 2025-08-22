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
    <title>Introduction - Secrets Familiaux</title>
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
            <?php if (isset($_POST['new'])): ?>
                <?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/sessioninc.php"; ?>
                <div id="succespopup">
                    <?php
                    $nouveausucces = '<img src="/escaperpg/images/succes/general/debut.png"><span><u><b>Se lancer dans l\'aventure</b></u><br>Commencer une aventure pour la première fois</span>';
                    $scenario = 'general';
                    $description = 'début';
                    $cache = 'non';
                    $rarete = 'succesnormal';
                    include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/succesadd.php";
                    $nouveausucces = '<img src="/escaperpg/images/succes/secrets/debut.png"><span><u><b>Cadeau empoisonné ?</b></u><br>Lancer l\'aventure pour la première fois</span>';
                    $scenario = 'secrets';
                    $description = 'début';
                    $cache = 'non';
                    $rarete = 'succesnormal';
                    include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/succesadd.php";
                    ?>
                </div>
                <p>
                    Arkham, Massachusetts. Octobre 1940.<br>
                    <br>
                    Vous êtes Bastian Deckard, un jeune inspecteur de police de Boston.
                    Il y a deux jours, vous avez reçu une missive indiquant que votre oncle, William Deckard, était décédé.<br>
                    <br>
                    Les obsèques sont prévues ce soir à 18h et c'est pourquoi vous êtes revenu à Arkham.<br>
                    Votre père étant mort en 1917, vous êtes le dernier héritier de la famille Deckard
                    et c'est à vous que revient l'antique manoir familial, ainsi que toutes les affaires de feu votre oncle.<br>
                    Cela vous demandera un peu de temps pour organiser le tout et voir ce que vous comptez garder,
                    mais vous pourrez sans doute tirer un bon bénéfice de la revente de ses biens.<br>
                    <br>
                    Vous êtes devant l'entrée du cimetière.<br>
                </p>
                <form action="cimetiere" method="post">
                    <input type="submit" name="entrer" value="Entrer.">
                </form>
            <?php else: ?>
                <div class="dialogue">
                    <div class="portrait">
                        <img src="/escaperpg/images/narrateur.png" alt="narrateur">
                    </div>
                    <div class="bulleperso">
                        <p>
                            Vous désirez jouer à ce scénario avec une musique appropriée ?<br>
                            Je vous conseille de vous rendre sur
                            <a href="https://www.youtube.com/watch?v=7bW75OwVXZI&list=PLggiqSd087TSku31JHz90pWoQOooERZON" target="_blank" rel="noreferrer">
                                ce lien
                            </a> pour plus d'immersion !<br>
                            <br>
                            Bonne aventure... et bonne chance !
                        </p>
                    </div>
                </div>
                <br>
                <form action="index" method="post">
                    <input type="submit" name="new" value="NOUVELLE PARTIE.">
                </form>
                <br>
                <form action="save/load" method="post">
                    <input type="submit" name="load" value="CHARGER UNE PARTIE.">
                </form>
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
