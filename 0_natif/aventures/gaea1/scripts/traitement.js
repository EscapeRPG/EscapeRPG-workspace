let audiosignal1 = new Audio('/escaperpg/sons/gaea1/signalbon1.mp3'),
	audiosignal2 = new Audio('/escaperpg/sons/gaea1/signalbon2.mp3'),
	audiosignal3 = new Audio('/escaperpg/sons/gaea1/signalbon3.mp3'),
	audiosignal4 = new Audio('/escaperpg/sons/gaea1/signalbon4.mp3'),
	audiosignal5 = new Audio('/escaperpg/sons/gaea1/signalbon5.mp3'),
	audiosignal6 = new Audio('/escaperpg/sons/gaea1/signalbon6.mp3'),
	audiosignal7 = new Audio('/escaperpg/sons/gaea1/signalbon7.mp3'),
	audiosignal8 = new Audio('/escaperpg/sons/gaea1/signalbon8.mp3'),
	audiosignal9 = new Audio('/escaperpg/sons/gaea1/signalbon9.mp3'),
	signalimg = document.getElementById("signal"),
	haut = document.getElementById("hautimg"),
	bas = document.getElementById("basimg"),
	gauche = document.getElementById("gaucheimg"),
	droite = document.getElementById("droiteimg"),
	onde = document.getElementById("ondetext"),
	amplitude = document.getElementById("amplitudetext"),
	vecteurX = 1.6,
	vecteurY = 0.4,
	pitch = document.getElementById("inputpitch"),
	speed = document.getElementById("inputspeed");

audiosignal1.play();
audiosignal2.play();
audiosignal3.play();
audiosignal4.play();
audiosignal5.play();
audiosignal6.play();
audiosignal7.play();
audiosignal8.play();
audiosignal9.play();
audiosignal1.muted = true;
audiosignal2.muted = false;
audiosignal3.muted = true;
audiosignal4.muted = true;
audiosignal5.muted = true;
audiosignal6.muted = true;
audiosignal7.muted = true;
audiosignal8.muted = true;
audiosignal9.muted = true;
audiosignal1.loop = true;
audiosignal2.loop = true;
audiosignal3.loop = true;
audiosignal4.loop = true;
audiosignal5.loop = true;
audiosignal6.loop = true;
audiosignal7.loop = true;
audiosignal8.loop = true;
audiosignal9.loop = true;
audiosignal1.preservesPitch = false;
audiosignal2.preservesPitch = false;
audiosignal3.preservesPitch = false;
audiosignal4.preservesPitch = false;
audiosignal5.preservesPitch = false;
audiosignal6.preservesPitch = false;
audiosignal7.preservesPitch = false;
audiosignal8.preservesPitch = false;
audiosignal9.preservesPitch = false;
audiosignal1.playbackRate = 1.6;
audiosignal2.playbackRate = 1.6;
audiosignal3.playbackRate = 1.6;
audiosignal4.playbackRate = 1.6;
audiosignal5.playbackRate = 1.6;
audiosignal6.playbackRate = 1.6;
audiosignal7.playbackRate = 1.6;
audiosignal8.playbackRate = 1.6;
audiosignal9.playbackRate = 1.6;

function slow()
{
	gauche.src = "/escaperpg/images/gaea1/traitement/gaucheclick.png";
	setTimeout(function() { gauche.src = "/escaperpg/images/gaea1/traitement/gauche.png"; }, 200);
	if (speed.value == -5)
		{ erreur(); }
	else
		{
			onde.textContent--;
			speed.value--;
			vecteurX -= 0.1;
			signalimg.style.setProperty('--scaleY', vecteurY);
			signalimg.style.setProperty('--scaleX', vecteurX);
			audiosignal1.playbackRate -= 0.1;
			audiosignal2.playbackRate -= 0.1;
			audiosignal3.playbackRate -= 0.1;
			audiosignal4.playbackRate -= 0.1;
			audiosignal5.playbackRate -= 0.1;
			audiosignal6.playbackRate -= 0.1;
			audiosignal7.playbackRate -= 0.1;
			audiosignal8.playbackRate -= 0.1;
			audiosignal9.playbackRate -= 0.1;
		}
}

