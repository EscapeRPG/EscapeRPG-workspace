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
		<title>Retour - Le Grenier d'Arthur</title>
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
					if (isset ($_POST['ask']))
						{
							echo'
								<p>
									<div class="dialogue">
										<div class="portrait">
											<img src="/escaperpg/images/avent/arthur.png">
										</div>
										<div class="bulleperso">
											<p>
												Oh, ma chérie, c\'est un homme très, très occupé, tu sais ?
												Moi-même je n\'ai eu la chance de le rencontrer que deux fois !
												Tu auras sans doute l\'occasion de le voir plus tard.
												Tu as déjà la chance de pouvoir être ici, c\'est aussi ça, la magie de Noël !<br>
												<br>
												Allez viens, il est temps que nous rentrions, maintenant.
											</p>
										</div>
									</div>
									<br>
									Il vous tend la main et vous avancez tous les deux dans cette ville magique.<br>
									<br>
									Là où auparavant s\'étendaient des rues calmes et vides, de nombreuses petites silhouettes s\'activent maintenant.
									Certaines marchent tranquillement tandis que d\'autres courent en tous sens, les bras lestés de paquets.<br>
									<br>
									Vous tirez la manche de votre grand-père, surprise devant toute cette nouvelle activité !<br>
									<br>
									<div class="dialogue">
										<div class="portrait">
											<img src="/escaperpg/images/avent/arthur.png">
										</div>
										<div class="bulleperso">
											<p>
												Eh oui, ce sont les lutins !
												Maintenant que tu as vécu un peu de la magie de Noël, tu peux les voir, toi aussi !<br>
												<br>
												Mais ne les dérangeons pas, ils ont beaucoup à faire.
											</p>
										</div>
									</div>
									<br>
									Il vous emmène dans un grand bâtiment ressemblant à un entrepôt où des étagères remplies de bocaux s\'entassent contre les murs.<br>
									<br>
									Votre grand-père se dirige vers une imposante machine.<br>
									<br>
									<div class="dialogue">
										<div class="portrait">
											<img src="/escaperpg/images/avent/arthur.png">
										</div>
										<div class="bulleperso">
											<p>
												Voici la machine qui va nous permettre de rentrer. Viens par là.
											</p>
										</div>
									</div>
									<br>
									Vous le suivez et vous placez à côté de l\'engin.<br>
									<br>
									<div class="dialogue">
										<div class="portrait">
											<img src="/escaperpg/images/avent/arthur.png">
										</div>
										<div class="bulleperso">
											<p>
												Voilà, il n\'y a plus qu\'à appuyer sur ce bouton et…
											</p>
										</div>
									</div>
									<br>
									Il appuie dessus, mais rien ne se passe.
								</p>
								<center>
									<form action="retour" method="post">
										<input type="submit" name="suivant" value="suivant.">
									</form>
								</center>
							';
						}
					elseif (isset ($_POST['suivant']))
						{
							echo'
								<audio src="/escaperpg/sons/avent/fouille.mp3" autoplay></audio>
								<p>
									<div class="dialogue">
										<div class="portrait">
											<img src="/escaperpg/images/avent/arthur.png">
										</div>
										<div class="bulleperso">
											<p>
												Mince ! Il n\'y a plus de carburant !<br>
												Eh bien il ne nous reste qu\'à en fabriquer.
												Tu vas voir, ça n\'est pas bien compliqué.
												Il doit y avoir la recette quelque part par là…
											</p>
										</div>
									</div>
									<br>
									Il fouille l\'une des étagères.<br>
									<br>
									<div class="dialogue">
										<div class="portrait">
											<img src="/escaperpg/images/avent/arthur.png">
										</div>
										<div class="bulleperso">
											<p>
												Ah ! La voici !<br>
												Tiens, regarde un peu autour de toi et va me chercher les ingrédients dont on a besoin.
												Ça devrait se trouver sur l\'étagère, là-bas.
											</p>
										</div>
									</div>
									<br>
									Il vous pointe du doigt un meuble rempli de bocaux. Vous vous y dirigez.
								</p>
								<center>
									<form action="retour" method="post">
										<input type="submit" name="suivant2" value="suivant.">
									</form>
								</center>
							';
						}
					elseif (isset ($_POST['suivant2']))
						{
							echo'
								<p>
									Vous lisez la recette, qui vous indique :<br>
									<br>
									- Utilisez une dose de poudre de fée. Elle est généralement rangée sur l\'étagère du bas.<br>
									- Ajoutez ensuite une pincée d\'épines de sapin.<br>
									- Après cela, versez un peu de mixture de groseilles. S\'il n\'en reste plus, il suffit de broyer quelques fruits avec du miel.<br>
									- Une fois que c\'est fait, n\'oubliez pas de mettre un zeste de concentré de flocons de neige.<br>
									- Enfin, mélangez un peu de lait avec du sucre d\'orge liquide et faites lentement couler le tout dans le réservoir. Le sucre d\'orge est sur l\'étagère du haut, un peu à l\'écart.<br>
									<br>
									<div id="enigmelieu">
										<img src="/escaperpg/images/avent/etagerecarburant.png">
									</div>
									<br>
									D\'après ce que vous comprenez, vous avez besoin de 5 ingrédients à verser dans un ordre particulier dans la machine.<br>
									<br>
									Le contenu de tous les bocaux est de différentes couleurs.
								</p>
								<center>
									<form action="retour" method="post">
										<input type="text" name="prendre"> <input type="submit" name="take" value="prendre.">
									</form>
									<br>
									<form action="retour" method="post">
										<button type="submit" name="indice" class="boutonindice"></button>
									</form>
								</center>
							';
						}
					elseif (isset ($_POST['indice']))
						{
							echo'
								<p>
									Vous lisez la recette, qui vous indique :<br>
									<br>
									- Utilisez une dose de poudre de fée. Elle est généralement rangée sur l\'étagère du bas.<br>
									- Ajoutez ensuite une pincée d\'épines de sapin.<br>
									- Après cela, versez un peu de mixture de groseilles. S\'il n\'en reste plus, il suffit de broyer quelques fruits avec du miel.<br>
									- Une fois que c\'est fait, n\'oubliez pas de mettre un zeste de concentré de flocons de neige.<br>
									- Enfin, mélangez un peu de lait avec du sucre d\'orge liquide et faites lentement couler le tout dans le réservoir. Le sucre d\'orge est sur l\'étagère du haut, un peu à l\'écart.<br>
									<br>
									<div id="enigmelieu">
										<img src="/escaperpg/images/avent/etagerecarburant.png">
									</div>
									<br>
									D\'après ce que vous comprenez, vous avez besoin de 5 ingrédients à verser dans un ordre particulier dans la machine.<br>
									<br>
									Les bocaux ont tous des couleurs différentes.
								</p>
								<center>
									<span class="indice">Essayez de repérer tous les produits dont vous avez besoin. Ils ont tous une couleur particulière.</span><br>
									<br>
									<form action="retour" method="post">
										<input type="text" name="prendre"> <input type="submit" name="take" value="prendre.">
									</form>
									<br>
									<form action="retour" method="post">
										<button type="submit" name="indiceretour2" class="boutonindice"></button>
									</form>
								</center>
							';
						}
					elseif (isset ($_POST['indiceretour2']))
						{
							echo'
								<p>
									Vous lisez la recette, qui vous indique :<br>
									<br>
									- Utilisez une dose de poudre de fée. Elle est généralement rangée sur l\'étagère du bas.<br>
									- Ajoutez ensuite une pincée d\'épines de sapin.<br>
									- Après cela, versez un peu de mixture de groseilles. S\'il n\'en reste plus, il suffit de broyer quelques fruits avec du miel.<br>
									- Une fois que c\'est fait, n\'oubliez pas de mettre un zeste de concentré de flocons de neige.<br>
									- Enfin, mélangez un peu de lait avec du sucre d\'orge liquide et faites lentement couler le tout dans le réservoir. Le sucre d\'orge est sur l\'étagère du haut, un peu à l\'écart.<br>
									<br>
									<div id="enigmelieu">
										<img src="/escaperpg/images/avent/etagerecarburant.png">
									</div>
									<br>
									D\'après ce que vous comprenez, vous avez besoin de 5 ingrédients à verser dans un ordre particulier dans la machine.<br>
									<br>
									Les bocaux ont tous des couleurs différentes.
								</p>
								<center>
									<span class="indice">Essayez de repérer tous les produits dont vous avez besoin. Ils ont tous une couleur particulière.<br>
									Regardez bien les cartes que vous avez, certaines ont des dos de couleur.</span><br>
									<br>
									<form action="retour" method="post">
										<input type="text" name="prendre"> <input type="submit" name="take" value="prendre.">
									</form>
									<br>
									<form action="retour" method="post">
										<button type="submit" name="indiceretour3" class="boutonindice"></button>
									</form>
								</center>
							';
						}
					elseif (isset ($_POST['indiceretour3']))
						{
							echo'
								<p>
									Vous lisez la recette, qui vous indique :<br>
									<br>
									- Utilisez une dose de poudre de fée. Elle est généralement rangée sur l\'étagère du bas.<br>
									- Ajoutez ensuite une pincée d\'épines de sapin.<br>
									- Après cela, versez un peu de mixture de groseilles. S\'il n\'en reste plus, il suffit de broyer quelques fruits avec du miel.<br>
									- Une fois que c\'est fait, n\'oubliez pas de mettre un zeste de concentré de flocons de neige.<br>
									- Enfin, mélangez un peu de lait avec du sucre d\'orge liquide et faites lentement couler le tout dans le réservoir. Le sucre d\'orge est sur l\'étagère du haut, un peu à l\'écart.<br>
									<br>
									<div id="enigmelieu">
										<img src="/escaperpg/images/avent/etagerecarburant.png">
									</div>
									<br>
									D\'après ce que vous comprenez, vous avez besoin de 5 ingrédients à verser dans un ordre particulier dans la machine.<br>
									<br>
									Les bocaux ont tous des couleurs différentes.
								</p>
								<center>
									<span class="indice">Essayez de repérer tous les produits dont vous avez besoin. Ils ont tous une couleur particulière.<br>
									Regardez bien les cartes que vous avez, certaines ont des dos de couleur.<br>
									Prenez dans l\'ordre, les cartes de couleur bleu, vert, orange, blanc et rose.</span><br>
									<br>
									<form action="retour" method="post">
										<input type="text" name="prendre"> <input type="submit" name="take" value="prendre.">
									</form>
									<br>
									<form action="retour" method="post">
										<button type="submit" name="reponse" class="boutonreponse"></button>
									</form>
								</center>
							';
						}
					elseif (isset ($_POST['reponse']))
						{
							echo'
								<p>
									Vous lisez la recette, qui vous indique :<br>
									<br>
									- Utilisez une dose de poudre de fée. Elle est généralement rangée sur l\'étagère du bas.<br>
									- Ajoutez ensuite une pincée d\'épines de sapin.<br>
									- Après cela, versez un peu de mixture de groseilles. S\'il n\'en reste plus, il suffit de broyer quelques fruits avec du miel.<br>
									- Une fois que c\'est fait, n\'oubliez pas de mettre un zeste de concentré de flocons de neige.<br>
									- Enfin, mélangez un peu de lait avec du sucre d\'orge liquide et faites lentement couler le tout dans le réservoir. Le sucre d\'orge est sur l\'étagère du haut, un peu à l\'écart.<br>
									<br>
									<div id="enigmelieu">
										<img src="/escaperpg/images/avent/etagerecarburant.png">
									</div>
									<br>
									D\'après ce que vous comprenez, vous avez besoin de 5 ingrédients à verser dans un ordre particulier dans la machine.<br>
									<br>
									Les bocaux ont tous des couleurs différentes.
								</p>
								<center>
									<span class="reponse">Le code à rentrer est "Paré au décollage".</span><br>
									<br>
									<form action="retour" method="post">
										<input type="text" name="prendre"> <input type="submit" name="take" value="prendre.">
									</form>
								</center>
							';
						}
					elseif (isset ($_POST['take']))
						{
							switch (str_replace($search, $replace, stripslashes($_POST['prendre'])))
								{
									case "pareaudecollage":
										echo'
											<audio src="/escaperpg/sons/avent/essence.mp3" autoplay></audio>
											<p>
												Vous ramenez le nécessaire à votre grand-père qui les met dans une machine.<br>
												<br>
												Quelques secondes plus tard, la machine ressort un petit bidon rempli d\'un liquide doré qu\'Arthur verse dans le réservoir.<br /<
												<br>
												<div class="dialogue">
													<div class="portrait">
														<img src="/escaperpg/images/avent/arthur.png">
													</div>
													<div class="bulleperso">
														<p>
															Bien, tout devrait fonctionner maintenant ! Tu es prête ?
														</p>
													</div>
												</div>
											</p>
											<center>
												<form action="fin" method="post">
													<input type="submit" name="oui" value="oui.">
												</form>
											</center>
										';
										break;
									default:
										echo'
											<p>
												Cela ne semble pas être les bons ingrédients.<br>
												<br>
												La recette indique :<br>
												<br>
												- Utilisez une dose de poudre de fée. Elle est généralement rangée sur l\'étagère du bas.<br>
												- Ajoutez ensuite une pincée d\'épines de sapin.<br>
												- Après cela, versez un peu de mixture de groseilles. S\'il n\'en reste plus, il suffit de broyer quelques fruits avec du miel.<br>
												- Une fois que c\'est fait, n\'oubliez pas de mettre un zeste de concentré de flocons de neige.<br>
												- Enfin, mélangez un peu de lait avec du sucre d\'orge liquide et faites lentement couler le tout dans le réservoir. Le sucre d\'orge est sur l\'étagère du haut, un peu à l\'écart.<br>
												<br>
												<div id="enigmelieu">
													<img src="/escaperpg/images/avent/etagerecarburant.png">
												</div>
												<br>
												D\'après ce que vous comprenez, vous avez besoin de 5 ingrédients à verser dans un ordre particulier dans la machine.<br>
												<br>
												Les bocaux ont tous des couleurs différentes.
											</p>
											<center>
												<form action="retour" method="post">
													<input type="text" name="prendre"> <input type="submit" name="take" value="prendre.">
												</form>
												<br>
												<form action="retour" method="post">
													<button type="submit" name="indice" class="boutonindice"></button>
												</form>
											</center>
										';
								}
						}
					else
						{
							echo '
								<audio src="/escaperpg/sons/avent/cadeau.mp3" autoplay></audio>
								<p>
									Sans pouvoir contenir votre excitation, vous déchirez le papier recouvrant le cadeau et y découvrez un petit coffret en bois.<br>
									L\'ouvrant, vous y trouvez un petit attirail d\'outils. Ici, de magnifiques tournevis avec un manche en bois. Là, un marteau à l\'air solide.
									Il y a également plusieurs petites pinces et un très joli mètre ruban.<br>
									<br>
									Au fond de la boîte se trouve un petit papier plié en deux. Vous le sortez et l\'ouvrez.<br>
									<br>
									<div id="enigmelieu">
										<img src="/escaperpg/images/avent/lettreperenoel.png">
									</div>
									<br>
									<div class="dialogue">
										<div class="portrait">
											<img src="/escaperpg/images/avent/arthur.png">
										</div>
										<div class="bulleperso">
											<p>
												Eh bien, on dirait que le Père Noël a voulu te faire un petit cadeau en avance cette année !
												Il sait vraiment comment faire plaisir aux enfants, c\'est un présent parfait pour une future mécanicienne !
											</p>
										</div>
									</div>
									<br>
									Vous riez tous deux de bon cœur. Une fois calmés, vous ne pouvez vous empêcher de demander à votre grand-père où se trouve le Père Noël.
									Vous aimeriez tellement le rencontrer !
								</p>
								<center>
									<form action="retour" method="post">
										<input type="submit" name="ask" value="demander.">
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
