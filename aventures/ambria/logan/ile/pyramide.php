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
		<title>La Pyramide - Le Trésor d'Ambria</title>
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
					if ($_SESSION['loganconfiance'] < 70) { $_SESSION['loganpasconfiant'] = true; }
					else { $_SESSION['loganconfiant'] = true; }
					if (isset ($_POST['leviers']) OR $_SESSION['levier'])
						{
							echo'
								<audio src="/escaperpg/sons/ambria/jungle.mp3" autoplay></audio>
								<div id="game-container-1" class="game-container">
									<div id="map-and-controls">
										<div id="game-map-1" class="map-levier">
											<div id="tiles" class="layer"></div>
											<div id="sprites" class="layer"></div>
										</div>
										<div id="controls">
											<button id="up">↑</button><br>
											<button id="left">←</button><button id="right">→</button><br>
											<button id="down">↓</button>
										</div>
									</div>
								</div>
								<p>Comment savoir quels mouvements effectuer avec le levier pour libérer le capitaine ?</p>
								<script src="/escaperpg/aventures/ambria/logan/scripts/levier.js"></script>
							';
							if (isset ($_POST['indice']))
								{
									echo'
										<div id="indice">
											Il semblerait que des mécanismes cachés vous empêchent de faire pivoter le levier comme bon vous semble.
											De plus, vous ne savez pas où l\'amener.
										</div>
										<center>
											<form action="pyramide" method="post">
												<button type="submit" name="indice2" class="boutonindice"></button>
											</form>
										</center>
									';
								}
							elseif (isset ($_POST['indice2']))
								{
									echo'
										<div id="indice">
											Il semblerait que des mécanismes cachés vous empêchent de faire pivoter le levier comme bon vous semble.
											De plus, vous ne savez pas où l\'amener.<br>
											Le capitaine doit pouvoir vous donner des indications.
										</div>
										<center>
											<form action="pyramide" method="post">
												<button type="submit" name="reponse" class="boutonreponse"></button>
											</form>
										</center>
									';
								}
							elseif (isset ($_POST['reponse'])) { echo'<div id="enigmelieu"><img src="/escaperpg/images/ambria/levierreponse.png"></div>'; }
							else { echo'<center><form action="pyramide" method="post"><button type="submit" name="indice" class="boutonindice"></button></form></center>'; }
							$_SESSION['levier'] = true;
						}
					elseif (isset ($_POST['suivant']))
						{
							switch (str_replace($search, $replace, stripslashes($_POST['sullivan'])))
								{
									case "rassemblelesgars":
										echo'
											<audio src="/escaperpg/sons/ambria/grottetorche.mp3" autoplay></audio>
											<p>
												L\'un des pirates se penche vers le capitaine, à côté de vous, et lui suggère de se rendre aux étages supérieurs.
												Sullivan opine du chef et demande à réunir tout le monde avant de commencer à gravir les marches de l\'escalier,
												montant d\'étage en étage jusqu\'à arriver dans une vaste salle couverte d\'un toit soutenu par des colonnes finement sculptées.<br>
												À l\'intérieur, les vestiges de grandes tables où devaient se réunir les notables de la ville pour régner.<br>
												<br>
												Sullivan s\'avance de quelques pas.
											</p>
											<div class="dialogue">
												<div class="portrait">
													<img src="/escaperpg/images/ambria/barthy.png">
												</div>
												<div class="bulleperso">
													<p>
														C\'est quoi ce bordel ?
													</p>
												</div>
											</div>
											<div class="dialogue">
												<div class="bulleperso2">
													<p>
														Merde, on dirait qu\'toute la ville est là !<br>
														<br>
														Mais qu\'est-ce qu\'a bien pu s\'passer ici bon Dieu ?! C\'est comme si z\'étaient tous v\'nus là pour mourir.
													</p>
												</div>
												<div class="portrait2">
													<img src="/escaperpg/images/ambria/lloyd.png">
												</div>
											</div>
											<p>
												Sur des chaises, affalés sur les tables ou à même le sol, des squelettes remplissent la salle dans un décor macabre.
											</p>
											<div class="dialogue">
												<div class="portrait">
													<img src="/escaperpg/images/ambria/sullivanmasonmini.png">
												</div>
												<div class="bulleperso">
													<p>
														Là, regardez, on dirait qu\'y a un autre escalier menant au toit.
													</p>
												</div>
											</div>
											<p>
												Vous avez un peu de mal, vous aussi, à détacher votre regard des piles de squelettes entassés là.<br>
												<br>
												Le capitaine vous tapote sur l\'épaule et désigne un point vers l\'extérieur. Vous voyez alors qu\'un escalier semble mener sur le toit.<br>
												<br>
												Y aurait-il encore une salle au-dessus de vous ?<br>
												<br>
												Vous en approchant, vous arrivez sur une sorte de balcon surplombant l\'ensemble de la ville.<br>
												La beauté du panorama est à couper le souffle et un léger vertige vient vous étreindre le cœur lorsque vous approchez du bord et constatez la hauteur qui vous sépare du sol.
											</p>
											<center>
												<form action="pyramide" method="post">
													<input type="submit" name="suivant2" value="Suivant.">
												</form>
											</center>
										';
										$_SESSION['sullivanpasconfiant'] = true;
										break;
									case "faisvenirlesgars":
										echo'
											<audio src="/escaperpg/sons/ambria/grottetorche.mp3" autoplay></audio>
											<p>
												L\'un des pirates se penche vers le capitaine, à côté de vous, et lui suggère de se rendre aux étages supérieurs.
												Sullivan opine du chef et demande à réunir tout le monde avant de commencer à gravir les marches de l\'escalier,
												montant d\'étage en étage jusqu\'à arriver dans une vaste salle couverte d\'un toit soutenu par des colonnes finement sculptées.<br>
												À l\'intérieur, les vestiges de grandes tables où devaient se réunir les notables de la ville pour régner.<br>
												<br>
												Sullivan s\'avance de quelques pas.
											</p>
											<div class="dialogue">
												<div class="portrait">
													<img src="/escaperpg/images/ambria/barthy.png">
												</div>
												<div class="bulleperso">
													<p>
														C\'est quoi ce bordel ?
													</p>
												</div>
											</div>
											<div class="dialogue">
												<div class="bulleperso2">
													<p>
														Merde, on dirait qu\'toute la ville est là !<br>
														<br>
														Mais qu\'est-ce qu\'a bien pu s\'passer ici bon Dieu ?! C\'est comme si z\'étaient tous v\'nus là pour mourir.
													</p>
												</div>
												<div class="portrait2">
													<img src="/escaperpg/images/ambria/lloyd.png">
												</div>
											</div>
											<p>
												Sur des chaises, affalés sur les tables ou à même le sol, des squelettes remplissent la salle dans un décor macabre.
											</p>
											<div class="dialogue">
												<div class="portrait">
													<img src="/escaperpg/images/ambria/sullivanmasonmini.png">
												</div>
												<div class="bulleperso">
													<p>
														Là, regardez, on dirait qu\'y a un autre escalier menant au toit.
													</p>
												</div>
											</div>
											<p>
												Vous avez un peu de mal, vous aussi, à détacher votre regard des piles de squelettes entassés là.<br>
												<br>
												Le capitaine vous tapote sur l\'épaule et désigne un point vers l\'extérieur. Vous voyez alors qu\'un escalier semble mener sur le toit.<br>
												<br>
												Y aurait-il encore une salle au-dessus de vous ?<br>
												<br>
												Vous en approchant, vous arrivez sur une sorte de balcon surplombant l\'ensemble de la ville.<br>
												La beauté du panorama est à couper le souffle et un léger vertige vient vous étreindre le cœur lorsque vous approchez du bord et constatez la hauteur qui vous sépare du sol.
											</p>
											<center>
												<form action="pyramide" method="post">
													<input type="submit" name="suivant2" value="Suivant.">
												</form>
											</center>
										';
										$_SESSION['sullivanconfiant'] = true;
										break;
									default:
										echo'
											<p>
												Qu\'a dit le capitaine ? Êtes-vous sûr d\'avoir compris ?
											</p>
											<center>
												<form action="pyramide" method="post">
													<input list="notesListe" name="sullivan"><input type="submit" name="suivant" value="Suivant.">
												</form>
											</center>
										';
								}
						}
					elseif (isset ($_POST['suivant2']))
						{
							echo'<div id="succespopup">';
							$nouveausucces = '<img src="/escaperpg/images/succes/ambria/tresor.png"><span><u><b>Au bout du chemin</b></u><br>Mettre la main sur le trésor d\'Ambria</span>';
							$scenario = 'ambria';
							$description = 'trésor';
							$cache = 'oui';
							$rarete = 'succesbronze';
							include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/succesadd.php";
							echo'</div>';
							
							echo'
								<audio src="/escaperpg/sons/ambria/pyramidetop.mp3" autoplay></audio>
								<p>
									Délaissant l\'à-pic, vous vous retournez pour observer l\'escalier et constatez qu\'il y a effectivement une autre salle à explorer.<br>
									<br>
									Le groupe monte alors les marches et vous vous retrouvez sur un palier, face à une double-porte en bois gravée des motifs les plus beaux et fins que vous ayez vu de toute votre vie.<br>
									Plusieurs pierres précieuses y ont été incrustées et des entrelacs d\'or entourent les poignées.<br>
									<br>
									Sullivan jubile.
								</p>
								<div class="dialogue">
									<div class="portrait">
										<img src="/escaperpg/images/ambria/sullivanmasonmini.png">
									</div>
									<div class="bulleperso">
										<p>
											Les gars, j\'crois qu\'on a touché l\'gros lot !
										</p>
									</div>
								</div>
								<p>
									Un sourire avide sur son visage, il pousse les portes en grognant sous l\'effort.
									Avec le temps, l\'humidité et la rouille, il est à présent difficile de les ouvrir,
									mais les autres gars viennent lui prêter main forte et finissent par dégager un espace suffisant pour que tout le monde puisse s\'y faufiler.<br>
									<br>
									À l\'intérieur, vous découvrez une grande salle au centre de laquelle se trouve une véritable montagne de trésors !
									Des pièces en or massif, des statuettes, des bijoux, des pierres précieuses... Une fortune colossale dépassant de loin toutes vos espérances vous attend.<br>
									<br>
									Un cri de joie explose soudain, poussé par les gorges de toutes les personnes présentes et brisant le silence qui régnait jusqu\'alors.
								</p>
								<center>
									<form action="pyramide" method="post">
										<input type="submit" name="suivant3" value="Avancer.">
									</form>
								</center>
							';
						}
					elseif (isset ($_POST['suivant3']))
						{
							if ($_SESSION['loganconfiant'])
								{
									if ($_SESSION['sullivanconfiant'])
										{
											echo'
												<audio src="/escaperpg/sons/ambria/prisontombe.mp3" autoplay></audio>
												<p>
													Le capitaine passe devant, en direction du butin. Vous le suivez, quelques pas derrière.<br>
													<br>
													Il s\'arrête soudain net, juste devant vous et vous manquez de peu de lui rentrer dedans.<br>
													Baissant les yeux, vous voyez qu\'il a marché sur une dalle qui s\'est légèrement enfoncée dans le sol.
													Un déclic se fait alors entendre et, jaillissant du plafond, des barreaux de métal se plantent autour de vous deux.
												</p>
												<div class="dialogue">
													<div class="bulleperso2">
														<p>
															<span class="mdp2">Attendez capitaine</span>, on va vous sortir de là !
														</p>
													</div>
													<div class="portrait2">
														<img src="/escaperpg/images/ambria/loganbarthelemymini.png">
													</div>
												</div>
												<p>
													Aidé des autres, vous agrippez les barreaux et tentez par tous les moyens de les faire bouger, mais la cage est trop lourde et solide, soldant vos efforts par un échec.
												</p>
												<div class="dialogue">
													<div class="portrait">
														<img src="/escaperpg/images/ambria/sullivanmasonmini.png">
													</div>
													<div class="bulleperso">
														<p>
															Essayez d\'voir s\'il y pas quelque chose dans la salle pour ouvrir ça.
														</p>
													</div>
												</div>
												<p>
													Hochant la tête, vous vous séparez pour explorer la pièce, tout en prenant garde de ne déclencher aucun autre piège qui pourrait encore être actif.<br>
													<br>
													En passant près d\'une sorte de meuble en pierre, vous remarquez un levier.
												</p>
												<div class="dialogue">
													<div class="bulleperso2">
														<p>
															Capitaine, je crois que j\'ai quelque chose.
														</p>
													</div>
													<div class="portrait2">
														<img src="/escaperpg/images/ambria/loganbarthelemymini.png">
													</div>
												</div>
												<center>
													<form action="pyramide" method="post">
														<input type="submit" name="leviers" value="Suivant.">
													</form>
												</center>
											';
											$_SESSION['mdp14'] = true;
										}
									else
										{
											echo'
												<audio src="/escaperpg/sons/ambria/prisontombe.mp3" autoplay></audio>
												<p>
													Le capitaine passe devant, en direction du butin. Vous le suivez, quelques pas derrière.<br>
													<br>
													Il s\'arrête soudain net, juste devant vous et vous manquez de peu de lui rentrer dedans.<br>
													Baissant les yeux, vous voyez qu\'il a marché sur une dalle qui s\'est légèrement enfoncée dans le sol.
													Un déclic se fait alors entendre et, jaillissant du plafond, des barreaux de métal se plantent autour de vous deux.
												</p>
												<div class="dialogue">
													<div class="bulleperso2">
														<p>
															<span class="mdp2">Bougez pas</span> capitaine, on va vous sortir de là !
														</p>
													</div>
													<div class="portrait2">
														<img src="/escaperpg/images/ambria/loganbarthelemymini.png">
													</div>
												</div>
												<p>
													Vous empoignez les barreaux et commencez à gesticuler dans l\'espoir de les faire bouger.<br>
													Vous croisez alors le regard de Sullivan et tremblez.<br>
													<br>
													Ce dernier semble las et résigné, vous ne comprenez pas tout de suite ce qui se passe.
												</p>
												<div class="dialogue">
													<div class="portrait">
														<img src="/escaperpg/images/ambria/sullivanmasonmini.png">
													</div>
													<div class="bulleperso">
														<p>
															Laisse tomber, p\'tit gars...<br /<
															<br>
															J\'ai l\'impression qu\'tes camarades ont autre chose en tête.
														</p>
													</div>
												</div>
												<p>
													Vous vous tournez alors vers le reste de l\'équipage.<br /<
													<br>
													Jake fait un pas en avant et ouvre les bras dans un geste triomphal.
												</p>
												<div class="dialogue">
													<div class="portrait">
														<img src="/escaperpg/images/ambria/jake.png">
													</div>
													<div class="bulleperso">
														<p>
															J\'crois qu\'il est temps qu\'on opère à un p\'tit chang\'ment d\'régime, pas vrai les gars ?
														</p>
													</div>
												</div>
												<p>
													Les autres acquiescent en tirant leur lame au clair et en poussant des rires gras.<br>
													<br>
													Jake se penche alors vers vous.
												</p>
												<div class="dialogue">
													<div class="portrait">
														<img src="/escaperpg/images/ambria/jake.png">
													</div>
													<div class="bulleperso">
														<p>
															Et toi Logan, tu décides quoi ?
														</p>
													</div>
												</div>
												<center>
													<form action="pyramide" method="post">
														<input type="submit" name="mutinerie" value="Vous mutiner."><input type="submit" name="refuser" value="Refuser de vous mutiner.">
													</form>
												</center>
											';
											$_SESSION['mdp13'] = true;
										}
								}
							else
								{
									if ($_SESSION['sullivanconfiant'])
										{
											echo'
												<audio src="/escaperpg/sons/ambria/prisontombe.mp3" autoplay></audio>
												<p>
													Le capitaine passe devant, en direction du butin. Vous le suivez, quelques pas derrière.<br>
													<br>
													Il s\'arrête soudain net, juste devant vous et vous manquez de peu de lui rentrer dedans.<br>
													Baissant les yeux, vous voyez qu\'il a marché sur une dalle qui s\'est légèrement enfoncée dans le sol.
													Un déclic se fait alors entendre et, jaillissant du plafond, des barreaux de métal se plantent autour de vous deux.
												</p>
												<div class="dialogue">
													<div class="bulleperso2">
														<p>
															Attendez capitaine, on va vous <span class="mdp2">sortir de là</span> !
														</p>
													</div>
													<div class="portrait2">
														<img src="/escaperpg/images/ambria/loganbarthelemymini.png">
													</div>
												</div>
												<p>
													Aidé des autres, vous agrippez les barreaux et tentez par tous les moyens de les faire bouger, mais la cage est trop lourde et solide, soldant vos efforts par un échec.
												</p>
												<div class="dialogue">
													<div class="portrait">
														<img src="/escaperpg/images/ambria/sullivanmasonmini.png">
													</div>
													<div class="bulleperso">
														<p>
															Essayez d\'voir s\'il y pas quelque chose dans la salle pour ouvrir ça.
														</p>
													</div>
												</div>
												<p>
													Hochant la tête, vous vous séparez pour explorer la pièce, tout en prenant garde de ne déclencher aucun autre piège qui pourrait encore être actif.<br>
													<br>
													En passant près d\'une sorte de meuble en pierre, vous remarquez un levier.
												</p>
												<div class="dialogue">
													<div class="bulleperso2">
														<p>
															Capitaine, je crois que j\'ai quelque chose.
														</p>
													</div>
													<div class="portrait2">
														<img src="/escaperpg/images/ambria/loganbarthelemymini.png">
													</div>
												</div>
												<center>
													<form action="pyramide" method="post">
														<input type="submit" name="leviers" value="Suivant.">
													</form>
												</center>
											';
											$_SESSION['mdp12'] = true;
										}
									else
										{
											echo'
												<audio src="/escaperpg/sons/ambria/prisontombe.mp3" autoplay></audio>
												<p>
													Le capitaine passe devant, en direction du butin et vous le suivez de près.<br>
													<br>
													Il s\'arrête soudain net, juste devant vous et vous manquez de peu de lui rentrer dedans.<br>
													Baissant les yeux, vous voyez qu\'il a marché sur une dalle qui s\'est légèrement enfoncée dans le sol.
													Un déclic se fait alors entendre et, jaillissant du plafond, des barreaux de métal se plantent autour de vous deux.
												</p>
												<div class="dialogue">
													<div class="bulleperso2">
														<p>
															Capitaine, <span class="mdp2">que faisons-nous</span> ?
														</p>
													</div>
													<div class="portrait2">
														<img src="/escaperpg/images/ambria/loganbarthelemymini.png">
													</div>
												</div>
												<div class="dialogue">
													<div class="portrait">
														<img src="/escaperpg/images/ambria/sullivanmasonmini.png">
													</div>
													<div class="bulleperso">
														<p>
															Merde !<br>
															<br>
															Les gars, v\'nez nous donner un coup de main !
														</p>
													</div>
												</div>
												<p>
													Un type commence à s\'approcher mais Jake le retient.
												</p>
												<div class="dialogue">
													<div class="portrait">
														<img src="/escaperpg/images/ambria/sullivanmasonmini.png">
													</div>
													<div class="bulleperso">
														<p>
															Vous foutez quoi, là ?
														</p>
													</div>
												</div>
												<center>
													<form action="../ends/1gt32r5" method="post">
														<input type="submit" name="fini" value="Suivant.">
													</form>
												</center>
											';
											$_SESSION['mdp11'] = true;
										}
								}
						}
					elseif (isset ($_POST['mutinerie']))
						{
							echo'<div id="succespopup">';
							$nouveausucces = '<img src="/escaperpg/images/succes/ambria/mutinerie.png"><span><u><b>Mutin</b></u><br>En tant que Logan, fomenter une mutinerie contre le capitaine</span>';
							$scenario = 'ambria';
							$description = 'mutinerie';
							$cache = 'oui';
							$rarete = 'succesbronze';
							include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/succesadd.php";
							echo'</div>';
							
							echo'
								<audio src="/escaperpg/sons/ambria/recuptresor.mp3" autoplay></audio>
								<p>
									Prenant le temps de la réflexion, vous vous rappelez de la première impression que vous avait laissé le capitaine.
									De son irruption dans la bibliothèque de Louis, car vous n\'avez aucun doute sur l\'identité de la personne qui avait défoncé la porte.
									De la petite tâche de sang, sur sa chemise, lorsqu\'il vous avait retrouvé dans la taverne...
								</p>
								<div class="dialogue">
									<div class="bulleperso2">
										<p>
											<span class="mdp2">Vous avez raison</span>, on ne peut pas le laisser sortir.
										</p>
									</div>
									<div class="portrait2">
										<img src="/escaperpg/images/ambria/loganbarthelemymini.png">
									</div>
								</div>
								<p>
									Vous avez pris votre décision. Vous ne désirez plus voguer aux ordres d\'un capitaine tyrannique et meurtrier.<br>
									<br>
									Jake plaque sa main sur votre épaule.
								</p>
								<div class="dialogue">
									<div class="portrait">
										<img src="/escaperpg/images/ambria/jake.png">
									</div>
									<div class="bulleperso">
										<p>
											Bien choisi, mon p\'tit !<br /<
											<br>
											Tu vas voir, avec nous à la barre, pas question s\'tourner les pouces pendant des mois à la r\'cherche d\'un trésor.<br>
											On va vivre la grande vie. On va couler, piller, ravager !
										</p>
									</div>
								</div>
								<p>
									Pris d\'emphase, Jake lève les bras et un tonnerre d\'applaudissements lui vient en réponse.<br /<
									<br>
									De votre côté, vous êtes seulement rassuré à l\'idée d\'avoir enfermé un criminel et vous savez qu\'à la première occasion, vous fuirez du Surgisseur des Tempêtes avec votre pactole pour refaire votre vie.
								</p>
								<div class="dialogue">
									<div class="portrait">
										<img src="/escaperpg/images/ambria/sullivanmasonmini.png">
									</div>
									<div class="bulleperso">
										<p>
											Tas d\'fumiers...<br>
											<br>
											Attendez que j\'sorte de là et je jure de tous vous faire la peau !
										</p>
									</div>
								</div>
								<p>
									Le capitaine déchu vous regarde tous un à un avec une expression de dégoût et de haine. Vous ne pouvez vous empêcher de frémir malgré les solides barreaux qui vous séparent.<br>
									<br>
									Jake se rapproche de la cage.
								</p>
								<div class="dialogue">
									<div class="portrait">
										<img src="/escaperpg/images/ambria/jake.png">
									</div>
									<div class="bulleperso">
										<p>
											Hop hop hop, doucement !<br /<
											<br>
											Ça fait un p\'tit moment qu\'on prépare ce coup, vous pensez bien.
											On s\'demandait juste quand on en aurait l\'occasion.<br /<
											<br>
											Lloyd, prends ton flingue et tire s\'il tente quoi qu\'ce soit.
										</p>
									</div>
								</div>
								<p>
									Lloyd, un type malingre, sort son pistolet accroché à la ceinture et le pointe sur lui pour le tenir en respect.<br>
									<br>
									Avec les autres, vous vous dirigez prudemment vers le trésor, veillant à ce qu\'il n\'y ait pas d\'autre piège dans la salle et l\'atteignez sans que rien ne se passe.<br>
									Vous commencez à fourrer les pièces, lingots et autres pierres précieuses dans les sacs en toile que vous trimballez depuis votre arrivée sur l\'île.<br /<
									<br>
									Il vous faut plusieurs allers et retours pour transporter les sacs en-dehors de la salle.<br /<
									<br>
									Une fois remplis, vous les hissez sur vos épaules et vous éloignez, les mutins riant à gorge déployée pour se moquer de la mauvaise fortune de Sullivan, abandonné à son triste sort.
								</p>
								<center>
									<form action="mutinerie" method="post">
										<input type="submit" name="partir" value="Partir.">
									</form>
								</center>
							';
							$_SESSION['mdp15'] = true;
						}
					elseif (isset ($_POST['refuser']))
						{
							echo'
								<audio src="/escaperpg/sons/ambria/recuptresor.mp3" autoplay></audio>
								<p>
									Prenant le temps de la réflexion, vous vous rappelez de la première impression que vous avait laissé le capitaine.
									De son irruption dans la bibliothèque de Louis, car vous n\'avez aucun doute sur l\'identité de la personne qui avait défoncé la porte.
									De la petite tâche de sang, sur sa chemise, lorsqu\'il vous avait retrouvé dans la taverne...<br>
									<br>
									Pourtant, vous avez appris à le connaître et à lui faire confiance et ne pouvez vous résoudre à le trahir.<br>
									Cependant, refuser de prendre part à la mutinerie vous mettrait dans une situation délicate, vous êtes seul contre quatre. Les chances ne sont pas de votre côté.<br>
									<br>
									Vous avez alors une idée.
								</p>
								<div class="dialogue">
									<div class="bulleperso2">
										<p>
											<span class="mdp2">Je vous suis</span>.
										</p>
									</div>
									<div class="portrait2">
										<img src="/escaperpg/images/ambria/loganbarthelemymini.png">
									</div>
								</div>
								<p>
									Jake plaque sa main sur votre épaule.
								</p>
								<div class="dialogue">
									<div class="portrait">
										<img src="/escaperpg/images/ambria/jake.png">
									</div>
									<div class="bulleperso">
										<p>
											Bien choisi, mon p\'tit !<br /<
											<br>
											Tu vas voir, avec nous à la barre, pas question s\'tourner les pouces pendant des mois à la r\'cherche d\'un trésor.<br>
											On va vivre la grande vie. On va couler, piller, ravager !
										</p>
									</div>
								</div>
								<p>
									Pris d\'emphase, Jake lève les bras et un tonnerre d\'applaudissements lui vient en réponse.<br /<
									<br>
									De votre côté, vous guettez la première occasion de trouver quelque chose pour libérer Sullivan.
								</p>
								<div class="dialogue">
									<div class="portrait">
										<img src="/escaperpg/images/ambria/sullivanmasonmini.png">
									</div>
									<div class="bulleperso">
										<p>
											Tas d\'fumiers...<br>
											<br>
											Attendez que j\'sorte de là et je jure de tous vous faire la peau !
										</p>
									</div>
								</div>
								<p>
									Le capitaine déchu vous regarde tous un à un avec une expression de dégoût et de haine.<br>
									<br>
									Jake se rapproche de la cage.
								</p>
								<div class="dialogue">
									<div class="portrait">
										<img src="/escaperpg/images/ambria/jake.png">
									</div>
									<div class="bulleperso">
										<p>
											Hop hop hop, doucement !<br /<
											<br>
											Ça fait un p\'tit moment qu\'on prépare ce coup, vous pensez bien.
											On s\'demandait juste quand on en aurait l\'occasion.<br /<
											<br>
											Lloyd, prends ton flingue et tire s\'il tente quoi qu\'ce soit.
										</p>
									</div>
								</div>
								<p>
									Lloyd, un type malingre, sort son pistolet accroché à la ceinture et le pointe sur lui pour le tenir en respect.<br>
									<br>
									Avec les autres, vous vous dirigez prudemment vers le trésor, veillant à ce qu\'il n\'y ait pas d\'autre piège dans la salle et l\'atteignez sans que rien ne se passe.<br>
									Vous commencez à fourrer les pièces, lingots et autres pierres précieuses dans les sacs en toile que vous trimballez depuis votre arrivée sur l\'île.<br /<
									<br>
									Il vous faut plusieurs allers et retours pour transporter les sacs en-dehors de la salle.<br /<
									<br>
									À un moment, les mutins étant trop occupés à charger les richesses, vous tournez la tête pour adresser un discret clin d\'œil à Sullivan, qui ne manque pas de le remarquer.<br>
									Vous savez à présent qu\'il se tiendra prêt à agir, mais encore vous faut-il trouver comment ouvrir la cage.<br>
									<br>
									Vous approchez alors d\'un coin de la pièce où vous apercevez un levier sortant d\'une sorte de meuble en pierre.<br>
									<br>
									Peut-être est-ce là la solution ?
								</p>
								<center>
									<form action="pyramide" method="post">
										<input type="submit" name="leviers" value="Tenter quelque chose.">
									</form>
								</center>
							';
							$_SESSION['mdp16'] = true;
						}
					else
						{
							echo'
								<audio src="/escaperpg/sons/ambria/grottetorche.mp3" autoplay></audio>
								<p>
									Le bâtiment s\'ouvre sur un large couloir poussiéreux, d\'où s\'échappe une odeur âcre de renfermé et de moisissure.<br>
									Allumant des torches, vous avancez vers le cœur de l\'édifice en scrutant chaque ouverture pour essayer de trouver quelque chose d\'intéressant.
									Vous passez ainsi devant plusieurs salles qui devaient sans doute, à l\'époque, servir d\'administration.
									Aussi vides que le reste, elles ne présentent aucun intérêt à vos yeux et vous continuez votre progression jusqu\'à tomber sur un escalier aux dimensions vertigineuses permettant d\'accéder aux étages.
									Le rez-de-chaussée n\'ayant apparemment rien à vous offrir, vous commencez à monter les marches.
									L\'écho de vos pas se répercute tout autour de vous, mêlé au souffle du vent passant entre les portes et fenêtres, s\'ajoutant à l\'atmosphère vide et pesante.
									Tout le monde reste silencieux, comme religieusement fasciné face à la beauté de cet endroit oublié du monde.<br>
									<br>
									Après un rapide tour des différentes salles - plusieurs pièces de vie, une cuisine gigantesque, une armurerie - vous finissez par conclure que vous ne trouverez rien d\'intéressant ici non plus.
								</p>
								<center>
									<form action="pyramide" method="post">
										<input list="notesListe" name="sullivan"><input type="submit" name="suivant" value="Suivant.">
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
