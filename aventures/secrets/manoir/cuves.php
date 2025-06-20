<?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/entete.php";
$_SESSION['shortcut'] = false;
$_SESSION['cuves'] = true;
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
    <title>Bureau - Secrets Familiaux</title>
</head>

<body>
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/header.php"; ?>
    <div id="banniere"><img src="/escaperpg/images/secrets/secretsfamiliauxmini.png" alt="secrets familiaux bannière"></div>
    <main>
        <nav>
            <?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/secrets/includes/navAvatar.php"; ?>
            <?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/secrets/includes/navInputs.php"; ?>
        </nav>
        <div id="txt">
            <?php if (isset($_POST['oui'])): ?>
                <audio src="/escaperpg/sons/secrets/arcelectrique.mp3" autoplay></audio>
                <p>
                    Une nouvelle fois, un arc électrique se forme au sommet de la cuve, mais cette fois-ci le tout reste stable.<br>
                    <br>
                    Vous voyez alors avec horreur l'immonde masse au fond de la cuve commencer à s'agiter.<br>
                    À sa surface, ce qui ressemble à des tentacules ou des bras primaires se forment et se tendent en direction de la source d'énergie.
                    Attendez-vous que ces appendices atteignent la source d'énergie ou préférez-vous arrêter l'expérience ?
                </p>
                <form action="cuves" method="post">
                    <input type="submit" name="repousser" value="Repousser le levier.">
                    <br>
                    <input type="submit" name="laisser" value="Laisser et observer.">
                </form>
            <?php elseif (isset($_POST['laisser'])): ?>
                <audio src="/escaperpg/sons/secrets/arcelectrique.mp3" autoplay></audio>
                <p>
                    Comme hypnotisé par ce qu'il se passe, vous ne pouvez vous empêcher de vouloir voir ce qu'il va arriver lorsque la chose aura atteint le haut de la cuve.<br>
                    <br>
                    S'étirant au maximum, la masse protoplasmique finit par y parvenir.
                    Lorsqu'elle entre en contact avec l'électricité, un spasme l'agit violemment et vous voyez de petits éclairs parcourir la chose.
                    Le spectacle est répugnant, chaque impulsion électrique vous permettant de voir l'intérieur de l'immondice par transparence.
                    Si on vous le demandait, vous seriez bien incapable de décrire ce que vous avez sous les yeux, tant les mots seraient faibles pour expliquer l'indicible.<br>
                    <br>
                    Soudain, la masse s'agite, comme mue par une force soudaine, et se rétracte sur elle-même pour devenir plus compacte.<br>
                    Elle se redresse légèrement et envoie soudain une partie d'elle-même contre la paroi de la cuve, qui commence à se craqueler.<br>
                    Saisi d'horreur, vous repoussez aussitôt le levier en espérant que la chose se calme et ne casse pas la vitre.<br>
                    <br>
                    Peu à peu, la masse protoplasmique semble se calmer et retourner à son stade informe dans lequel vous l'avez découverte.
                    Il semblerait donc que ces choses trouvent de l'énergie par le biais de l'électricité.<br>
                    <br>
                    Contrairement aux autres “échantillons” inertes des cuves voisines, elle continue de se mouvoir lentement alors que la cuve est inactive.<br>
                    Ce spectacle répugnant vous pousse un peu plus vers la folie, mais vous devez continuer votre enquête !
                </p>
                <form action="bureauprive2" method="post">
                    <input type="submit" name="retour" value="Retour.">
                </form>
                <?php $_SESSION['masseactive'] = true; ?>
            <?php elseif (isset($_POST['repousser'])): ?>
                <p>
                    Vous repoussez finalement le levier, coupant instantanément l'arc électrique.<br>
                    <br>
                    Peu à peu, la masse protoplasmique semble se calmer et retourner à son stade informe dans lequel vous l'avez découverte.
                    Cependant, contrairement aux autres “échantillons” inertes des cuves voisines, elle continue de se mouvoir lentement alors que la cuve est inactive.<br>
                    Ce spectacle répugnant vous pousse un peu plus vers la folie, mais vous devez continuer votre enquête !
                </p>
                <form action="bureauprive2" method="post">
                    <input type="submit" name="retour" value="Retour.">
                </form>
            <?php else: ?>
                <div id="succespopup">
                    <?php
                    $nouveausucces = '<img src="/escaperpg/images/succes/secrets/electricite.png"><span><u><b>Électricien</b></u><br>Remettre le courant après avoir fait sauter les plombs</span>';
                    $scenario = 'secrets';
                    $description = 'électricité';
                    $cache = 'oui';
                    $rarete = 'succesbronze';
                    include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/succesadd.php";
                    ?>
                </div>
                <audio src="/escaperpg/sons/secrets/electriciteretablie.mp3" autoplay></audio>
                <p>
                    Les lumières se rallument, vous permettant de souffler un peu.
                    Avec vos réparations, le système électrique devrait pouvoir tenir un peu mieux le choc.<br>
                    <br>
                    Voulez-vous toujours essayer d'activer l'une des cuves ?
                </p>
                <form action="cuves" method="post">
                    <input type="submit" name="oui" value="Tirer sur le levier.">
                </form>
                <br>
                <form action="bureauprive2" method="post">
                    <input type="submit" name="non" value="Ne pas y toucher.">
                </form>
                <?php $_SESSION['cuves'] = true; ?>
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
