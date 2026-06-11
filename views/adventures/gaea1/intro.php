<?php
$firstName = (string)($state['pjprenom'] ?? '');
$lastName = mb_strtoupper((string)($state['pjnom'] ?? ''), 'UTF-8');
?>

<div id="intro-wrap">
    <div id="fondintro">
        <img src="<?= asset('assets/img/gaea1/etoiles.png') ?>" alt="">
        <div id="vaisseauintro">
            <img src="<?= asset('assets/img/gaea1/vaisseau.png') ?>" alt="SEEKER">
            <div id="reacteur1"></div><div id="reacteur2"></div><div id="reacteur3"></div><div id="reacteur4"></div><div id="reacteur5"></div>
        </div>
    </div>
    <div id="fondunoir"></div>
    <div id="fondintro2">
        <img src="<?= asset('assets/img/gaea1/etoiles2.png') ?>" alt="">
        <img src="<?= asset('assets/img/gaea1/etoiles3.png') ?>" id="etoilespan" alt="">
        <img src="<?= asset('assets/img/gaea1/etoiles3.png') ?>" id="etoilespan2" alt="">
        <div id="vaisseauintro2">
            <div id="reacteur6"></div>
            <img src="<?= asset('assets/img/gaea1/vaisseau2.png') ?>" alt="SEEKER">
        </div>
    </div>
    <div id="fondunoir2"></div>
    <div id="textintro1">
        <div class="type1">Quelque part aux confins de la galaxie d'Andromède.</div>
        <div class="type2">Secteur P1-CMF-86.</div><br>
        <div class="type3">Année 1 058 depuis l'Exode.</div>
    </div>
    <div id="textintro2">
        <div class="type4"><i>SEEKER</i>, vaisseau d'exploration.</div>
        <div class="type5">Provenance : Planète PA-99-N2 b.</div>
        <div class="type6">Destination : Station Kamari, secteur P1-AZ-0340.</div>
        <div class="type7">Équipage : 1, <?= e(trim($firstName . ' ' . $lastName)) ?>.</div>
    </div>
    <div id="introtitre"></div>
    <form action="<?= e(url('/aventures/gaea1/andromede')) ?>" method="post">
        <button type="submit" class="action" name="action" id="introinput" value="start_intro">suivant.</button>
    </form>
</div>
