<?php
session_start();
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
    <title>EscapeRPG - Édition de profil</title>
</head>

<body>
    <main>
        <?php
        include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/header.php";
        $stmt = $conn->prepare("SELECT email FROM 0membres WHERE id = ?");
        $stmt->execute([$nomcompte]);
        $info = $stmt->fetch();
        ?>
        <div id="formconnexion">
            <?php
            if (isset($_POST['maj'])) {
                $pass = $_POST['pass1'];
                $pass2 = $_POST['pass2'];
                $pass3 = $_POST['pass3'];
                $email = $_POST['email'];
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
                        echo 'Il y a eu une erreur, veuillez réessayer pour mettre votre avatar à jour.<br>';
                    } elseif (in_array($extension, $extensions) && $size <= $maxSize) {
                        $uniqueName = uniqid('', true);
                        $file = $uniqueName . "." . $extension;
                        move_uploaded_file($tmpName, "$uploads_dir/$file");
                        $checkuser = $conn->prepare("SELECT * FROM 0membres WHERE id=?");
                        $checkuser->execute([$nomcompte]);
                        $userexist = $checkuser->fetch();
                        if ($userexist) {
                            $editmbr = $conn->prepare("UPDATE 0membres SET avatar=? WHERE id=?");
                            $editmbr->execute([$file, $nomcompte]);
                            $editami = $conn->prepare("UPDATE 0amis SET avatarami=? WHERE idami=?");
                            $editami->execute([$file, $nomcompte]);
                            $requser = $conn->prepare("SELECT * FROM 0membres WHERE id = ?");
                            $requser->execute([$nomcompte]);
                            $userinfo = $requser->fetch();
                            echo '<h1>Votre avatar a bien été mis à jour !</h1>';
                            $_SESSION['avatarcompte'] = $file;
                        }
                    } elseif ($size >= $maxSize) {
                        echo 'Fichier trop volumineux ! Taille max autorisée : 4Mo. Veuillez réessayer pour mettre votre avatar à jour.<br>';
                    } else {
                        echo 'Mauvaise extension de fichier ! Seules les images .jpg ou .png sont autorisées. Veuillez réessayer pour mettre votre avatar à jour.<br>';
                    }
                }
                if (isset($email) && $email != $info['email']) {
                    $editmail = $conn->prepare("UPDATE 0membres SET email=? WHERE id=?");
                    $editmail->execute([$email, $nomcompte]);
                    $requser = $conn->prepare("SELECT * FROM 0membres WHERE id = ?");
                    $requser->execute([$nomcompte]);
                    $userinfo = $requser->fetch();
                    echo '<h1>Votre adresse email a bien été mise à jour !</h1>';
                }
                if (!empty($_POST['pass2'])) {
                    if ($_POST['pass2'] === $_POST['pass3']) {
                        $checkuser = $conn->prepare("SELECT * FROM 0membres WHERE id=?");
                        $checkuser->execute([$nomcompte]);
                        $userexist = $checkuser->fetch();
                        if ($userexist) {
                            $pass_input = $_POST['pass1'];
                            $pass_db = $userexist['pass'];

                            if (password_verify($pass_input, $pass_db) || md5($pass_input) === $pass_db) {
                                $newpassword = password_hash($_POST['pass2'], PASSWORD_DEFAULT);
                                $editmbr = $conn->prepare("UPDATE 0membres SET pass=? WHERE id=?");
                                $editmbr->execute([$newpassword, $nomcompte]);
                                echo '<h1>Votre mot de passe a bien été mis à jour !</h1>';
                            } else {
                                echo 'Le mot de passe actuel est incorrect ! Veuillez réessayer pour le mettre à jour.<br>';
                            }
                        }
                    } else {
                        echo 'Les nouveaux mots de passe entrés ne correspondent pas. Veuillez réessayer pour mettre votre mot de passe à jour.<br>';
                    }
                }
            }
            ?>
            <form action="edit" method="post" enctype="multipart/form-data">
                <div class="portraitavatarcompte">
                    <img src="/escaperpg/images/uploads/<?= htmlspecialchars($_SESSION['avatarcompte']) ?>" class="cover" alt="avatar">
                </div>
                <br>
                <input type="file" name="avatar">
                <br>
                <h1><?= htmlspecialchars($nomcompte) ?></h1>
                Changer mon adresse mail :<br>
                <input type="email" name="email" value="<?= $info['email'] ?>">
                <br>
                <br>
                Changer mon mot de passe :<br>
                <input type="password" name="pass1" placeholder="Mot de passe actuel">
                <br>
                <input type="password" name="pass2" placeholder="Nouveau mot de passe">
                <br>
                <input type="password" name="pass3" placeholder="Confirmez le nouveau mot de passe">
                <br>
                <br>
                <input type="submit" class="connecting" name="maj" value="Mettre à jour les informations">
            </form>
            <form action="m?id=<?= $nomcompte ?>" method="post"><input type="submit" name="retour" value="Retour"></form>
        </div>
    </main>
    <div id="load">
        <div id="loader"></div>
    </div>
    <script src="/escaperpg/scripts/aventures-chargement.js"></script>
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/footer.php"; ?>
</body>

</html>
