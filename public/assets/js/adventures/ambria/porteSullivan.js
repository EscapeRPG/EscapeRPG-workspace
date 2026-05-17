window.EscapeRPGDragDropPuzzle?.init({
  draggables: ".draggerporte",
  drops: ".dropperporte",
  homes: ".porte-dragger-slot",
  homeContainer: ".porte-draggers",
  homeSlotClass: "porte-dragger-slot",
  getDragId: (element) => element.dataset.piece || "",
  matches: {
    dropporte2: "drag2",
    dropporte4: "drag3",
    dropporte5: "drag1",
  },
  onSolved: {
    audio: "/assets/sounds/ambria/porteciteouvre.mp3",
    modal: "Vous entendez une serie de cliquetis metalliques suivis d'un grondement faisant vibrer le sol, tandis que l'immense porte commence a se mouvoir.",
    submitAction: "open_sullivan_cite",
  },
});
