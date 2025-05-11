<?php
try {
    $conn = new PDO('mysql:host=localhost;dbname=escapedrpg2534', 'root', '');
    $conn->query("SET NAMES 'utf8'");
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

isset($_COOKIE['LOGGED_USER']) ? $_SESSION['loggedin'] = true : null;

if (isset($_SESSION['loggedin'])) {
    if ($_SESSION['loggedin']) {
        isset($_COOKIE['LOGGED_USER']) ? $nomcompte = $_COOKIE['LOGGED_USER'] : $nomcompte = htmlspecialchars($_SESSION['idcompte']);
        $requser = $conn->prepare("SELECT * FROM 0membres WHERE id = ?");
        $requser->execute(array($nomcompte));
        while ($useravatar = $requser->fetch()) {
            $_SESSION['avatarcompte'] = $useravatar['avatar'];
        }
        echo '<a href="/escaperpg/members/m?id=' . $nomcompte . '" target="_blank" rel="noreferrer"><div id="connexioncompte"><img src="/escaperpg/images/uploads/' . $_SESSION['avatarcompte'] . '"><br><br>MON COMPTE</div></a>';
    } else {
        echo '<a href="/escaperpg/members/connexion.php"><div id="connexioncompte">ESPACE<br>MEMBRES</div></a>';
        $nomcompte = null;
    }
} else {
    echo '<a href="/escaperpg/members/connexion.php"><div id="connexioncompte">ESPACE<br>MEMBRES</div></a>';
    $_SESSION['loggedin'] = false;
    $nomcompte = null;
}
