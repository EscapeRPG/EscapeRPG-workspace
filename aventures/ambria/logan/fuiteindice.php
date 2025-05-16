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
		<title>La Bibliothèque - Le Trésor d'Ambria</title>
	</head>
	
	<body>
		<?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/header.php"; ?>
		<div id="banniere"><img src="/escaperpg/images/ambria/tresorambriamini.png"></div>
		<main>
			<nav>
				<a href="/escaperpg/images/ambria/loganbarthelemymini.png" rel="lightbox[logan]" title="Logan Barthélémy"><img src="/escaperpg/images/ambria/loganbarthelemymini.png"></a>
				<div id="inventairefooter"><input type="submit" onclick="inventaireshow()" value="INVENTAIRE"></div>
				<div id="motsdepasse"><input type="submit" onclick="mdpshow()" value="NOTES"></div>
				<a href="/escaperpg/aventures/ambria/save/save.php" target="_blank" rel="noreferrer"><input type="submit" name="save" value="SAUVEGARDER"></a>
			</nav>
			<div id="txt">
				<?php
					if (isset ($_POST['indice2']))
						{
							echo'
								<div id="indice">
									Les ruelles se révèlent labyrinthiques, vous devriez faire attention.
									N\'hésitez pas à dessiner un plan, chaque direction que vous prenez correspond à une case et vous indique ce qui se trouve autour.<br/>
									Vous allez devoir réaliser plusieurs actions pour pouvoir sortir d\'ici, essayez de fouiller partout pour voir ce qui est possible.
								</div>
								<center>
									<form action="fuiteindice" method="post">
										<button type="submit" name="indice3" class="boutonindice"></button>
									</form>
								</center>
							';
						}
					elseif (isset ($_POST['indice3']))
						{
							echo'
								<div id="indice">
									Les ruelles se révèlent labyrinthiques, vous devriez faire attention.
									N\'hésitez pas à dessiner un plan, chaque direction que vous prenez correspond à une case et vous indique ce qui se trouve autour.<br/>
									Vous allez devoir réaliser plusieurs actions pour pouvoir sortir d\'ici, essayez de fouiller partout pour voir ce qui est possible.<br>
									Vous devez d\'abord aller parler à un type, puis récupérer sa clé, vous rendre au Nord-Est vers la taverne pour récupérer un biscuit que vous donnerez à la mouette au Nord-Ouest,
									avant de revenir voir le type dans sa ruelle qui vous permettra d\'ouvrir la porte de sortie, vers le Nord.
								</div>
								<center>
									<form action="fuiteindice" method="post">
										<button type="submit" name="reponse" class="boutonreponse"></button>
									</form>
								</center>
							';
						}
					elseif (isset ($_POST['reponse']))
						{
							echo'
								<div id="enigmelieu">
									<img src="/escaperpg/images/ambria/labyrinthefuitereponse.png">
								</div>
								<div class="reponse">
									La case en G5 correspond à l\'emplacement du type que vous devez rencontrer.<br>
									En D5, vous pouvez trouver la clé qu\'il a perdue.<br>
									Rendez-vous ensuite en F3 puis au Nord pour ouvrir la barrière qui vous bloquait la voie, puis en G2 pour y récupérer des biscuits.<br>
									Allez les donner à la mouette en A1 pour récupérer le chapeau.<br>
									Une fois ceci fait, revenez en G5 pour retrouver le type et lui rendre son couvre-chef.
									Il vous accompagnera ensuite jusqu\'en C1 pour vous permettre de sortir.
								</div>
							';
						}
					else
						{
							echo'
								<div id="indice">
									Les ruelles se révèlent labyrinthiques, vous devriez faire attention.
									N\'hésitez pas à dessiner un plan, chaque direction que vous prenez correspond à une case et vous indique ce qui se trouve autour.
								</div>
								<center>
									<form action="fuiteindice" method="post">
										<button type="submit" name="indice2" class="boutonindice"></button>
									</form>
								</center>
							';
						}
					echo'
						<center>
							<form action="fuiteindice" method="post">
								<input type="submit" name="close" value="retour." onclick="window.close()">
							</form>
						</center>
					';
				?>
			</div>
		</div>
		<div id="load"><div id="loader"></div></div>
		<script src="/escaperpg/scripts/aventures-chargement.js"></script>
		<?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/ambria/logan/includes/footer.php"; ?>
	</body>
</html>
