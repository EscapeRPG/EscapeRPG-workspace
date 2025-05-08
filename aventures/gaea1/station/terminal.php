<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/entete.php"; $_SESSION['plancurrent'] = "r"; ?>
<!DOCTYPE html>
<html lang="fr">
	<head>
		<script type="text/javascript" src="/escaperpg/lightbox/js/prototype.js"></script>
		<script type="text/javascript" src="/escaperpg/lightbox/js/scriptaculous.js?load=effects,builder"></script>
		<script type="text/javascript" src="/escaperpg/lightbox/js/lightbox.js"></script>
		<link rel="stylesheet" href="/escaperpg/lightbox/css/lightbox.css" type="text/css" media="screen">
		<link rel="stylesheet" href="/escaperpg/aventures/gaea1/stylegaea.css">
		<meta charset="utf-8">
		<title>Terminal - Station GAEA-1</title>
	</head>

	<body onload="chargement()">
		<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/header.php"; ?>

		<div id="banniere"><img src="/escaperpg/images/gaea1/gaea1mini.png" alt="gaea 1 bannière"></div>

		<div id="bloc_page">
			<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/gaea1/includes/nav.php"; ?>

			<div id="txt">
				<?php if ($_SESSION['poweron']): ?>
					<p>
						Prout.
					</p>

				<?php elseif ($_SESSION['visitestation']): ?>
					<p>
						Le terminal des arrivées fait penser à une scène de désolation avec ses fauteuils vides et les bagages traînant partout.
						Chacun de vos passages par cette salle vous fait un drôle d'effet que vous ne parvenez pas à réprimer. Vous essayez donc de ne pas trop traîner ici.<br>
						De toute façon, il ne semble rien y avoir d'intéressant dans le coin.
					</p>

				<?php elseif (isset ($_POST['suivant'])): ?>
					<p>
						Vous traversez donc le terminal, suivant des indications au mur que vous ne comprenez pas mais qui, vous l'espérez, vous mèneront à la passerelle de commandement.
						Vous passez ainsi dans une sorte de couloir et continuez tout droit, atteignant une porte légèrement entrouverte.
						Vous l'agrippez et tirez de toutes vos forces pour forcer l'ouverture.
						Au bout de quelques secondes d'effort, vous en arrivez à la conclusion que vous ne parviendrez pas à passer de cette manière.<br>
						<br>
						Revenant vers le hangar, vous fouillez la pièce à la recherche d'un outil qui pourrait vous être utile.
					</p>

					<form action="hangar" method="post">
						<input type="submit" name="suivant2" value="suivant.">
					</form>

				<?php elseif (isset ($_POST['pieddebiche'])): ?>
					<p>
						Vous retournez au sas, avec votre outil de fortune.<br>
						<br>
						Passant la barre en métal dans l'ouverture, vous faites levier et constatez avec soulagement que la porte commence à s'ouvrir.<br>
						Continuant, vous parvenez à créer un espace suffisant pour passer et arrivez dans ce que vous identifiez rapidement comme le hall principal de la station :
						des petits chemins déambulant entre des espaces aménagés pour des plantes — malheureusement mortes par manque d'oxygène — des kiosques vendant de quoi s'occuper ou manger,
						des panneaux en hauteur servant probablement à afficher des informations diverses…
						Manifestement, c'est ici que se trouvait le cœur de vie de la station. Aujourd'hui cependant, l'ambiance semble étrange, presque oppressante, avec cette absence totale de vie.<br>
						<br>
						Avisant un grand panneau au centre de la place semblant représenter le plan de la station, vous avancez pour le consultez.

					</p>
					
					<form action="plan" method="post">
						<input type="submit" name="plan" value="observer le plan.">
					</form>

					<?php
						$_SESSION['plancurrent'] = "l";
						$_SESSION['oxygene'] -= 10;
						$_SESSION['premiereobservation'] = true;
					?>

				<?php else: ?>
					<p>
						En passant la porte, vous arrivez dans une vaste salle ressemblant à un terminal d'attente.
						De nombreux fauteuils sont disposés là, face à une énorme baie vitrée permettant d'observer l'arrivée de vaisseaux.
						L'état de la salle laisse supposer que des départs précipités ont eu lieu : de nombreux bagages traînent entre les fauteuils et flottent mollement en apesanteur,
						à quelques centimètres du sol.<br>
						Cependant, vous ne voyez aucune trace de vie.
						L'absence d'air respirable vous fait présager le pire, mais vous ne pouvez plus repartir en arrière :
						une loi spatiale oblige tout pilote recevant un signal de détresse à y répondre et enquêter sur les raisons de son déclenchement.
						Depuis que vous avez posé le pied sur la station, vous êtes <?= $_SESSION['feminin'] ? 'engagée' : 'engagé' ?> malgré vous à continuer.
					</p>

					<form action="terminal" method="post">
						<input type="submit" name="suivant" value="suivant.">
					</form>
					
					<?php
						$_SESSION['indice1'] = false;
						$_SESSION['indice2'] = false;
						$_SESSION['indice3'] = false;
						$_SESSION['reponse'] = false;
						$_SESSION['oxygene'] -= 10;
						$_SESSION['shunter'] = false;
					?>
				<?php endif; ?>
			</div>
		</div>
		
		<div id="load"><div id="loader"></div></div>

		<script src="/escaperpg/scripts/aventures-chargement.js"></script>

		<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/gaea1/includes/footer.php"; ?>
	</body>
</html>