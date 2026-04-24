<?php use App\Core\View; ?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'EscapeRPG' ?></title>
    <link rel="stylesheet" href="<?= asset('assets/styles/base.css') ?>">
    <?= View::get('styles') ?>
</head>
<body>
<header>
    <nav>

    </nav>
</header>

<main class="page">
    <?= View::get('content') ?>
    Test
</main>

<?= View::get('footer') ?>

<?= View::get('scripts') ?>
</body>
</html>
