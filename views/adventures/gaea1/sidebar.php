<?php
$stateData = is_array($state ?? null) ? $state : [];
$sceneData = is_array($sceneData ?? null) ? $sceneData : [];
$displayName = trim((string)($sceneData['displayName'] ?? ''));
$rank = trim((string)($sceneData['rank'] ?? ''));
$avatarHtml = (string)($sceneData['avatarNavHtml'] ?? '');
$hasAvatar = (bool)($stateData['avatar_created'] ?? false);
$hasIdentity = $displayName !== '';
$hasSuit = (bool)($stateData['combinaison'] ?? false);
$visitingStation = (bool)($stateData['visitestation'] ?? false) && ($scene ?? '') !== 'testfin';
$isPlanScene = ($scene ?? '') === 'plan';
?>

<aside>
    <?php if ($isPlanScene): ?>
        <?php
        $rooms = is_array($adventure['station_rooms'] ?? null) ? $adventure['station_rooms'] : [];
        $current = (string)($stateData['plancurrent'] ?? '');
        $navOrder = ['e', 'l', 'o', 'n', 'k', 'f', 'g', 'h', 's', 'i', 'b', 'a', 't', 'm', 'd', 'c', 'p', 'r', 'j', 'q'];
        $roomVisibleLabel = static function (array $room, ?string $labelKey = null, ?string $unknownLabelKey = null) use ($stateData): string {
            $visited = (bool)($stateData[(string)($room['visited_state'] ?? '')] ?? false);
            if ($visited) {
                return (string)($room[$labelKey ?? 'label'] ?? $room['label'] ?? $room['unknown_label'] ?? '');
            }

            return (string)($room[$unknownLabelKey ?? 'unknown_label'] ?? $room['unknown_label'] ?? $room['label'] ?? '');
        };
        $roomClass = static function (string $code, array $room) use ($stateData, $current): string {
            if ($current === $code) {
                return 'locactuelle';
            }

            if ((bool)($stateData[(string)($room['tested_state'] ?? '')] ?? false)) {
                return 'lienclosed';
            }

            if (!(bool)($stateData[(string)($room['visited_state'] ?? '')] ?? false)) {
                return 'lienuntested';
            }

            return '';
        };
        $renderRoomItem = static function (string $code, array $room, string $label, string $idSuffix = '') use ($roomClass): void {
            $classes = trim('station-plan-list__room station-plan-list__room--' . $code . $idSuffix . ' ' . $roomClass($code, $room));
            ?>
            <li class="<?= e($classes) ?>" data-plan-room="<?= e($code) ?>">
                <form action="<?= e(url('/aventures/gaea1/plan')) ?>" method="post">
                    <input type="hidden" name="action" value="enter_station_room">
                    <button type="submit" name="room" value="<?= e($code) ?>"><?= e($label) ?></button>
                </form>
            </li>
            <?php
        };
        ?>

        <div class="station-plan-list">
            <h1>Navigation</h1>
            <ul>
                <?php foreach ($navOrder as $code): ?>
                    <?php $room = is_array($rooms[$code] ?? null) ? $rooms[$code] : null; ?>
                    <?php if ($room === null) {
                        continue;
                    } ?>

                    <?php if ($code === 'e'): ?>
                        <?php $renderRoomItem('e', $room, $roomVisibleLabel($room)); ?>
                        <?php $renderRoomItem('e', $room, $roomVisibleLabel($room, 'secondary_label', 'secondary_unknown_label'), '2'); ?>
                    <?php else: ?>
                        <?php $renderRoomItem($code, $room, $roomVisibleLabel($room)); ?>
                    <?php endif; ?>
                <?php endforeach; ?>
            </ul>
        </div>

        <?php require dirname(__DIR__) . '/partials/_footer_controls.php'; ?>

        <?php $saveActionUrl = url('/aventures/gaea1/plan'); ?>
        <?php require dirname(__DIR__) . '/partials/_save_control.php'; ?>
    <?php else: ?>
        <?php if ($hasAvatar): ?>
            <?php if ($hasIdentity): ?>
                <div class="name-nav">
                    <?= e(trim($rank . ' ' . $displayName)) ?>
                </div>
            <?php endif; ?>

            <div class="avatar-nav-wrap">
                <img src="<?= asset('assets/img/gaea1/avatar/fond.png') ?>" alt="">
                <div class="avatar-nav">
                    <?= $avatarHtml ?>
                </div>
            </div>
        <?php endif; ?>

        <?php if ($hasSuit): ?>
            <div class="name-nav">
                <h1>État de la combinaison :</h1>
                - Intégrité : <span class="systemes">100%</span>.<br>
                - Oxygène : <span
                        class="<?= ((int)($stateData['oxygene'] ?? 100)) > 50 ? 'systemes' : (((int)($stateData['oxygene'] ?? 100)) > 20 ? 'systemesdemi' : 'important') ?>"><?= e((string)($stateData['oxygene'] ?? 100)) ?>%</span>.<br>
                - Sous-systèmes : <span class="systemes">OK</span>.
            </div>
        <?php endif; ?>

        <?php if ($visitingStation): ?>
            <div class="station-plan-shortcut">
                <a href="<?= url('/aventures/gaea1/plan') ?>">
                    <img src="<?= asset('assets/img/gaea1/plan/fondcurrent.png') ?>"
                         title="Accéder au plan de la station." alt="plan de la station">
                    <?php if (!empty($stateData['plancurrent'])): ?>
                        <div class="station-plan-current">
                            <div class="room-tile room-tile--<?= e((string)$stateData['plancurrent']) ?>">
                                <img src="<?= asset('assets/img/gaea1/plan/' . $stateData['plancurrent'] . 'over.png') ?>"
                                     alt="">
                            </div>
                        </div>
                    <?php endif; ?>
                </a>
            </div>
        <?php endif; ?>

        <?php require dirname(__DIR__) . '/partials/_footer_controls.php'; ?>

        <?php $saveActionUrl = url('/aventures/gaea1/' . (($adventure['scene_urls'][$scene] ?? null) ?: $scene)); ?>
        <?php require dirname(__DIR__) . '/partials/_save_control.php'; ?>
    <?php endif; ?>
</aside>
