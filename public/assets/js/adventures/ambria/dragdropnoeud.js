window.EscapeRPGDragDropPuzzle?.init({
  draggables: ".noeud-piece",
  drops: ".droppernoeud",
  homes: ".draggernoeud",
  homeContainer: ".noeuds-draggers",
  homeSlotClass: "draggernoeud",
  getDragId: (element) => element.dataset.piece || "",
  matches: {
    dropnoeud1: "noeud5",
    dropnoeud2: "noeud3",
    dropnoeud3: "noeud8",
  },
});

const expectedKnots = {
  dropnoeud1: "noeud5",
  dropnoeud2: "noeud3",
  dropnoeud3: "noeud8",
};

const placedKnot = (dropId) => {
  const drop = document.getElementById(dropId);
  const piece = drop?.querySelector(".noeud-piece");

  return piece?.dataset.piece || "";
};

const isSolved = () => Object.entries(expectedKnots).every(([dropId, piece]) => placedKnot(dropId) === piece);

const showResult = async (message) => {
  if (window.EscapeRPGModal) {
    await window.EscapeRPGModal.alert(message);
  }
};

const submitKnots = (success) => {
  window.EscapeRPGDragDropPuzzle?.submitAction(success ? "knots_success" : "knots_failure");
};

document.getElementById("noeuds-check")?.addEventListener("click", async () => {
  if (isSolved()) {
    await showResult("Le type étudie vos noeuds et se redresse vers vous, un large sourire aux lèvres.");
    submitKnots(true);
    return;
  }

  await showResult("Le type étudie vos noeuds et se redresse vers vous, les sourcils froncés.");
  submitKnots(false);
});
