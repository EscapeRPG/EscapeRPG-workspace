<?php foreach (($blocks ?? []) as $block): ?>
    <?php
    $type = $block['type'] ?? 'paragraph';

    if ($type === 'dialogue') {
        require __DIR__ . '/_dialogue.php';
        continue;
    }
    ?>

    <?php if ($type === 'paragraph'): ?>
        <p><?= ($block['text'] ?? '') ?></p>
    <?php endif; ?>

    <?php if ($type === 'paragraphs'): ?>
        <?php foreach (($block['paragraphs'] ?? []) as $paragraph): ?>
            <p><?= $paragraph ?></p>
        <?php endforeach; ?>
    <?php endif; ?>
<?php endforeach; ?>
