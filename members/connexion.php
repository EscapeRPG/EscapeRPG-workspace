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
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/styleGeneral.php"; ?>
    <meta charset="utf-8">
    <title>EscapeRPG - Connexion</title>
</head>

<body>
    <main>
        <?php
        include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/header.php";

        function afficherFormulaire($message = '')
        {
            echo "<h1>Création d'un nouveau compte</h1>";
            if ($message) {
                echo "<h2 style='color:red;'>$message</h2>";
            }
        ?>
            <div id="formconnexion">
                <form action="connexion" method="post" enctype="multipart/form-data">
                    <input type="text" name="pseudocompte" placeholder="Pseudo (20 caractères max)" maxlength="20" required><br>
                    <input type="email" name="email" placeholder="email" required><br>
                    <input type="password" name="pass1" placeholder="Mot de passe" required><br>
                    <input type="password" name="pass2" placeholder="Confirmez le mot de passe" required><br><br>
                    <input type="file" name="avatar" id="avatar"><br>
                    <label for="avatar">Avatar (max 4Mo, .jpg/.png uniquement)</label><br><br>
                    <input type="submit" class="connecting" name="register" value="Valider">
                </form><br>
                <form action="connexion" method="post">
                    <label for="connexion">Vous avez déjà un compte ?</label><br>
                    <input type="submit" name="connexion" value="Se connecter">
                </form>
            </div>
            <?php
        }

        if ($_SESSION['loggedin']):
            isset($_COOKIE['LOGGED_USER']) ? $nomcompte = $_COOKIE['LOGGED_USER'] : $nomcompte = $_SESSION['idcompte'];
            header("Location: m?id=" . $nomcompte);
            exit;
        endif;
        if (isset($_POST['connect'])):
            $nomcompte = htmlspecialchars(strtolower($_POST['pseudocompte']));
            $requser = $conn->prepare("SELECT * FROM 0membres WHERE id = ?");
            $requser->execute(array($nomcompte));
            $userinfo = $requser->fetch();
            if ($userinfo):
                $pass_input = $_POST['pass'];
                $pass_db = $userinfo['pass'];

                if (password_verify($pass_input, $pass_db) || md5($pass_input === $pass_db)):
                    if (md5($pass_input) === $pass_db):
                        $newhash = password_hash($pass_input, PASSWORD_DEFAULT);
                        $update = $conn->prepare("UPDATE 0membres SET pass = ? WHERE id = ?");
                        $update->execute([$newhash, $nomcompte]);
                    endif;

                    if (isset($_POST['autolog'])):
                        setcookie('LOGGED_USER', $nomcompte, time() + 365 * 24 * 3600, '/');
                    endif;
                    $_SESSION['loggedin'] = true;
                    $_SESSION['idcompte'] = strtolower($_POST['pseudocompte']);
                    $_SESSION['avatarcompte'] = $userinfo['avatar'];
                    header("Location: m?id=" . urlencode($nomcompte));
                    exit;
                endif;
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
                <?php  endif;
        elseif (isset($_POST['register'])):
            $stoperr = false;
            $uploads_dir = '../images/uploads';
            $file = 'narrateur.png';

            if (isset($_FILES['avatar']) && $_FILES['avatar']['error'] != 4):
                $tmpName = $_FILES['avatar']['tmp_name'];
                $filename = $_FILES['avatar']['name'];
                $size = $_FILES['avatar']['size'];
                $error = $_FILES['avatar']['error'];
                $extension = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
                $allowedExtensions = ['jpg', 'png', 'jpeg'];
                $maxSize = 4 * 1024 * 1024;

                if ($error !== 0):
                    afficherFormulaire("Erreur lors de l'upload. Veuillez réessayer.");
                    $stoperr = true;
                elseif (!in_array($extension, $allowedExtensions)):
                    afficherFormulaire("Extension invalide. Seules les images .jpg/.png sont autorisées.");
                    $stoperr = true;
                elseif ($size > $maxSize):
                    afficherFormulaire("Fichier trop volumineux ! Taille max autorisée : 4Mo.");
                    $stoperr = true;
                else:
                    $uniqueName = uniqid('', true) . ".$extension";
                    move_uploaded_file($tmpName, "$uploads_dir/$uniqueName");
                    $file = $uniqueName;
                endif;
            endif;

            if (!$stoperr && $_POST['pass1'] !== $_POST['pass2']):
                afficherFormulaire("Les deux mots de passe sont différents !");
                $stoperr = true;
            endif;

            if (!$stoperr):
                $nomcompte = htmlspecialchars(strtolower(trim($_POST['pseudocompte'])));
                $email = trim($_POST['email']);
                $pass = password_hash($_POST['pass1'], PASSWORD_DEFAULT);
                $requser = $conn->prepare("SELECT * FROM 0membres WHERE id = ?");
                $requser->execute([$nomcompte]);

                if ($requser->rowCount() > 0):
                    afficherFormulaire("Cet utilisateur existe déjà !");
                else:
                    $insertmbr = $conn->prepare("INSERT INTO 0membres (id, email, pass, avatar) VALUES (?, ?, ?, ?)");
                    $insertmbr->execute([$nomcompte, $email, $pass, $file]); ?>
                    <h1>Votre compte a bien été créé ! Veuillez vous connecter</h1>
                    <div id="formconnexion">
                        <form action="connexion" method="post">
                            <input type="text" name="pseudocompte" placeholder="Pseudo" required><br>
                            <input type="password" name="pass" placeholder="Mot de passe" required><br><br>
                            <label><input type="checkbox" name="autolog"> Garder ma session active</label><br>
                            <input type="submit" class="connecting" name="connect" value="Connexion">
                        </form><br><a href="forgot_password">Mot de passe oublié ?</a>
                    </div>
            <?php endif;
            endif;

        elseif (isset($_POST['inscription'])):
            afficherFormulaire();
        else: ?>
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
    </main>
    <div id="load">
        <div id="loader"></div>
    </div>
    <script src="/escaperpg/scripts/aventures-chargement.js"></script>
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/footer.php"; ?>
</body>

</html>
