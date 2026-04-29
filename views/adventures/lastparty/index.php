<?php

$content = $sceneData['content'] ?? [];
$blocks = $content['blocks'] ?? [];
$actions = $content['actions'] ?? [];
$hintData = $sceneData['hintData'] ?? null;
?>
<?php if (($sceneData['step'] ?? 0) < 1): ?>
    <?php require __DIR__ . '/../partials/_scene_blocks.php'; ?>
    <?php require __DIR__ . '/../partials/_scene_actions.php'; ?>
    <?php require __DIR__ . '/../partials/_scene_hint.php'; ?>

    <?php if (($sceneData['mode'] ?? '') === 'load' && !($sceneData['isLoggedIn'] ?? false)): ?>
        <br>
        <form action="<?= url('/aventures/lastparty/index') ?>" method="post">
            <input type="text" name="save_name" placeholder="Nom" maxlength="20" required>
            <br>
            <input type="text" name="save_code" placeholder="Code" required>
            <br>
            <button type="submit" class="action" name="action" value="submit_load_game">Charger.</button>
        </form>
    <?php endif; ?>

    <?php if (($sceneData['mode'] ?? '') === 'save' && !($sceneData['isLoggedIn'] ?? false)): ?>
        <br>
        <p>Veuillez choisir un nom et un code pour votre sauvegarde.</p>
        <form action="<?= url('/aventures/lastparty/index') ?>" method="post">
            <input type="text" name="save_name" placeholder="Nom" maxlength="20" required>
            <br>
            <input type="text" name="save_code" placeholder="Code" required>
            <br>
            <button type="submit" class="action" name="action" value="submit_save_game">Sauvegarder.</button>
        </form>
    <?php endif; ?>
<?php else: ?>
    <?php require __DIR__ . '/../partials/_scene_blocks.php'; ?>
    <?php require __DIR__ . '/../partials/_scene_actions.php'; ?>
    <?php require __DIR__ . '/../partials/_scene_hint.php'; ?>
<?php endif; ?>
