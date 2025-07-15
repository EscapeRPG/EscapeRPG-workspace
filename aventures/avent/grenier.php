<?php
include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/entete.php";
$resetIndices = "/escaperpg/includes/resetIndices.php";
$indices = "/escaperpg/includes/indices.php";
?>
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
    <title>Une Étrange Machine - Le Grenier d'Arthur</title>
</head>

<body>
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/header.php"; ?>
    <div id="banniere"><img src="/escaperpg/images/avent/aventmini.png" alt="bannière le grenier d'arthur"></div>
    <main>
        <?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/avent/includes/nav.php"; ?>
        <div id="txt">
            <?php if (isset($_POST['activer'])): ?>
                <?php if (str_replace($search, $replace, stripslashes($_POST['activate'])) == "depart"): ?>
                    <div id="succespopup">
                        <?php
                        $nouveausucces = '<img src="/escaperpg/images/succes/avent/machine.png"><span><u><b>Apprentie mécanicienne</b></u><br>Réparer l\'étrange machine de Grand-Père</span>';
                        $scenario = 'avent';
                        $description = 'machine';
                        $cache = 'oui';
                        $rarete = 'succesnormal';
                        include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/succesadd.php";
                        ?>
                    </div>
                    <audio src="/escaperpg/sons/avent/machinedemarre.mp3" autoplay></audio>
                    <audio src="/escaperpg/sons/avent/tirercarte.mp3" autoplay></audio>
                    <p>
                        Dans un vrombissement tonitruant, la machine se met en marche. Au bout de quelques secondes, le vacarme s'atténue et vous n'entendez plus qu'un doux ronronnement.
                        Ça marche !<br>
                        <br>
                        Un petit compartiment s'ouvre de lui-même sur un côté et une lumière, étrange et fascinante, en sort.
                        Vous remarquez un drap sombre tendu sur le mur en face. La machine semble y projeter de petites taches blanches.<br>
                        De quoi peut-il bien s'agir ?<br>
                        <br>
                        Accroché sur le drap, vous remarquez un petit papier et vous vous en emparez.
                    </p>
                    <span class="turn-card">Retournez la carte 9.</span>
                    <form action="enroute" method="post">
                        <input type="submit" name="suivant3" value="SUIVANT.">
                    </form>
                    <?php include $_SERVER['DOCUMENT_ROOT'] . $resetIndices; ?>
                <?php else: ?>
                    <p>
                        Cela ne semble pas fonctionner. Peut-être avez-vous fait une erreur quelque part ?
                    </p>
                    <div id="machineenigme"></div>
                    <form action="grenier" method="post">
                        <input type="text" name="activate">
                        <input type="submit" name="activer" value="ACTIVER.">
                    </form>
                    <?php
                    $reponse = "Les pièces, mises dans le bon sens, forment le mot de passe à rentrer : \"Départ\".";
                    $indice1 = "Certaines des pièces semblent ne pas être installées correctement. Essayez de les faire bouger.";
                    $indice2 = "Cliquez sur les pièces de machine qui ne sont pas dans le bon sens, cela les fera pivoter.";
                    $indice3 = "Associez bien les embouts de couleur entre eux et vous devriez voir un mot se dessiner.";
                    include $_SERVER['DOCUMENT_ROOT'] . $indices;
                    ?>
                    <script src="/escaperpg/aventures/scripts/rotation.js"></script>
                <?php endif; ?>
            <?php elseif (isset($_POST['reference']) || isset($_SESSION['reference'])): ?>
                <?php if (str_replace($search, $replace, stripslashes($_POST['ref'])) == "7ff8357" || isset($_SESSION['reference'])): ?>
                    <?php if (isset($_POST['reference'])): ?>
                        <?php include $_SERVER['DOCUMENT_ROOT'] . $resetIndices; ?>
                    <?php endif; ?>
                    <audio src="/escaperpg/sons/avent/posepieces.mp3" autoplay></audio>
                    <div id="machineenigme"></div>
                    <p>
                        Vous placez les différentes pièces de machine que vous avez trouvées et essayez de comprendre comment elle marche.<br>
                        Vous prenez un peu de recul.<br>
                        <br>
                        Quel bazar ! Pas étonnant que la machine ait mal fonctionné ! Il va falloir remettre un peu d'ordre dans tout ça !
                    </p>
                    <script src="/escaperpg/aventures/scripts/rotation.js"></script>
                    <form action="grenier" method="post">
                        <input type="text" name="activate">
                        <input type="submit" name="activer" value="ACTIVER.">
                    </form>
                    <?php
                    $reponse = "Les pièces, mises dans le bon sens, forment le mot de passe à rentrer : \"Départ\".";
                    $indice1 = "Certaines des pièces semblent ne pas être installées correctement. Essayez de les faire bouger.";
                    $indice2 = "Cliquez sur les pièces de machine qui ne sont pas dans le bon sens, cela les fera pivoter.";
                    $indice3 = "Associez bien les embouts de couleur entre eux et vous devriez voir un mot se dessiner.";
                    include $_SERVER['DOCUMENT_ROOT'] . $indices;
                    ?>
                    <?php $_SESSION['reference'] = true; ?>
                <?php else: ?>
                    <audio src="/escaperpg/sons/avent/posepieces.mp3" autoplay></audio>
                    <p>
                        Cela ne semble pas fonctionner, êtes-vous sûre d'avoir fait ce qu'il fallait ?<br>
                        <br>
                        Vous êtes face à l'étrange machine de votre grand-père, avec les deux pièces que vous avez trouvées dans le grenier.<br>
                        <br>
                        Vous cherchez à les installer sur la machine mais il semblerait que les deux pièces soient très similaires.
                        Peut-être y a-t-il un moyen de savoir dans quel ordre les positionner ?
                    </p>
                    <form action="grenier" method="post">
                        <input type="text" name="ref">
                        <input type="submit" name="reference" value="valider.">
                    </form>
                    <?php
                    $reponse = "Les pièces de machine forment les chiffres 1 et 2 pour donner l'ordre. La référence à entrer est \"7ff-8357\".";
                    $indice1 = "Observez bien les deux pièces que vous avez récupérées. Il y a sans doute un indice dessus.";
                    $indice2 = "Avez-vous remarqué les références qui sont gravées sur les plaques ?";
                    $indice3 = "Pour trouver l'ordre, fiez-vous à la forme des pièces. Ne vous rappellent-elles pas quelque chose ?";
                    include $_SERVER['DOCUMENT_ROOT'] . $indices;
                    ?>
                <?php endif; ?>
            <?php elseif (isset($_POST['carteduciel'])): ?>
                <audio src="/escaperpg/sons/avent/tirercarte.mp3" autoplay></audio>
                <p>
                    Vous trouvez une carte sur laquelle sont dessinées des étoiles reliées entre elles. Sans doute une constellation, bien que celle-ci semble incomplète.<br>
                    <br>
                    Vous la prenez avec vous, au cas où.
                </p>
                <span class="turn-card">Retournez la carte numéro 3.</span>
                <form action="grenier" method="post">
                    <input type="submit" name="suivant2" value="RETOUR.">
                </form>
                <?php $_SESSION['carteciel'] = true; ?>
            <?php elseif (isset($_POST['machineetrange'])): ?>
                <?php if (!isset($_SESSION['piecemachine1']) && !isset($_SESSION['piecemachine2'])): ?>
                    <p>
                        Il manque des pièces à cette machine. Si vous voulez la démarrer, il va falloir trouver de quoi la réparer.
                    </p>
                    <form action="grenier" method="post">
                        <input type="submit" name="suivant2" value="RETOUR.">
                    </form>
                <?php elseif (!isset($_SESSION['piecemachine1']) || !isset($_SESSION['piecemachine2'])): ?>
                    <p>
                        Vous essayez de placer la pièce que vous avez trouvée mais rien ne se passe.
                        Il manque sans doute encore quelque chose, vous devriez retourner fouiller le grenier.
                    </p>
                    <form action="grenier" method="post">
                        <input type="submit" name="suivant2" value="RETOUR.">
                    </form>
                <?php else: ?>
                    <p>
                        Vous êtes face à l'étrange machine de votre grand-père, avec les deux pièces que vous avez trouvées dans le grenier.<br>
                        <br>
                        Vous cherchez à les installer sur la machine mais il semblerait que les deux pièces soient très similaires.
                        Peut-être y a-t-il un moyen de savoir dans quel ordre les positionner ?
                    </p>
                    <form action="grenier" method="post">
                        <input type="text" name="ref">
                        <input type="submit" name="reference" value="valider.">
                    </form>
                    <?php
                    $reponse = "Les pièces de machine forment les chiffres 1 et 2 pour donner l'ordre. La référence à entrer est \"7ff-8357\".";
                    $indice1 = "Observez bien les deux pièces que vous avez récupérées. Il y a sans doute un indice dessus.";
                    $indice2 = "Avez-vous remarqué les références qui sont gravées sur les plaques ?";
                    $indice3 = "Pour trouver l'ordre, fiez-vous à la forme des pièces. Ne vous rappellent-elles pas quelque chose ?";
                    include $_SERVER['DOCUMENT_ROOT'] . $indices;
                    ?>
                <?php endif; ?>
            <?php elseif (isset($_POST['suivant2'])): ?>
                <p>
                    Vous regardez autour de vous.
                    En attendant qu'il revienne, peut-être pouvez-vous essayer de remettre la machine en état de marche ?
                </p>
                <form action="grenier" method="post">
                    <div id="enigmelieu">
                        <img src="/escaperpg/images/avent/grenier.png" alt="grenier">
                        <button type="submit" name="machineetrange" id="machine">
                            <img src="/escaperpg/images/avent/machine.png" alt="la machine bizarre de grand-père, elle semble incomplète">
                        </button>
                        <button type="submit" name="piecemachine1" id="piecedemachine1">
                            <img src="/escaperpg/images/avent/piece1.png" alt="une pièce de machine">
                        </button>
                        <button type="submit" name="piecemachine2" id="piecedemachine2">
                            <img src="/escaperpg/images/avent/piece2.png" alt="une pièce de machine">
                        </button>
                        <button type="submit" name="carteduciel" id="carteciel">
                            <img src="/escaperpg/images/avent/carteciel.png" alt="une carte des étoiles">
                        </button>
                    </div>
                </form>
                <?php
                $reponse = "Cliquez sur le tuyau posé sur la table de gauche, ainsi que sur celui caché sous la table du centre. Une fois les deux pièces trouvées, cliquez directement sur la machine qui est sur la table.";
                $indice1 = "Fouillez bien l'image, il y a sans doute des choses sur lesquelles cliquer.";
                $indice2 = "Vous pouvez trouver deux pièces de machines cachées dans le décor, ainsi qu'un autre objet.";
                $indice3 = "Vous avez besoin de deux tuyaux pour avancer.";
                include $_SERVER['DOCUMENT_ROOT'] . $indices;
                ?>
            <?php elseif (isset($_POST['piecemachine1'])): ?>
                <audio src="/escaperpg/sons/avent/tirercarte.mp3" autoplay></audio>
                <p>
                    Vous trouvez une pièce de machine étrange qui pourrait parfaitement convenir.
                </p>
                <span class="turn-card">Retournez la carte numéro 5.</span>
                <form action="grenier" method="post">
                    <input type="submit" name="suivant2" value="RETOUR.">
                </form>
                <?php $_SESSION['piecemachine1'] = true; ?>
            <?php elseif (isset($_POST['piecemachine2'])): ?>
                <audio src="/escaperpg/sons/avent/tirercarte.mp3" autoplay></audio>
                <p>
                    Vous trouvez une pièce de machine étrange qui pourrait parfaitement convenir.
                </p>
                <span class="turn-card">Retournez la carte numéro 12.</span>
                <form action="grenier" method="post">
                    <input type="submit" name="suivant2" value="RETOUR.">
                </form>
                <?php $_SESSION['piecemachine2'] = true; ?>
            <?php elseif (isset($_POST['suivant'])): ?>
                <p>
                    L'énorme machine qui se tient là semble incomplète. Vous constatez çà et là de petites marques de brûlures.
                    La table sur laquelle l'engin est posé comporte elle aussi ce genre de traces.<br>
                    <br>
                    En voulant activer le mécanisme, votre grand-père a dû faire une erreur et la machine s'est disloquée.
                    Il est parti acheter les pièces dont il avait besoin pour corriger le problème, c'est sûr !<br>
                    <br>
                    En tout cas, vous espérez qu'il ne s'est pas blessé, ou pire : qu'il ait fini à l'hôpital !
                </p>
                <form action="grenier" method="post">
                    <input type="submit" name="suivant2" value="SUIVANT.">
                </form>
            <?php else: ?>
                <audio src="/escaperpg/sons/avent/pasescalier.mp3" autoplay></audio>
                <p>
                    Vous montez les marches et arrivez dans la grande pièce sous les combles où s'entassent pêle-mêle toutes sortes d'inventions -achevées ou non- au milieu de piles de cartons remplis de matériaux,
                    de montagnes de feuilles parcourues de croquis ou encore de livres tellement vieux et usés que vous n'oseriez même pas les ouvrir, de peur de voir leurs pages tomber en miettes.<br>
                    <br>
                    Regardant autour de vous, vous ne trouvez toujours pas Arthur.<br>
                    Vous connaissez la plupart des créations autour de vous, ayant même aidé votre grand-père à travailler sur certaines d'entre elles.<br>
                    <br>
                    Il y en a une, cependant, que vous n'aviez jamais vue. Elle trône au beau milieu de la pièce, sur une table.<br>
                    Fascinée, vous vous en approchez.
                </p>
                <form action="grenier" method="post">
                    <input type="submit" name="suivant" value="SUIVANT.">
                </form>
                <?php include $_SERVER['DOCUMENT_ROOT'] . $resetIndices; ?>
            <?php endif; ?>
        </div>
    </main>
    <div id="load">
        <div id="loader"></div>
    </div>
    <script src="/escaperpg/scripts/aventures-chargement.js"></script>
</body>

</html>
