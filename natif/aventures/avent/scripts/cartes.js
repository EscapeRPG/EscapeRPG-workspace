const container = document.getElementById("cards-container");

let isFlipping = false;

for (let index = 1; index < 17; index++) {
  container.innerHTML += `
     <div class="carte-jeu" data-index="${index}">
        <img src="/escaperpg/images/avent/cartes/${index}verso.png">
        <div class="hidden">
            <a href="/escaperpg/images/avent/cartes/${index}recto.png" rel="lightbox[invent]">
                <img src="/escaperpg/images/avent/cartes/${index}recto.png">
            </a>
        </div>
     </div>
    `;
}  

const cartes = document.querySelectorAll(".carte-jeu");

cartes.forEach((carte) => {
  carte.addEventListener("click", () => {
    flipCard(carte, carte.lastElementChild);
  });

  const index = parseInt(carte.dataset.index);
  if (cartesRetournees.includes(index)) {
    carte.classList.add("flipped");
    carte.lastElementChild.classList.remove("hidden");
    carte.setAttribute("style", "transform: rotateY(0deg); background: none;");
  }
});

function flipCard(carteVerso, carteRecto) {
  if (isFlipping || carteVerso.classList.contains("flipped")) return;

  carteVerso.setAttribute(
    "style",
    "transform: rotateY(-90deg); transition: 0.5s linear;"
  );

  setTimeout(() => {
    carteVerso.classList.add("flipped");
    carteRecto.classList.remove("hidden");
    carteVerso.setAttribute(
      "style",
      "transform: rotateY(0deg); transition: 0.5s linear; background: none;"
    );
  }, 500);

  const index = carteVerso.dataset.index;
  fetch("/escaperpg/aventures/avent/includes/save_flipped_card.php", {
    method: "POST",
    headers: { "Content-Type": "application/x-www-form-urlencoded" },
    body: "card_index=" + encodeURIComponent(index),
  });
}
