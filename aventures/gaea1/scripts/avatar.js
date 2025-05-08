var imgcheveuxbackend = document.getElementById('cheveuxbackendimg'),
	imgcheveuxback = document.getElementById('cheveuxbackimg'),
	imgvisage = document.getElementById('visageimg'),
	imgcheveux = document.getElementById('cheveuximg'),
	imgoreilles = document.getElementById('oreillesimg'),
	imgsourcils = document.getElementById('sourcilsimg'),
	imgyeux = document.getElementById('yeuximg'),
	imgnez = document.getElementById('nezimg'),
	imgbouche = document.getElementById('boucheimg'),
	imgpilosite = document.getElementById('pilositeimg'),
	imgaccessoire = document.getElementById('accessoireimg'),
	countvisage = document.getElementById('visagecount'),
	countcheveux = document.getElementById('cheveuxcount'),
	countoreilles = document.getElementById('oreillescount'),
	countsourcils = document.getElementById('sourcilscount'),
	countyeux = document.getElementById('yeuxcount'),
	countnez = document.getElementById('nezcount'),
	countbouche = document.getElementById('bouchecount'),
	countpilosite = document.getElementById('pilositecount'),
	countaccessoire = document.getElementById('accessoirecount'),
	inputvisage = document.getElementById('visageinput'),
	inputcheveux = document.getElementById('cheveuxinput'),
	inputcheveuxcouleur = document.getElementById('couleurcheveuxinput'),
	inputoreilles = document.getElementById('oreillesinput'),
	inputsourcils = document.getElementById('sourcilsinput'),
	inputyeux = document.getElementById('yeuxinput'),
	inputyeuxcouleur = document.getElementById('couleuryeuxinput'),
	inputnez = document.getElementById('nezinput'),
	inputbouche = document.getElementById('boucheinput'),
	inputbouchecouleur = document.getElementById('couleurboucheinput'),
	inputpilosite = document.getElementById('pilositeinput'),
	inputpilositecouleur = document.getElementById('couleurpilositeinput'),
	inputaccessoire = document.getElementById('accessoireinput'),
	couleur = 1,
	couleuryeux = 1,
	couleurcheveux = 1,
	couleurpilosite = 1,
	couleurbouche = 1,
	clic = new Audio('/escaperpg/sons/gaea1/interfaceclic.mp3');
	
