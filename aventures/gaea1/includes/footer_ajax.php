<?php
    session_start();

    if (isset($_SESSION['mdp'])) {
        $affichables = [];
    
        foreach ($_SESSION['mdp'] as $mdp) {
            if (!is_array($mdp) && !empty($mdp)) {
                $affichables[] = $mdp;
            }
        }
    
        if (!empty($affichables)) {
            echo implode(' - ', $affichables);
        } else {
            echo 'Vous n\'avez trouvé aucun mot de passe pour le moment.';
        }
    } else {
        echo 'Vous n\'avez trouvé aucun mot de passe pour le moment.';
    }
