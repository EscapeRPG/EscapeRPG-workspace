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
    <title>Salon - Secrets Familiaux</title>
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
            <?php if (isset($_SESSION['tab'])): ?>
                <p>
                    Il semble ne plus rien y avoir d'utile par ici.
                </p>
            <?php else: ?>
                <?php if (isset($_POST['salon'])): ?>
                    <?php if (str_replace($search, $replace, stripslashes($_POST['salon'])) == "tableau"): ?>
                        <p>
                            Vous observez autour de vous, en quête du fameux tableau décrit dans la note de Pellington, mais il semblerait qu'il ait été décroché.<br>
                            Vous vous souvenez en effet qu'il y avait un tableau sur la cheminée, mais il ne reste maintenant plus qu'un espace vide où il devait être accroché auparavant. <br>
                            <br>
                            Téona arrive juste à ce moment.
                        </p>
                        <div class="dialogue">
                            <div class="portrait">
                                <img src="/escaperpg/images/secrets/teona.png" alt="teona">
                            </div>
                            <div class="bulleperso">
                                <p>
                                    Vous cherchez un tableau ?
                                    En effet, il y en avait bien un au-dessus de la cheminée, mais votre oncle l'a détruit il y a quelques semaines.<br>
                                    Je crois savoir qu'il a jeté les <span class="mdp">restes</span> à la <span class="lieu">cave</span>.
                                </p>
                            </div>
                        </div>
                        <?php
                        $_SESSION['tab'] = true;
                        if (!in_array("Restes", $_SESSION['mdp'])) {
                            $_SESSION['mdp'][] = "Restes";
                        }
                        ?>
                    <?php else: ?>
                        <p>
                            Il n'y a rien ici en rapport avec ce que vous cherchez.
                        </p>
                    <?php endif; ?>
                <?php else: ?>
                    <p>
                        Le grand salon semble tel que dans vos souvenirs, bien que cela fasse des années que vous n'êtes pas venu ici.<br>
                        Un feu de cheminée réchauffe agréablement la pièce.
                    </p>
                    <form action="salon" method="post">
                        <input list="notesListe" name="salon">
                        <input type="submit" name="chercher" value="Chercher.">
                    </form>
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
