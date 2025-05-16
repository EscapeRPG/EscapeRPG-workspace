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
							echo'</div>';
							
							echo '
								<center>
									<img src="/escaperpg/images/etoilefinpleine.png"><img src="/escaperpg/images/etoilefinpleine.png"><img src="/escaperpg/images/etoilefinpleine.png"><img src="/escaperpg/images/etoilefinvide.png"><img src="/escaperpg/images/etoilefinvide.png"><br>
									Félicitations, vous venez de terminer le scénario "Le Trésor d\'Ambria" d\'<i>EscapeRPG</i> !
								</center>
								<p>
									Cependant, vous avez obtenu la fin neutre, n\'hésitez donc pas à retenter l\'expérience pour améliorer votre score !<br>
									Vous avez réussi à vous faire une place auprès de l\'équipage, cependant le capitaine n\'a pas su garder leur confiance et ils se sont retournés contre lui.<br>
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
							for ($i = 1 ; $i <= $nombreDePages ; $i++) { echo '<a href="3xtr21.php?page=' . $i . '">' . $i . '</a>'; }
							echo '
								</div>
								<center>
									<form action="3xtr21" method="post">
										<fieldset>
											<label for="nom">Votre nom (20 caractères max) :</label>
											<input type="text" name="nom" id="nom" maxlength="20" required><br>
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
					elseif (isset ($_POST['suite']))
						{
							echo'
								<audio src="/escaperpg/sons/ambria/plage.mp3" autoplay></audio>
								<p>
									Sprintant pour l\'atteindre, vous voyez les quelques marins restés près du navire vous regarder approcher.
								</p>
								<div class="dialogue">
									<div class="portrait">
										<img src="/escaperpg/images/ambria/timonier.png">
									</div>
									<div class="bulleperso">
										<p>
											Capitaine ? Qu\'est-ce qui s\'passe ?
										</p>
									</div>
								</div>
								<p>
									Sullivan lui passe à côté et enjambe en quelques pas le planchon pour revenir à bord du navire, suivi de près par vous.
								</p>
								<div class="dialogue">
									<div class="portrait">
										<img src="/escaperpg/images/ambria/sullivanmasonmini.png">
									</div>
									<div class="bulleperso">
										<p>
											Pas l\'temps d\'vous expliquer ! Montez à bord et préparez-vous à faire feu !
										</p>
									</div>
								</div>
								<p>
									Un moment d\'hésitation, puis ils se dépêchent de lui obéir. Vous n\'êtes pas très nombreux à bord, mais suffisamment pour manœuvrer le bateau.<br>
									<br>
									À condition que les types qui vous attendaient ne fassent pas partie de la conspiration...
								</p>
								<div class="dialogue">
									<div class="portrait">
										<img src="/escaperpg/images/ambria/matelots.png">
									</div>
									<div class="bulleperso">
										<p>
											Cap\' ! Y a Jake et quelques aut\' gars qui s\'amènent ? Qu\'est-ce qu\'on fait ?
										</p>
									</div>
								</div>
								<p>
									L\'un des marins à bord avec vous tend le bras vers la plage, où vous apercevez les mutins en train de courir vers vous, lames brandies.
								</p>
								<div class="dialogue">
									<div class="portrait">
										<img src="/escaperpg/images/ambria/sullivanmasonmini.png">
									</div>
									<div class="bulleperso">
										<p>
											Tirez-leur dessus à ces fils de chiennes !
										</p>
									</div>
								</div>
								<p>
									Nouveau moment d\'hésitation puis, alors que vous commencez à apprêter le navire avec le capitaine, vous entendez le bruit des détonations claquer dans le vent.<br>
									Sur la plage, les mutins sont forcés de se mettre à l\'abri, ce qui vous permet de gagner un peu de temps.<br>
									Les hommes étant restés fidèles à Sullivan luttent avec acharnement, tirant et rechargeant leurs armes avec une rapidité exceptionnelle.<br>
									<br>
									Pendant ce temps, les préparatifs pour appareiller sont terminés et vous commencez à remonter l\'ancre.<br>
									Très bientôt, le Surgisseur des Tempêtes s\'éloigne vers l\'horizon, l\'écho lointain des cris de rage des mutins dans son dos.<br>
									<br>
									Vous n\'aurez finalement pas réussi à mettre la main sur le fabuleux trésor d\'Ambria, mais au moins êtes-vous en vie, apte à repartir vers de nouvelles aventures.
								</p>
								<center>
									<form action="3xtr21" method="post">
										<input type="submit" name="fin" value="Fin.">
									<form>
								</center>
							';
						}
					else
						{
							echo'<div id="succespopup">';
							$nouveausucces = '<img src="/escaperpg/images/succes/ambria/fidele.png"><span><u><b>Mort aux traîtres !</b></u><br>Se débarrasser des mutins</span>';
							$scenario = 'ambria';
							$description = 'fidèle';
							$cache = 'oui';
							$rarete = 'succesargent';
							include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/succesadd.php";
							include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/ambria/includes/sessioninc.php";
							echo'</div>';
							
							echo '
								<audio src="/escaperpg/sons/ambria/combatfin.mp3" autoplay></audio>
								<p>
									Un grand type baraqué se jette sur vous et vous roulez sur le côté pour vous mettre hors de portée de l\'attaque.<br>
									<br>
									De son côté, Sullivan ferraille comme un diable, ouvrant le bide d\'un mutin en deux.<br>
									Vous baissant juste à temps pour éviter une lame, vous courez dans la direction du capitaine pour vous placer dos à dos et combattre.<br>
									Pris en tenaille par les pirates, vous luttez quelques instants pour tenter de reprendre l\'avantage, mais les autres sont bien trop nombreux.<br>
									<br>
									Alors que Sullivan finit Barthy qui vous barrait la sortie, une détonation rugit depuis l\'intérieur de la salle.<br>
									Tournant la tête, vous voyez Jake, à l\'autre bout de la pièce, tenant dans sa main son pistolet encore fumant.
								</p>
								<div class="dialogue">
									<div class="portrait">
										<img src="/escaperpg/images/ambria/sullivanmasonmini.png">
									</div>
									<div class="bulleperso">
										<p>
											On gagnera pas ce combat, p\'tit gars, faut décarrer d\'ici au plus vite !
										</p>
									</div>
								</div>
								<p>
									Enjambant le cadavre de Barthy, vous courez tous les deux hors de la salle du trésor et descendez les marches quatre à quatre, arrivant en quelques secondes dans la grande pièce avec les squelettes.<br>
									Derrière vous, vous entendez le fracas des mutins en train de se précipiter à votre poursuite.<br>
									<br>
									Sans prendre le temps de savoir où ils en sont, vous foncez tous les deux vers le grand escalier et descendez les étages de la pyramide.
									Une fois sortis, vous traversez au pas de course la cité déserte alors que des coups de feu retentissent derrière vous.<br>
									<br>
									Arrivés aux grottes, vous pénétrez dans la première cavité qui se présente à vous et parcourez ses longs couloirs avant de déboucher dans la jungle luxuriante.<br>
									Prenant une seconde pour récupérer votre souffle, vous ne tardez pas à reprendre votre course en entendant l\'écho de bruits de pas dans les galeries.<br>
									Après quelques instants, vous finissez par apercevoir les mâts du Surgisseur des Tempêtes au-dessus des palmiers.
								</p>
								<center>
									<form action="3xtr21" method="post">
										<input type="submit" name="suite" value="Suivant.">
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
