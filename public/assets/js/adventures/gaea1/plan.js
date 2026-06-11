(() => {
  const map = document.querySelector("[data-plan-map]");
  const navItems = document.querySelectorAll(".station-plan-list [data-plan-room]");

  if (!map || navItems.length === 0) {
    return;
  }

  const rooms = new Map();

  navItems.forEach((item) => {
    const code = item.dataset.planRoom;
    if (!code) {
      return;
    }

    if (!rooms.has(code)) {
      rooms.set(code, {
        links: [],
        hoverImage: null,
        hotspots: [],
      });
    }

    rooms.get(code).links.push(item);
  });

  map.querySelectorAll("[data-plan-room]").forEach((hotspot) => {
    const code = hotspot.dataset.planRoom;
    if (!code || !rooms.has(code)) {
      return;
    }

    rooms.get(code).hotspots.push(hotspot);
  });

  rooms.forEach((room, code) => {
    [...room.links, ...room.hotspots].forEach((element) => {
      element.addEventListener("pointerenter", () => setHover(code, true));
      element.addEventListener("pointerleave", () => setHover(code, false));
      element.addEventListener("focusin", () => setHover(code, true));
      element.addEventListener("focusout", () => setHover(code, false));
    });
  });

  showInitialModal();

  function setHover(code, active) {
    const room = rooms.get(code);
    if (!room) {
      return;
    }

    room.links.forEach((item) => item.classList.toggle("currentli", active));

    if (active && !room.hoverImage) {
      room.hoverImage = createHoverImage(room.hotspots[0], code);
    }

    room.hoverImage?.classList.toggle("hidden", !active);
  }

  function createHoverImage(hotspot, code) {
    const src = hotspot?.dataset.hoverSrc;
    const button = hotspot?.querySelector("button");

    if (!src || !button) {
      return null;
    }

    const image = document.createElement("img");
    image.src = src;
    image.alt = "";
    image.className = "room-tile__hover";
    button.appendChild(image);

    return image;
  }

  function showInitialModal() {
    const message = map.dataset.planModal;

    if (!message) {
      return;
    }

    if (window.EscapeRPGModal && typeof window.EscapeRPGModal.alert === "function") {
      window.EscapeRPGModal.alert(message);
      return;
    }

    window.alert(message);
  }
})();
