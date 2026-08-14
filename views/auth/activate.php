<?php use App\Core\View; ?>

<?php View::start('content'); ?>
<div class="formconnexion">
    <h1>Activation du compte</h1>
    <p>
        Confirmez l’adresse email associée au compte
        <strong><?= e((string) ($member['pseudo'] ?? '')) ?></strong>.
    </p>
    <form action="<?= url('/activate-account/' . rawurlencode($activationToken)) ?>" method="post">
        <?= csrf_field() ?>
        <input type="submit" class="connecting" value="Activer mon compte">
    </form>
</div>
<?php View::end(); ?>
