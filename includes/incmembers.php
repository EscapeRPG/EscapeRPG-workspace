<?php
try {
    $conn = new PDO('mysql:host=localhost;dbname=escapedrpg2534', 'root', '');
    $conn->query("SET NAMES 'utf8'");
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

function restoreSessionFromToken($conn)
{
    if (isset($_COOKIE['session_token'])) {
        $stmt = $conn->prepare("SELECT user_id FROM user_session WHERE token = ? AND expires > NOW()");
        $stmt->execute([$_COOKIE['session_token']]);
        $user = $stmt->fetch();

        if ($user) {
            $_SESSION['loggedin'] = true;
            $_SESSION['idcompte'] = $user['user_id'];

            $stmt = $conn->prepare("SELECT avatar FROM 0membres WHERE id = ?");
            $stmt->execute([$user['user_id']]);
            $info = $stmt->fetch();
            $_SESSION['avatarcompte'] = $info['avatar'] ?? 'narrateur.png';

            return true;
        }
    }
    return false;
}

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] === false) {
    restoreSessionFromToken($conn);
}

if (!empty($_SESSION['loggedin']) && !empty($_SESSION['idcompte'])):
    $nomcompte = htmlspecialchars($_SESSION['idcompte']);
    if (!isset($_SESSION['avatarcompte']) && isset($_SESSION['idcompte'])):
        $stmt = $conn->prepare("SELECT avatar FROM 0membres WHERE id = ?");
        $stmt->execute([$_SESSION['idcompte']]);
        $info = $stmt->fetch();
        $_SESSION['avatarcompte'] = $info['avatar'] ?? 'narrateur.png';
    endif; ?>
    <a href="/escaperpg/members/m?id=<?= urlencode($nomcompte) ?>" target="_blank" rel="noreferrer">
        <div id="connexioncompte">
            <img src="/escaperpg/images/uploads/<?= htmlspecialchars($_SESSION['avatarcompte']) ?>" alt="<?= $nomcompte ?>">
            <br><br>
            MON COMPTE
        </div>
    </a>
<?php else: ?>
    <a href="/escaperpg/members/connexion.php">
        <div id="connexioncompte">ESPACE<br>MEMBRES</div>
    </a>
<?php $_SESSION['loggedin'] = false;
endif; ?>
