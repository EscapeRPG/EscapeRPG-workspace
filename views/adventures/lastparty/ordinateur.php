<?php

$content = $sceneData['content'] ?? [];
$blocks = $content['blocks'] ?? [];
$hintData = $sceneData['hintData'] ?? null;
$error = $sceneData['error'] ?? null;
$variant = $sceneData['variant'] ?? null;
?>

<?php if (!empty($content['audio'])): ?>
    <audio src="<?= asset($content['audio']) ?>" autoplay></audio>
<?php endif; ?>

<?php if (!empty($error)): ?>
    <p><?= e((string) $error) ?></p>
<?php endif; ?>

<?php if ($variant === 'login'): ?>
    <div id="faceeebookconnexion">
        <img src="<?= asset('assets/img/lastparty/logofaceeebook.png') ?>" alt="faceeebook logo">
        <h1>Faceeebook</h1>
        <div id="connexion">
            <form action="<?= url('/aventures/lastparty/ordinateur') ?>" method="post">
                <label for="identifiant">Identifiant</label> :<br>
                <input list="notesListe" name="identifiant" id="identifiant">
                <datalist id="notesListe">
                    <?php foreach (($sceneData['notes'] ?? []) as $note): ?>
                        <?php if (!is_array($note) && $note !== null && $note !== ''): ?>
                            <option value="<?= e((string) $note) ?>"></option>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </datalist>
                <br>
                <br>
                <label for="mdpasse">Mot de passe</label> :<br>
                <input type="password" name="mdpasse" id="mdpasse">
                <br>
                <br>
                <button type="submit" class="action" name="action" value="submit_login">Connexion</button>
            </form>
        </div>
        <p>
            Français (France) - English (US) - Español - Italiano - Deutsch - Português (Portugal) - +<br>
            <br>
            S'inscrire - Connexion - Messager - Faceeebook Live - Personnes - Pages - Lieux<br>
            Jeux - Groupes - Offres d'emploi - Portail - Confidentialité - Cookies - Pub - Aide
        </p>
    </div>
<?php endif; ?>

<?php if ($variant === 'connected'): ?>
    <?php require __DIR__ . '/partials/_faceeebook_home.php'; ?>
<?php endif; ?>

<?php if ($variant === 'juliette'): ?>
    <?php require __DIR__ . '/partials/_faceeebook_juliette.php'; ?>
<?php endif; ?>

<?php require __DIR__ . '/../partials/_scene_blocks.php'; ?>

<?php if ($variant === 'missing_notebook'): ?>
    <form action="<?= url('/aventures/lastparty/ordinateur') ?>" method="post">
        <button type="submit" class="action" name="action" value="back_to_room">Retour.</button>
    </form>
<?php endif; ?>

<?php if ($variant === 'juliette'): ?>
    <form action="<?= url('/aventures/lastparty/ordinateur') ?>" method="post">
        <button type="submit" class="action" name="action" value="return_to_phone">DING !</button>
    </form>
<?php endif; ?>

<?php require __DIR__ . '/../partials/_scene_hint.php'; ?>
