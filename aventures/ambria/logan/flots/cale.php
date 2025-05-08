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
		<title>Cale - Le Trésor d'Ambria</title>
	</head>
	
	<body onload="chargement()">
		<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/header.php"; ?>
		<div id="banniere"><img src="/escaperpg/images/ambria/tresorambriamini.png"></div>
		<div id="bloc_page">
			<nav>
				<a href="/escaperpg/images/ambria/loganbarthelemymini.png" rel="lightbox[logan]" title="Logan Barthélémy"><img src="/escaperpg/images/ambria/loganbarthelemymini.png"></a>
				<div id="inventairefooter"><input type="submit" onclick="inventaireshow()" value="INVENTAIRE"></div>
				<div id="motsdepasse"><input type="submit" onclick="mdpshow()" value="NOTES"></div>
				<a href="/escaperpg/aventures/ambria/save/save.php" target="_blank" rel="noreferrer"><input type="submit" name="save" value="SAUVEGARDER"></a>
			</nav>
			<div id="txt">
				<?php
					if (isset ($_POST['jouer']))
						{
							switch (str_replace($search, $replace, stripslashes($_POST['capitaine'])))
								{
									case "suismoi":
										echo'
											<audio src="/escaperpg/sons/ambria/cale.mp3" autoplay></audio>
											<p>
												La partie dure depuis quelques minutes lorsque vous entendez du mouvement se rapprocher de vous.<br>
												Tout le monde se tourne vers l\'accès à votre petite salle et vous voyez débarquer le capitaine Sullivan.
											</p>
											<div class="dialogue">
												<div class="portrait">
													<img src="/escaperpg/images/ambria/sullivanmasonmini.png">
												</div>
												<div class="bulleperso">
													<p>
														Ah, enfin je te trouve !
													</p>
												</div>
											</div>
											<div class="dialogue">
												<div class="bulleperso2">
													<p>
														Capitaine, vous me cherchiez ?<br>
														<br>
														Qu\'est-ce que je peux faire pour vous ?
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
														Il est temps qu\'on discute, toi et moi.<br>
														<br>
														Suis-moi.
													</p>
												</div>
											</div>
											<p>
												Vous vous levez, laissant vos compagnons de jeu, puis suivez le capitaine à travers le navire.
											</p>
											<center>
												<form action="cabine.php" method="post">
													<input type="submit" name="suivre" value="L\'accompagner.">
												</form>
											</center>
										';
										$_SESSION['ambrialogantrouve'] = true;
										break;
									default:
										echo'
											<p>
												Quelqu\'un arrive au bout d\'un moment et interrompt votre partie. Êtes-vous bien sûr d\'avoir compris ce qu\'il disait ?<br>
												<br>
												Sinon, c\'est que vous devez peut-être encore attendre pour obtenir le mot de passe.
											</p>
											<center>
												<form action="cale.php" method="post">
													<input type="text" name="capitaine"><input type="submit" name="jouer" value="Jouer.">
												</form>
											</center>
										';
								}
						}
					else
						{
							echo '
								<audio src="/escaperpg/sons/ambria/cale.mp3" autoplay></audio>
								<p>
									Vous descendez à la cale, où s\'entasse tout le matériel nécessaire aux voyages.
									Pour passer, vous serpentez entre les tas de planches servant à colmater d\'éventuelles brèches dans la coque puis longez le stock de barils de poudre et de victuailles jusqu\'à arriver dans une zone plus vaste,
									où les marins viennent parfois pour être tranquilles.<br>
									<br>
									En arrivant dans un petit espace aménagé, vous y retrouvez Barthy assis sur une caisse avec trois autres marins.<br>
									Vous voyant arriver, ils vous font un signe de la main en vous invitant à prendre place avec eux.
								</p>
								<div class="dialogue">
									<div class="portrait">
										<img src="/escaperpg/images/ambria/barthy.png">
									</div>
									<div class="bulleperso">
										<p>
											Viens-là gamin, on avait commencé à jouer aux dés en t\'attendant.<br>
											<br>
											T\'as pu t\'familiariser un peu avec le Surgisseur des Tempêtes, alors ?
										</p>
									</div>
								</div>
								<p>
									Vous hochez la tête puis vous installez sur le petit tonnelet laissé à votre intention.<br>
									<br>
									Au centre du cercle ainsi formé, les hommes ont disposé un baril sur lequel ils ont posé plusieurs gobelets ainsi qu\'une poignée de dés.
								</p>
								<div class="dialogue">
									<div class="portrait">
										<img src="/escaperpg/images/ambria/barthy.png">
									</div>
									<div class="bulleperso">
										<p>
											Tu vas voir, c\'est pas bien compliqué : le but est de parier sur le nombre de faces visibles autour de la table.<br>
											Tu retournes le gobelet sur le tonneau et tu regardes ton score en secret. Ensuite, tu annonces combien tu penses qu\'il y a, par exemple, de 3.<br>
											<br>
											Tour à tour, chacun peut enchérir en augmentant l\'une des valeurs : soit le nombre de faces, soit le chiffre affiché. On ne peut qu\'augmenter à chaque fois, jamais diminuer.<br>
											<br>
											On tourne comme ça jusqu\'à ce que quelqu\'un arrête et on révèle les dés.<br>
											<br>
											Si le dernier parieur a eu juste, il gagne un dé, sinon il en perd un.<br>
											On continue comme ça jusqu\'à ce qu\'il n\'y ait plus qu\'un joueur en course.<br>
											<br>
											T\'as compris ?
										</p>
									</div>
								</div>
								<p>
									Vous opinez une nouvelle fois du chef, puis récupérez votre matériel.
								</p>
								<div class="dialogue">
									<div class="portrait">
										<img src="/escaperpg/images/ambria/barthy.png">
									</div>
									<div class="bulleperso">
										<p>
											Alors, c\'est parti !
										</p>
									</div>
								</div>
								<p>
									Chacun retourne son gobelet et consulte son score.
								</p>
								<div class="dialogue">
									<div class="portrait">
										<img src="/escaperpg/images/ambria/barthy.png">
									</div>
									<div class="bulleperso">
										<p>
											Je parie trois 2.
										</p>
									</div>
								</div>
								<div class="dialogue">
									<div class="bulleperso2">
										<p>
											Quatre 4.
										</p>
									</div>
									<div class="portrait2">
										<img src="/escaperpg/images/ambria/lloyd.png">
									</div>
								</div>
								<center>
									<form action="cale.php" method="post">
										<input type="text" name="capitaine"><input type="submit" name="jouer" value="Jouer.">
									</form>
								</center>
							';
						}
				?>
			</div>
		</div>
		<div id="load"><div id="loader"></div></div>
		<script src="/escaperpg/scripts/aventures-chargement.js"></script>
		<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/ambria/logan/includes/footer.php"; ?>
	</body>
</html>