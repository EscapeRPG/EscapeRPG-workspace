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
    <title>Fin - Secrets Familiaux</title>
</head>

<body>
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/header.php"; ?>
    <div id="banniere"><img src="/escaperpg/images/secrets/secretsfamiliauxmini.png" alt="secrets familiaux bannière"></div>
    <main>
        <div id="txt">
            <?php if (isset($_POST['envoyermessage'])): ?>
                <?php
                $comScenarioEnCours = 'secretscoms';
                include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/succesComment.php";
                ?>
            <?php endif; ?>
            <?php if (isset($_POST['fin']) || $_SESSION['fin']): ?>
                <div id="succespopup">
                    <?php
                    $nouveausucces = '<img src="/escaperpg/images/succes/general/fin.png"><span><u><b>Une page qui se tourne...</b></u><br>Terminer sa première aventure</span>';
                    $scenario = 'general';
                    $description = 'fin';
                    $cache = 'non';
                    $rarete = 'succesbronze';
                    include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/succesadd.php";
                    $nouveausucces = '<img src="/escaperpg/images/succes/secrets/fin.png"><span><u><b>Ainsi s\'achève l\'histoire</b></u><br>Terminer l\'aventure</span>';
                    $scenario = 'secrets';
                    $description = 'fin';
                    $cache = 'non';
                    $rarete = 'succesbronze';
                    include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/succesadd.php";
                    $nouveausucces = '<img src="/escaperpg/images/succes/secrets/fin1.png"><span><u><b>Victime</b></u><br>Terminer l\'aventure et obtenir 1 étoile</span>';
                    $scenario = 'secrets';
                    $description = 'étoile1';
                    $cache = 'oui';
                    $rarete = 'succesbronze';
                    include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/succesadd.php";
                    $nouveausucces = '<img src="/escaperpg/images/succes/secrets/fin2.png"><span><u><b>Martyr</b></u><br>Terminer l\'aventure et obtenir 2 étoiles</span>';
                    $scenario = 'secrets';
                    $description = 'étoile2';
                    $cache = 'oui';
                    $rarete = 'succesargent';
                    include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/succesadd.php";
                    $nouveausucces = '<img src="/escaperpg/images/succes/secrets/fin3.png"><span><u><b>Pyromane</b></u><br>Terminer l\'aventure et obtenir 3 étoiles</span>';
                    $scenario = 'secrets';
                    $description = 'étoile3';
                    $cache = 'oui';
                    $rarete = 'succesgold';
                    include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/succesadd.php";
                    ?>
                </div>
                <div id="enigme">
                    <img src="/escaperpg/images/secrets/fin.png" alt="fin">
                </div>
                <img src="/escaperpg/images/etoilefinpleine.png" alt="étoile pleine">
                <img src="/escaperpg/images/etoilefinpleine.png" alt="étoile pleine">
                <img src="/escaperpg/images/etoilefinpleine.png" alt="étoile pleine">
                <img src="/escaperpg/images/etoilefinvide.png" alt="étoile vide">
                <br>
                Félicitations, vous venez de terminer le scénario "Secrets Familiaux" d'<i>EscapeRPG</i> !
                <p>
                    Vous avez obtenu la fin "neutre", ce qui est l'une des meilleures fins possibles, mais vous pouvez encore faire mieux si vous désirez retenter l'expérience.<br>
                    Peut-être auriez-vous dû mener l'enquête un peu plus profondément après l'intrusion de Pellington dans le manoir, ou bien trouver un moyen de vous défaire du shoggoth ?<br>
                    <br>
                    Quoi qu'il en soit, merci d'avoir pris le temps de jouer.
                    J'espère que cette histoire vous aura plu, n'hésitez pas à laisser un commentaire sur la <a href="https://www.facebook.com/escaperpg" target="_blank" rel="noreferrer">page Facebook</a>,
                    chaque message est fortement apprécié !
                    Vous pourrez également y suivre les actualités pour savoir quand les prochains scénarios seront mis en ligne.<br>
                    <br>
                    Si le concept vous plaît, vous pouvez nous soutenir sur notre <a href="https://fr.tipeee.com/escaperpg" target="_blank" rel="noreferrer">page tipeee</a>
                    en nous faisant un don et nous permettre de vous proposer de nouveaux contenus.<br>
                    Chacune de ces pages vous propose des contenus exclusifs et uniques en rapport à leur mode de fonctionnement, n'hésitez donc pas à les consulter pour voir ce que vous pouvez y récupérer !<br>
                    <br>
                    Vous pouvez également laisser un commentaire directement ci-dessous pour faire savoir que vous avez terminé ce scénario !
                </p>
                <?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/commentairesAventures.php"; ?>
            <?php else: ?>
                <?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/sessioninc.php"; ?>
                <audio src="/escaperpg/sons/secrets/shoggothfeu.mp3" autoplay></audio>
                <p>
                    Vous rebroussez aussitôt chemin et courez en dehors de la maison.
                    Arrivé dans le jardin, vous risquez un regard en arrière, mais la créature ne semble pas vous avoir suivi.<br>
                    Au bord du désespoir, vous trouvez finalement une idée qui pourrait peut-être détruire ce monstre.<br>
                    <br>
                    Vous courez aussi vite que possible vers la remise au fond du jardin et avisez des jerricans d'essence.
                    Vous en prenez deux et retournez vers le manoir.<br>
                    Du bruit à l'étage vous confirme que le shoggoth est toujours occupé avec le boîtier électrique et vous commencez à déverser le contenu des bidons sur le sol du hall d'entrée.
                    Soudain, les lumières se coupent. Malgré vos réparations, le shoggoth a dû arracher le boîtier et couper le système électrique.
                    Vous entendez alors un bruit de mouvement au-dessus de vous, le monstre est en train de sortir du bureau !<br>
                    <br>
                    Vous finissez à la hâte de renverser l'essence puis sortez du manoir.<br>
                    Vous retournant une dernière fois, vous sortez de votre poche le briquet de votre père, dernier souvenir que vous avez de lui et que vous gardez avec vous où que vous allez, bien que vous ne soyez pas fumeur.<br>
                    Vous l'allumez et le jetez dans le hall d'entrée. L'essence prend feu aussitôt, l'incendie prend rapidement de l'ampleur et, bientôt, le manoir tout entier est la proie des flammes.<br>
                    Vous repartez en arrière et franchissez la grille en direction de la ville, laissant derrière vous le manoir en ruines et tous ses secrets.<br>
                    <br>
                    Vous ne pouvez être sûr que tout soit terminé et que le shoggoth est vraiment mort, mais pour vous, l'histoire s'arrête là.
                </p>
                <form action="3cvh15" method="post">
                    <input type="submit" name="fin" value="Fin.">
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
