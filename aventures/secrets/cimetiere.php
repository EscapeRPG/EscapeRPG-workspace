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
		<title>Cimetière - Secrets Familiaux</title>
	</head>
	
	<body onload="chargement()">
		<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/header.php"; ?>
		<div id="banniere"><img src="/escaperpg/images/secrets/secretsfamiliauxmini.png"></div>
		<div id="bloc_page">
			<nav>
				<a href="/escaperpg/images/secrets/inspecteurdeckard.png" rel="lightbox[bastian]" title="inspecteurdeckard"><img src="/escaperpg/images/secrets/inspecteurdeckardmini.png"></a>
				<div id="inventairefooter"><input type="submit" onclick="inventaireshow()" value="INVENTAIRE"></div>
				<div id="motsdepasse"><input type="submit" onclick="mdpshow()" value="NOTES"></div>
				<a href="/escaperpg/aventures/secrets/save/save.php" target="_blank" rel="noreferrer"><input type="submit" name="save" value="SAUVEGARDER"></a>
			</nav>
			<div id="txt">
				<?php
					if ($_SESSION['verite'])
						{
							if (isset($_POST['heler']))
								{
									echo '
										<audio src="/escaperpg/sons/secrets/pasapprochent.mp3" autoplay></audio>
										<p>
											L\'homme s\'approche de la grille à votre appel.<br>
											Voir quelqu\'un de vivant ici vous rassure un peu.
											<div class="dialogue">
												<div class="portrait">
													<img src="/escaperpg/images/secrets/gardien.png">
												</div>
												<div class="bulleperso">
													<p>
														C\'est pour quoi ?<br>
														<br>
														J\'ai pas l\'temps faut que j\'patrouille le cimetière.
														Y a des vandales qu\'ont causé des troubles hier soir, j\'peux pas laisser ce genre de chose s\'passer ici.
													</p>
												</div>
											</div>
										</p>
										<center>
											<form action="cimetiere.php" method="post">
												<input type="submit" name="repondre" value="Lui dire qui vous êtes.">
											</form>
										</center>
									';
								}
							elseif (isset($_POST['repondre']))
								{
									echo '
										<p>
											<div class="dialogue">
												<div class="portrait">
													<img src="/escaperpg/images/secrets/gardien.png">
												</div>
												<div class="bulleperso">
													<p>
														Deckard ?
														Mazette, c\'est justement vot\' caveau qu\'a été profané !
														Désolé, ceux qu\'ont fait ça ont vraiment foutu un sacré bordel, si vous m\'pardonnez l\'expression.
													</p>
												</div>
											</div>
											<br>
											Vous vous sentez défaillir, arriveriez-vous trop tard ?
											<div class="dialogue">
												<div class="portrait">
													<img src="/escaperpg/images/secrets/gardien.png">
												</div>
												<div class="bulleperso">
													<p>
														Z\'allez bien m\'sieur ? Z\'êtes tout pâle…
													</p>
												</div>
											</div>
										</p>
										<center>
											<form action="cimetiere.php" method="post">
												<input type="submit" name="demander" value="Lui demander d\'entrer.">
											</form>
										</center>
									';
								}
							elseif (isset($_POST['demander']))
								{
									echo '
										<p>
											<div class="dialogue">
												<div class="portrait">
													<img src="/escaperpg/images/secrets/gardien.png">
												</div>
												<div class="bulleperso">
													<p>
														C\'est qu\'j\'sais pas trop si c\'est possible, m\'sieur... j\'pourrais avoir des problèmes.
														J\'ai appelé la police vous en faites pas.<br>
														En plus y m\'ont dit d\'toucher à rien pour pouvoir “étudier la scène”, qu\'y m\'ont dit.
													</p>
												</div>
											</div>
										</p>
										<center>
											<form action="cimetiere.php" method="post">
												<input type="submit" name="badge" value="Lui montrer votre badge.">
											</form>
										</center>
									';
								}
							elseif (isset($_POST['badge']))
								{
									echo '
										<audio src="/escaperpg/sons/secrets/grilleouverture.mp3" autoplay></audio>
										<p>
											<div class="dialogue">
												<div class="portrait">
													<img src="/escaperpg/images/secrets/gardien.png">
												</div>
												<div class="bulleperso">
													<p>
														Oh, dans c\'cas, j\'imagine que vous pouvez entrer, alors.<br>
														<br>
														Attendez un instant que j\'vous ouvre.
													</p>
												</div>
											</div>
											Il sort une énorme clé sans âge et débloque l\'accès au cimetière.
											Vous l\'assurez pouvoir continuer seul et foncez vers le caveau familial.
										</p>
										<center>
											<form action="cimetiere.php" method="post">
												<input type="submit" name="suivant2" value="Suivant.">
											</form>
										</center>
									';
								}
							elseif (isset($_POST['suivant2']))
								{
									echo '
										<audio src="/escaperpg/sons/secrets/course.mp3" autoplay></audio>
										<p>
											Le cœur battant, vous approchez de l\'endroit où reposent vos ancêtres.
											La porte en bois du caveau est fracassée et s\'ouvre sur les ténèbres.<br>
											Vous descendez les quelques marches et découvrez avec stupeur que l\'un des lourds cercueils de pierre est renversé sur le sol, son couvercle gisant à côté.
											Au milieu des débris se trouve le corps de votre oncle.<br>
											<br>
											Tremblant, vous pointez votre lampe dans sa direction…
										</p>
										<center>
											<form action="cimetiere.php" method="post">
												<input type="submit" name="suivant3" value="Suivant.">
											</form>
										</center>
									';
								}
							elseif (isset($_POST['suivant3']))
								{
									echo '
										<p>
											Comme vous le redoutiez, le cadavre, horriblement mutilé, a un trou béant au niveau de l\'abdomen et plus rien ne se trouve à l\'intérieur.
											Vos pires craintes se sont réalisées : le shoggoth s\'est éveillé et a réussi à s\'échapper de sa prison de chair et de pierre !<br>
											<br>
											Vous décidez de retourner au manoir pour récupérer quelques affaires et essayer de savoir ce que vous allez faire pour protéger l\'humanité du danger qui la menace.
										</p>
										<center>
											<form action="manoir/shoggoth.php" method="post">
												<input type="submit" name="retour" value="Retourner au manoir.">
											</form>
										</center>
									';
								}
							else
								{
									echo '
										<p>
											Vous arrivez devant les grilles du cimetière alors que la nuit est tombée depuis un bon moment.<br>
											Tel un sombre présage aux événements, la lune est cachée par de sombres nuages et l\'endroit est plus lugubre que jamais.<br>
											Malheureusement, une chaîne ferme solidement la grille de l\'entrée et vous ne connaissez aucun autre passage pour accéder à l\'intérieur.<br>
											<br>
											À ce moment, vous apercevez une silhouette munie d\'une lampe torche en train de parcourir le lieu.<br>
											Sans doute le gardien.
										</p>
										<center>
											<form action="cimetiere.php" method="post">
												<input type="submit" name="heler" value="Le héler.">
											</form>
										</center>
									';
								}
						}
					else
						{
							if (isset($_POST['suivant']))
								{
									echo '
										<p>
											Alors que la cérémonie s\'apprête à commencer, vous apercevez deux hommes en train de se disputer un peu à l\'écart.<br>
											L\'un d\'eux semble être un domestique et l\'autre est plutôt bien habillé, en costume marron. Il porte une <span class="mdp">sacoche de médecin</span>.<br>
											Avant que vous n\'arriviez, l\'homme en costume s\'en va, manifestement en colère, et monte dans une <span class="mdp">voiture grise</span>.<br>
											<br>
											Vous vous approchez de l\'autre.
											<div class="dialogue">
												<div class="portrait">
													<img src="/escaperpg/images/secrets/gaspard.png">
												</div>
												<div class="bulleperso">
													<p>
														Je suis <span class="mdp">Gaspard</span> Bradley, je travaillais pour votre oncle.<br>
														Ne vous inquiétez pas pour cet homme, il ne nous dérangera plus.
													</p>
												</div>
											</div>
										</p>
										<center>
											<form action="cimetiere.php" method="post">
												<input type="submit" name="qui" value="Qui était-ce ?">
											</form>
										</center>
									';
									$_SESSION['mdp1'] = true;
									$_SESSION['mdp2'] = true;
									$_SESSION['mdp3'] = true;
								}
							elseif (isset($_POST['qui']))
								{
									echo '
										<p>
											<div class="dialogue">
												<div class="portrait">
													<img src="/escaperpg/images/secrets/gaspard.png">
												</div>
												<div class="bulleperso">
													<p>
														Il s\'agit du Docteur <span class="mdp">Pellington</span>, un ancien ami de votre oncle, mais ils étaient en froid depuis plusieurs années maintenant.<br>
														Monsieur Deckard n\'aurait pas voulu que le docteur assiste à la cérémonie, alors je l\'ai renvoyé.<br>
														<br>
														Je crois d\'ailleurs que ça va bientôt commencer.
														Nous devrions rejoindre les autres.
													</p>
												</div>
											</div>
											Gaspard semble cacher quelque chose, mais la cérémonie va effectivement bientôt débuter.<br>
											Vous avez peut-être encore le temps de lui poser une question, à moins que vous ne préfériez retourner vous installer ?
										</p>
										<center>
											<form action="cimetiere.php" method="post">
												<input type="text" name="question"> <input type="submit" name="medecin" value="Interroger.">
											</form>
											<form action="cimetiere.php" method="post">
												<input type="submit" name="retour" value="Retourner à la cérémonie.">
											</form>
										</center>
									';
									$_SESSION['mdp4'] = true;
								}
							elseif (isset ($_POST['question']) AND str_replace($search, $replace, stripslashes($_POST['question'])) == "sacochedemedecin")
								{
									echo '
										<p>
											<div class="dialogue">
												<div class="portrait">
													<img src="/escaperpg/images/secrets/gaspard.png">
												</div>
												<div class="bulleperso">
													<p>
														Hum… Eh bien je ne sais pas pourquoi, mais le docteur voulait examiner le corps de votre oncle avant sa mise en bière.<br>
														Je ne sais vraiment pas pourquoi. Il a refusé de me l\'expliquer.<br>
														Je ne pouvais décemment pas le laisser profaner la dépouille, vous comprenez ?
													</p>
												</div>
											</div>
										<center>
											<form action="cimetiere.php" method="post">
												<input type="submit" name="retour" value="Retourner à la cérémonie.">
											</form>
										</center>
									';
								}
							elseif (isset($_POST['question']))
								{
									echo '
										<p>
											<div class="dialogue">
												<div class="portrait">
													<img src="/escaperpg/images/secrets/gaspard.png">
												</div>
												<div class="bulleperso">
													<p>
														Je vous demande pardon ?
													</p>
												</div>
											</div>
										<center>
											<form action="cimetiere.php" method="post">
												<input type="text" name="question"> <input type="submit" name="medecin" value="Interroger.">
											</form>
											<form action="cimetiere.php" method="post">
												<input type="submit" name="retour" value="Retourner à la cérémonie.">
											</form>
										</center>
									';
								}
							elseif (isset($_POST['retour']) OR $_SESSION['mdp5'])
								{
									echo '
										<p>
											Après la cérémonie, le corps est finalement mis en terre et la foule se disperse lentement.<br>
											<br>
											Une femme s\'approche alors de vous.<br>
											<br>
											<div class="dialogue">
												<div class="portrait">
													<img src="/escaperpg/images/secrets/teona.png">
												</div>
												<div class="bulleperso">
													<p>
														Je me nomme Téona. J\'étais l\'une des <span class="mdp">domestiques</span> de votre oncle.<br>
														Je crois savoir que vous n\'habitez pas ici ?<br>
														Si vous le voulez, vous pouvez venir manger et dormir au manoir ce soir, nous vous avons tout préparé.<br>
														<br>
														Vous vous souvenez de l\'adresse ? C\'est le <span class="lieu">15 Hamilton Street</span>.
													</p>
												</div>
											</div>
											Vous ne vous souvenez pas d\'avoir vu aucun des domestiques ici présents par le passé. Il semblerait que votre oncle ait congédié tous ceux que vous connaissiez.
										</p>
									';
									if (isset($_POST['indice']))
										{
											echo '
												<p>
													<span class="indice">
														Vous êtes actuellement au cimetière et cherchez à vous rendre à l\'adresse donnée par Téona.
													</span>
												</p>
												<center>
													<form action="cimetiere.php" method="post">
														<button type="submit" name="indice2" class="boutonindice"></button>
													</form>
												</center>
											';
										}
									elseif (isset($_POST['indice2']))
										{
											echo '
												<p>
													<span class="indice">
														Vous êtes actuellement au cimetière et cherchez à vous rendre à l\'adresse donnée par Téona.<br>
														À quel endroit de cette page pourriez-vous entrer une adresse ?
													</span>
												</p>
												<center>
													<form action="cimetiere.php" method="post">
														<button type="submit" name="indice3" class="boutonindice"></button>
													</form>
												</center>
											';
										}
									elseif (isset($_POST['indice3']))
										{
											echo '
												<p>
													<span class="indice">
														Vous êtes actuellement au cimetière et cherchez à vous rendre à l\'adresse donnée par Téona.<br>
														À quel endroit de cette page pourriez-vous entrer une adresse ?<br>
														Essayez de rentrer cette nouvelle adresse dans la barre d\'adresse de votre navigateur ! Pensez bien à retirer les espaces.
													</span>
												</p>
												<center>
													<form action="cimetiere.php" method="post">
														<button type="submit" name="reponse" class="boutonreponse">
													</form>
												</center>
											';
										}
									elseif (isset($_POST['reponse']))
										{
											echo '
												<p>
													<span class="reponse">
														Rendez-vous à cette adresse : <a href="/escaperpg/aventures/secrets/15hamiltonstreet.php">http://www.escaperpg.com/escaperpg/aventures/secrets/15hamiltonstreet.php</a>.
													</span>
												</p>
											';
										}
									else
										{
											echo'
												<center>
													<form action="cimetiere.php" method="post">
														<button type="submit" name="indice" class="boutonindice"></button>
													</form>
												</center>
											';
										}
									$_SESSION['mdp5'] = true;
								}
							else
								{
									echo '
										<p>
											Une petite dizaine de personnes se tient ici.<br>
											Votre oncle ayant vécu reclus ces dernières années, vous ne vous attendiez pas vraiment à ce qu\'il y ait beaucoup de monde non plus.<br>
											<br>
											Parmi les personnes présentes, vous ne reconnaissez pas grand monde.<br>
											<br>
											Certains vous présentent leurs condoléances.
										</p>
										<center>
											<form action="cimetiere.php" method="post">
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
		<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/secrets/includes/footer.php"; ?>
	</body>
</html>