var	coordonnee1 = document.getElementById('coordonnee1img'),
	coordonnee2 = document.getElementById('coordonnee2img'),
	coordonnee3 = document.getElementById('coordonnee3img'),
	coordonnee4 = document.getElementById('coordonnee4img'),
	panneaucache1 = document.getElementById('panneaucache1'),
	panneaucache2 = document.getElementById('panneaucache2'),
	panneaucache3 = document.getElementById('panneaucache3'),
	panneaucache4 = document.getElementById('panneaucache4'),
	boutonhaut1 = document.getElementById('boutonhaut1'),
	boutonhaut2 = document.getElementById('boutonhaut2'),
	boutonhaut3 = document.getElementById('boutonhaut3'),
	boutonhaut4 = document.getElementById('boutonhaut4'),
	boutonbas1 = document.getElementById('boutonbas1'),
	boutonbas2 = document.getElementById('boutonbas2'),
	boutonbas3 = document.getElementById('boutonbas3'),
	boutonbas4 = document.getElementById('boutonbas4'),
	boutonpress = new Audio('/escaperpg/sons/ambria/buttonpress.mp3');
	
function boutoncaphaut1()
	{
		boutonpress.play();
		boutonhaut1.classList.add("boutonhauton");
		boutonhaut1.classList.remove("boutonhaut");
		if (panneaucache1.textContent == 1)
			{
				coordonnee1.src="/escaperpg/images/ambria/cap/cap2.png";
				panneaucache1.textContent = 2;
			}
		else if (panneaucache1.textContent == 2)
			{
				coordonnee1.src="/escaperpg/images/ambria/cap/cap3.png";
				panneaucache1.textContent = 3;
			}
		else if (panneaucache1.textContent == 3)
			{
				coordonnee1.src="/escaperpg/images/ambria/cap/cap4.png";
				panneaucache1.textContent = 4;
			}
		else if (panneaucache1.textContent == 4)
			{
				coordonnee1.src="/escaperpg/images/ambria/cap/cap5.png";
				panneaucache1.textContent = 5;
			}
		else if (panneaucache1.textContent == 5)
			{
				coordonnee1.src="/escaperpg/images/ambria/cap/cap6.png";
				panneaucache1.textContent = 6;
			}
		else if (panneaucache1.textContent == 6)
			{
				coordonnee1.src="/escaperpg/images/ambria/cap/cap7.png";
				panneaucache1.textContent = 7;
			}
		else if (panneaucache1.textContent == 7)
			{
				coordonnee1.src="/escaperpg/images/ambria/cap/cap8.png";
				panneaucache1.textContent = 8;
			}
		else if (panneaucache1.textContent == 8)
			{
				coordonnee1.src="/escaperpg/images/ambria/cap/cap9.png";
				panneaucache1.textContent = 9;
			}
		else if (panneaucache1.textContent == 9)
			{
				coordonnee1.src="/escaperpg/images/ambria/cap/cap0.png";
				panneaucache1.textContent = 0;
			}
		else
			{
				coordonnee1.src="/escaperpg/images/ambria/cap/cap1.png";
				panneaucache1.textContent = 1;
			}
		setTimeout(removehaut, 200);
	}
	
function boutoncaphaut2()
	{
		boutonpress.play();
		boutonhaut2.classList.add("boutonhauton");
		boutonhaut2.classList.remove("boutonhaut");
		if (panneaucache2.textContent == 1)
			{
				coordonnee2.src="/escaperpg/images/ambria/cap/cap2.png";
				panneaucache2.textContent = 2;
			}
		else if (panneaucache2.textContent == 2)
			{
				coordonnee2.src="/escaperpg/images/ambria/cap/cap3.png";
				panneaucache2.textContent = 3;
			}
		else if (panneaucache2.textContent == 3)
			{
				coordonnee2.src="/escaperpg/images/ambria/cap/cap4.png";
				panneaucache2.textContent = 4;
			}
		else if (panneaucache2.textContent == 4)
			{
				coordonnee2.src="/escaperpg/images/ambria/cap/cap5.png";
				panneaucache2.textContent = 5;
			}
		else if (panneaucache2.textContent == 5)
			{
				coordonnee2.src="/escaperpg/images/ambria/cap/cap6.png";
				panneaucache2.textContent = 6;
			}
		else if (panneaucache2.textContent == 6)
			{
				coordonnee2.src="/escaperpg/images/ambria/cap/cap7.png";
				panneaucache2.textContent = 7;
			}
		else if (panneaucache2.textContent == 7)
			{
				coordonnee2.src="/escaperpg/images/ambria/cap/cap8.png";
				panneaucache2.textContent = 8;
			}
		else if (panneaucache2.textContent == 8)
			{
				coordonnee2.src="/escaperpg/images/ambria/cap/cap9.png";
				panneaucache2.textContent = 9;
			}
		else if (panneaucache2.textContent == 9)
			{
				coordonnee2.src="/escaperpg/images/ambria/cap/cap0.png";
				panneaucache2.textContent = 0;
			}
		else
			{
				coordonnee2.src="/escaperpg/images/ambria/cap/cap1.png";
				panneaucache2.textContent = 1;
			}
		setTimeout(removehaut, 200);
	}
	
