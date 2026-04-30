<?php use App\Core\View; ?>

<?php
$isSaveMode = ($mode ?? '') === 'save';
$currentScene = (string) ($scene ?? ($adventure['entry_scene'] ?? 'index'));
$actionPath = $isSaveMode
    ? '/aventures/' . ($adventure['slug'] ?? '') . '/sauvegarde'
    : '/aventures/' . ($adventure['slug'] ?? '') . '/chargement';
$returnPath = '/aventures/' . ($adventure['slug'] ?? '') . '/' . $currentScene;
?>

<?php View::start('content'); ?>
<section class="adventure-shell">
    <h1><?= $isSaveMode ? 'Sauvegarder la partie' : 'Charger une partie' ?></h1>

    <?php if ($isSaveMode): ?>
        <p>Choisissez un nom et un code pour retrouver cette sauvegarde plus tard.</p>
    <?php else: ?>
        <p>Renseignez le nom et le code associés à votre sauvegarde.</p>
    <?php endif; ?>

    <form action="<?= url($actionPath) ?>" method="post">
        <input type="text" name="save_name" placeholder="Nom" maxlength="20" required>
        <br>
        <input type="text" name="save_code" placeholder="Code" required>
        <br>
        <button type="submit" class="action" name="action" value="<?= $isSaveMode ? 'submit_save_game' : 'submit_load_game' ?>">
            <?= $isSaveMode ? 'Sauvegarder.' : 'Charger.' ?>
        </button>
    </form>

    <form action="<?= url($returnPath) ?>" method="get">
        <button type="submit" class="action">Retour à l'aventure.</button>
    </form>
</section>
<?php View::end(); ?>
