<?php use App\Core\View; ?>

<?php View::start('content'); ?>
<div class="formconnexion">
    <h1>Nouveau mot de passe</h1>
    <form action="<?= url('/reset-password/' . rawurlencode($resetToken)) ?>" method="post">
        <?= csrf_field() ?>
        <input type="password" name="pass1" placeholder="Nouveau mot de passe" minlength="8" required>
        <br>
        <input type="password" name="pass2" placeholder="Confirmez le mot de passe" minlength="8" required>
        <br>
        <input type="submit" class="connecting" value="Modifier le mot de passe">
    </form>
</div>
<?php View::end(); ?>
