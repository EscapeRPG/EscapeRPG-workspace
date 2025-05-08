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
	   
		<link rel="stylesheet" href="/escaperpg/aventures/lastparty/css/style.css">
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
					if ($_SESSION['photos'])
						{
							echo '
								<p>
									<div id="enigmelieu">
										<img src="/escaperpg/images/lastparty/appartement.png">
										<a href="appareilphoto.php" id="appareil"></a>
									</div>
									Vous devriez inspecter votre appareil photo.
								</p>
							';
						}
					elseif ($_SESSION['carnet'])
						{
							if (isset($_POST['indice']))
								{
									echo '
										<p>
											<div id="enigmelieu">
												<img src="/escaperpg/images/lastparty/appartement.png">
												<a href="ordinateur.php" id="ordi"></a>
											</div>
											Il est temps de vous connecter à votre compte Faceeebook.<br>
											<br>
											<div class="indice">
												Vous ne pouvez pas aller sur Faceeebook sur votre téléphone, mais il y a sans doute un autre moyen d\'y accéder.
											</div>
										</p>
										<center>
											<form action="appartement.php" method="post">
												<button type="submit" name="reponse" class="boutonreponse"></button>
											</form>
										</center>
									';
								}
							elseif (isset($_POST['reponse']))
								{
									echo '
										<p>
											<div id="enigmelieu">
												<img src="/escaperpg/images/lastparty/appartement.png">
												<a href="ordinateur.php" id="ordi"></a>
											</div>
											Il est temps de vous connecter à votre compte Faceeebook.<br>
											<br>
											<div class="reponse">
												Cliquez sur l\'ordinateur, sur le bureau.
											</div>
										</p>
									';
								}
							else
								{
									echo '
										<p>
											<div id="enigmelieu">
												<img src="/escaperpg/images/lastparty/appartement.png">
												<a href="ordinateur.php" id="ordi"></a>
											</div>
											Comment pourriez-vous vous connecter à votre compte Faceeebook ?
										</p>
										<center>
											<form action="appartement.php" method="post">
												<button type="submit" name="indice" class="boutonindice"></button>
											</form>
										</center>
									';
								}
						}
					elseif ($_SESSION['tiroir']) // Le jouer est allé sur l'ordinateur mais n'a pas pu se connecter car il n'a pas ouvert le tiroir
						{
							if (isset($_POST['indice']))
								{
									echo '
										<p>
											<div id="enigmelieu">
												<img src="/escaperpg/images/lastparty/appartement.png">
												<a href="ordinateur.php" id="ordi"></a>
												<a href="tiroir.php" id="tiroir"></a>
											</div>
											Comment pourriez-vous vous connecter à votre compte Faceeebook ?<br>
											<br>
											<div class="indice">
												Pour plus de simplicité, vous avez rangé votre carnet au plus proche de l\'endroit où vous en auriez besoin.
											</div>
										</p>
										<center>
											<form action="appartement.php" method="post">
												<button type="submit" name="indice2" class="boutonindice"></button>
											</form>
										</center>
									';
								}
							elseif (isset($_POST['indice2']))
								{
									echo '
										<p>
											<div id="enigmelieu">
												<img src="/escaperpg/images/lastparty/appartement.png">
												<a href="ordinateur.php" id="ordi"></a>
												<a href="tiroir.php" id="tiroir"></a>
											</div>
											Comment pourriez-vous vous connecter à votre compte Faceeebook ?<br>
											<br>
											<div class="indice">
												Pour plus de simplicité, vous avez rangé votre carnet au plus proche de l\'endroit où vous en auriez besoin.<br>
												Votre carnet est rangé tout près de votre ordinateur.
											</div>
										</p>
										<center>
											<form action="appartement.php" method="post">
												<button type="submit" name="reponse" class="boutonreponse"></button>
											</form>
										</center>
									';
								}
							elseif (isset($_POST['reponse']))
								{
									echo '
										<p>
											<div id="enigmelieu">
												<img src="/escaperpg/images/lastparty/appartement.png">
												<a href="ordinateur.php" id="ordi"></a>
												<a href="tiroir.php" id="tiroir"></a>
											</div>
											Comment pourriez-vous vous connecter à votre compte Faceeebook ?<br>
											<br>
											<div class="reponse">
												Fouillez dans les tiroirs du bureau.
											</div>
										</p>
									';
								}
							else
								{
									echo '
										<p>
											<div id="enigmelieu">
												<img src="/escaperpg/images/lastparty/appartement.png">
												<a href="ordinateur.php" id="ordi"></a>
												<a href="tiroir.php" id="tiroir"></a>
											</div>
											Comment pourriez-vous vous connecter à votre compte Faceeebook ?
										</p>
										<center>
											<form action="appartement.php" method="post">
												<button type="submit" name="indice" class="boutonindice"></button>
											</form>
										</center>
									';
								}
						}
					else
						{
							if (isset($_POST['indice2']))
								{
									echo '
										<p>
											<div id="enigmelieu">
												<img src="/escaperpg/images/lastparty/appartement.png">
												<a href="ordinateur.php" id="ordi"></a>
												<a href="tiroir.php" id="tiroir"></a>
											</div>
											Comment pourriez-vous vous connecter à votre compte Faceeebook ?<br>
											<br>
											<div class="indice">
												Vous ne pouvez pas aller sur Faceeebook sur votre téléphone, mais il y a sans doute un autre moyen d\'y accéder.
											</div>
										</p>
										<center>
											<form action="appartement.php" method="post">
												<button type="submit" name="reponse2" class="boutonreponse"></button>
											</form>
										</center>
									';
								}
							elseif (isset($_POST['reponse2']))
								{
									echo '
										<p>
											<div id="enigmelieu">
												<img src="/escaperpg/images/lastparty/appartement.png">
												<a href="ordinateur.php" id="ordi"></a>
												<a href="tiroir.php" id="tiroir"></a>
											</div>
											Comment pourriez-vous vous connecter à votre compte Faceeebook ?<br>
											<br>
											<div class="reponse">
												Cliquez sur l\'ordinateur, sur le bureau.
											</div>
										</p>
									';
								}
							else
								{
									echo '
										<p>
											<div id="enigmelieu">
												<img src="/escaperpg/images/lastparty/appartement.png">
												<a href="ordinateur.php" id="ordi"></a>
												<a href="tiroir.php" id="tiroir"></a>
											</div>
											Comment pourriez-vous vous connecter à votre compte Faceeebook ?
										</p>
										<center>
											<form action="appartement.php" method="post">
												<button type="submit" name="indice2" class="boutonindice"></button>
											</form>
										</center>
									';
								}
						}
				?>
			</div>
		</div>
		<div id="load"><div id="loader"></div></div>
		<script src="/escaperpg/scripts/aventures-chargement.js"></script>
		<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/lastparty/includes/footer.php"; ?>
	</body>
</html>