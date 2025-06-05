<?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/entete.php";
	$_SESSION['intrusion'] = false;
?>

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
		<title>Pendant la nuit - Secrets Familiaux</title>
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
					if (isset($_POST['suivant']) AND !isset($_POST['suivant2']) AND !isset($_POST['suivant3']) AND !isset($_POST['attendre']))
						{
							echo '
								<audio src="/escaperpg/sons/secrets/voiturepart.mp3" autoplay></audio>
								<p>
									Tentant de vous retenir de vomir, vous vous dirigez vers le hall du manoir lorsque vous apercevez un homme au pied de l\'escalier.
									Celui-ci tient plusieurs choses entre ses bras, manifestement dérobées dans le manoir.
									Mais le manque de lumière vous empêche de voir quoi précisément.<br>
									Lorsqu\'il vous voit, il se précipite vers la porte d\'entrée et sort du manoir en courant.<br>
									<br>
									Vous le prenez aussitôt en chasse, mais l\'intrus a trop d\'avance sur vous.<br>
									<br>
									Avant que vous n\'ayez eu le temps de l\'attraper, il saute dans une voiture grise dont le moteur tournait encore et démarre en trombe.
								</p>
								<center>
									<form action="nuit" method="post">
										<input type="submit" name="suivant2" value="Suivant.">
									</form>
								</center>
							';
						}
					elseif (isset($_POST['suivant2']) AND !isset($_POST['suivant3']) AND !isset($_POST['attendre']))
						{
							if ($_SESSION['chiensemp'])
								{
									echo '
										<p>
											Les chiens de Gaspard ayant été empoisonnés, le voleur a pu entrer sans risquer d\'être gêné.<br>
											Ne pouvant rien faire de plus pour le moment et commençant à sentir le froid mordant vous fouetter le corps, vous retournez à l\'intérieur de la demeure.<br>
											<br>
											Lorsque vous arrivez dans le hall d\'entrée, vous apercevez un petit objet sur le sol.<br>
											En vous baissant pour le ramasser, vous vous rendez compte qu\'il s\'agit d\'une pièce, manifestement tombée lorsque l\'intrus s\'est enfui.<br>
											<div id="enigme">
												<img src="/escaperpg/images/secrets/po.png">
											</div>
											Vous la mettez dans votre poche.
										</p>
										<center>
											<form action="nuit" method="post">
												<input type="submit" name="suivant3" value="Suivant.">
											</form>
										</center>
									';
									$_SESSION['spo'] = true;
								}
							else
								{
									echo '
										<p>
											Vous vous rendez alors compte que les chiens de Gaspard sont terriblement silencieux et que ce dernier ne semble pas être réveillé.<br>
											Ne pouvant rien faire de plus pour le moment et commençant à sentir le froid mordant vous fouetter le corps, vous retournez à l\'intérieur de la demeure.<br>
											<br>
											Lorsque vous arrivez dans le hall d\'entrée, vous apercevez un petit objet sur le sol.<br>
											En vous baissant pour le ramasser, vous vous rendez compte qu\'il s\'agit d\'une pièce, manifestement tombée lorsque l\'intrus s\'est enfui.<br>
											<div id="enigme">
												<a href="/escaperpg/images/secrets/po.png" rel="lightbox[invent]"><img src="/escaperpg/images/secrets/po.png"></a>
											</div>
											Vous la mettez dans votre poche.
										</p>
										<center>
											<form action="nuit" method="post">
												<input type="submit" name="suivant3" value="Suivant.">
											</form>
										</center>
									';
									$_SESSION['spo'] = true;
								}
						}
					elseif (isset($_POST['suivant3']) AND !isset($_POST['attendre']))
						{
							echo '
								<script src="/escaperpg/scripts/inventaireadd.js"></script>
								<p>
									Par acquis de consience, vous faites un rapide tour de la maison pour tenter de savoir ce que l\'intrus a pu emporter avec lui, mais il semblerait que toutes les pièces de la maison soient telles que vous les avez laissées la veille au soir.<br>
									<br>
									Votre intuition vous souffle que l\'intrus a réussi, d\'une manière ou d\'une autre, à entrer dans le <span class="lieu">bureau</span> de votre oncle pour y dérober ses précieux documents.<br>
									<br>
									Frustré, vous décidez d\'attendre le matin pour appeler le poste de police d\'Arkham et mettre fin à cette situation qui n\'a que trop duré !
								</p>
								<center>
									<form action="matin" method="post">
										<input type="submit" name="attendre" value="Attendre le matin.">
									</form>
								</center>
							';
						}
					else
						{
							echo '
								<audio src="/escaperpg/sons/secrets/bruitviolent.mp3" autoplay></audio>
								<p>
									Alors que vous étiez endormi, un bruit violent vous réveille.
									Hébété, vous peinez à émerger de votre sommeil et à vous lever.<br>
									Vous sortez de la chambre pour essayer de savoir ce qu\'il se passe lorsque vous êtes soudain pris de nausées :
									l\'odeur qui règne dans le manoir depuis votre arrivée est beaucoup plus forte ce soir.
								</p>
								<center>
									<form action="nuit" method="post">
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
		<?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/secrets/includes/footer.php"; ?>
	</body>
</html>
