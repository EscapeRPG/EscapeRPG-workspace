const gemmes = document.querySelectorAll('.cibletir');

gemmes.forEach((gemme) => {
    gemme.addEventListener('mouseover', (e) => e.target.src = "/escaperpg/images/ambria/mire.png");
    gemme.addEventListener('mouseout',  (e) => e.target.src = "/escaperpg/images/ambria/cible.png");
});