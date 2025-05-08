<?php
// Compteurs de succès cachés obtenus
$countergeneral = 0;
$counterlastparty = 0;
$countersecrets = 0;
$counteravent = 0;
$counterambria = 0;
$countergaea1 = 0;

// Compteurs de progression
$countsuccesgeneral = $conn->prepare('SELECT * FROM 0succes WHERE pseudo = ? && scenario = "general"');
$countsuccesgeneral->execute([$getid]);
$generalcount = $countsuccesgeneral->rowCount();
$widthgeneral = (100 - ((14 - $generalcount) * 100) / 14);
$countsucceslp = $conn->prepare('SELECT * FROM 0succes WHERE pseudo = ? && scenario = "lastparty"');
$countsucceslp->execute([$getid]);
$lpcount = $countsucceslp->rowCount();
$widthlp = (100 - ((5 - $lpcount) * 100) / 5);
$countsuccessecrets = $conn->prepare('SELECT * FROM 0succes WHERE pseudo = ? && scenario = "secrets"');
$countsuccessecrets->execute([$getid]);
$secretscount = $countsuccessecrets->rowCount();
$widthsecrets = (100 - ((16 - $secretscount) * 100) / 16);
$countsuccesavent = $conn->prepare('SELECT * FROM 0succes WHERE pseudo = ? && scenario = "avent"');
$countsuccesavent->execute([$getid]);
$aventcount = $countsuccesavent->rowCount();
$widthavent = (100 - ((7 - $aventcount) * 100) / 7);
$countsuccesambria = $conn->prepare('SELECT * FROM 0succes WHERE pseudo = ? && scenario = "ambria"');
$countsuccesambria->execute([$getid]);
$ambriacount = $countsuccesambria->rowCount();
$widthambria = (100 - ((24 - $ambriacount) * 100) / 24);
$countsuccesgaea1 = $conn->prepare('SELECT * FROM 0succes WHERE pseudo = ? && scenario = "gaea1"');
$countsuccesgaea1->execute([$getid]);
$gaea1count = $countsuccesgaea1->rowCount();
$widthgaea1 = (100 - ((24 - $gaea1count) * 100) / 24);

// Compteur de progression global
$countglobal = round(($widthgeneral + $widthlp + $widthsecrets + $widthavent + $widthambria + $widthgaea1) / 6);
?>
<div class="containerprog">
    <div class="banniereprogression" style="width :<?= $countglobal ?>%"></div>
    <p>
        <?= round($countglobal) ?>% au total
    </p>
</div>
