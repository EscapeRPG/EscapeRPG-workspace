<form action="<?= e(url('/aventures/gaea1/index')) ?>" method="post">
    <table>
        <tr>
            <td style="width:50%"><label for="lastname">Choisissez le nom de votre personnage :</label></td>
            <td style="width:50%"><input list="notesListe" name="pjnom" id="lastname" placeholder="Nom." required></td>
        </tr>
        <tr>
            <td><label for="name">Choisissez le prénom de votre personnage :</label></td>
            <td><input list="notesListe" name="pjprenom" id="name" placeholder="Prénom." required></td>
        </tr>
    </table>

    <button type="submit" class="action" name="action" value="submit_identity">valider.</button>
</form>
