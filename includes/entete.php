<?php
session_start();

function handleSpecialChars($string): string
{
    $string = mb_convert_encoding($string, 'UTF-8', mb_detect_encoding($string));
    $string = iconv('UTF-8', 'ASCII//TRANSLIT//IGNORE', $string);
    $string = strtolower($string);

    return preg_replace("/[^a-z0-9]/", "", $string);
}

$_SESSION['page'] = htmlspecialchars($_SERVER['PHP_SELF'], ENT_QUOTES, 'UTF-8');

try {
    $conn = new PDO('mysql:host=localhost;dbname=escapedrpg2534', 'root', '');
    $conn->query("SET NAMES 'utf8'");
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

$nomcompte = isset($_SESSION['loggedin']) && $_SESSION['loggedin'] ? htmlspecialchars($_SESSION['idcompte']) : null;
