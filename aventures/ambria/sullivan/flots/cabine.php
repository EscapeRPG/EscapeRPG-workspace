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
	   
		<link rel="stylesheet" href="/escaperpg/aventures/ambria/css/style.css">
		<meta charset="utf-8">
		<title>Cabine du Capitaine - Le Trésor d'Ambria</title>
	</head>
	
	<body>
		<?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/header.php"; ?>
		<div id="banniere"><img src="/escaperpg/images/ambria/tresorambriamini.png" alt="le trésor d'ambria"></div>
		<main>
			<nav>
				<a href="/escaperpg/images/ambria/sullivanmasonmini.png" rel="lightbox[sullivan]" title="Sullivan Mason"><img src="/escaperpg/images/ambria/sullivanmasonmini.png" alt="capitaine sullivan mason"></a>
				<div id="inventairefooter"><input type="submit" value="INVENTAIRE"></div>
				<div id="motsdepasse"><input type="submit" value="NOTES"></div>
				<a href="/escaperpg/aventures/ambria/save/save.php" target="_blank" rel="noreferrer"><input type="submit" name="save" value="SAUVEGARDER"></a>
				<?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/ambria/sullivan/includes/navigationbateau.php"; ?>
			</nav>
			<div id="txt">
				<?php
					if ($_SESSION['ambrialogantrouve'])
						{
							unset ($_SESSION['flots']);
							if (isset ($_POST['suivant']) OR $_SESSION['cap'])
								{
									echo'
										<div id="enigmelieu">
											<a href="/escaperpg/images/ambria/cartedumonde.png" target="blank" style="cursor: zoom-in;"><img src="/escaperpg/images/ambria/cartedumonde.png"></a>
										</div>
										<p>
											En écoutant les instructions de Logan, vous faites quelques annotations sur votre carte.<br>
											<br>
											Vous êtes actuellement vers l\'Île de la Tortue, indiquée sur la carte par le drapeau.
										</p>
										<div id="cadranscap">
											<img src="/escaperpg/images/ambria/cap/cadranscap.png">
											<div id="bouton1haut">
												<button id="boutonhaut1" class="boutonhaut" onclick="boutoncaphaut1()"></button>
											</div>
											<div id="bouton2haut">
												<button id="boutonhaut2" class="boutonhaut" onclick="boutoncaphaut2()"></button>
											</div>
											<div id="bouton3haut">
												<button id="boutonhaut3" class="boutonhaut" onclick="boutoncaphaut3()"></button>
											</div>
											<div id="bouton4haut">
												<button id="boutonhaut4" class="boutonhaut" onclick="boutoncaphaut4()"></button>
											</div>
											<div id="bouton1bas">
												<button id="boutonbas1" class="boutonbas" onclick="boutoncapbas1()"></button>
											</div>
											<div id="bouton2bas">
												<button id="boutonbas2" class="boutonbas" onclick="boutoncapbas2()"></button>
											</div>
											<div id="bouton3bas">
												<button id="boutonbas3" class="boutonbas" onclick="boutoncapbas3()"></button>
											</div>
											<div id="bouton4bas">
												<button id="boutonbas4" class="boutonbas" onclick="boutoncapbas4()"></button>
											</div>
											<div id="coordonnee1">
												<img src="/escaperpg/images/ambria/cap/cap0.png" id="coordonnee1img">
											</div>
											<div id="coordonnee2">
												<img src="/escaperpg/images/ambria/cap/cap0.png" id="coordonnee2img">
											</div>
											<div id="coordonnee3">
												<img src="/escaperpg/images/ambria/cap/captiret.png" id="coordonnee3img">
											</div>
											<div id="coordonnee4">
												<img src="/escaperpg/images/ambria/cap/captiret.png" id="coordonnee4img">
											</div>
										</div>
										<div id="panneaucache1" class="hidden"></div>
										<div id="panneaucache2" class="hidden"></div>
										<div id="panneaucache3" class="hidden"></div>
										<div id="panneaucache4" class="hidden"></div>
										<center>
											<button type="submit" name="valider" onclick="check()" class="noway">Définir le cap.</button>
										</center>
										<script src="/escaperpg/aventures/ambria/sullivan/scripts/digicode.js"></script>
									';
									if (isset ($_POST['indice']))
										{
											echo'
												<div id="indice">
													Essayez de suivre les instructions données par Logan.
												</div>
												<center>
													<form action="cabine" method="post">
														<button type="submit" name="indice2" class="boutonindice"></button>
													</form>
												</center>
											';
										}
									elseif (isset ($_POST['indice2']))
										{
											echo'
												<div id="indice">
													Essayez de suivre les instructions données par Logan.<br>
													Comme le disait Robert Louis Stevenson : "L\'important ce n\'est pas la destination, c\'est le voyage".
												</div>
												<center>
													<form action="cabine" method="post">
														<button type="submit" name="indice3" class="boutonindice"></button>
													</form>
												</center>
											';
										}
									elseif (isset ($_POST['indice3']))
										{
											echo'
												<div id="indice">
													Essayez de suivre les instructions données par Logan.<br>
													Comme le disait Robert Louis Stevenson : "L\'important ce n\'est pas la destination, c\'est le voyage".<br>
													"L\'origine" semble correspondre au centre exact de votre carte.<br>
													Quelque chose devrait se dessiner sur la carte.
													N\'hésitez pas à tracer le chemin sur un papier en reliant les points cités, vous pourrez ainsi lire des chiffres et des lettres.
												</div>
												<center>
													<form action="cabine" method="post">
														<button type="submit" name="indice4" class="boutonindice"></button>
													</form>
												</center>
											';
										}
									elseif (isset ($_POST['indice4']))
										{
											echo'
												<div id="indice">
													Essayez de suivre les instructions données par Logan.<br>
													Comme le disait Robert Louis Stevenson : "L\'important ce n\'est pas la destination, c\'est le voyage".<br>
													"L\'origine" semble correspondre au centre exact de votre carte.<br>
													Quelque chose devrait se dessiner sur la carte.
													N\'hésitez pas à tracer le chemin sur un papier en reliant les points cités, vous pourrez ainsi lire des chiffres et des lettres.
												</div>
												<center>
													<form action="cabine" method="post">
														<button type="submit" name="reponse" class="boutonreponse"></button>
													</form>
												</center>
											';
										}
									elseif (isset ($_POST['reponse']))
										{
											echo'
												<div class="reponse">
													Vous devez régler le cap sur 32 degrés Nord-Est (32NE).
												</div>
											';
										}
									else
										{
											echo'
												<center>
													<form action="cabine" method="post">
														<button type="submit" name="indice" class="boutonindice"></button>
													</form>
												</center>
											';
										}
									$_SESSION['cap'] = true;
								}
							else
								{
									echo'
										<audio src="/escaperpg/sons/ambria/ouverturecarte.mp3" autoplay></audio>
										<p>
											Vous poussez la porte de votre cabine et entrez, suivi de près par Logan.<br>
											Vous contournez le bureau sur lequel s\'étendent vos cartes de navigation et prenez place dans votre luxueux fauteuil.
											Faisant un signe à Logan, vous l\'invitez à s\'asseoir en face.
										</p>
										<div class="dialogue">
											<div class="bulleperso2">
												<p>
													Bon alors, va falloir que tu prouves que tu as ta place ici. Montre-moi le parchemin.
												</p>
											</div>
											<div class="portrait2">
												<img src="/escaperpg/images/ambria/sullivanmasonmini.png" alt="capitaine sullivan mason">
											</div>
										</div>
										<p>
											Logan vous regarde droit dans les yeux pendant quelques secondes, avant de saisir sa sacoche dont il en sort un rouleau de papier.
										</p>
										<div class="dialogue">
											<div class="portrait">
												<img src="/escaperpg/images/ambria/loganbarthelemymini.png" alt="logan barthélémy">
											</div>
											<div class="bulleperso">
												<p>
													C\'est le parchemin que m\'a confié Louis.
													Ce n\'est pas une carte, mais...														
												</p>
											</div>
										</div>
										<p>
											Vous froncez les sourcils, l\'air patibulaire.
											Vous espérez vraiment que vous n\'avez pas été dupé, car vous avez vraiment besoin de cette prise, sans quoi l\'équipage pourrait finir par remettre en doute vos capacités.<br>
											Logan lève les mains en signe d\'apaisement.
										</p>
										<div class="dialogue">
											<div class="portrait">
												<img src="/escaperpg/images/ambria/loganbarthelemymini.png" alt="logan barthélémy">
											</div>
											<div class="bulleperso">
												<p>
													Non, non. Ne vous inquiétez pas.
													Le parchemin indique tout de même comment récupérer le trésor. Écoutez.
												</p>
											</div>
										</div>
										<center>
											<form action="cabine" method="post">
												<input type="submit" name="suivant" value="Suivant.">
											</form>
										</center>
									';
								}
						}
					elseif ($_SESSION['ambriajournalsullivan'])
						{
							echo'
								<audio src="/escaperpg/sons/ambria/cabine.mp3" autoplay></audio>
								<p>
									À la poupe du Surgisseur des Tempêtes se trouve votre cabine.<br>
									Vaste et bien éclairée par les fenêtres, elle offre tout le confort dont vous avez besoin.
									Sur votre bureau se trouvent les différentes cartes dont vous vous servez pour sillonner les mers.
									Il serait d\'ailleurs grand temps que vous retrouviez Logan afin de définir un nouveau cap, vers le fabuleux trésor d\'Ambria.
								</p>
							';
						}
					elseif (isset ($_POST['add']))
						{
							echo'
								<script src="/escaperpg/scripts/inventaireadd.js"></script>
								<p>
									Vous prenez votre journal et le glissez dans la poche intérieure de votre veste.
								</p>
							';
							$_SESSION['ambriajournalsullivan'] = true;
						}
					else
						{
							echo'
								<audio src="/escaperpg/sons/ambria/cabine.mp3" autoplay></audio>
								<p>
									À la poupe du Surgisseur des Tempêtes se trouve votre cabine.<br>
									Vaste et bien éclairée par les fenêtres, elle offre tout le confort dont vous avez besoin.
									Sur votre bureau se trouvent les différentes cartes dont vous vous servez pour sillonner les mers.
									Il serait d\'ailleurs grand temps que vous retrouviez Logan afin de définir un nouveau cap, vers le fabuleux trésor d\'Ambria.<br>
									<br>
									Vous prenez tout de même le temps de vous installer dans votre fauteuil puis récupérez votre journal pour y consigner les derniers événements et certaines de vos réflexions.
								</p>
								<div id="enigme">
									<a href="/escaperpg/images/ambria/journalsullivan.png" rel="lightbox[invent]"><img src="/escaperpg/images/ambria/journalsullivan.png"></a>
								</div>
								<center>
									<form action="cabine" method="post">
										<input type="submit" name="add" value="Prendre.">
									</form>
								</center>
							';
						}
				?>
			</div>
		</div>
		<div id="load"><div id="loader"></div></div>
		<script src="/escaperpg/scripts/aventures-chargement.js"></script>
		<?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/ambria/sullivan/includes/footer.php"; ?>
	</body>
</html>
