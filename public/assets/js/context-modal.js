(() => {
  let modal = null;
  let dialog = null;
  let message = null;
  let closeButton = null;
  let confirmButton = null;
  let activeResolver = null;
  let previousFocus = null;

  const ensureModal = () => {
    if (modal) {
      return;
    }

    modal = document.createElement("div");
    modal.className = "context-modal";
    modal.innerHTML = `
      <div class="context-modal__dialog" role="dialog" aria-modal="true" aria-describedby="context-modal-message">
        <button type="button" class="context-modal__close" aria-label="Fermer">&times;</button>
        <p class="context-modal__message" id="context-modal-message"></p>
        <div class="context-modal__actions">
          <button type="button" class="context-modal__confirm">OK</button>
        </div>
      </div>
    `;
    document.body.appendChild(modal);

    dialog = modal.querySelector(".context-modal__dialog");
    message = modal.querySelector(".context-modal__message");
    closeButton = modal.querySelector(".context-modal__close");
    confirmButton = modal.querySelector(".context-modal__confirm");

    closeButton.addEventListener("click", closeModal);
    confirmButton.addEventListener("click", closeModal);

    modal.addEventListener("click", (event) => {
      if (!dialog.contains(event.target)) {
        closeModal();
      }
    });

    document.addEventListener("keydown", (event) => {
      if (!modal.classList.contains("is-open")) {
        return;
      }

      if (event.key === "Escape") {
        closeModal();
      }

      if (event.key === "Tab") {
        keepFocusInside(event);
      }
    });
  };

  const keepFocusInside = (event) => {
    const focusable = modal.querySelectorAll(
      'button, [href], input, select, textarea, [tabindex]:not([tabindex="-1"])'
    );

    if (focusable.length === 0) {
      return;
    }

    const first = focusable[0];
    const last = focusable[focusable.length - 1];

    if (event.shiftKey && document.activeElement === first) {
      event.preventDefault();
      last.focus();
    } else if (!event.shiftKey && document.activeElement === last) {
      event.preventDefault();
      first.focus();
    }
  };

  const closeModal = () => {
    if (!modal || !modal.classList.contains("is-open")) {
      return;
    }

    modal.classList.remove("is-open");

    window.setTimeout(() => {
      message.textContent = "";

      if (previousFocus && typeof previousFocus.focus === "function") {
        previousFocus.focus();
      }

      previousFocus = null;

      if (activeResolver) {
        activeResolver();
        activeResolver = null;
      }
    }, 180);
  };

  const openModal = (text, options = {}) => {
    ensureModal();

    if (activeResolver) {
      activeResolver();
      activeResolver = null;
    }

    previousFocus = document.activeElement;
    message.textContent = String(text || "");
    confirmButton.textContent = options.confirmLabel || "OK";

    modal.classList.add("is-open");

    return new Promise((resolve) => {
      activeResolver = resolve;
    });
  };

  window.EscapeRPGModal = {
    alert: openModal,
    close: closeModal,
  };

  window.showAdventureModal = openModal;
})();
