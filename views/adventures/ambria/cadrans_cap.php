<div class="cadrans-cap">
    <img src="<?= asset('assets/img/ambria/cap/cadranscap.png') ?>" alt="Cadrans du cap">

    <?php for ($index = 1; $index <= 4; $index++): ?>
        <div class="cap-button cap-button-<?= $index ?>-haut">
            <button id="boutonhaut<?= $index ?>" class="boutonhaut" type="button"></button>
        </div>
        <div class="cap-button cap-button-<?= $index ?>-bas">
            <button id="boutonbas<?= $index ?>" class="boutonbas" type="button"></button>
        </div>
    <?php endfor; ?>

    <div class="cap-coordinate cap-coordinate-1">
        <img src="<?= asset('assets/img/ambria/cap/cap0.png') ?>" id="coordonnee1img" alt="Coordonnée 1">
    </div>
    <div class="cap-coordinate cap-coordinate-2">
        <img src="<?= asset('assets/img/ambria/cap/cap0.png') ?>" id="coordonnee2img" alt="Coordonnée 2">
    </div>
    <div class="cap-coordinate cap-coordinate-3">
        <img src="<?= asset('assets/img/ambria/cap/captiret.png') ?>" id="coordonnee3img" alt="Coordonnée 3">
    </div>
    <div class="cap-coordinate cap-coordinate-4">
        <img src="<?= asset('assets/img/ambria/cap/captiret.png') ?>" id="coordonnee4img" alt="Coordonnée 4">
    </div>
</div>

<button type="button" id="valider" class="action">Définir le cap.</button>
