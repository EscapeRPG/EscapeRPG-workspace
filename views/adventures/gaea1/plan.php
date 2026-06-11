<?php
$rooms = is_array($adventure['station_rooms'] ?? null) ? $adventure['station_rooms'] : [];
$current = (string) ($state['plancurrent'] ?? '');
$mapRenderOrder = array_values(array_unique(array_merge(['h', 'n'], array_keys($rooms))));
$planModalMessage = flash('adventure_modal', '');

$roomVisibleLabel = static function (array $room) use ($state): string {
    $visited = (bool) ($state[(string) ($room['visited_state'] ?? '')] ?? false);
    if ($visited) {
        return (string) ($room['label'] ?? $room['unknown_label'] ?? '');
    }

    return (string) ($room['unknown_label'] ?? $room['label'] ?? '');
};

$roomHasAsset = static function (string $code, string $suffix): bool {
    return is_file(dirname(__DIR__, 3) . '/public/assets/img/gaea1/plan/' . $code . $suffix . '.png');
};

$roomMarkerSuffix = static function (array $room) use ($state): string {
    $visitedState = (string) ($room['visited_state'] ?? '');
    $testedState = (string) ($room['tested_state'] ?? '');
    $visited = $visitedState !== '' && (bool) ($state[$visitedState] ?? false);
    $tested = $testedState !== '' && (bool) ($state[$testedState] ?? false);

    if ($visitedState === '' || $visited) {
        return '';
    }

    return $tested ? 'closed' : 'unknown';
};
?>

<div id="canvas-wrap" class="station-plan-map">
    <img src="<?= asset('assets/img/gaea1/plan/fond.png') ?>" alt="plan de la station">

    <div
        class="station-plan-tiles"
        data-plan-map
        <?php if (is_string($planModalMessage) && $planModalMessage !== ''): ?>data-plan-modal="<?= e($planModalMessage) ?>"<?php endif; ?>
    >
        <?php foreach ($mapRenderOrder as $code): ?>
            <?php $room = is_array($rooms[$code] ?? null) ? $rooms[$code] : null; ?>
            <?php if (!is_array($room) || ($room['enabled'] ?? false) !== true || !$roomHasAsset((string) $code, 'over')) {
                continue;
            } ?>
            <?php $markerSuffix = $roomMarkerSuffix($room); ?>
            <form
                class="room-tile room-tile--<?= e((string) $code) ?>"
                action="<?= e(url('/aventures/gaea1/plan')) ?>"
                method="post"
                data-plan-room="<?= e((string) $code) ?>"
                data-hover-src="<?= e(asset('assets/img/gaea1/plan/' . $code . 'over.png')) ?>"
            >
                <input type="hidden" name="action" value="enter_station_room">
                <button type="submit" name="room" value="<?= e((string) $code) ?>" aria-label="<?= e($roomVisibleLabel($room)) ?>">
                    <?php if ($markerSuffix !== '' && $roomHasAsset((string) $code, $markerSuffix)): ?>
                        <img
                            src="<?= asset('assets/img/gaea1/plan/' . $code . $markerSuffix . '.png') ?>"
                            alt=""
                            class="room-tile__marker"
                        >
                    <?php endif; ?>
                </button>
            </form>
        <?php endforeach; ?>

        <?php if ($current !== ''): ?>
            <div class="room-tile room-tile--<?= e($current) ?> room-tile--token" aria-hidden="true">
                <div id="tokenpj">
                    <img src="<?= asset('assets/img/gaea1/avatar/fond.png') ?>" alt="">
                    <?= $sceneData['avatarNavHtml'] ?? '' ?>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>
