<div id="succespopup">
    <?php
    $scenario = 'general';
    $nom = 'commentaire';
    include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/succesAdd.php";
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
