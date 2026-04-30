<?php use App\Core\View; ?>

<?php
$inventaire = [
    'carnet' => '
        <a href="' . asset('assets/img/lastparty/carnet.png') . '" rel="lightbox[inventaire]">
            <img src="' . asset('assets/img/lastparty/carnet.png') . '" alt="Un carnet où vous avez noté tous vos mots de passe." title="Un carnet où vous avez noté tous vos mots de passe.">
        </a>',
    'cartevisite' => '
        <a href="' . asset('assets/img/lastparty/cartedevisite.png') . '" rel="lightbox[inventaire]">
            <img src="' . asset('assets/img/lastparty/cartedevisite.png') . '" alt="Une carte de visite d\'un certain Darren Braun." title="Une carte de visite d\'un certain Darren Braun.">
        </a>',
];

$inventoryItems = $state['inventory'] ?? [];
$notes = $state['notes'] ?? [];
?>

<?php View::start('footer'); ?>
<footer>
    <div id="inventaireshow" class="footerhidden">
        <?php if ($inventoryItems !== []): ?>
            <?php foreach ($inventoryItems as $item): ?>
                <?php if (isset($inventaire[$item])): ?>
                    <div id="inventaire"><?= $inventaire[$item] ?></div>
                <?php endif; ?>
            <?php endforeach; ?>
        <?php else: ?>
            <p>Il n'y a rien dans votre inventaire pour le moment.</p>
        <?php endif; ?>
    </div>

    <div id="motsdepasseshow" class="footerhidden">
        <p>
            <?php
            $displayableNotes = array_values(array_filter($notes, static fn ($note) => !is_array($note) && $note !== null && $note !== ''));
            echo $displayableNotes !== [] ? e(implode(' - ', $displayableNotes)) : 'Vous n\'avez trouvé aucune note pour le moment.';
            ?>
        </p>
    </div>
</footer>
<?php View::end(); ?>

<?php View::start('scripts'); ?>
<script src="<?= asset('assets/js/footershow.js') ?>"></script>
<?php View::end(); ?>
