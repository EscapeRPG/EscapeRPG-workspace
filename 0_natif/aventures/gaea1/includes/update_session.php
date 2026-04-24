<?php
session_start();

if (!isset($_SESSION['mdp'])) {
    $_SESSION['mdp'] = [];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $input = json_decode(file_get_contents('php://input'), true);

    if ($input['action'] === 'add_session') {
        if (isset($input['item']) && is_array($input['item'])) {
            foreach ($input['item'] as $item) {
                if (!in_array($item, $_SESSION['mdp'], true)
                    && preg_match('/^[a-zA-Z0-9\s\-_]+$/', $item)
                    && strlen($item) <= 50
                    && count($_SESSION['mdp']) < 50) {
                    $_SESSION['mdp'][] = $item;
                }
            }
            echo json_encode(['success' => true, 'message' => 'Éléments ajoutés.']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Aucun élément à ajouter ou action incorrecte.']);
        }
    } elseif ($input['action'] === 'remove_session') {
        if (isset($_SESSION['mdp']) && isset($input['item']) && is_array($input['item'])) {
            $removed = false;
            foreach ($input['item'] as $itemToRemove) {
                $index = array_search($itemToRemove, $_SESSION['mdp'], true);
                if ($index !== false) {
                    unset($_SESSION['mdp'][$index]);
                    $removed = true;
                }
            }
            $_SESSION['mdp'] = array_values($_SESSION['mdp']);

            if ($removed) {
                echo json_encode(['success' => true, 'removed' => true]);
            } else {
                echo json_encode(['success' => false, 'removed' => false, 'message' => 'Aucun élément trouvé à supprimer.']);
            }
        } else {
            echo json_encode(['success' => false, 'removed' => false, 'message' => 'Aucun élément à supprimer ou action incorrecte.']);
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'Action non valide.']);
    }
}
