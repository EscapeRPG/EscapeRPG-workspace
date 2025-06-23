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
    <title>Bibliothèque - Secrets Familiaux</title>
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
            <?php if (isset($_SESSION['magna']) && isset($_SESSION['templar'])): ?>
                <p>
                    Il ne semble plus rien y avoir d'intéressant ici maintenant.
                </p>
            <?php elseif (isset($_POST['magna'])): ?>
                <script src="/escaperpg/scripts/inventaireadd.js"></script>
                <p>
                    Vous prenez le livre avec vous, au cas où.
                </p>
                <?= isset($_SESSION['templar']) ? "<p>Manifestement, vous n'avez plus rien à trouver ici.</p>" : null; ?>
                <?php if (!isset($_SESSION['templar'])): ?>
                    <form action="bibliotheque" method="post">
                        <input list="notesListe" name="bibliotheque">
                        <datalist id="notesListe"></datalist>
                        <input type="submit" name="chercher" value="Chercher.">
                    </form>
                    <script src="/escaperpg/scripts/updateDataList.js"></script>
                <?php
                endif;
                if (!in_array('magnamater', $_SESSION['inventaire'])) {
                    $_SESSION['inventaire'][] = "magnamater";
                }
                $_SESSION['magna'] = true;
                ?>
            <?php elseif (isset($_POST['templar'])): ?>
                <script src="/escaperpg/scripts/inventaireadd.js"></script>
                <p>
                    Vous prenez les morceaux de papier avec vous, au cas où.
                </p>
                <?= isset($_SESSION['magna']) ? "<p>Manifestement, vous n'avez plus rien à trouver ici.</p>" : null; ?>
                <?php if (!isset($_SESSION['magna'])): ?>
                    <form action="bibliotheque" method="post">
                        <input list="notesListe" name="bibliotheque">
                        <datalist id="notesListe"></datalist>
                        <input type="submit" name="chercher" value="Chercher.">
                    </form>
                <?php
                endif;
                if (!in_array('templar', $_SESSION['inventaire'])) {
                    $_SESSION['inventaire'][] = "templar";
                }
                $_SESSION['templar'] = true;
                ?>
                <script src="/escaperpg/scripts/updateDataList.js"></script>
            <?php elseif (isset($_POST['bibliotheque'])): ?>
                <?php switch (str_replace($search, $replace, stripslashes($_POST['bibliotheque']))):
                    case "symbole": ?>
                        <p>
                            L'un des livres attire votre attention.<br>
                            La couverture comporte un symbole étrangement similaire à celui gravé sur la porte du bureau.<br>
                            Il semblerait que ce symbole procure une protection à l'endroit où on le trace.
                            Sur une porte, cela la rendrait inviolable, à moins de connaitre la bonne formule.<br>
                            <br>
                            En feuilletant les pages, de petits papiers tombent du livre.
                        </p>
                        <div id="enigme">
                            <a href="/escaperpg/images/secrets/templar.png" rel="lightbox[invent]">
                                <img src="/escaperpg/images/secrets/templar.png" alt="un papier avec l'explication d'un code">
                            </a>
                        </div>
                        <form action="bibliotheque" method="post">
                            <input type="submit" name="templar" value="Ajouter à l'inventaire.">
                        </form>
                    <?php break;
                    case "opusfavori": ?>
                        <p>
                            Vous essayez de trouver quel était le livre favori de votre oncle,
                            mais vous baissez rapidement les bras face au nombre extravagant de livres présents ici.<br>
                            <br>
                            Peut-être auriez-vous plus de chance en interrogeant les domestiques ?
                        </p>
                        <form action="bibliotheque" method="post">
                            <input list="notesListe" name="bibliotheque">
                            <datalist id="notesListe"></datalist>
                            <input type="submit" name="chercher" value="Chercher.">
                        </form>
                        <script src="/escaperpg/scripts/updateDataList.js"></script>
                    <?php break;
                    case "magnamater": ?>
                        <div id="enigme">
                            <a href="/escaperpg/images/secrets/magnamater.png" rel="lightbox[invent]">
                                <img src="/escaperpg/images/secrets/magnamater.png" alt="le magna mater">
                            </a>
                        </div>
                        <p>
                            Grâce aux informations fournies par Téona, vous trouvez rapidement un vieux livre nommé Magna Mater.<br>
                            Il semblerait que ce soit un livre traitant d'un ancien culte pratiquement oublié et terrifiant.
                            Vous frissonnez en parcourant les quelques pages qu'il contient mais passez vite à autre chose, ce n'est pas cela qui vous intéresse ici.<br>
                            Il s'agit du <span class="mdp">deuxième</span> tome de la collection.
                        </p>
                        <form action="bibliotheque" method="post">
                            <input type="submit" name="magna" value="Ajouter à l'inventaire.">
                        </form>
                        <?php
                        if (!in_array('Deuxième', $_SESSION['mdp'])) {
                            $_SESSION['mdp'][] = "Deuxième";
                        }
                        ?>
                    <?php break;
                    default: ?>
                        <p>
                            Vous avez beau chercher, vous ne trouvez rien de particulier ici.<br>
                            Ou bien peut-être est-ce parce que vous ne cherchez pas la bonne chose ?
                        </p>
                        <form action="bibliotheque" method="post">
                            <input list="notesListe" name="bibliotheque">
                            <datalist id="notesListe"></datalist>
                            <input type="submit" name="chercher" value="Chercher.">
                        </form>
                        <script src="/escaperpg/scripts/updateDataList.js"></script>
                <?php break;
                endswitch; ?>
            <?php else: ?>
                <p>
                    La pièce est immense et chaque mur est occupé par des étagères remplies de livres de toutes sortes.
                </p>
                <form action="bibliotheque" method="post">
                    <input list="notesListe" name="bibliotheque">
                    <datalist id="notesListe"></datalist>
                    <input type="submit" name="chercher" value="Chercher.">
                </form>
                <script src="/escaperpg/scripts/updateDataList.js"></script>
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
