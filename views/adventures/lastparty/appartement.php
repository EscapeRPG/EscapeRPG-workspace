<?php

$content = $sceneData['content'] ?? [];
$blocks = $content['blocks'] ?? [];
$hintData = $sceneData['hintData'] ?? null;
$photosUnlocked = (bool) ($sceneData['photosUnlocked'] ?? false);
$carnetAcquired = (bool) ($sceneData['carnetAcquired'] ?? false);
?>

<?php if (!empty($content['audio'])): ?>
    <audio src="<?= asset($content['audio']) ?>" autoplay></audio>
<?php endif; ?>

<div class="enigmelieu">
    <img src="<?= asset('assets/img/lastparty/appartement.png') ?>" alt="appartement">

    <?php if ($photosUnlocked): ?>
        <form action="<?= url('/aventures/lastparty/appartement') ?>" method="post">
            <button type="submit" name="action" value="open_camera" id="appareil"></button>
        </form>
    <?php else: ?>
        <form action="<?= url('/aventures/lastparty/appartement') ?>" method="post">
            <button type="submit" name="action" value="open_computer" id="ordi"></button>
        </form>

        <?php if (!$carnetAcquired): ?>
            <form action="<?= url('/aventures/lastparty/appartement') ?>" method="post">
                <button type="submit" name="action" value="open_drawer" id="tiroir"></button>
            </form>
        <?php endif; ?>
    <?php endif; ?>
</div>

<?php require __DIR__ . '/../partials/_scene_blocks.php'; ?>
<?php require __DIR__ . '/../partials/_scene_hint.php'; ?>
