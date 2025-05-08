<footer>
	<div id="inventaireshow" class="footerhidden">
		<?php
			if ($_SESSION['ambriawhisky']
			OR $_SESSION['ambriajournalsullivan']
			OR $_SESSION['bourse']
			OR $_SESSION['tablette'])
				{
					if ($_SESSION['ambriawhisky'])
						{
							echo '
								<div id="inventaire">
									<a href="/escaperpg/images/ambria/fonddewhisky.png" rel="lightbox[invent]" title="Fond de whisky"><img src="/escaperpg/images/ambria/fonddewhisky.png" title="Une bouteille contenant un fond de whisky donnée par le gérant de la taverne."></a>
								</div>
							';
						}
					if ($_SESSION['bourse'])
						{
							echo '
								<div id="inventaire">
									<a href="/escaperpg/images/ambria/bourseencuir.png" rel="lightbox[invent]" title="Bourse en cuir"><img src="/escaperpg/images/ambria/bourseencuir.png" title="Une bourse en cuir trouvée par terre."></a>
								</div>
							';
						}
					if ($_SESSION['ambriajournalsullivan'])
						{
							echo '
								<div id="inventaire">
									<a href="/escaperpg/images/ambria/journalsullivan.png" rel="lightbox[invent]" title="Journal de Sullivan"><img src="/escaperpg/images/ambria/journalsullivan.png" title="Votre journal de bord, où vous consignez nombre d\'informations utiles."></a>
								</div>
							';
						}
					if ($_SESSION['tablette'])
						{
							echo '
								<div id="inventaire">
									<a href="/escaperpg/images/ambria/porte/tablette.png" rel="lightbox[sullivan]" title="Tablette en or gravée"><img src="/escaperpg/images/ambria/porte/tablette.png" title="Une tablette en or gravée."></a>
								</div>
							';
						}
				}
			else
				{
					echo '
						<p>
							Il n\'y a rien dans votre inventaire pour le moment.
						</p>
					';
				}
		?>
	</div>
	<div id="motsdepasseshow" class="footerhidden">
		<p>
			<?php
				if ($_SESSION['mdp1']
				OR $_SESSION['mdp2']
				OR $_SESSION['mdp3']
				OR $_SESSION['mdp4']
				OR $_SESSION['mdp5']
				OR $_SESSION['mdp6']
				OR $_SESSION['mdp7']
				OR $_SESSION['mdp8']
				OR $_SESSION['mdp9']
				OR $_SESSION['mdp10']
				OR $_SESSION['mdp11']
				OR $_SESSION['mdp12']
				OR $_SESSION['mdp13']
				OR $_SESSION['mdp14']
				OR $_SESSION['mdp15']
				OR $_SESSION['mdp16']
				OR $_SESSION['mdp17']
				OR $_SESSION['mdp18']
				OR $_SESSION['mdp19']
				OR $_SESSION['mdp20']
				OR $_SESSION['mdp21']
				OR $_SESSION['mdp22']
				OR $_SESSION['mdp23']
				OR $_SESSION['mdp24']
				OR $_SESSION['mdp25']
				OR $_SESSION['mdp26'])
					{
						if ($_SESSION['mdp1'])
							{ echo 'Peter - Don - Louis - Bernard'; }
						if ($_SESSION['mdp2'])
							{ echo ' - Vieux type';} 
						if ($_SESSION['mdp3'])
							{ echo ' - C\'est à toi je crois'; }
						if ($_SESSION['mdp4'])
							{ echo ' - Derrière toi'; }
						if ($_SESSION['mdp26'])
							{ echo ' - Fond de whisky'; }
						if ($_SESSION['mdp5'])
							{ echo ' - On sort';} 
						if ($_SESSION['mdp6'])
							{ echo ' - Logan'; }
						if ($_SESSION['mdp7'])
							{ echo ' - Jake'; }
						if ($_SESSION['mdp8'])
							{ echo ' - Suis-moi'; }
						if ($_SESSION['mdp25'])
							{ echo ' - Tout le monde à son poste'; }
						if ($_SESSION['mdp21'])
							{ echo ' - Barre à tribord'; }
						if ($_SESSION['mdp22'])
							{ echo ' - Branle-bas'; }
						if ($_SESSION['mdp9'])
							{ echo ' - Affale'; }
						if ($_SESSION['mdp10'])
							{ echo ' - Ferle'; }
						if ($_SESSION['mdp11'])
							{ echo ' - Les tonneaux'; }
						if ($_SESSION['mdp12'])
							{ echo ' - Chaloupe'; }
						if ($_SESSION['mdp13'])
							{ echo ' - Sortez les rames'; }
						if ($_SESSION['mdp14'])
							{ echo ' - Rames'; }
						if ($_SESSION['mdp15'])
							{ echo ' - Accoster'; }
						if ($_SESSION['mdp16'])
							{ echo ' - Première prime'; }
						if ($_SESSION['mdp18'])
							{ echo ' - Épaule'; }
						if ($_SESSION['mdp19'])
							{ echo ' - Tout va bien'; }
						if ($_SESSION['mdp20'])
							{ echo ' - Rien de cassé'; }
						if ($_SESSION['mdp23'])
							{ echo ' - Rassemble les gars'; }
						if ($_SESSION['mdp24'])
							{ echo ' - Fais venir les gars'; }
					}
				else
					{
						echo '
							<p>
								Vous n\'avez trouvé aucun mot de passe pour le moment.
							</p>
						';
					}
			?>
		</p>
	</div>
</footer>

<script src="/escaperpg/scripts/footershow.js"></script>