function randomize()
	{
		clic.play();
		couleur = Math.floor(Math.random() * 6) + 1;
		couleuryeux = Math.floor(Math.random() * 12) + 1;
		couleurcheveux = Math.floor(Math.random() * 12) + 1;
		couleurpilosite = Math.floor(Math.random() * 12) + 1;
		couleurbouche = Math.floor(Math.random() * 12) + 1;
		countvisage.innerHTML = Math.floor(Math.random() * 10) + 1;
		countcheveux.innerHTML = Math.floor(Math.random() * 15) + 1;
		countoreilles.innerHTML = Math.floor(Math.random() * 10) + 1;
		countsourcils.innerHTML = Math.floor(Math.random() * 14) + 1;
		countyeux.innerHTML = Math.floor(Math.random() * 20) + 1;
		countnez.innerHTML = Math.floor(Math.random() * 10) + 1;
		countbouche.innerHTML = Math.floor(Math.random() * 15) + 1;
		countpilosite.innerHTML = Math.floor(Math.random() * 17) + 1;
		countaccessoire.innerHTML = Math.floor(Math.random() * 14) + 1;
		inputvisage.value = countvisage.innerHTML + couleur;
		inputcheveux.value = countcheveux.innerHTML;
		inputcheveuxcouleur.value = couleurcheveux;
		inputoreilles.value = countoreilles.innerHTML + couleur;
		inputsourcils.value = countsourcils.innerHTML;
		inputyeux.value = countyeux.innerHTML;
		inputyeuxcouleur.value = couleuryeux;
		inputnez.value = countnez.innerHTML + couleur;
		inputbouche.value = countbouche.innerHTML;
		inputbouchecouleur.value = couleurbouche;
		inputpilosite.value = countpilosite.innerHTML;
		inputpilositecouleur.value = couleurpilosite;
		inputaccessoire.value = countaccessoire.innerHTML;
		imgvisage.src = "/escaperpg/images/gaea1/avatar/visage"+ inputvisage.value +".png";
		imgsourcils.src = "/escaperpg/images/gaea1/avatar/sourcils"+ inputsourcils.value +".png";
		imgyeux.src = "/escaperpg/images/gaea1/avatar/yeux"+ inputyeux.value +"-"+ inputyeuxcouleur.value +".png";
		imgcheveux.src = "/escaperpg/images/gaea1/avatar/cheveux"+ inputcheveux.value +"-"+ inputcheveuxcouleur.value +".png";
		imgcheveuxback.src = "/escaperpg/images/gaea1/avatar/cheveuxback"+ inputcheveux.value +"-"+ inputcheveuxcouleur.value +".png";
		imgcheveuxbackend.src = "/escaperpg/images/gaea1/avatar/cheveuxbackend"+ inputcheveux.value +"-"+ inputcheveuxcouleur.value +".png";
		imgnez.src = "/escaperpg/images/gaea1/avatar/nez"+ inputnez.value +".png";
		imgbouche.src = "/escaperpg/images/gaea1/avatar/bouche"+ inputbouche.value +"-"+ inputbouchecouleur.value +".png";
		imgoreilles.src = "/escaperpg/images/gaea1/avatar/oreilles"+ inputoreilles.value +".png";
		imgaccessoire.src = "/escaperpg/images/gaea1/avatar/accessoire"+ inputaccessoire.value +".png";
		imgpilosite.src = "/escaperpg/images/gaea1/avatar/pilosite"+ inputpilosite.value +"-"+ inputpilositecouleur.value +".png";
	}

function rvisage()
	{
		clic.play();
		if (countvisage.innerHTML == 1) { countvisage.innerHTML = 10; inputvisage.value = "10" + couleur; }
		else { countvisage.innerHTML --; inputvisage.value = countvisage.innerHTML + couleur; }
		imgvisage.src = "/escaperpg/images/gaea1/avatar/visage"+ inputvisage.value +".png";
	}

function visage()
	{
		clic.play();
		if (countvisage.innerHTML == 10) { countvisage.innerHTML = 1; inputvisage.value = "1" + couleur; }
		else { countvisage.innerHTML ++; inputvisage.value = countvisage.innerHTML + couleur; }
		imgvisage.src = "/escaperpg/images/gaea1/avatar/visage"+ inputvisage.value +".png";
	}

function rsourcils()
	{
		clic.play();
		if (countsourcils.innerHTML == 1) { countsourcils.innerHTML = 14; inputsourcils.value = 14; }
		else { countsourcils.innerHTML --; inputsourcils.value --; }
		imgsourcils.src = "/escaperpg/images/gaea1/avatar/sourcils"+ inputsourcils.value +".png";
	}

function sourcils()
	{
		clic.play();
		if (countsourcils.innerHTML == 14) { countsourcils.innerHTML = 1; inputsourcils.value = 1; }
		else { countsourcils.innerHTML ++; inputsourcils.value ++; }
		imgsourcils.src = "/escaperpg/images/gaea1/avatar/sourcils"+ inputsourcils.value +".png";
	}

function ryeux()
	{
		clic.play();
		if (countyeux.innerHTML == 1) { countyeux.innerHTML = 20; inputyeux.value = 20; }
		else { countyeux.innerHTML --; inputyeux.value = countyeux.innerHTML; }
		imgyeux.src = "/escaperpg/images/gaea1/avatar/yeux"+ inputyeux.value +"-"+ couleuryeux +".png";
	}

