function dragdrop() {
  const audioCoffret = new Audio("/escaperpg/sons/secrets/coffretouvert.mp3");

  const correctPairs = {
    drop1: "semini",
    drop2: "pomini",
    drop3: "evmini",
    drop4: "admini",
    drop5: "dimini",
  };

  const dndHandler = {
    draggedElement: null,

    applyDragEvents(element) {
      element.draggable = true;
      element.addEventListener("dragstart", (e) => {
        this.draggedElement = e.target.closest(".draggable");
        e.dataTransfer.setData("text/plain", "");
      });
    },

    applyDropEvents(dropTarget) {
      dropTarget.addEventListener("dragover", (e) => {
        e.preventDefault();
        dropTarget.classList.add("drop_hover");
      });

      dropTarget.addEventListener("dragleave", () => {
        dropTarget.classList.remove("drop_hover");
      });

      dropTarget.addEventListener("drop", (e) => {
        e.preventDefault();
        dropTarget.classList.remove("drop_hover");

        const dragged = this.draggedElement;
        if (!dragged) return;

        // Supprimer le précédent parent
        if (dragged.parentNode) {
          dragged.parentNode.innerHTML = "";
        }

        // Ajouter l'élément déplacé dans le nouvel emplacement
        const clone = dragged.cloneNode(true);
        clone.dataset.piece = dragged.dataset.piece;
        clone.className = "draggable";

        dropTarget.innerHTML = "";
        dropTarget.appendChild(clone);
        this.applyDragEvents(clone);

        // Vérifie si tous les éléments sont bien placés
        checkAllPlacedCorrectly();
      });
    },
  };

  function checkAllPlacedCorrectly() {
    const allCorrect = Object.entries(correctPairs).every(
      ([dropId, expectedId]) => {
        const drop = document.getElementById(dropId);
        const placed = drop.querySelector(".draggable");
        return placed?.dataset.piece === expectedId;
      }
    );

    if (allCorrect) {
      audioCoffret.play();
      alert("Vous entendez un petit déclic.");
      document.location.href = "papier.php";
    }
  }

  // Initialisation des zones de départ (dragslot) et d'arrivée (dropper)
  document.querySelectorAll(".dragslot").forEach((slot) => {
    dndHandler.applyDropEvents(slot);
    const draggable = slot.querySelector(".draggable");
    if (draggable) {
      dndHandler.applyDragEvents(draggable);
    }
  });

  document.querySelectorAll(".dropper").forEach((drop) => {
    dndHandler.applyDropEvents(drop);
  });
}

dragdrop();
