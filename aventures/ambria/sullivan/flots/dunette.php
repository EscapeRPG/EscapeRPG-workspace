<?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/entete.php"; ?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <script type="text/javascript" src="/escaperpg/lightbox/js/prototype.js"></script>
    <script type="text/javascript" src="/escaperpg/lightbox/js/scriptaculous.js?load=effects,builder"></script>
    <script type="text/javascript" src="/escaperpg/lightbox/js/lightbox.js"></script>
    <link rel="stylesheet" href="/escaperpg/lightbox/css/lightbox.css" type="text/css" media="screen">
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/styleAventures.php"; ?>
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/ambria/includes/stylesAmbria.php"; ?>
    <meta charset="utf-8">
    <title>Dunette - Le Trésor d'Ambria</title>
</head>

<body>
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/header.php"; ?>
    <div id="banniere"><img src="/escaperpg/images/ambria/tresorambriamini.png" alt="le trésor d'ambria"></div>
    <main>
        <?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/ambria/includes/nav-sullivan.php"; ?>
        <div id="txt">
            <?php if (isset($_POST['demander'])): ?>
                <?php switch (handleSpecialChars($_POST['ask'])):
                    case "logan": ?>
                        <div class="dialogue">
                            <div class="portrait">
                                <img src="/escaperpg/images/ambria/timonier.png" alt="timonier">
                            </div>
                            <div class="bulleperso">
                                <p>
                                    Non désolé cap'taine, je l'ai pas vu depuis not' départ.
                                </p>
                            </div>
                        </div>
                        <form action="dunette" method="post">
                            <input list="notesListe" name="ask"><input type="submit" name="demander" value="Demander.">
                        </form>
                    <?php break;
                    case "jake": ?>
                        <div class="dialogue">
                            <div class="portrait">
                                <img src="/escaperpg/images/ambria/timonier.png" alt="timonier">
                            </div>
                            <div class="bulleperso">
                                <p>
                                    Ah, c'est Jake que vous cherchez ?<br>
                                    J'pense qu'il doit s'trouver au <span class="lieu">mess</span> avec le reste des gars, ou bien au <span class="lieu">quartier des équipages</span> pour se reposer.
                                    Il est pas de quart pour le moment.
                                </p>
                            </div>
                        </div>
                        <form action="dunette" method="post">
                            <input list="notesListe" name="ask"><input type="submit" name="demander" value="Demander.">
                        </form>
                    <?php break;
                    default: ?>
                        <div class="dialogue">
                            <div class="portrait">
                                <img src="/escaperpg/images/ambria/timonier.png" alt="timonier">
                            </div>
                            <div class="bulleperso">
                                <p>
                                    Désolé cap'taine, mais j'vois pas trop comment vous aider, là...<br>
                                    <br>
                                    Hésitez pas à revenir vers moi dès qu'on aura un cap, m'sieur.
                                </p>
                            </div>
                        </div>
                        <form action="dunette" method="post">
                            <input list="notesListe" name="ask"><input type="submit" name="demander" value="Demander.">
                        </form>
                <?php endswitch; ?>
            <?php else: ?>
                <audio src="/escaperpg/sons/ambria/flots.mp3" autoplay></audio>
                <p>
                    Vous arrivez sur la dunette, où se trouve le timonier.
                    Celui-ci se tient à côté de la barre, attendant vos ordres.
                </p>
                <div class="dialogue">
                    <div class="portrait">
                        <img src="/escaperpg/images/ambria/timonier.png" alt="timonier">
                    </div>
                    <div class="bulleperso">
                        <p>
                            Ah, patron.
                            Avons-nous un cap ? Tout le monde est prêt !
                        </p>
                    </div>
                </div>
                <form action="dunette" method="post">
                    <input list="notesListe" name="ask"><input type="submit" name="demander" value="Demander.">
                </form>
            <?php endif; ?>
        </div>
    </main>
    <div id="load">
        <div id="loader"></div>
    </div>
    <script src="/escaperpg/scripts/aventures-chargement.js"></script>
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/ambria/sullivan/includes/footer.php"; ?>
</body>

</html>
