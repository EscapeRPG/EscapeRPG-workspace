<?php
$reqAll = $conn->prepare("
    SELECT *
    FROM 0succes
    WHERE scenario = 'general'
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

$earnedIds = array_column($succesgeneral, 'id');
?>

<div id="containerscenario">
    <div id="bannieresucces">
        <img src="/escaperpg/images/banniere.png" alt="bannière">
        <div class="containerprog">
            <div class="banniereprogression" style="width :<?= $widthgeneral ?>%"></div>

            <p>
                <?= (round($widthgeneral * 2) / 2) ?>%
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
                    $countergeneral++;
                }
            } else {
                $missingList[] = $succes;
            }
        }

        foreach ($earnedList as $succes) {
            renderSucces($succes, true, 'general');
        }

        foreach ($missingList as $succes) {
            renderSucces($succes, false, 'general');
        }

        if ((1 - $countergeneral) == 1): ?>
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
