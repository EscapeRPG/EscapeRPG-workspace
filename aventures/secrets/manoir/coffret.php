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
		<title>Coffret - Secrets Familiaux</title>
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
					if (isset($_POST['coffret']) AND str_replace($search, $replace, stripslashes($_POST['coffret'])) == "aeb6fcu2m8" OR $_SESSION['coffrenigme'])
						{
							echo'
								<div id="coffret">
									<img src="/escaperpg/images/secrets/coffretface.png">
										<div class="dropper" id="drop1"></div>
										<div class="dropper" id="drop2"></div>
										<div class="dropper" id="drop3"></div>
										<div class="dropper" id="drop4"></div>
										<div class="dropper" id="drop5"></div>
								</div>
								<div id="dragdropcoffret">
									<img src="/escaperpg/images/secrets/piecevide.png">
									<div class="draggable" id="drag1">
										<img src="/escaperpg/images/secrets/di.png" id="dimini">
									</div>
									<div class="draggable" id="drag2">
										<img src="/escaperpg/images/secrets/ad.png" id="admini">
									</div>
									<div class="draggable" id="drag3">
										<img src="/escaperpg/images/secrets/se.png" id="semini">
									</div>
									<div class="draggable" id="drag4">
										<img src="/escaperpg/images/secrets/ev.png" id="evmini">
									</div>
									<div class="draggable" id="drag5">
										<img src="/escaperpg/images/secrets/po.png" id="pomini">
									</div>
								</div>
								<script src="/escaperpg/aventures/scripts/dragdrop.js"></script>
								<center>
									<form action="#" method="post">
										<input type="submit" name="reset" value="Réinitialiser.">
									</form>
								</center>
							';
							if (isset ($_POST['reponse']) OR $_SESSION['coffrereponse'])
								{
									echo '
										<p>
											<span class="reponse">
												Les pièces sont à mettre dans cet ordre :
												Serpent - Pomme - Ève - Adam - Dieu.
											</span>
										</p>
									';
									$_SESSION['coffrereponse'] = true;
								}
							elseif (isset ($_POST['indice3']) OR $_SESSION['coffreindice3'])
								{
									echo '
										<center>
											<form action="coffret.php" method="post">
												<button type="submit" name="reponse" class="boutonreponse"></button>
											</form>
										</center>
										<p>
											<span class="indice">
												Chaque phrase du coffret fait référence aux pièces que vous avez.<br>
												Le Père est le vieil homme, Dieu.<br>
												Les Amoureux sont le jeune homme et la jeune fille, Adam et Ève.<br>
												Le Mal est le serpent.<br>
												L\'Objet du Péché est la pomme.<br>
												Faites bien attention à la direction dans laquelle regardent chacun des personnages pour savoir où les placer.
												Par exemple, "le Père qui voit tout" doit être mis tout à droite pour voir l\'ensemble de la scène.
											</span>
										</p>
									';
									$_SESSION['coffreindice3'] = true;
								}
							elseif (isset ($_POST['indice2']) OR $_SESSION['coffreindice2'])
								{
									echo '
										<center>
											<form action="coffret.php" method="post">
												<button type="submit" name="indice3" class="boutonindice"></button>
											</form>
										</center>
										<p>
											<span class="indice">
												Chaque phrase du coffret fait référence aux pièces que vous avez.<br>
												Le Père est le vieil homme, Dieu.<br>
												Les Amoureux sont le jeune homme et la jeune fille, Adam et Ève.<br>
												Le Mal est le serpent.<br>
												L\'Objet du Péché est la pomme.
											</span>
										</p>
									';
									$_SESSION['coffreindice2'] = true;
								}
							elseif (isset ($_POST['indice']) OR $_SESSION['coffreindice1'])
								{
									echo '
										<center>
											<form action="coffret.php" method="post">
												<button type="submit" name="indice2" class="boutonindice"></button>
											</form>
										</center>
										<p>
											<span class="indice">
												Chaque phrase du coffret fait référence aux pièces que vous avez. Essayez de bien les identifier et tout devrait devenir plus clair.
											</span>
										</p>
									';
									$_SESSION['coffreindice1'] = true;
								}
							else
								{
									echo '
										<center>
											<form action="coffret.php" method="post">
												<button type="submit" name="indice" class="boutonindice"></button>
											</form>
										</center>
									';
								}
							$_SESSION['coffrenigme'] = true;
						}
					elseif (isset($_POST['coffret']))
						{
							echo '
								<p>
									Quelque chose ne va pas.
									Avez-vous bien trouvé les 5 éléments à insérer ici ?
								</p>
								<center>
									<form action="coffret.php" method="post">
										<input type="text" name="coffret"> <input type="submit" name="cavite" value="Regarder de plus près.">
									</form>
									<br>
									<form action="coffret.php" method="post">
										<button type="submit" name="indice" class="boutonindice"></button>
									</form>
								</center>
							';
						}
					else
						{
							echo '
								<p>
									Le petit coffret que vous avez trouvé dans le coffre-fort de votre oncle est fermé solidement et vous ne parvenez pas à l\'ouvrir.<br>
									Sur la façade, vous apercevez 5 cavités circulaires.
								</p>
								<center>
									<form action="coffret.php" method="post">
										<input type="text" name="coffret"> <input type="submit" name="cavite" value="Regarder de plus près.">
									</form>
								</center>
							';
							if (isset($_POST['reponse']))
								{
									echo '
										<p>
											<span class="reponse">
												Les 5 pièces vous donnent le code "aeb6fcu2m8".
											</span>
										</p>
									';
								}
							elseif (isset($_POST['indice2']))
								{
									echo '
										<p>
											<span class="indice">
												Avez-vous trouvé 5 éléments circulaires ? Sinon, inspectez les images de la chambre de William et du grenier.<br>
												Vous devriez essayer de les regarder de plus près, ils contiennent sans doute des informations utiles.<br>
												Chaque pièce comporte un fragment de code, récupérez-les et associez-les pour obtenir le code.
											</span>
										</p>
										<center>
											<form action="coffret.php" method="post">
												<button type="submit" name="reponse" class="boutonreponse"></button>
											</form>
										</center>
									';
								}
							elseif (isset($_POST['indice']))
								{
									echo '
										<p>
											<span class="indice">
												Avez-vous trouvé 5 éléments circulaires ? Sinon, inspectez les images de la chambre de William et du grenier.<br>
												Vous devriez essayer de les regarder de plus près, ils contiennent sans doute des informations utiles.
											</span>
										</p>
										<center>
											<form action="coffret.php" method="post">
												<button type="submit" name="indice2" class="boutonindice"></button>
											</form>
										</center>
									';
								}
							else
								{
									echo'
										<center>
											<form action="coffret.php" method="post">
												<button type="submit" name="indice" class="boutonindice"></button>
											</form>
										</center>
									';
								}
							$_SESSION['note'] = false;
							$_SESSION['coffreindice1'] = false;
							$_SESSION['coffreindice2'] = false;
							$_SESSION['coffreindice3'] = false;
							$_SESSION['coffrereponse'] = false;
						}
				?>
			</div>
		</div>
		<div id="load"><div id="loader"></div></div>
		<script src="/escaperpg/scripts/aventures-chargement.js"></script>
		<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/secrets/includes/footer.php"; ?>
	</body>
</html>