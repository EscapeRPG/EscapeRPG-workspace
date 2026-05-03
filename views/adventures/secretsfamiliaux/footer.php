<?php use App\Core\View; ?>

<?php
$inventaire = [
    'piecepo' => '
        <a href="' . asset('assets/img/secrets/po.png') . '" rel="lightbox[inventaire]">
            <img src="' . asset('assets/img/secrets/po.png') . '" alt="Une pièce avec une pomme." title="Une pièce avec une pomme.">
        </a>',
    'piecead' => '
        <a href="' . asset('assets/img/secrets/ad.png') . '" rel="lightbox[inventaire]">
            <img src="' . asset('assets/img/secrets/ad.png') . '" alt="Une pièce avec une tête d\'homme." title="Une pièce avec une tête d\'homme.">
        </a>',
    'pieceev' => '
        <a href="' . asset('assets/img/secrets/ev.png') . '" rel="lightbox[inventaire]">
            <img src="' . asset('assets/img/secrets/ev.png') . '" alt="Une pièce avec une tête de femme." title="Une pièce avec une tête de femme.">
        </a>',
    'magnamater' => '
        <a href="' . asset('assets/img/secrets/magnamater.png') . '" rel="lightbox[inventaire]">
            <img src="' . asset('assets/img/secrets/magnamater.png') . '" alt="Le Magna Mater." title="Le Magna Mater.">
        </a>',
    'templar' => '
        <a href="' . asset('assets/img/secrets/templar.png') . '" rel="lightbox[inventaire]">
            <img src="' . asset('assets/img/secrets/templar.png') . '" alt="Un papier avec l\'explication d\'un code." title="Un papier avec l\'explication d\'un code.">
        </a>',
    'tableaubrule' => '
        <a href="' . asset('assets/img/secrets/tableaubrule.png') . '" rel="lightbox[inventaire]">
            <img src="' . asset('assets/img/secrets/tableaubrule.png') . '" alt="Les morceaux d\'un tableau brûlé." title="Les morceaux d\'un tableau brûlé.">
        </a>',
    'analeptique' => '
        <a href="' . asset('assets/img/secrets/analeptique.png') . '" rel="lightbox[inventaire]">
            <img src="' . asset('assets/img/secrets/analeptique.png') . '" alt="Un analeptique pour guérir les chiens empoisonnés." title="Un analeptique pour guérir les chiens empoisonnés.">
        </a>',
    'flacon' => '
        <a href="' . asset('assets/img/secrets/flacon.png') . '" rel="lightbox[inventaire]">
            <img src="' . asset('assets/img/secrets/flacon.png') . '" alt="Un flacon de barbiturique vide." title="Un flacon de barbiturique vide.">
        </a>',
    'recette' => '
        <a href="' . asset('assets/img/secrets/recette.png') . '" rel="lightbox[inventaire]">
            <img src="' . asset('assets/img/secrets/recette.png') . '" alt="Une recette indiquant comment fabriquer un médicament." title="Une recette indiquant comment fabriquer un médicament.">
        </a>',
    'aveux' => '
        <a href="' . asset('assets/img/secrets/aveux.png') . '" rel="lightbox[inventaire]">
            <img src="' . asset('assets/img/secrets/aveux.png') . '" alt="Les aveux du docteur Pellington." title="Les aveux du docteur Pellington.">
        </a>',
    'piecese' => '
        <a href="' . asset('assets/img/secrets/se.png') . '" rel="lightbox[inventaire]">
            <img src="' . asset('assets/img/secrets/se.png') . '" alt="Une pièce avec un serpent." title="Une pièce avec un serpent.">
        </a>',
    'piecedi' => '
        <a href="' . asset('assets/img/secrets/di.png') . '" rel="lightbox[inventaire]">
            <img src="' . asset('assets/img/secrets/di.png') . '" alt="Une pièce représentant un vieil homme." title="Une pièce représentant un vieil homme.">
        </a>',
    'oldcle' => '
        <a href="' . asset('assets/img/secrets/oldcle.png') . '" rel="lightbox[inventaire]">
            <img src="' . asset('assets/img/secrets/oldcle.png') . '" alt="Une vieille clé rouillée." title="Une vieille clé rouillée.">
        </a>',
    'coffret' => '
        <a href="' . url('aventures/secretsfamiliaux/manoir/coffret') . '">
            <img src="' . asset('assets/img/secrets/coffret.png') . '" alt="Un petit coffret ouvragé." title="Un petit coffret ouvragé.">
        </a>',
    'papier' => '
        <a href="' . asset('assets/img/secrets/papier.png') . '" rel="lightbox[inventaire]">
            <img src="' . asset('assets/img/secrets/papier.png') . '" alt="Un morceau de papier avec une inscription étrange." title="Un morceau de papier avec une inscription étrange.">
        </a>',
    'petitecle' => '
        <a href="' . asset('assets/img/secrets/petitecle.png') . '" rel="lightbox[inventaire]">
            <img src="' . asset('assets/img/secrets/petitecle.png') . '" alt="Une petite clé." title="Une petite clé.">
        </a>',
    'talisman' => '
        <a href="' . asset('assets/img/secrets/talisman.png') . '" rel="lightbox[inventaire]">
            <img src="' . asset('assets/img/secrets/talisman.png') . '" alt="Un étrange talisman confié par Gaspard." title="Un étrange talisman confié par Gaspard.">
        </a>',
    'journal1' => '
        <a href="' . asset('assets/img/secrets/journal1.png') . '" rel="lightbox[inventaire]">
            <img src="' . asset('assets/img/secrets/journal1.png') . '" alt="La première page du journal de l\'oncle William." title="La première page du journal de l\'oncle William.">
        </a>',
    'journal2' => '
        <a href="' . asset('assets/img/secrets/journal2.png') . '" rel="lightbox[inventaire]">
            <img src="' . asset('assets/img/secrets/journal2.png') . '" alt="La deuxième page du journal de l\'oncle William." title="La deuxième page du journal de l\'oncle William.">
        </a>',
    'journal3' => '
        <a href="' . asset('assets/img/secrets/journal3.png') . '" rel="lightbox[inventaire]">
            <img src="' . asset('assets/img/secrets/journal3.png') . '" alt="La troisième page du journal de l\'oncle William." title="La troisième page du journal de l\'oncle William.">
        </a>',
    'journal4' => '
        <a href="' . asset('assets/img/secrets/journal4.png') . '" rel="lightbox[inventaire]">
            <img src="' . asset('assets/img/secrets/journal4.png') . '" alt="La quatrième page du journal de l\'oncle William." title="La quatrième page du journal de l\'oncle William.">
        </a>',
    'journal5' => '
        <a href="' . asset('assets/img/secrets/journal5.png') . '" rel="lightbox[inventaire]">
            <img src="' . asset('assets/img/secrets/journal5.png') . '" alt="La cinquième page du journal de l\'oncle William." title="La cinquième page du journal de l\'oncle William.">
        </a>',
    'journal6' => '
        <a href="' . asset('assets/img/secrets/journal6.png') . '" rel="lightbox[inventaire]">
            <img src="' . asset('assets/img/secrets/journal6.png') . '" alt="La sixième page du journal de l\'oncle William." title="La sixième page du journal de l\'oncle William.">
        </a>',
    'journal7' => '
        <a href="' . asset('assets/img/secrets/journal7.png') . '" rel="lightbox[inventaire]">
            <img src="' . asset('assets/img/secrets/journal7.png') . '" alt="La septième page du journal de l\'oncle William." title="La septième page du journal de l\'oncle William.">
        </a>',
    'journal8' => '
        <a href="' . asset('assets/img/secrets/journal8.png') . '" rel="lightbox[inventaire]">
            <img src="' . asset('assets/img/secrets/journal8.png') . '" alt="La huitième page du journal de l\'oncle William." title="La huitième page du journal de l\'oncle William.">
        </a>',
    'journal9' => '
        <a href="' . asset('assets/img/secrets/journal9.png') . '" rel="lightbox[inventaire]">
            <img src="' . asset('assets/img/secrets/journal9.png') . '" alt="La neuvième page du journal de l\'oncle William." title="La neuvième page du journal de l\'oncle William.">
        </a>',
    'pnakotiques' => '
        <a href="' . asset('assets/img/secrets/pnakotiques.png') . '" rel="lightbox[inventaire]">
            <img src="' . asset('assets/img/secrets/pnakotiques.png') . '" alt="Une page des Manuscrits Pnakotiques." title="Une page des Manuscrits Pnakotiques.">
        </a>',
    'pnakotiquesnotes' => '
        <a href="' . asset('assets/img/secrets/pnakotiquesnotes.png') . '" rel="lightbox[inventaire]">
            <img src="' . asset('assets/img/secrets/pnakotiquesnotes.png') . '" alt="Une page de notes sur les Manuscrits Pnakotiques." title="Une page de notes sur les Manuscrits Pnakotiques.">
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
                <?php else: ?>
                    <div id="inventaire"><?= e((string) $item) ?></div>
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
