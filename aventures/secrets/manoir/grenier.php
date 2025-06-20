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
    <title>Grenier - Secrets Familiaux</title>
</head>

<body>
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/header.php"; ?>
    <div id="banniere"><img src="/escaperpg/images/secrets/secretsfamiliauxmini.png" alt="secrets familiaux bannière"></div>
    <main>
        <nav>
            <?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/secrets/includes/navAvatar.php"; ?>
            <?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/secrets/includes/navigationmanoir.php"; ?>
            <?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/secrets/includes/navInputs.php"; ?>
        </nav>
        <div id="txt">
            <?php if (in_array('pieceev', $_SESSION['inventaire'])): ?>
                <div id="enigmelieu">
                    <img src="/escaperpg/images/secrets/vuegrenier.png" alt="grenier">
                </div>
                <p>
                    Il semblerait qu'il n'y ait plus rien d'utile par ici.
                </p>
            <?php elseif (isset($_SESSION['jour']) || isset($_SESSION['visitepellington'])): ?>
                <?php if (isset($_POST['sev'])): ?>
                    <script src="/escaperpg/scripts/inventaireadd.js"></script>
                    <p>
                        Il semblerait que vous n'ayez plus rien à trouver par ici.
                    </p>
                    <form action="grenier" method="post">
                        <input type="submit" name="retour" value="Retour.">
                    </form>
                    <?php
                    if (!in_array('pieceev', $_SESSION['inventaire'])) {
                        $_SESSION['inventaire'][] = 'pieceev';
                    }
                    ?>
                <?php elseif (isset($_POST['grenierpiece'])): ?>
                    <div id="enigme">
                        <a href="/escaperpg/images/secrets/ev.png" rel="lightbox[invent]">
                            <img src="/escaperpg/images/secrets/ev.png" alt="pièce avec une tête de femme">
                        </a>
                    </div>
                    <p>
                        Sur le clavier du piano, vous trouvez une petite pièce.<br>
                        Cela ne ressemble pas à une pièce de monnaie, car elle ne semble pas avoir de valeur indiquée dessus.
                        Peut-être sert-elle à autre chose ?<br>
                        <br>
                        En attendant d'en savoir plus, vous la mettez dans votre poche.
                    </p>
                    <form action="grenier" method="post">
                        <input type="submit" name="sev" value="Ajouter à l'inventaire.">
                    </form>
                <?php elseif (isset($_POST['piano']) || isset($_SESSION['grenierpiano'])): ?>
                    <div id="enigmelieu">
                        <img src="/escaperpg/images/secrets/vuegrenier.png" alt="grenier">
                        <div id="grenierpiece">
                            <form action="grenier" method="post">
                                <button type="submit" name="grenierpiece">
                                    <img src="/escaperpg/images/secrets/grenierpiece.png" alt="une pièce sur le clavier">
                                </button>
                            </form>
                        </div>
                    </div>
                    <p>
                        Vous ouvrez le clavier du piano.
                        En appuyant sur l'une des touches, vous entendez une note discordante retentir.
                        Cet instrument mériterait une bonne révision.
                    </p>
                    <?php $_SESSION['grenierpiano'] = true; ?>
                <?php else: ?>
                    <div id="enigmelieu">
                        <img src="/escaperpg/images/secrets/vuegrenier.png" alt="grenier">
                        <div id="piano">
                            <form action="grenier" method="post">
                                <button type="submit" name="piano">
                                    <img src="/escaperpg/images/secrets/pianoclosed.png" alt="un vieux piano">
                                </button>
                            </form>
                        </div>
                    </div>
                    <p>
                        Le grenier occupe tout le dernier étage de l'aile Est et est rempli de tout un tas d'affaires.<br>
                        Maintenant que le jour est levé, vous pouvez envisager de fouiller un peu plus dans toutes ces affaires. Peut-être y trouverez-vous quelque chose d'intérêt ?
                    </p>
                <?php endif; ?>
            <?php else: ?>
                <div id="enigmelieu">
                    <img src="/escaperpg/images/secrets/vuegreniernuit.png" alt="grenier">
                </div>
                <p>
                    Le grenier occupe tout le dernier étage de l'aile Est et est rempli de tout un tas d'affaires.<br>
                    Il pourrait y avoir des choses intéressantes ici, mais vous y reviendrez plus tard, lorsque vous serez moins fatigué et qu'il y aura plus de lumière.
                </p>
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
