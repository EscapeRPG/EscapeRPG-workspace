<?php

declare(strict_types=1);

if (PHP_SAPI !== 'cli') {
    fwrite(STDERR, "This script must be run from the command line.\n");
    exit(2);
}

$root = dirname(__DIR__);
$autoload = $root . '/vendor/autoload.php';

if (is_file($autoload)) {
    require_once $autoload;
}

if (!function_exists('asset')) {
    function asset(string $path): string
    {
        return $path;
    }
}

if (!function_exists('url')) {
    function url(string $path): string
    {
        return $path;
    }
}

if (!function_exists('e')) {
    function e(?string $value): string
    {
        return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
    }
}

$args = array_values(array_slice($argv, 1));
$all = in_array('--all', $args, true) || $args === [];
$requestedSlugs = array_values(array_filter($args, static fn (string $arg): bool => $arg !== '--all'));

$configFiles = glob($root . '/config/adventures/*.php') ?: [];
$configs = [];

foreach ($configFiles as $file) {
    $config = require $file;
    if (!is_array($config)) {
        continue;
    }

    $slug = (string) ($config['slug'] ?? basename($file, '.php'));
    if ($all || in_array($slug, $requestedSlugs, true) || in_array(basename($file, '.php'), $requestedSlugs, true)) {
        $configs[$slug] = [$file, $config];
    }
}

if ($configs === []) {
    fwrite(STDERR, "No adventure config matched the requested slug(s).\n");
    exit(2);
}

$totalErrors = 0;
$totalWarnings = 0;

foreach ($configs as $slug => [$configFile, $config]) {
    $report = validateAdventure($root, $configFile, $config);
    $totalErrors += count($report['errors']);
    $totalWarnings += count($report['warnings']);

    echo "\n== {$slug} ==\n";
    echo "Config: " . relativePath($root, $configFile) . "\n";

    if ($report['errors'] === [] && $report['warnings'] === []) {
        echo "OK: no issue found.\n";
        continue;
    }

    foreach ($report['errors'] as $message) {
        echo "[ERROR] {$message}\n";
    }

    foreach ($report['warnings'] as $message) {
        echo "[WARN]  {$message}\n";
    }
}

echo "\nSummary: {$totalErrors} error(s), {$totalWarnings} warning(s).\n";
exit($totalErrors > 0 ? 1 : 0);

/**
 * @return array{errors: list<string>, warnings: list<string>}
 */
function validateAdventure(string $root, string $configFile, array $config): array
{
    $errors = [];
    $warnings = [];

    $slug = (string) ($config['slug'] ?? '');
    $contentPath = (string) ($config['content_path'] ?? '');

    foreach (['slug', 'title', 'entry_scene', 'scenes'] as $key) {
        if (!array_key_exists($key, $config) || $config[$key] === '' || $config[$key] === []) {
            $errors[] = "Missing required config key '{$key}'.";
        }
    }

    $usesExternalContent = isset($config['flow']) || isset($config['content_files']) || ($config['layout'] ?? null) === 'adventure';
    if ($usesExternalContent && $contentPath === '') {
        $errors[] = "Missing required config key 'content_path'.";
    }

    if (!is_array($config['scenes'] ?? null)) {
        return ['errors' => $errors, 'warnings' => $warnings];
    }

    $sceneIds = array_keys($config['scenes']);
    $entryScene = (string) ($config['entry_scene'] ?? '');
    if ($entryScene !== '' && !array_key_exists($entryScene, $config['scenes'])) {
        $errors[] = "Entry scene '{$entryScene}' is not declared in scenes.";
    }

    validateViews($root, $config, $errors);
    validatePublicAssetList($root, 'styles', $config['styles'] ?? [], $errors);
    validateBannerAsset($root, $config['assets']['banner'] ?? null, $errors);
    validateSidebar($root, $config, $errors);
    validateInventoryAssets($root, $config, $errors);
    validateSceneMaps($config, $sceneIds, $errors, $warnings);
    validateContentFiles($root, $contentPath, $sceneIds, $config, $errors, $warnings);
    validateAwardedAchievements($root, $slug, $config, $errors, $warnings);

    return ['errors' => $errors, 'warnings' => $warnings];
}

