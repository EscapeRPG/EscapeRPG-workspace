<?php
$reqbadges = $conn->prepare('SELECT * FROM 0succes WHERE pseudo = ? && scenario = "gaea1"');
$reqbadges->execute([$getid]);
$badges = $reqbadges->fetchAll();
$debut = '<div class="succesbox"><div class="succesbloque"></div><div class="succesobtenu"><img src="/escaperpg/images/succes/gaea1/debutoff.png"><span><u><b>Dérive spatiale</b></u><br>Lancer l\'aventure pour la première fois</span></div></div>';
$debutcheck = false;
$fin = '<div class="succesbox"><div class="succesbloque"></div><div class="succesobtenu"><img src="/escaperpg/images/succes/gaea1/finoff.png"><span><u><b>La fin de tout</b></u><br>Terminer l\'aventure</span></div></div>';
$fincheck = false;
$personnage = '<div class="succesbox"><div class="succesbloque"></div><div class="succesobtenu"><img src="/escaperpg/images/succes/gaea1/personnageoff.png"><span><u><b>Carte d\'identité</b></u><br>Créer son personnage pour l\'aventure</span></div></div>';
$personnagecheck = false;
$signal = '<div class="succesbox"><div class="succesbloque"></div><div class="succesobtenu"><img src="/escaperpg/images/succes/gaea1/signaloff.png"><span><u><b>Expert·e en communications</b></u><br>Intercepter et nettoyer le signal de détresse</span></div></div>';
$signalcheck = false;
$atterrir = '<div class="succesbox"><div class="succesbloque"></div><div class="succesobtenu"><img src="/escaperpg/images/succes/gaea1/atterriroff.png"><span><u><b>Appontage en douceur</b></u><br>Réussir à apponter sur la station</span></div></div>';
$atterrircheck = false;
$demo = '<div class="succesbox"><div class="succesbloque"></div><div class="succesobtenu"><img src="/escaperpg/images/succes/gaea1/demooff.png"><span><u><b>Aventurier·ère des premières heures</b></u><br>Avoir joué à la démo de cette aventure !</span></div></div>';
$democheck = false;
$traducteur = '<div class="succesbox"><div class="succesbloque"></div><div class="succesobtenu"><img src="/escaperpg/images/succes/gaea1/traducteuroff.png"><span><u><b>Expert·e en langues</b></u><br>Créer un traducteur pour le langage de GAEA-I</span></div></div>';
$traducteurcheck = false;
$menace = '<div class="succesbox"><div class="succesbloque"></div><div class="succesobtenu"><img src="/escaperpg/images/succes/gaea1/menaceoff.png"><span><u><b>Forme de vie étrangère à bord</b></u><br>Découvrir l\'origine de la menace à bord de la station</span></div></div>';
$menacecheck = false;
$touriste = '<div class="succesbox"><div class="succesbloque"></div><div class="succesobtenu"><img src="/escaperpg/images/succes/gaea1/menaceoff.png"><span><u><b>Touriste</b></u><br>Visiter l\'intégralité de la station</span></div></div>';
$touristecheck = false;
$hacking = '<div class="succesbox"><div class="succesbloque"></div><div class="succesobtenu"><img src="/escaperpg/images/succes/gaea1/menaceoff.png"><span><u><b>Expert·e en hacking</b></u><br>Se connecter au terminal du pont de commandement</span></div></div>';
$hackingcheck = false;
?>

