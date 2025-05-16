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
	
	<body>
		<?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/header.php"; ?>
		<div id="banniere"><img src="/escaperpg/images/secrets/secretsfamiliauxmini.png"></div>
		<main>
			<nav>
				<a href="/escaperpg/images/secrets/inspecteurdeckard.png" rel="lightbox[bastian]" title="inspecteurdeckard"><img src="/escaperpg/images/secrets/inspecteurdeckardmini.png"></a>
				<div id="inventairefooter"><input type="submit" onclick="inventaireshow()" value="INVENTAIRE"></div>
				<div id="motsdepasse"><input type="submit" onclick="mdpshow()" value="NOTES"></div>
				<?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/secrets/includes/navigationmanoir.php"; ?>
				<a href="/escaperpg/aventures/secrets/save/save.php" target="_blank" rel="noreferrer"><input type="submit" name="save" value="SAUVEGARDER"></a>
			</nav>
			<div id="txt">
				<?php
					if ($_SESSION['visitepellington'] AND !isset($_POST['sdi']) AND !isset($_POST['coffret']))
						{
							if (isset($_POST['droite']) AND $_POST['combinaison1'] == "2")
								{
									echo '
										<audio src="/escaperpg/sons/secrets/coffrefort1.mp3" autoplay></audio>
										<p>
											<center>
												<img src="/escaperpg/images/secrets/coffrefort.png">
											</center>
											<br>
											Entrez maintenant le second chiffre.<br>
											<br>
											<center>
												<form action="coffre" method="post">
													<input type="submit" name="gauche2" value="←"> <input type="text" name="combinaison2"> <input type="submit" name="droite2" value="→">
												</form>
												<br>
												<form action="chambre" method="post">
													<input type="submit" name="retour" value="Retour.">
												</form>
											</center>
										</p>
									';
								}
							elseif (isset($_POST['combinaison1']))
								{
									echo '
										<audio src="/escaperpg/sons/secrets/coffrefort4.mp3" autoplay></audio>
										<p>
											<center>
												<img src="/escaperpg/images/secrets/coffrefort.png">
											</center>
											<br>
											Entrez maintenant le second chiffre.<br>
											<br>
											<center>
												<form action="coffre" method="post">
													<input type="submit" name="gauche5" value="←"> <input type="text" name="combinaison5"> <input type="submit" name="droite5" value="→">
												</form>
												<br>
												<form action="chambre" method="post">
													<input type="submit" name="retour" value="Retour.">
												</form>
											</center>
										</p>
									';
								}
							elseif (isset($_POST['droite2']) AND $_POST['combinaison2'] == "9")
								{
									echo '
										<audio src="/escaperpg/sons/secrets/coffrefort2.mp3" autoplay></audio>
										<p>
											<center>
												<img src="/escaperpg/images/secrets/coffrefort.png">
											</center>
											<br>
											Entrez maintenant le troisième chiffre.<br>
											<br>
											<center>
												<form action="coffre" method="post">
													<input type="submit" name="gauche3" value="←"> <input type="text" name="combinaison3"> <input type="submit" name="droite3" value="→">
												</form>
												<br>
												<form action="chambre" method="post">
													<input type="submit" name="retour" value="Retour.">
												</form>
											</center>
										</p>
									';
								}
							elseif (isset($_POST['combinaison2']))
								{
									echo '
										<audio src="/escaperpg/sons/secrets/coffrefort1.mp3" autoplay></audio>
										<p>
											<center>
												<img src="/escaperpg/images/secrets/coffrefort.png">
											</center>
											<br>
											Entrez maintenant le troisième chiffre.<br>
											<br>
											<center>
												<form action="coffre" method="post">
													<input type="submit" name="gauche6" value="←"> <input type="text" name="combinaison6"> <input type="submit" name="droite6" value="→">
												</form>
												<br>
												<form action="chambre" method="post">
													<input type="submit" name="retour" value="Retour.">
												</form>
											</center>
										</p>
									';
								}
							elseif (isset($_POST['gauche3']) AND $_POST['combinaison3'] == "4")
								{
									echo '
										<audio src="/escaperpg/sons/secrets/coffrefort5.mp3" autoplay></audio>
										<p>
											<center>
												<img src="/escaperpg/images/secrets/coffrefort.png">
											</center>
											<br>
											Entrez maintenant le quatrième chiffre.<br>
											<br>
											<center>
												<form action="coffre" method="post">
													<input type="submit" name="gauche4" value="←"> <input type="text" name="combinaison4"> <input type="submit" name="droite4" value="→">
												</form>
												<br>
												<form action="chambre" method="post">
													<input type="submit" name="retour" value="Retour.">
												</form>
											</center>
										</p>
									';
								}
							elseif (isset($_POST['combinaison3']))
								{
									echo '
										<audio src="/escaperpg/sons/secrets/coffrefort3.mp3" autoplay></audio>
										<p>
											<center>
												<img src="/escaperpg/images/secrets/coffrefort.png">
											</center>
											<br>
											Entrez maintenant le quatrième chiffre.<br>
											<br>
											<center>
												<form action="coffre" method="post">
													<input type="submit" name="gauche7" value="←"> <input type="text" name="combinaison7"> <input type="submit" name="droite7" value="→">
												</form>
												<br>
												<form action="chambre" method="post">
													<input type="submit" name="retour" value="Retour.">
												</form>
											</center>
										</p>
									';
								}
							elseif (isset($_POST['droite4']) AND $_POST['combinaison4'] == "7")
								{
									echo'<div id="succespopup">';
									$nouveausucces = '<img src="/escaperpg/images/succes/secrets/coffre.png"><span><u><b>Crocheteur</b></u><br>Ouvrir le coffre-fort de l\'oncle William</span>';
									$scenario = 'secrets';
									$description = 'coffre';
									$cache = 'oui';
									$rarete = 'succesnormal';
									include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/succesadd.php";
									echo'</div>';
									
									echo '
										<audio src="/escaperpg/sons/secrets/coffrefortouverture.mp3" autoplay></audio>
										<p>
											Le coffre-fort s\'ouvre, vous laissant découvrir son contenu : un petit coffret, une <span class="mdp">vieille clé</span> rouillée et une pièce de monnaie.<br>
										</p>
										<div id="enigme">
											<a href="/escaperpg/images/secrets/coffret.png" rel="lightbox[invent]"><img src="/escaperpg/images/secrets/coffret.png"></a>
											<a href="/escaperpg/images/secrets/oldcle.png" rel="lightbox[invent]"><img src="/escaperpg/images/secrets/oldcle.png"></a>
											<a href="/escaperpg/images/secrets/di.png" rel="lightbox[invent]"><img src="/escaperpg/images/secrets/di.png"></a>
										</div>
										<br>
										<p>
											Vous prenez la petite pièce et l\'examinez de plus près.
											Elle représente le visage d\'un vieil homme à la barbe fournie.<br>
											<br>
											Vous la mettez dans votre poche ainsi que la clé.
										</p>
										<center>
											<form action="coffre" method="post">
												<input type="submit" name="sdi" value="Ajouter à l\'inventaire.">
											</form>
										</center>
									';
									$_SESSION['coffrefortouvert'] = true;
									$_SESSION['mdp25'] = true;
								}
							elseif (isset($_POST['combinaison4']))
								{
									echo '
										<audio src="/escaperpg/sons/secrets/coffrefort5.mp3" autoplay></audio>
										<p>
											<center>
												<img src="/escaperpg/images/secrets/coffrefort.png">
											</center>
											<br>
											Le code que vous avez essayé ne semble pas avoir fonctionné.<br>
											Il va falloir réessayer.<br>
											<br>
											Entrez le premier chiffre.<br>
											<br>
											<center>
												<form action="coffre" method="post">
													<input type="submit" name="gauche" value="←"> <input type="text" name="combinaison1"> <input type="submit" name="droite" value="→">
												</form>
												<br>
												<form action="chambre" method="post">
													<input type="submit" name="retour" value="Retour.">
												</form>
											</center>
										</p>
									';
								}
							elseif (isset($_POST['combinaison5']))
								{
									echo '
										<audio src="/escaperpg/sons/secrets/coffrefort1.mp3" autoplay></audio>
										<p>
											<center>
												<img src="/escaperpg/images/secrets/coffrefort.png">
											</center>
											<br>
											Entrez maintenant le troisième chiffre.<br>
											<br>
											<center>
												<form action="coffre" method="post">
													<input type="submit" name="gauche6" value="←"> <input type="text" name="combinaison6"> <input type="submit" name="droite6" value="→">
												</form>
												<br>
												<form action="chambre" method="post">
													<input type="submit" name="retour" value="Retour.">
												</form>
											</center>
										</p>
									';
								}
							elseif (isset($_POST['combinaison6']))
								{
									echo '
										<audio src="/escaperpg/sons/secrets/coffrefort2.mp3" autoplay></audio>
										<p>
											<center>
												<img src="/escaperpg/images/secrets/coffrefort.png">
											</center>
											<br>
											Entrez maintenant le dernier chiffre.<br>
											<br>
											<center>
												<form action="coffre" method="post">
													<input type="submit" name="gauche7" value="←"> <input type="text" name="combinaison7"> <input type="submit" name="droite7" value="→">
												</form>
												<br>
												<form action="chambre" method="post">
													<input type="submit" name="retour" value="Retour.">
												</form>
											</center>
										</p>
									';
								}
							elseif (isset($_POST['combinaison7']))
								{
									echo '
										<audio src="/escaperpg/sons/secrets/coffrefort4.mp3" autoplay></audio>
										<p>
											<center>
												<img src="/escaperpg/images/secrets/coffrefort.png">
											</center>
											<br>
											Le code que vous avez essayé ne semble pas avoir fonctionné.<br>
											Il va falloir réessayer.<br>
											<br>
											Entrez le premier chiffre.<br>
											<br>
											<center>
												<form action="coffre" method="post">
													<input type="submit" name="gauche" value="←"> <input type="text" name="combinaison1"> <input type="submit" name="droite" value="→">
												</form>
												<br>
												<form action="chambre" method="post">
													<input type="submit" name="retour" value="Retour.">
												</form>
											</center>
										</p>
									';
								}
							else
								{
									echo '
										<p>
											En retirant le tableau au-dessus du lit, vous trouvez un coffre-fort incrusté dans le mur.<br>
											Impossible de l\'ouvrir sans la <span class="indice">combinaison</span>, mais peut-être l\'avez-vous trouvée maintenant ?<br>
											<center>
												<img src="/escaperpg/images/secrets/coffrefort.png">
											</center>
											<br>
											Entrez le premier chiffre.<br>
											<br>
											<center>
												<form action="coffre" method="post">
													<input type="submit" name="gauche" value="←"> <input type="text" name="combinaison1"> <input type="submit" name="droite" value="→">
												</form>
												<br>
												<form action="chambre" method="post">
													<input type="submit" name="retour" value="Retour.">
												</form>
											</center>
										</p>
									';
								}
							if ($_SESSION['sdi'] == false)
								{
									if (isset($_POST['reponse']) OR $_SESSION['coffrereponse'])
										{
											echo '
												<p>
													<span class="reponse">
														Le premier chiffre est 2, le tome du Magna Mater, à tourner vers la droite.<br>
														Le second est 9, le nombre total présents sur le tableau de Rembrandt brûlé par votre oncle, à tourner vers la droite également.<br>
														Le troisième est 4, en comptant les portraits présents et retirés sur les murs de la chambre de William, à tourner vers la gauche.<br>
														Le quatrième chiffre est 7, le plus fort des chiffres-frères (9) s\'associe au plus faible (2). Le troisième (4) se soustrait à eux, ce qui donne 2+9-4 = 7, à tourner vers la droite.
													</span>
												</p>
											';
											$_SESSION['coffrereponse'] = true;
											$_SESSION['coffreindice1'] = false;
											$_SESSION['coffreindice2'] = false;
											$_SESSION['coffreindice3'] = false;
										}
									elseif (isset($_POST['indice3']) OR $_SESSION['coffreindice3'])
										{
											echo '
												<p>
													<span class="indice">
														Si le problème vient de la phrase concernant les "frères", dites-vous que vous cherchez bien un code à 4 chiffres.<br>
														Qui peuvent bien être ces "frères" dont parle le docteur ?<br>
														Les "frères" sont les 3 premiers chiffres de la combinaison. La phrase vous permet de déterminer le 4e.
													</span>
												</p>
												<center>
													<form action="coffre" method="post">
														<button type="submit" name="reponse" class="boutonreponse"></button>
													</form>
												</center>
											';
											$_SESSION['coffreindice3'] = true;
										}
									elseif (isset($_POST['indice2']) OR $_SESSION['coffreindice2'])
										{
											echo '
												<p>
													<span class="indice">
														Si le problème vient de la phrase concernant les "frères", dites-vous que vous cherchez bien un code à 4 chiffres.<br>
														Qui peuvent bien être ces "frères" dont parle le docteur ?
													</span>
												</p>
												<center>
													<form action="coffre" method="post">
														<button type="submit" name="indice3" class="boutonindice"></button>
													</form>
												</center>
											';
											$_SESSION['coffreindice2'] = true;
										}
									elseif (isset($_POST['indice']) OR $_SESSION['coffreindice1'])
										{
											echo '
												<p>
													<span class="indice">
														Avez-vous trouvé les 3 premiers chiffres du code ?
														Si ce n\'est pas le cas, essayez de fouiller au niveau de la bibliothèque, du salon et de la chambre de William pour les trouver, grâce aux aveux de Pellington.<br>
														Faites bien attention également à entrer le code en respectant le sens gauche ou droite !<br>
														<br>
														Si le problème vient de la phrase concernant les "frères", dites-vous que vous cherchez bien un code à 4 chiffres.
													</span>
												</p>
												<center>
													<form action="coffre" method="post">
														<button type="submit" name="indice2" class="boutonindice"></button>
													</form>
												</center>
											';
											$_SESSION['coffreindice1'] = true;
										}
									else
										{
											echo '
												<center>
													<form action="coffre" method="post">
														<button type="submit" name="indice" class="boutonindice"></button>
													</form>
												</center>
											';
										}
								}
						}
					elseif (isset($_POST['sdi']))
						{
							echo '
								<script src="/escaperpg/scripts/inventaireadds.js"></script>
								<p>
									Vous vous intéressez alors au coffret.<br>
									<div id="enigme">
										<a href="/escaperpg/images/secrets/coffret.png" rel="lightbox[invent]"><img src="/escaperpg/images/secrets/coffret.png"></a>
									</div>
									Il semble fermé et ne comporte pas de serrure visible.<br>
									Sur la façade se trouvent 5 cavités circulaires.<br>
									<br>
									Vous le prenez également avec vous.
								</p>
								<center>
									<form action="coffre" method="post">
										<input type="submit" name="coffret" value="Ajouter à l\'inventaire.">
									</form>
								</center>
							';
							$_SESSION['sdi'] = true;
							$_SESSION['restab'] = false;
							$_SESSION['magna'] = false;
							$_SESSION['oldcle'] = true;
						}
					elseif (isset($_POST['coffret']))
						{
							echo '
								<script src="/escaperpg/scripts/inventaireadd.js"></script>
								<p>
									Manifestement, vous avez trouvé tout ce qu\'il y avait d\'intéressant dans ce coffre.<br>
									Vous pouvez étudier le coffret si vous le voulez.
								</p>
								<center>
									<form action="coffret" method="post">
										<input type="submit" name="retour" value="Étudier le coffret.">
									</form>
								</center>
							';
							$_SESSION['coffret'] = true;
						}
					else
						{
							echo '
								<p>
									<center>
										<img src="/escaperpg/images/secrets/coffrefort.png">
									</center>
									<br>
									En retirant le tableau au-dessus du lit, vous trouvez un coffre-fort incrusté dans le mur.<br>
									Impossible de l\'ouvrir sans la combinaison.
									<center>
										<form action="chambre" method="post">
											<input type="submit" name="retour" value="Retour.">
										</form>
									</center>
								</p>
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
