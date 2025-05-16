<nav>
	<?php if (isset($_SESSION['pjnom'])): ?>
		<div id="namenav">
			<?= ($_SESSION['genre'] ? ($_SESSION['feminin'] ? 'Commandante' : 'Commandant') : null) . ' ' . htmlspecialchars(ucfirst($_SESSION['pjprenom']) . ' ' . (strtoupper($_SESSION['pjnom']))) ?>
		</div>

		<div id="avatarnav-wrap">
			<img src="/escaperpg/images/gaea1/avatar/fond.png">
			<div id="avatarnav">
				<?= $_SESSION['avatar'] ?>

				<?php if ($_SESSION['combinaison']): ?>
					<img src="/escaperpg/images/gaea1/avatar/<?= $_SESSION['feminin'] ? 'combinaisonfemme' : 'combinaisonhomme' ?>.png">
				<?php endif; ?>
			</div>
		</div>
	<?php endif; ?>

	<?php if ($_SESSION['combinaison']): ?>
		<div id="namenav">
			<h1>État de la combinaison :</h1>
			- Intégrité : <span class="systemes">100%</span>.<br>
			- Oxygène : <span class="<?= $_SESSION['oxygene'] > 50 ? 'systemes' : ($_SESSION['oxygene'] > 20 ? 'systemesdemi' : 'important') ?>"><?= $_SESSION['oxygene'] ?>%</span>.<br>
			- Sous-systèmes : <span class="systemes">OK</span>.
		</div>
	<?php endif; ?>

	<?php if ($_SESSION['visitestation']): ?>
		<div id="plan">
			<a href="plan"><img src="/escaperpg/images/gaea1/plan/fondcurrent.png" title="Accéder au plan de la station."></a>
			<div id="planevacoverlay">
				<div id="<?= $_SESSION['plancurrent'] ?>sallefond"><img src="/escaperpg/images/gaea1/plan/<?= $_SESSION['plancurrent'] ?>over.png"></div>

				<?php if ($_SESSION['detruire']): ?>
					<div id="esallefond">
						<div id="tokenobjectif"></div>
					</div>
				<?php endif; ?>

				<?php if ($_SESSION['fuir']): ?>
					<div id="qsallefond">
						<div id="tokenobjectif"></div>
					</div>
				<?php endif; ?>
			</div>
		</div>
	<?php endif; ?>

	<div id="inventairefooter"><input type="submit" onclick="inventaireshow()" value="INVENTAIRE"></div>

	<div id="motsdepasse"><input type="submit" onclick="mdpshow()" value="NOTES"></div>

	<a href="/escaperpg/aventures/gaea1/save/save" target="_blank" rel="noreferrer"><input type="submit" name="save" value="SAUVEGARDER"></a>
</nav>

<?php if (
	$_SESSION['avisited']
	&& $_SESSION['bvisited']
	&& $_SESSION['cvisited']
	&& $_SESSION['dvisited']
	&& $_SESSION['evisited']
	&& $_SESSION['fvisited']
	&& $_SESSION['gvisited']
	&& $_SESSION['hvisited']
	&& $_SESSION['ivisited']
	&& $_SESSION['jvisited']
	&& $_SESSION['kvisited']
	&& $_SESSION['lvisited']
	&& $_SESSION['mvisited']
	&& $_SESSION['nvisited']
	&& $_SESSION['ovisited']
	&& $_SESSION['pvisited']
	&& $_SESSION['qvisited']
	&& $_SESSION['rvisited']
	&& $_SESSION['svisited']
	&& $_SESSION['tvisited']
): ?>
	<div id="succespopup">
		<?php
		$nouveausucces = '<img src="/escaperpg/images/succes/gaea1/touriste.png"><span><u><b>Touriste</b></u><br>Visiter l\'intégralité de la station</span>';
		$scenario = 'gaea1';
		$description = 'touriste';
		$cache = 'non';
		$rarete = 'succesargent';
		include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/succesadd.php";
		?>
	</div>
<?php endif; ?>
