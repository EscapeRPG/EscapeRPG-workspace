<?php use App\Core\View; ?>

<?php
$content = $sceneData['content'] ?? [];
?>

<?php View::start('content'); ?>
<?php require __DIR__ . '/intro.php'; ?>
<div id="loadintro"><div id="loader"></div></div>
<?php View::end(); ?>

<?php foreach (($content['scripts'] ?? []) as $script): ?>
    <?php View::start('scripts'); ?>
    <?= View::get('scripts') ?>
    <script src="<?= asset((string) $script) ?>" charset="UTF-8"></script>
    <?php View::end(); ?>
<?php endforeach; ?>
