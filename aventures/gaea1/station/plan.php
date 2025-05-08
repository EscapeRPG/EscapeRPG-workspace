<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/entete.php"; $_SESSION['visitestation'] = true; $_SESSION['detruire'] = false; $_SESSION['fuir'] = false; ?>
<!DOCTYPE html>
<html lang="fr">
	<head>
		<script type="text/javascript" src="/escaperpg/lightbox/js/prototype.js"></script>
		<script type="text/javascript" src="/escaperpg/lightbox/js/scriptaculous.js?load=effects,builder"></script>
		<script type="text/javascript" src="/escaperpg/lightbox/js/lightbox.js"></script>
		<link rel="stylesheet" href="/escaperpg/lightbox/css/lightbox.css" type="text/css" media="screen">
		<link rel="stylesheet" href="/escaperpg/aventures/gaea1/stylegaea.css">
		<meta charset="utf-8">
		<title>Plan - Station GAEA-1</title>
	</head>

	<body onload="chargement()">
		<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/header.php"; ?>

		<div id="banniere"><img src="/escaperpg/images/gaea1/gaea1mini.png" alt="gaea 1 bannière"></div>

		<div id="bloc_page">
			<nav>
				<h1>Navigation</h1>
				
				<ul>
					<a onmouseover="esalle()" onclick="esalleclick()">
						<li id="lie" class="<?= $_SESSION['plancurrent'] == "e" ? 'locactuelle' : ($_SESSION['etested'] ? 'lienclosed' : ($_SESSION['evisited'] ? null : 'lienuntested')) ?>">
							<?= $_SESSION['evisited'] ? 'Pont de Commandement' : 'Komunodek' ?>
						</li>

						<li id="lie2" class="<?= $_SESSION['plancurrent'] == "e" ? 'locactuelle' : ($_SESSION['etested'] ? 'lienclosed' : ($_SESSION['evisited'] ? null : 'lienuntested')) ?>">
							<?= $_SESSION['evisited'] ? 'Cabine du Commandant' : 'Komuntrum' ?>
						</li>
					</a>

					<a onmouseover="lsalle()" onclick="lsalleclick()">
						<li id="lil" class="<?= $_SESSION['plancurrent'] == "l" ? 'locactuelle' : null ?>">
							Hall Principal
						</li>
					</a>

					<ul>
						<a onmouseover="osalle()" onclick="osalleclick()">
							<li id="lio" class="<?= $_SESSION['plancurrent'] == "o" ? 'locactuelle' : null ?>">Couloir A</li>
						</a>

						<a onmouseover="nsalle()" onclick="nsalleclick()">
							<li id="lin" class="<?= $_SESSION['plancurrent'] == "n" ? 'locactuelle' : ($_SESSION['ntested'] ? 'lienclosed' : ($_SESSION['nvisited'] ? null : 'lienuntested')) ?>">
								<?= $_SESSION['nvisited'] ? 'Couloir B' : 'Kurdior B' ?>
							</li>
						</a>

						<a onmouseover="ksalle()" onclick="ksalleclick()">
							<li id="lik" class="<?= $_SESSION['plancurrent'] == "k" ? 'locactuelle' : ($_SESSION['kvisited'] ? null : 'lienuntested') ?>">
								<?= $_SESSION['kvisited'] ? 'Couloir C' : 'Kurdior C' ?>
							</li>
						</a>

						<a onmouseover="fsalle()" onclick="fsalleclick()">
							<li id="lif" class="<?= $_SESSION['plancurrent'] == "f" ? 'locactuelle' : ($_SESSION['ftested'] ? 'lienclosed' : ($_SESSION['fvisited'] ? null : 'lienuntested')) ?>">
								<?= $_SESSION['fvisited'] ? 'Couloir D' : 'Kurdior D' ?>
							</li>
						</a>

						<a onmouseover="gsalle()" onclick="gsalleclick()">
							<li id="lig" class="<?= $_SESSION['plancurrent'] == "g" ? 'locactuelle' : ($_SESSION['gtested'] ? 'lienclosed' : ($_SESSION['gvisited'] ? null : 'lienuntested')) ?>">
								<?= $_SESSION['gvisited'] ? 'Couloir E' : 'Kurdior E' ?>
							</li>
						</a>

						<a onmouseover="hsalle()" onclick="hsalleclick()">
							<li id="lih" class="<?= $_SESSION['plancurrent'] == "h" ? 'locactuelle' : ($_SESSION['hvisited'] ? null : 'lienuntested') ?>">
								<?= $_SESSION['hvisited'] ? 'Couloir F' :'Kurdior F' ?>
							</li>
						</a>

						<a onmouseover="ssalle()" onclick="ssalleclick()">
							<li id="lis" class="<?= $_SESSION['plancurrent'] == "s" ? 'locactuelle' : ($_SESSION['stested'] ? 'lienclosed' : ($_SESSION['svisited'] ? null : 'lienuntested')) ?>">
								<?= $_SESSION['svisited'] ? 'Couloir G' : 'Kurdior G' ?>
							</li>
						</a>

						<a onmouseover="isalle()" onclick="isalleclick()">
							<li id="lii" class="<?= $_SESSION['plancurrent'] == "i" ? 'locactuelle' : ($_SESSION['itested'] ? 'lienclosed' : ($_SESSION['ivisited'] ? null : 'lienuntested')) ?>">
								<?= $_SESSION['ivisited'] ? 'Couloir H' : 'Kurdior H' ?>
							</li>
						</a>
					</ul>

					<a onmouseover="bsalle()" onclick="bsalleclick()">
						<li id="lib" class="<?= $_SESSION['plancurrent'] == "b" ? 'locactuelle' : ($_SESSION['bvisited'] ? null : 'lienuntested') ?>">
							<?= $_SESSION['bvisited'] ? 'Laboratoire A' : 'Labratrum A' ?>
						</li>
					</a>

					<a onmouseover="asalle()" onclick="asalleclick()">
						<li id="lia" class="<?= $_SESSION['plancurrent'] == "a" ? 'locactuelle' : ($_SESSION['avisited'] ? null : 'lienuntested') ?>">
							<?= $_SESSION['avisited'] ? 'Laboratoire B' : 'Labratrum B' ?>
						</li>
					</a>

					<a onmouseover="tsalle()" onclick="tsalleclick()">
						<li id="lit" class="<?= $_SESSION['plancurrent'] == "t" ? 'locactuelle' : ($_SESSION['tvisited'] ? null : 'lienuntested') ?>">
							<?= $_SESSION['tvisited'] ? 'Mess' : 'Spesrum' ?>
						</li>
					</a>

					<a onmouseover="msalle()" onclick="msalleclick()">
						<li id="lim" class="<?= $_SESSION['plancurrent'] == "m" ? 'locactuelle' : ($_SESSION['mvisited'] ? null : 'lienuntested') ?>">
							<?= $_SESSION['mvisited'] ? 'Bar' : 'Drekrum' ?>
						</li>
					</a>

					<a onmouseover="dsalle()" onclick="dsalleclick()">
						<li id="lid" class="<?= $_SESSION['plancurrent'] == "d" ? 'locactuelle' : ($_SESSION['dvisited'] ? null : 'lienuntested') ?>">
							<?= $_SESSION['dvisited'] ? 'Infirmerie' : 'Sykkerum' ?>
						</li>
					</a>

					<a onmouseover="csalle()" onclick="csalleclick()">
						<li id="lic" class="<?= $_SESSION['plancurrent'] == "c" ? 'locactuelle' : ($_SESSION['ctested'] ? 'class="lienclosed' : ($_SESSION['cvisited'] ? null : 'lienuntested')) ?>">
							<?= $_SESSION['cvisited'] ? 'Dortoir' : 'Sovrum' ?>
						</li>
					</a>

					<a onmouseover="psalle()" onclick="psalleclick()">
						<li id="lip" class="<?= $_SESSION['plancurrent'] == "p" ? 'locactuelle' : ($_SESSION['pvisited'] ? null : 'lienuntested') ?>">
							<?= $_SESSION['pvisited'] ? 'Salle du Réacteur' : 'Raktrrum' ?>
						</li>
					</a>

					<a onmouseover="rsalle()" onclick="rsalleclick()">
						<li id="lir" class="<?= $_SESSION['plancurrent'] == "r" ? 'locactuelle' : null ?>">
							Terminal
						</li>
					</a>

					<a onmouseover="jsalle()" onclick="jsalleclick()">
						<li id="lij" class="<?= $_SESSION['plancurrent'] == "j" ? 'locactuelle' : ($_SESSION['jvisited'] ? null : 'lienuntested') ?>">
							<?= $_SESSION['jvisited'] ? 'Entrepôt' : 'Legerrum' ?>
						</li>
					</a>

					<a onmouseover="qsalle()" onclick="qsalleclick()">
						<li id="liq" class="<?= $_SESSION['plancurrent'] == "q" ? 'locactuelle' : null ?>">
							Hangar
						</li>
					</a>
				</ul>
						
				<div id="inventairefooter"><input type="submit" onclick="inventaireshow()" value="INVENTAIRE"></div>

				<div id="motsdepasse"><input type="submit" onclick="mdpshow()" value="NOTES"></div>

				<a href="/escaperpg/aventures/gaea1/save/save" target="_blank" rel="noreferrer"><input type="submit" name="save" value="SAUVEGARDER"></a>
			</nav>

			<div id="txt">
				<div id="canvas-wrap">
					<img src="/escaperpg/images/gaea1/plan/fond.png">
					<div id="planevacoverlay">
						<div id="nsallefond"><img src="/escaperpg/images/gaea1/plan/nclosed.png" id="nsallemiddle" <?= $_SESSION['nvisited'] ? 'class="hidden"' : null ?>></div>
						<div id="csallefond"><img src="/escaperpg/images/gaea1/plan/cclosed.png" id="csallemiddle" <?= $_SESSION['cvisited'] ? 'class="hidden"' : null ?>></div>
						<div id="esallefond"><img src="/escaperpg/images/gaea1/plan/eclosed.png" id="esallemiddle" <?= $_SESSION['evisited'] ? 'class="hidden"' : null ?>></div>
						<div id="fsallefond"><img src="/escaperpg/images/gaea1/plan/fclosed.png" id="fsallemiddle" <?= $_SESSION['fvisited'] ? 'class="hidden"' : null ?>></div>
						<div id="gsallefond"><img src="/escaperpg/images/gaea1/plan/gclosed.png" id="gsallemiddle" <?= $_SESSION['gvisited'] ? 'class="hidden"' : null ?>></div>
						<div id="isallefond"><img src="/escaperpg/images/gaea1/plan/iclosed.png" id="isallemiddle" <?= $_SESSION['ivisited'] ? 'class="hidden"' : null ?>></div>
						<div id="msallefond"><img src="/escaperpg/images/gaea1/plan/mclosed.png" id="msallemiddle" <?= $_SESSION['mvisited'] ? 'class="hidden"' : null ?>></div>
						<div id="ssallefond"><img src="/escaperpg/images/gaea1/plan/sclosed.png" id="ssallemiddle" <?= $_SESSION['svisited'] ? 'class="hidden"' : null ?>></div>
						<div id="hsallefond"><img src="/escaperpg/images/gaea1/plan/hunknown.png" id="hsalletop" <?= $_SESSION['htested'] ? 'class="hidden"' : null ?>></div>
						<div id="nsallefond"><img src="/escaperpg/images/gaea1/plan/nunknown.png" id="nsalletop" <?= $_SESSION['ntested'] ? 'class="hidden"' : null ?>></div>
						<div id="asallefond"><img src="/escaperpg/images/gaea1/plan/aunknown.png" id="asalletop" <?= $_SESSION['atested'] ? 'class="hidden"' : null ?>></div>
						<div id="bsallefond"><img src="/escaperpg/images/gaea1/plan/bunknown.png" id="bsalletop" <?= $_SESSION['btested'] ? 'class="hidden"' : null ?>></div>
						<div id="csallefond"><img src="/escaperpg/images/gaea1/plan/cunknown.png" id="csalletop" <?= $_SESSION['ctested'] ? 'class="hidden"' : null ?>></div>
						<div id="dsallefond"><img src="/escaperpg/images/gaea1/plan/dunknown.png" id="dsalletop" <?= $_SESSION['dtested'] ? 'class="hidden"' : null ?>></div>
						<div id="esallefond"><img src="/escaperpg/images/gaea1/plan/eunknown.png" id="esalletop" <?= $_SESSION['etested'] ? 'class="hidden"' : null ?>></div>
						<div id="fsallefond"><img src="/escaperpg/images/gaea1/plan/funknown.png" id="fsalletop" <?= $_SESSION['ftested'] ? 'class="hidden"' : null ?>></div>
						<div id="gsallefond"><img src="/escaperpg/images/gaea1/plan/gunknown.png" id="gsalletop" <?= $_SESSION['gtested'] ? 'class="hidden"' : null ?>></div>
						<div id="isallefond"><img src="/escaperpg/images/gaea1/plan/iunknown.png" id="isalletop" <?= $_SESSION['itested'] ? 'class="hidden"' : null ?>></div>
						<div id="jsallefond"><img src="/escaperpg/images/gaea1/plan/junknown.png" id="jsalletop" <?= $_SESSION['jtested'] ? 'class="hidden"' : null ?>></div>
						<div id="ksallefond"><img src="/escaperpg/images/gaea1/plan/kunknown.png" id="ksalletop" <?= $_SESSION['ktested'] ? 'class="hidden"' : null ?>></div>
						<div id="msallefond"><img src="/escaperpg/images/gaea1/plan/munknown.png" id="msalletop" <?= $_SESSION['mtested'] ? 'class="hidden"' : null ?>></div>
						<div id="psallefond"><img src="/escaperpg/images/gaea1/plan/punknown.png" id="psalletop" <?= $_SESSION['ptested'] ? 'class="hidden"' : null ?>></div>
						<div id="ssallefond"><img src="/escaperpg/images/gaea1/plan/sunknown.png" id="ssalletop" <?= $_SESSION['stested'] ? 'class="hidden"' : null ?>></div>
						<div id="tsallefond"><img src="/escaperpg/images/gaea1/plan/tunknown.png" id="tsalletop" <?= $_SESSION['ttested'] ? 'class="hidden"' : null ?>></div>
					</div>

					<div id="planevac">
						<div id="hsallefond" onmouseover="hsalle()"><img src="/escaperpg/images/gaea1/plan/hover.png" id="hsalleover" class="hidden" onclick="hsalleclick()"></div>
						<div id="nsallefond" onmouseover="nsalle()"><img src="/escaperpg/images/gaea1/plan/nover.png" id="nsalleover" class="hidden" onclick="nsalleclick()"></div>
						<div id="asallefond" onmouseover="asalle()"><img src="/escaperpg/images/gaea1/plan/aover.png" id="asalleover" class="hidden" onclick="asalleclick()"></div>
						<div id="bsallefond" onmouseover="bsalle()"><img src="/escaperpg/images/gaea1/plan/bover.png" id="bsalleover" class="hidden" onclick="bsalleclick()"></div>
						<div id="csallefond" onmouseover="csalle()"><img src="/escaperpg/images/gaea1/plan/cover.png" id="csalleover" class="hidden" onclick="csalleclick()"></div>
						<div id="dsallefond" onmouseover="dsalle()"><img src="/escaperpg/images/gaea1/plan/dover.png" id="dsalleover" class="hidden" onclick="dsalleclick()"></div>
						<div id="esallefond" onmouseover="esalle()"><img src="/escaperpg/images/gaea1/plan/eover.png" id="esalleover" class="hidden" onclick="esalleclick()"></div>
						<div id="fsallefond" onmouseover="fsalle()"><img src="/escaperpg/images/gaea1/plan/fover.png" id="fsalleover" class="hidden" onclick="fsalleclick()"></div>
						<div id="gsallefond" onmouseover="gsalle()"><img src="/escaperpg/images/gaea1/plan/gover.png" id="gsalleover" class="hidden" onclick="gsalleclick()"></div>
						<div id="isallefond" onmouseover="isalle()"><img src="/escaperpg/images/gaea1/plan/iover.png" id="isalleover" class="hidden" onclick="isalleclick()"></div>
						<div id="jsallefond" onmouseover="jsalle()"><img src="/escaperpg/images/gaea1/plan/jover.png" id="jsalleover" class="hidden" onclick="jsalleclick()"></div>
						<div id="ksallefond" onmouseover="ksalle()"><img src="/escaperpg/images/gaea1/plan/kover.png" id="ksalleover" class="hidden" onclick="ksalleclick()"></div>
						<div id="lsallefond" onmouseover="lsalle()"><img src="/escaperpg/images/gaea1/plan/lover.png" id="lsalleover" class="hidden" onclick="lsalleclick()"></div>
						<div id="msallefond" onmouseover="msalle()"><img src="/escaperpg/images/gaea1/plan/mover.png" id="msalleover" class="hidden" onclick="msalleclick()"></div>
						<div id="osallefond" onmouseover="osalle()"><img src="/escaperpg/images/gaea1/plan/oover.png" id="osalleover" class="hidden" onclick="osalleclick()"></div>
						<div id="psallefond" onmouseover="psalle()"><img src="/escaperpg/images/gaea1/plan/pover.png" id="psalleover" class="hidden" onclick="psalleclick()"></div>
						<div id="qsallefond" onmouseover="qsalle()"><img src="/escaperpg/images/gaea1/plan/qover.png" id="qsalleover" class="hidden" onclick="qsalleclick()"></div>
						<div id="rsallefond" onmouseover="rsalle()"><img src="/escaperpg/images/gaea1/plan/rover.png" id="rsalleover" class="hidden" onclick="rsalleclick()"></div>
						<div id="ssallefond" onmouseover="ssalle()"><img src="/escaperpg/images/gaea1/plan/sover.png" id="ssalleover" class="hidden" onclick="ssalleclick()"></div>
						<div id="tsallefond" onmouseover="tsalle()"><img src="/escaperpg/images/gaea1/plan/tover.png" id="tsalleover" class="hidden" onclick="tsalleclick()"></div>
					</div>
					
					<?php if ($_SESSION['plancurrent'] != null): ?>
						<div id="planevacoverlay">
							<div id="<?= $_SESSION['plancurrent'] ?>sallefond">
								<div id="tokenpj"><img src="/escaperpg/images/gaea1/avatar/fond.png"><?= $_SESSION['avatar'] ?></div>
							</div>
						</div>
					<?php endif; ?>
						
					<?php if ($_SESSION['detruire']): ?>
						<div id="planevacoverlay"><div id="esallefond"><div id="tokenobjectif"></div></div></div>
					<?php endif; ?>

				</div>

				<?php if ($_SESSION['premiereobservation']): ?>
					<p>
						La structure ne semble pas être très grande,
						mais les salles sont indiquées dans le dialecte inconnu propre à cette station et vous ne parvenez pas à identifier ce qui pourrait être la passerelle.
						Vous allez devoir visiter chaque pièce une à une jusqu\'à trouver la bonne.
					</p>

					<?php $_SESSION['premiereobservation'] = false; ?>
				<?php endif; ?>

				<p>
					Vous pouvez vous rendre dans n'importe quelle salle déjà visitée auparavant.<br>
					En revanche, vous ne pouvez essayer d'aller que dans les salles ayant un accès direct à un lieu déjà parcouru.
				</p>
			</div>

			<script src="/escaperpg/aventures/gaea1/scripts/plan.js"></script>
		</div>

		<div id="load"><div id="loader"></div></div>

		<script src="/escaperpg/scripts/aventures-chargement.js"></script>

		<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/gaea1/includes/footer.php"; ?>
	</body>
</html>