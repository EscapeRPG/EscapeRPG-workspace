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
		<title>La Bibliothèque - Le Trésor d'Ambria</title>
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
					if (isset ($_POST['suivant']))
						{
							echo'
								<audio src="/escaperpg/sons/ambria/louis.mp3" autoplay></audio>
								<p>
									Il commence à s\'éloigner et vous lui emboîtez le pas,
									le suivant jusqu\'à l\'arrière boutique où se trouvent deux tables en bois massif sur lesquelles sont posées des piles de papiers bourrés d\'écriture que vous ne savez pas déchiffrer.<br>
									Louis s\'installe sur un tabouret et repousse tout un pan du bazar éparpillé devant lui.
									Il récupère alors quelque chose à ses pieds et le pose sur la table.<br>
									<br>
									Il s\'agit d\'un petit coffret en bois très simple qu\'il ouvre à l\'aide d\'une petite clé tirée d\'une poche de son veston.<br>
									Tournant l\'objet vers vous, il vous invite à y jeter un œil.
									Vous approchez et apercevez un petit carré de couleur écru à l\'intérieur.
									Vous comprenez rapidement qu\'il s\'agit d\'un papier soigneusement plié,
									trouvant curieux qu\'une telle chose soit gardée dans un coffret verrouillé et que votre ami ait créé tout un mystère en vous donnant ce rendez-vous aujourd\'hui.
								</p>
								<div class="dialogue">
									<div class="portrait">
										<img src="/escaperpg/images/ambria/louis.png">
									</div>
									<div class="bulleperso">
										<p>
											Prends-le et ouvre-le. Tu as commencé à apprendre à lire il y a quelques mois maintenant et tu devrais être en mesure de comprendre ce qui est marqué dessus.
										</p>
									</div>
								</div>
								<center>
									<form action="bibliotheque" method="post">
										<input type="submit" name="suivant2" value="Regarder.">
									</form>
								</center>
							';
						}
					elseif (isset ($_POST['suivant2']))
						{
							echo'
								<script src="/escaperpg/scripts/inventaireadd.js"></script>
								<p>
									Vous obéissez et attrapez le morceau de papier.<br>
									<br>
									Le dépliant, vous plissez les yeux en découvrant l\'écriture compacte qui y est étalée et commencez à lire, lentement.
									Vous comprenez assez rapidement qu\'il s\'agit-là d\'instructions à suivre pour trouver quelque chose, sans vraiment parvenir à savoir quoi.<br>
									<br>
									Vous relevez les yeux vers Louis.
								</p>
								<div class="dialogue">
									<div class="portrait">
										<img src="/escaperpg/images/ambria/louis.png">
									</div>
									<div class="bulleperso">
										<p>
											Ce parchemin décrit un chemin menant vers une cité fabuleuse : Ambria !<br>
											De nombreux récits ont évoqué son existence mais elle est restée dans les esprits comme un mythe, une légende. Tout comme c\'est le cas pour l\'Atlantide.
										</p>
									</div>
								</div>
								<p>
									Il se redresse un peu sur son tabouret, figeant son regard dans le vôtre.
								</p>
								<div class="dialogue">
									<div class="portrait">
										<img src="/escaperpg/images/ambria/louis.png">
									</div>
									<div class="bulleperso">
										<p>
											Mais ce parchemin... c\'est la preuve que cette cité existe bel et bien ! Et il indique comment s\'y rendre !<br>
											<br>
											Tu imagines ?! Prendre la mer et voguer sur les eaux en direction de cette terre légendaire !
										</p>
									</div>
								</div>
								<p>
									Son regard se perd un instant dans une rêverie, avant de reporter son attention sur vous.
								</p>
								<div class="dialogue">
									<div class="portrait">
										<img src="/escaperpg/images/ambria/louis.png">
									</div>
									<div class="bulleperso">
										<p>
											Malheureusement, il y a forcément tout un tas de gens qui seraient prêts à tout pour mettre la main sur ces instructions et j\'ai peur que quelqu\'un ne soit après moi.<br>
											Je n\'ai plus l\'âge de prendre la mer et cette aventure n\'est pas pour moi.<br>
											<br>
											Toi, en revanche...
										</p>
									</div>
								</div>
								<p>
									Il vous gratifie d\'un petit sourire sincère, presque paternel.
								</p>
								<center>
									<form action="bibliotheque" method="post">
										<input type="submit" name="suivant3" value="Suivant.">
									</form>
								</center>
							';
							$_SESSION['parchemin'] = true;
						}
					elseif (isset ($_POST['suivant3']))
						{
							echo'
								<audio src="/escaperpg/sons/ambria/frappeporte.mp3" autoplay></audio>
								<div class="dialogue">
									<div class="portrait">
										<img src="/escaperpg/images/ambria/louis.png">
									</div>
									<div class="bulleperso">
										<p>
											Tu as tout ce qu\'il faut pour entreprendre une telle épopée !<br /<
											<br>
											Prends garde à toi cependant, j\'ai entendu dire par un marin arrivé il y a quelques jours qu\'un navire aux voiles noires se dirigeait vers notre île et qu\'il serait bientôt là.
											Tu vas devoir agir et partir au plus vite.
										</p>
									</div>
								</div>
								<div class="dialogue">
									<div class="bulleperso2">
										<p>
											Mais, je...
										</p>
									</div>
									<div class="portrait2">
										<img src="/escaperpg/images/ambria/loganbarthelemymini.png">
									</div>
								</div>
								<div class="dialogue">
									<div class="portrait">
										<img src="/escaperpg/images/ambria/louis.png">
									</div>
									<div class="bulleperso">
										<p>
											Je sais, je sais.
											Tu n\'as pas la possibilité de te préparer et je te prends au dépourvu.<br>
											Crois-moi mon garçon, j\'en suis navré, mais je sais que tu en as les moyens ! Je vois en toi un grand potentiel.
										</p>
									</div>
								</div>
								<div class="dialogue">
									<div class="bulleperso2">
										<p>
											Je n\'ai pas les moyens de partir !
											Pour ça, il me faudrait un bateau et tout un équipage pour m\'y emmener.
											Je n\'ai jamais pris la mer, je ne saurais même pas comment m\'y prendre pour suivre ces instructions !
										</p>
									</div>
									<div class="portrait2">
										<img src="/escaperpg/images/ambria/loganbarthelemymini.png">
									</div>
								</div>
								<p>
									Louis passe la main dans le col ouvert de sa chemise et en ressort une petite bourse en cuir.
								</p>
								<div class="dialogue">
									<div class="portrait">
										<img src="/escaperpg/images/ambria/louis.png">
									</div>
									<div class="bulleperso">
										<p>
											Tiens, prends ça.<br>
											Il y a là-dedans de quoi payer un capitaine pour embarquer sur un navire.
											Fais attention à qui tu parles, en revanche. N\'évoque pas la carte, sans quoi tu finiras la gorge tranchée dans une ruelle.
										</p>
									</div>
								</div>
								<p>
									Vous pâlissez un peu et déglutissez avec peine à cette évocation.
								</p>
								<div class="dialogue">
									<div class="portrait">
										<img src="/escaperpg/images/ambria/louis.png">
									</div>
									<div class="bulleperso">
										<p>
											Cache le parchemin sous ton gilet. Si personne ne sait que tu l\'as, tu ne risques rien.
										</p>
									</div>
								</div>
								<p>
									Il regarde autour de lui, comme attiré par un bruit au dehors.
								</p>
								<div class="dialogue">
									<div class="portrait">
										<img src="/escaperpg/images/ambria/louis.png">
									</div>
									<div class="bulleperso">
										<p>
											La nuit est déjà tombée. Nous avons déjà pris trop de temps. Tu vas...
										</p>
									</div>
								</div>
								<p>
									Des coups retentissent à la porte d\'entrée.<br>
									Pas le genre de coup qu\'on donne pour s\'annoncer, mais plutôt du genre que quelqu\'un donnerait pour forcer la porte. Cela recommence, plus fort.
								</p>
								<div class="dialogue">
									<div class="portrait">
										<img src="/escaperpg/images/ambria/louis.png">
									</div>
									<div class="bulleperso">
										<p>
											Il ne faut pas traîner ici. Prends la bourse et le parchemin et fuis !<br>
											Passe par ici et cours jusqu\'à la taverne ! Tu y trouveras des types à engager pour partir !<br>
											<br>
											File !
										</p>
									</div>
								</div>
								<p>
									Il ouvre une porte derrière lui donnant sur une ruelle.
									La nuit et la situation donnent à la scène quelque chose d\'inquiétant.
									Vous n\'avez cependant pas le temps de rétorquer quoi que ce soit que Louis vous pousse dehors et referme derrière lui.<br>
									Depuis l\'intérieur, vous entendez alors un énorme fracas : celui de la porte d\'entrée qui vient de céder, laissant entrer l\'intrus.<br>
									Sans plus réfléchir, vous prenez vos jambes à votre cou et vous fuyez dans les ténèbres.
								</p>
								<center>
									<form action="fuite" method="post">
										<input type="submit" name="fuite" value="Fuir.">
									</form>
								</center>
							';
						}
					else
						{
							echo'
								<audio src="/escaperpg/sons/ambria/ouvreporte.mp3" autoplay></audio>
								<p>
									Vous approchez la main de la poignée et enclenchez le mécanisme.
									Le petit déclic se fait entendre et vous poussez lentement la porte, ouvrant sur les étagères remplies de livres et de parchemins dans une ambiance feutrée que vous connaissez bien, depuis le temps que vous venez ici.<br>
									<br>
									Pourtant, aujourd\'hui, vous sentez que quelque chose est différent. La pièce semble plus calme, moins chaleureuse.
									L\'odeur de papier est moins présente, atténuée par celle de la poussière.<br>
									De petites chandelles éclairent le fond de la pièce et laissent l\'entrée dans une sorte de pénombre dans laquelle vous faites quelques pas hésitants.
								</p>
								<div class="dialogue">
									<div class="bulleperso2">
										<p>
											Il y a quelqu\'un ?<br>
											<br>
											Louis ?
										</p>
									</div>
									<div class="portrait2">
										<img src="/escaperpg/images/ambria/loganbarthelemymini.png">
									</div>
								</div>
								<p>
									Un bruit, du mouvement, quelque chose qui tombe au sol et un juron étouffé proviennent du fond, avant qu\'une forme ne passe devant la lueur des bougies.<br>
									Vous reconnaissez alors la silhouette voûtée du bibliothécaire qui s\'approche de vous.
								</p>
								<div class="dialogue">
									<div class="portrait">
										<img src="/escaperpg/images/ambria/louis.png">
									</div>
									<div class="bulleperso">
										<p>
											Ah, Logan, te voilà ! Désolé je n\'avais pas vu l\'heure, beaucoup de travail.
										</p>
									</div>
								</div>
								<p>
									Il fait un vague geste de la main, comme pour chasser d\'inutiles explications sur ses affaires, puis se tourne à moitié en direction de la pièce du fond.
								</p>
								<div class="dialogue">
									<div class="portrait">
										<img src="/escaperpg/images/ambria/louis.png">
									</div>
									<div class="bulleperso">
										<p>
											Ferme la porte à clé et viens par ici, veux-tu ? J\'ai quelque chose à te confier.
										</p>
									</div>
								</div>
								<center>
									<form action="bibliotheque" method="post">
										<input type="submit" name="suivant" value="Le suivre.">
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
