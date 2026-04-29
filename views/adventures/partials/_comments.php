<?php

$comments = $sceneData['comments'] ?? [];
$commentTotal = (int) ($sceneData['commentTotal'] ?? 0);
$pageCount = (int) ($sceneData['commentPageCount'] ?? 1);
$currentPage = (int) ($sceneData['commentPage'] ?? 1);
$defaultPseudo = (string) ($sceneData['commentDefaultPseudo'] ?? '');
$commentScenario = (string) ($sceneData['commentScenario'] ?? ($adventure['slug'] ?? ''));
$commentScene = (string) ($sceneData['commentScene'] ?? $scene ?? 'fin');
$commentPath = '/aventures/' . $commentScenario . '/' . $commentScene;

if (!function_exists('adventure_comment_hsl')) {
    function adventure_comment_hsl(string $pseudo): array
    {
        $hash = crc32($pseudo);
        $hue = $hash % 360;
        $saturation = 60 + ($hash % 30);
        $lightness = 100;

        return [$hue, $saturation, $lightness];
    }
}
?>

<?php if ($commentTotal === 0): ?>
    <p>Apparemment, personne n'a laissé de commentaire avant vous !</p>
<?php else: ?>
    <?php foreach ($comments as $comment): ?>
        <?php
        [$h, $s, $l] = adventure_comment_hsl((string) ($comment['pseudo'] ?? ''));
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
                <p class="nomCommentaire"><?= e((string) ($comment['pseudo'] ?? '')) ?> :</p>
            </div>
            <div class="bulleCommentaire">
                <p><?= nl2br(e((string) ($comment['message'] ?? ''))) ?></p>
            </div>
        </div>
    <?php endforeach; ?>
<?php endif; ?>

<?php if ($pageCount > 1): ?>
    <br>
    <div class="dialogueCommentaire">
        <?php for ($i = 1; $i <= $pageCount; $i++): ?>
            <?php if ($i > 1): ?> - <?php endif; ?>
            <?php if ($i === $currentPage): ?>
                Page <?= $i ?>
            <?php else: ?>
                <a href="<?= url($commentPath . '?page=' . $i) ?>">Page <?= $i ?></a>
            <?php endif; ?>
        <?php endfor; ?>
    </div>
<?php endif; ?>

<br>
<form action="<?= url($commentPath) ?>" method="post">
    <fieldset>
        <label for="nom">Votre nom (20 caractères max) :</label>
        <input type="text" name="nom" id="nom" placeholder="Votre pseudo" value="<?= e($defaultPseudo) ?>" maxlength="20" required>
        <br>
        <br>
        <label for="message">Votre message :</label>
        <textarea name="message" id="message" rows="7" cols="50">J'ai terminé ce scénario !</textarea>
        <br>
        <br>
        <button type="submit" class="action" name="action" value="submit_comment">Laisser un commentaire.</button>
    </fieldset>
</form>
<p>À bientôt pour de nouvelles aventures !</p>
<form action="<?= url('/#bloc2') ?>" method="get">
    <button type="submit" class="action" name="retour" value="1">Retour à l'accueil.</button>
</form>
