<?php
$reqAll = $conn->prepare("
    SELECT *
    FROM 0succes
    WHERE scenario = 'secrets'
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

$earnedIds = array_column($successecrets, 'id');
?>

<div id="containerscenario">
    <div id="bannieresucces">
        <img src="/escaperpg/images/secretscard.png" alt="bannière">
        <div class="containerprog">
            <div class="banniereprogression" style="width :<?= $widthsecrets ?>%"></div>

            <p>
                <?= (round($widthsecrets * 2) / 2) ?>%
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
                    $countersecrets++;
                }
            } else {
                $missingList[] = $succes;
            }
        }

        foreach ($earnedList as $succes) {
            renderSucces($succes, true, 'secrets');
        }

        foreach ($missingList as $succes) {
            renderSucces($succes, false, 'secrets');
        }

        if ((11 - $countersecrets) > 1): ?>
            <div class="succesbox">
                <div class="succesbloque"></div>
                <div class="succesobtenu">
                    +<?= (11 - $countersecrets) ?>
                    <span>Encore <?= (11 - $countersecrets) ?> succès cachés à débloquer !</span>
                </div>
            </div>
        <?php elseif ((11 - $countersecrets) == 1): ?>
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
