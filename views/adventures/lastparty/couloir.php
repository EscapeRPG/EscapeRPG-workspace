<?php
$content = $sceneData['content'] ?? [];
$blocks = $content['blocks'] ?? [];
$hintData = $sceneData['hintData'] ?? null;
$businessCardAcquired = (bool) ($sceneData['businessCardAcquired'] ?? false);
?>

<?php if (!$businessCardAcquired): ?>
    <div class="enigme">
        <a href="<?= asset('assets/img/lastparty/cartedevisite.png') ?>" rel="lightbox[inventaire]">
            <img src="<?= asset('assets/img/lastparty/cartedevisite.png') ?>" alt="carte de visite">
        </a>
    </div>
<?php endif; ?>

<?php require __DIR__ . '/../partials/_scene_blocks.php'; ?>

<?php if (!$businessCardAcquired): ?>
    <form action="<?= url('/aventures/lastparty/couloir') ?>" method="post">
        <button type="submit" class="action" name="action" value="take_card">Prendre.</button>
    </form>
<?php endif; ?>

<?php require __DIR__ . '/../partials/_scene_hint.php'; ?>
