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
                echo '<div id="succespopup">';
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
                ?>
            </div>

            <img src="/escaperpg/images/etoilefinpleine.png" alt="étoile pleine">
            <img src="/escaperpg/images/etoilefinpleine.png" alt="étoile pleine">
            <img src="/escaperpg/images/etoilefinpleine.png" alt="étoile pleine">
            <img src="/escaperpg/images/etoilefinvide.png" alt="étoile vide">
            <img src="/escaperpg/images/etoilefinvide.png" alt="étoile vide">

            <p>
                Félicitations, vous venez de terminer le scénario "Le Trésor d'Ambria" d'<i>EscapeRPG</i> !
            </p>
            <p>
                Cependant, vous avez obtenu la fin neutre, n'hésitez donc pas à retenter l'expérience pour améliorer
                votre score !<br>
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
        <?php else: ?>
            <?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/ambria/includes/sessioninc.php"; ?>
            echo '
            <audio src="/escaperpg/sons/ambria/combatfin.mp3" autoplay></audio>
            <p>
                Un grand type baraqué se jette sur Logan qui effectue une roulade pour se mettre hors de portée de
                l'attaque.
                De votre côté, vous parez un coup d'épée et contre-attaquez aussitôt, ouvrant le bide de votre
                adversaire en deux.<br>
                Logan se baisse juste à temps pour éviter une lame, puis court dans votre direction.
            </p>
            <p>
                Pris en tenaille par les pirates, vous ferraillez quelques instants pour tenter de reprendre l'avantage,
                mais les autres sont bien trop nombreux.<br>
                Alors que vous finissez Barthy qui vous barrait la sortie, une détonation rugit depuis l'intérieur de la
                salle et un claquement se fait entendre à quelques centimètres à peine de votre oreille.
                Tournant la tête, vous voyez Jake, à l'autre bout de la pièce, tenant dans sa main son pistolet encore
                fumant.
            </p>
            <div class="dialogue">
                <div class="bulleperso2">
                    <p>
                        On gagnera pas ce combat, p'tit gars, faut décarrer d'ici au plus vite !
                    </p>
                </div>
                <div class="portrait2">
                    <img src="/escaperpg/images/ambria/sullivanmasonmini.png" alt="capitaine sullivan mason">
                </div>
            </div>
            <p>
                Enjambant le cadavre de Barthy, vous courez tous les deux hors de la salle du trésor et descendez les
                marches quatre à quatre, arrivant en quelques secondes dans la grande pièce avec les squelettes.
                Derrière vous, vous entendez le fracas des mutins en train de se précipiter à votre poursuite.<br>
                Sans prendre le temps de savoir où ils en sont, vous foncez tous les deux vers le grand escalier et
                descendez les étages de la pyramide.
            </p>
            <p>
                Une fois sortis, vous traversez au pas de course la cité déserte alors que des coups de feu retentissent
                derrière vous.
                Arrivés aux grottes, vous pénétrez dans la première cavité qui se présente à vous et parcourez ses longs
                couloirs avant de déboucher dans la jungle luxuriante.
            </p>
            <p>
                Prenant une seconde pour récupérer votre souffle, vous ne tardez pas à reprendre votre course en
                entendant l'écho de bruits de pas dans les galeries.<br>
                Après quelques instants, vous finissez par apercevoir les mâts du Surgisseur des Tempêtes au-dessus des
                palmiers.
                Sprintant pour l'atteindre, vous voyez les quelques marins restés près du navire vous regarder
                approcher.
            </p>
            <div class="dialogue">
                <div class="portrait">
                    <img src="/escaperpg/images/ambria/timonier.png" alt="timonier">
                </div>
                <div class="bulleperso">
                    <p>
                        Capitaine ? Qu'est-ce qui s'passe ?
                    </p>
                </div>
            </div>
            <div class="dialogue">
                <div class="bulleperso2">
                    <p>
                        Pas l'temps d'vous expliquer ! Montez à bord et préparez-vous à faire feu !
                    </p>
                </div>
                <div class="portrait2">
                    <img src="/escaperpg/images/ambria/sullivanmasonmini.png" alt="capitaine sullivan mason">
                </div>
            </div>
            <p>
                Un moment d'hésitation, puis ils se dépêchent de vous obéir, grimpant le planchon menant au pont.
                Vous n'êtes pas très nombreux à bord, mais suffisamment pour manœuvrer le bateau.
            </p>
            <p>
                À condition que les types qui vous attendaient ne fassent pas partie de la conspiration...
            </p>
            <div class="dialogue">
                <div class="portrait">
                    <img src="/escaperpg/images/ambria/matelots.png" alt="matelots">
                </div>
                <div class="bulleperso">
                    <p>
                        Cap' ! Y a Jake et quelques aut' gars qui s'amènent ? Qu'est-ce qu'on fait ?
                    </p>
                </div>
            </div>
            <div class="dialogue">
                <div class="bulleperso2">
                    <p>
                        Tirez-leur dessus à ces fils de chiennes !
                    </p>
                </div>
                <div class="portrait2">
                    <img src="/escaperpg/images/ambria/sullivanmasonmini.png" alt="capitaine sullivan mason">
                </div>
            </div>
            <p>
                Nouveau moment d'hésitation puis, alors que vous commencez à apprêter le navire, vous entendez le bruit
                des détonations claquer dans le vent.<br>
                Sur la plage, les mutins sont forcés de se mettre à l'abri, ce qui vous permet de gagner un peu de
                temps.
                Les hommes vous étant restés fidèles luttent avec acharnement, tirant et rechargeant leurs armes avec
                une rapidité exceptionnelle.
                Pendant ce temps, les préparatifs pour appareiller sont terminés et Logan vous donne un coup de main
                pour remonter l'ancre.<br>
                Très bientôt, le Surgisseur des Tempêtes s'éloigne vers l'horizon, l'écho lointain des cris de rage des
                mutins dans son dos.
            </p>
            <p>
                Vous n'aurez finalement pas réussi à mettre la main sur le fabuleux trésor d'Ambria et il vous faudra
                recruter un nouvel équipage,
                mais au moins êtes-vous en vie, apte à repartir vers de nouvelles aventures avec un fidèle coéquipier à
                vos côtés.
            </p>
            <form action="3f1249" method="post">
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
