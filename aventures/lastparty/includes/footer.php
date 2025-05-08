<footer>
	<div id="inventaireshow" class="footerhidden">
		<?php
			if ($_SESSION['carnet'] OR $_SESSION['cartevisite'])
				{
					if ($_SESSION['carnet'])
						{
							echo '
								<div id="inventaire">
									<a href="/escaperpg/images/lastparty/carnet.png" rel="lightbox[invent]"><img src="/escaperpg/images/lastparty/carnet.png" title="Un carnet où vous avez noté tous vos mots de passe."></a>
								</div>
							';
						}
					if ($_SESSION['cartevisite'])
						{
							echo '
								<div id="inventaire">
									<a href="/escaperpg/images/lastparty/cartedevisite.png" rel="lightbox[invent]"><img src="/escaperpg/images/lastparty/cartedevisite.png" title="Une carte de visite d\'un certain Darren Braun."></a>
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
				if ($_SESSION['mdp1'] OR $_SESSION['mdp2'])
					{
						if ($_SESSION['mdp1'])
							{
								echo '
									jonathan-lt
								';
							}
						if ($_SESSION['mdp2'])
							{
								echo '
									- juliette
								';
							}
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