function chargement()
{
	document.getElementById("loadintro").style.display = "none";
	document.getElementById("loader").style.display = "none";
	document.getElementById("intro-wrap").style.display = "flex";
	let audio = new Audio('/escaperpg/sons/gaea1/intro.mp3');
	audio.play();
}
