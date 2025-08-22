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
    <title>Le Marché - Le Trésor d'Ambria</title>
</head>

<body>
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/header.php"; ?>
    <div id="banniere"><img src="/escaperpg/images/ambria/tresorambriamini.png" alt="le trésor d'ambria"></div>
    <main>
        <?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/ambria/includes/nav-sullivan.php"; ?>
        <div id="txt">
            <?php if (isset($_POST['bernard'])): ?>
                <?php if (str_replace($search, $replace, stripslashes($_POST['bernard'])) == "bernard"): ?>
                    <div class="dialogue">
                        <div class="portrait">
                            <img src="/escaperpg/images/ambria/bernard.png" alt="bernard">
                        </div>
                        <div class="bulleperso">
                            <p>
                                Ouaip' ! C'est bien moi !<br>
                                <br>
                                Qu'est-ce que je peux faire pour vous mon brave ? J'ai tout un tas de poissons, fraîchement pêchés !
                            </p>
                        </div>
                    </div>
                    <p>
                        Vous n'avez pas réellement faim et pensez que vous perdez votre temps ici. Vous décidez de continuer votre recherche ailleurs.
                    </p>
                <?php else: ?>
                    <div class="dialogue">
                        <div class="portrait">
                            <img src="/escaperpg/images/ambria/bernard.png" alt="bernard">
                        </div>
                        <div class="bulleperso">
                            <p>
                                Oh j'vois pas bien comment j'peux vous aider à ce propos, mon bon m'sieur !
                            </p>
                        </div>
                    </div>
                    <form action="marche" method="post">
                        <input list="notesListe" name="bernard">
                        <input type="submit" name="demander" value="Demander.">
                    </form>
                <?php endif; ?>
            <?php else: ?>
                <audio src="/escaperpg/sons/ambria/marche.mp3" autoplay></audio>
                <p>
                    Le marché se tient sur la place centrale de la ville.<br>
                    Vous pouvez y trouver de tout, pour peu d'y mettre le prix.<br>
                    <br>
                    Le marché est en pleine effervescence et vous peinez à vous frayer un chemin au milieu des passants.<br>
                    Vous espérez que le temps que ça vous prend en vaudra la chandelle.<br>
                    <br>
                    Vous arrivez au niveau d'un vendeur de poissons et autres produits de la mer. L'odeur iodée vous est familière.<br>
                    Le marchand se tourne vers vous.
                </p>
                <div class="dialogue">
                    <div class="portrait">
                        <img src="/escaperpg/images/ambria/bernard.png" alt="bernard">
                    </div>
                    <div class="bulleperso">
                        <p>
                            Vous cherchez quelque chose ?
                        </p>
                    </div>
                </div>
                <form action="marche" method="post">
                    <input list="notesListe" name="bernard">
                    <input type="submit" name="demander" value="Demander.">
                </form>
                <?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/resetIndices.php"; ?>
            <?php endif; ?> ?>
        </div>
    </main>
    <div id="load">
        <div id="loader"></div>
    </div>
    <script src="/escaperpg/scripts/aventures-chargement.js"></script>
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/ambria/sullivan/includes/footer.php"; ?>
</body>

</html>
