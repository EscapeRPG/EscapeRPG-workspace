<?php $notes = array_values(array_filter($state['notes'] ?? [], static fn ($note) => is_string($note) && $note !== '')); ?>
<?php
$sceneActionConditionMatches = static function (?array $condition) use ($state): bool {
    if ($condition === null) {
        return true;
    }

    if (isset($condition['state'])) {
        $actual = $state[$condition['state']] ?? null;
        if (array_key_exists('equals', $condition)) {
            return $actual === $condition['equals'];
        }
        if (array_key_exists('not_equals', $condition)) {
            return $actual !== $condition['not_equals'];
        }
        if (($condition['truthy'] ?? false) === true) {
            return (bool) $actual;
        }
        if (($condition['falsy'] ?? false) === true) {
            return !(bool) $actual;
        }
    }

    if (isset($condition['inventory'])) {
        $hasItem = in_array($condition['inventory'], (array) ($state['inventory'] ?? []), true);
        return ($condition['contains'] ?? true) ? $hasItem : !$hasItem;
    }

    return true;
};

$sceneActionAsset = static function (array $item) use ($sceneActionConditionMatches): string {
    foreach (($item['src_options'] ?? []) as $option) {
        if (is_array($option) && $sceneActionConditionMatches($option['if'] ?? null)) {
            return (string) ($option['src'] ?? '');
        }
    }

    return (string) ($item['src'] ?? '');
};
?>

<?php foreach (($actions ?? []) as $sceneAction): ?>
    <?php
    if (is_array($sceneAction['visible_if'] ?? null) && !$sceneActionConditionMatches($sceneAction['visible_if'])) {
        continue;
    }

    $method = strtolower((string)($sceneAction['method'] ?? 'post'));
    $sceneUrl = (string)(($adventure['scene_urls'][$scene] ?? null) ?: $scene);
    $formAction = $sceneAction['form_action'] ?? url('/aventures/' . ($adventure['slug'] ?? '') . '/' . ltrim($sceneUrl, '/'));
    $label = $sceneAction['label'] ?? '';
    $name = $sceneAction['name'] ?? 'action';
    $value = $sceneAction['value'] ?? '';
    $class = trim((string)($sceneAction['class'] ?? ''));
    $buttonClass = $class !== '' ? ' class="' . e($class) . '"' : '';
    $formClass = trim((string)($sceneAction['form_class'] ?? ''));
    $controls = array_values(array_filter(
        $sceneAction['controls'] ?? [],
        static function ($control) use ($sceneActionConditionMatches): bool {
            if (!is_array($control)) {
                return false;
            }

            $condition = $control['visible_if'] ?? null;
            if (!is_array($condition)) {
                return true;
            }

            return $sceneActionConditionMatches($condition);
        }
    ));
    ?>
    <form action="<?= e((string)$formAction) ?>" method="<?= e($method) ?>"<?php if ($formClass !== ''): ?> class="<?= e($formClass) ?>"<?php endif; ?>>
        <?php if ($controls !== []): ?>
            <?php foreach ($controls as $control): ?>
                <?php
                $controlElement = (string) ($control['element'] ?? 'button');
                $controlType = (string) ($control['type'] ?? ($controlElement === 'button' ? 'submit' : 'text'));
                $controlClass = trim((string) ($control['class'] ?? ''));
                $controlId = (string) ($control['id'] ?? '');
                $controlName = (string) ($control['name'] ?? 'action');
                $controlValue = (string) ($control['value'] ?? '');
                $controlSrc = $sceneActionAsset($control);
                $controlAlt = (string) ($control['alt'] ?? '');
                $controlLabel = (string) ($control['label'] ?? '');
                $attributes = array_filter(
                    $control['attributes'] ?? [],
                    static fn ($value): bool => $value !== false && $value !== null
                );
                ?>
                <?php if ($controlElement === 'input'): ?>
                    <input
                        type="<?= e($controlType) ?>"
                        name="<?= e($controlName) ?>"
                        value="<?= e($controlValue) ?>"
                        <?php if ($controlId !== ''): ?>id="<?= e($controlId) ?>"<?php endif; ?>
                        <?php if ($controlClass !== ''): ?>class="<?= e($controlClass) ?>"<?php endif; ?>
                        <?php if (($control['required'] ?? false) === true): ?>required<?php endif; ?>
                        <?php foreach ($attributes as $attribute => $attributeValue): ?>
                            <?= e((string) $attribute) ?><?php if ($attributeValue !== true): ?>="<?= e((string) $attributeValue) ?>"<?php endif; ?>
                        <?php endforeach; ?>
                    >
                <?php else: ?>
                    <button
                        type="<?= e($controlType) ?>"
                        name="<?= e($controlName) ?>"
                        value="<?= e($controlValue) ?>"
                        <?php if ($controlId !== ''): ?>id="<?= e($controlId) ?>"<?php endif; ?>
                        <?php if ($controlClass !== ''): ?>class="<?= e($controlClass) ?>"<?php endif; ?>
                        <?php foreach ($attributes as $attribute => $attributeValue): ?>
                            <?= e((string) $attribute) ?><?php if ($attributeValue !== true): ?>="<?= e((string) $attributeValue) ?>"<?php endif; ?>
                        <?php endforeach; ?>
                    >
                        <?php if ($controlSrc !== ''): ?>
                            <img src="<?= asset($controlSrc) ?>" alt="<?= e($controlAlt) ?>">
                        <?php endif; ?>
                        <?= e($controlLabel) ?>
                    </button>
                <?php endif; ?>
            <?php endforeach; ?>
        <?php elseif ($class === 'ask'): ?>
            <input list="notesListe" name="<?= e((string)$name) ?>">
            <datalist id="notesListe">
                <?php foreach ($notes as $note): ?>
                    <option value="<?= e($note) ?>"></option>
                <?php endforeach; ?>
            </datalist>
            <button type="submit" class="action" name="action" value="<?= e((string)$value) ?>">
                <?= e((string)$label) ?>
            </button>
        <?php else: ?>
            <button type="submit" <?= $buttonClass ?> name="<?= e((string)$name) ?>" value="<?= e((string)$value) ?>">
                <?= e((string)$label) ?>
            </button>
        <?php endif; ?>
    </form>
<?php endforeach; ?>
