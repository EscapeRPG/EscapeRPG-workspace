let hangar = document.getElementById("hangar"),
	vuecockpit = document.getElementById('cockpit'),
	message = document.getElementById('bulleappontage'),
	compteur = document.getElementById('compteur'),
	valdist = document.getElementById('valdist'),
	mousedownID = -1,
	vecteur = 0,
	propul = document.getElementById('propulseurs'),
	imgpropul = document.getElementById('propulimg'),
	valpropulseurs = true,
	assiette = document.getElementById('assietteimg'),
	manche = document.getElementById('manche'),
	joygauche = document.getElementById('joystick_gauche'),
	joydroite = document.getElementById('joystick_droite'),
	gaucheassiette = document.getElementById('assiettegauche'),
	droiteassiette = document.getElementById('assiettedroite'),
	angle = 0,
	angleinv = 0,
	trainsatterrissage = document.getElementById('trainsatterrissage'),
	trains = false,
	croixgrise = document.getElementById('croixgrise'),
	croixrouge = document.getElementById('croixrouge'),
	croixverte = document.getElementById('croixverte'),
	controlscoll = document.getElementById('controlscoll'),
	actifcoll = document.getElementById('collactif'),
	haut = document.getElementById('haut'),
	gauche = document.getElementById('gauche'),
	bas = document.getElementById('bas'),
	droite = document.getElementById('droite'),
	vecteurX = 0,
	vecteurY = 0,
	vecteur2X = 0,
	vecteur2Y = 0,
	vecteur3X = 0,
	vecteur3Y = 0,
	scale = 1,
	croix2rouge = document.getElementById('croixrouge2'),
	controls2coll = document.getElementById('controls2coll'),
	haut2 = document.getElementById('haut2'),
	gauche2 = document.getElementById('gauche2'),
	bas2 = document.getElementById('bas2'),
	droite2 = document.getElementById('droite2'),
	moteursbtn = document.getElementById('moteursbtn'),
	distance = 10;
	valdist.innerHTML = (Math.round(distance * 10) / 10),
	duree = 18,
	beeps = new Audio('/escaperpg/sons/gaea1/beep.mp3'),
	audiostabilisateurs = new Audio('/escaperpg/sons/gaea1/stabilisateurs.mp3');
	
function ambiance()
{
	let hangarambiance = new Audio('/escaperpg/sons/gaea1/hangar.mp3');
	hangarambiance.play();
	hangarambiance.loop = true;
}
ambiance();
	
function propulseurs()
{
	let audiopropulseurs = new Audio('/escaperpg/sons/gaea1/propulseurs.mp3');
	audiopropulseurs.play();
	valpropulseurs = false;
	imgpropul.src = "/escaperpg/images/gaea1/appontage/propulseursoff.png";
	message.innerHTML = "Propulseurs éteints, poursuivez la manœuvre.";
}

function reglerassietteg()
{
	let audiostab = new Audio('/escaperpg/sons/gaea1/stabs.mp3');
	audiostab.play();
	angle = angle - 5;
	angleinv = angleinv + 5;
	manche.setAttribute("style", "transform: rotate(-7deg); transition: transform 500ms ease-in-out");
	gaucheassiette.src = "/escaperpg/images/gaea1/appontage/assiettegaucheclick.png";
	setTimeout(function() { gaucheassiette.src = "/escaperpg/images/gaea1/appontage/assiettegauche.png"; }, 200);
	setTimeout(function() { manche.setAttribute("style", "transform: rotate(0deg); transition: transform 200ms ease-in-out"); }, 500);
	assiette.setAttribute("style", "transform: rotate(" + angle + "deg); transition: transform 700ms ease-in-out");
	hangar.setAttribute("style", "transform: rotate(" + angleinv + "deg) translate(" + vecteurX + "%, " + vecteur + "%) scale(" + scale + "); transition: transform 700ms ease-in-out");
	if (angle == 0) { message.innerHTML = "Assiette à 0, reprise de la descente."; assiette.src = "/escaperpg/images/gaea1/appontage/assietteok.png"; }
	else { assiette.src = "/escaperpg/images/gaea1/appontage/assiettewrong.png"; message.innerHTML = "L'assiette n'est pas réglée correctement. Poursuite de la manœuvre impossible."; }
}

