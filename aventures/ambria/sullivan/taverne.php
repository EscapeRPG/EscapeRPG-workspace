<?php
include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/entete.php";
$indices = "/escaperpg/includes/indices.php";
?>
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
    <title>La Taverne - Le Trésor d'Ambria</title>
</head>

<body>
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/header.php"; ?>
    <div id="banniere"><img src="/escaperpg/images/ambria/tresorambriamini.png" alt="le trésor d'ambria"></div>
    <main>
        <?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/ambria/includes/nav-sullivan.php"; ?>
        <div id="txt">
            <?php if (isset($_SESSION['ambriabibliotheque'])): ?>
                <?php if (isset($_POST['discuter'])): ?>
                    <?php if (str_replace($search, $replace, stripslashes($_POST['loganreponse'])) == "quietesvous"): ?>
                        <audio src="/escaperpg/sons/ambria/epeeposee.mp3" autoplay></audio>
                        <p>
                            Vous attrapez une chaise et vous asseyez en face de lui.
                        </p>
                        <div class="dialogue">
                            <div class="bulleperso2">
                                <p>
                                    Alors tu n'as pas entendu parler de moi ?
                                    Le Capitaine Sullivan Mason, ça te parle ?<br>
                                    <br>
                                    Mais peu importe, tu as quelque chose que je recherche, et je ne suis pas du genre patient.
                                    Donne-moi le parchemin.
                                </p>
                            </div>
                            <div class="portrait2">
                                <img src="/escaperpg/images/ambria/sullivanmasonmini.png" alt="capitaine sullivan mason">
                            </div>
                        </div>
                        <div class="dialogue">
                            <div class="portrait">
                                <img src="/escaperpg/images/ambria/loganbarthelemymini.png" alt="logan barthélémy">
                            </div>
                            <div class="bulleperso">
                                <p>
                                    Le Capitaine... ?<br>
                                    Je... Je ne vois pas de quoi vous voulez parler !
                                </p>
                            </div>
                        </div>
                        <p>
                            Vous vous penchez en avant. Vous avez déjà passé trop de temps sur ce maudit caillou à la recherche de ce papier.<br>
                            Vous tirez votre lame au clair et la posez violemment sur la table, faisant sursauter votre interlocuteur.
                        </p>
                        <div class="dialogue">
                            <div class="bulleperso2">
                                <p>
                                    J'ai pas le temps de jouer, gamin.
                                    Tu sais très bien de quoi je parle.
                                </p>
                            </div>
                            <div class="portrait2">
                                <img src="/escaperpg/images/ambria/sullivanmasonmini.png" alt="capitaine sullivan mason">
                            </div>
                        </div>
                        <form action="embrouilles" method="post">
                            <input type="submit" name="suite" value="Suivant.">
                        </form>
                    <?php else: ?>
                        <p>
                            Ça ne semble pas être ça. Peut-être devez-vous attendre une information de la part de ce jeune homme, incarné par l'autre joueur ?<br>
                            <br>
                            Vous vous approchez de la table à laquelle un jeune homme à l'air paniqué s'est installé.<br>
                            Ce dernier regarde dans toutes les directions, tel un animal apeuré.<br>
                            <br>
                            En arrivant au niveau de la table, vous jetez la bourse qui atterrit juste devant lui en déversant un peu de son contenu.
                        </p>
                        <div class="dialogue">
                            <div class="bulleperso2">
                                <p>
                                    <span class="mdp2">C'est à toi je crois</span>.
                                </p>
                            </div>
                            <div class="portrait2">
                                <img src="/escaperpg/images/ambria/sullivanmasonmini.png" alt="capitaine sullivan mason">
                            </div>
                        </div>
                        <p>
                            Vous attendez de voir sa réaction, tout en affichant votre célèbre sourire de prédateur.
                        </p>
                        <form action="taverne" method="post">
                            <input list="notesListe" name="loganreponse">
                            <input type="submit" name="discuter" value="Discuter.">
                        </form>
                        <form action="taverne" method="post">
                            <button type="submit" name="indice3" class="boutonindice"></button>
                        </form>
                        <?php
                        $reponse = "Entrez le mot de passe \"qui êtes-vous\".";
                        $indice1 = "Qu'est-ce que le jeune homme vous a répondu ?";
                        $indice2 = "N'hésitez pas à lui poser la question à nouveau s'il ne vous a pas répondu.";
                        $indice3 = "C'est à l'autre joueur de vous donner le bon mot de passe.";
                        include $_SERVER['DOCUMENT_ROOT'] . $indices;
                        ?>
                    <?php endif; ?>
                <?php elseif (isset($_POST['tavernlogan']) || isset($_SESSION['rencontre'])): ?>
                    <?php if (!isset($_SESSION['rencontre'])) {
                        include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/resetIndices.php";
                    }
                    ?>
                    <audio src="/escaperpg/sons/ambria/boursejetee.mp3" autoplay></audio>
                    <p>
                        Vous vous approchez de la table à laquelle un jeune homme à l'air paniqué s'est installé.<br>
                        Ce dernier regarde dans toutes les directions, tel un animal apeuré.<br>
                        <br>
                        En arrivant au niveau de la table, vous jetez la bourse qui atterrit juste devant lui en déversant un peu de son contenu.
                    </p>
                    <div class="dialogue">
                        <div class="bulleperso2">
                            <p>
                                <span class="mdp2">C'est à toi je crois</span>.
                            </p>
                        </div>
                        <div class="portrait2">
                            <img src="/escaperpg/images/ambria/sullivanmasonmini.png" alt="capitaine sullivan mason">
                        </div>
                    </div>
                    <p>
                        Vous attendez de voir sa réaction, tout en affichant votre célèbre sourire de prédateur.
                    </p>
                    <form action="taverne" method="post">
                        <input list="notesListe" name="loganreponse">
                        <input type="submit" name="discuter" value="Discuter.">
                    </form>
                    <?php
                    if (!in_array("C'est à toi je crois", $_SESSION['mdp'])) {
                        $_SESSION['mdp'][] = "C'est à toi je crois";
                    }
                    $reponse = "Entrez le mot de passe \"qui êtes-vous\".";
                    $indice1 = "Qu'est-ce que le jeune homme vous a répondu ?";
                    $indice2 = "N'hésitez pas à lui poser la question à nouveau s'il ne vous a pas répondu.";
                    $indice3 = "C'est à l'autre joueur de vous donner le bon mot de passe.";
                    include $_SERVER['DOCUMENT_ROOT'] . $indices;
                    $_SESSION['rencontre'] = true;
                    ?>
                <?php else: ?>
                    <audio src="/escaperpg/sons/ambria/taverne.mp3" autoplay></audio>
                    <div id="enigmelieu">
                        <img src="/escaperpg/images/ambria/taverne.png" alt="la taverne de l'île de la tortue">
                        <div id="tavlogan">
                            <form action="taverne" method="post">
                                <button type="submit" name="tavernlogan">
                                    <img src="/escaperpg/images/ambria/tavernelogan.png" alt="un jeune homme à l'air terrifié">
                                </button>
                            </form>
                        </div>
                    </div>
                    <p>
                        Vous entrez dans la taverne et avisez les différentes personnes présentes, à la recherche de quelqu'un qui pourrait sembler anxieux.
                    </p>
                    <?php
                    $reponse = "Cliquez sur le jeune homme qui est assis à la table au fond à gauche, avec la chemise bleue.";
                    $indice1 = "Essayez de repérer la personne que recherche Sullivan et de cliquer dessus.";
                    $indice2 = "Cherchez quelqu'un qui dénote dans le décor.";
                    $indice3 = "Quelqu'un qui n'a pas pu prendre de verre, vu que c'est vous qui avez sa bourse.";
                    include $_SERVER['DOCUMENT_ROOT'] . $indices;
                    ?>
                <?php endif; ?>
            <?php else: ?>
                <?php if (isset($_POST['don'])): ?>
                    <?php switch (str_replace($search, $replace, stripslashes($_POST['don']))):
                        case "vieuxtype": ?>
                            <?php if ($_SESSION['ambriapaul']): ?>
                                <div class="dialogue">
                                    <div class="portrait">
                                        <img src="/escaperpg/images/ambria/don.png" alt="don">
                                    </div>
                                    <div class="bulleperso">
                                        <p>
                                            Alors, il vous a raconté quelque chose d'intéressant ?<br>
                                            <br>
                                            Désolé si ça n'est pas le cas, mais je ne vous redonnerai pas de whisky gratuitement encore une fois,
                                            n'abusez pas de ma gentillesse pour un pauvre hère !
                                        </p>
                                    </div>
                                </div>
                                <form action="taverne" method="post">
                                    <input list="notesListe" name="don">
                                    <input type="submit" name="demander" value="Demander.">
                                </form>
                            <?php else: ?>
                                <div class="dialogue">
                                    <div class="portrait">
                                        <img src="/escaperpg/images/ambria/don.png" alt="don">
                                    </div>
                                    <div class="bulleperso">
                                        <p>
                                            Ah, oui ! C'est le vieux Paul !<br>
                                            Pas un mauvais bougre, mais vous ne pourrez rien tirer de lui tant qu'il n'a pas eu sa dose de whisky.
                                            Je l'aime bien, ce vieux loup de mer.
                                            Tenez, vous n'avez qu'à lui en apporter un peu, c'est pour moi.
                                        </p>
                                    </div>
                                </div>
                                <p>
                                    Il vous tend une bouteille avec un <span class="mdp">fond de whisky</span> de piètre qualité, à moitié vide.
                                </p>
                                <div id="enigme">
                                    <a href="/escaperpg/images/ambria/fonddewhisky.png" rel="lightbox[invent]"><img src="/escaperpg/images/ambria/fonddewhisky.png" alt="un fond de whisky"></a>
                                </div>
                                <form action="taverne" method="post">
                                    <input type="submit" name="add" value="Prendre.">
                                </form>
                                <?php if (!in_array('Fond de whisky', $_SESSION['mdp'])) {
                                    $_SESSION['mdp'][] = "Fond de whisky";
                                }
                                ?>
                            <?php endif; ?>
                        <?php
                            break;
                        case "louis":
                        ?>
                            <div class="dialogue">
                                <div class="portrait">
                                    <img src="/escaperpg/images/ambria/don.png" alt="don">
                                </div>
                                <div class="bulleperso">
                                    <p>
                                        Louis ? Ah non, j'ai aucun Louis qui bosse ici.<br>
                                        <br>
                                        Vous parlez sans doute plutôt du Louis qui bosse à la bibliothèque ?
                                    </p>
                                </div>
                            </div>
                            <form action="taverne" method="post">
                                <input list="notesListe" name="don">
                                <input type="submit" name="demander" value="Demander.">
                            </form>
                        <?php
                            break;
                        case "don":
                        ?>
                            <div class="dialogue">
                                <div class="portrait">
                                    <img src="/escaperpg/images/ambria/don.png" alt="don">
                                </div>
                                <div class="bulleperso">
                                    <p>
                                        C'est bien moi, oui ! Vous vouliez quelque chose ?
                                    </p>
                                </div>
                            </div>
                            <form action="taverne" method="post">
                                <input list="notesListe" name="don">
                                <input type="submit" name="demander" value="Demander.">
                            </form>
                        <?php
                            break;
                        default:
                        ?>
                            <div class="dialogue">
                                <div class="portrait">
                                    <img src="/escaperpg/images/ambria/don.png" alt="don">
                                </div>
                                <div class="bulleperso">
                                    <p>
                                        Hum... Je vois pas bien en quoi je peux vous aider à ce propos.<br>
                                        <br>
                                        Vous voulez autre chose ?
                                    </p>
                                </div>
                            </div>
                            <form action="taverne" method="post">
                                <input list="notesListe" name="don">
                                <input type="submit" name="demander" value="Demander.">
                            </form>
                    <?php
                            break;
                    endswitch;
                    ?>
                <?php elseif (isset($_POST['add'])): ?>
                    <p>
                        <script src="/escaperpg/scripts/inventaireadd.js"></script>
                        Vous prenez la bouteille avec vous.<br>
                    </p>
                    <div class="dialogue">
                        <div class="portrait">
                            <img src="/escaperpg/images/ambria/don.png" alt="don">
                        </div>
                        <div class="bulleperso">
                            <p>
                                Je peux faire autre chose pour vous ?
                            </p>
                        </div>
                    </div>
                    <form action="taverne" method="post">
                        <input list="notesListe" name="don">
                        <input type="submit" name="demander" value="Demander.">
                    </form>
                    <?php if (!in_array('ambriawhisky', $_SESSION['inventaire'])) {
                        $_SESSION['inventaire'][] = 'ambriawhisky';
                    }
                    ?>
                <?php else: ?>
                    <audio src="/escaperpg/sons/ambria/taverne.mp3" autoplay></audio>
                    <p>
                        En approchant de la taverne, vous entendez les rires et les chants des hommes à l'intérieur.
                        C'est un lieu particulièrement agité et bruyant, vous aimez cette ambiance.<br>
                        <br>
                        Le patron du bar se tient derrière le comptoir. C'est un grand type au ventre rebondi.<br>
                        Il vous regarde alors que vous approchez.
                    </p>
                    <div class="dialogue">
                        <div class="portrait">
                            <img src="/escaperpg/images/ambria/don.png" alt="don">
                        </div>
                        <div class="bulleperso">
                            <p>
                                Je vous souhaite bien le bonjour ! Qu'est-ce qu'y vous faut ?
                            </p>
                        </div>
                    </div>
                    <form action="taverne" method="post">
                        <input list="notesListe" name="don">
                        <input type="submit" name="demander" value="Demander.">
                    </form>
                    <?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/resetIndices.php"; ?>
                <?php endif; ?>
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
