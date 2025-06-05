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
	
	<body>
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
							$nouveausucces = '<img src="/escaperpg/images/succes/secrets/shoggoth.png"><span><u><b>Bannisseur</b></u><br>Réussir à se débarrasser de la terrible créature !</span>';
							$scenario = 'secrets';
							$description = 'shoggoth';
							$cache = 'oui';
							$rarete = 'succesargent';
							include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/succesadd.php";
							echo'</div>';
							
							echo '
								<div id="enigme">
									<img src="/escaperpg/images/secrets/fin.png">
								</div>
								<center>
									<img src="/escaperpg/images/etoilefinpleine.png"><img src="/escaperpg/images/etoilefinpleine.png"><img src="/escaperpg/images/etoilefinvide.png"><img src="/escaperpg/images/etoilefinvide.png"><br>
									Félicitations, vous venez de terminer le scénario "Secrets Familiaux" d\'<i>EscapeRPG</i> !
								</center>
								<p>
									Vous avez obtenu la fin "neutre-mauvais", n\'hésitez donc pas à retenter l\'expérience pour améliorer votre score !<br>
									Vous avez bien fait de vous enquérir de l\'état des chiens de Gaspard et de leur trouver un remède, mais vous avez manqué de temps pour pratiquer le rituel.
									Vous devriez essayer de trouver un moyen de détourner l\'attention du shoggoth pour vous laisser plus de temps.
									Peut-être devriez-vous essayer de réparer l\'électricité ?
									Le shoggoth avait l\'air de s\'y intéresser mais le système mis en place par votre oncle n\'était pas suffisamment stable pour tenir le temps dont vous aviez besoin.<br>
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
							for ($i = 1 ; $i <= $nombreDePages ; $i++) { echo '<a href="2hb56k.php?page=' . $i . '">' . $i . '</a>'; }
							echo '
								</div>
								<center>
									<form action="2hb56k" method="post">
										<fieldset>
											<label for="nom">Votre nom (20 caractères max) :</label>
											<input list="notesListe" name="nom" id="nom" maxlength="20" required><br>
											<br>
											<label for="message">Votre message :</label>
											<textarea name="message" id="message" rows="7" cols="50">J\'ai terminé ce scénario et ai obtenu 2 étoiles !</textarea><br>
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
							include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/secrets/includes/sessioninc.php";
							echo '
								<audio src="/escaperpg/sons/secrets/shoggothexpulse.mp3" autoplay></audio>
								<p>
									Quelques secondes après que le cercle ait commencé à s\'illuminer, vous entendez un bruit sourd retentir près de vous : le shoggoth est juste à côté !<br>
									Aussi vite que possible, vous tracez le dernier symbole, celui visant à vous protéger, alors que le monstre crée un tentacule qui s\'agrippe à votre cheville.<br>
									<br>
									Vous tentez de vous dégager mais le shoggoth vous tient fermement.
									Soudain, le shoggoth forme un second tentacule qui fend l\'air et vous transperce l\'abdomen.
									Hurlant de douleur, vous tombez à la renverse alors que le cercle magique commence à briller d\'une lumière intense.<br>
									Vous entendez le monstre émettre un sifflement dans lequel vous sentez poindre de la rage.
									Vous relevez la tête pour voir ce qu\'il se passe et voyez le shoggoth commence à se contorsionner, avançant lentement vers le centre du cercle comme s\'il était happé.
									De nouveaux pseudopodes sortent de son corps pour essayer de s\'échapper, mais la force le tirant est plus puissante et l\'attire inexorablement.<br>
									Lorsqu\'il atteint le centre, la lumière du cercle devient soudain aveuglante et un sifflement strident retentit, manquant vous percer les tympans.
									Vous ne sauriez dire si ce bruit vient du shoggoth ou de la lumière elle-même, mais lorsque le silence revient, vous constatez que le cercle ne brille plus et que le shoggoth ne se trouve plus ici.<br>
									<br>
									Vous vous sentez de plus en plus mal, votre sang s\'écoulant de la plaie béante causée par votre ennemi.
									Vous ne vous faites pas d\'idées : vous allez mourir là, seul dans l\'obscurité.<br>
									Votre seule consolation est, qu\'au moins, vous avez réussi à bannir cette abomination hors de ce plan de l\'existence.
									Grâce à vous, l\'humanité ne risque plus rien pour le moment.<br>
									<br>
									Vous vous allongez sur le sol. Vous vous sentez partir petit à petit.<br>
									Bientôt, vous ne sentez plus aucune douleur. Vous êtes en paix.<br>
									<br>
									Vous fermez les yeux, puis tout prend fin.
								</p>
								<center>
									<form action="2hb56k" method="post">
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
