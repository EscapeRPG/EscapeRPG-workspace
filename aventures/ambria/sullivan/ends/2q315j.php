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
	   
		<link rel="stylesheet" href="/escaperpg/aventures/ambria/styleambria.css">
		<meta charset="utf-8">
		<title>Fin - Le Trésor d'Ambria</title>
	</head>
	
	<body onload="chargement()">
		<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/header.php"; ?>
		<div id="banniere"><img src="/escaperpg/images/ambria/tresorambriamini.png"></div>
		<div id="bloc_page">
			<nav>
				<a href="/escaperpg/images/ambria/sullivanmasonmini.png" rel="lightbox[sullivan]" title="Sullivan Mason"><img src="/escaperpg/images/ambria/sullivanmasonmini.png"></a>
				<div id="inventairefooter"><input type="submit" onclick="inventaireshow()" value="INVENTAIRE"></div>
				<div id="motsdepasse"><input type="submit" onclick="mdpshow()" value="NOTES"></div>
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
							include_once $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/succesadd.php";
							echo'</div>';
							
							if ($_SESSION['loggedin']) { $nom = $_SESSION['idcompte']; } else { $nom = $_POST['nom']; }
							$message = $_POST['message'];
							$stmt = $conn->prepare("INSERT INTO ambriacoms (pseudo, message) VALUES (?, ?)");
							$stmt->execute([$nom, $message]);
							echo'<center>Merci d\'avoir enregistré votre commentaire !<br></center>';
						}
					if (isset ($_POST['fin']) OR $_SESSION['fin'])
						{
							echo'<div id="succespopup">';
							$nouveausucces = '<img src="/escaperpg/images/succes/general/fin.png"><span><u><b>Une page qui se tourne...</b></u><br>Terminer sa première aventure</span>';
							$scenario = 'general';
							$description = 'fin';
							$cache = 'non';
							$rarete = 'succesbronze';
							include_once $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/succesadd.php";
							$nouveausucces = '<img src="/escaperpg/images/succes/ambria/fin.png"><span><u><b>La vie de pirate</b></u><br>Terminer l\'aventure</span>';
							$scenario = 'ambria';
							$description = 'fin';
							$cache = 'non';
							$rarete = 'succesbronze';
							include_once $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/succesadd.php";
							$nouveausucces = '<img src="/escaperpg/images/succes/ambria/fin1sullivan.png"><span><u><b>La fin d\'une ère...</b></u><br>En incarnant le capitaine Sullivan, terminer l\'aventure et obtenir 1 étoile</span>';
							$scenario = 'ambria';
							$description = 'étoile1sullivan';
							$cache = 'oui';
							$rarete = 'succesbronze';
							include_once $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/succesadd.php";
							$nouveausucces = '<img src="/escaperpg/images/succes/ambria/fin2sullivan.png"><span><u><b>Capitaine abandonné</b></u><br>En incarnant le capitaine Sullivan, terminer l\'aventure et obtenir 2 étoiles</span>';
							$scenario = 'ambria';
							$description = 'étoile2sullivan';
							$cache = 'oui';
							$rarete = 'succesargent';
							include_once $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/succesadd.php";
							echo'</div>';
							
							echo '
								<center>
									<img src="/escaperpg/images/etoilefinpleine.png"><img src="/escaperpg/images/etoilefinpleine.png"><img src="/escaperpg/images/etoilefinvide.png"><img src="/escaperpg/images/etoilefinvide.png"><img src="/escaperpg/images/etoilefinvide.png"><br>
									Félicitations, vous venez de terminer le scénario "Le Trésor d\'Ambria" d\'<i>EscapeRPG</i> !
								</center>
								<p>
									Cependant, vous avez obtenu l\'une des fins les plus sombres, n\'hésitez donc pas à retenter l\'expérience pour améliorer votre score !<br>
									Veillez à bien communiquer vos informations avec votre partenaire pour être sûrs de ne pas faire d\'erreur lors de la résolution des énigmes.
									Chaque erreur conduit l\'équipage à remettre en doute vos capacités et vous devez veiller à garder le moral des gars au beau fixe.<br>
									Aussi, tâchez de faire attention de bien noter les mots de passe qui vous sont donnés sans faire d\'erreur, car certaines étapes du scénario nécessitent de ne pas se tromper.<br>
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
							for ($i = 1 ; $i <= $nombreDePages ; $i++) { echo '<a href="2q315j.php?page=' . $i . '">' . $i . '</a>'; }
							echo'
								</div>
								<center>
									<form action="2q315j.php" method="post">
										<fieldset>
											<label for="nom">Votre nom (20 caractères max) :</label>
											<input type="text" name="nom" id="nom" required><br>
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
					elseif (isset ($_POST['1levier'])) // énigme réussie
						{
							include_once $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/ambria/includes/sessioninc.php";
							echo '
								<audio src="/escaperpg/sons/ambria/tirfin.mp3" autoplay></audio>
								<p>
									La cage se soulève soudain et retourne se positionner dans le plafond, vous libérant.<br>
									Vous faites quelques pas pour sortir de la zone où vous croupissiez et vous dirigez vers le trésor.
									Vous posez la main dessus et savourez un instant le contact froid du métal sur votre peau.
									Vous n\'avez cependant plus rien pour emporter quoi que ce soit et, de toute façon, vous ne savez même pas si vous réussirez à sortir un jour de cette île.<br /<
									<br>
									Vous reprenez le chemin de la sortie, descendez les étages de la pyramide et foulez de nouveau le sol de la grande place.
									Regardant autour de vous, vous cherchez un endroit où vous pourriez trouver de quoi vous nourrir et boire.
									Errant entre les bâtiments, vous finissez par vous faire une raison : vous n\'obtiendrez rien ici, mieux vaut revenir sur la plage.<br>
									Reprenant le chemin inverse, vous sortez de la cité, traversez les grottes et arrivez sur la plage alors que la nuit commence à se lever.
									Sans perdre de temps, vous avancez dans la jungle en scrutant les arbres et buissons.
									Lorsque le ciel devient trop sombre, vous vous rendez sur la plage avec une noix de coco et plusieurs baies dans les mains.
									Vous vous installez pour consommer ce maigre repas puis finissez par vous endormir, bercé par le doux son des vagues.<br /<
									<br>
									Le lendemain, après une nuit peu reposante, vous reprenez vos recherches et trouvez un petit cours d\'eau pour vous rafraîchir.
									L\'endroit semble parfait pour y établir un petit campement et vous passez de longs jours à récolter des branches, feuilles et autres ustensiles pour vous construire un abri primitif.<br>
									De longs jours passent, puis des semaines et enfin des mois.
									Votre régime forcé et les efforts prodigués vous ont considérablement affaibli et il vous faut un moment avant que vous ne puissiez songer à trouver un moyen de quitter l\'île.<br>
									<br>
									Une fois suffisamment reposé, au terme d\'un temps terriblement long, vous retournez dans la jungle pour y abattre des arbres et commencer la construction d\'un radeau.<br>
									Au bout de plusieurs mois, la construction de votre embarcation est terminée et vous réunissez un maximum de nourriture pour entreprendre ce nouveau dangereux périple.<br>
									<br>Vous poussez le radeau dans l\'eau et partez vers l\'horizon.
								</p>
								<center>
									<form action="2q315j.php" method="post">
										<input type="submit" name="fin" value="Fin.">
									<form>
								</center>
							';
						}
					else // Le joueur a cliqué sur l'un des deux mauvais leviers
						{
							include_once $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/ambria/includes/sessioninc.php";
							echo '
								<audio src="/escaperpg/sons/ambria/tir.mp3" autoplay></audio>
								<p>
									Rien ne se passe.<br>
									<br>
									Vous cherchez une autre possibilité pour vous défaire du piège mais ne voyez rien autour de vous.
									Vous êtes à court d\'idées à présent et vous vous laissez lourdement retomber sur le sol dallé de cette salle qui pourrait bien être votre tombeau.<br>
									<br>
									Assis dans le silence seulement troublé par quelques rafales de vent, vous tournez la tête vers le trésor qui n\'a pas été embarqué par les traîtres.<br>
									<br>
									Si près du but !<br>
									<br>
									Vous tendez la main et attrapez une pièce tombée au sol près de vous. La portant devant vos yeux, vous observez les détails qui la composent.
									Le visage finement gravé sur l\'un de ses côtés, représentant un homme de profil coiffé d\'une couronne complexe semblable aux pharaons de l\'Égypte Antique.
									L\'autre côté où une pyramide similaire à celle dans laquelle vous êtes enfermé a été gravée. Vous jouez un peu avec la pièce, l\'envoyant tournoyer en l\'air à plusieurs reprises.<br>
									Après quelques essais, vous ratez votre réception et la pièce rebondit un peu plus loin avant de rouler jusqu\'à l\'entrée de salle, hors de portée.
									Vous poussez un soupir résigné, puis fermez les yeux.<br>
									<br>
									Pour vous, l\'histoire s\'arrête ici, coincé dans l\'un des pièges de la cité d\'Ambria.
								</p>
								<center>
									<form action="2q315j.php" method="post">
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
		<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/ambria/sullivan/includes/footer.php"; ?>
	</body>
</html>