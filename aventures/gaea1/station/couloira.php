<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/entete.php"; $_SESSION['plancurrent'] = "o"; ?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <script type="text/javascript" src="/escaperpg/lightbox/js/prototype.js"></script>
        <script type="text/javascript" src="/escaperpg/lightbox/js/scriptaculous.js?load=effects,builder"></script>
        <script type="text/javascript" src="/escaperpg/lightbox/js/lightbox.js"></script>
        <link rel="stylesheet" href="/escaperpg/lightbox/css/lightbox.css" type="text/css" media="screen">
        <link rel="stylesheet" href="/escaperpg/aventures/gaea1/css/style.css">
        <meta charset="utf-8">
        <title>Couloir A - Station GAEA-1</title>
    </head>

    <body onload="chargement()">
        <?php include_once $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/header.php"; ?>

        <div id="banniere"><img src="/escaperpg/images/gaea1/gaea1mini.png" alt="gaea 1 bannière"></div>

        <div id="bloc_page">
            <?php include_once $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/gaea1/includes/nav.php"; ?>

            <div id="txt">
                <?php if ((rand(0, 100) <= 40) && !$_SESSION['eventa']): ?>
                    <p>
                        Alors que vous franchissez la porte et entrez dans le couloir A, vous remarquez quelque chose que vous n'aviez pas vu auparavant :
                        au sol, recouvert d'une sorte de mucus brunâtre, se trouve une paire de lunettes dont l'un des carreaux est cassé.
                        Vous êtes cependant <?= $_SESSION['feminin'] ? 'certaine' : 'certain' ?> qu'elles n'étaient pas là auparavant.<br>
                        Mais alors, comment sont-elles arrivées là ?<br>
                        <br>
                        Réprimant un frisson, vous décidez de ne pas traîner ici.
                    </p>
                    
                    <?php $_SESSION['eventa'] = true; ?>
                    
                <?php elseif ($_SESSION['ovisited']): ?>
                    <p>
                        Vous êtes de nouveau dans le couloir A. Il ne semble pas y avoir quoi que ce soit d'intéressant par ici.
                        Peut-être qu'en revenant plus tard, lorsque le courant sera rétabli, vous pourrez y consulter les bornes et trouver quelque chose d'intéressant ?<br>
                        <br>
                        À condition de pouvoir traduire le langage de GAEA-1, bien entendu...
                    </p>
                    
                <?php else: ?>
                    <p>
                        Repassant par le couloir A, vous prenez quelques instants pour étudier la disposition des pièces.<br>
                        Au Nord se trouve le hall principal, où vous étiez <?= $_SESSION['feminin'] ? 'allée' : 'allé' ?> directement à votre premier passage, suivant les indications sur les murs.<br>
                        Au Sud se trouve le terminal des arrivées avec ses nombreux bagages dispersés partout.<br>
                        À l'Est, le couloir se prolonge et donne sur une petite zone avec des bornes automatiques — évidemment hors service — permettant de consulter des informations,
                        avant de se terminer sur une porte menant au <?= $_SESSION['hvisited'] ? 'couloir' : 'kurdior' ?> F.<br>
                        À l'Ouest, enfin, vous avez une porte menant au <?= $_SESSION['nvisited'] ? 'couloir' : 'kurdior' ?> B.
                    </p>
                    
                    <?php $_SESSION['ovisited'] = true; ?>
                <?php endif; ?>
            </div>
        </div>

        <div id="load"><div id="loader"></div></div>

        <script src="/escaperpg/scripts/aventures-chargement.js"></script>

        <?php include_once $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/gaea1/includes/footer.php"; ?>
    </body>
</html>
