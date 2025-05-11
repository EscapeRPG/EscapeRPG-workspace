<header>
    <a href="/escaperpg/index.php" target="_blank" rel="noreferrer"><img src="/escaperpg/images/logo_escaperpg.png" id="accueilLink" alt="accueil"></a>
    <a href="/escaperpg/index.php#bloc2" target="_blank" rel="noreferrer"><img src="/escaperpg/images/aventures.png" id="aventuresLink" alt="aventures"></a>
    <a href="/escaperpg/index.php#bloc3" target="_blank" rel="noreferrer"><img src="/escaperpg/images/regles.png" id="reglesLink" alt="règles"></a>
    <a href="/escaperpg/index.php#bloc4" target="_blank" rel="noreferrer"><img src="/escaperpg/images/liens.png" id="liensLink" alt="liens"></a>
</header>

<?php
include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/incmembers.php";

if (isset($_POST['indice'])) {
    echo '<div id="succespopup">';
    $nouveausucces = '<img src="/escaperpg/images/succes/general/indice.png"><span><u><b>À l\'aide !</b></u><br>Utiliser un indice pour la première fois</span>';
    $scenario = 'general';
    $description = 'indice';
    $cache = 'non';
    $rarete = 'succesnormal';
    include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/succesadd.php";
    echo '</div>';
}

if (isset($_POST['reponse'])) {
    echo '<div id="succespopup">';
    $nouveausucces = '<img src="/escaperpg/images/succes/general/reponse.png"><span><u><b>Je n\'y arrivais pas...</b></u><br>Utiliser une réponse pour s\'en sortir d\'une énigme</span>';
    $scenario = 'general';
    $description = 'réponse';
    $cache = 'non';
    $rarete = 'succesnormal';
    include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/succesadd.php";
    echo '</div>';
}
