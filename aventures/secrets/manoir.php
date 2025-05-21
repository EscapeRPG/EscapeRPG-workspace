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
    <title>Manoir - Secrets Familiaux</title>
</head>

<body onload="chargement()">
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/header.php"; ?>
    <div id="banniere"><img src="/escaperpg/images/secrets/secretsfamiliauxmini.png" alt="secrets familiaux bannière"></div>
    <main>
        <nav>
            <?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/secrets/includes/navAvatar.php"; ?>
            <?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/secrets/includes/navInputs.php"; ?>
        </nav>
        <div id="txt">
            <?php if (isset($_POST['suivant'])): ?>
                <p>
                    Vous vous installez au bout de l'immense table à manger et on vous apporte de quoi vous restaurer.<br>
                    Vous vous sentez très seul dans cette immense habitation, les domestiques mangeant dans la cuisine.<br>
                    <br>
                    Il est assez tard lorsque vous terminez le repas et vous sentez la fatigue vous gagner, mais peut-être désirez-vous effectuer un tour du manoir avant d'aller dormir ?
                </p>
                <form action="manoir/rdc" method="post">
                    <input type="submit" name="tour" value="Faire un tour.">
                </form>
                <form action="manoir/jour2" method="post">
                    <input type="submit" name="dormir" value="Aller dormir.">
                </form>
            <?php else: ?>
                <div id="succespopup">
                    <?php
                    $nouveausucces = '<img src="/escaperpg/images/succes/secrets/manoir.png"><span><u><b>Nouveau propriétaire</b></u><br>Entrer pour la première fois dans le manoir</span>';
                    $scenario = 'secrets';
                    $description = 'manoir';
                    $cache = 'non';
                    $rarete = 'succesnormal';
                    include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/succesadd.php";
                    if (!$succesexiste) {
                        echo $_SESSION['loggedin'] ?
                            '<script src="/escaperpg/scripts/succescount.js"></script>' :
                            '<script src="/escaperpg/scripts/succescountoffline.js"></script>';
                    }
                    ?>
                </div>
                <script src="/escaperpg/aventures/scripts/ouverturemanoir.js"></script>
                <div id="enigme">
                    <a href="/escaperpg/images/secrets/rdc.png" rel="lightbox[invent]"><img src="/escaperpg/images/secrets/rdc.png" alt="rez-de-chaussée"></a>
                </div>
                <p>
                    À votre entrée, vous sentez une bonne odeur émanant de la cuisine. Cependant, sous celle-ci, vous sentez des relents terribles d'une <span class="mdp">odeur</span> plus pernicieuse.<br>
                    <br>
                    Avant que vous n'ayez le temps d'y réfléchir un peu, une vieille domestique s'avance.
                <div class="dialogue">
                    <div class="portrait">
                        <img src="/escaperpg/images/secrets/monica.png" alt="monica">
                    </div>
                    <div class="bulleperso">
                        <p>
                            Ah ! Vous devez être M. Bastian. Je vous en prie, un bon repas vous attend dans la salle à manger.
                        </p>
                    </div>
                </div>
                </p>
                <form action="manoir" method="post">
                    <input type="submit" name="suivant" value="Suivant.">
                </form>
                <?php
                if (!in_array('Odeur', $_SESSION['mdp'])) {
                    $_SESSION['mdp'][] = 'Odeur';
                }
                ?>
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
