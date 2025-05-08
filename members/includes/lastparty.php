<?php
$reqbadges = $conn->prepare('SELECT * FROM 0succes WHERE pseudo = ? && scenario = "lastparty"');
$reqbadges->execute([$getid]);
$badges = $reqbadges->fetchAll();
$debut = '<div class="succesbox"><div class="succesbloque"></div><div class="succesobtenu"><img src="/escaperpg/images/succes/lastparty/debutoff.png"><span><u><b>Réveil difficile</b></u><br>Lancer l\'aventure pour la première fois</span></div></div>';
$debutcheck = false;
$fin = '<div class="succesbox"><div class="succesbloque"></div><div class="succesobtenu"><img src="/escaperpg/images/succes/lastparty/finoff.png"><span><u><b>Recouvrer la mémoire</b></u><br>Terminer l\'aventure</span></div></div>';
$fincheck = false;
?>
<div id="containerscenario">
    <div id="bannieresucces">
        <img src="/escaperpg/images/lastpartycard.png" alt="last party">
        <div class="containerprog">
            <div class="banniereprogression" style="width :<?= $widthlp ?>%"></div>
            <p>
                <?= (round($widthlp * 2) / 2) ?>%
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
            if ($succes['cache'] == 'oui') {
                $counterlastparty++;
            }
        }

        $reqbadges = $conn->prepare('SELECT * FROM 0succes WHERE pseudo = ? && scenario = "lastparty" && rarete = "succesplatine" ORDER BY id DESC');
        $reqbadges->execute([$getid]);
        while ($badges = $reqbadges->fetch()): ?>
            <div class="succesbox">
                <div class="<?= $badges['rarete'] ?>"></div>
                <div class="succesobtenu"><?= $badges['badge'] ?></div>
            </div>
        <?php endwhile;

        $reqbadges = $conn->prepare('SELECT * FROM 0succes WHERE pseudo = ? && scenario = "lastparty" && rarete = "succesdiamant" ORDER BY id DESC');
        $reqbadges->execute([$getid]);
        while ($badges = $reqbadges->fetch()): ?>
            <div class="succesbox">
                <div class="<?= $badges['rarete'] ?>"></div>
                <div class="succesobtenu"><?= $badges['badge'] ?></div>
            </div>
        <?php endwhile;

        $reqbadges = $conn->prepare('SELECT * FROM 0succes WHERE pseudo = ? && scenario = "lastparty" && rarete = "succesgold" ORDER BY id DESC');
        $reqbadges->execute([$getid]);
        while ($badges = $reqbadges->fetch()): ?>
            <div class="succesbox">
                <div class="<?= $badges['rarete'] ?>"></div>
                <div class="succesobtenu"><?= $badges['badge'] ?></div>
            </div>
        <?php endwhile;

        $reqbadges = $conn->prepare('SELECT * FROM 0succes WHERE pseudo = ? && scenario = "lastparty" && rarete = "succesargent" ORDER BY id DESC');
        $reqbadges->execute([$getid]);
        while ($badges = $reqbadges->fetch()): ?>
            <div class="succesbox">
                <div class="<?= $badges['rarete'] ?>"></div>
                <div class="succesobtenu"><?= $badges['badge'] ?></div>
            </div>
        <?php endwhile;

        $reqbadges = $conn->prepare('SELECT * FROM 0succes WHERE pseudo = ? && scenario = "lastparty" && rarete = "succesbronze" ORDER BY id DESC');
        $reqbadges->execute([$getid]);
        while ($badges = $reqbadges->fetch()): ?>
            <div class="succesbox">
                <div class="<?= $badges['rarete'] ?>"></div>
                <div class="succesobtenu"><?= $badges['badge'] ?></div>
            </div>
        <?php endwhile;

        $reqbadges = $conn->prepare('SELECT * FROM 0succes WHERE pseudo = ? && scenario = "lastparty" && rarete = "succesnormal" ORDER BY id DESC');
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
                <div class="succesobtenu">+1
                    <span>Encore 1 succès caché à débloquer !</span>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>
