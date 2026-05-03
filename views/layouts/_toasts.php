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

$noteToasts = flash('note_toasts', []);
if (!is_array($noteToasts)) {
    $noteToasts = [];
}

$noteToasts = array_values(array_filter(
    $noteToasts,
    static fn (mixed $message): bool => is_string($message) && $message !== '',
));

$inventoryToasts = flash('inventory_toasts', []);
if (!is_array($inventoryToasts)) {
    $inventoryToasts = [];
}

$inventoryToasts = array_values(array_filter(
    $inventoryToasts,
    static fn (mixed $message): bool => is_string($message) && $message !== '',
));

$inventoryItems = is_array($adventure['inventory_items'] ?? null) ? $adventure['inventory_items'] : [];
?>
<?php if ($toastMessages !== [] || $noteToasts !== [] || $inventoryToasts !== [] || $popupAchievements !== []): ?>
    <div class="toast-container" aria-live="polite" aria-atomic="false">
        <?php foreach ($toastMessages as $toast): ?>
            <div class="app-toast app-toast-<?= e($toast['type']) ?>" role="status">
                <p><?= e($toast['message']) ?></p>
            </div>
        <?php endforeach; ?>

        <?php foreach ($noteToasts as $noteToast): ?>
            <div class="app-toast app-toast-note" role="status">
                <p><span class="toast-generic">Nouvelle note ajoutée : </span><?= e($noteToast) ?></p>
            </div>
        <?php endforeach; ?>

        <?php foreach ($inventoryToasts as $inventoryToast): ?>
            <?php
            $inventoryItem = is_array($inventoryItems[$inventoryToast] ?? null) ? $inventoryItems[$inventoryToast] : [];
            $inventoryImage = (string) ($inventoryItem['image'] ?? '');
            $inventoryAlt = (string) ($inventoryItem['alt'] ?? $inventoryToast);
            ?>
            <div class="app-toast app-toast-inventory" role="status">
                <?php if ($inventoryImage !== ''): ?>
                    <img src="<?= asset($inventoryImage) ?>" alt="<?= e($inventoryAlt) ?>">
                <?php endif; ?>
                <p class="toast-generic">Nouvel élément ajouté à l'inventaire.</p>
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
