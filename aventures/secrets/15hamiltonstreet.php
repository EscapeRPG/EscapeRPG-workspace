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
    <title>Manoir - Secrets Familiaux</title>
</head>

<body onload="chargement()">
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/header.php"; ?>
    <div id="banniere"><img src="/escaperpg/images/secrets/secretsfamiliauxmini.png" alt="secrets familiaux bannière"></div>
    <main>
        <nav>
            <?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/secrets/includes/navAvatar.php"; ?>
            <?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/secrets/includes/navInputs.php"; ?>
        </nav>
        <div id="txt">
            <?php if (isset($_POST['suivant'])): ?>
                <audio src="/escaperpg/sons/secrets/chiens.mp3" autoplay></audio>
                <p>
                    L'antique demeure de vos ancêtres se dresse au fond de l'allée traversant un immense jardin.<br>
                    Vous êtes accueilli par des aboiements de <span class="mdp">chiens</span>.<br>
                    <br>
                    Vous ne saviez pas que votre oncle en avait.
                </p>
                <form action="15hamiltonstreet" method="post">
                    <input type="submit" name="suivant2" value="Suivant.">
                </form>
                <?php
                if (!in_array('chiens', $_SESSION['mdp'])) {
                    $_SESSION['mdp'][] = 'Chiens';
                }
                ?>
            <?php elseif (isset($_POST['suivant2'])): ?>
                <p>
                    Gaspard s'approche de la grille.
                <p>
                <div class="dialogue">
                    <div class="portrait">
                        <img src="/escaperpg/images/secrets/gaspard.png" alt="gaspard">
                    </div>
                    <div class="bulleperso">
                        <p>
                            Désolé pour ça. Nous avons eu quelques… <span class="mdp">soucis</span> ces derniers temps
                            et votre oncle a préféré assurer sa sécurité.<br>
                            <br>
                            Je vous en prie, suivez-moi.
                        </p>
                    </div>
                </div>
                </p>
                </p>
                <form action="15hamiltonstreet" method="post">
                    <input type="submit" name="suivre" value="Le suivre.">
                </form>
                <?php
                if (!in_array('soucis', $_SESSION['mdp'])) {
                    $_SESSION['mdp'][] = 'soucis';
                }
                ?>
            <?php elseif (isset($_POST['suivre'])): ?>
                <p>
                    Il vous fait traverser l'allée et vous tend un jeu de clés.
                </p>
                <div class="dialogue">
                    <div class="portrait">
                        <img src="/escaperpg/images/secrets/gaspard.png" alt="gaspard">
                    </div>
                    <div class="bulleperso">
                        <p>
                            Tenez, voici les clés du manoir. Elles sont à vous maintenant. Je vous laisse entrer, je dois aller nourrir les chiens.
                        </p>
                    </div>
                </div>
                <p>
                    Vous êtes devant la porte du manoir qui semble fermée.
                </p>
                <div id="enigmelieu">
                    <img src="/escaperpg/images/secrets/porteentree.png" alt="la porte d'entrée du manoir">
                </div>
                <br>
                <div id="enigme">
                    <form action="manor" method="post">
                        <button type="submit" name="cle1" class="cle1"></button>
                        <button type="submit" name="cle2" class="cle2"></button>
                        <button type="submit" name="cle3" class="cle3"></button>
                        <button type="submit" name="cle4" class="cle4" formaction="manoir"></button>
                        <button type="submit" name="cle5" class="cle5"></button>
                    </form>
                </div>
            <?php else: ?>
                <p>
                    Le manoir Deckard est situé aux abords de la ville, dans une petite zone boisée, calme et isolée.<br>
                    <br>
                    Il est 20 heures lorsque vous arrivez devant les grilles.
                </p>
                <form action="15hamiltonstreet" method="post">
                    <input type="submit" name="suivant" value="Suivant.">
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