function reglerassietted()
{
	let audiostab = new Audio('/escaperpg/sons/gaea1/stabs.mp3');
	audiostab.play();
	angle = angle + 5;
	angleinv = angleinv - 5;
	manche.setAttribute("style", "transform: rotate(7deg); transition: transform 500ms ease-in-out");
	droiteassiette.src = "/escaperpg/images/gaea1/appontage/assiettedroiteclick.png";
	setTimeout(function() { droiteassiette.src = "/escaperpg/images/gaea1/appontage/assiettedroite.png"; }, 200);
	setTimeout(function() { manche.setAttribute("style", "transform: rotate(0deg); transition: transform 200ms ease-in-out"); }, 500);
	assiette.setAttribute("style", "transform: rotate(" + angle + "deg); transition: transform 700ms ease-in-out");
	hangar.setAttribute("style", "transform: rotate(" + angleinv + "deg) translate(" + vecteurX + "%, " + vecteur + "%) scale(" + scale + "); transition: transform 700ms ease-in-out");
	if (angle == 0) { message.innerHTML = "Assiette à 0, reprise de la descente."; assiette.src = "/escaperpg/images/gaea1/appontage/assietteok.png"; }
	else { assiette.src = "/escaperpg/images/gaea1/appontage/assiettewrong.png"; message.innerHTML = "L'assiette n'est pas réglée correctement. Poursuite de la manœuvre impossible."; }
}
	
function trainsatt()
{
	let audiotrains = new Audio('/escaperpg/sons/gaea1/trains.mp3');
	audiotrains.play();
	beeps.pause();
	beeps.currentTime = 0;
	trains = true;
	trainsatterrissage.classList.add("hidden");
	message.innerHTML = "Trains d'atterrissage sortis !";
}

function checkcoll1()
{
	if (vecteur2X == 60 && vecteur2Y == 40) { croixverte.classList.remove('hidden'); message.innerHTML = "Surface stable, vous pouvez reprendre."; }
	else { croixverte.classList.add('hidden'); message.innerHTML = "Alerte collision ! Veuillez corriger le vecteur d'approche pour continuer."; }
}

function collhaut()
{
	let audiostab = new Audio('/escaperpg/sons/gaea1/stabs.mp3');
	audiostab.play();
	haut.src = "/escaperpg/images/gaea1/appontage/hautclick.png";
	vecteurY += 8;
	vecteur2Y += 10;
	scale += 0.05;
	croixrouge.setAttribute("style", "transform: translate(" + vecteur2X + "%, " + vecteur2Y + "%); transition: transform 700ms ease-in-out");
	hangar.setAttribute("style", "transform: translate(" + vecteurX + "%, " + vecteur + "%) scale(" + scale + "); transition: transform 700ms ease-in-out");
	checkcoll1();
	setTimeout(function() { haut.src = "/escaperpg/images/gaea1/appontage/haut.png"; }, 100);
}

function collgauche()
{
	let audiostab = new Audio('/escaperpg/sons/gaea1/stabs.mp3');
	audiostab.play();
	gauche.src = "/escaperpg/images/gaea1/appontage/gaucheclick.png";
	vecteurX += 2;
	vecteur2X += 10;
	croixrouge.setAttribute("style", "transform: translate(" + vecteur2X + "%, " + vecteur2Y + "%); transition: transform 700ms ease-in-out");
	hangar.setAttribute("style", "transform: translate(" + vecteurX + "%, " + vecteur + "%) scale(" + scale + "); transition: transform 700ms ease-in-out");
	checkcoll1();
	setTimeout(function() { gauche.src = "/escaperpg/images/gaea1/appontage/gauche.png"; }, 100);
}

function collbas()
{
	let audiostab = new Audio('/escaperpg/sons/gaea1/stabs.mp3');
	audiostab.play();
	bas.src = "/escaperpg/images/gaea1/appontage/basclick.png";
	vecteurY -= 8;
	vecteur2Y -= 10;
	scale -= 0.05;
	croixrouge.setAttribute("style", "transform: translate(" + vecteur2X + "%, " + vecteur2Y + "%); transition: transform 700ms ease-in-out");
	hangar.setAttribute("style", "transform: translate(" + vecteurX + "%, " + vecteur + "%) scale(" + scale + "); transition: transform 700ms ease-in-out");
	checkcoll1();
	setTimeout(function() { bas.src = "/escaperpg/images/gaea1/appontage/bas.png"; }, 100);
}

