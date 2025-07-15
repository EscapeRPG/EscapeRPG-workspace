<?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/entete.php"; ?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <script type="text/javascript" src="/escaperpg/lightbox/js/prototype.js"></script>
    <script type="text/javascript" src="/escaperpg/lightbox/js/scriptaculous.js?load=effects,builder"></script>
    <script type="text/javascript" src="/escaperpg/lightbox/js/lightbox.js"></script>
    <link rel="stylesheet" href="/escaperpg/lightbox/css/lightbox.css" type="text/css" media="screen">
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/styleAventures.php"; ?>
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/avent/includes/styleAvent.php"; ?>
    <meta charset="utf-8">
    <title>La fin de l'histoire - Le Grenier d'Arthur</title>
</head>

<body>
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/header.php"; ?>
    <div id="banniere"><img src="/escaperpg/images/avent/aventmini.png" alt="bannière le grenier d'arthur"></div>
    <main>
        <nav>
            <img src="/escaperpg/images/avent/sarah.png" alt="sarah">
            <form action="/escaperpg/aventures/avent/cartes.php" target="_blank" rel="noreferrer" method="post"><input type="submit" name="cartes" value="Cartes"></form>
        </nav>
        <div id="txt">
            <?php if (isset($_POST['envoyermessage'])):
                $comScenarioEnCours = 'lastpartycoms';
                include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/succesComment.php";
            endif;
            if (isset($_POST['fin']) || $_SESSION['fin']): ?>
                <div id="succespopup">
                    <?php
                    $nouveausucces = '<img src="/escaperpg/images/succes/general/fin.png"><span><u><b>Une page qui se tourne...</b></u><br>Terminer sa première aventure</span>';
                    $scenario = 'general';
                    $description = 'fin';
                    $cache = 'non';
                    $rarete = 'succesbronze';
                    include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/succesadd.php";
                    $nouveausucces = '<img src="/escaperpg/images/succes/avent/fin.png"><span><u><b>... et ils vécurent heureux</b></u><br>Terminer l\'aventure</span>';
                    $scenario = 'avent';
                    $description = 'fin';
                    $cache = 'non';
                    $rarete = 'succesbronze';
                    include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/succesadd.php";
                    if (!$succesexiste) {
                        echo $_SESSION['loggedin'] ?
                            '<script src="/escaperpg/scripts/succescount.js"></script>' :
                            '<script src="/escaperpg/scripts/succescountoffline.js"></script>';
                    }
                    ?>
                </div>
                <img src="/escaperpg/images/etoilefinpleine.png" alt="étoile pleine"><br>
                Félicitations, vous venez de terminer le scénario "Le Grenier d'Arthur" d'<i>EscapeRPG</i> !
                <p>
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
                <?php
                $scenarioEnCours = "aventcoms";
                include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/commentairesAventures.php";
                $_SESSION['fin'] = true;
                ?>
            <?php elseif (isset($_POST['suivant'])): ?>
                <p>
                    Puis vient le soir et l'heure de se coucher.
                    Vous étreignez votre grand-père et l'embrassez avant de partir au lit.
                    Vous savez que tout le monde sera parti lorsque vous vous réveillerez, demain matin.<br>
                    <br>
                    Malgré tout, vous vous endormez le sourire aux lèvres, en repensant à tout ce qu'il s'est passé depuis la semaine dernière.
                </p>
                <form action="fin" method="post">
                    <input type="submit" name="knock" value="toc toc toc.">
                </form>
            <?php elseif (isset($_POST['knock'])): ?>
                <p>
                    <audio src="/escaperpg/sons/avent/toctoc.mp3" autoplay></audio>
                    Les trois petits coups donnés sur votre porte vous réveillent.<br>
                    D'après votre horloge, il est 9h du matin.
                    Vous vous étirez puis vous levez, encore un peu ensommeillée.<br>
                    <br>
                    À la porte se tient votre père, qui semble d'excellente humeur, un petit sourire aux lèvres.
                </p>
                <div class="dialogue">
                    <div class="portrait">
                        <img src="/escaperpg/images/avent/perefin.png" alt="père de Sarah">
                    </div>
                    <div class="bulleperso">
                        <p>
                            Sarah, viens voir !
                        </p>
                    </div>
                </div>
                <p>
                    Baillant à vous en décrocher la mâchoire, vous le suivez en bas des escaliers.<br>
                    <br>
                    Là, dans le salon, se dresse fièrement le plus beau sapin de Noël que vous avez jamais vu !<br>
                    À ses pieds se trouve une montagne de cadeaux avec des emballages aux couleurs magnifiques.<br>
                    <br>
                    Vous n'en revenez pas, c'est la première fois que votre famille fête Noël de cette manière !
                </p>
                <div class="dialogue">
                    <div class="portrait">
                        <img src="/escaperpg/images/avent/perefin.png" alt="père de Sarah">
                    </div>
                    <div class="bulleperso">
                        <p>
                            Il y a quelques jours, j'ai reçu une lettre d'un mystérieux expéditeur me disant que ton grand-père et toi lui avez été d'un grand secours.<br>
                            Il me disait aussi de me réconcilier avec lui.<br>
                            <br>
                            Avec la lettre, il y avait ceci.
                        </p>
                    </div>
                </div>
                <p>
                    Il sort un petit objet de sa poche et vous le montre.<br>
                    Il s'agit d'une petite toupie en bois.
                    Vous n'en avez jamais vu de pareil, elle comporte des motifs représentant des rennes qui ont l'air d'avoir été gravés par l'artiste le plus talentueux qui existe.
                    Sur le dessus, un disque représentant un flocon de neige a été taillé et l'ensemble est peint avec des couleurs chatoyantes.<br>
                    <br>
                    Une véritable œuvre d'art !
                </p>
                <div class="dialogue">
                    <div class="portrait">
                        <img src="/escaperpg/images/avent/perefin.png" alt="père de Sarah">
                    </div>
                    <div class="bulleperso">
                        <p>
                            Je l'avais reçue comme cadeau de Noël, il y a bien longtemps.<br>
                            Petit, je pensais que c'était le Père Noël qui me l'avait envoyée et je la montrais à tous mes amis.
                            Mais ils ne croyaient plus au Père Noël depuis longtemps et se sont moqués de moi.<br>
                            <br>
                            J'ai alors jeté la toupie au loin pour m'en débarrasser.
                            Ton grand-père m'a tellement grondé ce jour-là !
                            Il m'a dit que ce n'était pas bien de jeter un cadeau du Père Noël comme ça.<br>
                            <br>
                            Bien sûr, je sais que c'était ton grand-père qui l'avait fabriquée, mais il a toujours essayé de me faire croire au Père Noël…<br>
                            <br>
                            Quand j'ai reçu cette toupie dans la boîte aux lettres, je n'en suis pas revenu.
                            C'est exactement celle que j'avais quand j'étais petit !<br>
                            Ça m'a rappelé l'époque où tout était heureux et où j'aimais ton grand-père de tout mon cœur.<br>
                            <br>
                            Ça prendra du temps, mais je crois qu'on commence à se réconcilier, lui et moi.
                        </p>
                    </div>
                </div>
                <p>
                    Il sourit et vous avez l'impression de voir l'ombre d'une larme se former dans ses yeux.
                    Il semble véritablement touché et ému, c'est une larme de bonheur.<br>
                    <br>
                    Vous percevez alors un mouvement provenant de la cuisine.
                </p>
                <form action="fin" method="post">
                    <input type="submit" name="suivant2" value="suivant.">
                </form>
            <?php elseif (isset($_POST['suivant2'])): ?>
                <p>
                    Stupéfiée, vous voyez que votre grand-père se tient là, dans l'encadrement de la porte, les bras croisés et un sourire chaleureux aux lèvres.<br>
                    <br>
                    Vous pensiez qu'il était rentré chez lui, comme tous les ans !
                </p>
                <div class="dialogue">
                    <div class="portrait">
                        <img src="/escaperpg/images/avent/perefin.png" alt="père de Sarah">
                    </div>
                    <div class="bulleperso">
                        <p>
                            J'ai proposé à grand-père de rester encore quelques jours avec nous. Nous avons du temps à rattraper !
                        </p>
                    </div>
                </div>
                <p>
                    Il se tourne alors vers lui.
                </p>
                <div class="dialogue">
                    <div class="portrait">
                        <img src="/escaperpg/images/avent/perefin.png" alt="père de Sarah">
                    </div>
                    <div class="bulleperso">
                        <p>
                            Tu sais qui m'a envoyé cette lettre avec la toupie ? C'est signé P. N. mais je ne vois pas qui cela peut être.
                        </p>
                    </div>
                </div>
                <p>
                    Arthur vous lance un clin d'œil malicieux.<br>
                    Vous savez tous les deux qui est ce P. N., mais cela restera votre secret.
                </p>
                <div class="dialogue">
                    <div class="portrait">
                        <img src="/escaperpg/images/avent/arthur.png" alt="arthur">
                    </div>
                    <div class="bulleperso">
                        <p>
                            Oh, non, aucune idée. Mais je suis ravi qu'il ou elle ait retrouvé ta toupie !
                        </p>
                    </div>
                </div>
                <p>
                    Votre père s'esclaffe, bientôt imité par votre mère et votre grand-père, puis vous ne pouvez vous empêcher de vous joindre à eux.<br>
                    <br>
                    À bout de souffle, votre père se laisse tomber dans un fauteuil, à côté du sapin.
                </p>
                <div class="dialogue">
                    <div class="portrait">
                        <img src="/escaperpg/images/avent/perefin.png" alt="père de Sarah">
                    </div>
                    <div class="bulleperso">
                        <p>
                            Allez, viens Sarah, je crois que nous avons quelques cadeaux à ouvrir, cette année !
                        </p>
                    </div>
                </div>
                <p>
                    Ravie, vous rejoignez tout le monde et commencez la distribution des cadeaux.<br>
                    <br>
                    Cette année, Noël aura vraiment été magique.
                </p>
                <form action="fin" method="post">
                    <input type="submit" name="fin" value="fin.">
                </form>
            <?php else: ?>
                <div id="succespopup">
                    <?php
                    $nouveausucces = '<img src="/escaperpg/images/succes/avent/maison.png"><span><u><b>Voyage de retour</b></u><br>Rentrer à la maison après toutes ces émotions</span>';
                    $scenario = 'avent';
                    $description = 'maison';
                    $cache = 'oui';
                    $rarete = 'succesargent';
                    include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/succesadd.php";
                    ?>
                </div>
                <?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/sessioninc.php"; ?>
                <audio src="/escaperpg/sons/avent/bipssifflement.mp3" autoplay></audio>
                <p>
                    Il appuie à nouveau sur le bouton.<br>
                    Une série de bips résonne alors dans l'entrepôt et, une nouvelle fois, vous êtes baignée dans une lumière presque aveuglante.
                    Vous êtes soulevée du sol avec Arthur puis, au bout de quelques secondes à peine, la lumière se dissipe et vous reconnaissez le grenier de l'inventeur,
                    avec ses cartons, ses piles de livres et de papiers en tous sens.<br>
                    <br>
                <div class="dialogue">
                    <div class="portrait">
                        <img src="/escaperpg/images/avent/arthur.png" alt="arthur">
                    </div>
                    <div class="bulleperso">
                        <p>
                            Quelle histoire, alors ! Ça m'a donné une faim de loup ! Descendons, je vais préparer à manger.
                        </p>
                    </div>
                </div>
                <br>
                Vous le suivez et l'aidez à préparer un délicieux repas, tout en échangeant sur votre aventure et en lui posant des tonnes de questions, auxquelles il répond patiemment.<br>
                Après ce jour, vous ne verrez plus jamais Noël comme avant !<br>
                <br>
                La semaine passe à une vitesse folle et, quand samedi arrive et que votre père revient vous chercher pour le repas de Noël,
                c'est un peu mélancolique que vous quittez la maison de votre grand-père, avec une seule pensée : vivement l'an prochain !<br>
                <br>
                Cette année, le repas de famille se révèle beaucoup plus chaleureux.<br>
                Vous avez même l'impression que, pour une raison inconnue, Arthur et votre père se parlent comme si leur querelle était oubliée... incroyable !
                </p>
                <form action="fin" method="post">
                    <input type="submit" name="suivant" value="suivant.">
                </form>
            <?php endif; ?>
        </div>
    </main>
    <div id="load">
        <div id="loader"></div>
    </div>
    <script src="/escaperpg/scripts/aventures-chargement.js"></script>
</body>

</html>
