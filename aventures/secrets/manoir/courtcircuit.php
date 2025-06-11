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
    <title>Bureau privé - Secrets Familiaux</title>
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
            <?php if (isset($_POST['suivantelec']) || isset($_SESSION['shortcut'])): ?>
                <p>
                    Le moral déjà bien affecté par les derniers événements, vous manquez de peu de paniquer mais réussissez à vous ressaisir.<br>
                    À tâtons, vous finissez par trouver un petit boîtier sur le mur, que vous ouvrez pour découvrir un système archaïque de câblages électriques.
                    Si vous désirez retrouver la lumière, il va falloir remettre de l'ordre dans tout ça.
                </p>
                <div id="panneauelec"></div>
                <br>
                <div class="draggableelec"><img src="/escaperpg/images/secrets/cables/1.png" id="dra1" alt="cable"></div>
                <div class="draggableelec"><img src="/escaperpg/images/secrets/cables/2.png" id="dra2" alt="cable"></div>
                <div class="draggableelec"><img src="/escaperpg/images/secrets/cables/3.png" id="dra3" alt="cable"></div>
                <div class="draggableelec"><img src="/escaperpg/images/secrets/cables/4.png" id="dra4" alt="cable"></div>
                <div class="draggableelec"><img src="/escaperpg/images/secrets/cables/5.png" id="dra5" alt="cable"></div>
                <div class="draggableelec"><img src="/escaperpg/images/secrets/cables/6.png" id="dra6" alt="cable"></div>
                <div class="draggableelec"><img src="/escaperpg/images/secrets/cables/7.png" id="dra7" alt="cable"></div>
                <div class="draggableelec"><img src="/escaperpg/images/secrets/cables/8.png" id="dra8" alt="cable"></div>
                <div class="draggableelec"><img src="/escaperpg/images/secrets/cables/9.png" id="dra9" alt="cable"></div>
                <div class="draggableelec"><img src="/escaperpg/images/secrets/cables/10.png" id="dra10" alt="cable"></div>
                <div class="draggableelec"><img src="/escaperpg/images/secrets/cables/11.png" id="dra11" alt="cable"></div>
                <div class="draggableelec"><img src="/escaperpg/images/secrets/cables/12.png" id="dra12" alt="cable"></div>
                <div class="draggableelec"><img src="/escaperpg/images/secrets/cables/13.png" id="dra13" alt="cable"></div>
                <div class="draggableelec"><img src="/escaperpg/images/secrets/cables/14.png" id="dra14" alt="cable"></div>
                <div class="draggableelec"><img src="/escaperpg/images/secrets/cables/15.png" id="dra15" alt="cable"></div>
                <div class="draggableelec"><img src="/escaperpg/images/secrets/cables/16.png" id="dra16" alt="cable"></div>
                <div class="draggableelec"><img src="/escaperpg/images/secrets/cables/17.png" id="dra17" alt="cable"></div>
                <div class="draggableelec"><img src="/escaperpg/images/secrets/cables/18.png" id="dra18" alt="cable"></div>
                <div class="draggableelec"><img src="/escaperpg/images/secrets/cables/19.png" id="dra19" alt="cable"></div>
                <div class="draggableelec"><img src="/escaperpg/images/secrets/cables/20.png" id="dra20" alt="cable"></div>
                <div class="draggableelec"><img src="/escaperpg/images/secrets/cables/21.png" id="dra21" alt="cable"></div>
                <div class="draggableelec"><img src="/escaperpg/images/secrets/cables/22.png" id="dra22" alt="cable"></div>
                <div class="draggableelec"><img src="/escaperpg/images/secrets/cables/23.png" id="dra23" alt="cable"></div>
                <form action="courtcircuit" method="post">
                    <input type="submit" name="reset" value="Réinitialiser.">
                </form>
                <script src="/escaperpg/aventures/scripts/dragdropelec.js"></script>
            <?php else: ?>
                <audio src="/escaperpg/sons/secrets/courtcircuit.mp3" autoplay></audio>
                <p>
                    Alors que vous tirez dessus, un arc électrique apparaît entre deux tiges de métal au sommet de la cuve que vous venez d'activer.
                    Cependant, l'effet dure à peine une seconde avant que le courant dans la maison ne se coupe brutalement, plongeant la pièce dans l'obscurité.
                </p>
                <form action="courtcircuit" method="post">
                    <input type="submit" name="suivantelec" value="Suivant.">
                </form>
                <?php $_SESSION['shortcut'] = true; ?>
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
