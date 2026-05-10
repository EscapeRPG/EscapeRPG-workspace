<?php

$sidebar = is_array($adventure['sidebar'] ?? null) ? $adventure['sidebar'] : [];
$slug = (string) ($adventure['slug'] ?? '');
$sceneName = (string) ($scene ?? '');
$stateData = is_array($state ?? null) ? $state : [];

$conditionMatches = static function (?array $condition) use ($stateData): bool {
    if ($condition === null) {
        return true;
    }

    if (isset($condition['state'])) {
        $actual = $stateData[$condition['state']] ?? null;
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

    return true;
};

$visibleInScene = static function (array $item) use ($sceneName): bool {
    $scenes = $item['visible_on'] ?? null;

    return !is_array($scenes) || in_array($sceneName, $scenes, true);
};

$resolveValue = static function (array $definition, string $key) use ($conditionMatches): string {
    foreach (($definition[$key . '_options'] ?? []) as $option) {
        if (is_array($option) && $conditionMatches($option['if'] ?? null)) {
            return (string) ($option[$key] ?? '');
        }
    }

    return (string) ($definition[$key] ?? '');
};

$routeUrl = static function (string $route) use ($slug): string {
    return url('/aventures/' . $slug . '/' . ltrim($route, '/'));
};

$renderLink = static function (array $link) use ($resolveValue, $routeUrl): void {
    $label = (string) ($link['label'] ?? '');
    $route = $resolveValue($link, 'route');
    ?>
    <a href="<?= e($routeUrl($route)) ?>"><?= e($label) ?></a>
    <?php
};

$renderNavigationItem = function (array $item) use (&$renderNavigationItem, $renderLink): void {
    $children = array_values(array_filter($item['children'] ?? [], 'is_array'));
    $tag = (string) ($item['tag'] ?? ($children === [] ? 'h2' : 'h2'));
    ?>
    <<?= e($tag) ?>><?php $renderLink($item); ?></<?= e($tag) ?>>
    <?php if ($children !== []): ?>
        <ul>
            <?php foreach ($children as $child): ?>
                <li>- <?php $renderLink($child); ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
    <?php
};

$portrait = is_array($sidebar['portrait'] ?? null) ? $sidebar['portrait'] : [];
$navigationBlocks = array_values(array_filter($sidebar['navigation'] ?? [], 'is_array'));
$forms = array_values(array_filter($sidebar['forms'] ?? [], 'is_array'));
$showControls = (bool) ($sidebar['controls']['enabled'] ?? true);
?>

<aside>
    <?php if (!empty($portrait['image'])): ?>
        <img
            src="<?= asset((string) $portrait['image']) ?>"
            alt="<?= e((string) ($portrait['alt'] ?? '')) ?>"
            <?php if (!empty($portrait['title'])): ?>title="<?= e((string) $portrait['title']) ?>"<?php endif; ?>
        >
    <?php endif; ?>

    <?php foreach ($navigationBlocks as $block): ?>
        <?php if (!$visibleInScene($block) || !$conditionMatches($block['visible_if'] ?? null)) {
            continue;
        } ?>

        <div class="<?= e((string) ($block['class'] ?? 'adventure-navigation')) ?>">
            <?php if (!empty($block['border_top'])): ?>
                <img src="<?= asset((string) $block['border_top']) ?>" alt="">
            <?php endif; ?>
            <?php if (!empty($block['title'])): ?>
                <h1><?= e((string) $block['title']) ?></h1>
            <?php endif; ?>
            <?php foreach (array_values(array_filter($block['items'] ?? [], 'is_array')) as $item): ?>
                <?php $renderNavigationItem($item); ?>
            <?php endforeach; ?>
            <?php if (!empty($block['border_bottom'])): ?>
                <img src="<?= asset((string) $block['border_bottom']) ?>" alt="">
            <?php endif; ?>
        </div>
    <?php endforeach; ?>

    <?php foreach ($forms as $form): ?>
        <?php if (!$visibleInScene($form) || !$conditionMatches($form['visible_if'] ?? null)) {
            continue;
        } ?>
        <?php
        $route = $resolveValue($form, 'route');
        $value = $resolveValue($form, 'value');
        ?>
        <form action="<?= e($routeUrl($route)) ?>" method="post">
            <button type="submit" class="<?= e((string) ($form['class'] ?? 'action')) ?>" name="<?= e((string) ($form['name'] ?? 'action')) ?>" value="<?= e($value) ?>">
                <?= e((string) ($form['label'] ?? 'Valider')) ?>
            </button>
        </form>
    <?php endforeach; ?>

    <?php if ($showControls): ?>
        <div id="inventairefooter"><input type="submit" value="INVENTAIRE"></div>
        <div id="motsdepasse"><input type="submit" value="NOTES"></div>
        <?php $currentSceneUrl = (string) (($adventure['scene_urls'][$sceneName] ?? null) ?: $sceneName); ?>
        <form action="<?= e(url('/aventures/' . $slug . '/' . ltrim($currentSceneUrl, '/'))) ?>" method="post">
            <input type="hidden" name="action" value="save_game">
            <input type="submit" name="save" value="SAUVEGARDER">
        </form>
    <?php endif; ?>
</aside>
