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
            <?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/secrets/includes/navInputs.php"; ?>
            <?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/secrets/includes/navigationmanoir.php"; ?>
        </nav>
        <div id="txt">
            <?php if (isset($_POST['sad'])): ?>
                <script src="/escaperpg/scripts/inventaireadd.js"></script>
                <p>
                    Il ne semble pas y avoir quoi que ce soit d'autre sous le lit.
                </p>
                <form action="chambre" method="post">
                    <input type="submit" name="retour" value="Retour.">
                </form>
                <?php if (!in_array('piecead', $_SESSION['inventaire'])) {
                    $_SESSION['inventaire'][] = 'piecead';
                }
                ?>
            <?php elseif (isset($_POST['chbrpiece'])): ?>
                <div id="enigme">
                    <a href="/escaperpg/images/secrets/ad.png" rel="lightbox[invent]">
                        <img src="/escaperpg/images/secrets/ad.png" alt="pièce avec une tête d'homme">
                    </a>
                </div>
                <p>
                    Sous le lit, vous trouvez une pièce représentant un jeune homme. Vous la mettez dans votre poche.
                </p>
                <form action="chambre" method="post">
                    <input type="submit" name="sad" value="Ajouter à l'inventaire.">
                </form>
            <?php else: ?>
                <div id="enigmelieu">
                    <img src="/escaperpg/images/secrets/chambrewilliam<?= isset($_SESSION['jour']) ? '' : 'nuit' ?>.png" alt="l'ancienne chambre de votre oncle">
                    <?php if (isset($_SESSION['scof'])): ?>
                        <div id="cofchbr">
                            <a href="coffre.php">
                                <img src="/escaperpg/images/secrets/cof.png" alt="coffre-fort">
                            </a>
                        </div>
                    <?php else: ?>
                        <div id="tabchbr">
                            <form action="chambre" method="post">
                                <button type="submit" name="chbrtabnuit">
                                    <img src="/escaperpg/images/secrets/tableau<?= isset($_SESSION['jour']) ? '' : 'nuit' ?>.png" alt="un grand tableau au-dessus du lit">
                                </button>
                            </form>
                        </div>
                    <?php endif; ?>
                    <?php if (!in_array('piecead', $_SESSION['inventaire'])): ?>
                        <div id="piechbr">
                            <form action="chambre" method="post">
                                <button type="submit" name="chbrpiece">
                                    <img src="/escaperpg/images/secrets/chambrepiece<?= isset($_SESSION['jour']) ? '' : 'nuit' ?>.png" alt="une pièce sous le lit">
                                </button>
                            </form>
                        </div>
                    <?php endif; ?>
                </div>
                <?php if (isset($_POST['chbrtab'])): ?>
                    <p>
                        Derrière le tableau se trouvait un coffre-fort.
                    </p>
                    <?php $_SESSION['scof'] = true; ?>
                <?php else: ?>
                    <p>
                        La chambre de votre défunt oncle. Elle est propre et bien entretenue.
                    </p>
                    <?php if (in_array('piecead', $_SESSION['inventaire']) && isset($_SESSION['coffrefortouvert'])): ?>
                        <p>
                            Il semblerait que vous ayez trouvé tout ce qu'il y avait ici pour le moment.
                        </p>
                    <?php else: ?>
                        <?php if (isset($_SESSION['coffrefortouvert'])): ?>
                            <p>
                                Le coffre-fort est ouvert, mais peut-être pouvez-vous encore trouver quelque chose d'utile par ici ?
                            </p>
                        <?php else: ?>
                            <p>
                                Peut-être y a-t-il ici quelque chose de valeur ?
                            </p>
                        <?php endif; ?>
                    <?php endif; ?>
                <?php endif; ?>
                <?php if ($_SESSION['aveux']): ?>
                    <?php
                    $reponse = "Il y avait donc 4 portraits auparavant.";
                    $indice1 = "Plusieurs portraits sont accrochés au mur.";
                    $indice2 = "Sont-ils bien tous là ?";
                    $indice3 = "On peut constater, sur le papier peint, un petit rectangle plus clair indiquant qu'un tableau était accroché mais a été retiré.";
                    include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/indices.php";
                    ?>
                <?php endif; ?>
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
