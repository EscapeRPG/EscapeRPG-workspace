<?php
$reqbadges = $conn->prepare('SELECT * FROM 0succes WHERE pseudo = ? && scenario = "general"');
$reqbadges->execute([$getid]);
$badges = $reqbadges->fetchAll();
$inscription = '<div class="succesbox"><div class="succesbloque"></div><div class="succesobtenu"><img src="/escaperpg/images/succes/general/inscriptionoff.png"><span><u><b>Première connexion</b></u><br>Se connecter à l\'espace membres d\'EscapeRPG pour la première fois</span></div></div>';
$inscriptioncheck = false;
$debut = '<div class="succesbox"><div class="succesbloque"></div><div class="succesobtenu"><img src="/escaperpg/images/succes/general/debutoff.png"><span><u><b>Se lancer dans l\'aventure</b></u><br>Commencer une aventure pour la première fois</span></div></div>';
$debutcheck = false;
$fin = '<div class="succesbox"><div class="succesbloque"></div><div class="succesobtenu"><img src="/escaperpg/images/succes/general/finoff.png"><span><u><b>Une page qui se tourne...</b></u><br>Terminer sa première aventure</span></div></div>';
$fincheck = false;
$meilleurefin = '<div class="succesbox"><div class="succesbloque"></div><div class="succesobtenu"><img src="/escaperpg/images/succes/general/meilleurefinoff.png"><span><u><b>Explorateur·rice sans faille</b></u><br>Terminer une aventure en obtenant la meilleure fin possible</span></div></div>';
$meilleurefincheck = false;
$legende = '<div class="succesbox"><div class="succesbloque"></div><div class="succesobtenu"><img src="/escaperpg/images/succes/general/legendeoff.png"><span><u><b>Légende vivante</b></u><br>Terminer une aventure avec un score de 5 étoiles ou plus</span></div></div>';
$legendecheck = false;
$sauvegarder = '<div class="succesbox"><div class="succesbloque"></div><div class="succesobtenu"><img src="/escaperpg/images/succes/general/sauvegarderoff.png"><span><u><b>Prendre une pause</b></u><br>Sauvegarder sa progression au cours d\'une aventure</span></div></div>';
$sauvegardercheck = false;
$charger = '<div class="succesbox"><div class="succesbloque"></div><div class="succesobtenu"><img src="/escaperpg/images/succes/general/chargeroff.png"><span><u><b>On reprend ?</b></u><br>Reprendre sa progression dans une aventure</span></div></div>';
$chargercheck = false;
$commentaire = '<div class="succesbox"><div class="succesbloque"></div><div class="succesobtenu"><img src="/escaperpg/images/succes/general/commentaireoff.png"><span><u><b>Crieur public</b></u><br>Laisser un commentaire en fin d\'aventure</span></div></div>';
$commentairecheck = false;
$amis = '<div class="succesbox"><div class="succesbloque"></div><div class="succesobtenu"><img src="/escaperpg/images/succes/general/amisoff.png"><span><u><b>On est mieux à plusieurs !</b></u><br>Avoir ajouté quelqu\'un en tant que partenaire d\'aventure</span></div></div>';
$amischeck = false;
$tipeee = '<div class="succesbox"><div class="succesbloque"></div><div class="succesobtenu"><img src="/escaperpg/images/succes/general/tipeeeoff.png"><span><u><b>Soutien sans faille</b></u><br>Soutenir le projet sur Tipeee !</span></div></div>';
$tipeeecheck = false;
$beta = '<div class="succesbox"><div class="succesbloque"></div><div class="succesobtenu"><img src="/escaperpg/images/succes/general/betaoff.png"><span><u><b>Bêta testeur·euse</b></u><br>Participer à la version bêta d\'une aventure</span></div></div>';
$betacheck = false;
$succesindice = '<div class="succesbox"><div class="succesbloque"></div><div class="succesobtenu"><img src="/escaperpg/images/succes/general/indiceoff.png"><span><u><b>À l\'aide !</b></u><br>Utiliser un indice pour la première fois</span></div></div>';
$succesindicecheck = false;
$succesreponse = '<div class="succesbox"><div class="succesbloque"></div><div class="succesobtenu"><img src="/escaperpg/images/succes/general/reponseoff.png"><span><u><b>Je n\'y arrivais pas...</b></u><br>Utiliser une réponse pour s\'en sortir d\'une énigme</span></div></div>';
$succesreponsecheck = false;
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
        <?php foreach ($badges as $succes) {
            if ($succes['description'] == 'inscription') {
                $inscriptioncheck = true;
            }
            if ($succes['description'] == 'début') {
                $debutcheck = true;
            }
            if ($succes['description'] == 'fin') {
                $fincheck = true;
            }
            if ($succes['description'] == 'meilleurefin') {
                $meilleurefincheck = true;
            }
            if ($succes['description'] == 'légende') {
                $legendecheck = true;
            }
            if ($succes['description'] == 'indice') {
                $succesindicecheck = true;
            }
            if ($succes['description'] == 'réponse') {
                $succesreponsecheck = true;
            }
            if ($succes['description'] == 'sauvegarder') {
                $sauvegardercheck = true;
            }
            if ($succes['description'] == 'charger') {
                $chargercheck = true;
            }
            if ($succes['description'] == 'commentaire') {
                $commentairecheck = true;
            }
            if ($succes['description'] == 'tipeee') {
                $tipeeecheck = true;
            }
            if ($succes['description'] == 'bêta') {
                $betacheck = true;
            }
            if ($succes['description'] == 'amis') {
                $amischeck = true;
            }
            if ($succes['cache'] == 'oui') {
                $countergeneral++;
            }
        }

        $reqbadges = $conn->prepare('SELECT * FROM 0succes WHERE pseudo = ? && scenario = "general" && rarete = "succesplatine" ORDER BY id DESC');
        $reqbadges->execute([$getid]);
        while ($badges = $reqbadges->fetch()): ?>
            <div class="succesbox">
                <div class="<?= $badges['rarete'] ?>"></div>
                <div class="succesobtenu"><?= $badges['badge'] ?></div>
            </div>
        <?php endwhile;

        $reqbadges = $conn->prepare('SELECT * FROM 0succes WHERE pseudo = ? && scenario = "general" && rarete = "succesdiamant" ORDER BY id DESC');
        $reqbadges->execute([$getid]);
        while ($badges = $reqbadges->fetch()): ?>
            <div class="succesbox">
                <div class="<?= $badges['rarete'] ?>"></div>
                <div class="succesobtenu"><?= $badges['badge'] ?></div>
            </div>
        <?php endwhile;

        $reqbadges = $conn->prepare('SELECT * FROM 0succes WHERE pseudo = ? && scenario = "general" && rarete = "succesgold" ORDER BY id DESC');
        $reqbadges->execute([$getid]);
        while ($badges = $reqbadges->fetch()): ?>
            <div class="succesbox">
                <div class="<?= $badges['rarete'] ?>"></div>
                <div class="succesobtenu"><?= $badges['badge'] ?></div>
            </div>
        <?php endwhile;

        $reqbadges = $conn->prepare('SELECT * FROM 0succes WHERE pseudo = ? && scenario = "general" && rarete = "succesargent" ORDER BY id DESC');
        $reqbadges->execute([$getid]);
        while ($badges = $reqbadges->fetch()): ?>
            <div class="succesbox">
                <div class="<?= $badges['rarete'] ?>"></div>
                <div class="succesobtenu"><?= $badges['badge'] ?></div>
            </div>
        <?php endwhile;

        $reqbadges = $conn->prepare('SELECT * FROM 0succes WHERE pseudo = ? && scenario = "general" && rarete = "succesbronze" ORDER BY id DESC');
        $reqbadges->execute([$getid]);
        while ($badges = $reqbadges->fetch()): ?>
            <div class="succesbox">
                <div class="<?= $badges['rarete'] ?>"></div>
                <div class="succesobtenu"><?= $badges['badge'] ?></div>
            </div>
        <?php endwhile;

        $reqbadges = $conn->prepare('SELECT * FROM 0succes WHERE pseudo = ? && scenario = "general" && rarete = "succesnormal" ORDER BY id DESC');
        $reqbadges->execute([$getid]);
        while ($badges = $reqbadges->fetch()): ?>
            <div class="succesbox">
                <div class="<?= $badges['rarete'] ?>"></div>
                <div class="succesobtenu"><?= $badges['badge'] ?></div>
            </div>
        <?php endwhile;

        if (!$inscriptioncheck) {
            echo $inscription;
        }
        if (!$debutcheck) {
            echo $debut;
        }
        if (!$fincheck) {
            echo $fin;
        }
        if (!$meilleurefincheck) {
            echo $meilleurefin;
        }
        if (!$legendecheck) {
            echo $legende;
        }
        if (!$succesindicecheck) {
            echo $succesindice;
        }
        if (!$succesreponsecheck) {
            echo $succesreponse;
        }
        if (!$sauvegardercheck) {
            echo $sauvegarder;
        }
        if (!$chargercheck) {
            echo $charger;
        }
        if (!$commentairecheck) {
            echo $commentaire;
        }
        if (!$tipeeecheck) {
            echo $tipeee;
        }
        if (!$amischeck) {
            echo $amis;
        }
        if (!$betacheck) {
            echo $beta;
        }
        if ((1 - $countergeneral) == 1): ?>
            <div class="succesbox">
                <div class="succesbloque"></div>
                <div class="succesobtenu">+1<span>Encore 1 succès caché à débloquer !</span></div>
            </div>
        <?php endif; ?>
    </div>
</div>
