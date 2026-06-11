<?php

use App\Core\View;

$inventoryItems = $state['inventory'] ?? [];
if (!is_array($inventoryItems)) {
    $inventoryItems = [];
}

$inventoryDefinitions = is_array($adventure['inventory_items'] ?? null) ? $adventure['inventory_items'] : [];
$notes = $state['notes'] ?? [];

$renderInventoryItem = static function (string $item) use ($adventure, $inventoryDefinitions): string {
    $definition = is_array($inventoryDefinitions[$item] ?? null) ? $inventoryDefinitions[$item] : null;
    if ($definition === null) {
        return e($item);
    }

    $image = (string) ($definition['image'] ?? '');
    $alt = (string) ($definition['alt'] ?? $item);
    $route = trim((string) ($definition['route'] ?? ''), '/');
    $title = e((string) ($definition['title'] ?? $alt));
    $target = (string) ($definition['target'] ?? '');
    $rel = (string) ($definition['rel'] ?? '');

    if ($image === '') {
        return e($item);
    }

    $imageHtml = '<img src="' . e(asset($image)) . '" alt="' . e($alt) . '" title="' . $title . '">';

    if ($route !== '') {
        $slug = (string) ($adventure['slug'] ?? '');
        $targetAttribute = $target !== '' ? ' target="' . e($target) . '"' : '';
        $relAttribute = $rel !== '' ? ' rel="' . e($rel) . '"' : '';

        return '<a href="' . e(url('/aventures/' . $slug . '/' . $route)) . '"' . $targetAttribute . $relAttribute . '>' . $imageHtml . '</a>';
    }

    return '<a href="' . e(asset($image)) . '" rel="lightbox[inventaire]">' . $imageHtml . '</a>';
};
?>

<?php View::start('footer'); ?>
<footer>
    <div class="adventure-footer__panel" data-footer-panel="inventory">
        <?php if ($inventoryItems !== []): ?>
            <?php foreach ($inventoryItems as $item): ?>
                <div class="inventaire-item"><?= $renderInventoryItem((string) $item) ?></div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>Il n'y a rien dans votre inventaire pour le moment.</p>
        <?php endif; ?>
    </div>

    <div class="adventure-footer__panel" data-footer-panel="notes">
        <p>
            <?php
            $displayableNotes = array_values(array_filter($notes, static fn ($note) => !is_array($note) && $note !== null && $note !== ''));
            echo $displayableNotes !== [] ? e(implode(' - ', $displayableNotes)) : 'Vous n\'avez trouvé aucune note pour le moment.';
            ?>
        </p>
    </div>
</footer>
<?php View::end(); ?>

<?php View::start('scripts'); ?>
<script src="<?= asset('assets/js/footershow.js') ?>"></script>
<?php View::end(); ?>
