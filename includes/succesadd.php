<?php
try {
    $conn = new PDO('mysql:host=localhost;dbname=escapedrpg2534', 'root', '');
    $conn->query("SET NAMES 'utf8'");
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

$succes = $conn->prepare('SELECT * FROM 0succes WHERE nom = ? AND scenario = ?');
$succes->execute([$nom, $scenario]);
$succesinfo = $succes->fetch();

if (!$succesinfo) {
    return;
}
?>

<?php if (!isset($_SESSION['loggedin']) || !$_SESSION['loggedin']): ?>
    <div class="succesapercu">
        <div class="<?= $succesinfo['rarete'] ?>"></div>
        <a href="/escaperpg/members/connexion" target="_blank" rel="noreferrer">
            <img src="/escaperpg/images/succes/<?= $succesinfo['scenario'] ?>/<?= $succesinfo['nom'] ?>.png"
                alt="<?= $succesinfo['titre'] ?>">
            <span>
                <u><b><?= $succesinfo['titre'] ?></b></u>
                <br>
                <?= $succesinfo['description'] ?>
            </span>
        </a>
    </div>

    <script src="/escaperpg/scripts/succescountoffline.js"></script>
<?php return;
endif; ?>

<?php
$membre = $conn->prepare('SELECT pk FROM 0membres WHERE id = ?');
$membre->execute([$_SESSION['idcompte']]);
$membreinfo = $membre->fetch();

if (!$membreinfo) {
    return;
}

$idmembre = $membreinfo['pk'];

$verifsucces = $conn->prepare('SELECT * FROM 0membre_succes WHERE id_membre = ? AND id_succes = ?');
$verifsucces->execute([$idmembre, $succesinfo['id']]);
$succesexiste = $verifsucces->fetch();

if (!$succesexiste): ?>
    <?php
    $insert = $conn->prepare("INSERT INTO 0membre_succes (id_membre, id_succes) VALUES (?, ?)");
    $insert->execute([$idmembre, $succesinfo['id']]);
    ?>

    <div class="succesapercu">
        <div class="<?= $succesinfo['rarete'] ?>"></div>
        <a href="/escaperpg/members/m?id=<?= $_SESSION['idcompte'] ?>" target="_blank" rel="noreferrer">
            <img src="/escaperpg/images/succes/<?= $succesinfo['scenario'] ?>/<?= $succesinfo['nom'] ?>.png"
                alt="<?= htmlspecialchars($succesinfo['titre']) ?>">
            <span>
                <u><b><?= htmlspecialchars($succesinfo['titre']) ?></b></u>
                <br>
                <?= htmlspecialchars($succesinfo['description']) ?>
            </span>
        </a>
    </div>

    <script src="/escaperpg/scripts/succescount.js"></script>
<?php endif; ?>
