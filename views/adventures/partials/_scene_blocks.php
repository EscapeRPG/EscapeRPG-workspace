<?php
$sceneBlockConditionMatches = static function (?array $condition) use ($state): bool {
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

$sceneBlockAsset = static function (array $item) use ($sceneBlockConditionMatches): string {
    foreach (($item['src_options'] ?? []) as $option) {
        if (is_array($option) && $sceneBlockConditionMatches($option['if'] ?? null)) {
            return (string) ($option['src'] ?? '');
        }
    }

    return (string) ($item['src'] ?? '');
};
?>

<?php foreach (($blocks ?? []) as $block): ?>
    <?php
    if (is_array($block['visible_if'] ?? null) && !$sceneBlockConditionMatches($block['visible_if'])) {
        continue;
    }

    $type = $block['type'] ?? 'paragraph';

    if ($type === 'dialogue') {
        require __DIR__ . '/_dialogue.php';
        continue;
    }

    if ($type === 'comments') {
        require __DIR__ . '/_comments.php';
        continue;
    }
    ?>

    <?php if ($type === 'paragraph'): ?>
        <p><?= ($block['text'] ?? '') ?></p>
    <?php endif; ?>

    <?php if ($type === 'paragraphs'): ?>
        <?php foreach (($block['paragraphs'] ?? []) as $paragraph): ?>
            <p><?= $paragraph ?></p>
        <?php endforeach; ?>
    <?php endif; ?>

    <?php if ($type === 'linked_image'): ?>
        <?php
        $src = $sceneBlockAsset($block);
        $alt = (string) ($block['alt'] ?? '');
        $class = (string) ($block['class'] ?? 'enigme');
        ?>
        <div class="<?= e($class) ?>">
            <a href="<?= asset($src) ?>" rel="lightbox[inventaire]">
                <img src="<?= asset($src) ?>" alt="<?= e($alt) ?>">
            </a>
        </div>
    <?php endif; ?>

    <?php if ($type === 'image'): ?>
        <?php
        $src = $sceneBlockAsset($block);
        $alt = (string) ($block['alt'] ?? '');
        $class = (string) ($block['class'] ?? 'enigme');
        ?>
        <div class="<?= e($class) ?>">
            <img src="<?= asset($src) ?>" alt="<?= e($alt) ?>">
        </div>
    <?php endif; ?>

    <?php if ($type === 'interactive_image'): ?>
        <?php
        $src = $sceneBlockAsset($block);
        $alt = (string) ($block['alt'] ?? '');
        $class = (string) ($block['class'] ?? 'enigmelieu');
        $blockId = (string) ($block['id'] ?? '');
        $method = strtolower((string) ($block['method'] ?? 'post'));
        $sceneUrl = (string) (($adventure['scene_urls'][$scene] ?? null) ?: $scene);
        $formAction = $block['form_action'] ?? url('/aventures/' . ($adventure['slug'] ?? '') . '/' . ltrim($sceneUrl, '/'));
        $formClass = trim((string) ($block['form_class'] ?? ''));
        $controls = array_values(array_filter(
            $block['controls'] ?? $block['hotspots'] ?? [],
            static function ($control) use ($sceneBlockConditionMatches): bool {
                if (!is_array($control)) {
                    return false;
                }

                $condition = $control['visible_if'] ?? null;
                if (!is_array($condition)) {
                    return true;
                }

                return $sceneBlockConditionMatches($condition);
            }
        ));
        ?>
        <div class="<?= e($class) ?>"<?php if ($blockId !== ''): ?> id="<?= e($blockId) ?>"<?php endif; ?>>
            <img src="<?= asset($src) ?>" alt="<?= e($alt) ?>">
            <?php if ($controls !== []): ?>
                <form action="<?= e((string) $formAction) ?>" method="<?= e($method) ?>"<?php if ($formClass !== ''): ?> class="<?= e($formClass) ?>"<?php endif; ?>>
                    <?php foreach ($controls as $control): ?>
                        <?php
                        $controlElement = (string) ($control['element'] ?? 'button');
                        $controlType = (string) ($control['type'] ?? ($controlElement === 'button' ? 'submit' : 'text'));
                        $controlClass = trim((string) ($control['class'] ?? ''));
                        $controlId = (string) ($control['id'] ?? '');
                        $name = (string) ($control['name'] ?? 'action');
                        $value = (string) ($control['value'] ?? '');
                        $controlSrc = $sceneBlockAsset($control);
                        $controlAlt = (string) ($control['alt'] ?? '');
                        $label = (string) ($control['label'] ?? '');
                        $attributes = array_filter(
                            $control['attributes'] ?? [],
                            static fn ($value): bool => $value !== false && $value !== null
                        );
                        ?>
                        <?php if ($controlElement === 'input'): ?>
                            <input
                                type="<?= e($controlType) ?>"
                                name="<?= e($name) ?>"
                                value="<?= e($value) ?>"
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
                                name="<?= e($name) ?>"
                                value="<?= e($value) ?>"
                                <?php if ($controlId !== ''): ?>id="<?= e($controlId) ?>"<?php endif; ?>
                                <?php if ($controlClass !== ''): ?>class="<?= e($controlClass) ?>"<?php endif; ?>
                                <?php foreach ($attributes as $attribute => $attributeValue): ?>
                                    <?= e((string) $attribute) ?><?php if ($attributeValue !== true): ?>="<?= e((string) $attributeValue) ?>"<?php endif; ?>
                                <?php endforeach; ?>
                            >
                                <?php if ($controlSrc !== ''): ?>
                                    <img src="<?= asset($controlSrc) ?>" alt="<?= e($controlAlt) ?>">
                                <?php endif; ?>
                                <?= e($label) ?>
                            </button>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </form>
            <?php endif; ?>
        </div>
    <?php endif; ?>
<?php endforeach; ?>
