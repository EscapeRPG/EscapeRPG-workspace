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
		<title>Grenier - Secrets Familiaux</title>
	</head>
	
	<body onload="chargement()">
		<?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/header.php"; ?>
		<div id="banniere"><img src="/escaperpg/images/secrets/secretsfamiliauxmini.png" alt="secrets familiaux bannière"></div>
		<main>
			<nav>
				<a href="/escaperpg/images/secrets/inspecteurdeckard.png" rel="lightbox[bastian]" title="inspecteurdeckard"><img src="/escaperpg/images/secrets/inspecteurdeckardmini.png" alt="inspecteur deckard"></a>
				<div id="inventairefooter"><input type="submit" value="INVENTAIRE"></div>
				<div id="motsdepasse"><input type="submit" value="NOTES"></div>
				<?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/secrets/includes/navigationmanoir.php"; ?>
				<a href="/escaperpg/aventures/secrets/save/save.php" target="_blank" rel="noreferrer"><input type="submit" name="save" value="SAUVEGARDER"></a>
			</nav>
			<div id="txt">
				<?php
					if ($_SESSION['coffrenigme'])
						{
							echo '
								<p>
									<div id="enigmelieu">
										<img src="/escaperpg/images/secrets/vuegrenier.png">
									</div>
									<br>
									Il semblerait qu\'il n\'y ait plus rien d\'utile par ici.
								</p>
							';
						}
					elseif ($_SESSION['jour'] OR $_SESSION['visitepellington'])
						{
							if (isset ($_POST['sev']))
								{
									echo '
										<script src="/escaperpg/scripts/inventaireadd.js"></script>
										<p>
											Il semblerait que vous n\'ayez plus rien à trouver par ici.
										</p>
										<center>
											<form action="grenier" method="post">
												<input type="submit" name="retour" value="Retour.">
											</form>
										</center>
									';
									$_SESSION['sev'] = true;
								}
							elseif ($_SESSION['sev'] OR $_SESSION['coffrenigme'])
								{
									echo '
										<p>
											<div id="enigmelieu">
												<img src="/escaperpg/images/secrets/vuegrenier.png">
											</div>
											<br>
											Il semblerait qu\'il n\'y ait plus rien d\'utile par ici.
										</p>
									';
								}
							elseif (isset ($_POST['grenierpiece']))
								{
									echo '
										<p>
											<div id="enigme">
												<a href="/escaperpg/images/secrets/ev.png" rel="lightbox[invent]"><img src="/escaperpg/images/secrets/ev.png"></a>
											</div>
											Sur le clavier du piano, vous trouvez une petite pièce.<br>
											Cela ne ressemble pas à une pièce de monnaie, car elle ne semble pas avoir de valeur indiquée dessus.
											Peut-être sert-elle à autre chose ?<br>
											<br>
											En attendant d\'en savoir plus, vous la mettez dans votre poche.
										</p>
										<center>
											<form action="grenier" method="post">
												<input type="submit" name="sev" value="Ajouter à l\'inventaire.">
											</form>
										</center>
									';
								}
							elseif (isset ($_POST['piano']) OR $_SESSION['grenierpiano'])
								{
									echo '
										<p>
											<div id="enigmelieu">
												<img src="/escaperpg/images/secrets/vuegrenier.png">
												<div id="grenierpiece">
													<form action="grenier" method="post">
														<button type="submit" name="grenierpiece">
															<img src="/escaperpg/images/secrets/grenierpiece.png">
														</button>
													</form>
												</div>
											</div>
											<br>
											Vous ouvrez le clavier du piano.
											En appuyant sur l\'une des touches, vous entendez une note discordante retentir.
											Cet instrument mériterait une bonne révision.
										</p>
									';
									$_SESSION['grenierpiano'] = true;
								}
							else
								{
									echo '
										<p>
											<div id="enigmelieu">
												<img src="/escaperpg/images/secrets/vuegrenier.png">
												<div id="piano">
													<form action="grenier" method="post">
														<button type="submit" name="piano">
															<img src="/escaperpg/images/secrets/pianoclosed.png">
														</button>
													</form>
												</div>
											</div>
											<br>
											Le grenier occupe tout le dernier étage de l\'aile Est et est rempli de tout un tas d\'affaires.<br>
											Maintenant que le jour est levé, vous pouvez envisager de fouiller un peu plus dans toutes ces affaires. Peut-être y trouverez-vous quelque chose d\'intérêt ?
										</p>
									';
								}
						}
					else
						{
							echo '
								<p>
									<div id="enigmelieu">
										<img src="/escaperpg/images/secrets/vuegreniernuit.png">
									</div>
									<br>
									Le grenier occupe tout le dernier étage de l\'aile Est et est rempli de tout un tas d\'affaires.<br>
									Il pourrait y avoir des choses intéressantes ici, mais vous y reviendrez plus tard, lorsque vous serez moins fatigué et qu\'il y aura plus de lumière.
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
