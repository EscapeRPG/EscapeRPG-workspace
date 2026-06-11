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

if ($all) {
    $globalWarnings = validateGlobalStyleReferences($root);
    $totalWarnings += count($globalWarnings);

    if ($globalWarnings !== []) {
        echo "\n== global styles ==\n";
        foreach ($globalWarnings as $message) {
            echo "[WARN]  {$message}\n";
        }
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
    validateContentActions($root, $config, $contentPath, $sceneIds, $warnings);
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
        validateMarkdownReferences($root, $scene, $path, $warnings);
    }
}

function validateMarkdownReferences(string $root, string $scene, string $contentPath, array &$warnings): void
{
    $source = (string) file_get_contents($contentPath);

    if (!preg_match_all("/['\"]([a-z0-9_\\/-]+#[a-zA-Z0-9_\\-]+)['\"]/", $source, $matches)) {
        return;
    }

    foreach (array_unique($matches[1]) as $reference) {
        [$fileReference, $section] = explode('#', $reference, 2);
        $markdownPath = $root . '/content/adventures/' . trim($fileReference, '/') . '.md';

        if (!is_file($markdownPath)) {
            $warnings[] = "Scene '{$scene}' references missing markdown file: " . relativePath($root, $markdownPath);
            continue;
        }

        $markdown = (string) file_get_contents($markdownPath);
        $isHintReference = str_ends_with($fileReference, '/hints') || $fileReference === 'hints';
        $sectionExists = markdownSectionExists($markdown, $section);

        if (!$sectionExists && $isHintReference) {
            $sectionExists = markdownSectionExistsWithPrefix($markdown, $section . '_');
        }

        if (!$sectionExists) {
            $warnings[] = "Scene '{$scene}' references missing markdown section '{$reference}'.";
        }
    }
}

function markdownSectionExists(string $markdown, string $section): bool
{
    foreach (markdownSections($markdown) as $heading) {
        if ($heading === $section) {
            return true;
        }
    }

    return false;
}

function markdownSectionExistsWithPrefix(string $markdown, string $prefix): bool
{
    foreach (markdownSections($markdown) as $heading) {
        if (str_starts_with($heading, $prefix)) {
            return true;
        }
    }

    return false;
}

/**
 * @return list<string>
 */
function markdownSections(string $markdown): array
{
    $sections = [];

    foreach (preg_split('/\R/', $markdown) ?: [] as $line) {
        $line = ltrim($line, "\xEF\xBB\xBF");
        if (str_starts_with($line, '## ')) {
            $sections[] = trim(substr($line, 3));
        }
    }

    return $sections;
}

function validateContentAssets(string $root, string $scene, mixed $node, array &$errors, string $path = ''): void
{
    if (!is_array($node)) {
        return;
    }

    if (($node['allow_missing_asset'] ?? false) === true) {
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
        if ($key === 'id' && is_string($value) && $value !== '' && ($node['id_required'] ?? false) !== true) {
            $warnings[] = "Scene '{$scene}' uses id '{$value}' at {$currentPath}. Prefer class/data-* unless JS requires an id.";
        }
        if (is_array($value)) {
            validateContentIds($scene, $value, $warnings, $currentPath);
        }
    }
}

function validateContentActions(string $root, array $config, string $contentPath, array $sceneIds, array &$warnings): void
{
    if ($contentPath === '') {
        return;
    }

    $base = $root . '/app/Content/' . trim($contentPath, '/');
    if (!is_dir($base)) {
        return;
    }

    $handledActions = handledScenarioActions($root, $config);
    if ($handledActions === []) {
        return;
    }

    foreach ($sceneIds as $scene) {
        $contentFile = (string) (($config['content_files'][$scene] ?? null) ?: $scene);
        $path = $base . '/' . trim($contentFile, '/') . '.php';
        if (!is_file($path)) {
            continue;
        }

        try {
            $content = require $path;
        } catch (Throwable) {
            continue;
        }

        foreach (contentActionValues($content) as $action) {
            if (
                !isset($handledActions[$action])
                && !handledActionPrefixExists($action, $handledActions)
                && !scenarioSourceContains($root, $config, $action)
            ) {
                $warnings[] = "Scene '{$scene}' declares action '{$action}' but no matching handler action was found.";
            }
        }
    }
}