function yeux()
	{
		clic.play();
		if (countyeux.innerHTML == 20) { countyeux.innerHTML = 1; inputyeux.value = 1; }
		else { countyeux.innerHTML ++; inputyeux.value = countyeux.innerHTML; }
		imgyeux.src = "/escaperpg/images/gaea1/avatar/yeux"+ inputyeux.value +"-"+ couleuryeux +".png";
	}

function rpilosite()
	{
		clic.play();
		if (countpilosite.innerHTML == 1) { countpilosite.innerHTML = 17; inputpilosite.value = 17; }
		else { countpilosite.innerHTML --; inputpilosite.value = countpilosite.innerHTML; }
		imgpilosite.src = "/escaperpg/images/gaea1/avatar/pilosite"+ inputpilosite.value +"-"+ couleurpilosite +".png";
	}

function pilosite()
	{
		clic.play();
		if (countpilosite.innerHTML == 17) { countpilosite.innerHTML = 1; inputpilosite.value = 1; }
		else { countpilosite.innerHTML ++; inputpilosite.value = countpilosite.innerHTML; }
		imgpilosite.src = "/escaperpg/images/gaea1/avatar/pilosite"+ inputpilosite.value +"-"+ couleurpilosite +".png";
	}

function rcheveux()
	{
		clic.play();
		if (countcheveux.innerHTML == 1) { countcheveux.innerHTML = 16; inputcheveux.value = 16; }
		else { countcheveux.innerHTML --; inputcheveux.value = countcheveux.innerHTML; }
		imgcheveux.src = "/escaperpg/images/gaea1/avatar/cheveux"+ countcheveux.innerHTML +"-"+ couleurcheveux +".png";
		imgcheveuxback.src = "/escaperpg/images/gaea1/avatar/cheveuxback"+ countcheveux.innerHTML +"-"+ couleurcheveux +".png";
		imgcheveuxbackend.src = "/escaperpg/images/gaea1/avatar/cheveuxbackend"+ countcheveux.innerHTML +"-"+ couleurcheveux +".png";
	}

function cheveux()
	{
		clic.play();
		if (countcheveux.innerHTML == 16) { countcheveux.innerHTML = 1; inputcheveux.value = 1; }
		else { countcheveux.innerHTML ++; inputcheveux.value = countcheveux.innerHTML; }
		imgcheveux.src = "/escaperpg/images/gaea1/avatar/cheveux"+ countcheveux.innerHTML +"-"+ couleurcheveux +".png";
		imgcheveuxback.src = "/escaperpg/images/gaea1/avatar/cheveuxback"+ countcheveux.innerHTML +"-"+ couleurcheveux +".png";
		imgcheveuxbackend.src = "/escaperpg/images/gaea1/avatar/cheveuxbackend"+ countcheveux.innerHTML +"-"+ couleurcheveux +".png";
	}

function rnez()
	{
		clic.play();
		if (countnez.innerHTML == 1) { countnez.innerHTML = 10; inputnez.value = "10" + couleur; }
		else { countnez.innerHTML --; inputnez.value = countnez.innerHTML + couleur; }
		imgnez.src = "/escaperpg/images/gaea1/avatar/nez"+ inputnez.value +".png";
	}

function nez()
	{
		clic.play();
		if (countnez.innerHTML == 10) { countnez.innerHTML = 1; inputnez.value = "1" + couleur; }
		else { countnez.innerHTML ++; inputnez.value = countnez.innerHTML + couleur; }
		imgnez.src = "/escaperpg/images/gaea1/avatar/nez"+ inputnez.value +".png";
	}

function rbouche()
	{
		clic.play();
		if (countbouche.innerHTML == 1) { countbouche.innerHTML = 15; inputbouche.value = 15; }
		else { countbouche.innerHTML --; inputbouche.value = countbouche.innerHTML; }
		imgbouche.src = "/escaperpg/images/gaea1/avatar/bouche"+ inputbouche.value +"-"+ couleurbouche +".png";
	}

