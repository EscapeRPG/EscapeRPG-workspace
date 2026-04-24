const achievementPopup = document.getElementById("succespopup");

if (achievementPopup) {
  const achievementCount = achievementPopup.querySelectorAll(".succesapercu").length;
  const isLoggedIn = achievementPopup.dataset.loggedIn === "1";

  if (isLoggedIn) {
    achievementPopup.innerHTML += achievementCount > 1
      ? "<p>Nouveaux succès débloqués !</p>"
      : "<p>Nouveau succès débloqué !</p>";
  } else {
    achievementPopup.innerHTML += achievementCount > 1
      ? "<p>Nouveaux succès débloqués !<br>Cliquez <a href='/login'>ici</a> pour vous connecter ou créer votre compte, puis rafraîchissez cette page afin de les ajouter à votre collection !</p>"
      : "<p>Nouveau succès débloqué !<br>Cliquez <a href='/login'>ici</a> pour vous connecter ou créer votre compte, puis rafraîchissez cette page afin de l'ajouter à votre collection !</p>";
  }

  setTimeout(() => {
    achievementPopup.setAttribute(
      "style",
      "transform: translateX(-230px); transition: transform 500ms ease-in-out"
    );
  }, 500);

  setTimeout(() => {
    achievementPopup.setAttribute(
      "style",
      "transform: translateX(230px); transition: transform 1500ms ease-in-out"
    );
  }, 7000);
}
