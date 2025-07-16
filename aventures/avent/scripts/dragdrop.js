let drop2 = document.getElementById("drop2");

function dragdrop() {
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

        checkPlacedCorrectly();
      });
    },
  };

  function checkPlacedCorrectly() {
	let valid = false;
	
    if (drop2.querySelector(".draggable")) {
		valid = true;
    }

    if (valid) {
      alert("La pièce s'imbrique parfaitement.");
      document.location.href = "reparations2.php";
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
