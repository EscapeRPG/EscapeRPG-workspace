let gauche,
  migauche,
  milieu,
  midroite,
  droite,
  drop1 = document.getElementById("drop1"),
  drop2 = document.getElementById("drop2"),
  drop3 = document.getElementById("drop3"),
  drop4 = document.getElementById("drop4"),
  drop5 = document.getElementById("drop5"),
  drag1 = document.getElementById("dimini"),
  drag2 = document.getElementById("admini"),
  drag3 = document.getElementById("semini"),
  drag4 = document.getElementById("evmini"),
  drag5 = document.getElementById("pomini"),
  audiocoffret = new Audio("/escaperpg/sons/secrets/coffretouvert.mp3");

function dragdrop() {
  let dndHandler = {
    draggedElement: null,

    applyDragEvents: function (element) {
      element.draggable = true;
      let dndHandler = this;

      element.addEventListener("dragstart", function (e) {
        dndHandler.draggedElement = e.target;
        e.dataTransfer.setData("text/plain", "");
      });
    },

    applyDropEvents: function (dropper) {
      dropper.addEventListener("dragover", function (e) {
        e.preventDefault();
        this.className = "dropper drop_hover";
      });

      dropper.addEventListener("dragleave", function () {
        this.className = "dropper";
      });

      let dndHandler = this;

      dropper.addEventListener("drop", function (e) {
        e.preventDefault();
        let target = e.target,
          draggedElement = dndHandler.draggedElement,
          clonedElement = draggedElement.cloneNode(true);

        while (target.className.indexOf("dropper") == -1) {
          target = target.parentNode;
        }

        target.className = "dropper";
        clonedElement = target.appendChild(clonedElement);
        dndHandler.applyDragEvents(clonedElement);
        draggedElement.parentNode.removeChild(draggedElement);

        gauche = !!(target == drop1 && clonedElement == semini);
        migauche = !!(target == drop2 && clonedElement == pomini);
        milieu = !!(target == drop3 && clonedElement == evmini);
        midroite = !!(target == drop4 && clonedElement == admini);
        droite = !!(target == drop5 && clonedElement == dimini);

        if (gauche && migauche && milieu && midroite && droite) {
          setTimeout(() => {
            audiocoffret.play();
            alert("Vous entendez un petit déclic.");
            document.location.href = "papier.php";
          }, 500);
        }
      });
    },

    applyDropdragEvents: function (draggable) {
      draggable.addEventListener("dragover", function (e) {
        e.preventDefault();
        this.className = "draggable drag_hover";
      });

      draggable.addEventListener("dragleave", function () {
        this.className = "draggable";
      });

      let dndHandler = this;

      draggable.addEventListener("drop", function (e) {
        e.preventDefault();

        let target = e.target,
          draggedElement = dndHandler.draggedElement,
          clonedElement = draggedElement.cloneNode(true);

        while (target.className.indexOf("draggable") == -1) {
          target = target.parentNode;
        }

        target.className = "draggable";
        clonedElement = target.appendChild(clonedElement);
        dndHandler.applyDragEvents(clonedElement);
        draggedElement.parentNode.removeChild(draggedElement);
      });
    },
  };

  let draggables = document.querySelectorAll(".draggable");

  for (const element of draggables) {
    dndHandler.applyDragEvents(element);
    dndHandler.applyDropdragEvents(element);
  }

  let droppers = document.querySelectorAll(".dropper");

  for (const element of droppers) {
    dndHandler.applyDropEvents(element);
  }
}

dragdrop();
