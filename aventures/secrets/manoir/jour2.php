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
    <title>Seconde journée - Secrets Familiaux</title>
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
                <div class="dialogue">
                    <div class="portrait">
                        <img src="/escaperpg/images/secrets/gaspard.png" alt="gaspard">
                    </div>
                    <div class="bulleperso">
                        <p>
                            Les <span class="mdp">chiens</span> ont repéré un rôdeur autour de la maison.
                            Il semble avoir eu le temps de s'enfuir avant que je n'arrive, j'ai seulement eu le temps de voir une voiture s'éloigner.<br>
                            Cela fait plusieurs fois depuis la mort de votre oncle, sans doute quelqu'un voulant en profiter pour voler des objets de valeur.
                        </p>
                    </div>
                </div>
                <form action="jour2" method="post">
                    <input list="notesListe" name="nuit">
                    <input type="submit" name="interroger" value="Interroger.">
                    <br>
                    <input type="submit" name="dormir2" value="Retourner dormir.">
                </form>
                <?php
                if (!in_array("Chiens", $_SESSION['mdp'])) {
                    $_SESSION['mdp'][] = "Chiens";
                }
                ?>
            <?php elseif (isset($_POST['nuit'])): ?>
                <?php switch (str_replace($search, $replace, stripslashes($_POST['nuit']))):
                    case "voituregrise": ?>
                        <div class="dialogue">
                            <div class="portrait">
                                <img src="/escaperpg/images/secrets/gaspard.png" alt="gaspard">
                            </div>
                            <div class="bulleperso">
                                <p>
                                    Effectivement, je crois bien que c'était une voiture grise. Vous savez de qui il peut s'agir ?
                                </p>
                            </div>
                        </div>
                    <?php break;
                    case "pellington": ?>
                        <div class="dialogue">
                            <div class="portrait">
                                <img src="/escaperpg/images/secrets/gaspard.png" alt="gaspard">
                            </div>
                            <div class="bulleperso">
                                <p>
                                    Allons, le médecin ?<br>
                                    Je ne vois vraiment pas ce qu'il ferait ici. Votre oncle et lui s'étaient disputés, mais ce n'est pas un mauvais bougre, je le vois mal rôder près des maisons en pleine nuit.<br>
                                    Vous devriez retourner dormir, je me charge de surveiller les environs au cas où quelqu'un reviendrait.
                                </p>
                            </div>
                        </div>
                    <?php break;
                    default: ?>
                        <div class="dialogue">
                            <div class="portrait">
                                <img src="/escaperpg/images/secrets/gaspard.png" alt="gaspard">
                            </div>
                            <div class="bulleperso">
                                <p>
                                    Vous êtes sûr que tout va bien ? Vous semblez fatigué et je ne vois pas où vous voulez en venir avec ça.
                                </p>
                            </div>
                        </div>
                <?php break;
                endswitch; ?>
                <form action="jour2" method="post">
                    <input list="notesListe" name="nuit">
                    <input type="submit" name="interroger" value="Interroger.">
                    <br>
                    <input type="submit" name="dormir2" value="Retourner dormir.">
                </form>
            <?php elseif (isset($_POST['enqueter'])): ?>
                <p>
                    En faisant le tour du jardin, vous finissez par remarquer une <span class="mdp">empreinte de pas</span>.<br>
                    Il s'agit d'une trace de chaussure de taille 40, sans doute laissée par un homme de faible corpulence.<br>
                    <br>
                    Vous ne trouvez rien d'autre pour le moment et décidez de remettre ça à plus tard. Gaspard veillera à ce que rien d'autre ne se passe cette nuit.
                </p>
                <form action="jour2" method="post">
                    <input type="submit" name="dormir2" value="Retourner dormir.">
                </form>
                <?php
                if (!in_array("Empreinte de pas", $_SESSION['mdp'])) {
                    $_SESSION['mdp'][] = "Empreinte de pas";
                }
                ?>
            <?php elseif (isset($_POST['dormir2'])): ?>
                <p>
                    Après la nuit mouvementée, vous avez eu du mal à vous lever et n'avez pas réussi à faire beaucoup de choses dans la matinée.<br>
                    <br>
                    Le midi venu, alors que vous êtes à table, vous entendez les <span class="mdp">chiens</span> aboyer au fond du jardin.<br>
                    Gaspard étant parti en ville faire quelques courses, les animaux sont restés dans le chenil.<br>
                    <br>
                    Vous décidez d'aller voir pour les calmer mais ils continuent d'aboyer comme si... quelqu'un essayait de s'introduire chez vous !
                </p>
                <form action="jour2" method="post">
                    <input type="submit" name="suivant2" value="Suivant.">
                </form>
                <?php
                $_SESSION['jour'] = true;
                if (!in_array("Chiens", $_SESSION['mdp'])) {
                    $_SESSION['mdp'][] = "Chiens";
                }
                ?>
            <?php elseif (isset($_POST['suivant2'])): ?>
                <audio src="/sons/secrets/chiensdehors.mp3" autoplay></audio>
                <audio src="/sons/secrets/voiturepart.mp3" autoplay></audio>
                <p>
                    Vous revenez aussi vite que possible dans la maison et commencez à fouiller partout, mais n'apercevez personne.<br>
                    Vous vous dirigez à nouveau vers le jardin pour inspecter lorsque vous entendez au loin un bruit de moteur s'éloignant.<br>
                    <br>
                    Manifestement, l'intrus n'a pas réussi à entrer dans la maison grâce à votre vigilance.
                </p>
                <form action="jour2" method="post">
                    <input type="submit" name="suivant3" value="Suivant.">
                </form>
            <?php elseif (isset($_POST['suivant3'])): ?>
                <p>
                    Vous retournez dans la salle à manger pour finir votre repas, mais quelque chose vous dérange.
                </p>
                <div id="enigmelieu">
                    <img src="/escaperpg/images/secrets/salleamanger.png" alt="salle à manger">
                    <div id="fenetre">
                        <form action="intrusion" method="post">
                            <button type="submit" name="fenetreopened">
                                <img src="/escaperpg/images/secrets/buttonfenetre.png" alt="la fenêtre de la salle à manger">
                            </button>
                        </form>
                    </div>
                </div>
            <?php else: ?>
                <audio src="/sons/secrets/chiensdehors.mp3" autoplay></audio>
                <p>
                    En plein milieu de la nuit, vous êtes réveillé par des aboiements de <span class="mdp">chiens</span> au dehors.<br>
                    En regardant par la fenêtre, vous voyez Gaspard dans le jardin, lampe torche à la main, en train de patrouiller.<br>
                    <br>
                    Vous vous dépêchez d'enfiler une robe de chambre et de le rejoindre.
                </p>
                <form action="jour2" method="post">
                    <input type="submit" name="suivant" value="Suivant.">
                </form>
                <?php
                if (!in_array("Chiens", $_SESSION['mdp'])) {
                    $_SESSION['mdp'][] = "Chiens";
                }
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
