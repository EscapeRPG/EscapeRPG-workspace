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
	   
		<link rel="stylesheet" href="/escaperpg/aventures/secrets/css/style.css">
		<meta charset="utf-8">
		<title>Chambres - Secrets Familiaux</title>
	</head>
	
	<body>
		<?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/header.php"; ?>
		<div id="banniere"><img src="/escaperpg/images/secrets/secretsfamiliauxmini.png" alt="secrets familiaux bannière"></div>
		<main>
			<nav>
				<a href="/escaperpg/images/secrets/inspecteurdeckard.png" rel="lightbox[bastian]" title="inspecteurdeckard"><img src="/escaperpg/images/secrets/inspecteurdeckardmini.png"></a>
				<div id="inventairefooter"><input type="submit" onclick="inventaireshow()" value="INVENTAIRE"></div>
				<div id="motsdepasse"><input type="submit" onclick="mdpshow()" value="NOTES"></div>
				<?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/secrets/includes/navigationmanoir.php"; ?>
				<a href="/escaperpg/aventures/secrets/save/save.php" target="_blank" rel="noreferrer"><input type="submit" name="save" value="SAUVEGARDER"></a>
			</nav>
			<div id="txt">
				<?php
					if ($_SESSION['visitepellington'] == false)
						{
							if ($_SESSION['jour'])
								{
									echo '
										<p>
											4 chambres occupent le reste de l\'aile Est, ainsi que l\'escalier menant au <span class="lieu">grenier</span>.<br>
											Les chambres sont toutes prêtes pour accueillir qui que ce soit et vous pouvez donc prendre celle que vous voulez pour aller dormir.
										</p>
										<center>
											<form action="nuit" method="post">
												<input type="submit" name="entrer" value="Aller dormir.">
											</form>
										</center>
									';
								}
							else
								{
									echo '
										<p>
											4 chambres occupent le reste de l\'aile Est, ainsi que l\'escalier menant au <span class="lieu">grenier</span>.<br>
											Les chambres sont toutes prêtes pour accueillir qui que ce soit et vous pouvez donc prendre celle que vous voulez pour aller dormir.
										</p>
										<center>
											<form action="jour2" method="post">
												<input type="submit" name="entrer" value="Aller dormir.">
											</form>
										</center>
									';
								}
						}
					else
						{
							echo '
								<p>
									4 chambres occupent le reste de l\'aile Est, ainsi que l\'escalier menant au <span class="lieu">grenier</span>.<br>
									Les chambres sont toutes prêtes pour accueillir qui que ce soit et vous pouvez donc prendre celle que vous voulez pour aller dormir, mais ce n\'est pas le moment maintenant.
								</p>
							';
						}
				?>
			</div>
		</div>
		<div id="load"><div id="loader"></div></div>
		<script src="/escaperpg/scripts/aventures-chargement.js"></script>
		<?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/secrets/includes/footer.php"; ?>
	</body>
</html>