<div id="containerscenario">
    <div id="bannieresucces">
        <img src="/escaperpg/images/gaea1card.png" alt="station gaea 1">
        <div class="containerprog">
            <div class="banniereprogression" style="width :<?= $widthgaea1 ?>%"></div>
            <p>
                <?= (round($widthgaea1 * 2) / 2) ?>%
            </p>
        </div>
    </div>
    <div id="containersucces">
        <?php foreach ($badges as $succes) {
            if ($succes['description'] == 'début') {
                $debutcheck = true;
            }
            if ($succes['description'] == 'fin') {
                $fincheck = true;
            }
            if ($succes['description'] == 'personnage') {
                $personnagecheck = true;
            }
            if ($succes['description'] == 'signal') {
                $signalcheck = true;
            }
            if ($succes['description'] == 'atterrir') {
                $atterrircheck = true;
            }
            if ($succes['description'] == 'démo') {
                $democheck = true;
            }
            if ($succes['description'] == 'traducteur') {
                $traducteurcheck = true;
            }
            if ($succes['description'] == 'menace') {
                $menacecheck = true;
            }
            if ($succes['description'] == 'touriste') {
                $touristecheck = true;
            }
            if ($succes['description'] == 'hacking') {
                $hackingcheck = true;
            }
            if ($succes['cache'] == 'oui') {
                $countergaea1++;
            }
        }

        $reqbadges = $conn->prepare('SELECT * FROM 0succes WHERE pseudo = ? && scenario = "gaea1" && rarete = "succesplatine" ORDER BY id DESC');
        $reqbadges->execute([$getid]);
        while ($badges = $reqbadges->fetch()): ?>
            <div class="succesbox">
                <div class="<?= $badges['rarete'] ?>"></div>
                <div class="succesobtenu"><?= $badges['badge'] ?></div>
            </div>
        <?php endwhile;

        $reqbadges = $conn->prepare('SELECT * FROM 0succes WHERE pseudo = ? && scenario = "gaea1" && rarete = "succesdiamant" ORDER BY id DESC');
        $reqbadges->execute([$getid]);
        while ($badges = $reqbadges->fetch()): ?>
            <div class="succesbox">
                <div class="<?= $badges['rarete'] ?>"></div>
                <div class="succesobtenu"><?= $badges['badge'] ?></div>
            </div>
        <?php endwhile;

        $reqbadges = $conn->prepare('SELECT * FROM 0succes WHERE pseudo = ? && scenario = "gaea1" && rarete = "succesgold" ORDER BY id DESC');
        $reqbadges->execute([$getid]);
        while ($badges = $reqbadges->fetch()): ?>
            <div class="succesbox">
                <div class="<?= $badges['rarete'] ?>"></div>
                <div class="succesobtenu"><?= $badges['badge'] ?></div>
            </div>
        <?php endwhile;

        $reqbadges = $conn->prepare('SELECT * FROM 0succes WHERE pseudo = ? && scenario = "gaea1" && rarete = "succesargent" ORDER BY id DESC');
        $reqbadges->execute([$getid]);
        while ($badges = $reqbadges->fetch()): ?>
            <div class="succesbox">
                <div class="<?= $badges['rarete'] ?>"></div>
                <div class="succesobtenu"><?= $badges['badge'] ?></div>
            </div>
        <?php endwhile;

        $reqbadges = $conn->prepare('SELECT * FROM 0succes WHERE pseudo = ? && scenario = "gaea1" && rarete = "succesbronze" ORDER BY id DESC');
        $reqbadges->execute([$getid]);
        while ($badges = $reqbadges->fetch()): ?>
            <div class="succesbox">
                <div class="<?= $badges['rarete'] ?>"></div>
                <div class="succesobtenu"><?= $badges['badge'] ?></div>
            </div>
        <?php endwhile;

        $reqbadges = $conn->prepare('SELECT * FROM 0succes WHERE pseudo = ? && scenario = "gaea1" && rarete = "succesnormal" ORDER BY id DESC');
        $reqbadges->execute([$getid]);
        while ($badges = $reqbadges->fetch()): ?>
            <div class="succesbox">
                <div class="<?= $badges['rarete'] ?>"></div>
                <div class="succesobtenu"><?= $badges['badge'] ?></div>
            </div>
        <?php endwhile;

        if (!$debutcheck) {
            echo $debut;
        }
        if (!$fincheck) {
            echo $fin;
        }
        if (!$personnagecheck) {
            echo $personnage;
        }
        if (!$signalcheck) {
            echo $signal;
        }
        if (!$atterrircheck) {
            echo $atterrir;
        }
        if (!$democheck) {
            echo $demo;
        }
        if (!$traducteurcheck) {
            echo $traducteur;
        }
        if (!$hackingcheck) {
            echo $hacking;
        }
        if (!$menacecheck) {
            echo $menace;
        }
        if (!$touristecheck) {
            echo $touriste;
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
