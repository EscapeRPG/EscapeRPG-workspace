<?php $notes = (array) ($stateData['notes'] ?? []); ?>

<div class="terminal-console-wrap">
    <div class="terminal-wrap" data-terminal-wrap>
        <div id="console-output" class="console-output">
            <div>
                GAEA-I KOMUNODEK<br>
                System unt AF-0340-B12<br>
                <br>
                Skrivver komundsetitt
            </div>
        </div>

        <span id="input-shadow" class="input-shadow"></span>

        <div class="terminal-input-line">
            <div class="inputTerminal">
                <input list="notesListe" name="commande" id="prompt" class="prompt" maxlength="70" autofocus>
                <span class="blinker eventsoff">_</span>
            </div>
        </div>
    </div>

    <form action="<?= e(url('/aventures/gaea1/komunodek')) ?>" method="post">
        <input type="hidden" name="action" value="connect_terminal">

        <label for="identifiant">ID : </label>
        <input list="notesListe" name="identifiant" id="identifiant">
        <datalist id="notesListe">
            <?php foreach ($notes as $note): ?>
                <option value="<?= e((string) $note) ?>"></option>
            <?php endforeach; ?>
        </datalist>

        <br><br>

        <label for="motdepasse">Pass : </label>
        <input type="password" name="motdepasse" id="motdepasse">

        <br><br>

        <button type="submit">konekt.</button>
    </form>
</div>
