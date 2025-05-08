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
		<title>Papier - Secrets Familiaux</title>
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
					if (isset($_POST['papier']))
						{
							echo '
								<script src="/escaperpg/scripts/inventaireadds.js"></script>
								<p>
									Vous posez le coffret vide quelque part, il ne vous sera plus utile maintenant.<br>
									<br>
									Que désirez-vous faire maintenant ?
								</p>
								<center>
									<form action="rdc.php" method="post">
										<input type="submit" name="retour" value="Retour.">
									</form>
								</center>
							';
							$_SESSION['papier'] = true;
							$_SESSION['petitecle'] = true;
							$_SESSION['coffrenigme'] = false;
							$_SESSION['coffret'] = false;
							$_SESSION['sdi'] = false;
							$_SESSION['sad'] = false;
							$_SESSION['sev'] = false;
							$_SESSION['sse'] = false;
							$_SESSION['spo'] = false;
						}
					elseif ($_SESSION['papier'])
						{
							echo'
								<p>
									<div id="enigme">
										<a href="/escaperpg/images/secrets/papier.png" rel="lightbox[invent]"><img src="/escaperpg/images/secrets/papier.png"></a>
									</div>
									<br>
									Un papier trouvé dans le coffret mystérieux. Une phrase énigmatique y est inscrite.
								</p>
							';
							if (isset($_POST['indice']))
								{
									echo '
										<p>
											<span class="indice">
												Avez-vous trouvé de quoi déchiffrer ce message ?<br>
												Si ce n\'est pas le cas, vous devriez vous intéresser d\'un peu plus près à la porte du bureau de votre oncle, quelque chose pourrait attirer votre attention.
											</span>
										</p>
										<center>
											<form action="papier.php" method="post">
												<button type="submit" name="indice2" class="boutonindice"></button>
											</form>
										</center>
									';
								}
							elseif (isset($_POST['indice2']))
								{
									echo '
										<p>
											<span class="indice">
												Avez-vous trouvé de quoi déchiffrer ce message ?<br>
												Si ce n\'est pas le cas, vous devriez vous intéresser d\'un peu plus près à la porte du bureau de votre oncle, quelque chose pourrait attirer votre attention.<br>
												Il s\'agit d\'un message codé par la technique des templiers.
												Chaque tableau est séparé en 4 parties, essayez de visualiser chacune de ces parties indépendament pour décoder le message.
											</span>
										</p>
										<center>
											<form action="papier.php" method="post">
												<button type="submit" name="reponse" class="boutonreponse"></button>
											</form>
										</center>
									';
								}
							elseif (isset($_POST['reponse']))
								{
									echo '
										<p>
											<span class="reponse">
												Le message codé donne : "L\'Éclairé ouvre le chemin". Sans doute un mot de passe ?
											</span>
										</p>
									';
								}
							else
								{
									echo '
										<center>
											<form action="papier.php" method="post">
												<button type="submit" name="indice" class="boutonindice"></button>
											</form>
										</center>
									';
								}
						}
					else
						{
							echo '
								<p>
									<div id="enigme">
										<a href="/escaperpg/images/secrets/papier.png" rel="lightbox[invent]"><img src="/escaperpg/images/secrets/papier.png"></a>
									</div>
									<div id="enigme">
										<a href="/escaperpg/images/secrets/petitecle.png" rel="lightbox[invent]"><img src="/escaperpg/images/secrets/petitecle.png"></a>
									</div>
									<br>
									À l\'intérieur du coffret, vous trouvez une petite clé que vous mettez dans votre poche ainsi qu\'un morceau de papier sur lequel est marquée une phrase étrange.<br>
									Il semblerait qu\'il s\'agisse d\'un code, mais comment faire pour le déchiffrer ?<br>
									<br>
									Vous le prenez avec vous pour pouvoir le consulter quand vous voudrez.
								</p>
								<center>
									<form action="papier.php" method="post">
										<input type="submit" name="papier" value="Ajouter à l\'inventaire.">
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