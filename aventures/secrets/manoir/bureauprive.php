<?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/entete.php";
	$_SESSION['bureauprive'] = true;
	$_SESSION['templar'] = false;
	$_SESSION['papier'] = false;
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
		<title>Bureau privé - Secrets Familiaux</title>
	</head>
	
	<body onload="chargement()">
		<?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/header.php"; ?>
		<div id="banniere"><img src="/escaperpg/images/secrets/secretsfamiliauxmini.png" alt="secrets familiaux bannière"></div>
		<main>
			<nav>
				<a href="/escaperpg/images/secrets/inspecteurdeckard.png" rel="lightbox[bastian]" title="inspecteurdeckard"><img src="/escaperpg/images/secrets/inspecteurdeckardmini.png" alt="inspecteur deckard"></a>
				<div id="inventairefooter"><input type="submit" value="INVENTAIRE"></div>
				<div id="motsdepasse"><input type="submit" value="NOTES"></div>
				<?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/secrets/includes/navigationmanoir.php"; ?>
				<a href="/escaperpg/aventures/secrets/save/save.php" target="_blank" rel="noreferrer"><input type="submit" name="save" value="SAUVEGARDER"></a>
			</nav>
			<div id="txt">
				<?php
					if ($_SESSION['chienssauvesfin'])
						{
							if ($_SESSION['tiroiropened'] AND $_SESSION['pnakotiques'])
								{
									echo '
										<p>
											<div id="enigmelieu">
												<img src="/escaperpg/images/secrets/bureausecret1tiroiropened.png">
											</div>
											Il semble que vous avez trouvé tout ce qu\'il restait de ce côté.
										</p>
										<center>
											<form action="bureauprive2" method="post">
												<input type="submit" name="fond" value="Passer de l\'autre côté.">
											</form>
										</center>
									';
								}
							elseif ($_SESSION['tiroiropened'])
								{
									if (isset ($_POST['bibliotheque']) AND str_replace($search, $replace, stripslashes($_POST['fouiller'])) == "cerclerituel")
										{
											echo '
												<p>
													<div id="enigmelieu">
														<img src="/escaperpg/images/secrets/bureausecret1tiroiropened.png">
													</div>
													<div id="enigme">
														<a href="/escaperpg/images/secrets/pnakotiques.png" rel="lightbox[invent]"><img src="/escaperpg/images/secrets/pnakotiques.png"></a><br>
														<a href="/escaperpg/images/secrets/pnakotiquesnotes.png" rel="lightbox[invent]"><img src="/escaperpg/images/secrets/pnakotiquesnotes.png"></a>
													</div>
													<br>
													En fouillant parmi les livres de la bibliothèque privée, vous tombez sur un livre très ancien dont la couverture est en partie arrachée.
													Les pages jaunies semblent sur le point de partir en poussière et vous manipulez le tout avec précaution.<br>
													<br>
													Le livre se nomme Manuscrits Pnakotiques et décrit tout un tas de rituels magiques divers.
													L\'une des pages représente un motif très similaire à celui présent sur le talisman de Gaspard.<br>
													La page évoque comment réaliser des cercles magiques pour avoir des visions de dimensions inconnues et créer un portail y menant, mais la deuxième page est très abîmée.
													Peut-être pourriez-vous trouver comment créer le second cercle malgré tout ?<br>
													Une feuille volante, beaucoup plus récente que le livre, était glissée entre ces pages.<br>
													<br>
													Vous gardez ces éléments de côté.
												</p>
												<center>
													<form action="bureauprive" method="post">
														<input type="submit" name="pnako" value="Ajouter à l\'inventaire.">
													</form>
												</center>
											';
										}
									elseif (isset ($_POST['fouiller']))
										{
											echo '
												<p>
													<div id="enigmelieu">
														<img src="/escaperpg/images/secrets/bureausecret1tiroiropened.png">
													</div>
													Vous ne trouvez pas ce que vous cherchez.
												</p>
												<center>
													<form action="bureauprive" method="post">
														<input type="text" name="fouiller"> <input type="submit" name="bibliotheque" value="Fouiller la bibliothèque.">
													</form>
												</center>
											';
										}
									elseif (isset($_POST['pnako']))
										{
											echo '
												<script src="/escaperpg/scripts/inventaireadds.js"></script>
												<p>
													<div id="enigmelieu">
														<img src="/escaperpg/images/secrets/bureausecret1tiroiropened.png">
													</div>
													Il semble que vous avez trouvé tout ce qu\'il restait de ce côté.
												</p>
												<center>
													<form action="bureauprive2" method="post">
														<input type="submit" name="fond" value="Passer de l\'autre côté.">
													</form>
												</center>
											';
											$_SESSION['pnakotiques'] = true;
											$_SESSION['pnakotiquesnotes'] = true;
										}
									else
										{
											echo '
												<p>
													<div id="enigmelieu">
														<img src="/escaperpg/images/secrets/bureausecret1tiroiropened.png">
													</div>
													En approchant de la bibliothèque, vous sentez le talisman offert par Gaspard vibrer.
													Vous devriez l\'observer de plus près.
												</p>
												<center>
													<form action="bureauprive" method="post">
														<input type="text" name="fouiller"> <input type="submit" name="bibliotheque" value="Fouiller la bibliothèque.">
													</form>
												</center>
											';
										}
								}
							elseif ($_SESSION['pnakotiques'])
								{
									if (isset ($_POST['tiroir']))
											{
												echo'
													<p>
														<div id="enigmelieu">
															<img src="/escaperpg/images/secrets/bureausecret1.png">
															<div id="tiroir">
																<form action="bureauprive" method="post">
																	<button type="submit" name="tiroir">
																		<img src="/escaperpg/images/secrets/buttontiroir.png">
																	</button>
																</form>
															</div>
														</div>
														Le tiroir est fermé à clé, mais vous avez avec vous la petite clé trouvée dans le coffret.
													</p>
													<center>
														<form action="bureauprive" method="post">
															<input type="text" name="petitecle"><input type="submit" name="utiliser" value="Utiliser la clé.">
														</form>
														<br>
														<form action="bureauprive2" method="post">
															<input type="submit" name="fond" value="Passer de l\'autre côté.">
														</form>
													</center>
												';
											}
										elseif (isset ($_POST['petitecle']) AND str_replace($search, $replace, stripslashes($_POST['petitecle'])) == "tirlitke")
											{
												echo'
													<audio src="/escaperpg/sons/secrets/tiroir.mp3" autoplay></audio>
													<p>
														<div id="enigmelieu">
															<img src="/escaperpg/images/secrets/bureausecret1tiroiropened.png">
														</div>
														Vous débloquez le tiroir et l\'ouvrez.<br>
														<br>
														<div id="enigme">
															<a href="/escaperpg/images/secrets/journal1.png" rel="lightbox[invent]"><img src="/escaperpg/images/secrets/journal1.png"></a>
														</div>
														<div id="enigme">
															<a href="/escaperpg/images/secrets/journal3.png" rel="lightbox[invent]"><img src="/escaperpg/images/secrets/journal3.png"></a>
														</div>
														<div id="enigme">
															<a href="/escaperpg/images/secrets/journal4.png" rel="lightbox[invent]"><img src="/escaperpg/images/secrets/journal4.png"></a>
														</div>
														<br>
														Vous trouvez une liasse de papiers jaunis sur lesquels s\'étale une fine écriture que vous reconnaissez immédiatement comme étant celle de votre oncle.
														Vous les prenez délicatement, sans toutefois pouvoir vous empêcher de trembler à l\'idée de ce que vous pourriez y découvrir.
													</p>
													<center>
														<form action="bureauprive" method="post">
															<input type="submit" name="journaladd" value="Ajouter à l\'inventaire.">
														</form>
													</center>
												';
												$_SESSION['petitecle'] = false;
											}
										elseif (isset ($_POST['petitecle']))
											{
												echo'
													<p>
														<div id="enigmelieu">
															<img src="/escaperpg/images/secrets/bureausecret1.png">
															<div id="tiroir">
																<form action="bureauprive" method="post">
																	<button type="submit" name="tiroir">
																		<img src="/escaperpg/images/secrets/buttontiroir.png">
																	</button>
																</form>
															</div>
														</div>
														Cela ne semble pas fonctionner.
														Êtes-vous sûr d\'avoir fait comme il fallait ?
													</p>
													<center>
														<form action="bureauprive" method="post">
															<input type="text" name="petitecle"><input type="submit" name="utiliser" value="Utiliser la clé.">
														</form>
														<br>
														<form action="bureauprive2" method="post">
															<input type="submit" name="fond" value="Passer de l\'autre côté.">
														</form>
													</center>
												';
											}
										elseif (isset($_POST['journaladd']))
											{
												echo'
													<script src="/escaperpg/scripts/inventaireadd.js"></script>
													<p>
														<div id="enigmelieu">
															<img src="/escaperpg/images/secrets/bureausecret1tiroiropened.png">
														</div>
														Il semble manquer certaines des pages, mais une rapide lecture vous permet d\'apprendre non seulement que votre oncle s\'essayait à de sombres expériences avec le docteur Pellington,
														mais qu\'une pièce secrète est cachée quelque part dans le manoir !<br>
														<br>
														Vous pensez avoir trouvé tout ce qu\'il y avait dans cette pièce.
													</p>
													<center>
														<form action="bureauprive2" method="post">
															<input type="submit" name="fond" value="Passer de l\'autre côté.">
														</form>
													</center>
												';
												$_SESSION['tiroiropened'] = true;
												$_SESSION['journal1'] = true;
												$_SESSION['journal3'] = true;
												$_SESSION['journal4'] = true;
											}
										else
											{
												echo '
													<p>
														<div id="enigmelieu">
															<img src="/escaperpg/images/secrets/bureausecret1.png">
															<div id="tiroir">
																<form action="bureauprive" method="post">
																	<button type="submit" name="tiroir">
																		<img src="/escaperpg/images/secrets/buttontiroir.png">
																	</button>
																</form>
															</div>
														</div>
														Vous entrez enfin dans le bureau privé de votre oncle alors que la nuit commence à tomber.
														Une grande bibliothèque traverse la pièce, la séparant en deux.
														Au fond, derrière la bibliothèque, se trouve une petite ouverture pour accéder à la seconde partie. La petite fenêtre au fond éclaire à peine l\'ensemble.<br>
														<br>
														De ce côté, vous pouvez trouver un tas de livres obscurs traitant de sujets qui vous terrifient et que vous n\'osez pas parcourir plus longtemps.
														Un petit bureau se trouve sur la droite, contre le mur. Un tas de papiers et d\'ustensiles divers jonchent le sol.<br>
														Manifestement, le docteur Pellington a retourné la salle pour trouver les preuves qu\'il désirait détruire, mais peut-être reste-t-il quelque chose ici ou là ?
													</p>
													<center>
														<form action="bureauprive2" method="post">
															<input type="submit" name="fond" value="Passer de l\'autre côté.">
														</form>
													</center>
												';
											}
								}
							else
								{
									if (isset ($_POST['fouiller']) AND str_replace($search, $replace, stripslashes($_POST['fouiller'])) == "cerclerituel")
										{
											echo '
												<p>
													<div id="enigmelieu">
														<img src="/escaperpg/images/secrets/bureausecret1.png">
														<div id="tiroir">
															<form action="bureauprive" method="post">
																	<button type="submit" name="tiroir">
																		<img src="/escaperpg/images/secrets/buttontiroir.png">
																	</button>
															</form>
														</div>
													</div>
													<div id="enigme">
														<a href="/escaperpg/images/secrets/pnakotiques.png" rel="lightbox[invent]"><img src="/escaperpg/images/secrets/pnakotiques.png"></a><br>
														<a href="/escaperpg/images/secrets/pnakotiquesnotes.png" rel="lightbox[invent]"><img src="/escaperpg/images/secrets/pnakotiquesnotes.png"></a>
													</div>
													<br>
													En fouillant parmi les livres de la bibliothèque privée, vous tombez sur un livre très ancien dont la couverture est en partie arrachée.
													Les pages jaunies semblent sur le point de partir en poussière et vous manipulez le tout avec précaution.<br>
													<br>
													Le livre se nomme Manuscrits Pnakotiques et décrit tout un tas de rituels magiques divers.
													L\'une des pages représente un motif très similaire à celui présent sur le talisman de Gaspard.<br>
													La page évoque comment réaliser des cercles magiques pour avoir des visions de dimensions inconnues et créer un portail y menant, mais la deuxième page est très abîmée.
													Peut-être pourriez-vous trouver comment créer le second cercle malgré tout ?<br>
													Une feuille volante, beaucoup plus récente que le livre, était glissée entre ces pages.<br>
													<br>
													Vous gardez ces éléments de côté.
												</p>
												<center>
													<form action="bureauprive" method="post">
														<input type="submit" name="pnako" value="Ajouter à l\'inventaire.">
													</form>
												</center>
											';
										}
									elseif (isset ($_POST['fouiller']))
										{
											echo '
												<p>
													<div id="enigmelieu">
														<img src="/escaperpg/images/secrets/bureausecret1.png">
														<div id="tiroir">
															<form action="bureauprive" method="post">
																	<button type="submit" name="tiroir">
																		<img src="/escaperpg/images/secrets/buttontiroir.png">
																	</button>
															</form>
														</div>
													</div>
													Vous ne trouvez pas ce que vous cherchez.
												</p>
												<center>
													<form action="bureauprive" method="post">
														<input type="text" name="fouiller"> <input type="submit" name="bibliotheque" value="Fouiller la bibliothèque.">
													</form>
												</center>
											';
										}
									elseif (isset($_POST['pnako']))
										{
											echo '
												<script src="/escaperpg/scripts/inventaireadds.js"></script>
												<p>
													<div id="enigmelieu">
														<img src="/escaperpg/images/secrets/bureausecret1.png">
														<div id="tiroir">
															<form action="bureauprive" method="post">
																	<button type="submit" name="tiroir">
																		<img src="/escaperpg/images/secrets/buttontiroir.png">
																	</button>
															</form>
														</div>
													</div>
													Vous avez trouvé tout ce qu\'il y avait d\'intéressant dans la bibliothèque, mais peut-être reste-t-il autre chose dans la pièce ?
												</p>
												<center>
													<form action="bureauprive2" method="post">
														<input type="submit" name="fond" value="Passer de l\'autre côté.">
													</form>
												</center>
											';
											$_SESSION['pnakotiques'] = true;
											$_SESSION['pnakotiquesnotes'] = true;
										}
									elseif (isset ($_POST['tiroir']))
										{
											echo'
												<p>
													<div id="enigmelieu">
														<img src="/escaperpg/images/secrets/bureausecret1.png">
														<div id="tiroir">
															<form action="bureauprive" method="post">
																	<button type="submit" name="tiroir">
																		<img src="/escaperpg/images/secrets/buttontiroir.png">
																	</button>
															</form>
														</div>
													</div>
													Le tiroir est fermé à clé, mais vous avez avec vous la petite clé trouvée dans le coffret.
												</p>
												<center>
													<form action="bureauprive" method="post">
														<input type="text" name="petitecle"><input type="submit" name="utiliser" value="Utiliser la clé.">
													</form>
													<br>
													<form action="bureauprive" method="post">
														<input type="text" name="fouiller"> <input type="submit" name="bibliotheque" value="Fouiller la bibliothèque.">
													</form>
													<br>
													<form action="bureauprive2" method="post">
														<input type="submit" name="fond" value="Passer de l\'autre côté.">
													</form>
												</center>
											';
										}
									elseif (isset ($_POST['petitecle']) AND str_replace($search, $replace, stripslashes($_POST['petitecle'])) == "tirlitke")
										{
											echo'
												<audio src="/escaperpg/sons/secrets/tiroir.mp3" autoplay></audio>
												<p>
													<div id="enigmelieu">
														<img src="/escaperpg/images/secrets/bureausecret1tiroiropened.png">
													</div>
													Vous débloquez le tiroir et l\'ouvrez.
													<div id="enigme">
														<a href="/escaperpg/images/secrets/journal1.png" rel="lightbox[invent]"><img src="/escaperpg/images/secrets/journal1.png"></a>
													</div>
													<div id="enigme">
														<a href="/escaperpg/images/secrets/journal3.png" rel="lightbox[invent]"><img src="/escaperpg/images/secrets/journal3.png"></a>
													</div>
													<div id="enigme">
														<a href="/escaperpg/images/secrets/journal4.png" rel="lightbox[invent]"><img src="/escaperpg/images/secrets/journal4.png"></a>
													</div>
													Vous trouvez une liasse de papiers jaunis sur lesquels s\'étale une fine écriture que vous reconnaissez immédiatement comme étant celle de votre oncle.
													Vous les prenez délicatement, sans toutefois pouvoir vous empêcher de trembler à l\'idée de ce que vous pourriez y découvrir.
												</p>
												<center>
													<form action="bureauprive" method="post">
														<input type="submit" name="journaladd" value="Ajouter à l\'inventaire.">
													</form>
												</center>
											';
											$_SESSION['petitecle'] = false;
										}
									elseif (isset ($_POST['petitecle']))
										{
											echo'
												<p>
													<div id="enigmelieu">
														<img src="/escaperpg/images/secrets/bureausecret1.png">
														<div id="tiroir">
															<form action="bureauprive" method="post">
																	<button type="submit" name="tiroir">
																		<img src="/escaperpg/images/secrets/buttontiroir.png">
																	</button>
															</form>
														</div>
													</div>
													Cela ne semble pas fonctionner.
													Êtes-vous sûr d\'avoir fait comme il fallait ?
												</p>
												<center>
													<form action="bureauprive" method="post">
														<input type="text" name="petitecle"><input type="submit" name="utiliser" value="Utiliser la clé.">
													</form>
													<br>
													<form action="bureauprive" method="post">
														<input type="text" name="fouiller"> <input type="submit" name="bibliotheque" value="Fouiller la bibliothèque.">
													</form>
													<br>
													<form action="bureauprive2" method="post">
														<input type="submit" name="fond" value="Passer de l\'autre côté.">
													</form>
												</center>
											';
										}
									elseif (isset($_POST['journaladd']))
										{
											echo'
												<script src="/escaperpg/scripts/inventaireadd.js"></script>
												<p>
													<div id="enigmelieu">
														<img src="/escaperpg/images/secrets/bureausecret1tiroiropened.png">
													</div>
													Il semble manquer certaines des pages, mais une rapide lecture vous permet d\'apprendre non seulement que votre oncle s\'essayait à de sombres expériences avec le docteur Pellington,
													mais qu\'une pièce secrète est cachée quelque part dans le manoir !<br>
													<br>
													Votre médaillon vibre toujours lorsque vous êtes proche de la bibliothèque.
												</p>
												<center>
													<form action="bureauprive" method="post">
														<input type="text" name="fouiller"> <input type="submit" name="bibliotheque" value="Fouiller la bibliothèque.">
													</form>
													<br>
													<form action="bureauprive2" method="post">
														<input type="submit" name="fond" value="Passer de l\'autre côté.">
													</form>
												</center>
											';
											$_SESSION['tiroiropened'] = true;
											$_SESSION['journal1'] = true;
											$_SESSION['journal3'] = true;
											$_SESSION['journal4'] = true;
										}
									else
										{
											echo'<div id="succespopup">';
											$nouveausucces = '<img src="/escaperpg/images/succes/secrets/bureau.png"><span><u><b>Incantateur</b></u><br>Entrer dans le bureau privé de l\'oncle William</span>';
											$scenario = 'secrets';
											$description = 'bureau';
											$cache = 'oui';
											$rarete = 'succesbronze';
											include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/succesadd.php";
											echo'</div>';
											
											echo '
												<p>
													<div id="enigmelieu">
														<img src="/escaperpg/images/secrets/bureausecret1.png">
														<div id="tiroir">
															<form action="bureauprive" method="post">
																	<button type="submit" name="tiroir">
																		<img src="/escaperpg/images/secrets/buttontiroir.png">
																	</button>
															</form>
														</div>
													</div>
													Vous entrez enfin dans le bureau privé de votre oncle alors que la nuit commence à tomber.
													Une grande bibliothèque traverse la pièce, la séparant en deux.
													Au fond, derrière la bibliothèque, se trouve une petite ouverture pour accéder à la seconde partie. La petite fenêtre au fond éclaire à peine l\'ensemble.<br>
													<br>
													De ce côté, vous pouvez trouver un tas de livres obscurs traitant de sujets qui vous terrifient et que vous n\'osez pas parcourir plus longtemps.
													Un petit bureau se trouve sur la droite, contre le mur. Un tas de papiers et d\'ustensiles divers jonchent le sol.<br>
													Manifestement, le docteur Pellington a retourné la salle pour trouver les preuves qu\'il désirait détruire, mais peut-être reste-t-il quelque chose ici ou là ?<br>
													<br>
													En approchant de la bibliothèque, vous sentez le talisman offert par Gaspard vibrer.
													Vous devriez l\'observer de plus près.
												</p>
												<center>
													<form action="bureauprive" method="post">
														<input type="text" name="fouiller"> <input type="submit" name="bibliotheque" value="Fouiller la bibliothèque.">
													</form>
													<br>
													<form action="bureauprive2" method="post">
														<input type="submit" name="fond" value="Passer de l\'autre côté.">
													</form>
												</center>
											';
										}
								}
						}
					else
						{
							if ($_SESSION['tiroiropened'])
								{
									echo '
										<p>
											<div id="enigmelieu">
												<img src="/escaperpg/images/secrets/bureausecret1tiroiropened.png">
											</div>
											Vous entrez enfin dans le bureau privé de votre oncle alors que la nuit commence à tomber.
											Une grande bibliothèque traverse la pièce, la séparant en deux.
											Au fond, derrière la bibliothèque, se trouve une petite ouverture pour accéder à la seconde partie. La petite fenêtre au fond éclaire à peine l\'ensemble.<br>
											<br>
											De ce côté, vous pouvez trouver un tas de livres obscurs traitant de sujets qui vous terrifient et que vous n\'osez pas parcourir plus longtemps.
											Un petit bureau se trouve sur la droite, contre le mur. Un tas de papiers et d\'ustensiles divers jonchent le sol.<br>
											Manifestement, le docteur Pellington a retourné la salle pour trouver les preuves qu\'il désirait détruire et vous avez trouvé tout ce qu\'il restait d\'intéressant.
										</p>
										<center>
											<form action="bureauprive2" method="post">
												<input type="submit" name="fond" value="Passer de l\'autre côté.">
											</form>
										</center>
									';
								}
							elseif (isset ($_POST['tiroir']))
								{
									echo'
										<p>
											<div id="enigmelieu">
												<img src="/escaperpg/images/secrets/bureausecret1.png">
												<div id="tiroir">
													<form action="bureauprive" method="post">
														<button type="submit" name="tiroir">
															<img src="/escaperpg/images/secrets/buttontiroir.png">
														</button>
													</form>
												</div>
											</div>
											Le tiroir est fermé à clé, mais vous avez avec vous la petite clé trouvée dans le coffret.
										</p>
										<center>
											<form action="bureauprive" method="post">
												<input type="text" name="petitecle"><input type="submit" name="utiliser" value="Utiliser la clé.">
											</form>
											<br>
											<form action="bureauprive2" method="post">
												<input type="submit" name="fond" value="Passer de l\'autre côté.">
											</form>
										</center>
									';
								}
							elseif (isset ($_POST['petitecle']) AND str_replace($search, $replace, stripslashes($_POST['petitecle'])) == "tirlitke")
								{
									echo'
										<audio src="/escaperpg/sons/secrets/tiroir.mp3" autoplay></audio>
										<p>
											<div id="enigmelieu">
												<img src="/escaperpg/images/secrets/bureausecret1tiroiropened.png">
											</div>
											Vous débloquez le tiroir et l\'ouvrez.
											<div id="enigme">
												<a href="/escaperpg/images/secrets/journal1.png" rel="lightbox[invent]"><img src="/escaperpg/images/secrets/journal1.png"></a>
											</div>
											<div id="enigme">
												<a href="/escaperpg/images/secrets/journal3.png" rel="lightbox[invent]"><img src="/escaperpg/images/secrets/journal3.png"></a>
											</div>
											<div id="enigme">
												<a href="/escaperpg/images/secrets/journal4.png" rel="lightbox[invent]"><img src="/escaperpg/images/secrets/journal4.png"></a>
											</div>
											Vous trouvez une liasse de papiers jaunis sur lesquels s\'étale une fine écriture que vous reconnaissez immédiatement comme étant celle de votre oncle.
											Vous les prenez délicatement, sans toutefois pouvoir vous empêcher de trembler à l\'idée de ce que vous pourriez y découvrir.
										</p>
										<center>
											<form action="bureauprive" method="post">
												<input type="submit" name="journaladd" value="Ajouter à l\'inventaire.">
											</form>
										</center>
									';
									$_SESSION['petitecle'] = false;
								}
							elseif (isset ($_POST['petitecle']))
								{
									echo'
										<p>
											<div id="enigmelieu">
												<img src="/escaperpg/images/secrets/bureausecret1.png">
												<div id="tiroir">
													<form action="bureauprive" method="post">
														<button type="submit" name="tiroir">
															<img src="/escaperpg/images/secrets/buttontiroir.png">
														</button>
													</form>
												</div>
											</div>
											Cela ne semble pas fonctionner.
											Êtes-vous sûr d\'avoir fait comme il fallait ?
										</p>
										<center>
											<form action="bureauprive" method="post">
												<input type="text" name="petitecle"><input type="submit" name="utiliser" value="Utiliser la clé.">
											</form>
											<br>
											<form action="bureauprive2" method="post">
												<input type="submit" name="fond" value="Passer de l\'autre côté.">
											</form>
										</center>
									';
								}
							elseif (isset($_POST['journaladd']))
								{
									echo'
										<script src="/escaperpg/scripts/inventaireadd.js"></script>
										<p>
											<div id="enigmelieu">
												<img src="/escaperpg/images/secrets/bureausecret1tiroiropened.png">
											</div>
											Il semble manquer certaines des pages, mais une rapide lecture vous permet d\'apprendre non seulement que votre oncle s\'essayait à de sombres expériences avec le docteur Pellington,
											mais qu\'une pièce secrète est cachée quelque part dans le manoir !
										</p>
										<center>
											<form action="bureauprive2" method="post">
												<input type="submit" name="fond" value="Passer de l\'autre côté.">
											</form>
										</center>
									';
									$_SESSION['tiroiropened'] = true;
									$_SESSION['journal1'] = true;
									$_SESSION['journal3'] = true;
									$_SESSION['journal4'] = true;
								}
							else
								{
									echo'<div id="succespopup">';
									$nouveausucces = '<img src="/escaperpg/images/succes/secrets/bureau.png"><span><u><b>Incantateur</b></u><br>Entrer dans le bureau privé de l\'oncle William</span>';
									$scenario = 'secrets';
									$description = 'bureau';
									$cache = 'oui';
									$rarete = 'succesbronze';
									include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/succesadd.php";
									echo'</div>';
									
									echo '
										<p>
											<div id="enigmelieu">
												<img src="/escaperpg/images/secrets/bureausecret1.png">
												<div id="tiroir">
													<form action="bureauprive" method="post">
														<button type="submit" name="tiroir">
															<img src="/escaperpg/images/secrets/buttontiroir.png">
														</button>
													</form>
												</div>
											</div>
											Vous entrez enfin dans le bureau privé de votre oncle alors que la nuit commence à tomber.
											Une grande bibliothèque traverse la pièce, la séparant en deux.
											Au fond, derrière la bibliothèque, se trouve une petite ouverture pour accéder à la seconde partie. La petite fenêtre au fond éclaire à peine l\'ensemble.<br>
											<br>
											De ce côté, vous pouvez trouver un tas de livres obscurs traitant de sujets qui vous terrifient et que vous n\'osez pas parcourir plus longtemps.
											Un petit bureau se trouve sur la droite, contre le mur. Un tas de papiers et d\'ustensiles divers jonchent le sol.<br>
											Manifestement, le docteur Pellington a retourné la salle pour trouver les preuves qu\'il désirait détruire, mais peut-être reste-t-il quelque chose ici ou là ?
										</p>
										<center>
											<form action="bureauprive2" method="post">
												<input type="submit" name="fond" value="Passer de l\'autre côté.">
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
