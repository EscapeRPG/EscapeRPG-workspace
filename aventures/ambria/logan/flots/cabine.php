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
		<title>Cabine du Capitaine - Le Trésor d'Ambria</title>
	</head>
	
	<body onload="chargement()">
		<?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/header.php"; ?>
		<div id="banniere"><img src="/escaperpg/images/ambria/tresorambriamini.png"></div>
		<main>
			<nav>
				<a href="/escaperpg/images/ambria/loganbarthelemymini.png" rel="lightbox[logan]" title="Logan Barthélémy"><img src="/escaperpg/images/ambria/loganbarthelemymini.png"></a>
				<div id="inventairefooter"><input type="submit" value="INVENTAIRE"></div>
				<div id="motsdepasse"><input type="submit" value="NOTES"></div>
				<a href="/escaperpg/aventures/ambria/save/save.php" target="_blank" rel="noreferrer"><input type="submit" name="save" value="SAUVEGARDER"></a>
				<?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/ambria/logan/includes/navigationbateau.php"; ?>
			</nav>
			<div id="txt">
				<?php
					if (isset ($_POST['suivant']))
						{
							echo '
								<audio src="/escaperpg/sons/ambria/ouverturecarte.mp3" autoplay></audio>
								<div id="enigmelieu">
									<img src="/escaperpg/images/ambria/parchemin.png">
								</div>
								<p>
									Vous dépliez le parchemin et lisez les instructions tandis que Sullivan calcule l\'itinéraire sur sa carte.
								</p>
								<center>
									<form action="cabine" method="post">
										<input type="text" name="cap"><input type="submit" name="carte" value="Déchiffrer le parchemin.">
									</form>
								</center>
							';
						}
					elseif (isset ($_POST['carte']))
						{
							switch (str_replace($search, $replace, stripslashes($_POST['cap'])))
								{
									case "toutlemondeasonposte":
										$nouveausucces = '<img src="/escaperpg/images/succes/ambria/cap.png"><span><u><b>Droit vers l\'horizon !</b></u><br>Trouver un cap pour le Surgisseur des Tempêtes</span>';
										$scenario = 'ambria';
										$description = 'cap';
										$cache = 'non';
										$rarete = 'succesbronze';
										include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/succesadd.php";
										echo '
											<audio src="/escaperpg/sons/ambria/cap.mp3" autoplay></audio>
											<p>
												Le capitaine esquisse un sourire de satisfaction mêlé d\'envie.<br>
												Vous venez de lui offrir la direction vers un trésor fabuleux et, manifestement, rien ne pourrait le contenter davantage.
											</p>
											<div class="dialogue">
												<div class="portrait">
													<img src="/escaperpg/images/ambria/sullivanmasonmini.png">
												</div>
												<div class="bulleperso">
													<p>
														Merci gamin. Je sais où nous nous rendons à présent.<br>
														<br>
														Viens avec moi sur le pont, j\'ai des ordres à donner !
													</p>
												</div>
											</div>
											<p>
												Il attrape un carnet sur le bureau avant de se lever et de se diriger vers l\'extérieur de la cabine.
												Vous le suivez et le voyez se rendre sur la dunette pour donner ses ordres au timonier, qui semble réagir bizarrement sans que vous ne compreniez ce qu\'il répond au capitaine.<br>
												Ce dernier se retourne alors et attrape la corde attachée à une petite cloche, à côté de la barre.
											</p>
											<div class="dialogue">
												<div class="portrait">
													<img src="/escaperpg/images/ambria/sullivanmasonmini.png">
												</div>
												<div class="bulleperso">
													<p>
														Nous sommes sur le Surgisseur des Tempêtes, rien ne nous arrêtera.<br>
														<br>
														TOUT LE MONDE À SON POSTE !
													</p>
												</div>
											</div>
											<p>
												Le Surgisseur des Tempêtes prend le large, filant sur une mer bleu azur sereine.<br>
												<br>
												Aucun nuage ne semble percer l\'horizon.
											</p>
											<center>
												<form action="tempete" method="post">
													<input type="submit" name="suite" value="Suivant.">
												</form>
											</center>
										';
										break;
									default:
										echo '
											<div id="enigmelieu">
												<img src="/escaperpg/images/ambria/parchemin.png">
											</div>
											<p>
												Cela ne semble pas être ça.<br>
												<br>
												Vous dépliez le parchemin et lisez les instructions tandis que Sullivan calcule l\'itinéraire sur sa carte.
											</p>
											<center>
												<form action="cabine" method="post">
													<input type="text" name="cap"><input type="submit" name="carte" value="Déchiffrer le parchemin.">
												</form>
											</center>
										';
								}
						}
					elseif ($_SESSION['ambrialogantrouve'])
						{
							echo '
								<audio src="/escaperpg/sons/ambria/cabine.mp3" autoplay></audio>
								<p>
									Vous suivez Sullivan jusqu\'à ses quartiers.<br>
									<br>
									Sortant une petite clé de son manteau, il déverrouille l\'accès à sa cabine et vous fait signe d\'y entrer.<br>
									Vaste et bien éclairée par les fenêtres, elle offre tout le confort dont on pourrait rêver à bord d\'un navire.
									Sur le bureau se trouvent les différentes cartes dont il se sert pour sillonner les mers.<br>
									<br>
									Il le contourne et s\'installe sur le fauteuil avant de vous inviter à vous asseoir face à lui.
								</p>
								<div class="dialogue">
									<div class="portrait">
										<img src="/escaperpg/images/ambria/sullivanmasonmini.png">
									</div>
									<div class="bulleperso">
										<p>
											Bon alors, va falloir que tu prouves que tu as ta place ici. Montre-moi le parchemin.
										</p>
									</div>
								</div>
								<p>
									Vous attrapez votre sacoche et en sortez le morceau de papier confié par Louis.
								</p>
								<div class="dialogue">
									<div class="bulleperso2">
										<p>
											C\'est le parchemin que m\'a confié Louis. Ce n\'est pas une carte, mais...
										</p>
									</div>
									<div class="portrait2">
										<img src="/escaperpg/images/ambria/loganbarthelemymini.png">
									</div>
								</div>
								<p>
									Le capitaine fronce les sourcils, l\'air patibulaire et vous craignez qu\'il ne se méprenne sur la nature du parchemin.
								</p>
								<div class="dialogue">
									<div class="bulleperso2">
										<p>
											Non, non. Ne vous inquiétez pas.
											Le parchemin indique tout de même comment récupérer le trésor. Écoutez.
										</p>
									</div>
									<div class="portrait2">
										<img src="/escaperpg/images/ambria/loganbarthelemymini.png">
									</div>
								</div>
								<center>
									<form action="cabine" method="post">
										<input type="submit" name="suivant" value="Suivant.">
									</form>
								</center>
							';
						}
					else
						{
							echo '
								<audio src="/escaperpg/sons/ambria/flots.mp3" autoplay></audio>
								<p>
									Vous approchez de la porte de la cabine du capitaine et tendez la main vers la poignée lorsqu\'un marin sur le pont vous interpelle.
								</p>
								<div class="dialogue">
									<div class="portrait">
										<img src="/escaperpg/images/ambria/matelots.png">
									</div>
									<div class="bulleperso">
										<p>
											Hé, Logan !<br>
											Tu ferais mieux d\'pas déranger l\'capitaine pour le moment. Il a son travail à faire, il viendra t\'voir quand il aura besoin d\'toi.
										</p>
									</div>
								</div>
								<p>
									Vous rebroussez chemin.
								</p>
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
