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
	   
		<link rel="stylesheet" href="/escaperpg/aventures/avent/styleavent.css">
		<meta charset="utf-8">
		<title>Une Étrange Machine - Le Grenier d'Arthur</title>
	</head>
	
	<body onload="chargement()">
		<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/header.php"; ?>
		<div id="banniere"><img src="/escaperpg/images/avent/aventmini.png"></div>
		<div id="bloc_page">
			<nav>
				<img src="/escaperpg/images/avent/sarah.png">
				<form action="/escaperpg/aventures/avent/cartes.php" target="_blank" rel="noreferrer" method="post"><input type="submit" name="cartes" value="Cartes"></form>
				<a href="/escaperpg/aventures/avent/save/save.php" target="_blank" rel="noreferrer"><input type="submit" name="save" value="SAUVEGARDER"></a>
			</nav>
			<div id="txt">
				<?php
					if (isset ($_POST['activer']))
						{
							switch (str_replace($search, $replace, stripslashes($_POST['activate'])))
								{
									case "depart":
										echo'<div id="succespopup">';
										$nouveausucces = '<img src="/escaperpg/images/succes/avent/machine.png"><span><u><b>Apprentie mécanicienne</b></u><br>Réparer l\'étrange machine de Grand-Père</span>';
										$scenario = 'avent';
										$description = 'machine';
										$cache = 'oui';
										$rarete = 'succesnormal';
										include_once $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/succesadd.php";
											echo'</div>';
											
										echo'
											<audio src="/escaperpg/sons/avent/machinedemarre.mp3" autoplay></audio>
											<audio src="/escaperpg/sons/avent/tirercarte.mp3" autoplay></audio>
											<p>
												Dans un vrombissement tonitruant, la machine se met en marche. Au bout de quelques secondes, le vacarme s\'atténue et vous n\'entendez plus qu\'un doux ronronnement.
												Ça marche !<br>
												<br>
												Un petit compartiment s\'ouvre de lui-même sur un côté et une lumière, étrange et fascinante, en sort.
												Vous remarquez un drap sombre tendu sur le mur en face. La machine semble y projeter de petites taches blanches.<br>
												De quoi peut-il bien s\'agir ?<br>
												<br>
												Accroché sur le drap, vous remarquez un petit papier et vous vous en emparez.
											</p>
											<center>
												<span class="important">Retournez la carte 9.</span><br>
												<br>
												<form action="enroute.php" method="post">
													<input type="submit" name="suivant3" value="SUIVANT.">
												</form>
											</center>
										';
										break;
									default:
										echo'
											<p>
												Cela ne semble pas fonctionner. Peut-être avez-vous fait une erreur quelque part ?<br>
												<br>
												<div id="machineenigme">
													<div onclick="rotate(this)" class="spin0"><img src="/escaperpg/images/avent/machineenigme/piece1.png"></div>
													<div onclick="rotate2(this)" class="spin0"><img src="/escaperpg/images/avent/machineenigme/piece2.png"></div>
													<div onclick="rotate3(this)" class="spin0"><img src="/escaperpg/images/avent/machineenigme/piece3.png"></div>
													<div onclick="rotate4(this)" class="spin0"><img src="/escaperpg/images/avent/machineenigme/piece4.png"></div>
													<div onclick="rotate5(this)" class="spin0"><img src="/escaperpg/images/avent/machineenigme/piece5.png"></div>
													<div onclick="rotate6(this)" class="spin0"><img src="/escaperpg/images/avent/machineenigme/piece6.png"></div>
													<div onclick="rotate7(this)" class="spin0"><img src="/escaperpg/images/avent/machineenigme/piece7.png"></div>
													<div onclick="rotate8(this)" class="spin0"><img src="/escaperpg/images/avent/machineenigme/piece8.png"></div>
													<div onclick="rotate9(this)" class="spin0"><img src="/escaperpg/images/avent/machineenigme/piece9.png"></div>
													<div onclick="rotate10(this)" class="spin0"><img src="/escaperpg/images/avent/machineenigme/piece10.png"></div>
													<div onclick="rotate11(this)" class="spin0"><img src="/escaperpg/images/avent/machineenigme/piece11.png"></div>
													<div onclick="rotate12(this)" class="spin0"><img src="/escaperpg/images/avent/machineenigme/piece12.png"></div>
													<div onclick="rotate13(this)" class="spin0"><img src="/escaperpg/images/avent/machineenigme/piece13.png"></div>
													<div onclick="rotate14(this)" class="spin0"><img src="/escaperpg/images/avent/machineenigme/piece14.png"></div>
													<div onclick="rotate15(this)" class="spin0"><img src="/escaperpg/images/avent/machineenigme/piece15.png"></div>
													<div onclick="rotate16(this)" class="spin0"><img src="/escaperpg/images/avent/machineenigme/piece16.png"></div>
													<div onclick="rotate17(this)" class="spin0"><img src="/escaperpg/images/avent/machineenigme/piece17.png"></div>
													<div onclick="rotate18(this)" class="spin0"><img src="/escaperpg/images/avent/machineenigme/piece18.png"></div>
												</div>
											</p>
											<script src="/escaperpg/aventures/scripts/rotation.js"></script>
											<center>
												<form action="grenier.php" method="post">
													<input type="text" name="activate"> <input type="submit" name="activer" value="ACTIVER.">
												</form>
												<br>
												<form action="grenier.php" method="post">
													<button type="submit" name="indicegrenier6" class="boutonindice"></button>
												</form>
											</center>
										';
								}
						}
					elseif ($_SESSION['reference'])
					{
						if (isset ($_POST['indice']))
							{
								echo '
									<p>
										<div id="machineenigme">
											<div onclick="rotate(this)" class="spin0"><img src="/escaperpg/images/avent/machineenigme/piece1.png"></div>
											<div onclick="rotate2(this)" class="spin0"><img src="/escaperpg/images/avent/machineenigme/piece2.png"></div>
											<div onclick="rotate3(this)" class="spin0"><img src="/escaperpg/images/avent/machineenigme/piece3.png"></div>
											<div onclick="rotate4(this)" class="spin0"><img src="/escaperpg/images/avent/machineenigme/piece4.png"></div>
											<div onclick="rotate5(this)" class="spin0"><img src="/escaperpg/images/avent/machineenigme/piece5.png"></div>
											<div onclick="rotate6(this)" class="spin0"><img src="/escaperpg/images/avent/machineenigme/piece6.png"></div>
											<div onclick="rotate7(this)" class="spin0"><img src="/escaperpg/images/avent/machineenigme/piece7.png"></div>
											<div onclick="rotate8(this)" class="spin0"><img src="/escaperpg/images/avent/machineenigme/piece8.png"></div>
											<div onclick="rotate9(this)" class="spin0"><img src="/escaperpg/images/avent/machineenigme/piece9.png"></div>
											<div onclick="rotate10(this)" class="spin0"><img src="/escaperpg/images/avent/machineenigme/piece10.png"></div>
											<div onclick="rotate11(this)" class="spin0"><img src="/escaperpg/images/avent/machineenigme/piece11.png"></div>
											<div onclick="rotate12(this)" class="spin0"><img src="/escaperpg/images/avent/machineenigme/piece12.png"></div>
											<div onclick="rotate13(this)" class="spin0"><img src="/escaperpg/images/avent/machineenigme/piece13.png"></div>
											<div onclick="rotate14(this)" class="spin0"><img src="/escaperpg/images/avent/machineenigme/piece14.png"></div>
											<div onclick="rotate15(this)" class="spin0"><img src="/escaperpg/images/avent/machineenigme/piece15.png"></div>
											<div onclick="rotate16(this)" class="spin0"><img src="/escaperpg/images/avent/machineenigme/piece16.png"></div>
											<div onclick="rotate17(this)" class="spin0"><img src="/escaperpg/images/avent/machineenigme/piece17.png"></div>
											<div onclick="rotate18(this)" class="spin0"><img src="/escaperpg/images/avent/machineenigme/piece18.png"></div>
										</div>
										<br>
										Vous placez les différentes pièces de machine que vous avez trouvées et essayez de comprendre comment elle marche.<br>
										Vous prenez un peu de recul.<br>
										<br>
										Quel bazar ! Pas étonnant que la machine ait mal fonctionné ! Il va falloir remettre un peu d\'ordre dans tout ça !
									</p>
									<script src="/escaperpg/aventures/scripts/rotation.js"></script>
									<center>
										<span class="indice">Certaines des pièces semblent ne pas être installées correctement. Essayez de les faire bouger.</span><br>
										<br>
										<form action="grenier.php" method="post">
											<input type="text" name="activate"> <input type="submit" name="activer" value="ACTIVER.">
										</form>
										<br>
										<form action="grenier.php" method="post">
											<button type="submit" name="indicegrenier7" class="boutonindice"></button>
										</form>
									</center>
								';
							}
						elseif (isset ($_POST['indicegrenier7']))
							{
								echo '
									<p>
										<div id="machineenigme">
											<div onclick="rotate(this)" class="spin0"><img src="/escaperpg/images/avent/machineenigme/piece1.png"></div>
											<div onclick="rotate2(this)" class="spin0"><img src="/escaperpg/images/avent/machineenigme/piece2.png"></div>
											<div onclick="rotate3(this)" class="spin0"><img src="/escaperpg/images/avent/machineenigme/piece3.png"></div>
											<div onclick="rotate4(this)" class="spin0"><img src="/escaperpg/images/avent/machineenigme/piece4.png"></div>
											<div onclick="rotate5(this)" class="spin0"><img src="/escaperpg/images/avent/machineenigme/piece5.png"></div>
											<div onclick="rotate6(this)" class="spin0"><img src="/escaperpg/images/avent/machineenigme/piece6.png"></div>
											<div onclick="rotate7(this)" class="spin0"><img src="/escaperpg/images/avent/machineenigme/piece7.png"></div>
											<div onclick="rotate8(this)" class="spin0"><img src="/escaperpg/images/avent/machineenigme/piece8.png"></div>
											<div onclick="rotate9(this)" class="spin0"><img src="/escaperpg/images/avent/machineenigme/piece9.png"></div>
											<div onclick="rotate10(this)" class="spin0"><img src="/escaperpg/images/avent/machineenigme/piece10.png"></div>
											<div onclick="rotate11(this)" class="spin0"><img src="/escaperpg/images/avent/machineenigme/piece11.png"></div>
											<div onclick="rotate12(this)" class="spin0"><img src="/escaperpg/images/avent/machineenigme/piece12.png"></div>
											<div onclick="rotate13(this)" class="spin0"><img src="/escaperpg/images/avent/machineenigme/piece13.png"></div>
											<div onclick="rotate14(this)" class="spin0"><img src="/escaperpg/images/avent/machineenigme/piece14.png"></div>
											<div onclick="rotate15(this)" class="spin0"><img src="/escaperpg/images/avent/machineenigme/piece15.png"></div>
											<div onclick="rotate16(this)" class="spin0"><img src="/escaperpg/images/avent/machineenigme/piece16.png"></div>
											<div onclick="rotate17(this)" class="spin0"><img src="/escaperpg/images/avent/machineenigme/piece17.png"></div>
											<div onclick="rotate18(this)" class="spin0"><img src="/escaperpg/images/avent/machineenigme/piece18.png"></div>
										</div>
										<br>
										Vous placez les différentes pièces de machine que vous avez trouvées et essayez de comprendre comment elle marche.<br>
										Vous prenez un peu de recul.<br>
										<br>
										Quel bazar ! Pas étonnant que la machine ait mal fonctionné ! Il va falloir remettre un peu d\'ordre dans tout ça !
									</p>
									<script src="/escaperpg/aventures/scripts/rotation.js"></script>
									<center>
										<span class="indice">Certaines des pièces semblent ne pas être installées correctement. Essayez de les faire bouger.<br>
										Cliquez sur les pièces de machine qui ne sont pas dans le bon sens, cela les fera pivoter.
										Associez bien les embouts de couleur entre eux et vous devriez voir un mot se dessiner.</span><br>
										<br>
										<form action="grenier.php" method="post">
											<input type="text" name="activate"> <input type="submit" name="activer" value="ACTIVER.">
										</form>
										<br>
										<form action="grenier.php" method="post">
											<button type="submit" name="reponse" class="boutonreponse"></button>
										</form>
									</center>
								';
							}
						elseif (isset ($_POST['reponse']))
							{
								echo '
									<p>
										<div id="machineenigme">
											<div onclick="rotate(this)" class="spin0"><img src="/escaperpg/images/avent/machineenigme/piece1.png"></div>
											<div onclick="rotate2(this)" class="spin0"><img src="/escaperpg/images/avent/machineenigme/piece2.png"></div>
											<div onclick="rotate3(this)" class="spin0"><img src="/escaperpg/images/avent/machineenigme/piece3.png"></div>
											<div onclick="rotate4(this)" class="spin0"><img src="/escaperpg/images/avent/machineenigme/piece4.png"></div>
											<div onclick="rotate5(this)" class="spin0"><img src="/escaperpg/images/avent/machineenigme/piece5.png"></div>
											<div onclick="rotate6(this)" class="spin0"><img src="/escaperpg/images/avent/machineenigme/piece6.png"></div>
											<div onclick="rotate7(this)" class="spin0"><img src="/escaperpg/images/avent/machineenigme/piece7.png"></div>
											<div onclick="rotate8(this)" class="spin0"><img src="/escaperpg/images/avent/machineenigme/piece8.png"></div>
											<div onclick="rotate9(this)" class="spin0"><img src="/escaperpg/images/avent/machineenigme/piece9.png"></div>
											<div onclick="rotate10(this)" class="spin0"><img src="/escaperpg/images/avent/machineenigme/piece10.png"></div>
											<div onclick="rotate11(this)" class="spin0"><img src="/escaperpg/images/avent/machineenigme/piece11.png"></div>
											<div onclick="rotate12(this)" class="spin0"><img src="/escaperpg/images/avent/machineenigme/piece12.png"></div>
											<div onclick="rotate13(this)" class="spin0"><img src="/escaperpg/images/avent/machineenigme/piece13.png"></div>
											<div onclick="rotate14(this)" class="spin0"><img src="/escaperpg/images/avent/machineenigme/piece14.png"></div>
											<div onclick="rotate15(this)" class="spin0"><img src="/escaperpg/images/avent/machineenigme/piece15.png"></div>
											<div onclick="rotate16(this)" class="spin0"><img src="/escaperpg/images/avent/machineenigme/piece16.png"></div>
											<div onclick="rotate17(this)" class="spin0"><img src="/escaperpg/images/avent/machineenigme/piece17.png"></div>
											<div onclick="rotate18(this)" class="spin0"><img src="/escaperpg/images/avent/machineenigme/piece18.png"></div>
										</div>
										<br>
										Vous placez les différentes pièces de machine que vous avez trouvées et essayez de comprendre comment elle marche.<br>
										Vous prenez un peu de recul.<br>
										<br>
										Quel bazar ! Pas étonnant que la machine ait mal fonctionné ! Il va falloir remettre un peu d\'ordre dans tout ça !
									</p>
									<script src="/escaperpg/aventures/scripts/rotation.js"></script>
									<center>
										<span class="reponse">Le mot de passe à rentrer est Départ.</span><br>
										<br>
										<form action="grenier.php" method="post">
											<input type="text" name="activate"> <input type="submit" name="activer" value="ACTIVER.">
										</form>
									</center>
								';
							}
					}
					elseif (isset ($_POST['reference']))
						{
							switch (str_replace($search, $replace, stripslashes($_POST['ref'])))
								{
									case "7ff8357":
										echo '
											<audio src="/escaperpg/sons/avent/posepieces.mp3" autoplay></audio>
											<p>
												<div id="machineenigme">
													<div onclick="rotate(this)" class="spin0"><img src="/escaperpg/images/avent/machineenigme/piece1.png"></div>
													<div onclick="rotate2(this)" class="spin0"><img src="/escaperpg/images/avent/machineenigme/piece2.png"></div>
													<div onclick="rotate3(this)" class="spin0"><img src="/escaperpg/images/avent/machineenigme/piece3.png"></div>
													<div onclick="rotate4(this)" class="spin0"><img src="/escaperpg/images/avent/machineenigme/piece4.png"></div>
													<div onclick="rotate5(this)" class="spin0"><img src="/escaperpg/images/avent/machineenigme/piece5.png"></div>
													<div onclick="rotate6(this)" class="spin0"><img src="/escaperpg/images/avent/machineenigme/piece6.png"></div>
													<div onclick="rotate7(this)" class="spin0"><img src="/escaperpg/images/avent/machineenigme/piece7.png"></div>
													<div onclick="rotate8(this)" class="spin0"><img src="/escaperpg/images/avent/machineenigme/piece8.png"></div>
													<div onclick="rotate9(this)" class="spin0"><img src="/escaperpg/images/avent/machineenigme/piece9.png"></div>
													<div onclick="rotate10(this)" class="spin0"><img src="/escaperpg/images/avent/machineenigme/piece10.png"></div>
													<div onclick="rotate11(this)" class="spin0"><img src="/escaperpg/images/avent/machineenigme/piece11.png"></div>
													<div onclick="rotate12(this)" class="spin0"><img src="/escaperpg/images/avent/machineenigme/piece12.png"></div>
													<div onclick="rotate13(this)" class="spin0"><img src="/escaperpg/images/avent/machineenigme/piece13.png"></div>
													<div onclick="rotate14(this)" class="spin0"><img src="/escaperpg/images/avent/machineenigme/piece14.png"></div>
													<div onclick="rotate15(this)" class="spin0"><img src="/escaperpg/images/avent/machineenigme/piece15.png"></div>
													<div onclick="rotate16(this)" class="spin0"><img src="/escaperpg/images/avent/machineenigme/piece16.png"></div>
													<div onclick="rotate17(this)" class="spin0"><img src="/escaperpg/images/avent/machineenigme/piece17.png"></div>
													<div onclick="rotate18(this)" class="spin0"><img src="/escaperpg/images/avent/machineenigme/piece18.png"></div>
												</div>
												<br>
												Vous placez les différentes pièces de machine que vous avez trouvées et essayez de comprendre comment elle marche.<br>
												Vous prenez un peu de recul.<br>
												<br>
												Quel bazar ! Pas étonnant que la machine ait mal fonctionné ! Il va falloir remettre un peu d\'ordre dans tout ça !
											</p>
											<script src="/escaperpg/aventures/scripts/rotation.js"></script>
											<center>
												<form action="grenier.php" method="post">
													<input type="text" name="activate"> <input type="submit" name="activer" value="ACTIVER.">
												</form>
												<br>
												<form action="grenier.php" method="post">
													<button type="submit" name="indice" class="boutonindice"></button>
												</form>
											</center>
										';
										$_SESSION['reference'] = true;
										break;
									default:
										echo '
											<audio src="/escaperpg/sons/avent/posepieces.mp3" autoplay></audio>
											<p>
												Cela ne semble pas fonctionner, êtes-vous sûre d\'avoir fait ce qu\'il fallait ?<br>
												<br>
												Vous êtes face à l\'étrange machine de votre grand-père, avec les deux pièces que vous avez trouvées dans le grenier.<br>
												<br>
												Vous cherchez à les installer sur la machine mais il semblerait que les deux pièces soient très similaires.
												Peut-être y a-t-il un moyen de savoir dans quel ordre les positionner ?
											</p>
											<center>
												<form action="grenier.php" method="post">
													<input type="text" name="ref"> <input type="submit" name="reference" value="valider.">
												</form>
												<br>
												<form action="grenier.php" method="post">
													<button type="submit" name="indice" class="boutonindice"></button>
												</form>
											</center>
										';
								}
						}
					elseif (isset ($_POST['carteduciel']))
						{
							echo '
								<audio src="/escaperpg/sons/avent/tirercarte.mp3" autoplay></audio>
								<p>
									Vous trouvez une carte sur laquelle sont dessinées des étoiles reliées entre elles. Sans doute une constellation, bien que celle-ci semble incomplète.<br>
									<br>
									Vous la prenez avec vous, au cas où.
								</p>
								<center>
									<span class="important">Retournez la carte numéro 3.<br>
									<br>
									<form action="grenier.php" method="post">
										<input type="submit" name="suivant2" value="RETOUR.">
									</form>
								</center>
							';
							$_SESSION['carteciel'] = true;
						}
					elseif ($_SESSION['piecemachine1'] AND $_SESSION['piecemachine2'])
					{
						if (isset ($_POST['machineetrange']))
						{
							echo '
								<p>
									Vous êtes face à l\'étrange machine de votre grand-père, avec les deux pièces que vous avez trouvées dans le grenier.<br>
									<br>
									Vous cherchez à les installer sur la machine mais il semblerait que les deux pièces soient très similaires.
									Peut-être y a-t-il un moyen de savoir dans quel ordre les positionner ?
								</p>
								<center>
									<form action="grenier.php" method="post">
										<input type="text" name="ref"> <input type="submit" name="reference" value="valider.">
									</form>
									<br>
									<form action="grenier.php" method="post">
										<button type="submit" name="indice" class="boutonindice"></button>
									</form>
								</center>
							';
						}
						elseif (isset ($_POST['indice']))
							{
								echo '
									<p>
										Vous êtes face à l\'étrange machine de votre grand-père, avec les deux pièces que vous avez trouvées dans le grenier.<br>
										<br>
										Vous cherchez à les installer sur la machine mais il semblerait que les deux pièces soient très similaires.
										Peut-être y a-t-il un moyen de savoir dans quel ordre les positionner ?
									</p>
									<center>
										<span class="indice">Observez bien les deux pièces que vous avez récupérées. Il y a sans doute un indice dessus.</span><br>
										<br>
										<form action="grenier.php" method="post">
											<input type="text" name="ref"> <input type="submit" name="reference" value="valider.">
										</form>
										<br>
										<form action="grenier.php" method="post">
											<button type="submit" name="indicegrenier4" class="boutonindice"></button>
										</form>
									</center>
								';
							}
						elseif (isset ($_POST['indicegrenier4']))
							{
								echo '
									<p>
										Vous êtes face à l\'étrange machine de votre grand-père, avec les deux pièces que vous avez trouvées dans le grenier.<br>
										<br>
										Vous cherchez à les installer sur la machine mais il semblerait que les deux pièces soient très similaires.
										Peut-être y a-t-il un moyen de savoir dans quel ordre les positionner ?
									</p>
									<center>
										<span class="indice">Observez bien les deux pièces que vous avez récupérées. Il y a sans doute un indice dessus.<br>
										Avez-vous remarqué les références qui sont gravées sur les plaques ?</span><br>
										<br>
										<form action="grenier.php" method="post">
											<input type="text" name="ref"> <input type="submit" name="reference" value="valider.">
										</form>
										<br>
										<form action="grenier.php" method="post">
											<button type="submit" name="indicegrenier5" class="boutonindice"></button>
										</form>
									</center>
								';
							}
						elseif (isset ($_POST['indicegrenier5']))
							{
								echo '
									<p>
										Vous êtes face à l\'étrange machine de votre grand-père, avec les deux pièces que vous avez trouvées dans le grenier.<br>
										<br>
										Vous cherchez à les installer sur la machine mais il semblerait que les deux pièces soient très similaires.
										Peut-être y a-t-il un moyen de savoir dans quel ordre les positionner ?
									</p>
									<center>
										<span class="indice">Observez bien les deux pièces que vous avez récupérées. Il y a sans doute un indice dessus.<br>
										Avez-vous remarqué les références qui sont gravées sur les plaques ?<br>
										Pour trouver l\'ordre, fiez-vous à la forme des pièces. Ne vous rappellent-elles pas quelque chose ?</span><br>
										<br>
										<form action="grenier.php" method="post">
											<input type="text" name="ref"> <input type="submit" name="reference" value="valider.">
										</form>
										<br>
										<form action="grenier.php" method="post">
											<button type="submit" name="reponse" class="boutonreponse"></button>
										</form>
									</center>
								';
							}
						elseif (isset ($_POST['reponse']))
							{
								echo '
									<p>
										Vous êtes face à l\'étrange machine de votre grand-père, avec les deux pièces que vous avez trouvées dans le grenier.<br>
										<br>
										Vous cherchez à les installer sur la machine mais il semblerait que les deux pièces soient très similaires.
										Peut-être y a-t-il un moyen de savoir dans quel ordre les positionner ?
									</p>
									<center>
										<span class="reponse">Les pièces de machine forment les chiffres 1 et 2 pour donner l\'ordre.
										La référence à entrer est 7ff-8357.</span><br>
										<br>
										<form action="grenier.php" method="post">
											<input type="text" name="ref"> <input type="submit" name="reference" value="valider.">
										</form>
									</center>
								';
							}
						else
						{
							echo '
								<p>
									Vous regardez autour de vous.
									En attendant qu\'il revienne, peut-être pouvez-vous essayer de remettre la machine en état de marche ?<br>
									<br>
									<div id="enigmelieu">
										<img src="/escaperpg/images/avent/grenier.png">
										<div id="machine">
											<form action="grenier.php" method="post">
												<button type="submit" name="machineetrange">
													<img src="/escaperpg/images/avent/machine.png">
												</button>
											</form>
										</div>
										<div id="piecedemachine1">
											<form action="grenier.php" method="post">
												<button type="submit" name="piecemachine1">
													<img src="/escaperpg/images/avent/piece1.png">
												</button>
											</form>
										</div>
										<div id="piecedemachine2">
											<form action="grenier.php" method="post">
												<button type="submit" name="piecemachine2">
													<img src="/escaperpg/images/avent/piece2.png">
												</button>
											</form>
										</div>
										<div id="carteciel">
											<form action="grenier.php" method="post">
												<button type="submit" name="carteduciel">
													<img src="/escaperpg/images/avent/carteciel.png">
												</button>
											</form>
										</div>
									</div>
								</p>
							';
						}
					}
					elseif (isset ($_POST['machineetrange']) AND $_SESSION['piecemachine1'] == false AND $_SESSION['piecemachine2'] == false) // Le joueur n'a trouvé aucune pièce de machine
						{
							echo '
								<p>
									Il manque des pièces à cette machine. Si vous voulez la démarrer, il va falloir trouver de quoi la réparer.
								</p>
								<center>
									<form action="grenier.php" method="post">
										<input type="submit" name="suivant2" value="RETOUR.">
									</form>
								</center>
							';
						}
					elseif (isset ($_POST['machineetrange']) AND $_SESSION['piecemachine1'] == false OR isset ($_POST['machineetrange']) AND $_SESSION['piecemachine2'] == false) // Le joueur n'a trouvé qu'une pièce de machine
						{
							echo '
								<p>
									Vous essayez de placer la pièce que vous avez trouvée mais rien ne se passe.
									Il manque sans doute encore quelque chose, vous devriez retourner fouiller le grenier.
								</p>
								<center>
									<form action="grenier.php" method="post">
										<input type="submit" name="suivant2" value="RETOUR.">
									</form>
								</center>
							';
						}
					elseif (isset ($_POST['piecemachine1']))
						{
							echo '
								<audio src="/escaperpg/sons/avent/tirercarte.mp3" autoplay></audio>
								<p>
									Vous trouvez une pièce de machine étrange qui pourrait parfaitement convenir.
								</p>
								<center>
									<span class="important">Retournez la carte numéro 5.<br>
									<br>
									<form action="grenier.php" method="post">
										<input type="submit" name="suivant2" value="RETOUR.">
									</form>
								</center>
							';
							$_SESSION['piecemachine1'] = true;
						}
					elseif (isset ($_POST['piecemachine2']))
						{
							echo '
								<audio src="/escaperpg/sons/avent/tirercarte.mp3" autoplay></audio>
								<p>
									Vous trouvez une pièce de machine étrange qui pourrait parfaitement convenir.
								</p>
								<center>
									<span class="important">Retournez la carte numéro 12.<br>
									<br>
									<form action="grenier.php" method="post">
										<input type="submit" name="suivant2" value="RETOUR.">
									</form>
								</center>
							';
							$_SESSION['piecemachine2'] = true;
						}
					elseif (isset ($_POST['reponse']) OR isset ($_POST['suivant2']) AND $_SESSION['reponsegrenier1'])
						{
							echo '
								<p>
									Vous regardez autour de vous.
									En attendant qu\'il revienne, peut-être pouvez-vous essayer de remettre la machine en état de marche ?<br>
									<br>
									<div id="enigmelieu">
										<img src="/escaperpg/images/avent/grenier.png">
										<div id="machine">
											<form action="grenier.php" method="post">
												<button type="submit" name="machineetrange">
													<img src="/escaperpg/images/avent/machine.png">
												</button>
											</form>
										</div>
										<div id="piecedemachine1">
											<form action="grenier.php" method="post">
												<button type="submit" name="piecemachine1">
													<img src="/escaperpg/images/avent/piece1.png">
												</button>
											</form>
										</div>
										<div id="piecedemachine2">
											<form action="grenier.php" method="post">
												<button type="submit" name="piecemachine2">
													<img src="/escaperpg/images/avent/piece2.png">
												</button>
											</form>
										</div>
										<div id="carteciel">
											<form action="grenier.php" method="post">
												<button type="submit" name="carteduciel">
													<img src="/escaperpg/images/avent/carteciel.png">
												</button>
											</form>
										</div>
									</div>
								</p>
								<center>
									<span class="reponse">Cliquez sur le tuyau posé sur la table de gauche, ainsi que sur celui caché sous la table du centre.
									Une fois les deux pièces trouvées, cliquez directement sur la machine qui est sur la table.</span>
								</center>
							';
							$_SESSION['reponsegrenier1'] = true;
						}
					elseif (isset ($_POST['indicegrenier2']) OR isset ($_POST['suivant2']) AND $_SESSION['indicegrenier2'])
						{
							echo '
								<p>
									Vous regardez autour de vous.
									En attendant qu\'il revienne, peut-être pouvez-vous essayer de remettre la machine en état de marche ?<br>
									<br>
									<div id="enigmelieu">
										<img src="/escaperpg/images/avent/grenier.png">
										<div id="machine">
											<form action="grenier.php" method="post">
												<button type="submit" name="machineetrange">
													<img src="/escaperpg/images/avent/machine.png">
												</button>
											</form>
										</div>
										<div id="piecedemachine1">
											<form action="grenier.php" method="post">
												<button type="submit" name="piecemachine1">
													<img src="/escaperpg/images/avent/piece1.png">
												</button>
											</form>
										</div>
										<div id="piecedemachine2">
											<form action="grenier.php" method="post">
												<button type="submit" name="piecemachine2">
													<img src="/escaperpg/images/avent/piece2.png">
												</button>
											</form>
										</div>
										<div id="carteciel">
											<form action="grenier.php" method="post">
												<button type="submit" name="carteduciel">
													<img src="/escaperpg/images/avent/carteciel.png">
												</button>
											</form>
										</div>
									</div>
								</p>
								<center>
									<span class="indice">Fouillez bien l\'image, il y a sans doute des choses sur lesquelles cliquer.<br>
									Vous pouvez trouver deux pièces de machines cachées dans le décor, ainsi qu\'un autre objet.</span><br>
									<br>
									<form action="grenier.php" method="post">
										<button type="submit" name="reponse" class="boutonreponse"></button>
									</form>
								</center>
							';
							$_SESSION['indicegrenier2'] = true;
						}
					elseif (isset ($_POST['indice']) OR isset ($_POST['suivant2']) AND $_SESSION['indicegrenier1'])
						{
							echo '
								<p>
									Vous regardez autour de vous.
									En attendant qu\'il revienne, peut-être pouvez-vous essayer de remettre la machine en état de marche ?<br>
									<br>
									<div id="enigmelieu">
										<img src="/escaperpg/images/avent/grenier.png">
										<div id="machine">
											<form action="grenier.php" method="post">
												<button type="submit" name="machineetrange">
													<img src="/escaperpg/images/avent/machine.png">
												</button>
											</form>
										</div>
										<div id="piecedemachine1">
											<form action="grenier.php" method="post">
												<button type="submit" name="piecemachine1">
													<img src="/escaperpg/images/avent/piece1.png">
												</button>
											</form>
										</div>
										<div id="piecedemachine2">
											<form action="grenier.php" method="post">
												<button type="submit" name="piecemachine2">
													<img src="/escaperpg/images/avent/piece2.png">
												</button>
											</form>
										</div>
										<div id="carteciel">
											<form action="grenier.php" method="post">
												<button type="submit" name="carteduciel">
													<img src="/escaperpg/images/avent/carteciel.png">
												</button>
											</form>
										</div>
									</div>
								</p>
								<center>
									<span class="indice">Fouillez bien l\'image, il y a sans doute des choses sur lesquelles cliquer.</span><br>
									<br>
									<form action="grenier.php" method="post">
										<button type="submit" name="indicegrenier2" class="boutonindice"></button>
									</form>
								</center>
							';
							$_SESSION['indicegrenier1'] = true;
						}
					elseif (isset($_POST['suivant2']))
						{
							echo '
								<p>
									Vous regardez autour de vous.
									En attendant qu\'il revienne, peut-être pouvez-vous essayer de remettre la machine en état de marche ?<br>
									<br>
									<div id="enigmelieu">
										<img src="/escaperpg/images/avent/grenier.png">
										<div id="machine">
											<form action="grenier.php" method="post">
												<button type="submit" name="machineetrange">
													<img src="/escaperpg/images/avent/machine.png">
												</button>
											</form>
										</div>
										<div id="piecedemachine1">
											<form action="grenier.php" method="post">
												<button type="submit" name="piecemachine1">
													<img src="/escaperpg/images/avent/piece1.png">
												</button>
											</form>
										</div>
										<div id="piecedemachine2">
											<form action="grenier.php" method="post">
												<button type="submit" name="piecemachine2">
													<img src="/escaperpg/images/avent/piece2.png">
												</button>
											</form>
										</div>
										<div id="carteciel">
											<form action="grenier.php" method="post">
												<button type="submit" name="carteduciel">
													<img src="/escaperpg/images/avent/carteciel.png">
												</button>
											</form>
										</div>
									</div>
								</p>
								<center>
									<form action="grenier.php" method="post">
										<button type="submit" name="indice" class="boutonindice"></button>
									</form>
								</center>
							';
						}
					elseif (isset ($_POST['suivant']))
						{
							echo '
								<p>
									L\'énorme machine qui se tient là semble incomplète. Vous constatez çà et là de petites marques de brûlures.
									La table sur laquelle l\'engin est posé comporte elle aussi ce genre de traces.<br>
									<br>
									En voulant activer le mécanisme, votre grand-père a dû faire une erreur et la machine s\'est disloquée.
									Il est parti acheter les pièces dont il avait besoin pour corriger le problème, c\'est sûr !<br>
									<br>
									En tout cas, vous espérez qu\'il ne s\'est pas blessé, ou pire : qu\'il ait fini à l\'hôpital !
								</p>
								<center>
									<form action="grenier.php" method="post">
										<input type="submit" name="suivant2" value="SUIVANT.">
									</form>
								</center>
							';
						}
					else
						{
							echo '
								<audio src="/escaperpg/sons/avent/pasescalier.mp3" autoplay></audio>
								<p>
									Vous montez les marches et arrivez dans la grande pièce sous les combles où s\'entassent pêle-mêle toutes sortes d\'inventions -achevées ou non- au milieu de piles de cartons remplis de matériaux,
									de montagnes de feuilles parcourues de croquis ou encore de livres tellement vieux et usés que vous n\'oseriez même pas les ouvrir, de peur de voir leurs pages tomber en miettes.<br>
									<br>
									Regardant autour de vous, vous ne trouvez toujours pas Arthur.<br>
									Vous connaissez la plupart des créations autour de vous, ayant même aidé votre grand-père à travailler sur certaines d\'entre elles.<br>
									<br>
									Il y en a une, cependant, que vous n\'aviez jamais vue. Elle trône au beau milieu de la pièce, sur une table.<br>
									Fascinée, vous vous en approchez.
								</p>
								<center>
									<form action="grenier.php" method="post">
										<input type="submit" name="suivant" value="SUIVANT.">
									</form>
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