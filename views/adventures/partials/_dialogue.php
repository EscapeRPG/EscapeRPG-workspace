<?php
$speaker = $block['speaker'] ?? [];
$side = $speaker['side'] ?? 'left';
$isRight = $side === 'right';
$name = $speaker['name'] ?? 'personnage';
$speakerName = mb_strtolower((string) $name, 'UTF-8');
$isNarrator = $speakerName === 'narrateur';
$isMarv = $speakerName === 'm.a.r-v' || $speakerName === 'm-a-r-v';
$dialogueClass = 'dialogue' . ($isNarrator ? ' dialogue-narrateur' : '');
$portraitClass = $isMarv ? 'marv' : ($isRight ? 'portrait2' : 'portrait');
$portraitClass .= $isNarrator ? ' portrait-narrateur' : '';
if ($isMarv) {
    $bubbleClass = 'bullemarv';
} else {
    $bubbleClass = $isRight ? 'bulleperso2' : 'bulleperso';
}
$portrait = $speaker['portrait'] ?? null;
$portraitOverlayFrom = $speaker['portrait_overlay_from'] ?? null;
$paragraphs = $block['paragraphs'] ?? ($block['text'] ?? []);

if (is_string($paragraphs)) {
    $paragraphs = [$paragraphs];
}
?>
<div class="<?= e($dialogueClass) ?>">
    <?php if (!$isRight && is_string($portrait) && $portrait !== ''): ?>
        <div class="<?= e($portraitClass) ?>">
            <img src="<?= asset($portrait) ?>" alt="<?= e((string) $name) ?>">
            <?php if (is_string($portraitOverlayFrom) && $portraitOverlayFrom !== ''): ?>
                <?= $sceneData[$portraitOverlayFrom] ?? '' ?>
            <?php endif; ?>
        </div>
    <?php endif; ?>

    <div class="<?= e($bubbleClass) ?>">
        <?php foreach ($paragraphs as $paragraph): ?>
            <p><?= $paragraph ?></p>
        <?php endforeach; ?>
    </div>

    <?php if ($isRight && is_string($portrait) && $portrait !== ''): ?>
        <div class="<?= e($portraitClass) ?>">
            <img src="<?= asset($portrait) ?>" alt="<?= e((string) $name) ?>">
            <?php if (is_string($portraitOverlayFrom) && $portraitOverlayFrom !== ''): ?>
                <?= $sceneData[$portraitOverlayFrom] ?? '' ?>
            <?php endif; ?>
        </div>
    <?php endif; ?>
</div>
