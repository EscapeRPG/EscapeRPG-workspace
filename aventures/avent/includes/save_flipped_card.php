<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['card_index'])) {
    $index = intval($_POST['card_index']);

    if (!isset($_SESSION['flipped_cards'])) {
        $_SESSION['flipped_cards'] = [];
    }

    if (!in_array($index, $_SESSION['flipped_cards'])) {
        $_SESSION['flipped_cards'][] = $index;
    }

    // Optionnel : enregistrer $_SESSION['flipped_cards'] en BDD ici si tu fais une sauvegarde auto
    // saveToDatabase($_SESSION['flipped_cards'], $player_id);
}
