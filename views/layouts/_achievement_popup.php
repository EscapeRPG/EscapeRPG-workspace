<?php
$popupAchievements = (new \App\Services\AchievementService())->consumePopup();
?>
<?php if ($popupAchievements !== []): ?>
    <div id="succespopup" data-logged-in="<?= auth_check() ? '1' : '0' ?>">
        <?php foreach ($popupAchievements as $achievement): ?>
            <?php
            $image = 'assets/img/succes/' . ($achievement['scenario'] ?? 'general') . '/' . ($achievement['nom'] ?? '') . '.png';
            $profileUrl = auth_check() ? url('/mon-compte') : url('/login');
            ?>
            <div class="succesapercu">
                <div class="succes<?= e($achievement['rarete'] ?? 'normal') ?>"></div>
                <a href="<?= $profileUrl ?>">
                    <img src="<?= asset($image) ?>" alt="<?= e($achievement['titre'] ?? '') ?>">
                    <span>
                        <u><strong><?= e($achievement['titre'] ?? '') ?></strong></u><br>
                        <?= e($achievement['description'] ?? '') ?>
                    </span>
                </a>
            </div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>
