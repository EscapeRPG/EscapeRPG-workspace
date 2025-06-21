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
    <title>Maison de Gaspard - Secrets Familiaux</title>
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
            <?php if (isset($_POST['gaspard'])): ?>
                <?php switch (str_replace($search, $replace, stripslashes($_POST['gaspard']))):
                    case "pellington": ?>
                        <div class="dialogue">
                            <div class="portrait">
                                <img src="/escaperpg/images/secrets/gaspard.png" alt="gaspard">
                            </div>
                            <div class="bulleperso">
                                <p>
                                    Je ne le connais pas vraiment... Je n'ai dû le voir qu'une fois ou deux deux, avant aujourd'hui.<br>
                                    C'est un médecin, il a un cabinet en ville, mais je ne connais pas son adresse.
                                </p>
                            </div>
                        </div>
                    <?php break;
                    case "domestiques": ?>
                        <div class="dialogue">
                            <div class="portrait">
                                <img src="/escaperpg/images/secrets/gaspard.png" alt="gaspard">
                            </div>
                            <div class="bulleperso">
                                <p>
                                    Hum, je suis entré au service de votre oncle il y a 3 ans environ.<br>
                                    Je suis l'un des derniers à être arrivé, mais je crois bien que les autres ne sont pas là depuis bien longtemps avant.
                                </p>
                            </div>
                        </div>
                    <?php break;
                    case "chiens": ?>
                        <div class="dialogue">
                            <div class="portrait">
                                <img src="/escaperpg/images/secrets/gaspard.png" alt="gaspard">
                            </div>
                            <div class="bulleperso">
                                <p>
                                    Des bons <span class="mdp">chiens</span> de garde, j'aimerais pas être leur ennemi.<br>
                                    Je ne sais pas pourquoi, mais ils n'ont jamais eu l'air d'aimer votre oncle.
                                    Ils n'arrêtaient pas de gronder dès qu'ils l'apercevaient, sans vouloir vous manquer de respect.
                                </p>
                            </div>
                        </div>
                    <?php break;
                    case "soucis": ?>
                        <div class="dialogue">
                            <div class="portrait">
                                <img src="/escaperpg/images/secrets/gaspard.png" alt="gaspard">
                            </div>
                            <div class="bulleperso">
                                <p>
                                    J'ai été engagé par votre oncle lorsqu'il a acheté les <span class="mdp">chiens</span>.<br>
                                    Apparemment, il voulait se prémunir contre des rôdeurs.
                                </p>
                            </div>
                        </div>
                        <?php
                        if (!in_array("Chiens", $_SESSION['mdp'])) {
                            $_SESSION['mdp'][] = "Chiens";
                        }
                        break;
                    case "odeur": ?>
                        <div class="dialogue">
                            <div class="portrait">
                                <img src="/escaperpg/images/secrets/gaspard.png" alt="gaspard">
                            </div>
                            <div class="bulleperso">
                                <p>
                                    J'aime pas cette odeur. J'aime pas cet endroit. Sans vouloir vous offenser.<br>
                                    On dirait une odeur de charogne en décomposition. Je sais pas d'où ça peut venir. Sans doute un rat mort dans les murs.<br>
                                    Je ferai venir quelqu'un, vous inquiétez pas.
                                </p>
                            </div>
                        </div>
                    <?php break;
                    case "symbole": ?>
                        <div class="dialogue">
                            <div class="portrait">
                                <img src="/escaperpg/images/secrets/gaspard.png" alt="gaspard">
                            </div>
                            <div class="bulleperso">
                                <p>
                                    Aucune idée de ce que ça signifie.
                                </p>
                            </div>
                        </div>
                    <?php break;
                    case "bureau": ?>
                        <div class="dialogue">
                            <div class="portrait">
                                <img src="/escaperpg/images/secrets/gaspard.png" alt="gaspard">
                            </div>
                            <div class="bulleperso">
                                <p>
                                    Je ne sais pas. Je vis ici et je ne suis pratiquement jamais allé dans le manoir.
                                    Désolé de ne pas pouvoir vous en apprendre plus.
                                </p>
                            </div>
                        </div>
                    <?php break;
                    case "empreintedepas": ?>
                        <div class="dialogue">
                            <div class="portrait">
                                <img src="/escaperpg/images/secrets/gaspard.png" alt="gaspard">
                            </div>
                            <div class="bulleperso">
                                <p>
                                    C'est vous le flic, non ? Je ne vois pas en quoi je pourrais vous aider là-dessus.
                                </p>
                            </div>
                        </div>
                    <?php break;
                    case "nourriture": ?>
                        <div class="dialogue">
                            <div class="portrait">
                                <img src="/escaperpg/images/secrets/gaspard.png" alt="gaspard">
                            </div>
                            <div class="bulleperso">
                                <p>
                                    Non, je viens tout juste de rentrer et je ne suis pas encore allé les nourrir.<br>
                                    Les domestiques n'osent pas s'approcher des bêtes, donc si ce n'est ni eux qui ont donné à manger, ni vous...
                                </p>
                            </div>
                            <br>
                        </div>
                        <p>
                            Soudain, Gaspard blêmit et se rue hors de sa maison pour aller voir les <span class="mdp">chiens</span>.
                        </p>
                    <?php
                        $_SESSION['chiensmal'] = true;
                        unset($_SESSION['intrusion']);
                        break;
                    case "teona": ?>
                        <div class="dialogue">
                            <div class="portrait">
                                <img src="/escaperpg/images/secrets/gaspard.png" alt="gaspard">
                            </div>
                            <div class="bulleperso">
                                <p>
                                    Elle est plutôt gentille, mais nous n'avons presque jamais discuté, vous savez.
                                </p>
                            </div>
                            <br>
                        </div>
                    <?php break;
                    case "monica": ?>
                        <div class="dialogue">
                            <div class="portrait">
                                <img src="/escaperpg/images/secrets/gaspard.png" alt="gaspard">
                            </div>
                            <div class="bulleperso">
                                <p>
                                    Ah, celle-là...<br>
                                    Bon elle est pas méchante, hein, mais si vous ne voulez pas vous retrouver enfermé dans des discussions sans fin,
                                    ne la lancez jamais sur un sujet !
                                </p>
                            </div>
                            <br>
                        </div>
                    <?php break;
                    case "mmenouveau": ?>
                        <div class="dialogue">
                            <div class="portrait">
                                <img src="/escaperpg/images/secrets/gaspard.png" alt="gaspard">
                            </div>
                            <div class="bulleperso">
                                <p>
                                    Ça doit être celle que je croise le plus, mais c'est une femme très austère, ne vous attendez pas à passer de longs moments à bavarder avec.
                                </p>
                            </div>
                            <br>
                        </div>
                    <?php break;
                    default: ?>
                        <div class="dialogue">
                            <div class="portrait">
                                <img src="/escaperpg/images/secrets/gaspard.png" alt="gaspard">
                            </div>
                            <div class="bulleperso">
                                <p>
                                    Je ne vois pas ce que je peux vous dire à ce propos.
                                </p>
                            </div>
                        </div>
                        </p>
                <?php break;
                endswitch; ?>
                <form action="maisongaspard" method="post">
                    <input list="notesListe" name="gaspard">
                    <input type="submit" name="interroger" value="Interroger.">
                </form>
            <?php elseif (isset($_SESSION['intrusion'])): ?>
                <p>
                    Gaspard vient tout juste de revenir de la ville, il est en train de déposer des sacs de courses sur la table de sa cuisine.
                </p>
                <div class="dialogue">
                    <div class="portrait">
                        <img src="/escaperpg/images/secrets/gaspard.png" alt="gaspard">
                    </div>
                    <div class="bulleperso">
                        <p>
                            Je peux vous aider monsieur ?
                        </p>
                    </div>
                </div>
                <form action="maisongaspard" method="post">
                    <input list="notesListe" name="gaspard">
                    <input type="submit" name="interroger" value="Interroger.">
                </form>
            <?php elseif (isset($_SESSION['chiensemp'])): ?>
                <p>
                    Gaspard est toujours au <span class="lieu">chenil</span> pour s'occuper des <span class="mdp">chiens</span> empoisonnés.
                </p>
                <?php
                if (!in_array("Chiens", $_SESSION['mdp'])) {
                    $_SESSION['mdp'][] = "Chiens";
                }
                ?>
            <?php elseif (isset($_SESSION['chiensmalades'])): ?>
                <p>
                    Il semblerait que Gaspard soit au <span class="lieu">chenil</span> avec les <span class="mdp">chiens</span>.
                </p>
                <?php
                if (!in_array("Chiens", $_SESSION['mdp'])) {
                    $_SESSION['mdp'][] = "Chiens";
                }
                ?>
            <?php elseif (isset($_POST['talis'])): ?>
                <script src="/escaperpg/scripts/inventaireadd.js"></script>
                <p>
                    Vous mettez l'étrange objet dans votre poche.
                </p>
                <div class="dialogue">
                    <div class="portrait">
                        <img src="/escaperpg/images/secrets/gaspard.png" alt="gaspard">
                    </div>
                    <div class="bulleperso">
                        <p>
                            C'est un talisman qui se transmet de génération en génération dans ma famille.
                            Il est censé protéger celui qui le détient, il vous a mené à moi pour aider les <span class="mdp">chiens</span> et maintenant il vous portera chance à votre tour.
                        </p>
                    </div>
                </div>
                <p>
                    Vous ne savez pas vraiment si vous croyez à ce que vous a raconté l'homme, mais la joie qui se lit sur son visage vous réchauffe sincèrement le cœur.
                </p>
                <form action="maisongaspard" method="post">
                    <input list="notesListe" name="gaspard">
                    <input type="submit" name="interroger" value="Interroger.">
                </form>
                <?php
                unset($_SESSION['chienssauves']);
                $_SESSION['chienssauvesfin'] = true;
                if (!in_array("talisman", $_SESSION['inventaire'])) {
                    $_SESSION['inventaire'][] = "talisman";
                }
                if (!in_array("Chiens", $_SESSION['mdp'])) {
                    $_SESSION['mdp'][] = "Chiens";
                }
                ?>
            <?php elseif (isset($_SESSION['chienssauves'])): ?>
                <p>
                    Gaspard est en train de fouiller dans un tiroir de sa table de nuit.<br>
                    Il semble y trouver quelque chose et se rapproche de vous.
                </p>
                <div class="dialogue">
                    <div class="portrait">
                        <img src="/escaperpg/images/secrets/gaspard.png" alt="gaspard">
                    </div>
                    <div class="bulleperso">
                        <p>
                            Tenez, ce n'est pas grand chose, mais je tiens à vous le donner pour vous remercier de ce que vous avez fait.
                        </p>
                    </div>
                </div>
                <p>
                    Il vous tend un petit objet de forme ronde, semblant taillé dans de la pierre.<br>
                    Des lignes s'entrecroisent en un dessin complexe que vous ne parvenez pas à analyser correctement.<br>
                </p>
                <div id="enigme">
                    <a href="/escaperpg/images/secrets/talisman.png" rel="lightbox[invent]">
                        <img src="/escaperpg/images/secrets/talisman.png" alt="un étrange talisman confié par gaspard">
                    </a>
                </div>
                <p>
                    Vous tendez la main pour l'attraper et sentez une sorte d'aura étrange en émanant.
                </p>
                <form action="maisongaspard" method="post">
                    <input type="submit" name="talis" value="Ajouter à l'inventaire.">
                </form>
            <?php elseif (isset($_SESSION['chienssauvesfin'])): ?>
                <p>
                    Gaspard semble heureux de vous voir lui rendre visite.
                </p>
                <div class="dialogue">
                    <div class="portrait">
                        <img src="/escaperpg/images/secrets/gaspard.png" alt="gaspard">
                    </div>
                    <div class="bulleperso">
                        <p>
                            Qu'est-ce que je peux faire pour vous, l'ami ?
                        </p>
                    </div>
                </div>
                <form action="maisongaspard" method="post">
                    <input list="notesListe" name="gaspard">
                    <input type="submit" name="interroger" value="Interroger.">
                </form>
            <?php else: ?>
                <p>
                    Gaspard vit dans une petite maison de pierre, juste à côté de la grille d'entrée. Juste derrière elle se trouve le <span class="lieu">chenil</span>.
                </p>
                <form action="maisongaspard" method="post">
                    <input list="notesListe" name="gaspard">
                    <input type="submit" name="interroger" value="Interroger.">
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