function validateViews(string $root, array $config, array &$errors): void
{
    foreach (['sidebar_view', 'footer_view'] as $key) {
        if (empty($config[$key])) {
            continue;
        }

        $path = $root . '/views/' . trim((string) $config[$key], '/') . '.php';
        if (!is_file($path)) {
            $errors[] = "{$key} points to a missing view: " . relativePath($root, $path);
        }
    }

    foreach (($config['scene_views'] ?? []) as $scene => $view) {
        $path = $root . '/views/' . trim((string) $view, '/') . '.php';
        if (!is_file($path)) {
            $errors[] = "scene_views.{$scene} points to a missing view: " . relativePath($root, $path);
        }
    }
}

function validateSceneMaps(array $config, array $sceneIds, array &$errors, array &$warnings): void
{
    $sceneSet = array_fill_keys($sceneIds, true);

    foreach (['scene_urls', 'content_files'] as $mapKey) {
        foreach (($config[$mapKey] ?? []) as $scene => $value) {
            if (!isset($sceneSet[$scene])) {
                $warnings[] = "{$mapKey}.{$scene} is declared but '{$scene}' is not listed in scenes.";
            }
            if (!is_string($value) || trim($value) === '') {
                $errors[] = "{$mapKey}.{$scene} must be a non-empty string.";
            }
        }
    }

    foreach (($config['scene_aliases'] ?? []) as $alias => $scene) {
        if (!isset($sceneSet[$scene])) {
            $errors[] = "scene_aliases.{$alias} points to unknown scene '{$scene}'.";
        }
    }
}

function validateContentFiles(
    string $root,
    string $contentPath,
    array $sceneIds,
    array $config,
    array &$errors,
    array &$warnings
): void {
    if ($contentPath === '') {
        return;
    }

    $base = $root . '/app/Content/' . trim($contentPath, '/');
    if (!is_dir($base)) {
        $errors[] = "Content path does not exist: " . relativePath($root, $base);
        return;
    }

    foreach ($sceneIds as $scene) {
        $contentFile = (string) (($config['content_files'][$scene] ?? null) ?: $scene);
        $path = $base . '/' . trim($contentFile, '/') . '.php';

        if (!is_file($path)) {
            $errors[] = "Scene '{$scene}' has no content file: " . relativePath($root, $path);
            continue;
        }

        try {
            $content = require $path;
        } catch (Throwable $exception) {
            $errors[] = "Content file for scene '{$scene}' failed to load: " . $exception->getMessage();
            continue;
        }
        if (!is_array($content)) {
            $errors[] = "Content file for scene '{$scene}' must return an array.";
            continue;
        }

        if (!isset($content['variants']) || !is_array($content['variants']) || $content['variants'] === []) {
            $warnings[] = "Scene '{$scene}' has no variants array.";
        }

        validateContentAssets($root, $scene, $content, $errors);
        validateContentIds($scene, $content, $warnings);
    }
}

function validateContentAssets(string $root, string $scene, mixed $node, array &$errors, string $path = ''): void
{
    if (!is_array($node)) {
        return;
    }

    foreach ($node as $key => $value) {
        $currentPath = $path === '' ? (string) $key : $path . '.' . $key;

        if (in_array($key, ['src', 'audio', 'portrait', 'image'], true) && is_string($value)) {
            validatePublicAsset($root, "scene {$scene}:{$currentPath}", $value, $errors);
        }

        if ($key === 'scripts' && is_array($value)) {
            validatePublicAssetList($root, "scene {$scene}:scripts", $value, $errors);
        }

        if (is_array($value)) {
            validateContentAssets($root, $scene, $value, $errors, $currentPath);
        }
    }
}

