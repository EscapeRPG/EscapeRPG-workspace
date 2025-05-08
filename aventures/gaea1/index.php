<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/entete.php"; ?>
<!DOCTYPE html>
<html lang="fr">
	<head>
		<script type="text/javascript" src="/escaperpg/lightbox/js/prototype.js"></script>
		<script type="text/javascript" src="/escaperpg/lightbox/js/scriptaculous.js?load=effects,builder"></script>
		<script type="text/javascript" src="/escaperpg/lightbox/js/lightbox.js"></script>
		<link rel="stylesheet" href="/escaperpg/lightbox/css/lightbox.css" type="text/css" media="screen">
		<link rel="stylesheet" href="/escaperpg/aventures/gaea1/stylegaea.css">
		<meta charset="utf-8">
		<title>Station GAEA-1</title>
	</head>

	<body onload="chargement()">
		<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/header.php"; ?>

		<div id="banniere"><img src="/escaperpg/images/gaea1/gaea1mini.png" alt="gaea 1 bannière"></div>

		<div id="bloc_page">
			<?php if (isset($_POST['new'])): ?>
				<div id="succespopup">
					<?php
						$nouveausucces = '<img src="/escaperpg/images/succes/general/debut.png"><span><u><b>Se lancer dans l\'aventure</b></u><br>Commencer une aventure pour la première fois</span>';
						$scenario = 'general';
						$description = 'début';
						$cache = 'non';
						$rarete = 'succesnormal';
						include_once $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/succesadd.php";
						$nouveausucces = '<img src="/escaperpg/images/succes/gaea1/debut.png"><span><u><b>Dérive spatiale</b></u><br>Lancer l\'aventure pour la première fois</span>';
						$scenario = 'gaea1';
						$description = 'début';
						$cache = 'non';
						$rarete = 'succesnormal';
						include_once $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/succesadd.php";
					?>
				</div>

				<div id="txt">
					<div class="dialogue">
						<div id="marv"><img src="/escaperpg/images/gaea1/marv.png" alt="dialogue marv"></div>

						<div id="bullemarv">
							<p>
								<i><span style="font-size: x-small">Bip...</span> <span style="font-size: small">Bip...</span> Bip.
								<span style="font-size: x-large">BIP !!!</span></i><br><br>
								Oh, bonjour !<br>
								Je suis le <i>Module d'Assistance Robotique - modèle V</i>, ou plus simplement <i>M.A.R-V</i>,
								l'intelligence artificielle attribuée au vaisseau d'exploration <i>SEEKER</i>.
								Je serai votre compagnon de bord pour l'aventure qui suit.<br><br>
								Afin de continuer, il va falloir créer votre personnage. Commençons déjà par son apparence, à quoi voulez-vous ressembler ?
							</p>
						</div>
					</div>

					<div id="avatar-wrap">
						<img src="/escaperpg/images/gaea1/avatar/fond.png">
						<div id="avatar">
							<img src="/escaperpg/images/gaea1/avatar/cheveuxbackend1-1.png" id="cheveuxbackendimg">
							<img src="/escaperpg/images/gaea1/avatar/visage11.png" id="visageimg">
							<img src="/escaperpg/images/gaea1/avatar/bouche1-1.png" id="boucheimg">
							<img src="/escaperpg/images/gaea1/avatar/yeux1-1.png" id="yeuximg">
							<img src="/escaperpg/images/gaea1/avatar/nez11.png" id="nezimg">
							<img src="/escaperpg/images/gaea1/avatar/cheveuxback1-1.png" id="cheveuxbackimg">
							<img src="/escaperpg/images/gaea1/avatar/pilosite1-1.png" id="pilositeimg">
							<img src="/escaperpg/images/gaea1/avatar/oreilles11.png" id="oreillesimg">
							<img src="/escaperpg/images/gaea1/avatar/sourcils1.png" id="sourcilsimg">
							<img src="/escaperpg/images/gaea1/avatar/accessoire1.png" id="accessoireimg">
							<img src="/escaperpg/images/gaea1/avatar/cheveux1-1.png" id="cheveuximg">
						</div>
					</div>

					<div id="avatarform">
						<table class="createavatar">
							<tr>
								<td class="titreavatar">Visage</td>
								<td><button onclick="rvisage()"><img src="/escaperpg/images/gaea1/gauche.png"></button></td>
								<td>
									<span id="visagecount">1</span> / 10<br>
									<br>
									<button style="background:#d09c71;" onclick="colorblanc()"></button>
									<button style="background:#cd9948;" onclick="colorasien()"></button>
									<button style="background:#984e2d;" onclick="colorindien()"></button>
									<button style="background:#793f2b;" onclick="colormetisse()"></button>
									<button style="background:#883434;" onclick="colorred()"></button>
									<button style="background:#492d29;" onclick="colornoir()"></button>
								</td>
								<td><button onclick="visage()"><img src="/escaperpg/images/gaea1/droite.png"></button></td>
							</tr>

							<tr>
								<td class="titreavatar">Cheveux</td>
								<td><button onclick="rcheveux()"><img src="/escaperpg/images/gaea1/gauche.png"></button></td>
								<td>
									<span id="cheveuxcount">1</span> / 16<br>
									<br>
									<button style="background:black;" onclick="cheveuxnoirs()"></button>
									<button style="background:grey;" onclick="cheveuxgris()"></button>
									<button style="background:white;" onclick="cheveuxblancs()"></button>
									<button style="background:red;" onclick="cheveuxrouges()"></button>
									<button style="background:brown;" onclick="cheveuxbruns()"></button>
									<button style="background:chocolate;" onclick="cheveuxchatains()"></button>
									<button style="background:orange;" onclick="cheveuxroux()"></button>
									<button style="background:yellow;" onclick="cheveuxblonds()"></button>
									<button style="background:green;" onclick="cheveuxverts()"></button>
									<button style="background:blue;" onclick="cheveuxbleus()"></button>
									<button style="background:purple;" onclick="cheveuxviolets()"></button>
									<button style="background:hotpink;" onclick="cheveuxroses()"></button>
								</td>
								<td><button onclick="cheveux()"><img src="/escaperpg/images/gaea1/droite.png"></button></td>
							</tr>

							<tr>
								<td class="titreavatar">Sourcils</td>
								<td><button onclick="rsourcils()"><img src="/escaperpg/images/gaea1/gauche.png"></button></td>
								<td><span id="sourcilscount">1</span> / 14</td>
								<td><button onclick="sourcils()"><img src="/escaperpg/images/gaea1/droite.png"></button></td>
							</tr>

							<tr>
								<td class="titreavatar">Yeux</td>
								<td><button onclick="ryeux()"><img src="/escaperpg/images/gaea1/gauche.png"></button></td>
								<td>
									<span id="yeuxcount">1</span> / 20<br>
									<br>
									<button style="background:black;" onclick="yeuxnoirs()"></button>
									<button style="background:grey;" onclick="yeuxgris()"></button>
									<button style="background:white;" onclick="yeuxblancs()"></button>
									<button style="background:red;" onclick="yeuxrouges()"></button>
									<button style="background:brown;" onclick="yeuxbruns()"></button>
									<button style="background:chocolate;" onclick="yeuxchatains()"></button>
									<button style="background:orange;" onclick="yeuxroux()"></button>
									<button style="background:yellow;" onclick="yeuxblonds()"></button>
									<button style="background:green;" onclick="yeuxverts()"></button>
									<button style="background:blue;" onclick="yeuxbleus()"></button>
									<button style="background:purple;" onclick="yeuxviolets()"></button>
									<button style="background:hotpink;" onclick="yeuxroses()"></button>
								</td>
								<td><button onclick="yeux()"><img src="/escaperpg/images/gaea1/droite.png"></button></td>
							</tr>

							<tr>
								<td class="titreavatar">Oreilles</td>
								<td><button onclick="roreilles()"><img src="/escaperpg/images/gaea1/gauche.png"></button></td>
								<td><span id="oreillescount">1</span> / 10</td>
								<td><button onclick="oreilles()"><img src="/escaperpg/images/gaea1/droite.png"></button></td>
							</tr>

							<tr>
								<td class="titreavatar">Nez</td>
								<td><button onclick="rnez()"><img src="/escaperpg/images/gaea1/gauche.png"></button></td>
								<td><span id="nezcount">1</span> / 10</td>
								<td><button onclick="nez()"><img src="/escaperpg/images/gaea1/droite.png"></button></td>
							</tr>

							<tr>
								<td class="titreavatar">Bouche</td>
								<td><button onclick="rbouche()"><img src="/escaperpg/images/gaea1/gauche.png"></button></td>
								<td>
									<span id="bouchecount">1</span> / 15<br>
									<br>
									<button style="background:linear-gradient(135deg, rgba(255,255,255,0.2) 45%, red 45% 55%, rgba(255,255,255,0.2) 55% 100%); border:1px solid black;" onclick="bouchenormale()"></button>
									<button style="background:black;" onclick="bouchenoire()"></button>
									<button style="background:grey;" onclick="bouchegrise()"></button>
									<button style="background:white;" onclick="boucheblanche()"></button>
									<button style="background:red;" onclick="boucherouge()"></button>
									<button style="background:brown;" onclick="bouchebrune()"></button>
									<button style="background:orange;" onclick="boucheorange()"></button>
									<button style="background:yellow;" onclick="bouchejaune()"></button>
									<button style="background:green;" onclick="boucheverte()"></button>
									<button style="background:blue;" onclick="bouchebleue()"></button>
									<button style="background:purple;" onclick="boucheviolette()"></button>
									<button style="background:hotpink;" onclick="boucherose()"></button>
								</td>
								<td><button onclick="bouche()"><img src="/escaperpg/images/gaea1/droite.png"></button></td>
							</tr>

							<tr>
								<td class="titreavatar">Pilosité</td>
								<td><button onclick="rpilosite()"><img src="/escaperpg/images/gaea1/gauche.png"></button></td>
								<td>
									<span id="pilositecount">1</span> / 17<br>
									<br>
									<button style="background:black;" onclick="pilositenoirs()"></button>
									<button style="background:grey;" onclick="pilositegris()"></button>
									<button style="background:white;" onclick="pilositeblancs()"></button>
									<button style="background:red;" onclick="pilositerouges()"></button>
									<button style="background:brown;" onclick="pilositebruns()"></button>
									<button style="background:chocolate;" onclick="pilositechatains()"></button>
									<button style="background:orange;" onclick="pilositeroux()"></button>
									<button style="background:yellow;" onclick="pilositeblonds()"></button>
									<button style="background:green;" onclick="pilositeverts()"></button>
									<button style="background:blue;" onclick="pilositebleus()"></button>
									<button style="background:purple;" onclick="pilositeviolets()"></button>
									<button style="background:hotpink;" onclick="pilositeroses()"></button>
								</td>
								<td><button onclick="pilosite()"><img src="/escaperpg/images/gaea1/droite.png"></button></td>
							</tr>

							<tr>
								<td class="titreavatar">Accessoire</td>
								<td><button onclick="raccessoire()"><img src="/escaperpg/images/gaea1/gauche.png"></button></td>
								<td><span id="accessoirecount">1</span> / 14</td>
								<td><button onclick="accessoire()"><img src="/escaperpg/images/gaea1/droite.png"></button></td>
							</tr>
						</table>

						<input type="submit" onclick="randomize()" value="aléatoire.">

						<form action="index" method="post">
							<input type="number" name="visage" id="visageinput" value="11" class="hidden">
							<input type="number" name="oreilles" id="oreillesinput" value="11" class="hidden">
							<input type="number" name="cheveux" id="cheveuxinput" value="1" class="hidden">
							<input type="number" name="couleurcheveux" id="couleurcheveuxinput" value="1" class="hidden">
							<input type="number" name="sourcils" id="sourcilsinput" value="1" class="hidden">
							<input type="number" name="yeux" id="yeuxinput" value="1" class="hidden">
							<input type="number" name="couleuryeux" id="couleuryeuxinput" value="1" class="hidden">
							<input type="number" name="nez" id="nezinput" value="11" class="hidden">
							<input type="number" name="bouche" id="boucheinput" value="1" class="hidden">
							<input type="number" name="couleurbouche" id="couleurboucheinput" value="1" class="hidden">
							<input type="number" name="pilosite" id="pilositeinput" value="1" class="hidden">
							<input type="number" name="couleurpilosite" id="couleurpilositeinput" value="1" class="hidden">
							<input type="number" name="accessoire" id="accessoireinput" value="1" class="hidden">
							<input type="submit" name="avatarsubmit" value="valider.">
						</form>
					</div>

					<script src="/escaperpg/aventures/gaea1/scripts/avatar.js"></script>
				</div>

			<?php elseif (isset ($_POST['avatarsubmit'])): ?>
				<?php
					$cheveuxbackend = $_SESSION['cheveuxbackend'] = '<img src="/escaperpg/images/gaea1/avatar/cheveuxbackend'.$_POST['cheveux'].'-'.$_POST['couleurcheveux'].'.png">';
					$visage = $_SESSION['visage'] = '<img src="/escaperpg/images/gaea1/avatar/visage'.$_POST['visage'].'.png">';
					$cheveuxback = $_SESSION['cheveuxback'] = '<img src="/escaperpg/images/gaea1/avatar/cheveuxback'.$_POST['cheveux'].'-'.$_POST['couleurcheveux'].'.png">';
					$oreilles = $_SESSION['oreilles'] = '<img src="/escaperpg/images/gaea1/avatar/oreilles'.$_POST['oreilles'].'.png">';
					$cheveux = $_SESSION['cheveux'] = '<img src="/escaperpg/images/gaea1/avatar/cheveux'.$_POST['cheveux'].'-'.$_POST['couleurcheveux'].'.png">';
					$sourcils = $_SESSION['sourcils'] = '<img src="/escaperpg/images/gaea1/avatar/sourcils'.$_POST['sourcils'].'.png">';
					$yeux = $_SESSION['yeux'] = '<img src="/escaperpg/images/gaea1/avatar/yeux'.$_POST['yeux'].'-'.$_POST['couleuryeux'].'.png">';
					$nez = $_SESSION['nez'] = '<img src="/escaperpg/images/gaea1/avatar/nez'.$_POST['nez'].'.png">';
					$bouche = $_SESSION['bouche'] = '<img src="/escaperpg/images/gaea1/avatar/bouche'.$_POST['bouche'].'-'.$_POST['couleurbouche'].'.png">';
					$pilosite = $_SESSION['pilosite'] = '<img src="/escaperpg/images/gaea1/avatar/pilosite'.$_POST['pilosite'].'-'.$_POST['couleurpilosite'].'.png">';
					$accessoire = $_SESSION['accessoire'] = '<img src="/escaperpg/images/gaea1/avatar/accessoire'.$_POST['accessoire'].'.png">';
					$_SESSION['avatar'] = "$cheveuxbackend$visage$bouche$yeux$nez$cheveuxback$pilosite$oreilles$sourcils$accessoire$cheveux";
					$_SESSION['avatarimg'] = true;
					include_once $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/gaea1/includes/nav.php";
				?>

				<div id="txt">
					<div class="dialogue">
						<div id="marv"><img src="/escaperpg/images/gaea1/marv.png" alt="dialogue marv"></div>

						<div id="bullemarv">
							<p>
								Parfait ! Votre avatar a bien été enregistré !<br><br>
								Il faut maintenant donner un nom à votre personnage. Il s'agit du -ou de la- commandant·e du vaisseau.<br><br>
								Quelle identité allez-vous prendre ?
							</p>
						</div>
					</div>

					<form action="index" method="post">
						<table>
							<tr>
								<td style="width:50%"><label for="lastname">Choisissez le nom de votre personnage :</label></td>
								<td style="width:50%"><input type="text" name="pjnom" id="lastname" placeholder="Nom." required></td>
							</tr>

							<tr>
								<td><label for="name">Choisissez le prénom de votre personnage :</label></td>
								<td><input type="text" name="pjprenom" id="name" placeholder="Prénom." required></td>
							</tr>
						</table>

						<input type="submit" name="identite" value="valider.">
					</form>
				</div>

			<?php elseif (isset ($_POST['identite'])): ?>
				<?php
					$prenom = null;
					$tab_prenom = explode("-", $_POST['pjprenom']);
					foreach ($tab_prenom as $value) { $prenom.=ucwords($value)."-"; }
					$prenom = substr($prenom,0,-1);
					$_SESSION['pjnom'] = $_POST['pjnom'];
					$_SESSION['pjprenom'] = $prenom;
					include_once $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/gaea1/includes/nav.php";
				?>

				<div id="txt">
					<div class="dialogue">
						<div id="marv"><img src="/escaperpg/images/gaea1/marv.png" alt="dialogue marv"></div>

						<div id="bullemarv">
							<p>
								Très bien, <?= htmlspecialchars($_SESSION['pjprenom']) ?> !<br><br>
								Une dernière question pour vous : à quel genre voulez-vous que ce jeu s'adresse à vous ?
							</p>
						</div>
					</div>

					<form action="index" method="post">
						<input type="submit" name="feminin" value="au féminin.">
						<input type="submit" name="masculin" value="au masculin.">
					</form>
				</div>

			<?php elseif (isset ($_POST['feminin'])): ?>
				<div id="succespopup">
					<?php
						$nouveausucces = '<img src="/escaperpg/images/succes/gaea1/personnage.png"><span><u><b>Carte d\'identité</b></u><br>Créer son personnage pour l\'aventure</span>';
						$scenario = 'gaea1';
						$description = 'personnage';
						$cache = 'non';
						$rarete = 'succesnormal';
						include_once $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/succesadd.php";
					?>
				</div>

				<?php
					$_SESSION['genre'] = true;
					$_SESSION['feminin'] = true;
					include_once $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/gaea1/includes/nav.php";
				?>

				<div id="txt">
					<div class="dialogue">
						<div id="marv"><img src="/escaperpg/images/gaea1/marv.png" alt="dialogue marv"></div>

						<div id="bullemarv">
							<p>
								C'est noté, commandante !<br><br>
								Nous allons donc pouvoir partir à l'aventure, vous et moi !<br>
								Mais pour le moment, reposez-vous dans votre caisson cryogénique, je vous alerterai si quoi que ce soit devait arriver.
							</p>
						</div>
					</div>

					<form action="andromede" method="post">
						<input type="submit" name="suivant" value="suivant.">
					</form>
				</div>

			<?php elseif (isset ($_POST['masculin'])): ?>
				<div id="succespopup">
					<?php
						$nouveausucces = '<img src="/escaperpg/images/succes/gaea1/personnage.png"><span><u><b>Carte d\'identité</b></u><br>Créer son personnage pour l\'aventure</span>';
						$scenario = 'gaea1';
						$description = 'personnage';
						$cache = 'non';
						$rarete = 'succesnormal';
						include_once $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/succesadd.php";
					?>
				</div>

				<?php
					$_SESSION['genre'] = true;
					include_once $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/gaea1/includes/nav.php";
				?>

				<div id="txt">
					<div class="dialogue">
						<div id="marv"><img src="/escaperpg/images/gaea1/marv.png" alt="dialogue marv"></div>

						<div id="bullemarv">
							<p>
								C'est noté, commandant !<br><br>
								Nous allons donc pouvoir partir à l'aventure, vous et moi !<br>
								Mais pour le moment, reposez-vous dans votre caisson cryogénique, je vous alerterai si quoi que ce soit devait arriver.
							</p>
						</div>
					</div>

					<form action="andromede" method="post">
						<input type="submit" name="suivant" value="suivant.">
					</form>
				</div>

			<?php elseif (isset ($_POST['beta'])): ?>
				<?php if (str_replace($search, $replace, stripslashes($_POST['betamdp'])) === "fsb12em"): ?>
					<div id="txt">
						<div class="dialogue">
							<div id="marv" style="border: none;"><img src="/escaperpg/images/narrateur.png" alt="narrateur"></div>

							<div class="bulleperso">
								<p>
									Plusieurs des énigmes présentes dans ce scénario utilisent des sons pour vous aider dans leur réalisation.
									Il est donc fortement conseillé d'y jouer au casque avec le son activé.<br>
									Si cela n'est pas possible pour vous, pas d'inquiétude : ces énigmes peuvent être résolues sans son, en s'aidant des éléments visuels.<br>
									<br>
									Veuillez également noter qu'il s'agit ici d'une démo, vous n'aurez donc accès qu'à une partie de ce scénario.
								</p>
							</div>
						</div>

						<form action="index" method="post">
							<input type="submit" name="new" value="NOUVELLE PARTIE.">
						</form>

						<form action="save/load" method="post">
							<input type="submit" name="load" value="CHARGER UNE PARTIE.">
						</form>
					</div>
				<?php else: ?>
					<div id="txt">
						<p>Le mot de passe est incorrect.</p>

						<form action="index" method="post">
							<input type="text" name="betamdp"><input type="submit" name="beta" value="VALIDER.">
						</form>
					</div>
				<?php endif; ?>
				
			<?php else: ?>
				<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/gaea1/includes/sessioninc.php"; ?>

				<div id="txt">
					<div class="dialogue">
						<div id="marv" style="border: none;"><img src="/escaperpg/images/narrateur.png" alt="narrateur"></div>

						<div class="bulleperso">
							<p>
								Ce scénario est uniquement disponible pour les <b>Tipeurs</b> ayant choisi la contrepartie <i>"Accès Anticipé"</i> ou au-delà.<br><br>
								Vous désirez y jouer dès maintenant ?
								Alors rendez-vous sur la page <a href="https://fr.tipeee.com/escaperpg" target="_blank" rel="noreferrer">Tipeee</a> pour obtenir le code d'accès !
							</p>
						</div>
					</div>

					<form action="index" method="post">
						<input type="text" name="betamdp"><input type="submit" name="beta" value="VALIDER.">
					</form>
				</div>
			<?php endif; ?>
		</div>

		<div id="load"><div id="loader"></div></div>

		<script src="/escaperpg/scripts/aventures-chargement.js"></script>

		<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/gaea1/includes/footer.php"; ?>
	</body>
</html>