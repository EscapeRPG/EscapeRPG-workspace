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
		<title>Quartier des Équipages - Le Trésor d'Ambria</title>
	</head>
	
	<body>
		<?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/header.php"; ?>
		<div id="banniere"><img src="/escaperpg/images/ambria/tresorambriamini.png"></div>
		<main>
			<nav>
				<a href="/escaperpg/images/ambria/sullivanmasonmini.png" rel="lightbox[sullivan]" title="Sullivan Mason"><img src="/escaperpg/images/ambria/sullivanmasonmini.png"></a>
				<div id="inventairefooter"><input type="submit" value="INVENTAIRE"></div>
				<div id="motsdepasse"><input type="submit" value="NOTES"></div>
				<a href="/escaperpg/aventures/ambria/save/save.php" target="_blank" rel="noreferrer"><input type="submit" name="save" value="SAUVEGARDER"></a>
				<?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/ambria/sullivan/includes/navigationbateau.php"; ?>
			</nav>
			<div id="txt">
				<?php
					if (isset ($_POST['demander']))
						{
							switch (str_replace($search, $replace, stripslashes($_POST['ask'])))
								{
									case "logan":
										echo '
											<audio src="/escaperpg/sons/ambria/quartierequipages.mp3" autoplay></audio>
											<div class="dialogue">
												<div class="portrait">
													<img src="/escaperpg/images/ambria/jean.png">
												</div>
												<div class="bulleperso">
													<p>
														Oh, oui, le p\'tit gars qu\'on a ramené de l\'île.
														J\'l\'ai vu passer un peu plus tôt qui allait au <span class="lieu">mess</span> avec quelques uns des aut\' gars.<br>
														P\'t-être qu\'ils y sont encore, mais j\'vous avoue avoir roupillé un peu entre temps, donc ils sont p\'t-être ressortis.
													</p>
												</div>
											</div>
											<center>
												<form action="quartierdesequipages" method="post">
													<input type="text" name="ask"><input type="submit" name="demander" value="Demander.">
												</form>
											</center>
										';
										break;
									case "jake":
										echo'
											<audio src="/escaperpg/sons/ambria/quartierequipages.mp3" autoplay></audio>
											<div class="dialogue">
												<div class="portrait">
													<img src="/escaperpg/images/ambria/jean.png">
												</div>
												<div class="bulleperso">
													<p>
														Oh, il est juste là, regardez.
													</p>
												</div>
											</div>
											<p>
												Il vous désigne l\'une des couchettes dans laquelle semble être en train de dormir un homme.
												Vous vous en approchez alors et reconnaissez effectivement Jake.
											</p>
											<div class="dialogue">
												<div class="portrait">
													<img src="/escaperpg/images/ambria/jean.png">
												</div>
												<div class="bulleperso">
													<p>
														Il s\'est installé là y a même pas dix minutes, j\'dirais.
													</p>
												</div>
											</div>
											<p>
												Regardant rapidement autour, vous constatez que Logan n\'est pas présent et décidez de réveiller l\'homme devant vous.
											</p>
											<center>
												<form action="quartierdesequipages" method="post">
													<input type="submit" name="reveiller" value="Le secouer.">
												</form>
											</center>
										';
										$_SESSION['ambrialoganlocalise'] = true;
										break;
									default:
										echo'
											<div class="dialogue">
												<div class="portrait">
													<img src="/escaperpg/images/ambria/jean.png">
												</div>
												<div class="bulleperso">
													<p>
														Euh... Non désolé Capitaine, je peux pas vous aider avec ça.
													</p>
												</div>
											</div>
											<center>
												<form action="quartierdesequipages" method="post">
													<input type="text" name="ask"><input type="submit" name="demander" value="Demander.">
												</form>
											</center>
										';
								}
						}
					elseif (isset ($_POST['reveiller']))
						{
							echo '
								<audio src="/escaperpg/sons/ambria/reveiljake.mp3" autoplay></audio>
								<p>
									Tendant le bras, vous saisissez Jake par l\'épaule et le secouez sans ménagement.<br>
									Grognant un peu, celui-ci se tourne vers vous en ouvrant les yeux avec paresse.
								</p>
								<div class="dialogue">
									<div class="portrait">
										<img src="/escaperpg/images/ambria/jake.png">
									</div>
									<div class="bulleperso">
										<p>
											Eh, qu\'est-ce que c\'est encore que ce bor... Oh, Capitaine !
											Pardon, je savais pas que c\'était vous. Qu\'est-ce que je peux faire pour vous ?
										</p>
									</div>
								</div>
								<div class="dialogue">
									<div class="bulleperso2">
										<p>
											Le petit. Logan.<br>
											Tu sais où je peux le trouver ?
										</p>
									</div>
									<div class="portrait2">
										<img src="/escaperpg/images/ambria/sullivanmasonmini.png">
									</div>
								</div>
								<p>
									Jake marque une légère pause avant de répondre :
								</p>
								<div class="dialogue">
									<div class="portrait">
										<img src="/escaperpg/images/ambria/jake.png">
									</div>
									<div class="bulleperso">
										<p>
											Euh, oui bien sûr.
											Il est à la <span class="lieu">cale</span> avec des gars.
										</p>
									</div>
								</div>
								<p>
									Vous froncez les sourcils et Jake s\'empresse d\'ajouter :
								</p>
								<div class="dialogue">
									<div class="portrait">
										<img src="/escaperpg/images/ambria/jake.png">
									</div>
									<div class="bulleperso">
										<p>
											Oh non ! Vous inquiétez pas, ils lui veulent rien de mal, ils l\'ont juste amené là-bas pour une partie de dés.
										</p>
									</div>
								</div>
								<p>
									Vous grommelez un "merci", agacé d\'avoir dû traverser le bateau en entier pour mettre la main sur Logan, puis partez en direction de la <span class="lieu">cale</span>.
								</p>
							';
						}
					else
						{
							echo '
								<audio src="/escaperpg/sons/ambria/quartierequipages.mp3" autoplay></audio>
								<p>
									Le quartier des équipages est une partie du pont inférieur où sont installés les branles permettant de se reposer.<br>
									Vous avancez entre les couches et les ronflements, observant les visages des matelots endormis à la recherche de Logan, mais il ne semble pas être là.<br>
									<br>
									Un marin, occupé à grignoter un biscuit, vous interpelle en chuchotant. Vous reconnaissez Jean, le charpentier.
								</p>
								<div class="dialogue">
									<div class="portrait">
										<img src="/escaperpg/images/ambria/jean.png">
									</div>
									<div class="bulleperso">
										<p>
											Capitaine ?<br>
											Qu\'est-ce que vous faites là ? Je peux faire quelque chose pour vous ?
										</p>
									</div>
								</div>
								<center>
									<form action="quartierdesequipages" method="post">
										<input type="text" name="ask"><input type="submit" name="demander" value="Demander.">
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
