<footer>
	<div id="inventaireshow" class="footerhidden">
		<?php
			if ($_SESSION['parchemin']
			OR $_SESSION['cletypecolere']
			OR $_SESSION['biscuits']
			OR $_SESSION['chapeautypecolere']
			OR $_SESSION['cledocks']
			OR $_SESSION['victuailles'])
				{
					if ($_SESSION['parchemin'])
						{
							echo '
								<div id="inventaire">
									<a href="/escaperpg/images/ambria/parchemin.png" rel="lightbox[invent]"><img src="/escaperpg/images/ambria/parchemin.png" title="Les instructions pour Ambria."></a>
								</div>
							';
						}
					if ($_SESSION['cletypecolere'])
						{
							echo '
								<div id="inventaire">
									<a href="/escaperpg/images/ambria/cletypecolere.png" rel="lightbox[invent]"><img src="/escaperpg/images/ambria/cletypecolere.png" title="La clé du type en colère, elle ouvre l\'arrière-cour de la taverne."></a>
								</div>
							';
						}
					if ($_SESSION['biscuits'])
						{
							echo '
								<div id="inventaire">
									<a href="/escaperpg/images/ambria/biscuits.png" rel="lightbox[invent]"><img src="/escaperpg/images/ambria/biscuits.png" title="Des biscuits rassis. Un mets de choix pour certains oiseaux."></a>
								</div>
							';
						}
					if ($_SESSION['chapeautypecolere'])
						{
							echo '
								<div id="inventaire">
									<a href="/escaperpg/images/ambria/chapeautypecolere.png" rel="lightbox[invent]"><img src="/escaperpg/images/ambria/chapeautypecolere.png" title="Le chapeau du type en colère, volé par une mouette. Vous devriez le lui rapporter."></a>
								</div>
							';
						}
					if ($_SESSION['cledocks'])
						{
							echo '
								<div id="inventaire">
									<a href="/escaperpg/images/ambria/cledocks.png" rel="lightbox[invent]"><img src="/escaperpg/images/ambria/cledocks.png" title="La clé permettant de se rendre sur les docks."></a>
								</div>
							';
						}
					if ($_SESSION['victuailles'])
						{
							echo '
								<div id="inventaire">
									<a href="/escaperpg/images/ambria/victuailles.png" rel="lightbox[invent]"><img src="/escaperpg/images/ambria/victuailles.png" title="Un sac de victuailles récupéré au mess pour le timonier."></a>
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
				if ($_SESSION['mdp20']
				OR $_SESSION['mdp1']
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
				OR $_SESSION['mdp19'])
					{
						if ($_SESSION['mdp20'])
							{ echo 'Bourse en cuir'; }
						if ($_SESSION['mdp1'])
							{ echo '- Qui êtes-vous'; }
						if ($_SESSION['mdp2'])
							{ echo '- Attention'; }
						if ($_SESSION['mdp3'])
							{ echo '- Baissez-vous'; }
						if ($_SESSION['mdp4'])
							{ echo '- Compris'; }
						if ($_SESSION['mdp5'])
							{ echo '- Logan'; }
						if ($_SESSION['mdp6'])
							{ echo '- Scélérate à bâbord'; }
						if ($_SESSION['mdp7'])
							{ echo '- Scélérate à tribord'; }
						if ($_SESSION['mdp8'])
							{ echo '- Allons-y capitaine'; }
						if ($_SESSION['mdp9'])
							{ echo '- Il a bougé'; }
						if ($_SESSION['mdp10'])
							{ echo '- Maintenant'; }
						if ($_SESSION['mdp11'])
							{ echo '- Que faisons-nous'; }
						if ($_SESSION['mdp12'])
							{ echo '- Sortir de là'; }
						if ($_SESSION['mdp13'])
							{ echo '- Bougez pas'; }
						if ($_SESSION['mdp14'])
							{ echo '- Attendez capitaine'; }
						if ($_SESSION['mdp15'])
							{ echo '- Vous avez raison'; }
						if ($_SESSION['mdp16'])
							{ echo '- Je vous suis'; }
						if ($_SESSION['mdp17'])
							{ echo '- Préparez-vous'; }
						if ($_SESSION['mdp18'])
							{ echo '- C\'est bon'; }
						if ($_SESSION['mdp19'])
							{ echo '- Ça marche'; }
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