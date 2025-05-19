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
	   
		<link rel="stylesheet" href="/escaperpg/aventures/ambria/css/style.css">
		<meta charset="utf-8">
		<title>Les Grottes - Le Trésor d'Ambria</title>
	</head>
	
	<body onload="chargement()">
		<?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/header.php"; ?>
		<div id="banniere"><img src="/escaperpg/images/ambria/tresorambriamini.png"></div>
		<main>
			<nav>
				<a href="/escaperpg/images/ambria/loganbarthelemymini.png" rel="lightbox[logan]" title="Logan Barthélémy"><img src="/escaperpg/images/ambria/loganbarthelemymini.png"></a>
				<div id="inventairefooter"><input type="submit" value="INVENTAIRE"></div>
				<div id="motsdepasse"><input type="submit" value="NOTES"></div>
				<a href="/escaperpg/aventures/ambria/save/save.php" target="_blank" rel="noreferrer"><input type="submit" name="save" value="SAUVEGARDER"></a>
				<?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/ambria/logan/includes/navigationile.php"; ?>
			</nav>
			<div id="txt">
				<?php
					echo'
						<audio src="/escaperpg/sons/ambria/grotte.mp3" autoplay></audio>
						<div id="enigmelieu">
							<img src="/escaperpg/images/ambria/logangrottestorcheseteintes.png">
						</div>
						<p>
							Désirant profiter pleinement du spectacle offert par la mousse, vous éteignez les torches.<br>
							<br>
							Vous ne pouvez alors retenir un son admiratif devant la beauté féerique du tableau qui s\'offre alors.<br>
							<br>
							Éclairant la pièce d\'une douce lueur vert-bleu, la mousse révèle un tout nouveau paysage dans cette obscurité, s\'étendant des parois jusqu\'au plafond dans un enchevêtrement compliqué.
						</p>
					';
					if (isset ($_POST['indice']))
						{
							echo'
								<div id="indice">
									Observez bien les motifs tracés par la mousse. Ne vous rappellent-ils par quelque chose ?
								</div>
								<center>
									<form action="grottestorcheseteintes" method="post">
										<button type="submit" name="indice2" class="boutonindice"></button>
									</form>
								</center>
							';
						}
					elseif (isset ($_POST['indice2']))
						{
							echo'
								<div id="indice">
									Observez bien les motifs tracés par la mousse. Ne vous rappellent-ils par quelque chose ?<br>
									Il s\'agit d\'une partie de la traduction du langage ambrien.
								</div>
								<center>
									<form action="grottestorcheseteintes" method="post">
										<button type="submit" name="indice3" class="boutonindice"></button>
									</form>
								</center>
							';
						}
					elseif (isset ($_POST['indice3']))
						{
							echo'
								<div id="indice">
									Observez bien les motifs tracés par la mousse. Ne vous rappellent-ils par quelque chose ?<br>
									Il s\'agit d\'une partie de la traduction du langage ambrien.<br>
									Sullivan aura peut-être accès à la seconde partie ?
								</div>
								<center>
									<form action="grottestorcheseteintes" method="post">
										<button type="submit" name="reponse" class="boutonreponse"></button>
									</form>
								</center>
							';
						}
					elseif (isset ($_POST['reponse']))
						{
							echo'
								<div id="reponse">
									Discutez avec l\'autre joueur pour constituer l\'alphabet qui vous permettra de traduire le message sur les portes de la cité.
								</div>
							';
						}
					else
						{
							echo'
								<center>
									<form action="grottestorcheseteintes" method="post">
										<button type="submit" name="indice" class="boutonindice"></button>
									</form>
								</center>
							';
						}
					$_SESSION['torcheseteintes'] = true;
				?>
			</div>
		</div>
		<div id="load"><div id="loader"></div></div>
		<script src="/escaperpg/scripts/aventures-chargement.js"></script>
		<?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/ambria/logan/includes/footer.php"; ?>
	</body>
</html>
