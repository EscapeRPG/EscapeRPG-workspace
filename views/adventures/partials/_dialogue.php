<?php
$speaker = $block['speaker'] ?? [];
$side = $speaker['side'] ?? 'left';
$isRight = $side === 'right';
$portraitClass = $isRight ? 'portrait2' : 'portrait';
$bubbleClass = $isRight ? 'bulleperso2' : 'bulleperso';
$portrait = $speaker['portrait'] ?? null;
$name = $speaker['name'] ?? 'personnage';
$paragraphs = $block['paragraphs'] ?? ($block['text'] ?? []);

if (is_string($paragraphs)) {
    $paragraphs = [$paragraphs];
}
?>
<div class="dialogue">
    <?php if (!$isRight && is_string($portrait) && $portrait !== ''): ?>
        <div class="<?= e($portraitClass) ?>">
            <img src="<?= asset($portrait) ?>" alt="<?= e((string) $name) ?>">
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
        </div>
    <?php endif; ?>
</div>
