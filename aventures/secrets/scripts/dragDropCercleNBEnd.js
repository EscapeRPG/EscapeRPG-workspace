function dragdrop() {
  const dragsContainer = document.getElementById("draggablesContainer");
  const dropsContainer = document.getElementById("cerclerituel");

  const correctMatches = {
    symb1: "mag4",
    symb2: "mag6",
    symb3: "mag7",
    symb4: "mag13",
    symb5: "mag1",
    symb6: "mag11",
    symb7: "mag3",
    symb8: "mag8",
    symb9: "mag12",
    symb10: "mag14",
    symb11: "mag2",
    symb12: "mag9",
    symb13: "mag5",
    symb14: "mag10",
  };

  // Générer les éléments dynamiquement
  for (let i = 1; i <= 14; i++) {
    dropsContainer.innerHTML += `<div class="droppercercle" id="symb${i}"></div>`;
    dragsContainer.innerHTML += `
		  <div class="draggablecercle" id="dragsymb${i}">
			  <img src="/escaperpg/images/secrets/symboles/symbole${i}.png" id="mag${i}" alt="symbole ${i}">
		  </div>`;
  }

  const dndHandler = {
    draggedElement: null,

    applyDragEvents(element) {
      element.draggable = true;
      element.addEventListener("dragstart", (e) => {
        this.draggedElement = e.target;
        e.dataTransfer.setData("text/plain", "");
      });
    },

    applyDropEvents(dropper) {
      dropper.addEventListener("dragover", (e) => {
        e.preventDefault();
        dropper.classList.add("drop_hover");
      });

      dropper.addEventListener("dragleave", () => {
        dropper.classList.remove("drop_hover");
      });

      dropper.addEventListener("drop", (e) => {
        e.preventDefault();
        const target = dropper;
        const dragged = this.draggedElement;
        const clone = dragged.cloneNode(true);

        // Nettoyer le dropper avant d'ajouter un nouvel élément
        target.innerHTML = "";
        target.appendChild(clone);
        this.applyDragEvents(clone);
        dragged.parentNode.removeChild(dragged);

        // Vérification des correspondances
        checkMatches();
      });
    },
  };

  // Fonction de vérification globale
  function checkMatches() {
    const allCorrect = Object.entries(correctMatches).every(
      ([dropId, expectedMagId]) => {
        const drop = document.getElementById(dropId);
        const img = drop.querySelector("img");
        return img && img.id === expectedMagId;
      }
    );

    if (allCorrect) {
      alert(
        "L'air vibre autour de vous alors que le cercle que vous avez tracé s'illumine."
      );
      document.location.href = "../ends/2hb56k.php";
    }
  }

  // Appliquer les événements
  document.querySelectorAll(".draggablecercle").forEach((el) => {
    dndHandler.applyDragEvents(el);
    dndHandler.applyDropEvents(el); // Pour permettre aussi le retour
  });
  document.querySelectorAll(".droppercercle").forEach((el) => {
    dndHandler.applyDropEvents(el);
  });
}

dragdrop();
