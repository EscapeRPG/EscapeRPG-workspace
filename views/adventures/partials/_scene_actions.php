<?php foreach (($actions ?? []) as $sceneAction): ?>
    <?php
    $method = strtolower((string) ($sceneAction['method'] ?? 'post'));
    $formAction = $sceneAction['form_action'] ?? url('/aventures/' . ($adventure['slug'] ?? '') . '/' . $scene);
    $label = $sceneAction['label'] ?? '';
    $name = $sceneAction['name'] ?? 'action';
    $value = $sceneAction['value'] ?? '';
    $class = trim((string) ($sceneAction['class'] ?? ''));
    $buttonClass = $class !== '' ? ' class="' . e($class) . '"' : '';
    ?>
    <form action="<?= e((string) $formAction) ?>" method="<?= e($method) ?>">
        <button type="submit" <?= $buttonClass ?> name="<?= e((string) $name) ?>" value="<?= e((string) $value) ?>">
            <?= e((string) $label) ?>
        </button>
    </form>
<?php endforeach; ?>
