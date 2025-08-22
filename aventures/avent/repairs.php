<?php
include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/entete.php";
$reponse = "Il faut mettre 53 dans le champ du réservoir puis cliquer sur le bouton d'allumage.";
$indice1 = "Avez-vous remarqué qu'il y avait déjà du carburant dans le réservoir ?";
$indice2 = "Déterminez la valeur actuelle dans le réservoir ainsi que la valeur à atteindre pour savoir combien vous devez ajouter.";
$indice3 = "Il y a actuellement 22cL de carburant dans le réservoir.";
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
    <title>Réparations - Le Grenier d'Arthur</title>
</head>

<body>
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/header.php"; ?>
    <div id="banniere"><img src="/escaperpg/images/avent/aventmini.png" alt="bannière le grenier d'arthur"></div>
    <main>
        <?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/avent/includes/nav.php"; ?>
        <div id="txt">
            <?php if (isset($_POST['boutonmachine'])): ?>
                <?php if (str_replace($search, $replace, stripslashes($_POST['reservoir'])) == 53): ?>
                    <div id="succespopup">
                        <?php
                        $nouveausucces = '<img src="/escaperpg/images/succes/avent/cadeaux.png"><span><u><b>Véritable mécano !</b></u><br>Réparer la machine à cadeaux du Père Noël !</span>';
                        $scenario = 'avent';
                        $description = 'cadeaux';
                        $cache = 'oui';
                        $rarete = 'succesbronze';
                        include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/succesadd.php";
                        ?>
                    </div>
                    <audio src="/escaperpg/sons/avent/etape3.mp3" autoplay></audio>
                    <p>
                        La machine commence à vibrer alors que son moteur se remet en route.<br>
                        Vous constatez que le tapis roulant qui en sort commence à bouger, lui aussi.
                        Une petite boîte rouge ornée d'un ruban vert en sort.<br>
                        <br>
                        Votre grand-père se dirige vers elle.
                    </p>
                    <div class="dialogue">
                        <div class="portrait">
                            <img src="/escaperpg/images/avent/arthur.png" alt="arthur">
                        </div>
                        <div class="bulleperso">
                            <p>
                                Hourra ! Nous avons réussi, Sarah !
                                C'est incroyable ! Tu es vraiment douée ma petite. Avec toi, la relève est assurée !
                            </p>
                        </div>
                    </div>
                    <p>
                        Il part d'un rire communicatif avant de reprendre son sérieux puis de s'approcher de vous, tout en tenant le petit paquet dans ses mains.
                    </p>
                    <div class="dialogue">
                        <div class="portrait">
                            <img src="/escaperpg/images/avent/arthur.png" alt="arthur">
                        </div>
                        <div class="bulleperso">
                            <p>
                                Tiens, regarde ce qui est écrit sur l'étiquette.
                            </p>
                        </div>
                    </div>
                    <p>
                        Vous vous saisissez de la boîte et constatez avec étonnement qu'il y est écrit : "Pour Sarah Latour, en guise de remerciements".
                        Vous n'en croyez pas vos yeux !
                    </p>
                    <div class="dialogue">
                        <div class="portrait">
                            <img src="/escaperpg/images/avent/arthur.png" alt="arthur">
                        </div>
                        <div class="bulleperso">
                            <p>
                                Et alors, qu'est-ce que tu attends ? Ouvre-le !
                            </p>
                        </div>
                    </div>
                    <form action="retour" method="post">
                        <input type="submit" name="ouvrir" value="ouvrir le cadeau.">
                    </form>
                <?php elseif (str_replace($search, $replace, stripslashes($_POST['reservoir'])) == 75): ?>
                    <p>
                        Rien ne se passe.<br>
                        <br>
                        - Placer le sapence dans son compartiment.<br>
                        - Calibrer le régulateur sur 4 et abaisser le levier.<br>
                        - Remplir le réservoir aux 3/4.<br>
                        - Appuyer sur le bouton rouge.
                    </p>
                    <div id="enigmelieu">
                        <img src="/escaperpg/images/avent/machineperenoel3.png" alt="la machine à cadeaux du père noël">
                        <div id="machineperenoel">
                            <input type="range" name="range" min="1" max="9" value="4">
                            <form action="repairs" method="post">
                                <input type="number" name="reservoir" id="reservoir">
                                <div id="boutonmachineoff">
                                    <button type="submit" name="boutonmachine">
                                        <img src="/escaperpg/images/avent/boutonoff.png" alt="bouton">
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <?php
                    include $_SERVER['DOCUMENT_ROOT'] . $indices;
                    ?>
                <?php else: ?>
                    <p>
                        Rien ne se passe.
                        Êtes-vous sûre d'avoir correctement rempli le réservoir ?<br>
                        <br>
                        - Placer le sapence dans son compartiment.<br>
                        - Calibrer le régulateur sur 4 et abaisser le levier.<br>
                        - Remplir le réservoir aux 3/4.<br>
                        - Appuyer sur le bouton rouge.
                    </p>
                    <div id="enigmelieu">
                        <img src="/escaperpg/images/avent/machineperenoel3.png" alt="la machine à cadeaux du père noël">
                        <div id="machineperenoel">
                            <input type="range" name="range" min="1" max="9" value="4">
                            <form action="repairs" method="post">
                                <input type="number" name="reservoir" id="reservoir">
                                <div id="boutonmachineoff">
                                    <button type="submit" name="boutonmachine">
                                        <img src="/escaperpg/images/avent/boutonoff.png" alt="bouton">
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <?php
                    include $_SERVER['DOCUMENT_ROOT'] . $indices;
                    ?>
                <?php endif; ?>
            <?php else: ?>
                <?php if (!isset($_SESSION['etape3'])): ?>
                    <?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/resetIndices.php"; ?>
                <?php endif; ?>
                <audio src="/escaperpg/sons/avent/etape2.mp3" autoplay></audio>
                <p>
                    - Placer le sapence dans son compartiment.<br>
                    - Calibrer le régulateur sur 4 et abaisser le levier.<br>
                    - Remplir le réservoir aux 3/4.<br>
                    - Appuyer sur le bouton rouge.
                </p>
                <div id="enigmelieu">
                    <img src="/escaperpg/images/avent/machineperenoel3.png" alt="la machine à cadeaux du père noël">
                    <div id="machineperenoel">
                        <input type="range" name="range" min="1" max="9" value="4">
                        <form action="repairs" method="post">
                            <input type="number" name="reservoir" id="reservoir">
                            <div id="boutonmachineoff">
                                <button type="submit" name="boutonmachine">
                                    <img src="/escaperpg/images/avent/boutonoff.png" alt="bouton">
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <?php
                include $_SERVER['DOCUMENT_ROOT'] . $indices;
                $_SESSION['etape3'] = true;
                ?>
            <?php endif; ?>
        </div>
    </main>
    <div id="load">
        <div id="loader"></div>
    </div>
    <script src="/escaperpg/scripts/aventures-chargement.js"></script>
</body>

</html>
