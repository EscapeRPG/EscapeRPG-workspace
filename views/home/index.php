<?php use App\Core\View; ?>

<?php View::start('styles'); ?>
<?php View::end(); ?>

<?php View::start('nav'); ?>
<?php require_once __DIR__ . '/partials/_nav.php'; ?>
<?php View::end(); ?>

<?php View::start('content'); ?>
<?php require_once __DIR__ . '/partials/_banniere.php'; ?>
<?php require_once __DIR__ . '/partials/_bienvenue.php'; ?>
<?php require_once __DIR__ . '/partials/_aventures.php'; ?>
<?php require_once __DIR__ . '/partials/_regles.php'; ?>
<?php require_once __DIR__ . '/partials/_liens.php'; ?>
<?php View::end(); ?>

<?php View::start('scripts'); ?>
<script src="<?= asset('assets/js/animations.js') ?>"></script>
<script src="<?= asset('assets/js/liens.js') ?>"></script>
<?php View::end(); ?>
