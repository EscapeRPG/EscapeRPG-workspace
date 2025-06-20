<?php if (isset($_POST['indice'])): ?>
    <div id="succespopup">
        <?php
        $nouveausucces = '<img src="/escaperpg/images/succes/general/indice.png"><span><u><b>À l\'aide !</b></u><br>Utiliser un indice pour la première fois</span>';
        $scenario = 'general';
        $description = 'indice';
        $cache = 'non';
        $rarete = 'succesnormal';
        include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/succesadd.php";
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
        $nouveausucces = '<img src="/escaperpg/images/succes/general/reponse.png"><span><u><b>Je n\'y arrivais pas...</b></u><br>Utiliser une réponse pour s\'en sortir d\'une énigme</span>';
        $scenario = 'general';
        $description = 'réponse';
        $cache = 'non';
        $rarete = 'succesnormal';
        include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/succesadd.php";
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
