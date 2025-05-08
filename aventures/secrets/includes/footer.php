<footer>
	<div id="inventaireshow" class="footerhidden">
		<?php
			if ($_SESSION['sdi']
			OR $_SESSION['sad']
			OR $_SESSION['sev']
			OR $_SESSION['spo']
			OR $_SESSION['sse']
			OR $_SESSION['coffret']
			OR $_SESSION['papier']
			OR $_SESSION['templar']
			OR $_SESSION['flacon']
			OR $_SESSION['antidote']
			OR $_SESSION['recette']
			OR $_SESSION['journal1']
			OR $_SESSION['journal2']
			OR $_SESSION['journal3']
			OR $_SESSION['journal4']
			OR $_SESSION['journal5']
			OR $_SESSION['journal6']
			OR $_SESSION['journal7']
			OR $_SESSION['journal8']
			OR $_SESSION['journal9']
			OR $_SESSION['note']
			OR $_SESSION['oldcle']
			OR $_SESSION['petitecle']
			OR $_SESSION['restab']
			OR $_SESSION['magna']
			OR $_SESSION['talisman']
			OR $_SESSION['pnakotiques']
			OR $_SESSION['pnakotiquesnotes'])
				{
					if ($_SESSION['sad'])
						{
							echo '
								<div id="inventaire">
									<a href="/escaperpg/images/secrets/ad.png" rel="lightbox[invent]"><img src="/escaperpg/images/secrets/ad.png" title="Une pièce où figure le visage d\'un jeune homme, trouvée sous le lit de votre oncle."></a>
								</div>
							';
						}
					if ($_SESSION['sse'])
						{
							echo '
								<div id="inventaire">
									<a href="/escaperpg/images/secrets/se.png" rel="lightbox[invent]"><img src="/escaperpg/images/secrets/se.png" title="Une pièce trouvée chez Pellington, après son suicide. Un serpent y figure."></a>
								</div>
							';
						}
					if ($_SESSION['sdi'])
						{
							echo '
								<div id="inventaire">
									<a href="/escaperpg/images/secrets/di.png" rel="lightbox[invent]"><img src="/escaperpg/images/secrets/di.png" title="Une pièce représentant un vieil homme barbu trouvée dans le coffre-fort de la chambre de William."></a>
								</div>
							';
						}
					if ($_SESSION['spo'])
						{
							echo '
								<div id="inventaire">
									<a href="/escaperpg/images/secrets/po.png" rel="lightbox[invent]"><img src="/escaperpg/images/secrets/po.png" title="Une pièce laissée par le cambrioleur lors de son intrusion. Un fruit y est représenté."></a>
								</div>
							';
						}
					if ($_SESSION['sev'])
						{
							echo '
								<div id="inventaire">
									<a href="/escaperpg/images/secrets/ev.png" rel="lightbox[invent]"><img src="/escaperpg/images/secrets/ev.png" title="Une pièce trouvée dans le grenier, sur laquelle vous pouvez voir le visage d\'une jeune femme."></a>
								</div>
							';
						}
					if ($_SESSION['coffret'])
						{
							echo '
								<div id="inventaire">
									<a href="/escaperpg/aventures/secrets/manoir/coffret.php"><img src="/escaperpg/images/secrets/coffret.png" title="Un coffret étrange trouvé dans le coffre-fort de votre oncle. Impossible de l\'ouvrir à la main."></a>
								</div>
							';
						}
					if ($_SESSION['papier'])
						{
							echo '
								<div id="inventaire">
									<a href="/escaperpg/aventures/secrets/manoir/papier.php"><img src="/escaperpg/images/secrets/papier.png" title="Un papier trouvé dans le coffret mystérieux. Une phrase énigmatique y est inscrite."></a>
								</div>
							';
						}
					if ($_SESSION['templar'])
						{
							echo '
								<div id="inventaire">
									<a href="/escaperpg/images/secrets/templar.png" rel="lightbox[invent]"><img src="/escaperpg/images/secrets/templar.png" title="Des petits papiers trouvés dans un livre de la bibliothèque. Pourraient-ils servir à déchiffrer quelque chose ?"></a>
								</div>
							';
						}
					if ($_SESSION['flacon'])
						{
							echo '
								<div id="inventaire">
									<a href="/escaperpg/images/secrets/flacon.png" rel="lightbox[invent]"><img src="/escaperpg/images/secrets/flacon.png" title="Un flacon de barbiturique vide trouvé dans la veste de Pellington."></a>
								</div>
							';
						}
					if ($_SESSION['antidote'])
						{
							echo '
								<div id="inventaire">
									<a href="/escaperpg/images/secrets/analeptique.png" rel="lightbox[invent]"><img src="/escaperpg/images/secrets/analeptique.png" title="Un analeptique concocté chez le docteur Pellington."></a>
								</div>
							';
						}
					if ($_SESSION['recette'])
						{
							echo '
								<div id="inventaire">
									<a href="/escaperpg/images/secrets/recette.png" rel="lightbox[invent]"><img src="/escaperpg/images/secrets/recette.png" title="Une recette pour concocter un remède contre le barbiturique trouvée dans le laboratoire du docteur."></a>
								</div>
							';
						}
					if ($_SESSION['journal1'])
						{
							echo '
								<div id="inventaire">
									<a href="/escaperpg/images/secrets/journal1.png" rel="lightbox[invent]"><img src="/escaperpg/images/secrets/journal1.png" title="Une page du journal de votre oncle."></a>
								</div>
							';
						}
					if ($_SESSION['journal2'])
						{
							echo '
								<div id="inventaire">
									<a href="/escaperpg/images/secrets/journal2.png" rel="lightbox[invent]"><img src="/escaperpg/images/secrets/journal2.png" title="Une page du journal de votre oncle."></a>
								</div>
							';
						}
					if ($_SESSION['journal3'])
						{
							echo '
								<div id="inventaire">
									<a href="/escaperpg/images/secrets/journal3.png" rel="lightbox[invent]"><img src="/escaperpg/images/secrets/journal3.png" title="Une page du journal de votre oncle."></a>
								</div>
							';
						}
					if ($_SESSION['journal4'])
						{
							echo '
								<div id="inventaire">
									<a href="/escaperpg/images/secrets/journal4.png" rel="lightbox[invent]"><img src="/escaperpg/images/secrets/journal4.png" title="Une page du journal de votre oncle."></a>
								</div>
							';
						}
					if ($_SESSION['journal5'])
						{
							echo '
								<div id="inventaire">
									<a href="/escaperpg/images/secrets/journal5.png" rel="lightbox[invent]"><img src="/escaperpg/images/secrets/journal5.png" title="Une page du journal de votre oncle."></a>
								</div>
							';
						}
					if ($_SESSION['journal6'])
						{
							echo '
								<div id="inventaire">
									<a href="/escaperpg/images/secrets/journal6.png" rel="lightbox[invent]"><img src="/escaperpg/images/secrets/journal6.png" title="Une page du journal de votre oncle."></a>
								</div>
							';
						}
					if ($_SESSION['journal7'])
						{
							echo '
								<div id="inventaire">
									<a href="/escaperpg/images/secrets/journal7.png" rel="lightbox[invent]"><img src="/escaperpg/images/secrets/journal7.png" title="Une page du journal de votre oncle."></a>
								</div>
							';
						}
					if ($_SESSION['journal8'])
						{
							echo '
								<div id="inventaire">
									<a href="/escaperpg/images/secrets/journal8.png" rel="lightbox[invent]"><img src="/escaperpg/images/secrets/journal8.png" title="Une page du journal de votre oncle."></a>
								</div>
							';
						}
					if ($_SESSION['journal9'])
						{
							echo '
								<div id="inventaire">
									<a href="/escaperpg/images/secrets/journal9.png" rel="lightbox[invent]"><img src="/escaperpg/images/secrets/journal9.png" title="Une page du journal de votre oncle."></a>
								</div>
							';
						}
					if ($_SESSION['note'])
						{
							echo '
								<div id="inventaire">
									<a href="/escaperpg/images/secrets/aveux.png" rel="lightbox[invent]"><img src="/escaperpg/images/secrets/aveux.png" title="Les derniers mots de Pellington avant son suicide. Ils donnent les indications pour ouvrir le coffre-fort de la chambre de votre oncle."></a>
								</div>
							';
						}
					if ($_SESSION['oldcle'])
						{
							echo '
								<div id="inventaire">
									<a href="/escaperpg/images/secrets/oldcle.png" rel="lightbox[invent]" title="vieillecle"><img src="/escaperpg/images/secrets/oldcle.png" title="vieillecle"></a>
								</div>
							';
						}
					if ($_SESSION['petitecle'])
						{
							echo '
								<div id="inventaire">
									<a href="/escaperpg/images/secrets/petitecle.png" rel="lightbox[invent]"><img src="/escaperpg/images/secrets/petitecle.png" title="Une petite clé. Que peut-elle ouvrir ?"></a>
								</div>
							';
						}
					if ($_SESSION['restab'])
						{
							echo '
								<div id="inventaire">
									<a href="/escaperpg/aventures/secrets/manoir/tableaubrule.php"><img src="/escaperpg/images/secrets/tableaubrule.png" title="Des fragments de tableau brûlés. Si seulement vous pouviez retrouver l\'œuvre originale !"></a>
								</div>
							';
						}
					if ($_SESSION['magna'])
						{
							echo '
								<div id="inventaire">
									<a href="/escaperpg/images/secrets/magnamater.png" rel="lightbox[invent]"><img src="/escaperpg/images/secrets/magnamater.png" title="Le livre préféré de votre oncle. Il s\'agit du tome 2 de la collection."></a>
								</div>
							';
						}
					if ($_SESSION['talisman'])
						{
							echo '
								<div id="inventaire">
									<a href="/escaperpg/images/secrets/talisman.png" rel="lightbox[invent]"><img src="/escaperpg/images/secrets/talisman.png" title="Le talisman que vous a donné Gaspard. Il est censé vous porter chance, quelle forme pourrait-elle prendre ?"></a>
								</div>
							';
						}
					if ($_SESSION['pnakotiques'])
						{
							echo '
								<div id="inventaire">
									<a href="/escaperpg/images/secrets/pnakotiques.png" rel="lightbox[invent]"><img src="/escaperpg/images/secrets/pnakotiques.png" title="Les Manuscrits Pnakotiques, où se trouvent tout un tas de formules de magie."></a>
								</div>
							';
						}
					if ($_SESSION['pnakotiquesnotes'])
						{
							echo '
								<div id="inventaire">
									<a href="/escaperpg/images/secrets/pnakotiquesnotes.png" rel="lightbox[invent]"><img src="/escaperpg/images/secrets/pnakotiquesnotes.png" title="Une feuille volante trouvée dans les Manuscrits Pnakotiques aidant à comprendre la signification de symboles magiques."></a>
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
				OR $_SESSION['mdp26']
				OR $_SESSION['mdp27'])
					{
						if ($_SESSION['mdp1'])
							{ echo 'Sacoche de médecin'; }
						if ($_SESSION['mdp2'])
							{ echo ' - Voiture grise'; }
						if ($_SESSION['mdp3'])
							{ echo ' - Gaspard'; }
						if ($_SESSION['mdp4'])
							{ echo ' - Pellington'; }
						if ($_SESSION['mdp5'])
							{ echo ' - Domestiques'; }
						if ($_SESSION['mdp6'])
							{ echo ' - Chiens'; }
						if ($_SESSION['mdp7'])
							{ echo ' - Soucis'; }
						if ($_SESSION['mdp8'])
							{ echo ' - Odeur'; }
						if ($_SESSION['mdp9'])
							{ echo ' - Téona'; }
						if ($_SESSION['mdp10'])
							{ echo ' - Monica'; }
						if ($_SESSION['mdp11'])
							{ echo ' - Mme Nouveau'; }
						if ($_SESSION['mdp12'])
							{ echo ' - Fuite'; }
						if ($_SESSION['mdp13'])
							{ echo ' - Bureau'; }
						if ($_SESSION['mdp22'])
							{ echo ' - Symbole'; }
						if ($_SESSION['mdp14'])
							{ echo ' - Coupures de courant'; }
						if ($_SESSION['mdp15'])
							{ echo ' - Empreinte de pas'; }
						if ($_SESSION['mdp16'])
							{ echo ' - Nourriture'; }
						if ($_SESSION['mdp17'])
							{ echo ' - Barbiturique'; }
						if ($_SESSION['mdp18'])
							{ echo ' - Analeptique'; }
						if ($_SESSION['mdp19'])
							{ echo ' - Opus favori'; }
						if ($_SESSION['mdp20'])
							{ echo ' - Tableau'; }
						if ($_SESSION['mdp21'])
							{ echo ' - Magna Mater'; }
						if ($_SESSION['mdp23'])
							{ echo ' - Deuxième (2)'; }
						if ($_SESSION['mdp24'])
							{ echo ' - Restes'; }
						if ($_SESSION['mdp25'])
							{ echo ' - Vieille clé'; }
						if ($_SESSION['mdp26'])
							{ echo ' - Cadavres'; }
						if ($_SESSION['mdp27'])
							{ echo ' - Liquide Jaunâtre'; }
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