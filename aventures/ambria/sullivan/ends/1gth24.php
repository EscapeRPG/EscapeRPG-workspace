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
                ?>
            </div>

            <img src="/escaperpg/images/etoilefinpleine.png" alt="étoile pleine">
            <img src="/escaperpg/images/etoilefinvide.png" alt="étoile vide">
            <img src="/escaperpg/images/etoilefinvide.png" alt="étoile vide">
            <img src="/escaperpg/images/etoilefinvide.png" alt="étoile vide">
            <img src="/escaperpg/images/etoilefinvide.png" alt="étoile vide">

            <p>
                Félicitations, vous venez de terminer le scénario "Le Trésor d'Ambria" d'<i>EscapeRPG</i> !
            </p>
            <p>
                Cependant, vous avez obtenu la fin la plus sombre, n'hésitez donc pas à retenter l'expérience pour
                améliorer votre score !<br>
                Veillez à bien communiquer vos informations avec votre partenaire pour être sûrs de ne pas faire
                d'erreur lors de la résolution des énigmes.
                Chaque erreur conduit l'équipage à remettre en doute vos capacités et vous devez veiller à garder le
                moral des gars au beau fixe.<br>
                Aussi, tâchez de faire attention de bien noter les mots de passe qui vous sont donnés sans faire
                d'erreur, car certaines étapes du scénario nécessitent de ne pas se tromper.<br>
                <br>
                Quoi qu'il en soit, merci d'avoir pris le temps de jouer.
                Nous espérons que cette histoire vous aura plu, n'hésitez pas à laisser un commentaire sur la <a
                        href="https://www.facebook.com/escaperpg" target="_blank" rel="noreferrer">page Facebook</a>,
                chaque message est fortement apprécié !
                Vous pourrez également y suivre les actualités pour savoir quand les prochains scénarios seront mis en
                ligne.<br>
                <br>
                Si le concept vous plaît, vous pouvez nous soutenir sur notre <a href="https://fr.tipeee.com/escaperpg"
                                                                                 target="_blank" rel="noreferrer">page
                    tipeee</a>
                en nous faisant un don et nous permettre de vous proposer de nouveaux contenus.<br>
                Chacune de ces pages vous propose des contenus exclusifs et uniques en rapport à leur mode de
                fonctionnement, n'hésitez donc pas à les consulter pour voir ce que vous pouvez y récupérer !<br>
                <br>
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
                Un sourire mauvais s'affiche sur le visage des pirates.
                Se jetant quelques coups d'œil pour savoir qui prendra la parole, ils mettent quelques secondes avant
                que Jake ne se décide et annonce, s'approchant de la cage dans laquelle vous êtes enfermés avec Logan :
            </p>
            <div class="dialogue">
                <div class="portrait">
                    <img src="/escaperpg/images/ambria/jake.png" alt="jake">
                </div>
                <div class="bulleperso">
                    <p>
                        On a une autre idée, “capitaine”. Les gars et moi, on va récupérer tout ça...
                    </p>
                </div>
            </div>
            <p>
                Il désigne le tas de richesses au centre de la pièce.
            </p>
            <div class="dialogue">
                <div class="portrait">
                    <img src="/escaperpg/images/ambria/jake.png" alt="jake">
                </div>
                <div class="bulleperso">
                    <p>
                        Et vous, vous restez ici.<br>
                        <br>
                        On commence à en avoir marre de vous suivre. De recevoir des ordres à longueur de temps.<br>
                        Vous êtes de la vieille époque Sullivan.
                        Certes, vous nous avez menés jusqu'ici, mais ça f'sait combien de temps qu'on n'avait rien eu à
                        s'mettre sous la dent, hein ?
                    </p>
                </div>
            </div>
            <div class="dialogue">
                <div class="bulleperso2">
                    <p>
                        Tas d'fumiers… Attendez que j'sorte de là et je jure de tous vous faire la peau.
                    </p>
                </div>
                <div class="portrait2">
                    <img src="/escaperpg/images/ambria/sullivanmasonmini.png" alt="capitaine sullivan mason">
                </div>
            </div>
            <div class="dialogue">
                <div class="portrait">
                    <img src="/escaperpg/images/ambria/jake.png" alt="jake">
                </div>
                <div class="bulleperso">
                    <p>
                        Hop hop hop, doucement !<br>
                        Ça fait un p'tit moment qu'on prépare ce coup, vous pensez bien. On s'demandait juste quand on
                        en aurait l'occasion.<br>
                        <br>
                        Lloyd, prends ton flingue et tire s'il tente quoi qu'ce soit.
                    </p>
                </div>
            </div>
            <p>
                Lloyd, un type malingre, sort son pistolet accroché à la ceinture et le pointe sur vous.<br>
                Les autres se dirigent prudemment vers le trésor, veillant à ce qu'il n'y ait pas d'autre piège dans la
                salle.
                Vous espérez qu'ils en déclenchent un et qu'ils crèvent tous.
                Malheureusement, ils arrivent au bout sans que rien ne se passe, et commencent à fourrer les pièces,
                lingots et autres pierres précieuses dans les sacs en toile qu'ils trimballent depuis votre arrivée sur
                l'île.
                Logan et vous assistez, impuissants, à ce manège, les voyant faire plusieurs allers et retours pour
                transporter les sacs en-dehors de la salle.
            </p>
            <p>
                Une fois remplis, ils les jettent sur leurs épaules et s'éloignent en riant.
                Il reste encore de nombreuses richesses, mais vous êtes toujours bloqués et, de toute façon, sans sacs
                et sans navire pour repartir, vous ne pourrez pas aller bien loin.
            </p>
            <p>
                Il semblerait que, pour Logan et vous, cette aventure s'achève ici.
            </p>
            <form action="1gth24" method="post">
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