function validateContentIds(string $scene, mixed $node, array &$warnings, string $path = ''): void
{
    if (!is_array($node)) {
        return;
    }

    foreach ($node as $key => $value) {
        $currentPath = $path === '' ? (string) $key : $path . '.' . $key;
        if ($key === 'id' && is_string($value) && $value !== '') {
            $warnings[] = "Scene '{$scene}' uses id '{$value}' at {$currentPath}. Prefer class/data-* unless JS requires an id.";
        }
        if (is_array($value)) {
            validateContentIds($scene, $value, $warnings, $currentPath);
        }
    }
}

function validateInventoryAssets(string $root, array $config, array &$errors): void
{
    $sceneAliases = is_array($config['scene_aliases'] ?? null) ? $config['scene_aliases'] : [];
    $scenes = is_array($config['scenes'] ?? null) ? $config['scenes'] : [];

    foreach (($config['inventory_items'] ?? []) as $item => $definition) {
        if (!is_array($definition)) {
            continue;
        }
        validatePublicAsset($root, "inventory_items.{$item}.image", $definition['image'] ?? null, $errors);

        $route = trim((string) ($definition['route'] ?? ''), '/');
        if ($route === '') {
            continue;
        }

        $targetScene = (string) (($sceneAliases[$route] ?? null) ?: $route);
        if (!array_key_exists($targetScene, $scenes)) {
            $errors[] = "inventory_items.{$item}.route points to unknown scene route '{$route}'.";
        }
    }
}

function validateSidebar(string $root, array $config, array &$errors): void
{
    $sidebar = $config['sidebar'] ?? null;
    if (!is_array($sidebar)) {
        return;
    }

    $sceneAliases = is_array($config['scene_aliases'] ?? null) ? $config['scene_aliases'] : [];
    $scenes = is_array($config['scenes'] ?? null) ? $config['scenes'] : [];

    validatePublicAsset($root, 'sidebar.portrait.image', $sidebar['portrait']['image'] ?? null, $errors);

    foreach (($sidebar['navigation'] ?? []) as $index => $block) {
        if (!is_array($block)) {
            continue;
        }

        validatePublicAsset($root, "sidebar.navigation.{$index}.border_top", $block['border_top'] ?? null, $errors);
        validatePublicAsset($root, "sidebar.navigation.{$index}.border_bottom", $block['border_bottom'] ?? null, $errors);
        validateSidebarScenes($block['visible_on'] ?? null, $scenes, "sidebar.navigation.{$index}.visible_on", $errors);
        validateSidebarRoutes($block['items'] ?? [], $sceneAliases, $scenes, "sidebar.navigation.{$index}.items", $errors);
    }

    foreach (($sidebar['forms'] ?? []) as $index => $form) {
        if (!is_array($form)) {
            continue;
        }

        validateSidebarScenes($form['visible_on'] ?? null, $scenes, "sidebar.forms.{$index}.visible_on", $errors);
        validateRouteValue($form['route'] ?? null, $sceneAliases, $scenes, "sidebar.forms.{$index}.route", $errors);
        foreach (($form['route_options'] ?? []) as $optionIndex => $option) {
            if (is_array($option)) {
                validateRouteValue($option['route'] ?? null, $sceneAliases, $scenes, "sidebar.forms.{$index}.route_options.{$optionIndex}.route", $errors);
            }
        }
    }
}

function validateSidebarScenes(mixed $visibleOn, array $scenes, string $label, array &$errors): void
{
    if (!is_array($visibleOn)) {
        return;
    }

    foreach ($visibleOn as $index => $scene) {
        if (!is_string($scene) || !array_key_exists($scene, $scenes)) {
            $errors[] = "{$label}.{$index} points to unknown scene '{$scene}'.";
        }
    }
}

function validateSidebarRoutes(mixed $items, array $sceneAliases, array $scenes, string $label, array &$errors): void
{
    if (!is_array($items)) {
        return;
    }

    foreach ($items as $index => $item) {
        if (!is_array($item)) {
            continue;
        }

        validateRouteValue($item['route'] ?? null, $sceneAliases, $scenes, "{$label}.{$index}.route", $errors);
        foreach (($item['route_options'] ?? []) as $optionIndex => $option) {
            if (is_array($option)) {
                validateRouteValue($option['route'] ?? null, $sceneAliases, $scenes, "{$label}.{$index}.route_options.{$optionIndex}.route", $errors);
            }
        }
        validateSidebarRoutes($item['children'] ?? [], $sceneAliases, $scenes, "{$label}.{$index}.children", $errors);
    }
}

