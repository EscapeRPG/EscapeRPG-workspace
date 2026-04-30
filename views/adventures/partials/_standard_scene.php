<?php

$content = $sceneData['content'] ?? [];
$blocks = $content['blocks'] ?? [];
$actions = $content['actions'] ?? [];
$hintData = $sceneData['hintData'] ?? null;
$renderSceneActions = $renderSceneActions ?? true;
$renderSceneHint = $renderSceneHint ?? true;

require __DIR__ . '/_scene_blocks.php';

if ($renderSceneActions) {
    require __DIR__ . '/_scene_actions.php';
}

if ($renderSceneHint) {
    require __DIR__ . '/_scene_hint.php';
}

unset($renderSceneActions, $renderSceneHint);
