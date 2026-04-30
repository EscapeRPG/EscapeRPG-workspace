<?php use App\Core\View; ?>

<?php View::start('styles'); ?>
<link rel="stylesheet" href="<?= asset('assets/styles/membres/membres.css') ?>">
<?php View::end(); ?>

<?php View::start('aside'); ?>
<aside class="member-profile-aside">
    <div class="portraitavatarcompte">
        <img src="<?= asset('assets/img/uploads/' . ($member['avatar'] ?? 'default.png')) ?>" alt="<?= e($member['pseudo'] ?? '') ?>">
    </div>

    <h2><?= e($member['pseudo'] ?? '') ?></h2>

    <?php if (!empty($member['date_inscription'])): ?>
        <p class="member-since">Membre depuis le <?= e(date('d/m/Y', strtotime((string) $member['date_inscription']))) ?></p>
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

    <?php if (($member['pseudo'] ?? '') !== 'le narrateur'): ?>
    <fieldset>
        <legend>Partenaires d'aventure</legend>

        <div id="containeramis">
            <?php if (!empty($friends)): ?>
                <?php foreach ($friends as $friend): ?>
                    <a href="<?= url('/membres/' . rawurlencode($friend['pseudo'] ?? '')) ?>">
                        <img
                            src="<?= asset('assets/img/uploads/' . ($friend['avatar'] ?? 'default.png')) ?>"
                            alt="<?= e($friend['pseudo'] ?? '') ?>"
                            title="<?= e($friend['pseudo'] ?? '') ?>"
                        >
                    </a>
                <?php endforeach; ?>
            <?php else: ?>
                <p>Cette personne n'a pas encore ajouté de partenaire.</p>
            <?php endif; ?>
        </div>

        <?php if (!empty($canAddFriend)): ?>
            <form action="<?= url('/membres/' . rawurlencode($member['pseudo'] ?? '') . '/amis') ?>" method="post">
                <?= csrf_field() ?>
                <input type="submit" name="addfriend" value="Devenir partenaires d'aventure">
            </form>
        <?php endif; ?>
    </fieldset>
    <?php endif; ?>
</aside>
<?php View::end(); ?>

<?php View::start('content'); ?>
<section class="adventure-shell member-achievements">
    <?php if (($member['pseudo'] ?? '') === 'le narrateur'): ?>
        <h2>Félicitations d'être arrivé·e jusqu'ici ! Vous méritez bien un succès spécial !</h2>
    <?php endif; ?>

    <form action="<?= url('/membres') ?>" method="get">
        <input type="search" name="pseudo" value="<?= e($member['pseudo'] ?? '') ?>">
        <input type="submit" class="connecting" value="Rechercher un membre">
    </form>

    <h1>Succès obtenus</h1>

    <div class="containerprog">
        <div class="banniereprogression" style="width: <?= (int) ($globalProgress ?? 0) ?>%"></div>
        <p><?= (int) ($globalProgress ?? 0) ?>% au total</p>
    </div>

    <?php foreach (($achievementSections ?? []) as $section): ?>
        <?php require __DIR__ . '/partials/_achievement_section.php'; ?>
    <?php endforeach; ?>
</section>
<?php View::end(); ?>
