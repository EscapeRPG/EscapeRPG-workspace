<?php
$content = $sceneData['content'] ?? [];
?>

<?php if (!empty($content['audio'])): ?>
    <audio src="<?= asset($content['audio']) ?>" autoplay></audio>
<?php endif; ?>

<?php require __DIR__ . '/partials/_standard_scene.php'; ?>

<?php foreach (($content['scripts'] ?? []) as $script): ?>
    <?php \App\Core\View::start('scripts'); ?>
    <?= \App\Core\View::get('scripts') ?>
    <script src="<?= asset((string) $script) ?>"></script>
    <?php \App\Core\View::end(); ?>
<?php endforeach; ?>
