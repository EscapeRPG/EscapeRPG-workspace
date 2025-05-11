<?php
$nombreDeComsParPage = 5;
$stmt = $conn->query("SELECT COUNT(*) AS nb_coms FROM lastpartycoms");
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
$reponse = $conn->query("SELECT * FROM lastpartycoms ORDER BY id DESC LIMIT $premierComAafficher, $nombreDeComsParPage");

if ($totalDesComs == 0): ?>
    <p>Apparemment, personne n'a laissé de commentaire avant vous !</p>
    <?php else:
    while ($donnees = $reponse->fetch()): ?>
        <div class="dialogueCommentaire">
            <div class="portraitCommentaire" style="background: linear-gradient(135deg, rgb(<?= rand(150, 255) ?>, <?= rand(150, 255) ?>, <?= rand(150, 255) ?>), rgb(<?= rand(50, 155) ?>, <?= rand(50, 155) ?>, <?= rand(50, 155) ?>)">
                <p class="nomCommentaire"><?= $donnees['pseudo'] ?> :</p>
            </div>
            <div class="bulleCommentaire">
                <p><?= $donnees['message'] ?></p>
            </div>
        </div>
<?php endwhile;
endif;
$reponse->closeCursor(); ?>
<br>
<div class="dialogue">
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
