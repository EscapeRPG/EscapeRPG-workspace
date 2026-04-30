<?php $currentUser = auth_user(); ?>

<nav>
    <div class="accueil">
        <?php if ($currentUser): ?>
            <a href="<?= url('/mon-compte') ?>">
                <span class="nav-link__icon">
                    <img src="<?= asset('assets/img/uploads/' . ($currentUser['avatar'] ?? 'default.png')) ?>" alt="<?= e($currentUser['pseudo'] ?? '') ?>">
                </span>
                <span class="nav-link__label">Mon compte</span>
            </a>
        <?php else: ?>
            <a href="<?= url('/login') ?>">
                <span class="nav-link__icon"><?php include('assets/svg/invite.svg') ?></span>
                <span class="nav-link__label">Espace membres</span>
            </a>
        <?php endif; ?>

        <a href="#bloc1">
            <span class="nav-link__icon"><?php include('assets/svg/maison.svg') ?></span>
            <span class="nav-link__label">Accueil</span>
        </a>
    </div>
    <br>
    <div class="accueil">
        <a href="#bloc1">
            <span class="nav-link__icon"><?php include('assets/svg/maison.svg') ?></span>
            <span class="nav-link__label">Accueil</span>
        </a>
    </div>
    <br>
    <div class="accueil">
        <a href="#bloc2" class="nav-link nav-link--test">
            <span class="nav-link__icon"><?php include('assets/svg/epee.svg') ?></span>
            <span class="nav-link__label">Aventures</span>
        </a>
    </div>
    <br>
    <div class="accueil">
        <a href="#bloc3">
            <span class="nav-link__icon"><?php include('assets/svg/regles.svg') ?></span>
            <span class="nav-link__label">Règles</span>
        </a>
    </div>
    <br>
    <div class="accueil">
        <a href="#bloc4">
            <span class="nav-link__icon"><?php include('assets/svg/loupe.svg') ?></span>
            <span class="nav-link__label">Liens</span>
        </a>
    </div>
</nav>
