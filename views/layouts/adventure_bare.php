<?php use App\Core\View; ?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'EscapeRPG' ?></title>
    <link rel="icon" href="<?= asset('assets/img/reponse.png') ?>">
    <?php foreach (($adventure['styles'] ?? []) as $stylesheet): ?>
        <link rel="stylesheet" href="<?= asset($stylesheet) ?>">
    <?php endforeach; ?>
    <?= View::get('styles') ?>
</head>
<body>
<?= View::get('content') ?>
<?= View::get('scripts') ?>
</body>
</html>
