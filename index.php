<?php session_start();
ini_set("safe_mode", "off"); ?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <script type="text/javascript" src="/escaperpg/lightbox/js/prototype.js"></script>
    <script type="text/javascript" src="/escaperpg/lightbox/js/scriptaculous.js?load=effects,builder"></script>
    <script type="text/javascript" src="/escaperpg/lightbox/js/lightbox.js"></script>
    <link rel="stylesheet" href="/escaperpg/lightbox/css/lightbox.css" type="text/css" media="screen">
    <link rel="stylesheet" href="/escaperpg/css/style.css">
    <link href="https://escaperpg.com/images/partage.png" rel="image_src">
    <meta charset="utf-8">
    <meta name="keywords" CONTENT="syrphin, emilien, francois, françois, escape, game, room, jdr, rpg, jeu, énigme, enigme, réflexion, reflexion, jeu, rôle, role" />
    <title>EscapeRPG</title>
</head>

<body onload="chargement()">
    <div id="bloc_page">
        <?php include_once $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/incmembers.php"; ?>
        <nav>
            <div class="accueil"><a href="#bloc1"><img src="/escaperpg/images/home.png" id="accueilLink" alt="accueil"></a></div><br>
            <div class="accueil"><a href="#bloc2"><img src="/escaperpg/images/aventuresnav.png" id="aventuresLink" alt="lien aventures"></a></div><br>
            <div class="accueil"><a href="#bloc3"><img src="/escaperpg/images/reglesnav.png" id="reglesLink" alt="lien règles"></a></div><br>
            <div class="accueil"><a href="#bloc4"><img src="/escaperpg/images/liensnav.png" id="liensLink" alt="liens"></a></div>
        </nav>
        <div class="banner">
            <div class="banniere">
                <img src="/escaperpg/images/banniere.png" id="bann" alt="bannière">
                <div class="bannierep">
                    <div class="type1">Prenez part à des histoires passionnantes et mystérieuses,</div>
                </div><br>
                <div class="bannierep">
                    <div class="type2">dont <span class="vos">VOS</span> choix détermineront l'issue.</div>
                </div>
                <a href="#bloc1"><img src="/escaperpg/images/next.png" id="enterSite" alt="entrer"></a>
            </div>
        </div>
        <div id="bloc1">
            <div class="jouer">
                <div class="dialogue">
                    <div class="portrait"><img src="/escaperpg/images/narrateur.png" alt="narrateur"></div>
                    <div class="bulleperso">
                        <p>
                            Bien le bonjour !<br>
                            Je suis le Narrateur et je vous souhaite la bienvenue par ici !<br>
                            <br>
                            Installez-vous confortablement, j'ai tout un tas d'histoires à vous raconter.<br>
                            Attention toutefois, celles-ci sont un peu... spéciales !<br>
                            <br>
                            Pour espérer en connaître leur dénouement, vous devrez vous-même incarner leurs protagonistes afin de les mener vers une fin heureuse...
                            Du moins, je l'espère pour vous !<br>
                            <br>
                            Enfilez votre costume, chargez vos armes et, surtout, affûtez votre esprit pour vous en tirer lors de vos aventures.
                        </p>
                    </div>
                </div>
            </div>
            <div class="cardalign">
                <div class="card">
                    <div class="cardfond">
                        <h2>ESCAPERPG, C'EST QUOI ?</h2>
                        <div class="cardimage"><img src="/escaperpg/images/escaperpgcard.png" alt="découvrir"></div>
                        <p>
                            EscapeRPG est un jeu où vous pourrez vivre des histoires en incarnant directement leur personnage principal.<br>
                            <br>
                            Il vous faudra explorer les lieux qui vous sont présentés pour trouver des indices et avancer dans l'histoire,
                            car vous serez parfois confronté à des événements où vous devrez faire preuve de logique et de réflexion pour espérer vous en sortir.
                        </p>
                    </div>
                </div>
                <div class="card">
                    <div class="cardfond">
                        <h2>MATÉRIEL NÉCESSAIRE</h2>
                        <div class="cardimage"><img src="/escaperpg/images/de.png" alt="dés"></div>
                        <p>
                            Pour jouer l'une des aventures d'EscapeRPG, vous n'avez besoin que de 3 choses :<br>
                            <br>
                            - Un <b>ordinateur</b> muni d'une connexion internet. Pour les scénarios multijoueurs, il sera nécessaire de posséder plusieurs ordinateurs ayant accès à internet.<br>
                            - Des <b>feuilles de papier</b>, un <b>carnet</b> ou n'importe quel <b>logiciel éditeur de texte</b> pour prendre des notes lors de vos enquêtes.<br>
                            - D'un peu de <b>temps</b> devant vous. Les différents scénarios sont assez complets et demandent parfois <b>plusieurs heures</b> pour être résolus.<br>
                            <br>
                            Vous avez réuni tous ces éléments ? Dans ce cas, installez-vous confortablement dans votre fauteuil et lancez-vous dans l'aventure !<br>
                        </p>
                    </div>
                </div>
                <div class="card">
                    <div class="cardfond">
                        <h2>PREMIÈRE AVENTURE ?</h2>
                        <div class="cardimage"><img src="/escaperpg/images/epee.png" alt="aventurier novice"></div>
                        <p>
                            Si c'est la première fois que vous venez sur EscapeRPG, il vous est fortement recommandé de prendre connaissance des quelques <a href="#bloc3">règles du jeu</a> pour mieux appréhender ce qui vous attend par la suite.<br>
                            <br>
                            Une fois que ce sera fait, vous devriez commencer par jouer le <a href="/escaperpg/aventures/lastparty/index.php">scénario de découverte</a> !
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div id="bloc2"><?php include_once $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/aventures.php"; ?></div>
        <div id="bloc3"><?php include_once $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/regles.php"; ?></div>
        <div id="bloc4"><?php include_once $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/liens.php"; ?></div>
    </div>
    <div id="load">
        <div id="loader"></div>
    </div>
    <script src="/escaperpg/scripts/animations.js"></script>
    <script src="/escaperpg/scripts/chargement.js"></script>
    <?php include_once $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/footer.php"; ?>
</body>

</html>
