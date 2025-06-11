function createDroppers(panneau) {
  for (let i = 0; i < 23; i++) {
    const id = `drop${i + 1}`;
    const dropDiv = document.createElement("div");
    dropDiv.className = "dropperelec";
    dropDiv.id = id;
    panneau.appendChild(dropDiv);
  }
}

const correctMapping = {
  drop1: "drag23",
  drop2: "drag8",
  drop3: "drag18",
  drop4: "drag5",
  drop5: "drag1",
  drop6: "drag14",
  drop7: "drag9",
  drop8: "drag21",
  drop9: "drag2",
  drop10: "drag11",
  drop11: "drag20",
  drop12: "drag15",
  drop13: "drag6",
  drop14: "drag4",
  drop15: "drag19",
  drop16: "drag16",
  drop17: "drag22",
  drop18: "drag7",
  drop19: "drag17",
  drop20: "drag12",
  drop21: "drag13",
  drop22: "drag3",
  drop23: "drag10",
};

function enableDragDrop() {
  const draggables = document.querySelectorAll(".draggableelec");
  const droppers = document.querySelectorAll(".dropperelec");

  draggables.forEach((el) => {
    el.draggable = true;
    el.addEventListener("dragstart", (e) => {
      e.dataTransfer.setData("text/plain", e.target.id);
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

      if (draggedElement) {
        drop.innerHTML = "";
        drop.appendChild(draggedElement);
      }

      checkDrags();
    });
  });
}

