const rondbleu = new Image();
const carrebleu = new Image();
const trianglebleu = new Image();
const rondrouge = new Image();
const carrerouge = new Image();
const trianglerouge = new Image();
const rondvert = new Image();
const carrevert = new Image();
const trianglevert = new Image();
const rondjaune = new Image();
const carrejaune = new Image();
const trianglejaune = new Image();
	rondbleu.src = "/escaperpg/images/ambria/rondbleu.png";
	carrebleu.src = "/escaperpg/images/ambria/carrebleu.png";
	trianglebleu.src = "/escaperpg/images/ambria/trianglebleu.png";
	rondrouge.src = "/escaperpg/images/ambria/rondrouge.png";
	carrerouge.src = "/escaperpg/images/ambria/carrerouge.png";
	trianglerouge.src = "/escaperpg/images/ambria/trianglerouge.png";
	rondvert.src = "/escaperpg/images/ambria/rondvert.png";
	carrevert.src = "/escaperpg/images/ambria/carrevert.png";
	trianglevert.src = "/escaperpg/images/ambria/trianglevert.png";
	rondjaune.src = "/escaperpg/images/ambria/rondjaune.png";
	carrejaune.src = "/escaperpg/images/ambria/carrejaune.png";
	trianglejaune.src = "/escaperpg/images/ambria/trianglejaune.png";
	panneau = document.getElementById('panneau');
	panneaucache = document.getElementById('panneaucache');
	
function digicode1()
	{
		panneau.appendChild(rondbleu.cloneNode(true));
		panneaucache.textContent += 1;
	}
	
function digicode2()
	{
		panneau.appendChild(carrebleu.cloneNode(true));
		panneaucache.textContent += 2;
	}
	
function digicode3()
	{
		panneau.appendChild(trianglebleu.cloneNode(true));
		panneaucache.textContent += 3;
	}
	
function digicode4()
	{
		panneau.appendChild(rondrouge.cloneNode(true));
		panneaucache.textContent += 4;
	}
	
function digicode5()
	{
		panneau.appendChild(carrerouge.cloneNode(true));
		panneaucache.textContent += 5;
	}
	
function digicode6()
	{
		panneau.appendChild(trianglerouge.cloneNode(true));
		panneaucache.textContent += 6;
	}
	
function digicode7()
	{
		panneau.appendChild(rondvert.cloneNode(true));
		panneaucache.textContent += 7;
	}
	
function digicode8()
	{
		panneau.appendChild(carrevert.cloneNode(true));
		panneaucache.textContent += 8;
	}
	
function digicode9()
	{
		panneau.appendChild(trianglevert.cloneNode(true));
		panneaucache.textContent += 9;
	}
	
function digicode10()
	{
		panneau.appendChild(rondjaune.cloneNode(true));
		panneaucache.textContent += 10;
	}
	
function digicode11()
	{
		panneau.appendChild(carrejaune.cloneNode(true));
		panneaucache.textContent += 11;
	}
	
function digicode12()
	{
		panneau.appendChild(trianglejaune.cloneNode(true));
		panneaucache.textContent += 12;
	}
	
function check()
	{
		if (panneaucache.textContent == 6211411719)
			{
				alert("Vous grimpez aussi vite que vous le pouvez.");
				document.location.href="gardien2.php";
			}
		else
			{
				alert("Vous grimpez, mais l\'ascension se révèle plus compliquée que prévue.");
				document.location.href="gardien3.php";
			}
	}
	
function reset()
{
	document.location.href="gardien.php";
}