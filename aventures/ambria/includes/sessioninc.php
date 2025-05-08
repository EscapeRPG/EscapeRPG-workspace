<?php
	$loggedin = $_SESSION['loggedin'] ?? null;
	$idcompte = $_SESSION['idcompte'] ?? null;
	session_unset();
	session_destroy();
	session_start();
	if ($loggedin !== null) { $_SESSION['loggedin'] = $loggedin; }
	if ($idcompte !== null) { $_SESSION['idcompte'] = $idcompte; }
	
// Pour Sullivan :
	$_SESSION['sullivanconfiance'] = 100; // Le joueur commence la partie avec 100 points de confiance de l'équipage.
	$_SESSION['ambriawhisky'] = false; // Le joueur n'a pas trouvé le whisky ou l'a utilisé.
	$_SESSION['ambriapaul'] = false; // Le joueur n'a pas donné le whisky au vieux et n'a pas obtenu l'information comme quoi il y a du vrai et du faux dans les rumeurs. L'indice pour cette énigme n'est donc pas disponible.
	$_SESSION['ambriabibliotheque'] = false; // Le joueur n'est pas encore allé à la bibliothèque.
	$_SESSION['bourseparterre'] = false; // Le joueur n'a pas encore vu la bourse au sol.
	$_SESSION['seloigner'] = false; // Le joueur n'a pas fini de se battre dans la taverne.
	$_SESSION['ambriacabine'] = false; // Le joueur n'est pas encore allé dans sa cabine pour ranger son étagère.
	$_SESSION['ambrialoganlocalise'] = false; // Le joueur ne sait pas encore où est Logan sur le bateau et ne peut pas encore le retrouver à la cale.
	$_SESSION['cap'] = false; // Le joueur n'a pas encore trouvé le cap.
	$_SESSION['ambriajournalsullivan'] = false; // Le joueur n'a pas encore récupéré son journal de bord dans la cabine.
	$_SESSION['recifsetape2'] = false; // Le joueur n'a pas encore passé l'étape 1 de l'énigme des récifs.
	$_SESSION['recifsetape3'] = false; // Le joueur n'a pas encore passé l'étape 2 de l'énigme des récifs.
	$_SESSION['recifsetape4'] = false; // Le joueur n'a pas encore passé l'étape 3 de l'énigme des récifs.
	$_SESSION['recifsetape5'] = false; // Le joueur n'a pas encore passé l'étape 4 de l'énigme des récifs.
	$_SESSION['pertehomme'] = false; // Le joueur n'a pas perdu de membre d'équipage dans les pièges de l'île.
	$_SESSION['leviers'] = false; // Le joueur n'a pas accédé à l'énigme du levier.
	
// Pour Logan :
	$_SESSION['loganconfiance'] = 0; // Le joueur commence la partie avec 0 points de confiance de l'équipage.
	$_SESSION['parchemin'] = false; // Le joueur n'a pas encore récupéré les instructions pour aller à Ambria.
	$_SESSION['typecolere'] = false; // Le joueur n'a pas encore rencontré le type en colère.
	$_SESSION['mouette'] = false; // Le joueur n'a pas encore vu la mouette.
	$_SESSION['cletypecolere'] = false; // Le joueur n'a pas encore retrouvé la clé du type en colère.
	$_SESSION['cledejapasse'] = false; // S'active quand le joueur a récupéré la clé du type en colère pour éviter d'avoir de nouveau l'alert.
	$_SESSION['biscuits'] = false; // Le joueur n'a pas encore trouvé les biscuits pour les donner à la mouette.
	$_SESSION['chapeautypecolere'] = false; // Le joueur n'a pas encore récupéré le chapeau du type en colère.
	$_SESSION['cledocks'] = false; // Le joueur n'a pas encore fini l'énigme du labyrinthe au début.
	$_SESSION['taverne'] = false; // Le joueur n'a pas encore rencontré Sullivan.
	$_SESSION['loganaide'] = false; // Le joueur n'a pas aidé les marins à briquer le pont.
	$_SESSION['loganpasaide'] = false; // S'active si le joueur a décider de ne pas aider les marins à briquer le pont.
	$_SESSION['loganavecjake'] = false; // Le joueur n'est pas encore accompagné de Jake pour visiter le bateau.
	$_SESSION['dunettevisitee'] = false; // Le joueur n'est pas encore passé par la dunette.
	$_SESSION['victuailles'] = false; // Le joueur n'a pas encore récupéré les victuailles pour le timonier au mess.
	$_SESSION['dunetteok'] = false; // Le joueur a fini la mini-énigme de la dunette.
	$_SESSION['affale'] = false; // Pour savoir si le capitaine ordonne à Logan d'affaler ou de ferler.
	$_SESSION['haubans'] = false; // Le joueur n'a pas encore fait l'énigme des haubans.
	$_SESSION['rhum'] = false; // Le joueur n'a pas encore choisi de sauver le rhum ou le riz.
	$_SESSION['riz'] = false; // Le joueur n'a pas encore choisi de sauver le rhum ou le riz.
	$_SESSION['loganblesse'] = false; // Le joueur n'a pas raté son ascension du golem.
	$_SESSION['sullivanpasconfiant'] = false; // Si Sullivan n'a pas réussi à garder la confiance de l'équipage.
	$_SESSION['sullivanconfiant'] = false; // Si Sullivan a réussi à garder la confiance de l'équipage.
	$_SESSION['loganpasconfiant'] = false; // Si Logan n'a pas réussi à gagner la confiance de l'équipage.
	$_SESSION['loganconfiant'] = false; // Si Logan a réussi à gagner la confiance de l'équipage.
	$_SESSION['mutinerie'] = false; // La mutinerie n'a pas eu lieu.
	$_SESSION['levier'] = false; // Le joueur n'a pas accédé à l'énigme du levier.
	$_SESSION['tablette'] = false; // Le joueur n'a pas encore récupéré la tablette en or gravée.
	$_SESSION['portesciteenigme'] = false; // Le joueur n'a pas encore ouvert les portes d'Ambria.

