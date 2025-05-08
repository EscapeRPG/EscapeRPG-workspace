<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/entete.php"; ?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <script type="text/javascript" src="/escaperpg/lightbox/js/prototype.js"></script>
    <script type="text/javascript" src="/escaperpg/lightbox/js/scriptaculous.js?load=effects,builder"></script>
    <script type="text/javascript" src="/escaperpg/lightbox/js/lightbox.js"></script>
    <link rel="stylesheet" href="/escaperpg/lightbox/css/lightbox.css" type="text/css" media="screen">
    <link rel="stylesheet" href="/escaperpg/aventures/lastparty/css/style.css">
    <link rel="stylesheet" href="/escaperpg/css/styleSucces.css">
    <link rel="stylesheet" href="/escaperpg/css/styleAventuresInputs.css">
    <link rel="stylesheet" href="/escaperpg/css/styleCompteBouton.css">
    <link rel="stylesheet" href="/escaperpg/css/styleDialogues.css">
    <link rel="stylesheet" href="/escaperpg/css/styleFooterAventures.css">
    <link rel="stylesheet" href="/escaperpg/css/styleLoader.css">
    <meta charset="utf-8">
    <title>La fin de l'histoire - Last Party</title>
</head>

<body>
    <?php include_once $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/header.php"; ?>
    <div id="banniere"><img src="/escaperpg/images/lastparty/lpmini.png" alt="last party bannière"></div>
    <main>
        <nav><img src="/escaperpg/images/lastparty/jonathan.png" alt="jonathan"></nav>
        <div id="txt">
            <?php if (isset($_POST['envoyermessage'])): ?>
                <div id="succespopup">
                    <?php
                    $nouveausucces = '<img src="/escaperpg/images/succes/general/commentaire.png"><span><u><b>Crieur public</b></u><br>Laisser un commentaire en fin d\'aventure</span>';
                    $scenario = 'general';
                    $description = 'commentaire';
                    $cache = 'non';
                    $rarete = 'succesbronze';
                    include_once $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/succesadd.php";
                    ?>
                </div>
                <?php
                if ($_SESSION['loggedin']) {
                    $nom = htmlspecialchars($_SESSION['idcompte']);
                } else {
                    $nom = $_POST['nom'];
                }
                $message = $_POST['message'];
                $stmt = $conn->prepare("INSERT INTO lastpartycoms (pseudo, message) VALUES (?, ?)");
                $stmt->execute([$nom, $message]);
                ?>
                Merci d'avoir enregistré votre commentaire !
            <?php endif; ?>
            <?php if (isset($_POST['fin']) || isset($_SESSION['fin'])): ?>
                <div id="succespopup">
                    <?php
                    $nouveausucces = '<img src="/escaperpg/images/succes/general/fin.png"><span><u><b>Une page qui se tourne...</b></u><br>Terminer sa première aventure</span>';
                    $scenario = 'general';
                    $description = 'fin';
                    $cache = 'non';
                    $rarete = 'succesbronze';
                    include_once $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/succesadd.php";
                    $nouveausucces = '<img src="/escaperpg/images/succes/lastparty/fin.png"><span><u><b>Recouvrer la mémoire</b></u><br>Terminer l\'aventure</span>';
                    $scenario = 'lastparty';
                    $description = 'fin';
                    $cache = 'non';
                    $rarete = 'succesbronze';
                    include_once $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/succesadd.php";
                    ?>
                </div>
                <img src="/escaperpg/images/etoilefinpleine.png" alt="étoile fin">
                <br>
                Félicitations, vous venez de terminer le scénario "Last Party" d'<i>EscapeRPG</i> !<br>
                <p>
                    Il s'agissait ici du scénario de découverte, permettant de découvrir la manière de jouer, mais d'autres aventures vous attendent sur le site !<br>
                    <br>
                    Merci d'avoir pris le temps de jouer.
                    Nous espérons que cette histoire vous aura plu, n'hésitez pas à laisser un commentaire sur la <a href="https://www.facebook.com/escaperpg" target="_blank" rel="noreferrer">page Facebook</a>,
                    chaque message est fortement apprécié !
                    Vous pourrez également y suivre les actualités pour savoir quand les prochains scénarios seront mis en ligne.<br>
                    <br>
                    Si le concept vous plaît, vous pouvez nous soutenir sur notre <a href="https://fr.tipeee.com/escaperpg" target="_blank" rel="noreferrer">page tipeee</a>
                    en nous faisant un don et nous permettre de vous proposer de nouveaux contenus.<br>
                    Chacune de ces pages vous propose des contenus exclusifs et uniques en rapport à leur mode de fonctionnement, n'hésitez donc pas à les consulter pour voir ce que vous pouvez y récupérer !<br>
                    <br>
                    Vous pouvez également laisser un commentaire directement ci-dessous pour faire savoir que vous avez terminé ce scénario !
                </p>
                <?php try {
                    $conn = new PDO('mysql:host=localhost;dbname=escapedrpg2534', 'root', '');
                    $conn->query("SET NAMES 'utf8'");
                } catch (Exception $e) {
                    die('Erreur : ' . $e->getMessage());
                }
                $nombreDeComsParPage = 5;
                $stmt = $conn->query("SELECT COUNT(*) AS nb_coms FROM lastpartycoms");
                $donnees = $stmt->fetch();
                $stmt->closeCursor();
                $totalDesComs = $donnees['nb_coms'];
                $nombreDePages  = ceil($totalDesComs / $nombreDeComsParPage);
                if ($nombreDePages > 10) {
                    $nombreDePages = 10;
                }
                if (isset($_GET['page'])) {
                    $page = $_GET['page'];
                } else {
                    $page = 1;
                }
                $premierComAafficher = ($page - 1) * $nombreDeComsParPage;
                $reponse = $conn->query("SELECT * FROM lastpartycoms ORDER BY id DESC LIMIT " . $premierComAafficher . ", " . $nombreDeComsParPage);
                ?>
                <?php if ($totalDesComs == 0): ?>
                    <p>Apparemment, personne n'a laissé de commentaire avant vous !</p>
                <?php else: ?>
                    <?php while ($donnees = $reponse->fetch()): ?>
                        <div class="dialogue">
                            <div class="portrait"><i><?= $donnees['pseudo'] ?> : </i></div>
                            <div class="bulleperso">
                                <p><?= $donnees['message'] ?></p>
                            </div>
                        </div>
                    <?php endwhile; ?>
                <?php endif; ?>
                <?php $reponse->closeCursor(); ?>
                <br>
                <div class="dialogue">
                    <?php for ($i = 1; $i <= $nombreDePages; $i++): ?>
                        <?php if ($i == $nombreDePages): ?>
                            <a href="fin.php?page=<?= $i ?>">Page <?= $i ?></a>
                        <?php else: ?>
                            <a href="fin.php?page=<?= $i ?>">Page <?= $i ?></a> -
                        <?php endif; ?>
                    <?php endfor; ?>
                </div>
                <br>
                <form action="fin" method="post">
                    <fieldset>
                        <label for="nom">Votre nom (20 caractères max) :</label>
                        <input type="text" name="nom" id="nom" placeholder="Votre pseudo" value="<?= $_SESSION['loggedin'] ? ucwords($_SESSION['idcompte']) : null ?>" required><br>
                        <br>
                        <label for=" message">Votre message :</label>
                        <textarea name="message" id="message" rows="7" cols="50">J'ai terminé ce scénario !</textarea><br>
                        <br>
                        <input type="submit" name="envoyermessage" value="Laisser un commentaire.">
                    </fieldset>
                </form>
                <p>À bientôt pour de nouvelles aventures !</p>
                <form action="/index.php#bloc2" method="post">
                    <input type="submit" name="retour" value="Retour à l'accueil.">
                </form>
                <?php $_SESSION['fin'] = true; ?>
            <?php else: ?>
                <?php include_once $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/sessioninc.php"; ?>
                <p>
                    Vous parcourez à nouveau les lignes de cet email, n'en croyant pas vos yeux.<br>
                    Mais oui ! Ce que dit ce Darren Braun est vrai ! Vous vous souvenez de l'intégralité de votre soirée d'hier à présent !<br>
                    <br>
                    Vous y êtes arrivé vers 19h.
                    Le fameux Darren Braun est arrivé peu de temps après et Juliette l'a présenté à tout le monde.
                    Elle a expliqué sa présence et certains <i>- dont vous -</i> se sont gentiment moqués d'elle car très sceptiques à ce sujet.<br>
                    <br>
                    Vous avez très vite repris le cours de la soirée et vous vous souvenez maintenant des différents clichés que vous avez pris, donc ceux qui vous ont permis de découvrir la vérité !<br>
                    La soirée était vraiment amusante, comme toujours avec Juliette qui essaye à chaque fois de proposer de nouvelles activités à ses amis.
                    Vous êtes rentrés tard cette nuit-là, après en avoir bien profité, puis vous êtes endormi... jusqu'à ce matin où vous ne vous souveniez plus de rien !<br>
                    <br>
                    Amusé, vous envoyez un message à Juliette pour lui dire que vous avez résolu son enquête puis envoyez un message à Axel.
                </p>
                <form action="fin" method="post">
                    <input type="submit" name="fin" value="ÉBAUBI">
                </form>
            <?php endif; ?>
        </div>
    </main>
    <div id="load">
        <div id="loader"></div>
    </div>
    <script src="/escaperpg/scripts/aventures-chargement.js"></script>
    <?php include_once $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/lastparty/includes/footer.php"; ?>
</body>

</html>
