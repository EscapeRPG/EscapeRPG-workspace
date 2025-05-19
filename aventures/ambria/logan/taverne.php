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
		<title>La Taverne - Le Trésor d'Ambria</title>
	</head>
	
	<body onload="chargement()">
		<?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/header.php"; ?>
		<div id="banniere"><img src="/escaperpg/images/ambria/tresorambriamini.png"></div>
		<main>
			<nav>
				<a href="/escaperpg/images/ambria/loganbarthelemymini.png" rel="lightbox[logan]" title="Logan Barthélémy"><img src="/escaperpg/images/ambria/loganbarthelemymini.png"></a>
				<div id="inventairefooter"><input type="submit" value="INVENTAIRE"></div>
				<div id="motsdepasse"><input type="submit" value="NOTES"></div>
				<a href="/escaperpg/aventures/ambria/save/save.php" target="_blank" rel="noreferrer"><input type="submit" name="save" value="SAUVEGARDER"></a>
			</nav>
			<div id="txt">
				<?php
					if (isset ($_POST['suivant']))
						{
							switch (str_replace($search, $replace, stripslashes($_POST['objet'])))
								{
									case "cestatoijecrois":
										echo'
											<audio src="/escaperpg/sons/ambria/boursejetee.mp3" autoplay></audio>
											<p>
												Vous ouvrez grand les yeux et observez la bourse en cuir qui vient d\'atterrir sur la table, s\'ouvrant à moitié et déversant quelques pièces.<br>
												Vous relevez lentement les yeux pour dévisager l\'individu.<br>
												<br>
												Grand, la carrure imposante, un long manteau rongé par le sel de mer qui devait être d\'un noir d\'encre à une époque mais s\'est délavé au fil des ans,
												une longue barbe finement taillée en pointe recouvrant à peine le sourire de prédateur de l\'homme et,
												enfin, des yeux d\'un noir de jais qui vous scrutent tout en vous donnant l\'impression de vous transpercer l\'âme.<br>
												<br>
												Vous ne pouvez réprimer un tremblement de terreur face à lui et avez du mal à prononcer votre phrase sans bégayer lamentablement.
											</p>
											<div class="dialogue">
												<div class="bulleperso2">
													<p>
														Qui… <span class="mdp2">Qui êtes-vous</span> ?
													</p>
												</div>
												<div class="portrait2">
													<img src="/escaperpg/images/ambria/loganbarthelemymini.png">
												</div>
											</div>
											<center>
												<form action="taverne" method="post">
													<input type="submit" name="suivant2" value="Suivant.">
												</form>
											</center>
										';
										$_SESSION['mdp1'] = true;
										break;
									default:
										echo'
											<p>
												Ça ne semble pas être ça. Peut-être devez-vous attendre une information de la part de cet inconnu, incarné par l\'autre joueur ?
											</p>
											<center>
												<form action="taverne" method="post">
													<input type="text" name="objet"><input type="submit" name="suivant" value="Suivant.">
												</form>
												<form action="taverne" method="post">
													<button type="submit" name="indice1" class="boutonindice"></button>
												</form>
											</center>
										';
								}
						}
					elseif (isset ($_POST['suivant2']))
						{
							echo'
								<audio src="/escaperpg/sons/ambria/epeeposee.mp3" autoplay></audio>
								<p>
									L\'homme prend la chaise face à vous et s\'assoit dessus.
								</p>
								<div class="dialogue">
									<div class="portrait">
										<img src="/escaperpg/images/ambria/sullivanmasonmini.png">
									</div>
									<div class="bulleperso">
										<p>
											Alors tu n\'as pas entendu parler de moi ?
											Le Capitaine Sullivan Mason, ça te parle ?
											Mais peu importe, tu as quelque chose que je recherche, et je ne suis pas du genre patient.<br>
											<br>
											Donne-moi le parchemin.
										</p>
									</div>
								</div>
								<div class="dialogue">
									<div class="bulleperso2">
										<p>
											Le Capitaine... ? Je... Je ne vois pas de quoi vous voulez parler !
										</p>
									</div>
									<div class="portrait2">
										<img src="/escaperpg/images/ambria/loganbarthelemymini.png">
									</div>
								</div>
								<p>
									Il se penche en avant, l\'air patibulaire, et attrape quelque chose au niveau de sa hanche avant de relever le bras.
									Vous apercevez alors la lame d\'un sabre qu\'il pose violemment sur la table, vous faisant sursauter.
								</p>
								<div class="dialogue">
									<div class="portrait">
										<img src="/escaperpg/images/ambria/sullivanmasonmini.png">
									</div>
									<div class="bulleperso">
										<p>
											J\'ai pas le temps de jouer, gamin. Tu sais très bien de quoi je parle.
										</p>
									</div>
								</div>
								<center>
									<form action="taverne" method="post">
										<input type="submit" name="suivant3" value="Suivant.">
									</form>
								</center>
							';
						}
					elseif (isset ($_POST['suivant3']))
						{
							echo'
								<p>
									Déglutissant péniblement, vous fixez le sabre sur la table.
								</p>
								<div class="dialogue">
									<div class="bulleperso2">
										<p>
											Je... Je ne veux pas de problème.<br>
											<br>
											Écoutez, tout ce que je cherche, c\'est à partir d\'ici. Je n\'ai plus aucune attache. Je veux partir...
										</p>
									</div>
									<div class="portrait2">
										<img src="/escaperpg/images/ambria/loganbarthelemymini.png">
									</div>
								</div>
								<p>
									Le capitaine ne semble pas s\'émouvoir de votre détresse.
								</p>
								<div class="dialogue">
									<div class="portrait">
										<img src="/escaperpg/images/ambria/sullivanmasonmini.png">
									</div>
									<div class="bulleperso">
										<p>
											Et qu\'est-ce que ça peut me faire, tes histoires ?
										</p>
									</div>
								</div>
								<div class="dialogue">
									<div class="bulleperso2">
										<p>
											Je sais, je sais !<br>
											<br>
											Écoutez, j\'ai quelque chose que vous voulez, vous avez ce que je recherche...
											Ce que je vous demande, c\'est d\'embarquer avec vous, rien de plus. En paiement, je vous offre le contenu de ma bourse. Et la carte.
										</p>
									</div>
									<div class="portrait2">
										<img src="/escaperpg/images/ambria/loganbarthelemymini.png">
									</div>
								</div>
								<p>
									Il se penche un peu plus vers vous, vous regardant droit dans les yeux.
								</p>
								<div class="dialogue">
									<div class="portrait">
										<img src="/escaperpg/images/ambria/sullivanmasonmini.png">
									</div>
									<div class="bulleperso">
										<p>
											Alors dis-moi... Pourquoi je ne te trancherais pas la gorge à l\'instant pour te prendre cette carte ?
										</p>
									</div>
								</div>
								<center>
									<form action="embrouilles" method="post">
										<input type="submit" name="suivant4" value="Suivant.">
									</form>
								</center>
							';
						}
					elseif (isset ($_POST['suite']) OR $_SESSION['taverne'])
						{
							echo'
								<audio src="/escaperpg/sons/ambria/taverne.mp3" autoplay></audio>
								<div class="dialogue">
									<div class="bulleperso2">
										<p>
											Euh je… Laissez-moi juste reprendre un peu mon souffle. J\'ai dû courir pour arriver ici et… bref, je reviendrai vers vous tout à l\'heure.
										</p>
									</div>
									<div class="portrait2">
										<img src="/escaperpg/images/ambria/loganbarthelemymini.png">
									</div>
								</div>
								<div class="dialogue">
									<div class="portrait">
										<img src="/escaperpg/images/ambria/serveuse.png">
									</div>
									<div class="bulleperso">
										<p>
											Pas d\'souci mon chou ! Hésite pas quand tu sauras c\'que tu veux !
										</p>
									</div>
								</div>
								<p>
									Après un clin d\'œil grivois, elle s\'éloigne pour se diriger vers une autre table.
									Vous essayez alors de rassembler vos pensées pour savoir comment vous pouvez faire pour vous sortir de ce mauvais pas.<br>
									<br>
									Les minutes passent sans que la moindre idée ne vous soit venue à l\'esprit quand la silhouette imposante d\'un homme au fort parfum de sel et d\'embrun se dresse devant vous.<br>
									L\'inconnu jette quelque chose qui retombe lourdement sur la table.
								</p>
								<center>
									<form action="taverne" method="post">
										<input type="text" name="objet"><input type="submit" name="suivant" value="Suivant.">
									</form>
								</center>
							';
							if (isset ($_POST['indice']))
								{
									echo'
										<div id="indice">
											Qu\'est-ce que l\'individu vous a dit ?
										</div>
										<center>
											<form action="taverne" method="post">
												<button type="submit" name="indice2" class="boutonindice"></button>
											</form>
										</center>
									';
								}
							elseif (isset ($_POST['indice2']))
								{
									echo'
										<div id="indice">
											Qu\'est-ce que l\'individu vous a dit ?<br>
											C\'est à l\'autre joueur de vous donner le bon mot de passe.
										</div>
										<center>
											<form action="taverne" method="post">
												<button type="submit" name="reponse" class="boutonreponse"></button>
											</form>
										</center>
									';
								}
							elseif (isset ($_POST['reponse']))
								{
									echo'
										<div id="reponse">
											Entrez le mot de passe "c\'est à toi je crois"
										</div>
									';
								}
							else
								{
									echo'
										<center>
											<form action="taverne" method="post">
												<button type="submit" name="indice" class="boutonindice"></button>
											</form>
										</center>
									';
								}
							$_SESSION['taverne'] = true;
						}
					else
						{
							echo'
								<audio src="/escaperpg/sons/ambria/taverne.mp3" autoplay></audio>
								<p>
									Vous parvenez enfin sur les quais de l\'île.<br>
									Rapidement, vous avisez le grand bâtiment dont les fenêtres éclairent l\'air obscur de la nuit et dont des rires chaleureux s\'échappent pour briser le silence.
									Vous resserrez les pans de votre gilet et époussetez votre pantalon avant de vous diriger vers la porte ouverte.<br>
									<br>
									En entrant, vous ressentez aussitôt l\'air chaud de l\'intérieur vous envelopper.<br>
									La taverne est bien remplie ce soir, mais il reste quelques tables de libres.
									Un musicien joue du violon près du comptoir et quelques hommes s\'amusent à danser avec les serveuses.
									Il n\'est pas rare que certains d\'entre eux lorgnent dans les décolletés vertigineux voire donnent des claques sur les fesses rebondies des femmes.<br>
									<br>
									Vous avancez péniblement entre les groupes, vous faufilant jusqu\'à une table dans un coin un peu plus tranquille d\'où vous pourrez observer la salle en quête d\'un groupe qui vous semblera digne de confiance.
								</p>
								<div class="dialogue">
									<div class="portrait">
										<img src="/escaperpg/images/ambria/serveuse.png">
									</div>
									<div class="bulleperso">
										<p>
											Qu\'est-ce qu\'y prendra, l\'gamin ?
										</p>
									</div>
								</div>
								<p>
									Une serveuse s\'est approchée de vous pour prendre votre commande.<br>
									Ne sachant trop quoi lui répondre, vous tentez de retrouver une certaine contenance en tâtant les poches de votre veston
									et constatez avec horreur que vous avez perdu la <span class="mdp2">bourse en cuir</span> que vous avait confiée Louis.<br>
									<br>
									Tâchant de ne pas céder à la panique, vous cherchez quelque chose à lui répondre pour vous débarrasser d\'elle et pouvoir réfléchir à ce que vous allez faire.
								</p>
								<center>
									<form action="taverne" method="post">
										<input type="submit" name="suite" value="Suivant.">
									</form>
								</center>
							';
							$_SESSION['mdp20'] = true;
						}
				?>
			</div>
		</div>
		<div id="load"><div id="loader"></div></div>
		<script src="/escaperpg/scripts/aventures-chargement.js"></script>
		<?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/ambria/logan/includes/footer.php"; ?>
	</body>
</html>
