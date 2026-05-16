<?php
$content = $sceneData['fuiteContent'] ?? $sceneData['content'] ?? [];
$sceneData['content'] = $content;
$actions = $content['actions'] ?? [];
$directionActions = [];
$otherActions = [];

foreach ($actions as $action) {
    $value = (string) ($action['value'] ?? '');
    if (str_starts_with($value, 'move_')) {
        $directionActions[substr($value, 5)] = $action;
        continue;
    }

    $otherActions[] = $action;
}

$renderFuiteAction = static function (array $action) use ($adventure, $scene): void {
    $method = strtolower((string) ($action['method'] ?? 'post'));
    $sceneUrl = (string) (($adventure['scene_urls'][$scene] ?? null) ?: $scene);
    $formAction = $action['form_action'] ?? url('/aventures/' . ($adventure['slug'] ?? '') . '/' . ltrim($sceneUrl, '/'));
    $label = (string) ($action['label'] ?? '');
    $name = (string) ($action['name'] ?? 'action');
    $value = (string) ($action['value'] ?? '');
    $class = trim((string) ($action['class'] ?? ''));
    ?>
    <form action="<?= e((string) $formAction) ?>" method="<?= e($method) ?>">
        <button type="submit"<?php if ($class !== ''): ?> class="<?= e($class) ?>"<?php endif; ?> name="<?= e($name) ?>" value="<?= e($value) ?>">
            <?= e($label) ?>
        </button>
    </form>
    <?php
};
?>

<?php if (!empty($content['audio'])): ?>
    <audio src="<?= asset((string) $content['audio']) ?>" autoplay></audio>
<?php endif; ?>

<?php
$renderSceneActions = false;
$renderSceneHint = false;
?>
<?php require __DIR__ . '/../partials/_standard_scene.php'; ?>

<?php if ($directionActions !== []): ?>
    <div class="fuite-directions" aria-label="Directions">
        <?php if (isset($directionActions['north'])): ?>
            <div class="fuite-direction fuite-direction-north">
                <?php $renderFuiteAction($directionActions['north']); ?>
            </div>
        <?php endif; ?>

        <div class="fuite-direction-row">
            <?php if (isset($directionActions['west'])): ?>
                <div class="fuite-direction fuite-direction-west">
                    <?php $renderFuiteAction($directionActions['west']); ?>
                </div>
            <?php endif; ?>

            <?php if (isset($directionActions['east'])): ?>
                <div class="fuite-direction fuite-direction-east">
                    <?php $renderFuiteAction($directionActions['east']); ?>
                </div>
            <?php endif; ?>
        </div>

        <?php if (isset($directionActions['south'])): ?>
            <div class="fuite-direction fuite-direction-south">
                <?php $renderFuiteAction($directionActions['south']); ?>
            </div>
        <?php endif; ?>
    </div>
<?php endif; ?>

<?php if ($otherActions !== []): ?>
    <div class="fuite-actions">
        <?php foreach ($otherActions as $action): ?>
            <?php $renderFuiteAction($action); ?>
        <?php endforeach; ?>
    </div>
<?php endif; ?>

<?php require __DIR__ . '/../partials/_scene_hint.php'; ?>
