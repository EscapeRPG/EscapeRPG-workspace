<?php
try {
    $conn = new PDO('mysql:host=localhost;dbname=escapedrpg2534', 'root', '');
    $conn->query("SET NAMES 'utf8'");
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

$nomcompte = isset($_SESSION['loggedin']) && $_SESSION['loggedin'] ? htmlspecialchars($_SESSION['idcompte']) : null;

$verifsucces = $conn->prepare("SELECT * FROM 0succes WHERE pseudo = ? AND scenario = ? AND description = ?");
$verifsucces->execute([$nomcompte, $scenario, $description]);
$succesexiste = $verifsucces->rowCount();

if (!$succesexiste): ?>
    <?php if ($_SESSION['loggedin']): ?>
        <?php
        $insertsucces = $conn->prepare("INSERT INTO 0succes (pseudo, badge, scenario, description, cache, rarete) VALUES (?, ?, ?, ?, ?, ?)");
        $insertsucces->execute([$nomcompte, $nouveausucces, $scenario, $description, $cache, $rarete]);
        ?>
        <div class="succesapercu">
            <div class="<?= $rarete ?>"></div>
            <a href="/escaperpg/members/m?id=<?= $nomcompte ?>" target="_blank" rel="noreferrer">
                <?= $nouveausucces ?>
            </a>
        </div>
    <?php else: ?>
        <div class="succesapercu">
            <div class="<?= $rarete ?>"></div>
            <a href="/escaperpg/members/connexion" target="_blank" rel="noreferrer">
                <?= $nouveausucces ?>
            </a>
        </div>
    <?php endif; ?>
<?php endif; ?>
