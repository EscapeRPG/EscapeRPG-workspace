<?php

$content = $sceneData['content'] ?? [];
?>

<?php if (!empty($content['audio'])): ?>
    <audio src="<?= asset($content['audio']) ?>" autoplay></audio>
<?php endif; ?>

<?php if (($sceneData['step'] ?? 0) < 1): ?>
    <?php require __DIR__ . '/../partials/_standard_scene.php'; ?>
<?php else: ?>
    <div class="enigmelieu">
        <img src="<?= asset('assets/img/lastparty/appartement.png') ?>" alt="appartement">
        <form action="<?= url('/aventures/lastparty/eveil') ?>" method="post">
            <button type="submit" name="action" value="open_phone" id="phone">
                <img src="<?= asset('assets/img/lastparty/telephonemini.png') ?>" alt="téléphone">
            </button>
        </form>
    </div>

    <?php $renderSceneActions = false; ?>
    <?php require __DIR__ . '/../partials/_standard_scene.php'; ?>
<?php endif; ?>
