function dragdrop() {
	const audio = new Audio("/escaperpg/sons/ambria/armoirefermer.mp3"),
	answers = {
    drop1: "compas",
    drop2: "lampe",
    drop3: "rhum",
    drop4: "pistolet",
    drop5: "longue-vue",
    drop10: "caisse",
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

        if (dragged.parentNode) {
          dragged.parentNode.innerHTML = "";
        }

        const clone = dragged.cloneNode(true);
        clone.dataset.piece = dragged.dataset.piece;
        clone.className = "draggable";

        dropTarget.innerHTML = "";
        dropTarget.appendChild(clone);
        this.applyDragEvents(clone);

        checkAllPlacedCorrectly();
      });
    },
  };

  function checkAllPlacedCorrectly() {
    const allCorrect = Object.entries(answers).every(
      ([dropId, expectedId]) => {
        const drop = document.getElementById(dropId);
        const placed = drop.querySelector(".draggable");
        return placed?.dataset.piece === expectedId;
      }
    );

    if (allCorrect) {
    audio.play();
      alert("Vous êtes satisfait de votre rangement et refermez l'étagère à clé.");
      document.location.href = "flots/flots.php";
    }
  }

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
