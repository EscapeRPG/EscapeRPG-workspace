<?php

$content = $sceneData['content'] ?? [];
$blocks = $content['blocks'] ?? [];
$actions = $content['actions'] ?? [];
$hintData = $sceneData['hintData'] ?? null;
?>

<?php if (!empty($content['audio'])): ?>
    <audio src="<?= asset($content['audio']) ?>" autoplay></audio>
<?php endif; ?>

<?php if (($sceneData['step'] ?? 0) < 1): ?>
    <?php require __DIR__ . '/../partials/_scene_blocks.php'; ?>
    <?php require __DIR__ . '/../partials/_scene_actions.php'; ?>
    <?php require __DIR__ . '/../partials/_scene_hint.php'; ?>
<?php else: ?>
    <div class="enigmelieu">
        <img src="<?= asset('assets/img/lastparty/appartement.png') ?>" alt="appartement">
        <form action="<?= url('/aventures/lastparty/eveil') ?>" method="post">
            <button type="submit" name="action" value="open_phone" id="phone">
                <img src="<?= asset('assets/img/lastparty/telephonemini.png') ?>" alt="téléphone">
            </button>
        </form>
    </div>

    <?php require __DIR__ . '/../partials/_scene_blocks.php'; ?>
    <?php require __DIR__ . '/../partials/_scene_hint.php'; ?>
<?php endif; ?>