function fast()
{
	droite.src = "/escaperpg/images/gaea1/traitement/droiteclick.png";
	setTimeout(function() { droite.src = "/escaperpg/images/gaea1/traitement/droite.png"; }, 200);
	if (speed.value == 17)
		{ erreur(); }
	else
		{
			onde.textContent++;
			speed.value++;
			vecteurX += 0.1;
			signalimg.style.setProperty('--scaleY', vecteurY);
			signalimg.style.setProperty('--scaleX', vecteurX);
			audiosignal1.playbackRate += 0.1;
			audiosignal2.playbackRate += 0.1;
			audiosignal3.playbackRate += 0.1;
			audiosignal4.playbackRate += 0.1;
			audiosignal5.playbackRate += 0.1;
			audiosignal6.playbackRate += 0.1;
			audiosignal7.playbackRate += 0.1;
			audiosignal8.playbackRate += 0.1;
			audiosignal9.playbackRate += 0.1;
		}
}

function pitchdown()
{
	bas.src = "/escaperpg/images/gaea1/traitement/basclick.png";
	setTimeout(function() { bas.src = "/escaperpg/images/gaea1/traitement/bas.png"; }, 200);
	if (pitch.value == -4)
		{ erreur(); }
	else
		{
			amplitude.textContent--;
			pitch.value--;
			vecteurY -= 0.2;
			signalimg.style.setProperty('--scaleY', vecteurY);
			signalimg.style.setProperty('--scaleX', vecteurX);
			if (audiosignal9.muted == false)
				{ audiosignal9.muted = true; audiosignal8.muted = false; }
			else if (audiosignal8.muted == false)
				{ audiosignal8.muted = true; audiosignal7.muted = false; }
			else if (audiosignal7.muted == false)
				{ audiosignal7.muted = true; audiosignal6.muted = false; }
			else if (audiosignal6.muted == false)
				{ audiosignal6.muted = true; audiosignal5.muted = false; }
			else if (audiosignal5.muted == false)
				{ audiosignal5.muted = true; audiosignal4.muted = false; }
			else if (audiosignal4.muted == false)
				{ audiosignal4.muted = true; audiosignal3.muted = false; }
			else if (audiosignal3.muted == false)
				{ audiosignal3.muted = true; audiosignal2.muted = false; }
			else
				{ audiosignal2.muted = true; audiosignal1.muted = false; }
		}
}

function pitchup()
{
	haut.src = "/escaperpg/images/gaea1/traitement/hautclick.png";
	setTimeout(function() { haut.src = "/escaperpg/images/gaea1/traitement/haut.png"; }, 200);
	if (pitch.value == 4)
		{ erreur(); }
	else
		{
			amplitude.textContent++;
			pitch.value++;
			vecteurY += 0.2;
			signalimg.style.setProperty('--scaleY', vecteurY);
			signalimg.style.setProperty('--scaleX', vecteurX);
			if (audiosignal1.muted == false)
				{ audiosignal1.muted = true; audiosignal2.muted = false; }
			else if (audiosignal2.muted == false)
				{ audiosignal2.muted = true; audiosignal3.muted = false; }
			else if (audiosignal3.muted == false)
				{ audiosignal3.muted = true; audiosignal4.muted = false; }
			else if (audiosignal4.muted == false)
				{ audiosignal4.muted = true; audiosignal5.muted = false; }
			else if (audiosignal5.muted == false)
				{ audiosignal5.muted = true; audiosignal6.muted = false; }
			else if (audiosignal6.muted == false)
				{ audiosignal6.muted = true; audiosignal7.muted = false; }
			else if (audiosignal7.muted == false)
				{ audiosignal7.muted = true; audiosignal8.muted = false; }
			else
				{ audiosignal8.muted = true; audiosignal9.muted = false; }
		}
}

window.addEventListener("keydown", (e) => {
	if (e.key === "ArrowRight" || e.key === "d") { fast(); }
	else if (e.key === "ArrowDown" || e.key === "s") { pitchdown(); }
	else if (e.key === "ArrowLeft" || e.key === "q") { slow(); }
	else if (e.key === "ArrowUp" || e.key === "z") { pitchup(); }
});

function erreur()
{
	signalimg.src="/escaperpg/images/gaea1/traitement/signalerreur.png";
	signalimg.style.setProperty('--scaleY', vecteurY);
	signalimg.style.setProperty('--scaleX', vecteurX);
	setTimeout(function() { signalimg.src="/escaperpg/images/gaea1/traitement/signal.png"; }, 400);
}
