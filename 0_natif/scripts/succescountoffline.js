const container = document.getElementById("succespopup");
const nombresucces = document.querySelectorAll(".succesapercu");

if (nombresucces.length > 1) {
  container.innerHTML +=
    "<p>Nouveaux succès débloqués !<br>Cliquez <a href='/escaperpg/members/connexion' target='_blank' rel='noreferrer'>ici</a> pour vous connecter ou créer votre compte, puis rafraîchissez cette page afin de l'ajouter à votre collection !</p>";
} else {
  container.innerHTML +=
    "<p>Nouveau succès débloqué !<br>Cliquez <a href='/escaperpg/members/connexion' target='_blank' rel='noreferrer'>ici</a> pour vous connecter ou créer votre compte, puis rafraîchissez cette page afin de l'ajouter à votre collection !</p>";
}

setTimeout(function () {
  container.setAttribute(
    "style",
    "transform: translateX(-230px); transition: transform 500ms ease-in-out"
  );
}, 500);
setTimeout(function () {
  container.setAttribute(
    "style",
    "transform: translateX(230px); transition: transform 1500ms ease-in-out"
  );
}, 7000);
