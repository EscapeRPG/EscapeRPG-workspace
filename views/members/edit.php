<?php use App\Core\View; ?>

<?php View::start('content'); ?>
<div id="formconnexion">
    <div class="portraitavatarcompte">
        <img src="<?= asset('assets/img/uploads/' . ($member['avatar'] ?? 'narrateur.png')) ?>" alt="<?= e($member['id'] ?? '') ?>">
    </div>

    <h1><?= e($member['id'] ?? '') ?></h1>

    <?php if ($message = flash('error')): ?>
        <p><?= e($message) ?></p>
    <?php endif; ?>

    <form action="<?= url('/profil/edit') ?>" method="post" enctype="multipart/form-data">
        <?= csrf_field() ?>
        <input type="file" name="avatar">
        <br>
        <br>
        <label for="email">Changer mon adresse mail :</label>
        <br>
        <input type="email" id="email" name="email" value="<?= e($member['email'] ?? '') ?>">
        <br>
        <br>
        <label for="pass1">Changer mon mot de passe :</label>
        <br>
        <input type="password" id="pass1" name="pass1" placeholder="Mot de passe actuel">
        <br>
        <input type="password" name="pass2" placeholder="Nouveau mot de passe">
        <br>
        <input type="password" name="pass3" placeholder="Confirmez le nouveau mot de passe">
        <br>
        <br>
        <input type="submit" class="connecting" value="Mettre à jour les informations">
    </form>

    <form action="<?= url('/mon-compte') ?>" method="get">
        <input type="submit" value="Retour">
    </form>
</div>
<?php View::end(); ?>
