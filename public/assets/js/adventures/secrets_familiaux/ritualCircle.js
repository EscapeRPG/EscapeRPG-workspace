window.EscapeRPGRitualCircle = {
  init({ action }) {
    window.EscapeRPGDragDropPuzzle?.init({
      singleOccupancy: false,
      draggables: ".draggablecercle",
      drops: ".droppercercle",
      homes: ".draggablecercle-slot",
      homeContainer: "#draggablesContainer",
      homeSlotClass: "draggablecercle-slot",
      getDragId: (element) => element.querySelector("img")?.id || "",
      matches: {
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
      },
      build(root) {
        const insertionPoint = root.querySelector(".indice") || root.querySelector(".reponse") || root.querySelector("form");
        const ritual = document.createElement("div");
        const draggables = document.createElement("div");

        ritual.id = "cerclerituel";
        draggables.id = "draggablesContainer";

        for (let i = 1; i <= 14; i++) {
          ritual.insertAdjacentHTML("beforeend", `<div class="droppercercle" id="symb${i}"></div>`);
          draggables.insertAdjacentHTML(
            "beforeend",
            `<div class="draggablecercle-slot">
              <div class="draggablecercle" id="dragsymb${i}">
                <img src="/assets/img/secrets/symboles/symbole${i}.png" id="mag${i}" alt="symbole ${i}">
              </div>
            </div>`
          );
        }

        if (insertionPoint) {
          root.insertBefore(ritual, insertionPoint);
          root.insertBefore(draggables, insertionPoint);
          return;
        }

        root.appendChild(ritual);
        root.appendChild(draggables);
      },
      onSolved: {
        modal: "L'air vibre autour de vous alors que le cercle que vous avez tracé s'illumine.",
        submitAction: action,
      },
    });
  },
};
