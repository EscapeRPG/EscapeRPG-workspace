<?php
$closedByDefault = [
    'a' => false,
    'b' => true,
    'c' => false,
    'd' => true,
    'e' => true,
    'f' => false,
    'g' => true,
    'h' => true,
    'i' => false,
    'j' => false,
    'k' => true,
    'l' => true,
    'm' => true,
    'n' => true,
    'o' => false,
    'p' => false,
    'q' => false,
    'r' => true,
    's' => false,
    't' => false,
];
?>

<div id="canvas-wrap" class="testfin-wrap">
    <img src="<?= asset('assets/img/gaea1/taquin/fond.png') ?>" alt="">

    <div id="planevac">
        <?php foreach ($closedByDefault as $code => $hidden): ?>
            <div id="<?= e($code) ?>sallefond" data-room-toggle="<?= e($code) ?>">
                <img
                    src="<?= asset('assets/img/gaea1/taquin/' . $code . 'closed.png') ?>"
                    id="<?= e($code) ?>salletop"
                    alt=""
                    class="<?= $hidden ? 'hidden' : '' ?>"
                >
            </div>
        <?php endforeach; ?>
    </div>

    <div id="planevacoverlay">
        <div id="esallefond">
            <div id="tokenpj">
                <?= $avatarNavHtml ?? '' ?>
            </div>
        </div>
        <div id="qsallefond"><div id="tokenobjectif"></div></div>
    </div>
</div>

<div id="timer"></div>
