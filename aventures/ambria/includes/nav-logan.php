<nav>
    <a href="/escaperpg/images/ambria/loganbarthelemymini.png" rel="lightbox[logan]" title="Logan Barthélémy">
        <img src="/escaperpg/images/ambria/loganbarthelemymini.png" alt="logan barthélémy">
    </a>
    <?php
    if (isset($_SESSION['flots'])) {
    include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/ambria/logan/includes/navigationbateau.php";
    }
    if (isset($_SESSION['ile'])) {
    include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/ambria/logan/includes/navigationile.php";
    }
    ?>
    <div id="inventairefooter"><input type="submit" value="INVENTAIRE"></div>
    <div id="motsdepasse"><input type="submit" value="NOTES"></div>
    <a href="/escaperpg/aventures/ambria/save/save.php" target="_blank" rel="noreferrer"><input type="submit" name="save" value="SAUVEGARDER"></a>
</nav>
