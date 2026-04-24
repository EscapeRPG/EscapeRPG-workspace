<?php
$reqAll = $conn->prepare("
    SELECT *
    FROM 0succes
    WHERE scenario = 'gaea1'
    ORDER BY FIELD(rarete,
        'platine',
        'diamant',
        'gold',
        'argent',
        'bronze',
        'normal'
    )
");
$reqAll->execute();
$allSucces = $reqAll->fetchAll(PDO::FETCH_ASSOC);

$earnedIds = array_column($succesgaea1, 'id');
?>

<div id="containerscenario">
    <div id="bannieresucces">
        <img src="/escaperpg/images/gaea1card.png" alt="bannière">
        <div class="containerprog">
            <div class="banniereprogression" style="width :<?= $widthgaea1 ?>%"></div>

            <p>
                <?= (round($widthgaea1 * 2) / 2) ?>%
            </p>
        </div>
    </div>

    <div id="containersucces">
        <?php
        $earnedList = [];
        $missingList = [];

        foreach ($allSucces as $succes) {
            if (in_array($succes['id'], $earnedIds)) {
                $earnedList[] = $succes;

                if ($succes['cache'] === 1) {
                    $countergaea1++;
                }
            } else {
                $missingList[] = $succes;
            }
        }

        foreach ($earnedList as $succes) {
            renderSucces($succes, true, 'gaea1');
        }

        foreach ($missingList as $succes) {
            renderSucces($succes, false, 'gaea1');
        }

        if ((16 - $countergaea1) > 1): ?>
            <div class="succesbox">
                <div class="succesbloque"></div>
                <div class="succesobtenu">
                    +<?= (16 - $countergaea1) ?>
                    <span>Encore <?= (16 - $countergaea1) ?> succès cachés à débloquer !</span>
                </div>
            </div>
        <?php elseif ((16 - $countergaea1) == 1): ?>
            <div class="succesbox">
                <div class="succesbloque"></div>
                <div class="succesobtenu">
                    +1
                    <span>Encore 1 succès caché à débloquer !</span>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>
