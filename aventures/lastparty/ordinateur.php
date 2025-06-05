<?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/entete.php"; ?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <script type="text/javascript" src="/escaperpg/lightbox/js/prototype.js"></script>
    <script type="text/javascript" src="/escaperpg/lightbox/js/scriptaculous.js?load=effects,builder"></script>
    <script type="text/javascript" src="/escaperpg/lightbox/js/lightbox.js"></script>
    <link rel="stylesheet" href="/escaperpg/lightbox/css/lightbox.css" type="text/css" media="screen">
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/styleAventures.php"; ?>
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/lastparty/includes/styleLastParty.php"; ?>
    <meta charset="utf-8">
    <title>Faceeebook - Last Party</title>
</head>

<body>
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/header.php"; ?>
    <div id="banniere"><img src="/escaperpg/images/lastparty/lpmini.png" alt="last party bannière"></div>
    <main>
        <?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/lastparty/includes/nav.php"; ?>
        <div id="txt">
            <?php if (isset($_POST['rechercher']) && str_replace($search, $replace, stripslashes($_POST['rechercher'])) == "juliette" || isset($_SESSION['juliette'])): ?>
                <?php $_SESSION['juliette'] = true; ?>
                <div id="succespopup">
                    <?php
                    $nouveausucces = '<img src="/escaperpg/images/succes/lastparty/juliette.png"><span><u><b>Le mystère s\'épaissit</b></u><br>Apprendre que tout le monde à la fête a perdu ses souvenirs</span>';
                    $scenario = 'lastparty';
                    $description = 'juliette';
                    $cache = 'oui';
                    $rarete = 'succesnormal';
                    include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/succesadd.php";
                    if (!$succesexiste) {
                        echo $_SESSION['loggedin'] ?
                            '<script src="/escaperpg/scripts/succescount.js"></script>' :
                            '<script src="/escaperpg/scripts/succescountoffline.js"></script>';
                    }
                    ?>
                </div>
                <?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/lastparty/includes/julietteinc.php"; ?>
                <p>Apparemment, vous n'êtes pas le seul à avoir des trous de mémoire. Mais que signifie tout cela ?</p>
                <form action="telephone" method="post">
                    <input type="submit" name="retour" value="DING !">
                </form>
                <?php
                $_SESSION['faceeebook'] = true;
                include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/resetIndices.php";
                ?>
            <?php elseif (isset($_POST['connexion']) || isset($_SESSION['connecte'])): ?>
                <?php if (isset($_SESSION['connecte'])): ?>
                    <?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/lastparty/includes/faceeebookinc.php"; ?>
                    <p>
                        Bien ! Vous êtes maintenant connecté, mais votre fil d'actualités est bien rempli et il serait long et fastidieux de le parcourir jusqu'à trouver le dernier post de votre amie.<br>
                        <br>
                        Vous devriez directement rechercher le profil de <span class="mdp">Juliette</span>.
                    </p>
                    <?php
                    $reponse = "Tapez \"Juliette\" dans la bulle \"rechercher\" tout en haut à gauche de la page Faceeebook.";
                    $indice1 = "Il faudrait trouver comment accéder facilement au profil de Juliette.";
                    $indice2 = "Il y a sans doute un endroit sur la page destiné à effectuer des recherches.";
                    $indice3 = "Consulter le haut de l'écran de Jonathan.";
                    include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/indices.php";
                    if (!in_array('juliette', $_SESSION['mdp'])) {
                        $_SESSION['mdp'][] = 'juliette';
                    }
                    ?>
                <?php else: ?>
                    <?php if (
                        str_replace($search, $replace, stripslashes($_POST['identifiant'])) == "jonathanlt"
                        && str_replace($search, $replace, stripslashes($_POST['mdpasse'] == "party4ever"))
                    ): ?>
                        <div id="succespopup">
                            <?php
                            $nouveausucces = '<img src="/escaperpg/images/succes/lastparty/connexion.png"><span><u><b>Addict des réseaux sociaux</b></u><br>Se connecter à son compte Faceeebook</span>';
                            $scenario = 'lastparty';
                            $description = 'connexion';
                            $cache = 'oui';
                            $rarete = 'succesnormal';
                            include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/succesadd.php";
                            if (!$succesexiste) {
                                echo $_SESSION['loggedin'] ?
                                    '<script src="/escaperpg/scripts/succescount.js"></script>' :
                                    '<script src="/escaperpg/scripts/succescountoffline.js"></script>';
                            }
                            ?>
                        </div>
                        <p>
                            Vos identifiants entrés, vous pouvez maintenant consulter vos compte Faceeebook.
                        </p>
                        <form action="ordinateur" method="post">
                            <input type="submit" name="suivant" value="Suivant.">
                        </form>
                        <?php
                        unset($_SESSION['carnet']);
                        $key = array_search('carnet', $_SESSION['inventaire']);
                        if ($key !== false) {
                            unset($_SESSION['inventaire'][$key]);
                            $_SESSION['inventaire'] = array_values($_SESSION['inventaire']);
                        }
                        $_SESSION['connecte'] = true;
                        include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/resetIndices.php";
                        ?>
                    <?php else: ?>
                        <p>
                            Ça ne semble pas être ça, avez-vous bien tapé vos identifiants ?
                        </p>
                        <form action="ordinateur" method="post">
                            <input type="submit" name="retour" value="Retour.">
                        </form>
                    <?php endif; ?>
                <?php endif; ?>
            <?php elseif (isset($_SESSION['carnet'])): ?>
                <audio src="/escaperpg/sons/lastparty/ordinateur.mp3" autoplay></audio>
                <div id="faceeebookconnexion">
                    <img src="/escaperpg/images/lastparty/logofaceeebook.png" alt="faceeebook logo">
                    <h1>Faceeebook</h1>
                    <div id="connexion">
                        <form action="ordinateur" method="post">
                            <label for="identifiant">Identifiant</label> :<br>
                            <input list="notesListe" name="identifiant" id="identifiant">
                            <datalist id="notesListe"></datalist>
                            <br>
                            <br>
                            <label for="mdpasse">Mot de passe</label> :<br>
                            <input type="password" name="mdpasse" id="mdpasse">
                            <br>
                            <br>
                            <input type="submit" name="connexion" value="Connexion">
                        </form>
                    </div>
                    <p>
                        Français (France) - English (US) - Español - Italiano - Deutsch - Português (Portugal) - +<br>
                        <br>
                        S'inscrire - Connexion - Messager - Faceeebook Live - Personnes - Pages - Lieux<br>
                        Jeux - Groupes - Offres d'emploi - Portail - Confidentialité - Cookies - Pub - Aide
                    </p>
                </div>
                <p>
                    Mince ! Vous n'êtes pas connecté !<br>
                    <br>
                    Votre identifiant est <span class="mdp">jonathan-lt</span> mais le mot de passe n'a pas été enregistré.
                    Heureusement, vous avez votre carnet avec vous, qui contient certainement l'information.
                </p>
                <?php
                $reponse = "D'après votre carnet, le mot de passe pour votre compte Faceeebook est \"party4ever\".";
                $indice1 = "Votre mot de passe doit être inscrit dans votre carnet, pour accéder à Faceeebook.";
                $indice2 = "Ouvrez votre inventaire pour consulter votre carnet";
                $indice3 = "Il y a beaucoup de mots de passe, cherchez celui de Faceeebook";
                include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/indices.php";
                if (!in_array('jonathan-lt', $_SESSION['mdp'])) {
                    $_SESSION['mdp'][] = 'jonathan-lt';
                }
                ?>
                <script src="/escaperpg/scripts/updateDataList.js"></script>
            <?php else: ?>
                <p>
                    Mince ! Vous n'êtes pas connecté !<br>
                    <br>
                    Vous vous souvenez que votre identifiant est <span class="mdp">jonathan-lt</span> mais qu'en est-il du mot de passe ?<br>
                    Avec tous les sites sur lesquels vous êtes inscrit, vous ne savez plus lequel vous avez choisi et votre ordinateur ne semble pas l'avoir enregistré.<br>
                    <br>
                    Heureusement, vous avez pris soin de noter tous vos mots de passe dans un carnet.
                    Mais où est-il rangé ? Vous devriez refaire un petit tour dans votre <span class="lieu">appartement</span>.
                </p>
                <form action="appartement" method="post">
                    <input type="submit" name="retour" value="Retour.">
                </form>
                <?php
                $_SESSION['tiroir'] = true;
                if (!in_array('jonathan-lt', $_SESSION['mdp'])) {
                    $_SESSION['mdp'][] = 'jonathan-lt';
                }
                ?>
                <?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/resetIndices.php"; ?>
            <?php endif; ?>
        </div>
    </main>
    <div id="load">
        <div id="loader"></div>
    </div>
    <script src="/escaperpg/scripts/aventures-chargement.js"></script>
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/lastparty/includes/footer.php"; ?>
</body>

</html>
