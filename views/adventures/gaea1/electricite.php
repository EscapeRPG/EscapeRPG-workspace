<?php
$assetBase = 'assets/img/gaea1/electricite/';
$tiles = [
    ['a1', 'cablecoude'], ['a2', 'cabledroit'], ['a3', 'cablecoude'], ['a4', 'cablet'], ['a5', 'cablecoude'], ['a6', 'cabledroit'],
    ['b1', 'cablecoude'], ['b2', 'cablecoude'], ['b3', 'cablecoude'], ['b4', 'cabledroit'], ['b5', 'cablet'], ['b6', 'cablecoude'],
    ['c1', 'cabledroit'], ['c2', 'cablecoude'], ['c3', 'cablecoude'], ['c4', 'cablecoude'], ['c5', 'cablecoude'], ['c6', 'cabledroit'],
    ['d1', 'cablecoude'], ['d2', 'cabledroit'], ['d3', 'cablet'], ['d4', 'cablecoude'], ['d5', 'cablet'], ['d6', 'cabledroit'],
    ['e1', 'cablecoude'], ['e2', 'cablecoude'], ['e3', 'cabledroit'], ['e4', 'cabledroit'], ['e5', 'cablecoude'], ['e6', 'cablecoude'],
    ['f1', 'cabledroit'], ['f2', 'cablecoude'], ['f3', 'cablecoude'], ['f4', 'cabledroit'], ['f5', 'cablecoude'], ['f6', 'cabledroit'],
];
?>

<div
    id="canvas-wrap"
    class="electricite-console"
    data-electricite-image-base="<?= e(asset($assetBase)) ?>"
    data-success-message="Le panneau alimenté, vous le branchez à la petite console accrochée à votre bras, puis donnez l'ordre à la porte de s'ouvrir. Dans un glissement, elle se renfonce dans le mur et vous permet d'accéder au cœur de la station."
>
    <img src="<?= asset($assetBase . 'fond.png') ?>" alt="">
    <div id="electricite">
        <?php foreach ($tiles as $index => [$id, $type]): ?>
            <?php
            $row = intdiv($index, 6);
            $col = $index % 6;
            ?>
            <button type="button" id="<?= e($id) ?>" class="elec" data-row="<?= e((string) $row) ?>" data-col="<?= e((string) $col) ?>" data-type="<?= e($type) ?>" data-orientation="0">
                <img src="<?= asset($assetBase . $type . '.png') ?>" alt="">
            </button>
        <?php endforeach; ?>
        <div id="diode1" class="eventsoff"><img src="<?= asset($assetBase . 'diodeeteinte.png') ?>" id="imgdiode1" alt=""></div>
        <div id="diode2" class="eventsoff"><img src="<?= asset($assetBase . 'diodeeteinte.png') ?>" id="imgdiode2" alt=""></div>
        <div id="diode3" class="eventsoff"><img src="<?= asset($assetBase . 'diodeeteinte.png') ?>" id="imgdiode3" alt=""></div>
    </div>
</div>

<form id="electricite-complete-form" action="<?= e(url('/aventures/gaea1/hangar')) ?>" method="post" class="hidden">
    <input type="hidden" name="action" value="complete_hack">
    <button type="submit" name="action" value="complete_hack">continuer.</button>
</form>
