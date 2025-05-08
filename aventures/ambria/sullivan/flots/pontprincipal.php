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
	   
		<link rel="stylesheet" href="/escaperpg/aventures/ambria/styleambria.css">
		<meta charset="utf-8">
		<title>Pont Principal - Le Trésor d'Ambria</title>
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
													<img src="/escaperpg/images/ambria/matelots.png">
												</div>
												<div class="bulleperso">
													<p>
														Il est passé un peu plus tôt, avant de repartir avec <span class="mdp">Jake</span>.
													</p>
												</div>
											</div>
											<center>
												<form action="pontprincipal.php" method="post">
													<input type="text" name="ask"><input type="submit" name="demander" value="Demander.">
												</form>
											</center>
										';
										$_SESSION['mdp7'] = true;
										break;
									case "jake":
										echo '
											<div class="dialogue">
												<div class="portrait">
													<img src="/escaperpg/images/ambria/matelots.png">
												</div>
												<div class="bulleperso">
													<p>
														Hmmmm... Je sais pas trop où ils sont allés.
														Ils sont descendus au <span class="lieu">pont inférieur</span> mais j\'en sais pas plus.
													</p>
												</div>
											</div>
											<center>
												<form action="pontprincipal.php" method="post">
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
														Pardon, capitaine ?
													</p>
												</div>
											</div>
											<center>
												<form action="pontprincipal.php" method="post">
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
									Vous marchez sur le pont principal.
									Au-dessus de votre tête, le ciel est d\'un bleu étincelant, à peine entaché par de rares nuages à l\'horizon.<br>
									Vous vous penchez quelques instants par-dessus le garde-fou, le temps de sentir les embruns caresser votre visage buriné par le sel marin et le soleil éblouissant.
									Vous profitez quelques minutes de cet instant, l\'odeur de la mer vous évoquant un parfum de liberté, puis reprenez votre marche sur le pont.<br>
									Quelques hommes d\'équipage se trouvent ici, certains briquant le pont, d\'autres s\'assurant que les tonneaux et caisses sont bien arrimés.<br>
									<br>
									Vous vous approchez d\'eux.
								</p>
								<div class="dialogue">
									<div class="portrait">
										<img src="/escaperpg/images/ambria/matelots.png">
									</div>
									<div class="bulleperso">
										<p>
											Capitaine ! Qu\'est-ce qu\'on peut faire pour vous ?
										</p>
									</div>
								</div>
								<center>
									<form action="pontprincipal.php" method="post">
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