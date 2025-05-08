<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/entete.php"; ?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <script type="text/javascript" src="/escaperpg/lightbox/js/prototype.js"></script>
    <script type="text/javascript" src="/escaperpg/lightbox/js/scriptaculous.js?load=effects,builder"></script>
    <script type="text/javascript" src="/escaperpg/lightbox/js/lightbox.js"></script>
    <link rel="stylesheet" href="/escaperpg/lightbox/css/lightbox.css" type="text/css" media="screen">
    <link rel="stylesheet" href="/escaperpg/aventures/lastparty/css/style.css">
    <link rel="stylesheet" href="/escaperpg/css/styleAventuresInputs.css">
    <link rel="stylesheet" href="/escaperpg/css/styleBoutonsIndices.css">
    <link rel="stylesheet" href="/escaperpg/css/styleSpanTexts.css">
    <link rel="stylesheet" href="/escaperpg/css/styleCompteBouton.css">
    <link rel="stylesheet" href="/escaperpg/css/styleDialogues.css">
    <link rel="stylesheet" href="/escaperpg/css/styleFooterAventures.css">
    <link rel="stylesheet" href="/escaperpg/css/styleLoader.css">
    <link rel="stylesheet" href="/escaperpg/css/styleSucces.css">
    <meta charset="utf-8">
    <title>Couloir d'entrée - Last Party</title>
</head>

<body>
    <?php include_once $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/header.php"; ?>
    <div id="banniere"><img src="/escaperpg/images/lastparty/lpmini.png" alt="last party bannière"></div>
    <main>
        <?php include_once $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/lastparty/includes/nav.php"; ?>
        <div id="txt">
            <?php if (isset($_POST['add'])): ?>
                <div id="succespopup">
                    <?php
                    $nouveausucces = '<img src="/escaperpg/images/succes/lastparty/carte.png"><span><u><b>Mystérieux inconnu</b></u><br>Récupérer la carte de visite de Darren Braun</span>';
                    $scenario = 'lastparty';
                    $description = 'carte';
                    $cache = 'oui';
                    $rarete = 'succesnormal';
                    include_once $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/succesadd.php";
                    ?>
                </div>
                <script src="/escaperpg/scripts/inventaireadd.js"></script>
                <p>
                    Une carte de visite, appartenant à un certain Darren Braun. De qui peut-il bien s'agir ?<br>
                    La carte ne contient que très peu d'informations...
                </p>
                <form action="couloir" method="post">
                    <input type="submit" name="suivant" value="suivant.">
                </form>
                <?php $_SESSION['cartevisite'] = true; ?>
                <?php $_SESSION['inventaire'][] = 'cartevisite'; ?>
            <?php elseif (isset($_SESSION['cartevisite'])): ?>
                <p>
                    Vous essayez de vous souvenir, mais le visage de cet individu vous reste inconnu.
                </p>
                <?php
                $reponse = "Envoyez un mail à <a href=\"mailto:whosdarrenbraun@gmail.com\">whosdarrenbraun@gmail.com</a>. Essayez de lui demander qui il est ou ce que vous voulez !";
                $indice1 = "Essayez de contacter ce mystérieux Darren Braun.";
                $indice2 = "L'une des informations présente sur la carte devrait vous aider à avancer.";
                $indice3 = "Peut-être vous faudra-t-il utiliser un outil externe à EscapeRPG.";
                include_once $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/indices.php";
                ?>
            <?php else: ?>
                <div id="enigme">
                    <a href="/escaperpg/images/lastparty/cartedevisite.png" rel="lightbox[invent]"><img src="/escaperpg/images/lastparty/cartedevisite.png" alt="carte de visite"></a>
                </div>
                <p>
                    Vous fouillez fébrilement les poches de votre veste, quand soudain vos doigts se posent sur quelque chose.
                </p>
                <form action="couloir" method="post">
                    <input type="submit" name="add" value="Prendre.">
                </form>
                <?php include_once $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/resetIndices.php"; ?>
            <?php endif; ?>
        </div>
        </div>
        <div id="load">
            <div id="loader"></div>
        </div>
        <script src="/escaperpg/scripts/aventures-chargement.js"></script>
        <?php include_once $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/lastparty/includes/footer.php"; ?>
</body>

</html>
