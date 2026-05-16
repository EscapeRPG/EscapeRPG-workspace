<div class="enigmelieu">
    <img src="<?= asset('assets/img/ambria/barrebateau.png') ?>" alt="La barre du bateau">
    <form action="<?= e(url('/aventures/' . ($adventure['slug'] ?? '') . '/' . ltrim((string) (($adventure['scene_urls'][$scene] ?? null) ?: $scene), '/'))) ?>" method="post">
        <?php for ($index = 1; $index <= 5; $index++): ?>
            <button type="submit" name="action" value="recif_<?= $index ?>" id="barre<?= $index ?>"></button>
        <?php endfor; ?>
    </form>
</div>
