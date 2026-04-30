<?php use App\Core\View; ?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'EscapeRPG' ?></title>
    <link rel="icon" href="<?= asset('assets/img/reponse.png') ?>">
    <link rel="stylesheet" href="<?= asset('assets/styles/aventures_general/page.css') ?>">
    <link rel="stylesheet" href="<?= asset('assets/styles/header.css') ?>">
    <link rel="stylesheet" href="<?= asset('assets/styles/aventures_general/dialogues.css') ?>">
    <link rel="stylesheet" href="<?= asset('assets/styles/aventures_general/aside.css') ?>">
    <link rel="stylesheet" href="<?= asset('assets/styles/aventures_general/inputs.css') ?>">
    <link rel="stylesheet" href="<?= asset('assets/styles/aventures_general/indices_btn.css') ?>">
    <link rel="stylesheet" href="<?= asset('assets/styles/textes/spans.css') ?>">
    <link rel="stylesheet" href="<?= asset('assets/styles/membres/compte_btn.css') ?>">
    <link rel="stylesheet" href="<?= asset('assets/styles/aventures_general/footer.css') ?>">
    <link rel="stylesheet" href="<?= asset('assets/styles/aventures_general/image_modal.css') ?>">
    <link rel="stylesheet" href="<?= asset('assets/styles/succes/succes.css') ?>">
    <link rel="stylesheet" href="<?= asset('assets/styles/loader.css') ?>">
    <?php foreach (($adventure['styles'] ?? []) as $stylesheet): ?>
        <link rel="stylesheet" href="<?= asset($stylesheet) ?>">
    <?php endforeach; ?>
    <?= View::get('styles') ?>
</head>
<body>
<?php if (($showGlobalHeader ?? true) === true): ?>
    <?php require __DIR__ . '/_site_header.php'; ?>
<?php endif; ?>

<?php if (!empty($adventure['assets']['banner'])): ?>
    <div id="banniere">
        <img src="<?= asset($adventure['assets']['banner']) ?>" alt="<?= e(($adventure['title'] ?? 'Aventure') . ' bannière') ?>">
    </div>
<?php endif; ?>

<?php require __DIR__ . '/_toasts.php'; ?>

<main>
    <?= View::get('aside') ?>
    <?= View::get('content') ?>
</main>
<div id="load">
    <div id="loader"></div>
</div>

<?= View::get('footer') ?>

<?= View::get('scripts') ?>
<script src="<?= asset('assets/js/header.js') ?>"></script>
<script src="<?= asset('assets/js/achievement-popup.js') ?>"></script>
<script src="<?= asset('assets/js/image-modal.js') ?>"></script>
<script src="<?= asset('assets/js/aventures-chargement.js') ?>"></script>
</body>
</html>
