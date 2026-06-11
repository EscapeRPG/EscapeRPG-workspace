<div
    id="canvas-wrap"
    class="hangar-sas-console"
    data-success-url="<?= e(url('/aventures/gaea1/appontage')) ?>"
    data-sound-deploy="<?= e(asset('assets/sounds/gaea1/brasmecaniquedeplier.mp3')) ?>"
    data-sound-retract="<?= e(asset('assets/sounds/gaea1/brasmecaniquereplier.mp3')) ?>"
    data-sound-lock="<?= e(asset('assets/sounds/gaea1/braslock.mp3')) ?>"
    data-sound-door="<?= e(asset('assets/sounds/gaea1/portehangarsas.mp3')) ?>"
>
    <img src="<?= asset('assets/img/gaea1/hangarsas/fond.png') ?>" alt="">
    <div id="portehangarsasdroite"><img src="<?= asset('assets/img/gaea1/hangarsas/portedroite.png') ?>" alt=""></div>
    <div id="portehangarsasgauche"><img src="<?= asset('assets/img/gaea1/hangarsas/portegauche.png') ?>" alt=""></div>
    <div id="hangarsas"><img src="<?= asset('assets/img/gaea1/hangarsas/hangarporteoverlay.png') ?>" alt=""></div>
    <canvas id="canvashangarsas" width="1000" height="750" aria-label="Ouverture manuelle du sas"></canvas>
    <button id="hangarsasbtn" type="button" aria-label="poignée d'ouverture du hangar"></button>
    <canvas id="canvasoverlay" width="1000" height="750" aria-hidden="true"></canvas>
    <div id="lumieres"><img src="<?= asset('assets/img/gaea1/hangarsas/lumieres.png') ?>" alt=""></div>
    <div id="hangarsasbras"><img src="<?= asset('assets/img/gaea1/hangarsas/bras.png') ?>" alt=""></div>
    <img src="<?= asset('assets/img/gaea1/hangarsas/cockpit.png') ?>" id="hangarsasoverlay" alt="">
</div>