// Communs
	$_SESSION['bourse'] = false; // Le joueur n'a pas encore récupéré la bourse de Logan.
	$_SESSION['ambriasurlesflots'] = false; // Le joueur n'a pas encore fini l'énigme d'embarquement et ne peut donc pas encore se balader sur le bateau.
	$_SESSION['ambrialogantrouve'] = false; // Le joueur n'a pas encore trouvé Logan sur le bateau et ne peut pas encore consulter la carte.
	$_SESSION['etatquille'] = 100; // Au début de l'énigme des récifs, la quille est en parfait état.
	if ($_SESSION['etatquille'] <= 0)
		{
			$_SESSION['quillecassee'] = true;
			$_SESSION['sullivanconfiance'] -= 20;
		}
	$_SESSION['quillecassee'] = false; // Le joueur n'a pas cassé la quille dans les récifs.
	$_SESSION['matcasse'] = false; // Le joueur n'a pas ordonné à Logan d'affaler la voile et le mât ne va pas casser.
	$_SESSION['recifs'] = false; // Le joueur n'a pas encore commencé l'énigme des récifs.
	$_SESSION['grottes'] = false; // Le joueur n'a pas encore trouvé l'entrée des grottes sur l'île.
	$_SESSION['portescite'] = false; // Le joueur n'a pas encore trouvé les portes de la cité d'Ambria.
	$_SESSION['grottesenigme'] = false; // Le joueur n'a pas encore résolu l'énigme des grottes.
	$_SESSION['torcheseteintes'] = false; // Le joueur n'a pas encore éteint les torches dans la caverne.
	$_SESSION['combat'] = false; // Le joueur n'est pas encore en train d'affronter le golem.
	$_SESSION['combat2'] = false; // Le joueur n'a pas encore passé la première phase du combat contre le golem.
	$_SESSION['combat3'] = false; // Le joueur n'a pas encore passé la seconde phase du combat contre le golem.
	$_SESSION['fin'] = false; // Le joueur n'est pas au dernier chapitre du jeu.
	$_SESSION['mdp1'] = false;
	$_SESSION['mdp2'] = false;
	$_SESSION['mdp3'] = false;
	$_SESSION['mdp4'] = false;
	$_SESSION['mdp5'] = false;
	$_SESSION['mdp6'] = false;
	$_SESSION['mdp7'] = false;
	$_SESSION['mdp8'] = false;
	$_SESSION['mdp9'] = false;
	$_SESSION['mdp10'] = false;
	$_SESSION['mdp11'] = false;
	$_SESSION['mdp12'] = false;
	$_SESSION['mdp13'] = false;
	$_SESSION['mdp14'] = false;
	$_SESSION['mdp15'] = false;
	$_SESSION['mdp16'] = false;
	$_SESSION['mdp17'] = false;
	$_SESSION['mdp18'] = false;
	$_SESSION['mdp19'] = false;
	$_SESSION['mdp20'] = false;
	$_SESSION['mdp21'] = false;
	$_SESSION['mdp22'] = false;
	$_SESSION['mdp23'] = false;
	$_SESSION['mdp24'] = false;
	$_SESSION['mdp25'] = false;
	$_SESSION['mdp26'] = false;
?>