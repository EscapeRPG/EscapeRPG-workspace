<header>
    <a href="<?= url('/') ?>" class="site-header__logo">
        <img
            src="<?= asset('assets/img/logo_escaperpg.png') ?>"
            id="accueilLink"
            alt="accueil"
            data-default-src="<?= asset('assets/img/logo_escaperpg.png') ?>"
            data-hover-src="<?= asset('assets/img/logo_escaperpghover.png') ?>"
        >
    </a>
    <a href="<?= url('/#bloc2') ?>" class="site-header__link">
        <?php include('assets/svg/epee.svg') ?> — Aventures
    </a>
    <a href="<?= url('/#bloc3') ?>" class="site-header__link">
        <?php include('assets/svg/regles.svg') ?> — Règles
    </a>
    <a href="<?= url('/#bloc4') ?>" class="site-header__link">
        <?php include('assets/svg/loupe.svg') ?> — Liens
    </a>
</header>
