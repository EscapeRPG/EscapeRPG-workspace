function rangecheck()
	{
		var range = document.getElementById("range").value;

		if (range == 4)
			{
				alert("La machine commence à émettre un doux ronronnement.");
				document.location.href="repairs.php";
			}
		else
			{
				alert("Rien ne se passe.");
				document.location.href="reparations2.php";
			}
	}

