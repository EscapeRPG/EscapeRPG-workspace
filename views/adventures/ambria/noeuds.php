<div id="noeuds">
    <div class="droppernoeud" id="dropnoeud1"></div>
    <div class="droppernoeud" id="dropnoeud2"></div>
    <div class="droppernoeud" id="dropnoeud3"></div>
</div>

<div class="noeuds-draggers">
    <?php for ($index = 1; $index <= 8; $index++): ?>
        <div class="draggernoeud" id="dragnoeud<?= $index ?>">
            <img
                src="<?= asset('assets/img/ambria/noeuds/noeud' . $index . '.png') ?>"
                id="dra<?= $index ?>"
                class="noeud-piece"
                data-piece="noeud<?= $index ?>"
                alt="Noeud <?= $index ?>"
            >
        </div>
    <?php endfor; ?>
</div>

<form id="noeuds-result" action="<?= e(url('/aventures/' . ($adventure['slug'] ?? '') . '/' . ltrim((string) (($adventure['scene_urls'][$scene] ?? null) ?: $scene), '/'))) ?>" method="post">
    <input type="hidden" name="action" value="">
</form>

<button type="button" id="noeuds-check">Valider.</button>
