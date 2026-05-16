window.EscapeRPGDragDropPuzzle?.init({
  draggables: ".etagere-piece",
  drops: ".dropperetagere",
  homes: ".draggeretagere",
  homeContainer: ".etagere-draggers",
  homeSlotClass: "draggeretagere",
  getDragId: (element) => element.dataset.piece || "",
  matches: {
    dropetagere1: "compas",
    dropetagere2: "lampe",
    dropetagere3: "rhum",
    dropetagere4: "pistolet",
    dropetagere5: "longue-vue",
    dropetagere10: "caisse",
  },
  onSolved: {
    audio: "/assets/sounds/ambria/armoirefermer.mp3",
    modal: "Vous êtes satisfait de votre rangement et refermez l'étagère à clé.",
    submitAction: "shelf_success",
  },
});
