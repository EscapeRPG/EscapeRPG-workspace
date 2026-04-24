<div id="containerscenario">
    <div id="bannieresucces">
        <img src="<?= asset($section['image'] ?? '') ?>" alt="<?= e($section['title'] ?? '') ?>">
        <div class="containerprog">
            <div class="banniereprogression" style="width: <?= round((float) ($section['progress'] ?? 0), 1) ?>%"></div>
            <p><?= round((float) ($section['progress'] ?? 0) * 2) / 2 ?>%</p>
        </div>
    </div>

    <div id="containersucces">
        <?php foreach (($section['items'] ?? []) as $achievement): ?>
            <?php
            $isEarned = in_array($achievement['id'] ?? null, $section['earned_ids'] ?? [], true);
            if (($achievement['cache'] ?? 0) && !$isEarned) {
                continue;
            }

            $image = 'assets/img/succes/' . ($section['slug'] ?? 'general') . '/'
                . ($achievement['nom'] ?? '')
                . ($isEarned ? '' : 'off')
                . '.png';
            $rarityClass = $isEarned ? 'succes' . ($achievement['rarete'] ?? 'normal') : 'succesbloque';
            ?>
            <div class="succesbox">
                <div class="<?= e($rarityClass) ?>"></div>
                <div class="succesobtenu">
                    <img src="<?= asset($image) ?>" alt="<?= e($achievement['titre'] ?? '') ?>">
                    <span>
                        <u><strong><?= e($achievement['titre'] ?? '') ?></strong></u><br>
                        <?= e($achievement['description'] ?? '') ?>
                    </span>
                </div>
            </div>
        <?php endforeach; ?>

        <?php if (($section['remaining_hidden'] ?? 0) > 0): ?>
            <div class="succesbox">
                <div class="succesbloque"></div>
                <div class="succesobtenu">
                    +<?= (int) $section['remaining_hidden'] ?>
                    <span>
                        Encore <?= (int) $section['remaining_hidden'] ?> succès caché<?= (int) $section['remaining_hidden'] > 1 ? 's' : '' ?> à débloquer !
                    </span>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>
