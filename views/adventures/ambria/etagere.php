<div class="etagere-capitaine">
    <?php for ($index = 1; $index <= 10; $index++): ?>
        <div class="dropperetagere dropetagere-<?= $index ?>" id="dropetagere<?= $index ?>"></div>
    <?php endfor; ?>
</div>

<div class="etagere-draggers">
    <?php
    $items = [
        'longue-vue' => ['image' => 'longuevue.png', 'alt' => 'longue-vue'],
        'caisse' => ['image' => 'caisse.png', 'alt' => 'caisse'],
        'rhum' => ['image' => 'rhum.png', 'alt' => 'rhum'],
        'pistolet' => ['image' => 'pistolet.png', 'alt' => 'pistolet'],
        'compas' => ['image' => 'compas.png', 'alt' => 'compas'],
        'lampe' => ['image' => 'lampe.png', 'alt' => 'lampe'],
    ];
    ?>

    <?php foreach ($items as $piece => $item): ?>
        <div class="draggeretagere">
            <img
                src="<?= asset('assets/img/ambria/etagere/' . $item['image']) ?>"
                class="etagere-piece"
                data-piece="<?= e($piece) ?>"
                alt="<?= e($item['alt']) ?>"
            >
        </div>
    <?php endforeach; ?>
</div>
