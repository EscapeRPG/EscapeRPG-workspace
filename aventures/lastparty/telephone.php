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
		<title>Messages - Last Party</title>
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
					if ($_SESSION['faceeebook'])
						{
							if (isset($_POST['ouais']))
								{
									echo '
										<audio src="/escaperpg/sons/lastparty/message.mp3" autoplay></audio>
										<p>Un nouveau message d\'Axel sur votre téléphone.</p>
										<div id="discussion">
											<div id="nomdialogue">Axel</div>
											<div class="dialogue"><div id="bulle"><p>Alors, t\'as vu ?</p></div></div>
											<div id="reponse"><p>Ouais.</p></div>
											<div id="nomdialogue">Axel</div>
											<div class="dialogue"><div id="bulle"><p>C\'est quoi ce délire ? Tu te souviens de quelque chose, toi ?</p></div></div>
										</div>
										<center>
											<form action="telephone.php" method="post">
												<input type="submit" name="non" value="Non.">
											</form>
										</center>
									';
								}
							elseif (isset($_POST['non']))
								{
									echo '
										<audio src="/escaperpg/sons/lastparty/message.mp3" autoplay></audio>
										<p>Un nouveau message d\'Axel sur votre téléphone.</p>
										<div id="discussion">
											<div id="nomdialogue">Axel</div>
											<div class="dialogue"><div id="bulle"><p>Alors, t\'as vu ?</p></div></div>
											<div id="reponse"><p>Ouais.</p></div>
											<div id="nomdialogue">Axel</div>
											<div class="dialogue"><div id="bulle"><p>C\'est quoi ce délire ? Tu te souviens de quelque chose, toi ?</p></div></div>
											<div id="reponse"><p>Non.</p></div>
											<div id="nomdialogue">Axel</div>
											<div class="dialogue">
												<div id="bulle"><p>Moi non plus !</p></div>
												<div id="bulle"><p>C\'est hyper chelou cette hisoire !</p></div>
												<div id="bulle"><p>Mais dis-moi, toi qui aimes prendre des photos tout le temps, tu aurais pas quelque chose sur ton appareil ?</p></div>
											</div>
										</div>
										<center>
											<form action="appartement.php" method="post">
												<input type="submit" name="appart" value="Je regarde.">
											</form>
										</center>
									';
									$_SESSION['photos'] = true;
								}
							else
								{
									echo '
										<audio src="/escaperpg/sons/lastparty/message.mp3" autoplay></audio>
										<p>Un nouveau message d\'Axel sur votre téléphone.</p>
										<div id="discussion">
											<div id="nomdialogue">Axel</div>
											<div class="dialogue"><div id="bulle"><p>Alors, t\'as vu ?</p></div></div>
										</div>
										<center>
											<form action="telephone.php" method="post">
												<input type="submit" name="ouais" value="Ouais.">
											</form>
										</center>
									';
								}
						}
					elseif (isset ($_GET['a']) AND $_GET['a']==1)
						{
							echo '
								<p>Vous avez 3 nouveaux messages de votre ami Axel.</p>
								<div id="discussion">
									<div id="nomdialogue">Axel</div>
									<div class="dialogue">
										<div id="bulle"><p>Jonathan, t\'es réveillé ?</p></div>
										<div id="bulle"><p>Ohé ??</p></div>
										<div id="bulle"><p>Mec, réponds !!</p></div>
									</div>
								</div>
								<center>
									<form action="telephone.php" method="post">
										<input type="submit" name="suivant" value="Qu\'est-ce qu\'il y a ?">
									</form>
								</center>
							';
						}
					elseif (isset($_POST['suivant']))
						{
							echo '
								<audio src="/escaperpg/sons/lastparty/message.mp3" autoplay></audio>
								<div id="discussion">
									<div id="nomdialogue">Axel</div>
									<div class="dialogue">
										<div id="bulle"><p>Jonathan, t\'es réveillé ?</p></div>
										<div id="bulle"><p>Ohé ??</p></div>
										<div id="bulle"><p>Mec, réponds !!</p></div>
									</div>
									<div id="reponse"><p>Qu\'est-ce qu\'il y a ?</p></div>
									<div id="nomdialogue">Axel</div>
									<div class="dialogue"><div id="bulle"><p>Ah, t\'es là ! Mec, t\'as vu le message de Juliette sur sa page ?</p></div></div>
								</div>
								<center>
									<form action="telephone.php" method="post">
										<input type="submit" name="suivant2" value="???">
									</form>
								</center>
							';
						}
					elseif (isset($_POST['suivant2']))
						{
							echo '
								<audio src="/escaperpg/sons/lastparty/message.mp3" autoplay></audio>
								<div id="discussion">
									<div id="nomdialogue">Axel</div>
									<div class="dialogue">
										<div id="bulle"><p>Jonathan, t\'es réveillé ?</p></div>
										<div id="bulle"><p>Ohé ??</p></div>
										<div id="bulle"><p>Mec, réponds !!</p></div>
									</div>
									<div id="reponse"><p>Qu\'est-ce qu\'il y a ?</p></div>
									<div id="nomdialogue">Axel</div>
									<div class="dialogue"><div id="bulle"><p>Ah, t\'es là ! Mec, t\'as vu le message de Juliette sur sa page ?</p></div></div>
									<div id="reponse"><p>???</p></div>
									<div id="nomdialogue">Axel</div>
									<div class="dialogue"><div id="bulle"><p>Va voir directement sur son profil faceeebook, ce sera plus simple !</p></div></div>
								</div>
								<p>
									Pour des raisons qui vous échappent, votre téléphone vous a toujours refusé l\'accès à Faceeebook.
									Il va donc falloir trouver un autre moyen de vous y rendre.
								</p>
								<center>
									<form action="appartement.php" method="post">
										<input type="submit" name="retour" value="Retour.">
									</form>
								</center>
							';
						}
					else
						{
							echo '
								<div id="enigmelieu">
									<img src="/escaperpg/images/lastparty/telephone.png">
									<a href="telephone.php?a=1" id="sms"></a>
								</div>
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