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
		<title>Les Portes de la Cité - Le Trésor d'Ambria</title>
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
				<?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/ambria/logan/includes/navigationile.php"; ?>
			</nav>
			<div id="txt">
				<?php
					if (isset ($_POST['boulets']) AND $_POST['1'] == 4 AND $_POST['2'] == 8 AND $_POST['3'] == 6)
						{
							echo'
								<audio src="/escaperpg/sons/ambria/porteciteouvre.mp3" autoplay></audio>
								<p>
									Soudain, dans un vrombissement tonitruant, vous voyez l\'immense porte commencer à pivoter sur son axe.<br>
									<br>
									Les portes de la cité s\'ouvrent à vous !
								</p>
								<center>
									<form action="cite" method="post">
										<input type="submit" name="entrer" value="Entrer.">
									</form>
								</center>
							';
						}
					elseif (isset ($_POST['boulets']))
						{
							echo'
								<audio src="/escaperpg/sons/ambria/cite.mp3" autoplay></audio>
								<p>
									Cela ne semble pas fonctionner.
								</p>
								<form action="portescite" method="post">
									<div id="loganporte">
										<img src="/escaperpg/images/ambria/porte/loganporte.png">
										<input type="text" name="1" class="emplacementboule1" placeholder="0">
										<input type="text" name="2" class="emplacementboule2" placeholder="0">
										<input type="text" name="3" class="emplacementboule3" placeholder="0">
									</div>
									<center>
										<input type="submit" name="boulets" value="Valider.">
									</center>
								</form>
								<p>
									Prenant votre temps, vous étudiez les magnifiques bas-reliefs gravés à même la porte et remarquez que plusieurs cavités circulaires semblent servir à accueillir quelque chose.<br>
									<br>
									Observant autour de vous, vous finissez par trouver une niche renfermant des billes en acier grosses comme le poing.<br>
									À côté de la niche, une plaque en or est gravée de curieux pictogrammes semblant vouloir signifier quelque chose.<br>
									<br>
									Jake vous indique ne pas connaître cette langue, il va donc vous falloir trouver le moyen d\'en comprendre son sens si vous espérez pouvoir continuer.
								</p>
								<center>
									<form action="portescite" method="post">
										<button type="submit" name="indice1" class="boutonindice"></button>
									</form>
								</center>
							';
						}
					elseif (isset ($_POST['porte']) OR $_SESSION['portescite'])
						{
							echo'
								<audio src="/escaperpg/sons/ambria/cite.mp3" autoplay></audio>
								<form action="portescite" method="post">
									<div id="loganporte">
										<img src="/escaperpg/images/ambria/porte/loganporte.png">
										<input type="text" name="1" class="emplacementboule1" placeholder="0">
										<input type="text" name="2" class="emplacementboule2" placeholder="0">
										<input type="text" name="3" class="emplacementboule3" placeholder="0">
									</div>
									<center>
										<input type="submit" name="boulets" value="Valider.">
									</center>
								</form>
								<p>
									Prenant votre temps, vous étudiez les magnifiques bas-reliefs gravés à même la porte et remarquez que plusieurs cavités circulaires semblent servir à accueillir quelque chose.<br>
									<br>
									Observant autour de vous, vous finissez par trouver une niche renfermant des billes en acier grosses comme le poing.<br>
									À côté de la niche, une plaque en or est gravée de curieux pictogrammes semblant vouloir signifier quelque chose.<br>
									<br>
									Jake vous indique ne pas connaître cette langue, il va donc vous falloir trouver le moyen d\'en comprendre son sens si vous espérez pouvoir continuer.
								</p>
							';
							if (isset ($_POST['indice']))
								{
									echo'
										<div id="indice">
											Il existe forcément un endroit sur cette île où vous pourriez trouver un traducteur pour ce dialecte.
										</div>
										<center>
											<form action="portescite" method="post">
												<button type="submit" name="indice2" class="boutonindice"></button>
											</form>
										</center>
									';
								}
							elseif (isset ($_POST['indice2']))
								{
									echo'
										<div id="indice">
											Il existe forcément un endroit sur cette île où vous pourriez trouver un traducteur pour ce dialecte.<br>
											Vous êtes certain d\'avoir remarqué une partie des symboles lorsque vous avez traversé l\'antichambre avec la mousse phosphorescente.
										</div>
										<center>
											<form action="portescite" method="post">
												<button type="submit" name="indice3" class="boutonindice"></button>
											</form>
										</center>
									';
								}
							elseif (isset ($_POST['indice3']))
								{
									echo'
										<div id="indice">
											Il existe forcément un endroit sur cette île où vous pourriez trouver un traducteur pour ce dialecte.<br>
											Vous êtes certain d\'avoir remarqué une partie des symboles lorsque vous avez traversé l\'antichambre avec la mousse phosphorescente.<br>
											Revenez dans les grottes et essayez de trouver le moyen d\'observer correctement la mousse.
										</div>
										<center>
											<form action="portescite" method="post">
												<button type="submit" name="reponse" class="boutonreponse"></button>
											</form>
										</center>
									';
								}
							elseif (isset ($_POST['reponse']))
								{
									echo'
										<div id="reponse">
											Une fois le traducteur obtenu <i>- et avec l\'aide de Sullivan -</i> les messages indiquent :<br>
											"La moitié de huit. Sept plus un. Le double de trois."
										</div>
									';
								}
							else
								{
									echo'
										<center>
											<form action="portescite" method="post">
												<button type="submit" name="indice" class="boutonindice"></button>
											</form>
										</center>
									';
								}
						}
					else
						{
							echo'
								<audio src="/escaperpg/sons/ambria/cite.mp3" autoplay></audio>
								<p>
									Délaissant l\'antichambre derrière vous, vous reprenez le chemin et finissez par apercevoir la lumière caractéristique du soleil, à quelques mètres.<br>
									Pressant le pas, vous débouchez sur une clairière cernée d\'une haute muraille naturelle.<br>
									<br>
									Face à vous se dresse la porte la plus imposante qu\'il vous ait été donné de voir de votre vie.
									À coup sûr, il s\'agit là du portail d\'entrée d\'Ambria !<br>
									<br>
									Sullivan et les autres semblent être non loin, mais une muraille vous sépare. Ils semblent avoir des choses à voir de leur côté également, d\'après ce que vous pouvez entendre.<br>
									<br>
									Vous vous avancez vers elle et ne voyez aucune poignée permettant de l\'ouvrir.
									Tentant de la pousser, celle-ci se révèle bien trop imposante pour que vous ne puissiez y faire quoi que ce soit, même aidé des hommes qui vous accompagnent.<br>
									<br>
									Vous prenez alors un peu de recul pour essayer de voir si quoi que ce soit pourrait vous aider à franchir ce dernier obstacle.
								</p>
								<center>
									<form action="portescite" method="post">
										<input type="submit" name="porte" value="Observer la porte.">
									</form>
								</center>
							';
							$_SESSION['portescite'] = true;
						}
				?>
			</div>
		</div>
		<div id="load"><div id="loader"></div></div>
		<script src="/escaperpg/scripts/aventures-chargement.js"></script>
		<?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/ambria/logan/includes/footer.php"; ?>
	</body>
</html>
