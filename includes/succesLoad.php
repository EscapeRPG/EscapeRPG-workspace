<div id="succespopup">
    <?php
    $nouveausucces = '<img src="/escaperpg/images/succes/general/charger.png"><span><u><b>On reprend ?</b></u><br>Reprendre sa progression dans une aventure</span>';
    $scenario = 'general';
    $description = 'charger';
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
