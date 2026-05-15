window.EscapeRPGDragDropPuzzle?.init({
  draggables: ".draggable",
  drops: ".dropper",
  homes: ".dragslot",
  getDragId: (element) => element.dataset.piece || "",
  matches: {
    drop2: "sapence",
  },
  onSolved: {
    modal: "La pièce s'imbrique parfaitement.",
    submitAction: "sapence_placed",
  },
});
