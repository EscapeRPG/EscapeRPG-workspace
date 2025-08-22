<nav>
    <a href="/escaperpg/images/ambria/sullivanmasonmini.png" rel="lightbox[sullivan]" title="Sullivan Mason">
        <img src="/escaperpg/images/ambria/sullivanmasonmini.png" alt="capitaine sullivan mason">
    </a>
    <?php
    if (isset($_SESSION['tortuga'])) {
        include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/ambria/sullivan/includes/navigationtortuga.php";
    }
    if (isset($_SESSION['flots'])) {
        include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/ambria/sullivan/includes/navigationbateau.php";
    }
    if (isset($_SESSION['ile'])) {
        include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/ambria/sullivan/includes/navigationile.php";
    }
    ?>
    <div id="inventairefooter"><input type="submit" value="INVENTAIRE"></div>
    <div id="motsdepasse"><input type="submit" value="NOTES"></div>
    <a href="/escaperpg/aventures/ambria/save/save.php" target="_blank" rel="noreferrer"><input type="submit" name="save" value="SAUVEGARDER"></a>
</nav>
