<?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/entete.php"; ?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <script type="text/javascript" src="/escaperpg/lightbox/js/prototype.js"></script>
    <script type="text/javascript" src="/escaperpg/lightbox/js/scriptaculous.js?load=effects,builder"></script>
    <script type="text/javascript" src="/escaperpg/lightbox/js/lightbox.js"></script>
    <link rel="stylesheet" href="/escaperpg/lightbox/css/lightbox.css" type="text/css" media="screen">
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/styleAventures.php"; ?>
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/ambria/includes/stylesAmbria.php"; ?>
    <meta charset="utf-8">
    <title>Les Docks - Le Trésor d'Ambria</title>
</head>

<body>
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/header.php"; ?>
    <div id="banniere"><img src="/escaperpg/images/ambria/tresorambriamini.png" alt="le trésor d'ambria"></div>
    <main>
        <?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/ambria/includes/nav-sullivan.php"; ?>
        <div id="txt">
            <?php if (isset($_POST['validate'])): ?>
                <?php if (str_replace($search, $replace, stripslashes($_POST['qui'])) == "louis" && str_replace($search, $replace, stripslashes($_POST['ou'])) == "bibliotheque"): ?>
                    <p>
                        Vous savez maintenant où vous rendre et ne traînez pas une seconde de plus, prenant la direction de la <span class="lieu">bibliothèque</span>.
                    </p>
                    <form action="bibliotheque" method="post">
                        <input type="submit" name="aller" value="S'y rendre.">
                    </form>
                <?php else: ?>
                    <p>
                        Cela ne semble pas être ça.
                    </p>
                    <form action="docks" method="post">
                        <input type="submit" name="retour" value="Retour.">
                    </form>
                <?php endif; ?>
            <?php elseif (isset($_SESSION['ambriapaul'])): ?>
                <audio src="/escaperpg/sons/ambria/docks.mp3" autoplay></audio>
                <p>
                    Vous déambulez sur les docks, au milieux des navires et des cargaisons que les marins emmènent à bord ou débarquent à terre.<br>
                    <br>
                    Au bout d'un moment, vous remarquez dans une ruelle entre deux bâtiments quatre types avec qui vous tentez votre chance en leur demandant s'ils savent qui a trouvé la carte que vous cherchez.
                </p>
                <div class="dialogue">
                    <div class="portrait">
                        <img src="/escaperpg/images/ambria/marin1.png" alt="marin">
                    </div>
                    <div class="bulleperso">
                        <p>
                            J'ai entendu dire que c'est <span class="mdp">Peter</span>, le patron du <span class="lieu">bordel</span>, qui l'a récupérée.
                        </p>
                    </div>
                </div>
                <div class="dialogue">
                    <div class="bulleperso2">
                        <p>
                            Je traîne souvent à la <span class="lieu">taverne</span>, celle qu'est tenue par <span class="mdp">Don</span>.
                            J'y ai entendu un marin dire que c'est lui qui l'avait trouvée.
                        </p>
                    </div>
                    <div class="portrait2">
                        <img src="/escaperpg/images/ambria/marin2.png" alt="marin">
                    </div>
                </div>
                <div class="dialogue">
                    <div class="portrait">
                        <img src="/escaperpg/images/ambria/marin3.png" alt="marin">
                    </div>
                    <div class="bulleperso">
                        <p>
                            Je suis sûr que c'est <span class="mdp">Louis</span>, qui bosse à la <span class="lieu">taverne</span>, qui l'a !
                        </p>
                    </div>
                </div>
                <div class="dialogue">
                    <div class="bulleperso2">
                        <p>
                            Je crois que c'est <span class="mdp">Bernard</span>, qui vend des poissons sur le <span class="lieu">marché</span> qui l'a trouvée lors de sa dernière pêche.
                            Vous devriez aller lui en parler.
                        </p>
                    </div>
                    <div class="portrait2">
                        <img src="/escaperpg/images/ambria/marin4.png" alt="marin">
                    </div>
                </div>
                <p>
                    Vous ne savez pas trop quoi en penser... Peut-être que ce que vous a dit le vieil homme peut vous aider ?
                </p>
                <form action="docks" method="post">
                    <label for="qui">Qui possède la carte ?</label>
                    <input list="notesListe" name="qui" id="qui"><br><br>
                    <label for="ou">Où se trouve cette personne ?</label>
                    <input list="notesListe" name="ou" id="ou"><br><br>
                    <input type="submit" name="validate" value="Valider.">
                </form>
                <?php
                $reponse = "Vous cherchez \"Louis\" qui travaille à la \"bibliothèque\".";
                $indice1 = "Le vieil homme vous a dit qu'il y a toujours du vrai et du faux dans les rumeurs. C'est sans doute le cas ici.";
                $indice2 = "Analysez chaque phrase des types et essayez de trouver quelle partie est vraie et laquelle est fausse, vous saurez ainsi qui a la carte.";
                $indice3 = `Le premier type vous dit que Peter est le patron du bordel, ce qui est vrai. Donc le reste de sa phrase est fausse et ce n'est pas Peter qui l'a.<br>
                    Le second type vous dit que la taverne est tenue par Don, ce qui est vrai, donc le reste est faux et ce n'est pas lui qui a la carte.<br>
                    Le troisième type vous dit que Louis travaille à la taverne, ce qui est faux, donc le reste de sa phrase est vraie ! Louis a bien la carte, mais où travaille-t-il ?
                    Vous devriez vous renseigner à la taverne si vous ne le savez pas encore, puis vous rendre directement à l'adresse qu'il vous donne.<br>
                    Le quatrième type vous dit que Bernard vend des poissons au marché, ce qui est vrai, donc le reste est faux. Bernard n'a pas la carte.`;
                include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/indices.php";
                ?>
            <?php else: ?>
                <audio src="/escaperpg/sons/ambria/docks.mp3" autoplay></audio>
                <p>
                    Vous déambulez sur les docks, au milieux des navires et des cargaisons que les marins emmènent à bord ou débarquent à terre.<br>
                    <br>
                    Au bout d'un moment, vous remarquez dans une ruelle entre deux bâtiments quatre types avec qui vous tentez votre chance en leur demandant s'ils savent qui a trouvé la carte que vous cherchez.
                </p>
                <div class="dialogue">
                    <div class="portrait">
                        <img src="/escaperpg/images/ambria/marin1.png" alt="marin">
                    </div>
                    <div class="bulleperso">
                        <p>
                            J'ai entendu dire que c'est <span class="mdp">Peter</span>, le patron du <span class="lieu">bordel</span>, qui l'a récupérée.
                        </p>
                    </div>
                </div>
                <div class="dialogue">
                    <div class="bulleperso2">
                        <p>
                            Je traîne souvent à la <span class="lieu">taverne</span>, celle qu'est tenue par <span class="mdp">Don</span>.
                            J'y ai entendu un marin dire que c'est lui qui l'avait trouvée.
                        </p>
                    </div>
                    <div class="portrait2">
                        <img src="/escaperpg/images/ambria/marin2.png" alt="marin">
                    </div>
                </div>
                <div class="dialogue">
                    <div class="portrait">
                        <img src="/escaperpg/images/ambria/marin3.png" alt="marin">
                    </div>
                    <div class="bulleperso">
                        <p>
                            Je suis sûr que c'est <span class="mdp">Louis</span>, qui bosse à la <span class="lieu">taverne</span>, qui l'a !
                        </p>
                    </div>
                </div>
                <div class="dialogue">
                    <div class="bulleperso2">
                        <p>
                            Je crois que c'est <span class="mdp">Bernard</span>, qui vend des poissons sur le <span class="lieu">marché</span> qui l'a trouvée lors de sa dernière pêche.
                            Vous devriez aller lui en parler.
                        </p>
                    </div>
                    <div class="portrait2">
                        <img src="/escaperpg/images/ambria/marin4.png" alt="marin">
                    </div>
                </div>
                <p>
                    Vous ne savez pas trop quoi en penser... Sans doute devriez-vous aller vous renseigner ailleurs ?
                </p>
                <?php
                if (!in_array('Peter - Don - Louis - Bernard', $_SESSION['mdp'])) {
                    $_SESSION['mdp'][] = 'Peter - Don - Louis - Bernard';
                }
                include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/resetIndices.php";
                ?>
            <?php endif; ?>
        </div>
    </main>
    <div id="load">
        <div id="loader"></div>
    </div>
    <script src="/escaperpg/scripts/aventures-chargement.js"></script>
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/ambria/sullivan/includes/footer.php"; ?>
</body>

</html>
