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
	   
		<link rel="stylesheet" href="/escaperpg/aventures/avent/css/style.css">
		<meta charset="utf-8">
		<title>Réparations - Le Grenier d'Arthur</title>
	</head>
	
	<body>
		<?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/header.php"; ?>
		<div id="banniere"><img src="/escaperpg/images/avent/aventmini.png" alt="bannière le grenier d'arthur"></div>
		<main>
			<nav>
				<img src="/escaperpg/images/avent/sarah.png" alt="sarah">
				<form action="/escaperpg/aventures/avent/cartes.php" target="_blank" rel="noreferrer" method="post"><input type="submit" name="cartes" value="Cartes"></form>
				<a href="/escaperpg/aventures/avent/save/save.php" target="_blank" rel="noreferrer"><input type="submit" name="save" value="SAUVEGARDER"></a>
			</nav>
			<div id="txt">
				<?php
					if (isset ($_POST['suivant']))
						{
							echo'
								<p>
									- Placer le sapence dans son compartiment.<br>
									- Calibrer le régulateur sur 4 et abaisser le levier.<br>
									- Remplir le réservoir aux 3/4.<br>
									- Appuyer sur le bouton rouge.
									<br>
									<div id="enigmelieu">
										<img src="/escaperpg/images/avent/machineperenoel.png">
										<div id="machineperenoel">
											<div class="dropper" id="drop1"></div>
											<div class="dropper" id="drop2"></div>
											<div class="dropper" id="drop3"></div>
											<div class="dropper" id="drop4"></div>
											<input type="range" name="range" min="1" max="9" value="1">
											<input list="notesListe" name="reservoir" id="reservoir">
											<div id="boutonmachineoff">
												<form action="reparations" method="post">
													<button type="submit" name="boutonmachine">
														<img src="/escaperpg/images/avent/boutonoff.png">
													</button>
												</form>
											</div>
										</div>
									</div>
									<br>
									<center>
										<div class="draggable" id="drag1">
											<img src="/escaperpg/images/avent/sapence.png" id="dra1">
										</div>
									</center>
									<script src="/escaperpg/aventures/scripts/dragdrop.js"></script>
								</p>
								<center>
									<form action="reparations" method="post">
										<button type="submit" name="indice" class="boutonindice"></button>
									</form>
								</center>
							';
						}
					elseif (isset ($_POST['indice']))
						{
							echo '
								<p>
									- Placer le sapence dans son compartiment.<br>
									- Calibrer le régulateur sur 4 et abaisser le levier.<br>
									- Remplir le réservoir aux 3/4.<br>
									- Appuyer sur le bouton rouge.
									<br>
									<div id="enigmelieu">
										<img src="/escaperpg/images/avent/machineperenoel.png">
										<div id="machineperenoel">
											<div class="dropper" id="drop1"></div>
											<div class="dropper" id="drop2"></div>
											<div class="dropper" id="drop3"></div>
											<div class="dropper" id="drop4"></div>
											<input type="range" name="range" min="0" max="9" value="0">
											<input list="notesListe" name="reservoir" id="reservoir">
											<div id="boutonmachineoff">
												<form action="reparations" method="post">
													<button type="submit" name="boutonmachine">
														<img src="/escaperpg/images/avent/boutonoff.png">
													</button>
												</form>
											</div>
										</div>
									</div>
									<br>
									<center>
										<div class="draggable" id="drag1">
											<img src="/escaperpg/images/avent/sapence.png" id="dra1">
										</div>
									</center>
									<script src="/escaperpg/aventures/scripts/dragdrop.js"></script>
								</p>
								<center>
									<span class="indice">Placez le sapence à l\'endroit indiqué par les instructions.<br>
									Attention, chaque étape doit être réalisée dans l\'ordre !</span><br>
									<br>
									<form action="reparations" method="post">
										<button type="submit" name="indicereparations2" class="boutonindice"></button>
									</form>
								</center>
							';
						}
					elseif (isset ($_POST['indicereparations2']))
						{
							echo '
								<p>
									- Placer le sapence dans son compartiment.<br>
									- Calibrer le régulateur sur 4 et abaisser le levier.<br>
									- Remplir le réservoir aux 3/4.<br>
									- Appuyer sur le bouton rouge.
									<br>
									<div id="enigmelieu">
										<img src="/escaperpg/images/avent/machineperenoel.png">
										<div id="machineperenoel">
											<div class="dropper" id="drop1"></div>
											<div class="dropper" id="drop2"></div>
											<div class="dropper" id="drop3"></div>
											<div class="dropper" id="drop4"></div>
											<input type="range" name="range" min="0" max="9" value="0">
											<input list="notesListe" name="reservoir" id="reservoir">
											<div id="boutonmachineoff">
												<form action="reparations" method="post">
													<button type="submit" name="boutonmachine">
														<img src="/escaperpg/images/avent/boutonoff.png">
													</button>
												</form>
											</div>
										</div>
									</div>
									<br>
									<center>
										<div class="draggable" id="drag1">
											<img src="/escaperpg/images/avent/sapence.png" id="dra1">
										</div>
									</center>
									<script src="/escaperpg/aventures/scripts/dragdrop.js"></script>
								</p>
								<center>
									<span class="indice">Placez le sapence à l\'endroit indiqué par les instructions.<br>
									Attention, chaque étape doit être réalisée dans l\'ordre !<br>
									Essayez de traduire les mots en haut, l\'un d\'eux vous dira où placer le sapence.</span><br>
									<br>
									<form action="reparations" method="post">
										<button type="submit" name="reponse" class="boutonreponse"></button>
									</form>
								</center>
							';
						}
					elseif (isset ($_POST['reponse']))
						{
							echo '
								<p>
									- Placer le sapence dans son compartiment.<br>
									- Calibrer le régulateur sur 4 et abaisser le levier.<br>
									- Remplir le réservoir aux 3/4.<br>
									- Appuyer sur le bouton rouge.
									<br>
									<div id="enigmelieu">
										<img src="/escaperpg/images/avent/machineperenoel.png">
										<div id="machineperenoel">
											<div class="dropper" id="drop1"></div>
											<div class="dropper" id="drop2"></div>
											<div class="dropper" id="drop3"></div>
											<div class="dropper" id="drop4"></div>
											<input type="range" name="range" min="0" max="9" value="0">
											<input list="notesListe" name="reservoir" id="reservoir">
											<div id="boutonmachineoff">
												<form action="reparations" method="post">
													<button type="submit" name="boutonmachine">
														<img src="/escaperpg/images/avent/boutonoff.png">
													</button>
												</form>
											</div>
										</div>
									</div>
									<br>
									<center>
										<div class="draggable" id="drag1">
											<img src="/escaperpg/images/avent/sapence.png" id="dra1">
										</div>
									</center>
									<script src="/escaperpg/aventures/scripts/dragdrop.js"></script>
								</p>
								<center>
									<span class="reponse">Placez le sapence dans le deuxième emplacement, en haut.</span>
								</center>
							';
						}
					elseif (isset ($_POST['boutonmachine']))
						{
							echo '
								<p>
									Rien ne se passe, la machine n\'est sans doute pas encore prête.<br>
									- Placer le sapence dans son compartiment.<br>
									- Calibrer le régulateur sur 4 et abaisser le levier.<br>
									- Remplir le réservoir aux 3/4.<br>
									- Appuyer sur le bouton rouge.
									<br>
									<br>
									<div id="enigmelieu">
										<img src="/escaperpg/images/avent/machineperenoel.png">
										<div id="machineperenoel">
											<div class="dropper" id="drop1"></div>
											<div class="dropper" id="drop2"></div>
											<div class="dropper" id="drop3"></div>
											<div class="dropper" id="drop4"></div>
											<input type="range" name="range" min="0" max="9" value="0">
											<input list="notesListe" name="reservoir" id="reservoir">
											<div id="boutonmachineoff">
												<form action="reparations" method="post">
													<button type="submit" name="boutonmachine">
														<img src="/escaperpg/images/avent/boutonoff.png">
													</button>
												</form>
											</div>
										</div>
									</div>
									<br>
									<center>
										<div class="draggable" id="drag1">
											<img src="/escaperpg/images/avent/sapence.png" id="dra1">
										</div>
									</center>
									<script src="/escaperpg/aventures/scripts/dragdrop.js"></script>
								</p>
								<center>
									<form action="reparations" method="post">
										<button type="submit" name="indice" class="boutonindice"></button>
									</form>
								</center>
							';
						}
					else
						{
							echo '
								<p>
									<div class="dialogue">
										<div class="portrait">
											<img src="/escaperpg/images/avent/arthur.png" alt="arthur">
										</div>
										<div class="bulleperso">
											<p>
												Voilà, c\'est ça un sapence.<br>
												<br>
												Continue de lire les instructions, tu devrais pouvoir trouver où ce machin doit aller !
											</p>
										</div>
									</div>
									<br>
									Vous reprenez la traduction du livre et constatez que, peu à peu, ce dialecte vous devient naturel.
									Bientôt, vous arrivez à lire les instructions sans besoin d\'utiliser le traducteur !
								</p>
								<center>
									<form action="reparations" method="post">
										<input type="submit" name="suivant" value="SUIVANT.">
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
