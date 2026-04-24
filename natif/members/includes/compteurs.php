<?php
// Compteurs de succès cachés obtenus
$countergeneral = 0;
$counterlastparty = 0;
$countersecrets = 0;
$counteravent = 0;
$counterambria = 0;
$countergaea1 = 0;

// Compteurs de progression
$countsucces = $conn->prepare("SELECT s.*
    FROM 0membre_succes ms
    JOIN 0succes s ON ms.id_succes = s.id
    WHERE ms.id_membre = ?
      AND s.scenario = ?
    ORDER BY FIELD(s.rarete,
        'platine',
        'diamant',
        'gold',
        'argent',
        'bronze',
        'normal'
    )
");
$countsucces->execute([$idmembre, 'general']);
$generalcount = $countsucces->rowCount();
$widthgeneral = (100 - ((14 - $generalcount) * 100) / 14);
$succesgeneral = $countsucces->fetchAll(PDO::FETCH_ASSOC);

$countsucces->execute([$idmembre, 'lastparty']);
$lpcount = $countsucces->rowCount();
$widthlp = (100 - ((5 - $lpcount) * 100) / 5);
$succeslp = $countsucces->fetchAll(PDO::FETCH_ASSOC);

$countsucces->execute([$idmembre, 'secrets']);
$secretscount = $countsucces->rowCount();
$widthsecrets = (100 - ((16 - $secretscount) * 100) / 16);
$successecrets = $countsucces->fetchAll(PDO::FETCH_ASSOC);

$countsucces->execute([$idmembre, 'avent']);
$aventcount = $countsucces->rowCount();
$widthavent = (100 - ((7 - $aventcount) * 100) / 7);
$succesavent = $countsucces->fetchAll(PDO::FETCH_ASSOC);

$countsucces->execute([$idmembre, 'ambria']);
$ambriacount = $countsucces->rowCount();
$widthambria = (100 - ((24 - $ambriacount) * 100) / 24);
$succesambria = $countsucces->fetchAll(PDO::FETCH_ASSOC);

$countsucces->execute([$idmembre, 'gaea1']);
$gaea1count = $countsucces->rowCount();
$widthgaea1 = (100 - ((26 - $gaea1count) * 100) / 26);
$succesgaea1 = $countsucces->fetchAll(PDO::FETCH_ASSOC);

// Compteur de progression global
$countglobal = round(($widthgeneral + $widthlp + $widthsecrets + $widthavent + $widthambria + $widthgaea1) / 6);
?>

<div class="containerprog">
    <div class="banniereprogression" style="width :<?= $countglobal ?>%"></div>
    <p>
        <?= round($countglobal) ?>% au total
    </p>
</div>
