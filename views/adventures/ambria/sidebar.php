<?php

$slug = (string)($adventure['slug'] ?? '');
$sceneName = (string)($scene ?? '');
$stateData = is_array($state ?? null) ? $state : [];
$activePlayer = (string)($stateData['active_player'] ?? '');
$sidebar = is_array($adventure['sidebar'] ?? null) ? $adventure['sidebar'] : [];

$conditionMatches = null;
$conditionMatches = static function (?array $condition) use ($stateData, &$conditionMatches): bool {
    if ($condition === null) {
        return true;
    }

    if (isset($condition['all']) && is_array($condition['all'])) {
        foreach ($condition['all'] as $subCondition) {
            if (!is_array($subCondition) || !$conditionMatches($subCondition)) {
                return false;
            }
        }

        return true;
    }

    if (isset($condition['any']) && is_array($condition['any'])) {
        foreach ($condition['any'] as $subCondition) {
            if (is_array($subCondition) && $conditionMatches($subCondition)) {
                return true;
            }
        }

        return false;
    }

    if (isset($condition['not']) && is_array($condition['not'])) {
        return !$conditionMatches($condition['not']);
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
            return (bool)$actual;
        }
        if (($condition['falsy'] ?? false) === true) {
            return !(bool)$actual;
        }
    }

    return true;
};

$visibleInScene = static function (array $item) use ($sceneName): bool {
    $scenes = $item['visible_on'] ?? null;

    return !is_array($scenes) || in_array($sceneName, $scenes, true);
};

$routeUrl = static function (string $route) use ($slug): string {
    return url('/aventures/' . $slug . '/' . ltrim($route, '/'));
};

$renderNavigationLink = static function (array $link) use ($routeUrl): void {
    ?>
    <a href="<?= e($routeUrl((string)($link['route'] ?? ''))) ?>"><?= e((string)($link['label'] ?? '')) ?></a>
    <?php
};

$renderNavigationItem = function (array $item) use (&$renderNavigationItem, $renderNavigationLink, $conditionMatches): void {
    if (!$conditionMatches($item['visible_if'] ?? null)) {
        return;
    }

    $children = array_values(array_filter(
            $item['children'] ?? [],
            static fn ($child): bool => is_array($child) && $conditionMatches($child['visible_if'] ?? null),
    ));
    ?>
    <h2><?php $renderNavigationLink($item); ?></h2>
    <?php if ($children !== []): ?>
        <ul>
            <?php foreach ($children as $child): ?>
                <li><?php $renderNavigationLink($child); ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
    <?php
};

$portrait = [
        'image' => 'assets/img/ambria/ambriamedaillon.png',
        'alt' => "Le Trésor d'Ambria",
        'title' => "Le Trésor d'Ambria",
];

if ($activePlayer === 'logan' || str_starts_with($sceneName, 'logan_')) {
    $portrait = [
            'image' => 'assets/img/ambria/loganbarthelemymini.png',
            'alt' => 'Logan Barthélémy',
            'title' => 'Logan Barthélémy',
    ];
}

if ($activePlayer === 'sullivan' || str_starts_with($sceneName, 'sullivan_')) {
    $portrait = [
            'image' => 'assets/img/ambria/sullivanmasonmini.png',
            'alt' => 'Sullivan Mason',
            'title' => 'Sullivan Mason',
    ];
}

$currentSceneUrl = (string)(($adventure['scene_urls'][$sceneName] ?? null) ?: $sceneName);
?>

<aside>
    <a href="<?= e(asset($portrait['image'])) ?>" rel="lightbox[portrait]" title="<?= e($portrait['title']) ?>">
        <img src="<?= e(asset($portrait['image'])) ?>" alt="<?= e($portrait['alt']) ?>">
    </a>

    <div id="inventairefooter"><input type="submit" value="INVENTAIRE"></div>
    <div id="motsdepasse"><input type="submit" value="NOTES"></div>
    <form action="<?= e(url('/aventures/' . $slug . '/' . ltrim($currentSceneUrl, '/'))) ?>" method="post">
        <input type="hidden" name="action" value="save_game">
        <input type="submit" name="save" value="SAUVEGARDER">
    </form>

    <?php foreach (array_values(array_filter($sidebar['navigation'] ?? [], 'is_array')) as $navigationBlock): ?>
        <?php if (!$visibleInScene($navigationBlock) || !$conditionMatches($navigationBlock['visible_if'] ?? null)) {
            continue;
        } ?>

        <div class="<?= e((string)($navigationBlock['class'] ?? 'adventure-navigation')) ?>">
            <?php if (!empty($navigationBlock['title'])): ?>
                <h1><?= e((string)$navigationBlock['title']) ?></h1>
            <?php endif; ?>
            <?php foreach (array_values(array_filter($navigationBlock['items'] ?? [], 'is_array')) as $navigationItem): ?>
                <?php $renderNavigationItem($navigationItem); ?>
            <?php endforeach; ?>
        </div>
    <?php endforeach; ?>

    <!-- Temporaire migration Ambria : retirer apres validation complete du scenario. -->
    <div class="ambria-confidence-debug">
        <span>Logan : <?= e((string)($stateData['loganconfiance'] ?? 0)) ?></span>
        <span>Sullivan : <?= e((string)($stateData['sullivanconfiance'] ?? 0)) ?></span>
    </div>
</aside>
