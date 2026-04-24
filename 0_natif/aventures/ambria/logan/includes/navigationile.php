<br>
<h1>
	<br>
	Navigation
</h1>
<?php
	if ($_SESSION['portescite'])
		{
			echo'
				<ul>
					<li>
						<a href="plage.php">Plage</a>
					</li>
				</ul>
			';
			if ($_SESSION['torcheseteintes'])
				{
					echo'
						<ul>
							<li>
								<a href="grottestorcheseteintes.php">Grottes</a>
							</li>
						</ul>
					';
				}
			else
				{
					echo'
						<ul>
							<li>
								<a href="grottestorchesallumees.php">Grottes</a>
							</li>
						</ul>
					';
				}
			echo'
				<ul class="navbottom">
					<li>
						<a href="portescite.php">Portes de la Cité</a>
					</li>
					<br>
				</ul>
			';
		}
	elseif ($_SESSION['grottes'])
		{
			echo'
				<ul>
					<li>
						<a href="plage.php">Plage</a>
					</li>
				</ul>
			';
			if ($_SESSION['torcheseteintes'])
				{
					echo'
						<ul class="navbottom">
							<li>
								<a href="grottestorcheseteintes.php">Grottes</a>
							</li>
					<br>
						</ul>
					';
				}
			else
				{
					echo'
						<ul class="navbottom">
							<li>
								<a href="grottestorchesallumees.php">Grottes</a>
							</li>
					<br>
						</ul>
					';
				}
		}
	else
		{
			echo'
				<ul class="navbottom">
					<li>
						<a href="plage.php">Plage</a>
					</li>
					<br>
				</ul>
			';
		}
?>