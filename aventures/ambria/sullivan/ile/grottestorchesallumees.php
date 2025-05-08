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
		<title>Les Grottes - Le Trésor d'Ambria</title>
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
				<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/ambria/sullivan/includes/navigationile.php"; ?>
			</nav>
			<div id="txt">
				<?php
					if ($_SESSION['portescite'])
						{
							echo'
								<audio src="/escaperpg/sons/ambria/grottetorche.mp3" autoplay></audio>
								<div id="enigmelieu">
									<img src="/escaperpg/images/ambria/grottestorchesallumees.png">
								</div>
								<p>
									Vous revenez dans l\'antichambre où pousse l\'étonnante mousse bioluminescente.
									Avec vos torches, vous essayer de l\'observer de près et constatez que certains endroits semblent luire plus fortement,
									mais la lumière que vous émettez est trop puissante pour vraiment distinguer quoi que ce soit.<br>
									<br>
									Cette mousse pourrait-elle vous apporter quelque chose ?
								</p>
							';
							if (isset ($_POST['indice']))
								{
									echo'
										<div id="indice">
											Cette mousse n\'est réellement bioluminescente que si la pièce est plongée dans le noir.
										</div>
										<center>
											<form action="grottestorchesallumees.php" method="post">
												<button type="submit" name="indice2" class="boutonindice"></button>
											</form>
										</center>
									';
								}
							elseif (isset ($_POST['indice2']))
								{
									echo'
										<div id="indice">
											Cette mousse n\'est réellement bioluminescente que si la pièce est plongée dans le noir.<br>
											Essayez de trouver un moyen pour éteindre vos torches.
										</div>
										<center>
											<form action="grottestorchesallumees.php" method="post">
												<button type="submit" name="indice3" class="boutonindice"></button>
											</form>
										</center>
									';
								}
							elseif (isset ($_POST['indice3']))
								{
									echo'
										<div id="indice">
											Cette mousse n\'est réellement bioluminescente que si la pièce est plongée dans le noir.<br>
											Essayez de trouver un moyen pour éteindre vos torches.<br>
											N\'oubliez pas qu\'il faut bien observer tous les éléments de cette page pour trouver la solution.
										</div>
										<center>
											<form action="grottestorchesallumees.php" method="post">
												<button type="submit" name="reponse" class="boutonreponse"></button>
											</form>
										</center>
									';
								}
							elseif (isset ($_POST['reponse']))
								{
									echo'
										<div id="reponse">
											Remplacez l\'adresse actuelle pour vous rendre sur <a href="grottestorcheseteintes.php">grottestorcheseteintes</a> et poursuivre votre aventure.
										</div>
									';
								}
							else
								{
									echo'
										<center>
											<form action="grottestorchesallumees.php" method="post">
												<button type="submit" name="indice" class="boutonindice"></button>
											</form>
										</center>
									';
								}
						}
					elseif (isset ($_POST['lueur']) OR $_SESSION['grottes'])
						{
							echo'
								<audio src="/escaperpg/sons/ambria/grottetorche.mp3" autoplay></audio>
								<div id="enigmelieu">
									<img src="/escaperpg/images/ambria/grottestorchesallumees.png">
								</div>
								<p>
									Alors que vous avancez, vous voyez que la lueur semble provenir d\'une sorte d\'antichambre un peu plus vaste.<br>
									En y débouchant, vous découvrez que les murs sont tapissés d\'une mousse verdâtre bioluminescente.
									Vous prenez quelques instants pour admirer cette fascinante étrangeté naturelle, évoquant le phénomène que certains marins aperçoivent parfois en mer lorsqu\'un certain type de plancton abonde.<br>
									<br>
									N\'étant cependant pas venu pour contempler le paysage, vous reprenez rapidement la route.
								</p>
								<center>
									<form action="portescite.php" method="post">
										<input type="submit" name="sortiegrottes" value="Chercher la sortie.">
									</form>
								</center>
							';
							$_SESSION['grottes'] = true;
						}
					else
						{
							echo'
								<audio src="/escaperpg/sons/ambria/grottetorche.mp3" autoplay></audio>
								<p>
									Vous avancez dans les grottes obscures, uniquement éclairé par les flammes des torches.<br>
									Les hommes sont silencieux et seuls les bruits de vos pas se font entendre, se répercutant en échos vers les profondeurs.<br>
									<br>
									Alors que vous marchez ainsi depuis un long moment, vous remarquez une sorte de lueur, droit devant vous.
								</p>
								<center>
									<form action="grottestorchesallumees.php" method="post">
										<input type="submit" name="lueur" value="Suivant.">
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