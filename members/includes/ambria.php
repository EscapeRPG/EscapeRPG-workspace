<?php
$reqbadges = $conn->prepare('SELECT * FROM 0succes WHERE pseudo = ? && scenario = "ambria"');
$reqbadges->execute([$getid]);
$badges = $reqbadges->fetchAll();
$debut = '<div class="succesbox"><div class="succesbloque"></div><div class="succesobtenu"><img src="/escaperpg/images/succes/ambria/debutoff.png"><span><u><b>En route pour l\'aventure !</b></u><br>Lancer l\'aventure pour la première fois</span></div></div>';
$debutcheck = false;
$fin = '<div class="succesbox"><div class="succesbloque"></div><div class="succesobtenu"><img src="/escaperpg/images/succes/ambria/finoff.png"><span><u><b>La vie de pirate</b></u><br>Terminer l\'aventure</span></div></div>';
$fincheck = false;
$carte = '<div class="succesbox"><div class="succesbloque"></div><div class="succesobtenu"><img src="/escaperpg/images/succes/ambria/carteoff.png"><span><u><b>Fin limier</b></u><br>Trouver une piste menant à la carte d\'Ambria</span></div></div>';
$cartecheck = false;
$fuir = '<div class="succesbox"><div class="succesbloque"></div><div class="succesobtenu"><img src="/escaperpg/images/succes/ambria/fuiroff.png"><span><u><b>Échappée belle</b></u><br>Fuir et semer ses poursuivants dans les ruelles</span></div></div>';
$fuircheck = false;
$cap = '<div class="succesbox"><div class="succesbloque"></div><div class="succesobtenu"><img src="/escaperpg/images/succes/ambria/capoff.png"><span><u><b>Droit vers l\'horizon !</b></u><br>Trouver un cap pour le Surgisseur des Tempêtes</span></div></div>';
$capcheck = false;
$ambria = '<div class="succesbox"><div class="succesbloque"></div><div class="succesobtenu"><img src="/escaperpg/images/succes/ambria/ambriaoff.png"><span><u><b>Vestiges du passé</b></u><br>Entrer dans la cité perdue d\'Ambria</span></div></div>';
$ambriacheck = false;
?>

<div id="containerscenario">
    <div id="bannieresucces">
        <img src="/escaperpg/images/tresorambriacard.png" alt="le trésor d'ambria">
        <div class="containerprog">
            <div class="banniereprogression" style="width :<?= $widthambria ?>%"></div>
            <p>
                <?= (round($widthambria * 2) / 2) ?>%
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
            if ($succes['description'] == 'carte') {
                $cartecheck = true;
            }
            if ($succes['description'] == 'fuir') {
                $fuircheck = true;
            }
            if ($succes['description'] == 'cap') {
                $capcheck = true;
            }
            if ($succes['description'] == 'ambria') {
                $ambriacheck = true;
            }
            if ($succes['cache'] == 'oui') {
                $counterambria++;
            }
        }

        $reqbadges = $conn->prepare('SELECT * FROM 0succes WHERE pseudo = ? && scenario = "ambria" && rarete = "succesplatine" ORDER BY id DESC');
        $reqbadges->execute([$getid]);
        while ($badges = $reqbadges->fetch()): ?>
            <div class="succesbox">
                <div class="<?= $badges['rarete'] ?>"></div>
                <div class="succesobtenu"><?= $badges['badge'] ?></div>
            </div>
        <?php endwhile;

        $reqbadges = $conn->prepare('SELECT * FROM 0succes WHERE pseudo = ? && scenario = "ambria" && rarete = "succesdiamant" ORDER BY id DESC');
        $reqbadges->execute([$getid]);
        while ($badges = $reqbadges->fetch()): ?>
            <div class="succesbox">
                <div class="<?= $badges['rarete'] ?>"></div>
                <div class="succesobtenu"><?= $badges['badge'] ?></div>
            </div>
        <?php endwhile;

        $reqbadges = $conn->prepare('SELECT * FROM 0succes WHERE pseudo = ? && scenario = "ambria" && rarete = "succesgold" ORDER BY id DESC');
        $reqbadges->execute([$getid]);
        while ($badges = $reqbadges->fetch()): ?>
            <div class="succesbox">
                <div class="<?= $badges['rarete'] ?>"></div>
                <div class="succesobtenu"><?= $badges['badge'] ?></div>
            </div>
        <?php endwhile;

        $reqbadges = $conn->prepare('SELECT * FROM 0succes WHERE pseudo = ? && scenario = "ambria" && rarete = "succesargent" ORDER BY id DESC');
        $reqbadges->execute([$getid]);
        while ($badges = $reqbadges->fetch()): ?>
            <div class="succesbox">
                <div class="<?= $badges['rarete'] ?>"></div>
                <div class="succesobtenu"><?= $badges['badge'] ?></div>
            </div>
        <?php endwhile;

        $reqbadges = $conn->prepare('SELECT * FROM 0succes WHERE pseudo = ? && scenario = "ambria" && rarete = "succesbronze" ORDER BY id DESC');
        $reqbadges->execute([$getid]);
        while ($badges = $reqbadges->fetch()): ?>
            <div class="succesbox">
                <div class="<?= $badges['rarete'] ?>"></div>
                <div class="succesobtenu"><?= $badges['badge'] ?></div>
            </div>
        <?php endwhile;

        $reqbadges = $conn->prepare('SELECT * FROM 0succes WHERE pseudo = ? && scenario = "ambria" && rarete = "succesnormal" ORDER BY id DESC');
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
        if (!$cartecheck) {
            echo $carte;
        }
        if (!$fuircheck) {
            echo $fuir;
        }
        if (!$capcheck) {
            echo $cap;
        }
        if (!$ambriacheck) {
            echo $ambria;
        }
        if ((18 - $counterambria) > 1): ?>
            <div class="succesbox">
                <div class="succesbloque"></div>
                <div class="succesobtenu">
                    +<?= (18 - $counterambria) ?>
                    <span>Encore <?= (18 - $counterambria) ?> succès cachés à débloquer !</span>
                </div>
            </div>
        <?php elseif ((18 - $counterambria) == 1): ?>
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
