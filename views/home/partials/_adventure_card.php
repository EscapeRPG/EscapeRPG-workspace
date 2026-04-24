<?php
$tag = !empty($adventureCard['href']) ? 'a' : 'div';
$attributes = !empty($adventureCard['href']) ? ' href="' . htmlspecialchars($adventureCard['href'], ENT_QUOTES, 'UTF-8') . '"' : '';
?>
<<?= $tag ?> class="card"<?= $attributes ?>>
    <div class="cardfond">
        <h3><?= htmlspecialchars($adventureCard['title'] ?? '', ENT_QUOTES, 'UTF-8') ?></h3>
        <div class="cardimage">
            <img
                src="<?= asset($adventureCard['image'] ?? '') ?>"
                alt="<?= htmlspecialchars($adventureCard['alt'] ?? '', ENT_QUOTES, 'UTF-8') ?>"
            >
        </div>
        <?php foreach (($adventureCard['paragraphs'] ?? []) as $paragraph): ?>
            <p><?= $paragraph ?></p>
        <?php endforeach; ?>
        <div class="cardFooter">
            <?php foreach (($adventureCard['stats'] ?? []) as $stat): ?>
                <div class="cardRow">
                    <<?= !empty($stat['strong']) ? 'strong' : 'span' ?>><?= htmlspecialchars($stat['label'] ?? '', ENT_QUOTES, 'UTF-8') ?> :</<?= !empty($stat['strong']) ? 'strong' : 'span' ?>>
                    <div>
                        <?php foreach (($stat['icons'] ?? []) as $icon): ?>
                            <?php
                            $iconFile = match ($icon) {
                                'full' => 'assets/img/etoile.png',
                                'half' => 'assets/img/etoiledemi.png',
                                default => 'assets/img/etoilevide.png',
                            };
                            $iconAlt = match ($icon) {
                                'full' => 'etoile pleine',
                                'half' => 'etoile demi',
                                default => 'etoile vide',
                            };
                            ?>
                            <img src="<?= asset($iconFile) ?>" alt="<?= $iconAlt ?>">
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</<?= $tag ?>>
