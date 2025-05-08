<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/entete.php"; ?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <script type="text/javascript" src="/escaperpg/lightbox/js/prototype.js"></script>
    <script type="text/javascript" src="/escaperpg/lightbox/js/scriptaculous.js?load=effects,builder"></script>
    <script type="text/javascript" src="/escaperpg/lightbox/js/lightbox.js"></script>
    <link rel="stylesheet" href="/escaperpg/lightbox/css/lightbox.css" type="text/css" media="screen">
    <link rel="stylesheet" href="/escaperpg/aventures/lastparty/css/style.css">
    <link rel="stylesheet" href="/escaperpg/css/styleAventuresInputs.css">
    <link rel="stylesheet" href="/escaperpg/css/styleBoutonsIndices.css">
    <link rel="stylesheet" href="/escaperpg/css/styleSpanTexts.css">
    <link rel="stylesheet" href="/escaperpg/css/styleCompteBouton.css">
    <link rel="stylesheet" href="/escaperpg/css/styleDialogues.css">
    <link rel="stylesheet" href="/escaperpg/css/styleFooterAventures.css">
    <link rel="stylesheet" href="/escaperpg/css/styleLoader.css">
    <link rel="stylesheet" href="/escaperpg/css/styleSucces.css">
    <meta charset="utf-8">
    <title>Éveil - Last Party</title>
</head>

<body>
    <?php include_once $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/header.php"; ?>
    <div id="banniere"><img src="/escaperpg/images/lastparty/lpmini.png" alt="last party bannière"></div>
    <main>
        <?php include_once $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/lastparty/includes/nav.php"; ?>
        <div id="txt">
            <?php if (isset($_POST['suivant']) || isset($_SESSION['eveil'])): ?>
                <?php $_SESSION['eveil'] = true; ?>
                <audio src="/escaperpg/sons/lastparty/message.mp3" autoplay></audio>
                <div id="enigmelieu">
                    <img src="/escaperpg/images/lastparty/appartement.png" alt="appartement">
                    <form action="telephone" method="post">
                        <button type="submit" name="telephonemini" id="phone">
                            <img src="/escaperpg/images/lastparty/telephonemini.png" alt="telephone">
                        </button>
                    </form>
                </div>
                <p>
                    Vous avez encore du mal à vous réveiller complètement.<br>
                    <br>
                    Cette perte de mémoire vous semble tout de même très étrange.<br>
                    Même lors de soirées particulièrement arrosées, vous n'avez jamais eu de trou noir comme ça et vous vous souvenez toujours d'au moins une partie de la soirée.<br>
                    Mais là, rien. Comment pourriez-vous faire pour vous souvenir ?
                </p>
                <?php
                $reponse = "Cliquez sur le téléphone se trouvant sur la table de nuit.";
                $indice1 = "Peut-être devriez-vous essayer de trouver le moyen de contacter l'un de vos proches ?";
                $indice2 = "Il semble d'ailleurs que quelqu'un ait récemment tenté de vous joindre.";
                $indice3 = "Votre téléphone doit bien être quelque part.";
                include_once $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/indices.php";
                ?>
            <?php else: ?>
                <audio src="/escaperpg/sons/lastparty/reveil.mp3" autoplay></audio>
                <p>
                    9h du matin. Le réveil sonne.
                    Vous émergez péniblement du sommeil. Vous avez mal au crâne. Après tout, quoi de plus étonnant après une soirée chez Juliette ?<br>
                    Mais que s'y est-il passé, déjà ? Vous avez beau chercher dans votre mémoire, rien ne vous revient.
                    Le néant depuis que vous êtes parti pour vous rendre là-bas. La soirée a dû être bien arrosée !
                </p>
                <form action="eveil" method="post">
                    <input type="submit" name="suivant" value="Suivant.">
                </form>
            <?php endif; ?>
        </div>
    </main>
    <div id="load">
        <div id="loader"></div>
    </div>
    <script src="/escaperpg/scripts/aventures-chargement.js"></script>
    <?php include_once $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/lastparty/includes/footer.php"; ?>
</body>

</html>
