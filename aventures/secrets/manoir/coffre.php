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
    <title>Chambre de William - Secrets Familiaux</title>
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
            <?php if (isset($_SESSION['visitepellington'])): ?>
                <?php if (isset($_POST['sdi'])): ?>
                    <script src="/escaperpg/scripts/inventaireadds.js"></script>
                    <p>
                        Vous vous intéressez alors au coffret.
                    </p>
                    <div id="enigme">
                        <a href="/escaperpg/images/secrets/coffret.png" rel="lightbox[invent]">
                            <img src="/escaperpg/images/secrets/coffret.png" alt="un petit coffret ouvragé">
                        </a>
                    </div>
                    <p>
                        Il semble fermé et ne comporte pas de serrure visible.<br>
                        Sur la façade se trouvent 5 cavités circulaires.<br>
                        <br>
                        Vous le prenez également avec vous.
                    </p>
                    <form action="coffre" method="post">
                        <input type="submit" name="coffret" value="Ajouter à l'inventaire.">
                    </form>
                    <?php
                    if (!in_array('piecedi', $_SESSION['inventaire'])) {
                        $_SESSION['inventaire'][] = 'piecedi';
                    }
                    if (!in_array('vieillecle', $_SESSION['inventaire'])) {
                        $_SESSION['inventaire'][] = 'oldcle';
                    }
                    unset($_SESSION['restab']);
                    unset($_SESSION['magna']);
                    ?>
                <?php elseif (isset($_POST['coffret'])): ?>
                    <script src="/escaperpg/scripts/inventaireadd.js"></script>
                    <p>
                        Manifestement, vous avez trouvé tout ce qu'il y avait d'intéressant dans ce coffre.<br>
                        Vous pouvez étudier le coffret si vous le voulez.
                    </p>
                    <form action="coffret" method="post">
                        <input type="submit" name="retour" value="Étudier le coffret.">
                    </form>
                    <?php
                    if (!in_array('coffret', $_SESSION['inventaire'])) {
                        $_SESSION['inventaire'][] = 'coffret';
                    }
                    ?>
                <?php else: ?>
                    <img src="/escaperpg/images/secrets/coffrefort.png" alt="la porte du coffre-fort">
                    <?php if (isset($_POST['droite']) || isset($_POST['gauche']) || isset($_POST['retry'])): ?>
                        <?php if (isset($_POST['combinaison4'])): ?>
                            <?php $_SESSION['combinaisoncoffre'] += isset($_POST['gauche']) ? "g" : "d" + $_POST['combinaison4'] ?>
                            <?php if ($_SESSION['combinaisoncoffre'] == "d2d9g4d7"): ?>
                                <div id="succespopup">
                                    <?php
                                    $nouveausucces = '<img src="/escaperpg/images/succes/secrets/coffre.png"><span><u><b>Crocheteur</b></u><br>Ouvrir le coffre-fort de l\'oncle William</span>';
                                    $scenario = 'secrets';
                                    $description = 'coffre';
                                    $cache = 'oui';
                                    $rarete = 'succesnormal';
                                    include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/succesadd.php";
                                    ?>
                                </div>
                                <audio src="/escaperpg/sons/secrets/coffrefortouverture.mp3" autoplay></audio>
                                <p>
                                    Le coffre-fort s'ouvre, vous laissant découvrir son contenu :
                                    un petit coffret, une <span class="mdp">vieille clé</span> rouillée et une pièce de monnaie.
                                </p>
                                <div id="enigme">
                                    <a href="/escaperpg/images/secrets/coffret.png" rel="lightbox[invent]">
                                        <img src="/escaperpg/images/secrets/coffret.png" alt="un petit coffret ouvragé">
                                    </a>
                                    <a href="/escaperpg/images/secrets/oldcle.png" rel="lightbox[invent]">
                                        <img src="/escaperpg/images/secrets/oldcle.png" alt="une vieille clé">
                                    </a>
                                    <a href="/escaperpg/images/secrets/di.png" rel="lightbox[invent]">
                                        <img src="/escaperpg/images/secrets/di.png" alt="une pièce représentant un vieil homme">
                                    </a>
                                </div>
                                <p>
                                    Vous prenez la petite pièce et l'examinez de plus près.
                                    Elle représente le visage d'un vieil homme à la barbe fournie.<br>
                                    <br>
                                    Vous la mettez dans votre poche ainsi que la clé.
                                </p>
                                <form action="coffre" method="post">
                                    <input type="submit" name="sdi" value="Ajouter à l'inventaire.">
                                </form>
                                <?php
                                $_SESSION['coffrefortouvert'] = true;
                                if (!in_array('Vieille clé', $_SESSION['mdp'])) {
                                    $_SESSION['mdp'][] = 'Vieille clé';
                                }
                                include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/resetIndices.php";
                                ?>
                            <?php else: ?>
                                <?php
                                $_SESSION['combinaisoncoffre'] += "";
                                $_SESSION['combinaisonactuelle'] == "";
                                ?>
                                <audio src="/escaperpg/sons/secrets/coffrefort4.mp3" autoplay></audio>
                                <p>
                                    Le code que vous avez essayé ne semble pas avoir fonctionné.<br>
                                    Il va falloir réessayer.<br>
                                    <br>
                                    Entrez le premier chiffre.
                                </p>
                                <form action="coffre" method="post">
                                    <input type="submit" name="gauche" value="←">
                                    <input type="text" name="combinaison1">
                                    <input type="submit" name="droite" value="→">
                                </form>
                                <br>
                                <form action="chambre" method="post">
                                    <input type="submit" name="retour" value="Retour.">
                                </form>
                            <?php endif; ?>
                        <?php elseif (isset($_POST['combinaison3']) || $_SESSION['combinaisonactuelle'] == "3"): ?>
                            <?php
                            $_SESSION['combinaisoncoffre'] += isset($_POST['gauche']) ? "g" : "d" + $_POST['combinaison3'];
                            $_SESSION['combinaisonactuelle'] = "3";
                            ?>
                            <audio src="/escaperpg/sons/secrets/coffrefort3.mp3" autoplay></audio>
                            <p>
                                Entrez le quatrième chiffre.
                            </p>
                            <form action="coffre" method="post">
                                <input type="submit" name="gauche" value="←">
                                <input type="text" name="combinaison4">
                                <input type="submit" name="droite" value="→">
                            </form>
                            <br>
                            <form action="chambre" method="post">
                                <input type="submit" name="retour" value="Retour.">
                            </form>
                        <?php elseif (isset($_POST['combinaison2']) || $_SESSION['combinaisonactuelle'] == "2"): ?>
                            <?php
                            $_SESSION['combinaisoncoffre'] += isset($_POST['gauche']) ? "g" : "d" + $_POST['combinaison2'];
                            $_SESSION['combinaisonactuelle'] = "2";
                            ?>
                            <audio src="/escaperpg/sons/secrets/coffrefort2.mp3" autoplay></audio>
                            <p>
                                Entrez le troisième chiffre.
                            </p>
                            <form action="coffre" method="post">
                                <input type="submit" name="gauche" value="←">
                                <input type="text" name="combinaison3">
                                <input type="submit" name="droite" value="→">
                            </form>
                            <br>
                            <form action="chambre" method="post">
                                <input type="submit" name="retour" value="Retour.">
                            </form>
                        <?php elseif (isset($_POST['combinaison1']) || $_SESSION['combinaisonactuelle'] == "1"): ?>
                            <?php
                            $_SESSION['combinaisoncoffre'] += isset($_POST['gauche']) ? "g" : "d" + $_POST['combinaison1'];
                            $_SESSION['combinaisonactuelle'] = "1";
                            ?>
                            <audio src="/escaperpg/sons/secrets/coffrefort1.mp3" autoplay></audio>
                            <p>
                                Entrez le second chiffre.
                            </p>
                            <form action="coffre" method="post">
                                <input type="submit" name="gauche" value="←">
                                <input type="text" name="combinaison2">
                                <input type="submit" name="droite" value="→">
                            </form>
                            <br>
                            <form action="chambre" method="post">
                                <input type="submit" name="retour" value="Retour.">
                            </form>
                        <?php else: ?>
                            <p>
                                En retirant le tableau au-dessus du lit, vous trouvez un coffre-fort incrusté dans le mur.<br>
                                Impossible de l'ouvrir sans la <span class="indice">combinaison</span>, mais peut-être l'avez-vous trouvée maintenant ?<br>
                                <br>
                                Entrez le premier chiffre.
                            </p>
                            <form action="coffre" method="post">
                                <input type="submit" name="gauche" value="←">
                                <input type="text" name="combinaison1">
                                <input type="submit" name="droite" value="→">
                            </form>
                            <br>
                            <form action="chambre" method="post">
                                <input type="submit" name="retour" value="Retour.">
                            </form>
                            <?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/resetIndices.php"; ?>
                        <?php endif; ?>
                        <?php
                        if (!isset($_SESSION['coffrefortouvert'])) {
                            $reponse = `
                                Le premier chiffre est 2, le tome du Magna Mater, à tourner vers la droite.<br>
                                Le second est 9, le nombre total présents sur le tableau de Rembrandt brûlé par votre oncle, à tourner vers la droite également.<br>
                                Le troisième est 4, en comptant les portraits présents et retirés sur les murs de la chambre de William, à tourner vers la gauche.<br>
                                Le quatrième chiffre est 7, le plus fort des chiffres-frères (9) s'associe au plus faible (2). Le troisième (4) se soustrait à eux,
                                ce qui donne 2+9-4 = 7, à tourner vers la droite.
                            `;
                            $indice1 = `
                                Avez-vous trouvé les 3 premiers chiffres du code ?
                                Si ce n'est pas le cas, essayez de fouiller au niveau de la bibliothèque, du salon et de la chambre de William pour les trouver,
                                grâce aux aveux de Pellington.<br>
                                Faites bien attention également à entrer le code en respectant le sens gauche ou droite !<br>
                                <br>
                                Si le problème vient de la phrase concernant les "frères", dites-vous que vous cherchez bien un code à 4 chiffres.
                            `;
                            $indice2 = `Qui peuvent bien être ces "frères" dont parle le docteur ?`;
                            $indice3 = `Les "frères" sont les 3 premiers chiffres de la combinaison. La phrase vous permet de déterminer le 4e.`;
                            include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/indices.php";
                        }
                        ?>
                    <?php endif; ?>
                <?php endif; ?>
            <?php else: ?>
                <img src="/escaperpg/images/secrets/coffrefort.png" alt="la porte du coffre-fort">
                <p>
                    En retirant le tableau au-dessus du lit, vous trouvez un coffre-fort incrusté dans le mur.<br>
                    Impossible de l'ouvrir sans la combinaison.
                </p>
                <form action="chambre" method="post">
                    <input type="submit" name="retour" value="Retour.">
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
