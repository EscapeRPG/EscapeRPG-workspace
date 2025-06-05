<?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/entete.php"; ?>
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
    <title>Bureau privé - Secrets Familiaux</title>
</head>

<body>
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/header.php"; ?>
    <div id="banniere"><img src="/escaperpg/images/secrets/secretsfamiliauxmini.png" alt="secrets familiaux bannière"></div>
    <main>
        <nav>
            <?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/secrets/includes/navAvatar.php"; ?>
            <?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/secrets/includes/navInputs.php"; ?>
            <?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/secrets/includes/navigationmanoir.php"; ?>
        </nav>
        <div id="txt">
            <div id="enigmelieu">
                <img src="/escaperpg/images/secrets/bureausecret2cuves.png" alt="les cuves contenant l'étrange masse">
                <form action="bureauprive2" method="post">
                    <?php if (isset($_SESSION['trappeopen'])): ?>
                        <button type="submit" name="trappeopened" id="trappeopened">
                            <img src="/escaperpg/images/secrets/buttontrappeopened.png" alt="trappe ouverte sur l'obscurité">
                        </button>
                    <?php elseif (isset($_SESSION['trappe'])): ?>
                        <button type="submit" name="trappe" id="trappeclosed">
                            <img src="/escaperpg/images/secrets/buttontrappe.png" alt="une trappe verrouillée">
                        </button>
                    <?php else: ?>
                        <button type="submit" name="trappehidden" id="trappehidden">
                            <img src="/escaperpg/images/secrets/buttontapis.png" alt="le tapis traîne au milieu de la pièce">
                        </button>
                    <?php endif; ?>
                </form>
            </div>
            <?php if (isset($_POST['trappeopened'])): ?>
                <?php if ($_SESSION['tiroiropened']): ?>
                    <p>
                        L'échelle qui descend dans le profondeurs serait-elle le passage secret mentionné dans le journal de votre oncle ?
                    </p>
                <?php else: ?>
                    <p>
                        Où peut donc mener cette échelle ?
                        Peut-être pouvez-vous trouver des informations à ce propos quelque part dans le <span class="lieu">bureau</span> privé ?
                    </p>
                <?php endif; ?>
                <p>
                    Souhaitez-vous descendre ?
                </p>
                <form action="cavesecrete" method="post">
                    <input type="submit" name="descendre" value="Descendre.">
                </form>
                <br>
                <form action="bureauprive2" method="post">
                    <input type="submit" name="retour" value="Pas maintenant.">
                </form>
            <?php elseif (isset($_POST['cadenas'])): ?>
                <?php if (str_replace($search, $replace, stripslashes($_POST['cadenas'])) == "vieillecle"): ?>
                    <audio src="/escaperpg/sons/secrets/ouverturemanoir.mp3" autoplay></audio>
                    <div id="succespopup">
                        <?php
                        $nouveausucces = '<img src="/escaperpg/images/succes/secrets/passage.png"><span><u><b>Enquêteur</b></u><br>Découvrir un passage secret dans le bureau privé de l\'oncle William !</span>';
                        $scenario = 'secrets';
                        $description = 'passage';
                        $cache = 'oui';
                        $rarete = 'succesnormal';
                        include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/succesadd.php";
                        ?>
                    </div>
                    <p>
                        La trappe s'ouvre, révélant une échelle menant vers les ténèbres.
                        L'odeur persistante qui règne dans le manoir depuis votre arrivée devient soudainement beaucoup plus forte et vous prend à la gorge.
                        Vous faites votre possible pour ne pas rendre votre dernier repas.<br>
                        Quoi que cela puisse être, ce qui se trouve en bas est à l'origine de cette émanation putride…
                        Vous redoutez ce que vous allez y trouver, mais il est trop tard pour faire marche arrière maintenant.<br>
                        <br>
                        Prenant votre courage à deux mains, vous saisissez l'une des lampes se trouvant sur l'étagère et vous apprêtez à descendre.
                    </p>
                    <?php if (!isset($_SESSION['cuves']) && !isset($_SESSION['refus']) && !isset($_SESSION['masseactive'])): ?>
                        <p>
                            À moins qu'il ne vous reste quelque chose à faire avant ?
                        </p>
                    <?php endif; ?>
                    <form action="cavesecrete" method="post">
                        <input type="submit" name="descendre" value="Descendre.">
                    </form>
                    <?php
                    unset($_SESSION['trappe']);
                    unset($_SESSION['oldcle']);
                    $_SESSION['trappeopen'] = true;
                    ?>
                <?php else: ?>
                    <p>
                        Ça ne semble pas être la bonne.
                    </p>
                    <form action="bureauprive2" method="post">
                        <input type="text" name="cadenas"><input type="submit" name="utiliser" value="Utiliser la clé.">
                    </form>
                    <br>
                    <form action="bureauprive2" method="post">
                        <input type="submit" name="retour" value="Retour.">
                    </form>
                <?php endif; ?>
            <?php elseif (isset($_POST['trappe'])): ?>
                <p>
                    La trappe en bois est fermée par un vieux cadenas.
                </p>
                <?php if ($_SESSION['tiroiropened']): ?>
                    <p>
                        Serait-ce le passage secret mentionné dans le journal de votre oncle ?
                    </p>
                <?php else: ?>
                    <p>
                        Que renferme-t-elle ? Peut-être pouvez-vous trouver plus d'informations à ce propos quelque part dans le <span class="lieu">bureau privé</span> ?
                    </p>
                <?php endif; ?>
                <form action="bureauprive2" method="post">
                    <input type="text" name="cadenas">
                    <input type="submit" name="utiliser" value="Utiliser la clé.">
                </form>
            <?php elseif (isset($_POST['trappehidden'])): ?>
                <p>
                    Sous le tapis se trouvait une trappe secrète !
                </p>
                <?php
                $_SESSION['trappe'] = true;
                ?>
            <?php elseif (isset($_SESSION['cuves']) || isset($_SESSION['masseactive'])): ?>
                <?php if (isset($_SESSION['cuves'])): ?>
                    <p>
                        Vous préférez ne pas retenter l'expérience.
                    </p>
                    <?php if ($_SESSION['tiroiropened']): ?>
                        <p>
                            Il vous faut cependant toujours trouver le passage secret mentionné dans le journal.
                        </p>
                    <?php else: ?>
                        <p>
                            Y aurait-il quelque chose d'autre par ici ?
                        </p>
                    <?php endif; ?>
                <?php else: ?>
                    <p>
                        Vous continuez de fouiller la partie arrière du bureau privé de votre oncle.<br>
                        <br>
                        La masse gélatineuse continue de se contorsionner lentement dans la cuve.
                        Votre anxiété à ce propos devient de plus en plus insupportable,
                        mais vous vous rassurez en vous disant qu'elle n'essaye plus de briser la vitre pour s'échapper.
                        <br>
                        Comment pourriez-vous faire pour ouvrir cette trappe ? Mène-t-elle au passage secret mentionné dans le journal de votre oncle ?
                    </p>
                <?php endif; ?>
            <?php elseif (isset($_SESSION['refus']) || isset($_POST['non'])): ?>
                <p>
                    Vous décidez de ne pas toucher aux leviers, de peur de ce que cela pourrait produire.
                </p>
                <?php if ($_SESSION['tiroiropened']): ?>
                    <p>
                        Il vous faut toujours trouver le passage secret mentionné dans le journal.
                    </p>
                <?php else: ?>
                    <p>
                        Y aurait-il quelque chose d'autre par ici ?
                    </p>
                <?php
                endif;
                $_SESSION['refus'] = true;
                ?>
            <?php else: ?>
                <p>
                    En arrivant dans la seconde partie du bureau, vous retenez un cri d'horreur en découvrant ce qui semble être un petit laboratoire.<br>
                    Longeant l'arrière de la bibliothèque, vous voyez une succession de cuves contenant une sorte de masse noire gélatineuse.
                    Des leviers se trouvent à côté de chacune d'elles.<br>
                    <br>
                    Essayez-vous d'en tirer un ?
                </p>
            <?php endif; ?>
            <?php if (!isset($_SESSION['refus']) && !isset($_SESSION['cuves']) && !isset($_SESSION['masseactive'])): ?>
                <form action="courtcircuit" method="post">
                    <input type="submit" name="tirer" value="Tirer sur le levier.">
                </form>
                <br>
                <form action="bureauprive2" method="post">
                    <input type="submit" name="non" value="Ne pas y toucher.">
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