function checkDrags() {
  let isCorrect = true;

  for (let [dropId, dragId] of Object.entries(correctMapping)) {
    const drop = document.getElementById(dropId);
    const drag = drop.firstElementChild;

    if (!drag || drag.id !== dragId) {
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
  const panneau = document.getElementById("panneauelec");
  createDroppers(panneau);
  enableDragDrop();
});



































function dragdrop() {
  let dndHandler = {
    draggedElement: null, // Propriété pointant vers l'élément en cours de déplacement

    applyDragEvents: function (element) {
      element.draggable = true;

      let dndHandler = this; // Cette variable est nécessaire pour que l'événement « dragstart » ci-dessous accède facilement au namespace « dndHandler »

      element.addEventListener("dragstart", function (e) {
        dndHandler.draggedElement = e.target; // On sauvegarde l'élément en cours de déplacement
        e.dataTransfer.setData("text/plain", ""); // Nécessaire pour Firefox
      });
    },

    applyDropEvents: function (dropper) {
      dropper.addEventListener("dragover", function (e) {
        e.preventDefault(); // On autorise le drop d'éléments
        this.className = "dropperelec drop_hover"; // Et on applique le style adéquat à notre zone de drop quand un élément la survole
      });

      dropper.addEventListener("dragleave", function () {
        this.className = "dropperelec"; // On revient au style de base lorsque l'élément quitte la zone de drop
      });

      let dndHandler = this; // Cette variable est nécessaire pour que l'événement « drop » ci-dessous accède facilement au namespace « dndHandler »

      dropper.addEventListener("drop", function (e) {
        e.preventDefault(); // On autorise le drop d'éléments

        let target = e.target,
          draggedElement = dndHandler.draggedElement, // Récupération de l'élément concerné
          clonedElement = draggedElement.cloneNode(true); // On créé immédiatement le clone de cet élément

        while (target.className.indexOf("dropperelec") == -1) {
          // Cette boucle permet de remonter jusqu'à la zone de drop parente
          target = target.parentNode;
        }

        target.className = "dropperelec"; // Application du style par défaut

        clonedElement = target.appendChild(clonedElement); // Ajout de l'élément cloné à la zone de drop actuelle
        dndHandler.applyDragEvents(clonedElement); // Nouvelle application des événements qui ont été perdus lors du cloneNode()

        draggedElement.parentNode.removeChild(draggedElement); // Suppression de l'élément d'origine

        checkDrags();
      });
    },

    applyDropdragEvents: function (draggable) {
      draggable.addEventListener("dragover", function (e) {
        e.preventDefault(); // On autorise le drop d'éléments
        this.className = "draggableelec drag_hover"; // Et on applique le style adéquat à notre zone de drop quand un élément la survole
      });

      draggable.addEventListener("dragleave", function () {
        this.className = "draggableelec"; // On revient au style de base lorsque l'élément quitte la zone de drop
      });

      let dndHandler = this; // Cette variable est nécessaire pour que l'événement « drop » ci-dessous accède facilement au namespace « dndHandler »

      draggable.addEventListener("drop", function (e) {
        e.preventDefault(); // On autorise le drop d'éléments

        let target = e.target,
          draggedElement = dndHandler.draggedElement, // Récupération de l'élément concerné
          clonedElement = draggedElement.cloneNode(true); // On créé immédiatement le clone de cet élément

        while (target.className.indexOf("draggableelec") == -1) {
          // Cette boucle permet de remonter jusqu'à la zone de drop parente
          target = target.parentNode;
        }

        target.className = "draggableelec"; // Application du style par défaut

        clonedElement = target.appendChild(clonedElement); // Ajout de l'élément cloné à la zone de drop actuelle
        dndHandler.applyDragEvents(clonedElement); // Nouvelle application des événements qui ont été perdus lors du cloneNode()

        draggedElement.parentNode.removeChild(draggedElement); // Suppression de l'élément d'origine
      });
    },
  };

  let elements = document.querySelectorAll(".draggableelec"),
    elementsLen = elements.length;

  for (let i = 0; i < elementsLen; i++) {
    dndHandler.applyDragEvents(elements[i]); // Application des paramètres nécessaires aux éléments déplaçables
  }

  let droppers = document.querySelectorAll(".dropperelec"),
    droppersLen = droppers.length;

  for (let i = 0; i < droppersLen; i++) {
    dndHandler.applyDropEvents(droppers[i]); // Application des événements nécessaires aux zones de drop
  }

  let draggables = document.querySelectorAll(".draggableelec"),
    draggablesLen = draggables.length;

  for (let i = 0; i < draggablesLen; i++) {
    dndHandler.applyDropdragEvents(draggables[i]); // Application des événements nécessaires aux zones de drag et drop d'où proviennent les draggables d'origine
  }
}
dragdrop();


function checkDrags() {
  first = !!(target == drop1 && clonedElement == drag23);
  second = !!(target == drop2 && clonedElement == drag8);
  third = !!(target == drop3 && clonedElement == drag18);
  fourth = !!(target == drop4 && clonedElement == drag5);
  fifth = !!(target == drop5 && clonedElement == drag1);
  sixth = !!(target == drop6 && clonedElement == drag14);
  seventh = !!(target == drop7 && clonedElement == drag9);
  eighth = !!(target == drop8 && clonedElement == drag21);
  nineth = !!(target == drop9 && clonedElement == drag2);
  tenth = !!(target == drop10 && clonedElement == drag11);
  eleventh = !!(target == drop11 && clonedElement == drag20);
  twelveth = !!(target == drop12 && clonedElement == drag15);
  thirteenth = !!(target == drop13 && clonedElement == drag6);
  fourteenth = !!(target == drop14 && clonedElement == drag4);
  fifteenth = !!(target == drop15 && clonedElement == drag19);
  sixteenth = !!(target == drop16 && clonedElement == drag16);
  seventeenth = !!(target == drop17 && clonedElement == drag22);
  eighteenth = !!(target == drop18 && clonedElement == drag7);
  nineteenth = !!(target == drop19 && clonedElement == drag17);
  twentieth = !!(target == drop20 && clonedElement == drag12);
  twentyfirst = !!(target == drop21 && clonedElement == drag13);
  twentysecond = !!(target == drop22 && clonedElement == drag3);
  twentythird = !!(target == drop23 && clonedElement == drag10);

  finalCheck();
}

function finalCheck() {
  if (
    first &&
    second &&
    third &&
    fourth &&
    fifth &&
    sixth &&
    seventh &&
    eighth &&
    nineth &&
    tenth &&
    eleventh &&
    twelveth &&
    thirteenth &&
    fourteenth &&
    fifteenth &&
    sixteenth &&
    seventeenth &&
    eighteenth &&
    nineteenth &&
    twentieth &&
    twentyfirst &&
    twentysecond &&
    twentythird
  ) {
    alert("Le bourdonnement rassurant de l'électricité semble revenir.");
    document.location.href = "cuves.php";
  }
}
