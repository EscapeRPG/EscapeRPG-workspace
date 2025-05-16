<div id="txt">
    <?php if ($_SESSION['loggedin'] || isset($_POST['nom'])):
        include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/succesLoad.php";
        $nom = $_SESSION['loggedin'] ? $_SESSION['idcompte'] : htmlspecialchars($_POST['nom']);

        if ($_SESSION['loggedin']) {
            $query = $conn->prepare("SELECT * FROM $scenarioEnCours WHERE id=? ORDER BY id DESC LIMIT 1");
            $query->execute([$nom]);
        } elseif (isset($_POST['nom'])) {
            $code = htmlspecialchars($_POST['code']);
            $query = $conn->prepare("SELECT * FROM $scenarioEnCours WHERE id=? AND code=?");
            $query->execute([$nom, $code]);
        }
        $result = $query->fetch();

        if ($result):
            $sess = $result['sess'];
            $savepage = $result['savepage'];
            $session = session_decode($sess); ?>
            <p>
                La partie a été chargée avec succès !
                Rendez-vous sur <a href=<?= $savepage ?>>cette page</a> pour la reprendre !
            </p>
            <?php else:
            if ($_SESSION['loggedin']): ?>
                <p>
                    Il y a eu une erreur quelque part, veuillez contacter le support à <a href="mailto:escaperpg@escaperpg.com">escaperpg [ at ] escaperpg.com</a>
                    pour retrouver votre sauvegarde.
                </p>
            <?php else: ?>
                <p>Il y a eu une erreur quelque part, veuillez réessayer.</p>
                <form action="load" method="post">
                    <input type="text" name="nom" id="nom" placeholder="Nom" required>
                    <input type="text" name="code" id="code" placeholder="Code" required>
                    <input type="submit" name="continuer" value="Charger.">
                </form>
        <?php endif;
        endif;
    elseif (isset($_POST['continuer'])):
    else: ?>
        <p>Veuillez entrer le nom et le code utilisés lors de votre dernière sauvegarde.</p>
        <form action="load" method="post">
            <input type="text" name="nom" id="nom" placeholder="Nom" required>
            <input type="text" name="code" id="code" placeholder="Code" required>
            <input type="submit" name="continuer" value="Charger.">
        </form>
    <?php endif; ?>
</div>
