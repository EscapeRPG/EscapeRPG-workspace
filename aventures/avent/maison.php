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
	   
		<link rel="stylesheet" href="/escaperpg/aventures/avent/css/style.css">
		<meta charset="utf-8">
		<title>Devant la Maison - Le Grenier d'Arthur</title>
	</head>
	
	<body onload="chargement()">
		<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/header.php"; ?>
		<div id="banniere"><img src="/escaperpg/images/avent/aventmini.png"></div>
		<div id="bloc_page">
			<nav>
				<img src="/escaperpg/images/avent/sarah.png">
				<form action="/escaperpg/aventures/avent/cartes.php" target="_blank" rel="noreferrer" method="post"><input type="submit" name="cartes" value="Cartes"></form>
				<a href="/escaperpg/aventures/avent/save/save.php" target="_blank" rel="noreferrer"><input type="submit" name="save" value="SAUVEGARDER"></a>
			</nav>
			<div id="txt">
				<?php
					if (isset ($_POST['bisous']))
						{
							echo '
								<audio src="/escaperpg/sons/avent/tirercarte.mp3" autoplay></audio>
								<p>
									Vous êtes devant la porte et avez sonné, mais voilà déjà plusieurs longues minutes que vous attendez sans obtenir de réponse.
									Arthur est peut-être tout simplement parti se balader ou faire des courses pour votre venue ?<br>
									Votre père étant déjà reparti, vous ne savez pas quoi faire et décidez de voir si les clés ne sont pas quelque part.<br>
									<br>
									<center>
										<span class="important">Retournez la carte numéro 1.
									</center>
								</p>
								<center>
									<form action="maison.php" method="post">
										<input type="submit" name="suivant2" value="suivant.">
									</form>
								</center>
							';
						}
					elseif (isset ($_POST['suivant2']))
						{
							echo '
								<audio src="/escaperpg/sons/avent/cles.mp3" autoplay></audio>
								<p>
									Vous commencez par vérifier si la porte est bien fermée à clé, ce qui est le cas.<br>
									Vous allez ensuite inspecter le pot de fleurs sous la fenêtre, au cas où les clés auraient été rangées là, mais non.<br>
									Ne sachant trop quoi faire, vous regardez au travers de la fenêtre de la cuisine, en plein milieu du rez-de-chaussée, mais la pièce est vide.<br>
									Vous prenez un peu de recul et observez la fenêtre de la salle de bain, juste au-dessus, puis celle de la chambre, sur la gauche. Personne.<br>
									Vous essayez alors de regarder si vous percevez du mouvement au niveau de la fenêtre ronde du grenier, mais elle est trop haute pour vous.<br>
									Amusée, vous remarquez alors le petit oiseau perché sur la cheminée.<br>
									Soudain, prise d\'une sorte de révélation, vous soulevez le paillasson devant la porte et trouvez un trousseau de clé !<br>
									<br>
									Le trousseau comporte cinq clés, laquelle est la bonne ?<br>
									<br>
									<br>
									<br>
									<div id="enigmelieu">
										<img src="/escaperpg/images/avent/jeucles.png">
										<div id="cle1">
											<form action="maison.php" method="post">
												<button type="submit" name="1cle">
													<img src="/escaperpg/images/avent/cle1.png" onmouseover="this.src=\'/escaperpg/images/avent/cle1hover.png\'" onmouseout="this.src=\'/escaperpg/images/avent/cle1.png\'">
												</button>
											</form>
										</div>
										<div id="cle2">
											<form action="maison.php" method="post">
												<button type="submit" name="2cle">
													<img src="/escaperpg/images/avent/cle2.png" onmouseover="this.src=\'/escaperpg/images/avent/cle2hover.png\'" onmouseout="this.src=\'/escaperpg/images/avent/cle2.png\'">
												</button>
											</form>
										</div>
										<div id="cle3">
											<form action="maison.php" method="post">
												<button type="submit" name="3cle">
													<img src="/escaperpg/images/avent/cle3.png" onmouseover="this.src=\'/escaperpg/images/avent/cle3hover.png\'" onmouseout="this.src=\'/escaperpg/images/avent/cle3.png\'">
												</button>
											</form>
										</div>
										<div id="cle4">
											<form action="maison.php" method="post">
												<button type="submit" name="4cle">
													<img src="/escaperpg/images/avent/cle4.png" onmouseover="this.src=\'/escaperpg/images/avent/cle4hover.png\'" onmouseout="this.src=\'/escaperpg/images/avent/cle4.png\'">
												</button>
											</form>
										</div>
										<div id="cle5">
											<form action="maison.php" method="post">
												<button type="submit" name="5cle">
													<img src="/escaperpg/images/avent/cle5.png" onmouseover="this.src=\'/escaperpg/images/avent/cle5hover.png\'" onmouseout="this.src=\'/escaperpg/images/avent/cle5.png\'">
												</button>
											</form>
										</div>
									</div>
								</p>
								<center>
									<form action="maison.php" method="post">
										<button type="submit" name="indice" class="boutonindice"></button>
									</form>
								</center>
							';
						}
					elseif (isset($_POST['1cle']))
						{
							echo '
								<audio src="/escaperpg/sons/avent/ouvertureporte.mp3" autoplay></audio>
								<p>
									La clé vous permet d\'ouvrir la porte de la maison.<br>
									<br>
									À l\'intérieur, vous appelez votre grand-père mais n\'obtenez une nouvelle fois aucune réponse.<br>
									Inquiète, vous commencez à faire le tour de la maison à sa recherche.
								</p>
								<center>
									<form action="maison.php" method="post">
										<input type="submit" name="tour" value="FAIRE LE TOUR.">
									</form>
								</center>
							';
						}
					elseif (isset($_POST['2cle']) OR isset($_POST['3cle']) OR isset($_POST['4cle']) OR isset($_POST['5cle']))
						{
							echo '
								<p>
									Cette clé ne semble pas être la bonne.<br>
									<br>
									Vous avez vérifié la porte d\'entrée.<br>
									Vous avez ensuite inspecté le pot de fleurs sous la fenêtre, puis avez regardé au travers de la fenêtre de la cuisine au milieu du rez-de-chaussée,
									celle de la salle de bain, juste au-dessus et celle de la chambre, sur la gauche.<br>
									Vous avez ensuite essayé de regarder la fenêtre ronde du grenier avant de voir un oiseau perché sur la cheminée.<br>
									Enfin, vous avez trouvé le trousseau de clés juste à vos pieds, sous le paillasson.<br>
									<br>
									Le trousseau comporte cinq clés, laquelle est la bonne ?
									<br>
									<div id="enigmelieu">
										<img src="/escaperpg/images/avent/jeucles.png">
										<div id="cle1">
											<form action="maison.php" method="post">
												<button type="submit" name="1cle">
													<img src="/escaperpg/images/avent/cle1.png" onmouseover="this.src=\'/escaperpg/images/avent/cle1hover.png\'" onmouseout="this.src=\'/escaperpg/images/avent/cle1.png\'">
												</button>
											</form>
										</div>
										<div id="cle2">
											<form action="maison.php" method="post">
												<button type="submit" name="2cle">
													<img src="/escaperpg/images/avent/cle2.png" onmouseover="this.src=\'/escaperpg/images/avent/cle2hover.png\'" onmouseout="this.src=\'/escaperpg/images/avent/cle2.png\'">
												</button>
											</form>
										</div>
										<div id="cle3">
											<form action="maison.php" method="post">
												<button type="submit" name="3cle">
													<img src="/escaperpg/images/avent/cle3.png" onmouseover="this.src=\'/escaperpg/images/avent/cle3hover.png\'" onmouseout="this.src=\'/escaperpg/images/avent/cle3.png\'">
												</button>
											</form>
										</div>
										<div id="cle4">
											<form action="maison.php" method="post">
												<button type="submit" name="4cle">
													<img src="/escaperpg/images/avent/cle4.png" onmouseover="this.src=\'/escaperpg/images/avent/cle4hover.png\'" onmouseout="this.src=\'/escaperpg/images/avent/cle4.png\'">
												</button>
											</form>
										</div>
										<div id="cle5">
											<form action="maison.php" method="post">
												<button type="submit" name="5cle">
													<img src="/escaperpg/images/avent/cle5.png" onmouseover="this.src=\'/escaperpg/images/avent/cle5hover.png\'" onmouseout="this.src=\'/escaperpg/images/avent/cle5.png\'">
												</button>
											</form>
										</div>
									</div>
								</p>
								<center>
									<form action="maison.php" method="post">
										<button type="submit" name="indicemaison1" class="boutonindice"></button>
									</form>
								</center>
							';
						}
					elseif (isset ($_POST['tour']))
						{
							echo '
								<p>
									Vous parcourez les différentes salles de la maison, mais aucune trace de lui.<br>
									Il n\'en reste plus qu\'une à explorer : le grenier.
									Après réflexion, vous vous dites qu\'il pourrait bien s\'y trouver car c\'est dans cette pièce qu\'il a installé son atelier, l\'endroit où il construit des tas de choses.
									Il n\'est pas rare qu\'il s\'y endorme à force de travailler toute la nuit et cela pourrait expliquer la raison de son silence.<br>
									<br>
									Vous montez les marches menant au grenier.
								</p>
								<center>
									<form action="grenier.php" method="post">
										<input type="submit" name="monter" value="MONTER.">
									</form>
								</center>
							';
						}
					elseif (isset ($_POST['indice']))
						{
							echo '
								<p>
									Vous êtes devant la porte et avez sonné, mais voilà déjà plusieurs longues minutes que vous attendez sans obtenir de réponse.
									Arthur est peut-être tout simplement parti se balader ou faire des courses pour votre venue ?<br>
									Votre père étant déjà reparti, vous ne savez pas quoi faire et décidez de voir si les clés ne sont pas quelque part.<br>
									<br>
									Vous commencez par vérifier si la porte est bien fermée à clé, ce qui est le cas.<br>
									Vous allez ensuite inspecter le pot de fleurs sous la fenêtre, au cas où les clés auraient été rangées là, mais non.<br>
									Ne sachant trop quoi faire, vous regardez au travers de la fenêtre de la cuisine, en plein milieu du rez-de-chaussée, mais la pièce est vide.<br>
									Vous prenez un peu de recul et observez la fenêtre de la salle de bain, juste au-dessus, puis celle de la chambre, sur la gauche. Personne.<br>
									Vous essayez alors de regarder si vous percevez du mouvement au niveau de la fenêtre ronde du grenier, mais elle est trop haute pour vous.<br>
									Amusée, vous remarquez alors le petit oiseau perché sur la cheminée.<br>
									Soudain, prise d\'une sorte de révélation, vous soulevez le paillasson devant la porte et trouvez un trousseau de clé !<br>
									<br>
									Le trousseau comporte cinq clés, laquelle est la bonne ?
									<br>
									<div id="enigmelieu">
										<img src="/escaperpg/images/avent/jeucles.png">
										<div id="cle1">
											<form action="maison.php" method="post">
												<button type="submit" name="1cle">
													<img src="/escaperpg/images/avent/cle1.png" onmouseover="this.src=\'/escaperpg/images/avent/cle1hover.png\'" onmouseout="this.src=\'/escaperpg/images/avent/cle1.png\'">
												</button>
											</form>
										</div>
										<div id="cle2">
											<form action="maison.php" method="post">
												<button type="submit" name="2cle">
													<img src="/escaperpg/images/avent/cle2.png" onmouseover="this.src=\'/escaperpg/images/avent/cle2hover.png\'" onmouseout="this.src=\'/escaperpg/images/avent/cle2.png\'">
												</button>
											</form>
										</div>
										<div id="cle3">
											<form action="maison.php" method="post">
												<button type="submit" name="3cle">
													<img src="/escaperpg/images/avent/cle3.png" onmouseover="this.src=\'/escaperpg/images/avent/cle3hover.png\'" onmouseout="this.src=\'/escaperpg/images/avent/cle3.png\'">
												</button>
											</form>
										</div>
										<div id="cle4">
											<form action="maison.php" method="post">
												<button type="submit" name="4cle">
													<img src="/escaperpg/images/avent/cle4.png" onmouseover="this.src=\'/escaperpg/images/avent/cle4hover.png\'" onmouseout="this.src=\'/escaperpg/images/avent/cle4.png\'">
												</button>
											</form>
										</div>
										<div id="cle5">
											<form action="maison.php" method="post">
												<button type="submit" name="5cle">
													<img src="/escaperpg/images/avent/cle5.png" onmouseover="this.src=\'/escaperpg/images/avent/cle5hover.png\'" onmouseout="this.src=\'/escaperpg/images/avent/cle5.png\'">
												</button>
											</form>
										</div>
									</div>
								</p>
								<center>
									<span class="indice">Prenez et observez bien la carte 1, il y a sans doute un indice dessus.</span><br>
									<br>
									<form action="maison.php" method="post">
										<button type="submit" name="indicemaison2" class="boutonindice"></button>
									</form>
								</center>
							';
						}
					elseif (isset ($_POST['indicemaison2']))
						{
							echo '
								<p>
									Vous êtes devant la porte et avez sonné, mais voilà déjà plusieurs longues minutes que vous attendez sans obtenir de réponse.
									Arthur est peut-être tout simplement parti se balader ou faire des courses pour votre venue ?<br>
									Votre père étant déjà reparti, vous ne savez pas quoi faire et décidez de voir si les clés ne sont pas quelque part.<br>
									<br>
									Vous commencez par vérifier si la porte est bien fermée à clé, ce qui est le cas.<br>
									Vous allez ensuite inspecter le pot de fleurs sous la fenêtre, au cas où les clés auraient été rangées là, mais non.<br>
									Ne sachant trop quoi faire, vous regardez au travers de la fenêtre de la cuisine, en plein milieu du rez-de-chaussée, mais la pièce est vide.<br>
									Vous prenez un peu de recul et observez la fenêtre de la salle de bain, juste au-dessus, puis celle de la chambre, sur la gauche. Personne.<br>
									Vous essayez alors de regarder si vous percevez du mouvement au niveau de la fenêtre ronde du grenier, mais elle est trop haute pour vous.<br>
									Amusée, vous remarquez alors le petit oiseau perché sur la cheminée.<br>
									Soudain, prise d\'une sorte de révélation, vous soulevez le paillasson devant la porte et trouvez un trousseau de clé !<br>
									<br>
									Le trousseau comporte cinq clés, laquelle est la bonne ?
									<br>
									<div id="enigmelieu">
										<img src="/escaperpg/images/avent/jeucles.png">
										<div id="cle1">
											<form action="maison.php" method="post">
												<button type="submit" name="1cle">
													<img src="/escaperpg/images/avent/cle1.png" onmouseover="this.src=\'/escaperpg/images/avent/cle1hover.png\'" onmouseout="this.src=\'/escaperpg/images/avent/cle1.png\'">
												</button>
											</form>
										</div>
										<div id="cle2">
											<form action="maison.php" method="post">
												<button type="submit" name="2cle">
													<img src="/escaperpg/images/avent/cle2.png" onmouseover="this.src=\'/escaperpg/images/avent/cle2hover.png\'" onmouseout="this.src=\'/escaperpg/images/avent/cle2.png\'">
												</button>
											</form>
										</div>
										<div id="cle3">
											<form action="maison.php" method="post">
												<button type="submit" name="3cle">
													<img src="/escaperpg/images/avent/cle3.png" onmouseover="this.src=\'/escaperpg/images/avent/cle3hover.png\'" onmouseout="this.src=\'/escaperpg/images/avent/cle3.png\'">
												</button>
											</form>
										</div>
										<div id="cle4">
											<form action="maison.php" method="post">
												<button type="submit" name="4cle">
													<img src="/escaperpg/images/avent/cle4.png" onmouseover="this.src=\'/escaperpg/images/avent/cle4hover.png\'" onmouseout="this.src=\'/escaperpg/images/avent/cle4.png\'">
												</button>
											</form>
										</div>
										<div id="cle5">
											<form action="maison.php" method="post">
												<button type="submit" name="5cle">
													<img src="/escaperpg/images/avent/cle5.png" onmouseover="this.src=\'/escaperpg/images/avent/cle5hover.png\'" onmouseout="this.src=\'/escaperpg/images/avent/cle5.png\'">
												</button>
											</form>
										</div>
									</div>
								</p>
								<center>
									<span class="indice">Prenez et observez bien la carte 1, il y a sans doute un indice dessus.<br>
									Essayez de suivre le chemin effectué par Sarah, une forme devrait se dessiner.</span><br>
									<br>
									<form action="maison.php" method="post">
										<button type="submit" name="reponse" class="boutonreponse"></button>
									</form>
								</center>
							';
						}
					elseif (isset ($_POST['reponse']))
						{
							echo '
								<p>
									Vous êtes devant la porte et avez sonné, mais voilà déjà plusieurs longues minutes que vous attendez sans obtenir de réponse.
									Arthur est peut-être tout simplement parti se balader ou faire des courses pour votre venue ?<br>
									Votre père étant déjà reparti, vous ne savez pas quoi faire et décidez de voir si les clés ne sont pas quelque part.<br>
									<br>
									Vous commencez par vérifier si la porte est bien fermée à clé, ce qui est le cas.<br>
									Vous allez ensuite inspecter le pot de fleurs sous la fenêtre, au cas où les clés auraient été rangées là, mais non.<br>
									Ne sachant trop quoi faire, vous regardez au travers de la fenêtre de la cuisine, en plein milieu du rez-de-chaussée, mais la pièce est vide.<br>
									Vous prenez un peu de recul et observez la fenêtre de la salle de bain, juste au-dessus, puis celle de la chambre, sur la gauche. Personne.<br>
									Vous essayez alors de regarder si vous percevez du mouvement au niveau de la fenêtre ronde du grenier, mais elle est trop haute pour vous.<br>
									Amusée, vous remarquez alors le petit oiseau perché sur la cheminée.<br>
									Soudain, prise d\'une sorte de révélation, vous soulevez le paillasson devant la porte et trouvez un trousseau de clé !<br>
									<br>
									Le trousseau comporte cinq clés, laquelle est la bonne ?
									<br>
									<div id="enigmelieu">
										<img src="/escaperpg/images/avent/jeucles.png">
										<div id="cle1">
											<form action="maison.php" method="post">
												<button type="submit" name="1cle">
													<img src="/escaperpg/images/avent/cle1.png" onmouseover="this.src=\'/escaperpg/images/avent/cle1hover.png\'" onmouseout="this.src=\'/escaperpg/images/avent/cle1.png\'">
												</button>
											</form>
										</div>
										<div id="cle2">
											<form action="maison.php" method="post">
												<button type="submit" name="2cle">
													<img src="/escaperpg/images/avent/cle2.png" onmouseover="this.src=\'/escaperpg/images/avent/cle2hover.png\'" onmouseout="this.src=\'/escaperpg/images/avent/cle2.png\'">
												</button>
											</form>
										</div>
										<div id="cle3">
											<form action="maison.php" method="post">
												<button type="submit" name="3cle">
													<img src="/escaperpg/images/avent/cle3.png" onmouseover="this.src=\'/escaperpg/images/avent/cle3hover.png\'" onmouseout="this.src=\'/escaperpg/images/avent/cle3.png\'">
												</button>
											</form>
										</div>
										<div id="cle4">
											<form action="maison.php" method="post">
												<button type="submit" name="4cle">
													<img src="/escaperpg/images/avent/cle4.png" onmouseover="this.src=\'/escaperpg/images/avent/cle4hover.png\'" onmouseout="this.src=\'/escaperpg/images/avent/cle4.png\'">
												</button>
											</form>
										</div>
										<div id="cle5">
											<form action="maison.php" method="post">
												<button type="submit" name="5cle">
													<img src="/escaperpg/images/avent/cle5.png" onmouseover="this.src=\'/escaperpg/images/avent/cle5hover.png\'" onmouseout="this.src=\'/escaperpg/images/avent/cle5.png\'">
												</button>
											</form>
										</div>
									</div>
								</p>
								<center>
									<span class="reponse">Cliquez sur la clé en bas à gauche.</span><br>
								</center>
							';
						}
					else
						{
							echo '
								<audio src="/escaperpg/sons/avent/voiturestop.mp3" autoplay></audio>
								<p>
									La voiture s\'arrête devant la petite maison où vit Arthur.<br>
									Vous embrassez votre père et ouvrez la portière pour sortir.<br>
									<br>
									<div class="dialogue">
										<div class="portrait">
											<img src="/escaperpg/images/avent/pere.png">
										</div>
										<div class="bulleperso">
											<p>
												À vendredi, bisous Sarah !
											</p>
										</div>
									</div>
								</p>
								<center>
									<form action="maison.php" method="post">
										<input type="submit" name="bisous" value="BISOUS PAPA !">
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