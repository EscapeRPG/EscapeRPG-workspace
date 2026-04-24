<header>
    <a href="/escaperpg/index.php" target="_blank" rel="noreferrer"><img src="/escaperpg/images/logo_escaperpg.png" id="accueilLink" alt="accueil"></a>
    <a href="/escaperpg/index.php#bloc2" target="_blank" rel="noreferrer"><img src="/escaperpg/images/aventures.png" id="aventuresLink" alt="aventures"></a>
    <a href="/escaperpg/index.php#bloc3" target="_blank" rel="noreferrer"><img src="/escaperpg/images/regles.png" id="reglesLink" alt="règles"></a>
    <a href="/escaperpg/index.php#bloc4" target="_blank" rel="noreferrer"><img src="/escaperpg/images/liens.png" id="liensLink" alt="liens"></a>
</header>

<?php
include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/incmembers.php";

$nomcompte = isset($_SESSION['loggedin']) && $_SESSION['loggedin'] ? htmlspecialchars($_SESSION['idcompte']) : null;

if ($nomcompte !== null) {
    $user = $conn->prepare('SELECT pk FROM 0membres WHERE id = ?');
    $user->execute([$nomcompte]);
    $idconnected = $user->fetch();
    $idjoueur = $idconnected['pk'];
} else {
    $idjoueur = null;
}
