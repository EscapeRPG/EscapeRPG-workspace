<div
    id="canvas-wrap"
    class="scan-console"
    data-scan-map="<?= e(asset('assets/img/gaea1/scan/etoiles.png')) ?>"
    data-scan-frame="<?= e(asset('assets/img/gaea1/scan/fondscan.png')) ?>"
    data-scan-overlay="<?= e(asset('assets/img/gaea1/scan/scanoverlay.png')) ?>"
    data-scan-success="<?= e(url('/aventures/gaea1/signalt')) ?>"
>
    <canvas id="canvasfond" width="800" height="400" aria-label="Carte stellaire à calibrer"></canvas>
    <canvas id="canvasoverlay" width="800" height="400" aria-hidden="true"></canvas>

    <div id="coordinates">
        Orientation de l'antenne :
        <ul>
            <li>X = <span id="mouseX"></span></li>
            <li>Y = <span id="mouseY"></span></li>
        </ul>
    </div>
</div>