function colldroite()
{
	let audiostab = new Audio('/escaperpg/sons/gaea1/stabs.mp3');
	audiostab.play();
	droite.src = "/escaperpg/images/gaea1/appontage/droiteclick.png";
	vecteurX -= 2;
	vecteur2X -= 10;
	croixrouge.setAttribute("style", "transform: translate(" + vecteur2X + "%, " + vecteur2Y + "%); transition: transform 700ms ease-in-out");
	hangar.setAttribute("style", "transform: translate(" + vecteurX + "%, " + vecteur + "%) scale(" + scale + "); transition: transform 700ms ease-in-out");
	checkcoll1();
	setTimeout(function() { droite.src = "/escaperpg/images/gaea1/appontage/droite.png"; }, 100);
}

function checkcoll2()
{
	let audiostab = new Audio('/escaperpg/sons/gaea1/stabs.mp3');
	audiostab.play();
	if (vecteur3X == -20 && vecteur3Y == -10) { croixverte.classList.remove('hidden'); message.innerHTML = "Collision évitée, beau travail ! Vous pouvez reprendre la descente."; }
	else { croixverte.classList.add('hidden'); message.innerHTML = "Surface au sol irrégulière, risque de collision. Impossible de poursuivre."; }
}

function collhaut2()
{
	let audiostab = new Audio('/escaperpg/sons/gaea1/stabs.mp3');
	audiostab.play();
	haut2.src = "/escaperpg/images/gaea1/appontage/hautclick.png";
	vecteurY += 8;
	vecteur3Y += 10;
	scale += 0.05;
	croix2rouge.setAttribute("style", "transform: translate(" + vecteur3X + "%, " + vecteur3Y + "%); transition: transform 700ms ease-in-out");
	hangar.setAttribute("style", "transform: translate(" + vecteurX + "%, " + vecteur + "%) scale(" + scale + "); transition: transform 700ms ease-in-out");
	checkcoll2();
	setTimeout(function() { haut2.src = "/escaperpg/images/gaea1/appontage/haut.png"; }, 100);
}

function collgauche2()
{
	let audiostab = new Audio('/escaperpg/sons/gaea1/stabs.mp3');
	audiostab.play();
	gauche2.src = "/escaperpg/images/gaea1/appontage/gaucheclick.png";
	vecteurX += 2;
	vecteur3X += 10;
	croix2rouge.setAttribute("style", "transform: translate(" + vecteur3X + "%, " + vecteur3Y + "%); transition: transform 700ms ease-in-out");
	hangar.setAttribute("style", "transform: translate(" + vecteurX + "%, " + vecteur + "%) scale(" + scale + "); transition: transform 700ms ease-in-out");
	checkcoll2();
	setTimeout(function() { gauche2.src = "/escaperpg/images/gaea1/appontage/gauche.png"; }, 100);
}

function collbas2()
{
	let audiostab = new Audio('/escaperpg/sons/gaea1/stabs.mp3');
	audiostab.play();
	bas2.src = "/escaperpg/images/gaea1/appontage/basclick.png";
	vecteurY -= 8;
	vecteur3Y -= 10;
	scale -= 0.05;
	croix2rouge.setAttribute("style", "transform: translate(" + vecteur3X + "%, " + vecteur3Y + "%); transition: transform 700ms ease-in-out");
	hangar.setAttribute("style", "transform: translate(" + vecteurX + "%, " + vecteur + "%) scale(" + scale + "); transition: transform 700ms ease-in-out");
	checkcoll2();
	setTimeout(function() { bas2.src = "/escaperpg/images/gaea1/appontage/bas.png"; }, 100);
}

