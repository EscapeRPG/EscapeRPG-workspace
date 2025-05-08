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
	   
		<link rel="stylesheet" href="/escaperpg/aventures/lastparty/css/style.css">
		<meta charset="utf-8">
		<title>Photos - Last Party</title>
	</head>
	
	<body onload="chargement()">
		<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/header.php"; ?>
		<div id="banniere"><img src="/escaperpg/images/lastparty/lpmini.png"></div>
		<div id="bloc_page">
			<nav>
				<img src="/escaperpg/images/lastparty/jonathan.png">
				<div id="inventairefooter"><input type="submit" onclick="inventaireshow()" value="INVENTAIRE"></div>
				<div id="motsdepasse"><input type="submit" onclick="mdpshow()" value="NOTES"></div>
				<a href="/escaperpg/aventures/lastparty/save/save.php" target="_blank" rel="noreferrer"><input type="submit" name="save" value="SAUVEGARDER"></a>
			</nav>
			<div id="txt">
				<?php
					if (isset($_POST['suivant']))
						{
							echo '
								<p>
									Sur l\'une des photos prises dans le salon, où était regroupé la plupart des gens, vous remarquez un homme que vous ne connaissez pas fixant l\'objectif,
									un petit sourire ourlant ses lèvres.<br>
									<br>
									Vous continuez dans la galerie pour voir les photos précédentes, à la recherche de cet homme et finissez par tomber sur un cliché où vous le voyez en train de glisser quelque chose...
									dans la poche intérieure de votre veste !<br>
									<br>
									De quoi peut-il bien s\'agir ?<br>
									<br>
									Vous décidez d\'en avoir le cœur net et d\'aller vérifier dans les poches de votre veste, accrochée dans le <span class="lieu">couloir</span> de l\'entrée.
								</p>
								<center>
									<form action="appareilphoto.php" method="post">
										<button type="submit" name="indice" class="boutonindice"></button>
									</form>
								</center>
							';
						}
					elseif (isset($_POST['indice']))
						{
							echo '
								<p>
									Vous décidez d\'en avoir le cœur net et d\'aller vérifier dans les poches de votre veste, accrochée dans le <span class="lieu">couloir</span> de l\'entrée.<br>
									<br>
									<div class="indice">
										Vous êtes actuellement en train d\'examiner votre appareil photo et cherchez à vous rendre dans le couloir.
									</div>
								</p>
								<center>
									<form action="appareilphoto.php" method="post">
										<button type="submit" name="indice2" class="boutonindice"></button>
									</form>
								</center>
							';
						}
					elseif (isset($_POST['indice2']))
						{
							echo '
								<p>
									Vous décidez d\'en avoir le cœur net et d\'aller vérifier dans les poches de votre veste, accrochée dans le <span class="lieu">couloir</span> de l\'entrée.<br>
									<br>
									<div class="indice">
										Vous êtes actuellement en train d\'examiner votre appareil photo et cherchez à vous rendre dans le couloir.<br>
										Le couloir est un lieu, comme une adresse. À quel endroit pourriez-vous en entrer une ?
									</div>
								</p>
								<center>
									<form action="appareilphoto.php" method="post">
										<button type="submit" name="reponse" class="boutonreponse"></button>
									</form>
								</center>
							';
						}
					elseif (isset($_POST['reponse']))
						{
							echo '
								<p>
									Vous décidez d\'en avoir le cœur net et d\'aller vérifier dans les poches de votre veste, accrochée dans le <span class="lieu">couloir</span> de l\'entrée.<br>
									<br>
									<div class="reponse">
										Rendez-vous sur <a href="http://www.escaperpg.com/aventures/lastparty/couloir.php">http://www.escaperpg.com/aventures/lastparty/couloir.php</a>.
									</div>
								</p>
							';
						}
					else
						{
							echo '
								<p>
									Vous allumez votre appareil photo et allez directement consulter la galerie.<br>
									Il semble que vous ayez pris pas mal de photos hier soir, mais cela ne vous ramène aucun souvenir...<br>
									<br>
									Sur les différents clichés, vos amis <i>- et vous sur les quelques photos où vous apparaissez -</i> semblez passer un bon moment. Vous ne voyez rien d\'alarmant.<br>
									<br>
									Jusqu\'à ce que...
								</p>
								<center>
									<form action="appareilphoto.php" method="post">
										<input type="submit" name="suivant" value="Suivant.">
									</form>
								</center>
							';
						}
				?>
			</div>
		</div>
		<div id="load"><div id="loader"></div></div>
		<script src="/escaperpg/scripts/aventures-chargement.js"></script>
		<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/lastparty/includes/footer.php"; ?>
	</body>
</html>