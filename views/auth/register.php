<?php use App\Core\View; ?>

<?php View::start('content'); ?>
<div id="formconnexion">
    <h1>Création d'un nouveau compte</h1>
    <?php if ($message = flash('error')): ?>
        <p><?= e($message) ?></p>
    <?php endif; ?>

    <form action="<?= url('/register') ?>" method="post" enctype="multipart/form-data">
        <?= csrf_field() ?>
        <input type="text" name="pseudocompte" placeholder="Pseudo (20 caractères max)" maxlength="20" required>
        <br>
        <input type="email" name="email" placeholder="Email" required>
        <br>
        <input type="password" name="pass1" placeholder="Mot de passe" required>
        <br>
        <input type="password" name="pass2" placeholder="Confirmez le mot de passe" required>
        <br><br>
        <input type="file" name="avatar" id="avatar">
        <br>
        <label for="avatar">Avatar (max 4 Mo, .jpg/.png uniquement)</label>
        <br><br>
        <input type="submit" class="connecting" value="Valider">
    </form>
    <br>
    <a href="<?= url('/login') ?>">Vous avez déjà un compte ? Connectez-vous</a>
</div>
<?php View::end(); ?>
