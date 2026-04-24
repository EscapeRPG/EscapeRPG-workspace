<div class="card">
    <div class="cardfond">
        <h3><?= htmlspecialchars($card['title'] ?? '', ENT_QUOTES, 'UTF-8') ?></h3>
        <div class="cardimage">
            <img
                src="<?= asset($card['image'] ?? '') ?>"
                alt="<?= htmlspecialchars($card['alt'] ?? '', ENT_QUOTES, 'UTF-8') ?>"
            >
        </div>
        <?php foreach (($card['paragraphs'] ?? []) as $paragraph): ?>
            <p><?= htmlspecialchars($paragraph, ENT_QUOTES, 'UTF-8') ?></p>
        <?php endforeach; ?>
        <?php foreach (($card['html_paragraphs'] ?? []) as $paragraph): ?>
            <p><?= $paragraph ?></p>
        <?php endforeach; ?>
    </div>
</div>
