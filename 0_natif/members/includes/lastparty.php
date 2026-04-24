<?php
$reqAll = $conn->prepare("
    SELECT *
    FROM 0succes
    WHERE scenario = 'lastparty'
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

$earnedIds = array_column($succeslp, 'id');
?>

<div id="containerscenario">
    <div id="bannieresucces">
        <img src="/escaperpg/images/lastpartycard.png" alt="bannière">
        <div class="containerprog">
            <div class="banniereprogression" style="width :<?= $widthlp ?>%"></div>

            <p>
                <?= (round($widthlp * 2) / 2) ?>%
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
                    $counterlastparty++;
                }
            } else {
                $missingList[] = $succes;
            }
        }

        foreach ($earnedList as $succes) {
            renderSucces($succes, true, 'lastparty');
        }

        foreach ($missingList as $succes) {
            renderSucces($succes, false, 'lastparty');
        }

        if ((3 - $counterlastparty) > 1): ?>
            <div class="succesbox">
                <div class="succesbloque"></div>
                <div class="succesobtenu">
                    +<?= (3 - $counterlastparty) ?>
                    <span>Encore <?= (3 - $counterlastparty) ?> succès cachés à débloquer !</span>
                </div>
            </div>
        <?php elseif ((3 - $counterlastparty) == 1): ?>
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
