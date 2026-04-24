<?php use App\Core\View; ?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'EscapeRPG' ?></title>
    <link rel="stylesheet" href="<?= asset('assets/styles/base.css') ?>">
    <link rel="stylesheet" href="<?= asset('assets/styles/aventures_general/dialogues.css') ?>">
    <link rel="stylesheet" href="<?= asset('assets/styles/cartes/cartes.css') ?>">
    <link rel="stylesheet" href="<?= asset('assets/styles/textes/liens.css') ?>">
    <link rel="stylesheet" href="<?= asset('assets/styles/membres/compte_btn.css') ?>">
    <link rel="stylesheet" href="<?= asset('assets/styles/membres/membres.css') ?>">
    <link rel="stylesheet" href="<?= asset('assets/styles/succes/succes.css') ?>">
    <link rel="stylesheet" href="<?= asset('assets/styles/forms/formulaires.css') ?>">
    <link rel="stylesheet" href="<?= asset('assets/styles/loader.css') ?>">
    <link rel="icon" href="<?= asset('assets/img/reponse.png') ?>">
    <?= View::get('styles') ?>
</head>
<body>
<?php if (($showGlobalHeader ?? true) === true): ?>
    <?php require __DIR__ . '/_site_header.php'; ?>
<?php endif; ?>

<?= View::get('nav') ?>

<?php require __DIR__ . '/_account.php'; ?>
<?php require __DIR__ . '/_achievement_popup.php'; ?>

<main>
    <?= View::get('content') ?>
</main>
<div id="load">
    <div id="loader"></div>
</div>

<?= View::get('footer') ?>

<?= View::get('scripts') ?>
<script src="<?= asset('assets/js/header.js') ?>"></script>
<script src="<?= asset('assets/js/achievement-popup.js') ?>"></script>
<script src="<?= asset('assets/js/chargement.js') ?>"></script>
</body>
</html>
