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
		<title>Dunette - Le Trésor d'Ambria</title>
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
				<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/ambria/sullivan/includes/navigationbateau.php"; ?>
			</nav>
			<div id="txt">
				<?php
					if (isset ($_POST['demander']))
						{
							switch (str_replace($search, $replace, stripslashes($_POST['ask'])))
								{
									case "logan":
										echo '
											<div class="dialogue">
												<div class="portrait">
													<img src="/escaperpg/images/ambria/timonier.png">
												</div>
												<div class="bulleperso">
													<p>
														Non désolé cap\'taine, je l\'ai pas vu depuis not\' départ.
													</p>
												</div>
											</div>
											<center>
												<form action="dunette.php" method="post">
													<input type="text" name="ask"><input type="submit" name="demander" value="Demander.">
												</form>
											</center>
										';
										break;
									case "jake":
										echo'
											<div class="dialogue">
												<div class="portrait">
													<img src="/escaperpg/images/ambria/timonier.png">
												</div>
												<div class="bulleperso">
													<p>
														Ah, c\'est Jake que vous cherchez ?<br>
														J\'pense qu\'il doit s\'trouver au <span class="lieu">mess</span> avec le reste des gars, ou bien au <span class="lieu">quartier des équipages</span> pour se reposer.
														Il est pas de quart pour le moment.
													</p>
												</div>
											</div>
											<center>
												<form action="dunette.php" method="post">
													<input type="text" name="ask"><input type="submit" name="demander" value="Demander.">
												</form>
											</center>
										';
										break;
									default:
										echo'
											<div class="dialogue">
												<div class="portrait">
													<img src="/escaperpg/images/ambria/timonier.png">
												</div>
												<div class="bulleperso">
													<p>
														Désolé cap\'taine, mais j\'vois pas trop comment vous aider, là...<br>
														<br>
														Hésitez pas à revenir vers moi dès qu\'on aura un cap, m\'sieur.
													</p>
												</div>
											</div>
											<center>
												<form action="dunette.php" method="post">
													<input type="text" name="ask"><input type="submit" name="demander" value="Demander.">
												</form>
											</center>
										';
								}
						}
					else
						{
							echo '
								<audio src="/escaperpg/sons/ambria/flots.mp3" autoplay></audio>
								<p>
									Vous arrivez sur la dunette, où se trouve le timonier.
									Celui-ci se tient à côté de la barre, attendant vos ordres.
								</p>
								<div class="dialogue">
									<div class="portrait">
										<img src="/escaperpg/images/ambria/timonier.png">
									</div>
									<div class="bulleperso">
										<p>
											Ah, patron.
											Avons-nous un cap ? Tout le monde est prêt !
										</p>
									</div>
								</div>
								<center>
									<form action="dunette.php" method="post">
										<input type="text" name="ask"><input type="submit" name="demander" value="Demander.">
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