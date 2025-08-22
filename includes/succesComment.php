<div id="succespopup">
    <?php
    $nouveausucces = '<img src="/escaperpg/images/succes/general/commentaire.png"><span><u><b>Crieur public</b></u><br>Laisser un commentaire en fin d\'aventure</span>';
    $scenario = 'general';
    $description = 'commentaire';
    $cache = 'non';
    $rarete = 'succesbronze';
    include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/succesadd.php";
    ?>
</div>

<?php
$nom = $_SESSION['loggedin'] ? htmlspecialchars($_SESSION['idcompte']) : htmlspecialchars($_POST['nom']);
$message = htmlspecialchars($_POST['message']);
$stmt = $conn->prepare("INSERT INTO $comScenarioEnCours (pseudo, message) VALUES (?, ?)");
$stmt->execute([$nom, $message]);
?>
Merci d'avoir enregistré votre commentaire, <?= $nom ?> !
<br>
