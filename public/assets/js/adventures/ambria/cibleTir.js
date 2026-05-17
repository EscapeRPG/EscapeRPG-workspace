const gemmes = document.querySelectorAll('.cibletir');

gemmes.forEach((gemme) => {
    gemme.addEventListener('mouseover', (e) => e.target.src = "/assets/img/ambria/mire.png");
    gemme.addEventListener('mouseout',  (e) => e.target.src = "/assets/img/ambria/cible.png");
});