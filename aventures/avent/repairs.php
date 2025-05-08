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
	   
		<link rel="stylesheet" href="/escaperpg/aventures/avent/styleavent.css">
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
									<div id="enigmelieu">
										<img src="/escaperpg/images/avent/machineperenoel3.png">
										<div id="machineperenoel">
											<input type="range" name="range" min="1" max="9" value="4">
											<form action="repairs.php" method="post">
												<div id="boutonmachineoff">
													<button type="submit" name="boutonmachine">
														<img src="/escaperpg/images/avent/boutonoff.png">
													</button>
												</div>
											</form>
										</div>
									</div>
									<br>
									- Placer le sapence dans son compartiment.<br>
									- Calibrer le régulateur sur 4 et abaisser le levier.<br>
									- Remplir le réservoir aux 3/4.<br>
									- Appuyer sur le bouton rouge.
								</p>
								<center>
									<span class="indice">Avez-vous remarqué les valeurs inscrites sur le réservoir ?</span><br>
									<br>
									<form action="repairs.php" method="post">
										<button type="submit" name="indicereparations2" class="boutonindice"></button>
									</form>
								</center>
							';
						}
					elseif (isset ($_POST['indicereparations2']))
						{
							echo'
								<p>
									<div id="enigmelieu">
										<img src="/escaperpg/images/avent/machineperenoel3.png">
										<div id="machineperenoel">
											<input type="range" name="range" min="1" max="9" value="4">
											<form action="repairs.php" method="post">
												<input type="text" name="reservoir" id="reservoir">
												<div id="boutonmachineoff">
													<button type="submit" name="boutonmachine">
														<img src="/escaperpg/images/avent/boutonoff.png">
													</button>
												</div>
											</form>
										</div>
									</div>
									<br>
									- Placer le sapence dans son compartiment.<br>
									- Calibrer le régulateur sur 4 et abaisser le levier.<br>
									- Remplir le réservoir aux 3/4.<br>
									- Appuyer sur le bouton rouge.
								</p>
								<center>
									<span class="indice">Avez-vous remarqué les valeurs inscrites sur le réservoir ?<br>
									Déterminez la valeur actuelle dans le réservoir ainsi que la valeur à atteindre pour savoir combien vous devez ajouter.</span><br>
									<br>
									<form action="repairs.php" method="post">
										<button type="submit" name="indicereparations3" class="boutonindice"></button>
									</form>
								</center>
							';
						}
					elseif (isset ($_POST['indicereparations3']))
						{
							echo'
								<p>
									- Placer le sapence dans son compartiment.<br>
									- Calibrer le régulateur sur 4 et abaisser le levier.<br>
									- Remplir le réservoir aux 3/4.<br>
									- Appuyer sur le bouton rouge.
									<br>
									<div id="enigmelieu">
										<img src="/escaperpg/images/avent/machineperenoel3.png">
										<div id="machineperenoel">
											<input type="range" name="range" min="1" max="9" value="4">
											<form action="repairs.php" method="post">
												<input type="text" name="reservoir" id="reservoir">
												<div id="boutonmachineoff">
													<button type="submit" name="boutonmachine">
														<img src="/escaperpg/images/avent/boutonoff.png">
													</button>
												</div>
											</form>
										</div>
									</div>
								</p>
								<center>
									<span class="indice">Avez-vous remarqué les valeurs inscrites sur le réservoir ?<br>
									Déterminez la valeur actuelle dans le réservoir ainsi que la valeur à atteindre pour savoir combien vous devez ajouter.<br>
									Il y a actuellement 22cL de carburant dans le réservoir.</span><br>
									<br>
									<form action="repairs.php" method="post">
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
										<img src="/escaperpg/images/avent/machineperenoel3.png">
										<div id="machineperenoel">
											<input type="range" name="range" min="1" max="9" value="4">
											<form action="repairs.php" method="post">
												<input type="text" name="reservoir" id="reservoir">
												<div id="boutonmachineoff">
													<button type="submit" name="boutonmachine">
														<img src="/escaperpg/images/avent/boutonoff.png">
													</button>
												</div>
											</form>
										</div>
									</div>
								</p>
								<center>
									<span class="reponse">Il faut mettre 53 dans le champ du réservoir puis cliquer sur le bouton d\'allumage.</span>
								</center>
							';
						}
					elseif (isset ($_POST['boutonmachine']))
						{
							switch (str_replace($search, $replace, stripslashes($_POST['reservoir'])))
								{
									case "53":
										echo'<div id="succespopup">';
										$nouveausucces = '<img src="/escaperpg/images/succes/avent/cadeaux.png"><span><u><b>Véritable mécano !</b></u><br>Réparer la machine à cadeaux du Père Noël !</span>';
										$scenario = 'avent';
										$description = 'cadeaux';
										$cache = 'oui';
										$rarete = 'succesbronze';
										include_once $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/succesadd.php";
										echo'</div>';
										
										echo'
											<audio src="/escaperpg/sons/avent/etape3.mp3" autoplay></audio>
											<p>
												La machine commence à vibrer alors que son moteur se remet en route.<br>
												Vous constatez que le tapis roulant qui en sort commence à bouger, lui aussi.
												Une petite boîte rouge ornée d\'un ruban vert en sort.<br>
												<br>
												Votre grand-père se dirige vers elle.<br /<
												<br>
												<div class="dialogue">
													<div class="portrait">
														<img src="/escaperpg/images/avent/arthur.png">
													</div>
													<div class="bulleperso">
														<p>
															Hourra ! Nous avons réussi, Sarah !
															C\'est incroyable ! Tu es vraiment douée ma petite. Avec toi, la relève est assurée !
														</p>
													</div>
												</div>
												<br>
												Il part d\'un rire communicatif avant de reprendre son sérieux puis de s\'approcher de vous, tout en tenant le petit paquet dans ses mains.<br>
												<br>
												<div class="dialogue">
													<div class="portrait">
														<img src="/escaperpg/images/avent/arthur.png">
													</div>
													<div class="bulleperso">
														<p>
															Tiens, regarde ce qui est écrit sur l\'étiquette.
														</p>
													</div>
												</div>
												<br>
												Vous vous saisissez de la boîte et constatez avec étonnement qu\'il y est écrit : "Pour Sarah Latour, en guise de remerciements".<br>
												Vous n\'en croyez pas vos yeux !
												<div class="dialogue">
													<div class="portrait">
														<img src="/escaperpg/images/avent/arthur.png">
													</div>
													<div class="bulleperso">
														<p>
															Et alors, qu\'est-ce que tu attends ? Ouvre-le !
														</p>
													</div>
												</div>
											</p>
											<center>
												<form action="retour.php" method="post">
													<input type="submit" name="ouvrir" value="ouvrir le cadeau.">
												</form>
											</center>
										';
										break;
									case "75":
										echo'
											<p>
												Rien ne se passe.
												Avez-vous remarqué qu\'il y avait déjà du carburant dans le réservoir ?<br>
												<br>
												- Placer le sapence dans son compartiment.<br>
												- Calibrer le régulateur sur 4 et abaisser le levier.<br>
												- Remplir le réservoir aux 3/4.<br>
												- Appuyer sur le bouton rouge.
												<br>
												<div id="enigmelieu">
													<img src="/escaperpg/images/avent/machineperenoel3.png">
													<div id="machineperenoel">
														<input type="range" name="range" min="1" max="9" value="4">
														<form action="repairs.php" method="post">
														<input type="text" name="reservoir" id="reservoir">
															<div id="boutonmachineoff">
																<button type="submit" name="boutonmachine">
																	<img src="/escaperpg/images/avent/boutonoff.png">
																</button>
															</div>
														</form>
													</div>
												</div>
											</p>
											<center>
												<form action="repairs.php" method="post">
													<button type="submit" name="indice" class="boutonindice"></button>
												</form>
											</center>
										';
										break;
									default:
										echo'
											<p>
												Rien ne se passe.
												Êtes-vous sûre d\'avoir correctement rempli le réservoir ?<br>
												<br>
												- Placer le sapence dans son compartiment.<br>
												- Calibrer le régulateur sur 4 et abaisser le levier.<br>
												- Remplir le réservoir aux 3/4.<br>
												- Appuyer sur le bouton rouge.
												<br>
												<div id="enigmelieu">
													<img src="/escaperpg/images/avent/machineperenoel3.png">
													<div id="machineperenoel">
														<input type="range" name="range" min="1" max="9" value="4">
														<form action="repairs.php" method="post">
														<input type="text" name="reservoir" id="reservoir">
															<div id="boutonmachineoff">
																<button type="submit" name="boutonmachine">
																	<img src="/escaperpg/images/avent/boutonoff.png">
																</button>
															</div>
														</form>
													</div>
												</div>
											</p>
											<center>
												<form action="repairs.php" method="post">
													<button type="submit" name="indice class="boutonindice"></button>
												</form>
											</center>
										';
								}
						}
					else
						{
							echo '
								<audio src="/escaperpg/sons/avent/etape2.mp3" autoplay></audio>
								<p>
									- Placer le sapence dans son compartiment.<br>
									- Calibrer le régulateur sur 4 et abaisser le levier.<br>
									- Remplir le réservoir aux 3/4.<br>
									- Appuyer sur le bouton rouge.
									<br>
									<div id="enigmelieu">
										<img src="/escaperpg/images/avent/machineperenoel3.png">
										<div id="machineperenoel">
											<input type="range" name="range" min="1" max="9" value="4">
											<form action="repairs.php" method="post">
												<input type="text" name="reservoir" id="reservoir">
												<div id="boutonmachineoff">
													<button type="submit" name="boutonmachine">
														<img src="/escaperpg/images/avent/boutonoff.png">
													</button>
												</div>
											</form>
										</div>
									</div>
								</p>
								<center>
									<form action="repairs.php" method="post">
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