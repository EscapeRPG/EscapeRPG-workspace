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
							echo'</div>';
							
							echo '
								<div id="enigme">
									<img src="/escaperpg/images/secrets/fin.png">
								</div>
								<center>
									<img src="/escaperpg/images/etoilefinpleine.png"><img src="/escaperpg/images/etoilefinvide.png"><img src="/escaperpg/images/etoilefinvide.png"><img src="/escaperpg/images/etoilefinvide.png"><br>
									Félicitations, vous venez de terminer le scénario "Secrets Familiaux" d\'<i>EscapeRPG</i> !
								</center>
								<p>
									Cependant, vous avez obtenu la fin la plus sombre, n\'hésitez donc pas à retenter l\'expérience pour améliorer votre score !<br>
									Essayez peut-être d\'enquêter de manière plus approfondie à chacune des étapes :<br>
									- Avez-vous essayé de vous enquérir du bien-être des domestiques et des chiens tout au long de votre aventure ?<br>
									- Avez-vous questionné les domestiques pour en apprendre un peu plus sur les activités de votre oncle dans son bureau privé ?<br>
									- Avez-vous bien fouillé toute la maison du docteur Pellington ?<br>
									<i>EscapeRPG</i> est un jeu qui récompense l\'exploration en vous permettant de découvrir des secrets et résoudre des quêtes annexes pour obtenir les meilleures fins possibles, prenez donc le temps de bien mener vos investigations !<br>
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
							for ($i = 1 ; $i <= $nombreDePages ; $i++) { echo '<a href="1fgre2.php?page=' . $i . '">' . $i . '</a>'; }
							echo'
								</div>
								<center>
									<form action="1fgre2" method="post">
										<fieldset>
											<label for="nom">Votre nom (20 caractères max) :</label>
											<input type="text" name="nom" id="nom" required><br>
											<br>
											<label for="message">Votre message :</label>
											<textarea name="message" id="message" rows="7" cols="50">J\'ai terminé ce scénario et ai obtenu 1 étoile !</textarea><br>
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
								<audio src="/escaperpg/sons/secrets/badending.mp3" autoplay></audio>
								<p>
									Dans l\'horreur la plus totale, vous entendez la masse gélatineuse se mouvoir près de vous.
									Vous essayez de ramper vers l\'extérieur de la pièce mais vous vous heurtez à un mur.
									Dans votre chute, vous avez perdu conscience de votre emplacement et ne savez plus où se trouve le passage menant vers la sortie !<br>
									Un tentacule visqueux vous agrippe soudain la jambe et vous tire douloureusement.
									Un second appendice commence à s\'accrocher à votre torse et vous sentez soudain une terrible douleur à l\'abdomen.
									Munis de crochets, les tentacules commencent à vous arracher la peau.<br>
									Fou de douleur et de panique, vous sentez votre vie vous échapper à mesure que votre sang s\'écoule hors de votre corps.<br>
									<br>
									Seul dans l\'obscurité avec un terrible monstre, vous finissez par rendre votre dernier soupir.
								</p>
								<center>
									<form action="1fgre2" method="post">
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
