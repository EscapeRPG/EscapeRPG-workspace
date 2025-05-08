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
	   
		<link rel="stylesheet" href="/escaperpg/aventures/secrets/stylesecrets.css">
		<meta charset="utf-8">
		<title>Bibliothèque - Secrets Familiaux</title>
	</head>
	
	<body onload="chargement()">
		<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/header.php"; ?>
		<div id="banniere"><img src="/escaperpg/images/secrets/secretsfamiliauxmini.png"></div>
		<div id="bloc_page">
			<nav>
				<a href="/escaperpg/images/secrets/inspecteurdeckard.png" rel="lightbox[bastian]" title="inspecteurdeckard"><img src="/escaperpg/images/secrets/inspecteurdeckardmini.png"></a>
				<div id="inventairefooter"><input type="submit" onclick="inventaireshow()" value="INVENTAIRE"></div>
				<div id="motsdepasse"><input type="submit" onclick="mdpshow()" value="NOTES"></div>
				<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/secrets/includes/navigationmanoir.php"; ?>
				<a href="/escaperpg/aventures/secrets/save/save.php" target="_blank" rel="noreferrer"><input type="submit" name="save" value="SAUVEGARDER"></a>
			</nav>
			<div id="txt">
				<?php
					if (isset($_POST['magna']))
						{
							if ($_SESSION['templar'])
								{
									echo '
										<script src="/escaperpg/scripts/inventaireadd.js"></script>
										<p>
											Vous prenez le livre avec vous, au cas où.<br>
											<br>
											Manifestement, vous n\'avez plus rien à trouver ici.
										</p>
									';
									$_SESSION['magna'] = true;
								}
							else
								{
									echo '
										<script src="/escaperpg/scripts/inventaireadd.js"></script>
										<p>
											Vous prenez le livre avec vous, au cas où.
										</p>
										<center>
											<form action="bibliotheque.php" method="post">
												<input type="text" name="bibliotheque"> <input type="submit" name="chercher" value="Chercher.">
											</form>
										</center>
									';
									$_SESSION['magna'] = true;
								}
						}
					elseif ($_SESSION['magna'] AND $_SESSION['templar'])
						{
							echo '
								<p>
									Il ne semble plus rien y avoir d\'intéressant ici maintenant.
								</p>
							';
						}
					elseif (isset($_POST['bibliotheque']))
						{
							switch(str_replace($search, $replace, stripslashes($_POST['bibliotheque'])))
								{
									case "symbole":
										echo '
											<p>
												L\'un des livres attire votre attention.<br>
												La couverture comporte un symbole étrangement similaire à celui gravé sur la porte du bureau.<br>
												Il semblerait que ce symbole procure une protection à l\'endroit où on le trace.
												Sur une porte, cela la rendrait inviolable, à moins de connaitre la bonne formule.<br>
												<br>
												En feuilletant les pages, de petits papiers tombent du livre.
												<br>
												<div id="enigme">
													<a href="/escaperpg/images/secrets/templar.png" rel="lightbox[invent]"><img src="/escaperpg/images/secrets/templar.png"></a>
												</div>
											</p>
											<center>
												<form action="bibliotheque.php" method="post">
													<input type="submit" name="templar" value="Ajouter à l\'inventaire.">
												</form>
											</center>
										';
										break;
									case "opusfavori":
										echo '
											<p>
												Vous essayez de trouver quel était le livre favori de votre oncle, mais vous baissez rapidement les bras face au nombre extravagant de livres présents ici.<br>
												<br>
												Peut-être auriez-vous plus de chance en interrogeant les domestiques ?
											</p>
											<center>
												<form action="bibliotheque.php" method="post">
													<input type="text" name="bibliotheque"> <input type="submit" name="chercher" value="Chercher.">
												</form>
											</center>
										';
										break;
									case "magnamater":
										echo '
											<p>
												<div id="enigme">
													<a href="/escaperpg/images/secrets/magnamater.png" rel="lightbox[invent]"><img src="/escaperpg/images/secrets/magnamater.png"></a>
												</div>
												Grâce aux informations fournies par Téona, vous trouvez rapidement un vieux livre nommé Magna Mater.<br>
												Il semblerait que ce soit un livre traitant d\'un ancien culte pratiquement oublié et terrifiant.
												Vous frissonnez en parcourant les quelques pages qu\'il contient mais passez vite à autre chose, ce n\'est pas cela qui vous intéresse ici.<br>
												Il s\'agit du <span class="mdp">deuxième</span> tome de la collection.
											</p>
											<center>
												<form action="bibliotheque.php" method="post">
													<input type="submit" name="magna" value="Ajouter à l\'inventaire.">
												</form>
											</center>
										';
										$_SESSION['mdp23'] = true;
										break;
									default:
										echo '
											<p>
												Vous avez beau chercher, vous ne trouvez rien de particulier ici.<br>
												Ou bien peut-être est-ce parce que vous ne cherchez pas la bonne chose ?
											</p>
											<center>
												<form action="bibliotheque.php" method="post">
													<input type="text" name="bibliotheque"> <input type="submit" name="chercher" value="Chercher.">
												</form>
											</center>
										';
										break;
								}
						}
					elseif (isset($_POST['templar']))
						{
							if ($_SESSION['magna'])
								{
									echo '
										<script src="/escaperpg/scripts/inventaireadd.js"></script>
										<p>
											Vous prenez les morceaux de papier avec vous, au cas où.<br>
											<br>
											Manifestement, vous n\'avez plus rien à trouver ici.
										</p>
									';
									$_SESSION['templar'] = true;
								}
							else
								{
									echo '
										<script src="/escaperpg/scripts/inventaireadd.js"></script>
										<p>
											Vous prenez les morceaux de papier avec vous, au cas où.
										</p>
										<center>
											<form action="bibliotheque.php" method="post">
												<input type="text" name="bibliotheque"> <input type="submit" name="chercher" value="Chercher.">
											</form>
										</center>
									';
									$_SESSION['templar'] = true;
								}
						}
					else
						{
							echo '
								<p>
									La pièce est immense et chaque mur est occupé par des étagères remplies de livres de toutes sortes.
								</p>
								<center>
									<form action="bibliotheque.php" method="post">
										<input type="text" name="bibliotheque"> <input type="submit" name="chercher" value="Chercher.">
									</form>
								</center>
							';
						}
				?>
			</div>
		</div>
		<div id="load"><div id="loader"></div></div>
		<script src="/escaperpg/scripts/aventures-chargement.js"></script>
		<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/secrets/includes/footer.php"; ?>
	</body>
</html>