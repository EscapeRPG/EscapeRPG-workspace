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
		<title>La Cité Perdue - Le Trésor d'Ambria</title>
	</head>
	
	<body>
		<?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/header.php"; ?>
		<div id="banniere"><img src="/escaperpg/images/ambria/tresorambriamini.png"></div>
		<main>
			<nav>
				<a href="/escaperpg/images/ambria/loganbarthelemymini.png" rel="lightbox[logan]" title="Logan Barthélémy"><img src="/escaperpg/images/ambria/loganbarthelemymini.png"></a>
				<div id="inventairefooter"><input type="submit" onclick="inventaireshow()" value="INVENTAIRE"></div>
				<div id="motsdepasse"><input type="submit" onclick="mdpshow()" value="NOTES"></div>
				<a href="/escaperpg/aventures/ambria/save/save.php" target="_blank" rel="noreferrer"><input type="submit" name="save" value="SAUVEGARDER"></a>
			</nav>
			<div id="txt">
				<?php
					if (isset ($_POST['ecouter']))
						{
							switch (str_replace($search, $replace, stripslashes($_POST['enavant'])))
								{
									case "premiereprime":
										echo'
											<audio src="/escaperpg/sons/ambria/cite.mp3" autoplay></audio>
											<div class="dialogue">
												<div class="portrait">
													<img src="/escaperpg/images/ambria/sullivanmasonmini.png">
												</div>
												<div class="bulleperso">
													<p>
														Allez viens gamin, c\'est l\'heure de toucher ta première prime.
													</p>
												</div>
											</div>
											<p>
												Sentant un torrent d\'émotions vous parcourir le corps, vous ne pouvez vous empêcher de lui sourire et êtes étonné de le voir vous en offrir un léger en retour.
											</p>
											<div class="dialogue">
												<div class="bulleperso2">
													<p>
														<span class="mdp2">Allons-y capitaine</span>.
													</p>
												</div>
												<div class="portrait2">
													<img src="/escaperpg/images/ambria/loganbarthelemymini.png">
												</div>
											</div>
											<p>
												Partant rejoindre les hommes qui se sont précipités vers la ville, vous avancez sur le chemin pavé.
											</p>
											<center>
												<form action="cite" method="post">
													<input type="submit" name="suite" value="Suivant.">
												</form>
											</center>
										';
										$_SESSION['mdp8'] = true;
										break;
									default:
										echo'
											<p>
												Êtes-vous sûr d\'avoir bien compris la réponse de votre compagnon ?
											</p>
											<center>
												<form action="cite" method="post">
													<input type="text" name="enavant"><input type="submit" name="ecouter" value="L\'écouter.">
												</form>
											</center>
										';
								}
						}
					elseif (isset ($_POST['suite']))
						{
							echo'
								<audio src="/escaperpg/sons/ambria/cite.mp3" autoplay></audio>
								<p>
									Avançant entre les bâtiments délabrés et recouverts de végétation, vous vous enfoncez au cœur de la cité.
									Les édifices de pierre sont pour la plupart immenses, vous comptez au moins 4 étages pour chacun d\'eux, parfois plus.
									Richement décorés, vous prenez le temps d\'apprécier les ornements qui figurent sur les façades.
									Bas-reliefs, frises et autres fresques vous offrent un spectacle époustouflant, l\'absence de vie mise à part.<br>
									<br>
									Un grand escalier semble descendre pour vous emmener dans ce qui devait être le centre-ville, où d\'encore plus grosses constructions se font apercevoir.
									Au centre de tout, ce que vous identifiez comme un immense palais pyramidal se dresse sur une place gigantesque.
									Les restes d\'étals et de tentures qui ont survécu aux ravages du temps vous laissent à penser qu\'il s\'agissait d\'une place de marché, du temps où la splendeur des lieux était au plus haut.<br>
									<br>
									Vous descendez les marches et vous vous dirigez vers le bâtiment principal.
									S\'il ne devait y avoir qu\'un endroit où trouver des richesses, vous pariez que c\'est ici que vous les obtiendrez.<br>
									<br>
									Le capitaine fait un signe aux autres restés en retrait.
								</p>
								<div class="dialogue">
									<div class="portrait">
										<img src="/escaperpg/images/ambria/sullivanmasonmini.png">
									</div>
									<div class="bulleperso">
										<p>
											Par ici les gars, on va fouiller cet endroit.
										</p>
									</div>
								</div>
								<p>
									Sortant des maisons en ruines, le reste de l\'équipage se regroupe autour de vous et vous accompagne jusqu\'à l\'imposant édifice.<br>
									Vous remarquez que les façades sont encore plus finement décorées que ce que vous aviez pu voir jusqu\'à présent.
									Des bas-reliefs d\'une bonne dizaine de mètres de haut s\'étalent sur toute la longueur des murs, décrivant un paysage à couper le souffle.
									Juste en-dessous, l\'entrée du palais est couverte par une vaste terrasse soutenue de colonnes ouvragées.
									Entre chacune d\'elles devaient se trouver des statues en or de près de 10 mètres de haut, mais la plupart se sont écroulées avec le temps.
									Il semble cependant en rester une, parfaitement préservée, juste à côté de l\'ouverture menant au cœur du monument.<br>
									<br>
									Vous vous dirigez vers elle.
								</p>
								<center>
									<form action="gardien" method="post">
										<input type="submit" name="palais" value="Observer.">
									</form>
								</center>
							';
						}
					else
						{
							echo'<div id="succespopup">';
							$nouveausucces = '<img src="/escaperpg/images/succes/ambria/ambria.png"><span><u><b>Vestiges du passé</b></u><br>Entrer dans la cité perdue d\'Ambria</span>';
							$scenario = 'ambria';
							$description = 'ambria';
							$cache = 'non';
							$rarete = 'succesnormal';
							include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/succesadd.php";
							echo'</div>';
							
							echo'
								<audio src="/escaperpg/sons/ambria/cite.mp3" autoplay></audio>
								<p>
									L\'immense rempart ouvert, vous vous retrouvez devant une chemin pavé zigzaguant entre les épaisses fougères, au bout duquel vous devinez les hautes tours d\'une cité fabuleuse.
									Les hommes avec vous laissent libre cours à leur joie et vous ne pouvez vous empêcher de la partager avec eux.
									Sullivan et les autres arrivent également, étant passés par un autre accès.<br>
									<br>
									Enfin, la fin de cette aventure vous tend les bras !<br>
									Les édifices au loin ne vous trompent pas : Ambria regorge de richesses. Les toits semblent faits d\'or et reflètent vivement la lumière du soleil, donnant à la scène une atmosphère presque féérique.
									Les façades sont elles aussi recouvertes de dorures et présentent des bas-reliefs compliqués attestant de la prouesse des artisans.<br>
									Cependant, la cité semble déserte et la végétation luxuriante de l\'île y a repris ses droits.<br>
									<br>
									Qu\'a-t-il bien pu se passer pour qu\'une civilisation aussi riche ait pu disparaître ?<br>
									<br>
									Le capitaine se tourne alors vers les hommes.
								</p>
								<div class="dialogue">
									<div class="portrait">
										<img src="/escaperpg/images/ambria/sullivanmasonmini.png">
									</div>
									<div class="bulleperso">
										<p>
											Les gars, vous êtes prêts à mettre la main sur notre butin ?
										</p>
									</div>
								</div>
								<p>
									Dans une explosion de hourras, les hommes se mettent en marche et courent en direction des bâtiments.<br>
									<br>
									Sullivan vous regarde.
								</p>
								<center>
									<form action="cite" method="post">
										<input type="text" name="enavant"><input type="submit" name="ecouter" value="L\'écouter.">
									</form>
								</center>
							';
						}
				?>
			</div>
		</div>
		<div id="load"><div id="loader"></div></div>
		<script src="/escaperpg/scripts/aventures-chargement.js"></script>
		<?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/ambria/logan/includes/footer.php"; ?>
	</body>
</html>
