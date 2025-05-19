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
		<title>Introduction - Le Grenier d'Arthur</title>
	</head>
	
	<body onload="chargement()">
		<?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/header.php"; ?>
		<div id="banniere"><img src="/escaperpg/images/avent/aventmini.png"></div>
		<main>
			<nav>
				<img src="/escaperpg/images/avent/sarah.png">
				<form action="/escaperpg/aventures/avent/cartes.php" target="_blank" rel="noreferrer" method="post"><input type="submit" name="cartes" value="Cartes"></form>
				<a href="/escaperpg/aventures/avent/save/save.php" target="_blank" rel="noreferrer"><input type="submit" name="save" value="SAUVEGARDER"></a>
			</nav>
			<div id="txt">
				<?php
					if (isset($_POST['new']))
						{
							echo'<div id="succespopup">';
							$nouveausucces = '<img src="/escaperpg/images/succes/general/debut.png"><span><u><b>Se lancer dans l\'aventure</b></u><br>Commencer une aventure pour la première fois</span>';
							$scenario = 'general';
							$description = 'début';
							$cache = 'non';
							$rarete = 'succesnormal';
							include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/succesadd.php";
							$nouveausucces = '<img src="/escaperpg/images/succes/avent/debut.png"><span><u><b>Il était une fois...</b></u><br>Lancer l\'aventure pour la première fois</span>';
							$scenario = 'avent';
							$description = 'début';
							$cache = 'non';
							$rarete = 'succesnormal';
							include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/succesadd.php";
							echo'</div>';
							
							include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/avent/includes/sessioninc.php";
							echo '
								<p>
									Samedi 17 décembre 2022.<br>
									<br>
									Vous êtes Sarah Latour, une jeune fille de 11 ans curieuse et pleine de vie.<br>
									Noël approche à grands pas, les vacances viennent juste de commencer et tous vos amis sont excités à l\'idée de recevoir des tas de cadeaux.
									Cependant, dans votre famille, Noël n\'est pas une fête comme les autres.<br>
									Cette période de l\'année est simplement une occasion de revoir vos proches, dont certains habitent loin.
									Ce qui vous rend particulièrement heureuse est l\'idée que vous allez bientôt retrouver votre grand-père Arthur, un vieil inventeur excentrique que vous ne voyez pas souvent.
									Vous savez que votre père et lui sont fâchés depuis des années et qu\'ils n\'acceptent de se voir qu\'à cette unique occasion.<br>
									Vous adorez votre grand-père et aimeriez le voir davantage.<br>
									<br>
									Le début des vacances d\'hiver, c\'est le moment où votre père vous emmène passer quelques jours chez Arthur.<br>
									<br>
									Vous êtes dans la voiture avec lui.<br>
									<br>
									<div class="dialogue">
										<div class="portrait">
											<img src="/escaperpg/images/avent/pere.png">
										</div>
										<div class="bulleperso">
											<p>
												Je reviendrai te chercher samedi prochain pour le repas de Noël.
												N\'embête pas ton grand-père pendant ce temps, tu sais comment il est.<br>
												<br>
												Et s\'il te raconte encore ses histoires...
											</p>
										</div>
									</div>
									<br>
									Il marque une légère pause et soupire.<br>
									<br>
									<div class="dialogue">
										<div class="portrait">
											<img src="/escaperpg/images/avent/pere.png">
										</div>
										<div class="bulleperso">
											<p>
												Eh bien, n\'y prête pas trop attention. Il a toujours eu une imagination débordante.
											</p>
										</div>
									</div>
									<br>
									Vous n\'avez jamais compris les raisons de la dispute entre votre père et votre aïeul ni pourquoi il vous répète chaque année ces conseils, mais au moins vous permet-il de passer quelques jours chez ce gentil vieillard.
								</p>
								<center>
									<form action="maison" method="post">
										<input type="submit" name="suivant" value="SUIVANT.">
									</form>
								</center>
							';
						}
					else
						{
							echo'
								<p>
									<div class="dialogue">
										<div class="portrait">
											<img src="/escaperpg/images/narrateur.png" alt="narrateur">
										</div>
										<div class="bulleperso">
											<p>
												Ce scénario se joue avec un jeu de cartes virtuel disponible <a href="/escaperpg/aventures/avent/cartes.php" target="_blank" rel="noreferrer">ici</a>.
												Vous pourrez également y revenir à tout moment durant votre aventure en cliquant sur le bouton "CARTES." du menu à gauche.<br>
												<br>
												L\'histoire vous demandera régulièrement de retourner l\'une de ces cartes, ce qui vous apportera une nouvelle information pour continuer l\'aventure.
												Lorsque vous devrez tirer l\'une de ces cartes, un petit son de cloche retentira et un message en rouge vous indiquera le numéro de la carte à retourner, faites donc bien attention !<br>
												<br>
												Si vous le préférez, vous pouvez obtenir une version imprimable des cartes <a href="/escaperpg/images/avent/cartes/versionimprimable.pdf" target="_blank" rel="noreferrer">ici</a> pour avoir le jeu de cartes entre les mains.
												Veillez alors à imprimer les pages 1 et 2 en recto-verso, de même pour les pages 3 et 4.
											</p>
										</div>
									</div>
									<br>
									<div class="dialogue">
										<div class="portrait">
											<img src="/escaperpg/images/narrateur.png" alt="narrateur">
										</div>
										<div class="bulleperso">
											<p>
												Vous désirez jouer à ce scénario avec une musique appropriée ?<br>
												Je vous conseille de vous rendre sur <a href="https://www.youtube.com/watch?v=kwVrcvURcjc&list=PLggiqSd087TTvCj4m-ypKv2d8lsJEUAhR" target="_blank" rel="noreferrer">ce lien</a> pour plus d\'immersion !<br>
												<br>
												Bonne aventure à vous !
											</p>
										</div>
									</div>
								</p>
								<center>
									<br>
									<form action="index" method="post">
										<input type="submit" name="new" value="NOUVELLE PARTIE.">
									</form>
									<br>
									<form action="save/load" method="post">
										<input type="submit" name="load" value="CHARGER UNE PARTIE.">
									</form>
									<br>
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
