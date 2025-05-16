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
		<title>Le Bordel - Le Trésor d'Ambria</title>
	</head>
	
	<body>
		<?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/header.php"; ?>
		<div id="banniere"><img src="/escaperpg/images/ambria/tresorambriamini.png"></div>
		<main>
			<nav>
				<a href="/escaperpg/images/ambria/sullivanmasonmini.png" rel="lightbox[sullivan]" title="Sullivan Mason"><img src="/escaperpg/images/ambria/sullivanmasonmini.png"></a>
				<div id="inventairefooter"><input type="submit" onclick="inventaireshow()" value="INVENTAIRE"></div>
				<div id="motsdepasse"><input type="submit" onclick="mdpshow()" value="NOTES"></div>
				<a href="/escaperpg/aventures/ambria/save/save.php" target="_blank" rel="noreferrer"><input type="submit" name="save" value="SAUVEGARDER"></a>
				<?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/ambria/sullivan/includes/navigationtortuga.php"; ?>
			</nav>
			<div id="txt">
				<?php
					if ($_SESSION['ambriapaul'])
						{
							echo'
								<audio src="/escaperpg/sons/ambria/bordel.mp3" autoplay></audio>
								<p>
									Un lieu réputé de l\'Île de la Tortue, tenu par un type peu amène du nom de Peter.<br>
									C\'est ici que viennent les marins lorsqu\'ils rentrent de voyage et veulent passer un peu de bon temps avec des filles.<br>
									Vous n\'avez pas le temps pour ça.<br>
									<br>
									Le vieux type avec qui vous avez parlé un peu plus tôt est toujours là, sirotant son whisky.<br>
									Vous vous souvenez de ce qu\'il vous a dit : "Dans les rumeurs, il y a toujours du vrai et du faux".
								</p>
							';
						}
					elseif (isset ($_POST['vieux']) AND str_replace($search, $replace, stripslashes($_POST['vieux'])) == "fonddewhisky")
						{
							echo'
								<audio src="/escaperpg/sons/ambria/vieuxboit.mp3" autoplay></audio>
								<div class="dialogue">
									<div class="portrait">
										<img src="/escaperpg/images/ambria/vieuxtype.png">
									</div>
									<div class="bulleperso">
										<p>
											Ah ! Merci, ça fait du bien !<br>
											<br>
											Vous êtes ici pour quoi, alors ? Hésitez pas à d\'mander au vieux Paul c\'que vous voulez, y sait plein d\'choses !
										</p>
									</div>
								</div>
								<center>
									<form action="bordel" method="post">
										<input type="submit" name="parler" value="Lui parler de la carte.">
									</form>
								</center>
							';
						}
					elseif (isset ($_POST['vieux']))
						{
							echo'
								<audio src="/escaperpg/sons/ambria/bordel.mp3" autoplay></audio>
								<div class="dialogue">
									<div class="portrait">
										<img src="/escaperpg/images/ambria/vieuxtype.png">
									</div>
									<div class="bulleperso">
										<p>
											J\'vous d\'mande pardon ?<br>
											<br>
											Si vous voulez me rafraîchir la mémoire, y va m\'falloir un p\'tit r\'montant, héhéhé !
										</p>
									</div>
								</div>
								<p>
									Le vieux vous regarde, l\'air d\'attendre quelque chose.<br>
									<br>
									Avez-vous quelque chose à lui donner ?
								</p>
								<center>
									<form action="bordel" method="post">
										<input type="text" name="vieux"> <input type="submit" name="donner" value="Lui donner.">
									</form>
								</center>
							';
						}
					elseif (isset ($_POST['parler']))
						{
							echo'
								<audio src="/escaperpg/sons/ambria/bordel.mp3" autoplay></audio>
								<div class="dialogue">
									<div class="portrait">
										<img src="/escaperpg/images/ambria/vieuxtype.png">
									</div>
									<div class="bulleperso">
										<p>
											Oh... Ça pour le coup, j\'sais pas trop, désolé mon gars.<br>
											Y a sans doute d\'aut\' gens en ville qui pourraient vous en dire plus.<br>
											<br>
											Allez sur les docks, vous d\'vriez trouver c\'que vous cherchez.<br>
											Mais attention ! Les rumeurs ça s\'répand comme la vermine et on entend toujours du vrai et du faux dans c\'qui s\'dit !
										</p>
									</div>
								</div>
								<p>
									Le vieillard vous fait un petit signe de la tête pour vous remercier pour le whisky et commence à s\'éloigner en titubant.<br>
									<br>
									Vous avez l\'impression de ne pas beaucoup avancer, mais peut-être que ce qu\'il vous a dit pourrait vous y aider ?
									Il serait temps de retourner enquêter.
								</p>
								<center>
									<form action="bordel" method="post">
										<input type="submit" name="retour" value="Retour.">
									</form>
								</center>
							';
							$_SESSION['ambriapaul'] = true;
							$_SESSION['ambriawhisky'] = false;
						}
					else
						{
							echo'
								<audio src="/escaperpg/sons/ambria/bordelvieux.mp3" autoplay></audio>
								<p>
									Un lieu réputé de l\'Île de la Tortue, tenu par un type peu amène du nom de Peter.<br>
									C\'est ici que viennent les marins lorsqu\'ils rentrent de voyage et veulent passer un peu de bon temps avec des filles.<br>
									Vous n\'avez pas le temps pour ça.<br>
									<br>
									Un <span class="mdp">vieux type</span> à la barbe sale et emmêlée vous interpelle alors que vous vous apprêtez à partir.
								</p>
								<div class="dialogue">
									<div class="portrait">
										<img src="/escaperpg/images/ambria/vieuxtype.png">
									</div>
									<div class="bulleperso">
										<p>
											Hé ! M\'sieur !<br>
											<br>
											Z\'auriez pas un p\'tit que\'que chose à boire pour un vieux compagnon ?
										</p>
									</div>
								</div>
								<p>
									Avez-vous quelque chose à lui donner ?
								</p>
								<center>
									<form action="bordel" method="post">
										<input type="text" name="vieux"> <input type="submit" name="donner" value="Lui donner.">
									</form>
								</center>
							';
							if (isset ($_POST['indice']))
								{
									echo'
										<div id="indice">
											Cet homme semble désespérément avoir envie d\'alcool. Peut-être pourriez-vous l\'aider ?
										</div>
										<center>
											<form action="bordel" method="post">
												<button type="submit" name="indice2" class="boutonindice"></button>
											</form>
										</center>
									';
								}
							elseif (isset ($_POST['indice2']))
								{
									echo'
										<div id="indice">
											Cet homme semble désespérément avoir envie d\'alcool. Peut-être pourriez-vous l\'aider ?<br>
											Avez-vous quelque chose à lui donner ? Si non, où pourriez-vous trouver ce qui l\'intéresse ?
										</div>
										<center>
											<form action="bordel" method="post">
												<button type="submit" name="reponse" class="boutonreponse"></button>
											</form>
										</center>
									';
								}
							elseif (isset ($_POST['reponse']))
								{
									echo'
										<div class="reponse">
											Rendez-vous à la taverne et parlez du vieux type à son gérant.
										</div>
									';
								}
							else
								{
									echo'
										<center>
											<form action="bordel" method="post">
												<button type="submit" name="indice" class="boutonindice"></button>
											</form>
										</center>
									';
								}
							$_SESSION['mdp2'] = true;
						}
				?>
			</div>
		</div>
		<div id="load"><div id="loader"></div></div>
		<script src="/escaperpg/scripts/aventures-chargement.js"></script>
		<?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/ambria/sullivan/includes/footer.php"; ?>
	</body>
</html>
