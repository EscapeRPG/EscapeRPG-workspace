<?php

$content = $sceneData['content'] ?? [];
$blocks = $content['blocks'] ?? [];
$hintData = $sceneData['hintData'] ?? null;
$finalRevealed = (bool) ($sceneData['finalRevealed'] ?? false);
?>

<?php if (!empty($content['audio'])): ?>
    <audio src="<?= asset($content['audio']) ?>" autoplay></audio>
<?php endif; ?>

<?php if ($finalRevealed): ?>
    <img src="<?= asset('assets/img/etoilefinpleine.png') ?>" alt="étoile fin">
    <br>
<?php endif; ?>

<?php require __DIR__ . '/../partials/_scene_blocks.php'; ?>

<?php if (!$finalRevealed): ?>
    <form action="<?= url('/aventures/lastparty/ebaubi') ?>" method="post">
        <button type="submit" class="action" name="action" value="finish_story">ÉBAUBI</button>
    </form>
<?php else: ?>
    <?php require __DIR__ . '/../partials/_comments.php'; ?>
<?php endif; ?>

<?php require __DIR__ . '/../partials/_scene_hint.php'; ?>
