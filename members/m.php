<?php global $conn;
session_start();
$succesObtenu = "/escaperpg/includes/succesAdd.php";

function renderSucces($succes, $isEarned, $scenario): void
{
    $imgPath = "/escaperpg/images/succes/$scenario/"
        . $succes['nom']
        . ($isEarned ? "" : "off")
        . ".png";

    $cssRarete = $isEarned ? "succes" . $succes['rarete'] : "succesbloque";

    if ($succes['cache'] && !$isEarned) {
        return;
    }
?>
    <div class="succesbox">
        <div class="<?= $cssRarete ?>"></div>
        <div class="succesobtenu">
            <img src="<?= $imgPath ?>" alt="<?= htmlspecialchars($succes['titre']) ?>">
            <span>
                <u><b><?= htmlspecialchars($succes['titre']) ?></b></u><br>
                <?= htmlspecialchars($succes['description']) ?>
            </span>
        </div>
    </div>
<?php
}
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
        <?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/header.php"; ?>

        <?php if (isset($_GET['id'])): ?>
            <?php
            $getid = htmlspecialchars($_GET['id']);
            $requser = $conn->prepare('SELECT * FROM 0membres WHERE id = ?');
            $requser->execute([$getid]);
            $userinfo = $requser->fetch();
            ?>

            <?php if ($userinfo): ?>
                <?php $idmembre = $userinfo['pk']; ?>

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
                    <div id="succespopup">
                        <?php
                        $scenario = 'general';
                        $nom = 'inscription';
                        include $_SERVER['DOCUMENT_ROOT'] . $succesObtenu;
                        ?>
                    </div>
                <?php endif; ?>

                <?php if ($userinfo['id'] == "le narrateur"): ?>
                    <div id="succespopup">
                        <?php
                        $scenario = 'general';
                        $nom = 'narrateur';
                        include $_SERVER['DOCUMENT_ROOT'] . $succesObtenu;
                        ?>
                    </div>
                <?php endif; ?>

                <?php if (isset($_POST['addfriend'])): ?>
                    <div id="succespopup">
                        <?php
                        $enregistrerami = $conn->prepare('INSERT INTO 0membre_amis (id_membre, id_ami) VALUES (?, ?)');
                        $enregistrerami->execute([$idjoueur, $idmembre]);

                        $scenario = 'general';
                        $nom = 'amis';
                        include $_SERVER['DOCUMENT_ROOT'] . $succesObtenu;
                        ?>
                    </div>
                <?php endif; ?>

                <?php if ($userinfo['id'] != "le narrateur"): ?>
                    <h1>Partenaires d'aventure</h1>

                    <?php
                    $list = $conn->prepare("
                        SELECT m.*
                        FROM 0membre_amis a
                        JOIN 0membres m ON m.pk = a.id_ami
                        WHERE a.id_membre = ?
                        ORDER BY a.date_add ASC
                    ");
                    $list->execute([$idmembre]);
                    $amis = $list->fetchAll(PDO::FETCH_ASSOC);
                    ?>

                    <div id="containeramis">
                        <?php if ($amis):
                            foreach ($amis as $ami): ?>
                                <a href="/escaperpg/members/m?id=<?= $ami['id'] ?>">
                                    <img src="/escaperpg/images/uploads/<?= $ami['avatar'] ?>" title="<?= $ami['id'] ?>">
                                </a>
                            <?php endforeach;
                        else: ?>
                            <p>Cette personne n'a pas encore ajouté de partenaire.</p>
                        <?php endif; ?>
                    </div>

                    <?php if ($userinfo['id'] != $nomcompte):
                        $friends = $conn->prepare('SELECT * FROM 0membre_amis WHERE id_membre = ? && id_ami = ?');
                        $friends->execute([$idjoueur, $idmembre]);
                        $amisajoutes = $friends->rowCount();

                        if (!$amisajoutes): ?>
                            <form action="m?id=<?= $getid ?>" method="post">
                                <input type="submit" name="addfriend" value="devenir partenaires d'aventure">
                            </form>
                    <?php endif;
                    endif; ?>

                    <form action="m" method="get">
                        <input type="text" name="id">
                        <input type="submit" class="connecting" value="rechercher un membre">
                    </form>

                    <h1>succès obtenus</h1>
                <?php else: ?>
                    <h1>félicitations d'être arrivé·e ici ! vous méritez bien un succès spécial !</h1>
                <?php endif;

                include_once $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/members/includes/compteurs.php";
                include_once $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/members/includes/general.php";
                include_once $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/members/includes/lastparty.php";
                include_once $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/members/includes/secretsfamiliaux.php";
                include_once $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/members/includes/avent.php";
                include_once $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/members/includes/ambria.php";
                include_once $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/members/includes/gaea1.php";
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
