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
    <title>Cave - Secrets Familiaux</title>
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
            <?php if (isset($_POST['note'])): ?>
                <script src="/escaperpg/scripts/inventaireadd.js"></script>
                <p>
                    Dans la chaudière, vous apercevez les restes calcinés d'un livre à la couverture de cuir d'un aspect étrange dont vous arrivez avec peine à lire le titre : Necronomicon.
                    Vous voyez aussi dans le foyer des notes traitant des expériences menées par William, votre oncle.<br>
                    Vous éteignez le feu aussi vite que possible et essayez d'extraire les documents mais ceux-ci sont malheureusement beaucoup trop abîmés pour en tirer quoi que ce soit à présent.
                    Cependant, un petit éclat de lumière au milieu des braises encore rougeoyantes attire votre regard.<br>
                    <br>
                    Vous écartez les morceaux incandescents et trouvez une nouvelle pièce que vous empochez aussitôt.
                <div id="enigme">
                    <a href="/escaperpg/images/secrets/se.png" rel="lightbox[invent]">
                        <img src="/escaperpg/images/secrets/se.png" alt="pièce avec un serpent">
                    </a>
                </div>
                </p>
                <form action="cave" method="post">
                    <input type="submit" name="sse" value="Ajouter à l'inventaire.">
                </form>
                <?php
                if (!in_array("Aveux", $_SESSION['inventaire'])) {
                    $_SESSION['inventaire'][] = "Aveux";
                }
                ?>
            <?php elseif (isset($_POST['sse'])): ?>
                <script src="/escaperpg/scripts/inventaireadd.js"></script>
                <p>
                    Vous semblez avoir trouvé ce que vous cherchiez ici, mais vous pouvez continuer à fouiller la maison de Pellington si vous le désirez,
                    avant de retourner au <span class="lieu">manoir</span>.
                </p>
                <form action="/escaperpg/aventures/secrets/manoir/rdc" method="post">
                    <input type="submit" name="retour" value="Retour au manoir.">
                </form>
                <?php
                $_SESSION['visitepellington'] = true;
                unset($_SESSION['jour']);
                if (!in_array("piecese", $_SESSION['inventaire'])) {
                    $_SESSION['inventaire'][] = "piecese";
                }
                ?>
            <?php elseif ($_SESSION['visitepellington']): ?>
                <p>
                    Vous semblez avoir trouvé ce que vous cherchiez ici, mais vous pouvez continuer à fouiller la maison de Pellington si vous le désirez,
                    avant de retourner au <span class="lieu">manoir</span>.
                </p>
                <form action="../manoir/rdc" method="post">
                    <input type="submit" name="retour" value="Retour au manoir.">
                </form>
            <?php else: ?>
                <div id="enigme">
                    <a href="/escaperpg/images/secrets/pellcave.png" rel="lightbox[invent]">
                        <img src="/escaperpg/images/secrets/pellcave.png" alt="cave du docteur Pellington">
                    </a>
                </div>
                <p>
                    En arrivant dans la cave, vous sentez une odeur de brûlé.<br>
                    Vous descendez l'escalier et entrez dans la salle de la chaudière.<br>
                    <br>
                    Avec horreur, vous faites une macabre découverte : le docteur Pellington est affalé sur une chaise faisant face au fourneau,
                    un trou béant dans le crâne et un revolver resté accroché dans sa main pendante.
                    Le mur à côté de lui est recouvert de sang.
                    Il semblerait que le pauvre homme se soit donné la mort peu de temps avant votre arrivée.<br>
                    <br>
                    Vous déglutissez avec peine et vous approchez pour trouver un mot sur le sol, griffoné à la hâte. Les derniers mots de Pellington :<br>
                </p>
                <div id="enigme">
                    <a href="/escaperpg/images/secrets/aveux.png" rel="lightbox[invent]">
                        <img src="/escaperpg/images/secrets/aveux.png" alt="les aveux du docteur Pellington">
                    </a>
                </div>
                <p>
                    Vous prenez la note avec vous.
                </p>
                <form action="cave" method="post">
                    <input type="submit" name="note" value="Ajouter à l'inventaire.">
                </form>
                <?php
                if (!in_array("Opus favori", $_SESSION['mdp'])) {
                    $_SESSION['mdp'][] = "Opus favori";
                }
                if (!in_array("Tableau", $_SESSION['mdp'])) {
                    $_SESSION['mdp'][] = "Tableau";
                }
                ?>
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
