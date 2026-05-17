<div id="game-container-1" class="game-container" data-levier-game>
    <div id="map-and-controls" class="game-layout">
        <div id="game-map-1" class="map-levier">
            <div id="tiles" class="layer tiles-layer"></div>
            <div id="sprites" class="layer"></div>
        </div>
        <div id="controls" class="game-controls">
            <button type="button" id="up" aria-label="Haut">↑</button><br>
            <button type="button" id="left" aria-label="Gauche">←</button>
            <button type="button" id="right" aria-label="Droite">→</button><br>
            <button type="button" id="down" aria-label="Bas">↓</button>
        </div>
    </div>
    <form method="post" data-levier-form>
        <input type="hidden" name="action" value="complete_levier">
    </form>
</div>