function validateRouteValue(mixed $route, array $sceneAliases, array $scenes, string $label, array &$errors): void
{
    if (!is_string($route) || trim($route) === '') {
        return;
    }

    $route = trim($route, '/');
    $targetScene = (string) (($sceneAliases[$route] ?? null) ?: $route);
    if (!array_key_exists($targetScene, $scenes)) {
        $errors[] = "{$label} points to unknown scene route '{$route}'.";
    }
}

function validatePublicAssetList(string $root, string $label, mixed $assets, array &$errors): void
{
    if (!is_array($assets)) {
        return;
    }

    foreach ($assets as $index => $asset) {
        validatePublicAsset($root, "{$label}.{$index}", $asset, $errors);
    }
}

function validateBannerAsset(string $root, mixed $banner, array &$errors): void
{
    if (is_array($banner)) {
        foreach ($banner as $key => $asset) {
            validatePublicAsset($root, 'assets.banner.' . (string) $key, $asset, $errors);
        }

        return;
    }

    validatePublicAsset($root, 'assets.banner', $banner, $errors);
}

function validatePublicAsset(string $root, string $label, mixed $asset, array &$errors): void
{
    if (!is_string($asset) || trim($asset) === '') {
        return;
    }

    if (preg_match('/^(https?:)?\/\//', $asset) || str_starts_with($asset, 'data:')) {
        return;
    }

    $asset = ltrim($asset, '/');
    $path = $root . '/public/' . $asset;

    if (!is_file($path)) {
        $errors[] = "{$label} points to missing asset: {$asset}";
    }
}

function validateAwardedAchievements(string $root, string $slug, array $config, array &$errors, array &$warnings): void
{
    $serviceRoot = $root . '/app/Services/Adventures';
    if (!is_dir($serviceRoot)) {
        return;
    }

    $iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($serviceRoot));
    $achievements = [];
    $publicAchievements = $config['public_achievements'] ?? null;
    $publicAchievementSet = is_array($publicAchievements)
        ? array_fill_keys(array_map('strval', $publicAchievements), true)
        : null;

    foreach ($iterator as $file) {
        if (!$file->isFile() || $file->getExtension() !== 'php') {
            continue;
        }

        $contents = (string) file_get_contents($file->getPathname());
        if (!str_contains($contents, "'scenario' => '{$slug}'") && !str_contains($contents, "\"scenario\" => \"{$slug}\"")) {
            continue;
        }

        if (preg_match_all("/['\"]scenario['\"]\s*=>\s*['\"]" . preg_quote($slug, '/') . "['\"]\s*,\s*['\"]name['\"]\s*=>\s*['\"]([^'\"]+)['\"]/", $contents, $matches)) {
            foreach ($matches[1] as $name) {
                $achievements[$name] = true;
            }
        }
    }

    foreach (array_keys($achievements) as $name) {
        $image = $root . '/public/assets/img/succes/' . $slug . '/' . $name . '.png';
        if (!is_file($image)) {
            $errors[] = "Achievement '{$slug}:{$name}' has no image: " . relativePath($root, $image);
        }

        if (is_array($publicAchievementSet) && !isset($publicAchievementSet[$name])) {
            continue;
        }

        $offImage = $root . '/public/assets/img/succes/' . $slug . '/' . $name . 'off.png';
        if (!is_file($offImage)) {
            $warnings[] = "Achievement '{$slug}:{$name}' has no locked image variant: " . relativePath($root, $offImage);
        }
    }
}

function relativePath(string $root, string $path): string
{
    $root = str_replace('\\', '/', rtrim($root, '/\\'));
    $path = str_replace('\\', '/', $path);

    if (str_starts_with($path, $root . '/')) {
        return substr($path, strlen($root) + 1);
    }

    return $path;
}
