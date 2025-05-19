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
		<title>Retour au manoir - Secrets Familiaux</title>
	</head>
	
	<body onload="chargement()">
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
					if (isset ($_POST['agir']) OR $_SESSION['end'])
						{
							if ($_SESSION['cuves'] AND $_SESSION['chienssauvesfin'] AND $_SESSION['pnakotiques']) // goodending
								{
									if (isset ($_POST['rituel']) OR $_SESSION['rituelg'])
										{
											echo '
												<audio src="/escaperpg/sons/secrets/rituel.mp3" autoplay></audio>
												<div id="cerclerituel">
													<div class="droppercercle" id="symb1"></div>
													<div class="droppercercle" id="symb2"></div>
													<div class="droppercercle" id="symb3"></div>
													<div class="droppercercle" id="symb4"></div>
													<div class="droppercercle" id="symb5"></div>
													<div class="droppercercle" id="symb6"></div>
													<div class="droppercercle" id="symb7"></div>
													<div class="droppercercle" id="symb8"></div>
													<div class="droppercercle" id="symb9"></div>
													<div class="droppercercle" id="symb10"></div>
													<div class="droppercercle" id="symb11"></div>
													<div class="droppercercle" id="symb12"></div>
													<div class="droppercercle" id="symb13"></div>
													<div class="droppercercle" id="symb14"></div>
												</div>
												<br>
												<center>
													<div class="draggablecercle" id="dragsymb1"><img src="/escaperpg/images/secrets/symboles/symbole1.png" id="mag1"></div>
													<div class="draggablecercle" id="dragsymb2"><img src="/escaperpg/images/secrets/symboles/symbole2.png" id="mag2"></div>
													<div class="draggablecercle" id="dragsymb3"><img src="/escaperpg/images/secrets/symboles/symbole3.png" id="mag3"></div>
													<div class="draggablecercle" id="dragsymb4"><img src="/escaperpg/images/secrets/symboles/symbole4.png" id="mag4"></div>
													<div class="draggablecercle" id="dragsymb5"><img src="/escaperpg/images/secrets/symboles/symbole5.png" id="mag5"></div>
													<div class="draggablecercle" id="dragsymb6"><img src="/escaperpg/images/secrets/symboles/symbole6.png" id="mag6"></div>
													<div class="draggablecercle" id="dragsymb7"><img src="/escaperpg/images/secrets/symboles/symbole7.png" id="mag7"></div>
													<div class="draggablecercle" id="dragsymb8"><img src="/escaperpg/images/secrets/symboles/symbole8.png" id="mag8"></div>
													<div class="draggablecercle" id="dragsymb9"><img src="/escaperpg/images/secrets/symboles/symbole9.png" id="mag9"></div>
													<div class="draggablecercle" id="dragsymb10"><img src="/escaperpg/images/secrets/symboles/symbole10.png" id="mag10"></div>
													<div class="draggablecercle" id="dragsymb11"><img src="/escaperpg/images/secrets/symboles/symbole11.png" id="mag11"></div>
													<div class="draggablecercle" id="dragsymb12"><img src="/escaperpg/images/secrets/symboles/symbole12.png" id="mag12"></div>
													<div class="draggablecercle" id="dragsymb13"><img src="/escaperpg/images/secrets/symboles/symbole13.png" id="mag13"></div>
													<div class="draggablecercle" id="dragsymb14"><img src="/escaperpg/images/secrets/symboles/symbole14.png" id="mag14"></div>
												</center>
												<br>
												<script src="/escaperpg/aventures/scripts/dragdropcerclegoodending.js"></script>
												<center>
													<form action="shoggoth" method="post">
														<input type="submit" name="reset" value="Réinitialiser.">
													</form>
												</center>
											';
											if (isset($_POST['reponse']))
												{
													echo'
														<div id="enigmelieu">
															<img src="/escaperpg/images/secrets/cerclerituelreponse.png">
														</div>
													';
												}
											elseif (isset($_POST['indice3']))
												{
													echo '
														<p>
															<span class="indice">
																Les trois symboles les plus excentrés doivent être complétés avec les astres (Soleil, Jupiter et Pluton).<br>
																Le plus grand cercle doit recevoir l\'intention (Éveil Psychique, planète Terre, Protection et Bannir).<br>
																Les 4 symboles à l\'intérieur du cercle interne sont ceux représentant les éléments Air, Eau, Feu et Terre (N-A signifie "Nord-Air", etc).<br>
																Tout au centre se trouveront les 3 symboles indiquant l\'effet que vous voulez (Voyage, Lien, Éther).<br>
																Attention de bien suivre les indications pour placer les symboles dans le sens des aiguilles d\'une montre ou inversement.<br>
																Le Lien est représenté par une Corde.
															</span>
														</p>
														<center>
															<form action="shoggoth" method="post">
																<button type="submit" name="reponse" class="boutonreponse"></button>
															</form>
														</center>
													';
												}
											elseif (isset($_POST['indice2']))
												{
													echo '
														<p>
															<span class="indice">
																Les trois symboles les plus excentrés doivent être complétés avec les astres (Soleil, Jupiter et Pluton).<br>
																Le plus grand cercle doit recevoir l\'intention (Éveil Psychique, planète Terre, Protection et Bannir).<br>
																Les 4 symboles à l\'intérieur du cercle interne sont ceux représentant les éléments Air, Eau, Feu et Terre (N-A signifie "Nord-Air", etc).<br>
																Tout au centre se trouveront les 3 symboles indiquant l\'effet que vous voulez (Voyage, Lien, Éther).<br>
																Attention de bien suivre les indications pour placer les symboles dans le sens des aiguilles d\'une montre ou inversement.
															</span>
														</p>
														<center>
															<form action="shoggoth" method="post">
																<button type="submit" name="indice3" class="boutonindice"></button>
															</form>
														</center>
													';
												}
											elseif (isset($_POST['indice']))
												{
													echo '
														<p>
															<span class="indice">
																Les instructions sont un peu abîmées, mais vous devriez pouvoir vous en sortir avec ça.<br>
																Les trois symboles les plus excentrés doivent être complétés avec les astres.<br>
																Le plus grand cercle doit recevoir l\'intention.<br>
																Les 4 symboles à l\'intérieur du cercle interne sont ceux représentant les éléments Air, Eau, Feu et Terre.<br>
																Tout au centre se trouveront les 3 symboles indiquant l\'effet que vous voulez.
															</span>
														</p>
														<center>
															<form action="shoggoth" method="post">
																<button type="submit" name="indice2" class="boutonindice"></button>
															</form>
														</center>
													';
												}
											else
												{
													echo '
														<center>
															<form action="shoggoth" method="post">
																<button type="submit" name="indice" class="boutonindice"></button>
															</form>
														</center>
													';
												}
											$_SESSION['rituelg'] = true;
										}
									else
										{
											echo '
												<audio src="/escaperpg/sons/secrets/shoggothelec.mp3" autoplay></audio>
												<p>
													Le shoggoth est en train de s\'agripper au mur et tente d\'ouvrir le petit boîtier contenant le système électrique du manoir.
													Il commence alors à toucher les câbles et vous voyez un éclat électrique en sortir pour être absorbé par la créature.<br>
													Il semblerait que les réparations que vous avez effectuées soient efficaces, car le système semble se maintenir et le shoggoth absorbe l\'énergie petit à petit.
													Vous voyez son corps être secoué de spasmes tandis que des éclairs parcourent son corps, vous laissant en voir l\'intérieur par transparence.
													Le spectacle est immonde et vous ne pouvez vous empêcher, cette fois, de vomir tout ce qui se trouve dans votre estomac.<br>
													<br>
													Le shoggoth semble pour le moment occupé à pomper l\'énergie du système électrique, ce qui vous laisse un peu de temps pour chercher une solution.
													Vous vous souvenez alors du rituel trouvé dans la bibliothèque du bureau privé.
													Après tout, si des monstres tel que celui se trouvant devant vous existent bel et bien et permettent de tromper la mort, alors peut-être que cette idée pourrait marcher ?<br>
													<br>
													Vous ressortez du bureau et descendez les escaliers en direction du hall d\'entrée.<br>
													À la hâte, vous ouvrez le tiroir d\'un des meubles se trouvant là en espérant trouver de quoi tracer le cercle de magie.
													En trouvant une boîte de craies, vous manquez de peu de crier de joie, mais le temps presse.<br>
													Fébrile, vous ouvrez la boîte en tremblant et une demi-douzaine de craies tombent et se brisent sur le sol.
													Jurant entre vos dents, vous réussissez à trouver un morceau suffisamment grand pour ce que vous allez entreprendre.
												</p>
												<center>
													<form action="shoggoth" method="post">
														<input type="submit" name="rituel" value="Commencer le rituel.">
													</form>
												</center>
											';
											$_SESSION['end'] = true;
										}
								}
							elseif ($_SESSION['chienssauvesfin'] == false AND $_SESSION['cuves'] OR $_SESSION['chienssauvesfin'] AND $_SESSION['cuves'] AND $_SESSION['pnakotiques'] == false) // neutralending
								{
									echo '
										<audio src="/escaperpg/sons/secrets/shoggothelec.mp3" autoplay></audio>
										<p>
											Le shoggoth est en train de s\'agripper au mur et tente d\'ouvrir le petit boîtier contenant le système électrique du manoir.
											Il commence alors à toucher les câbles et vous voyez un éclat électrique en sortir pour être absorbé par la créature.<br>
											Il semblerait que les réparations que vous avez effectuées soient efficaces, car le système semble se maintenir et le shoggoth absorbe l\'énergie petit à petit.
											Vous voyez son corps être secoué de spasmes tandis que des éclairs parcourent son corps, vous laissant en voir l\'intérieur par transparence.
											Le spectacle est immonde et vous ne pouvez vous empêcher, cette fois, de vomir tout ce qui se trouve dans votre estomac.<br>
											<br>
											N\'ayant aucune idée de comment vaincre le shoggoth qui semble occupé, vous décidez de battre en retraite.
										</p>
										<center>
											<form action="../ends/3cvh15" method="post">
												<input type="submit" name="fuir" value="Fuir.">
											</form>
										</center>
									';
								}
							elseif ($_SESSION['chienssauvesfin'] AND $_SESSION['pnakotiques'] AND $_SESSION['cuves'] == false) // neutralbadending
								{
									if (isset($_POST['rituelnb']) OR $_SESSION['rituelnb'])
										{
											echo '
												<audio src="/escaperpg/sons/secrets/rituel.mp3" autoplay></audio>
												<div id="cerclerituel">
													<div class="droppercercle" id="symb1"></div>
													<div class="droppercercle" id="symb2"></div>
													<div class="droppercercle" id="symb3"></div>
													<div class="droppercercle" id="symb4"></div>
													<div class="droppercercle" id="symb5"></div>
													<div class="droppercercle" id="symb6"></div>
													<div class="droppercercle" id="symb7"></div>
													<div class="droppercercle" id="symb8"></div>
													<div class="droppercercle" id="symb9"></div>
													<div class="droppercercle" id="symb10"></div>
													<div class="droppercercle" id="symb11"></div>
													<div class="droppercercle" id="symb12"></div>
													<div class="droppercercle" id="symb13"></div>
													<div class="droppercercle" id="symb14"></div>
												</div>
												<br>
												<center>
													<div class="draggablecercle" id="dragsymb1"><img src="/escaperpg/images/secrets/symboles/symbole1.png" id="mag1"></div>
													<div class="draggablecercle" id="dragsymb2"><img src="/escaperpg/images/secrets/symboles/symbole2.png" id="mag2"></div>
													<div class="draggablecercle" id="dragsymb3"><img src="/escaperpg/images/secrets/symboles/symbole3.png" id="mag3"></div>
													<div class="draggablecercle" id="dragsymb4"><img src="/escaperpg/images/secrets/symboles/symbole4.png" id="mag4"></div>
													<div class="draggablecercle" id="dragsymb5"><img src="/escaperpg/images/secrets/symboles/symbole5.png" id="mag5"></div>
													<div class="draggablecercle" id="dragsymb6"><img src="/escaperpg/images/secrets/symboles/symbole6.png" id="mag6"></div>
													<div class="draggablecercle" id="dragsymb7"><img src="/escaperpg/images/secrets/symboles/symbole7.png" id="mag7"></div>
													<div class="draggablecercle" id="dragsymb8"><img src="/escaperpg/images/secrets/symboles/symbole8.png" id="mag8"></div>
													<div class="draggablecercle" id="dragsymb9"><img src="/escaperpg/images/secrets/symboles/symbole9.png" id="mag9"></div>
													<div class="draggablecercle" id="dragsymb10"><img src="/escaperpg/images/secrets/symboles/symbole10.png" id="mag10"></div>
													<div class="draggablecercle" id="dragsymb11"><img src="/escaperpg/images/secrets/symboles/symbole11.png" id="mag11"></div>
													<div class="draggablecercle" id="dragsymb12"><img src="/escaperpg/images/secrets/symboles/symbole12.png" id="mag12"></div>
													<div class="draggablecercle" id="dragsymb13"><img src="/escaperpg/images/secrets/symboles/symbole13.png" id="mag13"></div>
													<div class="draggablecercle" id="dragsymb14"><img src="/escaperpg/images/secrets/symboles/symbole14.png" id="mag14"></div>
												</center>
												<br>
												<script src="/escaperpg/aventures/scripts/dragdropcercleneutralbadending.js"></script>
												<center>
													<form action="#" method="post">
														<input type="submit" name="reset" value="Réinitialiser.">
													</form>
												</center>
											';
											if (isset($_POST['reponse']))
												{
													echo'
														<div id="enigmelieu">
															<img src="/escaperpg/images/secrets/cerclerituelreponse.png">
														</div>
													';
												}
											elseif (isset($_POST['indice3']))
												{
													echo '
														<p>
															<span class="indice">
																Les trois symboles les plus excentrés doivent être complétés avec les astres (Soleil, Jupiter et Pluton).<br>
																Le plus grand cercle doit recevoir l\'intention (Éveil Psychique, planète Terre, Protection et Bannir).<br>
																Les 4 symboles à l\'intérieur du cercle interne sont ceux représentant les éléments Air, Eau, Feu et Terre (N-A signifie "Nord-Air", etc).<br>
																Tout au centre se trouveront les 3 symboles indiquant l\'effet que vous voulez (Voyage, Lien, Éther).<br>
																Attention de bien suivre les indications pour placer les symboles dans le sens des aiguilles d\'une montre ou inversement.<br>
																Le Lien est représenté par une Corde.
															</span>
														</p>
														<center>
															<form action="shoggoth" method="post">
																<button type="submit" name="reponse" class="boutonreponse"></button>
															</form>
														</center>
													';
												}
											elseif (isset($_POST['indice2']))
												{
													echo '
														<p>
															<span class="indice">
																Les trois symboles les plus excentrés doivent être complétés avec les astres (Soleil, Jupiter et Pluton).<br>
																Le plus grand cercle doit recevoir l\'intention (Éveil Psychique, planète Terre, Protection et Bannir).<br>
																Les 4 symboles à l\'intérieur du cercle interne sont ceux représentant les éléments Air, Eau, Feu et Terre (N-A signifie "Nord-Air", etc).<br>
																Tout au centre se trouveront les 3 symboles indiquant l\'effet que vous voulez (Voyage, Lien, Éther).<br>
																Attention de bien suivre les indications pour placer les symboles dans le sens des aiguilles d\'une montre ou inversement.
															</span>
														</p>
														<center>
															<form action="shoggoth" method="post">
																<button type="submit" name="indice3" class="boutonindice"></button>
															</form>
														</center>
													';
												}
											elseif (isset($_POST['indice']))
												{
													echo '
														<p>
															<span class="indice">
																Les instructions sont un peu abîmées, mais vous devriez pouvoir vous en sortir avec ça.<br>
																Les trois symboles les plus excentrés doivent être complétés avec les astres.<br>
																Le plus grand cercle doit recevoir l\'intention.<br>
																Les 4 symboles à l\'intérieur du cercle interne sont ceux représentant les éléments Air, Eau, Feu et Terre.<br>
																Tout au centre se trouveront les 3 symboles indiquant l\'effet que vous voulez.
															</span>
														</p>
														<center>
															<form action="shoggoth" method="post">
																<button type="submit" name="indice2" class="boutonindice"></button>
															</form>
														</center>
													';
												}
											else
												{
													echo '
														<center>
															<form action="shoggoth" method="post">
																<button type="submit" name="indice" class="boutonindice"></button>
															</form>
														</center>
													';
												}
											$_SESSION['rituelnb'] = true;
										}
									else
										{
											echo '
												<audio src="/escaperpg/sons/secrets/shoggothcourtcircuit.mp3" autoplay></audio>
												<p>
													Le shoggoth est en train de s\'agripper au mur et tente d\'ouvrir le petit boîtier contenant le système électrique du manoir.
													Il commence alors à toucher les câbles et vous voyez un éclat électrique en sortir pour être absorbé par la créature.<br>
													Cependant, le système étant instable comme vous l\'avaient dit les domestiques, le courant se coupe soudainement et plonge la pièce dans l\'obscurité la plus totale.<br>
													<br>
													Vous vous souvenez alors du rituel trouvé dans la bibliothèque du bureau privé.
													Après tout, si des monstres tels que celui se trouvant devant vous existent bel et bien et permettent de tromper la mort, alors peut-être que cette idée pourrait marcher ?<br>
													<br>
													Vous ressortez du bureau comme vous le pouvez en tatônant et descendez les escaliers en direction du hall d\'entrée.<br>
													À la hâte, vous ouvrez le tiroir d\'un des meubles se trouvant là en espérant trouver de quoi tracer le cercle de magie.
													En trouvant une boîte de craies, vous manquez de peu de crier de joie, mais le temps presse.<br>
													Fébrile, vous ouvrez la boîte en tremblant et une demi-douzaine de craies tombent et se brisent sur le sol.
													Jurant entre vos dents, vous réussissez à trouver un morceau suffisamment grand pour ce que vous allez entreprendre.<br>
													<br>
													Vous n\'y voyez pas grand chose, mais cela devrait suffire. Du moins l\'espérez-vous !<br>
													Depuis le bureau, vous entendez des bruits d\'objets tombant sur le sol.
													Le shoggoth est en train de se frayer un chemin pour venir jusqu\'à vous et vous risquez de ne pas avoir beaucoup de temps pour accomplir le rituel avant qu\'il ne vous tombe dessus.
												</p>
												<center>
													<form action="shoggoth" method="post">
														<input type="submit" name="rituelnb" value="Commencer le rituel.">
													</form>
												</center>
											';
											$_SESSION['end'] = true;
										}
								}
							else // badending
								{
									echo '
										<audio src="/escaperpg/sons/secrets/shoggothcourtcircuit.mp3" autoplay></audio>
										<p>
											Le shoggoth est en train de s\'agripper au mur et tente d\'ouvrir le petit boîtier contenant le système électrique du manoir.
											Il commence alors à toucher les câbles et vous voyez un éclat électrique en sortir pour être absorbé par la créature.<br>
											Cependant, le système étant instable comme vous l\'avaient dit les domestiques, le courant se coupe soudainement et plonge la pièce dans l\'obscurité la plus totale.<br>
											<br>
											Paniqué, vous tentez de rebrousser chemin pour vous échapper, mais vous trébuchez à nouveau sur le corps de Gaspard.
										</p>
										<center>
											<form action="../ends/1fgre2" method="post">
												<input type="submit" name="fuite" value="Tenter de fuir.">
											</form>
										</center>
									';
								}
						}
					else
						{
							if (isset ($_POST['suivant']))
								{
									echo '
										<audio src="/escaperpg/sons/secrets/crichute.mp3" autoplay></audio>
										<p>
											À l\'intérieur règne un calme oppressant.<br>
											<br>
											Au bas de l\'escalier, vous trouvez le corps ensanglanté de Téona.
											La pauvre a été déchiquetée et a dû connaître une fin horrible, mais un bruit de lutte à l\'étage attire votre attention.
											Manifestement, quelqu\'un ou quelque chose se trouve dans le bureau privé. Vous grimpez les marches 4 à 4 et vous placez à côté de la porte, le souffle court.
											Vous cherchez à prendre votre révolver pour pouvoir vous défendre, mais réalisez que vous l\'avez laissé dans votre chambre.
											Vous vous maudissez de ne pas avoir été plus prévoyant mais estimez que vous ne pouvez pas attendre quand vous entendez un cri de douleur.
											Vous reconnaissez la voix de Gaspard et décidez d\'entrer pour l\'aider.
										</p>
										<center>
											<form action="shoggoth" method="post">
												<input type="submit" name="aider" value="Aider Gaspard.">
											</form>
										</center>
									';
								}
							elseif (isset ($_POST['aider']))
								{
									echo '
										<p>
											La première partie du bureau est vide, en dehors des morceaux de papiers traînant un peu partout et des meubles renversés.
											Vous vous hâtez vers la seconde partie du bureau et manquez de peu de trébucher sur quelque chose.
											En baissant les yeux, vous voyez le corps meurtri de Gaspard, dont une jambe en travers du passage a failli vous faire tomber.
											Vous relevez les yeux et le voyez.<br>
											<br>
											Hideux, bien plus gros que ce à quoi vous vous attendiez, se tient le shoggoth de votre oncle.
											Il vous est inconcevable de comprendre comment une telle chose a pu tenir à l\'intérieur de son corps, mais vous constatez rapidement que les cuves contenant les embryons ont été brisées et sont à présent vides.
											Le monstre a dû récupérer ses “morceaux” pour redevenir entier.
										</p>
										<center>
											<form action="shoggoth" method="post">
												<input type="submit" name="agir" value="Faire quelque chose.">
											</form>
										</center>
									';
								}
							else
								{
									echo '
										<audio src="/escaperpg/sons/secrets/paslents.mp3" autoplay></audio>
										<p>
											Vous revenez au manoir et votre cœur manque un battement lorsque vous voyez que les grilles de l\'entrée ont été forcées et qu\'une matière visqueuse est restée accrochée dessus.
											Le shoggoth de votre oncle serait-il revenu ici ? Mais pourquoi ?<br>
											<br>
											Sur vos gardes, vous avancez dans l\'allée de graviers menant aux portes du manoir, défoncées elles aussi.
											Le carré d\'obscurité formé par le trou béant est terriblement angoissant mais vous continuez d\'avancer malgré tout.
										</p>
										<center>
											<form action="shoggoth" method="post">
												<input type="submit" name="suivant" value="Suivant.">
											</form>
										</center>
									';
								}
						}
				?>
			</div>
		</div>
		<div id="load"><div id="loader"></div></div>
		<script src="/escaperpg/scripts/aventures-chargement.js"></script>
		<?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/secrets/includes/footer.php"; ?>
	</body>
</html>
