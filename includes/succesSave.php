<div id="succespopup">
    <?php
    $nouveausucces = '<img src="/escaperpg/images/succes/general/sauvegarder.png"><span><u><b>Prendre une pause</b></u><br>Sauvegarder sa progression au cours d\'une aventure</span>';
    $scenario = 'general';
    $description = 'sauvegarder';
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
