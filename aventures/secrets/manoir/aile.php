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
    <title>Aile des domestiques - Secrets Familiaux</title>
</head>

<body>
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/header.php"; ?>
    <div id="banniere"><img src="/escaperpg/images/secrets/secretsfamiliauxmini.png" alt="secrets familiaux bannière"></div>
    <main>
        <nav>
            <?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/secrets/includes/navAvatar.php"; ?>
            <?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/secrets/includes/navInputs.php"; ?>
            <?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/secrets/includes/navigationmanoir.php"; ?>
        </nav>
        <div id="txt">
            <?php if (isset($_POST['domestiques'])): ?>
                <?php switch (str_replace($search, $replace, stripslashes($_POST['domestiques']))):
                    case "pellington": ?>
                        <div class="dialogue">
                            <div class="portrait">
                                <img src="/escaperpg/images/secrets/domestiques.png" alt="domestiques">
                            </div>
                            <div class="bulleperso">
                                <p>
                                    Oh, je ne le connais pas vraiment, cela ne fait... ne <i>faisait</i> qu'environ 3 ans que nous étions au service de monsieur Deckard.<br>
                                    Je crois d'ailleurs qu'aucun des <span class="mdp">domestiques</span> ne travaille ici depuis beaucoup plus.
                                </p>
                            </div>
                        </div>
                        <?php
                        if (!in_array('Domestiques', $_SESSION['mdp'])) {
                        $_SESSION['mdp'][] = "Domestiques";
                        }
                        break;
                    case "domestiques": ?>
                        <div class="dialogue">
                            <div class="portrait">
                                <img src="/escaperpg/images/secrets/domestiques.png" alt="domestiques">
                            </div>
                            <div class="bulleperso">
                                <p>
                                    Nous avons entendu des rumeurs...<br>
                                    Il paraît que votre oncle renvoyait régulièrement ses domestiques pour en engager de nouveaux, mais nous ne savons pas pourquoi.<br>
                                    <br>
                                    Je ne suis pas sûre que nous nous soyons proprement présentées, d'ailleurs !
                                    Je suis <span class="mdp">Téona</span>, comme je vous l'ai dit lors de la cérémonie.
                                    Voici <span class="mdp">Monica</span> et <span class="mdp">Mme Nouveau</span>.
                                </p>
                            </div>
                        </div>
                        <?php
                        if (!in_array('Téona', $_SESSION['mdp'])) {
                            $_SESSION['mdp'][] = "Téona";
                        }
                        if (!in_array('Monica', $_SESSION['mdp'])) {
                            $_SESSION['mdp'][] = "Monica";
                        }
                        if (!in_array('Mme Nouveau', $_SESSION['mdp'])) {
                            $_SESSION['mdp'][] = "Mme Nouveau";
                        }
                        break;
                    case "teona": ?>
                        <div class="dialogue">
                            <div class="portrait">
                                <img src="/escaperpg/images/secrets/teona.png" alt="teona">
                            </div>
                            <div class="bulleperso">
                                <p>
                                    Votre oncle m'a engagée il y a trois ans.<br>
                                    Au début il était très distant, mais quand il a vu que je m'intéressait beaucoup aux livres de la <span class="lieu">bibliothèque</span>, il s'est mis à me parler un peu plus.<br>
                                    Si vous avez des questions sur les livres qu'il possède, n'hésitez surtout pas à me demander, je connais la plupart !
                                </p>
                            </div>
                        </div>
                        <p>
                            La jeune domestique vous sourit en rougissant légèrement, comme si ce qu'elle venait de vous dire ne convenait pas à une personne de sa condition.
                        </p>
                    <?php break;
                    case "monica": ?>
                        <div class="dialogue">
                            <div class="portrait">
                                <img src="/escaperpg/images/secrets/monica.png" alt="monica">
                            </div>
                            <div class="bulleperso">
                                <p>
                                    Oh, monsieur Bastian ! Je suis tellement navrée pour votre oncle !<br>
                                    J'étais à son service depuis 5 ans maintenant et je connais la maison comme ma poche !<br>
                                    <br>
                                    Je pourrais vous raconter tout un tas d'histoires sur ce lieu si vous le désirez.
                                    Oh, si vous saviez ! Je me souviens d'une fois où votre oncle est rentré en titubant, il devait être fin saoûl ! C'était il y a 3 ou 4 ans je crois, il tenait à peine debout !<br>
                                    Oh mais je parle et je parle et je ne m'arrête pas, désolé d'avoir dit du mal de votre oncle.
                                </p>
                            </div>
                        </div>
                        <p>
                            Vous n'êtes pas sûr de vouloir poursuivre la conversation. La vieille domestique semble friande de ragots et vous risqueriez de vous retrouver bloqué dans des discussions interminables.
                            Vous préférez changer de sujet.
                        </p>
                    <?php break;
                    case "mmenouveau": ?>
                        <div class="dialogue">
                            <div class="portrait">
                                <img src="/escaperpg/images/secrets/mmenouveau.png" alt="madame nouveau">
                            </div>
                            <div class="bulleperso">
                                <p>
                                    Votre oncle m'a engagée il y a peu pour entretenir le jardin. Et il y avait du travail, je peux vous le dire !
                                </p>
                            </div>
                        </div>
                        <p>
                            La femme parle avec un fort accent français et ne semble pas particulièrement ouverte à la discussion. Vous n'insistez pas.
                        </p>
                    <?php break;
                    case "gaspard": ?>
                        <div class="dialogue">
                            <div class="portrait">
                                <img src="/escaperpg/images/secrets/teona.png" alt="teona">
                            </div>
                            <div class="bulleperso">
                                <p>
                                    Monsieur Bradley est arrivé en même temps que moi. Votre oncle l'avait engagé lorsqu'il a décidé d'acheter des chiens pour protéger le domaine.<br>
                                    C'est un homme bon, je crois, mais il vit principalement dans la petite maison au fond du jardin, nous le voyons assez rarement.
                                </p>
                            </div>
                        </div>
                    <?php break;
                    case "soucis": ?>
                        <div class="dialogue">
                            <div class="portrait">
                                <img src="/escaperpg/images/secrets/domestiques.png" alt="domestiques">
                            </div>
                            <div class="bulleperso">
                                <p>
                                    Depuis une semaine environ, des individus semblent rôder autour de la maison, la nuit venue.<br>
                                    Nous les avons empêchés d'entrer pour le moment, mais nous craignons qu'ils ne forcent l'entrée si nous laissons la maison sans surveillance.
                                    C'est pour cela que nous préférons rester dormir ici plutôt que de rentrer chez nous le soir.
                                    J'espère que vous n'y voyez pas d'inconvénient ?
                                </p>
                            </div>
                        </div>
                    <?php break;
                    case "odeur": ?>
                        <div class="dialogue">
                            <div class="portrait">
                                <img src="/escaperpg/images/secrets/domestiques.png" alt="domestiques">
                            </div>
                            <div class="bulleperso">
                                <p>
                                    Cette odeur se fait sentir depuis quelques jours. Nous ne savons pas d'où elle provient mais elle est plus forte à la <span class="lieu">cave</span>, semble-t-il.<br>
                                    Nous avons pensé à une <span class="mdp">fuite</span> d'eau quelque part derrière un mur qui aurait entraîné de la moisissure. Il faut que Gaspard s'en occupe.
                                </p>
                            </div>
                        </div>
                        <?php
                        if (!in_array('Fuite', $_SESSION['mdp'])) {
                            $_SESSION['mdp'][] = 'Fuite';
                        }
                        break;
                    case "symbole": ?>
                        <div class="dialogue">
                            <div class="portrait">
                                <img src="/escaperpg/images/secrets/teona.png" alt="teona">
                            </div>
                            <div class="bulleperso">
                                <p>
                                    Je ne sais pas ce que ça représente.<br>
                                    Votre oncle s'intéressait à tout ce qui touche à l'occulte. Il doit avoir quelques livres à ce sujet dans la <span class="lieu">bibliothèque</span>.
                                </p>
                            </div>
                        </div>
                    <?php break;
                    case "bureau": ?>
                        <div class="dialogue">
                            <div class="portrait">
                                <img src="/escaperpg/images/secrets/domestiques.png" alt="domestiques">
                            </div>
                            <div class="bulleperso">
                                <p>
                                    Votre oncle y passait beaucoup de temps, surtout ces derniers temps, mais il nous interdisait l'accès.<br>
                                    J'ai entendu dire que la seule personne qu'il autorisait à entrer était l'un de ses amis, mais ils se sont fâchés il y a de cela plusieurs années et personne d'autre que votre oncle n'y a depuis mis les pieds.<br>
                                    <br>
                                    Il arrivait fréquemment que des <span class="mdp">coupures de courant</span> surviennent lorsqu'il s'y trouvait.
                                </p>
                            </div>
                        </div>
                        <?php
                        if (!in_array('Coupures de courant', $_SESSION['mdp'])) {
                            $_SESSION['mdp'][] = 'Coupures de courant';
                        }
                        break;
                    case "coupuresdecourant": ?>
                        <div class="dialogue">
                            <div class="portrait">
                                <img src="/escaperpg/images/secrets/domestiques.png" alt="domestiques">
                            </div>
                            <div class="bulleperso">
                                <p>
                                    Oui, le courant se coupait souvent lorsque votre oncle travaillait dans son bureau.<br>
                                    Il devait le réparer comme il pouvait car la lumière revenait peu de temps après, mais le système ne doit pas être parfait vu que cela se reproduisait peu après.<br>
                                    <br>
                                    Vous pensez que vous pourriez corriger ça ?
                                    De toute façon, il avait dû installer le boîtier d'alimentation dans son bureau pour pouvoir le réparer directement, car nous n'avons jamais vu d'autre boîtier ailleurs.
                                </p>
                            </div>
                        </div>
                    <?php break;
                    case "tableau": ?>
                        <div class="dialogue">
                            <div class="portrait">
                                <img src="/escaperpg/images/secrets/domestiques.png" alt="domestiques">
                            </div>
                            <div class="bulleperso">
                                <p>
                                    En effet, il y avait bien un tableau au-dessus de la cheminée, mais votre oncle l'a détruit il y a quelques semaines.<br>
                                    Je crois savoir qu'il a jeté les <span class="mdp">restes</span> à la <span class="lieu">cave</span>.
                                </p>
                            </div>
                        </div>
                        <?php
                        if (!in_array('Restes', $_SESSION['mdp'])) {
                            $_SESSION['mdp'][] = 'Restes';
                        }
                        break;
                    case "opusfavori": ?>
                        <div class="dialogue">
                            <div class="portrait">
                                <img src="/escaperpg/images/secrets/teona.png" alt="teona">
                            </div>
                            <div class="bulleperso">
                                <p>
                                    Votre oncle et moi avons plusieurs fois discuté des livres qu'il possède dans sa bibliothèque.<br>
                                    Il m'a une fois avoué que l'un de ceux qui l'avait le plus marqué était le <span class="mdp">Magna Mater</span>.
                                    Peut-être est-ce celui que vous recherchez ?
                                </p>
                            </div>
                        </div>
                        <?php
                        if (!in_array('Magna Mater', $_SESSION['mdp'])) {
                            $_SESSION['mdp'][] = 'Magna Mater';
                        }
                        break;
                    default: ?>
                        <div class="dialogue">
                            <div class="portrait">
                                <img src="/escaperpg/images/secrets/domestiques.png" alt="domestiques">
                            </div>
                            <div class="bulleperso">
                                <p>
                                    Désolé, monsieur Bastian, mais je ne vois pas en quoi nous pouvons vous aider à ce propos.
                                </p>
                            </div>
                        </div>
                <?php endswitch; ?>
            <?php else: ?>
                <p>
                    C'est ici que dorment les domestiques.<br>
                    Lorsque vous leur demandez pourquoi ils ne rentrent pas chez eux, ils vous disent qu'ils préfèrent rester pour le moment afin de vous aider dans vos tâches.<br>
                    <br>
                    Vous sentez qu'ils ne vous disent pas tout.
                </p>
            <?php endif; ?>
            <form action="aile" method="post">
                <input list="notesListe" name="domestiques">
                <datalist id="notesListe"></datalist>
                <input type="submit" name="interroger" value="Interroger.">
            </form>
        </div>
    </main>
    <div id="load">
        <div id="loader"></div>
    </div>
    <script src="/escaperpg/scripts/aventures-chargement.js"></script>
    <script src="/escaperpg/scripts/updateDataList.js"></script>
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/secrets/includes/footer.php"; ?>
</body>

</html>
