<div id="bloc3">
    <div class="jouer">
        <div class="dialogue">
            <div class="portrait"><img src="<?= asset('assets/img/narrateur.png') ?>" alt="narrateur"></div>
            <div class="bulleperso">
                <?php foreach (($regles['intro'] ?? []) as $paragraph): ?>
                    <p><?= $paragraph ?></p>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <div class="cardalign">
        <?php foreach (($regles['cards'] ?? []) as $card): ?>
            <?php require __DIR__ . '/_card.php'; ?>
        <?php endforeach; ?>
    </div>
</div>
