<?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/entete.php"; ?>
<!DOCTYPE html>
<html lang="fr">

<head>
	<script type="text/javascript" src="/escaperpg/lightbox/js/prototype.js"></script>
	<script type="text/javascript" src="/escaperpg/lightbox/js/scriptaculous.js?load=effects,builder"></script>
	<script type="text/javascript" src="/escaperpg/lightbox/js/lightbox.js"></script>
	<link rel="stylesheet" href="/escaperpg/lightbox/css/lightbox.css" type="text/css" media="screen">
	<?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/styleAventures.php"; ?>
	<?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/avent/includes/styleAvent.php"; ?>
	<meta charset="utf-8">
	<title>En Route - Le Grenier d'Arthur</title>
</head>

<body>
	<?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/header.php"; ?>
	<div id="banniere"><img src="/escaperpg/images/avent/aventmini.png" alt="bannière le grenier d'arthur"></div>
	<main>
		<?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/avent/includes/nav.php"; ?>
		<div id="txt">
			<?php if (isset($_SESSION['carteciel'])): ?>
				<?php if (isset($_POST['validate'])): ?>
					<?php switch (str_replace($search, $replace, stripslashes($_POST['aller']))): ?>
					<?php
						case "polenord": ?>
							<div id="succespopup">
								<?php
								$nouveausucces = '<img src="/escaperpg/images/succes/avent/polenord.png"><span><u><b>En route !</b></u><br>Partir pour le Pôle Nord !</span>';
								$scenario = 'avent';
								$description = 'pôlenord';
								$cache = 'oui';
								$rarete = 'succesnormal';
								include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/succesadd.php";
								?>
							</div>
							<audio src="/escaperpg/sons/avent/bipssifflement.mp3" autoplay></audio>
							<p>
								La lumière s'intensifie et semble vous englober.<br>
								Vous entendez la machine émettre une sorte de sifflement strident et vous commencez à paniquer en réalisant qu'elle pourrait exploser juste à côté de vous !<br>
								<br>
								Vous essayez de bouger mais la lumière autour de vous devient aveuglante et vous ne parvenez pas à esquisser le moindre mouvement.<br>
								<br>
								Soudain, vous vous sentez comme attirée vers le haut et constatez que vos pieds ne touchent plus le sol !
								Vous entendez la machine émettre une série de bips.
							</p>
							<form action="retrouvailles" method="post">
								<input type="submit" name="bips" value="BIP BOUP !">
							</form>
							<?php break; ?>
						<?php
						default: ?>
							<p>
								Rien ne se passe. Peut-être avez-vous fait une erreur ?
							</p>
							<div class="container">
								<canvas class="myCanvas"></canvas>
							</div>
							<button id="reset">RÉINITIALISER.</button>
							<br>
							<form action="enroute" method="post">
								<input list="notesListe" name="aller">
								<input type="submit" name="validate" value="VALIDER.">
							</form>
							<?php
							$reponse = "Le mot de passe est \"Pôle Nord\".";
							$indice1 = "Essayez de comparer le drap et la carte avec les étoiles que vous avez trouvée. Peut-être se complètent-ils l'un et l'autre ?";
							$indice2 = "Vous pouvez dessiner directement sur le drap. Reproduisez le dessin que vous avez sur votre carte.";
							$indice3 = "Les lignes reliées forment deux mots, lesquels ?";
							include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/indices.php";
							?>
							<script src="/escaperpg/aventures/scripts/draw.js"></script>
					<?php endswitch; ?>
				<?php else: ?>
					<div class="container">
						<canvas class="myCanvas"></canvas>
					</div>
					<button id="reset">RÉINITIALISER.</button>
					<p>
						En y regardant de plus près, vous trouvez que les petites taches de lumière projetées sur le drap pourraient ressembler à des étoiles.
						La carte du ciel que vous avez récupérée semble en effet l'indiquer. Toutefois, vous constatez que la constellation qui y est dessinée ne correspond pas à celle projetée.<br>
						<br>
						Sur le côté de la machine, un petit clavier vous permet d'entrer une information, mais laquelle ?
					</p>
					<form action="enroute" method="post">
						<input list="notesListe" name="aller">
						<input type="submit" name="validate" value="VALIDER.">
					</form>
					<?php
					$reponse = "Le mot de passe est \"Pôle Nord\".";
					$indice1 = "Essayez de comparer le drap et la carte avec les étoiles que vous avez trouvée. Peut-être se complètent-ils l'un et l'autre ?";
					$indice2 = "Vous pouvez dessiner directement sur le drap. Reproduisez le dessin que vous avez sur votre carte.";
					$indice3 = "Les lignes reliées forment deux mots, lesquels ?";
					include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/indices.php";
					?>
					<script src="/escaperpg/aventures/scripts/draw.js"></script>
				<?php endif; ?>
			<?php elseif (isset($_POST['retour']) || isset($_SESSION['cielobscur'])): ?>
				<div id="enigmelieu">
					<img src="/escaperpg/images/avent/grenier.png" alt="grenier">
					<form action="enroute" method="post">
						<button type="submit" name="carteduciel" id="carteciel">
							<img src="/escaperpg/images/avent/carteciel.png" alt="une carte du ciel">
						</button>
					</form>
				</div>
				<form action="enroute" method="post">
					<button type="submit" name="indice" class="boutonindice"></button>
				</form>
				<?php
				$reponse = "Cliquez sur la petite carte qui est posée sur la table, à côté de la machine.";
				$indice1 = "Fouillez bien la pièce.";
				$indice2 = "Il y a une carte cachée quelque part qui vous aidera à comprendre.";
				$indice3 = "La carte que vous cherchez se trouve vers le fond de la pièce.";
				include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/indices.php";
				$_SESSION['cielobscur'] = true;
				?>
			<?php elseif (isset($_POST['carteduciel'])): ?>
				<p>
					Vous trouvez une carte sur laquelle sont dessinées des étoiles.
				</p>
				<span class="turn-card">Retournez la carte numéro 3.</span>
				<br>
				<form action="enroute" method="post">
					<input type="submit" name="suivant2" value="RETOUR.">
				</form>
				<?php
				$_SESSION['carteciel'] = true;
				unset($_SESSION['cielobscur']);
				?>
			<?php else: ?>
				<div class="container">
					<canvas class="myCanvas"></canvas>
				</div>
				<form action="enroute" method="post">
					<input type="submit" name="clear" value="RÉINITIALISER.">
				</form>
				<p>
					Vous n'arrivez pas à comprendre ce que vous voyez.<br>
					Peut-être que quelque chose dans la pièce pourrait vous aider ?
				</p>
				<form action="enroute" method="post">
					<input type="submit" name="retour" value="RETOUR.">
				</form>
				<?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/resetIndices.php"; ?>
			<?php endif; ?>
		</div>
	</main>
	<div id="load">
		<div id="loader"></div>
	</div>
	<script src="/escaperpg/scripts/aventures-chargement.js"></script>
</body>

</html>
