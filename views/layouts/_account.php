<?php $currentUser = auth_user(); ?>
<?php if ($currentUser): ?>
    <a href="<?= url('/mon-compte') ?>">
        <div id="connexioncompte">
            <img src="<?= asset('assets/img/uploads/' . ($currentUser['avatar'] ?? 'narrateur.png')) ?>" alt="<?= e($currentUser['id'] ?? '') ?>">
            <br><br>
            MON COMPTE
        </div>
    </a>
<?php else: ?>
    <a href="<?= url('/login') ?>">
        <div id="connexioncompte">ESPACE<br>MEMBRES</div>
    </a>
<?php endif; ?>
