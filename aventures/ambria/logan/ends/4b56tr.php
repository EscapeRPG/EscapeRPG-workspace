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
		<div id="banniere"><img src="/escaperpg/images/ambria/tresorambriamini.png"></div>
		<main>
			<nav>
				<a href="/escaperpg/images/ambria/loganbarthelemymini.png" rel="lightbox[logan]" title="Logan Barthélémy"><img src="/escaperpg/images/ambria/loganbarthelemymini.png"></a>
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
					if (isset ($_POST['fin']) OR $_SESSION['fin'])
						{
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
							$nouveausucces = '<img src="/escaperpg/images/succes/ambria/fin3logan.png"><span><u><b>Fidèle envers le capitaine</b></u><br>En incarnant Logan, terminer l\'aventure et obtenir 3 étoiles</span>';
							$scenario = 'ambria';
							$description = 'étoile3logan';
							$cache = 'oui';
							$rarete = 'succesgold';
							include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/succesadd.php";
							$nouveausucces = '<img src="/escaperpg/images/succes/ambria/fin4logan.png"><span><u><b>Du chemin à parcourir...</b></u><br>En incarnant Logan, terminer l\'aventure et obtenir 4 étoiles</span>';
							$scenario = 'ambria';
							$description = 'étoile4logan';
							$cache = 'oui';
							$rarete = 'succesdiamant';
							include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/succesadd.php";
							echo'</div>';
							
							echo '
								<center>
									<img src="/escaperpg/images/etoilefinpleine.png"><img src="/escaperpg/images/etoilefinpleine.png"><img src="/escaperpg/images/etoilefinpleine.png"><img src="/escaperpg/images/etoilefinpleine.png"><img src="/escaperpg/images/etoilefinvide.png"><br>
									Félicitations, vous venez de terminer le scénario "Le Trésor d\'Ambria" d\'<i>EscapeRPG</i> !
								</center>
								<p>
									Vous n\'étiez pas loin d\'obtenir la meilleure fin possible, n\'hésitez donc pas à retenter l\'expérience pour améliorer votre score !<br>
									Veillez à bien communiquer vos informations avec votre partenaire pour être sûrs de ne pas faire d\'erreur lors de la résolution des énigmes.
									Vous devez faire au mieux pour vous gagner une place auprès de l\'équipage et chaque erreur vous éloigne de ce but.
									En faisant un parcours exemplaire, vous pourriez débloquer les 5 étoiles !<br>
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
							for ($i = 1 ; $i <= $nombreDePages ; $i++) { echo '<a href="4b56tr.php?page=' . $i . '">' . $i . '</a>'; }
							echo '
								</div>
								<center>
									<form action="4b56tr" method="post">
										<fieldset>
											<label for="nom">Votre nom (20 caractères max) :</label>
											<input list="notesListe" name="nom" id="nom" maxlength="20" required><br>
											<br>
											<label for="message">Votre message :</label>
											<textarea name="message" id="message" rows="7" cols="50">J\'ai terminé ce scénario et ai obtenu 4 étoiles !</textarea><br>
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
							include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/ambria/includes/sessioninc.php";
							echo '
								<audio src="/escaperpg/sons/ambria/recuptresor.mp3" autoplay></audio>
								<p>
									Un nouveau cri d\'enthousiasme résonne dans la pièce et tout le monde ouvre en grand les sacs de toile que vous aviez amené en débarquant.<br>
									Fourrant les pièces, lingots et autres pierres précieuses, vous les remplissez rapidement.
									Il reste encore beaucoup de trésors dans la salle mais vous ne pouvez rien emporter de plus pour le moment.
									Peut-être reviendrez-vous par la suite pour empocher le reste.<br>
									Pour le moment, hissant les sacs sur les épaules, toute l\'équipe reprend le chemin pour sortir de la pyramide, puis de la cité.<br>
									<br>
									Le voyage de retour se révèle long et pénible, tout le monde ployant sous le poids des sacs bien remplis.<br>
									<br>
									De retour au Surgisseur des Tempêtes, vous êtes accueillis par un concert de cris enthousiastes de la part des quelques hommes restés à bord.<br>
									Sullivan fait ruisseler le butin sur le pont, sous le regard avide de vos comparses, puis vous retournez tous à la pyramide récupérer le reste.<br>
									<br>
									La nuit est tombée depuis de longues heures lorsque vous en avez fini et vous ouvrez deux tonneaux d\'alcool récupérés dans la réserve personnelle du capitaine pour célébrer la réussite de cette aventure.<br>
									La fête dure toute la nuit dans une ambiance joyeuse, certains des hommes ayant sorti des instruments pour égayer la soirée.<br>
									<br>
									Le matin venu, Sullivan réunit l\'équipage qui peine à sortir du sommeil suite à la beuverie, puis procède au partage du butin.<br>
									Il annonce que vous avez mérité votre part pour tout ce que vous avez accompli jusqu\'ici mais, devant le regard des autres gars, semble se raviser.<br>
									<br>
									Il réfléchit un instant puis se tourne vers vous.
								</p>
								<div class="dialogue">
									<div class="portrait">
										<img src="/escaperpg/images/ambria/sullivanmasonmini.png">
									</div>
									<div class="bulleperso">
										<p>
											Logan, t\'es un p\'tit nouveau. Tu as accompli un beau travail pour en arriver là, mais la part pour les nouveaux membres de l\'équipage est plus maigre que pour les autres.
										</p>
									</div>
								</div>
								<p>
									Vous êtes un peu déconcerté sur le moment, mais en voyant la part qui vous revient, vos yeux s\'illuminent d\'avidité.<br>
									Après tout, avec l\'immensité du trésor que vous avez récupéré, même cette petite part vous permettra de vivre richement pendant des années.<br>
									<br>
									La répartition terminée, le Surgisseur des Tempêtes lève l\'ancre et repart vers l\'horizon.
								</p>
								<center>
									<form action="4b56tr" method="post">
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
		<?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/ambria/logan/includes/footer.php"; ?>
	</body>
</html>
