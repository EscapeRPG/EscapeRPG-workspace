<?php $actionUrl = url('/aventures/gaea1/index'); ?>

<div class="avatar-container">
    <div class="avatar-wrap" data-avatar-builder data-avatar-base-url="<?= e(asset('assets/img/gaea1/avatar/')) ?>">
        <img src="<?= asset('assets/img/gaea1/avatar/fond.png') ?>" alt="">
        <div class="avatar-preview">
            <img src="<?= asset('assets/img/gaea1/avatar/cheveuxbackend1-1.png') ?>" id="cheveuxbackendimg" alt="">
            <img src="<?= asset('assets/img/gaea1/avatar/visage11.png') ?>" id="visageimg" alt="">
            <img src="<?= asset('assets/img/gaea1/avatar/bouche1-1.png') ?>" id="boucheimg" alt="">
            <img src="<?= asset('assets/img/gaea1/avatar/yeux1-1.png') ?>" id="yeuximg" alt="">
            <img src="<?= asset('assets/img/gaea1/avatar/nez11.png') ?>" id="nezimg" alt="">
            <img src="<?= asset('assets/img/gaea1/avatar/cheveuxback1-1.png') ?>" id="cheveuxbackimg" alt="">
            <img src="<?= asset('assets/img/gaea1/avatar/pilosite1-1.png') ?>" id="pilositeimg" alt="">
            <img src="<?= asset('assets/img/gaea1/avatar/oreilles11.png') ?>" id="oreillesimg" alt="">
            <img src="<?= asset('assets/img/gaea1/avatar/sourcils1.png') ?>" id="sourcilsimg" alt="">
            <img src="<?= asset('assets/img/gaea1/avatar/accessoire1.png') ?>" id="accessoireimg" alt="">
            <img src="<?= asset('assets/img/gaea1/avatar/cheveux1-1.png') ?>" id="cheveuximg" alt="">
        </div>
    </div>

    <div class="avatar-form" data-avatar-controls>
        <table class="createavatar">
            <?php
            $rows = [
                    ['Visage', 'visage', 10],
                    ['Cheveux', 'cheveux', 16],
                    ['Sourcils', 'sourcils', 14],
                    ['Yeux', 'yeux', 20],
                    ['Oreilles', 'oreilles', 10],
                    ['Nez', 'nez', 10],
                    ['Bouche', 'bouche', 15],
                    ['Pilosité', 'pilosite', 17],
                    ['Accessoire', 'accessoire', 14],
            ];
            ?>
            <?php foreach ($rows as [$label, $key, $max]): ?>
                <tr>
                    <td class="titreavatar"><?= e($label) ?></td>
                    <td>
                        <button type="button" data-avatar-control="<?= e($key) ?>" data-direction="previous"><img
                                    src="<?= asset('assets/img/gaea1/gauche.png') ?>" alt="précédent"></button>
                    </td>
                    <td><span id="<?= e($key === 'sourcils' ? 'sourcils' : $key) ?>count">1</span>
                        / <?= e((string)$max) ?></td>
                    <td>
                        <button type="button" data-avatar-control="<?= e($key) ?>" data-direction="next"><img
                                    src="<?= asset('assets/img/gaea1/droite.png') ?>" alt="suivant"></button>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>

        <form action="<?= e($actionUrl) ?>" method="post">
            <input type="number" name="visage" id="visageinput" value="11" class="hidden">
            <input type="number" name="oreilles" id="oreillesinput" value="11" class="hidden">
            <input type="number" name="cheveux" id="cheveuxinput" value="1" class="hidden">
            <input type="number" name="couleurcheveux" id="couleurcheveuxinput" value="1" class="hidden">
            <input type="number" name="sourcils" id="sourcilsinput" value="1" class="hidden">
            <input type="number" name="yeux" id="yeuxinput" value="1" class="hidden">
            <input type="number" name="couleuryeux" id="couleuryeuxinput" value="1" class="hidden">
            <input type="number" name="nez" id="nezinput" value="11" class="hidden">
            <input type="number" name="bouche" id="boucheinput" value="1" class="hidden">
            <input type="number" name="couleurbouche" id="couleurboucheinput" value="1" class="hidden">
            <input type="number" name="pilosite" id="pilositeinput" value="1" class="hidden">
            <input type="number" name="couleurpilosite" id="couleurpilositeinput" value="1" class="hidden">
            <input type="number" name="accessoire" id="accessoireinput" value="1" class="hidden">

            <button type="button" class="action" data-avatar-randomize>aléatoire.</button>
            <button type="submit" class="action" name="action" value="submit_avatar">valider.</button>
        </form>
    </div>
</div>
