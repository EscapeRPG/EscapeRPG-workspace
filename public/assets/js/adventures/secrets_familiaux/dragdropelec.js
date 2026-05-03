const electricPositions = [
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

window.EscapeRPGDragDropPuzzle?.init({
  singleOccupancy: false,
  draggables: ".draggableelec",
  drops: ".dropperelec",
  homes: ".draggableelec-slot",
  homeContainer: ".draggables-container",
  homeSlotClass: "draggableelec-slot",
  matches: {
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
  },
  build(root) {
    const container = document.createElement("div");
    const panel = document.createElement("div");
    const panelImage = document.createElement("img");
    const innerPanel = document.createElement("div");
    const draggables = document.createElement("div");

    container.id = "container";
    panel.id = "panneauelec";
    innerPanel.id = "innerpanneau";
    draggables.className = "draggables-container";
    panelImage.src = "/assets/img/secrets/panneauelec.png";
    panelImage.alt = "panneau électrique";

    panel.appendChild(panelImage);
    panel.appendChild(innerPanel);
    container.appendChild(panel);
    container.appendChild(draggables);

    electricPositions.forEach(([row, col], index) => {
      const cableNumber = index + 1;
      const drop = document.createElement("div");
      const slot = document.createElement("div");
      const drag = document.createElement("div");
      const image = document.createElement("img");

      drop.className = "dropperelec";
      drop.id = `dropelec${cableNumber}`;
      drop.style.gridRow = String(row);
      drop.style.gridColumn = String(col);

      slot.className = "draggableelec-slot";
      drag.className = "draggableelec";
      drag.id = `drag${cableNumber}`;
      image.src = `/assets/img/secrets/cables/${cableNumber}.png`;
      image.alt = `câble ${cableNumber}`;

      drag.appendChild(image);
      innerPanel.appendChild(drop);
      slot.appendChild(drag);
      draggables.appendChild(slot);
    });

    root.insertBefore(container, root.querySelector("form"));
  },
  onSolved: {
    audio: "/assets/sounds/secrets/courtcircuit.mp3",
    modal: "Le bourdonnement rassurant de l'électricité semble revenir.",
    submitAction: "solve_circuit",
  },
});