function scenarioSourceContains(string $root, array $config, string $needle): bool
{
    $scenarioDir = scenarioServiceDirectory($root, $config);
    if ($scenarioDir === null || !is_dir($scenarioDir)) {
        return false;
    }

    $iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($scenarioDir));
    foreach ($iterator as $file) {
        if (!$file->isFile() || $file->getExtension() !== 'php') {
            continue;
        }

        if (str_contains((string) file_get_contents($file->getPathname()), $needle)) {
            return true;
        }
    }

    return false;
}

/**
 * @param array<string, true> $handledActions
 */
function handledActionPrefixExists(string $action, array $handledActions): bool
{
    if (!preg_match('/^(.*_)\d+$/', $action, $matches)) {
        return false;
    }

    $prefix = $matches[1];
    foreach (array_keys($handledActions) as $handledAction) {
        if ($handledAction !== $action && str_starts_with($handledAction, $prefix)) {
            return true;
        }
    }

    return false;
}

/**
 * @return array<string, true>
 */
function handledScenarioActions(string $root, array $config): array
{
    $actions = [
        'request_hint' => true,
        'show_answer' => true,
        'save_game' => true,
        'load_game' => true,
        'submit_load_game' => true,
        'submit_save_game' => true,
    ];

    foreach (scenarioFlowActions($root, $config) as $action) {
        $actions[$action] = true;
    }

    $scenarioDir = scenarioServiceDirectory($root, $config);
    if ($scenarioDir === null || !is_dir($scenarioDir)) {
        return $actions;
    }

    $iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($scenarioDir));
    foreach ($iterator as $file) {
        if (!$file->isFile() || $file->getExtension() !== 'php') {
            continue;
        }

        $source = (string) file_get_contents($file->getPathname());
        foreach (extractHandledActionStrings($source) as $action) {
            $actions[$action] = true;
        }
    }

    return $actions;
}

/**
 * @return list<string>
 */
function scenarioFlowActions(string $root, array $config): array
{
    $slug = (string) ($config['slug'] ?? '');
    $path = $root . '/config/adventures/' . $slug . '/flow.php';
    if ($slug === '' || !is_file($path)) {
        return [];
    }

    $definitions = require $path;
    if (!is_array($definitions)) {
        return [];
    }

    $actions = [];
    foreach ($definitions as $definition) {
        if (!is_array($definition)) {
            continue;
        }
        foreach (array_keys((array) ($definition['actions'] ?? [])) as $action) {
            if (is_string($action) && $action !== '') {
                $actions[] = $action;
            }
        }
    }

    return array_values(array_unique($actions));
}

function scenarioServiceDirectory(string $root, array $config): ?string
{
    $flow = (string) ($config['flow'] ?? '');
    $prefix = 'App\\Services\\Adventures\\Scenarios\\';
    $scenarioNamespace = '';

    if ($flow !== '' && str_starts_with($flow, $prefix)) {
        $relative = substr($flow, strlen($prefix));
        $parts = explode('\\', $relative);
        $scenarioNamespace = $parts[0] ?? '';
    }

    if ($scenarioNamespace === '') {
        $contentPath = trim((string) ($config['content_path'] ?? ''), '/\\');
        $contentParts = preg_split('/[\/\\\\]/', $contentPath) ?: [];
        $scenarioNamespace = (string) end($contentParts);
    }

    if ($scenarioNamespace === '') {
        return null;
    }

    return $root . '/app/Services/Adventures/Scenarios/' . $scenarioNamespace;
}

/**
 * @return list<string>
 */
function extractHandledActionStrings(string $source): array
{
    $actions = [];
    $patterns = [
        '/\\$action\\s*={2,3}\\s*[\'"]([^\'"]+)[\'"]/',
        '/\\$action\\s*!={1,2}\\s*[\'"]([^\'"]+)[\'"]/',
        '/post\\(\\s*[\'"]action[\'"][^)]*\\)\\s*={2,3}\\s*[\'"]([^\'"]+)[\'"]/',
        '/^\\s*[\'"]([^\'"]+)[\'"]\\s*(?:,|=>)/m',
        '/,\\s*[\'"]([^\'"]+)[\'"]\\s*(?:,|=>)/',
        '/[\'"]([^\'"]+)[\'"]\\s*=>/',
        '/case\\s+[\'"]([^\'"]+)[\'"]\\s*:/',
    ];

    foreach ($patterns as $pattern) {
        if (!preg_match_all($pattern, $source, $matches)) {
            continue;
        }
        foreach ($matches[1] as $action) {
            if (isActionLikeString($action)) {
                $actions[] = $action;
            }
        }
    }

    if (preg_match_all('/[\'"]([^\'"]+)[\'"]/', $source, $matches)) {
        foreach ($matches[1] as $action) {
            if (isActionLikeString($action)) {
                $actions[] = $action;
            }
        }
    }

    return array_values(array_unique($actions));
}

