<div id="golem2logan" class="enigmelieu">
    <img src="<?= asset('assets/img/ambria/golem2logan.png') ?>" alt="Logan escalade le golem.">
</div>

<div class="golem-sequence" data-golem-sequence>
    <div class="golem-sequence__buttons" aria-label="Choix des gemmes">
        <?php
        $buttons = [
            ['rondbleu', '1', 'Rond bleu'],
            ['carrebleu', '2', 'Carré bleu'],
            ['trianglebleu', '3', 'Triangle bleu'],
            ['rondrouge', '4', 'Rond rouge'],
            ['carrerouge', '5', 'Carré rouge'],
            ['trianglerouge', '6', 'Triangle rouge'],
            ['rondvert', '7', 'Rond vert'],
            ['carrevert', '8', 'Carré vert'],
            ['trianglevert', '9', 'Triangle vert'],
            ['rondjaune', '10', 'Rond jaune'],
            ['carrejaune', '11', 'Carré jaune'],
            ['trianglejaune', '12', 'Triangle jaune'],
        ];
        ?>
        <?php foreach ($buttons as [$class, $value, $label]): ?>
            <button type="button" class="golem-sequence__gem <?= e($class) ?>" data-golem-value="<?= e($value) ?>" aria-label="<?= e($label) ?>"></button>
        <?php endforeach; ?>
    </div>

    <div class="golem-sequence__panel golem-sequence__panel-frame" data-golem-panel></div>

    <form method="post" data-golem-form>
        <input type="hidden" name="action" value="submit_golem_path">
        <input type="hidden" name="path_result" data-golem-result value="">
        <div class="golem-sequence__actions">
            <button type="button" class="action" data-golem-reset>Réinitialiser.</button>
            <button type="submit" class="action">Valider.</button>
        </div>
    </form>
</div>
