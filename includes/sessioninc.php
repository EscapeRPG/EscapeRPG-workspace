<?php
$loggedin = $_SESSION['loggedin'] ?? null;

if (isset($_COOKIE['LOGGED_USER'])) {
    $idcompte = $_COOKIE['LOGGED_USER'];
} elseif (isset($_SESSION['loggedin']) && $_SESSION['loggedin']) {
    $idcompte = htmlspecialchars($_SESSION['idcompte']);
} else {
    $idcompte = null;
}

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
