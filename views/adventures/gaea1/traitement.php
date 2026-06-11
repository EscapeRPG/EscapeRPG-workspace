<?php $assetBase = 'assets/img/gaea1/traitement/'; ?>

<div
    id="ecransignal"
    data-treatment-image-base="<?= e(asset($assetBase)) ?>"
    data-treatment-sound-base="<?= e(asset('assets/sounds/gaea1/')) ?>"
>
    <img src="<?= asset('assets/img/gaea1/traitement/ecransignal.png') ?>" alt="">
    <img src="<?= asset('assets/img/gaea1/traitement/signal.png') ?>" id="signal" alt="">
    <img src="<?= asset('assets/img/gaea1/traitement/signaloverlay.png') ?>" id="canvasoverlay" alt="">

    <div class="controls-onde">
        <button type="button" id="haut" data-treatment-control="amplitude" data-direction="1">
            <img src="<?= asset($assetBase . 'haut.png') ?>" data-default-src="<?= asset($assetBase . 'haut.png') ?>" data-active-src="<?= asset($assetBase . 'hautclick.png') ?>" alt="haut">
        </button>
        <button type="button" id="droite" data-treatment-control="onde" data-direction="1">
            <img src="<?= asset($assetBase . 'droite.png') ?>" data-default-src="<?= asset($assetBase . 'droite.png') ?>" data-active-src="<?= asset($assetBase . 'droiteclick.png') ?>" alt="droite">
        </button>
        <button type="button" id="bas" data-treatment-control="amplitude" data-direction="-1">
            <img src="<?= asset($assetBase . 'bas.png') ?>" data-default-src="<?= asset($assetBase . 'bas.png') ?>" data-active-src="<?= asset($assetBase . 'basclick.png') ?>" alt="bas">
        </button>
        <button type="button" id="gauche" data-treatment-control="onde" data-direction="-1">
            <img src="<?= asset($assetBase . 'gauche.png') ?>" data-default-src="<?= asset($assetBase . 'gauche.png') ?>" data-active-src="<?= asset($assetBase . 'gaucheclick.png') ?>" alt="gauche">
        </button>
    </div>
</div>

<div class="onde">
    <div class="ondes">
        <div class="onde-title">Longueur d'onde</div>
        <div id="ondetext">0</div>
    </div>
    <div class="ondes">
        <div class="onde-title">Amplitude</div>
        <div id="amplitudetext">0</div>
    </div>
</div>

<form action="<?= e(url('/aventures/gaea1/signalt')) ?>" method="post">
    <input type="number" name="onde" id="inputspeed" value="6" class="hidden">
    <input type="number" name="amplitude" id="inputpitch" value="-3" class="hidden">
    <button type="submit" class="action" name="action" value="validate_treatment">valider.</button>
</form>
