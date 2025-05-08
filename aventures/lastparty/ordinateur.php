<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/entete.php"; ?>
<!DOCTYPE html>
<html lang="fr">
	<head>
		<script type="text/javascript" src="/escaperpg/lightbox/js/prototype.js"></script>
		<script type="text/javascript" src="/escaperpg/lightbox/js/scriptaculous.js?load=effects,builder"></script>
		<script type="text/javascript" src="/escaperpg/lightbox/js/lightbox.js"></script>
		<link rel="stylesheet" href="/escaperpg/lightbox/css/lightbox.css" type="text/css" media="screen">
		
		<!-- [if lt IE 9]>
		<script src="http://html5shiv.googlecode.code/svn/trunk/html5.js"></scipt>
		<![endif]-->
	   
		<link rel="stylesheet" href="/escaperpg/aventures/lastparty/css/style.css">
		<meta charset="utf-8">
		<title>Faceeebook - Last Party</title>
	</head>
	
	<body onload="chargement()">
		<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/header.php"; ?>
		<div id="banniere"><img src="/escaperpg/images/lastparty/lpmini.png"></div>
		<div id="bloc_page">
			<nav>
				<img src="/escaperpg/images/lastparty/jonathan.png">
				<div id="inventairefooter"><input type="submit" onclick="inventaireshow()" value="INVENTAIRE"></div>
				<div id="motsdepasse"><input type="submit" onclick="mdpshow()" value="NOTES"></div>
				<a href="/escaperpg/aventures/lastparty/save/save.php" target="_blank" rel="noreferrer"><input type="submit" name="save" value="SAUVEGARDER"></a>
			</nav>
			<div id="txt">
				<?php
					if (isset ($_POST['rechercher']) AND str_replace($search, $replace, stripslashes($_POST['rechercher'])) == "juliette") // Le joueur recherche Juliette sur Faceeebook
						{
							echo'<div id="succespopup">';
							$nouveausucces = '<img src="/escaperpg/images/succes/lastparty/juliette.png"><span><u><b>Le mystère s\'épaissit</b></u><br>Apprendre que tout le monde à la fête a perdu ses souvenirs</span>';
							$scenario = 'lastparty';
							$description = 'juliette';
							$cache = 'oui';
							$rarete = 'succesnormal';
							include_once $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/succesadd.php";
							echo'</div>';
							
							include_once $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/lastparty/includes/julietteinc.php";
							echo '
								<p>Apparemment, vous n\'êtes pas le seul à avoir des trous de mémoire. Mais que signifie tout cela ?</p>
								<center>
									<form action="telephone.php" method="post">
										<input type="submit" name="retour" value="DING !">
									</form>
								</center>
							';
							$_SESSION['faceeebook'] = true;
						}
					elseif (isset($_POST['connexion']) AND str_replace($search, $replace, stripslashes($_POST['identifiant'])) == "jonathanlt" AND str_replace($search, $replace, stripslashes($_POST['mdpasse'] == "party4ever")) OR $_SESSION['connecte']) // Le joueur se connecte sur Faceeebook ou s'y est déjà connecté auparavant
						{
							if (isset($_POST['indice']))
								{
									include_once $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/lastparty/includes/faceeebookinc.php";
									echo '
										<p>
											Bien ! Vous êtes maintenant connecté, mais votre fil d\'actualités est bien rempli et il serait long et fastidieux de le parcourir jusqu\'à trouver le dernier post de votre amie.
											Vous devriez directement rechercher le profil de <span class="mdp">Juliette</span>.<br>
											<br>
											<div class="indice">
												Il y a sans doute un endroit sur la page destiné à effectuer des recherches.
											</div>
										</p>
										<center>
											<form action="ordinateur.php" method="post">
												<button type="submit" name="reponse" class="boutonreponse"></button>
											</form>
										</center>
									';
								}
							elseif (isset($_POST['reponse']))
								{
									include_once $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/lastparty/includes/faceeebookinc.php";
									echo '
										<p>
											Bien ! Vous êtes maintenant connecté, mais votre fil d\'actualités est bien rempli et il serait long et fastidieux de le parcourir jusqu\'à trouver le dernier post de votre amie.
											Vous devriez directement rechercher le profil de <span class="mdp">Juliette</span>.<br>
											<br>
											<div class="reponse">
												Tapez "Juliette" dans la bulle "rechercher" tout en haut à gauche de la page Faceeebook.
											</div>
										</p>
									';
								}
							else
								{
									echo'<div id="succespopup">';
									$nouveausucces = '<img src="/escaperpg/images/succes/lastparty/connexion.png"><span><u><b>Addict des réseaux sociaux</b></u><br>Se connecter à son compte Faceeebook</span>';
									$scenario = 'lastparty';
									$description = 'connexion';
									$cache = 'oui';
									$rarete = 'succesnormal';
									include_once $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/succesadd.php";
									echo'</div>';
									
									include_once $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/lastparty/includes/faceeebookinc.php";
									echo '
										<p>
											Bien ! Vous êtes maintenant connecté, mais votre fil d\'actualités est bien rempli et il serait long et fastidieux de le parcourir jusqu\'à trouver le dernier post de votre amie.
											Vous devriez directement rechercher le profil de <span class="mdp">Juliette</span>.
										</p>
										<center>
											<form action="ordinateur.php" method="post">
												<button type="submit" name="indice" class="boutonindice"></button>
											</form>
										</center>
									';
									$_SESSION['carnet'] = false;
									$_SESSION['connecte'] = true;
									$_SESSION['mdp2'] = true;
								}
						}
					elseif ($_SESSION['carnet']) // Le joueur a bien trouvé le carnet et peut se connecter
						{
							if (isset($_POST['indice']))
								{
									echo '
										<p>
											<div id="faceeebookconnexion">
												<img src="/escaperpg/images/lastparty/logofaceeebook.png">
												<h1>
													Faceeebook
												</h1>
												<div id="connexion">
													<form action="ordinateur.php" method="post">
															<label for="identifiant">Identifiant</label> :<br>
															<input type="text" name="identifiant" id="identifiant">
															<br>
															<br>
															<label for"mdpasse">Mot de passe</label> :<br>
															<input type="password" name="mdpasse" id="mdpasse">
															<br>
															<br>
															<input type="submit" name="connexion" value="Connexion">
													</form>
												</div>
												<p>
													Français (France) - English (US) - Español - Italiano - Deutsch - Português (Portugal) - +<br>
													<br>
													S\'inscrire - Connexion - Messager - Faceeebook Live - Personnes - Pages - Lieux<br>
													Jeux - Groupes - Offres d\'emploi - Portail - Confidentialité - Cookies - Pub - Aide
												</p>
											</div>
											Mince ! Vous n\'êtes pas connecté !<br>
											<br>
											Votre identifiant est <span class="mdp">jonathan-lt</span> mais le mot de passe n\'a pas été enregistré.
											Heureusement, vous avez votre carnet avec vous, qui contient certainement l\'information.<br>
											<br>
											<div class="indice">
												Votre mot de passe doit être inscrit dans votre carnet, pour accéder à Faceeebook.
											</div>
										</p>
										<center>
											<form action="ordinateur.php" method="post">
												<button type="submit" name="reponse" class="boutonreponse"></button>
											</form>
										</center>
									';
								}
							elseif (isset($_POST['reponse']))
								{
									echo '
										<p>
											<div id="faceeebookconnexion">
												<img src="/escaperpg/images/lastparty/logofaceeebook.png">
												<h1>
													Faceeebook
												</h1>
												<div id="connexion">
													<form action="ordinateur.php" method="post">
															<label for="identifiant">Identifiant</label> :<br>
															<input type="text" name="identifiant" id="identifiant">
															<br>
															<br>
															<label for"mdpasse">Mot de passe</label> :<br>
															<input type="password" name="mdpasse" id="mdpasse">
															<br>
															<br>
															<input type="submit" name="connexion" value="Connexion">
													</form>
												</div>
												<p>
													Français (France) - English (US) - Español - Italiano - Deutsch - Português (Portugal) - +<br>
													<br>
													S\'inscrire - Connexion - Messager - Faceeebook Live - Personnes - Pages - Lieux<br>
													Jeux - Groupes - Offres d\'emploi - Portail - Confidentialité - Cookies - Pub - Aide
												</p>
											</div>
											Mince ! Vous n\'êtes pas connecté !<br>
											<br>
											Votre identifiant est <span class="mdp">jonathan-lt</span> mais le mot de passe n\'a pas été enregistré.
											Heureusement, vous avez votre carnet avec vous, qui contient certainement l\'information.<br>
											<br>
											<div class="reponse">
												D\'après votre carnet, le mot de passe pour votre compte Faceeebook est "party4ever".
											</div>
										</p>
									';
								}
							else
								{
									echo '
										<audio src="/escaperpg/sons/lastparty/ordinateur.mp3" autoplay></audio>
										<p>
											<div id="faceeebookconnexion">
												<img src="/escaperpg/images/lastparty/logofaceeebook.png">
												<h1>
													Faceeebook
												</h1>
												<div id="connexion">
													<form action="ordinateur.php" method="post">
															<label for="identifiant">Identifiant</label> :<br>
															<input type="text" name="identifiant" id="identifiant">
															<br>
															<br>
															<label for"mdpasse">Mot de passe</label> :<br>
															<input type="password" name="mdpasse" id="mdpasse">
															<br>
															<br>
															<input type="submit" name="connexion" value="Connexion">
													</form>
												</div>
												<p>
													Français (France) - English (US) - Español - Italiano - Deutsch - Português (Portugal) - +<br>
													<br>
													S\'inscrire - Connexion - Messager - Faceeebook Live - Personnes - Pages - Lieux<br>
													Jeux - Groupes - Offres d\'emploi - Portail - Confidentialité - Cookies - Pub - Aide
												</p>
											</div>
											Mince ! Vous n\'êtes pas connecté !<br>
											<br>
											Votre identifiant est <span class="mdp">jonathan-lt</span> mais le mot de passe n\'a pas été enregistré.
											Heureusement, vous avez votre carnet avec vous, qui contient certainement l\'information.
										</p>
										<center>
											<form action="ordinateur.php" method="post">
												<button type="submit" name="indice" class="boutonindice"></button>
											</form>
										</center>
									';
									$_SESSION['mdp1'] = true;
								}
						}
					else
						{
							echo '
								<p>
									Mince ! Vous n\'êtes pas connecté !<br>
									<br>
									Vous vous souvenez que votre identifiant est <span class="mdp">jonathan-lt</span> mais qu\'en est-il du mot de passe ?<br>
									Avec tous les sites sur lesquels vous êtes inscrit, vous ne savez plus lequel vous avez choisi et votre ordinateur ne semble pas l\'avoir enregistré.<br>
									<br>
									Heureusement, vous avez pris soin de noter tous vos mots de passe dans un carnet.
									Mais où est-il rangé ? Vous devriez refaire un petit tour dans votre <span class="lieu">appartement</span>.
								</p>
								<center>
									<form action="appartement.php" method="post">
										<input type="submit" name="retour" value="Retour.">
									</form>
								</center>
							';
							$_SESSION['tiroir'] = true;
							$_SESSION['mdp1'] = true;
						}
				?>
			</div>
		</div>
		<div id="load"><div id="loader"></div></div>
		<script src="/escaperpg/scripts/aventures-chargement.js"></script>
		<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/lastparty/includes/footer.php"; ?>
	</body>
</html>