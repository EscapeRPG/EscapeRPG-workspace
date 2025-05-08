var canvas = document.getElementById('canvashangarsas');
var canvasol = document.getElementById('canvasoverlay');
const width = canvas.width = 1000;
const height = canvas.height = 750;
const olwidth = canvasol.width = 1000;
const olheight = canvasol.height = 750;
var vecteur = 0,
	portehangarsasgauche = document.getElementById('portehangarsasgauche'),
	portehangarsasdroite = document.getElementById('portehangarsasdroite'),
	overlay = document.getElementById('hangarsasoverlay'),
	bouton = document.getElementById('hangarsasbtn'),
	bras = document.getElementById('hangarsasbras'),
	ctx = canvas.getContext('2d'),
	ctxol = canvasol.getContext('2d'),
	sondeplier = new Audio('/escaperpg/sons/gaea1/brasmecaniquedeplier.mp3'),
	sonreplier = new Audio('/escaperpg/sons/gaea1/brasmecaniquereplier.mp3'),
	sonlock = new Audio('/escaperpg/sons/gaea1/braslock.mp3'),
	sonporte = new Audio('/escaperpg/sons/gaea1/portehangarsas.mp3');
	
function crosshair()
{
	var rect = canvas.getBoundingClientRect();
	var x = (event.clientX - rect.left) / (rect.right - rect.left) * width;
	var y = (event.clientY - rect.top) / (rect.bottom - rect.top) * height;
	ctxol.clearRect(0, 0, width, height);
	ctxol.beginPath();
	ctxol.moveTo(0,y);
	ctxol.lineTo(width,y);
	ctxol.moveTo(x,0);
	ctxol.lineTo(x,height);
	ctxol.lineWidth = 2;
	ctxol.strokeStyle = "red";
	ctxol.stroke();
	ctxol.closePath();
}
	
function crosshairgreen()
{
	var rect = canvas.getBoundingClientRect();
	var x = (event.clientX - rect.left) / (rect.right - rect.left) * width;
	var y = (event.clientY - rect.top) / (rect.bottom - rect.top) * height;
	ctxol.clearRect(0, 0, width, height);
	ctxol.beginPath();
	ctxol.moveTo(0,y);
	ctxol.lineTo(width,y);
	ctxol.moveTo(x,0);
	ctxol.lineTo(x,height);
	ctxol.lineWidth = 2;
	ctxol.strokeStyle = "lawngreen";
	ctxol.stroke();
	ctxol.closePath();
}
	
var mousedownID = -1;
var deploiement = -1;
var repli = -1;
var vecteurX = 0;
var vecteurX2 = 0;
var scalefactor = 1;

function deplierbras()
{
	sonreplier.pause();
	sonreplier.currentTime = 0;
	sondeplier.play();
	vecteurX += 1;
	vecteurX2 -= 1;
	scalefactor -= 0.01;
	bras.setAttribute("style", "transform: scale(" + scalefactor + "); transition: transform 90ms linear");
	if (vecteurX == 64) {sonlock.play(); }
	if (vecteurX == 68)
	{
		sondeplier.pause();
		sondeplier.currentTime = 0;
		sonporte.play();
		clearInterval(deploiement);
		deploiement = -1;
		if (mousedownID == -1) { mousedownID = setTimeout(function() { mousedownID = setInterval(ouvrir, 100); }, 400); }
	}
}

function replierbras()
{
	sonporte.pause();
	sonporte.currentTime = 0;
	sondeplier.pause();
	sondeplier.currentTime = 0;
	if (vecteurX2 == -2) { sonlock.play(); }
	if (vecteurX2 == 0) { clearInterval(repli); repli = -1; sonreplier.pause(); sonreplier.currentTime = 0; return; }
	else { sonreplier.play(); }
	vecteurX2 += 1;
	vecteurX -= 1;
	scalefactor += 0.01;
	bras.setAttribute("style", "transform: scale(" + scalefactor + "); transition: transform 90ms linear");
}

function ouvrir()
{
	if (vecteur == 80)
	{
		sonporte.pause();
		sonlock.play();
		alert ('Les portes ouvertes, vous faites entrer le Seeker dans le hangar.');
		document.location.href="appontage";
	}
	vecteur += 1;
	portehangarsasgauche.setAttribute("style", "transform: translateX(-" + vecteur + "%); transition: transform 90ms linear");
	portehangarsasdroite.setAttribute("style", "transform: translateX(" + vecteur + "%); transition: transform 90ms linear");
}

function ouverturehangarsas()
{
	this.addEventListener("mouseup", function (event)
	{
		if (mousedownID != -1)
		{
			clearInterval(mousedownID);
			mousedownID = -1;
			clearInterval(deploiement);
			deploiement = -1;
		}
		if (repli == -1)
		{
			clearInterval(mousedownID);
			mousedownID = -1;
			clearInterval(deploiement);
			deploiement = -1;
			repli = setInterval(replierbras, 100);
		}
	});
	this.addEventListener("mouseout", function (event)
	{
		if (mousedownID != -1)
		{
			clearInterval(mousedownID);
			mousedownID = -1;
			clearInterval(deploiement);
			deploiement = -1;
		}
		if (repli == -1)
		{
			clearInterval(mousedownID);
			mousedownID = -1;
			clearInterval(deploiement);
			deploiement = -1;
			repli = setInterval(replierbras, 100);
		}
	});
	if (deploiement == -1) { deploiement = setInterval(deplierbras, 100); }
	if (repli != -1) { clearInterval(repli); repli = -1; }
}