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
                $scenario = 'ambria';
                $nom = 'fin';
                include $_SERVER['DOCUMENT_ROOT'] . $succesadd;
                $nom = 'fin1sullivan';
                include $_SERVER['DOCUMENT_ROOT'] . $succesadd;
                $nom = 'fin2sullivan';
                include $_SERVER['DOCUMENT_ROOT'] . $succesadd;
                ?>
            </div>

            <img src="/escaperpg/images/etoilefinpleine.png" alt="étoile pleine">
            <img src="/escaperpg/images/etoilefinpleine.png" alt="étoile pleine">
            <img src="/escaperpg/images/etoilefinvide.png" alt="étoile vide">
            <img src="/escaperpg/images/etoilefinvide.png" alt="étoile vide">
            <img src="/escaperpg/images/etoilefinvide.png" alt="étoile vide">
            <p>
                Félicitations, vous venez de terminer le scénario "Le Trésor d'Ambria" d'<i>EscapeRPG</i> !
            </p>
            <p>
                Cependant, vous avez obtenu l'une des fins les plus sombres, n'hésitez donc pas à retenter l'expérience
                pour améliorer votre score !<br>
                Veillez à bien communiquer vos informations avec votre partenaire pour être sûrs de ne pas faire
                d'erreur lors de la résolution des énigmes.
                Chaque erreur conduit l'équipage à remettre en doute vos capacités et vous devez veiller à garder le
                moral des gars au beau fixe.<br>
                Aussi, tâchez de faire attention de bien noter les mots de passe qui vous sont donnés sans faire
                d'erreur, car certaines étapes du scénario nécessitent de ne pas se tromper.
            </p>
            <p>
                Quoi qu'il en soit, merci d'avoir pris le temps de jouer.
                Nous espérons que cette histoire vous aura plu, n'hésitez pas à laisser un commentaire sur la <a
                        href="https://www.facebook.com/escaperpg" target="_blank" rel="noreferrer">page Facebook</a>,
                chaque message est fortement apprécié !
                Vous pourrez également y suivre les actualités pour savoir quand les prochains scénarios seront mis en
                ligne.
            </p>
            <p>
                Si le concept vous plaît, vous pouvez nous soutenir sur notre <a href="https://fr.tipeee.com/escaperpg"
                                                                                 target="_blank" rel="noreferrer">page
                    tipeee</a>
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
        <?php elseif (isset($_POST['1levier'])): ?> <!-- énigme réussie -->
            <?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/ambria/includes/sessioninc.php"; ?>
            <audio src="/escaperpg/sons/ambria/tirfin.mp3" autoplay></audio>
            <p>
                La cage se soulève soudain et retourne se positionner dans le plafond, vous libérant.<br>
                Vous faites quelques pas pour sortir de la zone où vous croupissiez et vous dirigez vers le trésor.
                Vous posez la main dessus et savourez un instant le contact froid du métal sur votre peau.
                Vous n'avez cependant plus rien pour emporter quoi que ce soit et, de toute façon, vous ne savez même
                pas si vous réussirez à sortir un jour de cette île.
            </p>
            <p>
                Vous reprenez le chemin de la sortie, descendez les étages de la pyramide et foulez de nouveau le sol de
                la grande place.
                Regardant autour de vous, vous cherchez un endroit où vous pourriez trouver de quoi vous nourrir et
                boire.
                Errant entre les bâtiments, vous finissez par vous faire une raison : vous n'obtiendrez rien ici, mieux
                vaut revenir sur la plage.<br>
                Reprenant le chemin inverse, vous sortez de la cité, traversez les grottes et arrivez sur la plage alors
                que la nuit commence à se lever.
                Sans perdre de temps, vous avancez dans la jungle en scrutant les arbres et buissons.
                Lorsque le ciel devient trop sombre, vous vous rendez sur la plage avec une noix de coco et plusieurs
                baies dans les mains.
                Vous vous installez pour consommer ce maigre repas puis finissez par vous endormir, bercé par le doux
                son des vagues.
            </p>
            <p>
                Le lendemain, après une nuit peu reposante, vous reprenez vos recherches et trouvez un petit cours d'eau
                pour vous rafraîchir.
                L'endroit semble parfait pour y établir un petit campement et vous passez de longs jours à récolter des
                branches, feuilles et autres ustensiles pour vous construire un abri primitif.<br>
                De longs jours passent, puis des semaines et enfin des mois.
                Votre régime forcé et les efforts prodigués vous ont considérablement affaibli et il vous faut un moment
                avant que vous ne puissiez songer à trouver un moyen de quitter l'île.
            </p>
            <p>
                Une fois suffisamment reposé, au terme d'un temps terriblement long, vous retournez dans la jungle pour
                y abattre des arbres et commencer la construction d'un radeau.<br>
                Au bout de plusieurs mois, la construction de votre embarcation est terminée et vous réunissez un
                maximum de nourriture pour entreprendre ce nouveau dangereux périple.
            </p>
            <p>
                Vous poussez le radeau dans l'eau et partez vers l'horizon.
            </p>
            <form action="2q315j" method="post">
                <input type="submit" name="fin" value="Fin.">
            </form>
        <?php else: ?> <!-- Le joueur a cliqué sur l'un des deux mauvais leviers -->
            <?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/ambria/includes/sessioninc.php"; ?>
            <audio src="/escaperpg/sons/ambria/tir.mp3" autoplay></audio>
            <p>
                Rien ne se passe.
            </p>
            <p>
                Vous cherchez une autre possibilité pour vous défaire du piège mais ne voyez rien autour de vous.
                Vous êtes à court d'idées à présent et vous vous laissez lourdement retomber sur le sol dallé de cette
                salle qui pourrait bien être votre tombeau.
            </p>
            <p>
                Assis dans le silence seulement troublé par quelques rafales de vent, vous tournez la tête vers le
                trésor qui n'a pas été embarqué par les traîtres.
            </p>
            <p>
                Si près du but !
            </p>
            <p>
                Vous tendez la main et attrapez une pièce tombée au sol près de vous. La portant devant vos yeux, vous
                observez les détails qui la composent.
                Le visage finement gravé sur l'un de ses côtés, représentant un homme de profil coiffé d'une couronne
                complexe semblable aux pharaons de l'Égypte Antique.
                L'autre côté où une pyramide similaire à celle dans laquelle vous êtes enfermé a été gravée. Vous jouez
                un peu avec la pièce, l'envoyant tournoyer en l'air à plusieurs reprises.<br>
                Après quelques essais, vous ratez votre réception et la pièce rebondit un peu plus loin avant de rouler
                jusqu'à l'entrée de salle, hors de portée.
                Vous poussez un soupir résigné, puis fermez les yeux.
            </p>
            <p>
                Pour vous, l'histoire s'arrête ici, coincé dans l'un des pièges de la cité d'Ambria.
            </p>
            <form action="2q315j" method="post">
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
