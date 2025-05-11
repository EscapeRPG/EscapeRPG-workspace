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
    <title>Photos - Last Party</title>
</head>

<body>
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/header.php"; ?>
    <div id="banniere"><img src="/escaperpg/images/lastparty/lpmini.png" alt="last party bannière"></div>
    <main>
        <?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/lastparty/includes/nav.php"; ?>
        <div id="txt">
            <?php if (isset($_POST['suivant']) || isset($_SESSION['appareilphoto'])): ?>
                <?php $_SESSION['appareilphoto'] = true ?>
                <p>
                    Sur l'une des photos prises dans le salon, où était regroupé la plupart des gens, vous remarquez un homme que vous ne connaissez pas fixant l'objectif,
                    un petit sourire ourlant ses lèvres.<br>
                    <br>
                    Vous continuez dans la galerie pour voir les photos précédentes,
                    à la recherche de cet homme et finissez par tomber sur un cliché où vous le voyez en train de glisser quelque chose...
                    dans la poche intérieure de votre veste !<br>
                    <br>
                    De quoi peut-il bien s'agir ?<br>
                    <br>
                    Vous décidez d'en avoir le cœur net et d'aller vérifier dans les poches de votre veste, accrochée dans le <span class="lieu">couloir</span> de l'entrée.
                </p>
                <?php
                $reponse = "Rendez-vous sur <a href='/aventures/lastparty/couloir.php'>le lien du couloir</a>.";
                $indice1 = "Vous êtes actuellement en train d'examiner votre appareil photo et cherchez à vous rendre dans le couloir.";
                $indice2 = "Le couloir est un lieu, comme une adresse. À quel endroit pourriez-vous en entrer une ?";
                $indice3 = "N'hésitez pas à consulter les <a href='/escaperpg/index.php#bloc2' target='_blank' rel='noreferrer'>règles</a> pour voir comment vous en sortir.";
                include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/indices.php";
                ?>
            <?php else: ?>
                <p>
                    Vous allumez votre appareil photo et allez directement consulter la galerie.<br>
                    Il semble que vous ayez pris pas mal de photos hier soir, mais cela ne vous ramène aucun souvenir...<br>
                    <br>
                    Sur les différents clichés, vos amis <i>– et vous sur les quelques photos où vous apparaissez –</i> semblez passer un bon moment.
                    Vous ne voyez rien d'alarmant.<br>
                    <br>
                    Jusqu'à ce que...
                </p>
                <form action="appareilphoto" method="post">
                    <input type="submit" name="suivant" value="Suivant.">
                </form>
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
