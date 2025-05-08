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
	   
		<link rel="stylesheet" href="/escaperpg/aventures/lastparty/stylelastparty.css">
		<meta charset="utf-8">
		<title>Appartement - Last Party</title>
	</head>
	
	<body onload="chargement()">
		<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/header.php"; ?>
		<div id="banniere"><img src="/escaperpg/images/lastparty/lpmini.png"></div>
		<div id="bloc_page">
			<nav>
				<img src="/escaperpg/images/lastparty/jonathan.png">
				<div id="inventairefooter"><input type="submit" onclick="inventaireshow()" value="INVENTAIRE"></div>
				<div id="motsdepasse"><input type="submit" onclick="mdpshow()" value="NOTES"></div>
				<a href="/escaperpg/aventures/lastparty/save/save.php" target="_blank" rel="noreferrer"><input type="submit" name="save" value="SAUVEGARDER"></a>
			</nav>
			<div id="txt">
				<?php
					if (isset($_POST['add']))
						{
							echo '
								<script src="/escaperpg/scripts/inventaireadd.js"></script>
								<p>
									Vous prenez le carnet avec vous.
								</p>
								<center>
									<form action="appartement.php" method="post">
										<input type="submit" name="retour" value="Retour.">
									</form>
								</center>
							';
							$_SESSION['carnet'] = true;
						}
					else
						{
							echo '
								<audio src="/escaperpg/sons/lastparty/tiroir.mp3" autoplay></audio>
								<p>
									<div id="enigme">
										<a href="/escaperpg/images/lastparty/carnet.png" rel="lightbox[invent]"><img src="/escaperpg/images/lastparty/carnet.png"></a>
									</div>
									Dans les tiroirs du bureau, vous trouvez un carnet contenant l\'intégralité de vos mots de passe sur internet.
								</p>
								<center>
									<form action="tiroir.php" method="post">
										<input type="submit" name="add" value="Prendre.">
									</form>
								</center>
							';
						}
				?>
			</div>
		</div>
		<div id="load"><div id="loader"></div></div>
		<script src="/escaperpg/scripts/aventures-chargement.js"></script>
		<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/lastparty/includes/footer.php"; ?>
	</body>
</html>