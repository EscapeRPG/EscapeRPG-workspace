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
            <?php if (isset($_POST['suivant'])): ?>
                <p>
                    Allongés sur des tables de pierre contre les murs, des <span class="mdp">cadavres</span> humains à l'état de décomposition avancée pourrissent,
                    le ventre ouvert comme si on avait procédé à une autopsie, ou des choses bien pires que vous osez à peine imaginer.
                    La plupart ont vu leurs organes retirés.<br>
                    Au centre de la pièce se trouve une énorme cuve en métal dont vous ne pouvez pas encore voir le contenu.<br>
                    <br>
                    Vous vous en approchez, chaque pas vous coûtant un effort surhumain.<br>
                    <br>
                    Vous atteignez la cuve et jetez un coup d'œil à son contenu.
                </p>
                <form action="cavesecrete" method="post">
                    <input type="submit" name="suivant2" value="Suivant.">
                </form>
                <?php $_SESSION['mdp'][] = "Cadavres"; ?>
            <?php elseif (isset($_POST['suivant2'])): ?>
                <div id="succespopup">
                    <?php
                    $nouveausucces = '<img src="/escaperpg/images/succes/secrets/verite.png"><span><u><b>Découvreur</b></u><br>Apprendre l\'horrible vérité sur le secret du manoir</span>';
                    $scenario = 'secrets';
                    $description = 'vérité';
                    $cache = 'non';
                    $rarete = 'succesargent';
                    include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/succesadd.php";
                    ?>
                </div>
                <p>
                    Baignant dans un <span class="mdp">liquide jaunâtre</span>, vous trouvez le corps d'un homme mort manifestement depuis très longtemps, à en juger par son état.
                    Votre regard se pose sur son visage et vous ne pouvez vous empêcher de tituber en arrière en criant.: l'homme entreposé ici n'est autre que votre père, mort depuis des années !<br>
                    Dans votre précipitation pour vous éloigner de la cuve, vous heurtez un bureau de fortune en bois et vous y accrochez fermement pour ne pas chanceler.<br>
                    <br>
                    Vous remarquez alors les quelques feuilles posées dessus.
                </p>
                <div id="enigme">
                    <a href="/escaperpg/images/secrets/journal2.png" rel="lightbox[invent]">
                        <img src="/escaperpg/images/secrets/journal2.png" alt="La deuxième page du journal de votre oncle">
                    </a>
                    <a href="/escaperpg/images/secrets/journal5.png" rel="lightbox[invent]">
                        <img src="/escaperpg/images/secrets/journal5.png" alt="La cinquième page du journal de votre oncle">
                    </a>
                    <a href="/escaperpg/images/secrets/journal6.png" rel="lightbox[invent]">
                        <img src="/escaperpg/images/secrets/journal6.png" alt="La sixième page du journal de votre oncle">
                    </a>
                    <a href="/escaperpg/images/secrets/journal7.png" rel="lightbox[invent]">
                        <img src="/escaperpg/images/secrets/journal7.png" alt="La septième page du journal de votre oncle">
                    </a>
                    <a href="/escaperpg/images/secrets/journal8.png" rel="lightbox[invent]">
                        <img src="/escaperpg/images/secrets/journal8.png" alt="La huitième page du journal de votre oncle">
                    </a>
                    <a href="/escaperpg/images/secrets/journal9.png" rel="lightbox[invent]">
                        <img src="/escaperpg/images/secrets/journal9.png" alt="La neuvième page du journal de votre oncle">
                    </a>
                </div>
                <form action="cavesecrete" method="post">
                    <input type="submit" name="prendre" value="Les prendre.">
                </form>
                <?php $_SESSION['mdp'][] = "Liquide jaunâtre"; ?>
            <?php elseif (isset($_POST['prendre'])): ?>
                <?php if (in_array('journal1', $_SESSION['inventaire'])): ?>
                    <div id="succespopup">
                        <?php
                        $nouveausucces = '<img src="/escaperpg/images/succes/secrets/journal.png"><span><u><b>Archiviste</b></u><br>Récupérer toutes les pages du journal de l\'oncle William</span>';
                        $scenario = 'secrets';
                        $description = 'journal';
                        $cache = 'non';
                        $rarete = 'succesbronze';
                        include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/succesadd.php";
                        ?>
                    </div>
                <?php endif; ?>
                <script src="/escaperpg/scripts/inventaireadds.js"></script>
                <p>
                    Vous venez de trouver les pages manquantes du journal de votre oncle.
                    Ce qu'elles contiennent vous donneront sans doute des cauchemars pour le restant de vos jours, si la folie ne vous emporte pas avant, mais vous ne pouvez vous empêcher de continuer à les lire.
                </p>
                <form action="cavesecrete" method="post">
                    <input type="submit" name="suivant3" value="Suivant.">
                </form>
                <?php
                $_SESSION['inventaire'][] = 'journal2';
                $_SESSION['inventaire'][] = 'journal5';
                $_SESSION['inventaire'][] = 'journal6';
                $_SESSION['inventaire'][] = 'journal7';
                $_SESSION['inventaire'][] = 'journal8';
                $_SESSION['inventaire'][] = 'journal9';
                ?>
            <?php elseif (isset($_POST['suivant3'])): ?>
                <p>
                    Ainsi, votre oncle pratiquait des expériences visant à réanimer des corps morts.
                    La masse gélatineuse observée là-haut semblerait pouvoir remplacer les organes défectueux pour redonner vie aux personnes récemment décédées, grâce à leur étonnante faculté à créer des appendices divers.
                    Le docteur Pellington a ainsi pu faire revenir votre oncle il y a plusieurs années, mais votre père était mort depuis trop longtemps pour que cela soit possible pour lui.<br>
                    Les dernières pages du journal sont rédigées dans une écriture grossière, montrant la folie grandissant dans l'esprit de votre oncle.<br>
                    <br>
                    Vous jetez un nouveau regard sur la pièce autour de vous.
                </p>
                <form action="cavesecrete" method="post">
                    <input type="text" name="cave"> <input type="submit" name="chercher" value="Inspecter.">
                </form>
                <?php elseif (isset($_POST['cave'])):
                switch (str_replace($search, $replace, stripslashes($_POST['cave']))):
                    case "liquidejaunatre": ?>
                        <p>
                            Ce liquide semble être du formol, un produit permettant de conserver des corps morts sur une longue période.
                            Votre oncle espérait ainsi pouvoir maintenir l'état de votre père le temps de parfaire sa technique et de le réanimer.
                        </p>
                        <form action="cavesecrete" method="post">
                            <input type="text" name="cave"> <input type="submit" name="chercher" value="Inspecter.">
                        </form>
                    <?php
                        break;
                    case "cadavres": ?>
                        <p>
                            En examinant de plus près les corps disposés ça-et-là, vous en trouvez un dont le ventre ouvert a été vidé pour y remplacer les organes par un shoggoth, le nom donné par votre oncle à la masse protoplasmique.
                            Celle-ci est parfaitement immobile et semble “morte”, mais…<br>
                            <br>
                            Mais vous ne parvenez pas à rassembler vos pensées de façon cohérentes après toutes les horreurs par lesquelles vous venez de passer.
                            Quelque chose semble cependant vous hanter et vous pressentez que cela revêt d'une importance capitale.
                        </p>
                        <form action="pensees" method="post">
                            <input type="submit" name="pensees" value="Réfléchir calmement.">
                        </form>
                    <?php
                        break;
                    default: ?>
                        <p>
                            Êtes-vous sûr de savoir ce que vous cherchez ici ?
                        </p>
                        <form action="cavesecrete" method="post">
                            <input type="text" name="cave"> <input type="submit" name="chercher" value="Inspecter.">
                        </form>
                <?php
                        break;
                endswitch;
                ?>
            <?php else: ?>
                <p>
                    En arrivant au bas de l'échelle, vos pieds foulent un sol de terre battue.<br>
                    L'odeur est à peine supportable ici et vous devez faire un terrible effort pour ne pas vous évanouir.
                    Vous ne pouvez vous empêcher de vous demander ce qui peut produire une telle puanteur... et savez que vous n'allez pas tarder à le découvrir.
                    <br>
                    Vous avancez un peu pour arriver dans une petite salle carrée et c'est là que l'horreur vous frappe
                </p>
                <form action="cavesecrete" method="post">
                    <input type="submit" name="suivant" value="Suivant.">
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
