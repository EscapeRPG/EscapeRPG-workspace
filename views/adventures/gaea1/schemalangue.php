<div id="schema-wrap">
    <div class="schema-cols">
        SYNTAXE
        <canvas id="schemalangue1" width="200" height="200"></canvas>
    </div>

    <div class="schema-cols">
        CONJUGAISON
        <canvas id="schemalangue2" width="200" height="200"></canvas>
    </div>

    <div class="schema-cols">
        GRAMMAIRE
        <canvas id="schemalangue3" width="200" height="200"></canvas>
    </div>
</div>

<form action="<?= e(url('/aventures/gaea1/komunodek')) ?>" method="post">
    <input type="hidden" name="action" value="compile_language">
    <input type="number" name="schema1" id="schema1" value="0" class="hidden">
    <input type="number" name="schema2" id="schema2" value="0" class="hidden">
    <input type="number" name="schema3" id="schema3" value="0" class="hidden">
    <button type="submit" class="action">compiler les données.</button>
</form>
