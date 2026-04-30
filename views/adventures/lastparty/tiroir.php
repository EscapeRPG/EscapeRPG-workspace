<?php

$content = $sceneData['content'] ?? [];
$blocks = $content['blocks'] ?? [];
$hintData = $sceneData['hintData'] ?? null;
$carnetAcquired = (bool) ($sceneData['carnetAcquired'] ?? false);
?>

<?php if (!empty($content['audio'])): ?>
    <audio src="<?= asset($content['audio']) ?>" autoplay></audio>
<?php endif; ?>

<?php if (!$carnetAcquired): ?>
    <div class="enigme">
        <a href="<?= asset('assets/img/lastparty/carnet.png') ?>" rel="lightbox[inventaire]">
            <img src="<?= asset('assets/img/lastparty/carnet.png') ?>" alt="carnet">
        </a>
    </div>
<?php endif; ?>

<?php require __DIR__ . '/../partials/_scene_blocks.php'; ?>

<form action="<?= url('/aventures/lastparty/tiroir') ?>" method="post">
    <?php if (!$carnetAcquired): ?>
        <button type="submit" class="action" name="action" value="take_notebook">Prendre.</button>
    <?php else: ?>
        <button type="submit" class="action" name="action" value="back_to_room">Retour.</button>
    <?php endif; ?>
</form>

<?php require __DIR__ . '/../partials/_scene_hint.php'; ?>
