<?php use App\Core\View; ?>

<?php View::start('content'); ?>
<section class="adventure-shell">
    <h1><?= htmlspecialchars($adventure['title'] ?? 'Aventure', ENT_QUOTES, 'UTF-8') ?></h1>
    <p>Point d'entree du framework aventure en cours de mise en place.</p>

    <p>
        Scenario :
        <strong><?= htmlspecialchars($adventure['slug'] ?? '', ENT_QUOTES, 'UTF-8') ?></strong>
        |
        Scene :
        <strong><?= htmlspecialchars($scene, ENT_QUOTES, 'UTF-8') ?></strong>
    </p>

    <form action="<?= url('/aventures/' . ($adventure['slug'] ?? '') . '/' . $scene) ?>" method="post">
        <input type="hidden" name="scene" value="<?= htmlspecialchars($scene, ENT_QUOTES, 'UTF-8') ?>">
        <button type="submit" name="restart" value="1">Reinitialiser l'etat</button>
    </form>

    <pre><?= htmlspecialchars(var_export($state, true), ENT_QUOTES, 'UTF-8') ?></pre>
</section>
<?php View::end(); ?>
