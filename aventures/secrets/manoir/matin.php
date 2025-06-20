<?php
include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/entete.php";
$indicesInclude = "/escaperpg/includes/indices.php";
?>
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
    <title>Matin - Secrets Familiaux</title>
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
            <?php if (isset($_POST['non'])): ?>
                <p>
                    Vous raccrochez le téléphone et retournez au manoir pour prendre votre voiture, avant de vous diriger vers le <span class="lieu">107 Park Avenue</span>.
                </p>
            <?php elseif (isset($_POST['police'])): ?>
                <?php if (str_replace($search, $replace, stripslashes($_POST['police'])) == "pellington"): ?>
                    <div class="dialogue">
                        <div class="portrait">
                            <img src="/escaperpg/images/secrets/bornepolice.png" alt="borne de police">
                        </div>
                        <div class="bulleperso">
                            <p>
                                L'adresse du docteur Evan Pellington est le 107 Park Avenue à Arkham.<br>
                                Désirez-vous autre chose ?
                            </p>
                        </div>
                    </div>
                    <form action="matin" method="post">
                        <input type="submit" name="non" value="Non.">
                    </form>
                <?php else: ?>
                    <div class="dialogue">
                        <div class="portrait">
                            <img src="/escaperpg/images/secrets/bornepolice.png" alt="borne de police">
                        </div>
                        <div class="bulleperso">
                            <p>
                                Je ne comprends pas votre requête, pouvez-vous répéter ?
                            </p>
                        </div>
                    </div>
                    <form action="matin" method="post">
                        <input list="notesListe" name="police">
                        <input type="submit" name="repondre" value="Répondre.">
                        <br>
                        <button type="submit" name="indice" class="boutonindice"></button>
                    </form>
                <?php endif; ?>
            <?php elseif (isset($_POST['telephone'])): ?>
                <?php if (str_replace($search, $replace, stripslashes($_POST['telephone'])) == "inspecteurdeckard085" || isset($_SESSION['telephone'])): ?>
                    <?php if (isset($_POST['telephone'])): ?>
                        <?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/resetIndices.php"; ?>
                    <?php endif; ?>
                    <div class="dialogue">
                        <div class="portrait">
                            <img src="/escaperpg/images/secrets/bornepolice.png" alt="borne de police">
                        </div>
                        <div class="bulleperso">
                            <p>
                                Bonjour inspecteur Deckard, à quel sujet nous contactez-vous ?
                            </p>
                        </div>
                    </div>
                    <form action="matin" method="post">
                        <input list="notesListe" name="police">
                        <input type="submit" name="repondre" value="Répondre.">
                    </form>
                    <?php
                    $reponse = "Demandez des informations sur \"Pellington\".";
                    $indice1 = "À ce stade de l'enquête, vous devriez avoir des soupçons sur une personne en particulier dont vous avez pu entendre parler.";
                    $indice2 = "Vous souvenez-vous de son nom ?";
                    $indice3 = "Il s'agit de l'ancien docteur de famille.";
                    include $_SERVER['DOCUMENT_ROOT'] . $indicesInclude;
                    $_SESSION['telephone'] = true;
                    ?>
                <?php else: ?>
                    <div class="dialogue">
                        <div class="portrait">
                            <img src="/escaperpg/images/secrets/bornepolice.png" alt="borne de police">
                        </div>
                        <div class="bulleperso">
                            <p>
                                Il semblerait que je n'aie aucun agent associé à ce nom et numéro.
                                Pouvez-vous répéter votre grade, nom et numéro de badge je vous prie ?
                            </p>
                        </div>
                    </div>
                    <form action="matin" method="post">
                        <input list="notesListe" name="telephone">
                        <input type="submit" name="repondre" value="Répondre.">
                    </form>
                    <?php
                    $reponse = "Vous êtes l'inspecteur Deckard, matricule 085, soit \"inspecteur Deckard 085\".";
                    $indice1 = "Vous avez oublié l'une ou l'autre de ces informations ? Où pourriez-vous les retrouver ?";
                    $indice2 = "Avez-vous déjà essayé de cliquer sur votre photo à gauche ?";
                    $indice3 = "Regardez bien votre insigne";
                    include $_SERVER['DOCUMENT_ROOT'] . $indicesInclude;
                    ?>
                <?php endif; ?>
            <?php else: ?>
                <audio src="/escaperpg/sons/secrets/policebox.mp3" autoplay></audio>
                <p>
                    Dès les premières lueurs de l'aube, vous sortez du manoir et vous dirigez vers la première borne téléphonique de police que vous trouvez.
                    Vous décrochez le combiné qui vous met en relation avec le central d'Arkham.
                </p>
                <div class="dialogue">
                    <div class="portrait">
                        <img src="/escaperpg/images/secrets/bornepolice.png" alt="borne de police">
                    </div>
                    <div class="bulleperso">
                        <p>
                            Bureau de police d'Arkham, veuillez donner votre grade, nom et matricule je vous prie.
                        </p>
                    </div>
                </div>
                <form action="matin" method="post">
                    <input list="notesListe" name="telephone">
                    <input type="submit" name="repondre" value="Répondre.">
                </form>
                <?php
                $reponse = "Vous êtes l'inspecteur Deckard, matricule 085, soit \"inspecteur Deckard 085\".";
                $indice1 = "Vous avez oublié l'une ou l'autre de ces informations ? Où pourriez-vous les retrouver ?";
                $indice2 = "Avez-vous déjà essayé de cliquer sur votre photo à gauche ?";
                $indice3 = "Regardez bien votre insigne";
                include $_SERVER['DOCUMENT_ROOT'] . $indicesInclude;
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
