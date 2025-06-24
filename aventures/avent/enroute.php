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
		<title>En Route - Le Grenier d'Arthur</title>
	</head>
	
	<body>
		<?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/header.php"; ?>
		<div id="banniere"><img src="/escaperpg/images/avent/aventmini.png" alt="bannière le grenier d'arthur"></div>
		<main>
			<nav>
				<img src="/escaperpg/images/avent/sarah.png" alt="sarah">
				<form action="/escaperpg/aventures/avent/cartes.php" target="_blank" rel="noreferrer" method="post"><input type="submit" name="cartes" value="Cartes"></form>
				<a href="/escaperpg/aventures/avent/save/save.php" target="_blank" rel="noreferrer"><input type="submit" name="save" value="SAUVEGARDER"></a>
			</nav>
			<div id="txt">
				<?php
					if ($_SESSION['carteciel'])
					{
						if (isset ($_POST['validate']))
							{
								switch (str_replace($search, $replace, stripslashes($_POST['aller'])))
									{
										case "polenord":
											echo'<div id="succespopup">';
											$nouveausucces = '<img src="/escaperpg/images/succes/avent/polenord.png"><span><u><b>En route !</b></u><br>Partir pour le Pôle Nord !</span>';
											$scenario = 'avent';
											$description = 'pôlenord';
											$cache = 'oui';
											$rarete = 'succesnormal';
											include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/succesadd.php";
											echo'</div>';
											
											echo'
												<audio src="/escaperpg/sons/avent/bipssifflement.mp3" autoplay></audio>
												<p>
													La lumière s\'intensifie et semble vous englober.<br>
													Vous entendez la machine émettre une sorte de sifflement strident et vous commencez à paniquer en réalisant qu\'elle pourrait exploser juste à côté de vous !<br>
													<br>
													Vous essayez de bouger mais la lumière autour de vous devient aveuglante et vous ne parvenez pas à esquisser le moindre mouvement.<br>
													<br>
													Soudain, vous vous sentez comme attirée vers le haut et constatez que vos pieds ne touchent plus le sol !
													Vous entendez la machine émettre une série de bips.
												</p>
												<center>
													<form action="retrouvailles" method="post">
														<input type="submit" name="bips" value="BIP BOUP !">
													</form>
												</center>
											';
											break;
										default:
											echo'
												<p>
													Rien ne se passe. Peut-être avez-vous fait une erreur ?
												</p>
												<center>
													<div class="container">
														<iframe class="drawframe" src="/escaperpg/aventures/avent/draw.php"></iframe>
													</div>
													<form action="enroute" method="post">
														<input type="submit" name="clear" value="RÉINITIALISER.">
													</form>
													<br>
													<form action="enroute" method="post">
														<input list="notesListe" name="aller"> <input type="submit" name="validate" value="VALIDER.">
													</form>
													<br>
													<form action="enroute" method="post">
														<button type="submit" name="indiceenroute4" class="boutonindice"></button>
													</form>
												</center>
											';
									}
							}
						elseif (isset ($_POST['indice']))
							{
								echo '
									<center>
										<div class="container">
											<iframe class="drawframe" src="/escaperpg/aventures/avent/draw.php"></iframe>
										</div>
										<form action="enroute" method="post">
											<input type="submit" name="clear" value="RÉINITIALISER.">
										</form>
									</center>
									<p>
										En y regardant de plus près, vous trouvez que les petites taches de lumière projetées sur le drap pourraient ressembler à des étoiles.
										La carte du ciel que vous avez récupérée semble en effet l\'indiquer. Toutefois, vous constatez que la constellation qui y est dessinée ne correspond pas à celle projetée.<br>
										<br>
										Sur le côté de la machine, un petit clavier vous permet d\'entrer une information, mais laquelle ?
									</p>
									<center>
										<span class="indice">Essayez de comparer le drap et la carte avec les étoiles que vous avez trouvée. Peut-être se complètent-ils l\'un et l\'autre ?</span><br>
										<br>
										<form action="enroute" method="post">
											<input list="notesListe" name="aller"> <input type="submit" name="validate" value="VALIDER.">
										</form>
										<br>
										<form action="enroute" method="post">
											<button type="submit" name="indiceenroute4" class="boutonindice"></button>
										</form>
									</center>
								';
							}
						elseif (isset ($_POST['indiceenroute4']))
							{
								echo '
									<center>
										<div class="container">
											<iframe class="drawframe" src="/escaperpg/aventures/avent/draw.php"></iframe>
										</div>
										<form action="enroute" method="post">
											<input type="submit" name="clear" value="RÉINITIALISER.">
										</form>
									</center>
									<p>
										En y regardant de plus près, vous trouvez que les petites taches de lumière projetées sur le drap pourraient ressembler à des étoiles.
										La carte du ciel que vous avez récupérée semble en effet l\'indiquer. Toutefois, vous constatez que la constellation qui y est dessinée ne correspond pas à celle projetée.<br>
										<br>
										Sur le côté de la machine, un petit clavier vous permet d\'entrer une information, mais laquelle ?
									</p>
									<center>
										<span class="indice">Essayez de comparer le drap et la carte avec les étoiles que vous avez trouvée. Peut-être se complètent-ils l\'un et l\'autre ?<br>
										Vous pouvez dessiner directement sur le drap. Reproduisez le dessin que vous avez sur votre carte.</span><br>
										<br>
										<form action="enroute" method="post">
											<input list="notesListe" name="aller"> <input type="submit" name="validate" value="VALIDER.">
										</form>
										<br>
										<form action="enroute" method="post">
											<button type="submit" name="reponse" class="boutonreponse"></button>
										</form>
									</center>
								';
							}
						elseif (isset ($_POST['reponse']))
							{
								echo '
									<center>
										<div class="container">
											<iframe class="drawframe" src="/escaperpg/aventures/avent/draw.php"></iframe>
										</div>
										<form action="enroute" method="post">
											<input type="submit" name="clear" value="RÉINITIALISER.">
										</form>
									</center>
									<p>
										En y regardant de plus près, vous trouvez que les petites taches de lumière projetées sur le drap pourraient ressembler à des étoiles.
										La carte du ciel que vous avez récupérée semble en effet l\'indiquer. Toutefois, vous constatez que la constellation qui y est dessinée ne correspond pas à celle projetée.<br>
										<br>
										Sur le côté de la machine, un petit clavier vous permet d\'entrer une information, mais laquelle ?
									</p>
									<center>
										<span class="reponse">Le mot de passe est Pôle Nord.</span><br>
										<br>
										<form action="enroute" method="post">
											<input list="notesListe" name="aller"> <input type="submit" name="validate" value="VALIDER.">
										</form>
									</center>
								';
							}
						else
							{
								echo '
									<center>
										<div class="container">
											<iframe class="drawframe" src="/escaperpg/aventures/avent/draw.php"></iframe>
										</div>
										<form action="enroute" method="post">
											<input type="submit" name="clear" value="RÉINITIALISER.">
										</form>
									</center>
									<p>
										En y regardant de plus près, vous trouvez que les petites taches de lumière projetées sur le drap pourraient ressembler à des étoiles.
										La carte du ciel que vous avez récupérée semble en effet l\'indiquer. Toutefois, vous constatez que la constellation qui y est dessinée ne correspond pas à celle projetée.<br>
										<br>
										Sur le côté de la machine, un petit clavier vous permet d\'entrer une information, mais laquelle ?
									</p>
									<center>
										<form action="enroute" method="post">
											<input list="notesListe" name="aller"> <input type="submit" name="validate" value="VALIDER.">
										</form>
										<br>
										<form action="enroute" method="post">
											<button type="submit" name="indice" class="boutonindice"></button>
										</form>
									</center>
								';
							}
					}
					elseif (isset ($_POST['retour']))
						{
							echo '
								<p>
									<div id="enigmelieu">
										<img src="/escaperpg/images/avent/grenier.png">
										<div id="carteciel">
											<form action="enroute" method="post">
												<button type="submit" name="carteduciel">
													<img src="/escaperpg/images/avent/carteciel.png">
												</button>
											</form>
										</div>
									</div>
								</p>
								<center>
									<form action="enroute" method="post">
										<button type="submit" name="indice" class="boutonindice"></button>
									</form>
								</center>
							';
						}
					elseif (isset ($_POST['indice']))
						{
							echo '
								<p>
									<div id="enigmelieu">
										<img src="/escaperpg/images/avent/grenier.png">
										<div id="carteciel">
											<form action="enroute" method="post">
												<button type="submit" name="carteduciel">
													<img src="/escaperpg/images/avent/carteciel.png">
												</button>
											</form>
										</div>
									</div>
								</p>
								<center>
									<span class="indice">Fouillez bien la pièce.</span><br>
									<br>
									<form action="enroute" method="post">
										<button type="submit" name="indiceenroute2" class="boutonindice"></button>
									</form>
								</center>
							';
						}
					elseif (isset ($_POST['indiceenroute2']))
						{
							echo '
								<p>
									<div id="enigmelieu">
										<img src="/escaperpg/images/avent/grenier.png">
										<div id="carteciel">
											<form action="enroute" method="post">
												<button type="submit" name="carteduciel">
													<img src="/escaperpg/images/avent/carteciel.png">
												</button>
											</form>
										</div>
									</div>
								</p>
								<center>
									<span class="indice">Fouillez bien la pièce.<br>
									Il y a une carte cachée quelque part qui vous aidera à comprendre.</span><br>
									<br>
									<form action="enroute" method="post">
										<button type="submit" name="reponse" class="boutonreponse"></button>
									</form>
								</center>
							';
						}
					elseif (isset ($_POST['reponse']))
						{
							echo '
								<p>
									<div id="enigmelieu">
										<img src="/escaperpg/images/avent/grenier.png">
										<div id="carteciel">
											<form action="enroute" method="post">
												<button type="submit" name="carteduciel">
													<img src="/escaperpg/images/avent/carteciel.png">
												</button>
											</form>
										</div>
									</div>
								</p>
								<center>
									<span class="reponse">Cliquez sur la petite carte qui est posée sur la table, à côté de la machine.</span>
								</center>
							';
						}
					elseif (isset ($_POST['carteduciel']))
						{
							echo '
								<p>
									Vous trouvez une carte sur laquelle sont dessinées des étoiles.
								</p>
								<center>
									<span class="important">Prenez la carte numéro 3.<br>
									<br>
									<form action="enroute" method="post">
										<input type="submit" name="suivant2" value="RETOUR.">
									</form>
								</center>
							';
							$_SESSION['carteciel'] = true;
						}
					else
						{
							echo '
								<center>
									<div class="container">
										<iframe class="drawframe" src="/escaperpg/aventures/avent/draw.php"></iframe>
									</div>
									<form action="enroute" method="post">
										<input type="submit" name="clear" value="RÉINITIALISER.">
									</form>
								</center>
								<p>
									Vous n\'arrivez pas à comprendre ce que vous voyez.<br>
									Peut-être que quelque chose dans la pièce pourrait vous aider ?
								</p>
								<center>
									<form action="enroute" method="post">
										<input type="submit" name="retour" value="RETOUR.">
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
