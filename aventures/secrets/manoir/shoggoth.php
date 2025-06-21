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
    <title>Retour au manoir - Secrets Familiaux</title>
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
            <?php if (isset($_POST['agir']) || isset($_SESSION['end'])): ?>
                <?php if ($_SESSION['cuves'] && isset($_SESSION['chienssauvesfin']) && isset($_SESSION['pnakotiques'])): // goodending
                ?>
                    <?php if (isset($_POST['rituel']) || isset($_SESSION['rituelg'])): ?>
                        <audio src="/escaperpg/sons/secrets/rituel.mp3" autoplay></audio>
                        <?php
                        include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/secrets/includes/cercleRituel.php";
                        $_SESSION['rituelg'] = true;
                        ?>
                        <script src="/escaperpg/aventures/secrets/scripts/dragDropCercleGEnd.js"></script>
                    <?php else: ?>
                        <audio src="/escaperpg/sons/secrets/shoggothelec.mp3" autoplay></audio>
                        <p>
                            Le shoggoth est en train de s'agripper au mur et tente d'ouvrir le petit boîtier contenant le système électrique du manoir.
                            Il commence alors à toucher les câbles et vous voyez un éclat électrique en sortir pour être absorbé par la créature.<br>
                            Il semblerait que les réparations que vous avez effectuées soient efficaces, car le système semble se maintenir et le shoggoth absorbe l'énergie petit à petit.
                            Vous voyez son corps être secoué de spasmes tandis que des éclairs parcourent son corps, vous laissant en voir l'intérieur par transparence.
                            Le spectacle est immonde et vous ne pouvez vous empêcher, cette fois, de vomir tout ce qui se trouve dans votre estomac.<br>
                            <br>
                            Le shoggoth semble pour le moment occupé à pomper l'énergie du système électrique, ce qui vous laisse un peu de temps pour chercher une solution.
                            Vous vous souvenez alors du rituel trouvé dans la bibliothèque du bureau privé.
                            Après tout, si des monstres tel que celui se trouvant devant vous existent bel et bien et permettent de tromper la mort,
                            alors peut-être que cette idée pourrait marcher ?<br>
                            <br>
                            Vous ressortez du bureau et descendez les escaliers en direction du hall d'entrée.<br>
                            À la hâte, vous ouvrez le tiroir d'un des meubles se trouvant là en espérant trouver de quoi tracer le cercle de magie.
                            En trouvant une boîte de craies, vous manquez de peu de crier de joie, mais le temps presse.<br>
                            Fébrile, vous ouvrez la boîte en tremblant et une demi-douzaine de craies tombent et se brisent sur le sol.
                            Jurant entre vos dents, vous réussissez à trouver un morceau suffisamment grand pour ce que vous allez entreprendre.
                        </p>
                        <form action="shoggoth" method="post">
                            <input type="submit" name="rituel" value="Commencer le rituel.">
                        </form>
                    <?php
                        $_SESSION['end'] = true;
                    endif;
                    ?>
                <?php elseif (!isset($_SESSION['chienssauvesfin']) && isset($_SESSION['cuves']) || isset($_SESSION['chienssauvesfin']) && isset($_SESSION['cuves']) && !isset($_SESSION['pnakotiques'])): // neutralending
                ?>
                    <audio src="/escaperpg/sons/secrets/shoggothelec.mp3" autoplay></audio>
                    <p>
                        Le shoggoth est en train de s'agripper au mur et tente d'ouvrir le petit boîtier contenant le système électrique du manoir.
                        Il commence alors à toucher les câbles et vous voyez un éclat électrique en sortir pour être absorbé par la créature.<br>
                        Il semblerait que les réparations que vous avez effectuées soient efficaces, car le système semble se maintenir et le shoggoth absorbe l'énergie petit à petit.
                        Vous voyez son corps être secoué de spasmes tandis que des éclairs parcourent son corps, vous laissant en voir l'intérieur par transparence.
                        Le spectacle est immonde et vous ne pouvez vous empêcher, cette fois, de vomir tout ce qui se trouve dans votre estomac.<br>
                        <br>
                        N'ayant aucune idée de comment vaincre le shoggoth qui semble occupé, vous décidez de battre en retraite.
                    </p>
                    <form action="../ends/3cvh15" method="post">
                        <input type="submit" name="fuir" value="Fuir.">
                    </form>
                <?php elseif ($_SESSION['chienssauvesfin'] && isset($_SESSION['pnakotiques']) && !isset($_SESSION['cuves'])): // neutralbadending
                ?>
                    <?php if (isset($_POST['rituelnb']) || isset($_SESSION['rituelnb'])): ?>
                        <audio src="/escaperpg/sons/secrets/rituel.mp3" autoplay></audio>
                        <?php
                        include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/secrets/includes/cercleRituel.php";
                        $_SESSION['rituelnb'] = true;
                        ?>
                        <script src="/escaperpg/aventures/secrets/scripts/dragDropCercleNBEnd.js"></script>
                    <?php else: ?>
                        <audio src="/escaperpg/sons/secrets/shoggothcourtcircuit.mp3" autoplay></audio>
                        <p>
                            Le shoggoth est en train de s'agripper au mur et tente d'ouvrir le petit boîtier contenant le système électrique du manoir.
                            Il commence alors à toucher les câbles et vous voyez un éclat électrique en sortir pour être absorbé par la créature.<br>
                            Cependant, le système étant instable comme vous l'avaient dit les domestiques,
                            le courant se coupe soudainement et plonge la pièce dans l'obscurité la plus totale.<br>
                            <br>
                            Vous vous souvenez alors du rituel trouvé dans la bibliothèque du bureau privé.
                            Après tout, si des monstres tels que celui se trouvant devant vous existent bel et bien et permettent de tromper la mort,
                            alors peut-être que cette idée pourrait marcher ?<br>
                            <br>
                            Vous ressortez du bureau comme vous le pouvez en tatônant et descendez les escaliers en direction du hall d'entrée.<br>
                            À la hâte, vous ouvrez le tiroir d'un des meubles se trouvant là en espérant trouver de quoi tracer le cercle de magie.
                            En trouvant une boîte de craies, vous manquez de peu de crier de joie, mais le temps presse.<br>
                            Fébrile, vous ouvrez la boîte en tremblant et une demi-douzaine de craies tombent et se brisent sur le sol.
                            Jurant entre vos dents, vous réussissez à trouver un morceau suffisamment grand pour ce que vous allez entreprendre.<br>
                            <br>
                            Vous n'y voyez pas grand chose, mais cela devrait suffire. Du moins l'espérez-vous !<br>
                            Depuis le bureau, vous entendez des bruits d'objets tombant sur le sol.
                            Le shoggoth est en train de se frayer un chemin pour venir jusqu'à vous et vous risquez de ne pas avoir beaucoup de temps pour accomplir le rituel
                            avant qu'il ne vous tombe dessus.
                        </p>
                        <form action="shoggoth" method="post">
                            <input type="submit" name="rituelnb" value="Commencer le rituel.">
                        </form>
                    <?php
                        $_SESSION['end'] = true;
                    endif;
                    ?>
                <?php else: // badending
                ?>
                    <audio src="/escaperpg/sons/secrets/shoggothcourtcircuit.mp3" autoplay></audio>
                    <p>
                        Le shoggoth est en train de s'agripper au mur et tente d'ouvrir le petit boîtier contenant le système électrique du manoir.
                        Il commence alors à toucher les câbles et vous voyez un éclat électrique en sortir pour être absorbé par la créature.<br>
                        Cependant, le système étant instable comme vous l'avaient dit les domestiques,
                        le courant se coupe soudainement et plonge la pièce dans l'obscurité la plus totale.<br>
                        <br>
                        Paniqué, vous tentez de rebrousser chemin pour vous échapper, mais vous trébuchez à nouveau sur le corps de Gaspard.
                    </p>
                    <form action="../ends/1fgre2" method="post">
                        <input type="submit" name="fuite" value="Tenter de fuir.">
                    </form>
                <?php endif; ?>
            <?php else: ?>
                <?php if (isset($_POST['suivant'])): ?>
                    <audio src="/escaperpg/sons/secrets/crichute.mp3" autoplay></audio>
                    <p>
                        À l'intérieur règne un calme oppressant.<br>
                        <br>
                        Au bas de l'escalier, vous trouvez le corps ensanglanté de Téona.
                        La pauvre a été déchiquetée et a dû connaître une fin horrible, mais un bruit de lutte à l'étage attire votre attention.
                        Manifestement, quelqu'un ou quelque chose se trouve dans le bureau privé. Vous grimpez les marches 4 à 4 et vous placez à côté de la porte, le souffle court.
                        Vous cherchez à prendre votre révolver pour pouvoir vous défendre, mais réalisez que vous l'avez laissé dans votre chambre.
                        Vous vous maudissez de ne pas avoir été plus prévoyant mais estimez que vous ne pouvez pas attendre quand vous entendez un cri de douleur.
                        Vous reconnaissez la voix de Gaspard et décidez d'entrer pour l'aider.
                    </p>
                    <form action="shoggoth" method="post">
                        <input type="submit" name="aider" value="Aider Gaspard.">
                    </form>
                <?php elseif (isset($_POST['aider'])): ?>
                    <p>
                        La première partie du bureau est vide, en dehors des morceaux de papiers traînant un peu partout et des meubles renversés.
                        Vous vous hâtez vers la seconde partie du bureau et manquez de peu de trébucher sur quelque chose.
                        En baissant les yeux, vous voyez le corps meurtri de Gaspard, dont une jambe en travers du passage a failli vous faire tomber.
                        Vous relevez les yeux et le voyez.<br>
                        <br>
                        Hideux, bien plus gros que ce à quoi vous vous attendiez, se tient le shoggoth de votre oncle.
                        Il vous est inconcevable de comprendre comment une telle chose a pu tenir à l'intérieur de son corps,
                        mais vous constatez rapidement que les cuves contenant les embryons ont été brisées et sont à présent vides.
                        Le monstre a dû récupérer ses “morceaux” pour redevenir entier.
                    </p>
                    <form action="shoggoth" method="post">
                        <input type="submit" name="agir" value="Faire quelque chose.">
                    </form>
                <?php else: ?>
                    <audio src="/escaperpg/sons/secrets/paslents.mp3" autoplay></audio>
                    <p>
                        Vous revenez au manoir et votre cœur manque un battement lorsque vous voyez que les grilles de l'entrée ont été forcées
                        et qu'une matière visqueuse est restée accrochée dessus.
                        Le shoggoth de votre oncle serait-il revenu ici ? Mais pourquoi ?<br>
                        <br>
                        Sur vos gardes, vous avancez dans l'allée de graviers menant aux portes du manoir, défoncées elles aussi.
                        Le carré d'obscurité formé par le trou béant est terriblement angoissant mais vous continuez d'avancer malgré tout.
                    </p>
                    <form action="shoggoth" method="post">
                        <input type="submit" name="suivant" value="Suivant.">
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
