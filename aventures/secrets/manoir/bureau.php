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
		<title>Bureau - Secrets Familiaux</title>
	</head>
	
	<body>
		<?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/header.php"; ?>
		<div id="banniere"><img src="/escaperpg/images/secrets/secretsfamiliauxmini.png"></div>
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
					if (isset ($_POST['phr']) AND str_replace($search, $replace, stripslashes($_POST['phr'])) == "leclaireouvrelechemin")
						{
							echo '
								<p>
									<audio src="/escaperpg/sons/secrets/bureauouvert.mp3" autoplay></audio>
									Alors que vous prononcez les mots, vous sentez l\'air autour de vous devenir un peu plus dense.<br>
									<br>
									Vous entendez un petit bruit, comme un claquement, et la porte s\'ouvre.
								</p>
								<center>
									<form action="bureauprive" method="post">
										<input type="submit" name="entrer" value="Entrer.">
									</form>
								</center>
							';
						}
					elseif (isset ($_POST['phr']))
						{
							echo '
								<p>
									<div id="enigmelieu">
										<img src="/escaperpg/images/secrets/portebureau.png">
										<div id="symbureau">
											<form action="bureau" method="post">
												<button type="submit" name="symporte">
													<img src="/escaperpg/images/secrets/symbur.png">
												</button>
											</form>
										</div>
									</div>
									<br>
									Rien ne se passe.
								</p>
								<center>
									<form action="bureau" method="post">
										<input type="text" name="phr"> <input type="submit" name="ouvrir" value="Ouvrir.">
									</form>
								</center>
							';
						}
					elseif (isset ($_POST['symporte']))
						{
							echo '
								<p>
									<div id="enigmelieu">
										<img src="/escaperpg/images/secrets/portebureau.png">
										<div id="symbureau">
											<form action="bureau" method="post">
												<button type="submit" name="symporte">
													<img src="/escaperpg/images/secrets/symbur.png">
												</button>
											</form>
										</div>
									</div>
									<br>
									Un <span class="mdp">symbole</span> est gravé dans le bois de la porte.<br>
									Vous n\'avez aucune idée de sa signification, mais peut-être pourriez-vous poser des questions aux domestiques ?
								</p>
								<center>
									<form action="bureau" method="post">
										<input type="text" name="phr"> <input type="submit" name="ouvrir" value="Ouvrir.">
									</form>
								</center>
							';
							$_SESSION['mdp22'] = true;
						}
					else
						{
							echo'
								<p>
									<div id="enigmelieu">
										<img src="/escaperpg/images/secrets/portebureau.png">
										<div id="symbureau">
											<form action="bureau" method="post">
												<button type="submit" name="symporte">
													<img src="/escaperpg/images/secrets/symbur.png">
												</button>
											</form>
										</div>
									</div>
									<br>
									Lorsque vous essayez d\'ouvrir le <span class="mdp">bureau</span> de travail de votre oncle, vous vous rendez compte que la porte est fermée.<br>
									Vous vous apprêtez à sortir le jeu de clés donné par Gaspard lorsque vous constatez qu\'il n\'y a aucune serrure.<br>
									<br>
									Cette porte doit être scellée par un autre moyen.
								</p>
								<center>
									<form action="bureau" method="post">
										<input type="text" name="phr"> <input type="submit" name="ouvrir" value="Ouvrir.">
									</form>
								</center>
							';
							$_SESSION['mdp13'] = true;
						}
				?>
			</div>
		</div>
		<div id="load"><div id="loader"></div></div>
		<script src="/escaperpg/scripts/aventures-chargement.js"></script>
		<?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/secrets/includes/footer.php"; ?>
	</body>
</html>
