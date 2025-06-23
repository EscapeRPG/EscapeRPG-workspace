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
                <div id="container">
                    <div id="panneauelec">
                        <img src="/escaperpg/images/secrets/panneauelec.png" alt="panneau électrique">
                        <div id="innerpanneau"></div>
                    </div>
                    <div class="draggables-container">
                        <div class="draggableelec" id="drag1"><img src="/escaperpg/images/secrets/cables/1.png" alt="cable"></div>
                        <div class="draggableelec" id="drag2"><img src="/escaperpg/images/secrets/cables/2.png" alt="cable"></div>
                        <div class="draggableelec" id="drag3"><img src="/escaperpg/images/secrets/cables/3.png" alt="cable"></div>
                        <div class="draggableelec" id="drag4"><img src="/escaperpg/images/secrets/cables/4.png" alt="cable"></div>
                        <div class="draggableelec" id="drag5"><img src="/escaperpg/images/secrets/cables/5.png" alt="cable"></div>
                        <div class="draggableelec" id="drag6"><img src="/escaperpg/images/secrets/cables/6.png" alt="cable"></div>
                        <div class="draggableelec" id="drag7"><img src="/escaperpg/images/secrets/cables/7.png" alt="cable"></div>
                        <div class="draggableelec" id="drag8"><img src="/escaperpg/images/secrets/cables/8.png" alt="cable"></div>
                        <div class="draggableelec" id="drag9"><img src="/escaperpg/images/secrets/cables/9.png" alt="cable"></div>
                        <div class="draggableelec" id="drag10"><img src="/escaperpg/images/secrets/cables/10.png" alt="cable"></div>
                        <div class="draggableelec" id="drag11"><img src="/escaperpg/images/secrets/cables/11.png" alt="cable"></div>
                        <div class="draggableelec" id="drag12"><img src="/escaperpg/images/secrets/cables/12.png" alt="cable"></div>
                        <div class="draggableelec" id="drag13"><img src="/escaperpg/images/secrets/cables/13.png" alt="cable"></div>
                        <div class="draggableelec" id="drag14"><img src="/escaperpg/images/secrets/cables/14.png" alt="cable"></div>
                        <div class="draggableelec" id="drag15"><img src="/escaperpg/images/secrets/cables/15.png" alt="cable"></div>
                        <div class="draggableelec" id="drag16"><img src="/escaperpg/images/secrets/cables/16.png" alt="cable"></div>
                        <div class="draggableelec" id="drag17"><img src="/escaperpg/images/secrets/cables/17.png" alt="cable"></div>
                        <div class="draggableelec" id="drag18"><img src="/escaperpg/images/secrets/cables/18.png" alt="cable"></div>
                        <div class="draggableelec" id="drag19"><img src="/escaperpg/images/secrets/cables/19.png" alt="cable"></div>
                        <div class="draggableelec" id="drag20"><img src="/escaperpg/images/secrets/cables/20.png" alt="cable"></div>
                        <div class="draggableelec" id="drag21"><img src="/escaperpg/images/secrets/cables/21.png" alt="cable"></div>
                        <div class="draggableelec" id="drag22"><img src="/escaperpg/images/secrets/cables/22.png" alt="cable"></div>
                        <div class="draggableelec" id="drag23"><img src="/escaperpg/images/secrets/cables/23.png" alt="cable"></div>
                    </div>
                </div>
                <form action="courtcircuit" method="post">
                    <input type="submit" name="reset" value="Réinitialiser.">
                </form>
                <script src="/escaperpg/aventures/secrets/scripts/dragdropelec.js"></script>
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
