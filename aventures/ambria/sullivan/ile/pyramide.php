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
	   
		<link rel="stylesheet" href="/escaperpg/aventures/ambria/css/style.css">
		<meta charset="utf-8">
		<title>La Pyramide - Le Trésor d'Ambria</title>
	</head>
	
	<body onload="chargement()">
		<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/header.php"; ?>
		<div id="banniere"><img src="/escaperpg/images/ambria/tresorambriamini.png"></div>
		<div id="bloc_page">
			<nav>
				<a href="/escaperpg/images/ambria/sullivanmasonmini.png" rel="lightbox[sullivan]" title="Sullivan Mason"><img src="/escaperpg/images/ambria/sullivanmasonmini.png"></a>
				<div id="inventairefooter"><input type="submit" onclick="inventaireshow()" value="INVENTAIRE"></div>
				<div id="motsdepasse"><input type="submit" onclick="mdpshow()" value="NOTES"></div>
				<a href="/escaperpg/aventures/ambria/save/save.php" target="_blank" rel="noreferrer"><input type="submit" name="save" value="SAUVEGARDER"></a>
			</nav>
			<div id="txt">
				<?php
					if (isset ($_POST['suivant']))
						{
							if ($_SESSION['sullivanconfiance'] <= 70)
								{
									echo'
										<audio src="/escaperpg/sons/ambria/grottetorche.mp3" autoplay></audio>
										<div class="dialogue">
											<div class="portrait">
												<img src="/escaperpg/images/ambria/pirate.png">
											</div>
											<div class="bulleperso">
												<p>
													Capitaine, on d\'vrait aller plus haut.
												</p>
											</div>
										</div>
										<p>
											L\'un des gars s\'est approché de vous pour vous faire cette suggestion à voix basse, comme s\'il avait peur de réveiller quelque spectre hantant les lieux.
										</p>
										<div class="dialogue">
											<div class="bulleperso2">
												<p>
													C\'est c\'que j\'étais en train d\'me dire aussi. <span class="mdp2">Rassemble les gars</span>, on va voir c\'qu\'y a tout en haut.
												</p>
											</div>
											<div class="portrait2">
												<img src="/escaperpg/images/ambria/sullivanmasonmini.png">
											</div>
										</div>
										<p>
											L\'homme part en trottant et, quelques minutes plus tard, l\'ensemble du groupe monte à nouveau les marches de l\'escalier, gravissant petit à petit les différents étages.<br>
											<br>
											Arrivé au sommet, vous débouchez dans une vaste salle couverte d\'un toit soutenu par des colonnes finement sculptées.
											À l\'intérieur, les vestiges de grandes tables où devaient se réunir les notables de la ville pour régner.
										</p>
										<div class="dialogue">
											<div class="portrait">
												<img src="/escaperpg/images/ambria/pirate.png">
											</div>
											<div class="bulleperso">
												<p>
													C\'est quoi ce bordel ?
												</p>
											</div>
										</div>
										<p>
											Sur des chaises, affalés sur les tables ou à même le sol, des squelettes remplissent la salle dans un décor macabre.
										</p>
										<div class="dialogue">
											<div class="portrait">
												<img src="/escaperpg/images/ambria/pirate.png">
											</div>
											<div class="bulleperso">
												<p>
													Merde, on dirait qu\'toute la ville est là ! Mais qu\'est-ce qu\'a bien pu s\'passer ici bon Dieu ?! C\'est comme si z\'étaient tous v\'nus là pour mourir.
												</p>
											</div>
										</div>
										<div class="dialogue">
											<div class="bulleperso2">
												<p>
													Là, regardez, on dirait qu\'y a un autre escalier menant au toit.
												</p>
											</div>
											<div class="portrait2">
												<img src="/escaperpg/images/ambria/sullivanmasonmini.png">
											</div>
										</div>
										<p>
											Soucieux de ne pas laisser vos hommes laisser cours aux superstitions, vous leur désignez du doigt un escalier derrière une rangée de colonnes, à l\'extérieur.
											Vous en approchant, vous arrivez sur une sorte de balcon surplombant l\'ensemble de la ville. La beauté du panorama est à couper le souffle.
										</p>
										<center>
											<form action="pyramide.php" method="post">
												<input type="submit" name="suite2" value="Suivant.">
											</form>
										</center>
									';
									$_SESSION['mdp23'] = true;
								}
							else
								{
									echo'
										<audio src="/escaperpg/sons/ambria/grottetorche.mp3" autoplay></audio>
										<div class="dialogue">
											<div class="portrait">
												<img src="/escaperpg/images/ambria/pirate.png">
											</div>
											<div class="bulleperso">
												<p>
													Capitaine, on d\'vrait aller plus haut.
												</p>
											</div>
										</div>
										<p>
											L\'un des gars s\'est approché de vous pour vous faire cette suggestion à voix basse, comme s\'il avait peur de réveiller quelque spectre hantant les lieux.
										</p>
										<div class="dialogue">
											<div class="bulleperso2">
												<p>
													C\'est c\'que j\'étais en train d\'me dire aussi. <span class="mdp2">Fais venir les gars</span>, on va voir c\'qu\'y a tout en haut.
												</p>
											</div>
											<div class="portrait2">
												<img src="/escaperpg/images/ambria/sullivanmasonmini.png">
											</div>
										</div>
										<p>
											L\'homme part en trottant et, quelques minutes plus tard, l\'ensemble du groupe monte à nouveau les marches de l\'escalier, gravissant petit à petit les différents étages.<br>
											<br>
											Arrivé au sommet, vous débouchez dans une vaste salle couverte d\'un toit soutenu par des colonnes finement sculptées.
											À l\'intérieur, les vestiges de grandes tables où devaient se réunir les notables de la ville pour régner.
										</p>
										<div class="dialogue">
											<div class="portrait">
												<img src="/escaperpg/images/ambria/pirate.png">
											</div>
											<div class="bulleperso">
												<p>
													C\'est quoi ce bordel ?
												</p>
											</div>
										</div>
										<p>
											Sur des chaises, affalés sur les tables ou à même le sol, des squelettes remplissent la salle dans un décor macabre.
										</p>
										<div class="dialogue">
											<div class="portrait">
												<img src="/escaperpg/images/ambria/pirate.png">
											</div>
											<div class="bulleperso">
												<p>
													Merde, on dirait qu\'toute la ville est là ! Mais qu\'est-ce qu\'a bien pu s\'passer ici bon Dieu ?! C\'est comme si z\'étaient tous v\'nus là pour mourir.
												</p>
											</div>
										</div>
										<div class="dialogue">
											<div class="bulleperso2">
												<p>
													Là, regardez, on dirait qu\'y a un autre escalier menant au toit.
												</p>
											</div>
											<div class="portrait2">
												<img src="/escaperpg/images/ambria/sullivanmasonmini.png">
											</div>
										</div>
										<p>
											Soucieux de ne pas laisser vos hommes laisser cours aux superstitions, vous leur désignez du doigt un escalier derrière une rangée de colonnes, à l\'extérieur.
											Vous en approchant, vous arrivez sur une sorte de balcon surplombant l\'ensemble de la ville. La beauté du panorama est à couper le souffle.
										</p>
										<center>
											<form action="pyramide.php" method="post">
												<input type="submit" name="suite2" value="Suivant.">
											</form>
										</center>
									';
									$_SESSION['mdp24'] = true;
								}
						}
					elseif (isset($_POST['suite2']))
						{
							echo'<div id="succespopup">';
							$nouveausucces = '<img src="/escaperpg/images/succes/ambria/tresor.png"><span><u><b>Au bout du chemin</b></u><br>Mettre la main sur le trésor d\'Ambria</span>';
							$scenario = 'ambria';
							$description = 'trésor';
							$cache = 'oui';
							$rarete = 'succesbronze';
							include_once $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/succesadd.php";
							echo'</div>';
							
							echo'
								<audio src="/escaperpg/sons/ambria/pyramidetop.mp3" autoplay></audio>
								<p>
									Levant les yeux, vous remarquez qu\'il reste une salle à explorer juste au-dessus.
									Vous grimpez alors les marches et vous retrouvez sur un palier, face à une double-porte en bois gravée des motifs les plus beaux et fins que vous ayez vu de toute votre vie.
									Plusieurs pierres précieuses y ont été incrustées et des entrelacs d\'or entourent les poignées.
								</p>
								<div class="dialogue">
									<div class="bulleperso2">
										<p>
											Les gars, j\'crois qu\'on a touché l\'gros lot !
										</p>
									</div>
									<div class="portrait2">
										<img src="/escaperpg/images/ambria/sullivanmasonmini.png">
									</div>
								</div>
								<p>
									Un sourire avide sur votre visage, vous poussez les portes et grognez sous l\'effort.
									Avec le temps, l\'humidité et la rouille, il est à présent difficile de les ouvrir,
									mais les autres gars vous prêtent aussitôt main forte et vous finissez par dégager un espace suffisant pour que tout le monde puisse s\'y faufiler.<br>
									À l\'intérieur, vous découvrez une grande salle au centre de laquelle se trouve une véritable montagne de trésors.
									Des pièces en or massif, des statuettes, des bijoux, des pierres précieuses… Une fortune colossale dépassant de loin toutes vos espérances vous attend.<br>
									<br>
									Un cri de joie explose soudain, poussé par les gorges de toutes les personnes présentes et brisant le silence qui régnait jusqu\'alors.
								</p>
								<center>
									<form action="pyramide.php" method="post">
										<input type="text" name="logan"><input type="submit" name="avancer" value="Avancer.">
									</form>
								</center>
							';
						}
					elseif (isset($_POST['avancer']))
						{
							switch (str_replace($search, $replace, stripslashes($_POST['logan'])))
								{
									case "quefaisonsnous": // Les deux joueurs ont moins de 70 de confiance.
										echo'
											<audio src="/escaperpg/sons/ambria/prisontombe.mp3" autoplay></audio>
											<p>
												Passant le premier, vous avancez vers le butin, suivi de près par Logan.<br>
												L\'ivresse du gain vous ayant fait momentanément oublier toute prudence, vous vous arrêtez net dans votre élan en sentant une dalle s\'enfoncer sous vos pieds.
												Un déclic se fait alors entendre et, jaillissant du plafond, des barreaux de métal se plantent autour de vous et du jeune homme.
											</p>
											<div class="dialogue">
												<div class="portrait">
													<img src="/escaperpg/images/ambria/loganbarthelemymini.png">
												</div>
												<div class="bulleperso">
													<p>
														Capitaine, que faisons-nous ?
													</p>
												</div>
											</div>
											<div class="dialogue">
												<div class="bulleperso2">
													<p>
														Merde !<br>
														<br>
														Les gars, v\'nez nous donner un coup de main !
													</p>
												</div>
												<div class="portrait2">
													<img src="/escaperpg/images/ambria/sullivanmasonmini.png">
												</div>
											</div>
											<p>
												Un type commence à s\'approcher mais Jake le retient.
											</p>
											<div class="dialogue">
												<div class="bulleperso2">
													<p>
														Vous foutez quoi, là ?
													</p>
												</div>
												<div class="portrait2">
													<img src="/escaperpg/images/ambria/sullivanmasonmini.png">
												</div>
											</div>
											<center>
												<form action="../ends/1gth24.php" method="post">
													<input type="submit" name="suivant2" value="Suivant.">
												</form>
											</center>
										';
										break;
									case "bougezpas": // Le capitaine a moins de 70 de confiance mais pas Logan
										echo'
											<audio src="/escaperpg/sons/ambria/prisontombe.mp3" autoplay></audio>
											<p>
												Passant le premier, vous avancez vers le butin.<br>
												L\'ivresse du gain vous ayant fait momentanément oublier toute prudence, vous vous arrêtez net dans votre élan en sentant une dalle s\'enfoncer sous vos pieds.
												Un déclic se fait alors entendre et, jaillissant du plafond, des barreaux de métal se plantent autour de vous.
											</p>
											<div class="dialogue">
												<div class="portrait">
													<img src="/escaperpg/images/ambria/loganbarthelemymini.png">
												</div>
												<div class="bulleperso">
													<p>
														Bougez pas capitaine, on va vous sortir de là !
													</p>
												</div>
											</div>
											<p>
												Logan empoigne les barreaux et commence à gesticuler dans l\'espoir de les faire bouger.
												Derrière lui, vous voyez les autres se regarder et échanger des coups d\'œil complices, un sourire mauvais ourlant leurs lèvres.<br /<
												<br>
												Comprenant ce qui est en train de se passer, vous tournez un regard las et résigné vers Logan.
											</p>
											<div class="dialogue">
												<div class="bulleperso2">
													<p>
														Laisse tomber, p\'tit gars. J\'ai l\'impression qu\'tes camarades ont autre chose en tête.
													</p>
												</div>
												<div class="portrait2">
													<img src="/escaperpg/images/ambria/sullivanmasonmini.png">
												</div>
											</div>
											<p>
												Le jeune homme s\'arrête et se retourne face au reste de l\'équipage.<br>
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
												Les autres acquiescent en tirant leur lame au clair et en poussant des rires gras. Jake se penche alors vers Logan.
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
												<form action="pyramide.php" method="post">
													<input type="text" name="mutinerie"><input type="submit" name="attendre" value="Attendre sa réponse.">
												</form>
											</center>
										';
										break;
									case "sortirdela": // Le capitaine a 70 ou plus de confiance mais pas Logan
										echo'
											<audio src="/escaperpg/sons/ambria/prisontombe.mp3" autoplay></audio>
											<p>
												Passant le premier, vous avancez vers le butin.<br>
												L\'ivresse du gain vous ayant fait momentanément oublier toute prudence, vous vous arrêtez net dans votre élan en sentant une dalle s\'enfoncer sous vos pieds.
												Un déclic se fait alors entendre et, jaillissant du plafond, des barreaux de métal se plantent autour de vous.
											</p>
											<div class="dialogue">
												<div class="portrait">
													<img src="/escaperpg/images/ambria/loganbarthelemymini.png">
												</div>
												<div class="bulleperso">
													<p>
														Attendez capitaine, on va vous sortir de là !
													</p>
												</div>
											</div>
											<p>
												Logan et les autres agrippent les barreaux et tentent par tous les moyens de les faire bouger, mais la cage qui vous entoure est trop lourde et solide, soldant leurs efforts par un échec.<br /<
												<br>
												Vous leur faites un signe pour leur dire d\'arrêter.
											</p>
											<div class="dialogue">
												<div class="bulleperso2">
													<p>
														Essayez d\'voir s\'il y pas quelque chose dans la salle pour ouvrir ça.
													</p>
												</div>
												<div class="portrait2">
													<img src="/escaperpg/images/ambria/sullivanmasonmini.png">
												</div>
											</div>
											<p>
												Hochant la tête, ils se séparent pour explorer la pièce, tout en prenant garde de ne déclencher aucun autre piège qui pourrait encore être actif.
											</p>
											<div class="dialogue">
												<div class="portrait">
													<img src="/escaperpg/images/ambria/loganbarthelemymini.png">
												</div>
												<div class="bulleperso">
													<p>
														Capitaine, je crois que j\'ai quelque chose.
													</p>
												</div>
											</div>
											<center>
												<form action="pyramide.php" method="post">
													<input type="submit" name="leviers" value="Suivant.">
												</form>
											</center>
										';
										break;
									case "attendezcapitaine": // Les deux joueurs ont 70 ou plus de confiance
										echo'
											<audio src="/escaperpg/sons/ambria/prisontombe.mp3" autoplay></audio>
											<p>
												Passant le premier, vous avancez vers le butin.<br>
												L\'ivresse du gain vous ayant fait momentanément oublier toute prudence, vous vous arrêtez net dans votre élan en sentant une dalle s\'enfoncer sous vos pieds.
												Un déclic se fait alors entendre et, jaillissant du plafond, des barreaux de métal se plantent autour de vous.
											</p>
											<div class="dialogue">
												<div class="portrait">
													<img src="/escaperpg/images/ambria/loganbarthelemymini.png">
												</div>
												<div class="bulleperso">
													<p>
														Attendez capitaine, on va vous sortir de là !
													</p>
												</div>
											</div>
											<p>
												Logan et les autres agrippent les barreaux et tentent par tous les moyens de les faire bouger, mais la cage qui vous entoure est trop lourde et solide, soldant leurs efforts par un échec.<br>
												<br>
												Vous leur faites un signe pour leur dire d\'arrêter.
											</p>
											<div class="dialogue">
												<div class="bulleperso2">
													<p>
														Essayez d\'voir s\'il y pas quelque chose dans la salle pour ouvrir ça.
													</p>
												</div>
												<div class="portrait2">
													<img src="/escaperpg/images/ambria/sullivanmasonmini.png">
												</div>
											</div>
											<p>
												Hochant la tête, ils se séparent pour explorer la pièce, tout en prenant garde de ne déclencher aucun autre piège qui pourrait encore être actif.
											</p>
											<div class="dialogue">
												<div class="portrait">
													<img src="/escaperpg/images/ambria/loganbarthelemymini.png">
												</div>
												<div class="bulleperso">
													<p>
														Capitaine, je crois que j\'ai quelque chose.
													</p>
												</div>
											</div>
											<center>
												<form action="pyramide.php" method="post">
													<input type="submit" name="leviers" value="Suivant.">
												</form>
											</center>
										';
										break;
									default :
										echo'
											<p>Êtes-vous sûr d\'avoir bien compris ce que Logan vous a dit ?</p>
											<center>
												<form action="pyramide.php" method="post">
													<input type="text" name="logan"><input type="submit" name="avancer" value="Avancer.">
												</form>
											</center>
										';
								}
						}
					elseif (isset($_POST['attendre']))
						{
							switch (str_replace($search, $replace, stripslashes($_POST['mutinerie'])))
								{
									case "vousavezraison": // Logan participe à la mutinerie
										echo'
											<audio src="/escaperpg/sons/ambria/recuptresor.mp3" autoplay></audio>
											<div class="dialogue">
												<div class="portrait">
													<img src="/escaperpg/images/ambria/loganbarthelemymini.png">
												</div>
												<div class="bulleperso">
													<p>
														Vous avez raison, on ne peut pas le laisser sortir.
													</p>
												</div>
											</div>
											<p>
												Ces mots claquent comme un fouet.<br>
												<br>
												Logan, que vous avez tiré de son île pourrie et de sa vie de misère, a choisi de vous tourner le dos.
												Tout comme votre équipage, qui vous suivait pourtant fidèlement depuis tant d\'années. Qu\'avez-vous fait pour en arriver là ?
											</p>
											<div class="dialogue">
												<div class="portrait">
													<img src="/escaperpg/images/ambria/jake.png">
												</div>
												<div class="bulleperso">
													<p>
														Bien choisi, mon p\'tit !<br>
														Tu vas voir, avec nous à la barre, pas question s\'tourner les pouces pendant des mois à la r\'cherche d\'un trésor.<br>
														<br>
														On va vivre la grande vie. On va couler, piller, ravager !
													</p>
												</div>
											</div>
											<p>
												Pris d\'emphase, Jake lève les bras et un tonnerre d\'applaudissements lui vient en réponse.
											</p>
											<div class="dialogue">
												<div class="bulleperso2">
													<p>
														Tas d\'fumiers… Attendez que j\'sorte de là et je jure de tous vous faire la peau.
													</p>
												</div>
												<div class="portrait2">
													<img src="/escaperpg/images/ambria/sullivanmasonmini.png">
												</div>
											</div>
											<div class="dialogue">
												<div class="portrait">
													<img src="/escaperpg/images/ambria/jake.png">
												</div>
												<div class="bulleperso">
													<p>
														Hop hop hop, doucement !<br>
														Ça fait un p\'tit moment qu\'on prépare ce coup, vous pensez bien. On s\'demandait juste quand on en aurait l\'occasion.<br>
														<br>
														Lloyd, prends ton flingue et tire s\'il tente quoi qu\'ce soit.
													</p>
												</div>
											</div>
											<p>
												Lloyd, un type malingre, sort son pistolet accroché à la ceinture et le pointe sur vous.<br>
												Les autres se dirigent prudemment vers le trésor, veillant à ce qu\'il n\'y ait pas d\'autre piège dans la salle.
												Vous espérez qu\'ils en déclenchent un et qu\'ils crèvent tous.<br>
												Malheureusement, ils arrivent au bout sans que rien ne se passe, et commencent à fourrer les pièces, lingots et autres pierres précieuses dans les sacs en toile qu\'ils trimballent depuis votre arrivée sur l\'île.
												Vous assistez, impuissant, à ce manège, les voyant faire plusieurs allers et retours pour transporter les sacs en-dehors de la salle.<br>
												<br>
												Une fois remplis, ils les jettent sur leurs épaules et s\'éloignent en riant.
												Il reste encore de nombreuses richesses, mais vous êtes toujours bloqués et, de toute façon, sans sacs et sans navire pour repartir, vous ne pourrez pas aller bien loin.
											</p>
											<center>
												<form action="pyramide.php" method="post">
													<input type="submit" name="leviers2" value="Suivant.">
												</form>
											</center>
										';
										break;
									case "jevoussuis": // Logan ne participe pas à la mutinerie
										echo'
											<audio src="/escaperpg/sons/ambria/recuptresor.mp3" autoplay></audio>
											<div class="dialogue">
												<div class="portrait">
													<img src="/escaperpg/images/ambria/loganbarthelemymini.png">
												</div>
												<div class="bulleperso">
													<p>
														Je vous suis.
													</p>
												</div>
											</div>
											<p>
												Ces mots claquent comme un fouet.<br>
												<br>
												Logan, que vous avez tiré de son île pourrie et de sa vie de misère, a choisi de vous tourner le dos.
												Tout comme votre équipage, qui vous suivait pourtant fidèlement depuis tant d\'années. Qu\'avez-vous fait pour en arriver là ?
											</p>
											<div class="dialogue">
												<div class="portrait">
													<img src="/escaperpg/images/ambria/jake.png">
												</div>
												<div class="bulleperso">
													<p>
														Bien choisi, mon p\'tit !<br>
														Tu vas voir, avec nous à la barre, pas question s\'tourner les pouces pendant des mois à la r\'cherche d\'un trésor.<br>
														<br>
														On va vivre la grande vie. On va couler, piller, ravager !
													</p>
												</div>
											</div>
											<p>
												Pris d\'emphase, Jake lève les bras et un tonnerre d\'applaudissements lui vient en réponse.
											</p>
											<div class="dialogue">
												<div class="bulleperso2">
													<p>
														Tas d\'fumiers… Attendez que j\'sorte de là et je jure de tous vous faire la peau.
													</p>
												</div>
												<div class="portrait2">
													<img src="/escaperpg/images/ambria/sullivanmasonmini.png">
												</div>
											</div>
											<div class="dialogue">
												<div class="portrait">
													<img src="/escaperpg/images/ambria/jake.png">
												</div>
												<div class="bulleperso">
													<p>
														Hop hop hop, doucement !<br>
														Ça fait un p\'tit moment qu\'on prépare ce coup, vous pensez bien. On s\'demandait juste quand on en aurait l\'occasion.<br>
														<br>
														Lloyd, prends ton flingue et tire s\'il tente quoi qu\'ce soit.
													</p>
												</div>
											</div>
											<p>
												Lloyd, un type malingre, sort son pistolet accroché à la ceinture et le pointe sur vous.<br>
												Les autres se dirigent prudemment vers le trésor, veillant à ce qu\'il n\'y ait pas d\'autre piège dans la salle.
												Vous espérez qu\'ils en déclenchent un et qu\'ils crèvent tous.<br>
												Malheureusement, ils atteignent le trésor sans que rien ne se passe, et commencent à fourrer les pièces, lingots
												et autres pierres précieuses dans les sacs en toile qu\'ils trimballent depuis votre arrivée sur l\'île.
												Vous assistez, impuissant, à ce manège, les voyant faire plusieurs allers et retours pour transporter les sacs en-dehors de la salle.<br>
												<br>
												À un moment, cependant, vous surprenez une discrète œillade de la part de Logan alors qu\'il passe devant vous.<br>
												Vous comprenez alors qu\'il est toujours de votre côté et que vous avez une chance de renverser la situation, mais il va falloir agir avec prudence.
											</p>
											<center>
												<form action="pyramide.php" method="post">
													<input type="submit" name="leviers" value="Suivant.">
												</form>
											</center>
										';
										break;
									default :
										echo'
											<p>Êtes-vous sûr d\'avoir bien compris ce que Logan a répondu ?</p>
											<center>
												<form action="pyramide.php" method="post">
													<input type="text" name="mutinerie"><input type="submit" name="attendre" value="Attendre sa réponse.">
												</form>
											</center>
										';
								}
						}
					elseif (isset($_POST['reagir']))
						{
							switch (str_replace($search, $replace, stripslashes($_POST['levers'])))
								{
									case "preparezvous":
										echo'<div id="succespopup">';
										$nouveausucces = '<img src="/escaperpg/images/succes/ambria/fidele.png"><span><u><b>Mort aux traîtres !</b></u><br>Se débarrasser des mutins</span>';
										$scenario = 'ambria';
										$description = 'fidèle';
										$cache = 'oui';
										$rarete = 'succesargent';
										include_once $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/succesadd.php";
										echo'</div>';
										
										echo'
											<audio src="/escaperpg/sons/ambria/prisonmonte.mp3" autoplay></audio>
											<p>
												La cage se soulève soudain et retourne se positionner dans le plafond, vous libérant.<br>
												Aussitôt, vous tirez votre lame au clair et embrochez Lloyd qui, surpris, n\'a pas eu le temps de réagir.
												Du coin de l\'œil, vous voyez que Logan a également planté son sabre dans le torse d\'un autre type.
												Laissant tomber ce qu\'ils avaient dans les mains, le reste des mutins sort les armes. Jake hurle :
											</p>
											<div class="dialogue">
												<div class="portrait">
													<img src="/escaperpg/images/ambria/jake.png">
												</div>
												<div class="bulleperso">
													<p>
														FAITES-LEUR LA PEAU !
													</p>
												</div>
											</div>
											<center>
												<form action="../ends/3f1249.php" method="post">
													<input type="submit" name="lasuite" value="Suivant.">
												</form>
											</center>
										';
										break;
									case "cestbon": 
										echo'
											<audio src="/escaperpg/sons/ambria/prisonmonte.mp3" autoplay></audio>
											<p>
												La cage se soulève soudain et retourne se positionner dans le plafond, vous libérant.<br>
												Vous félicitez les gars une nouvelle fois puis avancez vers le monticule de richesses.
												Posant la main dessus, vous savourez le contact froid du métal sur votre peau.
											</p>
											<div class="dialogue">
												<div class="bulleperso2">
													<p>
														Allez, emballez-moi tout ça, nous sommes riches, compagnons !
													</p>
												</div>
												<div class="portrait2">
													<img src="/escaperpg/images/ambria/sullivanmasonmini.png">
												</div>
											</div>
											<center>
												<form action="../ends/4hgc82.php" method="post">
													<input type="submit" name="lasuite" value="Suivant.">
												</form>
											</center>
										';
										break;
									case "camarche": 
										echo'
											<audio src="/escaperpg/sons/ambria/prisonmonte.mp3" autoplay></audio>
											<p>
												La cage se soulève soudain et retourne se positionner dans le plafond, vous libérant.<br>
												Vous félicitez les gars une nouvelle fois puis avancez vers le monticule de richesses.
												Posant la main dessus, vous savourez le contact froid du métal sur votre peau.
											</p>
											<div class="dialogue">
												<div class="bulleperso2">
													<p>
														Allez, emballez-moi tout ça, nous sommes riches, compagnons !
													</p>
												</div>
												<div class="portrait2">
													<img src="/escaperpg/images/ambria/sullivanmasonmini.png">
												</div>
											</div>
											<center>
												<form action="../ends/5fcdr1.php" method="post">
													<input type="submit" name="lasuite" value="Suivant.">
												</form>
											</center>
										';
										break;
									default :
										echo'
											<p>Êtes-vous sûr d\'avoir bien compris ce que Logan a dit ?</p>
											<center>
												<form action="pyramide.php" method="post">
													<input type="text" name="levers"><input type="submit" name="reagir" value="Suivant.">
												</form>
											</center>
										';
								}
						}
					elseif (isset ($_POST['leviers2']))
						{
							echo'
								<audio src="/escaperpg/sons/ambria/jungle.mp3" autoplay></audio>
								<div id="enigmelieu">
									<img src="/escaperpg/images/ambria/cagesolo.png">
									<div id="leviersolo1">
										<form action="../ends/2q315j.php" method="post">
											<button type="submit" name="1levier">
												<img src="/escaperpg/images/ambria/levier.png" onmouseover="this.src=\'/escaperpg/images/ambria/mire.png\'" onmouseout="this.src=\'/escaperpg/images/ambria/levier.png\'">
											</button>
										</form>
									</div>
									<div id="leviersolo2">
										<form action="../ends/2q315j.php" method="post">
											<button type="submit" name="2levier">
												<img src="/escaperpg/images/ambria/levier.png" onmouseover="this.src=\'/escaperpg/images/ambria/mire.png\'" onmouseout="this.src=\'/escaperpg/images/ambria/levier.png\'">
											</button>
										</form>
									</div>
									<div id="leviersolo3">
										<form action="../ends/2q315j.php" method="post">
											<button type="submit" name="3levier">
												<img src="/escaperpg/images/ambria/levier.png" onmouseover="this.src=\'/escaperpg/images/ambria/mire.png\'" onmouseout="this.src=\'/escaperpg/images/ambria/levier.png\'">
											</button>
										</form>
									</div>
								</div>
								<p>
									Cela fait maintenant plus d\'une heure que les mutins sont partis.
									Vous êtes assis à même le sol, ruminant vos sombres pensées et votre soif de vengeance.<br>
									<br>
									Au bout d\'un moment, vous décidez de vous lever et commencez à taper férocement sur les barreaux pour vous défouler.
									Bien entendu, ces derniers ne bougent pas d\'un pouce et vous ne tardez pas à vous essouffler.<br>
									Vous regardez autour de vous, à la recherche de quelque chose qui pourrait vous aider à vous défaire de ce piège.<br>
									<br>
									Vous remarquez alors un meuble en pierre d\'où sortent des leviers. Peut-être peuvent-ils vous aider à ouvrir la cage ?<br>
									Malheureusement, le meuble est hors de votre portée. Vous prenez votre pistolet et constatez qu\'il ne vous reste qu\'une seule balle, vous n\'aurez pas le droit à l\'erreur.
									Vous regardez autour de vous, espérant trouver de quoi avoir une idée du levier sur lequel tirer pour ramener les barreaux à leur place, dans le plafond.
								</p>
							';
						}
					elseif (isset ($_POST['leviers']) OR $_SESSION['leviers'])
						{
							echo'
								<audio src="/escaperpg/sons/ambria/jungle.mp3" autoplay></audio>
								<div id="enigmelieu">
									<img src="/escaperpg/images/ambria/cage.png">
								</div>
								<p>
									Vous regardez autour de vous. Logan s\'est arrêté près d\'un meuble en pierre d\'où sort un levier.<br /<
									<br>
									Comment l\'aider pour lui indiquer comment faire ?
								</p>
								<center>
									<form action="pyramide.php" method="post">
										<input type="text" name="levers"><input type="submit" name="reagir" value="Suivant.">
									</form>
								</center>
							';
							if (isset ($_POST['indice']))
								{
									echo'
										<div id="indice">
											Vous avez moyen d\'aider Logan en lui donnant les directions à prendre pour actionner son levier.
										</div>
										<center>
											<form action="pyramide.php" method="post">
												<button type="submit" name="indice2" class="boutonindice"></button>
											</form>
										</center>
									';
								}
							elseif (isset ($_POST['indice2']))
								{
									echo'
										<div id="indice">
											Vous avez moyen d\'aider Logan en lui donnant les directions à prendre pour actionner son levier.<br>
											Observez bien autour de vous, quelque chose ne vous saute-t-il pas aux yeux ?
										</div>
										<center>
											<form action="pyramide.php" method="post">
												<button type="submit" name="indice3" class="boutonindice"></button>
											</form>
										</center>
									';
								}
							elseif (isset ($_POST['indice3']))
								{
									echo'
										<div id="indice">
											Vous avez moyen d\'aider Logan en lui donnant les directions à prendre pour actionner son levier.<br>
											Observez bien autour de vous, quelque chose ne vous saute-t-il pas aux yeux ?<br>
											Regardez bien les motifs des fenêtres et essayez de rejoindre la case au milieu à droite en partant du bas tout en reconstituant les deux parties du labyrinthe.
										</div>
										<center>
											<form action="pyramide.php" method="post">
												<button type="submit" name="reponse" class="boutonreponse"></button>
											</form>
										</center>
									';
								}
							elseif (isset ($_POST['reponse']))
								{
									echo'
										<div id="reponse">
											Indiquez à Logan d\'aller une fois en haut, deux fois à gauche, deux fois en haut, une fois à droite,
											trois fois en haut, deux fois à droite, une fois en bas, deux fois à droite, deux fois en bas puis une fois à droite.
										</div>
									';
								}
							else
								{
									echo'
										<center>
											<form action="pyramide.php" method="post">
												<button type="submit" name="indice" class="boutonindice"></button>
											</form>
										</center>
									';
								}
							$_SESSION['leviers'] = true;
						}
					else
						{
							echo'
								<audio src="/escaperpg/sons/ambria/grottetorcheallume.mp3" autoplay></audio>
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
									<form action="pyramide.php" method="post">
										<input type="submit" name="suivant" value="Suivant.">
									</form>
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