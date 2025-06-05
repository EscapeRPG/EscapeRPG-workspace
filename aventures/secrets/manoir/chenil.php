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
    <title>Chenil - Secrets Familiaux</title>
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
            <?php if (isset($_SESSION['intrusion'])): ?>
                <p>
                    Vous décidez d'aller voir les chiens.<br>
                    <br>
                    À votre arrivée, vous êtes étonné de voir que ceux-ci semblent bien plus calmes que d'habitude.
                    Ils sont calmement allongés au fond de leurs cages.<br>
                    Au niveau de l'entrée de chacune d'elles se trouve une gamelle presque pleine de viande.
                    Vous trouvez un peu étrange que les chiens aient à peine touché à leur <span class="mdp">nourriture</span>.
                </p>
                <?php if (!in_array('Nourriture', $_SESSION['mdp'])) {
                    $_SESSION['mdp'][] = 'Nourriture';
                }
                ?>
            <?php elseif (isset($_SESSION['chiensmal'])): ?>
                <p>
                    Vous rejoignez Gaspard dans le chenil.
                    Il a ouvert la cage et est accroupi près des chiens, toujours allongés.<br>
                    <br>
                    Vous les entendez gémir.
                </p>
                <div class="dialogue">
                    <div class="portrait">
                        <img src="/escaperpg/images/secrets/gaspard.png" alt="gaspard">
                    </div>
                    <div class="bulleperso">
                        <p>
                            Bon sang, ils sont empoisonnés !<br>
                            Je ne sais pas si c'est grave ou non, mais je vais m'occuper d'eux.
                            Si vous avez un antidote, je vous en serais éternellement reconnaissant.
                        </p>
                    </div>
                </div>
                <p>
                    Sur ces mots, Gaspard reporte son attention sur les chiens et ne semble pas avoir envie de vous parler.<br>
                    <br>
                    Vous décidez de repartir.
                </p>
                <?php
                unset($_SESSION['intrusion']);
                unset($_SESSION['chiensmalades']);
                unset($_SESSION['chiensmal']);
                $_SESSION['chiensemp'] = true;
                ?>
            <?php elseif (isset($_SESSION['chiensemp']) || isset($_SESSION['chiensmalades'])): ?>
                <?php if (isset($_POST['antidote']) && str_replace($search, $replace, stripslashes($_POST['antidote'])) == "analeptique"): ?>
                    <div id="succespopup">
                        <?php
                        $nouveausucces = '<img src="/escaperpg/images/succes/secrets/chiens.png"><span><u><b>Vétérinaire</b></u><br>Sauver les chiens de l\'empoisonnement !</span>';
                        $scenario = 'secrets';
                        $description = 'chiens';
                        $cache = 'oui';
                        $rarete = 'succesgold';
                        include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/succesadd.php";
                        ?>
                    </div>
                    <p>
                        Vous tendez le flacon à Gaspard qui l'examine d'un air soupçonneux, mais il finit par en verser un peu dans la gueule de chacun des chiens.<br>
                        Après de longues minutes d'attente, ils commencent à ouvrir les yeux et leur respiration se fait un peu plus naturelle.<br>
                        Il faudra encore un peu de temps pour qu'ils soient pleinement remis, mais il semble que vous ayez sauvé les chiens !
                        Qui sait ce qu'il se serait passé si vous n'aviez pas trouvé de remède ?<br>
                        <br>
                        Gaspard s'approche de vous, un sourire de gratitude sur le visage.
                    </p>
                    <div class="dialogue">
                        <div class="portrait">
                            <img src="/escaperpg/images/secrets/gaspard.png" alt="gaspard">
                        </div>
                        <div class="bulleperso">
                            <p>
                                Merci l'ami, je vous dois une fière chandelle !<br>
                                <br>
                                Laissons-les se reposer un peu, ils seront bientôt de nouveau sur pied.<br>
                                Suivez-moi, j'ai quelque chose à vous donner pour vous remercier.
                            </p>
                        </div>
                    </div>
                    <p>
                        Gaspard ressort du chenil et se dirige vers sa <span class="lieu">maison</span>.
                    </p>
                    <form action="maisongaspard" method="post">
                        <input type="submit" name="suivre" value="Le suivre.">
                    </form>
                    <?php
                    unset($_SESSION['chiensemp']);
                    unset($_SESSION['antidote']);
                    $key = array_search('analeptique', $_SESSION['inventaire']);
                    if ($key !== false) {
                        unset($_SESSION['inventaire'][$key]);
                        $_SESSION['inventaire'] = array_values($_SESSION['inventaire']);
                    }
                    $_SESSION['chienssauves'] = true;
                    ?>
                <?php elseif (isset($_POST['antidote'])): ?>
                    <div class="dialogue">
                        <div class="portrait">
                            <img src="/escaperpg/images/secrets/gaspard.png" alt="gaspard">
                        </div>
                        <div class="bulleperso">
                            <p>
                                J'ai pas le temps pour ça. Si vous avez quelque chose pour eux j'vous écoute, sinon laissez-moi tranquille.
                            </p>
                        </div>
                    </div>
                    <p>
                        Il se retourne pour reporter son attention sur les animaux et ne semble plus enclin à discuter avec vous.
                    </p>
                    <form action="chenil" method="post">
                        <input list="notesListe" name="antidote">
                        <datalist id="notesListe"></datalist>
                        <input type="submit" name="parler" value="Parler.">
                    </form>
                    <script src="/escaperpg/scripts/updateDataList.js"></script>
                <?php else: ?>
                    <?php if (isset($_SESSION['chiensmalades'])): ?>
                        <p>
                            Gaspard est en train de s'occuper des 4 chiens qui semblent mal en point.
                        </p>
                        <div class="dialogue">
                            <div class="portrait">
                                <img src="/escaperpg/images/secrets/gaspard.png" alt="gaspard">
                            </div>
                            <div class="bulleperso">
                                <p>
                                    Les chiens n'ont pas l'air bien aujourd'hui, je ne sais pas ce qu'ils ont.
                                </p>
                            </div>
                        </div>
                        <p>
                            Il se retourne pour reporter son attention sur les animaux et ne semble plus enclin à discuter avec vous.
                        </p>
                        <form action="chenil" method="post">
                            <input list="notesListe" name="antidote">
                            <datalist id="notesListe"></datalist>
                            <input type="submit" name="parler" value="Parler.">
                        </form>
                        <script src="/escaperpg/scripts/updateDataList.js"></script>
                    <?php else: ?>
                        <p>
                            Gaspard est toujours en train de s'occuper des 4 chiens empoisonnés.<br>
                            <br>
                            Il ne semble toujours pas enclin à discuter avec vous.
                        </p>
                        <form action="chenil" method="post">
                            <input list="notesListe" name="antidote">
                            <datalist id="notesListe"></datalist>
                            <input type="submit" name="parler" value="Parler.">
                        </form>
                        <script src="/escaperpg/scripts/updateDataList.js"></script>
                    <?php endif; ?>
                <?php endif; ?>
            <?php elseif (isset($_SESSION['chienssauves']) || isset($_SESSION['chienssauvesfin'])): ?>
                <p>
                    À votre arrivée dans le chenil, les chiens se redressent sur leurs pattes et agitent joyeusement la queue en vous voyant.
                </p>
            <?php else: ?>
                <p>
                    C'est ici que dorment les 4 <span class="mdp">chiens</span> de garde. 3 dobermans et un rottweiler.
                </p>
                <?php if (!in_array('Chiens', $_SESSION['mdp'])) {
                    $_SESSION['mdp'][] = 'Chiens';
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
