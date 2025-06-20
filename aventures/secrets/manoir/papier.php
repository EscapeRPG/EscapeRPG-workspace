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
    <title>Papier - Secrets Familiaux</title>
</head>

<body>
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/header.php"; ?>
    <div id="banniere"><img src="/escaperpg/images/secrets/secretsfamiliauxmini.png" alt="secrets familiaux bannière"></div>
    <main>
        <nav>
            <?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/secrets/includes/navAvatar.php"; ?>
            <?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/secrets/includes/navigationmanoir.php"; ?>
            <?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/secrets/includes/navInputs.php"; ?>
        </nav>
        <div id="txt">
            <?php if (isset($_POST['papier'])): ?>
                <script src="/escaperpg/scripts/inventaireadds.js"></script>
                <p>
                    Vous posez le coffret vide quelque part, il ne vous sera plus utile maintenant.<br>
                    <br>
                    Que désirez-vous faire maintenant ?
                </p>
                <form action="rdc" method="post">
                    <input type="submit" name="retour" value="Retour.">
                </form>
                <?php
                if (!in_array("papier", $_SESSION['inventaire'])) {
                    $_SESSION['inventaire'][] = "papier";
                }
                if (!in_array("petitecle", $_SESSION['inventaire'])) {
                    $_SESSION['inventaire'][] = "petitecle";
                }
                $key = array_search('coffret', $_SESSION['inventaire']);
                if ($key !== false) {
                    unset($_SESSION['inventaire'][$key]);
                    $_SESSION['inventaire'] = array_values($_SESSION['inventaire']);
                }
                $key = array_search('piecedi', $_SESSION['inventaire']);
                if ($key !== false) {
                    unset($_SESSION['inventaire'][$key]);
                    $_SESSION['inventaire'] = array_values($_SESSION['inventaire']);
                }
                $key = array_search('piecepo', $_SESSION['inventaire']);
                if ($key !== false) {
                    unset($_SESSION['inventaire'][$key]);
                    $_SESSION['inventaire'] = array_values($_SESSION['inventaire']);
                }
                $key = array_search('pieceev', $_SESSION['inventaire']);
                if ($key !== false) {
                    unset($_SESSION['inventaire'][$key]);
                    $_SESSION['inventaire'] = array_values($_SESSION['inventaire']);
                }
                $key = array_search('piecese', $_SESSION['inventaire']);
                if ($key !== false) {
                    unset($_SESSION['inventaire'][$key]);
                    $_SESSION['inventaire'] = array_values($_SESSION['inventaire']);
                }
                $key = array_search('piecead', $_SESSION['inventaire']);
                if ($key !== false) {
                    unset($_SESSION['inventaire'][$key]);
                    $_SESSION['inventaire'] = array_values($_SESSION['inventaire']);
                }
                unset($_SESSION['coffrenigme']);
                ?>
            <?php elseif ($_SESSION['papier']): ?>
                <div id="enigme">
                    <a href="/escaperpg/images/secrets/papier.png" rel="lightbox[invent]">
                        <img src="/escaperpg/images/secrets/papier.png" alt="un morceau de papier avec une inscription étrange">
                    </a>
                </div>
                <p>
                    Un papier trouvé dans le coffret mystérieux. Une phrase énigmatique y est inscrite.
                </p>
                <?php
                $reponse = "Le message codé donne : \"L'Éclairé ouvre le chemin\". Sans doute un mot de passe ?";
                $indice1 = "Avez-vous trouvé de quoi déchiffrer ce message ?";
                $indice2 = "Si ce n'est pas le cas, vous devriez vous intéresser d'un peu plus près à la porte du bureau de votre oncle, quelque chose pourrait attirer votre attention.";
                $indice3 = "Il s'agit d'un message codé par la technique des templiers. Chaque tableau est séparé en 4 parties, essayez de visualiser chacune de ces parties indépendament pour décoder le message.";
                include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/indices.php";
                $_SESSION['telephone'] = true;
                ?>
            <?php else: ?>
                <div id="enigme">
                    <a href="/escaperpg/images/secrets/papier.png" rel="lightbox[invent]">
                        <img src="/escaperpg/images/secrets/papier.png" alt="un morceau de papier avec une inscription étrange">
                    </a>
                    <a href="/escaperpg/images/secrets/petitecle.png" rel="lightbox[invent]">
                        <img src="/escaperpg/images/secrets/petitecle.png" alt="petite clé">
                    </a>
                </div>
                <p>
                    À l'intérieur du coffret, vous trouvez une petite clé que vous mettez dans votre poche ainsi qu'un morceau de papier sur lequel est marquée une phrase étrange.<br>
                    Il semblerait qu'il s'agisse d'un code, mais comment faire pour le déchiffrer ?<br>
                    <br>
                    Vous le prenez avec vous pour pouvoir le consulter quand vous voudrez.
                </p>
                <form action="papier" method="post">
                    <input type="submit" name="papier" value="Ajouter à l'inventaire.">
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
