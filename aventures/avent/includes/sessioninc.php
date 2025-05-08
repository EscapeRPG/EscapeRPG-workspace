<?php
	$loggedin = $_SESSION['loggedin'] ?? null;
	$idcompte = $_SESSION['idcompte'] ?? null;
	session_unset();
	session_destroy();
	session_start();
	if ($loggedin !== null) { $_SESSION['loggedin'] = $loggedin; }
	if ($idcompte !== null) { $_SESSION['idcompte'] = $idcompte; }
	
	$_SESSION['piecemachine1'] = false; // Le joueur n'a pas trouvé la première pièce de la machine dans le grenier
	$_SESSION['piecemachine2'] = false; // Le joueur n'a pas trouvé la deuxième pièce de la machine dans le grenier
	$_SESSION['carteciel'] = false; // Le joueur n'a pas trouvé la carte du ciel dans le grenier
	$_SESSION['indicegrenier1'] = false; // Le joueur n'a pas utilisé l'indice 1 dans le grenier
	$_SESSION['indicegrenier2'] = false; // Le joueur n'a pas utilisé l'indice 2 dans le grenier
	$_SESSION['reponsegrenier1'] = false; // Le joueur n'a pas utilisé la réponse 1 dans le grenier
	$_SESSION['reference'] = false; // Le joueur a entré la référence des tuyaux mais n'a pas encore réparé la machine de grand-père
	$_SESSION['machineprete'] = false; // Le joueur n'a pas encore fait ce qu'il fallait pour réparer la machine du Père Noël
	$_SESSION['carte1'] = false; // Le joueur n'a pas retourné la carte 1
	$_SESSION['carte2'] = false; // Le joueur n'a pas retourné la carte 2
	$_SESSION['carte3'] = false; // Le joueur n'a pas retourné la carte 3
	$_SESSION['carte4'] = false; // Le joueur n'a pas retourné la carte 4
	$_SESSION['carte5'] = false; // Le joueur n'a pas retourné la carte 5
	$_SESSION['carte6'] = false; // Le joueur n'a pas retourné la carte 6
	$_SESSION['carte7'] = false; // Le joueur n'a pas retourné la carte 7
	$_SESSION['carte8'] = false; // Le joueur n'a pas retourné la carte 8
	$_SESSION['carte9'] = false; // Le joueur n'a pas retourné la carte 9
	$_SESSION['carte10'] = false; // Le joueur n'a pas retourné la carte 10
	$_SESSION['carte11'] = false; // Le joueur n'a pas retourné la carte 11
	$_SESSION['carte12'] = false; // Le joueur n'a pas retourné la carte 12
	$_SESSION['carte13'] = false; // Le joueur n'a pas retourné la carte 13
	$_SESSION['carte14'] = false; // Le joueur n'a pas retourné la carte 14
	$_SESSION['carte15'] = false; // Le joueur n'a pas retourné la carte 15
	$_SESSION['carte16'] = false; // Le joueur n'a pas retourné la carte 16
	$_SESSION['fin'] = false;
?>