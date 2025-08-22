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
    <title>Chez Pellington - Secrets Familiaux</title>
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
            <?php if (isset($_POST['suivant'])): ?>
                <p>
                    Après un petit détour dans le quartier, vous trouvez un accès à un parc entre les résidences vous permettant d'accéder à l'entrée arrière de la maison.
                    En espérant qu'elle soit ouverte.<br>
                    <br>
                    Vous vous hissez par-dessus la clôture en bois ceignant le jardin de Pellington et vous dirigez vers la porte.
                    Heureusement, celle-ci n'est pas fermée à clé et vous entrez à l'intérieur.
                </p>
                <form action="107parkavenue" method="post">
                    <input type="submit" name="suivant2" value="Suivant.">
                </form>
            <?php elseif (isset($_POST['suivant2'])): ?>
                <div id="succespopup">
                    <?php
                    $nouveausucces = '<img src="/escaperpg/images/succes/secrets/pellington.png"><span><u><b>Cambrioleur</b></u><br>Entrer chez le docteur Pellington</span>';
                    $scenario = 'secrets';
                    $description = 'pellington';
                    $cache = 'oui';
                    $rarete = 'succesnormal';
                    include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/succesadd.php";
                    ?>
                </div>
                <div id="enigme">
                    <a href="/escaperpg/images/secrets/pellrdc.png" rel="lightbox[invent]"><img src="/escaperpg/images/secrets/pellrdc.png" alt="rez-de-chaussée"></a>
                </div>
                <br>
                <p>
                    Vous avancez dans le salon pour voir si quelqu'un se trouve ici, mais il ne semble y avoir personne.
                    Vous vous annoncez à haute voix au cas où le docteur se trouve à l'étage, mais n'obtenez toujours aucune réponse.<br>
                    <br>
                    Tant pis, vous décidez de procéder directement à une fouille minutieuse de la maison pour tenter d'obtenir vous-mêmes des informations.
                </p>
                <form action="pellington/rdc" method="post">
                    <input type="submit" name="tour" value="Faire le tour.">
                </form>
            <?php else: ?>
                <p>
                    Le docteur Pellington vit dans un quartier riche d'Arkham, dans une grande maison à 3 étages et flanquée d'autres maisons du même type sur les côtés.<br>
                    Vous sonnez à la porte et attendez pendant ce qui vous semble être une éternité, mais vous n'obtenez aucune réponse.<br>
                    <br>
                    Las d'attendre, vous décidez de faire le tour de la maison pour voir s'il n'y a pas un accès par l'arrière.
                </p>
                <form action="107parkavenue" method="post">
                    <input type="submit" name="suivant" value="Suivant.">
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
