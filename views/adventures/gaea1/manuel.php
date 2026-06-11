<?php $markdown = (string) ($partialData['markdown'] ?? ''); ?>

<div
    id="manuel-wrap"
    data-manuel-image-path="<?= e(asset('assets/img/gaea1/manuel/')) ?>"
    data-manuel-sound="<?= e(asset('assets/sounds/gaea1/interfaceclic.mp3')) ?>"
    data-manuel-prev="<?= e(asset('assets/img/gaea1/gauche.png')) ?>"
    data-manuel-prev-active="<?= e(asset('assets/img/gaea1/gaucheclick.png')) ?>"
    data-manuel-next="<?= e(asset('assets/img/gaea1/droite.png')) ?>"
    data-manuel-next-active="<?= e(asset('assets/img/gaea1/droiteclick.png')) ?>"
>
    <button id="precedent" type="button" data-manuel-prev-button aria-label="page précédente">
        <img src="<?= asset('assets/img/gaea1/gauche.png') ?>" id="btnPrev" alt="page précédente">
    </button>

    <div id="manuel">
        <div class="manuel-decoration"></div>
        <div class="manuel-decoration-inset"></div>
        <div id="page" aria-live="polite"></div>
    </div>

    <button id="suivant" type="button" data-manuel-next-button aria-label="page suivante">
        <img src="<?= asset('assets/img/gaea1/droite.png') ?>" id="btnNext" alt="page suivante">
    </button>
</div>

<textarea id="manuel-source" hidden readonly><?= e($markdown) ?></textarea>

<button type="button" class="action" data-manuel-close>RETOUR</button>
