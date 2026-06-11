(() => {
function chargement() {
	const loadIntro = document.getElementById("loadintro");
	const loader = document.getElementById("loader");
	const introWrap = document.getElementById("intro-wrap");

	if (loadIntro) {
		loadIntro.style.display = "none";
	}

	if (loader) {
		loader.style.display = "none";
	}

	if (introWrap) {
		introWrap.style.display = "flex";
	}

	const audio = new Audio('/assets/sounds/gaea1/intro.mp3');
	audio.play().catch(() => {});
}

window.addEventListener('load', chargement);
})();
