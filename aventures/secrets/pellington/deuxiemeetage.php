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
    <title>Deuxième étage - Secrets Familiaux</title>
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
            <?php
            if (isset($_POST['fouille'])): ?>
                <?php if (str_replace($search, $replace, stripslashes($_POST['fouille'])) == "barbiturique"): ?>
                    <p>
                        En fouillant un peu, vous finissez par trouver des feuilles traitant de barbituriques et autres narcotiques.<br>
                        <br>
                        Sur l'une d'elles, vous trouvez une recette pour composer un traitement contrant leurs effets.
                    </p>
                    <div id="enigme">
                        <a href="/escaperpg/images/secrets/recette.png" rel="lightbox[invent]">
                            <img src="/escaperpg/images/secrets/recette.png" alt="une recette indiquant comment fabriquer un médicament">
                        </a>
                    </div>
                    <p>
                        Vous la prenez avec vous, cela pourrait s'avérer utile.
                    </p>
                    <form action="deuxiemeetage" method="post">
                        <input type="submit" name="recette" value="Ajouter à l'inventaire.">
                    </form>
                <?php else: ?>
                    <script src="/escaperpg/scripts/inventaireadd.js"></script>
                    <p>
                        Vous estimez avoir passé suffisamment de temps à fouiller cette pièce et vous ne pensez pas pouvoir trouver quoi que ce soit d'autre d'utile ici.
                    </p>
                    <?php
                    if (!in_array("recette", $_SESSION['inventaire'])) {
                        $_SESSION['inventaire'][] = "recette";
                    }

                    $key = array_search('flacon', $_SESSION['inventaire']);
                    if ($key !== false) {
                        unset($_SESSION['inventaire'][$key]);
                        $_SESSION['inventaire'] = array_values($_SESSION['inventaire']);
                    }
                    ?>
                <?php endif; ?>
            <?php elseif (isset($_POST['fouille'])): ?>
                <p>
                    Il ne semble rien y avoir ici en rapport avec ce que vous cherchez.
                </p>
                <form action="deuxiemeetage" method="post">
                    <input list="notesListe" name="fouille">
                    <input type="submit" name="fouiller" value="Fouiller.">
                </form>
            <?php elseif (isset($_SESSION['recette'])): ?>
                <div id="enigme">
                    <a href="/escaperpg/images/secrets/pelldeuxieme.png" rel="lightbox[invent]">
                        <img src="/escaperpg/images/secrets/pelldeuxieme.png" alt="deuxième étage de la maison du docteur Pellington">
                    </a>
                </div>
                <p>
                    Tout cet étage est en fait un laboratoire où le docteur pouvait mener diverses expériences et synthétiser toutes sortes de médicaments.<br>
                    <br>
                    Vous trouvez tout un tas de notes à propos de ses travaux mais elles ne vous semblent d'aucune utilité.
                </p>
            <?php else: ?>
                <div id="enigme">
                    <a href="/escaperpg/images/secrets/pelldeuxieme.png" rel="lightbox[invent]">
                        <img src="/escaperpg/images/secrets/pelldeuxieme.png" alt="deuxième étage de la maison du docteur Pellington">
                    </a>
                </div>
                <p>
                    Tout cet étage est en fait un laboratoire où le docteur pouvait mener diverses expériences et synthétiser toutes sortes de médicaments.<br>
                    <br>
                    Vous trouvez tout un tas de notes à propos de ses travaux.
                </p>
                <form action="deuxiemeetage" method="post">
                    <input list="notesListe" name="fouille">
                    <input type="submit" name="fouiller" value="Fouiller.">
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