function boutoncaphaut3()
	{
		boutonpress.play();
		boutonhaut3.classList.add("boutonhauton");
		boutonhaut3.classList.remove("boutonhaut");
		if (panneaucache3.textContent == "n")
			{
				coordonnee3.src="/escaperpg/images/ambria/cap/cape.png";
				panneaucache3.textContent = "e";
			}
		else if (panneaucache3.textContent == "e")
			{
				coordonnee3.src="/escaperpg/images/ambria/cap/caps.png";
				panneaucache3.textContent = "s";
			}
		else if (panneaucache3.textContent == "s")
			{
				coordonnee3.src="/escaperpg/images/ambria/cap/capo.png";
				panneaucache3.textContent = "o";
			}
		else if (panneaucache3.textContent == "o")
			{
				coordonnee3.src="/escaperpg/images/ambria/cap/captiret.png";
				panneaucache3.textContent = "t";
			}
		else
			{
				coordonnee3.src="/escaperpg/images/ambria/cap/capn.png";
				panneaucache3.textContent = "n";
			}
		setTimeout(removehaut, 200);
	}
	
function boutoncaphaut4()
	{
		boutonpress.play();
		boutonhaut4.classList.add("boutonhauton");
		boutonhaut4.classList.remove("boutonhaut");
		if (panneaucache4.textContent == "n")
			{
				coordonnee4.src="/escaperpg/images/ambria/cap/cape.png";
				panneaucache4.textContent = "e";
			}
		else if (panneaucache4.textContent == "e")
			{
				coordonnee4.src="/escaperpg/images/ambria/cap/caps.png";
				panneaucache4.textContent = "s";
			}
		else if (panneaucache4.textContent == "s")
			{
				coordonnee4.src="/escaperpg/images/ambria/cap/capo.png";
				panneaucache4.textContent = "o";
			}
		else if (panneaucache4.textContent == "o")
			{
				coordonnee4.src="/escaperpg/images/ambria/cap/captiret.png";
				panneaucache4.textContent = "t";
			}
		else
			{
				coordonnee4.src="/escaperpg/images/ambria/cap/capn.png";
				panneaucache4.textContent = "n";
			}
		setTimeout(removehaut, 200);
	}
	
function boutoncapbas1()
	{
		boutonpress.play();
		boutonbas1.classList.add("boutonbason");
		boutonbas1.classList.remove("boutonbas");
		if (panneaucache1.textContent == 1)
			{
				coordonnee1.src="/escaperpg/images/ambria/cap/cap0.png";
				panneaucache1.textContent = 0;
			}
		else if (panneaucache1.textContent == 2)
			{
				coordonnee1.src="/escaperpg/images/ambria/cap/cap1.png";
				panneaucache1.textContent = 1;
			}
		else if (panneaucache1.textContent == 3)
			{
				coordonnee1.src="/escaperpg/images/ambria/cap/cap2.png";
				panneaucache1.textContent = 2;
			}
		else if (panneaucache1.textContent == 4)
			{
				coordonnee1.src="/escaperpg/images/ambria/cap/cap3.png";
				panneaucache1.textContent = 3;
			}
		else if (panneaucache1.textContent == 5)
			{
				coordonnee1.src="/escaperpg/images/ambria/cap/cap4.png";
				panneaucache1.textContent = 4;
			}
		else if (panneaucache1.textContent == 6)
			{
				coordonnee1.src="/escaperpg/images/ambria/cap/cap5.png";
				panneaucache1.textContent = 5;
			}
		else if (panneaucache1.textContent == 7)
			{
				coordonnee1.src="/escaperpg/images/ambria/cap/cap6.png";
				panneaucache1.textContent = 6;
			}
		else if (panneaucache1.textContent == 8)
			{
				coordonnee1.src="/escaperpg/images/ambria/cap/cap7.png";
				panneaucache1.textContent = 7;
			}
		else if (panneaucache1.textContent == 9)
			{
				coordonnee1.src="/escaperpg/images/ambria/cap/cap8.png";
				panneaucache1.textContent = 8;
			}
		else
			{
				coordonnee1.src="/escaperpg/images/ambria/cap/cap9.png";
				panneaucache1.textContent = 9;
			}
		setTimeout(removebas, 200);
	}
	
