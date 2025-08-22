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
            <?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/secrets/includes/navigationmanoir.php"; ?>
            <?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/secrets/includes/navInputs.php"; ?>
        </nav>
        <div id="txt">
            <?php if (isset($_POST['cave'])):
                switch (str_replace($search, $replace, stripslashes($_POST['cave']))):
                    case "fuite": ?>
                        <p>
                            Vous inspectez les murs de la cave mais vous ne remarquez aucune trace d'humidité.
                            La théorie apportée par les domestiques ne semble pas être la bonne...
                        </p>
                        <form action="cave" method="post">
                            <input list="notesListe" name="cave">
                            <datalist id="notesListe"></datalist>
                            <input type="submit" name="chercher" value="Chercher.">
                        </form>
                        <script src="/escaperpg/scripts/updateDataList.js"></script>
                    <?php break;
                    case "restes": ?>
                        <p>
                            Vous retroussez vos manches et commencez à fouiller les poubelles.
                            Après tout, ce n'est pas la première fois que l'une de vos enquêtes vous mène à fouiller dans des ordures.<br>
                            <br>
                            Au bout d'un moment, vous finissez par sortir quelques morceaux de tableau calcinés que vous essayez de rassembler.
                            Malheureusement, votre oncle a détruit la majeure partie de l'œuvre et vous ne pouvez pas compter le nombre de personnages se trouvant dessus.
                        </p>
                        <div id="enigme">
                            <a href="/escaperpg/images/secrets/tableaubrule.png" rel="lightbox[invent]">
                                <img src="/escaperpg/images/secrets/tableaubrule.png" alt="les morceaux d'un tableau brûlé">
                            </a>
                        </div>
                        <p>
                            Il vous faudrait essayer de savoir à quoi elle ressemble dans son intégralité pour avancer.<br>
                            Dans le doute, vous prenez ces quelques morceaux avec vous.
                        </p>
                        <form action="cave" method="post">
                            <input type="submit" name="restab" value="Ajouter à l'inventaire.">
                        </form>
                    <?php break;
                    default: ?>
                        <p>
                            Vous avez beau chercher, vous ne trouvez rien de particulier ici.
                        </p>
                        <form action="cave" method="post">
                            <input list="notesListe" name="cave">
                            <datalist id="notesListe"></datalist>
                            <input type="submit" name="chercher" value="Chercher.">
                        </form>
                        <script src="/escaperpg/scripts/updateDataList.js"></script>
                <?php break;
                endswitch; ?>
            <?php elseif (isset($_POST['restab'])): ?>
                <script src="/escaperpg/scripts/inventaireadd.js"></script>
                <p>
                    Vous essayez de fouiller un peu plus, mais il est évident maintenant que vous ne trouverez pas d'autres morceaux du tableau pour vous aider à avancer.
                </p>
                <form action="cave" method="post">
                    <input list="notesListe" name="cave">
                    <datalist id="notesListe"></datalist>
                    <input type="submit" name="chercher" value="Chercher.">
                </form>
                <?php
                if (!in_array('tableaubrule', $_SESSION['inventaire'])) {
                    $_SESSION['inventaire'][] = 'tableaubrule';
                }
                ?>
                <script src="/escaperpg/scripts/updateDataList.js"></script>
            <?php else: ?>
                <p>
                    En entrant dans la cave, vous êtes assailli par la terrible <span class="mdp">odeur</span> qui vous a gêné lors de votre arrivée.<br>
                    Elle semble beaucoup plus forte ici. Cependant, vous n'arrivez pas à découvrir d'où elle pourrait provenir précisément.
                </p>
                <form action="cave" method="post">
                    <input list="notesListe" name="cave">
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
