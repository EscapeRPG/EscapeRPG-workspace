function dragdrop() {
  const audio = new Audio("/escaperpg/sons/ambria/porteciteouvre.mp3"),
    answers = {
      drop2: "drag2",
      drop4: "drag3",
      drop5: "drag1",
    };

  const dndHandler = {
    draggedElement: null,

    applyDragEvents(element) {
      element.draggable = true;
      element.addEventListener("dragstart", (e) => {
        this.draggedElement = e.target.closest(".draggerporte");
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
        clone.className = "draggerporte";

        dropTarget.innerHTML = "";
        dropTarget.appendChild(clone);
        this.applyDragEvents(clone);

        checkAllPlacedCorrectly();
      });
    },
  };

  function checkAllPlacedCorrectly() {
    const allCorrect = Object.entries(answers).every(([dropId, expectedId]) => {
      const drop = document.getElementById(dropId);
      const placed = drop.querySelector(".draggerporte");
      return placed?.dataset.piece === expectedId;
    });

    if (allCorrect) {
      audio.play();
      alert(
        "Vous entendez une série de cliquetis métalliques suivis d'un grondement faisant vibrer le sol, tandis que l'immense porte commence à se mouvoir.",
      );
      document.location.href = "cite.php";
    }
  }

  document.querySelectorAll(".dragslot").forEach((slot) => {
    dndHandler.applyDropEvents(slot);
    const draggerporte = slot.querySelector(".draggerporte");
    if (draggerporte) {
      dndHandler.applyDragEvents(draggerporte);
    }
  });

  document.querySelectorAll(".dropper").forEach((drop) => {
    dndHandler.applyDropEvents(drop);
  });
}

dragdrop();
