<?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/entete.php"; $_SESSION['plancurrent'] = "e"; ?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <script type="text/javascript" src="/escaperpg/lightbox/js/prototype.js"></script>
        <script type="text/javascript" src="/escaperpg/lightbox/js/scriptaculous.js?load=effects,builder"></script>
        <script type="text/javascript" src="/escaperpg/lightbox/js/lightbox.js"></script>
        <link rel="stylesheet" href="/escaperpg/lightbox/css/lightbox.css" type="text/css" media="screen">
        <link rel="stylesheet" href="/escaperpg/aventures/gaea1/css/style.css">
        <meta charset="utf-8">
        <title><?php if ($_SESSION['evisited']) { echo 'Pont de Commandement'; } else { echo 'Komunodek'; } ?> - Station GAEA-1</title>
    </head>

    <body>
        <?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/header.php"; ?>

        <div id="banniere"><img src="/escaperpg/images/gaea1/gaea1mini.png" alt="gaea 1 bannière"></div>

        <main>
            <?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/gaea1/includes/nav.php"; ?>

            <div id="txt">
                <?php if ($_SESSION['poweron']): ?>
                    <p>

                    </p>








                <?php elseif (isset($_POST['consulter'])): ?>
                    <div>
                        Des trucs
                    </div>






                <?php elseif (isset($_POST['suivant'])): ?>
                    <div class="dialogue">
                        <div id="marv"><img src="/escaperpg/images/gaea1/marv.png" alt="dialogue marv"></div>

                        <div id="bullemarv">
                            <p>
                                Parfait, <?= $_SESSION['feminin'] ? 'commandante' : 'commandant' ?>, l'établissement du traducteur est terminé, vous pouvez à présent consulter les terminaux.
                                Je me chargerai de traduire directement les éléments pour vous.
                            </p>
                        </div>
                    </div>

                    <p>
                        Il marque une légère pause, puis une petite alerte se fait entendre dans votre casque.
                    </p>

                    <div class="dialogue">
                        <div id="marv"><img src="/escaperpg/images/gaea1/marv.png" alt="dialogue marv"></div>

                        <div id="bullemarv">
                            <p>
                                Attention, capacité du réservoir d'oxygène critique. Je vous recommande de remettre rapidement en état les systèmes de la station et d'enclencher les recycleurs d'air.
                            </p>
                        </div>
                    </div>

                    <p>
                        Vous laissez échapper un juron entre vos dents avant de vous pencher sur l'ordinateur.
                    </p>

                    <form action="komunodek" method="post">
                        <input type="submit" name="consulter" value="consulter le terminal.">
                    </form>

                    <?php $_SESSION['oxygene'] -= 10; ?>

                <?php elseif (isset($_POST['compiler']) || $_SESSION['compilationterminee']): ?>
                    <?php if ($_SESSION['compilationterminee'] || ($_POST['schema1'] == 237) && ($_POST['schema2'] == 555) && ($_POST['schema3'] == 340)): ?>
                        <div id="succespopup">
                            <?php
                                $nouveausucces = '<img src="/escaperpg/images/succes/gaea1/traducteur.png"><span><u><b>Expert·e en langues</b></u><br>Créer un traducteur pour le langage de GAEA-I</span>';
                                $scenario = 'gaea1';
                                $description = 'traducteur';
                                $cache = 'non';
                                $rarete = 'succesargent';
                                include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/succesadd.php";
                            ?>
                        </div>

                        <p>
                            Tandis que M.A.R-V travaille, vous prenez le temps de regarder autour de vous.<br>
                            La passerelle de commandement semble tout aussi vide que le reste des salles que vous avez visitées.
                            Vous vous sentez de plus en plus <?= $_SESSION['feminin'] ? 'oppressée' : 'oppressé' ?> dans cet environnement, ce sentiment amplifié par l'éclairage d'urgence.
                            Au fond de la pièce, vous devinez une porte qui semble mener vers la cabine personnelle du commandant.<br>
                            <br>
                            Vous êtes soudain <?= $_SESSION['feminin'] ? 'tirée' : 'tiré' ?> de votre réflexion par un petit bip indiquant la fin de l'opération.
                        </p>

                        <form action="komunodek" method="post">
                            <input type="submit" name="suivant" value="suivant.">
                        </form>

                        <?php
                            $_SESSION['indice1'] = false;
                            $_SESSION['indice2'] = false;
                            $_SESSION['indice3'] = false;
                            $_SESSION['reponse'] = false;
                            $_SESSION['traduction'] = false;
                            $_SESSION['compilationterminee'] = true;
                        ?>

                    <?php else: ?>
                        <div class="dialogue">
                            <div id="marv"><img src="/escaperpg/images/gaea1/marv.png" alt="dialogue marv"></div>

                            <div id="bullemarv">
                                <p>
                                    Ça ne semble pas correspondre, <?= $_SESSION['feminin'] ? 'commandante' : 'commandant' ?>.
                                    Le texte compilé n'est pas cohérent, je pense que nous devrions reprendre.
                                </p>
                            </div>
                        </div>

                        <form action="komunodek" method="post">
                            <input type="submit" name="traduire" value="réessayer.">
                        </form>
                    <?php endif; ?>

                <?php elseif (isset($_POST['traduire']) || $_SESSION['traduction']): ?>
                    <div class="dialogue">
                        <div id="marv"><img src="/escaperpg/images/gaea1/marv.png" alt="dialogue marv"></div>

                        <div id="bullemarv">
                            <p>
                                D'après mes relevés, ce langage est issu de plusieurs langues d'origine européenne, d'après le référentiel terrestre.<br>
                                <br>
                                La syntaxe est composée à 80% d'anglais et à 20% de norvégien. La conjugaison semble être 100% norvégienne.
                                Pour la grammaire, je dirais qu'elle est constituée majoritairement de norvégien,
                                mais je détecte quelques accents d'italien et de suédois, respectivement à hauteur de 20 et 10%.
                            </p>
                        </div>
                    </div>

                    <div id="schema-wrap">
                        <div class="schema-cols">
                            SYNTAXE
                            <canvas id="schemalangue1" width="200px" height="200px"></canvas>
                        </div>

                        <div class="schema-cols">
                            CONJUGAISON
                            <canvas id="schemalangue2" width="200px" height="200px"></canvas>
                        </div>

                        <div class="schema-cols">
                            GRAMMAIRE
                            <canvas id="schemalangue3" width="200px" height="200px"></canvas>
                        </div>
                    </div>

                    <form action="komunodek" method="post">
                        <input type="number" name="schema1" id="schema1" value="0" class="hidden">
                        <input type="number" name="schema2" id="schema2" value="0" class="hidden">
                        <input type="number" name="schema3" id="schema3" value="0" class="hidden">
                        <input type="submit" name="compiler" value="compiler les données.">
                    </form>

                    <script src="/escaperpg/aventures/gaea1/scripts/schemalangue.js"></script>

                    <?php
                        $reponse = "<img src=\"/escaperpg/images/gaea1/schemas/schemasreponse.png\">";
                        $indice1 = "Avez-vous songé à consulter votre manuel, section <i>\"Les langues dans l'univers\"</i> ?";
                        $indice2 = "Avez-vous remarqué que chaque symbole est constitué de 10 points ?";
                        $indice3 = "Si un langage est composé à 80% d'une première langue et 20% d'une seconde, il faut reproduire les 8 premiers points de la première et les deux derniers de la seconde.";

                        include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/gaea1/includes/indices.php";
                    ?>

                <?php elseif (isset($_POST['connexion'])): ?>
                    <?php if (str_replace($search, $replace, stripslashes($_POST['identifiant'])) == "ahyrdxbp718" && str_replace($search, $replace, stripslashes($_POST['motdepasse'])) == "gaeaikomunthyrd"): ?>
                        <div id="succespopup">
                            <?php
                            $nouveausucces = '<img src="/escaperpg/images/succes/gaea1/hacking.png"><span><u><b>Expert·e en hacking</b></u><br>Se connecter au terminal du pont de commandement</span>';
                            $scenario = 'gaea1';
                            $description = 'hacking';
                            $cache = 'non';
                            $rarete = 'succesnormal';
                            include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/succesadd.php";
                            ?>
                        </div>

                        <p>
                            L'ordinateur se lance et affiche bientôt un menu sobre avec plusieurs boutons.
                            Ne sachant pas par où commencer avec cette langue que vous ne parvenez toujours pas à déchiffrer,
                            vous déroulez un câble de votre terminal personnel et le branchez sur l'unité centrale.
                        </p>

                        <div class="dialogue">
                            <div id="marv"><img src="/escaperpg/images/gaea1/marv.png" alt="dialogue marv"></div>

                            <div id="bullemarv">
                                <p>Parfait <?= $_SESSION['feminin'] ? 'commandante' : 'commandant' ?>, laissez-moi analyser les données afin de compiler un traducteur.</p>
                            </div>
                        </div>

                        <form action="komunodek" method="post">
                            <input type="submit" name="traduire" value="traduire le langage.">
                        </form>

                        <?php
                        $_SESSION['indice1'] = false;
                        $_SESSION['indice2'] = false;
                        $_SESSION['indice3'] = false;
                        $_SESSION['reponse'] = false;
                        $_SESSION['traduction'] = true;
                        ?>

                    <?php elseif (str_replace($search, $replace, stripslashes($_POST['identifiant'])) == "ahyrdxbp718" && str_replace($search, $replace, stripslashes($_POST['motdepasse'])) == "hmpo62x4sdr"): ?>
                        <p>Cela ne semble pas fonctionner.</p>

                        <div class="dialogue">
                            <div id="marv"><img src="/escaperpg/images/gaea1/marv.png" alt="dialogue marv"></div>

                            <div id="bullemarv">
                                <p>
                                    Hum... Les mots de passe sont sans doute chiffrés. Il faudrait trouver une clé de décryptage. Fouillez bien les répertoires du terminal.
                                </p>
                            </div>
                        </div>

                        <form action="komunodek" method="post">
                            <input type="submit" name="hacker" value="retour.">
                        </form>

                    <?php elseif (str_replace($search, $replace, stripslashes($_POST['motdepasse'])) == "0ff1s3r713"): ?>
                        <div id="succespopup">
                            <?php
                            $nouveausucces = '<img src="/escaperpg/images/succes/gaea1/offiser.png"><span><u><b>Qui ne tente rien n\'a rien...</b></u><br>Essayer de se connecter au terminal avec le mot de passe d\'un autre</span>';
                            $scenario = 'gaea1';
                            $description = 'offiser';
                            $cache = 'oui';
                            $rarete = 'succesbronze';
                            include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/succesadd.php";
                            if ($_SESSION['loggedin']) {
                                echo '<script src="/escaperpg/scripts/succescount.js"></script>';
                            } else {
                                echo '<script src="/escaperpg/scripts/succescountoffline.js"></script>';
                            }
                            ?>
                        </div>

                        <p>Cela ne semble pas fonctionner.</p>

                        <div class="dialogue">
                            <div id="marv"><img src="/escaperpg/images/gaea1/marv.png" alt="dialogue marv"></div>

                            <div id="bullemarv">
                                <p>
                                    Je vois que vous avez essayé le mot de passe d'Aaron Lie. Cependant, sans son identifiant exact, il ne nous servira à rien.<br>
                                    Sans doute devrions-nous trouver quelqu'un d'autre pour utiliser ses accès.
                                </p>
                            </div>
                        </div>

                        <form action="komunodek" method="post">
                            <input type="submit" name="hacker" value="retour.">
                        </form>

                    <?php else: ?>
                        <p>Cela ne semble pas fonctionner.</p>

                        <form action="komunodek" method="post">
                            <input type="submit" name="hacker" value="retour.">
                        </form>
                    <?php endif; ?>

                <?php elseif (isset($_POST['hacker']) || $_SESSION['hacking']): ?>
                    <?php $_SESSION['hacking'] = true; ?>

                    <p>
                        Ne possédant pas les identifiants de connexion, vous ouvrez une console de commande pour tenter de pirater l'accès.
                    </p>

                    <div class="dialogue">
                        <div id="marv"><img src="/escaperpg/images/gaea1/marv.png" alt="dialogue marv"></div>

                        <div id="bullemarv">
                            <p>
                                Bien que la station ait l'air d'utiliser son propre langage, le système devrait répondre aux instructions de base intergalactiquement admises.<br>
                                <br>
                                Pour commencer, je vous suggère de taper la commande "<b>--hlp</b>", pour "help", afin de voir quelles sont les différentes commandes qui nous sont accessibles.<br>
                                Ne vous inquiétez pas, je vous guiderai à chaque étape, suivez bien mes conseils.
                            </p>
                        </div>
                    </div>

                    <div id="terminal-console-wrap">
                        <div id="terminal-wrap">
                            <div id="console-output" class="console-output">
                                <div>
                                    GAEA-I KOMUNODEK<br>
                                    System unt AF-0340-B12<br>
                                    <br>
                                    Skrivver komundsetitt
                                </div>
                            </div>

                            <span id="input-shadow" class="input-shadow"></span>

                            <div id="terminal">
                                <div class="inputTerminal">
                                    <input type="text" name="commande" id="prompt" class="prompt" maxlength="70" autofocus>
                                    <span class="blinker eventsoff">_</span>
                                </div>
                            </div>
                        </div>

                        <form action="komunodek" method="post">
                            <label for="identifiant">ID : </label><input list="notesListe" name="identifiant" id="identifiant"><datalist id="notesListe"></datalist>
                            <br><br>
                            <label for="motdepasse">Pass : </label><input type="password" name="motdepasse" id="motdepasse">
                            <br><br>
                            <input type="submit" name="connexion" value="konekt.">
                        </form>
                    </div>

                    <script src="/escaperpg/aventures/gaea1/scripts/hacking.js"></script>

                    <?php
                    $reponse = "L'identifiant du commandant est \"a_hyrd_xbp718\" et son mot de passe \"GAEA-I_KomuntHyrd\".<br>
                                        Pour les trouver, il fallait consulter son dossier avec \"--lesr /usr/hyrd_angus.dat\" (trouvable en affichant les fichiers cachés de \"/usr\").
                                        Cependant, le mot de passe qui s'y trouve est chiffré.<br>
                                        Avec la commande \"--lst /dok -a\" on repère un dossier \"/krp\" contenant le fichier \"dekrypter.dat\" à lire avec les droits d'administrateur.<br>
                                        Ce fichier indique qu'il faut employer la commande \"--dkryptr=MOT_DE_PASSE/lxt-54\" avec le mot de passe à décoder, qui donne enfin \"GAEA-I_KomuntHyrd\".";
                    $indice1 = "Il faut trouver un identifiant et un mot de passe pour se connecter. Avec la commande \"--lst\" vous devriez pouvoir trouver un dossier intéressant.";
                    $indice2 = "N'oubliez pas qu'il peut y avoir des dossiers et fichiers cachés ! Finir une commande par \"-a\" vous les affichera.";
                    $indice3 = "Avez-vous consulté le dossier caché dans \"/dok\" et le fichier caché dans \"/usr\" ?";

                    include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/gaea1/includes/indices.php";
                    ?>

                <?php elseif ($_SESSION['deckopen']): ?>
                    <p>
                        L'éclairage d'urgence et votre lampe dévoilent une grande pièce remplie de terminaux.
                        Vers le centre, légèrement surélevé, un fauteuil luxueux domine l'espace, devant un ordinateur : le siège de commandement.<br>
                        Sans plus attendre, vous vous y dirigez et, fébrile, appuyez sur le bouton d'alimentation de l'appareil.
                        Vous poussez un soupir de soulagement en le voyant s'activer grâce aux systèmes de secours.<br>
                        <br>
                        Cependant, le terminal est sécurisé.
                    </p>

                    <form action="komunodek" method="post">
                        <input type="submit" name="hacker" value="hacker le système.">
                    </form>

                    <?php $_SESSION['etested'] = true; ?>
                    <?php $_SESSION['evisited'] = true; ?>

                <?php elseif ($_SESSION['dvisited']): ?>
                    <?php if (in_array('deckPass', $_SESSION['inventaire']) && in_array('energyCells', $_SESSION['inventaire'])): ?>
                        <p>
                            Vous remettez en place le panneau dans le mur et y déposez les cellules énergétiques.
                            Rapidement, elles se mettent à alimenter le mécanisme.
                            Vous replacez le cache du panneau et agitez le pass devant le lecteur qui émet un petit bip avant que la LED ne passe au vert et que la porte ne coulisse dans le mur,
                            presque sans bruit.<br>
                            <br>
                            Vous entrez dans la pièce baignée de lumière rouge.
                        </p>

                        <form action="komunodek" method="post">
                            <input type="submit" name="entrer" value="entrer.">
                        </form>

                        <?php
                        $_SESSION['deckopen'] = true;
                        $_SESSION['oxygene'] -= 10;
                        $key = array_search('energyCells', $_SESSION['inventaire']);
                        if ($key !== false) {
                            unset($_SESSION['inventaire'][$key]);
                            $_SESSION['inventaire'] = array_values($_SESSION['inventaire']);
                        }
                        ?>

                    <?php elseif (in_array('energyCells', $_SESSION['inventaire'])): ?>
                        <?php if ($_SESSION['deckpanel']): ?>
                            <?php if (in_array('deckPass', $_SESSION['inventaire'])): ?>
                                <p>
                                    Vous agitez le pass devant le lecteur qui émet un petit bip avant que la LED ne passe au vert et que la porte ne coulisse dans le mur, presque sans bruit.
                                    Vous entrez dans la pièce baignée de lumière rouge.
                                </p>

                                <form action="komunodek" method="post">
                                    <input type="submit" name="entrer" value="entrer.">
                                </form>

                                <?php $_SESSION['deckopen'] = true; ?>
                                <?php $_SESSION['oxygene'] -= 10; ?>

                            <?php else: ?>
                                <p>
                                    Il vous manque toujours le pass pour ouvrir cette porte. Vous devriez fouiller les pièces accessibles pour voir si vous pouvez en trouver un.
                                </p>

                                <?php $_SESSION['etested'] = true; ?>
                                <?php $_SESSION['plancurrent'] = null; ?>
                            <?php endif; ?>

                        <?php else: ?>
                            <?php if (in_array('deckPass', $_SESSION['inventaire'])): ?>
                                <p>
                                    Vous remettez en place le panneau dans le mur et y déposez les cellules énergétiques.
                                    Rapidement, elles se mettent à alimenter le mécanisme.
                                    Vous replacez le cache du panneau et agitez le pass devant le lecteur qui émet un petit bip avant que la LED ne passe au vert et que la porte ne coulisse dans le mur,
                                    presque sans bruit.<br>
                                    <br>
                                    Vous entrez dans la pièce baignée de lumière rouge.
                                </p>

                                <form action="komunodek" method="post">
                                    <input type="submit" name="entrer" value="entrer.">
                                </form>

                                <?php
                                $_SESSION['deckopen'] = true;
                                $_SESSION['oxygene'] -= 10;
                                $key = array_search('energyCells', $_SESSION['inventaire']);
                                if ($key !== false) {
                                    unset($_SESSION['inventaire'][$key]);
                                    $_SESSION['inventaire'] = array_values($_SESSION['inventaire']);
                                }
                                ?>

                            <?php else: ?>
                                <p>
                                    Vous remettez en place le panneau dans le mur et y déposez les cellules énergétiques.
                                    Rapidement, elles se mettent à alimenter le mécanisme. Vous replacez le cache du panneau et tentez d'actionner l'ouverture de la porte, mais rien ne se passe.
                                    Vous comprenez rapidement, en y regardant de plus près, que le panneau est en réalité un lecteur de carte magnétique.<br>
                                    <br>
                                    Il va falloir en trouver un pour accéder à la passerelle.
                                </p>

                                <?php
                                $_SESSION['deckpanel'] = true;
                                $_SESSION['etested'] = true;
                                $_SESSION['plancurrent'] = null;
                                $key = array_search('energyCells', $_SESSION['inventaire']);
                                if ($key !== false) {
                                    unset($_SESSION['inventaire'][$key]);
                                    $_SESSION['inventaire'] = array_values($_SESSION['inventaire']);
                                }
                                ?>
                            <?php endif; ?>
                        <?php endif; ?>

                    <?php elseif (in_array('deckPass', $_SESSION['inventaire'])): ?>
                        <p>
                            Le lecteur de carte permettant d'accéder à la passerelle n'est toujours pas opérationnel, vous avez besoin de cellules énergétiques pour pouvoir franchir la porte.
                            Il doit y avoir un entrepôt quelque part sur la station où vous pourrez trouver ces pièces.
                        </p>

                        <?php $_SESSION['etested'] = true; ?>
                        <?php $_SESSION['plancurrent'] = null; ?>

                    <?php else: ?>
                        <p>
                            La porte fermée donne sur une salle d'où, par le hublot, provient une légère lumière rouge.
                            Probablement un système de secours, le premier que vous voyez depuis votre arrivée.<br>
                            <br>
                            Vous vous approchez du hublot, espérant trouver l'objet de votre recherche : la passerelle de commandement.<br>
                            Derrière la vitre, vous devinez une grande pièce avec des ordinateurs et de nombreux fauteuils en cuir.
                            Vous y mettriez votre main à couper : il s'agit là de la pièce que vous cherchez.
                            Vous tentez alors d'ouvrir la porte mais constatez rapidement que le panneau gérant l'ouverture a été arraché violemment.<br>
                            Vous examinez l'étendue des dégâts. Normalement, vous devriez pouvoir le réparer, à condition de trouver des cellules énergétiques pour le remettre en fonction.
                        </p>

                        <?php $_SESSION['etested'] = true; ?>
                        <?php $_SESSION['plancurrent'] = null; ?>
                    <?php endif; ?>

                <?php else: ?>
                    <p>
                        Bien essayé, mais ça ne marchera pas comme ça !
                    </p>

                    <?php $_SESSION['plancurrent'] = null; ?>
                <?php endif; ?>
            </div>
        </div>

        <div id="load">
            <div id="loader"></div>
        </div>

        <script src="/escaperpg/scripts/aventures-chargement.js"></script>

        <?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/gaea1/includes/footer.php"; ?>
    </body>
</html>
