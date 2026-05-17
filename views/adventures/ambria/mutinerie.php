<div id="game-container-1" class="game-container" data-mutinerie-game>
    <div id="map-and-controls" class="game-layout">
        <div id="game-map-1" class="game-map">
            <div id="tiles" class="layer tiles-layer"></div>
            <div id="sprites" class="layer"></div>
            <div id="tresorimg" class="mutinerie-tresor">
                <img src="<?= asset('assets/img/ambria/tresordispo.png') ?>" alt="">
            </div>
            <div id="crack1" class="mutinerie-crack mutinerie-crack-1">
                <img src="<?= asset('assets/img/ambria/cracking.png') ?>" alt="">
            </div>
            <div id="crack2" class="mutinerie-crack mutinerie-crack-2">
                <img src="<?= asset('assets/img/ambria/cracking.png') ?>" alt="">
            </div>
            <div id="crack3" class="mutinerie-crack mutinerie-crack-3">
                <img src="<?= asset('assets/img/ambria/cracking.png') ?>" alt="">
            </div>
        </div>
        <div id="controls" class="game-controls">
            <button type="button" id="up" aria-label="Haut">↑</button><br>
            <button type="button" id="left" aria-label="Gauche">←</button>
            <button type="button" id="right" aria-label="Droite">→</button><br>
            <button type="button" id="down" aria-label="Bas">↓</button>
        </div>
    </div>
    <form method="post" data-mutinerie-form>
        <input type="hidden" name="action" value="">
    </form>
</div>
