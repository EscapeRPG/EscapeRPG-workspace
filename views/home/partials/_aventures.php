<div id="bloc2">
    <div class="jouer">
        <div class="dialogue">
            <div class="portrait"><img src="<?= asset('assets/img/narrateur.png') ?>" alt="narrateur"></div>
            <div class="bulleperso">
                <?php foreach (($aventures['intro'] ?? []) as $paragraph): ?>
                    <p><?= $paragraph ?></p>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <?php foreach (($aventures['sections'] ?? []) as $section): ?>
        <section class="home-adventure-section">
            <h2><?= $section['title'] ?? '' ?></h2>
            <div class="cardalign">
                <?php foreach (($section['cards'] ?? []) as $adventureCard): ?>
                    <?php require __DIR__ . '/_adventure_card.php'; ?>
                <?php endforeach; ?>
            </div>
        </section>
    <?php endforeach; ?>
</div>
