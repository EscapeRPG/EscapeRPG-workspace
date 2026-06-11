<?php use App\Core\View; ?>

<?php View::start('styles'); ?>
<link rel="stylesheet" href="<?= asset('assets/styles/errors.css') ?>">
<?php View::end(); ?>

<?php View::start('content'); ?>
<section class="error-page">
    <img src="<?= asset('assets/img/banniere.png') ?>" class="error-page__banner" alt="EscapeRPG">

    <div class="error-page__dialogue dialogue">
        <div class="portrait">
            <img src="<?= asset('assets/img/narrateur.png') ?>" alt="Narrateur">
        </div>

        <div class="bulleperso">
            <p><strong><?= e((string) $status) ?> - <?= e($errorTitle ?? 'Erreur') ?></strong></p>
            <p><?= e($message ?? 'Une erreur est survenue.') ?></p>
            <p>Vous pouvez revenir à la page précédente pour reprendre votre route.</p>
        </div>
    </div>

    <p class="error-page__actions">
        <button type="button" data-error-back>Retour</button>
    </p>
</section>
<?php View::end(); ?>

<?php View::start('scripts'); ?>
<script>
document.querySelector('[data-error-back]')?.addEventListener('click', () => {
    if (window.history.length > 1) {
        window.history.back();
        return;
    }

    window.location.href = '<?= url('/') ?>';
});
</script>
<?php View::end(); ?>
