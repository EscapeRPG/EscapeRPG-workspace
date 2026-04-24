<?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/entete.php"; ?>
<!DOCTYPE html>
<html lang="fr">
	<head>
		<script type="text/javascript" src="/escaperpg/lightbox/js/prototype.js"></script>
		<script type="text/javascript" src="/escaperpg/lightbox/js/scriptaculous.js?load=effects,builder"></script>
		<script type="text/javascript" src="/escaperpg/lightbox/js/lightbox.js"></script>
		<link rel="stylesheet" href="/escaperpg/lightbox/css/lightbox.css" type="text/css" media="screen">
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/styleAventures.php"; ?>
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/ambria/includes/stylesAmbria.php"; ?>
		<meta charset="utf-8">
		<title>Les Portes de la Cité - Le Trésor d'Ambria</title>
	</head>
	
	<body>
		<?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/header.php"; ?>
		<div id="banniere"><img src="/escaperpg/images/ambria/tresorambriamini.png" alt="le trésor d'ambria"></div>
		<main>
        <?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/ambria/includes/nav-sullivan.php"; ?>
			<div id="txt">
				<?php if (isset($_POST['porteenigme']) || isset($_SESSION['portesciteenigme'])): ?>
					<audio src="/escaperpg/sons/ambria/cite.mp3" autoplay></audio>
					<div id="sullivanporte">
						<img src="/escaperpg/images/ambria/porte/sullivanporte.png" alt="la porte de la cité d'Ambria">
						<div class="dropperporte" id="dropporte1"></div>
						<div class="dropperporte" id="dropporte2"></div>
						<div class="dropperporte" id="dropporte3"></div>
						<div class="dropperporte" id="dropporte4"></div>
						<div class="dropperporte" id="dropporte5"></div>
						<div class="dropperporte" id="dropporte6"></div>
					</div>
					<div class="draggerporte" id="drag1">
						<img src="/escaperpg/images/ambria/porte/basrelief1.png" id="dra1" alt="bas-relief">
					</div>
					<div class="draggerporte" id="drag2">
						<img src="/escaperpg/images/ambria/porte/basrelief2.png" id="dra2" alt="bas-relief">
					</div>
					<div class="draggerporte" id="drag3">
						<img src="/escaperpg/images/ambria/porte/basrelief3.png" id="dra3" alt="bas-relief">
					</div>
					<script src="/escaperpg/aventures/ambria/sullivan/scripts/dragdropporte.js"></script>
					<p>
						Comment faire pour ouvrir cette porte ?
					</p>

					<?php
					$reponse = `
						Une fois le traducteur obtenu — et avec l'aide de Logan — le message indique :<br>
						"L'oiseau vole au plus haut. Le serpent se repose à l'ombre. Le dragon veille sur la cité."`;
					$indice1 = "Il existe forcément un endroit sur cette île où vous pourriez trouver un traducteur pour ce dialecte.";
					$indice2 = "Vous êtes certain d'avoir remarqué une partie des symboles lorsque vous avez traversé l'antichambre avec la mousse phosphorescente.";
					$indice3 = "Revenez dans les grottes et essayez de trouver le moyen d'observer correctement la mousse.";
					include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/indices.php";
					$_SESSION['portesciteenigme'] = true;
					?>
				<?php elseif (isset($_POST['porte'])): ?>
					<audio src="/escaperpg/sons/ambria/cite.mp3" autoplay></audio>
					<div class="enigmelieu">
						<a href="/escaperpg/images/ambria/porte/tablette.png" rel="lightbox[sullivan]" title="Une tablette en or gravée."><img src="/escaperpg/images/ambria/porte/tablette.png"></a>
					</div>
					<p>
						Prenant votre temps, vous étudiez les magnifiques bas-reliefs gravés à même la porte et remarquez que plusieurs cavités semblent servir à accueillir quelque chose.<br>
						Observant autour de vous, vous finissez par trouver une niche renfermant trois petites sculptures correspondant parfaitement aux divers emplacements.
						À côté de celle-ci, une plaque en or est gravée de curieux pictogrammes semblant vouloir signifier quelque chose.
					</p>
					<form action="portescite" method="post">
						<input type="submit" name="prendre" value="Prendre la plaque.">
					</form>
				<?php elseif (isset($_POST['prendre'])): ?>
					<script src="/escaperpg/scripts/inventaireadd.js"></script>
					<p>
						Jake n'étant pas avec vous, vous ne pouvez compter sur lui pour vous traduire la tablette.
						De toute façon, le langage utilisé ici ne ressemble à aucun que vous n'ayez vu auparavant,
						il va donc vous falloir trouver le moyen d'en comprendre son sens si vous espérez pouvoir continuer.
					</p>
					<form action="portescite" method="post">
						<input type="submit" name="porteenigme" value="Observer la porte.">
					</form>
					<?php $_SESSION['tablette'] = true; ?>
				<?php else: ?>
					<audio src="/escaperpg/sons/ambria/cite.mp3" autoplay></audio>
					<p>
						Délaissant l'antichambre derrière vous, vous reprenez le chemin et finissez par apercevoir la lumière caractéristique du soleil, à quelques mètres.<br>
						Pressant le pas, vous débouchez sur une clairière cernée d'une haute muraille naturelle.<br>
						<br>
						Face à vous se dresse la porte la plus imposante qu'il vous ait été donné de voir de votre vie.
						À coup sûr, il s'agit là du portail d'entrée d'Ambria !<br>
						<br>
						Logan et les autres semblent être non loin, mais une muraille vous sépare. Ils semblent avoir des choses à voir de leur côté également, d'après ce que vous pouvez entendre.<br>
						<br>
						Vous vous avancez vers elle et ne voyez aucune poignée permettant de l'ouvrir.
						Tentant de la pousser, celle-ci se révèle bien trop imposante pour que vous ne puissiez y faire quoi que ce soit, même aidé des hommes qui vous accompagnent.<br>
						<br>
						Vous prenez alors un peu de recul pour essayer de voir si quoi que ce soit pourrait vous aider à franchir ce dernier obstacle.
					</p>
					<form action="portescite" method="post">
						<input type="submit" name="porte" value="Chercher.">
					</form>
					<?php $_SESSION['portescite'] = true; ?>
				<?php endif; ?>
			</div>
		</main>
		<div id="load"><div id="loader"></div></div>
		<script src="/escaperpg/scripts/aventures-chargement.js"></script>
		<?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/ambria/sullivan/includes/footer.php"; ?>
	</body>
</html>
