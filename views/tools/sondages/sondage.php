<?php

use App\Core\View;

$jours = ['dim', 'lun', 'mar', 'mer', 'jeu', 'ven', 'sam'];
$mois = [1 => 'janvier', 'février', 'mars', 'avril', 'mai', 'juin', 'juillet', 'août', 'septembre', 'octobre', 'novembre', 'décembre'];
?>

<?php View::start('styles'); ?>
<link rel="stylesheet" href="<?= asset('assets/styles/polls/calendar.css') ?>">
<?php View::end(); ?>

<?php View::start('nav'); ?>
<?php View::end(); ?>

<?php View::start('content'); ?>
<section class="sondage-section">
    <?php if ($activeSondage !== null): ?>
        <?php $totauxOui = array_fill_keys($propositions, 0); ?>
        <form id="sondage-vote-form" action="<?= url('/sondage/' . $activeSondage['slug']) ?>" method="post">
            <?= csrf_field() ?>
            <div class="sondage-table-scroll" role="region" aria-label="Votes du sondage" tabindex="0">
                <?php if ($activeSondage['titre'] !== null): ?>
                    <h2><?= e($activeSondage['titre']) ?></h2>
                <?php endif; ?>
                <table>
                    <thead>
                    <tr>
                        <th scope="col" style="min-width: 150px; border: none"></th>
                        <?php foreach ($propositions as $proposition): ?>
                            <?php $date = new DateTimeImmutable($proposition); ?>
                            <th scope="col">
                                <time datetime="<?= e($proposition) ?>">
                                    <?= e($jours[(int)$date->format('w')]) ?>
                                    <span class="day"><?= $date->format('j') ?></span>
                                    <?= e($mois[(int)$date->format('n')]) ?>
                                </time>
                            </th>
                        <?php endforeach; ?>
                    </tr>
                    </thead>

                    <tbody>
                    <?php if ($participations !== null): ?>
                        <?php foreach ($participations as $participation): ?>
                            <?php $votes = json_decode($participation['reponses'], true) ?? []; ?>
                            <tr>
                                <td style="text-align: left"><?= e($participation['pseudo']) ?></td>
                                <?php foreach ($propositions as $proposition): ?>
                                    <?php
                                    $vote = $votes[$proposition] ?? null;
                                    if ($vote === 0) {
                                        $totauxOui[$proposition]++;
                                    }
                                    $etat = match ($vote) {
                                        0 => ['yes', '✓', 'Oui'],
                                        1 => ['maybe', '?', 'Peut-être'],
                                        2 => ['no', 'X', 'Non'],
                                        default => ['', '—', 'Sans réponse'],
                                    };
                                    ?>
                                    <td class="<?= $etat[0] ?>" aria-label="<?= $etat[2] ?>"><?= $etat[1] ?></td>
                                <?php endforeach; ?>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                    <tr class="input-row">
                        <td><input type="text" name="pseudo" aria-label="Pseudo" maxlength="50" placeholder="Pseudo"
                                   required></td>
                        <?php foreach ($propositions as $proposition): ?>
                            <td data-vote-cell>
                                <input type="hidden" name="reponses[<?= e($proposition) ?>]" value="2">
                                <button type="button" class="poll-vote" data-date="<?= e($proposition) ?>"
                                        aria-label="<?= e($proposition) ?> : non. Cliquer pour choisir oui.">—
                                </button>
                            </td>
                        <?php endforeach; ?>
                    </tr>
                    </tbody>

                    <tfoot>
                    <tr>
                        <th scope="row">Total</th>
                        <?php foreach ($propositions as $proposition): ?>
                            <td><?= $totauxOui[$proposition] ?></td>
                        <?php endforeach; ?>
                    </tr>
                    </tfoot>
                </table>
            </div>
            <button type="submit">Valider mon vote</button>
        </form>
    <?php endif ?>

    <a href="/sondage/create">Créer un nouveau sondage</a>
</section>
<?php View::end(); ?>

<?php View::start('scripts'); ?>
<script src="<?= asset('assets/js/sondages-votes.js') ?>"></script>
<?php View::end(); ?>