function bouche()
	{
		clic.play();
		if (countbouche.innerHTML == 15) { countbouche.innerHTML = 1; inputbouche.value = 1; }
		else { countbouche.innerHTML ++; inputbouche.value = countbouche.innerHTML; }
		imgbouche.src = "/escaperpg/images/gaea1/avatar/bouche"+ inputbouche.value +"-"+ couleurbouche +".png";
	}

function roreilles()
	{
		clic.play();
		if (countoreilles.innerHTML == 1) { countoreilles.innerHTML = 10; inputoreilles.value = "10" + couleur;}
		else { countoreilles.innerHTML --; inputoreilles.value = countoreilles.innerHTML + couleur; }
		imgoreilles.src = "/escaperpg/images/gaea1/avatar/oreilles"+ inputoreilles.value +".png";
	}

function oreilles()
	{
		clic.play();
		if (countoreilles.innerHTML == 10) { countoreilles.innerHTML = 1; inputoreilles.value = "1" + couleur; }
		else { countoreilles.innerHTML ++; inputoreilles.value = countoreilles.innerHTML + couleur; }
		imgoreilles.src = "/escaperpg/images/gaea1/avatar/oreilles"+ inputoreilles.value +".png";
	}

function raccessoire()
	{
		clic.play();
		if (countaccessoire.innerHTML == 1) { countaccessoire.innerHTML = 14; inputaccessoire.value = 14;}
		else { countaccessoire.innerHTML --; inputaccessoire.value = countaccessoire.innerHTML; }
		imgaccessoire.src = "/escaperpg/images/gaea1/avatar/accessoire"+ inputaccessoire.value +".png";
	}

function accessoire()
	{
		clic.play();
		if (countaccessoire.innerHTML == 14) { countaccessoire.innerHTML = 1; inputaccessoire.value = 1; }
		else { countaccessoire.innerHTML ++; inputaccessoire.value = countaccessoire.innerHTML; }
		imgaccessoire.src = "/escaperpg/images/gaea1/avatar/accessoire"+ inputaccessoire.value +".png";
	}
	
function changefacecolor()
	{
		clic.play();
		inputvisage.value = countvisage.innerHTML + couleur;
		inputoreilles.value = countoreilles.innerHTML + couleur;
		inputnez.value = countnez.innerHTML + couleur;
		imgvisage.src = "/escaperpg/images/gaea1/avatar/visage"+ inputvisage.value +".png";
		imgoreilles.src = "/escaperpg/images/gaea1/avatar/oreilles"+ inputoreilles.value +".png";
		imgnez.src = "/escaperpg/images/gaea1/avatar/nez"+ inputnez.value +".png";
	}
function colorblanc() { couleur = 1; changefacecolor(); }
function colorasien() { couleur = 2; changefacecolor(); }
function colorindien() { couleur = 3; changefacecolor(); }
function colormetisse() { couleur = 4; changefacecolor(); }
function colorred() { couleur = 5; changefacecolor(); }
function colornoir() { couleur = 6; changefacecolor(); }
	
function changehaircolor()
	{
		clic.play();
		inputcheveuxcouleur.value = couleurcheveux;
		imgcheveux.src = "/escaperpg/images/gaea1/avatar/cheveux"+ countcheveux.innerHTML +"-"+ couleurcheveux +".png";
		imgcheveuxback.src = "/escaperpg/images/gaea1/avatar/cheveuxback"+ countcheveux.innerHTML +"-"+ couleurcheveux +".png";
		imgcheveuxbackend.src = "/escaperpg/images/gaea1/avatar/cheveuxbackend"+ countcheveux.innerHTML +"-"+ couleurcheveux +".png";
	}
