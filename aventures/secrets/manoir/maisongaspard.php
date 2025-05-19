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
		<title>Maison de Gaspard - Secrets Familiaux</title>
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
					if (isset($_POST['gaspard']))
						{
							switch (str_replace($search, $replace, stripslashes($_POST['gaspard'])))
								{
									case "pellington":
										echo '
											<p>
												<div class="dialogue">
													<div class="portrait">
														<img src="/escaperpg/images/secrets/gaspard.png" alt="gaspard">
													</div>
													<div class="bulleperso">
														<p>
															Je ne le connais pas vraiment... Je n\'ai dû le voir qu\'une fois ou deux deux, avant aujourd\'hui.<br>
															C\'est un médecin, il a un cabinet en ville, mais je ne connais pas son adresse.
														</p>
													</div>
												</div>
											</p>
											<center>
												<form action="maisongaspard" method="post">
													<input type="text" name="gaspard"> <input type="submit" name="interroger" value="Interroger.">
												</form>
											</center>
										';
										break;
									case "domestiques":
										echo '
											<p>
												<div class="dialogue">
													<div class="portrait">
														<img src="/escaperpg/images/secrets/gaspard.png" alt="gaspard">
													</div>
													<div class="bulleperso">
														<p>
															Hum, je suis entré au service de votre oncle il y a 3 ans environ.<br>
															Je suis l\'un des derniers à être arrivé, mais je crois bien que les autres ne sont pas là depuis bien longtemps avant.
														</p>
													</div>
												</div>
											</p>
											<center>
												<form action="maisongaspard" method="post">
													<input type="text" name="gaspard"> <input type="submit" name="interroger" value="Interroger.">
												</form>
											</center>
										';
										break;
									case "chiens":
										echo '
											<p>
												<div class="dialogue">
													<div class="portrait">
														<img src="/escaperpg/images/secrets/gaspard.png" alt="gaspard">
													</div>
													<div class="bulleperso">
														<p>
															Des bons chiens de garde, j\'aimerais pas être leur ennemi.<br>
															Je ne sais pas pourquoi, mais ils n\'ont jamais eu l\'air d\'aimer votre oncle.
															Ils n\'arrêtaient pas de gronder dès qu\'ils l\'apercevaient, sans vouloir vous manquer de respect.
														</p>
													</div>
												</div>
											</p>
											<center>
												<form action="maisongaspard" method="post">
													<input type="text" name="gaspard"> <input type="submit" name="interroger" value="Interroger.">
												</form>
											</center>
										';
										break;
									case "soucis":
										echo '
											<p>
												<div class="dialogue">
													<div class="portrait">
														<img src="/escaperpg/images/secrets/gaspard.png" alt="gaspard">
													</div>
													<div class="bulleperso">
														<p>
															J\'ai été engagé par votre oncle lorsqu\'il a acheté les chiens.<br>
															Apparemment, il voulait se prémunir contre des rôdeurs.
														</p>
													</div>
												</div>
											</p>
											<center>
												<form action="maisongaspard" method="post">
													<input type="text" name="gaspard"> <input type="submit" name="interroger" value="Interroger.">
												</form>
											</center>
										';
										break;
									case "odeur":
										echo '
											<p>
												<div class="dialogue">
													<div class="portrait">
														<img src="/escaperpg/images/secrets/gaspard.png" alt="gaspard">
													</div>
													<div class="bulleperso">
														<p>
															J\'aime pas cette odeur. J\'aime pas cet endroit. Sans vouloir vous offenser.<br>
															On dirait une odeur de charogne en décomposition. Je sais pas d\'où ça peut venir. Sans doute un rat mort dans les murs.<br>
															Je ferai venir quelqu\'un, vous inquiétez pas.
														</p>
													</div>
												</div>
											</p>
											<center>
												<form action="maisongaspard" method="post">
													<input type="text" name="gaspard"> <input type="submit" name="interroger" value="Interroger.">
												</form>
											</center>
										';
										break;
									case "symbole":
										echo '
											<p>
												<div class="dialogue">
													<div class="portrait">
														<img src="/escaperpg/images/secrets/gaspard.png" alt="gaspard">
													</div>
													<div class="bulleperso">
														<p>
															Aucune idée de ce que ça signifie.
														</p>
													</div>
												</div>
											</p>
											<center>
												<form action="maisongaspard" method="post">
													<input type="text" name="gaspard"> <input type="submit" name="interroger" value="Interroger.">
												</form>
											</center>
										';
										break;
									case "bureau":
										echo '
											<p>
												<div class="dialogue">
													<div class="portrait">
														<img src="/escaperpg/images/secrets/gaspard.png" alt="gaspard">
													</div>
													<div class="bulleperso">
														<p>
															Je ne sais pas. Je vis ici et je ne suis pratiquement jamais allé dans le manoir. Désolé de ne pas pouvoir vous en apprendre plus.
														</p>
													</div>
												</div>
											</p>
											<center>
												<form action="maisongaspard" method="post">
													<input type="text" name="gaspard"> <input type="submit" name="interroger" value="Interroger.">
												</form>
											</center>
										';
										break;
									case "empreintedepas":
										echo '
											<p>
												<div class="dialogue">
													<div class="portrait">
														<img src="/escaperpg/images/secrets/gaspard.png" alt="gaspard">
													</div>
													<div class="bulleperso">
														<p>
															C\'est vous le flic, non ? Je ne vois pas en quoi je pourrais vous aider là-dessus.
														</p>
													</div>
												</div>
											</p>
											<center>
												<form action="maisongaspard" method="post">
													<input type="text" name="gaspard"> <input type="submit" name="interroger" value="Interroger.">
												</form>
											</center>
										';
										break;
									case "nourriture":
										echo '
											<p>
												<div class="dialogue">
													<div class="portrait">
														<img src="/escaperpg/images/secrets/gaspard.png" alt="gaspard">
													</div>
													<div class="bulleperso">
														<p>
															Non, je viens tout juste de rentrer et je ne suis pas encore allé les nourrir.<br>
															Les domestiques n\'osent pas s\'approcher des bêtes, donc si ce n\'est ni eux qui ont donné à manger, ni vous...
														</p>
													</div>
													<br>
												</div>
												Soudain, Gaspard blêmit et se rue hors de sa maison pour aller voir les chiens.
											</p>
											<center>
												<form action="chenil" method="post">
													<input type="submit" name="suivre" value="Le suivre.">
												</form>
											</center>
										';
										$_SESSION['chiensmal'] = true;
										$_SESSION['intrusion'] = false;
										break;
									case "teona":
										echo '
											<p>
												<div class="dialogue">
													<div class="portrait">
														<img src="/escaperpg/images/secrets/gaspard.png" alt="gaspard">
													</div>
													<div class="bulleperso">
														<p>
															Elle est plutôt gentille, mais nous n\'avons presque jamais discuté, vous savez.
														</p>
													</div>
													<br>
												</div>
											</p>
											<center>
												<form action="maisongaspard" method="post">
													<input type="text" name="gaspard"> <input type="submit" name="interroger" value="Interroger.">
												</form>
											</center>
										';
										break;
									case "monica":
										echo '
											<p>
												<div class="dialogue">
													<div class="portrait">
														<img src="/escaperpg/images/secrets/gaspard.png" alt="gaspard">
													</div>
													<div class="bulleperso">
														<p>
															Ah, celle-là...<br>
															Bon elle est pas méchante, hein, mais si vous ne voulez pas vous retrouver enfermé dans des discussions sans fin, ne la lancez jamais sur un sujet !
														</p>
													</div>
													<br>
												</div>
											</p>
											<center>
												<form action="maisongaspard" method="post">
													<input type="text" name="gaspard"> <input type="submit" name="interroger" value="Interroger.">
												</form>
											</center>
										';
										break;
									case "mmenouveau":
										echo '
											<p>
												<div class="dialogue">
													<div class="portrait">
														<img src="/escaperpg/images/secrets/gaspard.png" alt="gaspard">
													</div>
													<div class="bulleperso">
														<p>
															Ça doit être celle que je croise le plus, mais c\'est une femme très austère, ne vous attendez pas à passer de longs moments à bavarder avec.
														</p>
													</div>
													<br>
												</div>
											</p>
											<center>
												<form action="maisongaspard" method="post">
													<input type="text" name="gaspard"> <input type="submit" name="interroger" value="Interroger.">
												</form>
											</center>
										';
										break;
									default:
										echo '
											<p>
												<div class="dialogue">
													<div class="portrait">
														<img src="/escaperpg/images/secrets/gaspard.png" alt="gaspard">
													</div>
													<div class="bulleperso">
														<p>
															Je ne vois pas ce que je peux vous dire à ce propos.
														</p>
													</div>
												</div>
											</p>
											<center>
												<form action="maisongaspard" method="post">
													<input type="text" name="gaspard"> <input type="submit" name="interroger" value="Interroger.">
												</form>
											</center>
										';
										break;
								}
						}
					elseif ($_SESSION['intrusion'])
						{
							echo '
								<p>
									Gaspard vient tout juste de revenir de la ville, il est en train de déposer des sacs de courses sur la table de sa cuisine.
									<div class="dialogue">
										<div class="portrait">
											<img src="/escaperpg/images/secrets/gaspard.png" alt="gaspard">
										</div>
										<div class="bulleperso">
											<p>
												Je peux vous aider monsieur ?
											</p>
										</div>
									</div>
								</p>
								<center>
									<form action="maisongaspard" method="post">
										<input type="text" name="gaspard"> <input type="submit" name="interroger" value="Interroger.">
									</form>
								</center>
							';
						}
					elseif ($_SESSION['chiensemp'])
						{
							echo '
								<p>
									Gaspard est toujours au <span class="lieu">chenil</span> pour s\'occuper des chiens empoisonnés.
								</p>
							';
						}
					elseif ($_SESSION['chiensmalades'])
						{
							echo '
								<p>
									Il semblerait que Gaspard soit au <span class="lieu">chenil</span> avec les chiens.
								</p>
							';
						}
					elseif (isset($_POST['talis']))
						{
							echo '
								<script src="/escaperpg/scripts/inventaireadd.js"></script>
								<p>
									Vous mettez l\'étrange objet dans votre poche.
									<div class="dialogue">
										<div class="portrait">
											<img src="/escaperpg/images/secrets/gaspard.png" alt="gaspard">
										</div>
										<div class="bulleperso">
											<p>
												C\'est un talisman qui se transmet de génération en génération dans ma famille.
												Il est censé protéger celui qui le détient, il vous a mené à moi pour aider les chiens et maintenant il vous portera chance à votre tour.
											</p>
										</div>
									</div>
									Vous ne savez pas vraiment si vous croyez à ce que vous a raconté l\'homme, mais la joie qui se lit sur son visage vous réchauffe sincèrement le cœur.
								</p>
								<center>
									<form action="maisongaspard" method="post">
										<input type="text" name="gaspard"> <input type="submit" name="interroger" value="Interroger.">
									</form>
								</center>
							';
							$_SESSION['chienssauves'] = false;
							$_SESSION['chienssauvesfin'] = true;
							$_SESSION['talisman'] = true;
						}
					elseif ($_SESSION['chienssauves'])
						{
							echo '
								<p>
									Gaspard est en train de fouiller dans un tiroir de sa table de nuit.<br>
									Il semble y trouver quelque chose et se rapproche de vous.
									<div class="dialogue">
										<div class="portrait">
											<img src="/escaperpg/images/secrets/gaspard.png" alt="gaspard">
										</div>
										<div class="bulleperso">
											<p>
												Tenez, ce n\'est pas grand chose, mais je tiens à vous le donner pour vous remercier de ce que vous avez fait.
											</p>
										</div>
									</div>
									Il vous tend un petit objet de forme ronde, semblant taillé dans de la pierre.<br>
									Des lignes s\'entrecroisent en un dessin complexe que vous ne parvenez pas à analyser correctement.<br>
									<br>
									<div id="enigme">
										<a href="/escaperpg/images/secrets/talisman.png" rel="lightbox[invent]"><img src="/escaperpg/images/secrets/talisman.png"></a>
									</div>
									<br>
									Vous tendez la main pour l\'attraper et sentez une sorte d\'aura étrange en émanant.
								</p>
								<center>
									<form action="maisongaspard" method="post">
										<input type="submit" name="talis" value="Ajouter à l\'inventaire.">
									</form>
								</center>
							';
						}
					elseif ($_SESSION['chienssauvesfin'])
						{
							echo '
								<p>
									Gaspard semble heureux de vous voir lui rendre visite.
									<div class="dialogue">
										<div class="portrait">
											<img src="/escaperpg/images/secrets/gaspard.png" alt="gaspard">
										</div>
										<div class="bulleperso">
											<p>
												Qu\'est-ce que je peux faire pour vous, l\'ami ?
											</p>
										</div>
									</div>
								</p>
								<center>
									<form action="maisongaspard" method="post">
										<input type="text" name="gaspard"> <input type="submit" name="interroger" value="Interroger.">
									</form>
								</center>
							';
						}
					else
						{
							echo '
								<p>
									Gaspard vit dans une petite maison de pierre, juste à côté de la grille d\'entrée. Juste derrière elle se trouve le <span class="lieu">chenil</span>.
								</p>
								<center>
									<form action="maisongaspard" method="post">
										<input type="text" name="gaspard"> <input type="submit" name="interroger" value="Interroger.">
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
