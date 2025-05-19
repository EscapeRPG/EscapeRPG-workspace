<?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/entete.php";
$_SESSION['plancurrent'] = "q"; ?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <script type="text/javascript" src="/escaperpg/lightbox/js/prototype.js"></script>
    <script type="text/javascript" src="/escaperpg/lightbox/js/scriptaculous.js?load=effects,builder"></script>
    <script type="text/javascript" src="/escaperpg/lightbox/js/lightbox.js"></script>
    <link rel="stylesheet" href="/escaperpg/lightbox/css/lightbox.css" type="text/css" media="screen">
    <link rel="stylesheet" href="/escaperpg/aventures/gaea1/css/style.css">
    <meta charset="utf-8">
    <title>Hangar - Station GAEA-1</title>
</head>

<body>
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/header.php"; ?>

    <div id="banniere"><img src="/escaperpg/images/gaea1/gaea1mini.png" alt="gaea 1 bannière"></div>

    <main>
        <?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/gaea1/includes/nav.php"; ?>

        <div id="txt">
            <?php if ($_SESSION['visitestation']): ?>
                <p>
                    Le grand hangar où vous avez apponté s'ouvre devant vous. Le SEEKER est posé là, au milieu des câbles d'entretien serpentant au sol et des caisses d'outils.
                    Vous faites un tour d'horizon de la salle mais vous ne voyez rien qui puisse vous intéresser.<br>
                    <br>
                    <?= $_SESSION['feminin'] ? 'Nerveuse' : 'Nerveux' ?>, vous indiquez à M.A.R-V de se tenir prêt à démarrer les moteurs à tout moment, en cas de fuite.
                </p>

                <div class="dialogue">
                    <div id="marv"><img src="/escaperpg/images/gaea1/marv.png" alt="dialogue marv"></div>

                    <div id="bullemarv">
                        <p>
                            Bien reçu <?= $_SESSION['feminin'] ? 'commandante' : 'commandant' ?>,
                            mais un départ précipité ne saurait être envisagé tant que vous n'avez pas découvert l'origine du signal de détresse.
                        </p>
                    </div>
                </div>

                <p>
                    Vous ne pouvez effectivement partir d'ici avant de savoir ce qu'il s'est passé.
                    Et pour cela, votre prochaine étape passe par le pont de commandement.<br>>
                    <br>>
                    Vous tournez les talons.
                </p>

            <?php elseif (isset($_POST['explorer'])): ?>
                <audio src="/escaperpg/sons/gaea1/decompression.mp3" autoplay></audio>

                <p>
                    La station n'étant plus alimentée, vous allumez la lampe de votre combinaison pour observer autour de vous.<br>
                    <br>
                    Le hangar, bien qu'en désordre, semble toutefois en bon état. Vous pensez que l'absence d'oxygène n'est pas due à une brèche dans la coque.
                    En faisant un rapide tour d'horizon, vous constatez que les capsules de sauvetage de ce niveau sont toujours en place.
                    Il y a donc de fortes chances pour que les personnes vivant sur cette station y soient toujours.<br>
                    <br>
                    Vous espérez simplement que leur silence radio et le vide d'air ne soient pas de mauvais augure.
                </p>

                <form action="hangar" method="post">
                    <input type="submit" name="suivant" value="suivant.">
                </form>

            <?php elseif (isset($_POST['suivant'])): ?>
                <p>
                    Vous vous dirigez alors vers la porte menant au cœur de la station mais, en arrivant devant, vous constatez que le manque d'énergie la rend hermétiquement close.
                    Vous sortez l'outil multifonction accroché à votre ceinture et faites sauter le panneau électrique pour shunter le circuit.
                </p>
                <form action="hangar" method="post">
                    <input type="submit" name="shunter" value="pirater l'accès.">
                </form>

            <?php elseif (isset($_POST['shunter']) or $_SESSION['shunter']): ?>
                <?php $_SESSION['shunter'] = true; ?>

                <div id="canvas-wrap">
                    <img src="/escaperpg/images/gaea1/electricite/fond.png">
                    <div id="electricite">
                        <div id="a1" class="elec" data-row="0" data-col="0" data-orientation="0"><img src="/escaperpg/images/gaea1/electricite/cablecoude.png" id="case1"></div>
                        <div id="a2" class="elec" data-row="0" data-col="1" data-orientation="0"><img src="/escaperpg/images/gaea1/electricite/cabledroit.png" id="case2"></div>
                        <div id="a3" class="elec" data-row="0" data-col="2" data-orientation="0"><img src="/escaperpg/images/gaea1/electricite/cablecoude.png" id="case3"></div>
                        <div id="a4" class="elec" data-row="0" data-col="3" data-orientation="0"><img src="/escaperpg/images/gaea1/electricite/cablet.png" id="case4"></div>
                        <div id="a5" class="elec" data-row="0" data-col="4" data-orientation="0"><img src="/escaperpg/images/gaea1/electricite/cablecoude.png" id="case5"></div>
                        <div id="a6" class="elec" data-row="0" data-col="5" data-orientation="0"><img src="/escaperpg/images/gaea1/electricite/cabledroit.png" id="case6"></div>
                        <div id="b1" class="elec" data-row="1" data-col="0" data-orientation="0"><img src="/escaperpg/images/gaea1/electricite/cablecoude.png" id="case7"></div>
                        <div id="b2" class="elec" data-row="1" data-col="1" data-orientation="0"><img src="/escaperpg/images/gaea1/electricite/cablecoude.png" id="case8"></div>
                        <div id="b3" class="elec" data-row="1" data-col="2" data-orientation="0"><img src="/escaperpg/images/gaea1/electricite/cablecoude.png" id="case9"></div>
                        <div id="b4" class="elec" data-row="1" data-col="3" data-orientation="0"><img src="/escaperpg/images/gaea1/electricite/cabledroit.png" id="case10"></div>
                        <div id="b5" class="elec" data-row="1" data-col="4" data-orientation="0"><img src="/escaperpg/images/gaea1/electricite/cablet.png" id="case11"></div>
                        <div id="b6" class="elec" data-row="1" data-col="5" data-orientation="0"><img src="/escaperpg/images/gaea1/electricite/cablecoude.png" id="case12"></div>
                        <div id="c1" class="elec" data-row="2" data-col="0" data-orientation="0"><img src="/escaperpg/images/gaea1/electricite/cabledroit.png" id="case13"></div>
                        <div id="c2" class="elec" data-row="2" data-col="1" data-orientation="0"><img src="/escaperpg/images/gaea1/electricite/cablecoude.png" id="case14"></div>
                        <div id="c3" class="elec" data-row="2" data-col="2" data-orientation="0"><img src="/escaperpg/images/gaea1/electricite/cablecoude.png" id="case15"></div>
                        <div id="c4" class="elec" data-row="2" data-col="3" data-orientation="0"><img src="/escaperpg/images/gaea1/electricite/cablecoude.png" id="case16"></div>
                        <div id="c5" class="elec" data-row="2" data-col="4" data-orientation="0"><img src="/escaperpg/images/gaea1/electricite/cablecoude.png" id="case17"></div>
                        <div id="c6" class="elec" data-row="2" data-col="5" data-orientation="0"><img src="/escaperpg/images/gaea1/electricite/cabledroit.png" id="case18"></div>
                        <div id="d1" class="elec" data-row="3" data-col="0" data-orientation="0"><img src="/escaperpg/images/gaea1/electricite/cablecoude.png" id="case19"></div>
                        <div id="d2" class="elec" data-row="3" data-col="1" data-orientation="0"><img src="/escaperpg/images/gaea1/electricite/cabledroit.png" id="case20"></div>
                        <div id="d3" class="elec" data-row="3" data-col="2" data-orientation="0"><img src="/escaperpg/images/gaea1/electricite/cablet.png" id="case21"></div>
                        <div id="d4" class="elec" data-row="3" data-col="3" data-orientation="0"><img src="/escaperpg/images/gaea1/electricite/cablecoude.png" id="case22"></div>
                        <div id="d5" class="elec" data-row="3" data-col="4" data-orientation="0"><img src="/escaperpg/images/gaea1/electricite/cablet.png" id="case23"></div>
                        <div id="d6" class="elec" data-row="3" data-col="5" data-orientation="0"><img src="/escaperpg/images/gaea1/electricite/cabledroit.png" id="case24"></div>
                        <div id="e1" class="elec" data-row="4" data-col="0" data-orientation="0"><img src="/escaperpg/images/gaea1/electricite/cablecoude.png" id="case25"></div>
                        <div id="e2" class="elec" data-row="4" data-col="1" data-orientation="0"><img src="/escaperpg/images/gaea1/electricite/cablecoude.png" id="case26"></div>
                        <div id="e3" class="elec" data-row="4" data-col="2" data-orientation="0"><img src="/escaperpg/images/gaea1/electricite/cabledroit.png" id="case27"></div>
                        <div id="e4" class="elec" data-row="4" data-col="3" data-orientation="0"><img src="/escaperpg/images/gaea1/electricite/cabledroit.png" id="case28"></div>
                        <div id="e5" class="elec" data-row="4" data-col="4" data-orientation="0"><img src="/escaperpg/images/gaea1/electricite/cablecoude.png" id="case29"></div>
                        <div id="e6" class="elec" data-row="4" data-col="5" data-orientation="0"><img src="/escaperpg/images/gaea1/electricite/cablecoude.png" id="case30"></div>
                        <div id="f1" class="elec" data-row="5" data-col="0" data-orientation="0"><img src="/escaperpg/images/gaea1/electricite/cabledroit.png" id="case31"></div>
                        <div id="f2" class="elec" data-row="5" data-col="1" data-orientation="0"><img src="/escaperpg/images/gaea1/electricite/cablecoude.png" id="case32"></div>
                        <div id="f3" class="elec" data-row="5" data-col="2" data-orientation="0"><img src="/escaperpg/images/gaea1/electricite/cablecoude.png" id="case33"></div>
                        <div id="f4" class="elec" data-row="5" data-col="3" data-orientation="0"><img src="/escaperpg/images/gaea1/electricite/cabledroit.png" id="case34"></div>
                        <div id="f5" class="elec" data-row="5" data-col="4" data-orientation="0"><img src="/escaperpg/images/gaea1/electricite/cablecoude.png" id="case35"></div>
                        <div id="f6" class="elec" data-row="5" data-col="5" data-orientation="0"><img src="/escaperpg/images/gaea1/electricite/cabledroit.png" id="case36"></div>
                        <div id="diode1" class="eventsoff"><img src="/escaperpg/images/gaea1/electricite/diodeeteinte.png" id="imgdiode1"></div>
                        <div id="diode2" class="eventsoff"><img src="/escaperpg/images/gaea1/electricite/diodeeteinte.png" id="imgdiode2"></div>
                        <div id="diode3" class="eventsoff"><img src="/escaperpg/images/gaea1/electricite/diodeeteinte.png" id="imgdiode3"></div>
                    </div>
                </div>

                <script src="/escaperpg/aventures/gaea1/scripts/electricite.js"></script>

                <?php
                $reponse = "<img src=\"/escaperpg/images/gaea1/electricite/solution.png\">";
                $indice1 = "Tâchez de faire passer le courant depuis la diode allumée en haut à gauche jusqu'aux autres sur les côtés et dans le circuit.";
                $indice2 = "Toutes les pièces ne seront pas utiles.";
                $indice3 = "Depuis la case de départ, commencez par partir vers le haut et essayez d'allumer la diode en haut à droite, cela devrait vous aider à trouver la suite du chemin.";

                include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/gaea1/includes/indices.php";
                ?>

            <?php elseif (isset($_POST['suivant2'])): ?>
                <div id="exploration" onmousemove="lampe()">
                    <img src="/escaperpg/images/gaea1/station/hangar.png">

                    <form action="terminal" method="post">
                        <button type="submit" name="pieddebiche" id="pieddebiche"><img src="/escaperpg/images/gaea1/station/pieddebiche.png"></button>
                    </form>

                    <canvas id="canvasexplo"></canvas>
                </div>

                <script src="/escaperpg/aventures/gaea1/scripts/lampe.js"></script>

            <?php else: ?>
                <div id="succespopup">
                    <?php
                    $nouveausucces = '<img src="/escaperpg/images/succes/gaea1/atterrir.png"><span><u><b>Appontage en douceur</b></u><br>Réussir à apponter sur la station</span>';
                    $scenario = 'gaea1';
                    $description = 'atterrir';
                    $cache = 'non';
                    $rarete = 'succesnormal';
                    include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/succesadd.php";
                    ?>
                </div>

                <audio src="/escaperpg/sons/gaea1/enfilecombinaison.mp3" autoplay></audio>

                <div class="dialogue">
                    <div id="marv"><img src="/escaperpg/images/gaea1/marv.png" alt="dialogue marv"></div>

                    <div id="bullemarv">
                        <p>
                            Appontage réussi <?= $_SESSION['feminin'] ? 'commandante' : 'commandant' ?> !
                            Vous pouvez sortir du vaisseau. Mes senseurs indiquent que les systèmes de survie de la station sont inactifs, je recommande l'utilisation de votre combinaison.
                        </p>
                    </div>
                </div>

                <div class="dialogue">
                    <div class="bulleperso2">
                        <p>
                            Pfff... !<br><br>
                            Heureusement que tu es là, je n'y aurais jamais pensé.
                        </p>
                    </div>

                    <div class="portrait2"><img src="/escaperpg/images/gaea1/avatar/fond.png"><?= $_SESSION['avatar'] ?></div>
                </div>

                <div class="dialogue">
                    <div id="marv"><img src="/escaperpg/images/gaea1/marv.png" alt="dialogue marv"></div>

                    <div id="bullemarv">
                        <p>
                            C'est là le but de mon existence, <?= $_SESSION['feminin'] ? 'commandante' : 'commandant' ?> : vous assister au quotidien.
                        </p>
                    </div>
                </div>

                <p>
                    Vous lâchez un nouveau soupir d'exaspération, puis sortez de la cabine de pilotage pour vous rendre au sas de décompression.
                    Là, vous enfilez votre combinaison et commencez à vérifier que tout est au vert.
                </p>

                <div class="dialogue">
                    <div id="marv"><img src="/escaperpg/images/gaea1/marv.png" alt="dialogue marv"></div>

                    <div id="bullemarv">
                        <p>
                            Oxygène de la combinaison : 100%.<br>
                            Intégrité de la combinaison : 100%.<br>
                            Sous-systèmes : actifs.<br><br>
                            Vous pouvez y aller. En vous souhaitant un agréable séjour sur cette station !
                        </p>
                    </div>
                </div>

                <p>
                    Ne prenant même pas le temps de répondre, vous actionnez la manette et patientez quelques secondes, le temps que le sas ait terminé la décompression.
                    Lorsque le voyant au-dessus de la porte de sortie s'allume, vous ouvrez et posez le pied sur GAEA-1.
                </p>

                <form action="hangar" method="post">
                    <input type="submit" name="explorer" value="explorer la station.">
                </form>

                <?php
                $_SESSION['indice1'] = false;
                $_SESSION['indice2'] = false;
                $_SESSION['indice3'] = false;
                $_SESSION['reponse'] = false;
                $_SESSION['combinaison'] = true;
                ?>
            <?php endif; ?>
        </div>
        </div>

        <div id="load">
            <div id="loader"></div>
        </div>

        <script src="/escaperpg/scripts/aventures-chargement.js"></script>

        <?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/gaea1/includes/footer.php"; ?>
</body>

</html>