function colldroite2()
{
	let audiostab = new Audio('/escaperpg/sons/gaea1/stabs.mp3');
	audiostab.play();
	droite2.src = "/escaperpg/images/gaea1/appontage/droiteclick.png";
	vecteurX -= 2;
	vecteur3X -= 10;
	croix2rouge.setAttribute("style", "transform: translate(" + vecteur3X + "%, " + vecteur3Y + "%); transition: transform 700ms ease-in-out");
	hangar.setAttribute("style", "transform: translate(" + vecteurX + "%, " + vecteur + "%) scale(" + scale + "); transition: transform 700ms ease-in-out");
	checkcoll2();
	setTimeout(function() { droite2.src = "/escaperpg/images/gaea1/appontage/droite.png"; }, 100);
}

function decompte()
{
	duree--;
	message.innerHTML = "Arrêt des moteurs en cours, veuillez patienter jusqu'à leur extinction complète.<br><br>Arrêt des moteurs dans : ";
	message.innerHTML += Math.round(duree);
	message.innerHTML += " secondes.";
}

function moteursstop()
{
	setInterval(decompte, 1000);
	let audiostop = new Audio('/escaperpg/sons/gaea1/moteursstop.mp3');
	audiostop.play();
	beeps.pause();
	beeps.currentTime = 0;
	moteursbtn.classList.add("hidden");
	message.innerHTML = "Arrêt des moteurs en cours, veuillez patienter jusqu'à leur extinction complète.<br><br>Arrêt des moteurs dans : 18 secondes.";
	setTimeout(function() { document.location.href="station/hangar"; }, 18000);
}
  
