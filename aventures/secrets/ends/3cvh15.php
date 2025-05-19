<?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/entete.php"; ?>
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
	   
		<link rel="stylesheet" href="/escaperpg/aventures/secrets/css/style.css">
		<meta charset="utf-8">
		<title>Fin - Secrets Familiaux</title>
	</head>
	
	<body onload="chargement()">
		<?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/header.php"; ?>
		<div id="banniere"><img src="/escaperpg/images/secrets/secretsfamiliauxmini.png" alt="secrets familiaux bannière"></div>
		<main>			
			<div id="txt">
				<?php
					if (isset ($_POST['envoyermessage']))
						{
							echo'<div id="succespopup">';
							$nouveausucces = '<img src="/escaperpg/images/succes/general/commentaire.png"><span><u><b>Crieur public</b></u><br>Laisser un commentaire en fin d\'aventure</span>';
							$scenario = 'general';
							$description = 'commentaire';
							$cache = 'non';
							$rarete = 'succesbronze';
							include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/succesadd.php";
							echo'</div>';
							
							if ($_SESSION['loggedin']) { $nom = $_SESSION['idcompte']; } else { $nom = $_POST['nom']; }
							$message = $_POST['message'];
							$stmt = $conn->prepare("INSERT INTO secretscoms (pseudo, message) VALUES (?, ?)");
							$stmt->execute([$nom, $message]);
							echo'<center>Merci d\'avoir enregistré votre commentaire !<br><br></center>';
						}
					if (isset ($_POST['fin']) OR $_SESSION['fin'])
						{
							echo'<div id="succespopup">';
							$nouveausucces = '<img src="/escaperpg/images/succes/general/fin.png"><span><u><b>Une page qui se tourne...</b></u><br>Terminer sa première aventure</span>';
							$scenario = 'general';
							$description = 'fin';
							$cache = 'non';
							$rarete = 'succesbronze';
							include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/succesadd.php";
							$nouveausucces = '<img src="/escaperpg/images/succes/secrets/fin.png"><span><u><b>Ainsi s\'achève l\'histoire</b></u><br>Terminer l\'aventure</span>';
							$scenario = 'secrets';
							$description = 'fin';
							$cache = 'non';
							$rarete = 'succesbronze';
							include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/succesadd.php";
							$nouveausucces = '<img src="/escaperpg/images/succes/secrets/fin1.png"><span><u><b>Victime</b></u><br>Terminer l\'aventure et obtenir 1 étoile</span>';
							$scenario = 'secrets';
							$description = 'étoile1';
							$cache = 'oui';
							$rarete = 'succesbronze';
							include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/succesadd.php";
							$nouveausucces = '<img src="/escaperpg/images/succes/secrets/fin2.png"><span><u><b>Martyr</b></u><br>Terminer l\'aventure et obtenir 2 étoiles</span>';
							$scenario = 'secrets';
							$description = 'étoile2';
							$cache = 'oui';
							$rarete = 'succesargent';
							include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/succesadd.php";
							$nouveausucces = '<img src="/escaperpg/images/succes/secrets/fin3.png"><span><u><b>Pyromane</b></u><br>Terminer l\'aventure et obtenir 3 étoiles</span>';
							$scenario = 'secrets';
							$description = 'étoile3';
							$cache = 'oui';
							$rarete = 'succesgold';
							include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/succesadd.php";
							echo'</div>';
							
							echo '
								<div id="enigme">
									<img src="/escaperpg/images/secrets/fin.png">
								</div>
								<center>
									<img src="/escaperpg/images/etoilefinpleine.png"><img src="/escaperpg/images/etoilefinpleine.png"><img src="/escaperpg/images/etoilefinpleine.png"><img src="/escaperpg/images/etoilefinvide.png"><br>
									Félicitations, vous venez de terminer le scénario "Secrets Familiaux" d\'<i>EscapeRPG</i> !
								</center>
								<p>
									Vous avez obtenu la fin "neutre", ce qui est l\'une des meilleures fins possibles, mais vous pouvez encore faire mieux si vous désirez retenter l\'expérience.<br>
									Peut-être auriez-vous dû mener l\'enquête un peu plus profondément après l\'intrusion de Pellington dans le manoir, ou bien trouver un moyen de vous défaire du shoggoth ?<br>
									<br>
									Quoi qu\'il en soit, merci d\'avoir pris le temps de jouer.
									J\'espère que cette histoire vous aura plu, n\'hésitez pas à laisser un commentaire sur la <a href="https://www.facebook.com/escaperpg" target="_blank" rel="noreferrer">page Facebook</a>,
									chaque message est fortement apprécié !
									Vous pourrez également y suivre les actualités pour savoir quand les prochains scénarios seront mis en ligne.<br>
									<br>
									Si le concept vous plaît, vous pouvez nous soutenir sur notre <a href="https://fr.tipeee.com/escaperpg" target="_blank" rel="noreferrer">page tipeee</a>
									en nous faisant un don et nous permettre de vous proposer de nouveaux contenus.<br>
									Chacune de ces pages vous propose des contenus exclusifs et uniques en rapport à leur mode de fonctionnement, n\'hésitez donc pas à les consulter pour voir ce que vous pouvez y récupérer !<br>
									<br>
									Vous pouvez également laisser un commentaire directement ci-dessous pour faire savoir que vous avez terminé ce scénario !
								</p>
							';
							try { $conn = new PDO('mysql:host=localhost;dbname=escapedrpg2534','root',''); $conn->query("SET NAMES 'utf8'"); }
							catch(Exception $e) { die('Erreur : '.$e->getMessage()); }
							$nombreDeComsParPage = 5;
							$stmt = $conn->query("SELECT COUNT(*) AS nb_coms FROM secretscoms");
							$donnees = $stmt->fetch();
							$stmt->closeCursor();
							$totalDesComs = $donnees['nb_coms'];
							$nombreDePages  = ceil($totalDesComs / $nombreDeComsParPage);
							if (isset($_GET['page'])) { $page = $_GET['page']; }
							else { $page = 1; }
							$premierComAafficher = ($page - 1) * $nombreDeComsParPage;
							$reponse = $conn->query("SELECT * FROM secretscoms ORDER BY id DESC LIMIT " . $premierComAafficher . ", " . $nombreDeComsParPage);
							if ($totalDesComs == 0) { echo'<p>Apparemment, personne n\'a laissé de commentaire avant vous !</p>'; }
							else {
								while ($donnees = $reponse->fetch()) {
									echo '
										<div class="dialogue">
											<div class="portrait"><i>' . $donnees['pseudo'] . ' : </i></div>
											<div class="bulleperso"><p>' . $donnees['message'] . '</p></div>
										</div>
									';
								}
							}
							$reponse->closeCursor();
							echo'<div class="dialogue">';
							for ($i = 1 ; $i <= $nombreDePages ; $i++) { echo '<a href="3cvh15.php?page=' . $i . '">' . $i . '</a>'; }
							echo'
								</div>
								<center>
									<form action="3cvh15" method="post">
										<fieldset>
											<label for="nom">Votre nom (20 caractères max) :</label>
											<input type="text" name="nom" id="nom" required><br>
											<br>
											<label for="message">Votre message :</label>
											<textarea name="message" id="message" rows="7" cols="50">J\'ai terminé ce scénario et ai obtenu 3 étoiles !</textarea><br>
											<br>
											<input type="submit" name="envoyermessage" value="Laisser un commentaire.">
										</fieldset>
									</form>
								</center>
								<p>À bientôt pour de nouvelles aventures !</p>
								<center><form action="/index.php#bloc2" method="post"><input type="submit" name="retour" value="Retour à l\'accueil."><form></center>
							';
							$_SESSION['fin'] = true;
						}
					else
						{
							include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/sessioninc.php";
							echo '
								<audio src="/escaperpg/sons/secrets/shoggothfeu.mp3" autoplay></audio>
								<p>
									Vous rebroussez aussitôt chemin et courez en dehors de la maison.
									Arrivé dans le jardin, vous risquez un regard en arrière, mais la créature ne semble pas vous avoir suivi.<br>
									Au bord du désespoir, vous trouvez finalement une idée qui pourrait peut-être détruire ce monstre.<br>
									<br>
									Vous courez aussi vite que possible vers la remise au fond du jardin et avisez des jerricans d\'essence.
									Vous en prenez deux et retournez vers le manoir.<br>
									Du bruit à l\'étage vous confirme que le shoggoth est toujours occupé avec le boîtier électrique et vous commencez à déverser le contenu des bidons sur le sol du hall d\'entrée.
									Soudain, les lumières se coupent. Malgré vos réparations, le shoggoth a dû arracher le boîtier et couper le système électrique.
									Vous entendez alors un bruit de mouvement au-dessus de vous, le monstre est en train de sortir du bureau !<br>
									<br>
									Vous finissez à la hâte de renverser l\'essence puis sortez du manoir.<br>
									Vous retournant une dernière fois, vous sortez de votre poche le briquet de votre père, dernier souvenir que vous avez de lui et que vous gardez avec vous où que vous allez, bien que vous ne soyez pas fumeur.<br>
									Vous l\'allumez et le jetez dans le hall d\'entrée. L\'essence prend feu aussitôt, l\'incendie prend rapidement de l\'ampleur et, bientôt, le manoir tout entier est la proie des flammes.<br>
									Vous repartez en arrière et franchissez la grille en direction de la ville, laissant derrière vous le manoir en ruines et tous ses secrets.<br>
									<br>
									Vous ne pouvez être sûr que tout soit terminé et que le shoggoth est vraiment mort, mais pour vous, l\'histoire s\'arrête là.
								</p>
								<center>
									<form action="3cvh15" method="post">
										<input type="submit" name="fin" value="Fin.">
									<form>
								</center>
							';
						}
				?>
			</div>
		</div>
		<div id="load"><div id="loader"></div></div>
		<script src="/escaperpg/scripts/aventures-chargement.js"></script>
		<?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/secrets/includes/footer.php"; ?>
	</body>
</html>
