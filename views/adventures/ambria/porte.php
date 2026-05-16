<?php
$slug = (string)($adventure['slug'] ?? 'ambria');
$sceneName = (string)($scene ?? 'logan_portescite');
$sceneUrl = (string)(($adventure['scene_urls'][$sceneName] ?? null) ?: $sceneName);
?>

<form action="<?= e(url('/aventures/' . $slug . '/' . ltrim($sceneUrl, '/'))) ?>" method="post">
    <div id="loganporte">
        <img src="<?= e(asset('assets/img/ambria/porte/loganporte.png')) ?>" alt="Porte de la cité d'Ambria.">
        <input list="notesListe" name="boule1" class="emplacementboule1" placeholder="0">
        <input list="notesListe" name="boule2" class="emplacementboule2" placeholder="0">
        <input list="notesListe" name="boule3" class="emplacementboule3" placeholder="0">
    </div>
    <input type="hidden" name="action" value="submit_boulets">
    <input type="submit" value="Valider.">
</form>