function draw()
{
	if (valdist.innerHTML == 9.2)
		{
			audiostabilisateurs.pause();
			audiostabilisateurs.currentTime = 0;
			message.innerHTML = "Veuillez stopper les propulseurs avant de poursuivre.";
			clearInterval(mousedownID);
			mousedownID = -1;
			propul.classList.remove("eventsoff");
			if (valpropulseurs == false)
				{
					audiostabilisateurs.play();
					vecteur -= 0.8;
					hangar.setAttribute("style", "transform: translate(" + vecteurX + "%, " + vecteur + "%) scale(" + scale + "); transition: transform 70ms ease-in-out");
					distance -= 0.1;
					valdist.innerHTML = (Math.round(distance * 10) / 10);
					propul.classList.add("eventsoff");
					message.innerHTML = "Rien à signaler, vous pouvez poursuivre la descente.";
					mousedownID = setInterval (draw, 60);
				}
			return;
		}
	else if (valdist.innerHTML == 7.6)
		{
			audiostabilisateurs.pause();
			audiostabilisateurs.currentTime = 0;
			message.innerHTML = "Veillez à redresser l'assiette avant de reprendre la manœuvre.";
			clearInterval(mousedownID);
			mousedownID = -1;
			distance -= 0.1;
			valdist.innerHTML = (Math.round(distance * 10) / 10);
			reglerassietted();
			reglerassietted();
			joygauche.classList.remove("hidden");
			joydroite.classList.remove("hidden");
			return;
		}
	else if (valdist.innerHTML == 7.5)
		{
			audiostabilisateurs.pause();
			audiostabilisateurs.currentTime = 0;
			clearInterval(mousedownID);
			mousedownID = -1;
			if (angle == 0)
				{
					audiostabilisateurs.play();
					vecteur -= 0.8;
					hangar.setAttribute("style", "transform: translate(" + vecteurX + "%, " + vecteur + "%) scale(" + scale + "); transition: transform 70ms ease-in-out");
					distance -= 0.1;
					valdist.innerHTML = (Math.round(distance * 10) / 10);
					joygauche.classList.add("hidden");
					joydroite.classList.add("hidden");
					message.innerHTML = "Parfait, reprise de la manœuvre de descente.";
					mousedownID = setInterval (draw, 60);
				}
			else { message.innerHTML = "L'assiette n'est pas réglée correctement. Poursuite de la manœuvre impossible."; }
			return;
		}
	else if (valdist.innerHTML == 5.1)
		{
			audiostabilisateurs.pause();
			audiostabilisateurs.currentTime = 0;
			beeps.play();
			beeps.loop = true;
			clearInterval(mousedownID);
			mousedownID = -1;
			distance -= 0.1;
			valdist.innerHTML = (Math.round(distance * 10) / 10);
			message.innerHTML = "Veillez à redresser l'assiette.";
			trainsatterrissage.classList.remove("hidden");
			message.innerHTML = "Nous sommes à mi-hauteur, veuillez sortir les trains d'atterrissage.";
			return;
		}
	else if (valdist.innerHTML == 5)
		{
			audiostabilisateurs.pause();
			audiostabilisateurs.currentTime = 0;
			clearInterval(mousedownID);
			mousedownID = -1;
			if (trains)
				{
					audiostabilisateurs.play();
					vecteur -= 0.8;
					hangar.setAttribute("style", "transform: translate(" + vecteurX + "%, " + vecteur + "%) scale(" + scale + "); transition: transform 70ms ease-in-out");
					distance -= 0.1;
					valdist.innerHTML = (Math.round(distance * 10) / 10);
					message.innerHTML = "";
					mousedownID = setInterval (draw, 60);
				}
			else { message.innerHTML = "Sortie des trains d'atterrissage requise pour continuer la descente."; }
			return;
		}
	else if (valdist.innerHTML == 4.4)
		{
			audiostabilisateurs.pause();
			audiostabilisateurs.currentTime = 0;
			clearInterval(mousedownID);
			mousedownID = -1;
			distance -= 0.1;
			controlscoll.classList.remove('eventsoff');
			actifcoll.classList.remove('hidden');
			valdist.innerHTML = (Math.round(distance * 10) / 10);
			message.innerHTML = "Alerte collision ! Veuillez corriger le vecteur d'approche pour continuer.";
			croixrouge.classList.remove('hidden');
			return;
		}
	else if (valdist.innerHTML == 4.3)
		{
			audiostabilisateurs.pause();
			audiostabilisateurs.currentTime = 0;
			clearInterval(mousedownID);
			mousedownID = -1;
			if (vecteur2X == 60 && vecteur2Y == 40)
				{
					audiostabilisateurs.play();
					vecteur -= 0.8;
					hangar.setAttribute("style", "transform: translate(" + vecteurX + "%, " + vecteur + "%) scale(" + scale + "); transition: transform 70ms ease-in-out");
					distance -= 0.1;
					valdist.innerHTML = (Math.round(distance * 10) / 10);
					actifcoll.classList.add('hidden');
					controlscoll.classList.add('eventsoff');
					croixrouge.classList.add('hidden');
					croixverte.classList.add('hidden');
					message.innerHTML = "Rien à signaler, vous pouvez poursuivre la descente.";
					mousedownID = setInterval (draw, 60);
				}
			else { message.innerHTML = "Surface au sol irrégulière, risque de collision. Impossible de poursuivre."; }
			return;
		}
	else if (valdist.innerHTML == 2.7)
		{
			audiostabilisateurs.pause();
			audiostabilisateurs.currentTime = 0;
			clearInterval(mousedownID);
			mousedownID = -1;
			distance -= 0.1;
			valdist.innerHTML = (Math.round(distance * 10) / 10);
			message.innerHTML = "Alerte collision ! Veuillez corriger le vecteur d'approche pour continuer.";
			controlscoll.classList.add('hidden');
			controls2coll.classList.remove('hidden');
			actifcoll.classList.remove('hidden');
			croix2rouge.classList.remove('hidden');
			return;
		}
	else if (valdist.innerHTML == 2.6)
		{
			audiostabilisateurs.pause();
			audiostabilisateurs.currentTime = 0;
			clearInterval(mousedownID);
			mousedownID = -1;
			if (vecteur3X == -20 && vecteur3Y == -10)
				{
					audiostabilisateurs.play();
					vecteur -= 0.8;
					hangar.setAttribute("style", "transform: translate(" + vecteurX + "%, " + vecteur + "%) scale(" + scale + "); transition: transform 70ms ease-in-out");
					distance -= 0.1;
					valdist.innerHTML = (Math.round(distance * 10) / 10);
					controls2coll.classList.add('eventsoff');
					actifcoll.classList.add('hidden');
					croix2rouge.classList.add('hidden');
					croixverte.classList.add('hidden');
					message.innerHTML = "";
					mousedownID = setInterval (draw, 60);
				}
			else { message.innerHTML = "Surface au sol irrégulière, risque de collision. Impossible de poursuivre."; }
			return;
		}
	else if (valdist.innerHTML == 1.1)
		{
			audiostabilisateurs.pause();
			audiostabilisateurs.currentTime = 0;
			message.innerHTML = "L'assiette n'est pas réglée correctement. Poursuite de la manœuvre impossible.";
			message.innerHTML += "<br><br>Il reste ";
			message.innerHTML += (Math.round(distance * 10) / 10);
			message.innerHTML += " mètre avant atterrissage.";
			clearInterval(mousedownID);
			mousedownID = -1;
			distance -= 0.1;
			valdist.innerHTML = (Math.round(distance * 10) / 10);
			reglerassietteg();
			joygauche.classList.remove("hidden");
			joydroite.classList.remove("hidden");
			return;
		}
	else if (valdist.innerHTML == 1)
		{
			audiostabilisateurs.pause();
			audiostabilisateurs.currentTime = 0;
			clearInterval(mousedownID);
			mousedownID = -1;
			if (angle == 0)
				{
					audiostabilisateurs.play();
					vecteur -= 0.8;
					hangar.setAttribute("style", "transform: translate(" + vecteurX + "%, " + vecteur + "%) scale(" + scale + "); transition: transform 70ms ease-in-out");
					distance -= 0.1;
					valdist.innerHTML = (Math.round(distance * 10) / 10);
					joygauche.classList.add("hidden");
					joydroite.classList.add("hidden");
					message.innerHTML = "Il reste ";
					message.innerHTML += (Math.round(distance * 10) / 10);
					message.innerHTML += " mètre avant atterrissage.";
					mousedownID = setInterval (draw, 60);
				}
			else
				{
					message.innerHTML = "L'assiette n'est pas réglée correctement. Poursuite de la manœuvre impossible.";
					message.innerHTML += "<br><br>Il reste ";
					message.innerHTML += (Math.round(distance * 10) / 10);
					message.innerHTML += " mètre avant atterrissage.";
				}
			return;
		}
	else if (valdist.innerHTML == 0.1)
		{
			audiostabilisateurs.pause();
			audiostabilisateurs.currentTime = 0;
			beeps.play();
			beeps.loop = true;
			clearInterval(mousedownID);
			mousedownID = -1;
			distance -= 0.1;
			valdist.innerHTML = (Math.round(distance * 10) / 10);
			moteursbtn.classList.remove("hidden");
			message.innerHTML = "Parfait, nous sommes arrivés, vous pouvez couper les moteurs.";
			return;
		}
	else if (valdist.innerHTML == 0)
		{
			clearInterval(mousedownID);
			mousedownID = -1;
			message.innerHTML = "Veuillez couper les moteurs du Seeker avant de sortir.";
			return;
		}
	else
		{
			if (2 <= valdist.innerHTML)
				{
					vecteur -= 0.8;
					hangar.setAttribute("style", "transform: translate(" + vecteurX + "%, " + vecteur + "%) scale(" + scale + "); transition: transform 70ms ease-in-out");
					distance -= 0.1;
					valdist.innerHTML = (Math.round(distance * 10) / 10);
				}
			else
				{
					vecteur -= 0.8;
					hangar.setAttribute("style", "transform: translate(" + vecteurX + "%, " + vecteur + "%) scale(" + scale + "); transition: transform 70ms ease-in-out");
					distance -= 0.1;
					valdist.innerHTML = (Math.round(distance * 10) / 10);
					compteur.classList.add("hidden");
					message.innerHTML = "Il reste ";
					message.innerHTML += (Math.round(distance * 10) / 10);
					message.innerHTML += " mètre avant atterrissage.";
				}
		}
}

function descente()
{
	audiostabilisateurs.play();
	if (mousedownID == -1) { mousedownID = setInterval(draw, 60); }
	this.addEventListener("mouseup", function (event) { if (mousedownID != -1) { clearInterval(mousedownID); mousedownID = -1; audiostabilisateurs.pause(); audiostabilisateurs.currentTime = 0; } });
	this.addEventListener("mouseout", function (event) { if (mousedownID != -1) { clearInterval(mousedownID); mousedownID = -1; audiostabilisateurs.pause(); audiostabilisateurs.currentTime = 0; } });
}
