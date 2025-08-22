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
		<div id="banniere"><img src="/escaperpg/images/ambria/tresorambriamini.png" alt="le trésor d'ambria"></div>
		<main>
			<nav>
				<a href="/escaperpg/images/ambria/sullivanmasonmini.png" rel="lightbox[sullivan]" title="Sullivan Mason"><img src="/escaperpg/images/ambria/sullivanmasonmini.png" alt="capitaine sullivan mason"></a>
				<div id="inventairefooter"><input type="submit" value="INVENTAIRE"></div>
				<div id="motsdepasse"><input type="submit" value="NOTES"></div>
				<a href="/escaperpg/aventures/ambria/save/save.php" target="_blank" rel="noreferrer"><input type="submit" name="save" value="SAUVEGARDER"></a>
			</nav>
			<div id="txt">
				<?php
					echo'<div id="succespopup">';
					$nouveausucces = '<img src="/escaperpg/images/succes/ambria/carte.png"><span><u><b>Fin limier</b></u><br>Trouver une piste menant à la carte d\'Ambria</span>';
					$scenario = 'ambria';
					$description = 'carte';
					$cache = 'non';
					$rarete = 'succesnormal';
					include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/succesadd.php";
					echo'</div>';
					
					if (isset ($_POST['suivant']))
						{
							echo'
								<audio src="/escaperpg/sons/ambria/epeegratte.mp3" autoplay></audio>
								<p>
									Vous vous avancez dans l\'encadrure de la porte défoncée. Devant vous se tient un homme relativement âgé brandissant un tison et affichant une expression se voulant sans doute menaçante.
								</p>
								<div class="dialogue">
									<div class="portrait">
										<img src="/escaperpg/images/ambria/louis.png">
									</div>
									<div class="bulleperso">
										<p>
											Je ne sais pas qui vous êtes, ni pourquoi vous êtes là, mais vous ne trouverez rien de valeur ici, partez !
										</p>
									</div>
								</div>
								<p>
									Un sourire carnassier aux lèvres, vous faites quelques pas vers l\'homme, ne prenant même pas la peine de brandir votre sabre devant vous tant ce vieillard ne représente aucune menace.
								</p>
								<div class="dialogue">
									<div class="bulleperso2">
										<p>
											Allons, vieil homme... Vous savez très bien la raison de ma présence. Où est la carte ? Ne testez pas ma patience, je ne suis pas réputé pour être clément.
										</p>
									</div>
									<div class="portrait2">
										<img src="/escaperpg/images/ambria/sullivanmasonmini.png" alt="capitaine sullivan mason">
									</div>
								</div>
								<p>
									Pour marquer vos propos, vous laissez la lame de votre sabre griffer le mur à votre droite alors que vous continuez d\'avancer, confiant. L\'homme devant vous frémit mais se ressaisit vite et semble déterminé.<br>
									<br>
									Votre sourire s\'élargit.
								</p>
								<center>
									<form action="bibliotheque" method="post">
										<input type="submit" name="suivant2" value="Suivant.">
									</form>
								</center>
							';
						}
					elseif (isset ($_POST['suivant2']))
						{
							echo'
								<audio src="/escaperpg/sons/ambria/combatlouis.mp3" autoplay></audio>
								<p>
									Le vieux bibliothécaire s\'élance vers vous en hurlant, le tison brandit.
									Vous vous esquivez presque nonchalamment sur le côté lorsqu\'il arrive à votre niveau et il trébuche en vous dépassant.<br>
									Ne se laissant pas démener, il se redresse et tente une nouvelle attaque, mais vous parez sans le moindre effort.<br>
									Au bout de quelques échanges, vous trouvez une faille et donnez un puissant coup qui lui fait perdre son arme.
									Vous le saisissez brutalement à la gorge et le plaquez contre le mur.
								</p>
								<div class="dialogue">
									<div class="bulleperso2">
										<p>
											Fini de jouer maintenant ! Où est la carte ?!
										</p>
									</div>
									<div class="portrait2">
										<img src="/escaperpg/images/ambria/sullivanmasonmini.png" alt="capitaine sullivan mason">
									</div>
								</div>
								<p>
									Tremblant, Louis tente de bredouiller quelque chose mais ses mots meurent dans sa gorge. Il déglutit péniblement et reprend, une lueur de défi dans le regard.
								</p>
								<div class="dialogue">
									<div class="portrait">
										<img src="/escaperpg/images/ambria/louis.png">
									</div>
									<div class="bulleperso">
										<p>
											C\'est... C\'est trop tard, je n\'ai plus cette carte, vous ne la trouverez jamais ! Vous...
										</p>
									</div>
								</div>
								<p>
									Ses yeux s\'écarquillent avant de se baisser sur son ventre... et la lame de votre sabre qui y est plantée.
									Il redresse la tête, un air d\'incompréhension s\'y peignant, avant que toute vie ne le quitte.<br>
									<br>
									Vous laissez retomber le corps au sol et avisez la porte ouverte menant dans la cour arrière. Quelqu\'un s\'est enfui par là au moment de votre arrivée.
								</p>
								<center>
									<form action="bibliotheque" method="post">
										<input type="submit" name="suivant3" value="Suivant.">
									</form>
								</center>
							';
						}
					elseif (isset ($_POST['inspecter']))
						{
							switch (str_replace($search, $replace, stripslashes($_POST['look'])))
								{
									case "bourseencuir":
										echo'
											<div id="enigme">
												<a href="/escaperpg/images/ambria/bourseencuir.png" rel="lightbox[invent]"><img src="/escaperpg/images/ambria/bourseencuir.png"></a>
											</div>
											<p>
												Vous attrapez la petite bourse en cuir qui se révèle contenir un peu de monnaie.<br>
												La personne qui l\'a laissée tomber va sans doute rencontrer des difficultés si elle désire partir de l\'île sans cet argent.
											</p>
											<center>
												<form action="bibliotheque" method="post">
													<input type="submit" name="prendre" value="La prendre.">
												</form>
											</center>
										';
										$_SESSION['ambriabibliotheque'] = true;
										$_SESSION['bourse'] = true;
										break;
									default:
										echo'
											<p>
												Cela ne semble pas être ça.<br>
												<br>
												De quoi peut-il bien s\'agir ?
											</p>
											<center>
												<form action="bibliotheque" method="post">
													<input list="notesListe" name="look"><input type="submit" name="inspecter" value="Inspecter.">
												</form>
												<form action="bibliotheque" method="post">
													<button type="submit" name="indice1" class="boutonindice"></button>
												</form>
											</center>
										';
										$_SESSION['ambriabibliotheque'] = true;
								}
						}
					elseif (isset ($_POST['prendre']))
						{
							echo'
								<script src="/escaperpg/scripts/inventaireadd.js"></script>
								<p>
									Vous glissez la petite bourse dans l\'une des poches de votre veste et retournez sur vos pas.<br>
									<br>
									Revenu à l\'intérieur de la bibliothèque, vous décidez de profiter de la situation pour forcer celui ou celle possédant la carte à réagir.<br>
									<br>
									Vous renversez les étagères contenant les quelques reliures et parchemins entassés puis attrapez la bougie qui était posée sur la table.
									Juste avant de partir, vous lancez cette dernière sur les tas de papiers qui ne tardent pas à s\'embraser, propageant l\'incendie à une vitesse folle.<br>
									<br>
									À peine quelques minutes après, alors que vous marchez dans les rues pavées, vous entendez les habitants au loin qui crient pour annoncer la catastrophe que vous avez causée.<br>
									Vous souriez, sachant qu\'il ne vous faudra pas longtemps avant de trouver quelqu\'un cherchant désespérément un moyen de fuir l\'île malgré son manque d\'argent.<br>
									La seule manière pour le faire serait de monter à bord d\'un navire, et quel meilleur endroit que la taverne pour trouver un équipage ?<br>
									<br>
									Vous poussez la porte du bâtiment de Don et entrez.
								</p>
								<center>
									<form action="taverne" method="post">
										<input type="submit" name="retour" value="Entrer.">
									</form>
								</center>
							';
						}
					elseif (isset ($_POST['suivant3']) OR $_SESSION['bourseparterre'])
						{
							echo'
								<p>
									Vous vous dirigez vers la porte arrière et inspectez l\'obscurité.
									Cette sortie s\'ouvre sur une ruelle qui donne sur d\'autres parties de la rue, vous ne pourrez malheureusement pas retrouver la personne qui s\'est enfuie et qui doit être loin maintenant.<br>
									<br>
									Juste avant que vous ne vous apprêtiez à rebrousser chemin, votre regard s\'accroche sur une chose tombée au sol.
									Vous vous penchez pour le ramasser et l\'inspecter de plus près.<br>
									<br>
									De quoi peut-il bien s\'agir ?
								</p>
								<center>
									<form action="bibliotheque" method="post">
										<input list="notesListe" name="look"><input type="submit" name="inspecter" value="Inspecter.">
									</form>
								</center>
							';
							$_SESSION['bourseparterre'] = true;
							if (isset ($_POST['indice']))
								{
									echo'
										<div id="indice">
											Il doit bien y avoir un moyen de savoir ce qui se trouve sur le sol.
										</div>
										<center>
											<form action="bibliotheque" method="post">
												<button type="submit" name="indice2" class="boutonindice"></button>
											</form>
										</center>
									';
								}
							elseif (isset ($_POST['indice2']))
								{
									echo'
										<div id="indice">
											Il doit bien y avoir un moyen de savoir ce qui se trouve sur le sol.<br>
											Peut-être que ce n\'est pas vous qui avez la réponse ?
										</div>
										<center>
											<form action="bibliotheque" method="post">
												<button type="submit" name="reponse" class="boutonreponse"></button>
											</form>
										</center>
									';
								}
							elseif (isset ($_POST['reponse']))
								{
									echo'
										<div class="reponse">
											Demandez au joueur qui incarne Logan quel est le mot de passe de l\'objet qu\'il a laissé tomber en s\'enfuyant.
										</div>
									';
								}
							else
								{
									echo'
										<center>
											<form action="bibliotheque" method="post">
												<button type="submit" name="indice" class="boutonindice"></button>
											</form>
										</center>
									';
								}
						}
					else
						{
							echo'
								<audio src="/escaperpg/sons/ambria/portefracassee.mp3" autoplay></audio>
								<p>
									Le temps d\'obtenir toutes les informations dont vous aviez besoin, la nuit est tombée lorsque vous arrivez devant la porte de la bibliothèque.<br>
									<br>
									La lumière d\'une bougie filtre à travers les carreaux des fenêtres, vous indiquant que quelqu\'un se trouve à l\'intérieur.<br>
									Un sourire de satisfaction s\'étirant sur votre visage, vous tentez d\'ouvrir la porte mais celle-ci est fermée à clé.
									Vous donnez alors quelques coups dessus et sortez votre lame de son fourreau.<br>
									<br>
									Il vous semble entendre le murmure de voix précipitées à l\'intérieur.
									Quelque chose ne tourne pas rond et vous décidez d\'en avoir le cœur net.
									Vous vous mettez à donner de grands coups de pieds sur la porte pour la faire céder.<br>
									L\'écho des voix à l\'intérieur se fait plus fort mais, avec le vacarme que vous produisez, vous ne parvenez pas à comprendre ce qu\'il se dit.
									La porte étant sur le point de céder, vous prenez une dernière fois de l\'élan et donnez un formidable coup de talon qui fracasse le loquet et vous révèle l\'intérieur du bâtiment.<br>
									Juste avant que vous n\'entriez, vous avez le temps d\'entendre quelqu\'un crier à une autre personne de prendre la fuite en passant par derrière, puis le bruit de pas précipités s\'éloignant.									
								</p>
								<center>
									<form action="bibliotheque" method="post">
										<input type="submit" name="suivant" value="Suivant.">
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
