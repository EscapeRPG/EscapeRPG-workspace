<?php use App\Core\View; ?>

<?php View::start('content'); ?>
<div class="formconnexion">
    <h1>Mot de passe oublié</h1>
    <p>Indiquez l’adresse email associée à votre compte.</p>
    <form action="<?= url('/forgot-password') ?>" method="post">
        <?= csrf_field() ?>
        <div class="registration-trap" aria-hidden="true">
            <label for="website">Site web</label>
            <input type="text" name="website" id="website" tabindex="-1" autocomplete="off">
        </div>
        <input type="email" name="email" placeholder="Email" required>
        <br>
        <input type="submit" class="connecting" value="Envoyer le lien">
    </form>
    <br>
    <a href="<?= url('/login') ?>">Retour à la connexion</a>
</div>
<?php View::end(); ?>
