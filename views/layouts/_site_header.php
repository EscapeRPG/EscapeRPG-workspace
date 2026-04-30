<?php $currentUser = auth_user(); ?>

<header>
    <a href="<?= url('/') ?>" class="site-header__logo" target="_blank">
        <img
            src="<?= asset('assets/img/logo_escaperpg.png') ?>"
            id="accueilLink"
            alt="accueil"
            data-default-src="<?= asset('assets/img/logo_escaperpg.png') ?>"
            data-hover-src="<?= asset('assets/img/logo_escaperpghover.png') ?>"
        >
    </a>

    <a href="<?= url('/#bloc2') ?>" class="site-header__link" target="_blank">
        <?php include('assets/svg/epee.svg') ?> — Aventures
    </a>

    <a href="<?= url('/#bloc3') ?>" class="site-header__link" target="_blank">
        <?php include('assets/svg/regles.svg') ?> — Règles
    </a>

    <a href="<?= url('/#bloc4') ?>" class="site-header__link" target="_blank">
        <?php include('assets/svg/loupe.svg') ?> — Liens
    </a>

    <?php if ($currentUser): ?>
        <a href="<?= url('/mon-compte') ?>" class="site-header__link" target="_blank">
            <img src="<?= asset('assets/img/uploads/' . ($currentUser['avatar'] ?? 'default.png')) ?>" alt="<?= e($currentUser['pseudo'] ?? '') ?>">
            — Mon compte
        </a>
    <?php else: ?>
        <a href="<?= url('/login') ?>" class="site-header__link" target="_blank">
            <?php include('assets/svg/invite.svg') ?> — Espace membres
        </a>
    <?php endif; ?>
</header>
