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
	   
		<link rel="stylesheet" href="/escaperpg/aventures/secrets/css/style.css">
		<meta charset="utf-8">
		<title>Vestibule - Secrets Familiaux</title>
	</head>
	
	<body onload="chargement()">
		<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/header.php"; ?>
		<div id="banniere"><img src="/escaperpg/images/secrets/secretsfamiliauxmini.png"></div>
		<div id="bloc_page">
			<nav>
				<a href="/escaperpg/images/secrets/inspecteurdeckard.png" rel="lightbox[bastian]" title="inspecteurdeckard"><img src="/escaperpg/images/secrets/inspecteurdeckardmini.png"></a>
				<div id="inventairefooter"><input type="submit" onclick="inventaireshow()" value="INVENTAIRE"></div>
				<div id="motsdepasse"><input type="submit" onclick="mdpshow()" value="NOTES"></div>
				<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/secrets/includes/navigationpellington.php"; ?>
				<a href="/escaperpg/aventures/secrets/save/save.php" target="_blank" rel="noreferrer"><input type="submit" name="save" value="SAUVEGARDER"></a>
			</nav>
			<div id="txt">
				<?php
					if ($_SESSION['flacon'] AND $_SESSION['fouillevestibule'])
						{
							echo '
								<p>
									<div id="enigmelieu">
										<img src="/escaperpg/images/secrets/vestibule.png">
									</div>
									Il semblerait que vous ayez trouvé tout ce qu\'il y avait d\'utile dans le vestibule.
								</p>
							';
						}
					elseif ($_SESSION['flacon'])
						{
							if (isset ($_POST['fouille']) AND str_replace($search, $replace, stripslashes($_POST['fouille'])) == "empreintedepas")
								{
									echo '
										<p>
											<div id="enigmelieu">
												<img src="/escaperpg/images/secrets/vestibule.png">
											</div>
											En regardant de plus près la paire de chaussures rangée au pied du porte-manteau, vous constatez qu\'elles sont pleines de boue et de taille 40, ce qui confirme que c\'était bien le docteur qui rôdait autour de la maison depuis tout ce temps.
										</p>
									';
									$_SESSION['fouillevestibule'] = true;
								}
							elseif (isset($_POST['fouille']))
								{
									echo '
										<p>
											<div id="enigmelieu">
												<img src="/escaperpg/images/secrets/vestibule.png">
											</div>
											Vous ne semblez pas trouver quoi que ce soit d\'utile en rapport avec ceci.
										</p>
										<center>
											<form action="vestibule.php" method="post">
												<input type="text" name="fouille"> <input type="submit" name="entree" value="Fouiller.">
											</form>
										</center>
									';
								}
							else
								{
									echo '
										<p>
											<div id="enigmelieu">
												<img src="/escaperpg/images/secrets/vestibule.png">
											</div>
											L\'entrée de la maison du docteur Pellington se compose d\'un vestibule assez grand où l\'homme et ses patients peuvent déposer leurs affaires en arrivant.
										</p>
										<center>
											<form action="vestibule.php" method="post">
												<input type="text" name="fouille"> <input type="submit" name="entree" value="Fouiller.">
											</form>
										</center>
									';
								}
						}					
					else
						{
							if (isset($_POST['veste']))
								{
									echo '
										<p>
											<div id="enigme">
												<a href="/escaperpg/images/secrets/flacon.png" rel="lightbox[invent]"><img src="/escaperpg/images/secrets/flacon.png"></a>
											</div>
											La veste du docteur est accrochée sur un porte-manteau.<br>
											Lorsque vous la fouillez, vous trouvez dans une poche un petit flacon.
											Sur l\'étiquette, il est inscrit <span class="mdp">barbiturique</span>.
											La bouteille est vide, ce qui indique que le docteur a dû en utiliser récemment.
										</p>
										<center>
											<form action="vestibule.php" method="post">
												<input type="submit" name="flaconadd" value="Ajouter à l\'inventaire.">
											</form>
										</center>
									';
									$_SESSION['mdp17'] = true;
								}
							elseif (isset($_POST['flaconadd']))
								{
									echo '
										<script src="/escaperpg/scripts/inventaireadd.js"></script>
										<p>
											<div id="enigmelieu">
												<img src="/escaperpg/images/secrets/vestibule.png">
											</div>
											Il semblerait que vous ayez trouvé tout ce qu\'il y avait d\'utile dans la veste du docteur.
										</p>
										<center>
											<form action="vestibule.php" method="post">
												<input type="text" name="fouille"> <input type="submit" name="entree" value="Fouiller.">
											</form>
										</center>
									';
									$_SESSION['flacon'] = true;
								}
							elseif (isset ($_POST['fouille']) AND str_replace($search, $replace, stripslashes($_POST['fouille'])) == "empreintedepas")
								{
									echo '
										<p>
											<div id="enigmelieu">
												<img src="/escaperpg/images/secrets/vestibule.png">
												<div id="vest">
													<form action="vestibule.php" method="post">
														<button type="submit" name="veste">
															<img src="/escaperpg/images/secrets/veste.png">
														</button>
													</form>
												</div>
											</div>
											En regardant de plus près la paire de chaussures rangée au pied du porte-manteau, vous constatez qu\'elles sont pleines de boue et de taille 40, ce qui confirme que c\'était bien le docteur qui rôdait autour de la maison depuis tout ce temps.
										</p>
									';
								}
							elseif (isset($_POST['fouille']))
								{
									echo '
										<p>
											<div id="enigmelieu">
												<img src="/escaperpg/images/secrets/vestibule.png">
												<div id="vest">
													<form action="vestibule.php" method="post">
														<button type="submit" name="veste">
															<img src="/escaperpg/images/secrets/veste.png">
														</button>
													</form>
												</div>
											</div>
											Vous ne semblez pas trouver quoi que ce soit d\'utile en rapport avec ceci.
										</p>
										<center>
											<form action="vestibule.php" method="post">
												<input type="text" name="fouille"> <input type="submit" name="entree" value="Fouiller.">
											</form>
										</center>
									';
								}
							else
								{
									echo '
										<p>
											<div id="enigmelieu">
												<img src="/escaperpg/images/secrets/vestibule.png">
												<div id="vest">
													<form action="vestibule.php" method="post">
														<button type="submit" name="veste">
															<img src="/escaperpg/images/secrets/veste.png">
														</button>
													</form>
												</div>
											</div>
											L\'entrée de la maison du docteur Pellington se compose d\'un vestibule assez grand où l\'homme et ses patients peuvent déposer leurs affaires en arrivant.
										</p>
										<center>
											<form action="vestibule.php" method="post">
												<input type="text" name="fouille"> <input type="submit" name="entree" value="Fouiller.">
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
		<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/secrets/includes/footer.php"; ?>
	</body>
</html>