<?php
	$loggedin = $_SESSION['loggedin'] ?? null;
	$idcompte = $_SESSION['idcompte'] ?? null;
	session_unset();
	session_destroy();
	session_start();
	if ($loggedin !== null) { $_SESSION['loggedin'] = $loggedin; }
	if ($idcompte !== null) { $_SESSION['idcompte'] = $idcompte; }
	
	$_SESSION['indice1'] = false;
	$_SESSION['indice2'] = false;
	$_SESSION['indice3'] = false;
	$_SESSION['reponse'] = false;
	$_SESSION['indicesutilises'] = 0;
	$_SESSION['reponsesutilisees'] = 0;

	$_SESSION['avatarimg'] = false;
	$_SESSION['avatar'] = false;
	$_SESSION['visage'] = false;
	$_SESSION['sourcils'] = false;
	$_SESSION['cheveux'] = false;
	$_SESSION['oreilles'] = false;
	$_SESSION['yeux'] = false;
	$_SESSION['nez'] = false;
	$_SESSION['bouche'] = false;
	$_SESSION['pilosite'] = false;
	$_SESSION['accessoire'] = false;
	$_SESSION['pjnom'] = false;
	$_SESSION['pjprenom'] = false;
	$_SESSION['genre'] = false;
	$_SESSION['feminin'] = false;

	$_SESSION['cineintro'] = false;
	$_SESSION['scan'] = false;
	$_SESSION['traitement'] = false;
	$_SESSION['appontage'] = false;
	$_SESSION['combinaison'] = false;
	$_SESSION['oxygene'] = 100;
	$_SESSION['plancurrent'] = null;
	$_SESSION['shunter'] = null;
	$_SESSION['visitestation'] = false;
	$_SESSION['eventa'] = false;
	$_SESSION['eventb'] = false;
	$_SESSION['premiereobservation'] = false;
	$_SESSION['deckpanel'] = false;
	$_SESSION['deckopen'] = false;
	$_SESSION['hacking'] = false;
	$_SESSION['traduction'] = false;
	$_SESSION['compilationterminee'] = false;
	$_SESSION['poweron'] = false;
	$_SESSION['detruire'] = false;
	$_SESSION['fuir'] = false;

	$_SESSION['avisited'] = false;
	$_SESSION['bvisited'] = false;
	$_SESSION['cvisited'] = false;
	$_SESSION['dvisited'] = false;
	$_SESSION['evisited'] = false;
	$_SESSION['fvisited'] = false;
	$_SESSION['gvisited'] = false;
	$_SESSION['hvisited'] = false;
	$_SESSION['ivisited'] = false;
	$_SESSION['jvisited'] = false;
	$_SESSION['kvisited'] = false;
	$_SESSION['lvisited'] = false;
	$_SESSION['mvisited'] = false;
	$_SESSION['nvisited'] = false;
	$_SESSION['ovisited'] = false;
	$_SESSION['pvisited'] = false;
	$_SESSION['qvisited'] = false;
	$_SESSION['rvisited'] = false;
	$_SESSION['svisited'] = false;
	$_SESSION['tvisited'] = false;
	$_SESSION['atested'] = false;
	$_SESSION['btested'] = false;
	$_SESSION['ctested'] = false;
	$_SESSION['dtested'] = false;
	$_SESSION['etested'] = false;
	$_SESSION['ftested'] = false;
	$_SESSION['gtested'] = false;
	$_SESSION['htested'] = false;
	$_SESSION['itested'] = false;
	$_SESSION['jtested'] = false;
	$_SESSION['ktested'] = false;
	$_SESSION['ltested'] = false;
	$_SESSION['mtested'] = false;
	$_SESSION['ntested'] = false;
	$_SESSION['otested'] = false;
	$_SESSION['ptested'] = false;
	$_SESSION['qtested'] = false;
	$_SESSION['rtested'] = false;
	$_SESSION['stested'] = false;
	$_SESSION['ttested'] = false;

	$_SESSION['inventaire'][] = 'manuel';
	$_SESSION['mdp'][] = '';
?>