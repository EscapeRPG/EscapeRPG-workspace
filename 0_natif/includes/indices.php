<?php if (isset($_POST['indice'])): ?>
    <div id="succespopup">
        <?php
        $scenario = 'general';
        $nom = 'indice';
        include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/succesAdd.php";
        if (!$succesexiste) {
            echo $_SESSION['loggedin'] ?
                '<script src="/escaperpg/scripts/succescount.js"></script>' :
                '<script src="/escaperpg/scripts/succescountoffline.js"></script>';
        }
        ?>
    </div>
    <?php
    $_SESSION['indice2'] ? $_SESSION['indice3'] = true : null;
    $_SESSION['indice1'] ? $_SESSION['indice2'] = true : null;
    $_SESSION['indice1'] = true;
    ?>
<?php endif; ?>

<?php if (isset($_POST['reponse'])): ?>
    <div id="succespopup">
        <?php
        $scenario = 'general';
        $nom = 'reponse';
        include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/succesAdd.php";
        if (!$succesexiste) {
            echo $_SESSION['loggedin'] ?
                '<script src="/escaperpg/scripts/succescount.js"></script>' :
                '<script src="/escaperpg/scripts/succescountoffline.js"></script>';
        }
        ?>
    </div>
    <?php
    $_SESSION['indice1'] = false;
    $_SESSION['indice2'] = false;
    $_SESSION['indice3'] = false;
    ?>

    <div class="reponse"><?= $reponse ?></div>

<?php else: ?>
    <div class="indice">
        <?php if ($_SESSION['indice1']): ?><?= $indice1 ?><?php endif; ?>
        <?php if ($_SESSION['indice2']): ?><br><br><?= $indice2 ?><?php endif; ?>
            <?php if ($_SESSION['indice3']): ?><br><br><?= $indice3 ?><?php endif; ?>
    </div>

    <form method="post">
        <button type="submit" name="<?= $_SESSION['indice3'] ? 'reponse' : 'indice' ?>" class="<?= $_SESSION['indice3'] ? 'boutonreponse' : 'boutonindice' ?>"></button>
    </form>
<?php endif; ?>
