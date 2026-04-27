<?php use App\Core\View; ?>

<?php
if (empty(View::get('aside')) && !empty($adventure['sidebar_view'])) {
    View::start('aside');
    require __DIR__ . '/../' . $adventure['sidebar_view'] . '.php';
    View::end();
}

if (empty(View::get('footer')) && !empty($adventure['footer_view'])) {
    require __DIR__ . '/../' . $adventure['footer_view'] . '.php';
}
?>

<?php View::start('content'); ?>
<section class="adventure-shell">
    <?php if ($message = flash('success')): ?>
        <p><?= e($message) ?></p>
    <?php endif; ?>
    <?php if ($message = flash('error')): ?>
        <p><?= e($message) ?></p>
    <?php endif; ?>
    <?php if ($message = flash('info')): ?>
        <p><?= e($message) ?></p>
    <?php endif; ?>

    <?php
    $sceneViewPath = null;
    if (!empty($sceneView)) {
        $candidate = __DIR__ . '/../' . $sceneView . '.php';
        if (is_file($candidate)) {
            $sceneViewPath = $candidate;
        }
    }
    ?>

    <?php require $sceneViewPath; ?>
</section>
<?php View::end(); ?>
