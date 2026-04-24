<?php

if (isset($_COOKIE['session_token'])):
    $stmt = $conn->prepare("SELECT user_id FROM user_session WHERE token = ? AND expires > NOW()");
    $stmt->execute([$_COOKIE['session_token']]);
    $user = $stmt->fetch();
    if ($user):
        $_SESSION['loggedin'] = true;
        $_SESSION['idcompte'] = $user['user_id'];
    endif;
endif;

$loggedin = $_SESSION['loggedin'] ?? null;
$idcompte = $_SESSION['idcompte'] ?? null;

session_unset();
session_destroy();
session_start();
if ($loggedin !== null) {
    $_SESSION['loggedin'] = $loggedin;
}
if ($idcompte !== null) {
    $_SESSION['idcompte'] = $idcompte;
}

$_SESSION['indice1'] = false;
$_SESSION['indice2'] = false;
$_SESSION['indice3'] = false;
$_SESSION['reponse'] = false;

$_SESSION['inventaire'] = [];
$_SESSION['mdp'][] = '';
