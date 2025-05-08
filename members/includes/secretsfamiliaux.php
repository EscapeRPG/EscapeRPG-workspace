<?php
$reqbadges = $conn->prepare('SELECT * FROM 0succes WHERE pseudo = ? && scenario = "secrets"');
$reqbadges->execute([$getid]);
$badges = $reqbadges->fetchAll();
$debut = '<div class="succesbox"><div class="succesbloque"></div><div class="succesobtenu"><img src="/escaperpg/images/succes/secrets/debutoff.png"><span><u><b>Cadeau empoisonné ?</b></u><br>Lancer l\'aventure pour la première fois</span></div></div>';
$debutcheck = false;
$fin = '<div class="succesbox"><div class="succesbloque"></div><div class="succesobtenu"><img src="/escaperpg/images/succes/secrets/finoff.png"><span><u><b>Ainsi s\'achève l\'histoire</b></u><br>Terminer l\'aventure</span></div></div>';
$fincheck = false;
$manoir = '<div class="succesbox"><div class="succesbloque"></div><div class="succesobtenu"><img src="/escaperpg/images/succes/secrets/manoiroff.png"><span><u><b>Nouveau propriétaire</b></u><br>Entrer pour la première fois dans le manoir</span></div></div>';
$manoircheck = false;
$journal = '<div class="succesbox"><div class="succesbloque"></div><div class="succesobtenu"><img src="/escaperpg/images/succes/secrets/journaloff.png"><span><u><b>Archiviste</b></u><br>Récupérer toutes les pages du journal de l\'oncle William</span></div></div>';
$journalcheck = false;
$verite = '<div class="succesbox"><div class="succesbloque"></div><div class="succesobtenu"><img src="/escaperpg/images/succes/secrets/veriteoff.png"><span><u><b>Découvreur</b></u><br>Apprendre l\'horrible vérité sur le secret du manoir</span></div></div>';
$veritecheck = false;
?>

<div id="containerscenario">
    <div id="bannieresucces">
        <img src="/escaperpg/images/secretscard.png" alt="secrets familiaux">
        <div class="containerprog">
            <div class="banniereprogression" style="width :<?= $widthsecrets ?>%"></div>
            <p>
                <?= (round($widthsecrets * 2) / 2) ?>%
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
            if ($succes['description'] == 'manoir') {
                $manoircheck = true;
            }
            if ($succes['description'] == 'journal') {
                $journalcheck = true;
            }
            if ($succes['description'] == 'vérité') {
                $veritecheck = true;
            }
            if ($succes['cache'] == 'oui') {
                $countersecrets++;
            }
        }

        $reqbadges = $conn->prepare('SELECT * FROM 0succes WHERE pseudo = ? && scenario = "secrets" && rarete = "succesplatine" ORDER BY id DESC');
        $reqbadges->execute([$getid]);
        while ($badges = $reqbadges->fetch()): ?>
            <div class="succesbox">
                <div class="<?= $badges['rarete'] ?>"></div>
                <div class="succesobtenu"><?= $badges['badge'] ?></div>
            </div>
        <?php endwhile;

        $reqbadges = $conn->prepare('SELECT * FROM 0succes WHERE pseudo = ? && scenario = "secrets" && rarete = "succesdiamant" ORDER BY id DESC');
        $reqbadges->execute([$getid]);
        while ($badges = $reqbadges->fetch()): ?>
            <div class="succesbox">
                <div class="<?= $badges['rarete'] ?>"></div>
                <div class="succesobtenu"><?= $badges['badge'] ?></div>
            </div>
        <?php endwhile;

        $reqbadges = $conn->prepare('SELECT * FROM 0succes WHERE pseudo = ? && scenario = "secrets" && rarete = "succesgold" ORDER BY id DESC');
        $reqbadges->execute([$getid]);
        while ($badges = $reqbadges->fetch()): ?>
            <div class="succesbox">
                <div class="<?= $badges['rarete'] ?>"></div>
                <div class="succesobtenu"><?= $badges['badge'] ?></div>
            </div>
        <?php endwhile;

        $reqbadges = $conn->prepare('SELECT * FROM 0succes WHERE pseudo = ? && scenario = "secrets" && rarete = "succesargent" ORDER BY id DESC');
        $reqbadges->execute([$getid]);
        while ($badges = $reqbadges->fetch()): ?>
            <div class="succesbox">
                <div class="<?= $badges['rarete'] ?>"></div>
                <div class="succesobtenu"><?= $badges['badge'] ?></div>
            </div>
        <?php endwhile;

        $reqbadges = $conn->prepare('SELECT * FROM 0succes WHERE pseudo = ? && scenario = "secrets" && rarete = "succesbronze" ORDER BY id DESC');
        $reqbadges->execute([$getid]);
        while ($badges = $reqbadges->fetch()): ?>
            <div class="succesbox">
                <div class="<?= $badges['rarete'] ?>"></div>
                <div class="succesobtenu"><?= $badges['badge'] ?></div>
            </div>
        <?php endwhile;

        $reqbadges = $conn->prepare('SELECT * FROM 0succes WHERE pseudo = ? && scenario = "secrets" && rarete = "succesnormal" ORDER BY id DESC');
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
        if (!$manoircheck) {
            echo $manoir;
        }
        if (!$journalcheck) {
            echo $journal;
        }
        if (!$veritecheck) {
            echo $verite;
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
