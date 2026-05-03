window.EscapeRPGDragDropPuzzle?.init({
  singleOccupancy: false,
  draggables: ".draggable",
  drops: ".dropper",
  homes: ".dragslot",
  homeContainer: "#dragdropcoffret",
  homeSlotClass: "dragslot",
  getDragId: (element) => element.dataset.piece || "",
  matches: {
    drop1: "semini",
    drop2: "pomini",
    drop3: "evmini",
    drop4: "admini",
    drop5: "dimini",
  },
  build(root) {
    const insertionPoint = root.querySelector(".indice") || root.querySelector(".reponse") || root.querySelector("form");
    const pieces = [
      { id: "dimini", src: "/assets/img/secrets/di.png", alt: "pièce vieil homme" },
      { id: "admini", src: "/assets/img/secrets/ad.png", alt: "pièce homme" },
      { id: "semini", src: "/assets/img/secrets/se.png", alt: "pièce serpent" },
      { id: "evmini", src: "/assets/img/secrets/ev.png", alt: "pièce femme" },
      { id: "pomini", src: "/assets/img/secrets/po.png", alt: "pièce pomme" },
    ];
    const coffret = document.createElement("div");
    const slots = document.createElement("div");
    const fragment = document.createDocumentFragment();

    coffret.id = "coffret";
    coffret.innerHTML = '<img src="/assets/img/secrets/coffretface.png" alt="coffret">';

    Object.keys(this.matches).forEach((dropId) => {
      const drop = document.createElement("div");
      drop.className = "dropper";
      drop.id = dropId;
      coffret.appendChild(drop);
    });

    slots.id = "dragdropcoffret";
    pieces.forEach((piece) => {
      const slot = document.createElement("div");
      const draggable = document.createElement("div");
      const image = document.createElement("img");

      slot.className = "dragslot";
      draggable.className = "draggable";
      draggable.dataset.piece = piece.id;
      image.src = piece.src;
      image.alt = piece.alt;

      draggable.appendChild(image);
      slot.appendChild(draggable);
      slots.appendChild(slot);
    });

    fragment.appendChild(coffret);
    fragment.appendChild(document.createElement("br"));
    fragment.appendChild(slots);

    if (insertionPoint) {
      root.insertBefore(fragment, insertionPoint);
      return;
    }

    root.appendChild(fragment);
  },
  onSolved: {
    audio: "/assets/sounds/secrets/coffretouvert.mp3",
    modal: "Vous entendez un petit déclic.",
    redirect: "/aventures/secretsfamiliaux/manoir/papier",
  },
});
