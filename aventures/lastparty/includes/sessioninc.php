<?php
	$loggedin = $_SESSION['loggedin'] ?? null;
	$idcompte = $_SESSION['idcompte'] ?? null;
	session_unset();
	session_destroy();
	session_start();
	if ($loggedin !== null) { $_SESSION['loggedin'] = $loggedin; }
	if ($idcompte !== null) { $_SESSION['idcompte'] = $idcompte; }
	
	$_SESSION['tiroir'] = false; // Pour savoir si le joueur a ouvert le tiroir du bureau ou non
	$_SESSION['photos'] = false;  // Pour savoir si le joueur doit chercher les photos ou non
	$_SESSION['carnet'] = false; // Pour ajouter le carnet à l'inventaire
	$_SESSION['faceeebook'] = false; // Pour savoir si le joueur en a fini ou non avec faceeebook
	$_SESSION['cartevisite'] = false; // Pour savoir si le joueur a trouvé la carte de Darren Braun ou non
	$_SESSION['connecte'] = false; // Pour savoir si le joueur s'est connecté à son compte Faceeebook ou non
	$_SESSION['mdp1'] = false;
	$_SESSION['mdp2'] = false;
	$_SESSION['fin'] = false;
?>