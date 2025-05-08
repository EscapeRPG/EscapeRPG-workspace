<?php
    session_start();

    if (isset($_SESSION['mdp'])) {
        echo json_encode($_SESSION['mdp']);
    } else {
        echo json_encode([]);
    }
?>
