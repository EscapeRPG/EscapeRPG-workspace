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
		<title>Chenil - Secrets Familiaux</title>
	</head>
	
	<body>
		<?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/header.php"; ?>
		<div id="banniere"><img src="/escaperpg/images/secrets/secretsfamiliauxmini.png" alt="secrets familiaux bannière"></div>
		<main>
			<nav>
				<a href="/escaperpg/images/secrets/inspecteurdeckard.png" rel="lightbox[bastian]" title="inspecteurdeckard"><img src="/escaperpg/images/secrets/inspecteurdeckardmini.png"></a>
				<div id="inventairefooter"><input type="submit" onclick="inventaireshow()" value="INVENTAIRE"></div>
				<div id="motsdepasse"><input type="submit" onclick="mdpshow()" value="NOTES"></div>
				<?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/secrets/includes/navigationmanoir.php"; ?>
				<a href="/escaperpg/aventures/secrets/save/save.php" target="_blank" rel="noreferrer"><input type="submit" name="save" value="SAUVEGARDER"></a>
			</nav>
			<div id="txt">
				<?php
					if ($_SESSION['intrusion'])
						{
							echo '
								<p>
									Vous décidez d\'aller voir les chiens.<br>
									<br>
									À votre arrivée, vous êtes étonné de voir que ceux-ci semblent bien plus calmes que d\'habitude.
									Ils sont calmement allongés au fond de leurs cages.<br>
									Au niveau de l\'entrée de chacune d\'elles se trouve une gamelle presque pleine de viande.
									Vous trouvez un peu étrange que les chiens aient à peine touché à leur <span class="mdp">nourriture</span>.
								</p>
							';
							$_SESSION['mdp16'] = true;
						}
					elseif ($_SESSION['chiensmal'])
						{
							echo '
								<p>
									Vous rejoignez Gaspard dans le chenil.
									Il a ouvert la cage et est accroupi près des chiens, toujours allongés.<br>
									<br>
									Vous les entendez gémir.
									<div class="dialogue">
										<div class="portrait">
											<img src="/escaperpg/images/secrets/gaspard.png" alt="gaspard">
										</div>
										<div class="bulleperso">
											<p>
												Bon sang, ils sont empoisonnés !<br>
												Je ne sais pas si c\'est grave ou non, mais je vais m\'occuper d\'eux.
												Si vous avez un antidote, je vous en serais éternellement reconnaissant.
											</p>
										</div>
									</div>
									Sur ces mots, Gaspard reporte son attention sur les chiens et ne semble pas avoir envie de vous parler.<br>
									<br>
									Vous décidez de repartir.
								</p>
							';
							$_SESSION['intrusion'] = false;
							$_SESSION['chiensmalades'] = false;
							$_SESSION['chiensmal'] = false;
							$_SESSION['chiensemp'] = true;
						}
					elseif ($_SESSION['chiensemp'])
						{
							if (isset ($_POST['antidote']) AND str_replace($search, $replace, stripslashes($_POST['antidote'])) == "analeptique")
								{
									echo'<div id="succespopup">';
									$nouveausucces = '<img src="/escaperpg/images/succes/secrets/chiens.png"><span><u><b>Vétérinaire</b></u><br>Sauver les chiens de l\'empoisonnement !</span>';
									$scenario = 'secrets';
									$description = 'chiens';
									$cache = 'oui';
									$rarete = 'succesgold';
									include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/succesadd.php";
									echo'</div>';
									
									echo '
										<p>
											Vous tendez le flacon à Gaspard qui l\'examine d\'un air soupçonneux, mais il finit par en verser un peu dans la gueule de chacun des chiens.<br>
											Après de longues minutes d\'attente, ils commencent à ouvrir les yeux et leur respiration se fait un peu plus naturelle.<br>
											Il faudra encore un peu de temps pour qu\'ils soient pleinement remis, mais il semble que vous ayez sauvé les chiens !
											Qui sait ce qu\'il se serait passé si vous n\'aviez pas trouvé de remède ?<br>
											<br>
											Gaspard s\'approche de vous, un sourire de gratitude sur le visage.
											<div class="dialogue">
												<div class="portrait">
													<img src="/escaperpg/images/secrets/gaspard.png" alt="gaspard">
												</div>
												<div class="bulleperso">
													<p>
														Merci l\'ami, je vous dois une fière chandelle !<br>
														<br>
														Laissons-les se reposer un peu, ils seront bientôt de nouveau sur pied.<br>
														Suivez-moi, j\'ai quelque chose à vous donner pour vous remercier.
													</p>
												</div>
											</div>
											Gaspard ressort du chenil et se dirige vers sa <span class="lieu">maison</span>.
										</p>
										<center>
											<form action="maisongaspard" method="post">
												<input type="submit" name="suivre" value="Le suivre.">
											</form>
										</center>
									';
									$_SESSION['chiensemp'] = false;
									$_SESSION['antidote'] = false;
									$_SESSION['chienssauves'] = true;
								}
							elseif (isset ($_POST['antidote']))
								{
									echo '
										<p>
											<div class="dialogue">
												<div class="portrait">
													<img src="/escaperpg/images/secrets/gaspard.png" alt="gaspard">
												</div>
												<div class="bulleperso">
													<p>
														J\'ai pas le temps pour ça. Si vous avez quelque chose pour eux je vous écoute, sinon laissez-moi tranquille.
													</p>
												</div>
											</div>
											Il se retourne pour reporter son attention sur les animaux et ne semble plus enclin à discuter avec vous.
										</p>
										<center>
											<form action="chenil" method="post">
												<input type="text" name="antidote"> <input type="submit" name="parler" value="Parler.">
											</form>
										</center>
									';
								}
							else
								{
									echo '
										<p>
											Gaspard est toujours en train de s\'occuper des 4 chiens empoisonnés.<br>
											<br>
											Il ne semble toujours pas enclin à discuter avec vous.
										</p>
										<center>
											<form action="chenil" method="post">
												<input type="text" name="antidote"> <input type="submit" name="parler" value="Parler.">
											</form>
										</center>
									';
								}
						}
					elseif ($_SESSION['chiensmalades'])
						{
							if (isset($_POST['antidote']) AND str_replace($search, $replace, stripslashes($_POST['antidote'])) == "analeptique")
								{
									echo '
										<p>
											Vous tendez le flacon à Gaspard qui l\'examine d\'un air soupçonneux, mais il finit par en verser un peu dans la gueule de chacun des chiens.<br>
											Après de longues minutes d\'attente, ils commencent à ouvrir les yeux et leur respiration se fait un peu plus naturelle.<br>
											Il faudra encore un peu de temps pour qu\'ils soient pleinement remis, mais il semble que vous ayez sauvé les chiens !
											Qui sait ce qu\'il se serait passé si vous n\'aviez pas trouvé de remède ?<br>
											<br>
											Gaspard s\'approche de vous, un sourire de gratitude sur le visage.
											<div class="dialogue">
												<div class="portrait">
													<img src="/escaperpg/images/secrets/gaspard.png" alt="gaspard">
												</div>
												<div class="bulleperso">
													<p>
														Merci l\'ami, je vous dois une fière chandelle !<br>
														<br>
														Laissons-les se reposer un peu, ils seront bientôt de nouveau sur pied.<br>
														Suivez-moi, j\'ai quelque chose à vous donner pour vous remercier.
													</p>
												</div>
											</div>
											Gaspard ressort du chenil et se dirige vers sa <span class="lieu">maison</span>.
										</p>
										<center>
											<form action="maisongaspard" method="post">
												<input type="submit" name="suivre" value="Le suivre.">
											</form>
										</center>
									';
									$_SESSION['chiensmalades'] = false;
									$_SESSION['antidote'] = false;
									$_SESSION['chienssauves'] = true;
								}
							elseif (isset ($_POST['antidote']))
								{
									echo '
										<p>
											<div class="dialogue">
												<div class="portrait">
													<img src="/escaperpg/images/secrets/gaspard.png" alt="gaspard">
												</div>
												<div class="bulleperso">
													<p>
														J\'ai pas le temps pour ça. Si vous avez quelque chose pour eux je vous écoute, sinon laissez-moi tranquille.
													</p>
												</div>
											</div>
											Il se retourne pour reporter son attention sur les animaux et ne semble plus enclin à discuter avec vous.
										</p>
										<center>
											<form action="chenil" method="post">
												<input type="text" name="antidote"> <input type="submit" name="parler" value="Parler.">
											</form>
										</center>
									';
								}
							else
								{
									echo '
										<p>
											Gaspard est en train de s\'occuper des 4 chiens qui semblent mal en point.
											<div class="dialogue">
												<div class="portrait">
													<img src="/escaperpg/images/secrets/gaspard.png" alt="gaspard">
												</div>
												<div class="bulleperso">
													<p>
														Les chiens n\'ont pas l\'air bien aujourd\'hui, je ne sais pas ce qu\'ils ont.
													</p>
												</div>
											</div>
											Il se retourne pour reporter son attention sur les animaux et ne semble plus enclin à discuter avec vous.
										</p>
										<center>
											<form action="chenil" method="post">
												<input type="text" name="antidote"> <input type="submit" name="parler" value="Parler.">
											</form>
										</center>
									';
								}
						}
					elseif ($_SESSION['chienssauves'] OR $_SESSION['chienssauvesfin'])
						{
							echo '
								<p>
									À votre arrivée dans le chenil, les chiens se redressent sur leurs pattes et agitent joyeusement la queue en vous voyant.
								</p>
							';
						}
					else
						{
							echo'
								<p>
									C\'est ici que dorment les 4 <span class="mdp">chiens</span> de garde. 3 dobermans et un rottweiler.
								</p>
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
