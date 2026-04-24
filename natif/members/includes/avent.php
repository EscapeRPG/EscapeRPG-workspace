<?php
$reqAll = $conn->prepare("
    SELECT *
    FROM 0succes
    WHERE scenario = 'avent'
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

$earnedIds = array_column($succesavent, 'id');
?>

<div id="containerscenario">
    <div id="bannieresucces">
        <img src="/escaperpg/images/aventcard.png" alt="bannière">
        <div class="containerprog">
            <div class="banniereprogression" style="width :<?= $widthavent ?>%"></div>

            <p>
                <?= (round($widthavent * 2) / 2) ?>%
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
                    $counteravent++;
                }
            } else {
                $missingList[] = $succes;
            }
        }

        foreach ($earnedList as $succes) {
            renderSucces($succes, true, 'avent');
        }

        foreach ($missingList as $succes) {
            renderSucces($succes, false, 'avent');
        }

        if ((5 - $counteravent) > 1): ?>
            <div class="succesbox">
                <div class="succesbloque"></div>
                <div class="succesobtenu">
                    +<?= (5 - $counteravent) ?>
                    <span>Encore <?= (5 - $counteravent) ?> succès cachés à débloquer !</span>
                </div>
            </div>
        <?php elseif ((5 - $counteravent) == 1): ?>
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
