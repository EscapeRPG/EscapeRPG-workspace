<?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/entete.php"; ?>
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
            <?php if (isset($_POST['suivant'])): ?>
                <p>
                    - Placer le sapence dans son compartiment.<br>
                    - Calibrer le régulateur sur 4 et abaisser le levier.<br>
                    - Remplir le réservoir aux 3/4.<br>
                    - Appuyer sur le bouton rouge.
                </p>
                <div id="enigmelieu">
                    <img src="/escaperpg/images/avent/machineperenoel.png" alt="la machine à cadeaux du père noël">
                    <div id="machineperenoel">
                        <div class="dropper" id="drop1"></div>
                        <div class="dropper" id="drop2"></div>
                        <div class="dropper" id="drop3"></div>
                        <div class="dropper" id="drop4"></div>
                        <input type="range" name="range" min="1" max="9" value="1">
                        <input type="number" name="reservoir" id="reservoir">
                        <form action="reparations" method="post">
                            <button type="submit" name="boutonmachine" id="boutonmachineoff">
                                <img src="/escaperpg/images/avent/boutonoff.png" alt="bouton">
                            </button>
                        </form>
                    </div>
                </div>
                <br>
                <div class="dragslot">
                    <div class="draggable" id="drag1">
                        <img src="/escaperpg/images/avent/sapence.png" id="dra1" alt="sapence">
                    </div>
                </div>
                <?php
                $reponse = "Placez le sapence dans le deuxième emplacement, en haut.";
                $indice1 = "Chaque étape doit être réalisée dans l'ordre !";
                $indice2 = "Placez le sapence à l'endroit indiqué par les instructions.";
                $indice3 = "Essayez de traduire les mots en haut, l'un d'eux vous dira où placer le sapence.";
                include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/indices.php";
                ?>
                <script src="/escaperpg/aventures/scripts/dragdrop.js"></script>
            <?php elseif (isset($_POST['boutonmachine']) || isset($_SESSION['repmachine'])): ?>
                <p>
                    Rien ne se passe, la machine n'est sans doute pas encore prête.<br>
                    - Placer le sapence dans son compartiment.<br>
                    - Calibrer le régulateur sur 4 et abaisser le levier.<br>
                    - Remplir le réservoir aux 3/4.<br>
                    - Appuyer sur le bouton rouge.
                </p>
                <div id="enigmelieu">
                    <img src="/escaperpg/images/avent/machineperenoel.png" alt="la machine à cadeaux du père noël">
                    <div id="machineperenoel">
                        <div class="dropper" id="drop1"></div>
                        <div class="dropper" id="drop2"></div>
                        <div class="dropper" id="drop3"></div>
                        <div class="dropper" id="drop4"></div>
                        <input type="range" name="range" min="0" max="9" value="0">
                        <input type="number" name="reservoir" id="reservoir">
                        <form action="reparations" method="post">
                            <button type="submit" name="boutonmachine" id="boutonmachineoff">
                                <img src="/escaperpg/images/avent/boutonoff.png" alt="bouton">
                            </button>
                        </form>
                    </div>
                </div>
                <br>
                <div class="dragslot">
                    <div class="draggable" id="drag1">
                        <img src="/escaperpg/images/avent/sapence.png" id="dra1" alt="sapence">
                    </div>
                </div>
                <?php
                $reponse = "Placez le sapence dans le deuxième emplacement, en haut.";
                $indice1 = "Chaque étape doit être réalisée dans l'ordre !";
                $indice2 = "Placez le sapence à l'endroit indiqué par les instructions.";
                $indice3 = "Essayez de traduire les mots en haut, l'un d'eux vous dira où placer le sapence.";
                include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/indices.php";
                $_SESSION['repmachine'] = true;
                ?>
                <script src="/escaperpg/aventures/scripts/dragdrop.js"></script>
            <?php else: ?>
                <div class="dialogue">
                    <div class="portrait">
                        <img src="/escaperpg/images/avent/arthur.png" alt="arthur">
                    </div>
                    <div class="bulleperso">
                        <p>
                            Voilà, c'est ça un sapence.<br>
                            <br>
                            Continue de lire les instructions, tu devrais pouvoir trouver où ce machin doit aller !
                        </p>
                    </div>
                </div>
                <p>
                    Vous reprenez la traduction du livre et constatez que, peu à peu, ce dialecte vous devient naturel.
                    Bientôt, vous arrivez à lire les instructions sans besoin d'utiliser le traducteur !
                </p>
                <form action="reparations" method="post">
                    <input type="submit" name="suivant" value="SUIVANT.">
                </form>
            <?php endif; ?>
        </div>
    </main>
    <div id="load">
        <div id="loader"></div>
    </div>
    <script src="/escaperpg/scripts/aventures-chargement.js"></script>
</body>

</html>
