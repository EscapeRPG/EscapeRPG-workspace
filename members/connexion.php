<?php
session_start();
ini_set("safe_mode", "off");
if (isset($_POST['disconnect'])) {
    unset($_COOKIE['LOGGED_USER']);
    setcookie('LOGGED_USER', '', 1, '/');
    $_SESSION['loggedin'] = false;
    $_SESSION['idcompte'] = false;
    $nomcompte = null;
}
isset($_COOKIE['LOGGED_USER']) ? $_SESSION['loggedin'] = true : null;
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <script type="text/javascript" src="/escaperpg/lightbox/js/prototype.js"></script>
    <script type="text/javascript" src="/escaperpg/lightbox/js/scriptaculous.js?load=effects,builder"></script>
    <script type="text/javascript" src="/escaperpg/lightbox/js/lightbox.js"></script>
    <link rel="stylesheet" href="/escaperpg/lightbox/css/lightbox.css" type="text/css" media="screen">
    <link rel="stylesheet" href="/escaperpg/css/style.css">
    <meta charset="utf-8">
    <title>EscapeRPG - Connexion</title>
</head>

<body onload="chargement()">
    <div id="bloc_page">
        <?php
        include_once $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/header.php";
        try {
            $conn = new PDO('mysql:host=localhost;dbname=escapedrpg2534', 'root', '');
            $conn->query("SET NAMES 'utf8'");
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
        if ($_SESSION['loggedin']):
            isset($_COOKIE['LOGGED_USER']) ? $nomcompte = $_COOKIE['LOGGED_USER'] : $nomcompte = $_SESSION['idcompte'];
            header("Location: m?id=" . $nomcompte);
        elseif (isset($_POST['connect'])):
            $nomcompte = htmlspecialchars(strtolower($_POST['pseudocompte']));
            $pass = md5($_POST['pass']);
            $requser = $conn->prepare("SELECT * FROM 0membres WHERE id = ? AND pass = ?");
            $requser->execute(array($nomcompte, $pass));
            $userinfo = $requser->fetch();
            $userexist = $requser->rowCount();
            if ($userexist == 1):
                if (isset($_POST['autolog'])):
                    setcookie('LOGGED_USER', $nomcompte, time() + 365 * 24 * 3600, '/');
                endif;
                $_SESSION['loggedin'] = true;
                $_SESSION['idcompte'] = strtolower($_POST['pseudocompte']);
                $_SESSION['avatarcompte'] = $userinfo['avatar'];
                header("Location: m?id=" . $nomcompte);
            else: ?>
                <h1>Connexion à l'espace membres</h1>
                <h1>Une erreur s'est produite ! Veuillez réessayer.</h1>
                <div id="formconnexion">
                    <form action="connexion" method="post">
                        <input type="text" name="pseudocompte" placeholder="Pseudo" required><br>
                        <input type="password" name="pass" placeholder="Mot de passe" required><br>
                        <br>
                        <label for="autolog">Garder ma session active</label>
                        <input type="checkbox" value="autolog" id="autolog" name="autolog"><br>
                        <input type="submit" class="connecting" name="connect" value="Connexion">
                    </form>
                    <br>
                    <form action="connexion" method="post">
                        <label for="inscription">Vous n'avez pas de compte ? Créez-en un maintenant !</label><br>
                        <input type="submit" name="inscription" id="inscription" value="Créer un compte">
                    </form>
                    <br>
                    <br>
                    <a href="forgot_password">Mot de passe oublié ?</a>
                </div>
            <?php endif;
        elseif (isset($_POST['register'])):
            if (isset($_FILES['avatar']) && $_FILES['avatar']['error'] != 4) {
                $tmpName = $_FILES['avatar']['tmp_name'];
                $filename = $_FILES['avatar']['name'];
                $size = $_FILES['avatar']['size'];
                $error = $_FILES['avatar']['error'];
                $uploads_dir = '../images/uploads';
                $tabExtension = explode('.', $filename);
                $extension = strtolower(end($tabExtension));
                $extensions = ['jpg', 'png', 'jpeg'];
                $maxSize = 4000000;
                if ($error != 0 && $error != 4) {
                    echo 'Il y a eu une erreur, veuillez réessayer.';
                } elseif (in_array($extension, $extensions) && $size <= $maxSize) {
                    $uniqueName = uniqid('', true);
                    $file = $uniqueName . "." . $extension;
                    move_uploaded_file($tmpName, "$uploads_dir/$file");
                    $stoperr = false;
                } elseif ($size >= $maxSize) {
                    echo '<h1>Création d\'un nouveau compte</h1>Fichier trop volumineux ! Taille max autorisée : 4Mo.';
                    $stoperr = true;
                } else {
                    echo '<h1>Création d\'un nouveau compte</h1>Mauvaise extension de fichier ! Seules les images .jpg ou .png sont autorisées.';
                    $stoperr = true;
                }
            } else {
                $file = 'narrateur.png';
                $stoperr = false;
            }
            if ($stoperr): ?>
                <div id="formconnexion">
                    <form action="connexion" method="post" enctype="multipart/form-data">
                        <input type="text" name="pseudocompte" placeholder="Pseudo" required><br>
                        <input type="email" name="email" placeholder="email" required><br>
                        <input type="password" name="pass1" placeholder="Mot de passe" required><br>
                        <input type="password" name="pass2" placeholder="Confirmez le mot de passe" required><br>
                        <br>
                        <input type="file" name="avatar" id="avatar"><br>
                        <label for="avatar">Choisissez un avatar (taille max : 4Mo, fichiers .jpg ou .png uniquement)</label><br>
                        <br>
                        <input type="submit" class="connecting" name="register" value="Valider">
                    </form>
                    <br>
                    <form action="connexion" method="post">
                        <label for="connexion">Vous avez déjà un compte ? Connectez-vous maintenant !</label><br>
                        <input type="submit" name="connexion" id="connexion" value="Se connecter">
                    </form>
                </div>
            <?php elseif ($_POST['pass1'] == $_POST['pass2'] && !$stoperr):
                $nomcompte = htmlspecialchars(strtolower($_POST['pseudocompte']));
                $email = $_POST['email'];
                $pass = md5($_POST['pass1']);
                $requser = $conn->prepare("SELECT * FROM 0membres WHERE id = ?");
                $requser->execute(array($nomcompte));
                $userexist = $requser->rowCount();
                
                if ($userexist == 0):
                    $insertmbr = $conn->prepare("INSERT INTO 0membres (id, email, pass, avatar) VALUES (?, ?, ?, ?)");
                    $insertmbr->execute(array($nomcompte, $email, $pass, $file)); ?>
                    <h1>Votre compte a bien été créé ! Veuillez vous connecter</h1>
                    <div id="formconnexion">
                        <form action="connexion" method="post">
                            <input type="text" name="pseudocompte" placeholder="Pseudo" required><br>
                            <input type="password" name="pass" placeholder="Mot de passe" required><br>
                            <br>
                            <label for="autolog">Garder ma session active</label>
                            <input type="checkbox" value="autolog" id="autolog" name="autolog"><br>
                            <input type="submit" class="connecting" name="connect" value="Connexion">
                        </form>
                        <br>
                        <br>
                        <a href="forgot_password">Mot de passe oublié ?</a>
                    </div>
                <?php else: ?>
                    <h1>Création d'un nouveau compte</h1>
                    <h1>Cet utilisateur existe déjà ! Veuillez réessayer.</h1>
                    <div id="formconnexion">
                        <form action="connexion" method="post" enctype="multipart/form-data">
                            <input type="text" name="pseudocompte" placeholder="Pseudo" required><br>
                            <input type="email" name="email" placeholder="email" required><br>
                            <input type="password" name="pass1" placeholder="Mot de passe" required><br>
                            <input type="password" name="pass2" placeholder="Confirmez le mot de passe" required><br>
                            <br>
                            <input type="file" name="avatar" id="avatar"><br>
                            <label for="avatar">Choisissez un avatar (taille max : 4Mo, fichiers .jpg ou .png uniquement)</label><br>
                            <br>
                            <input type="submit" class="connecting" name="register" value="Valider">
                        </form>
                        <br>
                        <form action="connexion" method="post">
                            <label for="connexion">Vous avez déjà un compte ? Connectez-vous maintenant !</label><br>
                            <input type="submit" name="connexion" id="connexion" value="Se connecter">
                        </form>
                    </div>
                <?php endif;
            else: ?>
                <h1>Création d'un nouveau compte</h1>
                <h1>Les deux mots de passe sont différents ! Veuillez réessayer.</h1>
                <div id="formconnexion">
                    <form action="connexion" method="post" enctype="multipart/form-data">
                        <input type="text" name="pseudocompte" placeholder="Pseudo" required><br>
                        <input type="email" name="email" placeholder="email" required><br>
                        <input type="password" name="pass1" placeholder="Mot de passe" required><br>
                        <input type="password" name="pass2" placeholder="Confirmez le mot de passe" required><br>
                        <br>
                        <input type="file" name="avatar" id="avatar"><br>
                        <label for="avatar">Choisissez un avatar (taille max : 4Mo, fichiers .jpg ou .png uniquement)</label><br>
                        <br>
                        <input type="submit" class="connecting" name="register" value="Valider">
                    </form>
                    <br>
                    <form action="connexion" method="post">
                        <label for="connexion">Vous avez déjà un compte ? Connectez-vous maintenant !</label><br>
                        <input type="submit" name="connexion" id="connexion" value="Se connecter">
                    </form>
                </div>
            <?php endif;
        elseif (isset($_POST['inscription'])): ?>
            <h1>Création d'un nouveau compte</h1>
            <div id="formconnexion">
                <form action="connexion" method="post" enctype="multipart/form-data">
                    <input type="text" name="pseudocompte" placeholder="Pseudo" required><br>
                    <input type="email" name="email" placeholder="email" required><br>
                    <input type="password" name="pass1" placeholder="Mot de passe" required><br>
                    <input type="password" name="pass2" placeholder="Confirmez le mot de passe" required><br>
                    <br>
                    <input type="file" name="avatar" id="avatar"><br>
                    <label for="avatar">Choisissez un avatar (taille max : 4Mo, fichiers .jpg ou .png uniquement)</label><br>
                    <br>
                    <input type="submit" class="connecting" name="register" value="Valider">
                </form>
                <br>
                <form action="connexion" method="post">
                    <label for="connexion">Vous avez déjà un compte ? Connectez-vous maintenant !</label><br>
                    <input type="submit" name="connexion" id="connexion" value="Se connecter">
                </form>
            </div>
        <?php else: ?>
            <h1>Connexion à l'espace membres</h1>
            <div id="formconnexion">
                <form action="connexion" method="post">
                    <input type="text" name="pseudocompte" placeholder="Pseudo" required><br>
                    <input type="password" name="pass" placeholder="Mot de passe" required><br>
                    <br>
                    <label for="autolog">Garder ma session active</label>
                    <input type="checkbox" value="autolog" id="autolog" name="autolog"><br>
                    <input type="submit" class="connecting" name="connect" value="Connexion">
                </form>
                <br>
                <form action="connexion" method="post">
                    <label for="inscription">Vous n\'avez pas de compte ? Créez-en un maintenant !</label><br>
                    <input type="submit" name="inscription" id="inscription" value="Créer un compte">
                </form>
                <br>
                <br>
                <a href="forgot_password">Mot de passe oublié ?</a>
            </div>
        <?php endif; ?>
    </div>
    <div id="load">
        <div id="loader"></div>
    </div>
    <script src="/escaperpg/scripts/aventures-chargement.js"></script>
    <?php include_once $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/footer.php"; ?>
</body>

</html>