/**
 * @return list<string>
 */
function contentActionValues(mixed $content): array
{
    $actions = [];

    if (!is_array($content)) {
        return [];
    }

    foreach ((array) ($content['variants'] ?? []) as $variant) {
        if (!is_array($variant)) {
            continue;
        }

        foreach ((array) ($variant['actions'] ?? []) as $action) {
            if (is_array($action) && actionNodeUsesActionPostName($action)) {
                $value = $action['value'] ?? null;
                if (is_string($value) && isActionLikeString($value)) {
                    $actions[] = $value;
                }
            }
        }

        collectInteractiveActionValues((array) ($variant['blocks'] ?? []), $actions);
    }

    return array_values(array_unique($actions));
}

function collectInteractiveActionValues(mixed $node, array &$actions): void
{
    if (!is_array($node)) {
        return;
    }

    if (($node['type'] ?? null) === 'interactive_image') {
        foreach (($node['controls'] ?? $node['hotspots'] ?? []) as $control) {
            if (!is_array($control) || !actionNodeUsesActionPostName($control)) {
                continue;
            }

            $value = $control['value'] ?? null;
            if (is_string($value) && isActionLikeString($value)) {
                $actions[] = $value;
            }
        }
    }

    foreach ($node as $value) {
        if (is_array($value)) {
            collectInteractiveActionValues($value, $actions);
        }
    }
}

function actionNodeUsesActionPostName(array $node): bool
{
    return !isset($node['name']) || $node['name'] === 'action';
}

function isActionLikeString(string $value): bool
{
    return $value !== ''
        && preg_match('/^[a-z][a-z0-9_:-]*$/', $value) === 1
        && !str_contains($value, '#')
        && !str_contains($value, '/');
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

/**
 * @return list<string>
 */
function validateGlobalStyleReferences(string $root): array
{
    $warnings = [];
    $publicRoot = $root . '/public';
    $stylesRoot = $publicRoot . '/assets/styles';

    if (!is_dir($stylesRoot)) {
        return $warnings;
    }

    $ignored = [
        'assets/styles/polls/style.css' => true,
    ];
    $referencedAssets = collectReferencedPublicAssets($root);
    $iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($stylesRoot));

    foreach ($iterator as $file) {
        if (!$file->isFile() || strtolower($file->getExtension()) !== 'css') {
            continue;
        }

        $asset = normalizePublicAssetPath($publicRoot, $file->getPathname());
        if ($asset === null || isset($ignored[$asset]) || isset($referencedAssets[$asset])) {
            continue;
        }

        $warnings[] = "Unreferenced public stylesheet: {$asset}";
    }

    sort($warnings);

    return $warnings;
}

/**
 * @return array<string, true>
 */
function collectReferencedPublicAssets(string $root): array
{
    $references = [];
    $sourceRoots = ['app', 'config', 'public', 'views'];

    foreach ($sourceRoots as $sourceRoot) {
        $directory = $root . '/' . $sourceRoot;
        if (!is_dir($directory)) {
            continue;
        }

        $iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($directory));
        foreach ($iterator as $file) {
            if (!$file->isFile() || !in_array(strtolower($file->getExtension()), ['php', 'js', 'json'], true)) {
                continue;
            }

            $source = (string) file_get_contents($file->getPathname());
            if (!preg_match_all('#/?assets/styles/[a-zA-Z0-9_./-]+\.css#', $source, $matches)) {
                continue;
            }

            foreach ($matches[0] as $asset) {
                $references[ltrim(str_replace('\\', '/', $asset), '/')] = true;
            }
        }
    }

    return $references;
}

function normalizePublicAssetPath(string $publicRoot, string $path): ?string
{
    $publicRoot = str_replace('\\', '/', rtrim($publicRoot, '/\\'));
    $path = str_replace('\\', '/', $path);

    if (!str_starts_with($path, $publicRoot . '/')) {
        return null;
    }

    return substr($path, strlen($publicRoot) + 1);
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
