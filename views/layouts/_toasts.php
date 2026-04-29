<?php

use App\Services\Account\AchievementService;

$toastMessages = [];
foreach (['success', 'error', 'info'] as $type) {
    $message = flash($type);
    if ($message !== null && $message !== '') {
        $toastMessages[] = [
            'type' => $type,
            'message' => (string) $message,
        ];
    }
}

$achievementService = new AchievementService();
$popupAchievements = $achievementService->consumePopup();
?>
<?php if ($toastMessages !== [] || $popupAchievements !== []): ?>
    <div class="toast-container" aria-live="polite" aria-atomic="false">
        <?php foreach ($toastMessages as $toast): ?>
            <div class="app-toast app-toast-<?= e($toast['type']) ?>" role="status">
                <p><?= e($toast['message']) ?></p>
            </div>
        <?php endforeach; ?>

        <?php foreach ($popupAchievements as $achievement): ?>
            <?php
            $image = 'assets/img/succes/' . ($achievement['scenario'] ?? 'general') . '/' . ($achievement['nom'] ?? '') . '.png';
            $profileUrl = auth_check() ? url('/mon-compte') : url('/login');
            ?>
            <div class="app-toast app-toast-achievement" role="status">
                <div class="succesapercu">
                    <div class="succes<?= e($achievement['rarete'] ?? 'normal') ?>"></div>
                    <a href="<?= $profileUrl ?>" target="_blank">
                        <img src="<?= asset($image) ?>" alt="<?= e($achievement['titre'] ?? '') ?>">
                    </a>
                </div>
                <div class="toast-achievement-text">
                    <strong>Nouveau succès débloqué !</strong>
                    <span><?= e($achievement['titre'] ?? '') ?></span>
                    <small><?= e($achievement['description'] ?? '') ?></small>
                    <?php if (empty($achievement['is_logged_in'])): ?>
                        <small>Connectez-vous puis rafraîchissez la page pour l'ajouter à votre collection.</small>
                    <?php endif; ?>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>