function boutoncapbas2()
	{
		boutonpress.play();
		boutonbas2.classList.add("boutonbason");
		boutonbas2.classList.remove("boutonbas");
		if (panneaucache2.textContent == 1)
			{
				coordonnee2.src="/escaperpg/images/ambria/cap/cap0.png";
				panneaucache2.textContent = 0;
			}
		else if (panneaucache2.textContent == 2)
			{
				coordonnee2.src="/escaperpg/images/ambria/cap/cap1.png";
				panneaucache2.textContent = 1;
			}
		else if (panneaucache2.textContent == 3)
			{
				coordonnee2.src="/escaperpg/images/ambria/cap/cap2.png";
				panneaucache2.textContent = 2;
			}
		else if (panneaucache2.textContent == 4)
			{
				coordonnee2.src="/escaperpg/images/ambria/cap/cap3.png";
				panneaucache2.textContent = 3;
			}
		else if (panneaucache2.textContent == 5)
			{
				coordonnee2.src="/escaperpg/images/ambria/cap/cap4.png";
				panneaucache2.textContent = 4;
			}
		else if (panneaucache2.textContent == 6)
			{
				coordonnee2.src="/escaperpg/images/ambria/cap/cap5.png";
				panneaucache2.textContent = 5;
			}
		else if (panneaucache2.textContent == 7)
			{
				coordonnee2.src="/escaperpg/images/ambria/cap/cap6.png";
				panneaucache2.textContent = 6;
			}
		else if (panneaucache2.textContent == 8)
			{
				coordonnee2.src="/escaperpg/images/ambria/cap/cap7.png";
				panneaucache2.textContent = 7;
			}
		else if (panneaucache2.textContent == 9)
			{
				coordonnee2.src="/escaperpg/images/ambria/cap/cap8.png";
				panneaucache2.textContent = 8;
			}
		else
			{
				coordonnee2.src="/escaperpg/images/ambria/cap/cap9.png";
				panneaucache2.textContent = 9;
			}
		setTimeout(removebas, 200);
	}
	
function boutoncapbas3()
	{
		boutonpress.play();
		boutonbas3.classList.add("boutonbason");
		boutonbas3.classList.remove("boutonbas");
		if (panneaucache3.textContent == "o")
			{
				coordonnee3.src="/escaperpg/images/ambria/cap/caps.png";
				panneaucache3.textContent = "s";
			}
		else if (panneaucache3.textContent == "s")
			{
				coordonnee3.src="/escaperpg/images/ambria/cap/cape.png";
				panneaucache3.textContent = "e";
			}
		else if (panneaucache3.textContent == "e")
			{
				coordonnee3.src="/escaperpg/images/ambria/cap/capn.png";
				panneaucache3.textContent = "n";
			}
		else if (panneaucache3.textContent == "n")
			{
				coordonnee3.src="/escaperpg/images/ambria/cap/captiret.png";
				panneaucache3.textContent = "t";
			}
		else
			{
				coordonnee3.src="/escaperpg/images/ambria/cap/capo.png";
				panneaucache3.textContent = "o";
			}
		setTimeout(removebas, 200);
	}
	
function boutoncapbas4()
	{
		boutonpress.play();
		boutonbas4.classList.add("boutonbason");
		boutonbas4.classList.remove("boutonbas");
		if (panneaucache4.textContent == "o")
			{
				coordonnee4.src="/escaperpg/images/ambria/cap/caps.png";
				panneaucache4.textContent = "s";
			}
		else if (panneaucache4.textContent == "s")
			{
				coordonnee4.src="/escaperpg/images/ambria/cap/cape.png";
				panneaucache4.textContent = "e";
			}
		else if (panneaucache4.textContent == "e")
			{
				coordonnee4.src="/escaperpg/images/ambria/cap/capn.png";
				panneaucache4.textContent = "n";
			}
		else if (panneaucache4.textContent == "n")
			{
				coordonnee4.src="/escaperpg/images/ambria/cap/captiret.png";
				panneaucache4.textContent = "t";
			}
		else
			{
				coordonnee4.src="/escaperpg/images/ambria/cap/capo.png";
				panneaucache4.textContent = "o";
			}
		setTimeout(removebas, 200);
	}

function removehaut()
	{
		boutonhaut1.classList.add("boutonhaut");
		boutonhaut1.classList.remove("boutonhauton");
		boutonhaut2.classList.add("boutonhaut");
		boutonhaut2.classList.remove("boutonhauton");
		boutonhaut3.classList.add("boutonhaut");
		boutonhaut3.classList.remove("boutonhauton");
		boutonhaut4.classList.add("boutonhaut");
		boutonhaut4.classList.remove("boutonhauton");
	}

function removebas()
	{
		boutonbas1.classList.add("boutonbas");
		boutonbas1.classList.remove("boutonbason");
		boutonbas2.classList.add("boutonbas");
		boutonbas2.classList.remove("boutonbason");
		boutonbas3.classList.add("boutonbas");
		boutonbas3.classList.remove("boutonbason");
		boutonbas4.classList.add("boutonbas");
		boutonbas4.classList.remove("boutonbason");
	}
	
function check()
	{
		if (panneaucache1.textContent == 3 && panneaucache2.textContent == 2 && panneaucache3.textContent == "n" && panneaucache4.textContent == "e")
			{
				alert("Vous esquissez un sourire.");
				document.location.href="tempete.php";
			}
		else
			{
				alert("Vous avez beau essayer d\'y voir clair dans tout ça, rien ne semble avoir de sens pour vous.");
			}
	}