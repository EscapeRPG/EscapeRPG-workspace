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
		<title>La Tempête - Le Trésor d'Ambria</title>
	</head>
	
	<body>
		<?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/header.php"; ?>
		<div id="banniere"><img src="/escaperpg/images/ambria/tresorambriamini.png"></div>
		<main>
			<nav>
				<a href="/escaperpg/images/ambria/loganbarthelemymini.png" rel="lightbox[logan]" title="Logan Barthélémy"><img src="/escaperpg/images/ambria/loganbarthelemymini.png"></a>
				<div id="inventairefooter"><input type="submit" value="INVENTAIRE"></div>
				<div id="motsdepasse"><input type="submit" value="NOTES"></div>
				<a href="/escaperpg/aventures/ambria/save/save.php" target="_blank" rel="noreferrer"><input type="submit" name="save" value="SAUVEGARDER"></a>
			</nav>
			<div id="txt">
				<?php
					if (isset ($_POST['attendre']))
						{
							switch (str_replace($search, $replace, stripslashes($_POST['ordres'])))
								{
									case "barreatribord":
										echo'
											<audio src="/escaperpg/sons/ambria/ordres.mp3" autoplay></audio>
											<div class="dialogue">
												<div class="portrait">
													<img src="/escaperpg/images/ambria/sullivanmasonmini.png">
												</div>
												<div class="bulleperso">
													<p>
														LA BARRE À TRIBORD, ON CONTOURNE !
													</p>
												</div>
											</div>
											<p>
												Le timonier acquiesce d\'un petit mouvement de tête puis retourne à son poste. Le Surgisseur des Tempêtes tourne lentement pour amorcer une manœuvre d\'évitement.<br>
												<br>
												Cependant, celle-ci demande du temps et la tempête se rapproche à vive allure.
											</p>
											<center>
												<form action="tempete" method="post">
													<input type="submit" name="suivant" value="Suivant.">
												</form>
											</center>
										';
										break;
									case "branlebas":
										echo'
											<audio src="/escaperpg/sons/ambria/ordres.mp3" autoplay></audio>
											<p>
												Le capitaine reste silencieux quelques secondes, fusillant le timonier du regard, avant de lui rétorquer un insulte et de le pousser pour prendre la barre.
											</p>
											<div class="dialogue">
												<div class="portrait">
													<img src="/escaperpg/images/ambria/sullivanmasonmini.png">
												</div>
												<div class="bulleperso">
													<p>
														BRANLE-BAS, COMPAGNONS ! TOUT L\'MONDE À SON POSTE, J\'VEUX PAS EN VOIR UN SEUL D\'ENTRE VOUS TIRER AU FLANC, MORBLEU !
													</p>
												</div>
											</div>
											<p>
												Alors que la cloche retentit pour alerter l\'équipage, vous avancez droit vers la tempête.<br>
												L\'effervescence bat son plein, certains des hommes ne peuvent s\'empêcher de regarder les nuages avec angoisse.
											</p>
											<center>
												<form action="tempete" method="post">
													<input type="submit" name="suivant" value="Suivant.">
												</form>
											</center>
										';
										break;
									default:
										echo'
											<p>
												Avez-vous bien compris les ordres que le capitaine a donnés ?
											</p>
											<center>
												<form action="tempete" method="post">
													<input type="text" name="ordres"><input type="submit" name="attendre" value="Attendre les ordres.">
												</form>
											</center>
										';
										break;
								}
						}
					elseif (isset ($_POST['vigie']))
						{
							echo'
								<audio src="/escaperpg/sons/ambria/tempete.mp3" autoplay></audio>
								<p>
									Profitant d\'être en hauteur, vous vous placez au poste de vigie pour observer à l\'avant de pouvoir prévenir en cas de danger.<br>
									<br>
									C\'est alors que vous voyez une énorme vague arriver par la droite. Vous vous retournez aussitôt vers la poupe du navire où se trouve le capitaine et hurlez à pleins poumons.
								</p>
								<center>
									<form action="tempete" method="post">
										<input type="submit" name="babord" value="Scélérate à bâbord."><input type="submit" name="tribord" value="Scélérate à tribord.">
									</form>
								</center>
							';
						}
					elseif (isset ($_POST['babord']))
						{
							echo'
								<audio src="/escaperpg/sons/ambria/scelerate.mp3" autoplay></audio>
								<div class="dialogue">
									<div class="bulleperso2">
										<p>
											<span class="mdp2">SCÉLÉRATE À BÂBORD</span> !
										</p>
									</div>
									<div class="portrait2">
										<img src="/escaperpg/images/ambria/loganbarthelemymini.png">
									</div>
								</div>
								<p>
									Vous hurlez au capitaine de faire attention à la vague et entreprenez de redescendre aussitôt pour vous retrouver sur le pont.<br>
									<br>
									Sullivan fait ce qu\'il peut pour empêcher le pire mais le bateau n\'a pas eu le temps de se placer au mieux pour encaisser le choc et il commence à se faire retourner.<br>
									Le capitaine hurle quelque chose alors que vous voyez marins et matériel manquer d\'être éjectés
								</p>
								<center>
									<form action="tempete" method="post">
										<input type="text" name="tonneaux"><input type="submit" name="attendre3" value="Réagir.">
									</form>
								</center>
							';
							$_SESSION['loganconfiance'] -= 20;
							$_SESSION['mdp6'] = true;
						}
					elseif (isset ($_POST['tribord']))
						{
							echo'
								<audio src="/escaperpg/sons/ambria/scelerate.mp3" autoplay></audio>
								<div class="dialogue">
									<div class="bulleperso2">
										<p>
											<span class="mdp2">SCÉLÉRATE À TRIBORD</span> !
										</p>
									</div>
									<div class="portrait2">
										<img src="/escaperpg/images/ambria/loganbarthelemymini.png">
									</div>
								</div>
								<p>
									Vous hurlez au capitaine de faire attention à la vague et entreprenez de redescendre aussitôt pour vous retrouver sur le pont.<br>
									<br>
									Sullivan fait ce qu\'il peut pour empêcher le pire mais le bateau commence tout de même à se faire retourner.<br>
									Le capitaine hurle quelque chose alors que vous voyez marins et matériel manquer d\'être éjectés.
								</p>
								<center>
									<form action="tempete" method="post">
										<input type="text" name="tonneaux"><input type="submit" name="attendre3" value="Réagir.">
									</form>
								</center>
							';
							$_SESSION['loganconfiance'] += 10;
							$_SESSION['mdp7'] = true;
						}
					elseif (isset ($_POST['attendre3']))
						{
							switch (str_replace($search, $replace, stripslashes($_POST['tonneaux'])))
								{
									case "lestonneaux":
										echo'
											<audio src="/escaperpg/sons/ambria/tempete.mp3" autoplay></audio>
											<div class="dialogue">
												<div class="portrait">
													<img src="/escaperpg/images/ambria/sullivanmasonmini.png">
												</div>
												<div class="bulleperso">
													<p>
														Rattrapez les tonneaux ! !
													</p>
												</div>
											</div>
											<p>
												Comprenant qu\'il vous demande de rattraper les tonneaux avant qu\'ils ne passent par-dessus bord, vous vous jetez pour tenter d\'éviter le pire.
												D\'autres marins vous prêtent main forte mais vous réalisez rapidement que vous ne pourrez pas tous les rattraper.<br>
												Devant vous, deux tonneaux s\'apprêtent à tomber. Vous reconnaissez une réserve de riz, ainsi qu\'une réserve de rhum.<br>
												<br>
												Vous n\'aurez le temps d\'empêcher un seul des deux de sombrer
											</p>
											<center>
												<form action="tempete" method="post">
													<input type="submit" name="rhum" value="Sauver le rhum."><input type="submit" name="riz" value="Sauver le riz.">
												</form>
											</center>
										';
										break;
									default:
										echo'
											<p>
												Avez-vous bien compris ce que le capitaine a dit ?
											</p>
											<center>
												<form action="tempete" method="post">
													<input type="text" name="tonneaux"><input type="submit" name="attendre3" value="Réagir.">
												</form>
											</center>
										';
										break;
								}
						}
					elseif (isset ($_POST['rhum']))
						{
							echo'
								<audio src="/escaperpg/sons/ambria/tempetecracks.mp3" autoplay></audio>
								<p>
									Rattrapant le tonneau de justesse, vous le ramenez près du mât où vous l\'arrimez solidement grâce aux nœuds que Barthy vous a appris.<br>
									<br>
									La tempête semble être un peu plus calme et vous vous prenez à espérer en avoir bientôt terminé.<br>
									Soudain, le capitaine crie à nouveau votre nom et vous demande d\'aller sur le beaupré, à la proue, pour scruter l\'horizon et l\'avertir de ce qui arrive.<br>
									Vous vous empressez de lui obéir et, alors que des éclairs zèbrent le ciel et éclairent la voie par intermittence, vous distinguez des formes sombres entre les vagues.<br>
									<br>
									Des récifs !
								</p>
								<center>
									<form action="tempete" method="post">
										<input type="submit" name="suite2" value="Suivant.">
									</form>
								</center>
							';
							$_SESSION['rhum'] = true;
							$_SESSION['loganconfiance'] += 10;
						}
					elseif (isset ($_POST['riz']))
						{
							echo'
								<audio src="/escaperpg/sons/ambria/tempetecracks.mp3" autoplay></audio>
								<p>
									Rattrapant le tonneau de justesse, vous le ramenez près du mât où vous l\'arrimez solidement grâce aux nœuds que Barthy vous a appris.<br>
									<br>
									La tempête semble être un peu plus calme et vous vous prenez à espérer en avoir bientôt terminé.<br>
									Soudain, le capitaine crie à nouveau votre nom et vous demande d\'aller sur le beaupré, à la proue, pour scruter l\'horizon et l\'avertir de ce qui arrive.<br>
									Vous vous empressez de lui obéir et, alors que des éclairs zèbrent le ciel et éclairent la voie par intermittence, vous distinguez des formes sombres entre les vagues.<br>
									<br>
									Des récifs !
								</p>
								<center>
									<form action="tempete" method="post">
										<input type="submit" name="suite2" value="Suivant.">
									</form>
								</center>
							';
							$_SESSION['riz'] = true;
							$_SESSION['loganconfiance'] -= 10;
						}
					elseif (isset ($_POST['finrecifs']))
						{
							switch (str_replace($search, $replace, stripslashes($_POST['recifs'])))
								{
									case "rames":
										echo'<div id="succespopup">';
										$nouveausucces = '<img src="/escaperpg/images/succes/ambria/tempete.png"><span><u><b>Un mauvais temps qui s\'annonce</b></u><br>Affronter la tempête</span>';
										$scenario = 'ambria';
										$description = 'tempête';
										$cache = 'oui';
										$rarete = 'succesargent';
										include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/succesadd.php";
										echo'</div>';
										
										echo'
											<audio src="/escaperpg/sons/ambria/tempetefin.mp3" autoplay></audio>
											<p>
												Suivant vos recommandations, le capitaine manœuvre le navire pour éviter les récifs.
												Tout semble bien se passer mais, alors que ce dernier danger semble maintenant écarté, une violente rafale vient ébranler le navire.
												Après un énorme craquement sinistre, vous voyez le mât principal commencer à s\'écrouler.
												Quelques hommes tentent de tirer sur les cordages pour le retenir mais rien n\'y fait et l\'ensemble s\'écroule dans un fracas immense.<br>
												<br>
												La tempête semble soudain perdre de sa rage, mais la perte du mât vous a déporté vers une gigantesque colonne de pierre sortant des eaux sombres.
												Le capitaine donne un grand mouvement à la barre et le Surgisseur des Tempêtes évite de justesse l\'écueil, qui aurait certainement eu raison de la quille, voire de tout le bâtiment.<br>
												<br>
												Avec le ciel qui se dégage, vous constatez qu\'une immense île s\'étend à quelques milles de là.
												Ses hautes côtes lui donnent un air menaçant et imprenable.
												De nombreuses formations rocheuses semblables à des tours cyclopéennes se dressent çà et là, surgissant des abysses tels les tentacules du légendaire kraken.<br>
												<br>
												Vous en êtes sûr et certain, devant vous se trouve la mythique Ambria !<br>
												<br>
												Le capitaine ordonne aux matelots de sortir les rames pour amener le navire dans la baie, la voile principale étant dorénavant hors d\'usage.
											</p>
											<center>
												<form action="../ile/plage" method="post">
													<input type="submit" name="suivant2" value="Suivant.">
												</form>
											</center>
										';
										$_SESSION['matcasse'] = true;
										break;
									case "accoster":
										echo'<div id="succespopup">';
										$nouveausucces = '<img src="/escaperpg/images/succes/ambria/tempete.png"><span><u><b>Un mauvais temps qui s\'annonce</b></u><br>Affronter la tempête</span>';
										$scenario = 'ambria';
										$description = 'tempête';
										$cache = 'oui';
										$rarete = 'succesargent';
										include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/succesadd.php";
										echo'</div>';
										
										echo'
											<audio src="/escaperpg/sons/ambria/tempetefin.mp3" autoplay></audio>
											<p>
												Suivant vos recommandations, le capitaine manœuvre le navire pour éviter les récifs.
												À plusieurs reprises cependant, la coque du navire vient frotter sur les vicieux rochers.
												Vous parvenez toutefois à sortir mais, alors que ce dernier danger semble maintenant écarté, une violente rafale vient ébranler le navire, qui se déporte violemment sur le côté.
												Le capitaine tente de redresser la barre mais vous comprenez que la quille a été trop abîmée lors du passage des récifs et qu\'il est désormais impossible de manœuvrer correctement !
												Le Surgisseur des Tempêtes vient heurter la roche de plein fouet et le choc fait trembler tout le bâtiment, vous faisant trébucher et tomber lourdement sur le pont.<br>
												Heureusement, vous n\'étiez plus sur le beaupré, sans quoi vous auriez fini dans l\'eau et seriez certainement mort noyé.<br>
												<br>
												La tempête semble soudain perdre de sa rage et vous prenez une seconde pour souffler.<br>
												<br>
												Avec le ciel qui se dégage, vous constatez qu\'une immense île s\'étend à quelques milles de là.
												Ses hautes côtes lui donnent un air menaçant et imprenable.
												De nombreuses formations rocheuses semblables à des tours cyclopéennes se dressent çà et là, surgissant des abysses tels les tentacules du légendaire kraken.<br>
												<br>
												Vous en êtes sûr et certain, devant vous se trouve la mythique Ambria !<br>
												<br>
												Le capitaine ordonne aux matelots de sortir les rames pour amener le navire dans la baie, la quille ne permettant plus de naviguer à présent.
											</p>
											<center>
												<form action="../ile/plage" method="post">
													<input type="submit" name="suivant2" value="Suivant.">
												</form>
											</center>
										';
										$_SESSION['quillecassee'] = true;
										break;
									case "sortezlesrames":
										echo'<div id="succespopup">';
										$nouveausucces = '<img src="/escaperpg/images/succes/ambria/tempete.png"><span><u><b>Un mauvais temps qui s\'annonce</b></u><br>Affronter la tempête</span>';
										$scenario = 'ambria';
										$description = 'tempête';
										$cache = 'oui';
										$rarete = 'succesargent';
										include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/succesadd.php";
										echo'</div>';
										
										echo'
											<audio src="/escaperpg/sons/ambria/tempetefin.mp3" autoplay></audio>
											<p>
												Suivant vos recommandations, le capitaine manœuvre le navire pour éviter les récifs.
												À plusieurs reprises cependant, la coque du navire vient frotter sur les vicieux rochers.
												Vous parvenez toutefois à sortir mais, alors que ce dernier danger semble maintenant écarté, une violente rafale vient ébranler le navire.
												Après un énorme craquement sinistre, vous voyez le mât principal commencer à s\'écrouler.
												Quelques hommes tentent de tirer sur les cordages pour le retenir mais rien n\'y fait et l\'ensemble s\'écroule dans un fracas immense.<br>
												<br>
												La tempête semble soudain perdre de sa rage, mais la perte du mât vous a déporté vers une gigantesque colonne de pierre sortant des eaux sombres.
												Le capitaine tente de redresser la barre mais vous comprenez que la quille a été trop abîmée lors du passage des récifs et qu\'il est désormais impossible de manœuvrer correctement !
												Le Surgisseur des Tempêtes vient heurter la roche de plein fouet et le choc fait trembler tout le bâtiment, vous faisant trébucher et tomber lourdement sur le pont.<br>
												Heureusement, vous n\'étiez plus sur le beaupré, sans quoi vous auriez fini dans l\'eau et seriez certainement mort noyé.<br>
												<br>
												La tempête semble soudain perdre de sa rage et vous prenez une seconde pour souffler.<br>
												<br>
												Avec le ciel qui se dégage, vous constatez qu\'une immense île s\'étend à quelques milles de là.
												Ses hautes côtes lui donnent un air menaçant et imprenable.
												De nombreuses formations rocheuses semblables à des tours cyclopéennes se dressent çà et là, surgissant des abysses tels les tentacules du légendaire kraken.<br>
												<br>
												Vous en êtes sûr et certain, devant vous se trouve la mythique Ambria !<br>
												<br>
												Le capitaine ordonne aux matelots de sortir les rames pour amener le navire dans la baie, la quille et la voile principale ne permettant plus de naviguer à présent.
											</p>
											<center>
												<form action="../ile/plage" method="post">
													<input type="submit" name="suivant2" value="Suivant.">
												</form>
											</center>
										';
										break;
									case "chaloupe":
										echo'<div id="succespopup">';
										$nouveausucces = '<img src="/escaperpg/images/succes/ambria/tempete.png"><span><u><b>Un mauvais temps qui s\'annonce</b></u><br>Affronter la tempête</span>';
										$scenario = 'ambria';
										$description = 'tempête';
										$cache = 'oui';
										$rarete = 'succesargent';
										include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/succesadd.php";
										$nouveausucces = '<img src="/escaperpg/images/succes/ambria/tempeteparfaite.png"><span><u><b>Duo de choc !</b></u><br>Se sortir de la tempête sans subir de dégât !</span>';
										$scenario = 'ambria';
										$description = 'tempêteparfaite';
										$cache = 'oui';
										$rarete = 'succesgold';
										include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/succesadd.php";
										echo'</div>';
										
										echo'
											<audio src="/escaperpg/sons/ambria/tempetefin.mp3" autoplay></audio>
											<p>
												Suivant vos recommandations, le capitaine manœuvre le navire pour éviter les récifs.
												Tout semble bien se passer et la tempête finit par perdre de sa rage, aussi subitement qu\'elle était arrivée et vous prenez une seconde pour souffler.<br>
												<br>
												Avec le ciel qui se dégage, vous constatez qu\'une immense île s\'étend à quelques milles de là.
												Ses hautes côtes lui donnent un air menaçant et imprenable.
												De nombreuses formations rocheuses semblables à des tours cyclopéennes se dressent çà et là, surgissant des abysses tels les tentacules du légendaire kraken.<br>
												<br>
												Vous en êtes sûr et certain, devant vous se trouve la mythique Ambria !<br>
												<br>
												Le capitaine donne l\'ordre aux matelots d\'amener le Surgisseur des Tempêtes dans la baie puis de sortir les chaloupes pour accoster sans risquer de vous échouer.
											</p>
											<center>
												<form action="../ile/plage" method="post">
													<input type="submit" name="suivant2" value="Suivant.">
												</form>
											</center>
										';
										break;
									default:
										echo'
											<p>
												Avez-vous bien compris ce que le capitaine a dit ?<br>
												<br>
												Ou peut-être n\'êtes-vous tout simplement pas encore sortis des récifs ?
											</p>
											<div id="enigmelieu">
												<img src="/escaperpg/images/ambria/recifs.png">
											</div>
											<p>
												Les récifs ne pourront pas être évités à temps, mais vous devriez pouvoir guider le capitaine pour qu\'il sache où passer et éviter le maximum de dégâts.
											</p>
											<center>
												<form action="tempete" method="post">
													<input type="text" name="recifs"><input type="submit" name="finrecifs" value="Attendre les ordres.">
												</form>
											</center>
										';
								}
						}
					elseif (isset ($_POST['suite2']) OR $_SESSION['recifs'])
						{
							echo'
								<audio src="/escaperpg/sons/ambria/tempete.mp3" autoplay></audio>
								<div id="enigmelieu">
									<img src="/escaperpg/images/ambria/recifs.png">
								</div>
								<p>
									Les récifs ne pourront pas être évités à temps, mais vous devriez pouvoir guider le capitaine pour qu\'il sache où passer et éviter le maximum de dégâts.
								</p>
								<center>
									<form action="tempete" method="post">
										<input type="text" name="recifs"><input type="submit" name="finrecifs" value="Attendre les ordres.">
									</form>
								</center>
							';
							if (isset ($_POST['indice']))
								{
									echo'
										<div id="indice">
											Essayez de décrire le plus fidèlement possible ce que vous voyez.<br>
											Attention, si le capitaine a déjà commencé à manœuvrer, il faut passer au récif suivant.
										</div>
										<center>
											<form action="tempete" method="post">
												<button type="submit" name="indice5" class="boutonindice"></button>
											</form>
										</center>
									';
								}
							elseif (isset ($_POST['indice5']))
								{
									echo'
										<div id="indice">
											Essayez de décrire le plus fidèlement possible ce que vous voyez.<br>
											Attention, si le capitaine a déjà commencé à manœuvrer, il faut passer au récif suivant.<br>
											Soyez très précis, le capitaine a besoin de savoir la forme et la position de chaque récif.<br>
											Imaginez que les récifs sont disposés sur 5 colonnes, cela peut vous aider.
										</div>
										<center>
											<form action="tempete" method="post">
												<button type="submit" name="indice6" class="boutonindice"></button>
											</form>
										</center>
									';
								}
							elseif (isset ($_POST['indice6']))
								{
									echo'
										<div id="indice">
											Essayez de décrire le plus fidèlement possible ce que vous voyez.<br>
											Attention, si le capitaine a déjà commencé à manœuvrer, il faut passer au récif suivant.<br>
											Soyez très précis, le capitaine a besoin de savoir la forme et la position de chaque récif.<br>
											Imaginez que les récifs sont disposés sur 5 colonnes, cela peut vous aider.<br>
											Procédez par étape, d\'abord la ligne de récifs la plus proche, puis continuez en décrivant ce que vous voyez au-delà.
											Donnez la forme et la taille du récif, s\'il est plutôt haut, bas, plat, en pointe, combien de pointes, etc...
											Décrivez aussi leur position.
										</div>
										<center>
											<form action="tempete" method="post">
												<button type="submit" name="reponse2" class="boutonreponse"></button>
											</form>
										</center>
									';
								}
							elseif (isset ($_POST['reponse2']))
								{
									echo'
										<div class="reponse">
											Première phase de récifs : haut récif au sommet plat situé tout à gauche.<br>
											Seconde phase : récif en pointe simple au centre et haut récit au sommet plat juste à sa droite (en 4e colonne).<br>
											Troisième phase : long récif plat et bas visible au moins sur les colonnes 2 et 3, puis récif en pointe simple tout à droite. Les colonnes une et 4 sont cachées par d\'autres récifs plus proches.<br>
											Quatrième phase : Récif en pointe double en colonne 2.<br>
											<br>
											Avec ces instructions, le capitaine devrait pouvoir faire passer le navire sans heurts.
										</div>
									';
								}
							else
								{
									echo'
										<center>
											<form action="tempete" method="post">
												<button type="submit" name="indice" class="boutonindice"></button>
											</form>
										</center>
									';
								}
							$_SESSION['recifs'] = true;
						}
					elseif (isset ($_POST['suivant']))
						{
							echo'
								<audio src="/escaperpg/sons/ambria/tempete.mp3" autoplay></audio>
								<p>
									En moins de temps que vous ne l\'auriez cru, la tempête s\'abat sur vous.<br>
									<br>
									Renversés par les bourrasques, quelques hommes tombent sur le pont tandis que les autres peinent à tenir droit.<br>
									Fouettée par le vent et la pluie, vous voyez la grand-voile se gonfler soudainement, faisant perdre l\'équilibre à un marin qui tentait de la retenir.
									Vous voyez le malheureux tomber comme une pierre au-delà du bastingage, finissant dans les eaux.<br>
									Vous avez l\'impression d\'entendre le capitaine hurler quelque chose mais la pluie qui fait rage vous empêche d\'entendre quoi.
									Médusé, vous ne parvenez pas à détacher votre regard de l\'endroit où le marin a été éjecté.<br>
									Le capitaine hurle à nouveau et vous comprenez que c\'est votre nom qu\'il scande, vous vous tournez vers lui pour savoir ce qu\'il attend de vous.
								</p>
								<center>
									<form action="tempete" method="post">
										<input type="text" name="ordres2"><input type="submit" name="attendre2" value="Suivre les ordres.">
									</form>
								</center>
							';
						}
					elseif (isset ($_POST['attendre2']))
						{
							switch (str_replace($search, $replace, stripslashes($_POST['ordres2'])))
								{
									case "affale":
										echo'
											<audio src="/escaperpg/sons/ambria/tempete.mp3" autoplay></audio>
											<p>
												Vous comprenez aussitôt ce qu\'il attend de vous et vous vous dirigez vers les haubans pour grimper au mât.
											</p>
											<center>
												<form action="tempete" method="post">
													<input type="submit" name="haubans" value="Grimper.">
												</form>
											</center>
										';
										$_SESSION['affale'] = true;
										break;
									case "ferle":
										echo'
											<audio src="/escaperpg/sons/ambria/tempete.mp3" autoplay></audio>
											<p>
												Vous comprenez aussitôt ce qu\'il attend de vous et vous vous dirigez vers les haubans pour grimper au mât.
											</p>
											<center>
												<form action="tempete" method="post">
													<input type="submit" name="haubans" value="Grimper.">
												</form>
											</center>
										';
										break;
									default:
										echo'
											<p>
												Avez-vous bien compris les ordres que le capitaine a donnés ?
											</p>
											<center>
												<form action="tempete" method="post">
													<input type="text" name="ordres2"><input type="submit" name="attendre2" value="Suivre les ordres.">
												</form>
											</center>
										';
								}
						}
					elseif (isset ($_POST['haubans']) OR $_SESSION['haubans'])
						{
							echo'
								<audio src="/escaperpg/sons/ambria/tempetecracks.mp3" autoplay></audio>
								<div id="game-container-1" class="haubans">
									<div id="map-and-controls">
										<div id="game-map-1" class="map-haubans">
											<div id="tileshaubans" class="layer"></div>
											<div id="sprites" class="layer"></div>
										</div>
										<div id="controls">
											<button id="up">↑</button><br>
											<button id="left">←</button><button id="right">→</button><br>
											<button id="down">↓</button>
										</div>
									</div>
								</div>
								<p>
									Vous avez déjà appris à grimper aux haubans et savez que vous devez faire attention, car la mousse qui s\'est agglutinée par endroits peut se révéler très glissante avec la pluie.<br>
									De même, vous devez veiller aux dépôts de calcaire qui peuvent rompre et se révéler traîtres.<br>
									Enfin, vous savez que certains cordages sont affaiblis et risquent de casser sous votre poids.<br>
									<br>
									Il vous faut trouver un passage sûr et tâcher de grimper aussi souvent que possible sans jamais redescendre pour gagner du temps.
								</p>
								<script src="/escaperpg/aventures/ambria/logan/scripts/haubans.js"></script>
							';
							if (isset ($_POST['indice']))
								{
									echo'
										<div id="indice">
											Faites attention au chemin que vous empruntez, la moindre erreur pourrait vous faire perdre du temps et se révéler dramatique pour le navire.
										</div>
										<center>
											<form action="tempete" method="post">
												<button type="submit" name="indice2" class="boutonindice"></button>
											</form>
										</center>
									';
								}
							elseif (isset ($_POST['indice2']))
								{
									echo'
										<div id="indice">
											Faites attention au chemin que vous empruntez, la moindre erreur pourrait vous faire perdre du temps et se révéler dramatique pour le navire.<br>
											Tâchez de trouver le chemin qui mène tout en haut au milieu en évitant chaque case qui vous amènerait à franchir un obstacle (mousse, calcaire, cordage cassé).
										</div>
										<center>
											<form action="tempete" method="post">
												<button type="submit" name="indice3" class="boutonindice"></button>
											</form>
										</center>
									';
								}
							elseif (isset ($_POST['indice3']))
								{
									echo'
										<div id="indice">
											Faites attention au chemin que vous empruntez, la moindre erreur pourrait vous faire perdre du temps et se révéler dramatique pour le navire.<br>
											Tâchez de trouver le chemin qui mène tout en haut au milieu en évitant chaque case qui vous amènerait à franchir un obstacle (mousse, calcaire, cordage cassé).<br>
											La partie droite des haubans n\'est pas sûre, privilégiez de passer entre la gauche et le milieu.
										</div>
										<center>
											<form action="tempete" method="post">
												<button type="submit" name="reponse" class="boutonreponse"></button>
											</form>
										</center>
									';
								}
							elseif (isset ($_POST['reponse']))
								{
									echo'
										<div id="enigmelieu">
											<img src="/escaperpg/images/ambria/haubansreponse.png">
										</div>
									';
								}
							else
								{
									echo'
										<center>
											<form action="tempete" method="post">
												<button type="submit" name="indice" class="boutonindice"></button>
											</form>
										</center>
									';
								}
							$_SESSION['haubans'] = true;
						}
					else
						{
							echo'
								<audio src="/escaperpg/sons/ambria/flots.mp3" autoplay></audio>
								<p>
									Naviguant au gré des vents, le navires glisse sur les flots calmes depuis plusieurs jours maintenant.<br>
									<br>
									Au fil du temps, vous avez fini par bien vous intégrer à l\'équipage et vous vous débrouillez de mieux en mieux avec les tâches quotidiennes que l\'on vous confie.<br>
									<br>
									Parcourant le pont, le capitaine est en train d\'inspecter l\'horizon en fronçant les sourcils. Vous suivez son regard.<br>
									Au loin, dans la direction que vous prenez, de sombres nuages obscurcissent le ciel.
									Le timonier s\'approche du capitaine et lui demande quelque chose à voix basse.<br>
									<br>
									Le capitaine semble réfléchir un instant.
								</p>
								<center>
									<form action="tempete" method="post">
										<input type="text" name="ordres"><input type="submit" name="attendre" value="Attendre les ordres.">
									</form>
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
