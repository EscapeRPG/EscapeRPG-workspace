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
	   
		<link rel="stylesheet" href="/escaperpg/aventures/ambria/css/style.css">
		<meta charset="utf-8">
		<title>Fin - Le Trésor d'Ambria</title>
	</head>
	
	<body>
		<?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/header.php"; ?>
		<div id="banniere"><img src="/escaperpg/images/ambria/tresorambriamini.png" alt="le trésor d'ambria"></div>
		<main>
			<nav>
				<a href="/escaperpg/images/ambria/loganbarthelemymini.png" rel="lightbox[logan]" title="Logan Barthélémy"><img src="/escaperpg/images/ambria/loganbarthelemymini.png" alt="logan barthélémy"></a>
				<div id="inventairefooter"><input type="submit" value="INVENTAIRE"></div>
				<div id="motsdepasse"><input type="submit" value="NOTES"></div>
			</nav>
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
							$stmt = $conn->prepare("INSERT INTO ambriacoms (pseudo, message) VALUES (?, ?)");
							$stmt->execute([$nom, $message]);
							echo'<center>Merci d\'avoir enregistré votre commentaire !<br></center>';
						}
					echo'<div id="succespopup">';
					$nouveausucces = '<img src="/escaperpg/images/succes/general/fin.png"><span><u><b>Une page qui se tourne...</b></u><br>Terminer sa première aventure</span>';
					$scenario = 'general';
					$description = 'fin';
					$cache = 'non';
					$rarete = 'succesbronze';
					include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/succesadd.php";
					$nouveausucces = '<img src="/escaperpg/images/succes/ambria/fin.png"><span><u><b>La vie de pirate</b></u><br>Terminer l\'aventure</span>';
					$scenario = 'ambria';
					$description = 'fin';
					$cache = 'non';
					$rarete = 'succesbronze';
					include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/succesadd.php";
					$nouveausucces = '<img src="/escaperpg/images/succes/ambria/fin1logan.png"><span><u><b>Une vie en cage</b></u><br>En incarnant Logan, terminer l\'aventure et obtenir 1 étoile</span>';
					$scenario = 'ambria';
					$description = 'étoile1logan';
					$cache = 'oui';
					$rarete = 'succesbronze';
					include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/succesadd.php";
					$nouveausucces = '<img src="/escaperpg/images/succes/ambria/fin2logan.png"><span><u><b>Traître parmi les traîtres</b></u><br>En incarnant Logan, terminer l\'aventure et obtenir 2 étoiles</span>';
					$scenario = 'ambria';
					$description = 'étoile2logan';
					$cache = 'oui';
					$rarete = 'succesargent';
					include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/succesadd.php";
					echo'</div>';
					
					echo'
						<center>
							<img src="/escaperpg/images/etoilefinpleine.png"><img src="/escaperpg/images/etoilefinpleine.png"><img src="/escaperpg/images/etoilefinvide.png"><img src="/escaperpg/images/etoilefinvide.png"><img src="/escaperpg/images/etoilefinvide.png"><br>
							Félicitations, vous venez de terminer le scénario "Le Trésor d\'Ambria" d\'<i>EscapeRPG</i> !
						</center>
						<p>
							Cependant, vous avez obtenu l\'une des fins les plus sombres, n\'hésitez donc pas à retenter l\'expérience pour améliorer votre score !<br>
							Vous avez réussi à vous faire une place auprès de l\'équipage, cependant le capitaine n\'a pas su garder leur confiance et ils se sont retournés contre lui.
							Bien que vous ayez pu choisir de le trahir, n\'oubliez pas que le travail d\'équipe rapporte toujours plus, vous auriez ainsi pu obtenir une meilleure fin en restant fidèle à votre compagnon !<br>
							Veillez à bien communiquer vos informations avec votre partenaire pour être sûrs de ne pas faire d\'erreur lors de la résolution des énigmes.<br>
							<br>
							Quoi qu\'il en soit, merci d\'avoir pris le temps de jouer.
							Nous espérons que cette histoire vous aura plu, n\'hésitez pas à laisser un commentaire sur la <a href="https://www.facebook.com/escaperpg" target="_blank" rel="noreferrer">page Facebook</a>, chaque message est fortement apprécié !
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
					$stmt = $conn->query("SELECT COUNT(*) AS nb_coms FROM ambriacoms");
					$donnees = $stmt->fetch();
					$stmt->closeCursor();
					$totalDesComs = $donnees['nb_coms'];
					$nombreDePages  = ceil($totalDesComs / $nombreDeComsParPage);
					if (isset($_GET['page'])) { $page = $_GET['page']; }
					else { $page = 1; }
					$premierComAafficher = ($page - 1) * $nombreDeComsParPage;
					$reponse = $conn->query("SELECT * FROM ambriacoms ORDER BY id DESC LIMIT " . $premierComAafficher . ", " . $nombreDeComsParPage);
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
					for ($i = 1 ; $i <= $nombreDePages ; $i++) { echo '<a href="2d5pl4.php?page=' . $i . '">' . $i . '</a>'; }
					echo '
						</div>
						<center>
							<form action="2d5pl4" method="post">
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
					include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/ambria/includes/sessioninc.php";
				?>
			</div>
		</div>
		<div id="load"><div id="loader"></div></div>
		<script src="/escaperpg/scripts/aventures-chargement.js"></script>
		<?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/ambria/logan/includes/footer.php"; ?>
	</body>
</html>
