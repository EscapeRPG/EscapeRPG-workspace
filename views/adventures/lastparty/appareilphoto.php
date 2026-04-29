<?php

$content = $sceneData['content'] ?? [];
$blocks = $content['blocks'] ?? [];
$hintData = $sceneData['hintData'] ?? null;
$step = (int) ($sceneData['step'] ?? 0);
?>

<?php if (!empty($content['audio'])): ?>
    <audio src="<?= asset($content['audio']) ?>" autoplay></audio>
<?php endif; ?>

<?php require __DIR__ . '/../partials/_scene_blocks.php'; ?>

<?php if ($step < 1): ?>
    <form action="<?= url('/aventures/lastparty/appareilphoto') ?>" method="post">
        <button type="submit" class="action" name="action" value="inspect_gallery">Suivant.</button>
    </form>
<?php endif; ?>

<?php require __DIR__ . '/../partials/_scene_hint.php'; ?>
