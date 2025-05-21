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
		<title>Cave - Secrets Familiaux</title>
	</head>
	
	<body>
		<?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/header.php"; ?>
		<div id="banniere"><img src="/escaperpg/images/secrets/secretsfamiliauxmini.png" alt="secrets familiaux bannière"></div>
		<main>
			<nav>
				<a href="/escaperpg/images/secrets/inspecteurdeckard.png" rel="lightbox[bastian]" title="inspecteurdeckard"><img src="/escaperpg/images/secrets/inspecteurdeckardmini.png" alt="inspecteur deckard"></a>
				<div id="inventairefooter"><input type="submit" value="INVENTAIRE"></div>
				<div id="motsdepasse"><input type="submit" value="NOTES"></div>
				<a href="/escaperpg/aventures/secrets/save/save.php" target="_blank" rel="noreferrer"><input type="submit" name="save" value="SAUVEGARDER"></a>
			</nav>
			<div id="txt">
				<?php
					if (isset($_POST['reponse']))
						{
							echo '
								<p>
									<div id="enigmepensees">
										<img src="/escaperpg/images/secrets/pensees.gif">
									</div>
									En reliant les points, on obtient le motif suivant :
									<div id="enigmepensees">
										<img src="/escaperpg/images/secrets/penseesreponse.png">
									</div>
									On peut y voir se dessiner le mot "oncle" !
								</p>
								<center>
									<form action="pensees" method="post">
										<input type="text" name="thoughts"> <input type="submit" name="reflechir" value="Rassembler ses pensées">
									</form>
								</center>
							';
						}
					elseif (isset($_POST['indice3']))
						{
							echo '
								<p>
									<div id="enigmepensees">
										<img src="/escaperpg/images/secrets/pensees.gif">
									</div>
									<span class="indice">
										Vous êtes troublé et vos pensées sont diffuses. Une capture d\'écran pourrait vous permettre d\'y voir plus clair.<br>
										Essayez ensuite de composer une phrase avec ce que vous voyez.<br>
										Les couleurs peuvent vous aider, en suivant l\'ordre du spectre lumineux.<br>
										Avez-vous également remarqué les petites croix ? Elles ont sans doute leur importance, l\'utilisation d\'un logiciel de traitement d\'image serait le bienvenu pour les relier.
									</span>
								</p>
								<center>
									<form action="pensees" method="post">
										<input type="text" name="thoughts"> <input type="submit" name="reflechir" value="Rassembler ses pensées">
									</form>
									<form action="pensees" method="post">
										<button type="submit" name="reponse" class="boutonreponse"></button>
									</form>
								</center>
							';
						}
					elseif (isset($_POST['indice2']))
						{
							echo '
								<p>
									<div id="enigmepensees">
										<img src="/escaperpg/images/secrets/pensees.gif">
									</div>
									<span class="indice">
										Vous êtes troublé et vos pensées sont diffuses. Une capture d\'écran pourrait vous permettre d\'y voir plus clair.<br>
										Essayez ensuite de composer une phrase avec ce que vous voyez.
									</span>
								</p>
								<center>
									<form action="pensees" method="post">
										<input type="text" name="thoughts"> <input type="submit" name="reflechir" value="Rassembler ses pensées">
									</form>
									<form action="pensees" method="post">
										<button type="submit" name="indice3" class="boutonindice"></button>
									</form>
								</center>
							';
						}
					elseif (isset($_POST['indice']))
						{
							echo '
								<p>
									<div id="enigmepensees">
										<img src="/escaperpg/images/secrets/pensees.gif">
									</div>
									<span class="indice">
										Vous êtes troublé et vos pensées sont diffuses. Peut-être devriez-vous essayer de figer cela d\'une manière ou d\'une autre ?
									</span>
								</p>
								<center>
									<form action="pensees" method="post">
										<input type="text" name="thoughts"> <input type="submit" name="reflechir" value="Rassembler ses pensées">
									</form>
									<form action="pensees" method="post">
										<button type="submit" name="indice2" class="boutonindice"></button>
									</form>
								</center>
							';
						}
					elseif (isset ($_POST['thoughts']) AND str_replace($search, $replace, stripslashes($_POST['thoughts'])) == "oncle")
						{
							echo'
								<p>
									Votre oncle possède un shoggoth dans son corps qui pourrait chercher à s\'échapper dans la nature !
									Les autres spécimens conservés ici semblent inactifs et piégés dans des cuves, ou les profondeurs de cette cave secrète,
									mais si le mot du docteur Pellington dit vrai alors laisser un shoggoth en liberté pourrait s\'avérer dévastateur !<br>
									Vous comprenez maintenant les raisons de la présence du médecin lors des funérailles, le pauvre fou essayait de protéger l\'humanité d\'une terrible menace !<br>
									La seule personne au courant de ce danger étant à présent morte, il ne reste plus que vous pour essayer d\'y mettre un terme ! Mais comment procéder ?<br>
									<br>
									Il semblerait qu\'il soit temps de retourner au <span class="lieu">cimetière</span>... !
								</p>
							';
							$_SESSION['verite'] = true;
						}
					elseif (isset ($_POST['thoughts']) AND str_replace($search, $replace, stripslashes($_POST['thoughts'])) == "votreonclepeutrevenir")
						{
							echo'
								<p>
									<div id="enigmepensees">
										<img src="/escaperpg/images/secrets/pensees.gif">
									</div>
									Vous commencez à y voir un peu plus clair, mais vous vous sentez encore troublé.<br>
									Essayez de réfléchir encore un peu calmement, quelque chose finira sans doute par se dessiner.
								</p>
								<center>
									<form action="pensees" method="post">
										<input type="text" name="thoughts"> <input type="submit" name="reflechir" value="Rassembler ses pensées">
									</form>
									<form action="pensees" method="post">
										<button type="submit" name="indice" class="boutonindice"></button>
									</form>
								</center>
							';
						}
					elseif (isset($_POST['thoughts']))
						{
							echo'
								<p>
									<div id="enigmepensees">
										<img src="/escaperpg/images/secrets/pensees.gif">
									</div>
									Sans doute êtes-vous encore trop chamboulé par tous ces événements. Vous n\'arrivez manifestement pas à penser correctement.
								</p>
								<center>
									<form action="pensees" method="post">
										<input type="text" name="thoughts"> <input type="submit" name="reflechir" value="Rassembler ses pensées">
									</form>
									<form action="pensees" method="post">
										<button type="submit" name="indice" class="boutonindice"></button>
									</form>
								</center>
							';
						}
					else
						{
							echo'
								<p>
									<div id="enigmepensees">
										<img src="/escaperpg/images/secrets/pensees.gif">
									</div>
								</p>
								<center>
									<form action="pensees" method="post">
										<input type="text" name="thoughts"> <input type="submit" name="reflechir" value="Rassembler ses pensées">
									</form>
									<form action="pensees" method="post">
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
		<?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/secrets/includes/footer.php"; ?>
	</body>
</html>
