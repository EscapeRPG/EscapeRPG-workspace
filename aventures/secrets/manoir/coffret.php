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
    <title>Coffret - Secrets Familiaux</title>
</head>

<body onload="chargement()">
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/header.php"; ?>
    <div id="banniere"><img src="/escaperpg/images/secrets/secretsfamiliauxmini.png" alt="secrets familiaux bannière"></div>
    <main>
        <nav>
            <?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/secrets/includes/navAvatar.php"; ?>
            <?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/secrets/includes/navigationmanoir.php"; ?>
            <?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/secrets/includes/navInputs.php"; ?>
        </nav>
        <div id="txt">
            <?php if (isset($_POST['coffret']) || isset($_SESSION['coffrenigme'])): ?>
                <?php if (isset($_SESSION['coffrenigme']) || str_replace($search, $replace, stripslashes($_POST['coffret'])) == "aeb6fcu2m8"): ?>
                    <div id="coffret">
                        <img src="/escaperpg/images/secrets/coffretface.png" alt="coffret">
                        <div class="dropper" id="drop1"></div>
                        <div class="dropper" id="drop2"></div>
                        <div class="dropper" id="drop3"></div>
                        <div class="dropper" id="drop4"></div>
                        <div class="dropper" id="drop5"></div>
                    </div>
                    <div id="dragdropcoffret">
                        <img src="/escaperpg/images/secrets/piecevide.png" alt="emplacements pièce">
                        <div class="draggable" id="drag1">
                            <img src="/escaperpg/images/secrets/di.png" id="dimini" alt="pièce vieil homme">
                        </div>
                        <div class="draggable" id="drag2">
                            <img src="/escaperpg/images/secrets/ad.png" id="admini" alt="pièce homme">
                        </div>
                        <div class="draggable" id="drag3">
                            <img src="/escaperpg/images/secrets/se.png" id="semini" alt="pièce serpent">
                        </div>
                        <div class="draggable" id="drag4">
                            <img src="/escaperpg/images/secrets/ev.png" id="evmini" alt="pièce femme">
                        </div>
                        <div class="draggable" id="drag5">
                            <img src="/escaperpg/images/secrets/po.png" id="pomini" alt="pièce pomme">
                        </div>
                    </div>
                    <form action="#" method="post">
                        <input type="submit" name="reset" value="Réinitialiser.">
                    </form>
                    <script src="/escaperpg/aventures/scripts/dragDropCoffret.js"></script>
                    <?php
                    $reponse = "Les pièces sont à mettre dans cet ordre : Serpent - Pomme - Femme - Homme - Vieil homme.";
                    $indice1 = "Chaque phrase du coffret fait référence aux pièces que vous avez. Essayez de bien les identifier et tout devrait devenir plus clair.";
                    $indice2 = "Le Père est le vieil homme, Dieu.<br>Les Amoureux sont le jeune homme et la jeune fille, Adam et Ève.<br>Le Mal est le serpent.<br>L'Objet du Péché est la pomme.";
                    $indice3 = "Faites bien attention à la direction dans laquelle regardent chacun des personnages pour savoir où les placer. Par exemple, \"le Père qui voit tout\" doit être mis tout à droite pour voir l'ensemble de la scène.";
                    include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/indices.php";
                    $_SESSION['coffrenigme'] = true;
                    ?>
                <?php else: ?>
                    <p>
                        Quelque chose ne va pas.
                        Avez-vous bien trouvé les 5 éléments à insérer ici ?
                    </p>
                    <form action="coffret" method="post">
                        <input type="text" name="coffret">
                        <input type="submit" name="cavite" value="Regarder de plus près.">
                    </form>
                <?php endif; ?>
            <?php else: ?>
                <p>
                    Le petit coffret que vous avez trouvé dans le coffre-fort de votre oncle est fermé solidement et vous ne parvenez pas à l'ouvrir.<br>
                    Sur la façade, vous apercevez 5 cavités circulaires.
                </p>
                <form action="coffret" method="post">
                    <input type="text" name="coffret">
                    <input type="submit" name="cavite" value="Regarder de plus près.">
                </form>
                <?php
                $reponse = "Les 5 pièces vous donnent le code \"aeb6fcu2m8\".";
                $indice1 = "Avez-vous trouvé 5 éléments circulaires ? Sinon, inspectez les images de la chambre de William et du grenier.";
                $indice2 = "Vous devriez essayer de les regarder de plus près, ils contiennent sans doute des informations utiles.";
                $indice3 = "Chaque pièce comporte un fragment de code, récupérez-les et associez-les pour obtenir le code.";
                include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/indices.php";
                $_SESSION['coffrenigme'] = true;
                unset($_SESSION['aveux']);
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
