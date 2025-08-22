<?php
include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/entete.php";
$succesadd = "/escaperpg/includes/succesadd.php";
?>
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
    <title>Fin - Secrets Familiaux</title>
</head>

<body>
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/header.php"; ?>
    <div id="banniere"><img src="/escaperpg/images/secrets/secretsfamiliauxmini.png" alt="secrets familiaux bannière"></div>
    <main>
        <div id="txt">
            <?php if (isset($_POST['envoyermessage'])): ?>
                <?php
                $comScenarioEnCours = 'secretscoms';
                include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/succesComment.php";
                ?>
            <?php endif; ?>
            <?php if (isset($_POST['fin']) || $_SESSION['fin']): ?>
                <div id="succespopup">
                    <?php
                    $nouveausucces = '<img src="/escaperpg/images/succes/general/fin.png"><span><u><b>Une page qui se tourne...</b></u><br>Terminer sa première aventure</span>';
                    $scenario = 'general';
                    $description = 'fin';
                    $cache = 'non';
                    $rarete = 'succesbronze';
                    include $_SERVER['DOCUMENT_ROOT'] . $succesadd;
                    $nouveausucces = '<img src="/escaperpg/images/succes/general/meilleurefin.png"><span><u><b>Explorateur·rice sans faille</b></u><br>Terminer une aventure en obtenant la meilleure fin possible</span>';
                    $scenario = 'general';
                    $description = 'meilleurefin';
                    $cache = 'non';
                    $rarete = 'succesdiamant';
                    include $_SERVER['DOCUMENT_ROOT'] . $succesadd;
                    $nouveausucces = '<img src="/escaperpg/images/succes/secrets/fin.png"><span><u><b>Ainsi s\'achève l\'histoire</b></u><br>Terminer l\'aventure</span>';
                    $scenario = 'secrets';
                    $description = 'fin';
                    $cache = 'non';
                    $rarete = 'succesbronze';
                    include $_SERVER['DOCUMENT_ROOT'] . $succesadd;
                    $nouveausucces = '<img src="/escaperpg/images/succes/secrets/fin1.png"><span><u><b>Victime</b></u><br>Terminer l\'aventure et obtenir 1 étoile</span>';
                    $scenario = 'secrets';
                    $description = 'étoile1';
                    $cache = 'oui';
                    $rarete = 'succesbronze';
                    include $_SERVER['DOCUMENT_ROOT'] . $succesadd;
                    $nouveausucces = '<img src="/escaperpg/images/succes/secrets/fin2.png"><span><u><b>Martyr</b></u><br>Terminer l\'aventure et obtenir 2 étoiles</span>';
                    $scenario = 'secrets';
                    $description = 'étoile2';
                    $cache = 'oui';
                    $rarete = 'succesargent';
                    include $_SERVER['DOCUMENT_ROOT'] . $succesadd;
                    $nouveausucces = '<img src="/escaperpg/images/succes/secrets/fin3.png"><span><u><b>Pyromane</b></u><br>Terminer l\'aventure et obtenir 3 étoiles</span>';
                    $scenario = 'secrets';
                    $description = 'étoile3';
                    $cache = 'oui';
                    $rarete = 'succesgold';
                    include $_SERVER['DOCUMENT_ROOT'] . $succesadd;
                    $nouveausucces = '<img src="/escaperpg/images/succes/secrets/fin4.png"><span><u><b>Professionnel</b></u><br>Terminer l\'aventure et obtenir 4 étoiles</span>';
                    $scenario = 'secrets';
                    $description = 'étoile4';
                    $cache = 'oui';
                    $rarete = 'succesdiamant';
                    include $_SERVER['DOCUMENT_ROOT'] . $succesadd;
                    $nouveausucces = '<img src="/escaperpg/images/succes/secrets/shoggoth.png"><span><u><b>Bannisseur</b></u><br>Réussir à se débarrasser de la terrible créature !</span>';
                    $scenario = 'secrets';
                    $description = 'shoggoth';
                    $cache = 'oui';
                    $rarete = 'succesargent';
                    include $_SERVER['DOCUMENT_ROOT'] . $succesadd;
                    ?>
                </div>
                <div id="enigme">
                    <img src="/escaperpg/images/secrets/fin.png" alt="fin">
                </div>
                <img src="/escaperpg/images/etoilefinpleine.png" alt="étoile pleine">
                <img src="/escaperpg/images/etoilefinpleine.png" alt="étoile pleine">
                <img src="/escaperpg/images/etoilefinpleine.png" alt="étoile pleine">
                <img src="/escaperpg/images/etoilefinpleine.png" alt="étoile pleine">
                <br>
                Félicitations, vous venez de terminer le scénario "Secrets Familiaux" d'<i>EscapeRPG</i> !
                <p>
                    De plus, vous avez obtenu la meilleure fin possible, bravo !<br>
                    <br>
                    Merci d'avoir pris le temps de jouer.
                    J'espère que cette histoire vous aura plu, n'hésitez pas à laisser un commentaire sur la <a href="https://www.facebook.com/escaperpg" target="_blank" rel="noreferrer">page Facebook</a>,
                    chaque message est fortement apprécié !
                    Vous pourrez également y suivre les actualités pour savoir quand les prochains scénarios seront mis en ligne.<br>
                    <br>
                    Si le concept vous plaît, vous pouvez nous soutenir sur notre <a href="https://fr.tipeee.com/escaperpg" target="_blank" rel="noreferrer">page tipeee</a>
                    en nous faisant un don et nous permettre de vous proposer de nouveaux contenus.<br>
                    Chacune de ces pages vous propose des contenus exclusifs et uniques en rapport à leur mode de fonctionnement, n'hésitez donc pas à les consulter pour voir ce que vous pouvez y récupérer !<br>
                    <br>
                    Vous pouvez également laisser un commentaire directement ci-dessous pour faire savoir que vous avez terminé ce scénario !
                </p>
                <?php
                $scenarioEnCours = "secretscoms";
                include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/commentairesAventures.php";
                ?>
            <?php else: ?>
                <?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/sessioninc.php"; ?>
                <audio src="/escaperpg/sons/secrets/shoggothexpulse.mp3" autoplay></audio>
                <p>
                    Quelques secondes après que le cercle ait commencé à s'illuminer, l'électricité du manoir se coupe et seule la faible lumière magique vous éclaire.
                    Malgré vos réparations, le shoggoth a dû arracher le boîtier et couper le système électrique.<br>
                    <br>
                    Vous entendez alors un bruit de mouvement au-dessus de vous, le monstre est en train de sortir du bureau !<br>
                    Émettant un sifflement étrange dans lequel vous sentez poindre de la colère, le monstre se rue sur l'escalier à une vitesse ahurissante pour une créature de cette taille.
                    Créant des sortes de pattes et tentacules pour se déplacer, il s'arrête juste à la bordure du cercle, à peine à un mètre de distance de vous.<br>
                    Mû par une intuition, vous attrapez le talisman offert par Gaspard et le brandissez devant vous.<br>
                    <br>
                    Dans un sifflement sinistre de rage, le shoggoth commence à se contorsionner, avançant lentement vers le centre du cercle comme s'il était happé.
                    De nouveaux pseudopodes sortent de son corps pour essayer de s'échapper, mais la force est plus puissante et l'attire inexorablement.<br>
                    Lorsqu'il atteint le centre, la lumière du cercle devient soudain aveuglante et un sifflement strident retentit, manquant vous percer les tympans.
                    Vous ne sauriez dire si ce bruit vient du shoggoth ou de la lumière elle-même, mais lorsque le silence revient, vous constatez que le cercle ne brille plus et que le shoggoth ne se trouve plus ici.<br>
                    Vous vous effondrez au sol, vos jambes n'ayant plus assez de force pour vous maintenir debout après toutes ces épreuves, et vous fondez en larmes hystériques.<br>
                    <br>
                    Après de longues minutes, voire des heures, vous finissez par vous remettre debout et sortez pour retourner vers la ville, laissant derrière vous le manoir et ses sombres secrets.
                </p>
                <form action="4qp32s" method="post">
                    <input type="submit" name="fin" value="Fin.">
                </form>
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
