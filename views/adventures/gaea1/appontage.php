<?php $assetBase = 'assets/img/gaea1/appontage/'; ?>
<?php $messageParagraphs = $partialData['message'] ?? []; ?>

<div class="dialogue">
    <div class="marv"><img src="<?= asset('assets/img/gaea1/marv.png') ?>" alt="M.A.R-V"></div>
    <div class="bullemarv">
        <?php foreach ($messageParagraphs as $index => $paragraph): ?>
            <p<?= $index === 0 ? ' id="bulleappontage"' : '' ?>><?= $paragraph ?></p>
        <?php endforeach; ?>
        <p id="compteur">
            Il reste actuellement <span id="valdist">10</span> mètres à parcourir pour atteindre le sol.
        </p>
    </div>
</div>

<div
    id="canvas-wrap"
    class="appontage-console"
    data-appontage-image-base="<?= e(asset($assetBase)) ?>"
    data-appontage-sound-base="<?= e(asset('assets/sounds/gaea1/')) ?>"
>
    <img src="<?= asset($assetBase . 'cockpit.png') ?>" alt="">
    <div id="appontagehangar"><img src="<?= asset($assetBase . 'hangar.png') ?>" id="hangar" alt=""></div>
    <div id="lumieres"><img src="<?= asset('assets/img/gaea1/hangarsas/lumieres.png') ?>" alt=""></div>
    <div id="canvascockpit"><img src="<?= asset($assetBase . 'cockpit.png') ?>" id="cockpit" alt=""></div>

    <button type="button" id="thrusters" aria-label="amorcer la descente"></button>
    <button type="button" id="propulseurs" class="eventsoff" aria-label="couper les propulseurs">
        <img src="<?= asset($assetBase . 'propulseurson.png') ?>" id="propulimg" alt="">
    </button>

    <div id="assiette"><img src="<?= asset($assetBase . 'assiettenormale.png') ?>" id="assietteimg" alt=""></div>
    <button type="button" id="joystick_gauche" class="hidden" data-appontage-tilt="-1" aria-label="corriger l'assiette vers la gauche">
        <img src="<?= asset($assetBase . 'assiettegauche.png') ?>" id="assiettegauche" alt="">
    </button>
    <button type="button" id="joystick_droite" class="hidden" data-appontage-tilt="1" aria-label="corriger l'assiette vers la droite">
        <img src="<?= asset($assetBase . 'assiettedroite.png') ?>" id="assiettedroite" alt="">
    </button>
    <button type="button" id="trainsatterrissage" class="hidden" aria-label="sortir les trains d'atterrissage">
        <img src="<?= asset($assetBase . 'trainsatt.png') ?>" alt="">
    </button>

    <div id="canvascollision">
        <div id="croixgrisediv"><img src="<?= asset($assetBase . 'croixgrise.png') ?>" id="croixgrise" alt=""></div>
        <div id="croixrougediv"><img src="<?= asset($assetBase . 'croixrouge.png') ?>" id="croixrouge" class="hidden" alt=""></div>
        <div id="croixrouge2div"><img src="<?= asset($assetBase . 'croixrouge.png') ?>" id="croixrouge2" class="hidden" alt=""></div>
        <div id="croixvertediv"><img src="<?= asset($assetBase . 'croixverte.png') ?>" id="croixverte" class="hidden" alt=""></div>
    </div>

    <?php foreach ([1, 2] as $index): ?>
        <div id="<?= $index === 1 ? 'controlscoll' : 'controls2coll' ?>" class="<?= $index === 1 ? 'eventsoff' : 'hidden' ?>">
            <?php foreach (['haut', 'droite', 'bas', 'gauche'] as $direction): ?>
                <button type="button" id="<?= e($direction . ($index === 1 ? '' : '2') . 'div') ?>" data-appontage-collision="<?= e((string) $index) ?>" data-direction="<?= e($direction) ?>">
                    <img src="<?= asset($assetBase . $direction . '.png') ?>" id="<?= e($direction . ($index === 1 ? '' : '2')) ?>" alt="<?= e($direction) ?>">
                </button>
            <?php endforeach; ?>
        </div>
    <?php endforeach; ?>

    <div id="collactif" class="hidden"><img src="<?= asset($assetBase . 'collactif.png') ?>" alt=""></div>
    <div id="manche"><img src="<?= asset($assetBase . 'manche.png') ?>" alt=""></div>
    <button type="button" id="moteursbtn" class="hidden" aria-label="couper les moteurs">
        <img src="<?= asset($assetBase . 'moteurs.png') ?>" alt="">
    </button>
</div>

<form id="appontage-complete-form" action="<?= e(url('/aventures/gaea1/appontage')) ?>" method="post" class="hidden">
    <input type="hidden" name="action" value="complete_landing">
    <button type="submit" name="action" value="complete_landing">continuer.</button>
</form>
