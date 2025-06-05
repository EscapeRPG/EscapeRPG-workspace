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
    <title>Bureau - Secrets Familiaux</title>
</head>

<body>
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/header.php"; ?>
    <div id="banniere"><img src="/escaperpg/images/secrets/secretsfamiliauxmini.png" alt="secrets familiaux bannière"></div>
    <main>
        <nav>
            <?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/secrets/includes/navAvatar.php"; ?>
            <?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/secrets/includes/navInputs.php"; ?>
            <?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/secrets/includes/navigationmanoir.php"; ?>
        </nav>
        <div id="txt">
            <?php if (isset($_POST['phr'])):
                if (str_replace($search, $replace, stripslashes($_POST['phr'])) == "leclaireouvrelechemin"): ?>
                    <p>
                        <audio src="/escaperpg/sons/secrets/bureauouvert.mp3" autoplay></audio>
                        Alors que vous prononcez les mots, vous sentez l'air autour de vous devenir un peu plus dense.<br>
                        <br>
                        Vous entendez un petit bruit, comme un claquement, et la porte s'ouvre.
                    </p>
                    <form action="bureauprive" method="post">
                        <input type="submit" name="entrer" value="Entrer.">
                    </form>
                <?php else: ?>
                    <div id="enigmelieu">
                        <img src="/escaperpg/images/secrets/portebureau.png" alt="porte du bureau">
                        <div id="symbureau">
                            <form action="bureau" method="post">
                                <button type="submit" name="symporte">
                                    <img src="/escaperpg/images/secrets/symbur.png" alt="un étrange symbole gravé sur la porte">
                                </button>
                            </form>
                        </div>
                    </div>
                    <p>
                        Rien ne se passe.
                    </p>
                    <form action="bureau" method="post">
                        <input list="notesListe" name="phr">
                        <datalist id="notesListe"></datalist>
                        <input type="submit" name="ouvrir" value="Ouvrir.">
                    </form>
                    <script src="/escaperpg/scripts/updateDataList.js"></script>
                <?php endif;
            elseif (isset($_POST['symporte'])): ?>
                <p>
                    Un <span class="mdp">symbole</span> est gravé dans le bois de la porte.<br>
                    Vous n'avez aucune idée de sa signification, mais peut-être pourriez-vous poser des questions aux domestiques ?
                </p>
                <form action="bureau" method="post">
                    <input type="submit" name="retour" value="retour">
                </form>
                <?php
                if (!in_array('Symbole', $_SESSION['mdp'])) {
                    $_SESSION['mdp'][] = 'Symbole';
                }
                ?>
            <?php else: ?>
                <div id="enigmelieu">
                    <img src="/escaperpg/images/secrets/portebureau.png" alt="porte du bureau">
                    <div id="symbureau">
                        <form action="bureau" method="post">
                            <button type="submit" name="symporte">
                                <img src="/escaperpg/images/secrets/symbur.png" alt="un étrange symbole gravé sur la porte">
                            </button>
                        </form>
                    </div>
                </div>
                <p>
                    Lorsque vous essayez d'ouvrir le <span class="mdp">bureau</span> de travail de votre oncle, vous vous rendez compte que la porte est fermée.<br>
                    Vous vous apprêtez à sortir le jeu de clés donné par Gaspard lorsque vous constatez qu'il n'y a aucune serrure.<br>
                    <br>
                    Cette porte doit être scellée par un autre moyen.
                </p>
                <form action="bureau" method="post">
                    <input list="notesListe" name="phr">
                    <datalist id="notesListe"></datalist>
                    <input type="submit" name="ouvrir" value="Ouvrir.">
                </form>
                <?php
                if (!in_array('Bureau', $_SESSION['mdp'])) {
                    $_SESSION['mdp'][] = 'Bureau';
                }
                ?>
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
