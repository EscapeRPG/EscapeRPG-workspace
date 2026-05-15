<?php
$interactive = (string)($partialData['interactive'] ?? ($block['interactive'] ?? ''));
$slug = (string)($adventure['slug'] ?? 'avent');
$sceneUrl = (string)(($adventure['scene_urls'][$scene] ?? null) ?: $scene);
$actionUrl = url('/aventures/' . $slug . '/' . ltrim($sceneUrl, '/'));
?>

<?php if ($interactive === 'attic_search'): ?>
    <form action="<?= e($actionUrl) ?>" method="post">
        <div class="enigmelieu">
            <img src="<?= asset('assets/img/avent/grenier.png') ?>" alt="grenier">
            <button type="submit" name="action" value="use_machine" id="machine">
                <img src="<?= asset('assets/img/avent/machine.png') ?>" alt="la machine bizarre de grand-père">
            </button>
            <button type="submit" name="action" value="take_piece_1" id="piecedemachine1">
                <img src="<?= asset('assets/img/avent/piece1.png') ?>" alt="une pièce de machine">
            </button>
            <button type="submit" name="action" value="take_piece_2" id="piecedemachine2">
                <img src="<?= asset('assets/img/avent/piece2.png') ?>" alt="une pièce de machine">
            </button>
            <button type="submit" name="action" value="take_sky_card" id="carteciel">
                <img src="<?= asset('assets/img/avent/carteciel.png') ?>" alt="une carte des étoiles">
            </button>
        </div>
    </form>
<?php elseif ($interactive === 'machine_puzzle'): ?>
    <div id="machineenigme"></div>
<?php elseif ($interactive === 'sky_canvas'): ?>
    <div class="sky-canvas-container">
        <canvas class="myCanvas"></canvas>
    </div>
    <button id="reset" class="action">RÉINITIALISER.</button>
<?php elseif ($interactive === 'sky_card_search'): ?>
    <form action="<?= e($actionUrl) ?>" method="post">
        <div class="enigmelieu">
            <img src="<?= asset('assets/img/avent/grenier.png') ?>" alt="grenier">
            <button type="submit" name="action" value="take_sky_card" id="carteciel">
                <img src="<?= asset('assets/img/avent/carteciel.png') ?>" alt="une carte du ciel">
            </button>
        </div>
    </form>
<?php elseif ($interactive === 'sapence'): ?>
    <div class="enigmelieu">
        <img src="<?= asset('assets/img/avent/machineperenoel.png') ?>" alt="la machine à cadeaux du Père Noël">
        <div id="machineperenoel">
            <div class="dropper" id="drop1"></div>
            <div class="dropper" id="drop2"></div>
            <div class="dropper" id="drop3"></div>
            <div class="dropper" id="drop4"></div>
            <input type="range" name="range" min="1" max="9" value="1">
            <input type="number" name="reservoir" id="reservoir">
            <form action="<?= e($actionUrl) ?>" method="post">
                <button type="submit" name="action" value="press_sapence_button" id="boutonmachineoff">
                    <img src="<?= asset('assets/img/avent/boutonoff.png') ?>" alt="bouton">
                </button>
            </form>
        </div>
    </div>
    <div class="dragslot">
        <div class="draggable" id="drag1" data-piece="sapence">
            <img src="<?= asset('assets/img/avent/sapence.png') ?>" id="dra1" alt="sapence">
        </div>
    </div>
<?php elseif ($interactive === 'calibrate'): ?>
    <div class="enigmelieu">
        <img src="<?= asset('assets/img/avent/machineperenoel2.png') ?>" alt="la machine à cadeaux du Père Noël">
        <div id="machineperenoel">
            <input type="range" id="range" name="range" min="1" max="9" value="1">
            <button id="levier"><img src="<?= asset('assets/img/avent/levier.png') ?>" alt="levier"></button>
            <input type="number" name="reservoir" id="reservoir">
            <div id="boutonmachineoff">
                <form action="<?= e($actionUrl) ?>" method="post">
                    <button type="submit" name="action" value="press_calibrate_button">
                        <img src="<?= asset('assets/img/avent/boutonoff.png') ?>" alt="bouton">
                    </button>
                </form>
            </div>
        </div>
    </div>
<?php elseif ($interactive === 'reservoir'): ?>
    <div class="enigmelieu">
        <img src="<?= asset('assets/img/avent/machineperenoel3.png') ?>" alt="la machine à cadeaux du Père Noël">
        <div id="machineperenoel">
            <input type="range" name="range" min="1" max="9" value="4">
            <form action="<?= e($actionUrl) ?>" method="post">
                <input type="number" name="reservoir" id="reservoir">
                <div id="boutonmachineoff">
                    <button type="submit" name="action" value="fill_reservoir">
                        <img src="<?= asset('assets/img/avent/boutonoff.png') ?>" alt="bouton">
                    </button>
                </div>
            </form>
        </div>
    </div>
<?php endif; ?>
