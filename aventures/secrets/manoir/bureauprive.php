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
    <title>Bureau privé - Secrets Familiaux</title>
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
            <?php if (isset($_SESSION['tiroiropened'])): ?>
                <?php if (isset($_SESSION['chienssauvesfin'])): ?>
                    <?php if (isset($_SESSION['pnakotiques'])): ?>
                        <p>
                            Il semble que vous avez trouvé tout ce qu'il restait de ce côté.
                        </p>
                        <form action="bureauprive2" method="post">
                            <input type="submit" name="fond" value="Passer de l'autre côté.">
                        </form>
                    <?php else: ?>
                        <div id="enigmelieu">
                            <img src="/escaperpg/images/secrets/bureausecret1tiroiropened.png" alt="tiroir du bureau ouvert">
                        </div>
                        <p>
                            Votre médaillon vibre toujours lorsque vous êtes proche de la bibliothèque.
                        </p>
                        <form action="bureauprive" method="post">
                            <input list="notesListe" name="fouiller">
                            <datalist id="notesListe"></datalist>
                            <input type="submit" name="bibliotheque" value="Fouiller la bibliothèque.">
                        </form>
                        <script src="/escaperpg/scripts/updateDataList.js"></script>
                    <?php endif; ?>
                <?php else: ?>
                    <p>
                        Il semble que vous avez trouvé tout ce qu'il restait de ce côté.
                    </p>
                    <form action="bureauprive2" method="post">
                        <input type="submit" name="fond" value="Passer de l'autre côté.">
                    </form>
                <?php endif; ?>
            <?php else: ?>
                <?php if (isset($_POST['pnako'])): ?>
                    <script src="/escaperpg/scripts/inventaireadds.js"></script>
                    <?php if (isset($_SESSION['tiroiropened'])): ?>
                        <p>
                            Il semble que vous ayez trouvé tout ce qu'il y avait de ce côté.
                        </p>
                    <?php else: ?>
                        <div id="enigmelieu">
                            <img src="/escaperpg/images/secrets/bureausecret1.png" alt="bureau privé">
                            <form action="bureauprive" method="post">
                                <button type="submit" name="tiroir" id="tiroir">
                                    <img src="/escaperpg/images/secrets/buttontiroir.png" alt="tiroir du bureau">
                                </button>
                            </form>
                        </div>
                        <p>
                            Vous avez trouvé tout ce qu'il y avait d'intéressant dans la bibliothèque, mais peut-être reste-t-il autre chose dans la pièce ?
                        </p>
                    <?php endif; ?>
                    <form action="bureauprive2" method="post">
                        <input type="submit" name="fond" value="Passer de l'autre côté.">
                    </form>
                    <?php
                    if (!in_array("pnakotiques", $_SESSION['inventaire'])) {
                        $_SESSION['inventaire'][] = "pnakotiques";
                    }
                    if (!in_array("pnakotiquesnotes", $_SESSION['inventaire'])) {
                        $_SESSION['pnakotiquesnotes'] = "pnakotiquesnotes";
                    }
                    ?>
                <?php elseif (isset($_POST['fouiller'])): ?>
                    <?php if (str_replace($search, $replace, stripslashes($_POST['fouiller'])) == "cerclerituel"): ?>
                        <div id="enigme">
                            <a href="/escaperpg/images/secrets/pnakotiques.png" rel="lightbox[invent]">
                                <img src="/escaperpg/images/secrets/pnakotiques.png" alt="une page des manuscrits pnakotiques">
                            </a><br>
                            <a href="/escaperpg/images/secrets/pnakotiquesnotes.png" rel="lightbox[invent]">
                                <img src="/escaperpg/images/secrets/pnakotiquesnotes.png" alt="une page des manuscrits pnakotiques">
                            </a>
                        </div>
                        <p>
                            En fouillant parmi les livres de la bibliothèque privée, vous tombez sur un livre très ancien dont la couverture est en partie arrachée.
                            Les pages jaunies semblent sur le point de partir en poussière et vous manipulez le tout avec précaution.<br>
                            <br>
                            Le livre se nomme Manuscrits Pnakotiques et décrit tout un tas de rituels magiques divers.
                            L'une des pages représente un motif très similaire à celui présent sur le talisman de Gaspard.<br>
                            La page évoque comment réaliser des cercles magiques pour avoir des visions de dimensions inconnues et créer un portail y menant, mais la deuxième page est très abîmée.
                            Peut-être pourriez-vous trouver comment créer le second cercle malgré tout ?<br>
                            Une feuille volante, beaucoup plus récente que le livre, était glissée entre ces pages.<br>
                            <br>
                            Vous gardez ces éléments de côté.
                        </p>
                        <form action="bureauprive" method="post">
                            <input type="submit" name="pnako" value="Ajouter à l'inventaire.">
                        </form>
                    <?php else: ?>
                        <div id="enigmelieu">
                            <img src="/escaperpg/images/secrets/bureausecret1.png" alt="bureau privé">
                            <form action="bureauprive" method="post">
                                <button type="submit" name="tiroir" id="tiroir">
                                    <img src="/escaperpg/images/secrets/buttontiroir.png" alt="tiroir du bureau">
                                </button>
                            </form>
                        </div>
                        <p>
                            Vous ne trouvez pas ce que vous cherchez.
                        </p>
                        <form action="bureauprive" method="post">
                            <input list="notesListe" name="fouiller">
                            <datalist id="notesListe"></datalist>
                            <input type="submit" name="bibliotheque" value="Fouiller la bibliothèque.">
                        </form>
                        <script src="/escaperpg/scripts/updateDataList.js"></script>
                    <?php endif; ?>
                <?php elseif (isset($_POST['journaladd'])): ?>
                    <script src="/escaperpg/scripts/inventaireadd.js"></script>
                    <div id="enigmelieu">
                        <img src="/escaperpg/images/secrets/bureausecret1tiroiropened.png" alt="tiroir du bureau ouvert">
                    </div>
                    <p>
                        Il semble manquer certaines des pages, mais une rapide lecture vous permet d'apprendre non seulement que votre oncle s'essayait à de sombres expériences avec le docteur Pellington,
                        mais qu'une pièce secrète est cachée quelque part dans le manoir !
                    </p>
                    <?php if (isset($_SESSION['chienssauvesfin']) && !isset($_SESSION['pnakotiques'])): ?>
                        <p>
                            Votre médaillon vibre toujours lorsque vous êtes proche de la bibliothèque.
                        </p>
                        <form action="bureauprive" method="post">
                            <input list="notesListe" name="fouiller">
                            <datalist id="notesListe"></datalist>
                            <input type="submit" name="bibliotheque" value="Fouiller la bibliothèque.">
                        </form>
                        <script src="/escaperpg/scripts/updateDataList.js"></script>
                    <?php endif; ?>
                    <form action="bureauprive2" method="post">
                        <input type="submit" name="fond" value="Passer de l'autre côté.">
                    </form>
                    <?php
                    $_SESSION['tiroiropened'] = true;
                    if (!in_array("journal1", $_SESSION['inventaire'])) {
                        $_SESSION['inventaire'][] = 'journal1';
                    }
                    if (!in_array("journal3", $_SESSION['inventaire'])) {
                        $_SESSION['inventaire'][] = 'journal3';
                    }
                    if (!in_array("journal4", $_SESSION['inventaire'])) {
                        $_SESSION['inventaire'][] = 'journal4';
                    }
                    ?>
                <?php elseif (isset($_POST['petitecle'])): ?>
                    <?php if (str_replace($search, $replace, stripslashes($_POST['petitecle'])) == "tirlitke"): ?>
                        <audio src="/escaperpg/sons/secrets/tiroir.mp3" autoplay></audio>
                        <div id="enigmelieu">
                            <img src="/escaperpg/images/secrets/bureausecret1tiroiropened.png" alt="tiroir du bureau ouvert">
                        </div>
                        <p>
                            Vous débloquez le tiroir et l'ouvrez.
                        </p>
                        <div id="enigme">
                            <a href="/escaperpg/images/secrets/journal1.png" rel="lightbox[invent]">
                                <img src="/escaperpg/images/secrets/journal1.png" alt="la première page du journal de l'oncle William">
                            </a>
                            <br>
                            <a href="/escaperpg/images/secrets/journal3.png" rel="lightbox[invent]">
                                <img src="/escaperpg/images/secrets/journal3.png" alt="la troisième page du journal de l'oncle William">
                            </a>
                            <br>
                            <a href="/escaperpg/images/secrets/journal4.png" rel="lightbox[invent]">
                                <img src="/escaperpg/images/secrets/journal4.png" alt="la quatrième page du journal de l'oncle William">
                            </a>
                        </div>
                        <p>
                            Vous trouvez une liasse de papiers jaunis sur lesquels s'étale une fine écriture que vous reconnaissez immédiatement comme étant celle de votre oncle.
                            Vous les prenez délicatement, sans toutefois pouvoir vous empêcher de trembler à l'idée de ce que vous pourriez y découvrir.
                        </p>
                        <form action="bureauprive" method="post">
                            <input type="submit" name="journaladd" value="Ajouter à l'inventaire.">
                        </form>
                        <?php unset($_SESSION['petitecle']); ?>
                    <?php else: ?>
                        <p>
                            Cela ne semble pas fonctionner.
                            Êtes-vous sûr d'avoir fait comme il fallait ?
                        </p>
                        <?php if (isset($_SESSION['chienssauvesfin']) && !isset($_SESSION['pnakotiques'])): ?>
                            <p>
                                Votre médaillon vibre toujours lorsque vous êtes proche de la bibliothèque.
                            </p>
                            <form action="bureauprive" method="post">
                                <input list="notesListe" name="fouiller">
                                <datalist id="notesListe"></datalist>
                                <input type="submit" name="bibliotheque" value="Fouiller la bibliothèque.">
                            </form>
                        <?php endif; ?>
                        <form action="bureauprive" method="post">
                            <input list="notesListe" name="petitecle">
                            <datalist id="notesListe"></datalist>
                            <input type="submit" name="utiliser" value="Utiliser la clé.">
                        </form>
                        <br>
                        <form action="bureauprive2" method="post">
                            <input type="submit" name="fond" value="Passer de l'autre côté.">
                        </form>
                        <script src="/escaperpg/scripts/updateDataList.js"></script>
                    <?php endif; ?>
                <?php elseif (isset($_POST['tiroir'])): ?>
                    <div id="enigmelieu">
                        <img src="/escaperpg/images/secrets/bureausecret1.png" alt="bureau privé">
                        <form action="bureauprive" method="post">
                            <button type="submit" name="tiroir" id="tiroir">
                                <img src="/escaperpg/images/secrets/buttontiroir.png" alt="tiroir du bureau">
                            </button>
                        </form>
                    </div>
                    <p>
                        Le tiroir est fermé à clé, mais vous avez avec vous la petite clé trouvée dans le coffret.
                    </p>
                    <?php if (isset($_SESSION['chienssauvesfin']) && !isset($_SESSION['pnakotiques'])): ?>
                        <p>
                            Votre médaillon vibre toujours lorsque vous êtes proche de la bibliothèque.
                        </p>
                        <form action="bureauprive" method="post">
                            <input list="notesListe" name="fouiller">
                            <datalist id="notesListe"></datalist>
                            <input type="submit" name="bibliotheque" value="Fouiller la bibliothèque.">
                        </form>
                    <?php endif; ?>
                    <form action="bureauprive" method="post">
                        <input list="notesListe" name="petitecle">
                        <datalist id="notesListe"></datalist>
                        <input type="submit" name="utiliser" value="Utiliser la clé.">
                    </form>
                    <br>
                    <form action="bureauprive2" method="post">
                        <input type="submit" name="fond" value="Passer de l'autre côté.">
                    </form>
                    <script src="/escaperpg/scripts/updateDataList.js"></script>
                <?php else: ?>
                    <div id="succespopup">
                        <?php
                        $nouveausucces = '<img src="/escaperpg/images/succes/secrets/bureau.png"><span><u><b>Incantateur</b></u><br>Entrer dans le bureau privé de l\'oncle William</span>';
                        $scenario = 'secrets';
                        $description = 'bureau';
                        $cache = 'oui';
                        $rarete = 'succesbronze';
                        include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/succesadd.php";
                        ?>
                    </div>
                    <div id="enigmelieu">
                        <img src="/escaperpg/images/secrets/bureausecret1.png" alt="bureau privé">
                        <form action="bureauprive" method="post">
                            <button type="submit" name="tiroir" id="tiroir">
                                <img src="/escaperpg/images/secrets/buttontiroir.png" alt="tiroir du bureau">
                            </button>
                        </form>
                    </div>
                    <p>
                        Vous entrez enfin dans le bureau privé de votre oncle alors que la nuit commence à tomber.
                        Une grande bibliothèque traverse la pièce, la séparant en deux.
                        Au fond, derrière la bibliothèque, se trouve une petite ouverture pour accéder à la seconde partie.
                        La petite fenêtre au fond éclaire à peine l'ensemble.<br>
                        <br>
                        De ce côté, vous pouvez trouver un tas de livres obscurs traitant de sujets qui vous terrifient et que vous n'osez pas parcourir plus longtemps.
                        Un petit bureau se trouve sur la droite, contre le mur. Un tas de papiers et d'ustensiles divers jonchent le sol.
                        <br>
                        Manifestement, le docteur Pellington a retourné la salle pour trouver les preuves qu'il désirait détruire,
                        mais peut-être reste-t-il quelque chose ici ou là ?
                    </p>
                    <?php if (isset($_SESSION['chienssauvesfin'])): ?>
                        <p>
                            En approchant de la bibliothèque, vous sentez le talisman offert par Gaspard vibrer.
                            Vous devriez l'observer de plus près.
                        </p>
                        <form action="bureauprive" method="post">
                            <input list="notesListe" name="fouiller">
                            <datalist id="notesListe"></datalist>
                            <input type="submit" name="bibliotheque" value="Fouiller la bibliothèque.">
                        </form>
                        <script src="/escaperpg/scripts/updateDataList.js"></script>
                    <?php endif; ?>
                    <form action="bureauprive2" method="post">
                        <input type="submit" name="fond" value="Passer de l'autre côté.">
                    </form>
                    <?php
                    unset($_SESSION['bureauprive']);
                    $key = array_search('templar', $_SESSION['inventaire']);
                    if ($key !== false) {
                        unset($_SESSION['inventaire'][$key]);
                        $_SESSION['inventaire'] = array_values($_SESSION['inventaire']);
                    }
                    $key = array_search('papier', $_SESSION['inventaire']);
                    if ($key !== false) {
                        unset($_SESSION['inventaire'][$key]);
                        $_SESSION['inventaire'] = array_values($_SESSION['inventaire']);
                    }
                    include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/resetIndices.php";
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
