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
	   
		<link rel="stylesheet" href="/escaperpg/aventures/lastparty/stylelastparty.css">
		<meta charset="utf-8">
		<title>Éveil - Last Party</title>
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
								<audio src="/escaperpg/sons/lastparty/message.mp3" autoplay></audio>
								<p>
									<div id="enigmelieu">
										<img src="/escaperpg/images/lastparty/appartement.png">
										<div id="phone">
											<form action="telephone.php" method="post">
												<button type="submit" name="telephonemini">
													<img src="/escaperpg/images/lastparty/telephonemini.png">
												</button>
											</form>
										</div>
									</div>
									Vous avez encore du mal à vous réveiller complètement.<br>
									<br>
									Cette perte de mémoire vous semble tout de même très étrange.<br>
									Même lors de soirées particulièrement arrosées, vous n\'avez jamais eu de trou noir comme ça et vous vous souvenez toujours d\'au moins une partie de la soirée.<br>
									Mais là, rien. Comment pourriez-vous faire pour vous souvenir ?
								</p>
								<center>
									<form action="eveil.php" method="post">
										<button type="submit" name="indice" class="boutonindice"></button>
									</form>
								</center>
							';
						}
					elseif (isset($_POST['indice']))
						{
							echo '
								<p>
									<div id="enigmelieu">
										<img src="/escaperpg/images/lastparty/appartement.png">
										<div id="phone">
											<form action="telephone.php" method="post">
												<button type="submit" name="telephonemini">
													<img src="/escaperpg/images/lastparty/telephonemini.png">
												</button>
											</form>
										</div>
									</div>
									Vous avez encore du mal à vous réveiller complètement.
									Ce trou de mémoire vous semble tout de même très étrange.
									Même lors de soirées particulièrement arrosées, vous n\'avez jamais eu de trou noir comme ça et vous vous souvenez toujours d\'au moins une partie de la soirée.<br>
									Mais là, rien. Comment pourriez-vous faire pour vous souvenir ?<br>
									<br>
									<div class="indice">
										Peut-être devriez-vous essayer de trouver le moyen de contacter l\'un de vos proches ?
									</div>
								</p>
								<center>
									<form action="eveil.php" method="post">
										<button type="submit" name="indice2" class="boutonindice"></button>
									</form>
								</center>
							';
						}
					elseif (isset($_POST['indice2']))
						{
							echo '
								<p>
									<div id="enigmelieu">
										<img src="/escaperpg/images/lastparty/appartement.png">
										<div id="phone">
											<form action="telephone.php" method="post">
												<button type="submit" name="telephonemini">
													<img src="/escaperpg/images/lastparty/telephonemini.png">
												</button>
											</form>
										</div>
									</div>
									Vous avez encore du mal à vous réveiller complètement.
									Ce trou de mémoire vous semble tout de même très étrange.
									Même lors de soirées particulièrement arrosées, vous n\'avez jamais eu de trou noir comme ça et vous vous souvenez toujours d\'au moins une partie de la soirée.<br>
									Mais là, rien. Comment pourriez-vous faire pour vous souvenir ?<br>
									<br>
									<div class="indice">
										Peut-être devriez-vous essayer de trouver le moyen de contacter l\'un de vos proches ?<br>
										Il semble d\'ailleurs que quelqu\'un ait récemment tenté de vous joindre.
									</div>
								</p>
								<center>
									<form action="eveil.php" method="post">
										<button type="submit" name="reponse" class="boutonreponse"></button>
									</form>
								</center>
							';
						}
				elseif (isset($_POST['reponse']))
						{
							echo '
								<p>
									<div id="enigmelieu">
										<img src="/escaperpg/images/lastparty/appartement.png">
										<div id="phone">
											<form action="telephone.php" method="post">
												<button type="submit" name="telephonemini">
													<img src="/escaperpg/images/lastparty/telephonemini.png">
												</button>
											</form>
										</div>
									</div>
									Vous avez encore du mal à vous réveiller complètement.
									Ce trou de mémoire vous semble tout de même très étrange.
									Même lors de soirées particulièrement arrosées, vous n\'avez jamais eu de trou noir comme ça et vous vous souvenez toujours d\'au moins une partie de la soirée.<br>
									Mais là, rien. Comment pourriez-vous faire pour vous souvenir ?<br>
									<br>
									<div class="reponse">
										Cliquez sur le téléphone se trouvant sur la table de nuit.
									</div>
								</p>
							';
						}
					else
						{
							echo '
								<audio src="/escaperpg/sons/lastparty/reveil.mp3" autoplay></audio>
								<p>
									9h du matin. Le réveil sonne.
									Vous émergez péniblement du sommeil. Vous avez mal au crâne. Après tout, quoi de plus étonnant après une soirée chez Juliette ?<br>
									Mais que s\'y est-il passé, déjà ? Vous avez beau chercher dans votre mémoire, rien ne vous revient.
									Le néant depuis que vous êtes parti pour vous rendre là-bas. La soirée a dû être bien arrosée !
								</p>
								<center>
									<form action="eveil.php" method="post">
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