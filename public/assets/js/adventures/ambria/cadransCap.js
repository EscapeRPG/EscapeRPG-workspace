const capState = [0, 0, 0, 0];
const directionValues = ["tiret", "n", "e", "s", "o"];
const buttonAudio = new Audio("/assets/sounds/ambria/buttonpress.mp3");

const updateCapImage = (index) => {
  const img = document.getElementById(`coordonnee${index + 1}img`);
  if (!img) {
    return;
  }

  const value = index < 2 ? capState[index] : directionValues[capState[index]];
  img.src = `/assets/img/ambria/cap/cap${value}.png`;
};

const pulseButton = (button, activeClass, baseClass) => {
  button.className = activeClass;
  window.setTimeout(() => {
    button.className = baseClass;
  }, 200);
};

const moveCap = (index, delta, button, baseClass, activeClass) => {
  buttonAudio.play().catch(() => {});
  const max = index < 2 ? 9 : directionValues.length - 1;
  capState[index] += delta;
  if (capState[index] > max) {
    capState[index] = 0;
  }
  if (capState[index] < 0) {
    capState[index] = max;
  }
  updateCapImage(index);
  pulseButton(button, activeClass, baseClass);
};

for (let index = 0; index < 4; index += 1) {
  document.getElementById(`boutonhaut${index + 1}`)?.addEventListener("click", (event) => {
    moveCap(index, 1, event.currentTarget, "boutonhaut", "boutonhauton");
  });
  document.getElementById(`boutonbas${index + 1}`)?.addEventListener("click", (event) => {
    moveCap(index, -1, event.currentTarget, "boutonbas", "boutonbason");
  });
}

document.getElementById("valider")?.addEventListener("click", async () => {
  const isCorrect = capState[0] === 3 && capState[1] === 2 && capState[2] === 1 && capState[3] === 2;

  if (!isCorrect) {
    if (window.EscapeRPGModal) {
      await window.EscapeRPGModal.alert("Vous avez beau essayer d'y voir clair dans tout ça, rien ne semble avoir de sens pour vous.");
    }
    return;
  }

  if (window.EscapeRPGModal) {
    await window.EscapeRPGModal.alert("Vous esquissez un sourire.");
  }
  window.EscapeRPGDragDropPuzzle?.submitAction("cap_success");
});
