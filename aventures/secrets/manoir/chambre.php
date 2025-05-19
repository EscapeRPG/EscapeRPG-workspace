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
		<title>Chambre de William - Secrets Familiaux</title>
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
					if ($_SESSION['coffrenigme'])
						{
							echo '
								<p>
									<div id="enigmelieu">
										<img src="/escaperpg/images/secrets/chambrewilliam.png">
									</div>
									<br>
									La chambre de votre défunt oncle. Elle est propre et bien entretenue.<br>
									<br>
									Il semblerait que vous ayez trouvé tout ce qu\'il y avait ici pour le moment.
								</p>
							';
						}
					elseif ($_SESSION['coffrefortouvert'] AND $_SESSION['sad'] == false)
						{
							if (isset ($_POST['sad']))
								{
									echo '
										<script src="/escaperpg/scripts/inventaireadd.js"></script>
										<p>
											Il ne semble pas y avoir quoi que ce soit d\'autre sous le lit.
										</p>
										<center>
											<form action="chambre" method="post">
												<input type="submit" name="retour" value="Retour.">
											</form>
										</center>
									';
									$_SESSION['sad'] = true;
								}
							elseif (isset ($_POST['chbrpiece']))
								{
									echo '
										<p>
											<div id="enigme">
												<a href="/escaperpg/images/secrets/ad.png" rel="lightbox[invent]"><img src="/escaperpg/images/secrets/ad.png"></a>
											</div>
											Sous le lit, vous trouvez une pièce représentant un jeune homme. Vous la mettez dans votre poche.
										</p>
										<center>
											<form action="chambre" method="post">
												<input type="submit" name="sad" value="Ajouter à l\'inventaire.">
											</form>
										</center>
									';
								}
							else
								{
									echo '
										<p>
											<div id="enigmelieu">
												<img src="/escaperpg/images/secrets/chambrewilliam.png">
												<div id="piechbr">
													<form action="chambre" method="post">
														<button type="submit" name="chbrpiece">
															<img src="/escaperpg/images/secrets/chambrepiece.png">
														</button>
													</form>
												</div>
											</div>
											<br>
											La chambre de votre défunt oncle. Elle est propre et bien entretenue.<br>
											<br>
											Le coffre-fort est ouvert, mais peut-être pouvez-vous encore trouver quelque chose d\'utile par ici ?
										</p>
									';
								}
						}
					elseif ($_SESSION['jour'] OR $_SESSION['visitepellington'])
						{
							if (isset ($_POST['sad']))
								{
									echo '
										<script src="/escaperpg/scripts/inventaireadd.js"></script>
										<p>
											Il ne semble pas y avoir quoi que ce soit d\'autre sous le lit.
										</p>
										<center>
											<form action="chambre" method="post">
												<input type="submit" name="retour" value="Retour.">
											</form>
										</center>
									';
									$_SESSION['sad'] = true;
								}
							elseif (isset ($_POST['chbrpiece']))
								{
									echo '
										<p>
											<div id="enigme">
												<a href="/escaperpg/images/secrets/ad.png" rel="lightbox[invent]"><img src="/escaperpg/images/secrets/ad.png"></a>
											</div>
											Sous le lit, vous trouvez une pièce représentant un jeune homme. Vous la mettez dans votre poche.
										</p>
										<center>
											<form action="chambre" method="post">
												<input type="submit" name="sad" value="Ajouter à l\'inventaire.">
											</form>
										</center>
									';
								}
							elseif ($_SESSION['sad'] AND $_SESSION['scof'])
								{
									echo '
										<p>
											<div id="enigmelieu">
												<img src="/escaperpg/images/secrets/chambrewilliam.png">
												<div id="cofchbr">
													<a href="coffre.php"><img src="/escaperpg/images/secrets/cof.png"></a>
												</div>
											</div>
											<br>
											Il semblerait que vous ayez trouvé tout ce qu\'il y avait ici pour le moment.
										</p>
									';
								}
							elseif (isset ($_POST['chbrtab']) AND $_SESSION['sad'] OR $_SESSION['sad'] AND $_SESSION['scof'])
								{
									echo '
										<p>
											<div id="enigmelieu">
												<img src="/escaperpg/images/secrets/chambrewilliam.png">
												<div id="cofchbr">
													<a href="coffre.php"><img src="/escaperpg/images/secrets/cof.png"></a>
												</div>
											</div>
											<br>
											Derrière le tableau se trouvait un coffre-fort.<br>
											<br>
											Il semblerait que vous ayez trouvé tout ce qu\'il y avait ici pour le moment.
										</p>
									';
									$_SESSION['scof']=true;
								}
							elseif ($_SESSION['sad'] AND $_SESSION['scof'] == false)
								{
									echo '
										<p>
											<div id="enigmelieu">
												<img src="/escaperpg/images/secrets/chambrewilliam.png">
												<div id="tabchbr">
													<form action="chambre" method="post">
														<button type="submit" name="chbrtab">
															<img src="/escaperpg/images/secrets/tableau.png">
														</button>
													</form>
												</div>
											</div>
											<br>
											La chambre de votre défunt oncle. Elle est propre et bien entretenue.<br>
											<br>
											Peut-être y a-t-il ici quelque chose de valeur ?
										</p>
									';
								}
							elseif (isset ($_POST['chbrtab']) AND $_SESSION['sad'] == false OR $_SESSION['scof'] AND $_SESSION['sad'] == false)
								{
									echo '
										<p>
											<div id="enigmelieu">
												<img src="/escaperpg/images/secrets/chambrewilliam.png">
												<div id="cofchbr">
													<a href="coffre.php"><img src="/escaperpg/images/secrets/cof.png"></a>
												</div>
												<div id="piechbr">
													<form action="chambre" method="post">
														<button type="submit" name="chbrpiece">
															<img src="/escaperpg/images/secrets/chambrepiece.png">
														</button>
													</form>
												</div>
											</div>
											<br>
											Derrière le tableau se trouvait un coffre-fort.<br>
											<br>
											Peut-être y a-t-il ici quelque chose de valeur ?
										</p>
									';
									$_SESSION['scof']=true;
								}
							else
								{
									echo '
										<p>
											<div id="enigmelieu">
												<img src="/escaperpg/images/secrets/chambrewilliam.png">
												<div id="tabchbr">
													<form action="chambre" method="post">
														<button type="submit" name="chbrtab">
															<img src="/escaperpg/images/secrets/tableau.png">
														</button>
													</form>
												</div>
												<div id="piechbr">
													<form action="chambre" method="post">
														<button type="submit" name="chbrpiece">
															<img src="/escaperpg/images/secrets/chambrepiece.png">
														</button>
													</form>
												</div>
											</div>
											<br>
											La chambre de votre défunt oncle. Elle est propre et bien entretenue.<br>
											<br>
											Peut-être y a-t-il ici quelque chose de valeur ?
										</p>
									';
								}
						}
					else
						{
							if (isset ($_POST['sad']))
								{
									echo '
										<script src="/escaperpg/scripts/inventaireadd.js"></script>
										<p>
											Il ne semble pas y avoir quoi que ce soit d\'autre sous le lit.
										</p>
										<center>
											<form action="chambre" method="post">
												<input type="submit" name="retour" value="Retour.">
											</form>
										</center>
									';
									$_SESSION['sad'] = true;
								}
							elseif (isset ($_POST['chbrpiece']))
								{
									echo '
										<p>
											<div id="enigme">
												<a href="/escaperpg/images/secrets/ad.png" rel="lightbox[invent]"><img src="/escaperpg/images/secrets/ad.png"></a>
											</div>
											Sous le lit, vous trouvez une pièce représentant un jeune homme. Vous la mettez dans votre poche.
										</p>
										<center>
											<form action="chambre" method="post">
												<input type="submit" name="sad" value="Ajouter à l\'inventaire.">
											</form>
										</center>
									';
								}
							elseif (isset ($_POST['chbrtabnuit']) AND $_SESSION['sad'] OR $_SESSION['scof'] AND $_SESSION['sad'])
								{
									echo '
										<p>
											<div id="enigmelieu">
												<img src="/escaperpg/images/secrets/chambrewilliamnuit.png">
												<div id="cofchbr">
													<a href="coffre.php"><img src="/escaperpg/images/secrets/cof.png"></a>
												</div>
											</div>
											<br>
											Derrière le tableau se trouvait un coffre-fort.<br>
											<br>
											Vous ne trouvez rien d\'autre pour le moment.
										</p>
									';
									$_SESSION['scof']=true;
								}
							elseif ($_SESSION['sad'] AND $_SESSION['scof'] == false)
								{
									echo '
										<p>
											<div id="enigmelieu">
												<img src="/escaperpg/images/secrets/chambrewilliamnuit.png">
												<div id="tabchbr">
													<form action="chambre" method="post">
														<button type="submit" name="chbrtabnuit">
															<img src="/escaperpg/images/secrets/tableaunuit.png">
														</button>
													</form>
												</div>
											</div>
											<br>
											La chambre de votre défunt oncle. Elle est propre et bien entretenue.<br>
											<br>
											Peut-être y a-t-il ici quelque chose de valeur ?
										</p>
									';
								}
							elseif (isset ($_POST['chbrtabnuit']) AND $_SESSION['sad'] == false OR $_SESSION['scof'] AND $_SESSION['sad'] == false)
								{
									echo '
										<p>
											<div id="enigmelieu">
												<img src="/escaperpg/images/secrets/chambrewilliamnuit.png">
												<div id="cofchbr">
													<a href="coffre.php"><img src="/escaperpg/images/secrets/cof.png"></a>
												</div>
												<div id="piechbr">
													<form action="chambre" method="post">
														<button type="submit" name="chbrpiece">
															<img src="/escaperpg/images/secrets/chambrepiecenuit.png">
														</button>
													</form>
												</div>
											</div>
											<br>
											Derrière le tableau se trouvait un coffre-fort.<br>
											<br>
											Peut-être y a-t-il ici quelque chose de valeur ?
										</p>
									';
									$_SESSION['scof']=true;
								}
							else
								{
									echo '
										<p>
											<div id="enigmelieu">
												<img src="/escaperpg/images/secrets/chambrewilliamnuit.png">
												<div id="tabchbr">
													<form action="chambre" method="post">
														<button type="submit" name="chbrtabnuit">
															<img src="/escaperpg/images/secrets/tableaunuit.png">
														</button>
													</form>
												</div>
												<div id="piechbr">
													<form action="chambre" method="post">
														<button type="submit" name="chbrpiece">
															<img src="/escaperpg/images/secrets/chambrepiecenuit.png">
														</button>
													</form>
												</div>
											</div>
											<br>
											La chambre de votre défunt oncle. Elle est propre et bien entretenue.<br>
											<br>
											Peut-être y a-t-il ici quelque chose de valeur ?
										</p>
									';
								}
						}
					if ($_SESSION['aveux'])
						{
							if (isset($_POST['indice']))
								{
									echo '
										<p>
											Plusieurs portraits sont accrochés au mur, mais sont-ils bien tous là ?
										</p>
										<center>
											<form action="chambre" method="post">
												<button type="submit" name="reponse" class="boutonreponse"></button>
											</form>
										</center>
									';
								}
							elseif (isset($_POST['reponse']))
								{
									echo '
										<p>
											On peut constater, sur le papier peint, un petit rectangle plus clair indiquant qu\'un tableau était accroché mais a été retiré.<br>
											Il y avait donc 4 portraits auparavant.
										</p>
									';
								}
							else
								{
									echo '
										<center>
											<form action="chambre" method="post">
												<button type="submit" name="indice" class="boutonindice"></button>
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
