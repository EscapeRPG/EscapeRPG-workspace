<?php

$slug = (string) ($adventure['slug'] ?? 'avent');
$sceneName = (string) ($scene ?? ($adventure['entry_scene'] ?? 'index'));
$currentSceneUrl = (string) (($adventure['scene_urls'][$sceneName] ?? null) ?: $sceneName);
?>

<aside>
    <img src="<?= asset('assets/img/avent/sarah.png') ?>" alt="Sarah">

    <form action="<?= e(url('/aventures/' . $slug . '/cartes')) ?>" method="post" target="_blank" rel="noreferrer">
        <input type="submit" name="cartes" value="CARTES">
    </form>

    <form action="<?= e(url('/aventures/' . $slug . '/' . ltrim($currentSceneUrl, '/'))) ?>" method="post">
        <input type="hidden" name="action" value="save_game">
        <input type="submit" name="save" value="SAUVEGARDER">
    </form>
</aside>
