<?php use App\Core\View; ?>

<?php View::start('content'); ?>
<div id="formconnexion">
    <div class="portraitavatarcompte">
        <img src="<?= asset('assets/img/uploads/' . ($member['avatar'] ?? 'narrateur.png')) ?>" alt="<?= e($member['id'] ?? '') ?>">
    </div>
    <h2><?= e($member['id'] ?? '') ?></h2>

    <?php if ($message = flash('success')): ?>
        <p><?= e($message) ?></p>
    <?php endif; ?>
    <?php if ($message = flash('error')): ?>
        <p><?= e($message) ?></p>
    <?php endif; ?>

    <?php if (!empty($isOwner)): ?>
        <form action="<?= url('/profil/edit') ?>" method="get">
            <input type="submit" value="Éditer mon profil">
        </form>
        <form action="<?= url('/logout') ?>" method="post">
            <?= csrf_field() ?>
            <input type="submit" name="disconnect" value="Déconnexion">
        </form>
    <?php endif; ?>
</div>

<?php if (($member['id'] ?? '') === 'le narrateur'): ?>
    <h2>Félicitations d'être arrivé·e ici ! Vous méritez bien un succès spécial !</h2>
<?php else: ?>
    <h2>Partenaires d'aventure</h2>

    <div id="containeramis">
        <?php if (!empty($friends)): ?>
            <?php foreach ($friends as $friend): ?>
                <a href="<?= url('/membres/' . rawurlencode($friend['id'] ?? '')) ?>">
                    <img
                        src="<?= asset('assets/img/uploads/' . ($friend['avatar'] ?? 'narrateur.png')) ?>"
                        alt="<?= e($friend['id'] ?? '') ?>"
                        title="<?= e($friend['id'] ?? '') ?>"
                    >
                </a>
            <?php endforeach; ?>
        <?php else: ?>
            <p>Cette personne n'a pas encore ajouté de partenaire.</p>
        <?php endif; ?>
    </div>

    <?php if (!empty($canAddFriend)): ?>
        <form action="<?= url('/membres/' . rawurlencode($member['id'] ?? '') . '/amis') ?>" method="post">
            <?= csrf_field() ?>
            <input type="submit" name="addfriend" value="Devenir partenaires d'aventure">
        </form>
    <?php endif; ?>
<?php endif; ?>

<form action="<?= url('/membres') ?>" method="get">
    <input type="text" name="id" value="<?= e($member['id'] ?? '') ?>">
    <input type="submit" class="connecting" value="Rechercher un membre">
</form>

<h2>Succès obtenus</h2>

<div class="containerprog">
    <div class="banniereprogression" style="width: <?= (int) ($globalProgress ?? 0) ?>%"></div>
    <p><?= (int) ($globalProgress ?? 0) ?>% au total</p>
</div>

<?php foreach (($achievementSections ?? []) as $section): ?>
    <?php require __DIR__ . '/partials/_achievement_section.php'; ?>
<?php endforeach; ?>
<?php View::end(); ?>
