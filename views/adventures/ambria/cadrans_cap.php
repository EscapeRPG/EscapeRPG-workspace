<div id="cadranscap">
    <img src="<?= asset('assets/img/ambria/cap/cadranscap.png') ?>" alt="Cadrans du cap">

    <?php for ($index = 1; $index <= 4; $index++): ?>
        <div id="bouton<?= $index ?>haut">
            <button id="boutonhaut<?= $index ?>" class="boutonhaut" type="button"></button>
        </div>
        <div id="bouton<?= $index ?>bas">
            <button id="boutonbas<?= $index ?>" class="boutonbas" type="button"></button>
        </div>
    <?php endfor; ?>

    <div id="coordonnee1">
        <img src="<?= asset('assets/img/ambria/cap/cap0.png') ?>" id="coordonnee1img" alt="Coordonnée 1">
    </div>
    <div id="coordonnee2">
        <img src="<?= asset('assets/img/ambria/cap/cap0.png') ?>" id="coordonnee2img" alt="Coordonnée 2">
    </div>
    <div id="coordonnee3">
        <img src="<?= asset('assets/img/ambria/cap/captiret.png') ?>" id="coordonnee3img" alt="Coordonnée 3">
    </div>
    <div id="coordonnee4">
        <img src="<?= asset('assets/img/ambria/cap/captiret.png') ?>" id="coordonnee4img" alt="Coordonnée 4">
    </div>
</div>

<button type="button" id="valider" class="noway">Définir le cap.</button>
