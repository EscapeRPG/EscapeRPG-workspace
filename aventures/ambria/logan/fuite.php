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
		<title>La Bibliothèque - Le Trésor d'Ambria</title>
	</head>
	
	<body>
		<?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/header.php"; ?>
		<div id="banniere"><img src="/escaperpg/images/ambria/tresorambriamini.png" alt="le trésor d'ambria"></div>
		<main>
			<nav>
				<a href="/escaperpg/images/ambria/loganbarthelemymini.png" rel="lightbox[logan]" title="Logan Barthélémy"><img src="/escaperpg/images/ambria/loganbarthelemymini.png" alt="logan barthélémy"></a>
				<div id="inventairefooter"><input type="submit" value="INVENTAIRE"></div>
				<div id="motsdepasse"><input type="submit" value="NOTES"></div>
				<a href="/escaperpg/aventures/ambria/save/save.php" target="_blank" rel="noreferrer"><input type="submit" name="save" value="SAUVEGARDER"></a>
			</nav>
			<div id="txt">
				<?php
					if (isset ($_POST['a1']))
						{
							if ($_SESSION['biscuits'])
								{
									echo'
										<audio src="/escaperpg/sons/ambria/mouette.mp3" autoplay></audio>
										<p>
											En arrivant au bout de la ruelle, vous remarquez un oiseau juché sur le haut d\'un muret. Vous constatez qu\'il s\'agit d\'une mouette et qu\'elle détient le chapeau de l\'homme en colère dans son bec.<br>
											<br>
											Vous attrapez les restes de biscuits que vous avez récupérés et les agitez devant elle.<br>
											Le volatile ne tarde pas à repérer votre manège et saute de son perchoir pour venir picorer les miettes, lâchant au passage son butin que vous vous empressez de récupérer.<br>
											<br>
											Vous pouvez maintenant le ramener à son propriétaire.
										</p>
										<center>
											<form action="fuite" method="post">
												<input type="submit" name="a1" value="ALLER AU NORD." class="noway"><br>
												<input type="submit" name="a1" value="ALLER À L\'OUEST." class="noway"><input type="submit" name="a1" value="ALLER À L\'EST." class="noway"><br>
												<input type="submit" name="a2" value="Aller au Sud.">
											</form>
										</center>
									';
									$_SESSION['chapeautypecolere'] = true;
									$_SESSION['biscuits'] = false;
								}
							else
								{
									echo'
										<audio src="/escaperpg/sons/ambria/mouette.mp3" autoplay></audio>
										<p>
											En arrivant au bout de la ruelle, vous remarquez un oiseau juché sur le haut d\'un muret.<br>
											Vous constatez qu\'il s\'agit d\'une mouette et qu\'elle détient un chapeau dans son bec.
											Vous trouvez cela un peu curieux, mais le volatile est de toute manière hors de votre portée et le chemin finit en cul-de-sac, vous décidez donc de rebrousser chemin.
										</p>
										<center>
											<form action="fuite" method="post">
												<input type="submit" name="a1" value="ALLER AU NORD." class="noway"><br>
												<input type="submit" name="a1" value="ALLER À L\'OUEST." class="noway"><input type="submit" name="a1" value="ALLER À L\'EST." class="noway"><br>
												<input type="submit" name="a2" value="Aller au Sud.">
											</form>
										</center>
									';
									$_SESSION['mouette'] = true;
								}
						}
					elseif (isset ($_POST['a2']))
						{
							if ($_SESSION['chapeautypecolere'])
								{
									echo'
										<script src="/escaperpg/scripts/inventaireadd.js"></script>
										<p>
											La ruelle traverse du Nord au Sud en longeant des bâtiments à l\'Est et un mur d\'enceinte à l\'Ouest.
										</p>
										<center>
											<form action="fuite" method="post">
												<input type="submit" name="a1" value="Aller au Nord."><br>
												<input type="submit" name="a2" value="ALLER À L\'OUEST." class="noway"><input type="submit" name="a2" value="ALLER À L\'EST." class="noway"><br>
												<input type="submit" name="a3" value="Aller au Sud.">
											</form>
										</center>
									';
								}
							else
								{
									echo'
										<p>
											La ruelle traverse du Nord au Sud en longeant des bâtiments à l\'Est et un mur d\'enceinte à l\'Ouest.
										</p>
										<center>
											<form action="fuite" method="post">
												<input type="submit" name="a1" value="Aller au Nord."><br>
												<input type="submit" name="a2" value="ALLER À L\'OUEST." class="noway"><input type="submit" name="a2" value="ALLER À L\'EST." class="noway"><br>
												<input type="submit" name="a3" value="Aller au Sud.">
											</form>
										</center>
									';
								}
						}
					elseif (isset ($_POST['a3']))
						{
							echo'
								<p>
									La ruelle tourne pour relier le Nord à l\'Est. Vous ne trouvez rien d\'intéressant par ici.
								</p>
								<center>
									<form action="fuite" method="post">
										<input type="submit" name="a2" value="Aller au Nord."><br>
										<input type="submit" name="a3" value="ALLER À L\'OUEST." class="noway"><input type="submit" name="b3" value="Aller à l\'Est."><br>
										<input type="submit" name="a3" value="ALLER AU SUD." class="noway">
									</form>
								</center>
							';
						}
					elseif (isset ($_POST['a5']))
						{
							echo'
								<p>
									La ruelle se termine en cul-de-sac, dans une cour arrière d\'une grande maison. Manifestement, il n\'y a rien d\'intéressant par ici.
								</p>
								<center>
									<form action="fuite" method="post">
										<input type="submit" name="a5" value="ALLER AU NORD." class="noway"><br>
										<input type="submit" name="a5" value="ALLER À L\'OUEST." class="noway"><input type="submit" name="a5" value="ALLER À L\'EST." class="noway"><br>
										<input type="submit" name="a6" value="Aller au Sud.">
									</form>
								</center>
							';
						}
					elseif (isset ($_POST['a6']))
						{
							echo'
								<p>
									La ruelle donne sur un mur de pierre trop haut pour être escaladé à l\'Ouest.<br>
									Elle tourne vers le Nord et redonne sur la bibliothèque un peu plus loin à l\'Est.
								</p>
								<center>
									<form action="fuite" method="post">
										<input type="submit" name="a5" value="Aller au Nord."><br>
										<input type="submit" name="a6" value="ALLER À L\'OUEST." class="noway"><input type="submit" name="b6" value="Aller à l\'Est."><br>
										<input type="submit" name="a6" value="ALLER AU SUD." class="noway">
									</form>
								</center>
							';
						}
					elseif (isset ($_POST['b3']))
						{
							echo'
								<p>
									La ruelle se prolonge d\'Ouest en Est en longeant les bâtiments.
								</p>
								<center>
									<form action="fuite" method="post">
										<input type="submit" name="b3" value="Aller au Nord." class="noway"><br>
										<input type="submit" name="a3" value="Aller à l\'Ouest."><input type="submit" name="c3" value="Aller à l\'Est."><br>
										<input type="submit" name="b3" value="ALLER AU SUD." class="noway">
									</form>
								</center>
							';
						}
					elseif (isset ($_POST['b6']))
						{
							echo'
								<p>
									La ruelle se prolonge d\'Est en Ouest, longeant la bibliothèque au Sud, où vous ne souhaitez absolument pas retourner.<br>
									Au Nord, la façade nue d\'une demeure vous empêche de passer.
								</p>
								<center>
									<form action="fuite" method="post">
										<input type="submit" name="b6" value="Aller au Nord." class="noway"><br>
										<input type="submit" name="a6" value="Aller à l\'Ouest."><input type="submit" name="c6" value="Aller à l\'Est."><br>
										<input type="submit" name="b6" value="ALLER AU SUD." class="noway">
									</form>
								</center>
							';
						}
					elseif (isset ($_POST['c1']))
						{
							if ($_SESSION['cledocks'])
								{
									echo'<div id="succespopup">';
									$nouveausucces = '<img src="/escaperpg/images/succes/ambria/fuir.png"><span><u><b>Échappée belle</b></u><br>Fuir et semer ses poursuivants dans les ruelles</span>';
									$scenario = 'ambria';
									$description = 'fuir';
									$cache = 'non';
									$rarete = 'succesnormal';
									include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/succesadd.php";
									echo'</div>';
									
									echo'
										<audio src="/escaperpg/sons/ambria/ouvertureporte.mp3" autoplay></audio>
										<p>
											Vous arrivez enfin à la porte menant aux quais.
											Vous sortez la clé de votre poche, tremblant légèrement à cause du stress, espérant ne pas avoir perdu trop de temps à courir dans les ruelles.
											Vous passez la clé dans la serrure et ouvrez.
										</p>
										<div class="dialogue">
											<div class="bulleperso2">
												<p>
													M-Merci.
												</p>
											</div>
											<div class="portrait2">
												<img src="/escaperpg/images/ambria/loganbarthelemymini.png" alt="logan barthélémy">
											</div>
										</div>
										<p>
											Bredouillez-vous rapidement à l\'intention du type avant de lui rendre sa clé et de franchir la porte vers la liberté.
										</p>
										<center>
											<form action="taverne" method="post">
												<input type="submit" name="sortir" value="Sortir d\'ici.">
											</form>
										</center>
									';
									$_SESSION['cledocks'] = false;
								}
							else
								{
									echo'
										<p>
											Vous arrivez devant une haute muraille de pierre qui vous barre la route vers les quais.
											Une porte en bois est le seul obstacle qui vous sépare de la liberté.<br>
											Vous vous en approchez et actionnez la poignée.<br>
											<br>
											Rien. Elle est verrouillée.
										</p>
										<div class="dialogue">
											<div class="bulleperso2">
												<p>
													Mince !
												</p>
											</div>
											<div class="portrait2">
												<img src="/escaperpg/images/ambria/loganbarthelemymini.png" alt="logan barthélémy">
											</div>
										</div>
										<p>
											Vous regardez autour de vous, dans l\'espoir de trouver quelque chose vous permettant de franchir la palissade, mais vous vous rendez vite à l\'évidence : il va vous falloir trouver une autre solution.<br>
											<br>
											Quelqu\'un par ici possède peut-être une clé ?
										</p>
										<center>
											<form action="fuite" method="post">
												<input type="submit" name="c1" value="Aller au Nord." class="noway"><br>
												<input type="submit" name="c1" value="ALLER À L\'OUEST." class="noway"><input type="submit" name="d1" value="Aller à l\'Est."><br>
												<input type="submit" name="" value="ALLER AU SUD." class="noway">
											</form>
										</center>
									';
								}
						}
					elseif (isset ($_POST['c3']))
						{
							echo'
								<p>
									Vous arrivez dans un embranchement en patte d\'oie. Vous pouvez vous diriger à l\'Est, au Sud ou à l\'Ouest.
								</p>
								<center>
									<form action="fuite" method="post">
										<input type="submit" name="c3" value="Aller au Nord." class="noway"><br>
										<input type="submit" name="b3" value="Aller à l\'Ouest."><input type="submit" name="d3" value="Aller à l\'Est."><br>
										<input type="submit" name="c4" value="Aller au Sud.">
									</form>
								</center>
							';
						}
					elseif (isset ($_POST['c4']))
						{
							echo'
								<p>
									La ruelle longe une haute tour au milieu d\'une sorte de petite place. Vous pouvez seulement aller au Nord ou au Sud.
								</p>
								<center>
									<form action="fuite" method="post">
										<input type="submit" name="c3" value="Aller au Nord."><br>
										<input type="submit" name="c4" value="ALLER À L\'OUEST." class="noway"><input type="submit" name="c4" value="ALLER À L\'EST." class="noway"><br>
										<input type="submit" name="c5" value="Aller au Sud.">
									</form>
								</center>
							';
						}
					elseif (isset ($_POST['c5']))
						{
							echo'
								<p>
									La ruelle ne permet d\'aller qu\'au Nord ou au Sud, une palissade en bois de trois mètres de haut vous barrant la route à l\'Ouest
								</p>
								<center>
									<form action="fuite" method="post">
										<input type="submit" name="c4" value="Aller au Nord."><br>
										<input type="submit" name="c5" value="ALLER À L\'OUEST." class="noway"><input type="submit" name="c5" value="ALLER À L\'EST." class="noway"><br>
										<input type="submit" name="c6" value="Aller au Sud.">
									</form>
								</center>
							';
						}
					elseif (isset ($_POST['c6']))
						{
							echo'
								<audio src="/escaperpg/sons/ambria/incendie.mp3" autoplay></audio>
								<p>
									En revenant sur vos pas, vous reconnaissez la porte menant à l\'arrière-cour de la bibliothèque.<br>
									Derrière les vitres du bâtiment, vous voyez une vive lumière et comprenez que l\'intrus y a mis le feu.<br>
									<br>
									Vous n\'avez clairement pas beaucoup de temps devant vous et la personne qui en a après le parchemin semble prête à tout pour mettre la main dessus.
								</p>
								<center>
									<form action="fuite" method="post">
										<input type="submit" name="c5" value="Aller au Nord."><br>
										<input type="submit" name="b6" value="Aller à l\'Ouest."><input type="submit" name="c6" value="ALLER À L\'EST." class="noway"><br>
										<input type="submit" name="c6" value="ALLER AU SUD." class="noway">
									</form>
								</center>
							';
						}
					elseif (isset ($_POST['d1']))
						{
							echo'
								<p>
									La ruelle s\'arrête abruptement au Nord à cause d\'une haute muraille de pierre trop haute pour être escaladée.<br>
									Vous voyez qu\'elle continue cependant à l\'Ouest où vous apercevez une porte en bois. Vous pouvez également retourner au Sud.
								</p>
								<center>
									<form action="fuite" method="post">
										<input type="submit" name="d1" value="Aller au Nord." class="noway"><br>
										<input type="submit" name="c1" value="Aller à l\'Ouest."><input type="submit" name="d1" value="ALLER À L\'EST." class="noway"><br>
										<input type="submit" name="d2" value="Aller au Sud.">
									</form>
								</center>
							';
						}
					elseif (isset ($_POST['d2']))
						{
							echo'
								<p>
									La ruelle continue un peu plus au Nord, où vous apercevez la silhouette d\'une haute muraille. Sur les côtés, des maisons vous empêchent de passer.<br>
									Le chemin du Sud ramène sur la petite place avec la tour.
								</p>
								<center>
									<form action="fuite" method="post">
										<input type="submit" name="d1" value="Aller au Nord."><br>
										<input type="submit" name="d2" value="ALLER À L\'OUEST." class="noway"><input type="submit" name="d2" value="ALLER À L\'EST." class="noway"><br>
										<input type="submit" name="d3" value="Aller au Sud.">
									</form>
								</center>
							';
						}
					elseif (isset ($_POST['d3']))
						{
							echo'
								<p>
									Vous continuez sur la petite place, la tour se trouvant maintenant vers le Sud. Vous pouvez prendre n\'importe laquelle des trois autres directions.
								</p>
								<center>
									<form action="fuite" method="post">
										<input type="submit" name="d2" value="Aller au Nord."><br>
										<input type="submit" name="c3" value="Aller à l\'Ouest."><input type="submit" name="e3" value="Aller à l\'Est."><br>
										<input type="submit" name="d3" value="ALLER AU SUD." class="noway">
									</form>
								</center>
							';
						}
					elseif (isset ($_POST['d5']))
						{
							if ($_SESSION['cletypecolere'])
								{
									echo'
										<p>
											Vous revenez dans le petit cul-de-sac sentant l\'urine où vous avez trouvé la clé de l\'arrière-cour de la taverne. Il n\'y a rien de plus à y trouver.
										</p>
										<center>
											<form action="fuite" method="post">
												<input type="submit" name="d5" value="Aller au Nord." class="noway"><br>
												<input type="submit" name="d5" value="ALLER À L\'OUEST." class="noway"><input type="submit" name="e5" value="Aller à l\'Est."><br>
												<input type="submit" name="d5" value="ALLER AU SUD." class="noway">
											</form>
										</center>
									';
								}
							else
								{
									echo'
										<audio src="/escaperpg/sons/ambria/fouille.mp3" autoplay></audio>
										<p>
											Vous approchez du tronçon de ruelle bloqué à l\'Ouest par la palissade en bois.<br>
											À ses pieds, des caisses et des tonneaux sont entassés au milieu de détritus variés.
											L\'odeur d\'urine se fait plus forte mais vous jetez un coup d\'œil et repérez une petite clé tombée au sol, à moitié recouverte d\'une sorte de tissu brunâtre.<br>
											<br>
											Vous l\'empochez.
										</p>
										<center>
											<form action="fuite" method="post">
												<input type="submit" name="d5" value="Aller au Nord." class="noway"><br>
												<input type="submit" name="d5" value="ALLER À L\'OUEST." class="noway"><input type="submit" name="e5" value="Aller à l\'Est."><br>
												<input type="submit" name="d5" value="ALLER AU SUD." class="noway">
											</form>
										</center>
									';
									$_SESSION['cletypecolere'] = true;
								}
						}
					elseif (isset ($_POST['e3']))
						{
							echo'
								<p>
									La ruelle se sépare en trois directions en contournant la tour au Sud.<br>
									Vous pouvez aussi choisir d\'aller à l\'Est ou à l\'Ouest.
								</p>
								<center>
									<form action="fuite" method="post">
										<input type="submit" name="e3" value="Aller au Nord." class="noway"><br>
										<input type="submit" name="d3" value="Aller à l\'Ouest."><input type="submit" name="f3" value="Aller à l\'Est."><br>
										<input type="submit" name="e4" value="Aller au Sud.">
									</form>
								</center>
							';
						}
					elseif (isset ($_POST['e4']))
						{
							echo'
								<p>
									La ruelle continue du Nord au Sud.
								</p>
								<center>
									<form action="fuite" method="post">
										<input type="submit" name="e3" value="Aller au Nord."><br>
										<input type="submit" name="e4" value="ALLER À L\'OUEST." class="noway"><input type="submit" name="e4" value="ALLER À L\'EST." class="noway"><br>
										<input type="submit" name="e5" value="Aller au Sud.">
									</form>
								</center>
							';
						}
					elseif (isset ($_POST['e5']))
						{
							if ($_SESSION['cledocks'])
								{
									echo'
										<p>
											Vous arrivez à une sorte de petit carrefour où vous pouvez aller dans la direction de votre choix.<br>
											À l\'Ouest, la dérangeante odeur d\'urine provenant d\'un recoin.<br>
											Vous arrivez de l\'Est.<br>
											Vous êtes aussi libre d\'aller au Nord ou au Sud.
										</p>
										<center>
											<form action="fuite" method="post">
												<input type="submit" name="e4" value="Aller au Nord."><br>
												<input type="submit" name="d5" value="Aller à l\'Ouest."><input type="submit" name="f5" value="Aller à l\'Est."><br>
												<input type="submit" name="e6" value="Aller au Sud.">
											</form>
										</center>
									';
								}
							elseif ($_SESSION['chapeautypecolere'])
								{
									echo'
										<p>
											Vous arrivez à une sorte de petit carrefour où vous pouvez aller dans la direction de votre choix.<br>
											À l\'Ouest, la dérangeante odeur d\'urine provenant d\'un recoin.<br>
											De l\'autre côté, à l\'Est, se trouve le type en colère à qui vous devez ramener son chapeau.<br>
											Vous êtes aussi libre d\'aller au Nord ou au Sud.
										</p>
										<center>
											<form action="fuite" method="post">
												<input type="submit" name="e4" value="Aller au Nord."><br>
												<input type="submit" name="d5" value="Aller à l\'Ouest."><input type="submit" name="f5" value="Aller à l\'Est."><br>
												<input type="submit" name="e6" value="Aller au Sud.">
											</form>
										</center>
									';
								}
							elseif ($_SESSION['cledocks'])
								{
									echo'
										<p>
											Vous arrivez à une sorte de petit carrefour où vous pouvez aller dans la direction de votre choix.<br>
											À l\'Ouest, la dérangeante odeur d\'urine provenant d\'un recoin.<br>
											Vous arrivez de l\'Est.<br>
											Vous êtes aussi libre d\'aller au Nord ou au Sud.
										</p>
										<center>
											<form action="fuite" method="post">
												<input type="submit" name="e4" value="Aller au Nord."><br>
												<input type="submit" name="d5" value="Aller à l\'Ouest."><input type="submit" name="f5" value="Aller à l\'Est."><br>
												<input type="submit" name="e6" value="Aller au Sud.">
											</form>
										</center>
									';
								}
							elseif ($_SESSION['cledejapasse'])
								{
									echo'
										<p>
											Vous arrivez à une sorte de petit carrefour où vous pouvez aller dans la direction de votre choix.<br>
											À l\'Ouest, cependant, une dérangeante odeur d\'urine semble provenir d\'un recoin.<br>
											De l\'autre côté, à l\'Est, vous avez l\'impression d\'entendre la voix d\'un homme ainsi que des bruits de fouille.<br>
											Vous êtes aussi libre d\'aller au Nord ou au Sud.
										</p>
										<center>
											<form action="fuite" method="post">
												<input type="submit" name="e4" value="Aller au Nord."><br>
												<input type="submit" name="d5" value="Aller à l\'Ouest."><input type="submit" name="f5" value="Aller à l\'Est."><br>
												<input type="submit" name="e6" value="Aller au Sud.">
											</form>
										</center>
									';
								}
							elseif ($_SESSION['cletypecolere'])
								{
									echo'
										<script src="/escaperpg/scripts/inventaireadd.js"></script>
										<p>
											Vous glissez la petite clé dans votre poche. Que peut-elle ouvrir ?<br>
											<br>
											Vous arrivez à une sorte de petit carrefour où vous pouvez aller dans la direction de votre choix.<br>
											À l\'Ouest, cependant, une dérangeante odeur d\'urine semble provenir d\'un recoin.<br>
											De l\'autre côté, à l\'Est, vous avez l\'impression d\'entendre la voix d\'un homme ainsi que des bruits de fouille.<br>
											Vous êtes aussi libre d\'aller au Nord ou au Sud.
										</p>
										<center>
											<form action="fuite" method="post">
												<input type="submit" name="e4" value="Aller au Nord."><br>
												<input type="submit" name="d5" value="Aller à l\'Ouest."><input type="submit" name="f5" value="Aller à l\'Est."><br>
												<input type="submit" name="e6" value="Aller au Sud.">
											</form>
										</center>
									';
									$_SESSION['cledejapasse'] = true;
								}
							else
								{
									echo'
										<p>
											Vous arrivez à une sorte de petit carrefour où vous pouvez aller dans la direction de votre choix.<br>
											À l\'Ouest, cependant, une dérangeante odeur d\'urine semble provenir d\'un recoin.<br>
											De l\'autre côté, à l\'Est, vous avez l\'impression d\'entendre la voix d\'un homme ainsi que des bruits de fouille.<br>
											Vous êtes aussi libre d\'aller au Nord ou au Sud.
										</p>
										<center>
											<form action="fuite" method="post">
												<input type="submit" name="e4" value="Aller au Nord."><br>
												<input type="submit" name="d5" value="Aller à l\'Ouest."><input type="submit" name="f5" value="Aller à l\'Est."><br>
												<input type="submit" name="e6" value="Aller au Sud.">
											</form>
										</center>
									';
								}
						}
					elseif (isset ($_POST['e6']))
						{
							echo'
								<p>
									En empruntant cette section, vous vous pouvez continuer au Nord ou au Sud.
								</p>
								<center>
									<form action="fuite" method="post">
										<input type="submit" name="e5" value="Aller au Nord."><br>
										<input type="submit" name="e6" value="ALLER À L\'OUEST." class="noway"><input type="submit" name="e6" value="ALLER À L\'EST." class="noway"><br>
										<input type="submit" name="e7" value="Aller au Sud.">
									</form>
								</center>
							';
						}
					elseif (isset ($_POST['e7']))
						{
							echo'
								<p>
									La route vers le Sud est bloquée par une haute palissade de bois. Vous ne trouvez rien pour l\'escalader et doutez qu\'il soit une bonne idée de retourner vers le Sud, d\'où venait l\'intrus de la bibliothèque.<br>
									Vous pouvez retourner au Nord ou continuer à l\'Est.
								</p>
								<center>
									<form action="fuite" method="post">
										<input type="submit" name="e6" value="Aller au Nord."><br>
										<input type="submit" name="e7" value="ALLER À L\'OUEST." class="noway"><input type="submit" name="f7" value="Aller à l\'Est."><br>
										<input type="submit" name="e7" value="ALLER AU SUD." class="noway">
									</form>
								</center>
							';
						}
					elseif (isset ($_POST['f2']))
						{
							if ($_SESSION['biscuits'])
								{
									echo'
										<script src="/escaperpg/scripts/inventaireadd.js"></script>
										<p>
											Vous fourrez les biscuits dans votre poche et reprenez votre route.
										</p>
										<center>
											<form action="fuite" method="post">
												<input type="submit" name="f2" value="Aller au Nord." class="noway"><br>
												<input type="submit" name="f2" value="ALLER À L\'OUEST." class="noway"><input type="submit" name="g2" value="Aller à l\'Est."><br>
												<input type="submit" name="f3" value="Aller au Sud.">
											</form>
										</center>
									';
								}
							else
								{
									echo'
										<p>
											Vous entrez dans la petite cour arrière de la taverne.<br>
											Apercevant une porte face à vous, menant vers l\'intérieur du bâtiment, vous vous empressez de vous jeter dessus pour tenter de l\'ouvrir, mais elle se révèle verrouillée.
											Vous essayez de tambouriner à la porte en espérant vous faire entendre mais les éclats de voix et la musique qui résonnent à l\'intérieur empêche quiconque de vous entendre et vous abandonnez.<br>
											<br>
											À l\'Est, vous apercevez un tas de détritus posés au sol : les restes de cuisine.
										</p>
										<center>
											<form action="fuite" method="post">
												<input type="submit" name="f2" value="Aller au Nord." class="noway"><br>
												<input type="submit" name="f2" value="ALLER À L\'OUEST." class="noway"><input type="submit" name="g2" value="Aller à l\'Est."><br>
												<input type="submit" name="f3" value="Aller au Sud.">
											</form>
										</center>
									';
								}
						}
					elseif (isset ($_POST['f3']))
						{
							if ($_SESSION['cletypecolere'])
								{
									echo'
										<audio src="/escaperpg/sons/ambria/ouvertureporte.mp3" autoplay></audio>
										<p>
											Vous vous retrouvez devant la porte au Nord menant sur l\'arrière-cour de la taverne.<br>
											Sortant la clé que vous avez trouvée dans la ruelle, vous l\'essayez dans la serrure et parvenez à ouvrir.<br>
											<br>
											Vous pouvez maintenant vous rendre au Nord, dans la cour.
										</p>
										<center>
											<form action="fuite" method="post">
												<input type="submit" name="f2" value="Aller au Nord."><br>
												<input type="submit" name="e3" value="Aller à l\'Ouest."><input type="submit" name="f3" value="ALLER À L\'EST." class="noway"><br>
												<input type="submit" name="f3" value="ALLER AU SUD." class="noway">
											</form>
										</center>
									';
								}
							else
								{
									echo'
										<p>
											La ruelle s\'arrête ici, ne pouvant aller plus loin à l\'Est.<br>
											En revanche, vous constatez une porte au Nord qui semble verrouillée. Vous fiant à votre sens de l\'orientation, vous estimez que cette porte donne sur la taverne, ou du moins son arrière-cour.<br>
											<br>
											Vous pourriez peut-être passer par là pour trouver un équipage avec qui embarquer ? Il vous faudra cependant d\'abord trouver la clé qui ouvre cette porte.
										</p>
										<center>
											<form action="fuite" method="post">
												<input type="submit" name="f3" value="Aller au Nord." class="noway"><br>
												<input type="submit" name="e3" value="Aller à l\'Ouest."><input type="submit" name="f3" value="ALLER À L\'EST." class="noway"><br>
												<input type="submit" name="f3" value="ALLER AU SUD." class="noway">
											</form>
										</center>
									';
								}
						}
					elseif (isset ($_POST['f5']))
						{
							echo'
								<p>
									Vous avancez dans la ruelle menant à la voix que vous avez perçue.
									Elle continue à l\'Est, où vous apercevez effectivement la silhouette de quelqu\'un, accroupi et semblant fouiller au sol parmi des caisses.
								</p>
								<center>
									<form action="fuite" method="post">
										<input type="submit" name="f5" value="Aller au Nord." class="noway"><br>
										<input type="submit" name="e5" value="Aller à l\'Ouest."><input type="submit" name="g5" value="Aller à l\'Est."><br>
										<input type="submit" name="f5" value="ALLER AU SUD." class="noway">
									</form>
								</center>
							';
						}
					elseif (isset ($_POST['f7']))
						{
							echo'
								<p>
									Vous tentez votre chance en allant au bout du cul-de-sac mais devez vite vous rendre à l\'évidence : il n\'y a rien d\'intéressant par ici.<br /<
									Il ne vous reste plus qu\'à revenir sur vos pas.
								</p>
								<center>
									<form action="fuite" method="post">
										<input type="submit" name="f7" value="Aller au Nord." class="noway"><br>
										<input type="submit" name="e7" value="Aller à l\'Ouest."><input type="submit" name="f7" value="ALLER À L\'EST." class="noway"><br>
										<input type="submit" name="f7" value="ALLER AU SUD." class="noway">
									</form>
								</center>
							';
						}
					elseif (isset ($_POST['g2']))
						{
							if ($_SESSION['biscuits'])
								{
									echo'
										<p>
											Vous n\'avez plus rien à faire ici.
										</p>
										<center>
											<form action="fuite" method="post">
												<input type="submit" name="g2" value="Aller au Nord." class="noway"><br>
												<input type="submit" name="f2" value="Aller à l\'Ouest."><input type="submit" name="g2" value="ALLER À L\'EST." class="noway"><br>
												<input type="submit" name="g2" value="ALLER AU SUD." class="noway">
											</form>
										</center>
									';
									$_SESSION['biscuits'] = true;
								}
							elseif ($_SESSION['typecolere'] OR $_SESSION['mouette'])
								{
									echo'
										<audio src="/escaperpg/sons/ambria/fouille.mp3" autoplay></audio>
										<p>
											Ayant une idée en tête, vous entreprenez de fouiller les détritus malgré votre dégoût et en ressortez au bout de quelques secondes avec des petits morceaux de biscuits secs.
										</p>
										<center>
											<form action="fuite" method="post">
												<input type="submit" name="g2" value="Aller au Nord." class="noway"><br>
												<input type="submit" name="f2" value="Aller à l\'Ouest."><input type="submit" name="g2" value="ALLER À L\'EST." class="noway"><br>
												<input type="submit" name="g2" value="ALLER AU SUD." class="noway">
											</form>
										</center>
									';
									$_SESSION['biscuits'] = true;
								}
							else
								{
									echo'
										<p>
											Vous observez rapidement les détritus. Des restes de nourriture variés, pour la plupart gâtés. Vous vous retournez avec une grimace de dégoût et repartez.
										</p>
										<center>
											<form action="fuite" method="post">
												<input type="submit" name="g2" value="Aller au Nord." class="noway"><br>
												<input type="submit" name="f2" value="Aller à l\'Ouest."><input type="submit" name="g2" value="ALLER À L\'EST." class="noway"><br>
												<input type="submit" name="g2" value="ALLER AU SUD." class="noway">
											</form>
										</center>
									';
								}
						}
					elseif (isset ($_POST['g5']))
						{
							if ($_SESSION['cledocks'])
								{
									echo'
										<p>
											Vous retournez sur vos pas.<br>
											Le type à qui vous avez rendu son chapeau vous interpelle depuis l\'entrée de la ruelle.
										</p>
										<div class="dialogue">
											<div class="portrait">
												<img src="/escaperpg/images/ambria/vieuxtype.png">
											</div>
											<div class="bulleperso">
												<p>
													Hé, gamin ! Alors, tu viens ou quoi ?
												</p>
											</div>
										</div>
										<p>
											Il ne semble rien y avoir de plus par ici.
										</p>
										<center>
											<form action="fuite" method="post">
												<input type="submit" name="g5" value="Aller au Nord." class="noway"><br>
												<input type="submit" name="f5" value="Aller à l\'Ouest."><input type="submit" name="g5" value="ALLER À L\'EST." class="noway"><br>
												<input type="submit" name="g5" value="ALLER AU SUD." class="noway">
											</form>
										</center>
									';
								}
							elseif ($_SESSION['chapeautypecolere'])
								{
									echo'
										<p>
											Vous revenez dans la ruelle où vous aviez croisé le type un peu plus tôt, son chapeau à la main.<br>
											Vous voyant arriver, il ouvre grand les yeux.
										</p>
										<div class="dialogue">
											<div class="portrait">
												<img src="/escaperpg/images/ambria/vieuxtype.png">
											</div>
											<div class="bulleperso">
												<p>
													Mazette, mais c\'est mon chapeau ! Comment qu\'t\'as fait ça mon gars ?
												</p>
											</div>
										</div>
										<p>
											Vous lui tendez son bien et vous contentez d\'un léger sourire en guise de réponse.
										</p>
										<div class="dialogue">
											<div class="portrait">
												<img src="/escaperpg/images/ambria/vieuxtype.png">
											</div>
											<div class="bulleperso">
												<p>
													Merci bien en tout cas ! Bon, viens avec moi, j\'vais t\'ouvrir la porte des quais comme promis.
												</p>
											</div>
										</div>
										<center>
											<form action="fuite" method="post">
												<input type="submit" name="g5" value="Aller au Nord." class="noway"><br>
												<input type="submit" name="f5" value="Aller à l\'Ouest."><input type="submit" name="g5" value="ALLER À L\'EST." class="noway"><br>
												<input type="submit" name="g5" value="ALLER AU SUD." class="noway">
											</form>
										</center>
									';
									$_SESSION['cletypecolere'] = false;
									$_SESSION['chapeautypecolere'] = false;
									$_SESSION['cledocks'] = true;
								}
							elseif ($_SESSION['cletypecolere'])
								{
									echo'
										<p>
											Vous revenez vers le type avec sa clé.
										</p>
										<div class="dialogue">
											<div class="portrait">
												<img src="/escaperpg/images/ambria/vieuxtype.png">
											</div>
											<div class="bulleperso">
												<p>
													Ah, c\'est donc là-bas qu\'elle était ?! Foutrebleu !<br>
													<br>
													Et mon chapeau, t\'as réussi à l\'récupérer ? J\'peux quand même pas me r\'pointer à la taverne sans, j\'aurais l\'air d\'un con !
												</p>
											</div>
										</div>
										<p>
											Résigné, vous comprenez qu\'il va vous falloir continuer la chasse si vous espérez vous sortir d\'ici.
										</p>
										<center>
											<form action="fuite" method="post">
												<input type="submit" name="g5" value="Aller au Nord." class="noway"><br>
												<input type="submit" name="f5" value="Aller à l\'Ouest."><input type="submit" name="g5" value="ALLER À L\'EST." class="noway"><br>
												<input type="submit" name="g5" value="ALLER AU SUD." class="noway">
											</form>
										</center>
									';
								}
							else
								{
									echo'
										<p>
											Vous arrivez au bout de la ruelle et surprenez l\'homme qui ne vous avait pas entendu arriver, manifestement trop occupé à grommeler en fouillant.
										</p>
										<div class="dialogue">
											<div class="portrait">
												<img src="/escaperpg/images/ambria/vieuxtype.png">
											</div>
											<div class="bulleperso">
												<p>
													Vingt Dieux ! T\'as failli m\'faire avoir une attaque ! Qu\'est-ce que tu fais là, p\'tit ?
												</p>
											</div>
										</div>
										<p>
											Vous lui expliquez chercher un moyen de rallier les quais.
										</p>
										<div class="dialogue">
											<div class="portrait">
												<img src="/escaperpg/images/ambria/vieuxtype.png">
											</div>
											<div class="bulleperso">
												<p>
													Ah, faut qu\'tu t\'rendes au Nord, dans c\'cas !
													Mais La porte est fermée et c\'est moi qu\'ai la clé !<br>
													<br>
													J\'te propose quelque chose : si tu m\'rends un p\'tit service, j\'t\'ouvre la porte.<br>
													Qu\'est-ce qu\'t\'en dis ?
												</p>
											</div>
										</div>
										<p>
											Vous êtes pressé mais n\'avez cependant pas vraiment d\'autre solution. Aussi acquiescez-vous.
										</p>
										<div class="dialogue">
											<div class="portrait">
												<img src="/escaperpg/images/ambria/vieuxtype.png">
											</div>
											<div class="bulleperso">
												<p>
													Parfait ! Tu vois, j\'travaille à la taverne. J\'étais sorti pisser à l\'aut\' bout d\'la ruelle, là-bas.
												</p>
											</div>
										</div>
										<p>
											Il fait un vague signe en direction de l\'Ouest.
										</p>
										<div class="dialogue">
											<div class="portrait">
												<img src="/escaperpg/images/ambria/vieuxtype.png">
											</div>
											<div class="bulleperso">
												<p>
													Y a un coin qu\'est tranquille...<br>
													Bref, j\'étais à mes affaires tout en grignotant un biscuit quand c\'te saloperie d\'volatile m\'a foncé d\'ssus pour m\'voler mon gâteau !<br>
													<br>
													Foutues mouettes, elles raffolent de ça. J\'me suis débattu mais c\'est qu\'elle en voulait, la garce, si bien qu\'elle a fini par s\'barrer avec mon chapeau !<br>
													J\'l\'ai vue s\'tirer au Nord-Ouest et j\'voulais lui courir après mais j\'me suis rendu compte que j\'avais perdu ma clé d\'l\'arrière-cour d\'la taverne,
													alors tu penses bien qu\'j\'suis rev\'nu sur mes pas pour tenter d\'la r\'trouver, mais rien à faire.<br>
													<br>
													Ramène-moi mes affaires, et j\'te fais passer la porte des quais.
												</p>
											</div>
										</div>
										<p>
											Vous lui dites que vous allez faire ce que vous pouvez et revenez sur vos pas.
										</p>
										<center>
											<form action="fuite" method="post">
												<input type="submit" name="g5" value="Aller au Nord." class="noway"><br>
												<input type="submit" name="f5" value="Aller à l\'Ouest."><input type="submit" name="g5" value="ALLER À L\'EST." class="noway"><br>
												<input type="submit" name="g5" value="ALLER AU SUD." class="noway">
											</form>
										</center>
									';
									$_SESSION['typecolere'] = true;
								}
						}
					else
						{
							echo'
								<p>
									Vous êtes sur le seuil de l\'arrière-cour de la bibliothèque. Les ruelles sombres de l\'île s\'enfoncent dans les ténèbres un peu plus loin au Nord ou à l\'Ouest.<br>
									<br>
									Par où devez-vous aller ?
								</p>
								<center>
									<form action="fuite" method="post">
										<input type="submit" name="c5" value="Aller au Nord."><br>
										<input type="submit" name="b6" value="Aller à l\'Ouest."><input type="submit" name="c6" value="ALLER À L\'EST." class="noway"><br>
										<input type="submit" name="c6" value="ALLER AU SUD." class="noway">
									</form>
								</center>
							';
						}
					echo'
						<center>
							<form action="fuiteindice" method="post" target="_blank" rel="noreferrer">
								<button type="submit" name="indice" class="boutonindice"></button>
							</form>
						</center>
					';
				?>
			</div>
		</div>
		<div id="load"><div id="loader"></div></div>
		<script src="/escaperpg/scripts/aventures-chargement.js"></script>
		<?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/ambria/logan/includes/footer.php"; ?>
	</body>
</html>
