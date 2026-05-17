<div class="ambria-porte sullivan-porte">
    <img src="<?= e(asset('assets/img/ambria/porte/sullivanporte.png')) ?>" alt="Porte de la cite d'Ambria.">
    <?php for ($index = 1; $index <= 6; $index++): ?>
        <div class="dropperporte dropporte-<?= $index ?>" id="dropporte<?= $index ?>"></div>
    <?php endfor; ?>
</div>

<div class="porte-draggers">
    <?php
    $reliefs = [
        'drag1' => 'basrelief1.png',
        'drag2' => 'basrelief2.png',
        'drag3' => 'basrelief3.png',
    ];
    ?>

    <?php foreach ($reliefs as $piece => $image): ?>
        <div class="porte-dragger-slot" id="<?= e($piece) ?>">
            <img
                src="<?= e(asset('assets/img/ambria/porte/' . $image)) ?>"
                class="draggerporte"
                data-piece="<?= e($piece) ?>"
                alt="Bas-relief"
            >
        </div>
    <?php endforeach; ?>
</div>
