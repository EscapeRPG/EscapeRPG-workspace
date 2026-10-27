<?php use App\Core\View; ?>

<?php View::start('styles'); ?>
<link rel="stylesheet" href="<?= asset('assets/styles/polls/calendar.css') ?>">
<?php View::end(); ?>

<?php View::start('nav'); ?>
<?php View::end(); ?>

<?php View::start('content'); ?>
<section class="sondage-section">
    <form action="<?= url('/sondage/create') ?>" method="post" id="sondage-form">
        <?= csrf_field() ?>
        <div class="form-row">
            <label for="titre">Titre du sondage :</label>
            <input type="text" maxlength="255" name="titre" id="titre">
        </div>

        <div class="form-row">
            <div class="poll-calendar" aria-describedby="dates-help">
                <div class="poll-calendar__header">
                    <button type="button" id="previous-month" aria-label="Mois précédent">‹</button>
                    <h2 id="calendar-month" aria-live="polite"></h2>
                    <button type="button" id="next-month" aria-label="Mois suivant">›</button>
                </div>
                <div class="poll-calendar__weekdays" aria-hidden="true">
                    <span>Lun</span><span>Mar</span><span>Mer</span><span>Jeu</span><span>Ven</span><span>Sam</span><span>Dim</span>
                </div>
                <div id="calendar-days" class="poll-calendar__days" role="group" aria-labelledby="calendar-month"></div>
            </div>

            <div class="calendar-selection">
                <p id="dates-status" role="status" aria-live="polite"></p>

                <div class="selected-dates" aria-label="Dates sélectionnées"></div>

                <button type="submit">Créer le sondage</button>
            </div>
        </div>
    </form>
</section>
<?php View::end(); ?>

<?php View::start('scripts'); ?>
<script src="<?= asset('assets/js/sondages.js') ?>"></script>
<?php View::end(); ?>
