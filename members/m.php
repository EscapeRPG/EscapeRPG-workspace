<?php session_start();
$succesObtenu = "/escaperpg/includes/succesadd.php";
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
    <title>EscapeRPG - <?php echo ucwords($_GET['id'], " -_<>()[]'\".,!?;/§$+=*|{}&"); ?></title>
</head>

<body>
    <main>
        <?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/header.php";

        if (isset($_GET['id'])): ?>
            <?php
            $getid = htmlspecialchars($_GET['id']);
            $requser = $conn->prepare('SELECT * FROM 0membres WHERE id = ?');
            $requser->execute([$getid]);
            $userexiste = $requser->rowCount();
            ?>
            <?php if ($userexiste != 0): ?>
                <?php $userinfo = $requser->fetch(); ?>
                <div id="formconnexion">
                    <div class="portraitavatarcompte">
                        <img src="/escaperpg/images/uploads/<?= $userinfo['avatar'] ?>">
                    </div>
                    <h1><?= $userinfo['id'] ?></h1>

                    <?php if ($userinfo['id'] == $nomcompte): ?>
                        <form action="edit" method="post"><input type="submit" name="edit" value="Éditer mon profil"></form>
                        <form action="connexion" method="post"><input type="submit" name="disconnect" value="Déconnexion"></form>
                        <?php $_SESSION['avatarcompte'] = $userinfo['avatar']; ?>
                    <?php endif; ?>
                </div>

                <?php if ($userinfo['id'] == $nomcompte): ?>
                    <?php
                    $verifsucces = $conn->prepare('SELECT * FROM 0succes WHERE pseudo = ? && scenario = "general" && description = "inscription"');
                    $verifsucces->execute([$nomcompte]);
                    $succesexiste = $verifsucces->rowCount();
                    ?>
                    <?php if (!$succesexiste): ?>
                        <div id="succespopup">
                            <?php
                            $nouveausucces = '<img src="/escaperpg/images/succes/general/inscription.png"><span><u><b>Première connexion</b></u><br>Se connecter à l\'espace membres d\'EscapeRPG pour la première fois</span>';
                            $scenario = 'general';
                            $description = 'inscription';
                            $cache = 'non';
                            $rarete = 'succesnormal';
                            include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/succesadd.php";
                            ?>
                        </div>
                    <?php endif; ?>
                <?php endif; ?>

                <?php if ($userinfo['id'] == "le narrateur"): ?>
                    <?php
                    $verifsucces = $conn->prepare('SELECT * FROM 0succes WHERE pseudo = ? && scenario = "general" && description = "narrateur"');
                    $verifsucces->execute([$nomcompte]);
                    $succesexiste = $verifsucces->rowCount();
                    ?>
                    <?php if (!$succesexiste): ?>
                        <div id="succespopup">
                            <?php
                            $nouveausucces = '<img src="/escaperpg/images/succes/general/narrateur.png"><span><u><b>Fouineur·euse</b></u><br>Être allé·e voir le profil du Narrateur</span>';
                            $scenario = 'general';
                            $description = 'narrateur';
                            $cache = 'oui';
                            $rarete = 'succesplatine';
                            include $_SERVER['DOCUMENT_ROOT'] . $succesObtenu;
                            ?>
                        </div>
                    <?php endif; ?>
                <?php endif; ?>

                <?php if (isset($_POST['addfriend'])): ?>
                    <div id="succespopup">
                        <?php
                        $amiavatar = $userinfo['avatar'];
                        $enregistrerami = $conn->prepare('INSERT INTO 0amis (idjoueur, idami, avatarami) VALUES (?, ?, ?)');
                        $enregistrerami->execute([$nomcompte, $getid, $amiavatar]);
                        $nouveausucces = '<img src="/escaperpg/images/succes/general/amis.png"><span><u><b>On est mieux à plusieurs !</b></u><br>Avoir ajouté quelqu\'un en tant que partenaire d\'aventure</span>';
                        $scenario = 'general';
                        $description = 'amis';
                        $cache = 'non';
                        $rarete = 'succesnormal';
                        include $_SERVER['DOCUMENT_ROOT'] . $succesObtenu;
                        ?>
                    </div>
                <?php endif; ?>

                <?php if ($userinfo['id'] != "le narrateur"): ?>
                    <h1>Partenaires d'aventure</h1>
                    <?php
                    $friends = $conn->prepare('SELECT * FROM 0amis WHERE idjoueur = ?');
                    $friends->execute([$getid]);
                    $amisajoutes = $friends->rowCount();
                    ?>
                    <div id="containeramis">
                        <?php if ($amisajoutes):
                            while ($listeamis = $friends->fetch()): ?>
                                <a href="/escaperpg/members/m?id=<?= $listeamis['idami'] ?>">
                                    <img src="/escaperpg/images/uploads/<?= $listeamis['avatarami'] ?>" title="<?= $listeamis['idami'] ?>">
                                </a>';
                            <?php endwhile;
                        else: ?>
                            <p>Cette personne n'a pas encore ajouté de partenaire.</p>
                        <?php endif; ?>
                    </div>
                    <?php if ($userinfo['id'] != $nomcompte):
                        $friends = $conn->prepare('SELECT * FROM 0amis WHERE idjoueur = ? && idami = ?');
                        $friends->execute([$nomcompte, $getid]);
                        $amisajoutes = $friends->rowCount();

                        if (!$amisajoutes): ?>
                            <form action="m?id=<?= $getid ?>" method="post"><input type="submit" name="addfriend" value="devenir partenaires d'aventure"></form>
                    <?php endif;
                    endif; ?>
                    <form action="m" method="get"><input type="text" name="id"><input type="submit" class="connecting" value="rechercher un membre"></form>

                    <h1>succès obtenus</h1>
                <?php else: ?>
                    <h1>félicitations d'être arrivé·e ici ! vous méritez bien un succès spécial !</h1>
                <?php endif;

                include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/members/includes/compteurs.php";
                include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/members/includes/general.php";
                include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/members/includes/lastparty.php";
                include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/members/includes/secretsfamiliaux.php";
                include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/members/includes/avent.php";
                include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/members/includes/ambria.php";
                include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/members/includes/gaea1.php";
            else: ?>
                <h1>Cet utilisateur n'existe pas !</h1>
                <form action="m" method="get">
                    <input type="text" name="id"><input type="submit" class="connecting" value="rechercher un membre">
                </form>
        <?php endif;
        endif; ?>
    </main>
    <div id="load">
        <div id="loader"></div>
    </div>
    <script src="/escaperpg/scripts/aventures-chargement.js"></script>
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/footer.php"; ?>
</body>

</html>