function cheveuxnoirs() { couleurcheveux = 1; changehaircolor(); }
function cheveuxgris() { couleurcheveux = 2; changehaircolor(); }
function cheveuxblancs() { couleurcheveux = 3; changehaircolor(); }
function cheveuxrouges() { couleurcheveux = 4; changehaircolor(); }
function cheveuxbruns() { couleurcheveux = 5; changehaircolor(); }
function cheveuxchatains() { couleurcheveux = 6; changehaircolor(); }
function cheveuxroux() { couleurcheveux = 7; changehaircolor(); }
function cheveuxblonds() { couleurcheveux = 8; changehaircolor(); }
function cheveuxverts() { couleurcheveux = 9; changehaircolor(); }
function cheveuxbleus() { couleurcheveux = 10; changehaircolor(); }
function cheveuxviolets() { couleurcheveux = 11; changehaircolor(); }
function cheveuxroses() { couleurcheveux = 12; changehaircolor(); }

function changeeyecolor() { inputyeuxcouleur.value = couleuryeux; imgyeux.src = "/escaperpg/images/gaea1/avatar/yeux"+ inputyeux.value +"-"+ couleuryeux +".png"; clic.play(); }
function yeuxnoirs() { couleuryeux = 1; changeeyecolor(); }
function yeuxgris() { couleuryeux = 2; changeeyecolor(); }
function yeuxblancs() { couleuryeux = 3; changeeyecolor(); }
function yeuxrouges() { couleuryeux = 4; changeeyecolor(); }
function yeuxbruns() { couleuryeux = 5; changeeyecolor(); }
function yeuxchatains() { couleuryeux = 6; changeeyecolor(); }
function yeuxroux() { couleuryeux = 7; changeeyecolor(); }
function yeuxblonds() { couleuryeux = 8; changeeyecolor(); }
function yeuxverts() { couleuryeux = 9; changeeyecolor(); }
function yeuxbleus() { couleuryeux = 10; changeeyecolor(); }
function yeuxviolets() { couleuryeux = 11; changeeyecolor(); }
function yeuxroses() { couleuryeux = 12; changeeyecolor(); }

function changemouthcolor() { inputbouchecouleur.value = couleurbouche; imgbouche.src = "/escaperpg/images/gaea1/avatar/bouche"+ inputbouche.value +"-"+ couleurbouche +".png"; clic.play(); }
function bouchenormale() { couleurbouche = 1; changemouthcolor(); }
function bouchenoire() { couleurbouche = 2; changemouthcolor(); }
function bouchegrise() { couleurbouche = 3; changemouthcolor(); }
function boucheblanche() { couleurbouche = 4; changemouthcolor(); }
function boucherouge() { couleurbouche = 5; changemouthcolor(); }
function bouchebrune() { couleurbouche = 6; changemouthcolor(); }
function boucheorange() { couleurbouche = 7; changemouthcolor(); }
function bouchejaune() { couleurbouche = 8; changemouthcolor(); }
function boucheverte() { couleurbouche = 9; changemouthcolor(); }
function bouchebleue() { couleurbouche = 10; changemouthcolor(); }
function boucheviolette() { couleurbouche = 11; changemouthcolor(); }
function boucherose() { couleurbouche = 12; changemouthcolor(); }

function changepilositecolor() { inputpilositecouleur = couleurpilosite; imgpilosite.src = "/escaperpg/images/gaea1/avatar/pilosite"+ inputpilosite.value +"-"+ couleurpilosite +".png"; clic.play(); }
function pilositenoirs() { couleurpilosite = 1; changepilositecolor(); }
function pilositegris() { couleurpilosite = 2; changepilositecolor(); }
function pilositeblancs() { couleurpilosite = 3; changepilositecolor(); }
function pilositerouges() { couleurpilosite = 4; changepilositecolor(); }
function pilositebruns() { couleurpilosite = 5; changepilositecolor(); }
function pilositechatains() { couleurpilosite = 6; changepilositecolor(); }
function pilositeroux() { couleurpilosite = 7; changepilositecolor(); }
function pilositeblonds() { couleurpilosite = 8; changepilositecolor(); }
function pilositeverts() { couleurpilosite = 9; changepilositecolor(); }
function pilositebleus() { couleurpilosite = 10; changepilositecolor(); }
function pilositeviolets() { couleurpilosite = 11; changepilositecolor(); }
function pilositeroses() { couleurpilosite = 12; changepilositecolor(); }