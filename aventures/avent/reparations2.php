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
	   
		<link rel="stylesheet" href="/escaperpg/aventures/avent/css/style.css">
		<meta charset="utf-8">
		<title>Réparations - Le Grenier d'Arthur</title>
	</head>
	
	<body onload="chargement()">
		<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/header.php"; ?>
		<div id="banniere"><img src="/escaperpg/images/avent/aventmini.png"></div>
		<div id="bloc_page">
			<nav>
				<img src="/escaperpg/images/avent/sarah.png">
				<form action="/escaperpg/aventures/avent/cartes.php" target="_blank" rel="noreferrer" method="post"><input type="submit" name="cartes" value="Cartes"></form>
				<a href="/escaperpg/aventures/avent/save/save.php" target="_blank" rel="noreferrer"><input type="submit" name="save" value="SAUVEGARDER"></a>
			</nav>
			<div id="txt">
				<?php
					if (isset ($_POST['indice']))
						{
							echo'
								<p>
									- Placer le sapence dans son compartiment.<br>
									- Calibrer le régulateur sur 4 et abaisser le levier.<br>
									- Remplir le réservoir aux 3/4.<br>
									- Appuyer sur le bouton rouge.
									<br>
									<div id="enigmelieu">
										<img src="/escaperpg/images/avent/machineperenoel2.png">
										<div id="machineperenoel">
											<input type="range" id="range" name="range" min="1" max="9" value="1">
											<div id="levier">
												<button onclick="rangecheck()">
													<img src="/escaperpg/images/avent/levier.png">
												</button>
											</div>
											<input type="text" name="reservoir" id="reservoir">
											<div id="boutonmachineoff">
												<form action="reparations2.php" method="post">
													<button type="submit" name="boutonmachine">
														<img src="/escaperpg/images/avent/boutonoff.png">
													</button>
												</form>
											</div>
										</div>
									</div>
									<script src="/escaperpg/aventures/scripts/rangecheck.js"></script>
								</p>
								<center>
									<span class="indice">Déplacez le petit curseur en bas à gauche pour le positionner sur la bonne valeur.</span><br>
									<br>
									<form action="reparations2.php" method="post">
										<button type="submit" name="indicereparations2" class="boutonindice"></button>
									</form>
								</center>
							';
						}
					elseif (isset ($_POST['indicereparations2']))
						{
							echo'
								<p>
									- Placer le sapence dans son compartiment.<br>
									- Calibrer le régulateur sur 4 et abaisser le levier.<br>
									- Remplir le réservoir aux 3/4.<br>
									- Appuyer sur le bouton rouge.
									<br>
									<div id="enigmelieu">
										<img src="/escaperpg/images/avent/machineperenoel2.png">
										<div id="machineperenoel">
											<input type="range" id="range" name="range" min="1" max="9" value="1">
											<div id="levier">
												<button onclick="rangecheck()">
													<img src="/escaperpg/images/avent/levier.png">
												</button>
											</div>
											<input type="text" name="reservoir" id="reservoir">
											<div id="boutonmachineoff">
												<form action="reparations2.php" method="post">
													<button type="submit" name="boutonmachine">
														<img src="/escaperpg/images/avent/boutonoff.png">
													</button>
												</form>
											</div>
										</div>
									</div>
									<script src="/escaperpg/aventures/scripts/rangecheck.js"></script>
								</p>
								<center>
									<span class="indice">Déplacez le petit curseur en bas à gauche pour le positionner sur la bonne valeur.<br>
									N\'oubliez pas de cliquer sur le levier juste à droite pour l\'enclencher.</span><br>
									<br>
									<form action="reparations2.php" method="post">
										<button type="submit" name="reponse" class="boutonreponse"></button>
									</form>
								</center>
							';
						}
					elseif (isset ($_POST['reponse']))
						{
							echo'
								<p>
									- Placer le sapence dans son compartiment.<br>
									- Calibrer le régulateur sur 4 et abaisser le levier.<br>
									- Remplir le réservoir aux 3/4.<br>
									- Appuyer sur le bouton rouge.
									<br>
									<div id="enigmelieu">
										<img src="/escaperpg/images/avent/machineperenoel2.png">
										<div id="machineperenoel">
											<input type="range" id="range" name="range" min="1" max="9" value="1">
											<div id="levier">
												<button onclick="rangecheck()">
													<img src="/escaperpg/images/avent/levier.png">
												</button>
											</div>
											<input type="text" name="reservoir" id="reservoir">
											<div id="boutonmachineoff">
												<form action="reparations2.php" method="post">
													<button type="submit" name="boutonmachine">
														<img src="/escaperpg/images/avent/boutonoff.png">
													</button>
												</form>
											</div>
										</div>
									</div>
									<script src="/escaperpg/aventures/scripts/rangecheck.js"></script>
								</p>
								<center>
									<span class="reponse">Placez le curseur sur le troisième cran depuis la gauche puis cliquez sur le levier juste à droite.</span>
								</center>
							';
						}
					elseif (isset ($_POST['boutonmachine']))
						{
							echo '
								<p>
									- Placer le sapence dans son compartiment.<br>
									- Calibrer le régulateur sur 4 et abaisser le levier.<br>
									- Remplir le réservoir aux 3/4.<br>
									- Appuyer sur le bouton rouge.
									<br>
									Rien ne se passe, la machine n\'est sans doute pas encore prête.<br>
									<br>
									<div id="enigmelieu">
										<img src="/escaperpg/images/avent/machineperenoel2.png">
										<div id="machineperenoel">
											<input type="range" id="range" name="range" min="1" max="9" value="1">
											<div id="levier">
												<button onclick="rangecheck()">
													<img src="/escaperpg/images/avent/levier.png">
												</button>
											</div>
											<input type="text" name="reservoir" id="reservoir">
											<div id="boutonmachineoff">
												<form action="reparations2.php" method="post">
													<button type="submit" name="boutonmachine">
														<img src="/escaperpg/images/avent/boutonoff.png">
													</button>
												</form>
											</div>
										</div>
									</div>
									<script src="/escaperpg/aventures/scripts/rangecheck.js"></script>
								</p>
								<center>
									<form action="reparations2.php" method="post">
										<button type="submit" name="indice" class="boutonindice"></button>
									</form>
								</center>
							';
						}
					else
						{
							echo '
								<audio src="/escaperpg/sons/avent/etape1.mp3" autoplay></audio>
								<p>
									- Placer le sapence dans son compartiment.<br>
									- Calibrer le régulateur sur 4 et abaisser le levier.<br>
									- Remplir le réservoir aux 3/4.<br>
									- Appuyer sur le bouton rouge.
									<br>
									<div id="enigmelieu">
										<img src="/escaperpg/images/avent/machineperenoel2.png">
										<div id="machineperenoel">
											<input type="range" id="range" name="range" min="1" max="9" value="1">
											<div id="levier">
												<button onclick="rangecheck()">
													<img src="/escaperpg/images/avent/levier.png">
												</button>
											</div>
											<input type="text" name="reservoir" id="reservoir">
											<div id="boutonmachineoff">
												<form action="reparations2.php" method="post">
													<button type="submit" name="boutonmachine">
														<img src="/escaperpg/images/avent/boutonoff.png">
													</button>
												</form>
											</div>
										</div>
									</div>
									<script src="/escaperpg/aventures/scripts/rangecheck.js"></script>
								</p>
								<center>
									<form action="reparations2.php" method="post">
										<button type="submit" name="indice" class="boutonindice"></button>
									</form>
								</center>
							';
						}
				?>
			</div>
		</div>
		<div id="load"><div id="loader"></div></div>
		<script src="/escaperpg/scripts/aventures-chargement.js"></script>
	</body>
</html>