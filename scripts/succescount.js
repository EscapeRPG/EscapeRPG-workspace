const container = document.getElementById("succespopup");
const nombresucces = document.querySelectorAll(".succesapercu");

if (nombresucces.length > 1) {
  container.innerHTML += "<p>Nouveaux succès débloqués !</p>";
} else {
  container.innerHTML += "<p>Nouveau succès débloqué !</p>";
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
