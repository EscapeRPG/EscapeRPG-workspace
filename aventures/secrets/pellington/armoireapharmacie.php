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
    <title>Salle de bain - Secrets Familiaux</title>
</head>

<body>
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/header.php"; ?>
    <div id="banniere"><img src="/escaperpg/images/secrets/secretsfamiliauxmini.png" alt="secrets familiaux bannière"></div>
    <main>
        <nav>
            <?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/secrets/includes/navAvatar.php"; ?>
            <?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/secrets/includes/navigationpellington.php"; ?>
            <?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/secrets/includes/navInputs.php"; ?>
        </nav>
        <div id="txt">
            <?php if (isset($_POST['melanger'])): ?>
                <?php
                $bonnesValeurs = [
                    '1' => '0',
                    '2' => '0',
                    '3' => '30',
                    '4' => '15',
                    '5' => '0',
                    '6' => '0',
                    '7' => '50',
                    '8' => '0',
                    '9' => '0',
                ];

                $melangeCorrect = array_intersect_assoc($bonnesValeurs, $_POST) === $bonnesValeurs;
                ?>
                <?php if ($melangeCorrect): ?>
                    <audio src="/escaperpg/sons/secrets/melange.mp3" autoplay></audio>
                    <div id="enigme">
                        <a href="/escaperpg/images/secrets/analeptique.png" rel="lightbox[invent]">
                            <img src="/escaperpg/images/secrets/analeptique.png" alt="un analeptique pour guérir les chiens empoisonnés">
                        </a>
                    </div>
                    <p>
                        Vous avez réussi à synthétiser correctement un antidote pour soigner les chiens !<br>
                        <br>
                        Il s'agit d'un <span class="mdp">analeptique</span> que vous prenez avec vous.
                    </p>
                    <form action="armoireapharmacie" method="post">
                        <input type="submit" name="anti" value="Ajouter à l'inventaire.">
                    </form>
                    <?php
                    if (!in_array("Analeptique", $_SESSION['mdp'])) {
                        $_SESSION['mdp'][] = "Analeptique";
                    }
                    ?>
                <?php elseif (isset($_POST['anti'])): ?>
                    <script src="/escaperpg/scripts/inventaireadd.js"></script>
                    <p>
                        Il semblerait que vous n'ayez plus rien à trouver par ici.
                    </p>
                    <form action="sdb" method="post">
                        <input type="submit" name="retour" value="Retour.">
                    </form>
                    <?php
                    $key = array_search('recette', $_SESSION['inventaire']);
                    if ($key !== false) {
                        unset($_SESSION['inventaire'][$key]);
                        $_SESSION['inventaire'] = array_values($_SESSION['recette']);
                    }

                    if (!in_array("analeptique", $_SESSION['inventaire'])) {
                        $_SESSION['inventaire'][] = "analeptique";
                    }
                    ?>
                <?php else: ?>
                    <p>
                        Il semblerait que cela n'ait pas fonctionné.
                    </p>
                    <form action="armoireapharmacie" method="post">
                        <div id="armoireapharmacie">
                            <img src="/escaperpg/images/secrets/armoireapharmacie.png" alt="l'armoire à pharmacie du docteur Pellington">
                            <input type="number" name="1" class="hg" value="0" required>
                            <input type="number" name="2" class="hm" value="0" required>
                            <input type="number" name="3" class="hd" value="0" required>
                            <input type="number" name="4" class="mg" value="0" required>
                            <input type="number" name="5" class="mm" value="0" required>
                            <input type="number" name="6" class="md" value="0" required>
                            <input type="number" name="7" class="bg" value="0" required>
                            <input type="number" name="8" class="bm" value="0" required>
                            <input type="number" name="9" class="bd" value="0" required>
                        </div>
                        <input type="submit" name="melanger" value="Mélanger.">
                    </form>
                    <form action="sdb" method="post">
                        <input type="submit" name="retour" value="Retour.">
                    </form>
                <?php endif; ?>
            <?php else: ?>
                <p>
                    L'armoire à pharmacie contient de nombreux flacons de divers produits médicaux.<br>
                    <br>
                    Sans connaître de formule, il pourrait être dangereux de les mélanger.
                </p>
                <form action="armoireapharmacie" method="post">
                    <div id="armoireapharmacie">
                        <img src="/escaperpg/images/secrets/armoireapharmacie.png" alt="l'armoire à pharmacie du docteur Pellington">
                        <input type="number" name="1" class="hg" value="0" required>
                        <input type="number" name="2" class="hm" value="0" required>
                        <input type="number" name="3" class="hd" value="0" required>
                        <input type="number" name="4" class="mg" value="0" required>
                        <input type="number" name="5" class="mm" value="0" required>
                        <input type="number" name="6" class="md" value="0" required>
                        <input type="number" name="7" class="bg" value="0" required>
                        <input type="number" name="8" class="bm" value="0" required>
                        <input type="number" name="9" class="bd" value="0" required>
                    </div>
                    <input type="submit" name="melanger" value="Mélanger.">
                </form>
                <form action="sdb" method="post">
                    <input type="submit" name="retour" value="Retour.">
                </form>
                <?php $_SESSION['armoireopened'] = true; ?>
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
