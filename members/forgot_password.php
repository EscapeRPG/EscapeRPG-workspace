<?php session_start(); ?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <script type="text/javascript" src="/escaperpg/lightbox/js/prototype.js"></script>
    <script type="text/javascript" src="/escaperpg/lightbox/js/scriptaculous.js?load=effects,builder"></script>
    <script type="text/javascript" src="/escaperpg/lightbox/js/lightbox.js"></script>
    <link rel="stylesheet" href="/escaperpg/lightbox/css/lightbox.css" type="text/css" media="screen">
    <link rel="stylesheet" href="/escaperpg/css/style.css">
    <link rel="stylesheet" href="/escaperpg/css/styleCompteBouton.css">
    <link rel="stylesheet" href="/escaperpg/css/styleMembres.css">
    <link rel="stylesheet" href="/escaperpg/css/styleFormulaires.css">
    <link rel="stylesheet" href="/escaperpg/css/styleLoader.css">
    <meta charset="utf-8">
    <title>EscapeRPG - Mot de passe oublié</title>
</head>

<body>
    <main>
        <?php include_once $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/header.php"; ?>
        <h1>Mot de passe oublié</h1>
        <div id="formconnexion">
            <form action="forgot_password" method="post">
                <input type="text" placeholder="Votre pseudo" name="pseudo" required><br>
                <input type="email" placeholder="Votre email" name="email" required><br>
                <br>
                <input type="submit" name="envoyer" value="Réinitialiser le mot de passe">
            </form>
        </div>
        <?php
        if (isset($_POST['envoyer'])) {
            try {
                $conn = new PDO('mysql:host=localhost;dbname=escapedrpg2534', 'root', '');
                $conn->query("SET NAMES 'utf8'");
            } catch (Exception $e) {
                die('Erreur : ' . $e->getMessage());
            }
            $nom = $_POST['pseudo'];
            $email = $_POST['email'];
            $requser = $conn->prepare("SELECT * FROM 0membres WHERE id = ? AND email = ?");
            $requser->execute(array($nom, $email));
            $userexist = $requser->rowCount();
            if ($userexist == 1) {
                $password = uniqid();
                $hashedPassword = md5($password);
                $sujet = 'EscapeRPG - Mot de passe oublié';
                $message = `Bonjour, vous venez de demander un nouveau mot de passe. Pour vous connecter, veuillez utiliser le mot de passe suivant : $password.
                    Nous vous conseillons de le changer dès que vous serez connecté·e, pour plus de sécurité.

                    En vous souhaitant un bon retour parmi nous !`;
                $headers = 'Content-Type: text/plain; charset="UTF-8"';
                if (mail($email, $sujet, $message, $headers)) {
                    $changemdp = $conn->prepare("UPDATE 0membres SET pass = ? WHERE id = ? AND email = ?");
                    $changemdp->execute(array($hashedPassword, $nom, $email));
                    echo '<h1>Email envoyé, vérifiez votre boîte de réception !</h1>';
                } else {
                    echo '<h1>Une erreur est survenue. Merci de vérifier les informations données.</h1>';
                }
            } else {
                echo '<h1>Une erreur est survenue. Merci de vérifier les informations données.</h1>';
            }
        }
        ?>
    </div>
    <div id="load">
        <div id="loader"></div>
    </div>
    <script src="/escaperpg/scripts/aventures-chargement.js"></script>
    <?php include_once $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/footer.php"; ?>
</body>

</html>
