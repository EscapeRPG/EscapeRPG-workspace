<?php use App\Core\View; ?>

<?php View::start('content'); ?>
<div id="formconnexion">
    <h1>Connexion à l'espace membres</h1>
    <?php if ($message = flash('error')): ?>
        <p><?= e($message) ?></p>
    <?php endif; ?>
    <?php if ($message = flash('success')): ?>
        <p><?= e($message) ?></p>
    <?php endif; ?>

    <form action="<?= url('/login') ?>" method="post">
        <?= csrf_field() ?>
        <input type="text" name="pseudocompte" placeholder="Pseudo" required>
        <br>
        <input type="password" name="pass" placeholder="Mot de passe" required>
        <br><br>
        <label for="autolog">Garder ma session active</label>
        <input type="checkbox" value="1" id="autolog" name="autolog">
        <br>
        <input type="submit" class="connecting" value="Connexion">
    </form>
    <br>
    <a href="<?= url('/register') ?>">Vous n'avez pas de compte ? Créez-en un maintenant !</a>
</div>
<?php View::end(); ?>
