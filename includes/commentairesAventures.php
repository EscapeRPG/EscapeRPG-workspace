<?php
$nombreDeComsParPage = 5;
$stmt = $conn->query("SELECT COUNT(*) AS nb_coms FROM $scenarioEnCours");
$donnees = $stmt->fetch();
$stmt->closeCursor();
$totalDesComs = $donnees['nb_coms'];
$nombreDePages = ceil($totalDesComs / $nombreDeComsParPage);
if ($nombreDePages > 10) {
    $nombreDePages = 10;
}
if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 1;
}
$premierComAafficher = ($page - 1) * $nombreDeComsParPage;
$reponse = $conn->query("SELECT * FROM $scenarioEnCours ORDER BY id DESC LIMIT $premierComAafficher, $nombreDeComsParPage");

if ($totalDesComs == 0): ?>
    <p>Apparemment, personne n'a laissé de commentaire avant vous !</p>
    <?php else:
    function pseudoToHSL($pseudo)
    {
        $hash = crc32($pseudo);
        $hue = $hash % 360;
        $saturation = 60 + ($hash % 30);
        $lightness = 100;

        return [$hue, $saturation, $lightness];
    }

    while ($donnees = $reponse->fetch()): ?>
        <?php
        list($h, $s, $l) = pseudoToHSL($donnees['pseudo']);
        $l2 = max(0, $l - 40);
        $l3 = max(0, $l - 60);
        $l4 = max(0, $l - 70);
        $l5 = max(0, $l - 90);
        ?>
        <div class="dialogueCommentaire">
            <div class="portraitCommentaire"
                style="background: linear-gradient(150deg,
                    hsl(<?= $h ?>, <?= $s ?>%, <?= $l ?>%) 2%,
                    hsl(<?= $h ?>, <?= $s ?>%, <?= $l2 ?>%) 50%,
                    hsl(<?= $h ?>, <?= $s ?>%, <?= $l3 ?>%) 75%,
                    hsl(<?= $h ?>, <?= $s ?>%, <?= $l4 ?>%) 95%,
                    hsl(<?= $h ?>, <?= $s ?>%, <?= $l5 ?>%))">
                <p class="nomCommentaire"><?= htmlspecialchars($donnees['pseudo']) ?> :</p>
            </div>
            <div class="bulleCommentaire">
                <p><?= nl2br(htmlspecialchars($donnees['message'])) ?></p>
            </div>
        </div>
<?php endwhile;
endif;
$reponse->closeCursor(); ?>
<br>
<div class="dialogueCommentaire">
    <?php for ($i = 1; $i <= $nombreDePages; $i++): ?>
        <?php if ($i == $nombreDePages): ?>
            <a href="fin.php?page=<?= $i ?>">Page <?= $i ?></a>
        <?php else: ?>
            <a href="fin.php?page=<?= $i ?>">Page <?= $i ?></a> -
        <?php endif; ?>
    <?php endfor; ?>
</div>
<br>
<form action="fin" method="post">
    <fieldset>
        <label for="nom">Votre nom (20 caractères max) :</label>
        <input type="text" name="nom" id="nom" placeholder="Votre pseudo" value="<?= $_SESSION['loggedin'] ? ucwords($_SESSION['idcompte']) : null ?>" maxlength="20" required><br>
        <br>
        <label for=" message">Votre message :</label>
        <textarea name="message" id="message" rows="7" cols="50">J'ai terminé ce scénario !</textarea><br>
        <br>
        <input type="submit" name="envoyermessage" value="Laisser un commentaire.">
    </fieldset>
</form>
<p>À bientôt pour de nouvelles aventures !</p>
<form action="/escaperpg/index.php#bloc2" method="post">
    <input type="submit" name="retour" value="Retour à l'accueil.">
</form>
<?php $_SESSION['fin'] = true; ?>
