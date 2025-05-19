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
		<title>Retrouvailles - Le Grenier d'Arthur</title>
	</head>
	
	<body onload="chargement()">
		<?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/header.php"; ?>
		<div id="banniere"><img src="/escaperpg/images/avent/aventmini.png"></div>
		<main>
			<nav>
				<img src="/escaperpg/images/avent/sarah.png">
				<form action="/escaperpg/aventures/avent/cartes.php" target="_blank" rel="noreferrer" method="post"><input type="submit" name="cartes" value="Cartes"></form>
				<a href="/escaperpg/aventures/avent/save/save.php" target="_blank" rel="noreferrer"><input type="submit" name="save" value="SAUVEGARDER"></a>
			</nav>
			<div id="txt">
				<?php
					if (isset ($_POST['suivant']))
						{
							echo'<div id="succespopup">';
							$nouveausucces = '<img src="/escaperpg/images/succes/avent/grandpere.png"><span><u><b>Réunion de famille</b></u><br>Retrouver Grand-Père</span>';
							$scenario = 'avent';
							$description = 'grandpère';
							$cache = 'oui';
							$rarete = 'succesnormal';
							include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/succesadd.php";
							echo'</div>';
							
							echo'
								<p>
									En arrivant sur une grande place, vous remarquez enfin quelqu\'un qui se tient debout, le dos voûté, en train d\'examiner quelque chose que vous n\'arrivez pas à distinguer.<br>
									Vous en approchant, vous reconnaissez… votre grand-père ! Vous courez alors vers lui.<br>
									<br>
									Vous entendant arriver, il se retourne et vous sourit.<br>
									Vous lui sautez dessus alors qu\'il ouvre grand les bras pour vous accueillir et restez quelques instants ainsi, avant qu\'il ne s\'écarte et vous tienne par les épaules, vous regardant droit dans les yeux.<br>
									<br>
									<div class="dialogue">
										<div class="portrait">
											<img src="/escaperpg/images/avent/arthur.png">
										</div>
										<div class="bulleperso">
											<p>
												Sarah ?! Mais comment es-tu arrivée ici ?
											</p>
										</div>
									</div>
								</p>
								<center>
									<form action="retrouvailles" method="post">
										<input type="submit" name="suivant2" value="SUIVANT.">
									</form>
								</center>
							';
						}
					elseif (isset ($_POST['suivant2']))
						{
							echo '
								<p>
									Vous riez de bon cœur et lui racontez vos aventures.<br>
									<br>
									<div class="dialogue">
										<div class="portrait">
											<img src="/escaperpg/images/avent/arthur.png">
										</div>
										<div class="bulleperso">
											<p>
												Tu as réussi à faire fonctionner la machine dans mon atelier ?!<br>
												Ah, je reconnais bien là ma petite fille, je suis tellement fier de toi !
											</p>
										</div>
									</div>
									<br>
									Vous lui demandez alors pourquoi LUI se trouve ici.<br>
									<br>
									<div class="dialogue">
										<div class="portrait">
											<img src="/escaperpg/images/avent/arthur.png">
										</div>
										<div class="bulleperso">
											<p>
												Oh !<br>
												Eh bien, tu vois, il semblerait que le Pôle Nord ait rencontré un problème dernièrement :
												les machines permettant de fabriquer les jouets ne fonctionnent plus et les enclos des rennes sont verrouillés.
												Impossible pour eux d\'en sortir !<br>
												Les lutins ont repris la construction des jouets, mais si rien n\'est fait, ils ne seront pas prêts pour la distribution des cadeaux à temps !<br>
												<br>
												Dans ce genre de situation, ils font tout naturellement appel au mécanicien du Père Noël pour y remédier !
											</p>
										</div>
									</div>
								</p>
								<center>
									<form action="retrouvailles" method="post">
										<input type="submit" name="mecano" value="LE MÉCANICIEN ?">
									</form>
								</center>
							';
						}
					elseif (isset ($_POST['mecano']))
						{
							echo '
								<p>
									<div class="dialogue">
										<div class="portrait">
											<img src="/escaperpg/images/avent/arthur.png">
										</div>
										<div class="bulleperso">
											<p>
												Eh oui ! Assieds-toi, il va falloir que je te raconte toute l\'histoire…
											</p>
										</div>
									</div>
									<br>
									Il vous emmène sur un banc fait en biscuits et gâteaux qui se révèle très confortable.
									Vous avez l\'impression d\'être assise sur un nuage !<br>
									<br>
									<div class="dialogue">
										<div class="portrait">
											<img src="/escaperpg/images/avent/arthur.png">
										</div>
										<div class="bulleperso">
											<p>
												Il y a des années maintenant, le Père Noël a décidé de fabriquer une gigantesque machine pour créer de nouveaux jouets pour les enfants.<br>
												Ne sachant pas comment s\'y prendre, il a fait le tour du monde à la recherche d\'un mécanicien suffisamment doué pour l\'aider.<br>
												<br>
												C\'est en se baladant dans notre petite ville qu\'il a appris l\'existence d\'un inventeur talentueux correspondant parfaitement à ce qu\'il recherchait.<br>
												Cet homme, c\'était Samuel Latour, mon arrière-arrière-arrière grand-père !<br>
												<br>
												Ils ont alors construit la machine et les Latour, notre famille, sont devenus les mécaniciens officiels du Pôle Nord !
												À chaque fois qu\'il y a un problème avec la machine, ils font appel à nous pour réparer ça.
											</p>
										</div>
									</div>
									<br>
									Vous n\'en croyez pas vos oreilles !
									Ainsi votre famille est, depuis des générations, liée au Père Noël ?!<br>
									Mais pourquoi n\'en avez-vous jamais entendu parler avant ?
								</p>
								<center>
									<form action="retrouvailles" method="post">
										<input type="submit" name="suivant3" value="SUIVANT.">
									</form>
								</center>
							';
						}
					elseif (isset ($_POST['suivant3']))
						{
							echo '
								<p>
									<div class="dialogue">
										<div class="portrait">
											<img src="/escaperpg/images/avent/arthur.png">
										</div>
										<div class="bulleperso">
											<p>
												Mais… J\'ai quelques ennuis avec le cas présent…<br>
												<br>
												Tu sais, je commence à me faire vieux, mes yeux ne sont plus ce qu\'ils étaient et je n\'arrive pas à lire les instructions du Livre.
												Je ne peux donc pas réparer la machine !<br>
												Normalement, ton père aurait dû reprendre le flambeau, mais petit, on lui a dit que le Père Noël n\'existait pas et il n\'a plus jamais cru à la magie.
												Sans elle, impossible pour lui de venir ici...<br>
												J\'ai bien essayé de lui dire que tout ceci était bien réel, il n\'a jamais rien voulu entendre.
											</p>
										</div>
									</div>
									<br>
									Votre grand-père semble soudain bien triste. <br>
									Vous comprenez maintenant la raison de la dispute entre votre père et lui.
								</p>
								<center>
									<form action="retrouvailles" method="post">
										<input type="submit" name="aider" value="PROPOSER de l\'aider.">
									</form>
								</center>
							';
						}
					elseif (isset ($_POST['aider']))
						{
							echo '
								<p>
									<div class="dialogue">
										<div class="portrait">
											<img src="/escaperpg/images/avent/arthur.png">
										</div>
										<div class="bulleperso">
											<p>
												Oh ma chérie, c\'est très gentil, mais le Livre est écrit dans la langue des lutins, tu ne pourrais pas la comprendre sans le traducteur !<br>
												... Et j\'ai bien peur de l\'avoir oublié chez moi…
											</p>
										</div>
									</div>
									<br>
									Un traducteur ?
									Ne serait-ce pas le papier avec les motifs étranges qui était accroché sur le drap devant la machine ?<br>
									<br>
									Vous le sortez de votre poche et le tendez à votre grand-père.
								</p>
								<center>
									<form action="retrouvailles" method="post">
										<input type="submit" name="montrer" value="LUI MONTRER.">
									</form>
								</center>
							';
						}
					elseif (isset ($_POST['montrer']))
						{
							echo '
								<audio src="/escaperpg/sons/avent/papier.mp3" autoplay></audio>
								<p>
									<div class="dialogue">
										<div class="portrait">
											<img src="/escaperpg/images/avent/arthur.png">
										</div>
										<div class="bulleperso">
											<p>
												Mais ?! C\'est bien ça ! C\'est le traducteur, nous sommes sauvés !<br>
												<br>
												Vite, viens par là, je vais te montrer le Livre !
											</p>
										</div>
									</div>
									<br>
									Il vous prend par la main et vous ramène au centre de la place où il vous montre le Livre.
									Un grand livre lumineux posé sur un piédestal en bois à quelques mètres du sol, auquel on accède via une plateforme.<br>
									<br>
									Vous gravissez l\'escalier et jetez un coup d\'œil au Livre.
								</p>
								<center>
									<form action="retrouvailles" method="post">
										<input type="submit" name="suivant4" value="SUIVANT.">
									</form>
								</center>
							';
						}
					elseif (isset ($_POST['suivant4']))
						{
							echo '
								<p>
									<div id="enigmelieu">
										<img src="/escaperpg/images/avent/livre.png">
									</div>
									<br>
									Sur les pages s\'étendent des lignes de symboles que vous ne parvenez pas à comprendre.
									Heureusement, vous avez avec vous le tableau permettant de traduire la langue des lutins.<br>
									<br>
									Les instructions semblent indiquer qu\'il faut vous munir de quelque chose en particulier, mais de quoi s\'agit-il ?
								</p>
								<center>
									<form action="retrouvailles" method="post">
										<input type="text" name="traduire"> <input type="submit" name="translate" value="TRADUIRE.">
									</form>
									<br>
									<form action="retrouvailles" method="post">
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
										<img src="/escaperpg/images/avent/livre.png">
									</div>
									<br>
									Sur les pages s\'étendent des lignes de symboles que vous ne parvenez pas à comprendre.
									Heureusement, vous avez avec vous le tableau permettant de traduire la langue des lutins.<br>
									<br>
									Les instructions semblent indiquer qu\'il faut vous munir de quelque chose en particulier, mais de quoi s\'agit-il ?
								</p>
								<center>
									<span class="indice">Utilisez le dialecte des lutins trouvés chez votre grand-père pour traduire l\'instruction.
									Avez-vous remarqué le nombre de cases ?</span><br>
									<br>
									<form action="retrouvailles" method="post">
										<input type="text" name="traduire"> <input type="submit" name="translate" value="TRADUIRE.">
									</form>
									<br>
									<form action="retrouvailles" method="post">
										<button type="submit" name="indiceretrouvailles2" class="boutonindice"></button>
									</form>
								</center>
							';
						}
					elseif (isset ($_POST['indiceretrouvailles2']))
						{
							echo '
								<p>
									<div id="enigmelieu">
										<img src="/escaperpg/images/avent/livre.png">
									</div>
									<br>
									Sur les pages s\'étendent des lignes de symboles que vous ne parvenez pas à comprendre.
									Heureusement, vous avez avec vous le tableau permettant de traduire la langue des lutins.<br>
									<br>
									Les instructions semblent indiquer qu\'il faut vous munir de quelque chose en particulier, mais de quoi s\'agit-il ?
								</p>
								<center>
									<span class="indice">Utilisez le dialecte des lutins trouvés chez votre grand-père pour traduire l\'instruction.
									Avez-vous remarqué le nombre de cases ?<br>
									Chaque case correspond à une lettre de notre alphabet. La première ligne vous donne les lettres A, B, C, D, E, F et G et ainsi de suite.</span><br>
									<br>
									<form action="retrouvailles" method="post">
										<input type="text" name="traduire"> <input type="submit" name="translate" value="TRADUIRE.">
									</form>
									<br>
									<form action="retrouvailles" method="post">
										<button type="submit" name="reponse" class="boutonindice"></button>
									</form>
								</center>
							';
						}
					elseif (isset ($_POST['reponser']))
						{
							echo '
								<p>
									<div id="enigmelieu">
										<img src="/escaperpg/images/avent/livre.png">
									</div>
									<br>
									Sur les pages s\'étendent des lignes de symboles que vous ne parvenez pas à comprendre.
									Heureusement, vous avez avec vous le tableau permettant de traduire la langue des lutins.<br>
									<br>
									Les instructions semblent indiquer qu\'il faut vous munir de quelque chose en particulier, mais de quoi s\'agit-il ?
								</p>
								<center>
									<span class="reponse">L\'objet dont vous avez besoin est un sapence.</span><br>
									<br>
									<form action="retrouvailles" method="post">
										<input type="text" name="traduire"> <input type="submit" name="translate" value="TRADUIRE.">
									</form>
								</center>
							';
						}
					elseif (isset ($_POST['translate']))
						{
							switch (str_replace($search, $replace, stripslashes($_POST['traduire'])))
								{
									case "sapence":
										echo'
											<audio src="/escaperpg/sons/avent/fouille.mp3" autoplay></audio>
											<p>
												Vous vous tournez vers votre grand-père et lui demandez ce qu\'est un sapence.
												Il sourit et fouille dans une pile d\'objets avant d\'en sortir une sorte de bocal transparent à l\'intérieur duquel vous distinguez un liquide violet.
											</p>
											<center>
												<form action="reparations" method="post">
													<input type="submit" name="suivant5" value="SUIVANT.">
												</form>
											</center>
										';
										break;
									case "dusapence":
										echo'
											<audio src="/escaperpg/sons/avent/fouille.mp3" autoplay></audio>
											<p>
												Vous vous tournez vers votre grand-père et lui demandez ce qu\'est un sapence.
												Il sourit et fouille dans une pile d\'objets avant d\'en sortir une sorte de bocal transparent à l\'intérieur duquel vous distinguez un liquide violet.
											</p>
											<center>
												<form action="reparations" method="post">
													<input type="submit" name="suivant5" value="SUIVANT.">
												</form>
											</center>
										';
										break;
									case "unsapence":
										echo'
											<audio src="/escaperpg/sons/avent/fouille.mp3" autoplay></audio>
											<p>
												Vous vous tournez vers votre grand-père et lui demandez ce qu\'est un sapence.
												Il sourit et fouille dans une pile d\'objets avant d\'en sortir une sorte de bocal transparent à l\'intérieur duquel vous distinguez un liquide violet.
											</p>
											<center>
												<form action="reparations" method="post">
													<input type="submit" name="suivant5" value="SUIVANT.">
												</form>
											</center>
										';
										break;
									case "desapence":
										echo'
											<audio src="/escaperpg/sons/avent/fouille.mp3" autoplay></audio>
											<p>
												Vous vous tournez vers votre grand-père et lui demandez ce qu\'est un sapence.
												Il sourit et fouille dans une pile d\'objets avant d\'en sortir une sorte de bocal transparent à l\'intérieur duquel vous distinguez un liquide violet.
											</p>
											<center>
												<form action="reparations" method="post">
													<input type="submit" name="suivant5" value="SUIVANT.">
												</form>
											</center>
										';
										break;
									case "delasapence":
										echo'
											<audio src="/escaperpg/sons/avent/fouille.mp3" autoplay></audio>
											<p>
												Vous vous tournez vers votre grand-père et lui demandez ce qu\'est un sapence.
												Il sourit et fouille dans une pile d\'objets avant d\'en sortir une sorte de bocal transparent à l\'intérieur duquel vous distinguez un liquide violet.
											</p>
											<center>
												<form action="reparations" method="post">
													<input type="submit" name="suivant5" value="SUIVANT.">
												</form>
											</center>
										';
										break;
									case "lasapence":
										echo'
											<audio src="/escaperpg/sons/avent/fouille.mp3" autoplay></audio>
											<p>
												Vous vous tournez vers votre grand-père et lui demandez ce qu\'est un sapence.
												Il sourit et fouille dans une pile d\'objets avant d\'en sortir une sorte de bocal transparent à l\'intérieur duquel vous distinguez un liquide violet.
											</p>
											<center>
												<form action="reparations" method="post">
													<input type="submit" name="suivant5" value="SUIVANT.">
												</form>
											</center>
										';
										break;
									case "lesapence":
										echo'
											<audio src="/escaperpg/sons/avent/fouille.mp3" autoplay></audio>
											<p>
												Vous vous tournez vers votre grand-père et lui demandez ce qu\'est un sapence.
												Il sourit et fouille dans une pile d\'objets avant d\'en sortir une sorte de bocal transparent à l\'intérieur duquel vous distinguez un liquide violet.
											</p>
											<center>
												<form action="reparations" method="post">
													<input type="submit" name="suivant5" value="SUIVANT.">
												</form>
											</center>
										';
										break;
									case "unesapence":
										echo'
											<audio src="/escaperpg/sons/avent/fouille.mp3" autoplay></audio>
											<p>
												Vous vous tournez vers votre grand-père et lui demandez ce qu\'est un sapence.
												Il sourit et fouille dans une pile d\'objets avant d\'en sortir une sorte de bocal transparent à l\'intérieur duquel vous distinguez un liquide violet.
											</p>
											<center>
												<form action="reparations" method="post">
													<input type="submit" name="suivant5" value="SUIVANT.">
												</form>
											</center>
										';
										break;
									default:
										echo'
											<p>
												<div id="enigmelieu">
													<img src="/escaperpg/images/avent/livre.png">
												</div>
												<br>
												Sur les pages s\'étendent des lignes de symboles que vous ne parvenez pas à comprendre.
												Heureusement, vous avez avec vous le tableau permettant de traduire la langue des lutins.<br>
												<br>
												Les instructions semblent indiquer qu\'il faut vous munir de quelque chose en particulier, mais de quoi s\'agit-il ?
											</p>
											<center>
												<form action="retrouvailles" method="post">
													<input type="text" name="traduire"> <input type="submit" name="translate" value="TRADUIRE.">
												</form>
												<br>
												<form action="retrouvailles" method="post">
													<button type="submit" name="indiceretrouvailles1" class="boutonindice"></button>
												</form>
											</center>
										';
								}
						}
					else
						{
							echo '
								<audio src="/escaperpg/sons/avent/bipboup.mp3" autoplay></audio>
								<p>
									La lumière se fait moins intense et vous permet de remarquer que... vous n\'êtes plus chez votre grand-père !<br>
									<br>
									Devant vous, à perte de vue, s\'étendent des rues bordées de petites maisons aux toits enneigés.
									Les murs semblent être en pain d\'épices et les lampadaires en sucre d\'orge !<br>
									En marchant un peu, vous constatez que toutes ces habitations semblent faites pour des personnes de très petite taille.<br>
									Mais où êtes-vous donc arrivée ?<br>
									<br>
									Ne croisant personne dans les rues, vous continuez votre chemin vers un grand bâtiment très éclairé, au loin.
								</p>
								<center>
									<form action="retrouvailles" method="post">
										<input type="submit" name="suivant" value="SUIVANT.">
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
