function createDroppers(panneau) {
  const positions = [
    [1, 3],
    [1, 4],
    [1, 5],
    [2, 1],
    [2, 2],
    [2, 3],
    [2, 4],
    [2, 5],
    [3, 1],
    [3, 2],
    [3, 3],
    [3, 4],
    [3, 5],
    [4, 1],
    [4, 2],
    [4, 3],
    [4, 4],
    [4, 5],
    [5, 1],
    [5, 2],
    [5, 3],
    [5, 4],
    [5, 5],
  ];

  for (let i = 0; i < 23; i++) {
    const id = `dropelec${i + 1}`;
    const dropDiv = document.createElement("div");
    dropDiv.className = "dropperelec";
    dropDiv.id = id;

    // Positionnement grid
    const [row, col] = positions[i];
    dropDiv.style.gridRow = row;
    dropDiv.style.gridColumn = col;

    panneau.appendChild(dropDiv);
  }
}

const correctMapping = {
  dropelec1: "drag23",
  dropelec2: "drag8",
  dropelec3: "drag18",
  dropelec4: "drag5",
  dropelec5: "drag1",
  dropelec6: "drag14",
  dropelec7: "drag9",
  dropelec8: "drag21",
  dropelec9: "drag2",
  dropelec10: "drag11",
  dropelec11: "drag20",
  dropelec12: "drag15",
  dropelec13: "drag6",
  dropelec14: "drag4",
  dropelec15: "drag19",
  dropelec16: "drag16",
  dropelec17: "drag22",
  dropelec18: "drag7",
  dropelec19: "drag17",
  dropelec20: "drag12",
  dropelec21: "drag13",
  dropelec22: "drag3",
  dropelec23: "drag10",
};

function enableDragDrop() {
  const draggables = document.querySelectorAll(".draggableelec");
  const droppers = document.querySelectorAll(".dropperelec");

  draggables.forEach((el) => {
    el.draggable = true;
    el.addEventListener("dragstart", (e) => {
      e.dataTransfer.setData("text/plain", el.id);
    });

    el.addEventListener("dragover", (e) => {
      e.preventDefault();
      el.classList.add("drag_hover");
    });

    el.addEventListener("dragleave", () => {
      el.classList.remove("drag_hover");
    });

    const container = document.querySelector(".draggables-container");

    container.addEventListener("dragover", (e) => {
      e.preventDefault();
      container.classList.add("drop_hover");
    });

    container.addEventListener("dragleave", () => {
      container.classList.remove("drop_hover");
    });

    container.addEventListener("drop", (e) => {
      e.preventDefault();
      container.classList.remove("drop_hover");

      const draggedId = e.dataTransfer.getData("text/plain");
      const draggedElement = document.getElementById(draggedId);

      if (draggedElement && draggedElement.parentElement !== container) {
        container.appendChild(draggedElement);
        checkDrags();
      }
    });
  });

  droppers.forEach((drop) => {
    drop.addEventListener("dragover", (e) => {
      e.preventDefault();
      drop.classList.add("drop_hover");
    });

    drop.addEventListener("dragleave", () => {
      drop.classList.remove("drop_hover");
    });

    drop.addEventListener("drop", (e) => {
      e.preventDefault();
      drop.classList.remove("drop_hover");

      const draggedId = e.dataTransfer.getData("text/plain");
      const draggedElement = document.getElementById(draggedId);

      if (drop.querySelector(".draggableelec")) {
        drop.classList.add("shake");
        setTimeout(() => drop.classList.remove("shake"), 300);
        return;
      }

      if (!drop.contains(e.target)) return;

      if (draggedElement) {
        drop.appendChild(draggedElement);
        checkDrags();
      }
    });
  });
}

function checkDrags() {
  let isCorrect = true;

  for (let [dropId, dragId] of Object.entries(correctMapping)) {
    const drop = document.getElementById(dropId);
    const child = drop.firstElementChild;

    if (!child || child.id !== dragId) {
      isCorrect = false;
      break;
    }
  }

  if (isCorrect) {
    alert("Le bourdonnement rassurant de l'électricité semble revenir.");
    document.location.href = "cuves.php";
  }
}

window.addEventListener("DOMContentLoaded", () => {
  const panneau = document.getElementById("innerpanneau");
  createDroppers(panneau);
  enableDragDrop();
});
