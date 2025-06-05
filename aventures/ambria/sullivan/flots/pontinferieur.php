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
		<title>Pont Inférieur - Le Trésor d'Ambria</title>
	</head>
	
	<body>
		<?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/header.php"; ?>
		<div id="banniere"><img src="/escaperpg/images/ambria/tresorambriamini.png"></div>
		<main>
			<nav>
				<a href="/escaperpg/images/ambria/sullivanmasonmini.png" rel="lightbox[sullivan]" title="Sullivan Mason"><img src="/escaperpg/images/ambria/sullivanmasonmini.png"></a>
				<div id="inventairefooter"><input type="submit" value="INVENTAIRE"></div>
				<div id="motsdepasse"><input type="submit" value="NOTES"></div>
				<a href="/escaperpg/aventures/ambria/save/save.php" target="_blank" rel="noreferrer"><input type="submit" name="save" value="SAUVEGARDER"></a>
				<?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/ambria/sullivan/includes/navigationbateau.php"; ?>
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
													<img src="/escaperpg/images/ambria/matelots.png">
												</div>
												<div class="bulleperso">
													<p>
														Qui ça ?<br>
														Oh, oui ! Le p\'tit nouveau ! Il était avec Barthy un peu plus tôt pour apprendre les cordages, mais je sais pas ce que les gars lui ont demandé après ça.
													</p>
												</div>
											</div>
											<center>
												<form action="pontinferieur" method="post">
													<input type="text" name="ask"><input type="submit" name="demander" value="Demander.">
												</form>
											</center>
										';
										break;
									case "jake":
										echo'
											<div class="dialogue">
												<div class="portrait">
													<img src="/escaperpg/images/ambria/matelots.png">
												</div>
												<div class="bulleperso">
													<p>
														Ah ! Il est passé un peu plus tôt, oui. J\'crois qu\'il est parti pioncer un peu ou grailler, vous devriez aller voir par là-bas.
													</p>
												</div>
											</div>
											<center>
												<form action="pontinferieur" method="post">
													<input type="text" name="ask"><input type="submit" name="demander" value="Demander.">
												</form>
											</center>
										';
										break;
									default:
										echo'
											<div class="dialogue">
												<div class="portrait">
													<img src="/escaperpg/images/ambria/matelots.png">
												</div>
												<div class="bulleperso">
													<p>
														Je sais pas quoi vous dire, là...
													</p>
												</div>
											</div>
											<center>
												<form action="pontinferieur" method="post">
													<input type="text" name="ask"><input type="submit" name="demander" value="Demander.">
												</form>
											</center>
										';
								}
						}
					else
						{
							echo '
								<audio src="/escaperpg/sons/ambria/pontinferieur.mp3" autoplay></audio>
								<p>
									Vous vous rendez au pont inférieur.
									Les canons sont alignés près des sabords, prêts à être utilisés dès que besoin.
									Les barils de poudre ainsi que les boulets sont entassés à portée pour faciliter leur utilisation et permettre à votre équipage d\'être le plus réactif possible en cas d\'attaque.<br>
									Un peu plus loin, dans un espace aménagé spécialement, se trouve le <span class="lieu">quartier des équipages</span> où les hommes peuvent s\'allonger dans les branles lorsqu\'ils sont de repos.
									Juste derrière se trouve le <span class="lieu">mess</span>, lieu de convivialité où l\'équipage vient se restaurer, discuter ou encore jouer aux cartes.
								</p>
								<center>
									<form action="pontinferieur" method="post">
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
		<?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/ambria/sullivan/includes/footer.php"; ?>
	</body>
</html>
