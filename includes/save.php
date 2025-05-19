<div id="txt">
    <?php if ($_SESSION['loggedin'] || isset($_POST['continuer'])): ?>
        <?php
        include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/succesSave.php";
        if ($_SESSION['loggedin']) {
            $nom = $_SESSION['idcompte'];
            $code = $random;
        } else {
            $nom = htmlspecialchars($_POST['nom']);
            $code = htmlspecialchars($_POST['code']);
        }
        $session = session_encode();
        $page = $_SESSION['page'];
        $verifsave = $conn->prepare("SELECT * FROM $scenarioEnCours WHERE id = ?");
        $verifsave->execute([$nom]);
        $saveexiste = $verifsave->rowCount();
        if ($saveexiste == 0) {
            $stmt = $conn->prepare("INSERT INTO $scenarioEnCours (id, code, sess, savepage) VALUES (?, ?, ?, ?)");
            $stmt->execute([$nom, $code, $session, $page]);
        } else {
            $stmt = $conn->prepare("UPDATE $scenarioEnCours SET code=?, sess=?, savepage=? WHERE id=?");
            $stmt->execute([$code, $session, $page, $nom]);
        }
        ?>
        <p>
            La partie a bien été sauvegardée.
            <br>
            <br>
            Merci pour votre visite, nous espérons vous revoir bientôt sur EscapeRPG !
        </p>
    <?php else: ?>
        <p>
            Veuillez choisir un nom à donner à votre partie.<br>
            <br>
            <span class="important">
                20 caractères maximum, sans accents ni caractères spéciaux !
                <br>
                Gardez bien le code à retaper en mémoire, il vous sera demandé pour charger votre partie !
            </span>
        </p>
        <form action="save" method="post">
            <input type="text" name="nom" id="nom" placeholder="Nom" maxlength="20" required>
            <br>
            <br>
            <b><?= $random ?></b>
            <br>
            <input type="text" name="code" id="code" placeholder="Retapez le code ci-dessus" pattern="[0-9]{6}" title="Veuillez entrer le code à 6 chiffres ci-dessus" required>
            <br>
            <br>
            <input type="submit" name="continuer" value="Sauvegarder.">
        </form>
    <?php endif; ?>
    <input type="submit" onclick="window.close()" value="RETOUR.">
</div>
