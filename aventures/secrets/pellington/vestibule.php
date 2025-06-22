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
    <title>Vestibule - Secrets Familiaux</title>
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
            <?php if (isset($_POST['veste'])): ?>
                <div id="enigme">
                    <a href="/escaperpg/images/secrets/flacon.png" rel="lightbox[invent]">
                        <img src="/escaperpg/images/secrets/flacon.png" alt="un flacon de barbiturique vide">
                    </a>
                </div>
                <p>
                    La veste du docteur est accrochée sur un porte-manteau.<br>
                    Lorsque vous la fouillez, vous trouvez dans une poche un petit flacon.
                    Sur l'étiquette, il est inscrit <span class="mdp">barbiturique</span>.
                    La bouteille est vide, ce qui indique que le docteur a dû en utiliser récemment.
                </p>
                <form action="vestibule" method="post">
                    <input type="submit" name="flaconadd" value="Ajouter à l'inventaire.">
                </form>
                <?php
                if (!in_array('Barbiturique', $_SESSION['mdp'])) {
                    $_SESSION['mdp'][] = 'Barbiturique';
                }
                ?>
            <?php else: ?>
                <div id="enigmelieu">
                    <img src="/escaperpg/images/secrets/vestibule.png" alt="le vestibule du docteur Pellington">
                    <?php if (!in_array('Barbiturique', $_SESSION['mdp'])): ?>
                        <div id="vest">
                            <form action="vestibule" method="post">
                                <button type="submit" name="veste">
                                    <img src="/escaperpg/images/secrets/veste.png" alt="la veste du docteur Pellington">
                                </button>
                            </form>
                        </div>
                    <?php endif; ?>
                </div>
                <?php if (in_array('Barbiturique', $_SESSION['mdp']) && isset($_SESSION['fouillevestibule'])): ?>
                    <p>
                        Il semblerait que vous ayez trouvé tout ce qu'il y avait d'utile dans le vestibule.
                    </p>
                <?php else: ?>
                    <?php if (isset($_POST['flaconadd'])): ?>
                        <script src="/escaperpg/scripts/inventaireadd.js"></script>
                        <p>
                            Il semblerait que vous ayez trouvé tout ce qu'il y avait d'utile dans la veste du docteur.
                        </p>
                        <?php
                        if (!in_array('flacon', $_SESSION['inventaire'])) {
                            $_SESSION['inventaire'][] = 'flacon';
                        }
                        ?>
                    <?php elseif (isset($_POST['entree'])): ?>
                        <?php if (str_replace($search, $replace, stripslashes($_POST['fouille'])) == "empreintedepas"): ?>
                            <p>
                                En regardant de plus près la paire de chaussures rangée au pied du porte-manteau, vous constatez qu'elles sont pleines de boue et de taille 40,
                                ce qui confirme que c'était bien le docteur qui rôdait autour de la maison depuis tout ce temps.
                            </p>
                            <form action="vestibule" method="post">
                                <input type="submit" name="retour" value="retour.">
                            </form>
                            <?php $_SESSION['fouillevestibule'] = true; ?>
                        <?php else: ?>
                            <p>
                                Vous ne semblez pas trouver quoi que ce soit d'utile en rapport avec ceci.
                            </p>
                        <?php endif; ?>
                    <?php else: ?>
                        <p>
                            L'entrée de la maison du docteur Pellington se compose d'un vestibule assez grand où l'homme et ses patients peuvent déposer leurs affaires en arrivant.
                        </p>
                    <?php endif; ?>
                <?php endif; ?>
            <?php endif; ?>
            <?php if (!isset($_SESSION['fouillevestibule'])): ?>
                <form action="vestibule" method="post">
                    <input list="notesListe" name="fouille">
                    <datalist id="notesListe"></datalist>
                    <input type="submit" name="entree" value="Fouiller.">
                </form>
                <script src="/escaperpg/scripts/updateDataList.js"></script>
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
