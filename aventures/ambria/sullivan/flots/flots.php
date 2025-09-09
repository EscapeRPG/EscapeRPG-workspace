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
    <title>Sur les Flots - Le Trésor d'Ambria</title>
</head>

<body>
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/header.php"; ?>
    <div id="banniere"><img src="/escaperpg/images/ambria/tresorambriamini.png" alt="le trésor d'ambria"></div>
    <main>
        <?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/ambria/includes/nav-sullivan.php"; ?>
        <div id="txt">
            <?php if (isset($_POST['suivant'])): ?>
                <audio src="/escaperpg/sons/ambria/flots.mp3" autoplay></audio>
                <p>
                    Vous ressortez de la <span class="lieu">cabine</span> et vous présentez sur le <span class="lieu">pont principal</span>.
                    Vous saluez les hommes présents et pouvez vous diriger où vous le désirez.<br>
                    Le Surgisseur des Tempêtes est assez grand.
                    Au-dessus de vous se trouve la <span class="lieu">dunette</span> où vous pouvez prendre la barre pour diriger le bateau.
                    En-dessous se trouve le <span class="lieu">pont inférieur</span> pour y inspecter les canons et accéder au <span class="lieu">mess</span> pour vous restaurer,
                    ou le <span class="lieu">quartier des équipages</span> où dorment vos hommes quand ils ne sont pas de quart.
                    Enfin, encore en-dessous, il y a la <span class="lieu">cale</span> où sont entreposées toutes sortes de biens.
                </p>
            <?php else: ?>
                <audio src="/escaperpg/sons/ambria/flots.mp3" autoplay></audio>
                <p>
                    Satisfait de votre rangement, vous vous installez confortablement sur votre couchette pour prendre un peu de repos
                    tandis que le Surgisseur des Tempêtes navigue sur les flots.<br>
                    <br>
                    Vous vous réveillez un peu plus tard, alors que le jour commence tout juste à poindre à l'horizon.
                    La mer est calme et vous entendez le bruit étouffé de l'équipage qui travaille sur le pont.<br>
                    Vous vous dites qu'il pourrait être bien d'aller voir si <span class="mdp">Logan</span> arrive à s'accoutumer à la vie à bord,
                    puis de l'amener dans votre <span class="lieu">cabine</span> pour vous pencher sur la destination à suivre.
                </p>
                <form action="flots" method="post">
                    <input type="submit" name="suivant" value="Suivant.">
                </form>
                <?php
                $_SESSION['flots'] = true;

                if (!in_array('Logan', $_SESSION['mdp'])) {
                    $_SESSION['mdp'][] = 'Logan';
                }
                ?>

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
