<?php
include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/entete.php";
$succesadd = "/escaperpg/includes/succesAdd.php";
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <script type="text/javascript" src="/escaperpg/lightbox/js/prototype.js"></script>
    <script type="text/javascript" src="/escaperpg/lightbox/js/scriptaculous.js?load=effects,builder"></script>
    <script type="text/javascript" src="/escaperpg/lightbox/js/lightbox.js"></script>
    <link rel="stylesheet" href="/escaperpg/lightbox/css/lightbox.css" type="text/css" media="screen">
    <link rel="stylesheet" href="/escaperpg/aventures/ambria/css/style.css">
    <meta charset="utf-8">
    <title>Fin - Le Trésor d'Ambria</title>
</head>

<body>
<?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/header.php"; ?>
<div id="banniere"><img src="/escaperpg/images/ambria/tresorambriamini.png" alt="le trésor d'ambria"></div>
<main>
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/ambria/includes/nav-sullivan.php"; ?>
    <div id="txt">
        <?php
        if (isset($_POST['envoyermessage'])):
            $comScenarioEnCours = 'ambriacoms';
            include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/succesComment.php";
        endif;
        if (isset($_POST['fin']) || isset($_SESSION['fin'])): ?>
            <div id="succespopup">
                <?php
                $scenario = 'general';
                $nom = 'fin';
                include $_SERVER['DOCUMENT_ROOT'] . $succesadd;
                $nom = 'meilleurefin';
                include $_SERVER['DOCUMENT_ROOT'] . $succesadd;
                $nom = 'legende';
                include $_SERVER['DOCUMENT_ROOT'] . $succesadd;
                $scenario = 'ambria';
                $nom = 'fidele';
                include $_SERVER['DOCUMENT_ROOT'] . $succesadd;
                $nom = 'fin';
                include $_SERVER['DOCUMENT_ROOT'] . $succesadd;
                $nom = 'fin1sullivan';
                include $_SERVER['DOCUMENT_ROOT'] . $succesadd;
                $nom = 'fin2sullivan';
                include $_SERVER['DOCUMENT_ROOT'] . $succesadd;
                $nom = 'fin3sullivan';
                include $_SERVER['DOCUMENT_ROOT'] . $succesadd;
                $nom = 'fin4sullivan';
                include $_SERVER['DOCUMENT_ROOT'] . $succesadd;
                $nom = 'fin5sullivan';
                include $_SERVER['DOCUMENT_ROOT'] . $succesadd;
                ?>
            </div>

            <img src="/escaperpg/images/etoilefinpleine.png" alt="étoile pleine">
            <img src="/escaperpg/images/etoilefinpleine.png" alt="étoile pleine">
            <img src="/escaperpg/images/etoilefinpleine.png" alt="étoile pleine">
            <img src="/escaperpg/images/etoilefinpleine.png" alt="étoile pleine">
            <img src="/escaperpg/images/etoilefinpleine.png" alt="étoile pleine">
            <p>
                Félicitations, vous venez de terminer le scénario "Le Trésor d'Ambria" d'<i>EscapeRPG</i> !
            </p>
            <p>
                De plus, vous avez obtenu la meilleure fin possible, bravo !<br>
                Vous êtes digne des plus grands pirates de l'Histoire !
            </p>
            <p>
                Merci d'avoir pris le temps de jouer.
                Nous espérons que cette histoire vous aura plu, n'hésitez pas à laisser un commentaire sur la
                <a href="https://www.facebook.com/escaperpg" target="_blank" rel="noreferrer">page Facebook</a>,
                chaque message est fortement apprécié !
                Vous pourrez également y suivre les actualités pour savoir quand les prochains scénarios seront mis en
                ligne.
            </p>
            <p>
                Si le concept vous plaît, vous pouvez nous soutenir sur notre
                <a href="https://fr.tipeee.com/escaperpg" target="_blank" rel="noreferrer">page tipeee</a>
                en nous faisant un don et nous permettre de vous proposer de nouveaux contenus.<br>
                Chacune de ces pages vous propose des contenus exclusifs et uniques en rapport à leur mode de
                fonctionnement, n'hésitez donc pas à les consulter pour voir ce que vous pouvez y récupérer !
            </p>
            <p>
                Vous pouvez également laisser un commentaire directement ci-dessous pour faire savoir que vous avez
                terminé ce scénario !
            </p>

            <?php
            $scenarioEnCours = "ambriacoms";
            include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/commentairesAventures.php";
            $_SESSION['fin'] = true;
            ?>
        <?php else: ?>
            <?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/ambria/includes/sessioninc.php"; ?>

            <audio src="/escaperpg/sons/ambria/recuptresor.mp3" autoplay></audio>
            <p>
                Un nouveau cri d'enthousiasme résonne dans la pièce et tout le monde ouvre en grand les sacs de toile
                que
                vous aviez amené en débarquant.<br>
                Fourrant les pièces, lingots et autres pierres précieuses, vous les remplissez rapidement.
                Il reste encore beaucoup de trésors dans la salle mais vous ne pouvez rien emporter de plus pour le
                moment.
                Peut-être reviendrez-vous par la suite pour empocher le reste.<br>
                Pour le moment, hissant les sacs sur les épaules, toute l'équipe reprend le chemin pour sortir de la
                pyramide, puis de la cité.
            </p>
            <p>
                Le voyage de retour se révèle long et pénible, tout le monde ployant sous le poids des sacs bien
                remplis.<br>
                De retour au Surgisseur des Tempêtes, vous êtes accueillis par un concert de cris enthousiastes de la
                part
                des quelques hommes restés à bord.<br>
                Vous faites ruisseler votre butin sur le pont, sous le regard avide de vos comparses, puis demandez à
                tout
                le monde de vous suivre pour retourner à la pyramide récupérer le reste.
            </p>
            <p>
                La nuit est tombée depuis de longues heures lorsque vous en avez fini et vous ordonnez aux hommes
                d'ouvrir
                deux tonneaux de rhum pour célébrer la réussite de cette aventure.
                La fête dure toute la nuit dans une ambiance joyeuse, certains des hommes ayant sorti des instruments
                pour
                égayer la soirée.
            </p>
            <p>
                Le matin venu, vous réunissez l'équipage qui peine à sortir du sommeil suite à la beuverie, puis
                procédez au
                partage du butin.
                Vous annoncez que Logan a mérité plus que sa part pour tout ce qu'il a accompli jusqu'ici et l'ensemble
                des
                gars grommelle d'approbation.<br>
                En voyant ce que vous lui offrez, ses yeux s'illuminent d'avidité et le jeune garçon vous lance un
                regard de
                reconnaissance.
            </p>
            <p>
                La répartition terminée, le Surgisseur des Tempêtes lève l'ancre et repart vers l'horizon, paré à se
                lancer
                dans de nouvelles aventures fantastiques.
            </p>
            <form action="5fcdr1" method="post">
                <input type="submit" name="fin" value="Fin.">
            </form>
        <?php endif; ?>
    </div>
</main>
<div id="load">
    <div id="loader"></div>
</div>
<script src="/escaperpg/scripts/aventures-chargement.js"></script>
<?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/ambria/sullivan/includes/footer.php"; ?>
</body>
</html>
